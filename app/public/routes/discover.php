<?php

require_once (__DIR__ . '/../controllers/QuestController.php');

Route::add('/discover', function () {
    $questController = new QuestController();

    $recommendedQuests = $questController->getRecommendedQuests();
    require(__DIR__ . "/../views/pages/discover.php");
});
