<?php

require_once(__DIR__ . '/../lib/auth.php');
require_once (__DIR__ . '/../lib/Leveling.php');
require_once (__DIR__ . '/../controllers/QuestController.php');

Route::add('/progress', function () {
    if (isUser()) {
        $levelingSystem = new LevelingSystem();
        $questController = new QuestController();

        $user = $_SESSION['user'];
        $pointsNeeded = $levelingSystem->getPointsNeeded($user['level']);

        $ongoingQuests = $questController->getOngoingByUser($user['id']);
        require(__DIR__ . "/../views/pages/progress.php");
    } else {
        header("Location: /");
    }
});
