<?php

require_once (__DIR__ . "/../models/RegisterModel.php");

class RegisterController {
    private $registermodel;
    public function __construct()
    {
        $this->registermodel = new RegisterModel();
    }

    public function create($account) {
        $errors = [];

        if (!$this->registermodel->isUnique('username', $account['username'])) {
            $errors['username'] = "Username already exists. Please choose a different one.";
        }

        // Check if the email is unique
        if (!$this->registermodel->isUnique('email', $account['email'])) {
            $errors['email'] = "Email already exists. Please use a different email address.";
        }

        if (!empty($errors)) {
            return $errors; // Return errors to the view
        }

        // Hash the password
        $account['password'] = password_hash($account['password'], PASSWORD_DEFAULT);

        // Create the account
        $this->registermodel->create($account);

        // Save the user in the session
        $_SESSION['user'] = [
            'username' => $account['username'],
            'email' => $account['email']
        ];

        return null;
    }
}
