<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Company_Core
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/fonts.css" rel="stylesheet" type="text/css">
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/fontawesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/owl.carousel.css" rel="stylesheet" type="text/css">
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/owl.theme.default.css" rel="stylesheet" type="text/css">
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/stylesheet.css" rel="stylesheet" type="text/css">
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/responsive.css" rel="stylesheet" type="text/css">
	<link href="<?php echo get_stylesheet_directory_uri(); ?>/css/pmhwp.css" rel="stylesheet" type="text/css">
	<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="wrapper">

<!-- HEADER_START -->
<header id="header" class="header-hp">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 header-in-hp">
				<div class="logo-hp">
					<a href="<?php echo get_site_url(); ?>">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt="" />
					</a>
				</div>
				<div class="navigation">
					<nav class="navbar navbar-expand-lg navbar-light">
						<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
							<ul class="navbar-nav ml-auto">
								<li class="nav-item">
									<a class="nav-link" href="<?php echo get_site_url(); ?>/about/">ABOUT</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo get_site_url(); ?>/services/">SERVICES</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo get_site_url(); ?>/news-topics/">TOPICS</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo get_site_url(); ?>/access/">ACCESS</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">CONTACT</a>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-btn">RECRUIT</a>
									<div class="dropdown-content">
										<a href="<?php echo get_site_url(); ?>/recruit/">RECRUIT</a>
										<a href="<?php echo get_site_url(); ?>/interview/">STAFF INTERVIEW</a>
									</div>
								</li>
							</ul>
						</div>
						<div class="header-right-hp">
							<a href="<?php echo get_site_url(); ?>/recruit/" class="inform-btn-hp">採用情報</a>
						</div>
					</nav>
				</div>
				<div class="mobile-menu-icon-hp">
					<div class="menu-toggle-btn">
						<span></span>
						<span></span>
						<span></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<div class="overlay-mobile-menu-hp"></div>
<div class="clearfix"></div>
<!-- HEADER_END -->
