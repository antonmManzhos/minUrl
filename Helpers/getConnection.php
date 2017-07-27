<?php

namespace Helpers;

const DB_SERVER = "46.46.73.228";
const DB_USER = "root";
const DB_PASSWORD = "";
const DB_BASE = "MinUrl";
class Connection
{
    public static function getConnection()
    {
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_BASE);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

}

?>