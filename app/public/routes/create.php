<?php
require_once(__DIR__ . '/../lib/auth.php');
require_once(__DIR__ . "/../controllers/QuestController.php");

Route::add('/create', function () {
    if (isLoggedIn()) {
        $questController = new QuestController();
        $user = $_SESSION['user'];
        $questsByUser = $questController->getByUser($user['id']);
        require(__DIR__ . "/../views/pages/create.php");
    }
    else {
        header("Location: /");
        exit;
    }
});

Route::add('/createQuest', function () {
    if (isLoggedIn()) {
        require ( __DIR__ . "/../views/pages/createQuest.php");
    }
    else {
        header("Location: /");
        exit;
    }
});

Route::add('/create-quest', function () {
    $quest = $_POST;
    require (__DIR__ . "/../views/pages/createStages.php");
}, ["post"]);
