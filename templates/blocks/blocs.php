<?php
	$title	= get_sub_field('blocs_title');
?>
<section class="cbo-blocs">
	<div class="blocs-inner cbo-container">

		<?php if($title): ?>
			<div class="blocs-title cbo-title-1 slide-up">
				<?php echo $title ?>
			</div>
		<?php endif; ?>

		<div class="blocs-list">
			<?php
				if( have_rows('blocs_list') ):
				while ( have_rows('blocs_list') ) : the_row();
				$picture	= get_sub_field('icon');
				$title		= get_sub_field('title');
				$content	= get_sub_field('content');
			?>
				<div class="list-el slide-right">
					<div class="el-inner">
						<?php if($picture): ?>
							<div class="inner-picture cbo-picture-contain">
								<img
									decoding="async"
									src="<?php echo $picture['sizes']['xsmall']; ?>"
									srcset="<?php echo $picture['sizes']['xsmall']; ?> 320w, <?php echo $picture['sizes']['xsmall']; ?> 768w, <?php echo $picture['sizes']['xsmall']; ?> 1024w"
									alt="<?php echo $picture['alt']; ?>" sizes="100vw"
									loading="lazy"
									width="150" height="98"
								>
							</div>
						<?php endif; ?>

						<div class="inner-content">
							<?php if($title): ?>
								<div class="content-title cbo-title-2">
									<?php echo $title ?>
								</div>
							<?php endif; ?>

							<?php if($content): ?>
								<div class="content-text">
									<?php echo $content ?>
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