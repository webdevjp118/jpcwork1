<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package COCOTOTO
 */

?>


<footer class="footer_section">
	<div class="social_footer">
		<a href="https://www.facebook.com/%E3%82%B1%E3%83%B3%E3%82%AB%E3%83%84%E3%83%A1%E3%83%87%E3%82%A3%E3%82%A2%E3%82%B3%E3%82%B3%E3%83%88%E3%83%88-105785758319649"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/social_fb.png"></a>
		<a href="https://www.instagram.com/?hl=ja"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/social_insta.png"></a>
	</div>
	<div class="top_footer">
		<ul>
			<li>
				<a href="<?php echo get_site_url(); ?>/contact">Contact</a>
			</li>
			<li>
				<a href="<?php echo get_site_url(); ?>/privacy">Privacy Policy</a>
			</li>
			<li>
				<a href="<?php echo get_site_url(); ?>/terms">Terms</a>
			</li>
			<li>
				<a href="<?php echo get_site_url(); ?>/company"> Company</a>
			</li>
		</ul>
	</div>
	<div class="bottom_footer">
		<p>©️2021 COCOTOTO. </p>
	</div>
</footer>


</div><!-- #page -->

<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery-ui.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/slick.js"></script>
<script src="https://use.fontawesome.com/de37c2a985.js"></script>
<script defer src="<?php echo get_stylesheet_directory_uri(); ?>/js/main.js"></script>
<!-- intersection observer -->
<script defer src="<?php echo get_stylesheet_directory_uri(); ?>/js/intersection-observer-polyfill.js"></script>
<script>
$(function() {
	var observer = new IntersectionObserver(function(entries) {
		entries.forEach(function(e) {
			if (!e.isIntersecting) return;
			e.target.classList.add('move'); // 交差した時の処理
			observer.unobserve(e.target);
			// target element:
		    //   e.target				ターゲット
		    //   e.isIntersecting		交差しているかどうか
		    //   e.intersectionRatio	交差している領域の割合
		    //   e.intersectionRect		交差領域のgetBoundingClientRect()
		    //   e.boundingClientRect	ターゲットのgetBoundingClientRect()
		    //   e.rootBounds			ルートのgetBoundingClientRect()
		    //   e.time					変更が起こったタイムスタンプ
		})

	},{
    	// オプション設定
		rootMargin: '0px 0px -5% 0px' //下端から5%入ったところで発火
		//threshold: [0, 0.5, 1.0]
	});

	var target = document.querySelectorAll('.io'); //監視したい要素をNodeListで取得
	for(var i = 0; i < target.length; i++ ) {
	    observer.observe(target[i]); // 要素の監視を開始
	}

	//アニメーションによる各要素のはみ出しを解消
	$("body").wrapInner("<div style='overflow:hidden;'></div>");

});
</script>

<?php wp_footer(); ?>
</body>
</html>
