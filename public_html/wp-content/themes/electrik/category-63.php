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
        

   <div class="let">
	   <strong>Искать по алфавиту: </strong>
				<?php
				$args     = [
					'orderby'          => 'title',
					'order'            => 'ASC',
					'cat'              => 63,
					'posts_per_page'   => - 1,
					'caller_get_posts' => 1,
				]; // задаем условия выборки постов
				$my_query = new WP_Query( $args );
				if ( $my_query->have_posts() ) {
					while ( $my_query->have_posts() ) : $my_query->the_post();
						$this_char = mb_substr( $post->post_title, 0, 1 );
						if ( $this_char != $last_char ) {
							$last_char = $this_char;
							echo '<a href="#' . $last_char . '" rel="nofollow">' . $last_char . '</a>'; // первая буква записи
						} ?>
						<?php
					endwhile;
				}
				wp_reset_query();
				?>
      </div>
      <!--/noindex-->
      <div class="letters">
				<?php
				$args     = [
					'orderby'          => 'title',
					'order'            => 'ASC',
					'cat'              => 63,
					'posts_per_page'   => - 1,
					'caller_get_posts' => 1,
				]; // задаем условия выборки постов
				$my_query = new WP_Query( $args );
				$i        = 0;
				if ( $my_query->have_posts() ) {
					while ( $my_query->have_posts() ) : $my_query->the_post();
						$i ++;
						$this_char = mb_substr( $post->post_title, 0, 1 );
						if ( $i != 1 and $this_char != $last_char ) {
							echo "</div>";
						}

						if ( $this_char != $last_char ) {
							$last_char = $this_char;
							echo '<div class="let-block">
<h3><a name="' . $last_char . '">' . $last_char . '</a></h3>'; // первая буква записи
						} ?>

            <div id="post-<?php the_ID(); ?>" class="term-post">
              <a href="<?php echo esc_url( get_permalink() ); ?>">
							 <span class="cat-post-title">
							 	<?php the_title(); ?>
							 </span>
              </a>
            </div><!-- #post-## -->
						<?php
					endwhile;
				}
				wp_reset_query();
				?>
      </div>


      <script type="text/javascript">
        jQuery(document).ready(function ($) {
          $(this).on('click', 'a[href^=#]', function () {
            $('html, body').animate({scrollTop: $('a[name="' + this.hash.slice(1) + '"]').offset().top - 80}, 1000);
            return false;
          });
        });
      </script>


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