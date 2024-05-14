<?php
	$addvideo	= get_sub_field('context_addvideo');
	$videotitle	= get_sub_field('context_videotitle');
	$videoid	= get_sub_field('context_videoid');
	$videocover	= get_sub_field('context_videocover');

	$addblocs	= get_sub_field('context_addblocs');
	$blocstitle	= get_sub_field('context_blocstitle');

	$addfeaturedbloc	= get_sub_field('context_addfeaturedbloc');
	$txtfeaturedbloc	= get_sub_field('context_txtfeaturedbloc');
?>
<section class="cbo-context">
	<div class="context-shapecontainer">
		<div class="context-shape shape--top"></div>
		<div class="context-shape shape--bottom"></div>
	</div>
	<div class="context-inner">

		<?php if($addvideo == 1): ?>
			<div class="context-video">
				<div class="cbo-container container--nomargin">
					<?php if($videotitle): ?>
						<div class="video-title cbo-title-1 slide-up">
							<?php echo $videotitle ?>
						</div>
					<?php endif; ?>
				</div>

				<div class="video-container">
					<div class="content-video slide-up">
						<span class="video-play">
							<i class="icon icon--player"></i>
						</span>
						<div class="video-picture">
							<div class="video-cover" data-video-id="<?php echo $videoid; ?>" style="background-image:url(<?php echo $videocover["url"]; ?>);"></div>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
		
		<?php if($addblocs == 1): ?>
			<div class="context-blocs">
				<div class="blocs-inner cbo-container container--medium container--nomargin">
					<?php if($blocstitle): ?>
						<div class="blocs-title cbo-title-1 slide-up">
							<?php echo $blocstitle ?>
						</div>
					<?php endif; ?>

					<div class="blocs-list">
						<?php
							if( have_rows('context_blocslist') ):
							while ( have_rows('context_blocslist') ) : the_row();
							$uptitle	= get_sub_field('uptitle');
							$picture		= get_sub_field('picture');
							$title		= get_sub_field('title');
							$content		= get_sub_field('content');
							$featured		= get_sub_field('featured');
							$featuredetail		= get_sub_field('featuredetail');
						?>
							<div class="list-el slide-up">
								<div class="el-inner">
									<?php if($uptitle): ?>
										<div class="inner-uptitle">
											<?php echo $uptitle ?>
										</div>
									<?php endif; ?>

									<div class="inner-content">
										<?php if($picture): ?>
											<div class="inner-picture cbo-picture-contain">
												<img
													decoding="async"
													src="<?php echo $picture['sizes']['xsmall']; ?>"
													srcset="<?php echo $picture['sizes']['xsmall']; ?> 320w, <?php echo $picture['sizes']['xsmall']; ?> 768w, <?php echo $picture['sizes']['xsmall']; ?> 1024w"
													alt="<?php echo $picture['alt']; ?>" sizes="100vw"
													loading="lazy"
													width="150" height="150"
												>
											</div>
										<?php endif; ?>

										<div class="content-text">
											<div class="text-head">
												<?php if($title): ?>
													<h3 class="content-title cbo-title-4">
														<?php echo $title ?>
													</h3>
												<?php endif; ?>

												<?php if($content): ?>
													<div class="content-txt">
														<?php echo $content ?>
													</div>
												<?php endif; ?>
											</div>

											<?php if($featured): ?>
												<div class="content-featured">
													<?php echo $featured ?>
													<div class="featured-tooltip">
														<i class="icon icon--infos"></i>

														<?php if($featuredetail): ?>
															<div class="tooltip-detail">
																<?php echo $featuredetail ?>
															</div>
														<?php endif; ?>
													</div>
												</div>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div>
						<?php
							endwhile;
							endif;
						?>
					</div>

					<?php if($addfeaturedbloc == 1): ?>
						<div class="context-featuredbloc cbo-container container--nomargin slide-up">
							<?php if($txtfeaturedbloc): ?>
								<div class="featuredbloc-title">
									<div class="title-picto cbo-picture-contain">
										<img
											decoding="async"
											src="<?php bloginfo('template_directory'); ?>/library/img/check.svg"
											alt="PRA Cloud" sizes="100vw"
											loading="lazy"
											width="75" height="75"
											itemprop="logo"
										>
									</div>
									<div class="cbo-title-3">
										<?php echo $txtfeaturedbloc ?>
									</div>
								</div>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>