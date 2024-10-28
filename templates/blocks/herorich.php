<?php
	$picture	= get_sub_field('herorich_picture');
	$pictureblocpos	= get_sub_field('herorich_pictureblocpos');
	$picture2	= get_sub_field('herorich_picture2');
	$title	= get_sub_field('herorich_title');
	$subtitle	= get_sub_field('herorich_subtitle');
	$chapo	= get_sub_field('herorich_chapo');

	$addbutton	= get_sub_field('herorich_addbt');
	$buttoncolor	= get_sub_field('herorich_colorbt');
	$buttontxt	= get_sub_field('herorich_txtbt');
	$buttonturl	= get_sub_field('herorich_urlbt');
	$buttontype	= get_sub_field('herorich_typebt');

	$addbutton2	= get_sub_field('herorich_addbt2');
	$buttoncolor2	= get_sub_field('herorich_colorbt2');
	$buttontxt2	= get_sub_field('herorich_txtbt2');
	$buttonturl2	= get_sub_field('herorich_urlbt2');
	$buttontype2	= get_sub_field('herorich_typebt2');
?>
<section class="cbo-herorich">
	<div class="herorich-inner cbo-container">

		<div class="herorich-picture">
			<?php if($picture2): ?>
				<div class="picture-secondpic cbo-picture-contain slide-up">
					<img
						decoding="async"
						src="<?php echo $picture2['sizes']['small']; ?>"
						srcset="<?php echo $picture2['sizes']['small']; ?> 320w, <?php echo $picture2['sizes']['xlarge']; ?> 768w, <?php echo $picture2['sizes']['xlarge']; ?> 1024w"
						alt="<?php echo $picture2['alt']; ?>" sizes="100vw"
						width="1500" height="1500"
					>
				</div>
			<?php endif; ?>
			<div class="picture-main cbo-picture-cover picture--<?php echo $pictureblocpos; ?> slide-up">
				<img
					decoding="async"
					src="<?php echo $picture['sizes']['small']; ?>"
					srcset="<?php echo $picture['sizes']['small']; ?> 320w, <?php echo $picture['sizes']['xlarge']; ?> 768w, <?php echo $picture['sizes']['xlarge']; ?> 1024w"
					alt="<?php echo $picture['alt']; ?>" sizes="100vw"
					width="1500" height="1500"
				>
			</div>
		</div>

		<div class="herorich-content">
			<?php if($title): ?>
				<h1 class="herorich-title cbo-title-1 slide-up" itemprop="headline">
					<?php echo $title; ?>
				</h1>
			<?php endif; ?>

			<?php if($subtitle): ?>
				<div class="herorich-subtitle slide-up">
					<?php echo $subtitle; ?>
				</div>
			<?php endif; ?>

			<?php if($chapo): ?>
				<div class="herorich-chapo cbo-cms slide-up">
					<?php echo $chapo; ?>
				</div>
			<?php endif; ?>

			<?php if( have_rows('herorich_content') ): ?>
				<div class="content-list slide-up">
					<?php
						while ( have_rows('herorich_content') ) : the_row();
						$picture	= get_sub_field('picture');
						$text	= get_sub_field('text');
					?>
						<div class="list-el">
							<div class="el-inner">
								<?php if($picture): ?>
									<span class="inner-picture cbo-picture-contain">
										<img
											decoding="async"
											src="<?php echo $picture['sizes']['xsmall']; ?>"
											srcset="<?php echo $picture['sizes']['xsmall']; ?> 320w, <?php echo $picture['sizes']['xsmall']; ?> 768w, <?php echo $picture['sizes']['xsmall']; ?> 1024w"
											alt="<?php echo $picture['alt']; ?>" sizes="100vw"
											loading="lazy"
											width="40" height="40"
										>
									</span>
								<?php endif; ?>

								<?php if($text): ?>
									<div class="inner-text cbo-cms">
										<?php echo $text ?>
									</div>
								<?php endif; ?>
							</div>
						</div>
					<?php
						endwhile;
					?>
				</div>
			<?php endif; ?>

			<?php if($addbutton == 1): ?>
				<div class="container-buttons slide-up">
					<div class="buttons-list">
						<a
							class="cbo-button <?php echo $buttoncolor; ?> <?php if($buttoncolor == 'bleu'): ?>button--icon<?php endif; ?> <?php if($buttontype == 'modale'): ?>button-modale<?php endif; ?>"
							href="<?php if($buttontype == 'url'): ?><?php echo $buttonturl; ?><?php endif; ?><?php if($buttontype == 'modale'): ?>#<?php endif; ?> "
							itemprop="url"
						>
							<?php echo $buttontxt; ?>
						</a>
						<?php if($addbutton2 == 1): ?>
							<a
								class="cbo-button <?php echo $buttoncolor2; ?> <?php if($buttoncolor2 == 'bleu'): ?>button--icon<?php endif; ?> <?php if($buttontype2 == 'modale'): ?>button-modale<?php endif; ?>"
								href="<?php if($buttontype2 == 'url'): ?><?php echo $buttonturl2; ?><?php endif; ?><?php if($buttontype2 == 'modale'): ?>#<?php endif; ?> "
								itemprop="url"
							>
								<?php echo $buttontxt2; ?>
							</a>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>