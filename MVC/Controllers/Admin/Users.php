<?php

class Users extends Controller {
    private $model = "User";

    public function index($page = 0) {
        // Number Of Users Per Page
        $numberOfUsersPerPage = 4;

        // Get Max Page
        $numberOfPages = count($this->model($this->model)->getAllUsers());
        $lastPage = 0;
        if($numberOfPages % $numberOfUsersPerPage > 0) {
            $lastPage = $numberOfPages / $numberOfUsersPerPage;
        } else {
            $lastPage = $numberOfPages / $numberOfUsersPerPage - 1;
        }

        // Get Users From Database
        $allUsers = $this->model($this->model)->getUsers($page * $numberOfUsersPerPage,$numberOfUsersPerPage);
        
        // Get The Pagination
        $this->view("admin/partials/pagination");

        // Return View With All Users
        return $this->view("admin/index",[
            'content' => 'users/index',
            'page' => 'users',
            'users' => $allUsers,
            'pagination' => $page,
            'lastPage' => $lastPage
        ]);
    }

    public function create() {
        return $this->view("admin/index",[
            'content' => 'users/create',
            'page' => 'users'
        ]);
    }

    public function edit($user_id = 0) {
        $user = $this->model($this->model)->getUserById($user_id);

        return $this->view("admin/index",[
            'content' => 'users/edit',
            'page' => 'users',
            'post' => $user
        ]);
    }

    public function store() {
        if(isset($_POST['create'])) {
            // Connection
            $userDb = $this->model($this->model);
            // Errors
            $errors = [];

            // Validate Username
            $username = isset($_POST['username']) ? $_POST['username'] : '';
            if(!empty($username)) {
                if(preg_match('/^[a-zA-Z0-9_]{5,30}$/', $username)) {
                    $checkExistedUser = $userDb->getUserByName($username);
                    if(!empty($checkExistedUser)) $errors['username'] = 'Username Already Existed!!!';
                } else $errors['username'] = 'Invalid Username';
            } else $errors['username'] = 'Username Can not Be Empty!!!';
            
            // Validate Password
            $password = isset($_POST['password']) ? $_POST['password'] : '';
            $confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';
            if(!empty($password) && !empty($confirm_password)) {
                if(preg_match('/^[a-zA-Z0-9\W]{8,30}$/',$password)) {
                    if(strcmp($password, $confirm_password) !== 0) {
                        $errors['password'] = "Password Does Not Match!!!";
                    } else {
                        $password = password_hash($password, PASSWORD_DEFAULT);
                    }
                } else $errors['password'] = "7 < Password Length < 31";
            } else $errors['password'] = "Password And Confirm Password Can not Be Empty!!!";

            // Validate Full Name
            $user_fullname = isset($_POST['user_fullname']) ? $_POST['user_fullname'] : '';
            if(!empty($user_fullname)) {
                if(!preg_match("/^([a-zA-Z' ]+)$/", $user_fullname)) $errors['user_fullname'] = "Invalid Full Name";
            } else $errors['user_fullname'] = "Full Name Can not Be Empty!!!";

            // Validate Email
            $user_email = isset($_POST['user_email']) ? $_POST['user_email'] : '';
            if(!empty($user_email)) {
                if(!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
                    $errors['user_email'] = "Invalid Email!!!";
                }
            } else $errors['user_email'] = "Email Can not Be Empty!!!";

            // Validate Phone
            $user_phone = isset($_POST['user_phone']) ? $_POST['user_phone'] : '';
            if(!empty($user_phone)) {
                if(!preg_match('/^[0-9]{10,20}$/', $user_phone)) $errors['user_phone'] = "Invalid Phone";
            }

            // Get Address
            $user_address = isset($_POST['user_address']) ? $_POST['user_address'] : '';

            // Get User's Level
            $user_level = isset($_POST['user_level']) ? $_POST['user_level'] : 0;
            
            // Insert User Information Into Database
            if(empty($errors)) {
                $request = [
                    'username' => $username,
                    'password' => $password,
                    'user_fullname' => $user_fullname,
                    'user_email' => $user_email,
                    'user_phone' => $user_phone,
                    'user_address' => $user_address,
                    'user_level' => $user_level
                ];
                $userDb->store($request);
                
                // Get All Users From Database
                $allUsers = $this->model($this->model)->getAllUsers();

                // Return Users View With All Users And Result
                return $this->view("admin/index",[
                    'content' => 'users/index',
                    'page' => 'users',
                    'users' => $allUsers,
                    'result' => 'Added Successfully!!!'
                ]);
            } else {
                // Return Users Create With Errors
                return $this->view("admin/index",[
                    'content' => 'users/create',
                    'page' => 'users',
                    'errors' => $errors,
                    'post' => $_POST
                ]);
            }
        }
    }

    public function update() {
        if(isset($_POST['update'])) {
            // Connection
            $userDb = $this->model($this->model);
            // Errors
            $errors = [];

            // Get User Id And reg_date
            $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';
            $reg_date = isset($_POST['reg_date']) ? $_POST['reg_date'] : '';

            // Validate Username
            $username = isset($_POST['username']) ? $_POST['username'] : '';
            if(!empty($username)) {
                if(preg_match('/^[a-zA-Z0-9_]{5,30}$/', $username)) {
                    $existedUser = $userDb->existedUser($username,$user_id);
                    if($existedUser) $errors['username'] = 'Username Already Existed!!!';
                } else $errors['username'] = 'Invalid Username';
            } else $errors['username'] = 'Username Can not Be Empty!!!';
            
            // Validate Password
            $password = isset($_POST['password']) ? $_POST['password'] : '';
            $confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';
            if(!empty($password) && !empty($confirm_password)) {
                if(preg_match('/^[a-zA-Z0-9\W]{8,30}$/',$password)) {
                    if(strcmp($password, $confirm_password) !== 0) {
                        $errors['password'] = "Password Does Not Match!!!";
                    } else {
                        $password = password_hash($password, PASSWORD_DEFAULT);
                    }
                } else $errors['password'] = "7 < Password Length < 31";
            } else $errors['password'] = "Password And Confirm Password Can not Be Empty!!!";

            // Validate Full Name
            $user_fullname = isset($_POST['user_fullname']) ? $_POST['user_fullname'] : '';
            if(!empty($user_fullname)) {
                if(!preg_match('/^[a-zA-Z]+(?:\s[a-zA-Z]+)+$/', $user_fullname)) $errors['user_fullname'] = "Invalid Full Name";
            } else $errors['user_fullname'] = "Full Name Can not Be Empty!!!";

            // Validate Email
            $user_email = isset($_POST['user_email']) ? $_POST['user_email'] : '';
            if(!empty($user_email)) {
                if(!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
                    $errors['user_email'] = "Invalid Email!!!";
                }
            } else $errors['user_email'] = "Email Can not Be Empty!!!";

            // Validate Phone
            $user_phone = isset($_POST['user_phone']) ? $_POST['user_phone'] : '';
            if(!empty($user_phone)) {
                if(!preg_match('/^[0-9]{10,20}$/', $user_phone)) $errors['user_phone'] = "Invalid Phone";
            }

            // Get Address
            $user_address = isset($_POST['user_address']) ? $_POST['user_address'] : '';

            // Get User's Level
            $user_level = isset($_POST['user_level']) ? $_POST['user_level'] : 0;
            
            // Insert User Information Into Database
            if(empty($errors)) {
                $request = [
                    'user_id' => $user_id,
                    'username' => $username,
                    'password' => $password,
                    'user_fullname' => $user_fullname,
                    'user_email' => $user_email,
                    'user_phone' => $user_phone,
                    'user_address' => $user_address,
                    'user_level' => $user_level,
                    'reg_date' => $reg_date
                ];
                $userDb->update($request);
                
                // Get All Users From Database
                $allUsers = $this->model($this->model)->getAllUsers();

                // Return Users View With All Users And Result
                return $this->view("admin/index",[
                    'content' => 'users/index',
                    'page' => 'users',
                    'users' => $allUsers,
                    'result' => 'Updated Successfully!!!'
                ]);
            } else {
                // Return Users Create With Errors
                return $this->view("admin/index",[
                    'content' => 'users/edit',
                    'page' => 'users',
                    'errors' => $errors,
                    'post' => $_POST
                ]);
            }
        }
    }

    public function delete($user_id, $reg_date) {
            $this->model($this->model)->destroy([
                'user_id' => $user_id,
                'reg_date' => $reg_date
            ]);

            $redirect = $_SESSION['mainUrl'] . '/admin/users';
            header("location:$redirect");
            exit();
            return;
    }
}