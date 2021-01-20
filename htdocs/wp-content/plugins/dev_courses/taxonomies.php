<?php

function webdev_taxonomies_init() {
	global $wp_taxonomies;

	register_taxonomy('level', array( 'post', 'course', 'ressource' ), array(
		'hierarchical' => false,
		'show_ui' => true,
		'query_var' => true,
 		'show_admin_column' => true,
 		'rewrite' => array( 'slug' => 'niveau' ),
		'labels'	=>	array(
		    'name' => 'Niveaux',
		    'singular_name' => 'Niveau',
		    'all_items' => 'Tous les niveaux',
		    'add_new_item' => "Créer un nouveau niveau",
		  )
	));

}
add_action('init', 'webdev_taxonomies_init', 0); 