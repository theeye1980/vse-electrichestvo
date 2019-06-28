<?php
/*
Plugin Name: Энергия в конденсаторе
Plugin URI: https://wpcalc.com/energiya-v-kondensatore/
Description: После активации плагина, вставьте шорткод [wpcalc-241] там где хотите отобразить калькулятор
Version: 2.0
Author: Lobov Dmitriy
Author URI: https://wpcalc.com
*/
function show_wpcalc_241 () {
	 $lang = 'ru';
	 	
	
	 $file = plugin_dir_path(__FILE__).'calc/241.php'; 
     $scipt = plugin_dir_path(__FILE__).'js/241.js';
     $css = plugin_dir_path(__FILE__).'css/241.css';	 
	 
		 
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
		 wp_enqueue_script( 'wpcalc-script', plugins_url( '/js/241.js', __FILE__ ));
	 }
	 if(file_exists($css)) {
		 wp_enqueue_style( 'wpcalc-css', plugins_url( '/css/241.css', __FILE__ ));
	 }
	 	 	 
	 return $calc;
}
add_shortcode('wpcalc-241', 'show_wpcalc_241');