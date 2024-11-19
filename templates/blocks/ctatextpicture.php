<?php
	$title	= get_sub_field('ctatextpicture_title');
	$picture	= get_sub_field('ctatextpicture_picture');
	$content	= get_sub_field('ctatextpicture_content');
?>
<section class="cbo-ctatextpicture">
	<div class="ctatextpicture-inner cbo-container container--medium">

		<?php if($title): ?>
			<div class="ctatextpicture-title cbo-title-1 slide-up" itemprop="headline">
				<?php echo $title ?>
			</div>
		<?php endif; ?>

		<div class="ctatextpicture-box">
			<?php if($picture): ?>
				<div class="box-picture cbo-picture-cover">
					<img
						decoding="async"
						src="<?php echo $picture['sizes']['small']; ?>"
						srcset="<?php echo $picture['sizes']['small']; ?> 320w, <?php echo $picture['sizes']['medium']; ?> 768w, <?php echo $picture['sizes']['medium']; ?> 1024w"
						alt="<?php echo $picture['alt']; ?>" sizes="100vw"
						loading="lazy"
						width="800" height="800"
					>
				</div>
			<?php endif; ?>

			<?php if($content): ?>
				<div class="box-content cbo-cms">
					<?php echo $content ; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>