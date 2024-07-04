<?php
	$size	= get_sub_field('text_size');
	$title	= get_sub_field('text_title');
	$chapo	= get_sub_field('text_chapo');
	$text	= get_sub_field('text_content');
?>
<section class="cbo-text">
	<div class="text-inner cbo-container container--<?php echo $size ?>">
		<?php if($title): ?>
			<div class="text-title cbo-title-1 slide-up">
				<?php echo $title ?>
			</div>
		<?php endif; ?>

		<?php if($chapo): ?>
			<div class="text-chapo slide-up">
				<?php echo $chapo ?>
			</div>
		<?php endif; ?>

		<div class="text-content">
			<div class="cbo-cms">
				<?php echo $text ?>
			</div>
		</div>
	</div>
</section>