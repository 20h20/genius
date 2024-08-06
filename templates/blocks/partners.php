<?php
	$title	= get_sub_field('partners_title');
?>
<section class="cbo-partners">
	<div class="partners-inner cbo-container">

		<?php if($title): ?>
			<div class="partners-title cbo-title-2 slide-up" itemprop="headline">
				<?php echo $title ?>
			</div>
		<?php endif; ?>

		<div class="partners-list slide-up">
			<?php
				if( have_rows('partners_list') ):
				while( have_rows('partners_list') ): the_row();
				$picture = get_sub_field('picture');
			?>
				<div class="list-el">
					<div class="el-inner cbo-picture-contain" itemscope itemtype="https://schema.org/Organization">
						<img
							src="<?php echo $picture['sizes']['small']; ?>"
							srcset="<?php echo $picture['sizes']['small'] ?> 320w, <?php echo $picture['sizes']['small'] ?> 768w, <?php echo $picture['sizes']['small'] ?> 1024w"
							alt="<?php echo $picture["alt"]; ?>"
							loading="lazy"
							width="290" height="140"
							itemprop="logo"
						>
					</div>
				</div>
			<?php
				endwhile;
				endif;
			?>
		</div>
	</div>
</section>