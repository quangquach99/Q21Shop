<?php

class Order extends Dbh {
    public function getAllOrders() {
        $sql = "SELECT * FROM `orders`";
        $stmt = $this->connect()->query($sql);
        $result = $stmt->fetchAll();

        return $result;
    }

    public function getAllUnprocessedOrders() {
        $sql = "SELECT * FROM `orders` WHERE `order_state` = 0";
        $stmt = $this->connect()->query($sql);
        $orders = $stmt->fetchAll();

        return $orders;
    }

    public function getUnprocessedOrders($start, $quantity) {
        $sql = "SELECT * FROM `orders` WHERE `order_state` = 0 LIMIT :start, :quantity";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':start',$start);
        $stmt->bindParam(':quantity',$quantity);
        $stmt->execute();
        $result = $stmt->fetchAll();
        
        return $result;
    }

    public function getAllProcessedOrders() {
        $sql = "SELECT * FROM `orders` WHERE `order_state` = 1";
        $stmt = $this->connect()->query($sql);
        $orders = $stmt->fetchAll();

        return $orders;
    }

    public function getProcessedOrders($start, $quantity) {
        $sql = "SELECT * FROM `orders` WHERE `order_state` = 1 LIMIT :start, :quantity";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':start',$start);
        $stmt->bindParam(':quantity',$quantity);
        $stmt->execute();
        $result = $stmt->fetchAll();
        
        return $result;
    }

    public function getOrderDetails($order_id) {
        $sql = "SELECT * FROM `orders`,`order_details`,`products`
                WHERE `orders`.`order_id` = `order_details`.`order_id`
                AND `orders`.`order_id` = :order_id
                AND `order_details`.`product_id` = `products`.`product_id`";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':order_id',$order_id);
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result;
    }

    public function checkValidOrderId($order_id) {
        $sql = "SELECT * FROM `orders` WHERE `order_state` = 0 AND `order_id` = :order_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':order_id',$order_id);
        $stmt->execute();
        $result = $stmt->fetch();
        
        return $result;
    }

    public function processed($order_id) {
        $sql = "UPDATE `orders` SET `order_state` = 1 WHERE `order_id` = :order_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':order_id',$order_id);
        $stmt->execute();
        
        return;
    }

    public function getRevenue($month) {
        $sql = "SELECT * FROM `order_details`,`products`
                WHERE `order_details`.`product_id` = `products`.`product_id`
                AND MONTH(`order_details`.`reg_date`) = :month";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':month',$month);
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result;
    }
}