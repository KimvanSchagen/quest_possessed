<?php

Route::add('/users', function () {
    if (isManager()) {
        require(__DIR__ . "/../views/pages/users.php");
    } else {
        header("Location: /");
        exit;
    }
});