<?php
	add_action( 'init', 'cbo_clean_head' );
	add_action( 'wp_enqueue_scripts', 'cbo_scripts_and_styles', 999 );
	add_filter( 'the_generator', 'cbo_remove_rss_version' );
	add_filter( 'protected_title_format', 'cbo_remove_protected_text' );
	add_filter( 'gallery_style', 'cbo_remove_gallery_style' );
	add_filter( 'script_loader_tag', 'cbo_add_defer_attribute', 10, 2 );

	remove_filter('pre_term_description', 'wp_filter_kses');
	remove_filter('term_description', 'wp_kses_data');

	/* Nettoyage du wp_head */
	function cbo_clean_head() {
		remove_action( 'wp_head', 'rsd_link' );
		remove_action( 'wp_head', 'wlwmanifest_link' );
		remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
		remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
		remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
		remove_action( 'wp_head', 'wp_generator' );
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		add_filter( 'wp_head', 'bones_remove_wp_widget_recent_comments_style', 1 );
		add_filter( 'wp_title', 'cbo_head_title', 10, 3 );
	}

	/* Nettoyage titre et meta description */
	function cbo_head_title( $title, $sep, $seplocation ){
		global $page, $paged;
		if ( is_feed() ) return $title;
		if ( 'right' == $seplocation ) {
			$title .= get_bloginfo( 'name' );
		} else {
			$title = get_bloginfo( 'name' ) . $title;
		}
		if($sep == '')
			$sep = '-';
		$site_description = get_bloginfo( 'description', 'display' );

		if ( $paged >= 2 || $page >= 2 ) {
			$title .= " {$sep} " . sprintf( __( 'Page %s', 'dbt' ), max( $paged, $page ) );
		}
		return $title;
	}

	/* Removes or edits the 'Protected:' part from posts titles When the post is protected by password */
	function cbo_remove_protected_text(){
		return __('%s');
	}

	/* Remove WP version from rss feed */
	function cbo_remove_rss_version(){
		return '';
	}

	/* Remove default Gallery styles*/
	function cbo_remove_gallery_style($css) {
		return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );
  	}

  	/* Suppression des accents des fichiers uploadés */
	add_filter( 'sanitize_file_name', 'remove_accents' );

	// remove injected CSS for recent comments widget
	function bones_remove_wp_widget_recent_comments_style() {
		if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
			remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
		}
	}

	// remove the p from around imgs (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)
	function bones_filter_ptags_on_images($content){
		return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
	}
	
	/* Load custom scripts and styles */
	function cbo_scripts_and_styles() {
		if (!is_admin()) {
			wp_register_style(
				'bones-stylesheet',
				get_stylesheet_directory_uri() . '/library/css/style.css',
				array(),
				'screen,print'
			);

			wp_enqueue_style( 'bones-stylesheet' );
		}
	}

	/* Add defer attr on scripts */
	function cbo_add_defer_attribute($tag, $handle) {
		if (is_admin() || (
				// 'jquery-core' !== $handle &&
				// 'jquery-migrate' !== $handle &&
				'bones-scripts' !== $handle &&
				'contact-form-7' !== $handle &&
				'wp-polyfill' !== $handle &&
				'regenerator-runtime' !== $handle ))
			return $tag;

		return str_replace( ' src', ' defer="defer" src', $tag );
	}

	/* Enable custom theme supports */
	function bones_theme_support() {
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size(125, 125, true);
		add_theme_support('automatic-feed-links');
		add_theme_support( 'html5', array(
			'comment-list',
			'search-form',
			'comment-form'
		));
	}

	//Remove Gutenberg Block Library CSS from loading on the frontend
	function smartwp_remove_wp_block_library_css(){
		wp_dequeue_style( 'wp-block-library' );
		wp_dequeue_style( 'wp-block-library-theme' );
		wp_dequeue_style( 'wc-blocks-style' ); // Remove WooCommerce block CSS
	} 
	add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );

	/* Remove useless styles */

	// remove Block library styles
	function blocklibrary_deregister_styles() {
		wp_deregister_style( 'wp-block-library' );
	}

	// remove cf7 styles
	function cf7_deregister_styles() {
		wp_deregister_style( 'contact-form-7' );
	}
		

	/* --------------------------
	   CLEANUP PROCESS
	-------------------------- */

	// A better title
	// add_filter( 'wp_title', 'rw_title', 10, 3 );
	// Remove WP version from RSS
	add_filter( 'the_generator', 'cbo_remove_rss_version' );
	// Remove pesky injected css for recent comments widget
	add_filter( 'wp_head', 'bones_remove_wp_widget_recent_comments_style', 1 );
	// Clean up gallery output in wp
	add_filter( 'gallery_style', 'cbo_remove_gallery_style' );
	// Remove CF7 styles
	add_action( 'wp_print_styles', 'cf7_deregister_styles', 100 );
	// Remove Block library styles
	add_action( 'wp_print_styles', 'blocklibrary_deregister_styles', 100 );
	// launching this stuff after theme setup
	bones_theme_support();