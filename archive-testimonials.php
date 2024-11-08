<?php
	get_header();
	$content	= get_field('options_testimonialscontent', 'option');
	$ctaicon	= get_field('options_testimonialsctapic', 'option');
	$ctatitle	= get_field('options_testimonialsctatitle', 'option');
	$ctacontent	= get_field('options_testimonialsctacontent', 'option');
	$ctatxtbt	= get_field('options_testimonialsctatxtbt', 'option');
	$ctaurlbt	= get_field('options_testimonialsctaurlbt', 'option');
	$ctatypebt	= get_field('options_testimonialsctabttype', 'option');
	$ctabg	= get_field('options_testimonialsctabg', 'option');
?>
	<div class="cbo-page page--archive page--testimonials">
		<section class="cbo-text">
			<div class="text-inner cbo-container">
				<div class="text-content">
					<div class="cbo-cms">
						<?php echo $content; ?>
					</div>
				</div>
			</div>
		</section>

		<section class="archive-testimonials">
			<div class="testimonials-inner cbo-container container--medium container--nomargin">
				<div class="testimonials-list">
					<?php
						if (have_posts()) :
						while (have_posts()) : the_post();
						$name	= get_field('testimonials_user');
						$society	= get_field('testimonials_enterprise');
						$videoid	= get_field('testimonials_video');
						$videocover	= get_field('testimonials_videocover');
					?>
						<article <?php post_class('list-el slide-up'); ?> itemprop="blogPosts" itemscope itemtype="http://schema.org/BlogPosting">
							<div class="el-inner">
								<div class="inner-picture cbo-picture-contain slide-up">
									<?php the_post_thumbnail( 'small', array( 'sizes' => '(max-width:320px) 145px, (max-width:425px) 220px, 500px' ) );?>
								</div>

								<div class="inner-content">
									<div class="content-informations">
										<?php if($name): ?>
											<div class="informations-name slide-up">
												<?php echo $name ?>
											</div>
										<?php endif; ?>

										<?php if($society): ?>
											<div class="informations-society slide-up">
												<?php echo $society ?>
											</div>
										<?php endif; ?>
									</div>

									<?php if (get_the_content()) : ?>
										<div class="content-chapo">
											<?php the_content(); ?>
										</div>
									<?php endif; ?>

									<?php
										if( have_rows('testimonials_accordion') ):
									?>
										<div class="content-question">
											<?php
												while ( have_rows('testimonials_accordion') ) : the_row();
												$question	= get_sub_field('question');
												$answer	= get_sub_field('reponse');
											?>
												<div class="list-el slide-up">
													<span class="el-title toggle">
														<?php echo $question ?>
														<i class="icon icon--more"></i>
													</span>

													<div class="el-content cbo-cms">
														<?php echo $answer ?>
													</div>
												</div>
											<?php
												endwhile;
											?>
										</div>
									<?php
										endif;
									?>

									<?php if($videoid): ?>
										<div class="content-video slide-up">
											<span class="video-play">
												<i class="icon icon--player"></i>
											</span>
											<div class="video-cover" data-video-id="<?php echo $videoid; ?>" style="background-image:url(<?php echo $videocover["url"]; ?>);"></div>
										</div>
									<?php endif; ?>
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