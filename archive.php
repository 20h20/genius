<?php
	get_header();
	$blogchapo	= get_field('options_blogchapo', 'option');
	$heropicture	= get_field('options_blogheropicture', 'option');
	$heropicture2	= get_field('options_blogheropicture2', 'option');
	$ctaicon	= get_field('options_blogctapic', 'option');
	$ctatitle	= get_field('options_blogctatitle', 'option');
	$ctacontent	= get_field('options_blogctacontent', 'option');
	$ctatxtbt	= get_field('options_blogctatxtbt', 'option');
	$ctaurlbt	= get_field('options_blogctaurlbt', 'option');
	$ctatypebt	= get_field('options_blogctabttype', 'option');
	$ctabg	= get_field('options_blogctabg', 'option');
?>
	<div class="cbo-page page--archive">
		<section class="cbo-herorich">
			<div class="herorich-inner cbo-container">

				<div class="herorich-picture">
					<?php if($heropicture2): ?>
						<div class="picture-secondpic cbo-picture-contain slide-up">
							<img
								decoding="async"
								src="<?php echo $heropicture2['sizes']['small']; ?>"
								srcset="<?php echo $heropicture2['sizes']['small']; ?> 320w, <?php echo $heropicture2['sizes']['xlarge']; ?> 768w, <?php echo $heropicture2['sizes']['xlarge']; ?> 1024w"
								alt="<?php echo $heropicture2['alt']; ?>" sizes="100vw"
								loading="lazy"
								width="1500" height="1500"
							>
						</div>
					<?php endif; ?>

					<?php if($heropicture): ?>
						<div class="picture-main cbo-picture-cover slide-up">
							<img
								decoding="async"
								src="<?php echo $heropicture['sizes']['small']; ?>"
								srcset="<?php echo $heropicture['sizes']['small']; ?> 320w, <?php echo $heropicture['sizes']['xlarge']; ?> 768w, <?php echo $heropicture['sizes']['xlarge']; ?> 1024w"
								alt="<?php echo $heropicture['alt']; ?>" sizes="100vw"
								loading="lazy"
								width="1500" height="1500"
							>
						</div>
					<?php endif; ?>
				</div>

				<div class="herorich-content">
					<h1 class="herorich-title cbo-title-1 slide-up">
						<?php
							if (is_home()) {
								echo 'Le Blog';
							} else {
								single_cat_title();
							}
						?>
					</h1>

					<div class="herorich-chapo cbo-cms slide-up">
						<?php
						if (is_home()) {
							if ($blogchapo) {
								echo $blogchapo;
							}
						} else {
							echo category_description();
						}
						?>
					</div>

					<div class="container-buttons slide-up">
						<div class="buttons-list">
							<a class="cbo-button button--icon " href="#archive-articles">
								Voir les articles
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>

		<div class="cbo-featured">
			<div class="featured-inner cbo-container">
				<h2 class="featured-title cbo-title-1 slide-up">
					Découvrez <b>nos articles</b>
				</h2>

				<?php
					query_posts('showposts=1&orderby=date&order=DESC');
					if (have_posts()) :
						while (have_posts()) : the_post();
						$excerpt = get_the_excerpt();
						$limited_excerpt = wp_trim_words($excerpt, 15, '...');
				?>
					<article <?php post_class('featured-article slide-up'); ?> itemprop="blogPosts" itemscope itemtype="http://schema.org/BlogPosting">
						<a class="article-inner" href="<?php the_permalink(); ?>" itemprop="url">
							<span class="article-picture cbo-picture-cover">
								<?php the_post_thumbnail( 'xlarge', array( 'sizes' => '(max-width:320px) 145px, (max-width:425px) 220px, 1000px' ) );?>
							</span>

							<span class="article-content">
								<h3 class="content-title cbo-title-2 slide-up">
									<?php the_title(); ?>
								</h3>
								<span class="content-text cbo-cms slide-up">
									<?php echo $limited_excerpt; ?>
								</span>
								<span class="content-link slide-up">
									<span class="cbo-button cbo-link button--icon">
										Lire la suite
									</span>
								</span>
							</span>
						</a>
					</article>
				<?php
					endwhile;
					endif;
					wp_reset_query();
				?>
			</div>
		</div>

		<div id="archive-articles" class="cbo-filters cbo-container container--nomargin">
			<div class="filters-inner slide-up">
				<div class="filters-menu">
					Choisir une catégorie
				</div>
				<div class="filters-list">
					<?php
						$current_cat_id = get_queried_object_id();
						$args = array(
							'type' => 'post',
							'orderby' => 'name',
							'order'   => 'ASC'
						);
						$cats = get_categories($args);
						$all_articles_link = get_post_type_archive_link('casestudies');
						$is_category_archive = is_category();

						echo '<a class="list-el' . (!$is_category_archive ? ' el--active' : '') . '" href="' . home_url('/le-blog/#archive-articles') . '"><span class="el-inner">Tous les articles</span></a>';

						foreach ($cats as $cat) {
							$is_current_cat = $is_category_archive && $current_cat_id == $cat->term_id;
							$class = $is_current_cat ? ' el--active' : '';
							echo '<a class="list-el' . $class . '" href="' . get_term_link($cat->term_id) . '#archive-articles"><span class="el-inner">' . $cat->name . '</span></a>';
						}
					?>
				</div>
			</div>
		</div>

		<section class="archive-articles">
			<div class="articles-inner cbo-container container--nomargin">
				<div class="articles-list">
					<?php
						if ( have_posts() ) :
						while ( have_posts() ) : the_post();
						get_template_part('templates/content/content','article');
						endwhile;
							echo page_navi();
						endif;
					?>
				</div>
			</div>
		</section>
		
		<section class="cbo-cta">
			<div class="cta-inner cbo-container">

				<div class="cta-box">
					<div class="cta-content">
						<?php if($ctaicon): ?>
							<div class="content-icon cbo-picture-contain slide-up">
								<img
									decoding="async"
									src="<?php echo $ctaicon['sizes']['xsmall']; ?>"
									srcset="<?php echo $ctaicon['sizes']['xsmall']; ?> 320w, <?php echo $ctaicon['sizes']['xsmall']; ?> 768w, <?php echo $ctaicon['sizes']['xsmall']; ?> 1024w"
									alt="<?php echo $ctaicon['alt']; ?>" sizes="100vw"
									loading="lazy"
									width="100" height="100"
								>
							</div>
						<?php endif; ?>

						<?php if($ctatitle): ?>
							<div class="content-title cbo-title-2 slide-up">
								<?php echo $ctatitle ?>
							</div>
						<?php endif; ?>

						<?php if($ctacontent): ?>
							<div class="content-text cbo-cms slide-up">
								<?php echo $ctacontent ; ?>
							</div>
						<?php endif; ?>

						<a
							class="cbo-button button--border button--icon slide-up <?php if($ctatypebt == 'modale'): ?>button-modale<?php endif; ?>"
							href="<?php if($ctatypebt == 'url'): ?><?php echo $ctaurlbt; ?><?php endif; ?><?php if($ctatypebt == 'modale'): ?>#<?php endif; ?>"
						>
							<?php echo $ctatxtbt; ?>
						</a>
					</div>
					<?php if($ctabg): ?>
						<div class="box-picture cbo-picture-cover">
							<img
								decoding="async"
								src="<?php echo $ctabg['sizes']['xsmall']; ?>"
								srcset="<?php echo $ctabg['sizes']['small']; ?> 320w, <?php echo $ctabg['sizes']['xlarge']; ?> 768w, <?php echo $ctabg['sizes']['xlarge']; ?> 1024w"
								alt="<?php echo $ctabg['alt']; ?>" sizes="100vw"
								loading="lazy"
								width="1600" height="700"
							>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>
	</div>
<?php
	get_footer();
?>