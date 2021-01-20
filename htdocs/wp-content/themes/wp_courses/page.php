<?php get_header(); ?>




<main id="content">


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <aside class="sidebar ">

        <nav class="course_menu">

            <ul class="">

                <li class="course_child">
                    <a class="course_child_link">
                        Actualités
                    </a>
                </li>

                <?php
                    $recent_posts = wp_get_recent_posts(array(
                        'numberposts' => 10, 
                        'post_status' => 'publish'
                    ));
                    foreach($recent_posts as $post) : ?>
                        <li class="course_child">
                            <a href="<?php the_permalink(); ?>" class="course_child_link  <?php if($current_url == get_permalink() ) { echo 'active'; } ?>">
                                <?php the_title(); ?>
                            </a>
                        </li>
                    <?php endforeach; wp_reset_query(); ?>

            </ul>
            
        </nav>
    </aside>


    <section class="main course_content">

        <header class="course_head">
            <h1><?php the_title(); ?></h1>
        </header>

        <div class="">
            <?php the_content(); ?>
        </div>

    </section>


<?php endwhile; endif; ?>


</main>




<?php get_footer(); ?>