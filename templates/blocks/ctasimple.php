<?php
	$title	= get_sub_field('ctasimple_title');
	$url	= get_sub_field('ctasimple_url');
	$content	= get_sub_field('ctasimple_content');
?>
<section class="cbo-ctasimple">
	<div class="ctasimple-inner cbo-container container--medium">
		<a class="ctasimple-box" href="<?php echo $url ?>">
			<span class="box-content">
				<?php if($title): ?>
					<span class="content-title">
						<i class="icon icon--book"></i>
						<?php echo $title ?>
					</span>
				<?php endif; ?>

				<?php if($content): ?>
					<span class="content-text cbo-cms">
						<?php echo $content ; ?>
					</span>
				<?php endif; ?>
			</span>
			<i class="icon icon--next-arrow"></i>
		</a>
	</div>
</section>