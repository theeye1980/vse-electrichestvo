<?php
/**
 * @package BH Related Post
 * @version 1.0
 */
/*
Plugin Name: BH Related Post
Plugin URI: http://wordpress.org/plugins/bh-related-post
Description: This plugin for Related post. This plugin will display your related post with jcarousel slider. It's build with jquery ui jcarsoul plugin.
Author: Masum Billah
Version: 1.0
Author URI: http://getmasum.com
*/



function bh_related_post_scripts_method() {
// including css file
 wp_enqueue_style('bh_related_post_jcarousel_css', plugins_url('/lib/jcarousel.responsive.css', __FILE__) );
 
// including js file
wp_enqueue_script( 'jquery' );
wp_enqueue_script( 'bh_related_post_jcarousel', plugins_url( '/lib/jquery.jcarousel.min.js', __FILE__ ), array( 'jquery' ) );
wp_enqueue_script( 'bh_related_post_jcarousel_responsive', plugins_url( '/lib/jcarousel.responsive.js', __FILE__ ), array( 'jquery' ));

}

add_action( 'wp_enqueue_scripts', 'bh_related_post_scripts_method' );

function bh_related_post (){ 

	$backup = $post; // backup current object
	$current = $post->ID; // current page ID
	$catename = $cate->cat_name;
	global $post;
	$thisCat = get_the_category(); // gets the current categori(es)
	$currentCategory = $thisCat[0]->cat_ID; // gets the primary category
	$stepper = 1; // default value for the counter
	
	
	if ($video>0) { 

	} else {
	$mypostik = get_posts('orderby=rand&numberposts=10');
	}	

	?> 
	<div class="widget-title"><?php echo get_cat_name($cate); ?></div>
	  <div class="jcarousel-wrapper">	 
		<div class="jcarousel">
			<ul>
			<?php 
			
			if ($video<1 and $news<1) { 
				foreach($mypostik as $post) : setup_postdata($post); // The Loop
				
		
// данный код извлекает url картинки Вашей миниатюры Wordpress

$url = wp_get_attachment_url( get_post_thumbnail_id() );
$image = aq_resize( $url, 150,120,true);

			?>
				<li><a href="<?php the_permalink();?>"><?php echo "<div class='imgzoom'><img src='$image' alt='".get_the_title()."'></div>"; ?><div class="hjk"><?php the_title();?></div></a></li>
				<?php
				$stepper = ($stepper+1); // stepper + 1
				endforeach; 
				} 
				elseif($news>0) {
					foreach($myposts as $post) : setup_postdata($post); // The Loop
				
		
// данный код извлекает url картинки Вашей миниатюры Wordpress

$url = wp_get_attachment_url( get_post_thumbnail_id() );
$image = aq_resize( $url, 230,230,true);

			?>
				<li><a href="<?php the_permalink();?>"><?php echo "<div class='imgzoom'><img src='$image' alt='".get_the_title()."'></div>"; ?><div class="hjk"><?php the_title();?></div></a></li>
				<?php
				$stepper = ($stepper+1); // stepper + 1
				endforeach; 
				
				
				} else {
				
				
foreach ($cate as $vid) { ?>

	<li><iframe width="250" height="250" src="//www.youtube.com/embed/<?php echo $vid; ?>" frameborder="0" allowfullscreen></iframe></li>
	<?php $stepper = ($stepper+1); // stepper + 1 ?>

	
	<?php } ?>
			
				
				
			<?php	}
			?> 
			<?php
				$post = $backup; //restore current object
				wp_reset_query();
			?>
			</ul>
		</div>

		<a href="#" class="jcarousel-control-prev">&lsaquo;</a>
		<a href="#" class="jcarousel-control-next">&rsaquo;</a>
	</div>
	<?php 
}