<?php
require_once(__DIR__ . '/../lib/auth.php');

Route::add('/about', function () {
    require(__DIR__ . "/../views/pages/about.php");
});
