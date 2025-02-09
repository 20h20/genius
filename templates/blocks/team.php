<?php
	$title	= get_sub_field('team_title');
	$icon	= get_sub_field('team_icon');
?>
<section class="cbo-team" itemscope itemtype="http://schema.org/Organization">
	<div class="team-inner cbo-container">

		<?php if($icon): ?>
			<div class="team-icon cbo-picture-contain slide-up">
				<img
					decoding="async"
					src="<?php echo $icon['sizes']['small']; ?>"
					srcset="<?php echo $icon['sizes']['small']; ?> 320w, <?php echo $icon['sizes']['xlarge']; ?> 768w, <?php echo $icon['sizes']['xlarge']; ?> 1024w"
					alt="<?php echo $icon['alt']; ?>" sizes="100vw"
					loading="lazy"
					width="70" height="70"
					itemprop="image"
				>
			</div>
		<?php endif; ?>

		<?php if($title): ?>
			<div class="team-title cbo-title-2 slide-up">
				<?php echo $title ?>
			</div>
		<?php endif; ?>

		<div class="team-list">
			<?php
				$counter = 0;
				if( have_rows('team_list') ):
				while( have_rows('team_list') ): the_row();
				$counter++;
				$picture = get_sub_field('picture');
				$name = get_sub_field('name');
				$function = get_sub_field('function');
				$addvideo = get_sub_field('addvideo');
				$videoid = get_sub_field('videoid');
			?>
				<div class="list-el" itemscope itemtype="http://schema.org/Person">
					<div class="el-inner">
						<div class="el-picture cbo-picture-cover slide-up" itemprop="image">
							<?php if($addvideo == 1): ?>
								<span class="video-play" data-target="modale-<?php echo $counter; ?>">
									<i class="icon icon--player"></i>
								</span>
							<?php endif; ?>
							<img
								src="<?php echo $picture['sizes']['small']; ?>"
								srcset="<?php echo $picture['sizes']['small'] ?> 320w, <?php echo $picture['sizes']['small'] ?> 768w, <?php echo $picture['sizes']['medium'] ?> 1024w"
								alt="<?php echo $picture["alt"]; ?>"
								loading="lazy"
								width="500" height="500"
								itemprop="image"
							>
						</div>
						<div class="el-name slide-up" itemprop="name">
							<?php echo $name ?>
						</div>
						<div class="el-function slide-up" itemprop="jobTitle">
							<?php echo $function ?>
						</div>
					</div>

					<?php if($addvideo == 1): ?>
						<div class="cbo-modale video-modale" id="modale-<?php echo $counter; ?>">
							<div class="modale-inner">
								<button type="button" class="modale-close" aria-label="Fermer la modale">
									<span class="top"></span>
									<span class="bottom"></span>
								</button>
								<div class="modale-content">
									<?php echo $videoid ?>
								</div>
							</div>
							<div class="modale-overlay"></div>
						</div>
					<?php endif; ?>
				</div>
			<?php
				endwhile;
				endif;
			?>
		</div>
	</div>
</section>