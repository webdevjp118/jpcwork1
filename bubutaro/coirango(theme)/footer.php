<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Coirango
 */

?>
<div class="gwanted-sec">
    <div class="wanted-div">
        <div class="c-container">
            <p class="wanted-bubble"><span>WANTED</span></p>
            <h2 class="wanted-title">未入力施設のランドリ情報募集中</h2>
            <div class="wanted-btn">
                <a href="" class="c-btn c-btn_green">情報募集施設を見る</a>
            </div>
        </div>
    </div>
</div>
<div class="gad-sec">
    <div class="c-container">
        <div class="banner-div">
            <ul class="banner-ul">
                <li class="banner-li">
                    <a href="/link/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sample-banner.jpg" width="680" height="240" alt=""></a>
                </li>
                <li class="banner-li">
                    <a href="/link/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sample-banner.jpg" width="680" height="240" alt=""></a>
                </li>
                <li class="banner-li">
                    <a href="/link/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sample-banner.jpg" width="680" height="240" alt=""></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<footer id="colophon" class="site-footer gfooter-sec">
<div class="c-container">
    <div class="gfooter-search">
		<div class="gmap_city cpc">
            <div class="title">都道府県からコイランを探す</div>
            <p class="map_img">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/map_box.svg" alt="全国の24時間営業のスーパー銭湯を探す" usemap="#Map" border="0">
        <map name="Map" id="Map">
<?php 
$area_coods = array(
  array( 'coods' => '588,-25,733,113', 'key'=>'北海道'),
  array( 'coods' => '589,129,691,168', 'key'=>'青森県'),
  array( 'coods' => '588,169,639,207', 'key'=>'秋田県'),
  array( 'coods' => '588,208,639,247', 'key'=>'山形県'),
  array( 'coods' => '641,169,691,206', 'key'=>'岩手県'),
  array( 'coods'=>'640,208,691,247', 'key' => '宮城県'),
  array( 'coods'=>'589,248,691,286', 'key' => '福島県'),
  array( 'coods'=>'640,287,691,325', 'key' => '栃木県'),
  array( 'coods'=>'589,287,639,326', 'key' => '群馬県'),
  array( 'coods'=>'641,326,691,365', 'key' => '茨城県'),
  array( 'coods'=>'589,327,639,364', 'key' => '埼玉県'),
  array( 'coods'=>'641,366,691,443', 'key' => '千葉県'),
  array( 'coods'=>'589,366,639,404', 'key' => '東京都'),
  array( 'coods'=>'588,405,639,443', 'key' => '神奈川県'),
  array( 'coods'=>'536,248,586,285', 'key' => '新潟県'),
  array( 'coods'=>'536,367,587,404', 'key' => '山梨県'),
  array( 'coods'=>'536,288,587,365', 'key' => '長野県'),
  array( 'coods'=>'431,247,482,286', 'key' => '石川県'),
  array( 'coods'=>'431,287,482,325', 'key' => '福井県'),
  array( 'coods'=>'431,327,482,365', 'key' => '滋賀県'),
  array( 'coods'=>'484,248,534,286', 'key' => '富山県'),
  array( 'coods'=>'536,405,587,444', 'key' => '静岡県'),
  array( 'coods'=>'484,288,534,365', 'key' => '岐阜県'),
  array( 'coods'=>'484,366,535,404', 'key' => '愛知県'),
  array( 'coods'=>'431,366,483,404', 'key' => '三重県'),
  array( 'coods'=>'380,327,430,365', 'key' => '京都府'),
  array( 'coods'=>'380,367,430,404', 'key' => '奈良県'),
  array( 'coods'=>'327,327,378,365', 'key' => '兵庫県'),
  array( 'coods'=>'327,366,378,404', 'key' => '大阪府'),
  array( 'coods'=>'327,404,430,442', 'key' => '和歌山県'),
  array( 'coods'=>'222,327,273,365', 'key' => '島根県'),
  array( 'coods'=>'222,366,273,404', 'key' => '広島県'),
  array( 'coods'=>'170,326,220,404', 'key' => '山口県'),
  array( 'coods'=>'275,366,326,405', 'key' => '岡山県'),
  array( 'coods'=>'216,418,266,457', 'key' => '愛媛県'),
  array( 'coods'=>'216,457,266,495', 'key' => '高知県'),
  array( 'coods'=>'267,417,318,456', 'key' => '香川県'),
  array( 'coods'=>'52,326,103,365', 'key' => '福岡県'),
  array( 'coods'=>'105,366,156,443', 'key' => '宮崎県'),
  array( 'coods'=>'104,326,155,365', 'key' => '大分県'),
  array( 'coods'=>'0,327,51,365', 'key' => '佐賀県'),
  array( 'coods'=>'52,366,104,404', 'key' => '熊本県'),
  array( 'coods'=>'-19,405,103,443', 'key' => '鹿児島県'),
  array( 'coods'=>'-20,366,51,404', 'key' => '長崎県'),
  array( 'coods'=>'-20,467,51,505', 'key' => '沖縄県'),
);
foreach($area_coods as $each) :
?>
          <area shape="rect" coords="<?php echo $each['coods']; ?>" href="<?php echo get_site_url().'/lsearch/?areakey='.$each['key']; ?>">
<?php endforeach; ?>
          <area shape="rect" coords="268,457,318,495" href="" alt="徳島県の24時間営業スーパー銭湯">
          <area shape="rect" coords="274,325,326,365" href="">
        </map>
        </p>
      </div>
    
      <div class="gfeature-search csp">
        <div class="title">都道府県からコイランを探す</div>
        <div class="content">
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
          <div>
            <div class="province"><?php echo $provinces[$i]; ?></div>
<?php 
		for($j=0;$j<count($provinces_subs[$i]);$j++):
?>
            <a><?php echo $provinces_subs[$i][$j]; ?></a>
<?php endfor; ?>
          </div>
<?php endfor; ?>
        </div>
      </div>

      <div class="gfeature-search">
        <div class="title">特徴からコイランを探す</div>
          <div class="content">
<?php
$cond_subs = array('洗濯機','洗濯乾燥機','乾燥機','シューズランドリー','ふとん乾燥機','ふとん洗濯乾燥機','自販機','両替機','監視カメラ','駐車場','トイレ','自動ドア','２４ｈ営業', 'フリーwifi', 'テレビ', 'ラジオ', 'ＢＧＭ');
foreach($cond_subs as $each) :
?>
            <a href="<?php echo get_site_url().'/lsearch/?condkey='.$each; ?>"><?php echo $each; ?></a>
<?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
		<div class="gfooter-bottom">
			<ul class="gfooter-menu-ul">
				<li class="gfooter-menu-li">
					<a href="<?php echo get_site_url(); ?>/about">コイランＧｏ！とは？</a>
				</li>
				<li class="gfooter-menu-li">
					<a href="<?php echo get_site_url(); ?>/activities">お洗活</a>
				</li>
				<li class="gfooter-menu-li">
					<a href="<?php echo get_site_url(); ?>/magazines">コイラン裏テク</a>
				</li>
				<li class="gfooter-menu-li">
					<a href="<?php echo get_site_url(); ?>/laundry-edit">コインランドリー店舗登録</a>
				</li>
				<li class="gfooter-menu-li">
					<a href="">ネットイベント会場</a>
				</li>
			</ul>
			<p class="copyright">© 2021コイラン Go! All Rights Reserved</p>
	</div>
</footer>
	
</div><!-- #page -->

<?php wp_footer(); ?>
<!-- <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.min.js"></script> -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-1.12.4.min.js"><\/script>')</script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>	
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/custom.js"></script>
</body>
</html>
