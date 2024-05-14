<?php
	$title	= get_sub_field('relation_title');
	$addbt	= get_sub_field('relation_addbt');
	$txtbt	= get_sub_field('relation_txtbt');
	$urlbt	= get_sub_field('relation_urlbt');
?>
<section class="cbo-relation">
	<div class="relation-inner cbo-container">

		<?php if($title): ?>
			<div class="relation-title cbo-title-1 slide-up">
				<?php echo $title ?>
			</div>
		<?php endif; ?>

		<div class="articles-list">
			<?php
				global $post;
				$posts = get_sub_field('relation_list');
				if($posts):
				foreach( $posts as $post):
				setup_postdata($post);
					get_template_part('templates/content/content','article');
				endforeach;
				wp_reset_postdata();
				endif;
			?>
		</div>

		<?php if($addbt == 1): ?>
			<div class="relations-button">
				<a class="cbo-button button--icon" href="<?php echo $urlbt ?>">
					<?php echo $txtbt ?>
				</a>
			</div>
		<?php endif; ?>
	</div>
</section>