<?php

require_once(__DIR__ . "/../models/UsersModel.php");

class UsersController
{
    private $usersModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
    }

    public function getAll(): ?array
    {
        return $this->usersModel->getAll();
    }

    public function getUserCount()
    {
        return $this->usersModel->getUserCount();
    }

    public function getUserById($id)
    {
        return $this->usersModel->getUserById($id);
    }

    public function getUserByUsername($username)
    {
        return $this->usersModel->getUserByUsername($username);
    }

    public function getUserByEmail($email)
    {
        return $this->usersModel->getUserByEmail($email);
    }

    public function exists($field, $value): bool
    {
        return $this->usersModel->exists($field, $value);
    }

    public function editUsername()
    {
        $currentUser = $_SESSION['user'];

        $input = file_get_contents('php://input');
        $newUsername = json_decode($input, true);

        if (empty($newUsername)) {
            echo json_encode(['error' => 'Enter a username']);
            exit();
        }
        if ($this->exists("username", $newUsername)) {
            echo json_encode(['error' => 'Username already taken']);
            exit;
        }

        $this->usersModel->editUsername($currentUser['id'], $newUsername);
        echo json_encode(['success' => 'Username updated successfully']);
        $user = $this->getUserById($currentUser['id']);
        $_SESSION['user'] = $user;
    }

    public function editEmail() {
        $currentUser = $_SESSION['user'];

        $input = file_get_contents('php://input');
        $newEmail = json_decode($input, true);

        if (empty($newEmail)) {
            echo json_encode(['error' => 'Enter an email']);
            exit();
        }
        if ($this->exists("email", $newEmail)) {
            echo json_encode(['error' => 'Email already taken']);
            exit;
        }

        $this->usersModel->editEmail($currentUser['id'], $newEmail);
        echo json_encode(['success' => 'Email updated successfully']);
        $user = $this->getUserById($currentUser['id']);
        $_SESSION['user'] = $user;
    }

    public function editProfilePicture($userId, $newPicture)
    {
        if (!is_null($this->getUserById($userId))) {
            $this->usersModel->editProfilePicture($userId, $newPicture);
            $user = $this->getUserById($userId);
            $_SESSION['user'] = $user;
        }
    }

    public function getTop3Users()
    {
        return $this->usersModel->getTop3Users();
    }
}
