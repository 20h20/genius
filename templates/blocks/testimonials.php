<?php
	$title	= get_sub_field('testimonials_title');
	$addbt	= get_sub_field('testimonials_button');
	$txtbt	= get_sub_field('testimonials_buttontxt');
	$urlbt	= get_sub_field('testimonials_buttonurl');

	$titlequote	= get_sub_field('testimonials_textitle');
	$contentquote	= get_sub_field('testimonials_textcontent');
	$namequote	= get_sub_field('testimonials_textname');
	$functionquote	= get_sub_field('testimonials_textfunction');
?>
<section class="cbo-testimonials">
	<div class="testimonials-inner cbo-container container--medium">

		<?php if($title): ?>
			<div class="testimonials-title cbo-title-2">
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

			<article <?php post_class('list-el'); ?> itemprop="blogPosts" itemscope itemtype="http://schema.org/BlogPosting">
				<div class="el-inner">
					<div class="inner-content">
						<div class="content-container">
							<div class="container-inner">
								<h3 class="content-title cbo-title-3">
									<?php echo $titlequote ?>
								</h3>	
								<div class="content-text cbo-cms">
									<?php echo $contentquote ?>
								</div>
							</div>
						</div>
						<span class="inner-border"></span>
					</div>
					<div class="inner-informations">
						<div class="informations-name cbo-title-3">
							<?php echo $namequote ?>
						</div>
						<div class="informations-society">
							<?php echo $functionquote ?>
						</div>
					</div>
				</div>
			</article>
		</div>

		<?php if($addbt == 1): ?>
			<div class="testimonials-button">
				<a class="cbo-button button--borderblue button--icon slide-up" href="<?php echo $urlbt ?>">
					<?php echo $txtbt ?>
				</a>
			</div>
		<?php endif; ?>
	</div>
</section>