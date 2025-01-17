<?php

require_once (__DIR__ . "/BaseModel.php");

class QuestModel extends BaseModel {
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll(): ?array
    {
        $query = "SELECT q.quest_id, q.name, q.description, q.creator_id, q.created_at, q.public, u.username
                    FROM quests q
                    INNER JOIN users u ON q.creator_id = u.id";
        $stmt = self::$pdo->prepare($query);

        $stmt->execute();

        $quests = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($quests) {
            return $quests;
        }
        else {
            return null;
        }
    }

    public function getAllPublic() {
        $query = "SELECT q.quest_id, q.name, q.description, q.creator_id, q.created_at, q.public, u.username
                    FROM quests q
                    INNER JOIN users u ON q.creator_id = u.id
                    WHERE public = 1";
        $stmt = self::$pdo->prepare($query);

        $stmt->execute();

        $quests = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($quests) {
            return $quests;
        }
        else {
            return null;
        }
    }

    public function getOngoingQuestsCount() {
        $query = "SELECT COUNT(*)
                    FROM user_quest_progress";
        $stmt = self::$pdo->prepare($query);
        $stmt->execute();

        $count = $stmt->fetch(PDO::FETCH_COLUMN);

        if ($count) {
            return $count;
        }
        else {
            return 0;
        }
    }

    public function getCompletedQuestsCount() {
        $query = "SELECT COUNT(*)
                    FROM user_quest_completion";
        $stmt = self::$pdo->prepare($query);
        $stmt->execute();

        $count = $stmt->fetch(PDO::FETCH_COLUMN);

        if ($count) {
            return $count;
        }
        else {
            return 0;
        }
    }

    public function getPublicQuestsCount() {
        $query = "SELECT COUNT(*)
                    FROM quests
                    WHERE public = 1";
        $stmt = self::$pdo->prepare($query);
        $stmt->execute();

        $count = $stmt->fetch(PDO::FETCH_COLUMN);

        if ($count) {
            return $count;
        }
        else {
            return 0;
        }
    }

    public function getById($quest_id) {
        $query = "SELECT quest_id, name, description, creator_id, created_at, public
                    FROM quests
                    WHERE quest_id LIKE :questid";
        $stmt = self::$pdo->prepare($query);
        $stmt->bindParam(':questid', $quest_id);

        $stmt->execute();

        $quest = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($quest) {
            return $quest;
        }
        else {
            return null;
        }
    }

    public function getByUser($id): ?array
    {
        $query = "SELECT quest_id, name, description, creator_id, created_at, public
                    FROM quests
                    WHERE creator_id LIKE :userId";
        $stmt = self::$pdo->prepare($query);
        $stmt->bindParam(':userId', $id);

        $stmt->execute();

        $quests = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($quests) {
            return $quests;
        }
        else {
            return null;
        }
    }

    public function getCompletedByUser($id): ?array
    {
        $query = "SELECT q.quest_id, q.name, q.description, q.creator_id, q.created_at, uqc.completed_at
                    FROM quests q
                    INNER JOIN user_quest_completion uqc ON q.quest_id = uqc.quest_id
                    WHERE uqc.user_id = :userId";
        $stmt = self::$pdo->prepare($query);
        $stmt->bindParam(':userId', $id);

        $stmt->execute();

        $quests = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($quests) {
            return $quests;
        }
        else {
            return null;
        }
    }

    public function getOngoingByUser($id): ?array
    {
        $query = "SELECT q.quest_id, q.name AS quest_name, q.description AS quest_description, q.creator_id,
                    q.created_at, uqp.current_stage_id, s.name AS current_stage_name, 
                    s.description AS current_stage_description, s.achievement_points AS stage_achievement_points
                    FROM user_quest_progress uqp
                    JOIN quests q ON uqp.quest_id = q.quest_id
                    JOIN stages s ON uqp.current_stage_id = s.stage_id
                    WHERE uqp.user_id = :userId";
        $stmt = self::$pdo->prepare($query);
        $stmt->bindParam(':userId', $id);

        $stmt->execute();

        $quests = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($quests) {
            return $quests;
        }
        else {
            return null;
        }
    }

    public function getStagesByQuest($quest_id): ?array
    {
        $query = "SELECT stage_id, quest_id, name, description, achievement_points
                    FROM stages
                    WHERE quest_id = :questId";
        $stmt = self::$pdo->prepare($query);
        $stmt->bindParam(':questId', $quest_id);

        $stmt->execute();

        $stages = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($stages) {
            return $stages;
        }
        else {
            return null;
        }
    }

    public function deleteStagesByQuest($quest_id): void
    {
        $query = "DELETE FROM stages WHERE quest_id = :questId";
        $stmt = self::$pdo->prepare($query);
        $stmt->bindParam(':questId', $quest_id);
        $stmt->execute();
    }

    public function deleteQuest($quest_id): void
    {
        $query = "DELETE FROM quests WHERE quest_id = :questId";
        $stmt = self::$pdo->prepare($query);
        $stmt->bindParam(':questId', $quest_id);
        $stmt->execute();
    }
}
