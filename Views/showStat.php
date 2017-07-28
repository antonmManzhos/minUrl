<?php
/**
 * Created by PhpStorm.
 * User: User111
 * Date: 27.07.2017
 * Time: 18:36
 * **/

session_start();
$statistic = $_SESSION['$statistic'];
function js_array($statistic)
{
    $str = "";
    foreach ($statistic as $item => $value) {
        $str .= "['{$item}',{$value}],";
    }
    return mb_substr($str, 0, -1);;
}

?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load("current", {packages: ["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            <?php echo js_array($statistic)?>
        ]);

        var options = {
            title: 'Countries',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
    }
</script>
</head>
<body>
<div id="piechart_3d" style="width: 900px; height: 500px;"></div>
</body>
