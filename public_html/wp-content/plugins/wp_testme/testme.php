<?php
/*
Plugin Name: TESTME - Плагин для создания тестов
Plugin URI: http://makemoney.kalaydina.ru/archives/126
Description: Плагин позволяет добавить тесты в записи вордпресса
Author: Татьяна <forregs@yandex.ru>
Author URI: http://www.kalaydina.ru
Version: 1.2
*/

/*  Copyright 2009  Татьяна Калайдина/Tatiana Kalaydina  (email : forregs@yandex.ru)

    Плагин TESTME распространяется бесплатно. Вы имеете полное право
    распространять его дальше или вносить любые изменения в исходный код.
    Я надеюсь, что плагин окажется полезен, но не гарантирую, что он
    полностью подойдет для ваших целей. На мне не лежит никаких обязанностей
    по дальнейшей модификации плагина с целью его наибольшего соответствия
    пожеланиям других пользователей.

*/

$testme_current = 1.2;

// Устанавливаем плагин
// Add options
function testme_activate() {
   add_option('testme_show_test_title', '');
   add_option('testme_show_test_description', 'yes');
   add_option('testme_show_results_notice', 'yes');
   add_option('testme_notice_before_results', 'Результаты теста:');
   add_option('testme_code_for_forum', 'yes');
   add_option('testme_code_for_blog', 'yes');
   add_option('testme_edit_per_page', '30');
   add_option('testme_built', $testme_current);
   add_option('testme_access_reg', '');
   add_option('testme_notice_not_reg', 'Только зарегистрированные пользователи могут проходить этот тест.');
   add_option('testme_stat_per_page', '50');
   add_option('testme_notice_got_points', 'Вы набрали %got% %балл% из %total%.');
}

// Add tables to DB
function testme_add_tables () {
   global $wpdb;

   require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

   $table_name = $wpdb->prefix . "testme_tests";
   if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
       $sql = "CREATE TABLE " . $table_name . " (
  `ID` int(20) NOT NULL auto_increment,
  `test_name` varchar(250) default 'Без имени',
  `test_questions` tinyint(3) default '10',
  `test_answers` tinyint(2) default '4',
  `test_results` tinyint(2) default '4',
  `test_type` varchar(3) NOT NULL default '123',
  `test_done` int(10) NOT NULL default '0',
  `test_description` text,
  `test_start_day` date default NULL,
  `test_only_reg` binary(1) NOT NULL default '0',
  `test_show_points` binary(1) NOT NULL default '0',
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;";
    dbDelta($sql);
   }

   $table_name = $wpdb->prefix . "testme_questions";
   if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
       $sql = "CREATE TABLE " . $table_name . " (
      `ID` int(20) NOT NULL auto_increment,
      `question_text` text,
      `question_test_relation` int(20) default NULL,
      PRIMARY KEY  (`ID`)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8 ;";
    dbDelta($sql);
   }

   $table_name = $wpdb->prefix . "testme_answers";
   if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
       $sql = "CREATE TABLE " . $table_name . " (
      `ID` int(20) NOT NULL auto_increment,
      `answer_text` text,
      `answer_points` varchar(10) default NULL,
      `answer_question_relation` varchar(20) default NULL,
      PRIMARY KEY  (`ID`)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8;";
    dbDelta($sql);
   }

   $table_name = $wpdb->prefix . "testme_results";
   if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
       $sql = "CREATE TABLE " . $table_name . " (
      `ID` int(20) NOT NULL auto_increment,
      `result_title` varchar(250) default NULL,
      `result_text` text,
      `result_image` varchar(250) default NULL,
      `result_image_position` varchar(100) default NULL,
      `result_point_start` int(5) default NULL,
      `result_point_end` int(5) default NULL,
      `result_letter` varchar(1) default NULL,
      `result_test_relation` int(20) default NULL,
      PRIMARY KEY  (`ID`)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8 ;";
    dbDelta($sql);
   }

   $table_name = $wpdb->prefix . "testme_stats";
   if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
       $sql = "CREATE TABLE " . $table_name . " (
  `ID` int(20) NOT NULL auto_increment,
  `stat_time` datetime default NULL,
  `stat_result` varchar(5) default NULL,
  `stat_user` int(10) NOT NULL default '0',
  `stat_points` varchar(7) default NULL,
  `stat_ip` varchar(20) default NULL,
  `stat_test_relation` int(20) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;";
    dbDelta($sql);
   }

}

// Активация плагина
if ( function_exists('register_activation_hook') ) {
    register_activation_hook(__FILE__, 'testme_add_tables');
    register_activation_hook(__FILE__, 'testme_activate');
}

// Апгрейд плагина
// Собственно, апгрейд
if ($_GET['action'] == 'upgrade' && $_GET['plugin'] == basename(__FILE__) &&  version_compare(add_option('testme_built'), $testme_current, '<'))
{
	testme_upgrade ();
}

function testme_upgrade (){
    global $testme_current;
   add_option('testme_edit_per_page', '30');
   add_option('testme_built', $testme_current);
   add_option('testme_access_reg', '');
   add_option('testme_notice_not_reg', 'Только зарегистрированные пользователи могут проходить этот тест.');
   add_option('testme_stat_per_page', '50');
   add_option('testme_notice_got_points', 'Вы набрали %got% %балл% из %total%.');

  
   //обновление таблиц до версии 1.2
   global $wpdb;
    $wpdb->query("ALTER TABLE ".$wpdb->prefix . "testme_tests ADD test_only_reg BINARY NOT NULL DEFAULT '0',
ADD test_show_points BINARY NOT NULL DEFAULT '0'");
    $wpdb->query("ALTER TABLE ".$wpdb->prefix."testme_stats ADD stat_user INT( 10 ) NOT NULL DEFAULT '0' AFTER stat_result,
ADD stat_points VARCHAR( 7 ) NULL ");

   update_option('testme_built', $testme_current);
   echo '<div class="updated"><p>Плагин TESTME обновлен.</p></div>';
    
}

//Добавляем ссылку для обновления в меню с плагинами, если надо
function testme_plugin_actions( $links, $file ) {
	$plugin_file = basename(__FILE__);
    global $testme_current;
    if(version_compare(get_option('testme_built'), $testme_current, '<'))
    {
        if (basename($file) == $plugin_file) {
            $settings_link = '<a href="plugins.php?plugin='.$plugin_file.'&action=upgrade">'.__('Обновить', 'testme').'</a>';
            array_unshift($links, $settings_link);
        }
	}
	return $links;
}
add_filter( 'plugin_action_links', 'testme_plugin_actions', 10, 2 );



// Страница с самими тестами
function testme_add_edit_page_menu() {
add_options_page('TESTME - Управление', 'TESTME - Управление', 9, ABSPATH . 'wp-content/plugins/wp_testme/testme_edit.php', '');
}

// Страница с настройками
function testme_add_option_page_menu() {
add_options_page('TESTME - Настройки', 'TESTME - Настройки', 9, ABSPATH . 'wp-content/plugins/wp_testme/testme_options.php', '');
}

// Страница со статистикой тестов
function testme_add_stat_page_menu() {
add_dashboard_page('TESTME - Статистика', 'TESTME - Статистика', 9, ABSPATH . 'wp-content/plugins/wp_testme/testme_stat.php', '');
}

//Добавляем страницы в меню
add_action('admin_menu', 'testme_add_edit_page_menu');
add_action('admin_menu', 'testme_add_option_page_menu');
add_action('admin_menu', 'testme_add_stat_page_menu');


add_filter('the_content', 'testme_scan_content');
function testme_scan_content($body) {
	if(strpos($body, 'TESTME') !== false) {

		if(preg_match('/(<!--|\[)\s*TESTME\s*(\d+)\s*(\]|-->)/', $body, $matches)) {

			$testme_id = $matches[2];

			if(is_numeric($testme_id)) { 
				ob_start();
				include(ABSPATH . 'wp-content/plugins/wp_testme/testme_show.php');
				$contents = ob_get_contents();
				ob_end_clean();

				$body = str_replace($matches[0], $contents, $body);
			}
		}
	}
	return $body;
}

 ?>