<?php /* Template Name: Media Item*/ ?>
<?php 
get_header(); 
?>

<?php

$loop_id = get_the_ID();
$loop_uid= get_post_meta($loop_id, 'user_id', true);
$loop_post_date = get_the_date('Y.m.d', $loop_id);
$loop_nickname = get_post_meta($loop_uid, 'nickname', true);
$loop_bio = get_post_meta($loop_uid, 'bio', true);
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

$loop_title = get_post_meta($loop_id, 'ktitle', true);
$loop_category = get_post_meta($loop_id, 'category', true);
$loop_category_eng = get_kenkattu_category_eng($loop_category);
$loop_category_desc = get_kenkattu_category_desc($loop_category);
$loop_animal_pic1 = get_animal_photo1($loop_category);
$loop_animal_pic2 = get_animal_photo2($loop_category);
$loop_photo = get_post_meta($loop_id, 'ken_photo', true);
$loop_ken_item = get_post_meta($loop_id, 'ken_item', true);
$loop_content_health = get_post_meta($loop_id, 'content_health', true);
$loop_content_env = get_post_meta($loop_id, 'content_env', true);
$loop_ken_comment = get_post_meta($loop_id, 'ken_comment', true);
$loop_ken_url = get_post_meta($loop_id, 'ken_url', true);
$loop_buy_url = get_post_meta($loop_id, 'buy_url', true);
$loop_ken_duration = get_post_meta($loop_id, 'duration', true);

$loop_page_url = get_site_url().'/media-item/?id='.$loop_id;
$loop_kenv_point = get_post_meta($loop_id, 'kenv_point', true); if(empty($loop_kenv_point)) $loop_kenv_point=0;
$loop_kenv_doit = get_post_meta($loop_id, 'kenv_doit', true); if(empty($loop_kenv_doit)) $loop_kenv_doit=0;
$loop_kenv_doing = get_post_meta($loop_id, 'kenv_doing', true); if(empty($loop_kenv_doing)) $loop_kenv_doing=0;

?>

<main id="primary" class="site-main">


<!-- <section class="heading_image_section inner_page_heading_image_section full_height_section">
    <h1>Media</h1>
</section> -->
<!-- about_media_section -->
<section class="media_list_section">
    <div class="media_list_inner_sec">
        <div class="breadcrumb_sec">
            <ul>
                <li>
                    <a href="<?php echo get_site_url(); ?>">COCO TOTO</a>
                </li>
                <li>
                    <a class="curpage" href="#" class="active_breadcrumb">media</a>
                </li>
            </ul>
        </div>
        <div class="media_list_sec">
            <div class="media_list_inner">
                <div class="media_list_details">
                    <div class="media_list_details_inner">
                        <div class="media_list_details_image_text">
                            <div class="media_list_details_image" style="background-image:url(<?php echo $loop_photo; ?>)">
                            </div>
                            <div class="media_details_animal_img_sp">
                                <img src="<?php echo $loop_animal_pic2; ?>">
                            </div>
                            <div class="media_list_details_text <?php echo $loop_category_eng; ?>">
                                <div class="media_details_animal_img">
                                    <img src="<?php echo $loop_animal_pic1; ?>">
                                </div>
                                <div class="media_details_title">
                                    <h3><span><?php echo $loop_category_desc; ?></span><br><?php echo $loop_title; ?></h3>
                                </div>
                                <div class="media_details_kenkatu">
                                    <h3><span>ケンカツアイテム</span><br><?php echo $loop_ken_item; ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="media_list_post_date">
                        <p>投稿⽇&nbsp;<?php echo $loop_post_date; ?></p>
                    </div>
                    <div class="media_list_details_contents">
                        <div class="media_list_details_heading">
                            <div class="content_cap">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/content_capimg.png">
                                <h4>ケンカツ内容</h4>
                            </div>  
                            
                        </div>
                        <h5>ケンカツ実践期間</h5>
                        <p><?php echo $loop_ken_duration; ?></p>
                        <h5>健康</h5>
                        <p><?php echo $loop_content_health; ?></p>
                        <h5>環境</h5>
                        <p><?php echo $loop_content_env; ?></p>
                    </div>
                    <div class="media_list_details_comment">
                        <div class="media_list_details_heading">
                            <div class="content_cap">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/comment_capimg.png">
                                <h4>コメント</h4>
                            </div>
                        </div>
                        <p><?php echo $loop_ken_comment; ?></p>
                    </div>
                    <div class="media_list_details_reference">
                        <?php if(false): ?>
                            <a href="<?php echo $loop_ken_url; ?>" class="blue_btn posturl">参考記事はこちら</a><br>
                            <a href="javascript:void(0)" class="blue_btn buyurl_disabled">参考記事はこちら</a><br>
                        <?php endif; ?>
                        <a href="<?php echo get_site_url(); ?>/join" class="make_post_blue_btn">ケンカツ記事を投稿する</a><br>
                        <?php if(!empty($loop_buy_url)): ?>
                            <a href="<?php echo $loop_buy_url; ?>" class="blue_btn buyurl">ケンカツアイテム購⼊はこちら</a>
                        <?php else: ?>
                            <a href="javascript:void(0)" class="blue_btn buyurl_disabled">ケンカツアイテム購⼊はこちら</a><br>
                        <?php endif; ?>
                    </div>
                    <div class="media_list_details_color_box">
                        <div class="custom_row">
                            <div class="media_list_details_boxs blue_box">
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
                            <div class="media_list_details_boxs pink_box">
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
                            <div class="media_list_details_boxs orange_box">
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
                <div class="media_list_text">
                    <div class="media_list_text_inner">
                        <div class="media_list_text_image" style="background-image:url(<?php echo $loop_upic; ?>)">
                        </div>
                        <h5 class="media_nickname_h5"><?php echo $loop_nickname; ?></h5>
                        <div class="media_list_text_detail">
                            <h3><span>ケンカツ歴：</span><?php echo $loop_ken_years; ?></h3>
                        <?php if(!$loop_kenitem_post): ?>
                            <h3><span>性別：</span><?php echo $loop_gender; ?></h3>
                            <h3><span>年代：</span><?php echo $loop_ten_age; ?></h3>
                        <?php endif; ?>
                            <h3><span>住居：</span><?php echo $loop_address; ?></h3>
                        <?php if($loop_job_show): ?>
                            <h3><span>所属：</span><?php echo $loop_job; ?></h3>
                        <?php endif; ?>
                        <?php if($loop_kenitem_post): ?>
                            <h3><span>プロフィール：</span></h3>
                        <?php else: ?>
                            <h3><span>ケンカツを始めたきっかけ：</span></h3>
                        <?php endif; ?>
                            <p><?php echo $loop_bio; ?></p>
                        </div>
                        <div class="media_list_text_rating_stars">
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
                                                <p>高&nbsp;</p>
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
                                        <h5>環境への影響</h5>
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
        </div>
    </div>
</section>

</main><!-- #main -->

<?php
get_footer();