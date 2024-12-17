<?php

require_once(__DIR__ . "/../controllers/RegisterController.php");
require_once(__DIR__ . '/../lib/auth.php');

Route::add('/register', function () {
    if (!isLoggedIn()) {
        require(__DIR__ . "/../views/pages/register.php");
    }
    else {
        header("Location: /");
        exit;
    }
});

Route::add('/register', function () {
    $registerController = new RegisterController();
    $errors = $registerController->create($_POST);
    if (is_null($errors)) {
        header("Location: /");
        exit;
    }
    else {
        require(__DIR__ . "/../views/pages/register.php");
    }
}, ["post"]);
