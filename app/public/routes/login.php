<?php

require_once (__DIR__ . "/../controllers/LoginController.php");
require_once(__DIR__ . '/../lib/auth.php');

Route::add('/login', function () {
    if (!isLoggedIn()) {
        require(__DIR__ . "/../views/pages/login.php");
    }
    else {
        header("Location: /");
        exit;
    }
});

Route::add('/login', function () {
    $loginController = new LoginController();
    $errors = $loginController->login($_POST);
    if (is_null($errors)) {
        header("Location: /");
        exit;
    }
    else {
        require(__DIR__ . "/../views/pages/login.php");
    }

}, ["post"]);

Route::add('/logout', function () {
    unset($_SESSION["user"]);
    header('Location: /');
});
