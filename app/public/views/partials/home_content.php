<h1>Home</h1>

<h2>Welcome to Quest Possessed</h2>
<p>Embark on a journey of discovery and growth with Quest Possessed - your gateway to exciting quests and endless possibilities.</p>

<div class="recommended">
    <h2>Featured Quests</h2>
    <?php
    foreach ($recommendedQuests as $quest) {
        ?>
        <h3><?php echo htmlspecialchars($quest['name']) ?></h3>
        <p><?php echo htmlspecialchars($quest['description']) ?></p>
        <a href="/quest?id=<?php echo htmlspecialchars($quest['quest_id']) ?>">View</a>
        <?php
    }
    ?>
</div>


<?php
if (isLoggedIn()) {
    ?>
    <h2>Quests in Progress</h2>
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
<?php
}
?>

