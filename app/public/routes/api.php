<?php

require_once (__DIR__ . "/../controllers/UsersController.php");

Route::add('/api/users', function() {
    $usersController = new UsersController();
    $users = $usersController->getAll();
    echo json_encode($users);
});
