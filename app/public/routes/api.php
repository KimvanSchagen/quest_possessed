<?php

require_once (__DIR__ . "/../controllers/UsersController.php");
require_once (__DIR__ . "/../controllers/QuestController.php");

Route::add('/api/users', function() {
    $usersController = new UsersController();
    $users = $usersController->getAll();
    echo json_encode($users);
});

Route::add('/api/quests', function () {
    $questController = new QuestController();
    $quests = $questController->getAll();
    echo json_encode($quests);
});

Route::add('/api/edit-username', function () {
    $userController = new UsersController();
    $userController->editUsername();
}, "POST");

Route::add('/api/edit-email', function () {
    $userController = new UsersController();
    $userController->editEmail();
}, "POST");

Route::add('/api/edit-password', function () {
    $userController = new UsersController();
    $userController->editPassword();
}, "POST");
