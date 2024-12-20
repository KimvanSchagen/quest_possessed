<h1>Welcome, <?php echo $user['username'] ?>!</h1>
<div class="grid">
    <div>
        <div class="grid">
            <div class="home_card">
                <p>Total users: <?php echo $userCount; ?></p>
            </div>
            <div class="home_card">
                <p>Total public quests: <?php echo $publicQuestCount; ?></p>
            </div>
        </div>
        <div class="grid">
            <div class="home_card">
                <p>Total ongoing quests: <?php echo $ongoingQuestCount; ?></p>
            </div>
            <div class="home_card">
                <p>Total completed quests: <?php echo $completedQuestCount; ?></p>
            </div>
        </div>

    </div>
    <div>
        <h4>Top 3 users: </h4>
        <div class="grid">
            <?php
            foreach ($top3Users as $user) {
                ?>
                <div class="top_user_card">
                    <img src="<?php echo $user['profile_picture'] ?>">
                    <h3><?php echo $user['username'] ?></h3>
                    <p>Level: <?php echo $user['level'] ?></p>
                    <p>Points: <?php echo $user['current_points'] ?></p>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
