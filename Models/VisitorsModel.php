<?php

namespace Models;

use Helpers\Connection;

class VisitorsModel
{

    /**
     * @param $id_url
     * @param $Country
     * @param $City
     */
    public static function saveVisitor($id_url, $Country, $City, $ipAddress)
    {
        require_once __DIR__ . '/../Helpers/getConnection.php';
        $conn = Connection::getConnection();
        if ($conn) {
            $ipAddress = ip2long($ipAddress);
            //$temp = long2ip($ipAddress);
            $sql = "INSERT INTO `visitors` (`id_url`, `Country`, `City`, `ip_address`) VALUES ({$id_url}, '{$Country}', '{$City}', '{$ipAddress}')";
            $conn->query($sql);
        }
    }

    public static function loadVisitorsByUrlId($id_url)
    {
        require_once __DIR__ . '/../Helpers/getConnection.php';
        $conn = Connection::getConnection();
        if ($conn) {
            $sql = "SELECT DISTINCT Country from `visitors` WHERE id_url = {$id_url}";
            $conn->query($sql);
            $arrayCountries = array();
            if ($result = $conn->query($sql)) {
                while ($obj = $result->fetch_object()) {
                    array_push($arrayCountries, $obj->Country);
                }
            }
            $arrayResult = array();
            foreach ($arrayCountries as $Country) {
                $sql = "SELECT COUNT(DISTINCT(ip_address)) as COUNT FROM visitors WHERE id_url = {$id_url} AND Country LIKE '{$Country}'";
                if ($result = $conn->query($sql)) {
                    $obj = $result->fetch_object();
                    $arrayResult += ["$Country" => "$obj->COUNT"];
                }
            }
            return $arrayResult;
        }
    }
}