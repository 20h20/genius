<?php
	$title	= get_sub_field('textpicturelist_title');
	$picture	= get_sub_field('textpicturelist_picture');
	$cover	= get_sub_field('textpicturelist_picturecover');
	$position	= get_sub_field('textpicturelist_position');
	$timeline	= get_sub_field('textpicturelist_timeline');
?>
<section class="cbo-textpicturelist textpicturelist--<?php echo $position; ?>">
	<div class="textpicturelist-inner cbo-container">
		<?php if($title): ?>
			<div class="textpicturelist-title cbo-title-1 slide-up">
				<?php echo $title ?>
			</div>
		<?php endif; ?>

		<div class="inner-container">
			<div class="textpicturelist-picture slide-up <?php if($cover == 1): ?>cbo-picture-cover<?php endif; ?> <?php if($cover == 0): ?>cbo-picture-contain<?php endif; ?>">
				<img
					decoding="async"
					src="<?php echo $picture['sizes']['small']; ?>"
					srcset="<?php echo $picture['sizes']['small']; ?> 320w, <?php echo $picture['sizes']['xlarge']; ?> 768w, <?php echo $picture['sizes']['xlarge']; ?> 1024w"
					alt="<?php echo $picture['alt']; ?>" sizes="100vw"
					loading="lazy"
					width="768" height="768"
				>
			</div>

			<div class="textpicturelist-content <?php if($timeline == 1): ?>content--timeline<?php endif; ?>">
				<?php
					if( have_rows('textpicturelist_blocslist') ):
					while ( have_rows('textpicturelist_blocslist') ) : the_row();
					$picture	= get_sub_field('picture');
					$title	= get_sub_field('title');
					$content	= get_sub_field('content');
				?>
					<div class="list-el slide-up">
						<div class="el-inner">
							<?php if($picture): ?>
								<span class="inner-picture cbo-picture-contain">
									<img
										decoding="async"
										src="<?php echo $picture['sizes']['xsmall']; ?>"
										srcset="<?php echo $picture['sizes']['xsmall']; ?> 320w, <?php echo $picture['sizes']['xsmall']; ?> 768w, <?php echo $picture['sizes']['xsmall']; ?> 1024w"
										alt="<?php echo $picture['alt']; ?>" sizes="100vw"
										loading="lazy"
										width="60" height="80"
									>
								</span>
							<?php endif; ?>

							<div class="inner-content">
								<?php if($title): ?>
									<div class="inner-title">
										<?php echo $title ?>
									</div>
								<?php endif; ?>

								<?php if($content): ?>
									<div class="content-text">
										<?php echo $content ?>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				<?php
					endwhile;
					endif;
				?>
			</div>
		</div>
	</div>
</section>