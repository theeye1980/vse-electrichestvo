<?php get_header(); ?>
    <main class="content col-sm-24 col-md-18">
        <div class="row">
            <div class="col-lg-24 ">
                <article class="row">
                    <div class="post_content col-lg-24">
                        <?php $query = new WP_Query( 'page_id=2999' );  ?>
                        <?php if(have_posts()) : while($query->have_posts()) : $query->the_post(); ?>
							<h1><?php the_title(); ?></h1>
							<div class="desc">
								<?php the_content(); ?>
							</div>
							<?php endwhile; else : ?>
							<?php endif; ?>
                        	<?php wp_reset_query(); ?>
                    </div>
                </article>
                
				<?php dynamic_sidebar( 'sidebar-index' ); ?>
				
				<h2>Последние публикации</h2>
                <?php bh_related_post(); ?>

                <article class="row">
                    <div id="home_page" class="post_content col-lg-24">
                        <?php $query = new WP_Query( 'page_id=3002' );  ?>
                        <?php if(have_posts()) : while($query->have_posts()) : $query->the_post(); ?>
							<h2><?php the_title(); ?></h2>
							<div class="desc">
								<?php the_content(); ?>
							</div>
                        <?php endwhile; else : ?>
                        <?php endif; ?>
                        <?php wp_reset_query(); ?>
                        </div>
                </article>
            </div>
        </div>
    </main>
    
    <aside class="col-sm-24 col-md-6">
        <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
        <?php endif; ?>
    </aside>
    <!-- .content -->
<?php get_footer(); ?>