<div class="wrap">
    <h2>Управление тестами</h2>
    
<?php // Выбираем, что показывать

// Добавление нового теста
if ($_GET['task'] && $_GET['task']== 'new' )
    include (ABSPATH . 'wp-content/plugins/wp_testme/testme_new.php');
// Редактирование теста
else if  ($_GET['task'] && $_GET['task']== 'edit' )
    include (ABSPATH . 'wp-content/plugins/wp_testme/testme_edit_one.php');
// Удаление теста
else if  ($_GET['task'] && $_GET['task']== 'delete' )
    include (ABSPATH . 'wp-content/plugins/wp_testme/testme_delete.php');
else
{

?>

    <p><a href="options-general.php?page=wp_testme/testme_edit.php&task=new">Добавить тест</a></p>

    <h3>Список тестов</h3>

<?php
//Страницы

$testme_limit = get_option("testme_edit_per_page");
if (!$testme_limit || $testme_limit <1) $testme_limit = 30;

if ($_GET['showpage']) $testme_page = $_GET['showpage'];
    else $testme_page = 1;
$testme_start = ($testme_page - 1) * $testme_limit;

$testme_countorder = $wpdb->get_var("
			SELECT COUNT(ID)
			FROM ".$wpdb->prefix . "testme_tests
		");

$testme_countpage = ceil ($testme_countorder/$testme_limit);

// Вывод страниц
if ($testme_countpage >1) {
    			//Текущий адрес без страницы
	$testme_current_url = ereg_replace ("[\&]showpage\=[0-9]+", "", $_SERVER['REQUEST_URI']);

    $testme_page_line = "<p>Страницы:";
    for ($i=1; $i<=$testme_countpage; $i++){
		   		if ($testme_page==$i) $testme_page_line .= " <strong>$i</strong>";
                elseif ($i == 1) $testme_page_line .= " <a href=\"".$testme_current_url."\">".$i."</a>";
				else $testme_page_line .=  " <a href=\"".$testme_current_url."&amp;"."showpage=".$i."\">".$i."</a>";
		        }
    unset ($i);
    $testme_page_line .=  "</p>";
}
else $testme_page_line  = "";

print $testme_page_line;
?>

    <table class="widefat">
	<thead>
	<tr>
		<th scope="col">ID</th>
		<th scope="col">Код</th>
		<th scope="col">Название теста</th>
		<th scope="col">Дата</th>
		<th scope="col" colspan="2">Действия</th>
	</tr>
	</thead>
<tbody id="the-list">

    <?php
    $testme_posts = $wpdb->get_results(" SELECT ID, test_name, test_start_day
    FROM " . $wpdb->prefix . "testme_tests ORDER BY test_start_day DESC, ID DESC LIMIT $testme_start, $testme_limit");

    if ($testme_posts) {
        foreach ($testme_posts as $post) {
            $class = ('alternate' == $class) ? '' : 'alternate';
            print "<tr class='$class'>\n";
            print "<td>{$post->ID}</td>";
            print "<td>[TESTME {$post->ID}]</td>";
            print "<td>{$post->test_name}</td>";
            print "<td>".date(get_option('date_format'), strtotime($post->test_start_day))."</td>";
   //         print "<td>{$post->test_start_day}</td>";
            print "<td><a href=\"{$_SERVER['PHP_SELF']}?page=wp_testme/testme_edit.php&task=edit&testme_id={$post->ID}\">Изменить</a></td>";
            print "<td><a href=\"{$_SERVER['PHP_SELF']}?page=wp_testme/testme_edit.php&task=delete&testme_id={$post->ID}\">Удалить</a></td>";
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

<?php
} // конец таблицы со списком тестов
?>

</div>

