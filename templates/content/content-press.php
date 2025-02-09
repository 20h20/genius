<?php
	$excerpt = get_the_excerpt();
	$limited_excerpt = wp_trim_words($excerpt, 25, '...');
	$file	= get_field('press_download');
?>
<article <?php post_class('list-el'); ?> >
	<a class="el-inner" href="<?php echo $file; ?>" target="_blank">
		<span class="inner-border"></span>
		<span class="inner-content">
			<span class="content-date">
				<span class="date-inner">
					<?php echo get_the_date(); ?>
				</span>
			</span>
			<span class="el-picture cbo-picture-contain">
				<?php the_post_thumbnail( 'small', array( 'sizes' => '(max-width:320px) 145px, (max-width:425px) 220px, 500px' ) );?>
			</span>
			<span class="el-content">
				<span class="content-top" itemprop="description">
					<?php echo $limited_excerpt; ?>
				</span>

				<span class="content-link">
					<span class="cbo-button cbo-link button--icon">
						Lire la suite
					</span>
				</span>
			</span>
		</span>
	</a>
</article>