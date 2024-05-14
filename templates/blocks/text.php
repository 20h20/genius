<?php
	$title	= get_sub_field('text_title');
	$text	= get_sub_field('text_content');
?>
<section class="cbo-text">
	<div class="text-inner cbo-container container--small">
		<?php if($title): ?>
			<div class="text-title cbo-title-1 slide-up">
				<?php echo $title ?>
			</div>
		<?php endif; ?>

		<div class="text-content">
			<div class="cbo-cms">
				<?php echo $text ?>
			</div>
		</div>
	</div>
</section>