<?php get_header(); ?>

<main id="content">
    <div>
        <aside class="sidebar ">

            <nav class="home_menu">
                
                <?php the_content(); ?>
                
            </nav>
        </aside>

        <section class="main cards_grid">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <?php 
                    $args = array( 'post_type' => 'course', 'posts_per_page' => -1, 'post_parent' => 0 );
                    $the_query = new WP_Query( $args ); 
                ?>

                <?php if ( $the_query->have_posts() ) : ?>
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <a class="block course_card" href="<?php the_permalink(); ?>">
                            <h2 class="card_title"><?php the_title(); ?></h2>
                            <?php the_excerpt(); ?>
                        </a>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                <?php endif; ?>


            <?php endwhile; endif; ?>

        </section> 
    </div>
</main>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>