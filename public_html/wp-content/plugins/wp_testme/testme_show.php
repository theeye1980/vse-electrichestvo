<link type="text/css" rel="stylesheet" href="<?php bloginfo('home'); ?>/wp-content/plugins/wp_testme/testme_style.css" />

<?php
global $wpdb;
global $user_ID;
global $user_level;

    //Получаем данные теста
    $testme_test_details = $wpdb->get_row("SELECT test_name, test_description, test_only_reg
FROM {$wpdb->prefix}testme_tests WHERE ID = {$testme_id}");

// Результаты:
if($_POST['testme_id'] && $_POST['testme_id'] == $testme_id) {


    //Определяем тип теста - 123 или abc
    $testme_test_type = $wpdb->get_var("
            SELECT test_type
            FROM ".$wpdb->prefix . "testme_tests
            WHERE ID = '".$testme_id."'
        ");

    $testme_score = 0;

    // Список ИД ответов
    for ($i=1; $i <= $_POST['testme_total_q']; $i++) {
        $testme_param = "answer_".$i;
        $testme_answers_array[] = $_POST[$testme_param];
        
        if (!$_POST[$testme_param] || $_POST[$testme_param] == '') {
            $testme_error_notice = "<div class='testme_error'>Пропущены ответы на один или несколько вопросов.
Необходимо вернуться назад и ответить на все вопросы.</div>";
        }
    }

    //Если не все вопросы отвечены
    if ($testme_error_notice) print $testme_error_notice;

    //Проверяем, для кого тест и есть ли право его проходить
    elseif ( $testme_test_details->test_only_reg == 1 && !is_user_logged_in() ) {
        print '<div class="testme_not_logged">'.get_option("testme_notice_not_reg").'</div>';
        }
    //Если все ответы
    else {


    $testme_where_line = implode (',', $testme_answers_array);

    // Подсчет баллов для теста 123
    if ($testme_test_type == '123') {
        $testme_score = $wpdb->get_var("
            SELECT SUM(answer_points)
            FROM ".$wpdb->prefix . "testme_answers
            WHERE ID IN (".$testme_where_line.")
        ");
        //Получение результата теста
        $testme_result = $wpdb->get_row("SELECT ID, result_title, result_text, result_image, result_image_position
        FROM {$wpdb->prefix}testme_results WHERE result_test_relation = {$testme_id}
        AND {$testme_score} >= result_point_start AND {$testme_score} <= result_point_end");

        //Получение максимального результата
            $testme_test_show_points = $wpdb->get_var("
            SELECT test_show_points FROM ".$wpdb->prefix."testme_tests
            WHERE ID = '".$testme_id."' ");
        if ($testme_test_show_points == 1)   {
            $testme_query = "SELECT MAX(answer_points) as max_points
FROM ".$wpdb->prefix."testme_answers, ".$wpdb->prefix."testme_questions
WHERE answer_question_relation = ".$wpdb->prefix."testme_questions.ID
AND ".$wpdb->prefix."testme_questions.question_test_relation = ".$testme_id."
GROUP BY answer_question_relation";
            $testme_max_points = $wpdb->get_results($testme_query); 
                if ($testme_max_points) {
                    $testme_max_score = 0;
                    foreach ($testme_max_points as $point) {
                        $testme_max_score = $testme_max_score + $point->max_points;
                    }
                }
                
            // Создаем надпись о количестве баллов
            // Функция родительного падежа и числительного
                    function Num_and_Padezh ($number, $array)
                    {
                    $last1 = substr($number, -1, 1);
                    if (strlen($number) > 1) $last2 = substr($number, -2, 1);

                    $let = array (5,6,7,8,9,0);

                    if (in_array ($last1 ,$let) ) $line = $array[0];
                    elseif ($last2 AND $last2 == 1) $line = $array[0];
                    elseif ($last1 == 1) $line = $array[1];
                    else $line = $array[2];

                    return $line;
                    }


            //Собственно, надпись
            $testme_array_ball = array ('баллов', 'балл','балла');
            $testme_array_otvet = array ('ответов', 'ответ','ответа');
            $testme_array_vopros = array ('вопросов', 'вопрос','вопроса');

            $testme_your_score_notice = get_option("testme_notice_got_points");
            $testme_your_score_notice = str_replace("%got%", $testme_score, $testme_your_score_notice);
            $testme_your_score_notice = str_replace("%total%", $testme_max_score, $testme_your_score_notice);
            $testme_your_score_notice = str_replace("%балл%", Num_and_Padezh($testme_score, $testme_array_ball), $testme_your_score_notice);
            $testme_your_score_notice = str_replace("%ответ%", Num_and_Padezh($testme_score, $testme_array_orvet), $testme_your_score_notice);
            $testme_your_score_notice = str_replace("%вопрос%", Num_and_Padezh($testme_score, $testme_array_vopros), $testme_your_score_notice);
            $testme_your_score_notice = '<div class="testme_your_score">'.$testme_your_score_notice.'</div>';

        }

    } // конец подсчета баллов для 123

    // Подсчет баллов для теста abc
    if ($testme_test_type == 'abc') {

        $testme_score_letters = $wpdb->get_results("SELECT answer_points FROM ".$wpdb->prefix . "testme_answers
            WHERE ID IN (".$testme_where_line.")
        ");

        $testme_score_array = array ()    ;

        //Получаем строку
        foreach ($testme_score_letters as $letters) {
            $testme_letters = $letters->answer_points;
            $testme_one_answer = explode(",", $testme_letters);
            $testme_score_array = array_merge($testme_score_array, $testme_one_answer);
        }

        $testme_score_array_count = array_count_values ($testme_score_array);
        arsort ($testme_score_array_count);
        $testme_score = key ($testme_score_array_count);


        //Получение результата теста
        $testme_result = $wpdb->get_row("SELECT ID, result_title, result_text, result_image, result_image_position
        FROM {$wpdb->prefix}testme_results WHERE result_test_relation = {$testme_id}
        AND result_letter = '{$testme_score}' ");

    } // конец подсчета баллов для abc


    //Вывод результатов
    print "<div class='testme_result_block'>";
    if (get_option("testme_show_results_notice")== 'yes')  print "<div class='testme_before_results'>".get_option("testme_notice_before_results")."</div>";
    if ($testme_your_score_notice) print $testme_your_score_notice;
    if ($testme_result->result_title != '') print "<h3 class='testme_result_title'>{$testme_result->result_title}</h3>";
    if ($testme_result->result_image != '')  print "<img src='{$testme_result->result_image}'
class='testme_result_image {$testme_result->result_image_position}' alt='$testme_result->result_title' />";
    if ($testme_result->result_text != '')  print "<div class='testme_result_text'>".nl2br($testme_result->result_text)."</div>";

    //Кода для форумов и блогов
    // -- для форумов
    if (get_option("testme_code_for_forum")== 'yes') {

        $testme_current_address = "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
?>
<div class='testme_code'><p>Код для форумов:</p>
<textarea>
Результаты теста [URL=<?php echo $testme_current_address?>]<?php echo $testme_test_details->test_name?>[/URL]
<?php
if ($testme_result->result_title != '') print "[B]{$testme_result->result_title}[/B]";
if ($testme_result->result_text != '')  print $testme_result->result_text;
if ($testme_result->result_image != '') print "[IMG]{$testme_result->result_image}[/IMG]";
?>
[URL=<?php echo $testme_current_address?>]Пройти этот тест[/URL]</textarea>
</div>
<?php
    }
    // -- для блогов
    if (get_option("testme_code_for_blog")== 'yes') {

        $testme_current_address = "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
?>
<div class='testme_code'><p>HTML-код для блогов и страниц:</p>
<textarea>
<p>Результаты теста <a href="<?php echo $testme_current_address?>"><?php echo $testme_test_details->test_name?></a></p>
<?php
if ($testme_result->result_title != '') print "<p><strong>{$testme_result->result_title}</strong></p>";
if ($testme_result->result_text != '')  print "<p>".$testme_result->result_text."</p>";
if ($testme_result->result_image != '') print "<p><img src=\"".$testme_result->result_image."\" /></p>";
?>
<p><a href="<?php echo $testme_current_address?>">Пройти этот тест</a></p></textarea>
</div>
<?php
    }

    print "</div>";

    if ($user_level <  8) {
    //Добавляем 1 хит
    $testme_done = $wpdb->get_var("SELECT test_done FROM ".$wpdb->prefix . "testme_tests WHERE ID = {$testme_id} ") + 1;
    $wpdb->query("UPDATE {$wpdb->prefix}testme_tests SET test_done = '{$testme_done}' WHERE ID = {$testme_id} ");
    
    //print "INSERT INTO {$wpdb->prefix}testme_stats(stat_time, stat_result, stat_ip, stat_test_relation, stat_user, stat_points)
    //VALUES (NOW(), '{$testme_result->ID}', '{$_SERVER['REMOTE_ADDR']}', '{$testme_id}', '{$user_ID}', '{$testme_score}');";

    //Добавляем данные в таблицу результатов
    $wpdb->query("INSERT INTO {$wpdb->prefix}testme_stats(stat_time, stat_result, stat_ip, stat_test_relation, stat_user, stat_points)
    VALUES (NOW(), '{$testme_result->ID}', '{$_SERVER['REMOTE_ADDR']}', '{$testme_id}', '{$user_ID}', '{$testme_score}');");
    }

}
}

// Показываем сам тест
else {
    //Список вопросов
    $all_question = $wpdb->get_results("SELECT ID, question_text
FROM {$wpdb->prefix}testme_questions WHERE question_test_relation={$testme_id} ORDER BY ID");

    if ($all_question) {

        ?>


    <?php // Проверяем, кто может проходить тест
    if ( $testme_test_details->test_only_reg == 1 && !is_user_logged_in() ) {   ?>
        <div class="testme_form">
    <?php } else { ?>
<form action="<?php the_permalink() ?>" method="post" class="testme_form" name="testme_form_<?php echo $testme_id; ?>"
onSubmit="test_<?php echo $testme_id ?>(); return false"  >
    <?php } ?>


    <?php

    // Залоголок и описание
    if (get_option("testme_show_test_title")== 'yes')
    print "<div class='testme_title'><h3>{$testme_test_details->test_name}</h3></div>";

    if (get_option("testme_show_test_description")== 'yes' && $testme_test_details->test_description != '')
    print "<div class='testme_show_test_description'>{$testme_test_details->test_description}</div>";


    $i=0;
    foreach ($all_question as $ques) {
        $i++;
        echo '<div class="testme_question">';
        echo '<div class="testme_question_text">'.$i.'. '. stripslashes($ques->question_text) . '</div><br />';

        if ( $testme_test_details->test_only_reg == 1 && !is_user_logged_in() ) { echo '<ul class="testme_asnwer_list">'; }

        $dans = $wpdb->get_results("SELECT ID, answer_text FROM {$wpdb->prefix}testme_answers WHERE answer_question_relation={$ques->ID} ORDER BY ID");
        foreach ($dans as $ans) {
            
            if ( $testme_test_details->test_only_reg == 1 && !is_user_logged_in() ) {
                echo '<li>' . stripslashes($ans->answer_text) . '</li>';
            }
            else {
                echo '<div class="testme_answer_block">
                <input type="radio" name="answer_'.$i.'" id="answer_id_'.$ans->ID.'" class="testme_answer" value="'.$ans->ID.'" />';
                echo '<label for="answer_id_'.$ans->ID.'">' . stripslashes($ans->answer_text) . '</label><br /></div>';
            }
            
        }
        if ( $testme_test_details->test_only_reg == 1 && !is_user_logged_in() ) { echo '</ul>'; }
        echo "</div>";

      //код для яваскрипта
      $test_ans_num = $wpdb->get_var("SELECT COUNT(ID) FROM ".$wpdb->prefix . "testme_answers WHERE answer_question_relation = {$ques->ID}");
      $testme_js_code .= '
for(var i=0; i<'.$test_ans_num.'; i++)
{
if(document.testme_form_'.$testme_id.'.answer_'.$i.'[i].checked) {var ind'.$i.' = i; break;}
}
if (ind'.$i.' == undefined) errorNote += "\n Вопрос '.$i.'";
';
    }

    ?>

    <?php // Проверяем, кто может проходить тест
    if ( $testme_test_details->test_only_reg == 1 && !is_user_logged_in() ) {   ?>
        <div class="testme_not_logged"><?php echo get_option("testme_notice_not_reg") ?></div>
        </div>
    <?php } else { ?>
    <input type="submit" name="action" id="testme_button" value="Показать результаты"  />
    <input type="hidden" name="testme_id" value="<?php echo  $testme_id ?>" />
    <input type="hidden" name="testme_total_q" value="<?php echo  $i ?>" />  
    </form>
    
    
 <script language="JavaScript"  type="text/javascript">
function test_<?php echo $testme_id ?>()
{
    var errorNote = "";

<?=$testme_js_code?>


    if(errorNote != ""){
        alert("Пропущены следующие вопросы:\n"+errorNote+"\n\nЧтобы посмотреть результаты теста, надо ответить на все вопросы");
    }
    else{
        document.testme_form_<?php echo $testme_id ?>.submit();
    }


}
</script>   
    <?php } ?>
   


<?php
unset ($i);

}


   

}

?>