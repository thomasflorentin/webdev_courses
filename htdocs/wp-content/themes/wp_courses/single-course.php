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

    global $wp;
    $current_url = home_url(add_query_arg(array(),$wp->request)) . '/';


?>


<main id="content">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <aside class="sidebar ">

            <nav class="course_menu">
                
                <ul class="">

                    <li class="course_child">
                        <a href="<?php echo $root_title_url; ?>" class="course_child_link">
                            <?php echo get_the_title($root); ?>
                        </a>

                        <div class="">
                            <?php 
                            $term_obj_list = get_the_terms( $root, 'level' );
                            
                            if ( $term_obj_list && ! is_wp_error( $term_obj_list ) ) : 
            
                                $levels = array();
                            
                                foreach ( $term_obj_list as $term ) {
                                    $levels[] = $term->name;
                                }
                                                    
                                $level = join( ", ", $levels );
                                ?>
                            
                                <span class="card_meta"><?php printf( esc_html__( '%s', 'textdomain' ), esc_html( $level ) ); ?></span>

                            <?php endif; ?>

                        </div>
                    </li>

                    <?php 
                        foreach ( $children as $post ) :
                                                
                            setup_postdata($post); ?>
                            
                            <li class="course_child">
                                <a href="<?php the_permalink(); ?>" class="course_child_link  <?php if($current_url == get_permalink() ) { echo 'active'; } ?>">
                                    <?php the_title(); ?>
                                </a>
                            </li>
                        

                        <?php endforeach;
                        wp_reset_postdata(); 
                    ?>
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
            
            <footer class="footer">
                <?php //get_template_part( 'nav', 'below-single' ); ?>
            </footer>

        </section>
       

    </article>
    
    <?php endwhile; endif; ?>


</main>

<?php get_footer(); ?>