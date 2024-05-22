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
 * @package Coirango
 */
get_header('first');

$cur_uid = 0;
if(is_user_activated()) {
	global $current_user;
	$cur_uid = $current_user->ID;
	$fav_author_array = get_user_meta($cur_id, 'favorite_to_users', true);
	$fav_author_array = ids_toarray($fav_author_array);
}

$activity_search_key = array(
    'post_type' => 'activity',
    'posts_per_page' => 5,
    'meta_query' => array(
      'relation' => 'OR',
      array(
      ),
    ),
    'order' => 'DESC'
);
$activity_query = new WP_Query($activity_search_key);
$magazine_search_key = array(
    'post_type' => 'magazine',
    'posts_per_page' => 5,
    'meta_query' => array(
      'relation' => 'OR',
      array(
      ),
    ),
    'order' => 'DESC'
);
$magazine_query = new WP_Query($magazine_search_key);
$news_search_key = array(
    'post_type' => 'news',
    'posts_per_page' => 9,
    'meta_query' => array(
      'relation' => 'OR',
      array(
      ),
    ),
    'order' => 'DESC'
);
$news_query = new WP_Query($news_search_key);
$first_newstitle = '';
$first_newsdate = '';
$first_newsurl = '';
if($news_query->have_posts()) {
    $first_news = $news_query->the_post();
    $first_newstitle = get_the_title();
    $first_newsdate = get_the_date("Y.m.d");
    $first_newsurl = get_the_permalink();
}
$laundry_search_key = array(
    'post_type' => 'laundry',
    'posts_per_page' => 5,
    'meta_query' => array(
      'relation' => 'OR',
      array(
      ),
    ),
    'order' => 'DESC'
);
$laundry_query = new WP_Query($laundry_search_key);
?>
	<main id="primary" class="site-main">
<div class="first">
	<div class="top-slider">
        <div class="top-slider-wrap">
            <div class="fading-wrapper">
                <div class="pic-1"></div>
                <div class="pic-2"></div>
                <div class="pic-3"></div>
                <div class="pic-4"></div>
            </div>
        </div>
        <div class="green-mask"></div>
        <div class="typing-area">
            <p id="weird-text"></p>
        </div>
        <div class="joker-area">
            
            <img class="joker-img" src="<?php echo get_stylesheet_directory_uri(); ?>/images/yodare_fill.png">
        </div>
        <div class="searcharea-div">
            <p class="maekawa">
                <span>キーワードから探す</span>
            </p>
            <form id="search-form" action="<?php echo get_site_url(); ?>/lsearch" method="post">
                <div class="search-button-div">
                    <a class="a-search c-btn modal-toggle">都道府県から探す</a>
                    <div class="search-form-div">
                        <div class="search-form">
                            <input type="text" name="keyword" placeholder="施設名・エリア・キーワード">
                            <input type="hidden" id="areakey" name="areakey" value="<?php echo $areakey; ?>">
				            <input type="hidden" id="condkey" name="condkey" value="<?php echo $condkey; ?>">
                            <button type="submit"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/first-search.svg" alt=""></button>
                        </div>
                    </div>
                    <a class="p-search c-btn modal-toggle1">特徴から探す</a>
                </div>
            </form>
        </div>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-butterfly.png" alt="" class="top-slider-icon-butterfly">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-music.png" alt="" class="top-slider-note">
    </div>
    <div class="about-sec">
<?php if(!empty($first_newstitle)) : ?>
        <div class="top-pickup">
            <div class="top-pickup-inner c-container" id="floating-1">
                <a href="<?php echo $first_newsurl; ?>">
                    <div class="top-pickup-body">
                        <span class="date"><?php echo $first_newsdate; ?></span>
                        <p class="title">
                            <a href=""><?php echo $first_newstitle; ?></a>
                        </p>
                    </div>
                </a>
            </div>
        </div>
<?php endif; ?>
        <div class="top-about">
            <div class="top-about-inner">
                <h2 class="top-about-title">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/top-about-title.png" alt="">
                </h2>
                <p class="top-about-btn">
                    <a href="<?php echo get_site_url(); ?>/support" class="c-btn c-btn_white">
                        詳しくみる
                    </a>
                </p>
            </div>
        </div>
    </div>
    <div class="goodslist-sec">
        <div class="c-sechdr">
            <h2 class="c-sechdr-title">コイランマーケット</h2>
        </div>
        <div class="c-container">
            <div class="c-sechdr-desc">
                <p>
                    コイラン施設のグッズが集まるオンラインストア
                </p>
            </div>
            <div class="goods-list">
                <div class="goodslist_content">
                <div class="goods-card">
                        <a href="">
                            <div class="goodscard-image">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png">
                                <div class="goodscard-tag">愛知県</div>
                            </div>
                            <div class="goodscard-content">
                                <strong class="goodscard-title">
                                    <span class="goodscard-titlename">
                                        何を洗ったまで
                                    </span>
                                    <span class="goodscard-titleitem">お洗活</span>
                                </strong>

                                <div class="goodsprice-div">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/coilan.svg">
                                    <span>700</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="goods-card">
                        <a href="">
                            <div class="goodscard-image">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png">
                                <div class="goodscard-tag">愛知県</div>
                            </div>
                            <div class="goodscard-content">
                                <strong class="goodscard-title">
                                    <span class="goodscard-titlename">
                                        何を洗ったまで
                                    </span>
                                    <span class="goodscard-titleitem">お洗活</span>
                                </strong>

                                <div class="goodsprice-div">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/coilan.svg">
                                    <span>700</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="goods-card">
                        <a href="">
                            <div class="goodscard-image">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png">
                                <div class="goodscard-tag">愛知県</div>
                            </div>
                            <div class="goodscard-content">
                                <strong class="goodscard-title">
                                    <span class="goodscard-titlename">
                                        何を洗ったまで
                                    </span>
                                    <span class="goodscard-titleitem">お洗活</span>
                                </strong>

                                <div class="goodsprice-div">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/coilan.svg">
                                    <span>700</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="goods-card">
                        <a href="">
                            <div class="goodscard-image">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png">
                                <div class="goodscard-tag">愛知県</div>
                            </div>
                            <div class="goodscard-content">
                                <strong class="goodscard-title">
                                    <span class="goodscard-titlename">
                                        何を洗ったまで
                                    </span>
                                    <span class="goodscard-titleitem">お洗活</span>
                                </strong>

                                <div class="goodsprice-div">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/coilan.svg">
                                    <span>700</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <p class="c-btn-area">
                    <a href="" class="c-btn c-btn_secondary">詳しくみる</a>
                </p>
            </div>
        </div>
    </div>
    <div class="newactivity-sec">
        <div class="c-sechdr">
            <h2 class="c-sechdr-title">新着お洗活</h2>
        </div>
        <img class="titleleft-img" src="https://konome-hoikuen.com/cms/wp-content/themes/konome/assets/images/icon-blocks.gif" alt="">
        <div class="c-container">
            <div class="c-sechdr-desc">
                <p>
                    お洗活はコイランに行って、洗濯した記録や口コミ・感想を残すことができる機能です。 自分だけの日々のお洗濯記録や、初めて行ったコイラン施設の感動をぶつけたレポートから常連さんの細かすぎる定点観測まで、 日本中からさまざまなお洗活が投稿されています。何を洗ったかまで、細かすぎると変な妄想するからその点ご配慮ください。 コイランを検索、コイラン施設ページを開いて「投稿」ボタンからお洗活を登録してみよう！
                </p>
                <p class="pickup-text">
                    <span>コイランで洗濯した、</span><br><span>記録や口コミを残してみよう</span>
                </p>
            </div>
            
            <div class="activity-list">
<?php
    if($activity_query->have_posts()) : 
        while ($activity_query->have_posts()) : 
            $activity_query->the_post();
            $loop_title = get_the_title();
            $loop_date = get_the_date("Y.m.d");
            $loop_id = get_the_ID();
            $loop_author_id = get_post_field( 'post_author', $loop_id );
            $loop_author_data = get_userdata( $loop_author_id );
            $loop_author_uname = $loop_author_data->user_login;
            $loop_author_photo = get_avatar_url($loop_author_id);
            $loop_visitno = get_post_meta( $loop_id, 'activity_visitno', true );
            $loop_photo = get_post_meta( $loop_id, 'activity_photo', true );
			
            $loop_url = get_site_url().'/activity/'.$loop_id;
            $loop_content = get_post_meta( $loop_id, 'activity_content', true );
            // if(empty($loop_photo)) $loop_photo = catch_first_image();
            
            $laundry_id = get_post_meta( $loop_id, 'laundry_id', true );
            $laundry_url = get_site_url().'/laundry/'.$laundry_id;
            $laundry_name = get_the_title( $laundry_id );
            $laundry_province = get_post_meta( $laundry_id, 'laundry_province', true );

            $laundry_photo = get_post_meta( $laundry_id, 'laundry_photo', true );
            if(empty($laundry_photo)) $laundry_photo = get_stylesheet_directory_uri().'/images/noimage.png';

            $like_from = get_post_meta($loop_id, 'like_from', true);
			$like_from_array = ids_toarray($like_from);
			$like_count = count($like_from_array);   
			$loop_liked = 1;
			if(in_array($cur_uid, $like_from_array)) $loop_liked = 1;
			else $loop_liked = 0;

			$comment_key = array(
				'post_type' => 'ccomment',
				'fields' => 'ids',
				'meta_query' => array(
					array(
						'key' => 'activity_id',
						'value' => $loop_id, //array
						'compare' => '=',
					),
				),
				'posts_per_page' => -1,
			);
			$comment_query = new WP_Query($comment_key);
			$comment_count = $comment_query->found_posts;
?>
            <div class="c-actdiv js-button" data-href="<?php echo get_site_url().'/activity/'.$loop_id; ?>">
                <div class="content-line">
                    <div class="line-left">
                        <div class="c-leaftitle">
                            <h2 class="h21"><a href="<?php echo $laundry_url; ?>"><span>[ <?php echo $laundry_province; ?> ]&nbsp;</span><?php echo $laundry_name; ?></a></h2>
                        </div>
                        <div class="activity-content">
                            <div class="stop-overflow">
                                <p><?php echo $loop_content; ?></p>
                                <div class="c-spost-photo"><img src="<?php echo $loop_photo; ?>"></div>     
                            </div>
                        </div>
                    </div>
                    <div class="line-right">
                        <div class="c-rounddiv" style="background-image:url('<?php echo $laundry_photo; ?>')";>
                        </div>
                    </div>
                </div>
                <div class="profile-line">
                    <a class="c-profdiv" href="<?php echo $user_url; ?>">
                        <div class="profphoto"><div class="c-circlediv" style="background-image:url(<?php echo $loop_author_photo; ?>);"></div></div>
                        <div class="profinfo">
							<span class="profname"><?php echo $loop_author_uname; ?></span><br class="csp">
							<span class="profdate"><?php echo $loop_date; ?></span>
							<span class="profcount"><?php echo $loop_visitno; ?>回目の訪問</span>
						</div>
                    </a>
                    <div class="c-likecmt">
                        <div class="action-like c-likediv" data-uid="<?php echo $cur_uid; ?>" data-tid="<?php echo $loop_id; ?>">
                            <div class="<?php echo $loop_liked?'c-like-ic':'c-unlike-ic'; ?>"></div>
                            <?php echo_num_or_empty($like_count); ?>
                        </div>
                        <div class="c-cmtdiv">
                            <a class="c-cmt-a" href="<?php echo $loop_url; ?>">
                                <div class="c-cmt-ic"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/comment-icon.svg"></div>
                                <?php echo echo_num_or_empty($comment_count) ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div><!-- c-actdiv -->
            <div class="hr-space20"></div>
<?php 
        endwhile;
    endif;
?>
            </div>
            <p class="c-btn-area">
                <a href="<?php echo get_site_url(); ?>/activities" class="c-btn c-btn_secondary">もっと見る</a>
            </p>
        </div>
    </div>
    <div class="gwanted-sec">
        <div class="wanted-div">
            <div class="c-container">
                <p class="wanted-bubble"><span>WANTED</span></p>
                <h2 class="wanted-title">未入力施設のコイラン情報募集中</h2>
                <div class="wanted-btn">
                    <a href="" class="c-btn c-btn_green">情報募集施設を見る</a>
                </div>
            </div>
        </div>
    </div>

    <div class="news-sec">
        <div class="another-bg">
            <div class="c-container">
                <div class="sec-wrap">
                    <div class="news">
                        <h2 class="news-title">お知らせ</h2>
                        <p class="news-desc">コイラン業界の最新情報</p>
                        <div class="posts-area">
                            <ul class="posts-list">
<?php
    if($news_query->have_posts()) : 
        while ($news_query->have_posts()) : 
            $news_query->the_post();
            $loop_title = get_the_title();
            $loop_date = get_the_date("Y.m.d");
            $loop_id = get_the_ID();
            $loop_url = get_the_permalink();
?>
                                <li class="list-item">
                                    <a href="">
                                        <span class="date"><?php echo $loop_date; ?></span>
                                        <p class="title"><?php echo $loop_title; ?></p>
                                    </a>
                                </li>
<?php
        endwhile;
    endif;
?>
                            </ul>
                            <p class="btn-area">
                                <a href="<?php echo get_site_url();?>/all-news" class="c-btn c-btn_secondary">もっと見る</a>
                            </p>
                        </div>
                    </div>
                    <div class="blog">
                        <h2 class="blog-title">コイラン裏テク</h2>
                        <p class="blog-desc">コイランに関する情報を発信</p>
                        <div class="posts-area">
                            <ul class="posts-list">
<?php
    if($magazine_query->have_posts()) : 
        while ($magazine_query->have_posts()) : 
            $magazine_query->the_post();
            $loop_title = get_the_title();
            $loop_date = get_the_date("Y.m.d");
            $loop_id = get_the_ID();
            $loop_url = get_the_permalink();
            $loop_content = get_post_meta( $loop_id, 'activity_content', true );
            $loop_photo = get_the_post_thumbnail_url();
            if(empty($loop_photo)) $loop_photo = catch_first_image();
            if(strpos($loop_photo, "default.jpg") !== false) $loop_photo = "";
            if(empty($loop_photo)) $loop_photo = get_stylesheet_directory_uri().'/images/noimage.png';
            $laundry_id = get_post_meta( $loop_id, 'laundry_id', true );
            $laundry_name = get_the_title( $laundry_id );
            $laundry_province = get_post_meta( $laundry_id, 'laundry_province', true );

            $laundry_photo = get_the_post_thumbnail_url( $laundry_id );
            if(empty($laundry_photo)) $laundry_photo = get_stylesheet_directory_uri().'/images/noimage.png';

?>
                                <li class="list-item">
                                    <a href="<?php echo $loop_url; ?>">
                                        <div class="photo">
                                            <div class = "c-circlediv" style="background-image:url('<?php echo $loop_photo; ?>');">
                                            </div>
                                        </div>
                                        <div class="content">
                                            <div class="meta">
                                                <span class="date"><?php echo $loop_date; ?></span>
                                                <!-- <span class="cat">給食</span> -->
                                            </div>
                                            <p class="title"><span class="date"><?php echo $loop_title; ?></span></p>
                                            <!-- <p class="excerpt">　夏野菜を収穫したよ♪ 2歳児さんと一緒に、保育園で育てた野...</p> -->
                                        </div>
                                    </a>
                                </li>
<?php
        endwhile;
    endif;
?>
                            <p class="btn-area">
                                <a href="<?php echo get_site_url(); ?>/magazines" class="c-btn c-btn_secondary news__posts-btn">もっと見る</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="newlaundry-sec">
        <header class="c-sechdr">
            <h2 class="c-sechdr-title">新着コイラン</h2>
        </header>
        <div class="c-container">
            <div class="c-sechdr-desc">
                <p>
                    みんなで作るデータベース。情報は誰でも登録することができます。
                </p>
            </div>
            <div class="laundry-list">
<?php
    if($laundry_query->have_posts()) : 
        while ($laundry_query->have_posts()) : 
            $laundry_query->the_post();
            $loop_title = get_the_title();
            $loop_date = get_the_date("Y.m.d");
            $loop_id = get_the_ID();
            $loop_province = get_post_meta( $loop_id, 'laundry_province', true );
            $loop_address1 = get_post_meta( $loop_id, 'laundry_address1', true );
            $loop_address2 = get_post_meta( $loop_id, 'laundry_address2', true );
            $loop_address3 = get_post_meta( $loop_id, 'laundry_address3', true );
            $loop_moreinfo = get_post_meta( $loop_id, 'laundry_moreinfo', true );
            $loop_photo = get_post_meta( $loop_id, 'laundry_photo', true);
			if(empty($laundry_photo)) $laundry_photo = get_stylesheet_directory_uri().'/images/noimage.png';
            $loop_url = get_site_url().'/laundry/'.$loop_id;
            $loop_content = get_post_meta( $loop_id, 'laundry_extra', true );

            $laundry_ikitai_users = get_post_meta( $loop_id, 'laundry_ikitai_users', true );
            $laundry_ikitai_count = count(ids_toarray($laundry_ikitai_users));
            $laundry_activities_query = new WP_Query( 
                array(
                  'post_type' => 'activity',
                //   'fields' => 'ids',
                  'meta_query' => array(
                    'relation' => 'OR',
                    array(
                      'key' => 'laundry_id',
                      'value' => $loop_id,
                    ),
                  ),
                  'posts_per_page' => 5,
                )
              );
            $laundry_activity_count = $laundry_activities_query->found_posts;
?>
                <div class="js-button laundry-wrap" data-href="<?php echo $loop_url; ?>">
                    <div class="c-laundiv">
                        <div class="photo">
                            <div class="c-rounddiv" style="background-image:url('<?php echo $loop_photo; ?>');">
                            </div>
                        </div>
                        <div class="laundry-info">
                            <div class="c-leaftitle">
                                <h2 class="h21">
                                    <span>[ <?php echo $loop_province; ?> ]</span> <?php echo $loop_title; ?>
                                </h2>
                            </div>
                            <div class="laundry-scroll">
                                <p class="laundry-address"><?php echo $loop_province.' '.$loop_address1.' '.$loop_address2.' '.$loop_address3; ?></p>
                                <p class="laundry-service"><?php echo $loop_moreinfo; ?></p>
                            </div>
                            <div class="ikitai-activity">
                                <a class="item">Go!<span class="c-numspan"><?php echo $laundry_ikitai_count; ?></span></a>
                                <a class="item">お洗活<span class="c-numspan"><?php echo $laundry_activity_count; ?></span></a>
                            </div>
                        </div>
                    </div>
                </div>
<?php 
        endwhile;
    endif;
?>
            </div>
        </div>
        <p class="c-btn-area">
            <a href="<?php echo get_site_url(); ?>/lsearch" class="c-btn c-btn_secondary">もっと見る</a>
        </p>
    </div>

    <div class="gomarket-sec">
        <div class="gomarket">
            <div class="for-goods">
                <div class="content-box">
                    <h3 class="title">GOODS</h3>
                    <div class="desc-box">
                        <p class="desc">
                            日常生活でコイランーへＧｏ気持ちを<br>表現できるグッズを作っています。
                        </p>
                    </div>

                    <p class="btn-area">
                        <a href="" class="c-btn c-btn_white">
                            詳しくみる
                        </a>
                    </p>
                </div>
            </div>
            <div class="for-market">
                <div class="content-box">
                    <h3 class="title">MARKET</h3>
                    <div class="desc-box">
                        <p class="desc">
                            コイラン施設のグッズが集まるオンラインストア
                        </p>
                    </div>
                    <p class="btn-area">
                        <a href="" class="c-btn c-btn_white">
                            詳しくみる
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>

	</main><!-- #main -->

<?php
search_form();
get_footer('first');
