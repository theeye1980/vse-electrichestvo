<?php
//phpinfo();

//Добавление нового теста
if ($_POST['testme_id'] && $_POST['testme_id']=='new')
{
    //Заменяем пустые значения значениями по умолчанию
    if ($_POST['test_name'] == "") $test_name = "Без имени"; else $test_name = $_POST['test_name'];
    if ($_POST['test_questions'] < 1) $test_questions = 10; else $test_questions = $_POST['test_questions'];
    if ($_POST['test_answers'] < 1) $test_answers = 4; else $test_answers = $_POST['test_answers'];
    if ($_POST['test_results'] < 1) $test_results = 4; else $test_results = $_POST['test_results'];
    if ($_POST['test_start_day'] == "") $test_start_day = date ("Y-m-d"); else $test_start_day = $_POST['test_start_day'];

    //Добавляем данные в таблицу с тестами
    $wpdb->query("INSERT INTO {$wpdb->prefix}testme_tests(test_name, test_questions, test_answers, test_results, test_type, test_description,
test_start_day, test_only_reg, test_show_points)
    VALUES ('{$test_name}', '{$test_questions}', '{$test_answers}',  '{$test_results}',
    '{$_POST['test_type']}', '{$_POST['test_description']}',  '{$test_start_day}' ,
    '{$_POST['test_only_reg']}', '{$_POST['test_show_points']}');");

    $testme_id = $wpdb->insert_id;

    print "<div class=\"updated\"><p>Новый тест добавлен, теперь заполните поля с вопросами, ответами и результатами.</p></div>";
}
//Изменение в уже существующем тесте
else if ($_POST['testme_id'] && $_POST['testme_id']>0) {

    //Изменяем шапку  - название теста, описание, дату, доступ и баллы
    if ($_POST['test_name'] == "") $test_name = "Без имени"; else $test_name = $_POST['test_name'];
    if ($_POST['test_start_day'] == "") $test_start_day = date ("Y-m-d"); else $test_start_day = $_POST['test_start_day'];

    $wpdb->query("UPDATE {$wpdb->prefix}testme_tests SET test_name = '{$test_name}', test_description = '{$_POST['test_description']}',
test_start_day = '{$test_start_day}', test_only_reg = '{$_POST['test_only_reg']}', test_show_points = '{$_POST['test_show_points']}'
WHERE ID = {$_POST['testme_id']} ");

    // Изменение вопросов и ответов
    //-- уже бывших вопросов
    if (!$_POST['testme_question_type']) {
        foreach  ($_POST['question_text'] as $num=>$question )    {
            $wpdb->query("UPDATE {$wpdb->prefix}testme_questions SET question_text = '{$question}' WHERE ID = {$num}");
        }
        foreach  ($_POST['answer_text'] as $num=>$answer )    {
            $wpdb->query("UPDATE {$wpdb->prefix}testme_answers SET answer_text = '{$answer}' WHERE ID = {$num}");
        }
        foreach  ($_POST['answer_points'] as $num=>$points )    {
            if (!is_int($points) and function_exists(mb_strtolower) ) $points = mb_strtolower($points);
            $points = str_replace(" ", "", $points);
            $wpdb->query("UPDATE {$wpdb->prefix}testme_answers SET answer_points = '{$points}' WHERE ID = {$num}");
        }
    }

    //-- новых вопросов
    else {
        foreach  ($_POST['question_text'] as $num=>$value ) {
            //вопрос
            if ($value != '') {
                $wpdb->query("INSERT INTO {$wpdb->prefix}testme_questions(question_text,question_test_relation)
    VALUES('{$value}','{$_POST['testme_id']}')");
                $testme_question_id = $wpdb->insert_id;

                // ответы
                $testme_answer_code = 'answer_text_'.$num;
                $testme_points_code = 'answer_points_'.$num;
                foreach ($_POST[$testme_answer_code] as $num_ans=>$answer_value) {
                    if ($answer_value != '') {
                        //обработка пойнтов
                                    $points = $_POST[$testme_points_code][$num_ans];
                                    if (!is_int($points) and function_exists(mb_strtolower) ) $points = mb_strtolower($points);
                                    $points = str_replace(" ", "", $points);
                    $wpdb->query("INSERT INTO {$wpdb->prefix}testme_answers(answer_text,answer_points,answer_question_relation)
    VALUES('{$answer_value}','{$points}','{$testme_question_id}')");
                    }
                }
            }
        }

    }

    // Изменение результатов теста
    //-- уже бывших результатов
    if (!$_POST['testme_result_type']) {
        if ($_POST['result_title']) {
            foreach  ($_POST['result_title'] as $num=>$value )    {
                $wpdb->query("UPDATE {$wpdb->prefix}testme_results SET result_title = '{$value}' WHERE ID = {$num}");}
        }
        if ($_POST['result_text']) {
            foreach  ($_POST['result_text'] as $num=>$value )    {
                $wpdb->query("UPDATE {$wpdb->prefix}testme_results SET result_text = '{$value}' WHERE ID = {$num}");}
        }
        if ($_POST['result_image']) {
            foreach  ($_POST['result_image'] as $num=>$value )    {
                $wpdb->query("UPDATE {$wpdb->prefix}testme_results SET result_image = '{$value}' WHERE ID = {$num}");}
        }
        if ($_POST['result_image_position']) {
            foreach  ($_POST['result_image_position'] as $num=>$value )    {
                $wpdb->query("UPDATE {$wpdb->prefix}testme_results SET result_image_position = '{$value}' WHERE ID = {$num}");}
        }
        if ($_POST['result_point_start']) {
            foreach  ($_POST['result_point_start'] as $num=>$value )    {
                $wpdb->query("UPDATE {$wpdb->prefix}testme_results SET result_point_start = '{$value}' WHERE ID = {$num}"); }
        }
        if ($_POST['result_point_end']) {
            foreach  ($_POST['result_point_end'] as $num=>$value )    {
                $wpdb->query("UPDATE {$wpdb->prefix}testme_results SET result_point_end = '{$value}' WHERE ID = {$num}"); }
        }
        if ($_POST['result_letter']) {
            foreach  ($_POST['result_letter'] as $num=>$value )    {
                if (function_exists(mb_strtolower) ) $value = mb_strtolower($value);
                $wpdb->query("UPDATE {$wpdb->prefix}testme_results SET result_letter = '{$value}' WHERE ID = {$num}");
            }
        }
    }

    //-- новых результатов
    else {
        for ($i=1; $i<= count($_POST['result_title']); $i++) {
            
            // Буква или баллы в зависимости от типа теста
            if ($_POST['result_letter'])
            {$testme_points_code_1 = "result_letter"; $testme_points_code_2 = "'".$_POST['result_letter'][$i]."'";}
            else
            {$testme_points_code_1 = "result_point_start, result_point_end";
                $testme_points_code_2 = "'".$_POST['result_point_start'][$i]."','".$_POST['result_point_end'][$i]."'";}
        
        // Если хоть одно поле заполнено
        if (!($_POST['result_title'][$i] == '' && $_POST['result_text'][$i] == '' && $_POST['result_image'][$i]=='') )
            {
                $wpdb->query("INSERT INTO {$wpdb->prefix}testme_results(result_title,result_text,result_image,result_image_position,
        result_test_relation,{$testme_points_code_1})
        VALUES('{$_POST['result_title'][$i]}','{$_POST['result_text'][$i]}','{$_POST['result_image'][$i]}','{$_POST['result_image_position'][$i]}',
        '{$_POST['testme_id']}', {$testme_points_code_2} )");

            }
        }
    }


    //print_r ($_POST['answer_text_1']);

    print "<div class=\"updated\"><p>Изменения внесены.</p></div>";
}
?>

<h3>Редактирование теста</h3>

<?php 
//Получаем ИД теста
if (!$testme_id && $_GET['testme_id']) $testme_id = $_GET['testme_id'];
//Проверяем, есть ли строка с таким ИД
$testme_test_details = $wpdb->get_row("SELECT ID, test_name, test_questions, test_answers, test_results, test_type, test_description, test_start_day,
test_only_reg,  test_show_points   FROM {$wpdb->prefix}testme_tests WHERE ID = {$testme_id}");

//Если нет такого теста
if (!$testme_test_details->ID)
print "Теста с таким ID не найдено.";
// А если есть, то редактируем его
else {

    // Общая часть
    ?>
<p>Вставьте код [TESTME <?php echo $testme_id ?>] в запись блога, чтобы там появился этот тест.</p>

<form name="post" action="options-general.php?page=wp_testme/testme_edit.php&task=edit&testme_id=<?php echo $testme_id ?>" method="post" id="post">
    <div id="poststuff">

        <div class="postbox" id="titlediv">
            <h3 class="hndle"><span>Название теста</span></h3>
            <div class="inside">
                <input type='text' name='test_name' id='title'  value='<?php echo $testme_test_details->test_name ?>' />
        </div></div>

        <div class="postbox">
            <h3 class="hndle"><span>Описание теста</span> (публикуется перед списком вопросов)</h3>
            <div class="inside">

<?php
	// conditions here
	wp_enqueue_script( 'common' );
	wp_enqueue_script( 'jquery-color' );
	wp_print_scripts('editor');
	if (function_exists('add_thickbox')) add_thickbox();
	wp_print_scripts('media-upload');
	if (function_exists('wp_tiny_mce')) wp_tiny_mce();
	wp_admin_css();
	wp_enqueue_script('utils');
	do_action("admin_print_styles-post-php");
	do_action('admin_print_styles');
?>

<?php the_editor($testme_test_details->test_description, 'test_description'); ?>

        </div></div>

        <div class="postbox" id="titlediv">
            <h3 class="hndle"><span>Параметры теста</span></h3>
            <div class="inside">
                <p><input type='text' name='test_start_day' value='<?php echo $testme_test_details->test_start_day ?>' />
                Дата создания или публикации теста в формате гггг-мм-дд. Для статистики.</p>
            <p><input name="test_only_reg" id="test_only_reg" type="checkbox"  value="1"
            <?php if ($testme_test_details->test_only_reg == 1) print 'checked="checked"'; ?>
            /> <label for="test_only_reg">
            Только зарегистрированные пользователи могут проходить этот тест.</label></p>
            <?php // Только для тестов типа 123
            if ($testme_test_details->test_type == "123") {?>
            <p><input name="test_show_points" id="test_show_points" type="checkbox"  value="1"
            <?php if ($testme_test_details->test_show_points == 1) print 'checked="checked"'; ?>
            /> <label for="test_show_points">
            Показывать пользователю, сколько именно он набрал баллов в тесте.</p>
            <?php } ?>
        </div></div>


        <div class="postbox" id="titlediv">
            <h3 class="hndle"><span>Вопросы и варианты ответов на них</span></h3>
            <div class="inside">

    <?php
    if ($testme_test_details->test_type == 'abc') print "<p>Можно одному ответу присвоить несколько букв (цифр).
В этом случае их надо писать через запятую без пробелов. Например, <em>а,б,г</em> или <em>a,d</em> или <em>2,4,5</em>.</p>";

    //Получаем список уже имеющихся вопросов
    $testme_questions = $wpdb->get_results(" SELECT ID, question_text FROM " . $wpdb->prefix . "testme_questions
                                                    WHERE question_test_relation = {$testme_id} ORDER BY ID");

    $i = 0;
    if ($testme_questions) {
        foreach ($testme_questions as $question) {
            $i++;
            print "\n\n<p><strong>Вопрос {$i}:</strong> <input type='text' name='question_text[{$question->ID}]' value='{$question->question_text}'
                                style='width:80%;font-weight:bold;' /></p>";

            //Получаем список ответов для каждого вопроса
            $testme_answers = $wpdb->get_results(" SELECT ID, answer_points, answer_text FROM " . $wpdb->prefix . "testme_answers
                                                            WHERE answer_question_relation = {$question->ID} ORDER BY ID");

            if ($testme_answers) {
                foreach ($testme_answers as $answer) {
                    print "\n<p><input type='text' size='5' name='answer_points[{$answer->ID}]' value='{$answer->answer_points}'
                                style='background-color:#e7ffe7' />
                                \n<input type='text' name='answer_text[{$answer->ID}]' value='{$answer->answer_text}'
                                style='width:60%;' /></p>";
                }
            }

        }
    }

    //Если нет ни одного вопроса в таблице, то берем пустые значения
    else {
        for ($i=1; $i<= $testme_test_details->test_questions; $i++) {
            print "\n\n<p><strong>Вопрос {$i}:</strong> <input type='text' name='question_text[{$i}]' style='width:80%;font-weight:bold;' /></p>";

            //Пустые ответы
            for ($k=1; $k<= $testme_test_details->test_answers; $k++) {
                print "\n<p><input type='text' size='5' name='answer_points_{$i}[]' style='background-color:#e7ffe7' />
                                <input type='text' name='answer_text_{$i}[]'  style='width:60%;' /></p>";
            }
        }

        print "<input type='hidden' name='testme_question_type' value='new' />";
    }
    ?>

        </div></div>




        <div class="postbox" id="titlediv">
            <h3 class="hndle"><span>Результаты теста</span></h3>
            <div class="inside">

    <?php
    //Получаем список уже имеющихся результатов
    $testme_results = $wpdb->get_results(" SELECT * FROM " . $wpdb->prefix . "testme_results
                                                    WHERE result_test_relation = {$testme_id} ORDER BY ID");

    $i=0;
    if ($testme_results) {
        foreach ($testme_results as $result) {
            $i++;
            print "\n\n<p><strong>Вариант ответа {$i}:</strong></p>";

            // Буква или баллы в зависимости от типа теста
            if ($testme_test_details->test_type == 'abc')
            print "<p>Буква: <input type='text' size='3' name='result_letter[{$result->ID}]' value='{$result->result_letter}'
                                style='background-color:#e7ffe7' maxlength='1' /></p>";
            else if ($testme_test_details->test_type == '123')
            print "<p>Баллы от :
                                <input type='text' size='3' name='result_point_start[{$result->ID}]' value='{$result->result_point_start}'
                style='background-color:#e7ffe7' maxlength='3' />
                                до <input type='text' size='3' name='result_point_end[{$result->ID}]' value='{$result->result_point_end}'
                style='background-color:#e7ffe7' maxlength='3' />
                                </p>";

            //Название и прочие поля
            ?>
                <p>Заголовок результата: <input type='text' name='result_title[<?php echo $result->ID ?>]' value='<?php echo $result->result_title ?>'
                                                style='width:80%;font-weight:bold;' /></p>
                <p>Картинка: <input type='text' name='result_image[<?php echo $result->ID ?>]' value='<?php echo $result->result_image ?>'
                                        style='width:60%;' />
                    Выравнивание: <select name='result_image_position[<?php echo $result->ID ?>]'>
                        <option value=''>Нет</option>
                        <option value='alignleft' <?php if ($result->result_image_position == 'alignleft') print "selected='selected'"; ?>>Слева</option>
                        <option value='aligncenter' <?php if ($result->result_image_position == 'aligncenter') print "selected='selected'"; ?>>Посередине</option>
                        <option value='alignright' <?php if ($result->result_image_position == 'alignright') print "selected='selected'"; ?>>Справа</option>
                    </select>
                </p>

                <p>Описание: <br />
                <textarea name='result_text[<?php echo $result->ID ?>]' rows='4' cols='50' style='width:100%'><?php echo $result->result_text ?></textarea></p>
                <?php
            }
        }
        //Для нового теста, когда еще нет результатов
        else {

            for ($i=1; $i<= $testme_test_details->test_results; $i++) {

                print "\n\n<p><strong>Вариант ответа {$i}:</strong></p>";
                
                // Буква или баллы в зависимости от типа теста
                if ($testme_test_details->test_type == 'abc')
                print "<p><strong>Буква/Цифра</strong>: <input type='text' size='3' name='result_letter[{$i}]' value='{$i}'
                                        style='background-color:#e7ffe7' maxlength='1' /></p>";
                else if ($testme_test_details->test_type == '123')
                print "<p>Баллы от :
                                        <input type='text' size='3' name='result_point_start[{$i}]' value=''
                        style='background-color:#e7ffe7' maxlength='3' />
                                        до <input type='text' size='3' name='result_point_end[{$i}]' value=''
                        style='background-color:#e7ffe7' maxlength='3' />
                                        </p>";

                //Название и прочие поля
                ?>
                <p>Заголовок результата: <input type='text' name='result_title[<?php echo $i ?>]' value=''
                                                style='width:80%;font-weight:bold;' /></p>
                <p>Картинка: <input type='text' name='result_image[<?php echo $i ?>]' value=''
                                        style='width:60%;' />
                    Выравнивание: <select name='result_image_position[<?php echo $i ?>]'>
                        <option value=''>Нет</option>
                        <option value='alignright'>Слева</option>
                        <option value='aligncenter'>Посередине</option>
                        <option value='alignright'>Справа</option>
                    </select>
                </p>

                <p>Описание: <br />
                <textarea name='result_text[<?php echo $i ?>]' rows='4' cols='50' style='width:100%'></textarea></p>

                <input type='hidden' name='testme_result_type' value='new' />

            <?php
        }
    }

    ?>

        </div></div>




        <p class="submit">
            <span id="autosave"></span>
            <input type="hidden" name="testme_id" value="<?php echo $testme_id ?>" />
            <input type="submit" name="submit" value="Сохранить" style="font-weight: bold;" tabindex="4" />
        </p>

    </div>
</form>
<?
}

?>