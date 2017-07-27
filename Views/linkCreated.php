<?php
/**
 * Created by PhpStorm.
 * User: User111
 * Date: 26.07.2017
 * Time: 10:32
 */
session_start();
require_once("head.php");
?>
<form class="center" method="get" action="/router.php/LinkController/update">
    <p>mUrl</p>
    <p>Link created! Your URL is:</p>
    <div class="maxWidth">
        <input type="text" name="fullLink" required value="<?php echo $_SESSION['shortLink'] ?>">
    </div>
    <div class="maxWidth">
        <button type="submit">Rename</button>
        <a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/showStat' ?>" class="button">Go to Google</a>
    </div>
</form>
