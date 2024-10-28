<?php
	function cbo_faq() { 
		register_post_type( 'faq',
		array( 'labels' => array(
			'name' => __( 'FAQ', 'bonestheme' ),
			'singular_name' => __( 'FAQ', 'bonestheme' ),
			'all_items' => __( 'Toutes les FAQ', 'bonestheme' ), 
			'add_new' => __( 'Ajouter', 'bonestheme' ), 
			'add_new_item' => __( 'Ajouter une FAQ', 'bonestheme' ),
			'edit' => __( 'Modifier', 'bonestheme' ),
			'edit_item' => __( 'Modifier une FAQ', 'bonestheme' ),
			'new_item' => __( 'Nouvelle FAQ', 'bonestheme' ),
			'view_item' => __( 'Voir la FAQ', 'bonestheme' ),
			'search_items' => __( 'Rechercher', 'bonestheme' ),
			'not_found' =>  __( 'Aucune FAQ trouvée.', 'bonestheme' ),
			'not_found_in_trash' => __( 'Aucun FAQ dans la corbeille', 'bonestheme' ),
			'parent_item_colon' => ''
		),
		'public' => false,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'show_ui' => true,
		'query_var' => true,
		'menu_position' => 3, 
		'menu_icon' => 'dashicons-admin-comments',
		'rewrite'	=> array( 'slug' => 'faq', 'with_front'   => false ), // slug du single
		'has_archive' => 'nos-faq', // slug de la page d'archive
		'capability_type' => 'post',
		'hierarchical' => true,
		'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
	)); }
	add_action( 'init', 'cbo_faq');

	register_taxonomy( 'faq_cat', 
		array('faq'),
		array('hierarchical' => true,
			'labels' => array(
				'name' => __( 'Catégories', 'bonestheme' ),
				'singular_name' => __( 'Catégorie', 'bonestheme' ),
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
			'rewrite' => array( 'slug' => 'nos-faq' ),
		)
	);
?>