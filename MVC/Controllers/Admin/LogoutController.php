<?php

class LogoutController extends Controller {
    public function index() {
        if(isset($_POST['logout'])) {
            session_destroy();
        
            header("location:http://localhost/Q21Shop/admin");
            exit();
            return;
        } else {
            header("location:http://localhost/Q21Shop/admin");
        }
    }
}