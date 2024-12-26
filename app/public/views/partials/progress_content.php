<h1>Progress</h1>
<div class="progress-bar">
    <progress value="<?php echo htmlspecialchars($user['current_points']) ?>" max="<?php echo $pointsNeeded ?>" class="achievementPoints"></progress>
    <p><?php echo htmlspecialchars($user['current_points']) ?> / <?php echo $pointsNeeded ?></p>
</div>

<div>
    <h3>Ongoing Quests</h3>
</div>

<div>
    <h3>Completed Quests</h3>
</div>