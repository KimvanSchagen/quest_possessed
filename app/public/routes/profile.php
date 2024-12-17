<?php

require_once(__DIR__ . '/../lib/auth.php');

Route::add('/profile', function () {
    if (isLoggedIn()) {
        require(__DIR__ . "/../views/pages/profile.php");
    }
    else {
        header("Location: /");
        exit;
    }
});
