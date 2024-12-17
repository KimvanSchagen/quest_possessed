<?php

require_once(__DIR__ . '/../lib/auth.php');

Route::add('/quests', function () {
    if (isManager()) {
        require(__DIR__ . "/../views/pages/quests.php");
    }
    else {
        header("Location: /");
        exit;
    }
});

Route::add('/quest/([a-z-0-9-]*)', function ($questId) {
    if (isManager()) {
        require(__DIR__ . "/../views/pages/quest.php");
    }
    else {
        header("Location: /");
    }
});

