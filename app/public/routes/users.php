<?php

Route::add('/users', function () {
    require(__DIR__ . "/../views/pages/users.php");
});

Route::add('/user/([a-z-0-9-]*)', function ($userId) {
    require(__DIR__ . "/../views/pages/user.php");
});
