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

    public function getAll()
    {
        return $this->questModel->getAll();
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

    public function getByUser($id)
    {
        return $this->questModel->getByUser($id);
    }

    public function getCompletedByUser($id)
    {
        return $this->questModel->getCompletedByUser($id);
    }

    public function getOngoingByUser($id)
    {
        return $this->questModel->getOngoingByUser($id);
    }

    public function getStagesByQuest($quest_id)
    {
        return $this->questModel->getStagesByQuest($quest_id);
    }

    public function getQuestStatusByUser($quest_id, $user_id)
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

    public function deleteQuest($quest_id)
    {
        $this->questModel->deleteStagesByQuest($quest_id);
        $this->questModel->deleteQuest($quest_id);
    }
}
