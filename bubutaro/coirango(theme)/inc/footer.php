<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Coirango
 */

?>
<div class="wanted-sec">
    <div class="wanted-div">
        <div class="c-container">
            <p class="wanted-bubble"><span>WANTED</span></p>
            <h2 class="wanted-title">未入力施設のランドリ情報募集中</h2>
            <div class="wanted-btn">
                <a href="" class="c-btn c-btn_green">情報募集施設を見る</a>
            </div>
        </div>
    </div>
</div>
<div class="banner-sec">
    <div class="c-container">
        <div class="banner-div">
            <ul class="banner-ul">
                <li class="banner-li">
                    <a href="/link/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sample-banner.jpg" width="680" height="240" alt=""></a>
                </li>
                <li class="banner-li">
                    <a href="/link/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sample-banner.jpg" width="680" height="240" alt=""></a>
                </li>
                <li class="banner-li">
                    <a href="/link/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sample-banner.jpg" width="680" height="240" alt=""></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<footer id="colophon" class="site-footer gfooter-sec">
	<div class="gfooter-search">
			<div class="map-bubble">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/areasearch-popup.png">
			</div>
			<p class="gfooter-map">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/areasearch.jpg">
			</p>
		</div>
		<div class="gfooter-bottom">
			<ul class="gfooter-menu-ul">
				<li class="gfooter-menu-li">
					<a href="<?php echo get_site_url(); ?>/about">コイランＧｏ！とは？</a>
				</li>
				<li class="gfooter-menu-li">
					<a href="<?php echo get_site_url(); ?>/activities">お洗活</a>
				</li>
				<li class="gfooter-menu-li">
					<a href="<?php echo get_site_url(); ?>/magazines">コイラン裏テク</a>
				</li>
				<li class="gfooter-menu-li">
					<a href="<?php echo get_site_url(); ?>/laundry-edit">コインランドリー店舗登録</a>
				</li>
				<li class="gfooter-menu-li">
					<a href="">ネットイベント会場</a>
				</li>
			</ul>
			<p class="copyright">© Copyright 2019 All rights reserved.</p>
	</div>
</footer>
	
</div><!-- #page -->

<?php wp_footer(); ?>
<!-- <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.min.js"></script> -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-1.12.4.min.js"><\/script>')</script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>	
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/custom.js"></script>
</body>
</html>
