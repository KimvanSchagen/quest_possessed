<?php

require_once(__DIR__ . '/../lib/auth.php');

Route::add('/progress', function () {
    if (isUser()) {
        require(__DIR__ . "/../views/pages/progress.php");
    }
    else {
        header("Location: /");
    }
});
