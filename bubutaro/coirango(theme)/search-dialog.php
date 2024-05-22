<?php 
function search_form() {
?>
<div class="modal">
	<div class="modal-overlay modal-toggle"></div>
	<div class="modal-wrapper modal-transition">
		<div class="modal-header">
			<button class="modal-close modal-toggle"><a><i class="fas fa-close"></i></a></button>
			<h2 class="modal-heading">都道府県から探す</h2>
		</div>
		<div class="modal-content">
<table class="c-formTable">
    <tbody>
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
			<tr>
				<th class="c-formTable_th"><?php echo $provinces[$i]; ?></th>
				<td class="c-formTable_td">	
<?php 
		for($j=0;$j<count($provinces_subs[$i]);$j++):
?>

				
					<div class="c-formCheckbox">
						<input class="area-chk" id="<?php echo $provinces_subs[$i][$j]; ?>" name="<?php echo $provinces_subs[$i][$j]; ?>" type="checkbox" data-province="<?php echo $provinces_subs[$i][$j]; ?>">
						<label for="<?php echo $provinces_subs[$i][$j]; ?>"><?php echo $provinces_subs[$i][$j]; ?></label>
					</div>
				
<?php
		endfor;?>
				</td>
        	</tr>
<?php
	endfor;
?>
	</tbody>
</table>
		</div>
    <div class="modal-action">
        <a class="c-btn c-btn_primary lsearch-btn" onclick="$('#search-form').submit(); return false">
          <i class="fas fa-search"></i>
          検索
        </a>
      </div>
	</div>
</div>


<div class="modal1">
	<div class="modal-overlay modal-toggle1"></div>
	<div class="modal-wrapper modal-transition">
		<div class="modal-header">
			<button class="modal-close modal-toggle1"><a><i class="fas fa-close"></i></a></button>
			<h2 class="modal-heading">特徴から探す</h2>
		</div>
		<div class="modal-content">
<table class="c-formTable">
    <tbody>
<?php 
	$provinces = array('メイン情報','その他設備',);
	$provinces_subs = array(
		array('洗濯機','洗濯乾燥機','乾燥機','シューズランドリー','ふとん乾燥機','ふとん洗濯乾燥機','自販機','両替機','監視カメラ','駐車場','トイレ','自動ドア'),
		array('２４ｈ営業', 'フリーwifi', 'テレビ', 'ラジオ', 'ＢＧＭ'),
	);
	for($i=0;$i<count($provinces);$i++):
?>
			<tr>
				<th class="c-formTable_th"><?php echo $provinces[$i]; ?></th>
				<td class="c-formTable_td">	
<?php 
		for($j=0;$j<count($provinces_subs[$i]);$j++):
?>
					<div class="c-formCheckbox">
						<input class="area-chk" id="<?php echo $provinces_subs[$i][$j]; ?>" name="<?php echo $i.$j; ?>" type="checkbox" data-cond="<?php echo $provinces_subs[$i][$j]; ?>">
						<label for="<?php echo $provinces_subs[$i][$j]; ?>"><?php echo $provinces_subs[$i][$j]; ?></label>
					</div>
				
<?php
		endfor;?>
				</td>
        	</tr>
<?php
	endfor;
?>
	</tbody>
</table>
		</div>
    <div class="modal-action">
        <a class="c-btn c-btn_primary lsearch-btn" onclick="$('#search-form').submit(); return false">
          <i class="fas fa-search"></i>
          検索
        </a>
      </div>
	</div>
</div>

<?php
}
?>