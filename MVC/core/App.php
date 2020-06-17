<?php

class App {
    // There Are 2 Sides: Client and Admin
    // Client: https://domain/controller/action/{params}
    // Admin: https://domain/admin/controller/action/{params}
    private $controller = "Home";
    private $action = "index";
    private $params = [];

    public function __construct()
    {
        // Get The Validated URL
        $url = $this->urlProcessing();

        // Get The Side
        if(isset($url[0]) && $url[0] === "admin") {
            // Code On The Admin Side
            unset($url[0]);

            // Authenticate User
            if(isset($_SESSION['username']) && $_SESSION['authenticated']) {
                // Get The Controller File That Is Requested
                if(isset($url[1]) && $url[1] !== 'authentication') {
                    if(file_exists("./MVC/Controllers/Admin/" . $url[1] . ".php")) {
                        $this->controller = $url[1];
                        unset($url[1]);
                    }
                }
                require_once './MVC/Controllers/Admin/' . $this->controller . '.php';
                $this->controller = new $this->controller; // Important
    
                // Get The Action
                if(isset($url[2])) {
                    if(method_exists($this->controller, $url[2])) {
                        $this->action = $url[2];
                        unset($url[2]);
                    }
                }

                // Get The Parameters
                $this->params = $url ? array_values($url) : [];
            } else {
                // Set Authentication Controller
                $this->controller = 'LoginController';
                require_once './MVC/Controllers/Admin/' . $this->controller . '.php';
                $this->controller = new $this->controller; // Important

                // Get The Action
                if(isset($url[2])) {
                    if(method_exists($this->controller, $url[2])) {
                        $this->action = $url[2];
                        unset($url[2]);
                    }
                }
            }
        } else {
            // Code In The Client Side
            // Get The Controller File That Is Requested
            if(isset($url[0]) && file_exists("./MVC/Controllers/Client/" . $url[0] . ".php")) {
                $this->controller = $url[0];
                unset($url[0]);
            }
            require_once './MVC/Controllers/Client/' . $this->controller . '.php';
            $this->controller = new $this->controller; // Important

            // Get The Action
            if(isset($url[1])) {
                if(method_exists($this->controller, $url[1])) {
                    $this->action = $url[1];
                    unset($url[1]);
                }
            }

            // Get The Parameters
            $this->params = $url ? array_values($url) : [];
        }
        // Execute The Method In The Controller
        $_SESSION['mainUrl'] = 'http://localhost/Q21Shop';
        call_user_func_array([$this->controller,$this->action],$this->params);
    }

    // Get The URL And Validate It
    public function urlProcessing() {
        if(isset($_GET['url'])) {
            return explode("/",trim($_GET['url'],"/"));
        }
    }
}