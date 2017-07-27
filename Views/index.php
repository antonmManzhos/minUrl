<?php
require_once("head.php");
?>

<body>
<form class="center" method="get" action="/router.php/IndexController/saveLink">
    <p>mUrl</p>
    <p>Enter your URL and press Minify to get a shortened link</p>
    <div class="maxWidth">
        <input type="text" name="fullLink" required>
        <button type="submit">Minify</button>
    </div>
    <div class="maxWidth">
        <input name="life_minutes" value="1" type="checkbox"/> <label>1 min</label> <input name="life_minutes"
                                                                                           value="10"
                                                                                           type="checkbox"/><label>10
            min</label>
        <input name="life_minutes" value="60" type="checkbox"/> <label>1 hour</label> <input name="life_minutes"
                                                                                             value="1440"
                                                                                             type="checkbox"/> <label>1
            day</label>
        <input name="life_minutes" value="null" type="checkbox"/> <label>unlimited</label>
    </div>
</form>
</body>
</html>