<?php
	$title	= get_sub_field('blocssimple_title');
?>
<section class="cbo-blocssimple">
	<div class="blocssimple-inner cbo-container">

		<?php if($title): ?>
			<div class="blocssimple-title cbo-title-2 slide-up" itemprop="headline">
				<?php echo esc_html($title); ?>
			</div>
		<?php endif; ?>

		<div class="blocssimple-list">
			<?php
				if( have_rows('blocssimple_list') ):
				while ( have_rows('blocssimple_list') ) : the_row();
				$color	= get_sub_field('color');
				$picture	= get_sub_field('icon');
				$title		= get_sub_field('title');
				$content	= get_sub_field('content');
				$addlink	= get_sub_field('addlink');
				$link		= get_sub_field('link');
			?>
				<div class="list-el">
					<?php if($addlink): ?>
						<a class="el-inner slide-up inner--<?php echo $color ?>" href="<?php echo $link ?>">
					<?php else: ?>
						<span class="el-inner slide-up inner--<?php echo $color ?>">
					<?php endif; ?>
						<span class="inner-top">
							<?php if($picture): ?>
								<span class="inner-picture cbo-picture-contain slide-up">
									<img
										decoding="async"
										src="<?php echo $picture['sizes']['xsmall']; ?>"
										srcset="<?php echo $picture['sizes']['xsmall']; ?> 320w, <?php echo $picture['sizes']['xsmall']; ?> 768w, <?php echo $picture['sizes']['xsmall']; ?> 1024w"
										alt="<?php echo $picture['alt']; ?>" sizes="100vw"
										loading="lazy"
										width="80" height="80"
										itemprop="image"
									>
								</span>
							<?php endif; ?>

							<?php if($title): ?>
								<span class="content-title cbo-title-3 slide-up">
									<?php echo $title ?>
								</span>
							<?php endif; ?>
						</span>

						<?php if($content): ?>
							<span class="content-text slide-up">
								<?php echo $content ?>
							</span>
						<?php endif; ?>
					<?php if($addlink): ?>
						</a>
					<?php else: ?>
						</span>
					<?php endif; ?>
				</div>
			<?php
				endwhile;
				endif;
			?>
		</div>
	</div>
</section>