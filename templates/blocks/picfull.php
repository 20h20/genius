<?php
	$title	= get_sub_field('picfull_title');
	$chapo	= get_sub_field('picfull_chapo');
	$picture	= get_sub_field('picfull_picture');
	$cover	= get_sub_field('picfull_picturecover');
	$picturemobile	= get_sub_field('picfull_picturemobile');
	$picturemobilecover	= get_sub_field('picfull_picturecovermobile');
?>

<section class="cbo-fullpicture">
	<div class="fullpicture-inner">
		<?php if($title): ?>
			<div class="fullpicture-title cbo-title-2 slide-up">
				<?php echo esc_html($title); ?>
			</div>
		<?php endif; ?>

		<?php if($chapo): ?>
			<div class="fullpicture-chapo cbo-cms slide-up">
				<?php echo esc_html($chapo); ?>
			</div>
		<?php endif; ?>

		<div class="fullpicture-picture picture--desktop <?php if($cover == 1): ?>cbo-picture-cover<?php endif; ?> <?php if($cover == 0): ?>cbo-picture-contain<?php endif; ?>">
			<img
				decoding="async"
				src="<?php echo $picture['sizes']['small']; ?>"
				srcset="<?php echo $picture['sizes']['xlarge']; ?> 320w, <?php echo $picture['sizes']['xlarge']; ?> 768w, <?php echo $picture['sizes']['xlarge']; ?> 1024w"
				alt="<?php echo $picture['alt']; ?>" sizes="100vw"
				loading="lazy"
				width="1900" height="768"
			>
		</div>

		<div class="fullpicture-picture picture--mobile <?php if($picturemobilecover == 1): ?>mobile--cover cbo-picture-cover<?php endif; ?> <?php if($picturemobilecover == 0): ?>cbo-picture-contain<?php endif; ?>">
			<img
				decoding="async"
				src="<?php echo $picturemobile['sizes']['large']; ?>"
				srcset="<?php echo $picturemobile['sizes']['large']; ?> 320w, <?php echo $picturemobile['sizes']['large']; ?> 768w, <?php echo $picturemobile['sizes']['large']; ?> 1024w"
				alt="<?php echo $picturemobile['alt']; ?>" sizes="100vw"
				loading="lazy"
				width="768" height="768"
			>
		</div>
	</div>
</section>