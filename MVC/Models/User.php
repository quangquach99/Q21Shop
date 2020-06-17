<?php

class User extends Dbh {
    public function getAllUsers() {
        $sql = "SELECT * FROM `users`";
        $stmt = $this->connect()->query($sql);
        $users = $stmt->fetchAll();
        
        return $users;
    }

    public function getUsers($start, $quantity) {
        $sql = "SELECT * FROM `users` LIMIT :start, :quantity";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':start',$start);
        $stmt->bindParam(':quantity',$quantity);
        $stmt->execute();
        $result = $stmt->fetchAll();
        
        return $result;
    }

    public function getUserById($user_id) {
        $sql = "SELECT * FROM `users` WHERE `user_id` = :user_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':user_id',$user_id);
        $stmt->execute();
        $user = $stmt->fetch();

        return $user;
    }

    public function getUserByName($username) {
        $sql = "SELECT * FROM `users` WHERE `username` = :username";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':username',$username);
        $stmt->execute();
        $user = $stmt->fetch();

        return $user;
    }

    public function existedUser($username, $user_id) {
        $sql = "SELECT * FROM `users` WHERE `username` = :username 
                AND `user_id` != :user_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':username',$username);
        $stmt->bindParam(':user_id',$user_id);
        $stmt->execute();
        $result = $stmt->fetch();
        
        if(empty($result)) return false;
        return true;
    }

    public function store($request) {
        $sql = "INSERT INTO `users`
                (`username`,`password`,`user_fullname`,`user_email`,
                `user_phone`,`user_address`,`user_level`) 
                VALUES(:username,:password,:user_fullname,:user_email,
                :user_phone,:user_address,:user_level)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':username',$request['username']);
        $stmt->bindParam(':password',$request['password']);
        $stmt->bindParam(':user_fullname',$request['user_fullname']);
        $stmt->bindParam(':user_email',$request['user_email']);
        $stmt->bindParam(':user_phone',$request['user_phone']);
        $stmt->bindParam(':user_address',$request['user_address']);
        $stmt->bindParam(':user_level',$request['user_level']);
        $stmt->execute();

        return;
    }

    public function update($request) {
        $sql = "UPDATE `users`
                SET `username` = :username, `password` = :password,
                `user_fullname` = :user_fullname, `user_email` = :user_email,
                `user_phone` = :user_phone, `user_address` = :user_address,
                `user_level` = :user_level
                WHERE `user_id` = :user_id AND `reg_date` = :reg_date";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':username',$request['username']);
        $stmt->bindParam(':password',$request['password']);
        $stmt->bindParam(':user_fullname',$request['user_fullname']);
        $stmt->bindParam(':user_email',$request['user_email']);
        $stmt->bindParam(':user_phone',$request['user_phone']);
        $stmt->bindParam(':user_address',$request['user_address']);
        $stmt->bindParam(':user_level',$request['user_level']);
        $stmt->bindParam(':user_id',$request['user_id']);
        $stmt->bindParam(':reg_date',$request['reg_date']);
        $stmt->execute();

        return;
    }

    public function destroy($request) {
        $sql = "DELETE FROM `users` WHERE `user_id` = :user_id AND `reg_date` = :reg_date";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':user_id',$request['user_id']);
        $stmt->bindParam(':reg_date',$request['reg_date']);
        $stmt->execute();

        return;
    }

    public function validateUser($username) {
        $sql = "SELECT * FROM `users` WHERE
                `username` = :username";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $result = $stmt->fetch();
        
        return $result;
    }
}