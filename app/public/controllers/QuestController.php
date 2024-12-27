<?php

require_once(__DIR__ . "/../models/QuestModel.php");
require_once(__DIR__ . "/../models/ProgressModel.php");
require_once(__DIR__ . "/../assets/enums/QuestStatus.php");

class QuestController
{
    private $questModel;
    private $progressModel;

    public function __construct()
    {
        $this->questModel = new QuestModel();
        $this->progressModel = new ProgressModel();
    }

    public function getAll(): ?array
    {
        return $this->questModel->getAll();
    }

    public function getAllPublic() {
        return $this->questModel->getAllPublic();
    }

    public function getPublicQuestsCount()
    {
        return $this->questModel->getPublicQuestsCount();
    }

    public function getOngoingQuestCount()
    {
        return $this->questModel->getOngoingQuestsCount();
    }

    public function getCompletedQuestCount()
    {
        return $this->questModel->getCompletedQuestsCount();
    }

    public function getById($quest_id)
    {
        return $this->questModel->getById($quest_id);
    }

    public function getByUser($id): ?array
    {
        return $this->questModel->getByUser($id);
    }

    public function getCompletedByUser($id): ?array
    {
        return $this->questModel->getCompletedByUser($id);
    }

    public function getOngoingByUser($id): ?array
    {
        return $this->questModel->getOngoingByUser($id);
    }

    public function getStagesByQuest($quest_id): ?array
    {
        return $this->questModel->getStagesByQuest($quest_id);
    }

    public function getQuestStatusByUser($quest_id, $user_id): QuestStatus
    {
        if ($this->progressModel->isOngoingByUser($quest_id, $user_id)) {
            return QuestStatus::Ongoing;
        }
        if ($this->progressModel->isFinishedByUser($quest_id, $user_id)) {
            return QuestStatus::Completed;
        } else {
            return QuestStatus::Not_Started;
        }
    }

    public function deleteQuest($quest_id): void
    {
        $this->questModel->deleteStagesByQuest($quest_id);
        $this->questModel->deleteQuest($quest_id);
    }

    public function getRecommendedQuests() {
        $allPublicQuests = $this->getAllPublic();

        if (empty($allPublicQuests)) {
            return []; // Return an empty array if no public quests exist
        }

        shuffle($allPublicQuests); // Randomize the order of quests

        return array_slice($allPublicQuests, 0, 5);
    }
}
