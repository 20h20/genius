<?php
	$title	= get_sub_field('picfull_title');
	$picture	= get_sub_field('picfull_picture');
	$cover	= get_sub_field('picfull_picturecover');
	$picturemobile	= get_sub_field('picfull_picturemobile');
?>
<section class="cbo-fullpicture">
	<div class="fullpicture-inner">
		<?php if($title): ?>
			<div class="fullpicture-title cbo-title-1">
				<?php echo $title ?>
			</div>
		<?php endif; ?>
		<div class="fullpicture-picture picture--desktop <?php if($cover == 1): ?>cbo-picture-cover<?php endif; ?> <?php if($cover == 0): ?>cbo-picture-contain<?php endif; ?>">
			<img
				decoding="async"
				src="<?php echo $picture['sizes']['small']; ?>"
				srcset="<?php echo $picture['sizes']['small']; ?> 320w, <?php echo $picture['sizes']['xlarge']; ?> 768w, <?php echo $picture['sizes']['xlarge']; ?> 1024w"
				alt="<?php echo $picture['alt']; ?>" sizes="100vw"
				loading="lazy"
				width="1900" height="768"
			>
		</div>

		<div class="fullpicture-picture picture--mobile <?php if($cover == 1): ?>cbo-picture-cover<?php endif; ?> <?php if($cover == 0): ?>cbo-picture-contain<?php endif; ?>">
			<img
				decoding="async"
				src="<?php echo $picturemobile['sizes']['small']; ?>"
				srcset="<?php echo $picturemobile['sizes']['small']; ?> 320w, <?php echo $picturemobile['sizes']['medium']; ?> 768w, <?php echo $picturemobile['sizes']['medium']; ?> 1024w"
				alt="<?php echo $picturemobile['alt']; ?>" sizes="100vw"
				loading="lazy"
				width="768" height="768"
			>
		</div>
	</div>
</section>