<?php
	get_header();
	$content	= get_field('options_newscontent', 'option');
	$picture	= get_field('options_newspicture', 'option');
	$ctaicon	= get_field('options_testimonialsctapic', 'option');
	$ctatitle	= get_field('options_testimonialsctatitle', 'option');
	$ctacontent	= get_field('options_testimonialsctacontent', 'option');
	$ctatxtbt	= get_field('options_testimonialsctatxtbt', 'option');
	$ctaurlbt	= get_field('options_testimonialsctaurlbt', 'option');
	$ctatypebt	= get_field('options_testimonialsctabttype', 'option');
	$ctabg	= get_field('options_testimonialsctabg', 'option');
?>
	<div class="cbo-page page--archive page--news">
		<section class="cbo-textpicture textpicture--right">
			<div class="textpicture-inner cbo-container container--medium">
				<div class="inner-container">
					<div class="textpicture-picture cbo-picture-contain slide-up">
						<img
							decoding="async"
							src="<?php echo $picture['sizes']['small']; ?>"
							srcset="<?php echo $picture['sizes']['small']; ?> 320w, <?php echo $picture['sizes']['xlarge']; ?> 768w, <?php echo $picture['sizes']['xlarge']; ?> 1024w"
							alt="<?php echo $picture['alt']; ?>" sizes="100vw"
							loading="lazy"
							width="768" height="768"
						>
					</div>
					<div class="textpicture-content slide-up">
						<div class="cbo-cms">
							<?php echo $content ?>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="archive-news">
			<div class="news-inner cbo-container container--medium">

				<div class="news-title cbo-title-2 slide-up">
					<strong>Nos actualités</strong>
				</div>
				<div class="news-list">
				<?php
					if (have_posts()) :
						$current_month_year = '';

						while (have_posts()) : the_post();
							$addvideo = get_field('news_addvideo');
							$videocover = get_field('news_videocover');
							$videoid = get_field('news_videoid');
							$post_month_year = get_the_date('F Y');

							if ($current_month_year != $post_month_year) {
								if ($current_month_year != '') {

								}
								$current_month_year = $post_month_year;
								echo '<div class="news-month">' . $current_month_year . '</div>';
							}
							?>
							<article <?php post_class('list-el'); ?> itemprop="blogPosts" itemscope itemtype="http://schema.org/BlogPosting">
								<div class="el-inner">
									<?php if($addvideo == 1): ?>
										<div class="content-video slide-up">
											<span class="video-play">
												<i class="icon icon--player"></i>
											</span>
											<div class="video-cover" data-video-id="<?php echo $videoid; ?>" style="background-image:url(<?php echo $videocover["url"]; ?>);"></div>
										</div>
									<?php else : ?>
										<div class="inner-picture cbo-picture-cover slide-up">
											<?php the_post_thumbnail( 'small', array( 'sizes' => '(max-width:320px) 145px, (max-width:425px) 220px, 500px' , 'itemprop' => 'image') );?>
										</div>
									<?php endif; ?>

									<div class="inner-content">
										<div class="content-text slide-up">
											<h3 class="content-title cbo-title-3 slide-up" itemprop="headline">
												<?php the_title(); ?>
											</h3>
											<div class="cbo-cms slide-up" itemprop="description">
												<?php the_content(); ?>
											</div>
										</div>
									</div>
								</div>
							</article>
					<?php
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