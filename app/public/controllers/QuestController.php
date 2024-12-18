<?php

require_once (__DIR__ . "/../models/QuestModel.php");

class QuestController {
    private $questModel;
    public function __construct() {
        $this->questModel = new QuestModel();
    }

    public function getAll() {
        return $this->questModel->getAll();
    }

    public function getByUser($id) {
        return $this->questModel->getByUser($id);
    }

    public function getCompletedByUser($id) {
        return $this->questModel->getCompletedByUser($id);
    }

    public function getOngoingByUser($id) {
        return $this->questModel->getOngoingByUser($id);
    }
}
