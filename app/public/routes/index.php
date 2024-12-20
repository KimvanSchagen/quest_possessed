<?php
require_once(__DIR__ . '/../lib/auth.php');
require_once(__DIR__ . "/../controllers/QuestController.php");
require_once (__DIR__ . "/../controllers/UsersController.php");

Route::add('/', function () {
    if (!isManager()) {
        require(__DIR__ . "/../views/pages/index.php");
    }
    else {
        $userController = new UsersController();
        $questController = new QuestController();
        $user = $_SESSION['user'];
        $userCount = $userController->getUserCount();
        $publicQuestCount = $questController->getPublicQuestsCount();
        $ongoingQuestCount = $questController->getOngoingQuestCount();
        $completedQuestCount = $questController->getCompletedQuestCount();
        $top3Users = $userController->getTop3Users();
        require(__DIR__ . "/../views/pages/index_manager.php");
    }

});
