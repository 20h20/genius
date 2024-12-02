<?php
	function cbo_press() { 
		register_post_type( 'press',
		array( 'labels' => array(
			'name' => __( 'Articles de presse', 'bonestheme' ),
			'singular_name' => __( 'Article de presse', 'bonestheme' ),
			'all_items' => __( 'Tous les articles de presse', 'bonestheme' ), 
			'add_new' => __( 'Ajouter', 'bonestheme' ), 
			'add_new_item' => __( 'Ajouter un article de presse', 'bonestheme' ),
			'edit' => __( 'Modifier', 'bonestheme' ),
			'edit_item' => __( 'Modifier un article de presse', 'bonestheme' ),
			'new_item' => __( 'Nouvel article de presse', 'bonestheme' ),
			'view_item' => __( 'Voir l\'article de presse', 'bonestheme' ),
			'search_items' => __( 'Rechercher', 'bonestheme' ),
			'not_found' =>  __( 'Aucun article de presse trouvé.', 'bonestheme' ),
			'not_found_in_trash' => __( 'Aucun article de presse dans la corbeille', 'bonestheme' ),
			'parent_item_colon' => ''
		),
		'public' => false,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'show_ui' => true,
		'query_var' => true,
		'menu_position' => 3, 
		'menu_icon' => 'dashicons-welcome-write-blog',
		'rewrite'	=> array( 'slug' => 'article-de-presse', 'with_front'   => false ), // slug du single
		'has_archive' => 'nos-articles-de-presse', // slug de la page d'archive
		'capability_type' => 'post',
		'hierarchical' => true,
		'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
	)); }
	add_action( 'init', 'cbo_press');

	register_taxonomy( 'press_cat', 
		array('press'),
		array('hierarchical' => true,
			'labels' => array(
				'name' => __( 'Catégories articles de presse', 'bonestheme' ),
				'singular_name' => __( 'Catégories articles de presse', 'bonestheme' ),
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
			'rewrite' => array( 'slug' => 'nos-articles-de-presse' ),
		)
	);
?>