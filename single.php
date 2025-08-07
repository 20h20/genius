<?php
	get_header();
	$sources	= get_field('single_sources');
	$newstitle	= get_field('options_newslettertitle', 'option');
	$newschapo	= get_field('options_newsletterchapo', 'option');
	$ctaicon	= get_field('options_testimonialsctapic', 'option');
	$ctatitle	= get_field('options_testimonialsctatitle', 'option');
	$ctacontent	= get_field('options_testimonialsctacontent', 'option');
	$ctatxtbt	= get_field('options_testimonialsctatxtbt', 'option');
	$ctaurlbt	= get_field('options_testimonialsctaurlbt', 'option');
	$ctatypebt	= get_field('options_testimonialsctabttype', 'option');
	$ctabg	= get_field('options_testimonialsctabg', 'option');




	$posted_time = get_the_time('U'); 
$modified_time = get_the_modified_time('U'); 



?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('cbo-page page--single'); ?> itemscope itemtype="http://schema.org/BlogPosting">
		<section class="cbo-herorich">
			<div class="herorich-inner cbo-container">
				<div class="herorich-picture">
					<div class="picture-main cbo-picture-cover slide-up">
						<?php
							the_post_thumbnail( 'full', array(
							'sizes' => '(max-width: 320px) 145px, (max-width: 425px) 220px, (max-width: 768px) 500px, (max-width: 1024px) 768px, 100vw',
							'fetchpriority' => 'high',
							'decoding' => 'async'
						) );?>
					</div>
				</div>
				<div class="herorich-content">
					<div class="cbo-breadcrumb slide-up" itemprop="breadcrumb">
						<?php if ( function_exists('yoast_breadcrumb') ) {
							yoast_breadcrumb('<div class="breadcrumb-inner">','</div>');
						} ?>
					</div>

					<div class="cbo-social slide-up">
						<div class="share-title cbo-small">
							Partager sur :
						</div>
						<a href="#" id="linkedin-share-button" class="social-icon" target="_blank">
							<i class="icon icon--icon-linkedin"></i>
						</a>

						<a href="#" id="twitter-share-button" class="social-icon" target="_blank">
							<i class="icon icon--icon-twitter"></i>
						</a>
					</div>

					<h1 class="herorich-title cbo-title-1 slide-up">
						<?php the_title(); ?>
					</h1>

					<div class="content-infos">
						<?php echo get_the_author(); ?> /
						<time class="header-date" itemprop="dateCreated" datetime="<?php echo get_the_date(); ?>">
							<?php echo get_the_date(); ?>
						</time> / 
						<?php echo reading_time(get_the_ID()); ?> /
						<?php 
							if ( $modified_time > $posted_time ) {
								echo '<p><strong>Article mis à jour le :</strong> ' . get_the_modified_time('d F Y') . '</p>';
							} 
						?>
					</div>

					<div class="cbo-sommaire">
						<div class="sommaire-inner">
							<div class="sommaire-title">
								Table des matières
								<i class="icon icon--next-arrow"></i>
							</div>
							<ul class="sommaire-list"></ul>
						</div>
					</div>
				</div>
			</div>
		</section>

		<?php
			if (function_exists('the_content')) {
		?>
			<section class="cbo-text">
				<div class="text-inner cbo-container container--medium">
					<div class="text-content">
						<div class="cbo-cms">
							<?php
								the_content();
							?>
						</div>
					</div>
				</div>
			</section>
		<?php 
			}
		?>

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
					// CALL TO ACTION SIMPLE
					elseif( get_row_layout() == 'ctasimple' ):
						get_template_part( 'templates/blocks/ctasimple');

					///////////////////
					// CALL TO ACTION TEXT PICTURE
					elseif( get_row_layout() == 'ctatextpicture' ):
						get_template_part( 'templates/blocks/ctatextpicture');

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

					///////////////////
					// SECTION CONTACT
					elseif( get_row_layout() == 'contact' ):
						get_template_part( 'templates/blocks/contact');

					endif;
				endwhile;
			endif;
		?>

		<div class="cbo-container container--medium container--nomargin">
			<div class="single--sharebot">
				<div class="sharebot-title cbo-title-3 slide-up">
					Notre article vous a plu ?<br/>
					<span>Restez connecté pour explorer nos dernières publications !<span>
				</div>
				<div class="cbo-social slide-up">
					<div class="share-title cbo-small">
						Partager sur :
					</div>
					<a href="#" id="linkedin-share-button" class="social-icon" target="_blank">
						<i class="icon icon--icon-linkedin"></i>
					</a>

					<a href="#" id="twitter-share-button" class="social-icon" target="_blank">
						<i class="icon icon--icon-twitter"></i>
					</a>
				</div>
			</div>

			<?php if($sources): ?>
				<div class="cbo-sources cbo-cms slide-up">
					<div class="sources-title">
						Sources
					</div>
					<?php echo $sources ?>
				</div>
			<?php endif; ?>

			<div class="cbo-newsletter slide-up">
				<div class="newsletter-inner">
					<div class="newsletter-title">
						<?php echo $newstitle ?>
					</div>
					<div class="newsletter-content">
						<?php echo $newschapo ?>
					</div>
					<div class="newsletter-form cbo-form">
						<?php echo do_shortcode( '[contact-form-7 id="4ccd478" title="Newsletter"]' ); ?>
					</div>
				</div>
			</div>
		</div>

		<section class="cbo-relation">
			<div class="relation-inner cbo-container">

				<div class="relation-title cbo-title-1 slide-up">
					<strong>D’autres articles</strong><br> sur le même sujet
				</div>

				<div class="articles-list slide-up">
					<?php
						$current_cat = get_queried_object();
						$categories = get_the_terms($current_cat->ID, 'category');
						if ($categories && !is_wp_error($categories) && !empty($categories)) {
							$current_category = $categories[0]->slug;
							$event_id = get_the_ID();
							$args = array(
								'post_type' => 'post',
								'posts_per_page' => 3,
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

		<section class="cbo-cta">
			<div class="cta-inner cbo-container">
				<div class="cta-box">
					<div class="cta-content">
						<?php if($ctaicon): ?>
							<div class="content-icon cbo-picture-contain slide-up">
								<img
									decoding="async"
									src="<?php echo $ctaicon['sizes']['xsmall']; ?>"
									srcset="<?php echo $ctaicon['sizes']['xsmall']; ?> 320w, <?php echo $ctaicon['sizes']['xsmall']; ?> 768w, <?php echo $ctaicon['sizes']['xsmall']; ?> 1024w"
									alt="<?php echo $ctaicon['alt']; ?>" sizes="100vw"
									loading="lazy"
									width="100" height="100"
								>
							</div>
						<?php endif; ?>

						<?php if($ctatitle): ?>
							<div class="content-title cbo-title-2 slide-up">
								<?php echo $ctatitle ?>
							</div>
						<?php endif; ?>

						<?php if($ctacontent): ?>
							<div class="content-text cbo-cms slide-up">
								<?php echo $ctacontent ; ?>
							</div>
						<?php endif; ?>

						<a
							class="cbo-button button--border button--icon slide-up <?php if($ctatypebt == 'modale'): ?>button-modale<?php endif; ?>"
							href="<?php if($ctatypebt == 'url'): ?><?php echo $ctaurlbt; ?><?php endif; ?><?php if($ctatypebt == 'modale'): ?>#<?php endif; ?>"
						>
							<?php echo $ctatxtbt; ?>
						</a>
					</div>
					<?php if($ctabg): ?>
						<div class="box-picture cbo-picture-cover">
							<img
								decoding="async"
								src="<?php echo $ctabg['sizes']['xsmall']; ?>"
								srcset="<?php echo $ctabg['sizes']['small']; ?> 320w, <?php echo $ctabg['sizes']['xlarge']; ?> 768w, <?php echo $ctabg['sizes']['xlarge']; ?> 1024w"
								alt="<?php echo $ctabg['alt']; ?>" sizes="100vw"
								loading="lazy"
								width="1600" height="700"
							>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>

	</article>
<?php
	get_footer();
?>