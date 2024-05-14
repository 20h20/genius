<?php
	$title	= get_sub_field('testimonials_title');
?>
<section class="cbo-testimonials">
	<div class="testimonials-inner cbo-container container--medium">

		<?php if($title): ?>
			<div class="testimonials-title cbo-title-1 slide-up">
				<?php echo $title ?>
			</div>
		<?php endif; ?>

		<div class="testimonialslist-list">
			<?php
				global $post;
				$posts = get_sub_field('testimonials_video');
				if($posts):
				foreach( $posts as $post):
				setup_postdata($post);
					get_template_part('templates/content/content','testimonialvideo');
				endforeach;
				wp_reset_postdata();
				endif;
			?>

			<?php
				global $post;
				$posts = get_sub_field('testimonials_text');
				if($posts):
				foreach( $posts as $post):
				setup_postdata($post);
					get_template_part('templates/content/content','testimonialtext');
				endforeach;
				wp_reset_postdata();
				endif;
			?>
		</div>
	</div>
</section>