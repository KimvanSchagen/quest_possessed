<h1><?php echo htmlspecialchars($currentStage['quest_name']) ?></h1>
<h2><?php echo htmlspecialchars($currentStage['stage_name']) ?></h2>
<p><?php echo htmlspecialchars($currentStage['stage_description']) ?></p>
<p>Quest Rewards:</p>
<div class="achievement_points" data-tooltip="Achievement points" data-placement="right">
    <img src="/assets/img/achievement_point.jpg" alt="Achievement_Point">
    <p><?php echo htmlspecialchars($currentStage['achievement_points']) ?></p>
</div>

<a href="/quest/progress/nextStage"><button>Complete Stage</button></a>