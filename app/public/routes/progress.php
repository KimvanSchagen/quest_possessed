<?php

require_once(__DIR__ . '/../lib/auth.php');
require_once (__DIR__ . '/../lib/Leveling.php');

Route::add('/progress', function () {
    if (isUser()) {
        $levelingSystem = new LevelingSystem();

        $user = $_SESSION['user'];
        $pointsNeeded = $levelingSystem->getPointsNeeded($user['level']);
        require(__DIR__ . "/../views/pages/progress.php");
    } else {
        header("Location: /");
    }
});
