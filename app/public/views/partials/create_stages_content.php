<div>
    <h1><?php echo htmlspecialchars($quest['name'], ENT_QUOTES, 'UTF-8'); ?></h1>
    <p><?php echo nl2br(htmlspecialchars($quest['description'], ENT_QUOTES, 'UTF-8')); ?></p>

    <form method="POST" action="save_quest.php">
        <div id="stages-container">
            <div class="stage-template" style="display: none;">
                <div class="stage">
                    <h3>Stage <span class="stage-number"></span></h3>
                    <label for="stage-name">Name:</label>
                    <input type="text" name="stages[][name]" placeholder="Stage name" required>

                    <label for="stage-description">Description:</label>
                    <textarea name="stages[][description]" placeholder="Stage description" required></textarea>

                    <button type="button" class="remove-stage">Remove Stage</button>
                </div>
            </div>
        </div>

        <button type="button" id="add-stage">Add Stage</button>
        <button type="submit">Save Quest</button>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const stagesContainer = document.getElementById("stages-container");
        const addStageButton = document.getElementById("add-stage");
        const stageTemplate = document.querySelector(".stage-template").cloneNode(true);
        stageTemplate.style.display = "block";

        let stageCount = 0;

        addStageButton.addEventListener("click", () => {
            stageCount++;
            const newStage = stageTemplate.cloneNode(true);
            newStage.querySelector(".stage-number").textContent = stageCount;

            newStage.querySelector(".remove-stage").addEventListener("click", () => {
                stagesContainer.removeChild(newStage);
                updateStageNumbers();
            });

            stagesContainer.appendChild(newStage);
            updateStageNumbers();
        });

        function updateStageNumbers() {
            const stages = stagesContainer.querySelectorAll(".stage");
            stages.forEach((stage, index) => {
                stage.querySelector(".stage-number").textContent = index + 1;
            });
        }
    });
</script>
