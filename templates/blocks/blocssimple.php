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

		<div class="blocssimple-list">
			<?php
				if( have_rows('blocssimple_list') ):
				while ( have_rows('blocssimple_list') ) : the_row();
				$picture	= get_sub_field('icon');
				$title		= get_sub_field('title');
			?>
				<div class="list-el slide-up">
					<div class="el-inner">
						<?php if($picture): ?>
							<div class="inner-picture cbo-picture-contain">
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

						<div class="inner-content">
							<?php if($title): ?>
								<div class="content-title cbo-title-5">
									<?php echo $title ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php
				endwhile;
				endif;
			?>
		</div>
	</div>
</section>