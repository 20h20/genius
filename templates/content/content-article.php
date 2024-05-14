<?php
	$category = get_the_category();
	$category_name = isset($category[0]) ? $category[0]->name : 'N.C';
	$excerpt = get_the_excerpt();
	$limited_excerpt = wp_trim_words($excerpt, 25, '...');
?>
<article <?php post_class('list-el'); ?> itemprop="blogPosts" itemscope itemtype="http://schema.org/BlogPosting">
	<a class="el-inner" href="<?php the_permalink(); ?>" itemprop="url">
		<span class="inner-border"></span>
		<span class="el-picture cbo-picture-cover">
			<span class="picture-category">
				<?php echo $category_name; ?>
			</span>
			<?php the_post_thumbnail( 'small', array( 'sizes' => '(max-width:320px) 145px, (max-width:425px) 220px, 500px' ) );?>
		</span>

		<span class="el-content">
			<span class="content-top">
				<h3 class="content-title cbo-title-4">
					<?php the_title(); ?>
				</h3>
				<span class="content-text">
					<?php echo $limited_excerpt; ?>
				</span>
			</span>

			<span class="content-link">
				<span class="cbo-button cbo-link button--icon">
					Lire la suite
				</span>
			</span>
		</span>
	</a>
</article>