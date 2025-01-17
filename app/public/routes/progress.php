<?php

require_once(__DIR__ . '/../lib/auth.php');
require_once (__DIR__ . '/../lib/Leveling.php');
require_once (__DIR__ . '/../controllers/QuestController.php');
require_once (__DIR__ . '/../controllers/ProgressController.php');

Route::add('/progress', function () {
    if (isUser()) {
        $levelingSystem = new LevelingSystem();
        $questController = new QuestController();

        $user = $_SESSION['user'];
        $pointsNeeded = $levelingSystem->getPointsNeeded($user['level']);

        $ongoingQuests = $questController->getOngoingByUser($user['id']);
        $completedQuests = $questController->getCompletedByUser($user['id']);
        require(__DIR__ . "/../views/pages/progress.php");
    } else {
        header("Location: /");
    }
});

Route::add('/quest/progress', function () {
    if (isLoggedIn()) {
        $progressController = new ProgressController();
        $questId = $_GET['id'] ?? null;

        if (!$questId) {
            header("Location: /");
            exit;
        }
        $currentStage = $progressController->getCurrentStage($questId);
        require(__DIR__ . "/../views/pages/quest_progress.php");
    } else {
        header("Location: /");
    }
});

Route::add('/quest/progress/start', function () {
    if (isLoggedIn()) {
        $progressController = new ProgressController();
        $questId = $_GET['id'] ?? null;

        $progressController->startQuest($questId);
        header("Location: /quest/progress/?id=$questId");
    } else {
        header("Location: /");
    }
    exit;
});

Route::add('/quest/progress/nextStage', function () {
    if (isLoggedIn()) {
        $progressController = new ProgressController();
        $questId = $_GET['id'] ?? null;

        if (!$questId) {
            header("Location: /");
            exit;
        }
        $nextStage = $progressController->completeStage($questId);
        if (is_null($nextStage)) {
            header("Location: /quest/?id={$questId}");
        }
        else {
            header("Location: /quest/progress?id={$questId}");
        }
    } else {
        header("Location: /");
    }
    exit;
});
