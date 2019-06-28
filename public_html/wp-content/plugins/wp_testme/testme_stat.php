<div class="wrap">
    <h2>Статистика тестов</h2>

<?php

// Статистика 1 теста
if ($_GET['testme_id']) {

//Получаем ИД теста
$testme_id = $_GET['testme_id'];
//Проверяем, есть ли строка с таким ИД
$testme_test_details = $wpdb->get_row("SELECT ID, test_name, test_start_day, test_done
    FROM {$wpdb->prefix}testme_tests WHERE ID = {$testme_id}");

//Если нет такого теста
if (!$testme_test_details->ID)
print "Теста с таким ID не найдено.";
// А если есть, то редактируем его
else {
}

    print "<p>Статистика для теста с ID: {$testme_id}</p>";
    print "<h3>{$testme_test_details->test_name}</h3>";
    print "<p>Дата публикации: {$testme_test_details->test_start_day}</p>";

    //Получаем данные по ответам:
    $testme_stats = $wpdb->get_results(" SELECT result_title, result_text, result_image , COUNT(" . $wpdb->prefix . "testme_stats.Id) AS NUM
FROM " . $wpdb->prefix . "testme_results
LEFT JOIN " . $wpdb->prefix . "testme_stats ON " . $wpdb->prefix . "testme_results.Id = " . $wpdb->prefix . "testme_stats.stat_result
WHERE " . $wpdb->prefix . "testme_results.result_test_relation = " . $testme_id . "
GROUP BY " . $wpdb->prefix . "testme_results.Id
ORDER BY " . $wpdb->prefix . "testme_results.Id");

    //
        if ($testme_stats) {
?>
<table class="widefat" style="width:600px;">
<thead>
	<tr>
		<th scope="col" style="text-align:right; width:320px">Вариант ответа</th>
		<th scope="col" style="text-align:center; width:40px;">##</th>
		<th scope="col" style="width:200px">График</th>
		<th scope="col" style="width:40px">%</th>
	</tr>
</thead>
<tbody id="the-list">
<?php

// массив с цветами для графиков:
$testme_colors = array ('#f59fbc','#8dcff4','#facd8a','#a4e0b7','#c8a46d','#c0bfe4','#fff99d','#77cbac','#bc515f','#43b7e5');

$i=0;
        foreach ($testme_stats as $stat) {
            
            //выбираем, что печатать в заголовке...
            if ($stat->result_title != '') $testme_title = $stat->result_title;
            else if ($stat->result_text != '') {
                if (function_exists(mb_strtolower) ) $testme_title = mb_substr ($stat->result_text, 0 , 70 )." ...";
                else $testme_title = substr ($stat->result_text, 0 , 70 )." ...";
                }
            else $testme_title = "<img src=\"".$stat->result_image."\" alt=\"\" />";

            //Если тест уже проходили хотя бы 1 раз
            if ($testme_test_details->test_done > 0) {
            $testme_percent = round ($stat->NUM * 100 / $testme_test_details->test_done);
            $testme_graph_width = 180 * $testme_percent/100 + 5;
            }
            // и если еще ни разу не проходили
            else {
                $testme_percent = "-";
                $testme_graph_width = 5;
            }

            $class = ('alternate' == $class) ? '' : 'alternate';
            print "<tr class='$class'>\n";
            print "<td style=\"text-align:right;\">{$testme_title}</td>";
            print "<td style=\"text-align:center;\">{$stat->NUM}</td>";
            print "<td style=\"vertical-align:middle;\"><div style=\"width:".$testme_graph_width."px; height:10px; background-color:".$testme_colors[$i].";\"></div></td>";
            print "<td>".$testme_percent."%</td>";
            print "</tr>";

        $i++;
        if ($i>9) $i=0;
        }
unset ($i);
?>
</tbody>
</table>

<p><a href="index.php?page=wp_testme/testme_stat.php">Вернуться к таблице со списком тестов.</a></p>

<h3>Статистика по пользователям</h3>

<table class="widefat" style="width:600px;">
<thead>
	<tr>
		<th scope="col" style="text-align:right; width:30px">№</th>
		<th scope="col" style="text-align:center; width:350px;">Пользователь</th>
		<th scope="col" style="text-align:center; width:60px">Итог</th>
		<th scope="col" style="text-align:center; width:160px">Дата</th>
	</tr>
</thead>
<tbody id="the-list">
<?php
// Получаем N последних прошедших
$testme_limit = get_option("testme_stat_per_page");
if (!$testme_limit || $testme_limit <1) $testme_limit = 50;

    $testme_stats = $wpdb->get_results(" SELECT stat_time, stat_result, stat_user, stat_ip, stat_points, display_name
FROM " . $wpdb->prefix . "testme_stats
LEFT JOIN " . $wpdb->prefix . "users ON " . $wpdb->prefix . "testme_stats.stat_user = " . $wpdb->prefix . "users.ID
WHERE " . $wpdb->prefix . "testme_stats.stat_test_relation = " . $testme_id . "
ORDER BY stat_time DESC LIMIT ".$testme_limit);

if ($testme_stats) {
$i=0;
        foreach ($testme_stats as $stat) {
$i++;
// Получаем имя пользователя
if ($stat->stat_user >0 && $stat->display_name != "") $testme_user = '<a href="user-edit.php?user_id='.$stat->stat_user.'">'.$stat->display_name.'</a>';
else  $testme_user = 'Гость (IP: '.$stat->stat_ip.')';
            $class = ('alternate' == $class) ? '' : 'alternate';
            print "<tr class='$class'>\n";
            print "<td style=\"text-align:right;\">{$i}</td>";
            print "<td style=\"text-align:left;\">{$testme_user}</td>";
            print "<td style=\"text-align:center;\">{$stat->stat_points}</td>";
            print "<td>{$stat->stat_time}</td>";
            print "</tr>";

        }
unset ($i);
}
?>
</tbody>
</table>

<p><a href="index.php?page=wp_testme/testme_stat.php">Вернуться к таблице со списком тестов.</a></p>

<?php

    }

}
else {

?>

    <table class="widefat">
	<thead>
	<tr>
		<th scope="col"><a href="<?php echo $_SERVER['PHP_SELF'];?>?page=wp_testme/testme_stat.php&amp;orderby=ID">ID</a></th>
		<th scope="col">Название теста</th>
		<th scope="col"><a href="<?php echo $_SERVER['PHP_SELF'];?>?page=wp_testme/testme_stat.php&amp;orderby=test_start_day">Дата запуска</a></th>
        <th scope="col"><a href="<?php echo $_SERVER['PHP_SELF'];?>?page=wp_testme/testme_stat.php&amp;orderby=test_done">Хиты</a></th>
        <th scope="col"><a href="<?php echo $_SERVER['PHP_SELF'];?>?page=wp_testme/testme_stat.php&amp;orderby=per_day">Хитов в день</a></th>
        <th scope="col">Статистика</th>
	</tr>
	</thead>
<tbody id="the-list">

    <?php
    if (!$_GET['orderby']) $testme_orderby = "test_done ";
    else $testme_orderby = $_GET['orderby'];
    
    $testme_tests = $wpdb->get_results(" SELECT ID , test_name , test_done , DATE_FORMAT( test_start_day, GET_FORMAT( DATE, 'EUR' ) ) AS start_day ,
ROUND((test_done / ( TO_DAYS(CURDATE( )) - TO_DAYS(test_start_day) +1 )  ) , 2) AS per_day
FROM " . $wpdb->prefix . "testme_tests ORDER BY {$testme_orderby} DESC, ID");

    if ($testme_tests) {
        foreach ($testme_tests as $post) {
            $class = ('alternate' == $class) ? '' : 'alternate';
            print "<tr class='$class'>\n";
            print "<td>{$post->ID}</td>";
            print "<td>{$post->test_name}</td>";
            print "<td>{$post->start_day}</td>";
            print "<td>{$post->test_done}</td>";
            print "<td>{$post->per_day}</td>";
            print "<td><a href=\"{$_SERVER['PHP_SELF']}?page=wp_testme/testme_stat.php&testme_id={$post->ID}\">Подробнее</a></td>";
            print "</tr>";
        }
    }
    else {
?>
	<tr>
		<td colspan="5">Тестов пока еще нет.</td>
	</tr>
<?php
}
    ?>

</tbody>
    </table>

<?php } ?>

</div>
