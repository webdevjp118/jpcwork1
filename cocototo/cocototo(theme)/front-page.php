<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package COCOTOTO
 */

get_header();
?>
<?php
$cquery_key = array(
    'post_type' => 'contributor',
    'meta_query' => $kenfilter,
    // 'author' => $user_id,
	'posts_per_page' => -1,
    'fields' => 'ids',
);
$cquery = new WP_Query($cquery_key);
$contributor_count = $cquery->found_posts;
if($contributor_count<1) $contributor_count = 15;
?>

<section class="banner_section full_height_section">
    <div class="banner_text">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/banner-line-image-1.png" class="banner_line_image">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/banner-line-image-2.png" class="banner_line_image_2">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cocototo-heading-image.png" class="cocototo_heading_image">
        <h1><span class="text_blue">私</span>と<span class="text_yellow">地球</span>への<span class="text_pink">健康活動</span></h1>
        <p>ケンカツサポートメディア</p>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" class="logo_image">
    </div>
    <div class="banner_text_red_box">
        <div class="banner_text_red_box_inner">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/white-image-logo.png">
            <p>ケンカツ仲間</p>
        </div>
        <div class="banner_text_red_box_inner_second">
            <h5><?php echo $contributor_count; ?><span>名</span></h5>
        </div>
    </div>
</section>
<!-- vision_text_section -->
<section class="vision_text_section">
    <div class="">
        <div class="heading_text">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cocototo-heading-image.png">
            <h2>Vision</h2>
        </div>
        <div class="vision_text_sec">
            <h3>今より健康と環境にいいコトを一緒に</h3>
            <p>Better Life for Positive Health Care and Environment</p>

            <div class="vision_text_inner">
                <p class ="text_center">健康と環境を守ることで未来を創造していく。</p>
                <p class ="text_justify">COCOTOTOは、持続可能な社会を実現するために健康や環境に優しいコトを発信し今よりBetterな行動を選択するケンカツ仲間を増やしていくメディアです。</p>
                <p class ="text_justify">健康であっても環境が悪化すれば暮らしやすい場所が減っていきます。</p>
                <p class ="text_justify">環境が良くても健康でなければ楽しく生活することができません。</p>
                <p class ="text_justify">多くの人のケンカツが、健康で暮らしやすい地球の未来につながるきっかけにしたい。</p>
                <p class ="text_justify">⾃分にできることから少しずつはじめるケンカツがきっとその先「やってよかった」になるように。</p>
            </div>

            <p class="vision_text_red">ひとりひとりができる私と地球への健康活動を少しずつからはじめよう。<br>
            ケンカツサポートメディア</p>
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-2.png">
        </div>
    </div>
</section>
<!-- mission_text_section -->
<section class="mission_text_section">
    <div class="medium_custom_container">
        <div class="heading_text">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cocototo-heading-image.png">
            <h2>Mission</h2>
        </div>
        <div class="mission_box_sec">
            <div class="custom_row">
                <div class="custom_col_6">
                    <div class="health_box">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-text.png">
                        <h4>ケンカツサポートメディア</h4>
                        <div class="health_box_circle">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/health-color.png" class="health_color_image">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/health-arrow.png" class="health_arrow_image">
                            <p>自分や大切な人の<br>
                            健康のために</p>
                            <h6>For</h6>
                            <h5>Health</h5>
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/health-image.png" class="health_line_image">
                            <p>人々が安心して暮らせる<br>
                                環境のために<p>
                            <h6 class="text_blue">For</h6>
                            <h5 class="text_blue">Environment</h5>
                        </div>
                    </div>
                </div>
                <div class="custom_col_6">
                    <div class="mission_box_text">
                        <p><span>ケンカツ</span>とは<br>
                            健康や環境にいいコトを<br>
                            生活習慣の中に取り入れ<br>
                        活動するコトです。</p>
                        <p class="mission_text_inner">私たちは、ケンカツ仲間と一緒に<br>
                            今よりBetterな活動をする仲間を増やし<br>
                            <span>人々の健康のため</span><br>
                            <span>今と未来の環境のため</span><br>
                        この活動を紡いでいきます。</p>
                    </div>
                </div>
                <div class="custom_col_6">
                    <div class="mission_box_image">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cocototo-image-1.png">
                    </div>
                </div>
                <div class="custom_col_6">
                    <div class="mission_box_image">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cocototo-image-2.png">
                    </div>
                </div>
            </div>
            <div class="mission_text_last">
                <p>健康や環境に関心のある私からケンカツしている私へ</p>
            </div>
            <div class="make_post">
                <a href="<?php echo get_site_url(); ?>/media" class="make_post_a">
                    ケンカツメディアページはこちら
                </a>
            </div>
        </div>
    </div>
</section>
















</main><!-- #main -->
<?php
get_footer();
