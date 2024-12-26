<div>
    <div class="profile-container">
        <div class="profile-picture">
            <img src="<?php echo $user['profile_picture'] ?>" alt="Profile">
        </div>
        <div class="profile-info">
            <h1><?php echo htmlspecialchars($user['username'] ?? 'User'); ?></h1>
            <p>Adventurer ID: <?php echo htmlspecialchars($user['id'] ?? '-'); ?></p>
            <p>Date registered: <?php echo htmlspecialchars(date('d M Y', strtotime($user['date_created'] ?? '1970-01-01'))); ?></p>
            <details class="dropdown">
                <summary role="button">
                    Edit
                </summary>
                <ul>
                    <li><button onclick="openEditUsername()">Change username</button></li>
                    <li><button onclick="openEditProfilePicture()">Change profile picture</button></li>
                    <li><button onclick="openEditEmail()">Change email</button></li>
                    <li><button onclick="openEditPassword()">Change password</button></li>
                </ul>
            </details>
        </div>
        <div class="profile-level">
            <div class="level-circle">Level <?php echo htmlspecialchars($user['level'] ?? '-'); ?></div>
        </div>
    </div>
    <div class="progress-bar">
        <progress value="<?php echo $user['current_points'] ?>" max="<?php echo $pointsNeeded ?>" class="achievementPoints"></progress>
        <p><?php echo $user['current_points'] ?> / <?php echo $pointsNeeded ?></p>
    </div>
    <div class="grid">
        <div class="profile-card">
            <h2>Ongoing quests:</h2>
            <h2><?php echo htmlspecialchars($ongoingQuests ?? '0'); ?></h2>
        </div>
        <div>
            <div class="profile-card">
                <p>Completed quests: <?php echo htmlspecialchars($completedQuests ?? '0'); ?></p>
            </div>
            <div class="profile-card">
                <p>Created quests: <?php echo htmlspecialchars($createdQuests ?? '0'); ?></p>
            </div>
        </div>
    </div>
</div>

<script src="/assets/js/dialog.js"></script>



