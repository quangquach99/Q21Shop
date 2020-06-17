<?php

class Product extends Dbh {
    public function getAllProducts() {
        $sql = "SELECT `product_id`,`product_code`,`product_name`,`product_price`,`product_state`,
        `product_category`,`product_image`,`product_highlight`,`product_quantity`,`product_details`,
        `product_description`,`products`.`reg_date`,`category_id`,`category_name` 
        FROM `products`,`categories` WHERE `categories`.`category_id` = `product_category`";
        $stmt = $this->connect()->query($sql);
        $products = $stmt->fetchAll();

        return $products;
    }
    public function getProducts($start, $quantity) {
        $sql = "SELECT `product_id`,`product_code`,`product_name`,`product_price`,`product_state`,
        `product_category`,`product_image`,`product_highlight`,`product_quantity`,`product_details`,
        `product_description`,`products`.`reg_date`,`category_id`,`category_name` 
        FROM `products`,`categories` WHERE `categories`.`category_id` = `product_category` LIMIT :start, :quantity";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':start',$start);
        $stmt->bindParam(':quantity',$quantity);
        $stmt->execute();
        $result = $stmt->fetchAll();
        
        return $result;
    }

    public function getProductByCode($product_code) {
        $sql = "SELECT * FROM `products` WHERE `product_code` = :product_code";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':product_code',$product_code);
        $product = $stmt->fetch();

        return $product;
    }

    public function getProductById($product_id) {
        $sql = "SELECT * FROM `products` WHERE
                `product_id` = :product_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':product_id',$product_id);
        $stmt->execute();
        $product = $stmt->fetch();

        return $product;
    }

    public function store($request) {
        $sql = "INSERT INTO `products` (`product_code`, `product_name`,
                `product_price`, `product_state`, `product_category`,
                `product_image`, `product_highlight`, `product_quantity`,
                `product_details`, `product_description`) 
                VALUES(:product_code,:product_name,:product_price,1,
                :product_category,:product_image,:product_highlight,:product_quantity,
                :product_details,:product_description)";
        $stmt = $this->connect()->prepare($sql);

        $stmt->bindParam(':product_category',$request['product_category']);
        $stmt->bindParam(':product_code',$request['product_code']);
        $stmt->bindParam(':product_name',$request['product_name']);
        $stmt->bindParam(':product_price',$request['product_price']);
        $stmt->bindParam(':product_highlight',$request['product_highlight']);
        $stmt->bindParam(':product_quantity',$request['product_quantity']);
        $stmt->bindParam(':product_details',$request['product_details']);
        $stmt->bindParam(':product_description',$request['product_description']);
        $stmt->bindParam(':product_image',$request['product_image']);
        $stmt->execute();

        return;
    }

    public function checkExistedProductCode($product_code,$product_id) {
        $sql = "SELECT * FROM `products` WHERE `product_code` = :product_code
                AND `product_id` != :product_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':product_code',$product_code);
        $stmt->bindParam(':product_id',$product_id);
        $stmt->execute();

        $product = $stmt->fetch();

        return $product;
    }

    public function update($request) {
        $sql = "UPDATE `products` SET `product_category` = :product_category,
        `product_code` = :product_code, `product_name` = :product_name,
        `product_price` = :product_price, `product_highlight` = :product_highlight,
        `product_quantity` = :product_quantity, `product_details` = :product_details,
        `product_description` = :product_description, `product_image` = :product_image
        WHERE `product_id` = :product_id AND `reg_date` = :reg_date";
        $stmt = $this->connect()->prepare($sql);

        $stmt->bindParam(':product_category',$request['product_category']);
        $stmt->bindParam(':product_code',$request['product_code']);
        $stmt->bindParam(':product_name',$request['product_name']);
        $stmt->bindParam(':product_price',$request['product_price']);
        $stmt->bindParam(':product_highlight',$request['product_highlight']);
        $stmt->bindParam(':product_quantity',$request['product_quantity']);
        $stmt->bindParam(':product_details',$request['product_details']);
        $stmt->bindParam(':product_description',$request['product_description']);
        $stmt->bindParam(':product_image',$request['product_image']);
        $stmt->bindParam(':product_id',$request['product_id']);
        $stmt->bindParam(':reg_date',$request['reg_date']);

        $stmt->execute();

        return;
    }

    public function destroy($request) {
        $sql = "DELETE FROM `products` WHERE `product_id` = :product_id AND `reg_date` = :reg_date";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':product_id',$request['product_id']);
        $stmt->bindParam(':reg_date',$request['reg_date']);
        $stmt->execute();

        return;
    }

    public function getHighlightedProducts() {
        $sql = "SELECT `product_id`,`product_name`,`product_price`,`product_state`,
        `product_image`,`product_quantity`,`product_details`,
        `product_description` FROM `products` WHERE `product_highlight` = 1";
        $stmt = $this->connect()->query($sql);
        $result = $stmt->fetchAll();

        return $result;
    }

    public function getNewProducts($month) {
        $sql = "SELECT `product_id`,`product_name`,`product_price`,`product_state`,
        `product_image`,`product_quantity`,`product_details`,
        `product_description` FROM `products` WHERE MONTH(`reg_date`) = :month";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':month',$month);
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result;
    }
}