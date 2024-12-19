<?php

require_once(__DIR__ . '/../lib/auth.php');
require_once (__DIR__ . "/../assets/enums/QuestStatus.php");
require_once (__DIR__ . '/../controllers/QuestController.php');
require_once (__DIR__ . '/../controllers/UsersController.php');

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
        $user = $_SESSION['user'];

        if (!$questId) {
            header("Location: /");
            exit;
        }
        $questController = new QuestController();
        $quest = $questController->getById($questId);
        if ($quest['creator_id'] != $user['id']) {
            if ($quest['public'] == 0) {
                header("Location: /");
            }
            $isOwner = false;
            $userController = new UsersController();
            $owner = $userController->getUserById($quest['creator_id']);
        }
        else {
            $isOwner = true;
        }
        $status = $questController->getQuestStatusByUser($questId, $user['id']);
        $stages = $questController->getStagesByQuest($quest['quest_id']);
        require(__DIR__ . "/../views/pages/quest.php");
    }
    else {
        header("Location: /");
    }


});

