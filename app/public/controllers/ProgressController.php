<?php

require_once(__DIR__ . "/../models/ProgressModel.php");
require_once (__DIR__ . "/UsersController.php");
require_once (__DIR__ . "/../lib/Leveling.php");

class ProgressController
{
    private $progressModel;

    public function __construct()
    {
        $this->progressModel = new ProgressModel();
    }

    public function startQuest($questId) {
        $user = $_SESSION['user'];
        $stageId = $this->progressModel->getFirstStage($questId);
        $this->progressModel->startQuest($user['id'], $questId, $stageId);
    }

    public function getCurrentStage($questId) {
        $user = $_SESSION['user'];
        return $this->progressModel->getCurrentStage($user['id'], $questId);
    }

    public function completeStage($questId) {
        $userController = new UsersController();
        $user = $_SESSION['user'];
        $currentStage = $this->getCurrentStage($questId);

        $this->addAchievementPoints($user, $currentStage['achievement_points']);

        if ($this->progressModel->nextStageExists($questId, $currentStage['stage_id'])) {
            $nextStageId = $this->progressModel->getNextStageId($questId, $currentStage['stage_id']);
            $this->progressModel->updateCurrentStage($user['id'], $questId, $nextStageId);
            $user = $userController->getUserById($user['id']);
            $_SESSION['user'] = $user;
            return $this->getCurrentStage($questId);
        }
        else {
            $this->progressModel->deleteQuestOngoing($user['id'], $questId);
            $this->progressModel->addQuestCompleted($user['id'], $questId);
            $user = $userController->getUserById($user['id']);
            $_SESSION['user'] = $user;
            return null;
        }
    }

    private function addAchievementPoints($user, $points): void
    {
        $levelingSystem = new LevelingSystem();
        $totalPoints = $points + $user['current_points'];
        $levelUpInfo = $levelingSystem->willLevelUp($user['level'], $totalPoints);

        if ($levelUpInfo['levelUp']) {
            $nextLevel = $user['level'] + 1;
            $achievementPoints = $levelUpInfo['remainingPoints'];
            $this->progressModel->updateLevel($user['id'], $nextLevel);
            $this->progressModel->updateAchievementPoints($user['id'], $achievementPoints);
        } else {
            $this->progressModel->updateAchievementPoints($user['id'], $totalPoints);
        }
    }
}