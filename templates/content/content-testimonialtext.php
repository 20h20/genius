<?php
	$name	= get_field('testimonials_user');
	$society	= get_field('testimonials_enterprise');
?>
<article <?php post_class('list-el slide-up'); ?> itemprop="blogPosts" itemscope itemtype="http://schema.org/BlogPosting">
	<div class="el-inner">
		<div class="inner-content">
			<div class="content-container">
				<h3 class="content-title cbo-title-3">
					<?php the_title(); ?>
				</h3>	
				<div class="content-text cbo-cms">
					<?php the_content(); ?>
				</div>
			</div>
			<span class="inner-border"></span>
		</div>
		<div class="inner-informations">
			<div class="informations-name cbo-title-4">
				<?php echo $name ?>
			</div>
			<div class="informations-society">
				<?php echo $society ?>
			</div>
		</div>
	</div>
</article>