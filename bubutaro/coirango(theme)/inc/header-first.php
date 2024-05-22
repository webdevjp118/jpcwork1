<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Coirango
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/owl.theme.default.min.css">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'coirango' ); ?></a>
	<header id="masthead" class="site-header">

<div class="firstmenu-div">
	<ul id="menu" class="firstmenu-ul">
		<li class="menu-item">
			<a href="<?php echo get_site_url(); ?>/about">コイランＧｏ！とは？</a>
		</li>
		<li class="menu-item">
			<a href="<?php echo get_site_url(); ?>/activities">お洗活</a>
		</li>
		<li class="menu-item">
			<a href="<?php echo get_site_url(); ?>/magazines">コイラン裏テク</a>
		</li>
		<li class="menu-item">
			<a href="<?php echo get_site_url(); ?>/laundry-edit">コインランドリー店舗登録</a>
		</li>
		<li class="menu-item">
			<a href="">ネットイベント会場</a>
		</li>
	</ul>
</div>
<div class="site-logo-div">
	<h1 class="site-title">
		<a href="<?php echo get_site_url(); ?>">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt="">
		</a>
	</h1>
</div>
<?php if(!is_user_activated()): ?>
<div class="firstlogin-div">
	<div class="flex-container">
		<a href="<?php echo get_site_url(); ?>/login" class="login-btn">ログイン</a>
        <a href="<?php echo get_site_url(); ?>/signup" class="signup-btn c-btn c-btn_secondary">新規登録</a>
	</div>
</div>
<?php else: ?>	
<div class="firstlogin-div" style="">
	<div class="flex-container">
		<?php if( current_user_can('editor') || current_user_can('administrator') ) {  ?>
			<a style="cursor: pointer; margin:10px" href="<?php echo get_site_url(); ?>/wp-admin">WP</a>
		<?php } ?>
		<a style="cursor: pointer; margin:10px" href="<?php echo wp_logout_url(); ?>">ログアウト</a>
		<div class="search-form">
			<form action="<?php echo get_site_url(); ?>/lsearch" method="post">
				<input type="text" placeholder="キーワードでランドリ検索">
				<button type="submit"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/top-search.svg" alt=""></button>
			</form>
		</div>
		<!-- <div class="noti"><img src="./assets/images/notification.svg" alt=""></div> -->
		<a href="<?php echo get_site_url(); ?>/cuser"><div class="avatar"><img src="<?php echo get_avatar_url(get_current_user_id()); ?>" alt=""></div></a>
	</div>
</div>
<?php endif; ?>
<div class="header-mask" style="height: 70px;"></div>

<div id="floating" class="gmenu-sec c-container" style="top:-250px">
	<p class="site-logo">
		<a href="<?php echo get_site_url(); ?>">
			<img src="<?php echo get_stylesheet_directory_uri();?>/images/logo.png" alt="">
		</a>
	</p>
	<div class="gmenu-right">
<?php if(!is_user_activated()): ?>
		<div class="flexdiv">
            <div class="flex-container">
                <a href="<?php echo get_site_url(); ?>/login" class="login-btn">ログイン</a>
                <a href="<?php echo get_site_url(); ?>/signup" class="signup-btn c-btn c-btn_secondary">新規登録</a>
            </div>
		</div>
<?php else: ?>		
		<div class="flexdiv">
			<?php if( current_user_can('editor') || current_user_can('administrator') ) {  ?>
				<a style="cursor: pointer; margin:10px" href="<?php echo get_site_url(); ?>/wp-admin">WP</a>
			<?php } ?>
			<a style="cursor: pointer; margin:10px" href="<?php echo wp_logout_url(); ?>">ログアウト</a>
			<div class="search-form">
				<form action="<?php echo get_site_url(); ?>/lsearch" method="post">
					<input type="text" placeholder="キーワードでランドリ検索">
					<button type="submit"><img src="<?php echo get_stylesheet_directory_uri();?>/images/top-search.svg" alt=""></button>
				</form>
			</div>
			<a href="<?php echo get_site_url(); ?>/cuser"><div class="avatar"><img src="<?php echo get_avatar_url(get_current_user_id()); ?>" alt=""></div></a>
		</div>
<?php endif; ?>
	</div>
	<div class="gmenu-set">
		<ul class="gmenu-list">
			<li class="gmenu-item">
				<a href="<?php echo get_site_url(); ?>/about">コイランＧｏ！とは？</a>
			</li>
			<li class="gmenu-item">
				<a href="<?php echo get_site_url(); ?>/activities">お洗活</a>
			</li>
			<li class="gmenu-item">
				<a href="<?php echo get_site_url(); ?>/magazines">コイラン裏テク</a>
			</li>
			<li class="gmenu-item">
				<a href="<?php echo get_site_url(); ?>/laundry-edit">コインランドリー店舗登録</a>
			</li>
			<li class="gmenu-item">
				<a href="">ネットイベント会場</a>
			</li>
		</ul>
	</div>
</div>

	</header><!-- #masthead -->
