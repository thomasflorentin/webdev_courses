    <a class="block course_card" href="<?php the_permalink(); ?>">
        <div>

            <h2 class="card_title"><?php the_title(); ?></h2>

            <div class="card_metas">
                <?php 
                $term_obj_list = get_the_terms( $post->ID, 'level' );
                
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

            <?php 
                $children = get_pages( 
                    array(
                        'post_type' => 'course',
                        'child_of' => get_the_ID(),
                        'sort_column'   => 'menu_order'
                    )
                );

                foreach ( $children as $post ) :
                                        
                    setup_postdata($post); ?>
                    <span class=""><?php the_title(); ?> - </span>

                <?php endforeach;
                wp_reset_postdata(); 
            ?>
        
        </div>

        <span class="card_cta">Voir ce support</span>
    </a>