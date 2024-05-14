<?php
	$mtop	= get_sub_field('textpicture_margetop');
	$mbot	= get_sub_field('textpicture_margebot');
	$title	= get_sub_field('textpicture_title');
	$content	= get_sub_field('textpicture_content');
	$picture	= get_sub_field('textpicture_picture');
	$cover	= get_sub_field('textpicture_picturecover');
	$position	= get_sub_field('textpicture_position');
?>
<section class="cbo-textpicture textpicture--<?php echo $position; ?>">
	<div class="textpicture-inner cbo-container container--medium textpicture--margetop<?php echo $mtop; ?> textpicture--margebot<?php echo $mbot; ?>">
		<?php if($title): ?>
			<div class="textpicture-title cbo-title-1 slide-up">
				<?php echo $title ?>
			</div>
		<?php endif; ?>

		<div class="inner-container">
			<div class="textpicture-picture <?php if($cover == 1): ?>cbo-picture-cover<?php endif; ?> <?php if($cover == 0): ?>cbo-picture-contain<?php endif; ?> slide-up">
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
				<?php if($content): ?>
					<div class="cbo-cms">
						<?php echo $content ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>