<?php

Route::add('/quests', function () {
    require(__DIR__ . "/../views/pages/quests.php");
});

Route::add('/quest/([a-z-0-9-]*)', function ($questId) {
    require(__DIR__ . "/../views/pages/quest.php");
});

