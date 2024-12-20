<h2>Quest: </h2>

<div class="quest_view">
    <form action="/quest/edit//quest/edit/?id=<?php echo urlencode($quest['quest_id']) ?>" method="post">
        <label>
            Name:
            <input type="text" name="quest_name" value="<?= htmlspecialchars($quest['name']) ?>">
        </label>
        <label>
            Description:
            <textarea name="quest_description"><?= htmlspecialchars($quest['description']) ?></textarea>
        </label>
        <label data-tooltip="Public quests will be visible for all adventurers" data-placement="bottom">
            <input name="public" type="checkbox" role="switch" />
            Public quest*
        </label>
        <br>
        <h2>Stages</h2>
        <?php foreach ($stages as $stage){
            ?>
            <fieldset>
                <label>
                    Name:
                    <input type="text" name="stage" value="<?= htmlspecialchars($stage['name']) ?>">
                </label>
                <br>
                <label>
                    Description:
                    <textarea name="stage"><?= htmlspecialchars($stage['description']) ?></textarea>
                </label>
                <br>
                <label>
                    Points:
                    <input type="number" name="stage" value="<?= htmlspecialchars($stage['achievement_points']) ?>">
                </label>
                <br>
                <label>
                    Delete:
                    <input type="checkbox" name="stage">
                </label>
            </fieldset>
            <?php
        } ?>

        <h2>Add New Stages</h2>
        <div id="new-stages"></div>
            <button type="button" onclick="addNewStage()">Add Stage</button>

        <br>
        <button type="submit">Save Changes</button>
    </form>
</div>

<script>
    let newStageIndex = 0;
    function addNewStage() {
        const container = document.getElementById('new-stages');
        const fieldset = document.createElement('fieldset');
        fieldset.innerHTML = `
                    <legend>New Stage</legend>
                    <label>
                        Name:
                        <input type="text" name="new_stages[\${newStageIndex}][name]">
                    </label>
                    <br>
                    <label>
                        Description:
                        <textarea name="new_stages[\${newStageIndex}][description]"></textarea>
                    </label>
                    <br>
                    <label>
                        Points:
                        <input type="number" name="new_stages[\${newStageIndex}][points]">
                    </label>
                `;
        container.appendChild(fieldset);
        newStageIndex++;
    }
</script>