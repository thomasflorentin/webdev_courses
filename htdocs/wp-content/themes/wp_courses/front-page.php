<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div id="content" class="home">
    <div>

        <aside class="sidebar ">
            <nav class="home_menu">
                
                <?php the_field('hp_introduction', 'option'); ?>
                
            </nav>
        </aside>

        <main class="main">


            <section class="clearfix " >

                <h2 class="section_title">Actualités</h2> 

                <div class="cards_grid">
                    <?php 
                        $args = array( 'post_type' => 'post', 'posts_per_page' => 4 );
                        $the_query = new WP_Query( $args ); 
                    ?>

                    <?php if ( $the_query->have_posts() ) : ?>
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <?php get_template_part('template-parts/card', 'post'); ?>
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>

                </section>


            <section class="clearfix">
                <h2 class="section_title">Les derniers supports de cours</h2> 
                <div class="cards_grid">

                    <?php 
                        $args = array( 'post_type' => 'course', 'posts_per_page' => -1, 'post_parent' => 0 );
                        $the_query = new WP_Query( $args ); 
                    ?>

                    <?php if ( $the_query->have_posts() ) : ?>
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <?php get_template_part('template-parts/card', 'course'); ?>
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>

            </section>


 


            <section class="clearfix">
                <h2 class="section_title">Ressources externes</h2> 
                <div class="cards_grid">

                    <?php 
                        $args = array( 'post_type' => 'ressource', 'posts_per_page' => -1 );
                        $the_query = new WP_Query( $args ); 
                    ?>

                    <?php if ( $the_query->have_posts() ) : ?>
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <?php get_template_part('template-parts/card', 'ressource'); ?>
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>

            </section>

        </main> 

    </div>
</div>

<?php endwhile; endif; ?>


<?php //get_sidebar(); ?>
<?php get_footer(); ?>