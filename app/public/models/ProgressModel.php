<?php

require_once(__DIR__ . "/BaseModel.php");

class ProgressModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function startQuest($userId, $questId, $stageId) {
        $query = "INSERT INTO user_quest_progress (user_id, quest_id, current_stage_id)
                    VALUES (:userId, :questId, :stageId)";
        $stmt = self::$pdo->prepare($query);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':questId', $questId);
        $stmt->bindParam(':stageId', $stageId);

        $stmt->execute();
    }

    public function isOngoingByUser($quest_id, $user_id)
    {
        $query = "SELECT user_id, quest_id, current_stage_id
                    FROM user_quest_progress
                    WHERE quest_id = :questId AND user_id = :userId";
        $stmt = self::$pdo->prepare($query);
        $stmt->bindParam(':questId', $quest_id);
        $stmt->bindParam(':userId', $user_id);

        $stmt->execute();

        $progress = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($progress) {
            return $progress;
        } else {
            return null;
        }
    }

    public function isFinishedByUser($quest_id, $user_id)
    {
        $query = "SELECT user_id, quest_id, completed_at
                    FROM user_quest_completion
                    WHERE quest_id = :questId AND user_id = :userId";
        $stmt = self::$pdo->prepare($query);
        $stmt->bindParam(':questId', $quest_id);
        $stmt->bindParam(':userId', $user_id);

        $stmt->execute();

        $progress = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($progress) {
            return $progress;
        } else {
            return null;
        }
    }

    public function getFirstStage($questId) {
        $query = "SELECT MIN(stage_id)
                    FROM stages
                    WHERE quest_id = :questId;";
        $stmt = self::$pdo->prepare($query);
        $stmt->bindParam(':questId', $questId);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_COLUMN);
    }

    public function getCurrentStage($user_id, $quest_id) {
        $query = "SELECT uqp.quest_id, q.name AS quest_name, uqp.current_stage_id AS stage_id, s.name AS stage_name,
                    s.description AS stage_description, s.achievement_points
                    FROM user_quest_progress uqp
                    JOIN quests q ON uqp.quest_id = q.quest_id
                    JOIN stages s ON uqp.current_stage_id = s.stage_id
                    WHERE uqp.user_id = :userId AND uqp.quest_id = :questId";
        $stmt = self::$pdo->prepare($query);
        $stmt->bindParam(':userId', $user_id);
        $stmt->bindParam(':questId', $quest_id);

        $stmt->execute();

        $currentStage = $stmt->fetch(PDO::FETCH_ASSOC);

        if($currentStage) {
            return $currentStage;
        }
        else {
            return 0;
        }
    }

    public function nextStageExists($questId, $stageId) {
        $query = "SELECT EXISTS (
                    SELECT 1
                    FROM stages
                    WHERE quest_id = :quest_id AND stage_id > :current_stage_id
                    ) AS has_next_stage;";
        $stmt = self::$pdo->prepare($query);
        $stmt->bindParam(':quest_id', $questId);
        $stmt->bindParam(':current_stage_id', $stageId);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_COLUMN);
    }

    public function getNextStageId($questId, $currentStageId) {
        $query = "SELECT stage_id
                    FROM stages
                    WHERE quest_id = :quest_id AND stage_id > :current_stage_id
                    ORDER BY stage_id ASC
                    LIMIT 1;";
        $stmt = self::$pdo->prepare($query);
        $stmt->bindParam(':quest_id', $questId);
        $stmt->bindParam(':current_stage_id', $currentStageId);

        $stmt->execute();

        $nextStageId = $stmt->fetch(PDO::FETCH_COLUMN);

        if($nextStageId) {
            return $nextStageId;
        }
        else {
            return 0;
        }
    }

    public function updateCurrentStage($userId, $questId, $stageId): void
    {
        $query = "UPDATE user_quest_progress SET current_stage_id = :stageId
                    WHERE user_id = :userId AND quest_id = :questId";
        $stmt = self::$pdo->prepare($query);
        $stmt->bindParam(':stageId', $stageId);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':questId', $questId);
        $stmt->execute();
    }

    public function updateLevel($userId, $level): void
    {
        $query = "UPDATE users SET level = :level WHERE id = :userId";
        $stmt = self::$pdo->prepare($query);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':level', $level);
        $stmt->execute();
    }

    public function updateAchievementPoints($userId, $points): void
    {
        $query = "UPDATE users SET current_points = :points WHERE id = :userId";
        $stmt = self::$pdo->prepare($query);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':points', $points);
        $stmt->execute();
    }

    public function deleteQuestOngoing($userId, $questId): void
    {
        $query = "DELETE FROM user_quest_progress
                    WHERE user_id = :userId AND quest_id = :questId;";
        $stmt = self::$pdo->prepare($query);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':questId', $questId);
        $stmt->execute();
    }

    public function addQuestCompleted($userId, $questId): void
    {
        $query = "INSERT INTO user_quest_completion (user_id, quest_id)
                    VALUES (:userId, :questId)";
        $stmt = self::$pdo->prepare($query);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':questId', $questId);
        $stmt->execute();
    }
}
