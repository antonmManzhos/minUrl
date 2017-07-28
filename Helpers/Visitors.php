<?php

namespace Helpers;

use Models\VisitorsModel;

class Visitors
{
    public static function getLocationIpAddress()
    {
        $apiKey = "a12a31d6fcd799de9d76ac0d156ae9f1f311b724";
        $link = "http://api.db-ip.com/v2/{$apiKey}/{$_SERVER['REMOTE_ADDR']}";
        $response = file_get_contents($link);
        session_start();
        if ($response) {
            $response = json_decode($response);
            require_once __DIR__ . '/../Models/VisitorsModel.php';
            VisitorsModel::saveVisitor($_SESSION['id'], $response->countryName, $response->city, ip2long($_SERVER['REMOTE_ADDR']));
        }
    }
}