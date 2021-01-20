    <a class="block course_card" href="<?php the_permalink(); ?>">
        <div>

            <h2 class="card_title"><?php the_title(); ?></h2>

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