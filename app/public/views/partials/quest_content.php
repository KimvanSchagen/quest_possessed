<script src="/assets/js/dialog.js"></script>

<h2>Quest: </h2>

<div class="quest_view">
    <h1><?php echo htmlspecialchars($quest['name']) ?></h1>
    <div class="grid">
        <p><em>Created on: <?php echo htmlspecialchars(date('d-m-Y', strtotime($quest['created_at']))) ?></em></p>
        <?php
        if (!$isOwner) {
            ?>
            <p>Created by: <?php echo htmlspecialchars($owner['username']) ?></p>
            <?php
        } else {
            ?>
            <p>
                <?php
                if ($quest['public']) {
                    ?>
                    <i class="fa-solid fa-users"></i>
                    <?php

                } else {
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
    if ($status == QuestStatus::Ongoing) {
    ?>
    <button>Continue Quest</button>
    <?php
        }
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
    if (!isManager()) {
        ?>
        <h3>Status: <?php echo htmlspecialchars($status->value) ?></h3>
    <?php
    }
    ?>
    <div class="grid">
        <?php
        if ($status == QuestStatus::Not_Started) {
            ?>
            <button>Start Quest</button>
            <?php
        }
        if (isManager() || $isOwner) {
            ?>
            <a href="/quest/edit/?id=<?php echo urlencode($quest['quest_id']) ?>">
                <button>Edit Quest</button>
            </a>
            <button onclick="openDeleteQuest()">Delete Quest</button>
            <?php
        }
        ?>
    </div>
</div>

<dialog id="deleteQuest">
    <article>
        <header>
            <button onclick="closeDeleteQuest()" aria-label="Close" rel="prev"></button>
            <p>
                <strong>Delete Quest</strong>
            </p>
        </header>
        <p>Are you sure you want to delete this quest?</p>
        <div class="grid">
            <a href="/quest/delete?id=<?php echo urlencode($quest['quest_id']) ?>">
                <button>Yes</button>
            </a>
            <button onclick="closeDeleteQuest()">No</button>
        </div>
    </article>
</dialog>
