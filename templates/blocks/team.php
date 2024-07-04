<?php
	$title	= get_sub_field('team_title');
?>
<section class="cbo-team">
	<div class="team-inner cbo-container">

		<?php if($title): ?>
			<div class="team-title cbo-title-1 slide-up">
				<?php echo $title ?>
			</div>
		<?php endif; ?>

		<div class="team-list">
			<?php
				if( have_rows('team_list') ):
				while( have_rows('team_list') ): the_row();
				$picture = get_sub_field('picture');
				$name = get_sub_field('name');
				$function = get_sub_field('function');
				$addvideo = get_sub_field('addvideo');
				$videoid = get_sub_field('videoid');
			?>
				<div class="list-el">
					<div class="el-inner">
						<div class="el-picture cbo-picture-cover slide-up">
							<?php if($addvideo == 1): ?>
								<span class="video-play">
									<i class="icon icon--player"></i>
								</span>
							<?php endif; ?>
							<img
								src="<?php echo $picture['sizes']['small']; ?>"
								srcset="<?php echo $picture['sizes']['small'] ?> 320w, <?php echo $picture['sizes']['small'] ?> 768w, <?php echo $picture['sizes']['medium'] ?> 1024w"
								alt="<?php echo $picture["alt"]; ?>"
								loading="lazy"
								width="500" height="500"
							>
						</div>
						<div class="el-name slide-up">
							<?php echo $name ?>
						</div>
						<div class="el-function slide-up">
							<?php echo $function ?>
						</div>
					</div>

					<?php if($addvideo == 1): ?>
						<div class="cbo-modale video-modale">
							<div class="modale-inner">
								<button type="button" class="modale-close" aria-label="Fermer la modale">
									<span class="top"></span>
									<span class="bottom"></span>
								</button>

								<div class="modale-content">
									<?php echo $videoid ?>
								</div>
							</div>
							<div class="modale-overlay" id="myModal-close"></div>
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