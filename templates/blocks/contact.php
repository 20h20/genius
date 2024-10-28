<?php
	$title	= get_sub_field('contact_title');
	$chapo	= get_sub_field('contact_content');
?>
<section class="cbo-contact">
	<div class="contact-inner cbo-container container--small">

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
			<div class="cbo-form slide-up">
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