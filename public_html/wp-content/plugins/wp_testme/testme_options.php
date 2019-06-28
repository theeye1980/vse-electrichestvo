<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<div class="wrap">
    <h2>Настройки для тестов</h2>

<?php
//Обработка заказза
	if($_POST['testme_modify_options']) {
		// set the post formatting options
		update_option('testme_show_test_title', $_POST['testme_show_test_title']);
        update_option('testme_show_test_description', $_POST['testme_show_test_description']);
        update_option('testme_show_results_notice', $_POST['testme_show_results_notice']);
        update_option('testme_notice_before_results', $_POST['testme_notice_before_results']);
        update_option('testme_code_for_forum', $_POST['testme_code_for_forum']);
        update_option('testme_code_for_blog', $_POST['testme_code_for_blog']);
        update_option('testme_edit_per_page', $_POST['testme_edit_per_page']);
        update_option('testme_stat_per_page', $_POST['testme_stat_per_page']);
        update_option('testme_access_reg', $_POST['testme_access_reg']);
        update_option('testme_notice_not_reg', $_POST['testme_notice_not_reg']);
        update_option('testme_notice_got_points', $_POST['testme_notice_got_points']);
		echo '<div class="updated"><p>Настройки обновлены.</p></div>';
	}


//Перерасчет старых значений
    elseif ($_GET['update'] && $_GET['update'] == 'points') {

    //Обновление колонки с баллами в таблице статистики для старых записей
    $testme_query = $wpdb->get_results("SELECT ".$wpdb->prefix."testme_stats.ID, stat_result, stat_points, result_point_start, result_point_end, result_letter
FROM ".$wpdb->prefix."testme_stats
LEFT JOIN ".$wpdb->prefix."testme_results ON ".$wpdb->prefix."testme_stats.stat_result = ".$wpdb->prefix."testme_results.ID
WHERE `stat_points` IS NULL");
    if ($testme_query) {
        $i = 0;
        foreach ($testme_query as $line) {
            $i++;
            if ($line->result_letter != "") $testme_point_to_insert = $line->result_letter;
            else $testme_point_to_insert = $line->result_point_start."-".$line->result_point_end;
            //print $testme_point_to_insert."<br />";
            $wpdb->query("UPDATE ".$wpdb->prefix."testme_stats SET stat_points = '".$testme_point_to_insert."' WHERE ID = ".$line->ID);
        }
        echo '<div class="updated"><p>Перерасчет выполнен, затронуто '.$i.' строк.</p></div>';
    }
    else echo '<div class="updated"><p>Нет полей для перерасчета.</p></div>';

    }
?>


<form action="options-general.php?page=wp_testme/testme_options.php" method="post">
    <table class="widefat" style="width:600px;">
<thead>
	<tr>
		<th scope="col">Параметры тестов</th>
	</tr>
</thead>
<tbody id="the-list">
    <tr>
    <td>
    <p><input name="testme_show_test_title" type="checkbox"  id="testme_show_test_title" value="yes"
    <?php if (get_option("testme_show_test_title")== 'yes') print "checked";?> />
    <label for="testme_show_test_title">Показывать заголовок теста перед списком вопросов</label></p>
    <p><input name="testme_show_test_description" type="checkbox"  id="testme_show_test_description" value="yes"
    <?php if (get_option("testme_show_test_description")== 'yes') print "checked";?> />
    <label for="testme_show_test_description">Показывать описание теста перед списком вопросов</label></p>
    </td>
    </tr>

    <tr class="alternate">
    <td>
    <p><input name="testme_show_results_notice" type="checkbox"  id="testme_show_results_notice" value="yes"
    <?php if (get_option("testme_show_results_notice")== 'yes') print "checked";?> />
    <label for="testme_show_results_notice">Показывать надпись "Результаты теста:" (или иную) перед результатами теста</label></p>
    <p><input name="testme_notice_before_results" type="text"  id="testme_notice_before_results"
    value="<?php echo get_option("testme_notice_before_results") ?>" />
    <label for="testme_notice_before_results">Надпись, которая выводится перед результатами теста</label></p>
    </td>
    </tr>

    <tr>
    <td>
    <p><input name="testme_code_for_forum" type="checkbox"  id="testme_code_for_forum" value="yes"
    <?php if (get_option("testme_code_for_forum")== 'yes') print "checked";?> />
    <label for="testme_code_for_forum">Показывать код для форума после результатов теста.</label></p>
    <p><input name="testme_code_for_blog" type="checkbox"  id="testme_code_for_blog" value="yes"
    <?php if (get_option("testme_code_for_blog")== 'yes') print "checked";?> />
    <label for="testme_code_for_blog">Показывать HTML-код для блогов после результатов теста.</label></p>
    </td>
    </tr>

    <tr class="alternate">
    <td>
    <p><input name="testme_edit_per_page" type="text"  id="testme_edit_per_page"
    value="<?php echo get_option("testme_edit_per_page") ?>" size="3" />
    <label for="testme_edit_per_page">Количество тестов на одной странице в панеле управления тестами.</label></p>
    <p><input name="testme_stat_per_page" type="text"  id="testme_stat_per_page"
    value="<?php echo get_option("testme_stat_per_page") ?>" size="3" />
    <label for="testme_stat_per_page">Количество последних прохождений в статистике тестов.</label></p>
    </td>
    </tr>

    <tr>
    <td>
    <p><input name="testme_access_reg" type="checkbox"  id="testme_access_reg" value="yes"
    <?php if (get_option("testme_access_reg")== 'yes') print "checked";?> />
    <label for="testme_access_reg">Разрешить прохождение теста только зарегистрированным пользователям
    (можно изменить в параметрах каждого отдельного теста).</label>
    </p>
    <p><input name="testme_notice_not_reg" type="text"  id="testme_notice_not_reg"
    value="<?php echo get_option("testme_notice_not_reg") ?>" size="80" /><br />
    <label for="testme_notice_not_reg">Надпись вместо кнопки "Отправить" для незарегистрированных пользователей,
    если им нет доступа к тесту.</label></p>
    </td>
    </tr>

    <tr class="alternate">
    <td>
    <p><input name="testme_notice_got_points" type="text"  id="testme_notice_got_points"
    value="<?php echo get_option("testme_notice_got_points") ?>" size="80" /><br />
    <label for="testme_notice_got_points">Надпись, которая говорит пользователю, сколько баллов он набрал в тесте.</label><br />
    Можно использовать следующие сокращения:<br />
    %got% - количество баллов за тест у пользователя,<br />
    %total% - максимальное количество баллов за тест,<br />
    %балл%, %ответ%, %вопрос% - данные слова в нужном падеже в зависимости от количества баллов, набранных пользователем.<br />
    (Например, <em>Вы ответили правильно на %got% %вопрос%</em> = <em>Вы ответили правильно на 4 вопроса</em>.)</p>
    </td>
    </tr>

    <tr>
    <td><input type="submit" name="testme_modify_options" value="Внести изменения" class="button" /></td>
    </tr>
</tbody>
</table>


</form>

<h3>Пересчет значений</h3>

<p><a href="options-general.php?page=wp_testme/testme_options.php&update=points">Запустить пересчет значений</a> для статистики по пользователям.
(По желанию при переходе с версии 1.1 на версию 1.2. При этом для старых прохождений будет указываться диапазон баллов.)</p>

</div>