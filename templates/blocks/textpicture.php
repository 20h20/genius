<?php
	$mtop	= get_sub_field('textpicture_margetop');
	$mbot	= get_sub_field('textpicture_margebot');
	$title	= get_sub_field('textpicture_title');
	$icon	= get_sub_field('textpicture_icon');
	$content	= get_sub_field('textpicture_content');
	
	$type	= get_sub_field('textpicture_mediatype');
	$picture	= get_sub_field('textpicture_picture');
	$cover	= get_sub_field('textpicture_picturecover');
	$position	= get_sub_field('textpicture_position');
	$videoid = get_sub_field('textpicture_videoid');

	$addquote	= get_sub_field('textpicture_addquote');
	$quotepicture	= get_sub_field('textpicture_quotepicture');
	$quotename	= get_sub_field('textpicture_quotename');
	$quotefunction	= get_sub_field('textpicture_quotefunction');
?>
<section class="cbo-textpicture textpicture--<?php echo $position; ?>">
	<div class="textpicture-inner cbo-container container--medium textpicture--margetop<?php echo $mtop; ?> textpicture--margebot<?php echo $mbot; ?>">

		<?php if($icon): ?>
			<div class="textpicture-icon cbo-picture-contain slide-up">
				<img
					decoding="async"
					src="<?php echo $icon['sizes']['small']; ?>"
					srcset="<?php echo $icon['sizes']['small']; ?> 320w, <?php echo $icon['sizes']['xlarge']; ?> 768w, <?php echo $icon['sizes']['xlarge']; ?> 1024w"
					alt="<?php echo $icon['alt']; ?>" sizes="100vw"
					loading="lazy"
					width="70" height="70"
					itemprop="image"
				>
			</div>
		<?php endif; ?>

		<?php if($title): ?>
			<div class="textpicture-title cbo-title-2 slide-up" itemprop="headline">
				<?php echo $title ?>
			</div>
		<?php endif; ?>

		<div class="inner-container">
			<?php if($type == 'picture'): ?>
				<div class="textpicture-picture <?php if($cover == 1): ?>cbo-picture-cover<?php endif; ?> <?php if($cover == 0): ?>cbo-picture-contain<?php endif; ?> slide-up">
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
			<?php endif; ?>

			<?php if($type == 'video'): ?>
				<div class="textpicture-picture picture--video cbo-picture-cover js-lazy-video" data-video-id="<?php echo $videoid; ?>"></div>
<?php endif; ?>


<script src="https://www.youtube.com/iframe_api"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
  const lazyVideos = document.querySelectorAll(".js-lazy-video");

  if ("IntersectionObserver" in window) {
    const observer = new IntersectionObserver((entries, obs) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const container = entry.target;
          const videoId = container.dataset.videoId;

          const iframe = document.createElement("iframe");
          iframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1&mute=1&loop=1&playlist=${videoId}&controls=0&modestbranding=1&iv_load_policy=3&rel=0`;
          iframe.setAttribute("frameborder", "0");
          iframe.setAttribute("allow", "autoplay; encrypted-media");
          iframe.setAttribute("allowfullscreen", "");
          iframe.setAttribute("title", "YouTube video");

          container.appendChild(iframe);
          obs.unobserve(container);
        }
      });
    }, {
      threshold: 0.5
    });

    lazyVideos.forEach(video => observer.observe(video));
  }
});
</script>











			<div class="textpicture-content">
				<?php if($addquote == 1): ?>
					<div class="content-quote">
						<div class="quote-picture cbo-picture-cover">
							<img
								decoding="async"
								src="<?php echo $quotepicture['sizes']['small']; ?>"
								srcset="<?php echo $quotepicture['sizes']['small']; ?> 320w, <?php echo $quotepicture['sizes']['xlarge']; ?> 768w, <?php echo $quotepicture['sizes']['xlarge']; ?> 1024w"
								alt="<?php echo $quotepicture['alt']; ?>" sizes="100vw"
								loading="lazy"
								width="768" height="768"
								itemprop="image"
							>
						</div>
						<div class="quote-informations">
							<div class="informations-inner">
								<span class="informations-name">
									<?php echo $quotename ?>
								</span>
								<span class="informations-function">
									<?php echo $quotefunction ?>
								</span>
							</div>
						</div>
					</div>
				<?php endif; ?>

				<?php if($content): ?>
					<div class="cbo-cms">
						<?php echo $content ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>