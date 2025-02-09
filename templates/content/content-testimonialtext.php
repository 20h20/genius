<?php
	$name	= get_field('testimonials_user');
	$society	= get_field('testimonials_enterprise');
?>
<article <?php post_class('list-el'); ?> itemscope itemtype="http://schema.org/Review">
	<div class="el-inner">
		<div class="inner-content">
			<div class="content-container">
				<h3 class="content-title cbo-title-3" itemprop="headline">
					<?php the_title(); ?>
				</h3>	
				<div class="content-text cbo-cms" itemprop="reviewBody">
					<?php the_content(); ?>
				</div>
			</div>
			<span class="inner-border"></span>
		</div>
		<div class="inner-informations">
			<div class="informations-name cbo-title-3" itemprop="author" itemscope itemtype="http://schema.org/Person">
				<?php echo $name ?>
			</div>
			<div class="informations-society" itemscope itemtype="http://schema.org/Organization">
				<?php echo $society ?>
			</div>
		</div>
	</div>
</article>