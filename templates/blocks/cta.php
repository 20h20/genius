<?php
	$icon	= get_sub_field('cta_icon');
	$title	= get_sub_field('cta_title');
	$content	= get_sub_field('cta_content');
	$picture	= get_sub_field('cta_picture');
	$addbt	= get_sub_field('cta_addbt');
	$txtbt	= get_sub_field('cta_txtbt');
	$typebt	= get_sub_field('cta_typebt');
	$urlbt	= get_sub_field('cta_urlbt');
?>
<section class="cbo-cta">
	<div class="cta-inner cbo-container">

		<div class="cta-box">
			<div class="cta-content">
				<?php if($icon): ?>
					<div class="content-icon cbo-picture-contain slide-up">
						<img
							decoding="async"
							src="<?php echo $icon['sizes']['xsmall']; ?>"
							srcset="<?php echo $icon['sizes']['xsmall']; ?> 320w, <?php echo $icon['sizes']['xsmall']; ?> 768w, <?php echo $icon['sizes']['xsmall']; ?> 1024w"
							alt="<?php echo $icon['alt']; ?>" sizes="100vw"
							loading="lazy"
							width="100" height="100"
						>
					</div>
				<?php endif; ?>

				<?php if($title): ?>
					<div class="content-title cbo-title-2 slide-up">
						<?php echo $title ; ?>
					</div>
				<?php endif; ?>

				<?php if($content): ?>
					<div class="content-text cbo-cms slide-up">
						<?php echo $content ; ?>
					</div>
				<?php endif; ?>

				<?php if($addbt == 1): ?>
					<a
						class="cbo-button button--border button--icon slide-up <?php if($typebt == 'modale'): ?>button-modale<?php endif; ?>"
						href="<?php if($typebt == 'url'): ?><?php echo $urlbt; ?><?php endif; ?><?php if($typebt == 'modale'): ?>#<?php endif; ?>"
					>
						<?php echo $txtbt; ?>
					</a>
				<?php endif; ?>
			</div>

			<?php if($picture): ?>
				<div class="box-picture cbo-picture-cover">
					<img
						decoding="async"
						src="<?php echo $picture['sizes']['xsmall']; ?>"
						srcset="<?php echo $picture['sizes']['small']; ?> 320w, <?php echo $picture['sizes']['xlarge']; ?> 768w, <?php echo $picture['sizes']['xlarge']; ?> 1024w"
						alt="<?php echo $picture['alt']; ?>" sizes="100vw"
						loading="lazy"
						width="1600" height="700"
					>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>