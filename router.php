<?php
/**
 * Created by PhpStorm.
 * User: User111
 * Date: 26.07.2017
 * Time: 20:56
 */
if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != null) {
    $route = $_SERVER['REQUEST_URI'];
    switch ($route) {
        case strpos($route, 'IndexController') > 0:
            require_once('Controllers\IndexController.php');
            $indexController = new \Controllers\IndexController();
            if (strpos($route, 'saveLink')) {
                $indexController->saveLink();
            } else {
                $indexController->index();
            }
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
            require_once('Controllers\IndexController.php');
            $indexController = new Controllers\IndexController();
            if (\Helpers\FindLink::checkLink($route)) {
                require_once('Helpers\Visitors.php');
                \Helpers\Visitors::getLocationIpAddress();
                $indexController->redirectToOriginalLink();
            }
            $indexController->index();
            break;
    }
}