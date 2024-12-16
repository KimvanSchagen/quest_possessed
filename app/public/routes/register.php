<?php

require_once(__DIR__ . "/../controllers/RegisterController.php");

Route::add('/register', function () {
    require(__DIR__ . "/../views/pages/register.php");
});

Route::add('/register', function () {
    $registerController = new RegisterController();
    $errors = $registerController->create($_POST);
    if (is_null($errors)) {
        require(__DIR__ . "/../views/pages/index.php");
    }
    else {
        require(__DIR__ . "/../views/pages/register.php");
    }
}, ["post"]);
