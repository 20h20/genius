<?php
	$title	= get_sub_field('blocs_title');
?>
<section class="cbo-blocs">
	<div class="blocs-inner cbo-container">

		<?php if($title): ?>
			<div class="blocs-title cbo-title-2 slide-up" itemprop="headline">
				<?php echo esc_html($title); ?>
			</div>
		<?php endif; ?>

		<div class="blocs-list">
			<?php
				if( have_rows('blocs_list') ):
				while ( have_rows('blocs_list') ) : the_row();
				$picture	= get_sub_field('icon');
				$title		= get_sub_field('title');
				$content	= get_sub_field('content');
				$addlink	= get_sub_field('addlink');
				$link		= get_sub_field('link');
			?>
				<div class="list-el slide-right">
					<?php if($addlink): ?>
						<a class="el-inner slide-up" href="<?php echo $link ?>">
					<?php else: ?>
						<span class="el-inner slide-up">
					<?php endif; ?>
						<?php if($picture): ?>
							<span class="inner-picture cbo-picture-contain">
								<img
									decoding="async"
									src="<?php echo $picture['sizes']['xsmall']; ?>"
									srcset="<?php echo $picture['sizes']['xsmall']; ?> 320w, <?php echo $picture['sizes']['xsmall']; ?> 768w, <?php echo $picture['sizes']['xsmall']; ?> 1024w"
									alt="<?php echo $picture['alt']; ?>" sizes="100vw"
									loading="lazy"
									width="60" height="60"
									itemprop="image"
								>
							</span>
						<?php endif; ?>

						<div class="inner-content">
							<?php if($title): ?>
								<span class="content-title cbo-title-3">
									<?php echo esc_html($title); ?>
								</span>
							<?php endif; ?>

							<?php if($content): ?>
								<span class="content-text">
									<?php echo esc_html($content); ?>
								</span>
							<?php endif; ?>
						</div>
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