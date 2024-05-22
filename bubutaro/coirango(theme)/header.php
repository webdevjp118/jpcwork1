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
function print_val($val) {
	echo "<br>";
	print_r($val);
	echo "<br>------------------------";
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/font/iconfont.woff2" as="font" type="font/woff2" crossorigin="">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'coirango' ); ?></a>
	<header id="masthead" class="site-header" style="background-color:#EEEEEE">

<div class="pc-header">

<div class="gmenu-sec c-container">
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
			<div class="c-searchbox">
				<form action="<?php echo get_site_url(); ?>/lsearch" method="post">
					<input type="text" name="keyword" placeholder="キーワードでランドリ検索">
					<button type="submit"><img src="<?php echo get_stylesheet_directory_uri();?>/images/top-search.svg" alt=""></button>
				</form>
			</div>
			<a class="js-uavatar"><div class="avatar"><img src="<?php echo get_avatar_url(get_current_user_id()); ?>" alt=""></div></a>
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
<nav class="dmenu-set">
    <ul class="dmenu-list">
		<li><a href="<?php echo get_site_url(); ?>/cuser">マイページ</a></li>
		<li class="c-menu-divide"></li>
		<li><a href="<?php echo get_site_url().'/cuser-ikitai/'; ?>">イキタイ</a></li>
		<li><a href="<?php echo get_site_url().'/cuser-laundry/'; ?>">登録施設</a></li>
		<li><a href="<?php echo get_site_url().'/cuser-favorite/'; ?>">お気に入り</a></li>
		<li class="c-menu-divide"></li>
<?php if( current_user_can('editor') || current_user_can('administrator') ):  ?>
		<li><a href="<?php echo get_site_url(); ?>/wp-admin">WP アドミン</a></li>
<?php endif; ?>
		<li><a href="<?php echo wp_logout_url(); ?>">ログアウト</a></li>
    </ul>
</nav>
		<div class="site-branding" style="display:none">

			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$coirango_description = get_bloginfo( 'description', 'display' );
			if ( $coirango_description || is_customize_preview() ) :
				?>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" style="display:none">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'coirango' ); ?></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->
</div><!-- pc-header -->

<div class="sp-header">
<div class="hamburger-menu">
    <input id="menu__toggle" type="checkbox" />
    <label class="menu__btn" for="menu__toggle">
      <span></span>
    </label>

    <ul class="menu__box">
<?php if(is_user_activated()): ?>
			<li class="prof-li">
			  	<a href="#">
					<div class="photo">
						<div class="circle-w">
							<div class="c-circlediv" style="background-image:url(<?php echo get_avatar_url(get_current_user_id()); ?>)"></div>
						</div>
					</div>
					
					<div>
						<div class="name-div"><p><?php echo get_user_full_name(); ?></p></div>
						<div class="tonttu-div">
							<div class="img-div"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/tonttu_color.svg"></div>
							<span >トントゥ</span>
							<span class="c-numspan">350</span>
						</div>
					</div>
			  	</a>
			</li>
			<li style="display:flex; justify-content: space-around;">
				<a class="signup-btn" href="<?php echo get_site_url(); ?>/cuser">マイページ</a><a class="signup-btn" href="<?php echo wp_logout_url(); ?>">ログアウト</a>
			</li>
			<li class="text-li"><a href="<?php echo get_site_url().'/cuser-ikitai/'; ?>">イキタイ</a></li>
			<li class="text-li"><a href="<?php echo get_site_url().'/cuser-laundry/'; ?>">登録施設</a></li>
			<li class="text-li"><a href="<?php echo get_site_url().'/cuser-favorite/'; ?>">お気に入り</a></li>
<?php endif; ?>
			<li class="c-menu-divide"></li>
			<li><div class="hr-space10"></div></li>
			<li class="text-li"><a href="<?php echo get_site_url(); ?>/about">コイランＧｏ！とは？</a></li>
			<li class="text-li"><a href="<?php echo get_site_url(); ?>/activities">お洗活</a></li>
			<li class="text-li"><a href="<?php echo get_site_url(); ?>/magazines">コイラン裏テク</a></li>
			<li class="text-li"><a href="<?php echo get_site_url(); ?>/laundry-edit">コインランドリー店舗登録</a></li>
			<li class="text-li"><a href="">ネットイベント会場</a></li>
    </ul>
</div>
<div class="header-content">
	<a class="logo-a" href="<?php echo get_site_url(); ?>">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt="">
	</a>
<?php if(!is_user_activated()): ?>
	<div>
		<a href="<?php echo get_site_url(); ?>/login" class="login-btn">ログイン</a>
		<a href="<?php echo get_site_url(); ?>/signup" class="signup-btn">新規登録</a>
	</div>
<?php else: ?>		
	<div class="c-searchbox">
		<form action="<?php echo get_site_url(); ?>/lsearch" method="post">
			<input type="text" name="keyword" placeholder="キーワードでランドリ検索">
			<button type="submit"><img src="<?php echo get_stylesheet_directory_uri();?>/images/top-search.svg" alt=""></button>
		</form>
	</div>
<?php endif; ?>
</div>
<div class="sp-headerfill">&nbsp;</div>

</div><!-- sp-header -->

	</header><!-- #masthead -->
