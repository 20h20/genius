<?php
	$title	= get_sub_field('contact_title');
	$chapo	= get_sub_field('contact_content');
	$picture	= get_sub_field('contact_picture');
	$cover	= get_sub_field('contact_cover');
?>
<section class="cbo-contact">
	<div class="contact-inner cbo-container container--medium">

		<?php if($title): ?>
			<div class="contact-title cbo-title-2 slide-up" itemprop="headline">
				<?php echo $title ?>
			</div>
		<?php endif; ?>

		<?php if($chapo): ?>
			<div class="contact-chapo cbo-chapo cbo-cms slide-up">
				<?php echo $chapo ?>
			</div>
		<?php endif; ?>

		<div class="contact-content">
			<div class="content-picture <?php if($cover == 1): ?>cbo-picture-cover<?php endif; ?> <?php if($cover == 0): ?>cbo-picture-contain<?php endif; ?> slide-up">
				<img
					decoding="async"
					src="<?php echo $picture['sizes']['small']; ?>"
					srcset="<?php echo $picture['sizes']['small']; ?> 320w, <?php echo $picture['sizes']['xlarge']; ?> 768w, <?php echo $picture['sizes']['xlarge']; ?> 1024w"
					alt="<?php echo $picture['alt']; ?>" sizes="100vw"
					loading="lazy"
					width="768" height="768"
					itemprop="image"
				>
			</div>
			<div class="content-form cbo-form slide-up">
				<?php
					$posts = get_sub_field('contact_form');
					if( $posts ):
						foreach( $posts as $p ):
							$cf7_id= $p->ID;
							echo do_shortcode( '[contact-form-7 id="'.$cf7_id.'" ]' );
						endforeach;
					endif;
				?>
			</div>
		</div>
	</div>
</section>