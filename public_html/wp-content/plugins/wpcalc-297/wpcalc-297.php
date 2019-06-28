<?php
/*
Plugin Name: Потери напряжения
Plugin URI: https://wpcalc.com/poteri-napryazheniya/
Description: После активации плагина, вставьте шорткод [wpcalc-297] там где хотите отобразить калькулятор
Version: 2.0
Author: Lobov Dmitriy
Author URI: https://wpcalc.com
*/
function show_wpcalc_297 () {
	 $lang = 'ru';
	 	
	
	 $file = plugin_dir_path(__FILE__).'calc/297.php'; 
     $scipt = plugin_dir_path(__FILE__).'js/297.js';
     $css = plugin_dir_path(__FILE__).'css/297.css';	 
	 
		 
	 $langjs = '<input type="hidden" id="lang" value="ru">';
	 $link = '';
	 
	 
	 ob_start();
	 include($file);
	 echo $langjs;
	 $calc = ob_get_contents();
	 echo $link;
	 ob_end_clean();
	 
	 wp_enqueue_script( 'wpcalc-jquery', plugins_url( '/asset/jquery.min.js', __FILE__ ));
     wp_enqueue_script( 'wpcalc-common', plugins_url( '/asset/common.js', __FILE__ ));
     wp_enqueue_script( 'wpcalc-alert', plugins_url( '/asset/alert.js', __FILE__ ));
     wp_enqueue_script( 'wpcalc-mask', plugins_url( '/asset/maskinput.js', __FILE__ ));
	 wp_enqueue_style ( 'wpcalc-main-style', plugins_url( '/asset/style.css', __FILE__ ));
	 if(file_exists($scipt)) {
		 wp_enqueue_script( 'wpcalc-script', plugins_url( '/js/297.js', __FILE__ ));
	 }
	 if(file_exists($css)) {
		 wp_enqueue_style( 'wpcalc-css', plugins_url( '/css/297.css', __FILE__ ));
	 }
	 	 	 
	 return $calc;
}
add_shortcode('wpcalc-297', 'show_wpcalc_297');