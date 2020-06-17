<?php

class Home extends Controller {
    public function index() {
        // Get Highlighted Products
        $highlightedProducts = $this->model('Product')->getHighlightedProducts();

        // Get New Products
        $month = date("n");
        $newProducts = $this->model('Product')->getNewProducts($month);

        return $this->view("client/index",[
            'content' => 'home/index',
            'page' => 'home',
            'highlightedProducts' => $highlightedProducts,
            'newProducts' => $newProducts
        ]);
    }
}