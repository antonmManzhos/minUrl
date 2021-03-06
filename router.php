<?php

if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != null) {
    $route = $_SERVER['REQUEST_URI'];
    require_once('Controllers\IndexController.php');
    switch ($route) {
        case strpos($route, 'IndexController/saveLink') > 0:
            $indexController = new \Controllers\IndexController();
            $indexController->saveLink();
            break;
        case strpos($route, '/link'):
            require_once('Controllers\LinkController.php');
            $linkController = new \Controllers\LinkController();
            $linkController->index();
            break;
        case strpos($route, 'LinkController/update') > 0:
            require_once('Controllers\LinkController.php');
            $linkController = new \Controllers\LinkController();
            $linkController->update();
            break;
        case strpos($route, '/showStat'):
            require_once('Controllers\StatsController.php');
            $linkController = new \Controllers\StatsController();
            $linkController->ShowStat();
            break;
        default:
            require_once('Helpers\FindLink.php');
            $indexController = new Controllers\IndexController();
            if (\Helpers\FindLink::checkLink($route)) {
                require_once('Helpers\Visitors.php');
                \Helpers\Visitors::getLocationIpAddress();
                $indexController->redirectToOriginalLink();
                break;
            }
            $indexController->index();
            break;
    }
}