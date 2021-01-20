<?php get_header(); ?>




<main id="content">


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <aside class="sidebar ">

        <nav class="course_menu">

            <?php wp_link_pages(); ?>
            
        </nav>
    </aside>


    <section class="main course_content">

        <header class="course_head">
            <h1><?php the_title(); ?></h1>
        </header>

        <div class="">
            <?php the_content(); ?>
        </div>

        <footer class="footer">
            <?php get_template_part( 'nav', 'below-single' ); ?>
        </footer>

    </section>


<?php endwhile; endif; ?>


</main>




<?php get_footer(); ?>