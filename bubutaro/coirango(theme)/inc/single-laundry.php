<?php get_header(); ?>
<div class="gbanner-sec">
    <h1>コインランドリー店舗</h1>
</div>
<?php 
/* */

$post_id = get_the_id(); $laundry_id = $post_id;
$user_id = get_current_user_id();
$author_id = get_post_field( 'post_author', $post_id );
$author_data = get_userdata( $author_id );
$author_uname = $author_data->user_login;
$content_post = get_post($post_id);

$laundry_name = $content_post->post_title;
$laundry_photo = get_post_meta( $post_id, 'laundry_photo', true );
if(empty($laundry_photo)) $laundry_photo = get_stylesheet_directory_uri().'/images/noimage.png';

$laundry_province = get_post_meta( $post_id, 'laundry_province', true );
$laundry_address1 = get_post_meta( $post_id, 'laundry_address1', true );
$laundry_address2 = get_post_meta( $post_id, 'laundry_address2', true );
$laundry_address3 = get_post_meta( $post_id, 'laundry_address3', true );
$laundry_postbox = get_post_meta( $post_id, 'laundry_postbox', true );
$laundry_phone = get_post_meta( $post_id, 'laundry_phone', true );
$laundry_weburl = get_post_meta( $post_id, 'laundry_weburl', true );
$laundry_mapurl = get_post_meta( $post_id, 'laundry_mapurl', true );

$laundry_washer_count = get_post_meta( $post_id, 'laundry_washer_count', true );
$laundry_washer_text = get_post_meta( $post_id, 'laundry_washer_text', true );
$laundry_washdryer_count = get_post_meta( $post_id, 'laundry_washdryer_count', true );
$laundry_washdryer_text = get_post_meta( $post_id, 'laundry_washdryer_text', true );
$laundry_dryer_count = get_post_meta( $post_id, 'laundry_dryer_count', true );
$laundry_dryer_text = get_post_meta( $post_id, 'laundry_dryer_text', true );
$laundry_shoewasher_count = get_post_meta( $post_id, 'laundry_shoewasher_count', true );
$laundry_quiltwashdryer_count = get_post_meta( $post_id, 'laundry_quiltwashdryer_count', true );
$laundry_quiltwashdryer_text = get_post_meta( $post_id, 'laundry_quiltwashdryer_text', true );

$laundry_moneychanger10000 = get_post_meta( $post_id, 'laundry_moneychanger10000', true );
$laundry_moneychanger5000 = get_post_meta( $post_id, 'laundry_moneychanger5000', true );
$laundry_moneychanger2000 = get_post_meta( $post_id, 'laundry_moneychanger2000', true );
$laundry_moneychanger1000 = get_post_meta( $post_id, 'laundry_moneychanger1000', true );
$laundry_moneychanger500 = get_post_meta( $post_id, 'laundry_moneychanger500', true );
if(!empty($laundry_moneychanger10000)) $laundry_moneychanger10000 = $laundry_moneychanger10000.'円';
if(!empty($laundry_moneychanger5000)) $laundry_moneychanger5000 = $laundry_moneychanger5000.'円';
if(!empty($laundry_moneychanger2000)) $laundry_moneychanger2000 = $laundry_moneychanger2000.'円';
if(!empty($laundry_moneychanger1000)) $laundry_moneychanger1000 = $laundry_moneychanger1000.'円';
if(!empty($laundry_moneychanger500)) $laundry_moneychanger500 = $laundry_moneychanger500.'円';
$laundry_moneychanger = $laundry_moneychanger10000;
if(!empty($laundry_moneychanger5000)) {
    if(empty($laundry_moneychanger)) $laundry_moneychanger = $laundry_moneychanger5000;
    else $laundry_moneychanger = $laundry_moneychanger.'、'.$laundry_moneychanger5000;
}
if(!empty($laundry_moneychanger2000)) {
    if(empty($laundry_moneychanger)) $laundry_moneychanger = $laundry_moneychanger2000;
    else $laundry_moneychanger = $laundry_moneychanger.'、'.$laundry_moneychanger2000;
}
if(!empty($laundry_moneychanger1000)) {
    if(empty($laundry_moneychanger)) $laundry_moneychanger = $laundry_moneychanger1000;
    else $laundry_moneychanger = $laundry_moneychanger.'、'.$laundry_moneychanger1000;
}
if(!empty($laundry_moneychanger500)) {
    if(empty($laundry_moneychanger)) $laundry_moneychanger = $laundry_moneychanger500;
    else $laundry_moneychanger = $laundry_moneychanger.'、'.$laundry_moneychanger500;
}

$laundry_parkingslot_count = get_post_meta( $post_id, 'laundry_parkingslot_count', true );
$laundry_is_vendingmachine = get_post_meta( $post_id, 'laundry_is_vendingmachine', true );
$laundry_is_camera = get_post_meta( $post_id, 'laundry_is_camera', true );
$laundry_is_toilet = get_post_meta( $post_id, 'laundry_is_toilet', true );
$laundry_is_autodoor = get_post_meta( $post_id, 'laundry_is_autodoor', true );

$laundry_moreinfo = get_post_meta( $post_id, 'laundry_moreinfo', true );
$laundry_is_work24 = get_post_meta( $post_id, 'laundry_is_work24', true );
$laundry_is_freewifi = get_post_meta( $post_id, 'laundry_has_freewifi', true );
$laundry_is_lendpower = get_post_meta( $post_id, 'laundry_is_lendpower', true );
$laundry_is_tv = get_post_meta( $post_id, 'laundry_is_tv', true );
$laundry_is_radio = get_post_meta( $post_id, 'laundry_is_radio', true );
$laundry_is_bgm = get_post_meta( $post_id, 'laundry_is_bgm', true );

$laundry_ikitai_count = get_post_meta( $post_id, 'laundry_ikitai_count', true );


$laundry_activities_query = new WP_Query( 
    array(
      'post_type' => 'activity',
      'meta_query' => array(
        'relation' => 'OR',
        array(
          'key' => 'laundry_id',
          'value' => $laundry_id,
        ),
      ),
    )
  );

?>
<main id="primary" class="site-main"> <!-- main start----------------------------------------------------------------------------------------------->


<div class="pg1">
    <div class="titleinfo-sec">
        <div class="c-container">
            <div class="enrollee">
                <div class="enrollee-div">
                    <span class="enrollee-cap">登録者：</span>
                    <a href="" class="enrollee-name"><?php echo $author_uname; ?></a>
                </div>
                <a href="<?php echo get_site_url(); ?>/laundry-edit?id=<?php echo $post_id ?>" class="modify-info c-btn c-btn_green c-btn_noarrow">情報修正</a>
            </div>
            <div class="laundrytitle-div">
                <!-- <h1>湯の泉 東名厚木健康センター</h1> -->
                <h1><?php echo $laundry_name; ?></h1>
                <h2><?php echo $laundry_province.' '.$laundry_address1; ?></h2>
            </div>
            <div class="laundrytitle-bottom">
                <div class="social-div">
                    <a href="#" class="fa fa-twitter"><span>シェア</span></a>
                    <a href="#" class="fa fa-facebook"><span>シェア</span></a>
                </div>
                <div class="laundry-action">
                    <div class="action-ikitai">
                        <input type="hidden" id="laundry_id" name="laundry_id" value="<?php echo $post_id; ?>">
                        <input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id; ?>">
                        <div class="ikitai-cap">
                            <span>イキタイ</span>
                        </div>
                        <div class="ikitai-count"><?php echo $laundry_ikitai_count; ?></div>
                    </div>
                    <div class="add-blog">
                        <div class="addblog-div">
                            <a href="<?php echo get_site_url(); ?>/activity-edit?laundry_id=<?php echo $post_id ?>"><span>投稿</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="detail-sec">
        <div class="c-container">
            <ul class="submenu-ul">
                <li class="submenu-li submenu-li1">
                    <a href="">施設情報</a>
                </li>
                <li class="submenu-li submenu-li2">
                    <a href="">
                        サ活 <span class="submenu-count">1601</span>
                    </a>
                </li>
            </ul>
            <div class="maininfo-div">
                <div class="maininfo-row">
                    <div class="name-col">洗濯機</div>
                    <div class="value-col fa <?php echo ($laundry_washer_count > 0)?'fa-circle-o':'fa-minus'; ?>"></div>
                    <div class="desc-col"><p><?php echo ($laundry_washer_count > 0)?$laundry_washer_text."台数: ".$laundry_washer_count:""; ?></p></div>
                </div>
                <div class="maininfo-row">
                    <div class="name-col">洗濯乾燥機</div>
                    <div class="value-col fa <?php echo ($laundry_washdryer_count > 0)?'fa-circle-o':'fa-minus'; ?>"></div>
                    <div class="desc-col"><p><?php echo ($laundry_washdryer_count > 0)?$laundry_washdryer_text."台数: ".$laundry_washdryer_count:""; ?></p></div>
                </div>
                <div class="maininfo-row">
                    <div class="name-col">乾燥機</div>
                    <div class="value-col fa <?php echo ($laundry_dryer_count > 0)?'fa-circle-o':'fa-minus'; ?>"></div>
                    <div class="desc-col"><p><?php echo ($laundry_dryer_count > 0)?$laundry_dryer_text."台数: ".$laundry_dryer_count:""; ?></p></div>
                </div>
                <div class="maininfo-row">
                    <div class="name-col">シューズランドリー</div>
                    <div class="value-col fa <?php echo ($laundry_shoewasher_count > 0)?'fa-circle-o':'fa-minus'; ?>"></div>
                    <div class="desc-col"><p><?php echo ($laundry_shoewasher_count > 0)?"台数: ".$laundry_shoewasher_count:""; ?></p></div>
                </div>
                <div class="maininfo-row">
                    <div class="name-col">ふとん洗濯乾燥機</div>
                    <div class="value-col fa <?php echo ($laundry_quiltwashdryer_count > 0)?'fa-circle-o':'fa-minus'; ?>"></div>
                    <div class="desc-col"><p><?php echo ($laundry_quiltwashdryer_count > 0)?$laundry_quiltwashdryer_text."台数: ".$laundry_quiltwashdryer_count:""; ?></p></div>
                </div>
                <div class="maininfo-row">
                    <div class="name-col">両替機</div>
                    <div class="value-col fa <?php echo (!empty($laundry_moneychanger))?'fa-circle-o':'fa-minus'; ?>"></div>
                    <div class="desc-col"><p>両替可能：<?php echo $laundry_moneychanger;?></p></div>
                </div>
                <div class="maininfo-row">
                    <div class="name-col">自販機</div>
                    <div class="value-col fa <?php echo ($laundry_is_vendingmachine == 'yes')?'fa-circle-o':'fa-minus'; ?>"></div>
                    <div class="desc-col"></div>
                </div>
                <div class="maininfo-row">
                    <div class="name-col">監視カメラ</div>
                    <div class="value-col fa <?php echo ($laundry_is_camera == 'yes')?'fa-circle-o':'fa-minus'; ?>"></div>
                    <div class="desc-col"></div>
                </div>
                <div class="maininfo-row">
                    <div class="name-col">駐車場</div>
                    <div class="value-col fa <?php echo ($laundry_parkingslot_count != '')?'fa-circle-o':'fa-minus'; ?>"></div>
                    <div class="desc-col"><p><?php echo ($laundry_parkingslot_count != '')?$laundry_parkingslot_count:""; ?></p></div>
                </div>
                <div class="maininfo-row">
                    <div class="name-col">トイレ</div>
                    <div class="value-col fa <?php echo ($laundry_is_toilet == 'yes')?'fa-circle-o':'fa-minus'; ?>"></div>
                    <div class="desc-col"></div>
                </div>
                <div class="maininfo-row">
                    <div class="name-col">自動ドア</div>
                    <div class="value-col fa <?php echo ($laundry_is_autodoor == 'yes')?'fa-circle-o':'fa-minus'; ?>"></div>
                    <div class="desc-col"></div>
                </div>
            </div>
            <div class="addinfo-div">
                <h2 class="addinfo-title">
                    <span class="green-dark-text">施設</span>
                    <span class="green-light-text">補足</span>情報
                </h2>
                <p><?php echo $laundry_moreinfo;?></p>
            </div>
            <div class="otherinfo-div">
                <div class="machine-div">
                    <h3 class="title">その他設備</h3>
                    <div class="otherinfo-row">
                        <div class="name-col">２４ｈ営業</div>
                        <div class="value-col fa <?php echo ($laundry_is_work24 == 'yes')?'fa-circle-o':'fa-minus'; ?>"></div>
                    </div>
                    <div class="otherinfo-row">
                        <div class="name-col">フリーwifi</div>
                        <div class="value-col fa <?php echo ($laundry_is_freewifi == 'yes')?'fa-circle-o':'fa-minus'; ?>"></div>
                    </div>
                    <div class="otherinfo-row">
                        <div class="name-col">貸し電源</div>
                        <div class="value-col fa <?php echo ($laundry_is_lendpower == 'yes')?'fa-circle-o':'fa-minus'; ?>"></div>
                    </div>
                    <div class="otherinfo-row">
                        <div class="name-col">テレビ</div>
                        <div class="value-col fa <?php echo ($laundry_is_tv == 'yes')?'fa-circle-o':'fa-minus'; ?>"></div>
                    </div>
                    <div class="otherinfo-row">
                        <div class="name-col">ラジオ</div>
                        <div class="value-col fa <?php echo ($laundry_is_radio == 'yes')?'fa-circle-o':'fa-minus'; ?>"></div>
                    </div>
                    <div class="otherinfo-row">
                        <div class="name-col">ＢＧＭ</div>
                        <div class="value-col fa <?php echo ($laundry_is_bgm == 'yes')?'fa-circle-o':'fa-minus'; ?>"></div>
                    </div>
                </div>
                <div class="convenience-div">
                    <h3 class="title">アメニティ</h3>
                    <div class="otherinfo-row">
                        <div class="name-col"></div>
                        <div class="value-col fa fa-minus"></div>
                    </div>
                    <div class="otherinfo-row">
                        <div class="name-col"></div>
                        <div class="value-col fa fa-minus"></div>
                    </div>
                    <div class="otherinfo-row">
                        <div class="name-col"></div>
                        <div class="value-col fa fa-minus"></div>
                    </div>
                    <div class="otherinfo-row">
                        <div class="name-col"></div>
                        <div class="value-col fa fa-minus"></div>
                    </div>
                    <div class="otherinfo-row">
                        <div class="name-col"></div>
                        <div class="value-col fa fa-minus"></div>
                    </div>
                    <div class="otherinfo-row">
                        <div class="name-col"></div>
                        <div class="value-col fa fa-minus"></div>
                    </div>
                </div>
            </div>
            <div class="activity-list">
                <h2 class="title">お洗活</h2>
<?php 
    if ($laundry_activities_query->have_posts()) :
        while ($laundry_activities_query->have_posts()) : 
            $laundry_activities_query->the_post(); 
            $loop_id = get_the_ID();
            $loop_slug = get_post_field( 'post_name', $loop_id );
            $loop_author_id = get_post_field( 'post_author', $loop_id );
            $loop_author_data = get_userdata( $loop_author_id );
            $loop_author_uname = $loop_author_data->user_login;
            $loop_author_photo = get_avatar_url($loop_author_id);
            $loop_date = get_post_meta($loop_id, 'activity_date', true);
            $loop_date = date("Y.m.d", strtotime($loop_date));
            $loop_visitno = get_post_meta($loop_id, 'activity_visitno', true);
            $loop_content = get_post_meta($loop_id, 'activity_content', true);
            $loop_ccommentcount = get_post_meta($loop_id, 'activity_ccommentcount', true);
            $loop_likecount = get_post_meta($loop_id, 'activity_likecount', true);
?>
                <a href="<?php echo get_site_url(); ?>/activity/<?php echo $loop_slug; ?>">
                    <div class="activity-div">
                        <div class="profile-div">
                            <div class="profileimg-div"><img src="<?php echo $loop_author_photo; ?>" alt=""></div>
                            <span class="profile-name"><?php echo $loop_author_uname; ?></span>
                            <span class="visit-date"><?php echo $loop_date; ?></span>
                            <span class="visit-count"><?php echo $loop_visitno; ?>回目の訪問</span>
                        </div>
                        <div class="activity-content">
                            <P><?php echo $loop_content; ?></P>
                        </div>
                        <div class="like-comment">
                            <div class="like-div">
                                <a class="like liked">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/heart-icon-yes.svg">
                                </a>
                                <span><?php echo $loop_likecount; ?></span>
                            </div>
                            <div class="comment-div">
                                <a class="comment">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/comment-icon.svg">
                                </a>
                                <span><?php echo $loop_ccommentcount; ?></span>
                            </div>
                        </div>
                    </div>
                </a>
<?php
        endwhile;
    endif;
?>
            </div>
            <div class="companyinfo-div">
                <h2>基本情報</h2>
                <div class="companyinfo-div1">
                    <div class="companyinfo-img">
                        <div class="img-div" style="background-image:url(<?php echo $laundry_photo; ?>)"></div>
                        <a href="<?php echo $laundry_mapurl; ?>">googlemapでみる</a>
                    </div>
                    <div class="companyinfo-data">
                        <div class="companydata-row">
                            <div class="name-col">施設名</div>
                            <div class="value-col"><?php echo $laundry_name; ?></div>
                        </div>
                        <div class="companydata-row">
                            <div class="name-col">住所</div>
                            <div class="value-col"><?php echo $laundry_province.' '.$laundry_address1.' '.$laundry_address2.' '.$laundry_address3 ?></div>
                        </div>
                        <div class="companydata-row">
                            <div class="name-col">郵便番号</div>
                            <div class="value-col"><?php echo $laundry_postbox; ?></div>
                        </div>
                        <div class="companydata-row">
                            <div class="name-col">TEL</div>
                            <div class="value-col"><?php echo $laundry_phone; ?></div>
                        </div>
                        <div class="companydata-row">
                            <div class="name-col">HP</div>
                            <div class="value-col"><?php echo $laundry_homepage; ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="company-gallary">
                <h2>写真ギャラリー</h2>
                <div class="owl-carousel">
                    <div><img src="./assets/images/company_large.jpg"></div>
                    <div><img src="./assets/images/company_large.jpg"></div>
                    <div><img src="./assets/images/company_large.jpg"></div>
                    <div><img src="./assets/images/company_large.jpg"></div>
                    <div><img src="./assets/images/company_large.jpg"></div>
                </div>
            </div> -->
        </div>
    </div>
</div>


</main><!-- End of #main ----------------------------------------------------------------------------------------------------------------------------------->

<?php
get_footer();
