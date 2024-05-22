<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package COCOTOTO
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.png">

	<?php wp_head(); ?>

	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css?<?php echo date('YmdHis'); ?>" type="text/css">
	<link rel="stylesheet"  type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/pmhwp.css"> 
<!-- Javascript -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery-1.12.4.min.js"><\/script>')</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-GPYB01717S"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-GPYB01717S');
</script> -->
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KRDTRKV');</script>
<!-- End Google Tag Manager -->

</head>

<body <?php body_class(['transition']); ?>>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KRDTRKV"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div class="page_top_pos" id="id_page_top"></div>
<div id="loader-wrapper"><div id="loader"></div></div>
<?php wp_body_open(); ?>
<div id="page" class="site">
<header>
	<div class="navbar_links">
		<ul>
<?php 
	$page_slug = '';
	global $post;
	$page_slug = $post->post_name;
?>
			<li>
				<a href="<?php echo get_site_url(); ?>" class="<?php echo is_front_page()?'active':''; ?>">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/menu_about.svg">
					<span>about us</span></i>
				</a>
			</li>
			<li>
				<a href="<?php echo get_site_url(); ?>/media/" class="<?php echo ($page_slug == 'media')?'active':''; ?>">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/menu_media.svg">
					<span>media</span></i>
				</a>
			</li>
			<li>
				<a href="<?php echo get_site_url(); ?>/join/" class="<?php echo ($page_slug == 'join')?'active':''; ?>">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/menu_member.svg">
					<span>join us</span></i>
				</a>
			</li>
			<li>
				<!-- <a href="<?php echo get_site_url(); ?>/item-sample/"> -->
				<a href="https://shop.cocototo.co.jp/">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/menu_item.svg">
					<span>item</span></i>
				</a>
			</li>
			<li>
				<a href="<?php echo get_site_url(); ?>/member/" class="<?php echo ($page_slug == 'member')?'active':''; ?>">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/menu_joinus.png">
					<span>member</span></i>
				</a>
			</li>
		</ul>
	</div>
</header>