<?php
	get_header();
	$title	= get_field('options_presstitle', 'option');
	$picture	= get_field('options_presspicture', 'option');
	$ctaicon	= get_field('options_pressctapic', 'option');
	$ctatitle	= get_field('options_pressctatitle', 'option');
	$ctacontent	= get_field('options_pressctacontent', 'option');
	$ctatxtbt	= get_field('options_pressctatxtbt', 'option');
	$ctaurlbt	= get_field('options_pressctaurlbt', 'option');
	$ctatypebt	= get_field('options_pressctabttype', 'option');
	$ctabg	= get_field('options_pressctabg', 'option');
?>
	<div class="cbo-page page--archive page--press">
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

		<section class="archive-press">
			<div class="press-inner cbo-container container--medium">
				<div class="press-list">
					<h2 class="press-title cbo-title-1">
						<strong><?php single_cat_title(); ?></strong>
					</h2>
					<?php
						if ( have_posts() ) :
						while ( have_posts() ) : the_post();
						get_template_part('templates/content/content','press');
						endwhile;
							echo page_navi();
						endif;
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