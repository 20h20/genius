		</div><!-- End main -->

		<?php
			$qualiopifile	= get_field('options_footerqualiopifile', 'option');
			$qualiopitext	= get_field('options_footerqualiopitext', 'option');
		?>

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

					<div class="social-list">
						<a class="list-el" href="https://www.linkedin.com/company/genius-immo" target="_blank">
							<img
								decoding="async"
								src="<?php bloginfo('template_directory'); ?>/library/img/linkedin.svg"
								alt="Linkedin" sizes="100vw"
								loading="lazy"
								width="40" height="40"
							>
						</a>
					</div>
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
			<div class="footer-bottom cbo-container container--nomargin">
				<div class="bottom-qualiopi">
					<a class="qualiopi-logo cbo-picture-contain" href="<?php echo $qualiopifile['url']; ?>" target="_blank">
						<img
							decoding="async"
							src="<?php bloginfo('template_directory'); ?>/library/img/logo-qualiopi.svg"
							alt="Qualiopi" sizes="100vw"
							loading="lazy"
							width="210" height="92"
						>
					</a>
					<?php echo $qualiopitext ?>
				</div>
				<div class="bottom-mentions">
					Copyright <?php echo date("Y"); ?> © - <a href="<?php echo home_url(); ?>/mentions-legales/">Mentions légales</a>
				</div>
			</div>
		</footer>

		<?php
			$title	= get_field('options_modaletitle', 'option');
			$content	= get_field('options_modaletxt', 'option');
			$appointment	= get_field('options_appointment', 'option');
			$appointmenturl	= get_field('options_appointmenturl', 'option');
		?>
		<div class="cbo-modale modale--contact">
			<div class="modale-inner">
				<button type="button" class="modale-close" aria-label="Fermer la modale">
					<span class="top"></span>
					<span class="bottom"></span>
				</button>

				<div class="modale-content">
					<?php if($title): ?>
						<div class="modale-title cbo-title-2">
							<?php echo $title ?>
						</div>
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
	</body>
</html>