<?php get_header(); ?>


<?php 

    $my_wp_query = new WP_Query();
    $pages = $my_wp_query->query(array('post_type' => 'course'));

    $ancestors = get_post_ancestors($post);
    $level = count($ancestors);
    $ariane = '';

    if( $level == 0 ) {
        $root = get_the_ID();
        $root_title = get_the_title($root) . ' <span class="sep">></span> ';
        $root_title_url = get_permalink($root);	
    } 
    else {
        $root = end($ancestors);
        $root_title = get_the_title($root) . ' <span class="sep">></span> ';
        $root_title_url = get_permalink($root);	
    }

    $children = get_pages( 
        array(
            'post_type' => 'course',
            'child_of' => $root,
            'sort_column'   => 'menu_order'
        )
    );


    switch ($level) {
        case 0:
            $ariane = '<h1 class="entry-title">' . get_the_title() . '</h1>';
            break;

        case 1:
            $ariane = '<div class="entry-title"><a class="" href="' . $root_title_url . '">' . $root_title .'</a> <h1 class="">' . get_the_title() . '</h1></div>';
            break;

        default:
            break;
    }




?>


<main id="content">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <nav class="course_intro">
            
            <ul class="">

                <li class="course_child">
                    <a href="<?php echo $root_title_url; ?>" class="course_child_link">
                        <?php echo get_the_title($root); ?>
                    </a>
                </li>

                <?php 
                    foreach ( $children as $post ) :
                                            
                        setup_postdata($post); ?>
                        
                        <li class="course_child">
                            <a href="<?php the_permalink(); ?>" class="course_child_link">
                                <?php the_title(); ?>
                            </a>
                        </li>
                    

                    <?php endforeach;
                    wp_reset_postdata(); 
                ?>
            </ul>
            
        </nav>

        <section class="course_content">

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
       

    </article>
    
    <?php endwhile; endif; ?>


</main>

<?php get_footer(); ?>