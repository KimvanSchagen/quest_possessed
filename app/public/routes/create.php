<?php
require_once(__DIR__ . '/../lib/auth.php');

Route::add('/create', function () {
    if (isLoggedIn()) {
        require(__DIR__ . "/../views/pages/create.php");
    }
    else {
        header("Location: /");
        exit;
    }
});
