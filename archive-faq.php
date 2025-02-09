<?php
	get_header();
	$title	= get_field('options_faqtitle', 'option');
	$picture	= get_field('options_faqpicture', 'option');
	$ctaicon	= get_field('options_faqctapic', 'option');
	$ctatitle	= get_field('options_faqctatitle', 'option');
	$ctacontent	= get_field('options_faqctacontent', 'option');
	$ctatxtbt	= get_field('options_faqctatxtbt', 'option');
	$ctaurlbt	= get_field('options_faqctaurlbt', 'option');
	$ctatypebt	= get_field('options_faqctabttype', 'option');
	$ctabg	= get_field('options_faqctabg', 'option');
?>
	<div class="cbo-page page--archive page--faq">
		<section class="cbo-herorich">
			<div class="herorich-inner cbo-container">
				<div class="herorich-picture">
					<div class="picture-main cbo-picture-cover slide-up">
						<img
							decoding="async"
							src="<?php echo $picture['sizes']['small']; ?>"
							srcset="<?php echo $picture['sizes']['small']; ?> 320w, <?php echo $picture['sizes']['xlarge']; ?> 768w, <?php echo $picture['sizes']['xlarge']; ?> 1024w"
							alt="<?php echo $picture['alt']; ?>" sizes="100vw"
							width="1500" height="1500"
						>
					</div>
				</div>

				<div class="herorich-content">
					<div class="cbo-breadcrumb slide-up" itemprop="breadcrumb">
						<?php if ( function_exists('yoast_breadcrumb') ) {
							yoast_breadcrumb('<div class="breadcrumb-inner">','</div>');
						} ?>
					</div>
					<h1 class="herorich-title cbo-title-1 slide-up" itemprop="headline">
						<?php echo $title ?>
					</h1>
				</div>
			</div>
		</section>

		<section class="faq-taxonomies">
			<div class="taxonomies-inner cbo-container">
				<div class="taxonomies-list">
					<?php
						$categories = get_terms(array(
							'taxonomy' => 'faq_cat',
							'hide_empty' => false,
						));
						if (!empty($categories) && !is_wp_error($categories)) {
							foreach ($categories as $category) {
								global $term;
								$term = $category;
								$picture  = get_field('faq_taxopicture', $term);
								$category_link = get_term_link($term);
					?>
						<a <?php post_class('list-el'); ?> href="<?php echo esc_url($category_link); ?>">
							<span class="el-inner">
								<span class="content-picture cbo-picture-contain slide-up">
									<img
										src="<?php echo esc_url($picture['sizes']['small']); ?>"
										srcset="<?php echo esc_url($picture['sizes']['small']); ?> 320w, <?php echo esc_url($picture['sizes']['small']); ?> 768w, <?php echo esc_url($picture['sizes']['small']); ?> 1024w"
										alt="<?php echo esc_attr($picture["alt"]); ?>"
										loading="lazy"
										width="200" height="200"
									>
								</span>
								<h3 class="content-title cbo-title-2 slide-up">
									<?php echo esc_html($term->name); ?>
								</h3>
								<span class="content-text slide-up">
									<?php echo term_description($term); ?>
								</span>
							</span>
						</a>
					<?php
						}}
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
	</div>
<?php
	get_footer();
?>