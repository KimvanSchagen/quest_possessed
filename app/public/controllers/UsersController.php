<?php

require_once (__DIR__ . "/../models/UsersModel.php");

class UsersController {
    private $usersModel;
    public function __construct()
    {
        $this->usersModel = new UsersModel();
    }

    public function getUserCount() {
        return $this->usersModel->getUserCount();
    }

    public function getUserById($id) {
        return $this->usersModel->getUserById($id);
}

    public function getUserByUsername($username)
    {
        return $this->usersModel->getUserByUsername($username);
    }

    public function getUserByEmail($email) {
        return $this->usersModel->getUserByEmail($email);
    }

    public function exists($field, $value): bool
    {
        return $this->usersModel->exists($field, $value);
    }

    public function editUsername($userId, $newUsername) {
        $errors = [];
        if ($this->exists('username', $newUsername)) {
            $errors['username'] = "Username already exists. Please choose a different one.";
        }
        if (!empty($errors)) {
            return $errors; // Return errors to the view
        }

        $this->usersModel->editUsername($userId, $newUsername);
        $user = $this->getUserByUsername($newUsername);

        $_SESSION['user'] = $user;

        return null;
    }

    public function editProfilePicture($userId, $newPicture) {
        if (!is_null($this->getUserById($userId))) {
            $this->usersModel->editProfilePicture($userId, $newPicture);
            $user = $this->getUserById($userId);
            $_SESSION['user'] = $user;
        }
    }

    public function getTop3Users() {
        return $this->usersModel->getTop3Users();
    }
}
