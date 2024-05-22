<?php /* Template Name: Media List*/ ?>
<?php 
get_header(); 
?>
<?php
$page_cd = "";
if(isset($_GET['cd'])) $page_cd = $_GET['cd'];
if(empty($page_cd)) $page_cd = 'ALL';
if($page_cd != 'コウノトリ' && $page_cd != 'ツシマヤマネコ' && $page_cd != 'ラッコ' && $page_cd != 'アオウミガメ' && $page_cd != 'ツキノワグマ') $page_cd = 'ALL';
$keyword = "";
if(isset($_GET['keyword'])) $keyword = $_GET['keyword'];

$catfilter = array(
	'relation' => 'OR',
	array(
		'key' => 'category',
		'value' => $page_cd, //array
		'compare' => '=',
	)
);
$keyfilter = array(
	'relation' => 'OR',
	array(
		'key' => 'ken_item',
		'value' => $keyword, //array
		'compare' => 'LIKE',
    ),
    array(
		'key' => 'nickname',
		'value' => $keyword, //array
		'compare' => 'LIKE',
	)
);
$kenfilter = [];
if(in_kenkattu_category($page_cd)) array_push($kenfilter, $catfilter);
if(!empty($keyword)) {
    array_push($kenfilter, $keyfilter);
} 
$cquery_key = array(
    'post_type' => 'kenkattu',
    'meta_query' => $kenfilter,
    // 'author' => $user_id,
	'posts_per_page' => -1,
    'fields' => 'ids',
    'orderby' => 'meta_value_num',
    'meta_key' => 'kenv_point',
    'order' => 'DESC',
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
                    <div class="media_list_inner_page_box clickall <?php echo ($page_cd == 'ALL')?'selected':''; ?>">
                        <a href="<?php echo get_site_url().'/media-list/?cd=ALL&keyword='.$keyword; ?>">ALL</a>
                    </div>
                    <div class="media_list_inner_page_box stork <?php echo ($page_cd == 'コウノトリ')?'selected':''; ?>">
                        <a href="<?php echo get_site_url().'/media-list/?cd=コウノトリ&keyword='.$keyword; ?>">
                            <img class="anormal" src="<?php echo get_stylesheet_directory_uri(); ?>/images/list_stork.png">
                            <img class="ahover" src="<?php echo get_stylesheet_directory_uri(); ?>/images/list_stork_hover.png">
                            コウノトリ</a>
                    </div>
                    <div class="media_list_inner_page_box leopard <?php echo ($page_cd == 'ツシマヤマネコ')?'selected':''; ?>">
                        <a href="<?php echo get_site_url().'/media-list/?cd=ツシマヤマネコ&keyword='.$keyword; ?>">
                            <img class="anormal" src="<?php echo get_stylesheet_directory_uri(); ?>/images/list_leopard.png">
                            <img class="ahover" src="<?php echo get_stylesheet_directory_uri(); ?>/images/list_leopard_hover.png">
                            ツシマヤマネコ</a>
                    </div>
                    <div class="media_list_inner_page_box otter <?php echo ($page_cd == 'ラッコ')?'selected':''; ?>">
                        <a href="<?php echo get_site_url().'/media-list/?cd=ラッコ&keyword='.$keyword; ?>">
                            <img class="anormal" src="<?php echo get_stylesheet_directory_uri(); ?>/images/list_otter.png">
                            <img class="ahover" src="<?php echo get_stylesheet_directory_uri(); ?>/images/list_otter_hover.png">
                            ラッコ</a>
                    </div>
                    <div class="media_list_inner_page_box turtle <?php echo ($page_cd == 'アオウミガメ')?'selected':''; ?>">
                        <a href="<?php echo get_site_url().'/media-list/?cd=アオウミガメ&keyword='.$keyword; ?>">
                            <img class="anormal" src="<?php echo get_stylesheet_directory_uri(); ?>/images/list_turtle.png">
                            <img class="ahover" src="<?php echo get_stylesheet_directory_uri(); ?>/images/list_turtle_hover.png">
                            アオウミガメ</a>
                    </div>
                    <div class="media_list_inner_page_box bear <?php echo ($page_cd == 'ツキノワグマ')?'selected':''; ?>">
                        <a href="<?php echo get_site_url().'/media-list/?cd=ツキノワグマ&keyword='.$keyword; ?>">
                            <img class="anormal" src="<?php echo get_stylesheet_directory_uri(); ?>/images/list_bear.png">
                            <img class="ahover" src="<?php echo get_stylesheet_directory_uri(); ?>/images/list_bear_hover.png">
                            ツキノワグマ</a>
                    </div>
                </div>
            </div>
            <form action="<?php echo get_site_url(); ?>/media-list/" method="get">
                <div class="items_input_feild">
                    <input type="hidden" name="cd" value="<?php echo $page_cd; ?>">
                    <input type="text" placeholder="ケンカツアイテムワード・投稿者ネーム" name="keyword" value="<?php echo $keyword; ?>">
                    <button type="submit"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/serarch-icon.png"></button>
                </div>
            </form>
            <div class="make_post_blue">
                <a href="<?php echo get_site_url(); ?>/join" class="make_post_blue_a">
                    ケンカツ記事を投稿する
                </a>
            </div>
<?php
if($cquery->have_posts()) : 
    while ($cquery->have_posts()) : 
        $cquery->the_post(); 
        $loop_id = get_the_id();
        $loop_uid= get_post_meta($loop_id, 'user_id', true);
        $loop_nickname = get_post_meta($loop_uid, 'nickname', true);
        $loop_bio = get_post_meta($loop_uid, 'bio', true);
        $max_bio_len = 215;
        // if(strlen($loop_bio) > $max_bio_len) { $loop_bio = substr($loop_bio, 0, $max_bio_len); }
        
        $loop_ken_years = get_post_meta($loop_uid, 'ken_years', true);
        $loop_ten_age = get_post_meta($loop_uid, 'ten_age', true);
        $loop_upic = get_post_meta($loop_uid, 'profile_pic', true);
        $loop_gender = get_post_meta($loop_uid, 'gender', true);
        $loop_address = get_post_meta($loop_uid, 'address', true);
        $loop_level = get_post_meta($loop_uid, 'level', true);
        $loop_level_type = get_post_meta($loop_uid, 'level_type', true);
        $loop_job = get_post_meta($loop_uid, 'job', true);
        $loop_job_show = true;
        if($loop_level_type == 'ケンカツ記事の投稿' && $loop_level == '⼀般') $loop_job_show = false;
        $loop_kenitem_post = false;
        if($loop_level_type == 'ケンカツアイテム（商品）の掲載と記事の投稿') $loop_kenitem_post = true;
        
        $loop_star_cost = get_post_meta($loop_id, 'star_cost', true);
        $loop_star_easy = get_post_meta($loop_id, 'star_easy', true);
        $loop_star_health = get_post_meta($loop_id, 'star_health', true);
        $loop_star_env = get_post_meta($loop_id, 'star_env', true);
        
        $loop_title = get_the_title();
        $loop_category = get_post_meta($loop_id, 'category', true);
        $loop_category_eng = get_kenkattu_category_eng($loop_category);
        $loop_category_desc = get_kenkattu_category_desc($loop_category);
        $loop_animal_pic1 = get_animal_photo1($loop_category);
        $loop_animal_pic2 = get_animal_photo2($loop_category);
        $loop_photo = get_post_meta($loop_id, 'ken_photo', true);
        $loop_ken_item = get_post_meta($loop_id, 'ken_item', true);
        $loop_page_url = get_permalink($loop_id);//get_site_url().'/media-item/?id='.$loop_id;
        $loop_ken_duration = get_post_meta($loop_id, 'duration', true);

        $loop_kenv_point = get_post_meta($loop_id, 'kenv_point', true); if(empty($loop_kenv_point)) $loop_kenv_point=0;
        $loop_kenv_doit = get_post_meta($loop_id, 'kenv_doit', true); if(empty($loop_kenv_doit)) $loop_kenv_doit=0;
        $loop_kenv_doing = get_post_meta($loop_id, 'kenv_doing', true); if(empty($loop_kenv_doing)) $loop_kenv_doing=0;

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
                        <div class="media_list_inner_page_box_text_details_image js_button" data-href="<?php echo $loop_page_url; ?>"
                            style="background-image:url(<?php echo $loop_photo; ?>);">
                        </div>
                        <div class="media_details_animal_img_sp <?php echo $loop_category_eng; ?> js_button" data-href="<?php echo $loop_page_url; ?>">
                                <img src="<?php echo $loop_animal_pic2; ?>">
                        </div>
                        <div class="media_list_details_text <?php echo $loop_category_eng; ?> js_button" data-href="<?php echo $loop_page_url; ?>">
                            <div class="media_details_animal_img">
                                <img src="<?php echo $loop_animal_pic1; ?>">
                            </div>
                            <div class="media_details_title media_list">
                                <div><span><h1><?php echo $loop_category_desc; ?></span><br><?php echo $loop_title; ?></h1></div>
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
                                        <a href="#" class="sum-kpoint" data-tid="<?php echo $loop_id; ?>">
                                            <div class="media_list_details_boxs_inner">
                                                <div class="media_list_details_boxs_image">
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/media-list-3.png">
                                                </div>
                                                <div class="media_list_details_boxs_text">
                                                    <p>ケンカツポイント</p>
                                                    <h4><?php echo $loop_kenv_point; ?></h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="custom_col_4 pink_box">
                                    <div class="media_list_inner_page_box_details_box">
                                        <a href="#" class="action-kpoint" data-tid="<?php echo $loop_id; ?>" data-ktype="doit">
                                            <div class="media_list_details_boxs_inner">
                                                <div class="media_list_details_boxs_image">
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/media-list-4.png">
                                                </div>
                                                <div class="media_list_details_boxs_text">
                                                    <p>やってみよう</p>
                                                    <h4><?php echo $loop_kenv_doit; ?></h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="custom_col_4 orange_box">
                                    <div class="media_list_inner_page_box_details_box">
                                        <a href="#" class="action-kpoint" data-tid="<?php echo $loop_id; ?>" data-ktype="doing">
                                            <div class="media_list_details_boxs_inner">
                                                <div class="media_list_details_boxs_image">
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/media-list-5.png">
                                                </div>
                                                <div class="media_list_details_boxs_text">
                                                    <p>やってる</p>
                                                    <h4><?php echo $loop_kenv_doing; ?></h4>
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
                            <div class="media_list_inner_text_image_inner" style="background-image:url(<?php echo $loop_upic; ?>);">
                            </div>
                            <h5><?php echo $loop_nickname; ?></h5>
                        </div>
                        <div class="media_list_inner_text_detail">
                            <h3><span>ケンカツ歴：</span><?php echo $loop_ken_years; ?></h3>
                        <?php if(!$loop_kenitem_post): ?>
                            <h3><span>性別：</span><?php echo $loop_gender; ?></h3>
                            <h3><span>年代：</span><?php echo $loop_ten_age; ?></h3>
                        <?php endif; ?>
                            <h3><span>住居：</span><?php echo $loop_address; ?></h3>
                        <?php if($loop_job_show): ?>
                            <h3><span>所属：</span><?php echo $loop_job; ?></h3>
                        <?php endif; ?>
                        <?php if(!empty($loop_bio)) : ?>
                            <div class="media_list_bio_wrap">
                                <div class="media_list_bio">
                                <?php if($loop_kenitem_post): ?>
                                    <h3><span>プロフィール：</span></h3>
                                <?php else: ?>
                                    <h3><span>ケンカツを始めたきっかけ：</span></h3>
                                <?php endif; ?>
                                    <p><?php echo $loop_bio; ?></p>
                                </div>
                            <?php if(strlen($loop_bio) > $max_bio_len): ?>
                                <p class="media_list_bio_dots">...</p>
                            <?php endif; ?>
                            </div>
                        <?php endif; ?>
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
                                                <p>⾼&nbsp;</p>
                                            </li>
                                            <?php echo_stars($loop_star_cost); ?>
                                            <li>
                                                <p>&nbsp;安</p>
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
                                                <p>難&nbsp;</p>
                                            </li>
                                            <?php echo_stars($loop_star_easy); ?>
                                            <li>
                                                <p>&nbsp;易</p>
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
else:
?>
        <p style="text-align:center">Not found!</p>
<?php 
endif;
?>
        </div>
    </div>
</section>

</main><!-- #main -->
<?php
get_footer();