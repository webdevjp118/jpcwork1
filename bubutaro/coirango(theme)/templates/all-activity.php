<?php /* Template Name: All Activity */ ?>
<?php get_header(); ?>
<div class="gbanner-sec">
    <h1>お洗活</h1>
</div>
<?php 
$cur_uid = 0;
if(is_user_activated()) {
	global $current_user;
	$cur_uid = $current_user->ID;
	$fav_author_array = get_user_meta($cur_id, 'favorite_to_users', true);
	$fav_author_array = ids_toarray($fav_author_array);
}
$fav_laundry = '';
if(isset($_POST['fav_laundry'])) $fav_laundry = $_POST['fav_laundry'];
/* */
$max_input_count = 5;
$posts_per_page = 10;
$keyword = "";
$areakey = "";
$condkey = "";
if(isset($_POST['keyword'])) $keyword = $_POST['keyword'];
if(isset($_POST['areakey'])) $areakey = $_POST['areakey'];
if(isset($_POST['condkey'])) $condkey = $_POST['condkey'];
if(isset($_GET['keyword'])) $keyword = $_GET['keyword'];
if(isset($_GET['areakey'])) $areakey = $_GET['areakey'];
if(isset($_GET['condkey'])) $condkey = $_GET['condkey'];
$pageno = 1;
if(isset($_POST['pageno'])) $pageno = $_POST['pageno'];
$temp_areas = explode(',',$areakey);
$temp_conds = explode(',', $condkey);
$arealist = [];
foreach($temp_areas as $area) {
	if(!empty($area)) array_push($arealist, $area);
}
$condlist = [];
foreach($temp_conds as $cond) {
	if(!empty($cond)) array_push($condlist, $cond);
}
$condfilter = array('relation' => 'OR');
$cond_single = array(
	array('自販機','laundry_is_vendingmachine'),
	array('監視カメラ','laundry_is_camera'),
	array('トイレ','laundry_is_toilet'),
	array('自動ドア','laundry_is_autodoor'),

	array('２４ｈ営業','laundry_is_work24'),
	array('フリーwifi','laundry_is_freewifi'), 
	array('テレビ','laundry_is_tv'), 
	array('ラジオ','laundry_is_radio'), 
	array('ＢＧＭ','laundry_is_bgm')
);
$cond_num = array(
	array('シューズランドリー','laundry_shoewasher_count'),
	array('駐車場','laundry_parkingslot_count'),
);
$cond_main = array(
	array('洗濯機','laundry_washer_count'),
	array('洗濯乾燥機','laundry_washdryer_count'),
	array('乾燥機','laundry_dryer_count'),
	array('ふとん洗濯乾燥機','laundry_quiltwashdryer_count'),
	array('ふとん乾燥機','laundry_quiltdryer_count'),
);
$cond_money = array (
	'laundry_moneychanger10000',
	'laundry_moneychanger5000',
	'laundry_moneychanger2000',
	'laundry_moneychanger1000',
	'laundry_moneychanger500',
);
foreach($condlist as $cond) {
	foreach($cond_single as $each) {
		if($cond == $each[0]) {
			array_push($condfilter, 
				array(
					'key' => $each[1],
					'value' => 'yes',
					'compare' => 'IN',
				));
		}	
	}
	foreach($cond_num as $each) {
		if($cond == $each[0]) {
			array_push($condfilter, 
				array(
					'key'       => $each[1],
					'compare'   => '>',
					'value'     => 0,
					'type'      => 'numeric'
				));
		}
	}
	foreach($cond_main as $each) {
		if($cond == $each[0]) {
			for($i=0;$i<$max_input_count;$i++){
				array_push($condfilter, 
					array(
						'key'       => $each[1].$i,
						'compare'   => '>',
						'value'     => 0,
						'type'      => 'numeric'
				));
			}
		}
	}
	if($cond == '両替機') {
		foreach($cond_money as $key) {
			array_push($condfilter, 
				array(
					'key' => $key,
					'value' => 'yes',
					'compare' => 'IN',
				));
		}
	}
}
$areafilter = array(
	'relation' => 'OR',
	array(
		'key' => 'laundry_province',
		'value' => $arealist, //array
		'compare' => 'IN',
	)
);
$keywordfilter = array (
	'relation' => 'OR',
);

$media_query = array(
	'relation' => 'AND',
);
if(count($arealist) > 0) {
	array_push($media_query,
		array(
			'key' => 'laundry_province',
			'value' => $arealist, //array
			'compare' => 'IN',
		)
	);
}
if(!empty($keyword)) {
	array_push($media_query, 
		array(
			'value' => $keyword,
			'compare' => 'LIKE',
			'fields' => 'all',
		)
	);
}
array_push($media_query, $condfilter);
$search_key = array(
	'post_type' => 'activity',
	'meta_query' => $media_query,
	'posts_per_page' => $posts_per_page,
	'paged' => $pageno,
	'order' => 'DESC'
);
if($fav_laundry) {
	$search_key = array(
		'post_type' => 'activity',
		'author__in' => $fav_author_array,
		'meta_query' => $media_query,
		'posts_per_page' => $posts_per_page,
		'paged' => $pageno,
		'order' => 'DESC'
	);
}
$activity_query = new WP_Query($search_key);
$total_count = $activity_query->found_posts;

?>
<main id="primary" class="site-main"> <!-- main start----------------------------------------------------------------------------------------------->
<div class="pg3">
    <div class="titleinfo-sec">
        <div class="c-container">
            <div class="hr-space40"></div>
            <div class="c-post-title">
                <h1>全国のコインランドリーのお洗活</h1>
                <h2>コインランドリーに行った記録や口コミを残してみよう。</h2>
            </div>
        </div>
	</div>
	<div class="hr-space10"></div>
    <div class="detail-sec">
        <div class="c-container">
<?php if(is_user_activated()): ?>
            <!-- <ul class="submenu-ul">
                <li>
                    <a onclick="$('#search-form').submit(); return false">みんなのお洗活</a>
                </li>
                <li>
                    <a onclick="$('#fav_laundry').val(1); $('#search-form').submit(); return false">お気に入り</a>
                </li>
			</ul> -->
			<ul class="gsubmenu-ul">
				<li>
					<a data-icon="activities" class="<?php echo $fav_laundry?'':'selected'; ?>" onclick="$('#fav_laundry').val(0); $('#search-form').submit(); return false">みんなのお洗活</a>
				</li>
				<li>
					<a data-icon="favorite" class="<?php echo $fav_laundry?'selected':''; ?>" onclick="$('#fav_laundry').val(1); $('#search-form').submit(); return false">お気に入り</a>
				</li>
			</ul>
<?php endif; ?>
            <div class="h-searchform-sec">
                <form id="search-form" action="<?php echo get_site_url(); ?>/activities" method="post" class="lsearch-form">
                    <a class="c-btn c-btn_secondary mr2 modal-toggle">都道府県から探す</a>
					<div class="spacing">&nbsp;</div>
                    <a class="c-btn c-btn_secondary mr2 modal-toggle1">特徴から探す</a>
					<div class="spacing">&nbsp;</div>
                    <input type="text" placeholder="施設名・エリア・キーワード" id="keyword" name="keyword" value="<?php echo $_POST['keyword']; ?>" >
                    <input type="hidden" id="areakey" name="areakey" value="<?php echo $areakey; ?>">
                    <input type="hidden" id="condkey" name="condkey" value="<?php echo $condkey; ?>">
					<input type="hidden" id="pageno" name="pageno" value="<?php echo $pageno; ?>">
					<div class="spacing">&nbsp;</div>
					<input type="hidden" id="fav_laundry" name="fav_laundry" value="<?php echo $fav_laundry; ?>">
                    <a class="c-btn c-btn_primary lsearch-btn" onclick="$('#search-form').submit(); return false">
                        <i class="fas fa-search"></i>
                        検索
                    </a>
                    <div class="mt2"></div>
                    <div id="searchkey-set" class="searchkey-set"></div>
                </form>
            </div>
            <div class="hr-space20"></div>
            <div class="c-resultinfo">
				<p class="result-number">検索結果 <span class="c-numspan"><?php echo $total_count; ?></span>件</p>
            </div>
            <div class="search-result"></div>
            <div class="activity-list">
<?php 
    if($activity_query->have_posts()) : 
        while ($activity_query->have_posts()) : 
            $activity_query->the_post(); 
            $loop_id = get_the_id();

            $loop_author_id = get_post_field( 'post_author', $loop_id );
            $loop_author_data = get_userdata( $loop_author_id );
            $loop_author_uname = $loop_author_data->user_login;
            $loop_author_photo = get_avatar_url($loop_author_id);

			$loop_content = get_post_meta( $loop_id, 'activity_content', true );
			$loop_content = wpautop($loop_content);
            $loop_date = get_post_meta( $loop_id, 'activity_date', true );
            $loop_date = date('Y.m.d', strtotime($loop_date));
            $loop_visitno = get_post_meta( $loop_id, 'activity_visitno', true );

            $laundry_id = get_post_meta( $loop_id, 'laundry_id', true );
            $laundry_name = get_the_title( $laundry_id );
            $laundry_province = get_post_meta( $laundry_id, 'laundry_province', true );

            $loop_photo = get_post_meta( $loop_id, 'activity_photo', true );
            $laundry_photo = get_post_meta( $laundry_id, 'laundry_photo', true);
			if(empty($laundry_photo)) $laundry_photo = get_stylesheet_directory_uri()."/images/noimage.png";
            $loop_slug = get_post_field( 'post_name', $loop_id );
			$activity_url = get_site_url()."/activity/".$loop_slug;
			$laundry_url = get_site_url()."/laundry/".$laundry_id;
			$user_url = get_site_url()."/cuser/?id=".$loop_author_id;
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
				<div class="c-actdiv js-button" data-href="<?php echo $activity_url; ?>">
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
                            <div class="c-rounddiv" style="background-image:url('<?php echo $laundry_photo; ?>')";></div>
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
                                <a class="c-cmt-a" href="<?php echo $activity_url; ?>">
									<div class="c-cmt-ic"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/comment-icon.svg"></div>
									<?php echo echo_num_or_empty($comment_count) ?>
                                </a>
                            </div>
                        </div>
                    </div>
				</div>
				<div class="hr-space20"></div>
<?php
        endwhile;
    endif;

	$total_page = -1;
	if($total_count > 0) {
		$total_page = intdiv($total_count, $posts_per_page);
		if($total_count % $posts_per_page > 0)	$total_page++;
	} 
	$page_first = -1;$page_prev = -1;$page_next = -1;$page_last = -1;
	if($total_count > 0) {
		if($pageno > 2) $page_first = 1;
		if($pageno > 1) $page_prev = $pageno - 1;
		if($total_page - $pageno >= 2) $page_last = $total_page;
		if($total_page - $pageno >= 1) $page_next = $pageno + 1;
		echo '<div class="wp-pagenavi">';
		if($page_first > 0) echo '<a class="page-other" data-page="'.$page_first.'">'.$page_first.'</a>';
		if($page_prev > 0) echo '<a class="page-other" data-page="'.$page_prev.'">'.$page_prev.'</a>';
		if($pageno > 0) echo '<a class="page-current" data-page="'.$pageno.'">'.$pageno.'</a>';
		if($page_next > 0) echo '<a class="page-other" data-page="'.$page_next.'">'.$page_next.'</a>';
		if($page_last > 0) echo '<a class="page-other" data-page="'.$page_last.'">'.$page_last.'</a>';
		echo '</div>';
	}
?>
            </div>
        </div>
    </div>
</div>

</main><!-- End of #main ----------------------------------------------------------------------------------------------------------------------------------->

<?php
search_form();
get_footer();
?>

<script>
	setTimeout(function(){ updateSearchKeyUI(); }, 100);
</script>