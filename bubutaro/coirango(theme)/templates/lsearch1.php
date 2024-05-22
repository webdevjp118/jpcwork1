<?php /* Template Name: Laundry Search */ ?>
<?php get_header(); ?>
<div class="gbanner-sec">
    <h1>コイラン</h1>
</div>
<?php 
/* */
$keyword = "";
$areakey = "";
$condkey = "";
if(isset($_POST['keyword'])) $keyword = $_POST['keyword'];
if(isset($_POST['areakey'])) $areakey = $_POST['areakey'];
if(isset($_POST['condkey'])) $condkey = $_POST['condkey'];
$temp_areas = explode(',',$areakey);
$arealist = [];
foreach($temp_areas as $area) {
	if(!empty($area)) array_push($arealist, $area);
}
$areafilter = array(
	'relation' => 'OR',
	array(
		'key' => 'laundry_province',
		'value' => $arealist, //array
		'compare' => 'IN',
	)
),
$meta_fields = ['laundry_province', 'laundry_address1', 'laundry_address2', 'laundry_address3', 'laundry_moreinfo', 'laundry_postbox', 'laundry_phone'];
$keywordfilter = array (
	'relation' => 'OR',
)
$search_key = array(
    'post_type' => 'laundry',
    'meta_query' => array(
	  	'relation' => 'OR',
		array(
			'key' => 'laundry_province',
			'value' => $arealist, //array
			'compare' => 'IN',
		)
	),
	'order' => 'ASC'
);
$laundry_query = new WP_Query($search_key);
?>
<main id="primary" class="site-main"> <!-- main start----------------------------------------------------------------------------------------------->
<div class="pg7">
	<div class="h-searchform-sec">
		<div class="c-container">
			<form action="<?php echo get_site_url(); ?>/lsearch" method="post" class="lsearch-form">
        <a class="c-btn c-btn_secondary mr2 modal-toggle">都道府県から探す</a>
				<a class="c-btn c-btn_secondary mr2 modal-toggle">特徴から探す</a>
				<input type="text" placeholder="施設名・エリア・キーワード" id="keyword" name="keyword" value="<?php echo $_POST['keyword']; ?>" >
				<input type="hidden" id="areakey" name="areakey" value="<?php echo $areakey; ?>">
				<input type="hidden" id="condkey" name="condkey" value="<?php echo $condkey; ?>">
				<a class="c-btn c-btn_primary lsearch-btn ml2" onclick="$(this).closest('form').get(0).submit(); return false">
					<i class="fas fa-search"></i>
					検索
				</a>
        <div class="mt2"></div>
				<div id="searchkey-set">
					<a class="remove-key" data-keytype="aa" data-key="cc">選択する <i class="fas fa-close"></i></a>
				<div>
			</form>
			<?php echo '<script>setTimeout(function(){ updateSearchKeyUI(); }, 100);</script>'; ?>
		</div>
	</div>
  <div class="mt4"></div>
	<div class="result-header">
		<div class="c-container">
			<h1 class="result_headline">コイラン検索結果一覧 </h1>
      <div class="result_headinfo">
        

        <div class="result-order">
            <p>並び順：</p>
            <div class="filteritem-select">
            <select class="js-placeholderSelect" name="ordering"><option value="">選択する</option><option value="point">現在地から近い順</option><option value="ikitai_counts_desc" selected="selected">イキタイ 多い順</option><option value="post_counts_desc">サ活 多い順</option><option value="sauna_rooms__temperature_desc">サウナ室 温度高い順</option><option value="sauna_rooms__temperature_asc">サウナ室 温度低い順</option><option value="water_baths__temperature_desc">水風呂 温度高い順</option><option value="water_baths__temperature_asc">水風呂 温度低い順</option><option value="min_fee_desc">入浴料 高い順</option><option value="min_fee_asc">入浴料 低い順</option><option value="created_at_desc">新しく登録された順</option><option value="created_at_asc">古く登録された順</option><option value="updated_at_desc">新しく更新された順</option><option value="updated_at_asc">古く更新された順</option></select>
          </div>
        </div>
        
        <p class="result-number ml6">検索結果 <span>8042</span>件</p>
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
           
?>
				<a href="<?php echo $loop_url; ?>">
					<div class="laundry-div">
						<div class="photo">
							<div class="circlediv" style="background-image:url('<?php echo $loop_photo; ?>');">
							</div>
						</div>
						<div class="laundry-info">
							<h2 class="laundry-title">
								<span>[ <?php echo $loop_province; ?> ]</span> <?php echo $loop_title ?>;
							</h2>
							<p class="landry-address"><?php echo $loop_province.' '.$loop_address1.' '.$loop_address2.' '.$loop_address3; ?></p>
							<p class="landry-service"><?php echo $loop_moreinfo; ?></p>
							<div class="ikitai-activity">
								<a class="item">イキタイ<span>3</span></a>
								<a class="item">お洗活<span>3</span></a>
							</div>
						</div>
					</div>
					<div class="border-bottom">
					</div>
				</a>
<?php
        endwhile;
    endif;
?>
            </div>
        </div>
    </div>
</div>

</main><!-- End of #main ----------------------------------------------------------------------------------------------------------------------------------->
<div class="modal">
	<div class="modal-overlay modal-toggle"></div>
	<div class="modal-wrapper modal-transition">
		<div class="modal-header">
			<button class="modal-close modal-toggle"><a><i class="fas fa-close"></i></a></button>
			<h2 class="modal-heading">都道府県から探す</h2>
		</div>
		<div class="modal-content"><div class="city-list">
<?php 
	$provinces = array('北海道・東北','関東','北陸・甲信越','東海','近畿','中国・四国','九州・沖縄');
	$provinces_subs = array(
		array('北海道', '青森県', '岩手県', '宮城県', '秋田県', '山形県', '福島県'),
		array('茨城県', '栃木県', '群馬県', '埼玉県', '千葉県', '東京都', '神奈川県'),
		array('新潟県', '富山県', '石川県', '福井県', '山梨県', '長野県'),
		array('岐阜県', '静岡県', '愛知県', '三重県'),
		array('滋賀県', '京都府', '大阪府', '兵庫県', '奈良県', '和歌山県'),
		array('鳥取県', '島根県', '岡山県', '広島県', '山口県', '徳島県', '香川県', '愛媛県', '高知県'),
		array('福岡県', '佐賀県', '長崎県', '熊本県', '大分県', '宮崎県', '鹿児島県', '沖縄県'),
	);
	for($i=0;$i<count($provinces);$i++):
?>
			<div class="city-item"><div class="city-wraper"><?php echo $provinces[$i]; ?></div>
      <div class="subcity-wraper">
<?php 
		for($j=0;$j<count($provinces_subs[$i]);$j++):
?>
			
				<label class="subcity-item"><input type="checkbox" class="area-chk" data-province="<?php echo $provinces_subs[$i][$j]; ?>" name="formWheelchair" />&nbsp;<?php echo $provinces_subs[$i][$j].'のランドリー'; ?></label>
        
			
<?php
		endfor;?>
        </div>
        </div>
<?php
	endfor;
?>
		</div></div>
    <div class="mt4 tcenter">
        <a class="c-btn c-btn_primary lsearch-btn">
          <i class="fas fa-search"></i>
          検索
        </a>
      </div>
	</div>
</div>
<?php
// get_sidebar();
get_footer();
