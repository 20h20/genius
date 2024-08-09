<?php
	$title	= get_sub_field('keynumbers_title');
?>
<section class="cbo-keynumbers">
	<div class="keynumbers-inner cbo-container container--medium">

		<?php if($title): ?>
			<div class="keynumbers-title cbo-title-2 slide-up" itemprop="headline">
				<?php echo $title ?>
			</div>
		<?php endif; ?>

		<div class="keynumbers-list slide-up">
			<?php
				if( have_rows('keynumbers_list') ):
				while ( have_rows('keynumbers_list') ) : the_row();
				$keynumber		= get_sub_field('keynumber');
				$chapo	= get_sub_field('chapo');
				$content	= get_sub_field('content');
			?>
				<div class="list-el">
					<div class="el-inner">
						<?php if($keynumber): ?>
							<div class="inner-number cbo-title-1 slide-up">
								<?php echo $keynumber ?>
							</div>
						<?php endif; ?>

						<?php if($chapo): ?>
							<div class="inner-chapo cbo-chapo slide-up">
								<?php echo $chapo ?>
							</div>
						<?php endif; ?>

						<?php if($content): ?>
							<div class="inner-text slide-up">
								<?php echo $content ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			<?php
				endwhile;
				endif;
			?>
		</div>
	</div>
</section>