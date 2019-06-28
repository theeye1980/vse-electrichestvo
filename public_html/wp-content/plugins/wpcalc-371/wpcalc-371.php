<?php
/*
Plugin Name: Мощность ТЭНа
Plugin URI: https://wpcalc.com/moshhnost-tena/
Description: После активации плагина, вставьте шорткод [wpcalc-371] там где хотите отобразить калькулятор
Version: 2.0
Author: Lobov Dmitriy
Author URI: https://wpcalc.com
*/
function show_wpcalc_371 () {
	 $lang = 'ru';
	 	
	
	 $file = plugin_dir_path(__FILE__).'calc/371.php'; 
     $scipt = plugin_dir_path(__FILE__).'js/371.js';
     $css = plugin_dir_path(__FILE__).'css/371.css';	 
	 
		 
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
		 wp_enqueue_script( 'wpcalc-script', plugins_url( '/js/371.js', __FILE__ ));
	 }
	 if(file_exists($css)) {
		 wp_enqueue_style( 'wpcalc-css', plugins_url( '/css/371.css', __FILE__ ));
	 }
	 	 	 
	 return $calc;
}
add_shortcode('wpcalc-371', 'show_wpcalc_371');