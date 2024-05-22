<?php /* Template Name: Media List Sample*/ ?>
<?php 
get_header(); 
?>
<?php
$cquery_key = array(
    'post_type' => 'kenkattu',
    // 'author' => $user_id,
	'posts_per_page' => -1,
    'fields' => 'ids',
);
$cquery = new WP_Query($cquery_key);
?>
<main id="primary" class="site-main">


<!-- <section class="heading_image_section inner_page_heading_image_section full_height_section">
    <h1>Media</h1>
</section> -->
<!-- about_media_section -->
<section class="media_list_inner_page_section">
    <div class="small_custom_container">
        <div class="breadcrumb_sec">
            <ul>
                <li>
                    <a href="<?php echo get_site_url(); ?>">COCO TOTO</a>
                </li>
                <li>
                    <a href="#" class="active_breadcrumb">media</a>
                </li>
            </ul>
        </div>
        <div class="scroll_pos" id="content_start"></div>
        <div class="media_list_inner_page_sec">
            <div class="media_list_inner_page_box_link_sec">
                <div class="custom_row">
                    <div class="media_list_inner_page_box clickall">
                        <a href="#">ALL</a>
                    </div>
                    <div class="media_list_inner_page_box stork">
                        <a href="#">
                            <img class="anormal" src="<?php echo get_stylesheet_directory_uri(); ?>/images/list_stork.png">
                            <img class="ahover" src="<?php echo get_stylesheet_directory_uri(); ?>/images/list_stork_hover.png">
                            コウノトリ</a>
                    </div>
                    <div class="media_list_inner_page_box leopard">
                        <a href="#">
                            <img class="anormal" src="<?php echo get_stylesheet_directory_uri(); ?>/images/list_leopard.png">
                            <img class="ahover" src="<?php echo get_stylesheet_directory_uri(); ?>/images/list_leopard_hover.png">
                            ツシマヤマネコ</a>
                    </div>
                    <div class="media_list_inner_page_box otter">
                        <a href="#">
                            <img class="anormal" src="<?php echo get_stylesheet_directory_uri(); ?>/images/list_otter.png">
                            <img class="ahover" src="<?php echo get_stylesheet_directory_uri(); ?>/images/list_otter_hover.png">
                            ラッコ</a>
                    </div>
                    <div class="media_list_inner_page_box turtle">
                        <a href="#">
                            <img class="anormal" src="<?php echo get_stylesheet_directory_uri(); ?>/images/list_turtle.png">
                            <img class="ahover" src="<?php echo get_stylesheet_directory_uri(); ?>/images/list_turtle_hover.png">
                            アオウミガメ</a>
                    </div>
                    <div class="media_list_inner_page_box bear">
                        <a href="#">
                            <img class="anormal" src="<?php echo get_stylesheet_directory_uri(); ?>/images/list_bear.png">
                            <img class="ahover" src="<?php echo get_stylesheet_directory_uri(); ?>/images/list_bear_hover.png">
                            ツキノワグマ</a>
                    </div>
                </div>
            </div>
            <div class="items_input_feild">
                <input type="text" placeholder="ケンカツアイテム">
                <button><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/serarch-icon.png"></button>
            </div>
<?php
function echo_stars($star_count) {
    for($i=1;$i<=5;$i++) {
        if($i <= $star_count) {
            echo '<li><span><i class="fa fa-star" aria-hidden="true"></i></span></li>';
        }
        else {
            echo '<li><span><i class="fa fa-star-o" aria-hidden="true"></i></span></li>';
        }
    }
}
                                            
if($cquery->have_posts()) : 
    while ($cquery->have_posts()) : 
        $cquery->the_post(); 
        $loop_id = get_the_id();
        $loop_uid= get_post_meta($loop_id, 'user_id', true);
        $loop_nickname = get_post_meta($loop_uid, 'nickname', true);
        $loop_ken_years = get_post_meta($loop_uid, 'ken_years', true);
        $loop_ten_age = get_post_meta($loop_uid, 'ten_age', true);
        $loop_upic = get_post_meta($loop_uid, 'profile_pic', true);
        $loop_gender = get_post_meta($loop_uid, 'gender', true);
        $loop_address = get_post_meta($loop_uid, 'address', true);
        $loop_star_cost = get_post_meta($loop_uid, 'star_cost', true);
        $loop_star_easy = get_post_meta($loop_uid, 'star_easy', true);
        $loop_star_health = get_post_meta($loop_uid, 'star_health', true);
        $loop_star_env = get_post_meta($loop_uid, 'star_env', true);
        
        $loop_title = get_post_meta($loop_id, 'ktitle', true);
        $loop_category = get_post_meta($loop_id, 'category', true);
        $loop_photo = get_post_meta($loop_id, 'ken_photo', true);
        $loop_ken_item = get_post_meta($loop_id, 'ken_item', true);
        $loop_page_url = get_site_url().'/kenkattu/?id='.$loop_id;
		// $loop_date = get_post_meta($loop_id, 'vdate', true);
		// $loop_date = date( "Y.m.d", strtotime( $loop_date ) );
        // $loop_title = get_post_meta($loop_id, 'vtitle', true);
        // $loop_url = get_post_meta($loop_id, 'vurl', true);
        // $loop_url = str_replace('https://youtu.be/','https://www.youtube.com/embed/',$loop_url);
        // $loop_duration = get_post_meta($loop_id, 'vduration', true);
        // $loop_content = get_post_meta($loop_id, 'vcontent', true);
        // $loop_content = wpautop($loop_content);
        // $loop_vpeople = get_post_meta($loop_id, 'vpeople', true);
        // $loop_wpeople = wpautop($loop_vpeople);
?>
            <div class="media_list_inner_page_box_text">
                <div class="media_list_inner_page_box_text_inner">
                    <div class="media_list_inner_page_box_text_details_sec">
                        <div class="media_list_inner_page_box_text_details_image js_button" data-href="<?php echo $loop_page_url; ?>">
                            <img src="<?php echo $loop_photo; ?>">
                        </div>
                        <div class="media_details_animal_img_sp js_button" data-href="<?php echo get_site_url(); ?>/media-item/">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/animal_stork_circle.svg">
                        </div>
                        <div class="media_list_details_text stork js_button" data-href="<?php echo get_site_url(); ?>/media-item/">
                            <div class="media_details_animal_img">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/animal_stork.svg">
                            </div>
                            <div class="media_details_title media_list">
                                <h3><span>飲み物</span><br><?php echo $loop_title; ?></h3>
                            </div>
                            <div class="media_details_kenkatu">
                                <h3><span>ケンカツアイテム</span><br><?php echo $loop_ken_item; ?></h3>
                            </div>
                        </div>
                        <div style="content:''; height:10px;"></div>
                        <div class="media_list_inner_page_box_details_box_sec">
                            <div class="custom_row">
                                <div class="custom_col_4 blue_box">
                                    <div class="media_list_inner_page_box_details_box">
                                        <a href="#">
                                            <div class="media_list_details_boxs_inner">
                                                <div class="media_list_details_boxs_image">
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/media-list-3.png">
                                                </div>
                                                <div class="media_list_details_boxs_text">
                                                    <p>ケンカツポイント</p>
                                                    <h4>77</h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="custom_col_4 pink_box">
                                    <div class="media_list_inner_page_box_details_box">
                                        <a href="#">
                                            <div class="media_list_details_boxs_inner">
                                                <div class="media_list_details_boxs_image">
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/media-list-4.png">
                                                </div>
                                                <div class="media_list_details_boxs_text">
                                                    <p>やってみよう</p>
                                                    <h4>55</h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="custom_col_4 orange_box">
                                    <div class="media_list_inner_page_box_details_box">
                                        <a href="#">
                                            <div class="media_list_details_boxs_inner">
                                                <div class="media_list_details_boxs_image">
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/media-list-5.png">
                                                </div>
                                                <div class="media_list_details_boxs_text">
                                                    <p>やってる</p>
                                                    <h4>22</h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="media_list_inner_page_box_text_image">
                        <div class="media_list_inner_text_image">
                            <div class="media_list_inner_text_image_inner">
                                <img src="<?php echo $loop_upic; ?>">
                            </div>
                            <h5><?php echo $loop_nickname; ?></h5>
                        </div>
                        <div class="media_list_inner_text_detail">
                            <h3>ケンカツ歴：<?php echo $loop_ken_years; ?></h3>
                            <h3><span>性別：</span><?php echo $loop_gender; ?></h3>
                            <h3><span>年代：</span><?php echo $loop_ten_age; ?></h3>
                            <h3><span>住居：</span><?php echo $loop_address; ?></h3>
                        </div>
                        <div class="media_list_text_rating_stars media_list_inner_page_text_rating_stars">
                            <div class="custom_row">
                                <div class="custom_col_6">
                                    <div class="media_list_rating_text">
                                        <h5>費用</h5>
                                    </div>
                                </div>
                                <div class="custom_col_6">
                                    <div class="media_list_rating_stars">
                                        <ul>
                                            <li>
                                                <p>安&nbsp;</p>
                                            </li>
                                            <?php echo_stars($loop_star_cost); ?>
                                            <li>
                                                <p>&nbsp;高</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="custom_col_6">
                                    <div class="media_list_rating_text">
                                        <h5>やりやすさ</h5>
                                    </div>
                                </div>
                                <div class="custom_col_6">
                                    <div class="media_list_rating_stars">
                                        <ul>
                                            <li>
                                                <p>易&nbsp;</p>
                                            </li>
                                            <?php echo_stars($loop_star_easy); ?>
                                            <li>
                                                <p>&nbsp;難</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="custom_col_6">
                                    <div class="media_list_rating_text">
                                        <h5>健康への影響</h5>
                                    </div>
                                </div>
                                <div class="custom_col_6">
                                    <div class="media_list_rating_stars">
                                        <ul>
                                            <li>
                                                <p>低&nbsp;</p>
                                            </li>
                                            <?php echo_stars($loop_star_health); ?>
                                            <li>
                                                <p>&nbsp;高</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="custom_col_6">
                                    <div class="media_list_rating_text">
                                        <h5>環境への影響 </h5>
                                    </div>
                                </div>
                                <div class="custom_col_6">
                                    <div class="media_list_rating_stars">
                                        <ul>
                                            <li>
                                                <p>低&nbsp;</p>
                                            </li>
                                            <?php echo_stars($loop_star_env); ?>
                                            <li>
                                                <p>&nbsp;高</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
<?php   endwhile;
endif;
?>
            <div class="media_list_inner_page_box_text">
                <div class="media_list_inner_page_box_text_inner">
                    <div class="media_list_inner_page_box_text_details_sec">
                        <div class="media_list_inner_page_box_text_details_image js_button" data-href="<?php echo get_site_url(); ?>/media-item/">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/media-list-11.png">
                        </div>
                        <div class="media_details_animal_img_sp js_button" data-href="<?php echo get_site_url(); ?>/media-item/">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/animal_stork_circle.svg">
                        </div>
                        <div class="media_list_details_text stork js_button" data-href="<?php echo get_site_url(); ?>/media-item/">
                            <div class="media_details_animal_img">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/animal_stork.svg">
                            </div>
                            <div class="media_details_title media_list">
                                <h3><span>飲み物</span><br>遺伝子組み換えしていない古代小麦粉</h3>
                            </div>
                            <div class="media_details_kenkatu">
                                <h3><span>ケンカツアイテム</span><br>ゴミ拾い</h3>
                            </div>
                        </div>
                        <div style="content:''; height:10px;"></div>
                        <div class="media_list_inner_page_box_details_box_sec">
                            <div class="custom_row">
                                <div class="custom_col_4 blue_box">
                                    <div class="media_list_inner_page_box_details_box">
                                        <a href="#">
                                            <div class="media_list_details_boxs_inner">
                                                <div class="media_list_details_boxs_image">
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/media-list-3.png">
                                                </div>
                                                <div class="media_list_details_boxs_text">
                                                    <p>ケンカツポイント</p>
                                                    <h4>77</h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="custom_col_4 pink_box">
                                    <div class="media_list_inner_page_box_details_box">
                                        <a href="#">
                                            <div class="media_list_details_boxs_inner">
                                                <div class="media_list_details_boxs_image">
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/media-list-4.png">
                                                </div>
                                                <div class="media_list_details_boxs_text">
                                                    <p>やってみよう</p>
                                                    <h4>55</h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="custom_col_4 orange_box">
                                    <div class="media_list_inner_page_box_details_box">
                                        <a href="#">
                                            <div class="media_list_details_boxs_inner">
                                                <div class="media_list_details_boxs_image">
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/media-list-5.png">
                                                </div>
                                                <div class="media_list_details_boxs_text">
                                                    <p>やってる</p>
                                                    <h4>22</h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="media_list_inner_page_box_text_image">
                        <div class="media_list_inner_text_image">
                            <div class="media_list_inner_text_image_inner">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/media-list-12.png">
                            </div>
                            <h5>ハンドルネーム</h5>
                        </div>
                        <div class="media_list_inner_text_detail">
                            <h3>ケンカツ歴：00年</h3>
                            <h3><span>性別：</span>男</h3>
                            <h3><span>年代：</span>00代</h3>
                            <h3><span>住居：</span>在住場所内容テキスト</h3>
                        </div>
                        <div class="media_list_text_rating_stars media_list_inner_page_text_rating_stars">
                            <div class="custom_row">
                                <div class="custom_col_6">
                                    <div class="media_list_rating_text">
                                        <h5>費用</h5>
                                    </div>
                                </div>
                                <div class="custom_col_6">
                                    <div class="media_list_rating_stars">
                                        <ul>
                                            <li>
                                                <p>安&nbsp;</p>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-star-o" aria-hidden="true"></i></span>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-star-o" aria-hidden="true"></i></span>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-star-o" aria-hidden="true"></i></span>
                                            </li>
                                            <li>
                                                <p>&nbsp;高</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="custom_col_6">
                                    <div class="media_list_rating_text">
                                        <h5>やりやすさ</h5>
                                    </div>
                                </div>
                                <div class="custom_col_6">
                                    <div class="media_list_rating_stars">
                                        <ul>
                                            <li>
                                                <p>易&nbsp;</p>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-star-o" aria-hidden="true"></i></span>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-star-o" aria-hidden="true"></i></span>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-star-o" aria-hidden="true"></i></span>
                                            </li>
                                            <li>
                                                <p>&nbsp;難</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="custom_col_6">
                                    <div class="media_list_rating_text">
                                        <h5>健康指数</h5>
                                    </div>
                                </div>
                                <div class="custom_col_6">
                                    <div class="media_list_rating_stars">
                                        <ul>
                                            <li>
                                                <p>低&nbsp;</p>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-star-o" aria-hidden="true"></i></span>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-star-o" aria-hidden="true"></i></span>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-star-o" aria-hidden="true"></i></span>
                                            </li>
                                            <li>
                                                <p>&nbsp;高</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="custom_col_6">
                                    <div class="media_list_rating_text">
                                        <h5>環境指数</h5>
                                    </div>
                                </div>
                                <div class="custom_col_6">
                                    <div class="media_list_rating_stars">
                                        <ul>
                                            <li>
                                                <p>低&nbsp;</p>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-star-o" aria-hidden="true"></i></span>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-star-o" aria-hidden="true"></i></span>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-star-o" aria-hidden="true"></i></span>
                                            </li>
                                            <li>
                                                <p>&nbsp;高</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="media_list_inner_page_box_text">
                <div class="media_list_inner_page_box_text_inner">
                    <div class="media_list_inner_page_box_text_details_sec">
                        <div class="media_list_inner_page_box_text_details_image js_button" data-href="<?php echo get_site_url(); ?>/media-item/">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/media-list-11.png">
                        </div>
                        <div class="media_details_animal_img_sp js_button" data-href="<?php echo get_site_url(); ?>/media-item/">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/animal_stork_circle.svg">
                        </div>
                        <div class="media_list_details_text stork js_button" data-href="<?php echo get_site_url(); ?>/media-item/">
                            <div class="media_details_animal_img">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/animal_stork.svg">
                            </div>
                            <div class="media_details_title media_list">
                                <h3><span>飲み物</span><br>遺伝子組み換えしていない古代小麦粉</h3>
                            </div>
                            <div class="media_details_kenkatu">
                                <h3><span>ケンカツアイテム</span><br>ゴミ拾い</h3>
                            </div>
                        </div>
                        <div style="content:''; height:10px;"></div>
                        <div class="media_list_inner_page_box_details_box_sec">
                            <div class="custom_row">
                                <div class="custom_col_4 blue_box">
                                    <div class="media_list_inner_page_box_details_box">
                                        <a href="#">
                                            <div class="media_list_details_boxs_inner">
                                                <div class="media_list_details_boxs_image">
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/media-list-3.png">
                                                </div>
                                                <div class="media_list_details_boxs_text">
                                                    <p>ケンカツポイント</p>
                                                    <h4>77</h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="custom_col_4 pink_box">
                                    <div class="media_list_inner_page_box_details_box">
                                        <a href="#">
                                            <div class="media_list_details_boxs_inner">
                                                <div class="media_list_details_boxs_image">
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/media-list-4.png">
                                                </div>
                                                <div class="media_list_details_boxs_text">
                                                    <p>やってみよう</p>
                                                    <h4>55</h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="custom_col_4 orange_box">
                                    <div class="media_list_inner_page_box_details_box">
                                        <a href="#">
                                            <div class="media_list_details_boxs_inner">
                                                <div class="media_list_details_boxs_image">
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/media-list-5.png">
                                                </div>
                                                <div class="media_list_details_boxs_text">
                                                    <p>やってる</p>
                                                    <h4>22</h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="media_list_inner_page_box_text_image">
                        <div class="media_list_inner_text_image">
                            <div class="media_list_inner_text_image_inner">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/media-list-12.png">
                            </div>
                            <h5>ハンドルネーム</h5>
                        </div>
                        <div class="media_list_inner_text_detail">
                            <h3>ケンカツ歴：00年</h3>
                            <h3><span>性別：</span>男</h3>
                            <h3><span>年代：</span>00代</h3>
                            <h3><span>住居：</span>在住場所内容テキスト</h3>
                        </div>
                        <div class="media_list_text_rating_stars media_list_inner_page_text_rating_stars">
                            <div class="custom_row">
                                <div class="custom_col_6">
                                    <div class="media_list_rating_text">
                                        <h5>費用</h5>
                                    </div>
                                </div>
                                <div class="custom_col_6">
                                    <div class="media_list_rating_stars">
                                        <ul>
                                            <li>
                                                <p>安&nbsp;</p>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-star-o" aria-hidden="true"></i></span>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-star-o" aria-hidden="true"></i></span>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-star-o" aria-hidden="true"></i></span>
                                            </li>
                                            <li>
                                                <p>&nbsp;高</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="custom_col_6">
                                    <div class="media_list_rating_text">
                                        <h5>やりやすさ</h5>
                                    </div>
                                </div>
                                <div class="custom_col_6">
                                    <div class="media_list_rating_stars">
                                        <ul>
                                            <li>
                                                <p>易&nbsp;</p>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-star-o" aria-hidden="true"></i></span>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-star-o" aria-hidden="true"></i></span>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-star-o" aria-hidden="true"></i></span>
                                            </li>
                                            <li>
                                                <p>&nbsp;難</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="custom_col_6">
                                    <div class="media_list_rating_text">
                                        <h5>健康指数</h5>
                                    </div>
                                </div>
                                <div class="custom_col_6">
                                    <div class="media_list_rating_stars">
                                        <ul>
                                            <li>
                                                <p>低&nbsp;</p>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-star-o" aria-hidden="true"></i></span>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-star-o" aria-hidden="true"></i></span>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-star-o" aria-hidden="true"></i></span>
                                            </li>
                                            <li>
                                                <p>&nbsp;高</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="custom_col_6">
                                    <div class="media_list_rating_text">
                                        <h5>環境指数</h5>
                                    </div>
                                </div>
                                <div class="custom_col_6">
                                    <div class="media_list_rating_stars">
                                        <ul>
                                            <li>
                                                <p>低&nbsp;</p>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-star-o" aria-hidden="true"></i></span>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-star-o" aria-hidden="true"></i></span>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-star-o" aria-hidden="true"></i></span>
                                            </li>
                                            <li>
                                                <p>&nbsp;高</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>

</main><!-- #main -->
<?php
get_footer();