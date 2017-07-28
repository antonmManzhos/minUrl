<?php

namespace Controllers;
use Models\VisitorsModel;

class StatsController {
    public function ShowStat() {
        session_start();
        require_once __DIR__ . '/../Models/VisitorsModel.php';
        $statistic = VisitorsModel::loadVisitorsByUrlId($_SESSION['id']);
        $_SESSION['$statistic'] = $statistic;
        header("Location: Views/showStat.php");
    }
}