<?php

require_once(__DIR__ . '/../lib/auth.php');
require_once (__DIR__ . '/../controllers/QuestController.php');

Route::add('/quests', function () {
    if (isManager()) {
        require(__DIR__ . "/../views/pages/quests.php");
    }
    else {
        header("Location: /");
        exit;
    }
});

Route::add('/quest', function () {
    if (isLoggedIn()) {
        $questId = $_GET['id'] ?? null;
        $returnRoute = $_GET['returnRoute'] ?? '/';
        $user = $_SESSION['user'];

        if (!$questId) {
            header("Location: /");
            exit;
        }
        $questController = new QuestController();
        $quest = $questController->getById($questId);
        if ($quest['creator_id'] != $user['id'] && $quest['public'] == 0) {
            //error
        }
        require(__DIR__ . "/../views/pages/quest.php");
    }
    else {
        header("Location: /");
    }


});

