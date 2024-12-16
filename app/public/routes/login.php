<?php

require_once (__DIR__ . "/../controllers/LoginController.php");

Route::add('/login', function () {
    require(__DIR__ . "/../views/pages/login.php");
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
