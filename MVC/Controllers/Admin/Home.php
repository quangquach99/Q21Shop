<?php

class Home extends Controller {
    public function index() {
        // Calculate Revenue
        $lastMonth = date("n") - 1;
        $revenueOfLastMonth = $this->model("Order")->getRevenue($lastMonth);
        $totalRevenueLastMonth = 0;
        foreach($revenueOfLastMonth as $item) {
            $totalRevenueLastMonth += ($item['product_price'] * $item['order_details_quantity']);
        }

        // Last Month In Textual
        $lastMonthInTextual = '';
        switch($lastMonth) {
            case 1: $lastMonthInTextual = 'January'; break;
            case 2: $lastMonthInTextual = 'Febuary'; break;
            case 3: $lastMonthInTextual = 'March'; break;
            case 4: $lastMonthInTextual = 'April'; break;
            case 5: $lastMonthInTextual = 'May'; break;
            case 6: $lastMonthInTextual = 'Jun'; break;
            case 7: $lastMonthInTextual = 'July'; break;
            case 8: $lastMonthInTextual = 'August'; break;
            case 9: $lastMonthInTextual = 'Septemper'; break;
            case 10: $lastMonthInTextual = 'October'; break;
            case 11: $lastMonthInTextual = 'November'; break;
            case 12: $lastMonthInTextual = 'December'; break;
        }

        // Get Number Of Orders
        $numberOfOrders = count($this->model("Order")->getAllOrders());

        return $this->view("admin/index",[
            "content" => 'dashboard/index',
            "page" => 'home',
            "numberOfOrders" => $numberOfOrders,
            'totalRevenueLastMonth' => $totalRevenueLastMonth,
            'lastMonth' => $lastMonthInTextual
        ]);
    }
}