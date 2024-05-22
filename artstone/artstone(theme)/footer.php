<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package artstone
 */

?>
<?php
global $g_youtube_url;
global $g_twitter_url;
global $g_facebook_url;
?>
<footer class="">
	<div class="footer_menu">
		<div class="custom_container">
			<div class="custom_row">
				<div class="footer_menu_left">
					<a href="<?php echo get_site_url(); ?>/" class="footer_logo">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_white.png" alt="logo image">
					</a>
					<div class="footer_buttons_menu">
						<a target="_blank" href="<?php echo $g_youtube_url; ?>" class="social"><i class="fab fa-youtube"></i></a>
						<a target="_blank" href="<?php echo $g_twitter_url; ?>" class="social"><i class="fab fa-twitter"></i></a>
						<a target="_blank" href="<?php echo $g_facebook_url; ?>" class="social"><i class="fab fa-facebook"></i></a>
					</div>
				</div>
				<div class="footer_menu_right">
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
						<li>
							<a href="<?php echo get_site_url(); ?>/contact/" class="inquiry"><i class="far fa-envelope"></i>contact</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="footer_conpyright">
		<div class="custom_container">
			<p>© 2018 - 2022 ©Art Stone Entertainment Inc.</p>
		</div>
	</div>
</footer>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/fonts-awesome-5.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/slick.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery-ui.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/intersection-observer-polyfill.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/responsiveTabs.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.lettering.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/custom.js"></script>
<?php wp_footer(); ?>
</body>
</html>
