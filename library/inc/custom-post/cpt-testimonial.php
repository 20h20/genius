<?php
	function cbo_testimonials() { 
		register_post_type( 'testimonials',
		array( 'labels' => array(
			'name' => __( 'Témoignages', 'bonestheme' ),
			'singular_name' => __( 'Témoignage', 'bonestheme' ),
			'all_items' => __( 'Tous les témoignages', 'bonestheme' ), 
			'add_new' => __( 'Ajouter', 'bonestheme' ), 
			'add_new_item' => __( 'Ajouter un témoignage', 'bonestheme' ),
			'edit' => __( 'Modifier', 'bonestheme' ),
			'edit_item' => __( 'Modifier un témoignage', 'bonestheme' ),
			'new_item' => __( 'Nouveau témoignage', 'bonestheme' ),
			'view_item' => __( 'Voir le témoignage', 'bonestheme' ),
			'search_items' => __( 'Rechercher', 'bonestheme' ),
			'not_found' =>  __( 'Aucun témoignage trouvé.', 'bonestheme' ),
			'not_found_in_trash' => __( 'Aucun témoignage dans la corbeille', 'bonestheme' ),
			'parent_item_colon' => ''
		),
		'description' => __( 'Ceci est un témoignage d\'exemple', 'bonestheme' ),
		'public' => false,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'show_ui' => true,
		'query_var' => true,
		'menu_position' => 3, 
		'menu_icon' => 'dashicons-format-quote',
		'rewrite'	=> array( 'slug' => 'temoignage', 'with_front'   => false ), // slug du single
		'has_archive' => 'nos-temoignages', // slug de la page d'archive
		'capability_type' => 'post',
		'hierarchical' => true,
		'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
	)); }
	add_action( 'init', 'cbo_testimonials');

	register_taxonomy( 'testimonials_cat', 
		array('testimonials'),
		array('hierarchical' => true,
			'labels' => array(
				'name' => __( 'Catégories témoignages', 'bonestheme' ),
				'singular_name' => __( 'Catégories témoignages', 'bonestheme' ),
				'search_items' =>  __( 'Rechercher', 'bonestheme' ),
				'all_items' => __( 'Toutes les catégories', 'bonestheme' ),
				'parent_item' => __( 'Catégories parentes', 'bonestheme' ),
				'parent_item_colon' => __( 'Catégorie parente', 'bonestheme' ),
				'edit_item' => __( 'Modifier la catégorie', 'bonestheme' ),
				'update_item' => __( 'Mettre à jour', 'bonestheme' ),
				'add_new_item' => __( 'Ajouter', 'bonestheme' ),
				'new_item_name' => __( 'Nouveau nom', 'bonestheme' )
			),
			'show_admin_column' => true, 
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'nos-temoignages' ),
		)
	);
?>