<?php
$user = $_SESSION['user'];
?>
<div>
    <div class="grid">
        <div>
            <img src="/assets/img/login_register_image.jpg" alt="Welcome">
        </div>
        <div>
            <h1>
                <?php echo htmlspecialchars($user['username'] ?? 'User'); ?>
            </h1>
            <p>
                Adventurer ID: <?php echo htmlspecialchars($user['id'] ?? '-'); ?>
            </p>
            <p>
                Date registered: <?php echo htmlspecialchars($user['date_created'] ?? '-'); ?>
            </p>
        </div>
        <div>
            <img src="/assets/img/login_register_image.jpg" alt="Welcome">
        </div>
    </div>
    <div class="grid">
        <div>
            <p>Ongoing quests</p>
            <p>0</p>
        </div>
        <div>
            <div>
                <p>Completed quests: </p>
            </div>
            <div>
                <p>Created quests: </p>
            </div>
        </div>
    </div>
</div>
