<?php

class Orders extends Controller {
    private $model = "Order";

    public function index($page = 0) {
        // Number Of Users Per Page
        $numberOfUsersPerPage = 9;

        // Get Max Page
        $numberOfPages = count($this->model($this->model)->getAllUnprocessedOrders());
        $lastPage = 0;
        if($numberOfPages % $numberOfUsersPerPage > 0) {
            $lastPage = $numberOfPages / $numberOfUsersPerPage;
        } else {
            $lastPage = $numberOfPages / $numberOfUsersPerPage - 1;
        }

        // Get Users From Database
        $orders = $this->model($this->model)->getUnprocessedOrders($page * $numberOfUsersPerPage,$numberOfUsersPerPage);
        
        // Get The Pagination
        $this->view("admin/partials/pagination");

        return $this->view("admin/index",[
            'content' => 'orders/index',
            'page' => 'orders',
            'orders' => $orders,
            'pagination' => $page,
            'lastPage' => $lastPage
        ]);
    }

    public function process($order_id) {
        // Get Order Details
        $order_details = $this->model($this->model)->getOrderDetails($order_id);

        return $this->view("admin/index",[
            'content' => 'orders/process',
            'page' => 'orders',
            'order_details' => $order_details,
            'order_id' => $order_id
        ]);
    }

    public function processed($page = 0) {
        // Number Of Users Per Page
        $numberOfUsersPerPage = 9;

        // Get Max Page
        $numberOfPages = count($this->model($this->model)->getAllProcessedOrders());
        $lastPage = 0;
        if($numberOfPages % $numberOfUsersPerPage > 0) {
            $lastPage = $numberOfPages / $numberOfUsersPerPage;
        } else {
            $lastPage = $numberOfPages / $numberOfUsersPerPage - 1;
        }

        // Get Processed Orders From Database
        $orders = $this->model($this->model)->getProcessedOrders($page * $numberOfUsersPerPage,$numberOfUsersPerPage);
        
        // Get The Pagination
        $this->view("admin/partials/pagination");

        return $this->view("admin/index",[
            'content' => 'orders/processed',
            'page' => 'orders',
            'orders' => $orders,
            'pagination' => $page,
            'lastPage' => $lastPage
        ]);
    }

    public function processing() {
        if(isset($_POST['processing']) && $_POST['processing']) {
            // Get Order Id
            $order_id = isset($_POST['order_id']) ? $_POST['order_id'] : '';
            $checkValidOrderId = $this->model($this->model)->checkValidOrderId($order_id);
            if(empty($order_id) || empty($checkValidOrderId)) {
                $redirect = $_SESSION['mainUrl'] . '/admin/orders/index/?error=1234';
                header("location:$redirect");
                exit();
            } else {
                // Change To Processed
                $this->model($this->model)->processed($order_id);

                $redirect = $_SESSION['mainUrl'] . '/admin/orders/processed/?result=successfully';
                header("location:$redirect");
                exit();
            }
        }
    }
}