<?php

require_once (__DIR__ . "/../models/UsersModel.php");

class UsersController {
    private $usersModel;
    public function __construct()
    {
        $this->usersModel = new UsersModel();
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

    public function getUsersOngoingQuests($user_id) {
        return $this->usersModel->getUsersOngoingQuests($user_id);
    }

    public function getUsersCompletedQuests($user_id) {
        return $this->usersModel->getUsersCompletedQuests($user_id);
    }

    public function getUsersCreatedQuests($user_id) {
        return $this->usersModel->getUsersCompletedQuest($user_id);
    }
}
