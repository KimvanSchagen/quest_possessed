<?php

require_once (__DIR__ . "/BaseModel.php");

class RegisterModel extends BaseModel {
    public function __construct() {
        parent::__construct();
    }

    public function create($account) {
        $query = "insert into users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = self::$pdo->prepare($query);
        $stmt->execute($account);
    }
}
