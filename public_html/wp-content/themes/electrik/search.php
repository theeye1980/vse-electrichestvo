<?php get_header(); ?>
	<main class="content search-res category_content col-sm-24 col-md-18">	
		<h1>Результаты поиска</h1>





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
						<p>
							<?php $my_descr = get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true);
							if ($my_descr){
							echo  "<p>$my_descr...</p>"; } else { ?>
							<!--noindex-->
								<?php echo  the_excerpt(); ?>
							<!--/noindex-->
							<?php } ?>
                    	</p>
                    </div>
                </section>
			<?php endwhile; ?>
		</div>
		<?php wp_pagenavi(); ?>



	</main><!-- .content -->
    <aside class="col-sm-24 col-md-6">
        <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		<?php endif; ?>
   </aside>
<?php get_footer(); ?>