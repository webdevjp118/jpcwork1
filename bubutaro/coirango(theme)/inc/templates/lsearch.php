<?php /* Template Name: Laundry Search */ ?>
<?php get_header(); ?>
<div class="gbanner-sec">
    <h1>コイラン</h1>
</div>
<?php 
/* */
$search_key = array(
    'post_type' => 'laundry',
    'meta_query' => array(
      'relation' => 'OR',
      array(
      ),
	),
	'order' => 'ASC'
);
$laundry_query = new WP_Query($search_key);
?>
<main id="primary" class="site-main"> <!-- main start----------------------------------------------------------------------------------------------->
<div class="pg7">
	<div class="h-searchform-sec">
		<div class="c-container">
			検索
		</div>
	</div>
	<div class="result-header">
		<div class="c-container">
			<h1 class="result_headline">コイラン検索結果一覧 </h1>
			<p class="result-number">検索結果 <span>8042</span>件</p>
	
			<div class="result-order">
				  <p>並び順：</p>
				  <div class="filteritem-select">
					<select class="js-placeholderSelect" name="ordering"><option value="">選択する</option><option value="point">現在地から近い順</option><option value="ikitai_counts_desc" selected="selected">イキタイ 多い順</option><option value="post_counts_desc">サ活 多い順</option><option value="sauna_rooms__temperature_desc">サウナ室 温度高い順</option><option value="sauna_rooms__temperature_asc">サウナ室 温度低い順</option><option value="water_baths__temperature_desc">水風呂 温度高い順</option><option value="water_baths__temperature_asc">水風呂 温度低い順</option><option value="min_fee_desc">入浴料 高い順</option><option value="min_fee_asc">入浴料 低い順</option><option value="created_at_desc">新しく登録された順</option><option value="created_at_asc">古く登録された順</option><option value="updated_at_desc">新しく更新された順</option><option value="updated_at_asc">古く更新された順</option></select>
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

<?php
// get_sidebar();
get_footer();
