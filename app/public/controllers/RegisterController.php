<?php

require_once (__DIR__ . "/../models/RegisterModel.php");
require_once (__DIR__ . "/UsersController.php");

class RegisterController {
    private $registermodel;
    private $userscontroller;
    public function __construct()
    {
        $this->registermodel = new RegisterModel();
        $this->userscontroller = new UsersController();
    }

    public function create($account): ?array
    {
        $errors = [];

        if ($this->userscontroller->exists('username', $account['username'])) {
            $errors['username'] = "Username already exists. Please choose a different one.";
        }

        // Check if the email is unique
        if ($this->userscontroller->exists('email', $account['email'])) {
            $errors['email'] = "Email already exists. Please use a different email address.";
        }

        if (!empty($errors)) {
            return $errors; // Return errors to the view
        }

        // Hash the password
        $account['password'] = password_hash($account['password'], PASSWORD_DEFAULT);

        // Create the account
        $this->registermodel->create($account);

        $user = $this->userscontroller->getUserByUsername($account['username']);

        // Save the user in the session
        $_SESSION['user'] = $user;

        return null;
    }
}
