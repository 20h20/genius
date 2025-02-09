<?php
	function cbo_news() { 
		register_post_type( 'news',
		array( 'labels' => array(
			'name' => __( 'Actualités', 'bonestheme' ),
			'singular_name' => __( 'Actualité', 'bonestheme' ),
			'all_items' => __( 'Toutes les actualités', 'bonestheme' ), 
			'add_new' => __( 'Ajouter', 'bonestheme' ), 
			'add_new_item' => __( 'Ajouter une actualité', 'bonestheme' ),
			'edit' => __( 'Modifier', 'bonestheme' ),
			'edit_item' => __( 'Modifier une actualité', 'bonestheme' ),
			'new_item' => __( 'Nouvelle actualité', 'bonestheme' ),
			'view_item' => __( 'Voir l\actualité', 'bonestheme' ),
			'search_items' => __( 'Rechercher', 'bonestheme' ),
			'not_found' =>  __( 'Aucune actualité trouvée.', 'bonestheme' ),
			'not_found_in_trash' => __( 'Aucune actualité dans la corbeille', 'bonestheme' ),
			'parent_item_colon' => ''
		),
		'description' => __( 'Ceci est un témoignage d\'exemple', 'bonestheme' ),
		'public' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'show_ui' => true,
		'query_var' => true,
		'menu_position' => 4, 
		'menu_icon' => 'dashicons-format-aside',
		'rewrite'	=> array( 'slug' => 'actualite', 'with_front'   => false ), // slug du single
		'has_archive' => 'nos-actualites', // slug de la page d'archive
		'capability_type' => 'post',
		'hierarchical' => true,
		'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
	)); }
	add_action( 'init', 'cbo_news');
?>