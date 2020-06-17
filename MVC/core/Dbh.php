<?php

class Dbh {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbName = "q21shop";

    protected function connect() {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
        $pdo = new PDO($dsn,$this->username,$this->password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false );
        return $pdo;
    }
}