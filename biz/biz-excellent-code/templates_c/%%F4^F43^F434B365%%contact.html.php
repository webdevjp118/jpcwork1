<?php /* Smarty version 2.6.22, created on 2021-10-25 17:21:51
         compiled from contact.html */ ?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="robots" content="index,follow,noarchive" />
<meta name="description" content="保育bizの採用担当者様に関するページです">
<meta name="keywords" content="採用担当者様へ,保育士,保育園,幼稚園求人,転職,保育biz">
<meta name="format-detection" content="telephone=no">
<title>採用担当者様へ｜保育biz</title>

<link rel="contents" href="/sitemap.xml" />

<!-- Mobile Specific
 ================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

<!-- CSS
 ================================================== -->
<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['top']; ?>
common/css/import.css">

<!-- Font Awesome
 ================================================== -->
<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

<!-- google font
 ================================================== -->
<link href="https://fonts.googleapis.com/earlyaccess/notosansjp.css" rel="stylesheet">

<!-- Java Script
 ================================================== -->
<script src="<?php echo $this->_tpl_vars['top']; ?>
common/js/jquery.min.js"></script>
<script src="<?php echo $this->_tpl_vars['top']; ?>
common/js/custom.js"></script>
<script src="<?php echo $this->_tpl_vars['top']; ?>
common/js/css_browser_selector.js"></script>

<!-- remodal
 ================================================== -->
<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['top']; ?>
common/remodal/remodal.css">
<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['top']; ?>
common/remodal/remodal-default-theme.css">
<script src="<?php echo $this->_tpl_vars['top']; ?>
common/remodal/remodal.js"></script>

<!--住所自動入力-->
<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
<!--住所自動入力-->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/analytics.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
</head>


<body>
<div id="wrapper" class="bg_gray">

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<!-- メインイメージ開始 -->
	<aside class="subpage_title contact">
		<div class="mywidth flex column flex-center flex-middle">
			<h1 class="lh18 tx-center my-font02">採用担当者様へ</h1>
			<div class="subpage_title_eng">Contact</div>
		</div>
	</aside>
	<!-- メインイメージ終了 -->

	<!--パンくず開始-->
	<div id="topics" class="clearfix pc-only">
		<ol class="clearfix">
			<li><a href="/">TOP</a>&nbsp;&gt;&nbsp;</li>
			<li>採用担当者様へ</li>
		</ol>
	</div>
	<!--パンくず終了-->
	
	<!--コンテンツ開始-->
	<div id="content" class="clearfix">
		<!-- お問い合わせ開始 -->
		<div class="content_wrap mb20 clearfix" id="contact_form">
				
			<div class="contact_form clearfix">

<form name="form1" action="contact.html" method="post">
<input type="hidden" name="mode" value="form">
					<table class="form" cellspacing="0" summary="お問い合わせフォーム">
						<tr>
							<th>お問い合わせ種別<em class="hissu">必須</em></th>
							<td>
								<div class="">
									<select name="kind">
										<option value="">--選択してください--</option>
										<option value="1" <?php if ($this->_tpl_vars['form']['kind'] == 1): ?>selected="selected"<?php endif; ?>>資料請求について</option>
										<option value="2" <?php if ($this->_tpl_vars['form']['kind'] == 2): ?>selected="selected"<?php endif; ?>>求人掲載について</option>
										<option value="3" <?php if ($this->_tpl_vars['form']['kind'] == 3): ?>selected="selected"<?php endif; ?>>お問い合わせ</option>
										<option value="4" <?php if ($this->_tpl_vars['form']['kind'] == 4): ?>selected="selected"<?php endif; ?>>その他</option>
									</select>
								</div>
<?php if ($this->_tpl_vars['msg']['kind']): ?>
								<div class="error"><?php echo $this->_tpl_vars['msg']['kind']; ?>
</div>
<?php endif; ?>
							</td>
						</tr>
						<tr>
							<th>事業所名<em class="hissu">必須</em></th>
							<td>
								<input class="txt_w30p" type="text" name="name" value="<?php echo $this->_tpl_vars['form']['name']; ?>
" />
								<span class="note ml10 sp-ml0 lh28 sp-lh18">例：株式会社タキザワキャリア</span>
<?php if ($this->_tpl_vars['msg']['name']): ?>
								<div class="error"><?php echo $this->_tpl_vars['msg']['name']; ?>
</div>
<?php endif; ?>
							</td>
						</tr>
						<tr>
							<th>ご担当者名<em class="hissu">必須</em></th>
							<td>
								<input class="txt_w30p" type="text" name="name_kana" value="<?php echo $this->_tpl_vars['form']['name_kana']; ?>
" />
								<span class="note ml10 sp-ml0 lh28 sp-lh18">例：保育 花子</span>
<?php if ($this->_tpl_vars['msg']['name_kana']): ?>
								<div class="error"><?php echo $this->_tpl_vars['msg']['name_kana']; ?>
</div>
<?php endif; ?>
							</td>
						</tr>
						<tr>
							<th>電話番号<em class="hissu">必須</em></th>
							<td>
								<input class="txt_w30p" type="tel" name="tel" value="<?php echo $this->_tpl_vars['form']['tel']; ?>
" />
								<span class="note lh28 sp-lh18">※半角数字で入力してください</span>
<?php if ($this->_tpl_vars['msg']['tel']): ?>
								<div class="error mt10"><?php echo $this->_tpl_vars['msg']['tel']; ?>
</div>
<?php endif; ?>
							</td>
						</tr>
						<tr>
							<th>メールアドレス<em class="hissu">必須</em></th>
							<td>
								<input class="txt_w30p" type="email" name="email" value="<?php echo $this->_tpl_vars['form']['email']; ?>
" />
								<span class="note lh28 sp-lh18">※半角英数字で入力してください</span>
<?php if ($this->_tpl_vars['msg']['email']): ?>
								<div class="error"><?php echo $this->_tpl_vars['msg']['email']; ?>
</div>
<?php endif; ?>
							</td>
						</tr>
						<tr>
							<th>住所</th>
							<td>
								<dl class="dl_01">
									<dt>郵便番号</dt>
									<dd>
										<input class="txt_w11p" type="number" name="zip1" value="<?php echo $this->_tpl_vars['form']['zip1']; ?>
" />
										<span class="haihun">-</span>
										<input class="txt_w11p" type="number" name="zip2" value="<?php echo $this->_tpl_vars['form']['zip2']; ?>
" onKeyUp="AjaxZip3.zip2addr('zip1','zip2','pref','city','address1');" />
									</dd>
								</dl>
								<dl class="dl_01">
									<dt>都道府県</dt>
									<dd>
										<select name="pref">
											<option value="">都道府県を選択して下さい</option>
								<option value="1" <?php if ($this->_tpl_vars['form']['pref'] == 1): ?>selected="selected"<?php endif; ?>>北海道</option>
								<option value="2" <?php if ($this->_tpl_vars['form']['pref'] == 2): ?>selected="selected"<?php endif; ?>>青森県</option>
								<option value="3" <?php if ($this->_tpl_vars['form']['pref'] == 3): ?>selected="selected"<?php endif; ?>>岩手県</option>
								<option value="4" <?php if ($this->_tpl_vars['form']['pref'] == 4): ?>selected="selected"<?php endif; ?>>宮城県</option>
								<option value="5" <?php if ($this->_tpl_vars['form']['pref'] == 5): ?>selected="selected"<?php endif; ?>>秋田県</option>
								<option value="6" <?php if ($this->_tpl_vars['form']['pref'] == 6): ?>selected="selected"<?php endif; ?>>山形県</option>
								<option value="7" <?php if ($this->_tpl_vars['form']['pref'] == 7): ?>selected="selected"<?php endif; ?>>福島県</option>
								<option value="8" <?php if ($this->_tpl_vars['form']['pref'] == 8): ?>selected="selected"<?php endif; ?>>茨城県</option>
								<option value="9" <?php if ($this->_tpl_vars['form']['pref'] == 9): ?>selected="selected"<?php endif; ?>>栃木県</option>
								<option value="10" <?php if ($this->_tpl_vars['form']['pref'] == 10): ?>selected="selected"<?php endif; ?>>群馬県</option>
								<option value="11" <?php if ($this->_tpl_vars['form']['pref'] == 11): ?>selected="selected"<?php endif; ?>>埼玉県</option>
								<option value="12" <?php if ($this->_tpl_vars['form']['pref'] == 12): ?>selected="selected"<?php endif; ?>>千葉県</option>
								<option value="13" <?php if ($this->_tpl_vars['form']['pref'] == 13): ?>selected="selected"<?php endif; ?>>東京都</option>
								<option value="14" <?php if ($this->_tpl_vars['form']['pref'] == 14): ?>selected="selected"<?php endif; ?>>神奈川県</option>
								<option value="15" <?php if ($this->_tpl_vars['form']['pref'] == 15): ?>selected="selected"<?php endif; ?>>新潟県</option>
								<option value="16" <?php if ($this->_tpl_vars['form']['pref'] == 16): ?>selected="selected"<?php endif; ?>>富山県</option>
								<option value="17" <?php if ($this->_tpl_vars['form']['pref'] == 17): ?>selected="selected"<?php endif; ?>>石川県</option>
								<option value="18" <?php if ($this->_tpl_vars['form']['pref'] == 18): ?>selected="selected"<?php endif; ?>>福井県</option>
								<option value="19" <?php if ($this->_tpl_vars['form']['pref'] == 19): ?>selected="selected"<?php endif; ?>>山梨県</option>
								<option value="20" <?php if ($this->_tpl_vars['form']['pref'] == 20): ?>selected="selected"<?php endif; ?>>長野県</option>
								<option value="21" <?php if ($this->_tpl_vars['form']['pref'] == 21): ?>selected="selected"<?php endif; ?>>岐阜県</option>
								<option value="22" <?php if ($this->_tpl_vars['form']['pref'] == 22): ?>selected="selected"<?php endif; ?>>静岡県</option>
								<option value="23" <?php if ($this->_tpl_vars['form']['pref'] == 23): ?>selected="selected"<?php endif; ?>>愛知県</option>
								<option value="24" <?php if ($this->_tpl_vars['form']['pref'] == 24): ?>selected="selected"<?php endif; ?>>三重県</option>
								<option value="25" <?php if ($this->_tpl_vars['form']['pref'] == 25): ?>selected="selected"<?php endif; ?>>滋賀県</option>
								<option value="26" <?php if ($this->_tpl_vars['form']['pref'] == 26): ?>selected="selected"<?php endif; ?>>京都府</option>
								<option value="27" <?php if ($this->_tpl_vars['form']['pref'] == 27): ?>selected="selected"<?php endif; ?>>大阪府</option>
								<option value="28" <?php if ($this->_tpl_vars['form']['pref'] == 28): ?>selected="selected"<?php endif; ?>>兵庫県</option>
								<option value="29" <?php if ($this->_tpl_vars['form']['pref'] == 29): ?>selected="selected"<?php endif; ?>>奈良県</option>
								<option value="30" <?php if ($this->_tpl_vars['form']['pref'] == 30): ?>selected="selected"<?php endif; ?>>和歌山県</option>
								<option value="31" <?php if ($this->_tpl_vars['form']['pref'] == 31): ?>selected="selected"<?php endif; ?>>鳥取県</option>
								<option value="32" <?php if ($this->_tpl_vars['form']['pref'] == 32): ?>selected="selected"<?php endif; ?>>島根県</option>
								<option value="33" <?php if ($this->_tpl_vars['form']['pref'] == 33): ?>selected="selected"<?php endif; ?>>岡山県</option>
								<option value="34" <?php if ($this->_tpl_vars['form']['pref'] == 34): ?>selected="selected"<?php endif; ?>>広島県</option>
								<option value="35" <?php if ($this->_tpl_vars['form']['pref'] == 35): ?>selected="selected"<?php endif; ?>>山口県</option>
								<option value="36" <?php if ($this->_tpl_vars['form']['pref'] == 36): ?>selected="selected"<?php endif; ?>>徳島県</option>
								<option value="37" <?php if ($this->_tpl_vars['form']['pref'] == 37): ?>selected="selected"<?php endif; ?>>香川県</option>
								<option value="38" <?php if ($this->_tpl_vars['form']['pref'] == 38): ?>selected="selected"<?php endif; ?>>愛媛県</option>
								<option value="39" <?php if ($this->_tpl_vars['form']['pref'] == 39): ?>selected="selected"<?php endif; ?>>高知県</option>
								<option value="40" <?php if ($this->_tpl_vars['form']['pref'] == 40): ?>selected="selected"<?php endif; ?>>福岡県</option>
								<option value="41" <?php if ($this->_tpl_vars['form']['pref'] == 41): ?>selected="selected"<?php endif; ?>>佐賀県</option>
								<option value="42" <?php if ($this->_tpl_vars['form']['pref'] == 42): ?>selected="selected"<?php endif; ?>>長崎県</option>
								<option value="43" <?php if ($this->_tpl_vars['form']['pref'] == 43): ?>selected="selected"<?php endif; ?>>熊本県</option>
								<option value="44" <?php if ($this->_tpl_vars['form']['pref'] == 44): ?>selected="selected"<?php endif; ?>>大分県</option>
								<option value="45" <?php if ($this->_tpl_vars['form']['pref'] == 45): ?>selected="selected"<?php endif; ?>>宮崎県</option>
								<option value="46" <?php if ($this->_tpl_vars['form']['pref'] == 46): ?>selected="selected"<?php endif; ?>>鹿児島県</option>
								<option value="47" <?php if ($this->_tpl_vars['form']['pref'] == 47): ?>selected="selected"<?php endif; ?>>沖縄県</option>
										</select>
									</dd>
								</dl>
								<dl class="dl_01">
									<dt>市区町村</dt>
									<dd>
										<input class="txt_w47p" type="text" name="city" value="<?php echo $this->_tpl_vars['form']['city']; ?>
" />
										<span class="note">例：○○市○○町</span>
									</dd>
								</dl>
								<dl class="dl_01">
									<dt>番地まで</dt>
									<dd>
										<input class="txt_w47p" type="text" name="address1" value="<?php echo $this->_tpl_vars['form']['address1']; ?>
" />
										<span class="note">例：○○通　1-2-3</span>
									</dd>
								</dl>
								<dl class="dl_01">
									<dt>建物名･階数</dt>
									<dd>
										<input class="txt_w47p" type="text" name="address2" value="<?php echo $this->_tpl_vars['form']['address2']; ?>
" />
										<span class="note">例：○○マンション　1-A</span>
									</dd>
								</dl>
<?php if ($this->_tpl_vars['msg']['zip1']): ?>
								<div class="error"><?php echo $this->_tpl_vars['msg']['zip1']; ?>
</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['msg']['zip2']): ?>
								<div class="error"><?php echo $this->_tpl_vars['msg']['zip2']; ?>
</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['msg']['pref']): ?>
								<div class="error"><?php echo $this->_tpl_vars['msg']['pref']; ?>
</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['msg']['city']): ?>
								<div class="error"><?php echo $this->_tpl_vars['msg']['city']; ?>
</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['msg']['address1']): ?>
								<div class="error"><?php echo $this->_tpl_vars['msg']['address1']; ?>
</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['msg']['address2']): ?>
								<div class="error"><?php echo $this->_tpl_vars['msg']['address2']; ?>
</div>
<?php endif; ?>
							</td>
						</tr>
						
						<tr>
							<th>お問い合わせ内容</th>
							<td>
								<textarea class="textarea_w96p" name="contents"><?php echo $this->_tpl_vars['form']['contents']; ?>
</textarea>
<?php if ($this->_tpl_vars['msg']['contents']): ?>
								<div class="error"><?php echo $this->_tpl_vars['msg']['contents']; ?>
</div>
<?php endif; ?>
							</td>
						</tr>

<!--
						<tr>
							<th><span class="fl">利用規約</span>
								<em class="hissu">必須</em></th>
							<td>
							<p class="mb05"><a href="kiyaku.html">利用規約</a>に</p>
								<ul class="list_01">
									<li><label><input type="radio" name="confirm" value="1" <?php if ($this->_tpl_vars['form']['confirm'] == 1): ?>checked="checked"<?php endif; ?> />&nbsp;同意する</label></li>
									<li><label><input type="radio" name="confirm" value="2" <?php if ($this->_tpl_vars['form']['confirm'] == 2): ?>checked="checked"<?php endif; ?> />&nbsp;同意しない</label></li>
								</ul>
<?php if ($this->_tpl_vars['msg']['confirm']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['confirm']; ?>
</li>
								</ul>
<?php endif; ?>
							</td>
						</tr>
-->
					</table>

					<dl class="kiyaku">
						<dt>ご利用規約</dt>
						<dd>
							<div class="wrap">
<div class="tx-bold">保育bizのサービス内容</div>
<p class="mb20">保育bizに掲載された情報は取材時または掲載開始時の情報を表示しております。
検索結果として表示される情報の正確さ、信頼性、完全性、合法性、道徳性、著作権の許諾などについて保育bizは一切の責任を負いません。</p>

<div class="tx-bold">利用規約の範囲</div>
<p class="mb20">保育bizの利用者は保育bizの利用に関して適用される、以下の利用規約を承認するものとします。</p>

<div class="tx-bold">利用規約の変更</div>
<p class="mb20">本利用規約は如何なる理由でも通知なしに変更する場合があります。</p>

<div class="tx-bold">サービスの変更・停止</div>
<p class="mb20">当社は、当サイトの全てまたは一部のサービスをいつでも、変更または停止することができるものとします。サービス変更・停止の際、当社はできうる限りの方法で、利用者に対してその旨を事前に告知するものとします。但し、天災などやむを得ぬ場合は事前に告知することなく、サービスを変更・停止できるものとします。 サービスの変更または停止に伴い、利用者に損害が発生した場合、当社は一切の責任を負わないものとします。</p>

<div class="tx-bold">責任の制約</div>
<p class="mb20">如何なる状況においても当社は、第三者を介したものも含め、本ソフトウェアまたはサービスの利用者による使用または誤用に対する責任を一切負いません。この責任の制約は、当社が、そのような損害の可能性について通告されていた場合であっても、それが保証、契約、故意または無意識による不法行為、その他に基づいているかどうかによらず、直接、間接、付随、結果的、特殊、懲戒的および懲罰的損害賠償を回避するために適用されます。この責任の制約は、損害が、第三者を介したものも含め、本ソフトウェアまたはサービスの使用または誤用および依存の結果であるか、本ソフトウェアまたはサービスを使用できないためか、本ソフトウェアまたはサービスの中断、一時停止、終了のいずれかの結果かにかかわらず、適用されます。この責任の制約は、権利侵害の防止方法による本質的目的の不履行にかかわらず法律で許容された最大の範囲で適用されます。</p>


<div class="tx-bold">禁止事項</div>
<p>利用者は、保育bizにおいて以下の行為をすることはできません。</p>
<ul class="mb20">
	<li>・虚偽の情報を登録し、提供する行為</li>
	<li>・第三者の著作権、商標権、プライバシー権、肖像権等すべての法的権利を侵害する行為</li>
	<li>・犯罪的行為に結びつく行為</li>
	<li>・公序良俗に反する行為</li>
	<li>・反社会的活動に関する行為</li>
	<li>・法令、公序良俗に反する行為、またはそのおそれのある行為</li>
	<li>・保育bizで得た情報を利用しての営利を目的とした情報提供等の行為</li>
	<li>・保育bizの運営の妨げとなる一切の行為</li>
</ul>

<div class="tx-bold">検索結果の内容</div>
<p class="mb20">保育bizは、ホームページ内に掲載された求人情報を自動的に検索し、結果を作成しております。保育bizは、検索結果として表示される内容に関して、カテゴリ分類目的以外の内容確認をおこなっておりません。 検索結果として表示される情報の正確さ、信頼性、完全性、合法性、道徳性、著作権の許諾などについて保育bizは一切の責任を負いません。</p>


<div class="tx-bold">著作権</div>
<p class="mb20">保育bizのレイアウト、デザインおよび構造に関する著作権は株式会社タキザワキャリアに帰属します。保育bizのホームページや検索結果ページをWEBサイトで反映し、検索結果をリフォーマットして表示することは禁じられています。</p>

<div class="tx-bold">その他</div>
<p class="mb20">利用者のみなさまと保育bizの関係につきましては、日本国法が適用されるものとします。</p>
						
							</div><!--//.wrap-->
						</dd>
					</dl>
					<div class="btn_wrap">
					  <input type="submit" id="btn-submit"  class="button-submit opa" value="送信する" />
					</div>
</form>
			
			</div>
		</div>
		<!-- お問い合わせ終了 -->
	</div>
	<!--コンテンツ終了-->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer-contact.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

</div><!--div#wrapper:end-->
</body>
</html>