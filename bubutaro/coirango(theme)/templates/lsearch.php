<?php /* Template Name: Laundry Search */ ?>
<?php get_header(); ?>

<?php

?>


<div class="gbanner-sec">
    <h1>コイラン</h1>
</div>
<?php 
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
	'post_type' => 'laundry',
	'meta_query' => $media_query,
	'posts_per_page' => $posts_per_page,
	'paged' => $pageno,
	'order' => 'DESC'
);
$laundry_query = new WP_Query($search_key);
$total_count = $laundry_query->found_posts;

// $pageno;
?>
<main id="primary" class="site-main"> <!-- main start----------------------------------------------------------------------------------------------->
<div class="pg7">
	<div class="hr-space40"></div>
	<div class="h-searchform-sec">
		<div class="c-container">
			<form id="search-form" action="<?php echo get_site_url(); ?>/lsearch" method="post" class="lsearch-form">
				<a class="c-btn c-btn_secondary modal-toggle">都道府県から探す</a>
				<div class="spacing">&nbsp;</div>
				<a class="c-btn c-btn_secondary modal-toggle1">特徴から探す</a>
				<div class="spacing">&nbsp;</div>
				<input type="text" placeholder="施設名・エリア・キーワード" id="keyword" name="keyword" value="<?php echo $_POST['keyword']; ?>" >
				<div class="spacing">&nbsp;</div>
				<input type="hidden" id="areakey" name="areakey" value="<?php echo $areakey; ?>">
				<input type="hidden" id="condkey" name="condkey" value="<?php echo $condkey; ?>">
				<input type="hidden" id="pageno" name="pageno" value="<?php echo $pageno; ?>">
				<div class="spacing">&nbsp;</div>
				<a class="c-btn c-btn_primary lsearch-btn" onclick="$('#search-form').submit(); return false">
					<i class="fas fa-search"></i>
					検索
				</a>
				<div class="mt2"></div>
				<div id="searchkey-set" class="searchkey-set"></div>
			</form>
		</div>
	</div>
	<div class="mt4"></div>
	<div class="c-result-line">
		<div class="c-container">
			<div class="c-result-set">
				<div class="title-div">
					<h1 class="c-result-cap cpc">コイラン検索結果一覧 </h1>
					<h1 class="c-result-cap csp">検索結果 <span class="c-numspan"><?php echo $total_count; ?></span>件</h1>
				</div>	
				<div class="c-resultinfo">
					<div class="result-order">
						<p>並び順：</p>
						<div class="filteritem-select">
							<select class="js-placeholderSelect" name="ordering">
								<option value="">選択する</option>
								<option value="point">現在地から近い順</option>
								<option value="ikitai_counts_desc" selected="selected">Go! 多い順</option>
								<option value="post_counts_desc">おサ活 多い順</option>
								<option value="created_at_desc">新しく登録された順</option>
								<option value="created_at_asc">古く登録された順</option>
								<option value="updated_at_desc">新しく更新された順</option>
								<option value="updated_at_asc">古く更新された順</option>
							</select>
						</div>
					</div>
					<p class="result-number cpc-inb">検索結果 <span class="c-numspan"><?php echo $total_count; ?></span>件</p>
				</div>
			</div>
		</div>
	</div>
    <div class="detail-sec">
        <div class="c-container">
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
			$loop_photo = get_post_meta( $loop_id, 'laundry_photo', true );
			if(empty($loop_photo)) $loop_photo = get_stylesheet_directory_uri().'/images/noimage.png';
            $loop_url = get_the_permalink();
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
					<div class="js-button c-laundiv" data-href="<?php echo $loop_url; ?>">
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
			  		<div class="hr-space20"></div>
					<div class="c-laundiv-bline"></div>
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
// get_sidebar();
get_footer();
?>
<script>
	setTimeout(function(){ updateSearchKeyUI(); }, 100);
</script>