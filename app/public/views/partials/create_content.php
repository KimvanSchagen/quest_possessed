<div id="quest_creation">
    <h1>Quest Creation</h1>
    <p>
        Unleash your creativity and design your own personalized quest. Whether you're passionate about leaning,
        exploring new hobbies, or achieving personal milestones, creating a quest allows you to st your own challenges
        and embark on a journey of self-discovery.
    </p>
    <div>
        <h2>Create a new Quest</h2>
        <a id="create_new_quest" href="/createQuest">+</a>
    </div>
    <div id="quests_by_you">
        <h2>Quests created by you</h2>
        <?php
        if (is_null($questsByUser)) {
            ?>
            <p>You have not created any quests yet.</p>
            <?php
        }
        else {
            ?>
            <table class="striped">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Date created</th>
                    <th scope="col">Public</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($questsByUser as $quest) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo htmlspecialchars($quest['name']) ?></th>
                        <td><?php echo htmlspecialchars(date('d-m-Y', strtotime($quest['created_at']))) ?></td>
                        <td><?php echo htmlspecialchars($quest['public'] ? 'Yes' : 'No') ?></td>
                        <td>
                            <a href="/quest?id=<?php echo urlencode($quest['quest_id']) ?>"><button>View</button></a>
                        </td>
                    </tr>
                <?php
                }
                ?>

                </tbody>
            </table>
        <?php
        }
        ?>
    </div>
</div>



