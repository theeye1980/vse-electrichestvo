<?php
/*
Plugin Name: Преобразование Ватт в Ампер
Plugin URI: https://wpcalc.com/preobrazovanie-vatt-v-amper/
Description: После активации плагина, вставьте шорткод [wpcalc-209] там где хотите отобразить калькулятор
Version: 2.0
Author: Lobov Dmitriy
Author URI: https://wpcalc.com
*/
function show_wpcalc_209 () {
	 $lang = 'ru';
	 	
	
	 $file = plugin_dir_path(__FILE__).'calc/209.php'; 
     $scipt = plugin_dir_path(__FILE__).'js/209.js';
     $css = plugin_dir_path(__FILE__).'css/209.css';	 
	 
		 
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
		 wp_enqueue_script( 'wpcalc-script', plugins_url( '/js/209.js', __FILE__ ));
	 }
	 if(file_exists($css)) {
		 wp_enqueue_style( 'wpcalc-css', plugins_url( '/css/209.css', __FILE__ ));
	 }
	 	 	 
	 return $calc;
}
add_shortcode('wpcalc-209', 'show_wpcalc_209');