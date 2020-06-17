<?php

class LoginController extends Controller {
    public function index() {
        return $this->view("admin/auth/loginForm");
    }
    
    public function auth() {
        if(isset($_POST['login'])) {
            // Connection
            $userDb = $this->model("User");

            // Error
            $error = '';

            // Validate Username And Password
            $username = isset($_POST['username']) ? $_POST['username'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';
            $result = $userDb->getUserByName($username);
            if(!empty($username) || !empty($password)) {
                if(!empty($result)) {
                    if(!password_verify($password,$result['password'])) {
                        $error = "Password Is Incorrect!!!";
                    }
                    if($result['user_level'] == '0') {
                        $error = 'You Are Not The Admin!!!';
                    }
                } else {
                    $error = "Username Is Incorrect!!!";
                }
            } else $error = 'You Have To Fill In All The Fields!!!';

            if($error === '') {
                $_SESSION['username'] = $result['username'];
                $_SESSION['user_fullname'] = $result['user_fullname'];
                $_SESSION['authenticated'] = true;

                $redirect = $_SESSION['mainUrl'] . '/admin';
                header("location:$redirect");
                exit();
                return;
            } else {
                return $this->view("admin/auth/loginForm",[
                    'error' => $error
                ]);
            }
        }
    }
}