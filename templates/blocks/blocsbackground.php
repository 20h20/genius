<?php
	$title	= get_sub_field('blocsbackground_title');
	$chapo	= get_sub_field('blocsbackground_chapo');
	$outro	= get_sub_field('blocsbackground_outro');
	$addinfobulle	= get_sub_field('blocsbackground_addinfobulle');
	$infouptitle	= get_sub_field('blocsbackground_infobulleuptitle');
	$infotitle	= get_sub_field('blocsbackground_infobulletitle');
	$infocontent	= get_sub_field('blocsbackground_infobucontent');
?>
<section class="cbo-blocsbackground">
	<div class="blocsbackground-inner cbo-container">

		<?php if($title): ?>
			<div class="blocsbackground-title cbo-title-2 slide-up" itemprop="headline">
				<?php echo $title ?>
			</div>
		<?php endif; ?>

		<?php if($chapo): ?>
			<div class="blocsbackground-chapo cbo-chapo cbo-cms slide-up">
				<?php echo $chapo ?>
			</div>
		<?php endif; ?>

		<div class="blocsbackground-list slide-up">
			<?php
				if( have_rows('blocsbackground_list') ):
				while ( have_rows('blocsbackground_list') ) : the_row();
				$picture	= get_sub_field('icone');
				$title	= get_sub_field('title');
				$content	= get_sub_field('content');
				$color	= get_sub_field('color');
				$addlink	= get_sub_field('addlink');
				$link		= get_sub_field('link');
			?>
				<div class="list-el el--<?php echo $color ?>">
					<?php if($addlink): ?>
						<a class="el-inner slide-up" href="<?php echo $link ?>">
					<?php else: ?>
						<span class="el-inner slide-up">
					<?php endif; ?>
						<?php if($picture): ?>
							<span class="content-picture cbo-picture-contain">
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
							<span class="content-title cbo-title-3">
								<?php echo $title ?>
							</span>
						<?php endif; ?>

						<?php if($content): ?>
							<span class="content-text">
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

		<?php if($addinfobulle == 1): ?>
			<div class="blocsbackground-infotitle slide-up">
				<?php if($infouptitle): ?>
					<div class="infotitle-uptitle">
						<?php echo $infouptitle ?>
					</div>
				<?php endif; ?>

				<?php if($infotitle): ?>
					<div class="infotitle-title">
						<?php echo $infotitle ?>

						<?php if($infocontent): ?>
							<div class="infotitle-content">
								<?php echo $infocontent ?>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php if($outro): ?>
			<div class="blocsbackground-outro cbo-cms slide-up">
				<?php echo $outro ?>
			</div>
		<?php endif; ?>
	</div>
</section>