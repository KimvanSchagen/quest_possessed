<h1>Quest Creation</h1>
<div>
    <h2>Create new Quest</h2>
    <a href="/createQuest" class="contrast">+</a>
</div>
<div>
    <h2>Quests created by you</h2>
    <div class="grid">
        <?php
        if (is_null($questsByUser)) {
            ?>
            <p>You have not created any quests yet.</p>
        <?php
        }
        else {
            foreach ($questsByUser as $quest) {
                ?>
                <div>
                    <p><?php echo htmlspecialchars($quest['name']) ?></p>
                </div>
        <?php
            }
        }
        ?>

    </div>
</div>


