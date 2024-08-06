<?php
	$title	= get_sub_field('richblocs_title');
?>
<section class="cbo-richblocs">
	<div class="richblocs-inner cbo-container">
		<?php if($title): ?>
			<div class="richblocs-title cbo-title-2 slide-up" itemprop="headline">
				<?php echo $title ?>
			</div>
		<?php endif; ?>

		<div class="richblocs-list">
			<?php
				if( have_rows('richblocs_list') ):
				while ( have_rows('richblocs_list') ) : the_row();
				$picture	= get_sub_field('icon');
				$title	= get_sub_field('title');
				$content	= get_sub_field('content');
				$addbt	= get_sub_field('addbt');
				$txtbt	= get_sub_field('txtbt');
				$urlbt	= get_sub_field('urlbt');
				$color	= get_sub_field('color');
			?>
				<div class="list-el slide-up">
					<div class="el-inner inner--<?php echo $color ?>">
						<?php if($picture): ?>
							<span class="inner-picture cbo-picture-contain slide-up">
								<img
									decoding="async"
									src="<?php echo $picture['sizes']['xsmall']; ?>"
									srcset="<?php echo $picture['sizes']['xsmall']; ?> 320w, <?php echo $picture['sizes']['xsmall']; ?> 768w, <?php echo $picture['sizes']['xsmall']; ?> 1024w"
									alt="<?php echo $picture['alt']; ?>" sizes="100vw"
									loading="lazy"
									width="100" height="75"
									itemprop="image"
								>
							</span>
						<?php endif; ?>

						<?php if($title): ?>
							<div class="inner-title cbo-title-3 slide-up">
								<?php echo $title ?>
							</div>
						<?php endif; ?>

						<?php if($content): ?>
							<div class="content-text slide-up">
								<?php echo $content ?>
							</div>
						<?php endif; ?>

						<?php if($addbt == 1): ?>
							<a class="cbo-button cbo-link button--icon slide-up" href="<?php echo $urlbt ?>">
								<?php echo $txtbt ?>
							</a>
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