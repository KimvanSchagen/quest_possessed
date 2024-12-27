<?php

require_once(__DIR__ . "/BaseModel.php");

class ProgressModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
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

    public function getCurrentStage($user_id, $quest_id) {
        $query = "SELECT uqp.quest_id, q.name AS quest_name, uqp.current_stage_id AS stage_id, s.name AS stage_name, s.description AS stage_description, s.achievement_points
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
}
