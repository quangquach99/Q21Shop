<?php

class Category extends Dbh {
    public function getAllCategories() {
        $sql = "SELECT * FROM `categories`";
        $stmt = $this->connect()->query($sql);
        $categories = $stmt->fetchAll();

        return $categories;
    }

    public function lastInsertId() {
        $last_id = $this->connect()->lastInsertId();

        return 14;
    }

    public function checkExistedCategory($category_name, $category_parent) {
        $sql = "SELECT * FROM `categories` WHERE 
        `category_name` = :category_name AND `category_parent` = :category_parent";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':category_name', $category_name);
        $stmt->bindParam(':category_parent', $category_parent);
        $stmt->execute();
        $category = $stmt->fetch();

        return $category;
    }

    public function checkExistedCategoryForUpdate($category_name, $category_parent, $category_id) {
        $sql = "SELECT * FROM `categories` WHERE 
        `category_name` = :category_name AND `category_parent` = :category_parent
        AND `category_id` != :category_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->bindParam(':category_name', $category_name);
        $stmt->bindParam(':category_parent', $category_parent);
        $stmt->execute();
        $category = $stmt->fetch();

        return $category;
    }

    public function create($request) {
        $sql = "INSERT INTO `categories`(`category_name`,`category_parent`)
                VALUES(:category_name,:category_parent)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':category_name',$request['category_name']);
        $stmt->bindParam(':category_parent',$request['category_parent']);
        $stmt->execute();

        return;
    }

    public function update($request) {
        $sql = "UPDATE `categories` SET 
                `category_name` = :category_name, `category_parent` = :category_parent
                WHERE `category_id` = :category_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':category_id',$request['category_id']);
        $stmt->bindParam(':category_name',$request['category_name']);
        $stmt->bindParam(':category_parent',$request['category_parent']);
        $stmt->execute();

        return;
    }

    public function getCategoryById($category_id) {
        $sql = "SELECT * FROM `categories` WHERE `category_id` = :category_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':category_id',$category_id);
        $stmt->execute();
        $category = $stmt->fetch();

        return $category;
    }

    public function destroy($request) {
        $sql = "DELETE FROM `categories` WHERE `category_id` = :category_id AND `reg_date` = :reg_date";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':category_id',$request['category_id']);
        $stmt->bindParam(':reg_date',$request['reg_date']);
        $stmt->execute();

        return;
    }
}