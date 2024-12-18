<?php

require_once(__DIR__ . '/../lib/auth.php');
require_once (__DIR__ . '/../lib/Leveling.php');
require_once(__DIR__ . "/../controllers/QuestController.php");

Route::add('/profile', function () {
    if (isLoggedIn()) {
        $questController = new QuestController();
        $levelingSystem = new LevelingSystem();

        $user = $_SESSION['user'];

        $pointsNeeded = $levelingSystem->getPointsNeeded($user['level']);

        $createdQuests = 0;
        if ($questController->getByUser($user['id'])) {
            $createdQuests = count($questController->getByUser($user['id']));
        }
        $completedQuests = 0;
        if ($questController->getCompletedByUser($user['id'])) {
            $completedQuests = count($questController->getCompletedByUser($user['id']));
        }
        $ongoingQuests = 0;
        if ($questController->getOngoingByUser($user['id'])) {
            $ongoingQuests = count($questController->getOngoingByUser($user['id']));
        }
        require(__DIR__ . "/../views/pages/profile.php");
    }
    else {
        header("Location: /");
        exit;
    }
});
