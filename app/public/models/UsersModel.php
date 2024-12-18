<?php

require_once (__DIR__ . "/BaseModel.php");

class UsersModel extends BaseModel {
    public function __construct() {
        parent::__construct();
    }

    public function getUserById($id) {
        $query = "SELECT id, username, email, password, permissions, date_created, level, current_points, profile_picture
                    FROM users
                    WHERE id LIKE :id";
        $stmt = self::$pdo->prepare($query);
        $stmt->bindParam(':id', $id);

        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return $user;
        }
        else {
            return null;
        }
    }

    public function getUserByUsername($username) {
        $query = "SELECT id, username, email, password, permissions, date_created, level, current_points, profile_picture
                    FROM users
                    WHERE username LIKE :username";
        $stmt = self::$pdo->prepare($query);
        $stmt->bindParam(':username', $username);

        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return $user;
        }
        else {
            return null;
        }
    }

    public function getUserByEmail($email) {
        $query = "SELECT id, username, email, password, permissions, date_created, level, current_points, profile_picture
                    FROM users
                    WHERE email LIKE :email";
        $stmt = self::$pdo->prepare($query);
        $stmt->bindParam(':email', $email);

        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return $user;
        }
        else {
            return null;
        }
    }

    public function exists($field, $value): bool
    {
        $query = "SELECT COUNT(*) FROM users WHERE $field = :value";
        $stmt = self::$pdo->prepare($query);
        $stmt->bindParam(':value', $value);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    public function editUsername($userId, $newUsername) {

    }

    public function editProfilePicture($userId, $newPicture): void
    {
        $query = "UPDATE users SET profile_picture = :picture WHERE id = :id";
        $stmt = self::$pdo->prepare($query);
        $stmt->bindParam(':picture', $newPicture);
        $stmt->bindParam(':id', $userId);
        $stmt->execute();
    }
}
