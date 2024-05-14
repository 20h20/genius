<?php
	get_header();
	$category = get_the_category();
	$category_name = isset($category[0]) ? $category[0]->name : 'N.C';
	$excerpt = get_the_excerpt();
	$limited_excerpt = wp_trim_words($excerpt, 100, '...');
	$limited_excerpt = str_replace('TweetezPartagezPartagez', '', $limited_excerpt);
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('cbo-page page--single'); ?> itemscope itemtype="http://schema.org/BlogPosting">
		<section class="cbo-herorich">
			<div class="herorich-inner cbo-container">
				<div class="herorich-picture">
					<div class="picture-main cbo-picture-cover slide-up">
						<?php the_post_thumbnail( 'small', array( 'sizes' => '(max-width:320px) 145px, (max-width:425px) 220px, 500px' ) );?>
					</div>
				</div>
				<div class="herorich-content">
					<div class="cbo-breadcrumb slide-up" itemprop="breadcrumb">
						<?php if ( function_exists('yoast_breadcrumb') ) {
							yoast_breadcrumb('<div class="breadcrumb-inner">','</div>');
						} ?>
					</div>
					<h1 class="herorich-title cbo-title-1 slide-up">
						<?php the_title(); ?>
					</h1>
					
				</div>
			</div>
		</section>

		<section class="cbo-text">
			<div class="text-inner cbo-container container--small">
				<div class="text-content">
					<div class="cbo-cms">
						<?php
							if (function_exists('the_content')) {
								the_content();
							}
						?>
					</div>
				</div>
			</div>
		</section>

		<?php
			global $flexible_count;
			if( have_rows('flexible_layout') ):
				while ( have_rows('flexible_layout') ) : the_row();
				++$flexible_count;

					///////////////////
					// HERO
					if( get_row_layout() == 'herorich' ):
						get_template_part( 'templates/blocks/herorich');

					///////////////////
					// SECTION TEXT PICTURE
					elseif( get_row_layout() == 'textpicture' ):
						get_template_part( 'templates/blocks/textpicture');

					///////////////////
					// SECTION BLOCS ENRICHIS
					elseif( get_row_layout() == 'richblocs' ):
						get_template_part( 'templates/blocks/richblocs');

					///////////////////
					// SECTION BLOCS
					elseif( get_row_layout() == 'blocs' ):
						get_template_part( 'templates/blocks/blocs');

					///////////////////
					// SECTION TEXT PICTURE LIST
					elseif( get_row_layout() == 'textpicturelist' ):
						get_template_part( 'templates/blocks/textpicturelist');

					///////////////////
					// SECTION TESTIMONIALS LIST
					elseif( get_row_layout() == 'testimonials' ):
						get_template_part( 'templates/blocks/testimonials');

					///////////////////
					// SECTION PARTNERS
					elseif( get_row_layout() == 'partners' ):
						get_template_part( 'templates/blocks/partners');

					///////////////////
					// SECTION RELATION
					elseif( get_row_layout() == 'relation' ):
						get_template_part( 'templates/blocks/relation');

					///////////////////
					// CALL TO ACTION
					elseif( get_row_layout() == 'cta' ):
						get_template_part( 'templates/blocks/cta');

					///////////////////
					// SECTION TEXT
					elseif( get_row_layout() == 'text' ):
						get_template_part( 'templates/blocks/text');

					///////////////////
					// SECTION PICTURE FULL
					elseif( get_row_layout() == 'picfull' ):
						get_template_part( 'templates/blocks/picfull');

					///////////////////
					// SECTION CONTEXT BLOCS
					elseif( get_row_layout() == 'context' ):
						get_template_part( 'templates/blocks/context');

					///////////////////
					// SECTION BLOCS SIMPLE
					elseif( get_row_layout() == 'blocssimple' ):
						get_template_part( 'templates/blocks/blocssimple');

					endif;
				endwhile;
			endif;
		?>

		<section class="cbo-relation">
			<div class="relation-inner cbo-container">

				<div class="relation-title cbo-title-1 slide-up">
					Articles sur le même sujet
				</div>

				<div class="articles-list">
					<?php
						$current_cat = get_queried_object();
						$categories = get_the_terms($current_cat->ID, 'category');
						if ($categories && !is_wp_error($categories) && !empty($categories)) {
							$current_category = $categories[0]->slug;
							$event_id = get_the_ID();
							$args = array(
								'post_type' => 'post',
								'posts_per_page' => 9,
								'tax_query' => array(
									array(
										'taxonomy' => 'category',
										'field'    => 'slug',
										'terms'    => $current_category,
									),
								),
								'post__not_in' => array($event_id), 
							);
							$query = new WP_Query($args);
							if ($query->have_posts()) :
								while ($query->have_posts()) : $query->the_post();
									get_template_part('templates/content/content', 'article');
								endwhile;
								wp_reset_postdata();
							else :
								echo 'Aucun article similaire';
							endif;
						} else {
							echo 'Aucune catégorie associée à cet article.';
						}
					?>
				</div>
			</div>
		</section>

		





		
	</article>
<?php
	get_footer();
?>