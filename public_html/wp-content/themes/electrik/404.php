<?php get_header(); ?>
    <main class="content col-sm-24 col-md-18">
        <article class="single_content">
          	<h1 class="video-title">Извините, по вашему запросу ничего не найдено...</h1>
        </article>
    </main>
    <!-- .content -->
    <aside class="col-sm-24 col-md-6">
        <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
            <?php dynamic_sidebar( 'sidebar-1' ); ?>
        <?php endif; ?>
    </aside>
<?php get_footer(); ?>