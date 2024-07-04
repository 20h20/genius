<?php
	$name	= get_field('testimonials_user');
	$society	= get_field('testimonials_enterprise');
	$videoid	= get_field('testimonials_video');
	$videocover	= get_field('testimonials_videocover');
?>
<article <?php post_class('list-el el--video'); ?> itemprop="blogPosts" itemscope itemtype="http://schema.org/BlogPosting">
	<div class="el-inner">
		<div class="inner-content">
			<div class="content-video">
				<span class="video-play">
					<i class="icon icon--player"></i>
				</span>
				<div class="video-cover" data-video-id="<?php echo $videoid; ?>" style="background-image:url(<?php echo $videocover["url"]; ?>);"></div>
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