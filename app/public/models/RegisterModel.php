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

    public function isUnique($field, $value) {
        $query = "SELECT COUNT(*) FROM users WHERE $field = :value";
        $stmt = self::$pdo->prepare($query);
        $stmt->bindParam(':value', $value);
        $stmt->execute();
        return $stmt->fetchColumn() == 0; // Returns true if count is 0, meaning unique
    }
}
