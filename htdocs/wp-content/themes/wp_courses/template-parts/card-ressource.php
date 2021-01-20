    <a class="block ressource_card" href="<?php the_permalink(); ?>">
        <div>

            <h2 class="ressource_title"><?php the_title(); ?></h2>
            
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

        </div>

        <span class="card_cta">Voir les ressources</span>
    </a>