<?php get_header(); ?>

    <main class="content col-sm-24 col-md-18">
        <article class="single_content">
            <?php while ( have_posts() ) : the_post(); ?>
                <h1 class=""><?php the_title(); ?></h1>
<?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(' » '); ?>

                <?php the_content(); ?>

<div class="bottom-new-meta">
	<div class="l-meta">
          
      <script type="text/javascript">(function() {
  if (window.pluso)if (typeof window.pluso.start == "function") return;
  if (window.ifpluso==undefined) { window.ifpluso = 1;
    var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
    s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
    s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
    var h=d[g]('body')[0];
    h.appendChild(s);
  }})();</script>

<div class="pluso" data-background="transparent" data-options="medium,round,line,horizontal,nocounter,theme=03" data-services="vkontakte,odnoklassniki,facebook,twitter,google,moimir,email,print"></div>
</div>
	
<div class="r-meta">
<?php if(function_exists('the_ratings')) { the_ratings(); } ?>
</div>
<div style="clear:both;"></div>
</div>
<div style="border-left: 4px solid #FEDB33; padding-left: 10px">
<!-- Yandex.Direct D-A-281870-1 -->
<div id="yandex_direct_D-A-281870-1"></div>
<script type="text/javascript">
    (function(w, d, n, s, t) {
        w[n] = w[n] || [];
        w[n].push(function() {
            Ya.Context.AdvManager.render({
                blockId: "D-A-281870-1",
                renderTo: "yandex_direct_D-A-281870-1",
                searchText: "поисковый запрос",
                searchPageNumber: 1
            });
        });
        t = d.getElementsByTagName("script")[0];
        s = d.createElement("script");
        s.type = "text/javascript";
        s.src = "//an.yandex.ru/system/context.js";
        s.async = true;
        t.parentNode.insertBefore(s, t);
    })(this, this.document, "yandexContextAsyncCallbacks");
</script>
</div>

            <?php endwhile; ?>
        </article>
        <div class="related">
            <h3>Похожие статьи по теме</h3>
            <ul class="content-prew">
                <?php kama_previous_posts_from_cat (6);  ?>
            </ul>
            <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 0;
			$cat = get_the_category($post->ID);
			$cat_id = (int) $cat[0]->term_id;
			array_push($GLOBALS['arruse'], $post->ID);
			$args = array('showposts' => 20, 'post__not_in' => $GLOBALS['arruse'], 'cat' => $cat_id, 'orderby' => 'rand');
			$wp_query = new WP_Query($args);
				if (  $wp_query->max_num_pages > 1 or $wp_query->max_num_pages == 1) : ?>
					<script>
						var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
						var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
						var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 0; ?>;
						var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
					</script>
									<div id="true_loadmore">Показать ещё</div>
				<?php endif; ?>
       		<?php wp_reset_query(); ?>
        </div>
        <div style="clear:both;"></div>


<center><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-format="autorelaxed"
     data-ad-client="ca-pub-4260259489310063"
     data-ad-slot="2265581204"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script></center>
		
		<style>
.Pod_elektrika { width: 300px; height: 250px; }
@media(min-width: 500px) { .Pod_elektrika { width: 336px; height: 280px; } }
@media(min-width: 800px) { .Pod_elektrika { width: 580px; height: 400px; } }
</style>
<center><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Pod_elektrika  580x400 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:580px;height:400px"
     data-ad-client="ca-pub-4260259489310063"
     data-ad-slot="2512127248"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script></center>


            <!--noindex-->
            <div class="comments">
                <?php echo comments_template(); ?>

            </div>
            <!--/noindex-->
    </main>
    <!-- .content -->
    <aside class="col-sm-24 col-md-6">
        <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
            <?php dynamic_sidebar( 'sidebar-1' ); ?>
        <?php endif; ?>
    </aside>
<?php get_footer(); ?>