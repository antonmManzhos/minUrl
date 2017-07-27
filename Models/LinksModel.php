<?php
/**
 * Created by PhpStorm.
 * User: User111
 * Date: 26.07.2017
 * Time: 21:45
 */

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
            $sql = "INSERT INTO `links` (`full_url`, `short_url`, `life_minutes`, `created_at`, `updated_at`) VALUES ('{$fullLink}', '{$shortLink}', {$life_minutes}, NULL, NULL)";
            $conn->query($sql);
        }
    }

    public static function findLink($shortLink)
    {
        require_once __DIR__ . '/../Helpers/getConnection.php';
        $conn = Connection::getConnection();
        if ($conn) {
            $sql = "SELECT * FROM `MinUrl`.`links` WHERE short_url LIKE '%{$shortLink}%' LIMIT 1";
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