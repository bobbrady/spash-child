<!DOCTYPE html>
<?php $mts_options = get_option('splash'); ?>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
	<!--[if IE ]>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<![endif]-->
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<?php mts_meta(); ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>
<body id ="blog" <?php body_class('main'); ?> itemscope itemtype="http://schema.org/WebPage">
	<div class="main-container">
		<header class="main-header">
			<div class="container">
				<div id="header">
					<?php if ( has_nav_menu( 'primary-menu' ) ) { ?>
						<div class="main-navigation">
							<nav id="navigation" class="clearfix">
								<?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'menu_class' => 'menu clearfix', 'container' => '', 'walker' => new mts_menu_walker ) ); ?>
								<a href="#" id="pull-main"><?php _e('Menu','mythemeshop'); ?></a>
							</nav>
							<?php if($mts_options['mts_header_search'] == '1') { ?>
								<div class="header-search"><?php get_search_form( ); ?></div>
							<?php } ?>
						</div>
					<?php } ?>
					<div class="logo-wrap">
						<?php if ($mts_options['mts_logo'] != '') { ?>
							<?php if( is_front_page() || is_home() || is_404() ) { ?>
									<h1 id="logo" class="image-logo">
										<a href="<?php echo home_url(); ?>"><img src="<?php echo $mts_options['mts_logo']; ?>" alt="<?php bloginfo( 'name' ); ?>"></a>
									</h1><!-- END #logo -->
							<?php } else { ?>
									<h2 id="logo" class="image-logo">
										<a href="<?php echo home_url(); ?>"><img src="<?php echo $mts_options['mts_logo']; ?>" alt="<?php bloginfo( 'name' ); ?>"></a>
									</h2><!-- END #logo -->
							<?php } ?>
						<?php } else { ?>
							<?php if( is_front_page() || is_home() || is_404() ) { ?>
									<h1 id="logo" class="text-logo">
										<a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
									</h1><!-- END #logo -->
							<?php } else { ?>
									<h2 id="logo" class="text-logo">
										<a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
									</h2><!-- END #logo -->
							<?php } ?>
							<div class="site-description">
								<?php bloginfo( 'description' ); ?>
							</div>
						<?php } ?>
					</div>
					<?php dynamic_sidebar('Header Ad'); ?>
					<?php if ( has_nav_menu( 'secondary-menu' ) ) { ?>
						<?php if($mts_options['mts_sticky_nav'] == '1') { ?>
							<div class="clear" id="catcher"></div>
							<div id="sticky" class="secondary-navigation">
						<?php } else { ?>
							<div class="secondary-navigation">
						<?php } ?>
						<nav id="navigation" class="clearfix">
							<?php wp_nav_menu( array( 'theme_location' => 'secondary-menu', 'menu_class' => 'menu clearfix', 'container' => '', 'walker' => new mts_menu_walker ) ); ?>
							<a href="#" id="pull-primary"><?php _e('Menu','mythemeshop'); ?></a>
							<?php mts_cart(); ?>
						</nav>
					</div>
					<?php } ?>
				</div><!--#header-->
				<?php if ( function_exists('yoast_breadcrumb') && !is_front_page() && !is_home()) {
    					yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
			</div><!--.container-->
		</header>

