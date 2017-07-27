<?php
/**
 * Created by PhpStorm.
 * User: User111
 * Date: 26.07.2017
 * Time: 21:01
 */

namespace Controllers;

use Helpers;
use Models;

class LinkController
{
    public function index()
    {
        header("Location: Views/linkCreated.php");
    }

    public function update()
    {
        if (isset($_GET['fullLink'])) {
            $newLink = htmlspecialchars($_GET['fullLink']);
            session_start();
            $shortLink = $_SESSION['shortLink'];
            require_once('Helpers\FindLink.php');
            $oldLink = Helpers\FindLink::searchShortLink($shortLink);
            if ($oldLink) {
                Models\LinksModel::updateLink($oldLink->id, $newLink);
                $_SESSION['shortLink'] = $newLink;
            }
            header("Location: /router.php/LinkController/update");
        }
    }
}