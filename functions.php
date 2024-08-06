<?php
	function bones_ahoy() {
		require_once( 'library/inc/custom-cleanup.php' );
		require_once( 'library/inc/custom-admin.php' );
		require_once( 'library/inc/custom-post/cpt-testimonial.php' );
		require_once( 'library/inc/custom-post/cpt-news.php' );
	}
	add_action( 'after_setup_theme', 'bones_ahoy' );

	show_admin_bar(false);

	/* ************************* */
	// Register menu
	/* ************************* */
	function register_my_menu() {
		register_nav_menu('primary-menu',__( 'Menu Principal' ));
	}
	add_action( 'init', 'register_my_menu' );

	/* ************************* */
	// Pic size
	/* ************************* */
	add_image_size('xsmall', 320, 320, false);
	add_image_size('small', 768, 768, false);
	add_image_size('medium', 1200, 1200, false);
	add_image_size('xlarge', 1920, 1920, false);

	/* ************************* */
	// Add `loading="lazy"` attribute to images output by the_post_thumbnail().
	/* ************************* */
	add_filter( 'post_thumbnail_html', 'wpdd_modify_post_thumbnail_html', 10, 5 );
	
	function wpdd_modify_post_thumbnail_html( $html, $post_id, $post_thumbnail_id, $size, $attr ) {
		return str_replace( '<img', '<img loading="lazy"', $html );
	}

	/* ************************* */
	/* Add styles to wysiwyg editor */
	/* ************************* */
	function add_style_select_button($buttons) {
		array_unshift($buttons, 'styleselect');
		return $buttons;
	}
	add_filter('mce_buttons_2', 'add_style_select_button');
	function my_mce_before_init_insert_formats( $init_array ) {
		$style_formats = array(
			array(
				'title' => 'Bouton simple',
				'block' => 'a',
				'classes' => 'cbo-button button--icon cbo-link',
				'wrapper' => true,
				'attributes' => array(
					'href' => '#'
				)
			),
			array(
				'title' => 'Bouton simple - Modale',
				'block' => 'a',
				'classes' => 'cbo-button button--icon cbo-link button-modale',
				'wrapper' => true,
			),
			array(
				'title' => 'Bouton avec bordure',
				'block' => 'a',
				'classes' => 'cbo-button button--icon button--borderblue',
				'wrapper' => true,
				'attributes' => array(
					'href' => '#'
				)
			),
			array(
				'title' => 'Bouton avec bordure - Modale',
				'block' => 'a',
				'classes' => 'cbo-button button--icon button--borderblue button-modale',
				'wrapper' => true,
			),
			array(
				'title' => 'Bouton bleu',
				'block' => 'a',
				'classes' => 'cbo-button button--icon button--blue',
				'wrapper' => true,
				'attributes' => array(
					'href' => '#'
				)
			),
			array(
				'title' => 'Bouton bleu - Modale',
				'block' => 'a',
				'classes' => 'cbo-button button--icon button--blue button-modale',
				'wrapper' => true,
			),
			array(
				'title' => 'Mise en avant',
				'block' => 'div',
				'classes' => 'cbo-featuredtext',
				'wrapper' => true,
			),
			array(
				'title' => 'Bon à savoir',
				'block' => 'div',
				'classes' => 'cbo-goodtoknow',
				'wrapper' => true,
			),
			array(
				'title' => 'Soulignement',
				'block' => 'strong',
				'classes' => 'cbo-underline',
				'wrapper' => false,
			),
		);
		$init_array['style_formats'] = json_encode( $style_formats );
		return $init_array;
	}
	add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );

	/* ************************* */
	/* AJOUT OPTIONS AU DASHBOARD */
	/* ************************* */
	if( function_exists('acf_add_options_page') ) {
		acf_add_options_page();
	}

	/* ************************* */
	/* CURRENT PAGE FOR ARCHIVE */
	/* ************************* */
	function current_paged( $var = '' ) {
		if( empty( $var ) ) {
			global $wp_query;
			if( !isset( $wp_query->max_num_pages ) )
				return;
			$pages = $wp_query->max_num_pages;
		}
		else {
			global $$var;
				if( !is_a( $$var, 'WP_Query' ) )
					return;
			if( !isset( $$var->max_num_pages ) || !isset( $$var ) )
				return;
			$pages = absint( $$var->max_num_pages );
		}
		if( $pages < 1 )
			return;
		$page = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
		echo 'Page ' . $page ;
	}

	/* ************************* */
	/* CRÉATION PAGINATION */
	/* ************************* */
	function page_navi($before = '', $after = '') {
		global $wpdb, $wp_query;
		$request = $wp_query->request;
		$posts_per_page = intval(get_query_var('posts_per_page'));
		$paged = intval(get_query_var('paged'));
		$numposts = $wp_query->found_posts;
		$max_page = $wp_query->max_num_pages;
		if ( $numposts <= $posts_per_page ) { return; }
		if(empty($paged) || $paged == 0) {
			$paged = 1;
		}
		$pages_to_show = 7;
		$pages_to_show_minus_1 = $pages_to_show-1;
		$half_page_start = floor($pages_to_show_minus_1/2);
		$half_page_end = ceil($pages_to_show_minus_1/2);
		$start_page = $paged - $half_page_start;
		if($start_page <= 0) {
			$start_page = 1;
		}
		$end_page = $paged + $half_page_end;
		if(($end_page - $start_page) != $pages_to_show_minus_1) {
			$end_page = $start_page + $pages_to_show_minus_1;
		}
		if($end_page > $max_page) {
			$start_page = $max_page - $pages_to_show_minus_1;
			$end_page = $max_page;
		}
		if($start_page <= 0) {
			$start_page = 1;
		}
		echo $before.'<ul class="cbo-pagination">'."";

		$prevposts = get_previous_posts_link('Précédent');
		if($prevposts) { echo '<li class="cbo-paginate-prev">' . $prevposts  . '</li>'; }
		else { echo '<li class="disabled"><a href="#">Précédent</a></li>'; }

		for($i = $start_page; $i  <= $end_page; $i++) {
			if($i == $paged) {
				echo '<li class="active"><a href="#">'.$i.'</a></li>';
			} else {
				echo '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
			}
		}

		$nextposts = get_next_posts_link('Suivant');
		if($nextposts) { echo '<li class="cbo-paginate-next">' . $nextposts  . '</li>'; }
		else { echo '<li class="disabled"><a href="#">Suivant</a></li>'; }
		
		echo '</ul>'.$after."";
	}

	/* ************************* */
	/* REMOVE P & SPAN FROM CF7 FIELD */
	/* ************************* */
	add_filter('wpcf7_autop_or_not', '__return_false');
	add_filter('wpcf7_form_elements', function($content) {
		$content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
		return $content;
	});

	/* ************************* */
	// Add Color choices
	/* ************************* */
	function my_mce4_options($init) {

		$custom_colours = '
			"2e60ff", "Bleu électrique",
			"39d4f2", "Bleu turquoise",
			"1a37a8", "Bleu foncé",
		';
		$init['textcolor_map'] = '['.$custom_colours.']';
		$init['textcolor_rows'] = 1;
		return $init;
	}
	add_filter('tiny_mce_before_init', 'my_mce4_options');


	/* ************************* */
	/* FONT SIZE */
	/* ************************* */
	function custom_mce_buttons_2($buttons) {
		array_unshift($buttons, 'fontsizeselect');
		return $buttons;
	}
	add_filter('mce_buttons_2', 'custom_mce_buttons_2');
	
	function custom_mce_text_sizes($initArray) {
		$initArray['fontsize_formats'] = '5pt 6pt 7pt 8pt 9pt 10pt 11pt 12pt 14pt 16pt 18pt 20pt 22pt 24pt 26pt 28pt 32pt 36pt 40pt 44pt 48pt 52pt 56pt 60pt 64pt 68pt 72pt';
		return $initArray;
	}
	add_filter('tiny_mce_before_init', 'custom_mce_text_sizes');
	
	function my_custom_fonts() {
		echo '
		<style>
			.mce-content-body {
				font-size: 10pt;
			}
		</style>
		';
	}
	add_action('admin_head', 'my_custom_fonts');
	
	

	/* ************************* */
	/* DISABLE GUTEMBERG */
	/* ************************* */
	add_filter('use_block_editor_for_post', '__return_false', 10);
	add_filter('use_block_editor_for_post_type', '__return_false', 10);

	/* ************************* */
	/* CUSTOM LOGIN */
	/* ************************* */
	function childtheme_custom_login() {
	 echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/library/css/style.css" />';
	}
	add_action('login_head', 'childtheme_custom_login');


	/* ************************* */
	/* CALCUL TEMPS DE LECTURE */
	/* ************************* */
	function reading_time($the_post_ID){
		$total_word_count = 0; 
		$all_fields = get_field('flexible_layout', $the_post_ID, false); 

		foreach ($all_fields as $field) {
			foreach ($field as $key => $value) {
				if ($key === 'acf_fc_layout') {
					continue;
				}
				$total_word_count = $total_word_count + str_word_count(strip_tags($value));
			}
		}
		$readingtime = ceil($total_word_count / 200);
		if ($readingtime <= 1) {
			$timer = " min";
		} else {
			$timer = " mins";
		}

		if ($readingtime == 0) {
			$totalreadingtime = "1" . $timer . " de lecture";
		} else {
			$totalreadingtime = $readingtime . $timer . " de lecture";
		}
		return $totalreadingtime;
	}


	/* ************************* */
	/* Custom nav markup */
	/* ************************* */
	add_filter('wp_nav_menu_objects', 'cbo_wp_nav_menu_objects', 10, 2);
	function cbo_wp_nav_menu_objects($items, $args) {
		foreach ($items as &$item) {
			$megamenu = get_field('megamenu', $item);
			$icon = get_field('menu_icon', $item);
			$col = get_field('nbr_col', $item);
			$description = $item->description;
	
			$item_content = '<span class="menuitem-content">' . $item->title . '</span>';
	
			if ($description) {
				$item_content .= '<span class="menuitem-description">' . esc_html($description) . '</span>';
			}
	
			$wrapped_content = '<span class="menuitem-wrapper">' . $item_content . '</span>';
	
			if ($icon) {
				$item_picture = '
				<span class="nav-icon cbo-picture-contain">
					<img
						src="' . esc_url($icon["url"]) . '"
						sizes="20vw"
						alt="Optifluides"
						loading="lazy"
						width="20" height="20"
					/>
				</span>';
				$item->title = $item_picture . $wrapped_content;
			} else {
				$item->title = $wrapped_content;
			}
	
			if ($megamenu) {
				$item->classes[] = 'megamenu';
			}

			if ($col == 'three') {
				$item->classes[] = 'three-cols';
			}
		}
		return $items;
	}
	

?>