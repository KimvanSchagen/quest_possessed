<div id="progress_page">
    <h1>Progress</h1>
    <div class="progress-bar">
        <h4>Achievement points</h4>
        <progress value="<?php echo htmlspecialchars($user['current_points']) ?>" max="<?php echo $pointsNeeded ?>" class="achievementPoints"></progress>
        <p><?php echo htmlspecialchars($user['current_points']) ?> / <?php echo $pointsNeeded ?></p>
    </div>

    <div id="ongoing_quests">
        <h3>Ongoing Quests</h3>
        <?php
        if (is_null($ongoingQuests)) {
            ?>
            <p>You have no ongoing quests.</p>
            <?php
        }
        else {
            foreach ($ongoingQuests as $ongoingQuest) {
                ?>
                <h4><?php echo htmlspecialchars($ongoingQuest['quest_name']) ?></h4>
                <p>Current stage: <?php echo htmlspecialchars($ongoingQuest['current_stage_name']) ?></p>
                <a href="/quest?id=<?php echo urlencode($ongoingQuest['quest_id']) ?>"><button>Open</button></a>
                <hr>
                <?php
            }
        } ?>
    </div>

    <div id="completed_quests">
        <h3>Completed Quests</h3>
    </div>
</div>
