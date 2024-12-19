<div class="grid">
    <h2>Quest: </h2>
    <button class="secondary">< Back</button>
</div>

<div id="quest_overview">
    <h1><?php echo htmlspecialchars($quest['name']) ?></h1>
    <div class="grid">
        <p><em>Created on: <?php echo htmlspecialchars(date('d-m-Y', strtotime($quest['created_at']))) ?></em></p>
        <?php
        if (!$isOwner) {
            ?>
            <p>Created by: <?php echo htmlspecialchars($owner['username']) ?></p>
            <?php
        }
        else {
            ?>
            <p>
                <?php
                if ($quest['public']) {
                    ?>
                    <i class="fa-solid fa-users"></i>
                    <?php

                }
                else {
                    ?>
                    <i class="fa-solid fa-lock"></i>
                <?php
                }
                echo htmlspecialchars($quest['public'] ? 'Public' : 'Private')
                ?> quest
            </p>
            <?php
        }
        ?>
    </div>
    <p><?php echo htmlspecialchars($quest['description']) ?></p>
    <hr>
    <?php
    foreach ($stages as $stage) {
        ?>
        <h1><?php echo htmlspecialchars($stage['name']) ?></h1>
        <hr>
        <p><?php echo htmlspecialchars($stage['description']) ?></p>
        <hr>
        <p>Quest Rewards:</p>
        <div class="achievement_points" data-tooltip="Achievement points" data-placement="right">
            <img src="/assets/img/achievement_point.jpg" alt="Achievement_Point">
            <p><?php echo htmlspecialchars($stage['achievement_points']) ?></p>
        </div>
        <hr>
    <?php
    }
    ?>
    <h3>Status: <?php echo htmlspecialchars($status->value) ?></h3>
    <div class="grid">
        <?php
        if ($status == QuestStatus::Not_Started) {
            ?>
            <button>Start Quest</button>
        <?php
        }
        if ($status == QuestStatus::Ongoing) {
            ?>
            <button>Continue Quest</button>
            <?php
        }
        if (isManager() || $isOwner) {
            ?>
            <button>Edit Quest</button>
            <button>Delete Quest</button>
        <?php
        }
        ?>
    </div>
</div>