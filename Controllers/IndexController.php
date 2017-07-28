<?php
/**
 * Created by PhpStorm.
 * User: User111
 * Date: 26.07.2017
 * Time: 20:56
 */

namespace Controllers;

use \Helpers;
use \Models;

class IndexController
{
    public function index()
    {
        header("Location: Views/index.php");
    }

    public function saveLink()
    {
        if (isset($_GET['fullLink']) && isset($_GET['life_minutes'])) {
            $fullLink = htmlspecialchars($_GET['fullLink']);
            $life_minutes = $_GET['life_minutes'];
            require_once __DIR__ . '/../Helpers/generateShortUrl.php';
            $shortLink = Helpers\ShortUrl::generateRandomString();
            require_once __DIR__ . '/../Models/LinksModel.php';
            session_start();
            $_SESSION['id'] = Models\LinksModel::saveLink($fullLink, $shortLink, $life_minutes);
            $_SESSION['shortLink'] = $shortLink;
            $url = "Location: http://" . $_SERVER['HTTP_HOST'] . "/link";
            header($url);
        }
    }
    public function redirectToOriginalLink(){
        session_start();
        header("Location: http://" . $_SESSION['full_url']);
        die();
    }
}