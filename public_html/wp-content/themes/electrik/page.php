<?php get_header(); ?>
    <main class="col-sm-24 col-md-18 content content_page">
        <article class="single_content">
            <?php while ( have_posts() ) : the_post(); ?>
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>





            <?php endwhile; ?>
        </article>
    </main>
    <!-- .content -->

    <aside class="sidebar col-sm-24 col-md-6">
        <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
           	<?php dynamic_sidebar( 'sidebar-1' ); ?>
        <?php endif; ?>
    </aside>


<?php get_footer(); ?>