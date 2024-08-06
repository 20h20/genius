<?php
	$mtop	= get_sub_field('textpicture_margetop');
	$mbot	= get_sub_field('textpicture_margebot');
	$title	= get_sub_field('textpicture_title');
	$icon	= get_sub_field('textpicture_icon');
	$content	= get_sub_field('textpicture_content');
	$picture	= get_sub_field('textpicture_picture');
	$cover	= get_sub_field('textpicture_picturecover');
	$position	= get_sub_field('textpicture_position');

	$addquote	= get_sub_field('textpicture_addquote');
	$quotepicture	= get_sub_field('textpicture_quotepicture');
	$quotename	= get_sub_field('textpicture_quotename');
	$quotefunction	= get_sub_field('textpicture_quotefunction');
?>
<section class="cbo-textpicture textpicture--<?php echo $position; ?>">
	<div class="textpicture-inner cbo-container container--medium textpicture--margetop<?php echo $mtop; ?> textpicture--margebot<?php echo $mbot; ?>">

		<?php if($icon): ?>
			<div class="textpicture-icon cbo-picture-contain slide-up">
				<img
					decoding="async"
					src="<?php echo $icon['sizes']['small']; ?>"
					srcset="<?php echo $icon['sizes']['small']; ?> 320w, <?php echo $icon['sizes']['xlarge']; ?> 768w, <?php echo $icon['sizes']['xlarge']; ?> 1024w"
					alt="<?php echo $icon['alt']; ?>" sizes="100vw"
					loading="lazy"
					width="70" height="70"
					itemprop="image"
				>
			</div>
		<?php endif; ?>

		<?php if($title): ?>
			<div class="textpicture-title cbo-title-1 slide-up" itemprop="headline">
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
					itemprop="image"
				>
			</div>

			<div class="textpicture-content">
				<?php if($addquote == 1): ?>
					<div class="content-quote">
						<div class="quote-picture cbo-picture-cover">
							<img
								decoding="async"
								src="<?php echo $quotepicture['sizes']['small']; ?>"
								srcset="<?php echo $quotepicture['sizes']['small']; ?> 320w, <?php echo $quotepicture['sizes']['xlarge']; ?> 768w, <?php echo $quotepicture['sizes']['xlarge']; ?> 1024w"
								alt="<?php echo $quotepicture['alt']; ?>" sizes="100vw"
								loading="lazy"
								width="768" height="768"
								itemprop="image"
							>
						</div>
						<div class="quote-informations">
							<div class="informations-inner">
								<span class="informations-name">
									<?php echo $quotename ?>
								</span>
								<span class="informations-function">
									<?php echo $quotefunction ?>
								</span>
							</div>
						</div>
					</div>
				<?php endif; ?>

				<?php if($content): ?>
					<div class="cbo-cms">
						<?php echo $content ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>