<?php

namespace Models;

use Helpers\Connection;

class LinksModel
{

    /**
     * @param $fullLink
     * @param $shortLink
     * @param $life_minutes
     */
    public static function saveLink($fullLink, $shortLink, $life_minutes)
    {
        require_once __DIR__ . '/../Helpers/getConnection.php';
        $conn = Connection::getConnection();
        if ($conn) {
            $sql = "INSERT INTO `links` (`full_url`, `short_url`, `life_minutes`) VALUES ('{$fullLink}', '{$shortLink}', {$life_minutes})";
            $conn->query($sql);
            return $conn->insert_id;
        }
    }

    public static function findLink($shortLink)
    {
        require_once __DIR__ . '/../Helpers/getConnection.php';
        $conn = Connection::getConnection();
        if ($conn) {
            $sql = "SELECT * FROM `MinUrl`.`links` WHERE short_url LIKE '{$shortLink}' LIMIT 1";
            $res = $conn->query($sql);

            if ($res->num_rows > 0) {
                return $res->fetch_object();
            }
        }
    }

    public static function updateLink($idLink, $shortLink)
    {
        require_once __DIR__ . '/../Helpers/getConnection.php';
        $conn = Connection::getConnection();
        if ($conn) {
            $sql = "UPDATE links SET short_url = '{$shortLink}' WHERE id = {$idLink}";
            $conn->query($sql);
        }
    }
}