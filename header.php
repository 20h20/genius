<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes" />
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/library/img/fav/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/library/img/fav/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/library/img/fav/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/library/img/fav/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/library/img/fav/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/library/img/fav/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/library/img/fav/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/library/img/fav/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/library/img/fav/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192" href="<?php echo get_template_directory_uri(); ?>/library/img/fav/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/library/img/fav/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>/library/img/fav/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/library/img/fav/favicon-16x16.png">

	<?php wp_head(); ?>

	<?php
		$pgetype	= get_field('page_type');
		$popinactive	= get_field('options_popinactive', 'option');
		$popinuptitle	= get_field('options_popinuptitle', 'option');
		$popintitle	= get_field('options_popintitle', 'option');
		$popinpicture	= get_field('options_popinpicture', 'option');
		$popincolor	= get_field('options_popincolor', 'option');
	?>
</head>

<body <?php body_class(($pgetype == 'landing') ? 'cbo-landing' : ''); ?> itemscope itemtype="http://schema.org/WebPage">
	<?php if($popinactive){ ?>
		<div id="myModal" class="cbo-modale modale--infos" role="dialog">
			<div class="modale-inner modale--<?php echo $popincolor ?>">
				<button type="button" class="modale-close" id="myModal-close" aria-label="Fermer la fenêtre">
					<span class="top"></span>
					<span class="bottom"></span>
				</button>
				<div class="modale-picture cbo-picture-contain">
					<img
						decoding="async"
						src="<?php echo $popinpicture['sizes']['small']; ?>"
						srcset="<?php echo $popinpicture['sizes']['small']; ?> 320w, <?php echo $popinpicture['sizes']['xlarge']; ?> 768w, <?php echo $popinpicture['sizes']['xlarge']; ?> 1024w"
						alt="<?php echo $popinpicture['alt']; ?>" sizes="100vw"
						width="400" height="400"
					>
				</div>
				<div class="modale-content">
					<?php if($popinuptitle): ?>
						<span class="content-uptitle cbo-title-3">
							<?php echo $popinuptitle ?>
						</span>
					<?php endif; ?>

					<?php if($popintitle): ?>
						<span class="content-title cbo-title-1">
							<strong><?php echo $popintitle ?></strong>
						</span>
					<?php endif; ?>
				</div>
			</div>
			<div class="modale-overlay" id="myModal-close"></div>
		</div>
	<?php } ?>

	<header role="banner" itemscope itemtype="http://schema.org/WPHeader">
		<div class="header-inner cbo-container container--nomargin">

			<a class="header-logo cbo-picture-contain" title="<?php echo get_bloginfo('description'); ?>" href="<?php echo home_url(); ?>" itemprop="url">
				<img
					decoding="async"
					src="<?php bloginfo('template_directory'); ?>/library/img/logo-genius.png"
					alt="Devenez un génie de la copropriété" sizes="100vw"
					width="210" height="92"
					itemprop="logo"
				>
			</a>

			<?php
				if ($pgetype == 'standard' || is_home() || is_archive() || is_single() || is_search()) :
			?>
				<nav class="header-nav" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement" aria-label="Navigation principale">
					<?php wp_nav_menu( array(
						'container' => false,
						'container_class' => '',
						'menu_class' => 'cbo-menu',
						'theme_location' => 'primary-menu',
						'before' => '',
						'after' => '',
						'link_before' => '',
						'link_after' => '',
						'depth' => 0,
						'fallback_cb' => ''
					));?>
					<div class="nav-button">
						<button class="cbo-button button--icon cbo-link button-modale" aria-label="Demander une démo" >
							Testez
						</button>
					</div>
				</nav>

				<div class="header-buttons">
					<div class="buttons-search">
						<i class="icon icon--search search-button"></i>

						<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
							<input class="search-input" name="s" id="search" type="text" placeholder="<?php _e( 'Que recherchez-vous ?', 'global' ); ?>" data-provide="typeahead" data-items="4">
							<button class="search-submit" type="submit" aria-label="Lancer la recherche">
								<i class="icon icon--search"></i>
							</button>
						</form>
					</div>

					<a class="button-user" href="https://app.genius.immo/s/login/?ec=302&startURL=%2Fs%2F&_gl=1*10ip4ka*_gcl_au*MTY0MzA5NzA1NS4xNzA4NDQ3NTE3" target="_blank" itemprop="url">
						<i class="icon icon--user"></i>
					</a>
					<button class="cbo-button button--icon button--blue button-modale" aria-label="Demander une démo">
						Testez
					</button>
					<button type="button" class="burger-menu" aria-label="Ouvrir la navigation principale">
						<span class="top"></span>
						<span class="middle"></span>
						<span class="bottom"></span>
					</button>
				</div>
			<?php endif; ?>
		</div>
	</header>

	<div class="overlay-menu"></div>

	<main class="cbo-main" role="main" itemscope itemtype="http://schema.org/WebPageElement">