<?php
	$title	= get_sub_field('blocssimple_title');
?>
<section class="cbo-blocssimple">
	<div class="blocssimple-inner cbo-container">

		<?php if($title): ?>
			<div class="blocssimple-title cbo-title-1 slide-up">
				<?php echo $title ?>
			</div>
		<?php endif; ?>

		<div class="blocssimple-list slide-up">
			<?php
				if( have_rows('blocssimple_list') ):
				while ( have_rows('blocssimple_list') ) : the_row();
				$picture	= get_sub_field('icon');
				$title		= get_sub_field('title');
				$content		= get_sub_field('content');
			?>
				<div class="list-el">
					<div class="el-inner">
						<div class="inner-top">
							<?php if($picture): ?>
								<div class="inner-picture cbo-picture-contain slide-up">
									<img
										decoding="async"
										src="<?php echo $picture['sizes']['xsmall']; ?>"
										srcset="<?php echo $picture['sizes']['xsmall']; ?> 320w, <?php echo $picture['sizes']['xsmall']; ?> 768w, <?php echo $picture['sizes']['xsmall']; ?> 1024w"
										alt="<?php echo $picture['alt']; ?>" sizes="100vw"
										loading="lazy"
										width="80" height="80"
									>
								</div>
							<?php endif; ?>

							<?php if($title): ?>
								<div class="content-title cbo-title-5 slide-up">
									<?php echo $title ?>
								</div>
							<?php endif; ?>
						</div>

						<?php if($content): ?>
							<div class="content-text slide-up">
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