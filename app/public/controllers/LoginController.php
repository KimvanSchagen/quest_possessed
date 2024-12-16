<?php
require_once (__DIR__ . "/UsersController.php");

class LoginController {
    private $usercontroller;
    public function __construct() {
        $this->usercontroller = new UsersController();
    }

    public function login($credentials) {
        $errors = [];
        if (!$this->usercontroller->exists('email', $credentials['email'])) {
            $errors['email'] = "Email doesn't exist. Please choose a different email, or register an account.";
        }
        else {
            $user = $this->usercontroller->getUserByEmail($credentials['email']);
            if (!password_verify($credentials['password'], $user['password'])) {
                $errors['password'] = "Password is incorrect. Please try again.";
            }
            else {
                $_SESSION['user'] = $user;
            }
        }

        if (!empty($errors)) {
            return $errors;
        }

        return null;
    }
}
