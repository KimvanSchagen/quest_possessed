<?php

require_once (__DIR__ . "/../models/ProgressModel.php");

class ProgressController {
    private $progressModel;
    public function __construct()
    {
        $this->progressModel = new ProgressModel();
    }
}