<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Company_Core
 */

?>

<!-- FOOTER_START -->
<footer id="footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 footer-inner-hp">
				<div class="footer-middle-hp">
					<div class="footer-content-hp">
						<a href="<?php echo get_site_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt="" /></a>
						<a class="access" href="<?php echo get_site_url(); ?>/access"><h4>ACCESS</h4></a>
						<p>
							〒753-0075<br>
							山口県山口市中園町7-40 c-court 1F<br>
							TEL：083-932-1300　FAX：083-923-3100
						</p>
					</div>
					<div class="copyright-hp">
						<p>Copyright© 株式会社コア All Rights Reserved.</p>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</footer>
<!-- FOOTER_END -->
</div><!-- #wrapper -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/owl.carousel.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/custom.js"></script>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<?php wp_footer(); ?>

</body>
</html>
