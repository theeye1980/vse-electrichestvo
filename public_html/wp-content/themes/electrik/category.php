<?php get_header(); ?>
    <main class="content category_content col-sm-24 col-md-18">
        <h1><?php echo single_cat_title(); ?></h1>


<div style="float: left; margin-right: 10px">
					<script src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js" async=""></script>
 <!-- Середина статьи (Все-электрик) -->
 <ins class="adsbygoogle" style="display: inline-block; width: 336px; height: 280px;" data-ad-client="ca-pub-5952356839175812" data-ad-slot="1095972687"></ins>
<script>// <![CDATA[
(adsbygoogle = window.adsbygoogle || []).push({});
// ]]></script>
</div>
<div style="float: left; margin-right: 10px">
<script src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js" async=""></script>
 <!-- Середина статьи (Все-электрик) -->
 <ins class="adsbygoogle" style="display: inline-block; width: 336px; height: 280px;" data-ad-client="ca-pub-5952356839175812" data-ad-slot="1095972687"></ins>
<script>// <![CDATA[
(adsbygoogle = window.adsbygoogle || []).push({});
// ]]></script></div><div style="clear: both;"></div>


        <?php if ( $paged < 2 ) { ?>    








			<?php $top_desc = get_field( "desc", 'category_'.$cat ); 
			if($top_desc){ ?>
			<div class="single_content"><?php echo $top_desc; ?></div>
		<?php	} } ?>
        




        <div class="row content-prew">
            <?php while ( have_posts() ) : the_post(); ?>
                <section class="col-sm-24 col-xs-24 news-block">
                    <div class="prew">
                        <figure class="thumb">
                            <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
							$img = aq_resize($url, 313,180,true);
							echo "<a href=".get_permalink()."><img src=$img alt='".get_the_title()."'>"; ?>
                            </a>
                        </figure>
                        <h2 class="figcaption">
                            <a href="<?php echo get_permalink() ?>"><?php the_title(); ?></a>
                        </h2>

							<?php $my_descr = get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true);
							if ($my_descr){
							echo  "<p>$my_descr...</p>";
							} else { ?>
							<p>
							<!--noindex-->
							<?php echo  the_excerpt(); ?>
							<!--/noindex-->
							</p>
							<?php } ?>
                   		<span class="home_reit"><span class="reit1">Рейтинг: </span>
		<?php 
		$ratings_custom = intval(get_option('postratings_customrating'));
		$ratings_image = get_option( 'postratings_image' );
		$base_name = plugin_basename( 'wp-postratings/postratings-manager.php' );
		$base_page = admin_url( 'admin.php?page=' . urlencode( $base_name ) );
		$postratings_sort_url = '';
		$postratings_sortby_text = '';
		$postratings_sortorder_text = '';
		$ratings_image = get_option( 'postratings_image' );
		$ratings_max = intval( get_option( 'postratings_max' ) );
		$post_rating = get_post_meta($post->ID, 'ratings_average');
		$ratings_users = get_post_meta($post->ID, 'ratings_users');
		if ($post_rating[0]>0) {
			echo get_ratings_images($ratings_custom, $ratings_max, $post_rating[0], $ratings_image, 1, true);
			echo "<span class='reit2'>".$post_rating[0]."/".$ratings_users[0]." голосов</span>";
		} else {
			echo '<img src="http://vse-elektrichestvo.ru/wp-content/plugins/wp-postratings/images/stars_crystal/rating_off.gif" alt="1"><img src="http://vse-elektrichestvo.ru/wp-content/plugins/wp-postratings/images/stars_crystal/rating_off.gif" alt="1"><img src="http://vse-elektrichestvo.ru/wp-content/plugins/wp-postratings/images/stars_crystal/rating_off.gif" alt="1"><img src="http://vse-elektrichestvo.ru/wp-content/plugins/wp-postratings/images/stars_crystal/rating_off.gif" alt="1"><img src="http://vse-elektrichestvo.ru/wp-content/plugins/wp-postratings/images/stars_crystal/rating_off.gif" alt="1">';
		} ?> 
	</span>
                    	
                    </div>
                </section>
            <?php endwhile; ?>
        </div>
        <?php wp_pagenavi(); ?>


<style>
.Pod_elektrika { width: 300px; height: 250px; }
@media(min-width: 500px) { .Pod_elektrika { width: 336px; height: 280px; } }
@media(min-width: 800px) { .Pod_elektrika { width: 580px; height: 400px; } }
</style>
<center><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Pod_elektrika -->
<ins class="adsbygoogle Pod_elektrika"
     style="display:inline-block"
     data-ad-client="ca-pub-5952356839175812"
     data-ad-slot="4597714285"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script></center>

        <div style="clear: both;"></div>
        <?php if ( $paged < 2 ) { ?>
			<div class="single_content">
			<?php echo category_description(); ?>
			</div>
		<?php } ?>
    </main>
    <!-- .content -->
    <aside class="col-sm-24 col-md-6">
        <div class="sidebar">
            <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
                <?php dynamic_sidebar( 'sidebar-1' ); ?>
            <?php endif; ?>
        </div>
    </aside>
<?php get_footer(); ?>