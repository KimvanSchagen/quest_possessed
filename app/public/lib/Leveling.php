<?php

class LevelingSystem {
    private $baseThreshold;
    private $multiplier;

    public function __construct($baseThreshold = 50, $multiplier = 1.5) {
        $this->baseThreshold = $baseThreshold;
        $this->multiplier = $multiplier;
    }

    // Calculate total points needed for a given level
    public function getPointsNeeded($level) {
        return ceil($this->baseThreshold * pow($this->multiplier, $level - 1));
    }

    // Check if the user will level up
    public function willLevelUp($level, $totalPoints) {
        $currentThreshold = $this->getPointsNeeded($level);
        if ($totalPoints >= $currentThreshold) {
            return [
                "levelUp" => true,
                "remainingPoints" => $totalPoints - $currentThreshold
            ];
        } else {
            return [
                "levelUp" => false,
                "pointsNeeded" => $currentThreshold - $totalPoints
            ];
        }
    }
}