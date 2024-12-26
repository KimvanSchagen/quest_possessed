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

Route::add('/api/check-username', function () {
    $userController = new UsersController();
    $userController->editUsername();
}, "POST");

Route::add('/api/check-email', function () {
    $userController = new UsersController();
    $userController->editEmail();
}, "POST");
