<?php


 
function custom_post_type() {
 
    // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( 'Cours', 'Post Type General Name', 'webdevcourses-plugin' ),
            'singular_name'       => _x( 'Cours', 'Post Type Singular Name', 'webdevcourses-plugin' ),
            'menu_name'           => __( 'Cours', 'webdevcourses-plugin' ),
            'parent_item_colon'   => __( 'Cours parent', 'webdevcourses-plugin' ),
            'all_items'           => __( 'Tous les Cours', 'webdevcourses-plugin' ),
            'view_item'           => __( 'Voir le Cours', 'webdevcourses-plugin' ),
            'add_new_item'        => __( 'Ajouter un nouveau Cours', 'webdevcourses-plugin' ),
            'add_new'             => __( 'Ajouter un cours', 'webdevcourses-plugin' ),
            'edit_item'           => __( 'Editer Course', 'webdevcourses-plugin' ),
            'update_item'         => __( 'Mettre à jour le Cours', 'webdevcourses-plugin' ),
            'search_items'        => __( 'Rechercher Cours', 'webdevcourses-plugin' ),
            'not_found'           => __( 'Not Found', 'webdevcourses-plugin' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'webdevcourses-plugin' ),
        );
         
    // Set other options for Custom Post Type
         
        $args = array(
            'label'               => __( 'course', 'wp_courses' ),
            'description'         => __( 'Support de cours', 'wp_courses' ),
            'labels'              => $labels,
            // Features this CPT supports in Post Editor
            'supports'            => array( 'page', 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions',  'page-attributes' ),
            // You can associate this CPT with a taxonomy or custom taxonomy. 
            'taxonomies'          => array( 'category', 'post_tag' ),
            'hierarchical'        => true,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
            'show_in_rest' => true,
     
        );
         
        // Registering your Custom Post Type
        register_post_type( 'course', $args );
     
}
add_action( 'init', 'custom_post_type', 0 );

