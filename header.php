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
	<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_template_directory_uri(); ?>/library/img/fav/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/library/img/fav/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>/library/img/fav/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/library/img/fav/favicon-16x16.png">

	<?php wp_head(); ?>

	<?php
		$pgetype	= get_field('page_type');
	?>
</head>

<body <?php body_class(($pgetype == 'landing') ? 'cbo-landing' : ''); ?> itemscope itemtype="http://schema.org/WebPage">
	<header role="banner" itemscope itemtype="http://schema.org/WPHeader">
		<div class="header-inner cbo-container container--nomargin">
			
			<a class="header-logo cbo-picture-contain" title="<?php echo get_bloginfo('description'); ?>" href="<?php echo home_url(); ?>">
				<img
					decoding="async"
					src="<?php bloginfo('template_directory'); ?>/library/img/logo-genius.png"
					alt="PRA Cloud" sizes="100vw"
					loading="lazy"
					width="210" height="92"
					itemprop="logo"
				>
			</a>

			<?php
				if ($pgetype == 'standard' || is_home() || is_archive() || is_single()) :
			?>
				<nav class="header-nav" role="navigation"  itemscope="" itemtype="http://schema.org/SiteNavigationElement">
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
						<button class="cbo-button button--icon cbo-link button-modale" aria-label="Demander une démo">
							Demander une démo
						</button>
					</div>
				</nav>

				<div class="header-buttons">
					<a class="cbo-button" href="https://app.genius.immo/s/login/?ec=302&startURL=%2Fs%2F&_gl=1*10ip4ka*_gcl_au*MTY0MzA5NzA1NS4xNzA4NDQ3NTE3" target="_blank">
						Accès client
					</a>
					<button class="cbo-button button--icon cbo-link button-modale" aria-label="Demander une démo">
						Demander une démo
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

	<main class="cbo-main" role="main">