<?php
require_once(__DIR__ . '/../lib/auth.php');
require_once(__DIR__ . "/../controllers/QuestController.php");
require_once(__DIR__ . "/../controllers/UsersController.php");

Route::add('/', function () {
    $questController = new QuestController();
    $recommendedQuests = $questController->getRecommendedQuests();
    if (!isLoggedIn()) {
        require(__DIR__ . "/../views/pages/index.php");
    } else if (isUser()) {
        $user = $_SESSION['user'];
        $ongoingQuests = $questController->getOngoingByUser($user['id']);
        require(__DIR__ . "/../views/pages/index.php");
    }
    else {
        $userController = new UsersController();
        $user = $_SESSION['user'];
        $userCount = $userController->getUserCount();
        $publicQuestCount = $questController->getPublicQuestsCount();
        $ongoingQuestCount = $questController->getOngoingQuestCount();
        $completedQuestCount = $questController->getCompletedQuestCount();
        $top3Users = $userController->getTop3Users();
        require(__DIR__ . "/../views/pages/index_manager.php");
    }

});
