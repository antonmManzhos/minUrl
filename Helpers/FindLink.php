<?php

namespace Helpers;

use Models\LinksModel;
use DateTime;
use DateInterval;

class FindLink
{
    public static function searchShortLink($shortLink)
    {
        $shortLink = preg_replace('/[^\p{L}\p{N}\s]/u', '', $shortLink);
        require_once __DIR__ . '/../Models/LinksModel.php';
        return LinksModel::findLink($shortLink);
    }

    public static function isLinkAlive($link)
    {
        if ($link->life_minutes) {
            $endDate = new DateTime($link->created_at);

            $endDate->add(new DateInterval("P" . $link->life_minutes * 60 . "M")); // adds 674165 secs
            $currentDate = new DateTime("now");
            if ($endDate > $currentDate) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }

    public static function checkLink($shortLink)
    {
        $link = self::searchShortLink($shortLink);
        if ($link) {
            if (\Helpers\FindLink::isLinkAlive($link)) {
                session_start();
                $_SESSION['id'] = $link->id;
                $_SESSION['shortLink'] = $link->short_url;
                $_SESSION['full_url'] = $link->full_url;
                return true;
            }
        }
        return false;
    }
}