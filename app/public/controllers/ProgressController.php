<?php

require_once(__DIR__ . "/../models/ProgressModel.php");

class ProgressController
{
    private $progressModel;

    public function __construct()
    {
        $this->progressModel = new ProgressModel();
    }

    public function getCurrentStage($questId) {
        $user = $_SESSION['user'];
        return $this->progressModel->getCurrentStage($user['id'], $questId);
    }
}