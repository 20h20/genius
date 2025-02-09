<?php

	function remove_admin_login_header() {
		remove_action('wp_head', '_admin_bar_bump_cb');
	}
	add_action('get_header', 'remove_admin_login_header');

	// Hooks
	add_filter( 'upload_mimes', 'cbo_mime_types' );
	add_filter( 'wp_check_filetype_and_ext', 'cbo_file_types', 10, 4 );

	// Autoriser l'import des fichiers SVG et WEBP
	function cbo_mime_types( $mimes ){
		$mimes['svg'] = 'image/svg+xml';
		$mimes['webp'] = 'image/webp';
		return $mimes;
	}

	// Contrôle de l'import d'un WEBP
	function cbo_file_types( $types, $file, $filename, $mimes ) {
		if ( false !== strpos( $filename, '.webp' ) ) {
			$types['ext'] = 'webp';
			$types['type'] = 'image/webp';
		}
		return $types;
	}

	// Nettoyage de l'adminbar du back office - Items principaux
	function wps_admin_bar() {
		global $wp_admin_bar;
		$wp_admin_bar->remove_node('wp-logo');
		$wp_admin_bar->remove_node('comments');
		$wp_admin_bar->remove_node('wpseo-menu');
	}
	add_action( 'wp_before_admin_bar_render', 'wps_admin_bar' );

	// Nettoyage du menu du back office - Items principaux
	add_action( 'admin_init', function () {
		remove_menu_page( 'edit-comments.php' );
		remove_menu_page( 'admin.php?page=social-warfare' );
	});

	// Suppression des widgets du Dashboard
	function remove_dashboard_meta() {
		remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal'); //Removes the 'incoming links' widget
		remove_meta_box('dashboard_plugins', 'dashboard', 'normal'); //Removes the 'plugins' widget
		remove_meta_box('dashboard_primary', 'dashboard', 'normal'); //Removes the 'WordPress News' widget
		remove_meta_box('dashboard_secondary', 'dashboard', 'normal'); //Removes the secondary widget
		remove_meta_box('dashboard_quick_press', 'dashboard', 'side'); //Removes the 'Quick Draft' widget
		remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side'); //Removes the 'Recent Drafts' widget
		remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); //Removes the 'Activity' widget
		remove_meta_box('wpseo-dashboard-overview', 'dashboard', 'normal'); //Removes the 'Yoast' widget
		remove_meta_box('dashboard_site_health', 'dashboard', 'normal'); //Removes the 'Health site' widget 
		remove_meta_box('wordfence_activity_report_widget', 'dashboard', 'normal'); //Removes the 'Wordfence plugin' widget 
	}
	add_action('admin_init', 'remove_dashboard_meta'); 

	/* Pied de page administration */
	function remove_footer_admin () {
		echo 'Proudly handcrafted by <a href="http:http://julien-brochard.fr/">Julien B</a>';
	}
	add_filter('admin_footer_text', 'remove_footer_admin');

?>