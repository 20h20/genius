<?php
	get_header();
?>
	<div class="cbo-page page--archive page--search">
		<section>
			<div class="cbo-container">
				<h1 class="search-title cbo-title-1 slide-up" itemprop="headline">
					<?php _e( 'Votre rechecher pour', 'global' ); ?><br/>
					<strong>
						<?php printf( __( '%s'), get_search_query() ); ?>
					</strong>
				</h1>
				<div class="archive-articles">
					<div class="articles-inner">
						<div class="articles-list">
							<?php
								if ( have_posts() ) :
									while ( have_posts() ) : the_post();
										get_template_part('templates/content/content', 'article');
									endwhile;
									echo page_navi();
								else :
									echo '<p>Aucun article trouvé pour votre recherche.</p>';
								endif;
							?>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
<?php
	get_footer();
?>