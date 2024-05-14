		</div><!-- End main -->

		<footer>
			<div class="footer-inner cbo-container container--nomargin">
				<div class="footer-col footer-logo">
					<a class="logo-picture cbo-picture-contain" title="<?php echo get_bloginfo('description'); ?>" href="<?php echo home_url(); ?>">
						<img
							decoding="async"
							src="<?php bloginfo('template_directory'); ?>/library/img/logo-genius.png"
							alt="<?php echo get_bloginfo('description'); ?>" sizes="100vw"
							loading="lazy"
							width="154" height="44"
							itemprop="logo"
						>
					</a>
				</div>

				<div class="footer-col footer-contact">
					<?php
						$phone	= get_field('options_footerphone', 'option');
						$adress	= get_field('options_footeradresse', 'option');
					?>
					<div class="footer-title">
						Nous contacter
					</div>
					<a class="contact-el" href="tel:<?php echo $phone ?>">
						<i class="icon icon--phone"></i> <?php echo $phone ?>
					</a>
					<span class="contact-el">
						<i class="icon icon--pin"></i> <?php echo $adress ?>
					</span>
				</div>

				<div class="footer-col footer-blog">
					<div class="footer-title">
						Dans notre blog
					</div>
					<div class="blog-list">
						<div class="list-el">
							<?php
								query_posts('showposts=2&orderby=date&order=DESC');
								if (have_posts()) :
								while (have_posts()) : the_post();
							?>
								<article id="post-<?php the_ID(); ?>" <?php post_class('el-inner'); ?>>
									<a href="<?php the_permalink();?>">
										<?php the_title(); ?>
									</a>
								</article>
							<?php
								endwhile;
								endif;
								wp_reset_query();
							?>
						</div>
						<div class="list-el">
							<?php
								query_posts('showposts=2&offset=2&orderby=date&order=DESC');
								if (have_posts()) :
								while (have_posts()) : the_post();
							?>
								<article id="post-<?php the_ID(); ?>" <?php post_class('el-inner'); ?>>
									<a href="<?php the_permalink();?>">
										<?php the_title(); ?>
									</a>
								</article>
							<?php
								endwhile;
								endif;
								wp_reset_query();
							?>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-bottom">
				Copyright <?php echo date("Y"); ?> © - <a href="<?php echo home_url(); ?>/mentions-legales/">Mentions légales</a>
			</div>
		</footer>

		<?php
			$title	= get_field('options_modaletitle', 'option');
			$content	= get_field('options_modaletxt', 'option');
			$appointment	= get_field('options_appointment', 'option');
		?>
		<div class="cbo-modale modale--contact">
			<div class="modale-inner">
				<button type="button" class="modale-close" aria-label="Fermer la modale">
					<span class="top"></span>
					<span class="bottom"></span>
				</button>

				<div class="modale-content">
					<?php if($title): ?>
						<h3 class="modale-title cbo-title-2">
							<?php echo $title ?>
						</h3>
					<?php endif; ?>

					<?php if($content): ?>
						<div class="modale-text cbo-cms">
							<?php echo $content ?>
						</div>
					<?php endif; ?>
				</div>

				<div class="contact-form">
					<div class="form-inner cbo-form">
						<?php
							global $post;
							$posts = get_field('options_form', 'option');
							if( $posts ):
								foreach( $posts as $p ):
									$cf7_id= $p->ID;
									echo do_shortcode( '[contact-form-7 id="'.$cf7_id.'" ]' );
								endforeach;
							endif;
						?>
						<div class="form-appointment">
							<div class="cbo-cms">
								<?php echo $appointment ?>
							</div>
							<script>
								(function() {
									var target = document.currentScript;
									window.addEventListener('load', function() {
										calendar.schedulingButton.load({
										url: 'https://calendar.google.com/calendar/appointments/schedules/AcZssZ0a7qb8TdWmQ_LtOwidOp5L41XDgJXtEp3xH17q6elSxNodrisCCYPvwMTHrPqepLKWdnN5Cisv?gv=true',
										color: '#039BE5',
										label: "C'est par ici",
										target,
										});
									});
								})();
							</script>
						</div>
					</div>
				</div>
			</div>
			<div class="modale-overlay" id="myModal-close"></div>
		</div>

		<div class="container-halo">
			<div class="halo"></div>
		</div>
		<?php wp_footer(); ?>
		<script defer="defer" src="<?php echo get_template_directory_uri(); ?>/library/js/scripts.js"></script>
		<script defer="defer" async src="https://calendar.google.com/calendar/scheduling-button-script.js"></script>

	</body>
</html>