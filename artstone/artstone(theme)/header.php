<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package artstone
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri();?>/css/responsive-tabs.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri();?>/css/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri();?>/css/slick.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri();?>/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri();?>/css/pmhwp.css">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="loader-wrapper"><div class="loader"></div></div>
<?php
global $g_youtube_url;
global $g_twitter_url;
global $g_facebook_url;
?>
<header>
	<a class="header_logo" href="<?php echo get_site_url(); ?>">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt="logo image">
	</a>
	<a href="javascript:void(0);" class="navbar_toggler csp" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		<div class="navbar_toggler_inner"></div>
	</a>
	<nav class="custom_navbar">
		<ul>
			<li>
				<a href="<?php echo get_site_url(); ?>/services/">services</a>
			</li>
			<li>
				<a href="<?php echo get_site_url(); ?>/news/">news</a>
			</li>
			<li>
				<a href="<?php echo get_site_url(); ?>/company/">company</a>
			</li>
			<li>
				<a href="<?php echo get_site_url(); ?>/recruit/">recruit</a>
			</li>
		</ul>
		<div class="header_buttons_menu">
			<a target="_blank" href="<?php echo $g_youtube_url; ?>" class="header_button social"><i class="fab fa-youtube"></i></a>
			<a target="_blank" href="<?php echo $g_twitter_url; ?>" class="header_button social"><i class="fab fa-twitter"></i></a>
			<a target="_blank" href="<?php echo $g_facebook_url; ?>" class="header_button social"><i class="fab fa-facebook"></i></a>
			<a href="<?php echo get_site_url(); ?>/contact/" class="header_button inquiry"><i class="far fa-envelope"></i>contact</a>
		</div>
	</nav>
</header>