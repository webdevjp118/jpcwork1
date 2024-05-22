<?php /* Smarty version 2.6.22, created on 2021-10-27 20:47:22
         compiled from detail-contact.html */ ?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="robots" content="index,follow,noarchive" />
<meta name="description" content="コーディネーターに相談する<?php if ($this->_tpl_vars['info']['title']): ?>、<?php echo $this->_tpl_vars['info']['title']; ?>
<?php endif; ?>、エントリーページ">
<meta name="keywords" content="<?php if ($this->_tpl_vars['info']['title']): ?><?php echo $this->_tpl_vars['info']['title']; ?>
,<?php endif; ?>コーディネーターに相談する,保育士,保育園,幼稚園求人,転職,保育biz">
<meta name="format-detection" content="telephone=no">
<title>コーディネーターに相談する<?php if ($this->_tpl_vars['info']['title']): ?>｜<?php echo $this->_tpl_vars['info']['title']; ?>
<?php endif; ?>｜保育biz</title>

<?php if ($this->_tpl_vars['info']['status'] != '公開'): ?>
<meta name="robots" content="noindex,follow" />
<?php endif; ?>

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

<!-- detail-contactのフォームデータ管理 -->
<script type="text/javascript" src="<?php echo $this->_tpl_vars['top']; ?>
common/js/jquery-1.8.2.js"></script>

<!-- 郵便番号入力で住所自動入力 -->
<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>

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
	<aside class="subpage_title detail">
		<div class="mywidth flex column flex-center flex-middle">
			<h1 class="lh18 tx-center my-font02">コーディネーターに相談する</h1>
			<div class="subpage_title_eng">Entry</div>
		</div>
	</aside>
	<!-- メインイメージ終了 -->
	
	<!--パンくず開始-->
	<div id="topics" class="pc-only clearfix">
		<ol class="clearfix">
			<li><a href="<?php echo $this->_tpl_vars['top']; ?>
">TOP</a>&nbsp;&gt;&nbsp;</li>
<?php if ($this->_tpl_vars['info']): ?>
<?php if ($this->_tpl_vars['info']['kinmu_pref']): ?>
			<li><a href="<?php echo $this->_tpl_vars['top']; ?>
s/a<?php echo $this->_tpl_vars['info']['kinmu_area']; ?>
/t<?php echo $this->_tpl_vars['info']['kinmu_pref_v']; ?>
"><?php echo $this->_tpl_vars['info']['kinmu_pref']; ?>
</a>&nbsp;&gt;&nbsp;</li>
<?php endif; ?>
<?php if ($this->_tpl_vars['info']['kinmu_city']): ?>
			<li><a href="<?php echo $this->_tpl_vars['top']; ?>
s/a<?php echo $this->_tpl_vars['info']['kinmu_area']; ?>
/t<?php echo $this->_tpl_vars['info']['kinmu_pref_v']; ?>
/c<?php echo $this->_tpl_vars['info']['kinmu_city_v']; ?>
"><?php echo $this->_tpl_vars['info']['kinmu_city']; ?>
</a>&nbsp;&gt;&nbsp;</li>
<?php endif; ?>
			<li><a href="<?php echo $this->_tpl_vars['top']; ?>
detail/<?php echo $this->_tpl_vars['info']['item_id']; ?>
/"><?php echo $this->_tpl_vars['info']['title']; ?>
</a>&nbsp;&gt;&nbsp;</li>
<?php endif; ?>
<?php if ($this->_tpl_vars['form']['kind'] == 'kentou'): ?>
			<li><a href="kentou.html">検討リスト</a>&nbsp;&gt;&nbsp;</li>
<?php endif; ?>
			<li>コーディネーターに相談する</li>
		</ol>
	</div>
	<!--パンくず終了-->
	
	
	<!--コンテンツ開始-->
	<div id="content" class="clearfix">
		<!-- メインコンテンツ開始 -->
		<div id="main">
			<div class="content_wrap clearfix">

<?php if ($this->_tpl_vars['list']): ?><!--求人指定の場合-->
<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
				<div class="detail_contact_head mb20 clearfix">
<?php if ($this->_tpl_vars['item']['image']): ?>
					<a href="<?php echo $this->_tpl_vars['top']; ?>
detail/<?php echo $this->_tpl_vars['item']['item_id']; ?>
/" class="image opa"><img src="<?php echo $this->_tpl_vars['top']; ?>
img.php?id=<?php echo $this->_tpl_vars['item']['image']; ?>
" width="86" alt="<?php echo $this->_tpl_vars['item']['title']; ?>
" /></a>
<?php endif; ?>
					<div class="desc">
						<a href="<?php echo $this->_tpl_vars['top']; ?>
detail/<?php echo $this->_tpl_vars['item']['item_id']; ?>
/" class="tit opa"><?php echo $this->_tpl_vars['item']['title']; ?>
</a>
						<p class="info"><?php echo $this->_tpl_vars['item']['kinmu_pref']; ?>
<?php echo $this->_tpl_vars['item']['kinmu_city']; ?>
</p>
					</div>
				</div>
<?php endforeach; endif; unset($_from); ?>
				<p class="tx-center detail_text">▲上記の求人状況について問い合わせます▲</p>
<?php endif; ?><!--求人指定の場合-->

<?php if ($this->_tpl_vars['msg']): ?>
			<div class="error mb20">入力内容に不備があります。</div>
<?php endif; ?>
		
		
			<div class="detail_contact clearfix">
				<div class="contact_form">
<form name="form1" action="<?php echo $this->_tpl_vars['top']; ?>
detail-contact.html" method="post">
<input type="hidden" name="mode" value="form">
<input type="hidden" name="kind" value="<?php echo $this->_tpl_vars['form']['kind']; ?>
">
<?php $_from = $this->_tpl_vars['form']['item_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<input type="hidden" name="item_list[]" value="<?php echo $this->_tpl_vars['item']; ?>
">
<?php endforeach; endif; unset($_from); ?>
					<table class="form mb15" cellspacing="0" summary="お問い合わせフォーム">
						<tr>
							<th>氏名<em class="hissu">必須</em></th>
							<td>
								<div class="clearfix">
									<input class="txt_w30p fl" type="text" name="name" value="<?php echo $this->_tpl_vars['form']['name']; ?>
" />
									<p class="note ml10 sp-ml0 fl lh24 sp-lh18">&nbsp;例：保育 花子</p>
								</div>
<?php if ($this->_tpl_vars['msg']['name']): ?>
								<div class="error"><?php echo $this->_tpl_vars['msg']['name']; ?>
</div>
<?php endif; ?>
							</td>
						</tr>
						<tr>
							<th>カナ<em class="hissu">必須</em></th>
							<td>
								<div class="clearfix">
									<input class="txt_w30p fl" type="text" name="name_kana" value="<?php echo $this->_tpl_vars['form']['name_kana']; ?>
" />
									<p class="note ml10 sp-ml0 fl lh24 sp-lh18">&nbsp;例：ホイク ハナコ</p>
								</div>
<?php if ($this->_tpl_vars['msg']['name_kana']): ?>
								<div class="error"><?php echo $this->_tpl_vars['msg']['name_kana']; ?>
</div>
<?php endif; ?>
							</td>
						</tr>
						
						
						<tr>
					<th>性別<em class="hissu">必須</em></th>
							<td>
								<ul class="list_01">
									<li><label><input type="radio" name="radio01" value="1" <?php if ($this->_tpl_vars['form']['radio01'] == 1): ?>checked="checked"<?php endif; ?> />&nbsp;男性</label></li>
									<li><label><input type="radio" name="radio01" value="2" <?php if ($this->_tpl_vars['form']['radio01'] == 2): ?>checked="checked"<?php endif; ?> />&nbsp;女性</label></li>
								</ul>
<?php if ($this->_tpl_vars['msg']['radio01']): ?>
								<div class="error"><?php echo $this->_tpl_vars['msg']['radio01']; ?>
</div>
<?php endif; ?>
							</td>
				</tr>
						
						
				
						<tr>
							<th>生年月日<em class="hissu">必須</em></th>
							<td>
								<div class="fl mr05">
									<select name="birthday_year">
										<option value="">----</option>
										<option value="1940" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1940): ?>selected="selected"<?php endif; ?>>1940</option>
										<option value="1941" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1941): ?>selected="selected"<?php endif; ?>>1941</option>
										<option value="1942" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1942): ?>selected="selected"<?php endif; ?>>1942</option>
										<option value="1943" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1943): ?>selected="selected"<?php endif; ?>>1943</option>
										<option value="1944" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1944): ?>selected="selected"<?php endif; ?>>1944</option>
										<option value="1945" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1945): ?>selected="selected"<?php endif; ?>>1945</option>
										<option value="1946" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1946): ?>selected="selected"<?php endif; ?>>1946</option>
										<option value="1947" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1947): ?>selected="selected"<?php endif; ?>>1947</option>
										<option value="1948" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1948): ?>selected="selected"<?php endif; ?>>1948</option>
										<option value="1949" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1949): ?>selected="selected"<?php endif; ?>>1949</option>
										<option value="1950" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1950): ?>selected="selected"<?php endif; ?>>1950</option>
										<option value="1951" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1951): ?>selected="selected"<?php endif; ?>>1951</option>
										<option value="1952" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1952): ?>selected="selected"<?php endif; ?>>1952</option>
										<option value="1953" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1953): ?>selected="selected"<?php endif; ?>>1953</option>
										<option value="1954" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1954): ?>selected="selected"<?php endif; ?>>1954</option>
										<option value="1955" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1955): ?>selected="selected"<?php endif; ?>>1955</option>
										<option value="1956" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1956): ?>selected="selected"<?php endif; ?>>1956</option>
										<option value="1957" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1957): ?>selected="selected"<?php endif; ?>>1957</option>
										<option value="1958" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1958): ?>selected="selected"<?php endif; ?>>1958</option>
										<option value="1959" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1959): ?>selected="selected"<?php endif; ?>>1959</option>
										<option value="1960" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1960): ?>selected="selected"<?php endif; ?>>1960</option>
										<option value="1961" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1961): ?>selected="selected"<?php endif; ?>>1961</option>
										<option value="1962" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1962): ?>selected="selected"<?php endif; ?>>1962</option>
										<option value="1963" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1963): ?>selected="selected"<?php endif; ?>>1963</option>
										<option value="1964" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1964): ?>selected="selected"<?php endif; ?>>1964</option>
										<option value="1965" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1965): ?>selected="selected"<?php endif; ?>>1965</option>
										<option value="1966" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1966): ?>selected="selected"<?php endif; ?>>1966</option>
										<option value="1967" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1967): ?>selected="selected"<?php endif; ?>>1967</option>
										<option value="1968" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1968): ?>selected="selected"<?php endif; ?>>1968</option>
										<option value="1969" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1969): ?>selected="selected"<?php endif; ?>>1969</option>
										<option value="1970" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1970): ?>selected="selected"<?php endif; ?>>1970</option>
										<option value="1971" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1971): ?>selected="selected"<?php endif; ?>>1971</option>
										<option value="1972" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1972): ?>selected="selected"<?php endif; ?>>1972</option>
										<option value="1973" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1973): ?>selected="selected"<?php endif; ?>>1973</option>
										<option value="1974" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1974): ?>selected="selected"<?php endif; ?>>1974</option>
										<option value="1975" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1975): ?>selected="selected"<?php endif; ?>>1975</option>
										<option value="1976" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1976): ?>selected="selected"<?php endif; ?>>1976</option>
										<option value="1977" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1977): ?>selected="selected"<?php endif; ?>>1977</option>
										<option value="1978" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1978): ?>selected="selected"<?php endif; ?>>1978</option>
										<option value="1979" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1979): ?>selected="selected"<?php endif; ?>>1979</option>
										<option value="1980" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1980): ?>selected="selected"<?php endif; ?>>1980</option>
										<option value="1981" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1981): ?>selected="selected"<?php endif; ?>>1981</option>
										<option value="1982" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1982): ?>selected="selected"<?php endif; ?>>1982</option>
										<option value="1983" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1983): ?>selected="selected"<?php endif; ?>>1983</option>
										<option value="1984" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1984): ?>selected="selected"<?php endif; ?>>1984</option>
										<option value="1985" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1985): ?>selected="selected"<?php endif; ?>>1985</option>
										<option value="1986" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1986): ?>selected="selected"<?php endif; ?>>1986</option>
										<option value="1987" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1987): ?>selected="selected"<?php endif; ?>>1987</option>
										<option value="1988" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1988): ?>selected="selected"<?php endif; ?>>1988</option>
										<option value="1989" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1989): ?>selected="selected"<?php endif; ?>>1989</option>
										<option value="1990" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1990): ?>selected="selected"<?php endif; ?>>1990</option>
										<option value="1991" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1991): ?>selected="selected"<?php endif; ?>>1991</option>
										<option value="1992" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1992): ?>selected="selected"<?php endif; ?>>1992</option>
										<option value="1993" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1993): ?>selected="selected"<?php endif; ?>>1993</option>
										<option value="1994" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1994): ?>selected="selected"<?php endif; ?>>1994</option>
										<option value="1995" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1995): ?>selected="selected"<?php endif; ?>>1995</option>
										<option value="1996" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1996): ?>selected="selected"<?php endif; ?>>1996</option>
										<option value="1997" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1997): ?>selected="selected"<?php endif; ?>>1997</option>
										<option value="1998" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1998): ?>selected="selected"<?php endif; ?>>1998</option>
										<option value="1999" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1999): ?>selected="selected"<?php endif; ?>>1999</option>
										<option value="2000" <?php if ($this->_tpl_vars['form']['birthday_year'] == 2000): ?>selected="selected"<?php endif; ?>>2000</option>
										<option value="2001" <?php if ($this->_tpl_vars['form']['birthday_year'] == 2001): ?>selected="selected"<?php endif; ?>>2001</option>
										<option value="2002" <?php if ($this->_tpl_vars['form']['birthday_year'] == 2002): ?>selected="selected"<?php endif; ?>>2002</option>
										<option value="2003" <?php if ($this->_tpl_vars['form']['birthday_year'] == 2003): ?>selected="selected"<?php endif; ?>>2003</option>
										<option value="2004" <?php if ($this->_tpl_vars['form']['birthday_year'] == 2004): ?>selected="selected"<?php endif; ?>>2004</option>
										<option value="2005" <?php if ($this->_tpl_vars['form']['birthday_year'] == 2005): ?>selected="selected"<?php endif; ?>>2005</option>
										<option value="2006" <?php if ($this->_tpl_vars['form']['birthday_year'] == 2006): ?>selected="selected"<?php endif; ?>>2006</option>
										<option value="2007" <?php if ($this->_tpl_vars['form']['birthday_year'] == 2007): ?>selected="selected"<?php endif; ?>>2007</option>
										<option value="2008" <?php if ($this->_tpl_vars['form']['birthday_year'] == 2008): ?>selected="selected"<?php endif; ?>>2008</option>
										<option value="2009" <?php if ($this->_tpl_vars['form']['birthday_year'] == 2009): ?>selected="selected"<?php endif; ?>>2009</option>
										<option value="2010" <?php if ($this->_tpl_vars['form']['birthday_year'] == 2010): ?>selected="selected"<?php endif; ?>>2010</option>
										<option value="2011" <?php if ($this->_tpl_vars['form']['birthday_year'] == 2011): ?>selected="selected"<?php endif; ?>>2011</option>
										<option value="2012" <?php if ($this->_tpl_vars['form']['birthday_year'] == 2012): ?>selected="selected"<?php endif; ?>>2012</option>
										<option value="2013" <?php if ($this->_tpl_vars['form']['birthday_year'] == 2013): ?>selected="selected"<?php endif; ?>>2013</option>
										<option value="2014" <?php if ($this->_tpl_vars['form']['birthday_year'] == 2014): ?>selected="selected"<?php endif; ?>>2014</option>
									</select>
								</div>
								<p class="fl lh28 mr05 ml05">&nbsp;年&nbsp;</p>
								<div class="fl">
									<select name="birthday_month">
										<option value="">--</option>
										<option value="1" <?php if ($this->_tpl_vars['form']['birthday_month'] == 1): ?>selected="selected"<?php endif; ?>>1</option>
										<option value="2" <?php if ($this->_tpl_vars['form']['birthday_month'] == 2): ?>selected="selected"<?php endif; ?>>2</option>
										<option value="3" <?php if ($this->_tpl_vars['form']['birthday_month'] == 3): ?>selected="selected"<?php endif; ?>>3</option>
										<option value="4" <?php if ($this->_tpl_vars['form']['birthday_month'] == 4): ?>selected="selected"<?php endif; ?>>4</option>
										<option value="5" <?php if ($this->_tpl_vars['form']['birthday_month'] == 5): ?>selected="selected"<?php endif; ?>>5</option>
										<option value="6" <?php if ($this->_tpl_vars['form']['birthday_month'] == 6): ?>selected="selected"<?php endif; ?>>6</option>
										<option value="7" <?php if ($this->_tpl_vars['form']['birthday_month'] == 7): ?>selected="selected"<?php endif; ?>>7</option>
										<option value="8" <?php if ($this->_tpl_vars['form']['birthday_month'] == 8): ?>selected="selected"<?php endif; ?>>8</option>
										<option value="9" <?php if ($this->_tpl_vars['form']['birthday_month'] == 9): ?>selected="selected"<?php endif; ?>>9</option>
										<option value="10" <?php if ($this->_tpl_vars['form']['birthday_month'] == 10): ?>selected="selected"<?php endif; ?>>10</option>
										<option value="11" <?php if ($this->_tpl_vars['form']['birthday_month'] == 11): ?>selected="selected"<?php endif; ?>>11</option>
										<option value="12" <?php if ($this->_tpl_vars['form']['birthday_month'] == 12): ?>selected="selected"<?php endif; ?>>12</option>
									</select>
								</div>
								<p class="fl lh28  mr05 ml05">&nbsp;月&nbsp;</p>
								<div class="fl">
									<select name="birthday_day">
										<option value="">--</option>
										<option value="1" <?php if ($this->_tpl_vars['form']['birthday_day'] == 1): ?>selected="selected"<?php endif; ?>>1</option>
										<option value="2" <?php if ($this->_tpl_vars['form']['birthday_day'] == 2): ?>selected="selected"<?php endif; ?>>2</option>
										<option value="3" <?php if ($this->_tpl_vars['form']['birthday_day'] == 3): ?>selected="selected"<?php endif; ?>>3</option>
										<option value="4" <?php if ($this->_tpl_vars['form']['birthday_day'] == 4): ?>selected="selected"<?php endif; ?>>4</option>
										<option value="5" <?php if ($this->_tpl_vars['form']['birthday_day'] == 5): ?>selected="selected"<?php endif; ?>>5</option>
										<option value="6" <?php if ($this->_tpl_vars['form']['birthday_day'] == 6): ?>selected="selected"<?php endif; ?>>6</option>
										<option value="7" <?php if ($this->_tpl_vars['form']['birthday_day'] == 7): ?>selected="selected"<?php endif; ?>>7</option>
										<option value="8" <?php if ($this->_tpl_vars['form']['birthday_day'] == 8): ?>selected="selected"<?php endif; ?>>8</option>
										<option value="9" <?php if ($this->_tpl_vars['form']['birthday_day'] == 9): ?>selected="selected"<?php endif; ?>>9</option>
										<option value="10" <?php if ($this->_tpl_vars['form']['birthday_day'] == 10): ?>selected="selected"<?php endif; ?>>10</option>
										<option value="11" <?php if ($this->_tpl_vars['form']['birthday_day'] == 11): ?>selected="selected"<?php endif; ?>>11</option>
										<option value="12" <?php if ($this->_tpl_vars['form']['birthday_day'] == 12): ?>selected="selected"<?php endif; ?>>12</option>
										<option value="13" <?php if ($this->_tpl_vars['form']['birthday_day'] == 13): ?>selected="selected"<?php endif; ?>>13</option>
										<option value="14" <?php if ($this->_tpl_vars['form']['birthday_day'] == 14): ?>selected="selected"<?php endif; ?>>14</option>
										<option value="15" <?php if ($this->_tpl_vars['form']['birthday_day'] == 15): ?>selected="selected"<?php endif; ?>>15</option>
										<option value="16" <?php if ($this->_tpl_vars['form']['birthday_day'] == 16): ?>selected="selected"<?php endif; ?>>16</option>
										<option value="17" <?php if ($this->_tpl_vars['form']['birthday_day'] == 17): ?>selected="selected"<?php endif; ?>>17</option>
										<option value="18" <?php if ($this->_tpl_vars['form']['birthday_day'] == 18): ?>selected="selected"<?php endif; ?>>18</option>
										<option value="19" <?php if ($this->_tpl_vars['form']['birthday_day'] == 19): ?>selected="selected"<?php endif; ?>>19</option>
										<option value="20" <?php if ($this->_tpl_vars['form']['birthday_day'] == 20): ?>selected="selected"<?php endif; ?>>20</option>
										<option value="21" <?php if ($this->_tpl_vars['form']['birthday_day'] == 21): ?>selected="selected"<?php endif; ?>>21</option>
										<option value="22" <?php if ($this->_tpl_vars['form']['birthday_day'] == 22): ?>selected="selected"<?php endif; ?>>22</option>
										<option value="23" <?php if ($this->_tpl_vars['form']['birthday_day'] == 23): ?>selected="selected"<?php endif; ?>>23</option>
										<option value="24" <?php if ($this->_tpl_vars['form']['birthday_day'] == 24): ?>selected="selected"<?php endif; ?>>24</option>
										<option value="25" <?php if ($this->_tpl_vars['form']['birthday_day'] == 25): ?>selected="selected"<?php endif; ?>>25</option>
										<option value="26" <?php if ($this->_tpl_vars['form']['birthday_day'] == 26): ?>selected="selected"<?php endif; ?>>26</option>
										<option value="27" <?php if ($this->_tpl_vars['form']['birthday_day'] == 27): ?>selected="selected"<?php endif; ?>>27</option>
										<option value="28" <?php if ($this->_tpl_vars['form']['birthday_day'] == 28): ?>selected="selected"<?php endif; ?>>28</option>
										<option value="29" <?php if ($this->_tpl_vars['form']['birthday_day'] == 29): ?>selected="selected"<?php endif; ?>>29</option>
										<option value="30" <?php if ($this->_tpl_vars['form']['birthday_day'] == 30): ?>selected="selected"<?php endif; ?>>30</option>
										<option value="31" <?php if ($this->_tpl_vars['form']['birthday_day'] == 31): ?>selected="selected"<?php endif; ?>>31</option>
									</select>
								</div>
								<p class="fl lh28 ml05">&nbsp;日&nbsp;</p>
<?php if ($this->_tpl_vars['msg']['birthday_year']): ?>
								<div class="error"><?php echo $this->_tpl_vars['msg']['birthday_year']; ?>
</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['msg']['birthday_month']): ?>
								<div class="error"><?php echo $this->_tpl_vars['msg']['birthday_month']; ?>
</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['msg']['birthday_day']): ?>
								<div class="error"><?php echo $this->_tpl_vars['msg']['birthday_day']; ?>
</div>
<?php endif; ?>
							</td>
						</tr>
						
						<tr>
							<th>保有資格</th>
							<td>
								<ul class="list_01">
									<li><label><input type="checkbox" name="shikaku[]" value="1" <?php if ($this->_tpl_vars['form']['shikaku']['1']): ?>checked="checked"<?php endif; ?> />&nbsp;保育士</label></li>
									<li><label><input type="checkbox" name="shikaku[]" value="2" <?php if ($this->_tpl_vars['form']['shikaku']['2']): ?>checked="checked"<?php endif; ?> />&nbsp;幼稚園教諭</label></li>
									<li><label><input type="checkbox" name="shikaku[]" value="3" <?php if ($this->_tpl_vars['form']['shikaku']['3']): ?>checked="checked"<?php endif; ?> />&nbsp;栄養士</label></li>
									<li><label><input type="checkbox" name="shikaku[]" value="4" <?php if ($this->_tpl_vars['form']['shikaku']['4']): ?>checked="checked"<?php endif; ?> />&nbsp;調理師</label></li>
									<li><label><input type="checkbox" name="shikaku[]" value="5" <?php if ($this->_tpl_vars['form']['shikaku']['5']): ?>checked="checked"<?php endif; ?> />&nbsp;園長</label></li>
									<li><label><input type="checkbox" name="shikaku[]" value="6" <?php if ($this->_tpl_vars['form']['shikaku']['6']): ?>checked="checked"<?php endif; ?> />&nbsp;主任</label></li>
									<li><label><input type="checkbox" name="shikaku[]" value="7" <?php if ($this->_tpl_vars['form']['shikaku']['7']): ?>checked="checked"<?php endif; ?> />&nbsp;看護師</label></li>
									<li><label><input type="checkbox" name="shikaku[]" value="8" <?php if ($this->_tpl_vars['form']['shikaku']['8']): ?>checked="checked"<?php endif; ?> />&nbsp;児童指導員</label></li>
									<li><label><input type="checkbox" name="shikaku[]" value="9" <?php if ($this->_tpl_vars['form']['shikaku']['9']): ?>checked="checked"<?php endif; ?> />&nbsp;児童発達支援管理責任者</label></li>
									<li><label><input type="checkbox" name="shikaku[]" value="10" <?php if ($this->_tpl_vars['form']['shikaku']['10']): ?>checked="checked"<?php endif; ?> />&nbsp;作業療法士</label></li>
									<li><label><input type="checkbox" name="shikaku[]" value="11" <?php if ($this->_tpl_vars['form']['shikaku']['11']): ?>checked="checked"<?php endif; ?> />&nbsp;理学療法士</label></li>
									<li><label><input type="checkbox" name="shikaku[]" value="12" <?php if ($this->_tpl_vars['form']['shikaku']['12']): ?>checked="checked"<?php endif; ?> />&nbsp;言語聴覚士</label></li>
									<li><label><input type="checkbox" name="shikaku[]" value="13" <?php if ($this->_tpl_vars['form']['shikaku']['13']): ?>checked="checked"<?php endif; ?> />&nbsp;臨床心理士</label></li>
								</ul>
<?php if ($this->_tpl_vars['msg']['shikaku']): ?>
								<div class="error"><?php echo $this->_tpl_vars['msg']['shikaku']; ?>
</div>
<?php endif; ?>
							</td>
						</tr>
						
						
						
						<tr>
							<th>電話番号<em class="hissu">必須</em>
							</th>
							<td>
								<input class="txt_w30p fl" type="tel" name="tel" value="<?php echo $this->_tpl_vars['form']['tel']; ?>
" />
								<p class="note ml10 sp-ml0 fl lh24 sp-lh18">&nbsp;※半角数字で入力してください</p>
<?php if ($this->_tpl_vars['msg']['tel']): ?>
									<div class="error">
										<?php echo $this->_tpl_vars['msg']['tel']; ?>

									</div>
<?php endif; ?>
							</td>
						</tr>
						
						
						<tr>
							<th>メールアドレス<em class="hissu">必須 </em></th>
							<td>
								<input class="txt_w30p fl" type="email" name="email" value="<?php echo $this->_tpl_vars['form']['email']; ?>
" />
								<p class="note ml10 sp-ml0 fl lh24 sp-lh18">&nbsp;※半角英数字で入力してください</p>
<?php if ($this->_tpl_vars['msg']['email']): ?>
								<div class="error">
									<?php echo $this->_tpl_vars['msg']['email']; ?>

								</div>
<?php endif; ?>
							</td>
						</tr>
						
						<!--
						<tr>
							<th>text01</th>
							<td>
								<input class="txt_w250" type="text" name="text01" value="<?php echo $this->_tpl_vars['form']['text01']; ?>
" />
<?php if ($this->_tpl_vars['msg']['text01']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['text01']; ?>
</li>
								</ul>
<?php endif; ?>
							</td>
						</tr>
						-->
						
						
						<!--<tr>
							<th>現在お住まいの地域</th>
							<td>
								<div class="box">
									<dl class="dl_01 mb10">
										<dt>郵便番号</dt>
										<dd>
											<input class="txt_w11p" type="number" name="zip1" value="<?php echo $this->_tpl_vars['form']['zip1']; ?>
" />
											<span class="haihun">-</span>
											<input class="txt_w11p" type="number" name="zip2" value="<?php echo $this->_tpl_vars['form']['zip2']; ?>
" onKeyUp="AjaxZip3.zip2addr('zip1','zip2','pref','city','address1');" />
										</dd>
									</dl>
									<dl class="dl_01 mb10">
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
									<dl class="dl_01 mb10">
										<dt>市区町村</dt>
										<dd>
											<input class="txt_w30p fl" type="text" name="city" value="<?php echo $this->_tpl_vars['form']['city']; ?>
" />
											<span class="note ml10 fl lh24">例：○○市○○区</span>
										</dd>
									</dl>-->
<!--
									<dl class="dl_01 mb10">
										<dt>番地まで</dt>
										<dd>
											<input class="txt_w47p" type="text" name="address1" value="<?php echo $this->_tpl_vars['form']['address1']; ?>
" />
											<span class="note">例：○○通　1-2-3</span>
										</dd>
									</dl>
									<dl class="dl_01 mb10">
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
								</div>
							</td>
						</tr>-->
						
						
						
						
						<!--<tr>
							<th>ご希望の勤務形態</th>
							<td>
								<ul class="list_01">
									<li><label><input type="checkbox" name="check02[]" value="1" <?php if ($this->_tpl_vars['form']['check02']['1']): ?>checked="checked"<?php endif; ?> />&nbsp;正社員</label></li>
									<li><label><input type="checkbox" name="check02[]" value="2" <?php if ($this->_tpl_vars['form']['check02']['2']): ?>checked="checked"<?php endif; ?> />&nbsp;契約社員</label></li>
									<li><label><input type="checkbox" name="check02[]" value="3" <?php if ($this->_tpl_vars['form']['check02']['3']): ?>checked="checked"<?php endif; ?> />&nbsp;アルバイト/アルバイト</label></li>
								</ul>
<?php if ($this->_tpl_vars['msg']['check02']): ?>
								<div class="error"><?php echo $this->_tpl_vars['msg']['check02']; ?>
</div>
<?php endif; ?>
							</td>
						</tr>
						<tr>
							<th>希望入職時期</th>
							<td>
								<select name="jiki">
									<option value="">選択して下さい</option>
									<option value="1" <?php if ($this->_tpl_vars['form']['jiki'] == 1): ?>selected="selected"<?php endif; ?>>今すぐ</option>
									<option value="2" <?php if ($this->_tpl_vars['form']['jiki'] == 2): ?>selected="selected"<?php endif; ?>>1ヶ月以内</option>
									<option value="3" <?php if ($this->_tpl_vars['form']['jiki'] == 3): ?>selected="selected"<?php endif; ?>>3ヶ月以内</option>
									<option value="4" <?php if ($this->_tpl_vars['form']['jiki'] == 4): ?>selected="selected"<?php endif; ?>>半年以内</option>
									<option value="5" <?php if ($this->_tpl_vars['form']['jiki'] == 5): ?>selected="selected"<?php endif; ?>>1年以内</option>
									<option value="6" <?php if ($this->_tpl_vars['form']['jiki'] == 6): ?>selected="selected"<?php endif; ?>>未定</option>
								</select>
<?php if ($this->_tpl_vars['msg']['jiki']): ?>
								<div class="error"><?php echo $this->_tpl_vars['msg']['jiki']; ?>
</div>
<?php endif; ?>
							</td>
						</tr>-->
						
				<!--
				
						<tr>
							<th>ymd01</th>
							<td><div class="fl mr05">
									<select name="ymd01_year">
										<option value="">----</option>
										<option value="1940" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1940): ?>selected="selected"<?php endif; ?>>1940</option>
										<option value="1941" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1941): ?>selected="selected"<?php endif; ?>>1941</option>
										<option value="1942" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1942): ?>selected="selected"<?php endif; ?>>1942</option>
										<option value="1943" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1943): ?>selected="selected"<?php endif; ?>>1943</option>
										<option value="1944" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1944): ?>selected="selected"<?php endif; ?>>1944</option>
										<option value="1945" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1945): ?>selected="selected"<?php endif; ?>>1945</option>
										<option value="1946" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1946): ?>selected="selected"<?php endif; ?>>1946</option>
										<option value="1947" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1947): ?>selected="selected"<?php endif; ?>>1947</option>
										<option value="1948" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1948): ?>selected="selected"<?php endif; ?>>1948</option>
										<option value="1949" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1949): ?>selected="selected"<?php endif; ?>>1949</option>
										<option value="1950" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1950): ?>selected="selected"<?php endif; ?>>1950</option>
										<option value="1951" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1951): ?>selected="selected"<?php endif; ?>>1951</option>
										<option value="1952" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1952): ?>selected="selected"<?php endif; ?>>1952</option>
										<option value="1953" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1953): ?>selected="selected"<?php endif; ?>>1953</option>
										<option value="1954" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1954): ?>selected="selected"<?php endif; ?>>1954</option>
										<option value="1955" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1955): ?>selected="selected"<?php endif; ?>>1955</option>
										<option value="1956" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1956): ?>selected="selected"<?php endif; ?>>1956</option>
										<option value="1957" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1957): ?>selected="selected"<?php endif; ?>>1957</option>
										<option value="1958" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1958): ?>selected="selected"<?php endif; ?>>1958</option>
										<option value="1959" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1959): ?>selected="selected"<?php endif; ?>>1959</option>
										<option value="1960" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1960): ?>selected="selected"<?php endif; ?>>1960</option>
										<option value="1961" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1961): ?>selected="selected"<?php endif; ?>>1961</option>
										<option value="1962" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1962): ?>selected="selected"<?php endif; ?>>1962</option>
										<option value="1963" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1963): ?>selected="selected"<?php endif; ?>>1963</option>
										<option value="1964" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1964): ?>selected="selected"<?php endif; ?>>1964</option>
										<option value="1965" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1965): ?>selected="selected"<?php endif; ?>>1965</option>
										<option value="1966" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1966): ?>selected="selected"<?php endif; ?>>1966</option>
										<option value="1967" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1967): ?>selected="selected"<?php endif; ?>>1967</option>
										<option value="1968" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1968): ?>selected="selected"<?php endif; ?>>1968</option>
										<option value="1969" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1969): ?>selected="selected"<?php endif; ?>>1969</option>
										<option value="1970" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1970): ?>selected="selected"<?php endif; ?>>1970</option>
										<option value="1971" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1971): ?>selected="selected"<?php endif; ?>>1971</option>
										<option value="1972" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1972): ?>selected="selected"<?php endif; ?>>1972</option>
										<option value="1973" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1973): ?>selected="selected"<?php endif; ?>>1973</option>
										<option value="1974" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1974): ?>selected="selected"<?php endif; ?>>1974</option>
										<option value="1975" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1975): ?>selected="selected"<?php endif; ?>>1975</option>
										<option value="1976" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1976): ?>selected="selected"<?php endif; ?>>1976</option>
										<option value="1977" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1977): ?>selected="selected"<?php endif; ?>>1977</option>
										<option value="1978" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1978): ?>selected="selected"<?php endif; ?>>1978</option>
										<option value="1979" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1979): ?>selected="selected"<?php endif; ?>>1979</option>
										<option value="1980" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1980): ?>selected="selected"<?php endif; ?>>1980</option>
										<option value="1981" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1981): ?>selected="selected"<?php endif; ?>>1981</option>
										<option value="1982" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1982): ?>selected="selected"<?php endif; ?>>1982</option>
										<option value="1983" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1983): ?>selected="selected"<?php endif; ?>>1983</option>
										<option value="1984" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1984): ?>selected="selected"<?php endif; ?>>1984</option>
										<option value="1985" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1985): ?>selected="selected"<?php endif; ?>>1985</option>
										<option value="1986" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1986): ?>selected="selected"<?php endif; ?>>1986</option>
										<option value="1987" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1987): ?>selected="selected"<?php endif; ?>>1987</option>
										<option value="1988" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1988): ?>selected="selected"<?php endif; ?>>1988</option>
										<option value="1989" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1989): ?>selected="selected"<?php endif; ?>>1989</option>
										<option value="1990" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1990): ?>selected="selected"<?php endif; ?>>1990</option>
										<option value="1991" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1991): ?>selected="selected"<?php endif; ?>>1991</option>
										<option value="1992" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1992): ?>selected="selected"<?php endif; ?>>1992</option>
										<option value="1993" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1993): ?>selected="selected"<?php endif; ?>>1993</option>
										<option value="1994" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1994): ?>selected="selected"<?php endif; ?>>1994</option>
										<option value="1995" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1995): ?>selected="selected"<?php endif; ?>>1995</option>
										<option value="1996" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1996): ?>selected="selected"<?php endif; ?>>1996</option>
										<option value="1997" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1997): ?>selected="selected"<?php endif; ?>>1997</option>
										<option value="1998" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1998): ?>selected="selected"<?php endif; ?>>1998</option>
										<option value="1999" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 1999): ?>selected="selected"<?php endif; ?>>1999</option>
										<option value="2000" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 2000): ?>selected="selected"<?php endif; ?>>2000</option>
										<option value="2001" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 2001): ?>selected="selected"<?php endif; ?>>2001</option>
										<option value="2002" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 2002): ?>selected="selected"<?php endif; ?>>2002</option>
										<option value="2003" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 2003): ?>selected="selected"<?php endif; ?>>2003</option>
										<option value="2004" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 2004): ?>selected="selected"<?php endif; ?>>2004</option>
										<option value="2005" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 2005): ?>selected="selected"<?php endif; ?>>2005</option>
										<option value="2006" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 2006): ?>selected="selected"<?php endif; ?>>2006</option>
										<option value="2007" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 2007): ?>selected="selected"<?php endif; ?>>2007</option>
										<option value="2008" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 2008): ?>selected="selected"<?php endif; ?>>2008</option>
										<option value="2009" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 2009): ?>selected="selected"<?php endif; ?>>2009</option>
										<option value="2010" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 2010): ?>selected="selected"<?php endif; ?>>2010</option>
										<option value="2011" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 2011): ?>selected="selected"<?php endif; ?>>2011</option>
										<option value="2012" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 2012): ?>selected="selected"<?php endif; ?>>2012</option>
										<option value="2013" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 2013): ?>selected="selected"<?php endif; ?>>2013</option>
										<option value="2014" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 2014): ?>selected="selected"<?php endif; ?>>2014</option>
										<option value="2015" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 2015): ?>selected="selected"<?php endif; ?>>2015</option>
										<option value="2016" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 2016): ?>selected="selected"<?php endif; ?>>2016</option>
										<option value="2017" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 2017): ?>selected="selected"<?php endif; ?>>2017</option>
										<option value="2018" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 2018): ?>selected="selected"<?php endif; ?>>2018</option>
										<option value="2019" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 2019): ?>selected="selected"<?php endif; ?>>2019</option>
										<option value="2020" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 2020): ?>selected="selected"<?php endif; ?>>2020</option>
									</select>
								</div>
								<p class="fl lh28 mr15">&nbsp;年&nbsp;</p>
								<div class="fl mr05">
									<select name="ymd01_month">
										<option value="">--</option>
										<option value="1" <?php if ($this->_tpl_vars['form']['ymd01_month'] == 1): ?>selected="selected"<?php endif; ?>>1</option>
										<option value="2" <?php if ($this->_tpl_vars['form']['ymd01_month'] == 2): ?>selected="selected"<?php endif; ?>>2</option>
										<option value="3" <?php if ($this->_tpl_vars['form']['ymd01_month'] == 3): ?>selected="selected"<?php endif; ?>>3</option>
										<option value="4" <?php if ($this->_tpl_vars['form']['ymd01_month'] == 4): ?>selected="selected"<?php endif; ?>>4</option>
										<option value="5" <?php if ($this->_tpl_vars['form']['ymd01_month'] == 5): ?>selected="selected"<?php endif; ?>>5</option>
										<option value="6" <?php if ($this->_tpl_vars['form']['ymd01_month'] == 6): ?>selected="selected"<?php endif; ?>>6</option>
										<option value="7" <?php if ($this->_tpl_vars['form']['ymd01_month'] == 7): ?>selected="selected"<?php endif; ?>>7</option>
										<option value="8" <?php if ($this->_tpl_vars['form']['ymd01_month'] == 8): ?>selected="selected"<?php endif; ?>>8</option>
										<option value="9" <?php if ($this->_tpl_vars['form']['ymd01_month'] == 9): ?>selected="selected"<?php endif; ?>>9</option>
										<option value="10" <?php if ($this->_tpl_vars['form']['ymd01_month'] == 10): ?>selected="selected"<?php endif; ?>>10</option>
										<option value="11" <?php if ($this->_tpl_vars['form']['ymd01_month'] == 11): ?>selected="selected"<?php endif; ?>>11</option>
										<option value="12" <?php if ($this->_tpl_vars['form']['ymd01_month'] == 12): ?>selected="selected"<?php endif; ?>>12</option>
									</select>
								</div>
								<p class="fl lh28 mr15">&nbsp;月&nbsp;</p>
								<div class="fl mr05">
									<select name="ymd01_day">
										<option value="">--</option>
										<option value="1" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 1): ?>selected="selected"<?php endif; ?>>1</option>
										<option value="2" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 2): ?>selected="selected"<?php endif; ?>>2</option>
										<option value="3" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 3): ?>selected="selected"<?php endif; ?>>3</option>
										<option value="4" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 4): ?>selected="selected"<?php endif; ?>>4</option>
										<option value="5" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 5): ?>selected="selected"<?php endif; ?>>5</option>
										<option value="6" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 6): ?>selected="selected"<?php endif; ?>>6</option>
										<option value="7" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 7): ?>selected="selected"<?php endif; ?>>7</option>
										<option value="8" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 8): ?>selected="selected"<?php endif; ?>>8</option>
										<option value="9" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 9): ?>selected="selected"<?php endif; ?>>9</option>
										<option value="10" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 10): ?>selected="selected"<?php endif; ?>>10</option>
										<option value="11" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 11): ?>selected="selected"<?php endif; ?>>11</option>
										<option value="12" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 12): ?>selected="selected"<?php endif; ?>>12</option>
										<option value="13" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 13): ?>selected="selected"<?php endif; ?>>13</option>
										<option value="14" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 14): ?>selected="selected"<?php endif; ?>>14</option>
										<option value="15" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 15): ?>selected="selected"<?php endif; ?>>15</option>
										<option value="16" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 16): ?>selected="selected"<?php endif; ?>>16</option>
										<option value="17" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 17): ?>selected="selected"<?php endif; ?>>17</option>
										<option value="18" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 18): ?>selected="selected"<?php endif; ?>>18</option>
										<option value="19" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 19): ?>selected="selected"<?php endif; ?>>19</option>
										<option value="20" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 20): ?>selected="selected"<?php endif; ?>>20</option>
										<option value="21" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 21): ?>selected="selected"<?php endif; ?>>21</option>
										<option value="22" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 22): ?>selected="selected"<?php endif; ?>>22</option>
										<option value="23" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 23): ?>selected="selected"<?php endif; ?>>23</option>
										<option value="24" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 24): ?>selected="selected"<?php endif; ?>>24</option>
										<option value="25" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 25): ?>selected="selected"<?php endif; ?>>25</option>
										<option value="26" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 26): ?>selected="selected"<?php endif; ?>>26</option>
										<option value="27" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 27): ?>selected="selected"<?php endif; ?>>27</option>
										<option value="28" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 28): ?>selected="selected"<?php endif; ?>>28</option>
										<option value="29" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 29): ?>selected="selected"<?php endif; ?>>29</option>
										<option value="30" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 30): ?>selected="selected"<?php endif; ?>>30</option>
										<option value="31" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 31): ?>selected="selected"<?php endif; ?>>31</option>
									</select>
								</div>
								<p class="fl lh28">&nbsp;日&nbsp;</p>
<?php if ($this->_tpl_vars['msg']['ymd01_year']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['ymd01_year']; ?>
</li>
								</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['msg']['ymd01_month']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['ymd01_month']; ?>
</li>
								</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['msg']['ymd01_day']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['ymd01_day']; ?>
</li>
								</div>
<?php endif; ?>
					</td>
				</tr>
				
				<tr>
					<th>ymd02</th>
					<td><div class="fl mr05">
									<select name="ymd02_year">
										<option value="">----</option>
										<option value="2001" <?php if ($this->_tpl_vars['form']['ymd02_year'] == 2001): ?>selected="selected"<?php endif; ?>>2001</option>
										<option value="2002" <?php if ($this->_tpl_vars['form']['ymd02_year'] == 2002): ?>selected="selected"<?php endif; ?>>2002</option>
										<option value="2003" <?php if ($this->_tpl_vars['form']['ymd02_year'] == 2003): ?>selected="selected"<?php endif; ?>>2003</option>
										<option value="2004" <?php if ($this->_tpl_vars['form']['ymd02_year'] == 2004): ?>selected="selected"<?php endif; ?>>2004</option>
										<option value="2005" <?php if ($this->_tpl_vars['form']['ymd02_year'] == 2005): ?>selected="selected"<?php endif; ?>>2005</option>
										<option value="2006" <?php if ($this->_tpl_vars['form']['ymd02_year'] == 2006): ?>selected="selected"<?php endif; ?>>2006</option>
										<option value="2007" <?php if ($this->_tpl_vars['form']['ymd02_year'] == 2007): ?>selected="selected"<?php endif; ?>>2007</option>
										<option value="2008" <?php if ($this->_tpl_vars['form']['ymd02_year'] == 2008): ?>selected="selected"<?php endif; ?>>2008</option>
										<option value="2009" <?php if ($this->_tpl_vars['form']['ymd02_year'] == 2009): ?>selected="selected"<?php endif; ?>>2009</option>
										<option value="2010" <?php if ($this->_tpl_vars['form']['ymd02_year'] == 2010): ?>selected="selected"<?php endif; ?>>2010</option>
										<option value="2011" <?php if ($this->_tpl_vars['form']['ymd02_year'] == 2011): ?>selected="selected"<?php endif; ?>>2011</option>
										<option value="2012" <?php if ($this->_tpl_vars['form']['ymd02_year'] == 2012): ?>selected="selected"<?php endif; ?>>2012</option>
										<option value="2013" <?php if ($this->_tpl_vars['form']['ymd02_year'] == 2013): ?>selected="selected"<?php endif; ?>>2013</option>
										<option value="2014" <?php if ($this->_tpl_vars['form']['ymd02_year'] == 2014): ?>selected="selected"<?php endif; ?>>2014</option>
									</select>
								</div>
								<p class="fl lh28 mr15">年</p>
								<div class="fl mr05">
									<select name="ymd02_month">
										<option value="">--</option>
										<option value="1" <?php if ($this->_tpl_vars['form']['ymd02_month'] == 1): ?>selected="selected"<?php endif; ?>>1</option>
										<option value="2" <?php if ($this->_tpl_vars['form']['ymd02_month'] == 2): ?>selected="selected"<?php endif; ?>>2</option>
										<option value="3" <?php if ($this->_tpl_vars['form']['ymd02_month'] == 3): ?>selected="selected"<?php endif; ?>>3</option>
										<option value="4" <?php if ($this->_tpl_vars['form']['ymd02_month'] == 4): ?>selected="selected"<?php endif; ?>>4</option>
										<option value="5" <?php if ($this->_tpl_vars['form']['ymd02_month'] == 5): ?>selected="selected"<?php endif; ?>>5</option>
										<option value="6" <?php if ($this->_tpl_vars['form']['ymd02_month'] == 6): ?>selected="selected"<?php endif; ?>>6</option>
										<option value="7" <?php if ($this->_tpl_vars['form']['ymd02_month'] == 7): ?>selected="selected"<?php endif; ?>>7</option>
										<option value="8" <?php if ($this->_tpl_vars['form']['ymd02_month'] == 8): ?>selected="selected"<?php endif; ?>>8</option>
										<option value="9" <?php if ($this->_tpl_vars['form']['ymd02_month'] == 9): ?>selected="selected"<?php endif; ?>>9</option>
										<option value="10" <?php if ($this->_tpl_vars['form']['ymd02_month'] == 10): ?>selected="selected"<?php endif; ?>>10</option>
										<option value="11" <?php if ($this->_tpl_vars['form']['ymd02_month'] == 11): ?>selected="selected"<?php endif; ?>>11</option>
										<option value="12" <?php if ($this->_tpl_vars['form']['ymd02_month'] == 12): ?>selected="selected"<?php endif; ?>>12</option>
									</select>
								</div>
								<p class="fl lh28 mr15">月</p>
								<div class="fl mr05">
									<select name="ymd_02_day">
										<option value="">--</option>
										<option value="1" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 1): ?>selected="selected"<?php endif; ?>>1</option>
										<option value="2" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 2): ?>selected="selected"<?php endif; ?>>2</option>
										<option value="3" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 3): ?>selected="selected"<?php endif; ?>>3</option>
										<option value="4" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 4): ?>selected="selected"<?php endif; ?>>4</option>
										<option value="5" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 5): ?>selected="selected"<?php endif; ?>>5</option>
										<option value="6" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 6): ?>selected="selected"<?php endif; ?>>6</option>
										<option value="7" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 7): ?>selected="selected"<?php endif; ?>>7</option>
										<option value="8" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 8): ?>selected="selected"<?php endif; ?>>8</option>
										<option value="9" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 9): ?>selected="selected"<?php endif; ?>>9</option>
										<option value="10" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 10): ?>selected="selected"<?php endif; ?>>10</option>
										<option value="11" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 11): ?>selected="selected"<?php endif; ?>>11</option>
										<option value="12" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 12): ?>selected="selected"<?php endif; ?>>12</option>
										<option value="13" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 13): ?>selected="selected"<?php endif; ?>>13</option>
										<option value="14" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 14): ?>selected="selected"<?php endif; ?>>14</option>
										<option value="15" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 15): ?>selected="selected"<?php endif; ?>>15</option>
										<option value="16" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 16): ?>selected="selected"<?php endif; ?>>16</option>
										<option value="17" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 17): ?>selected="selected"<?php endif; ?>>17</option>
										<option value="18" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 18): ?>selected="selected"<?php endif; ?>>18</option>
										<option value="19" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 19): ?>selected="selected"<?php endif; ?>>19</option>
										<option value="20" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 20): ?>selected="selected"<?php endif; ?>>20</option>
										<option value="21" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 21): ?>selected="selected"<?php endif; ?>>21</option>
										<option value="22" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 22): ?>selected="selected"<?php endif; ?>>22</option>
										<option value="23" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 23): ?>selected="selected"<?php endif; ?>>23</option>
										<option value="24" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 24): ?>selected="selected"<?php endif; ?>>24</option>
										<option value="25" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 25): ?>selected="selected"<?php endif; ?>>25</option>
										<option value="26" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 26): ?>selected="selected"<?php endif; ?>>26</option>
										<option value="27" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 27): ?>selected="selected"<?php endif; ?>>27</option>
										<option value="28" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 28): ?>selected="selected"<?php endif; ?>>28</option>
										<option value="29" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 29): ?>selected="selected"<?php endif; ?>>29</option>
										<option value="30" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 30): ?>selected="selected"<?php endif; ?>>30</option>
										<option value="31" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 31): ?>selected="selected"<?php endif; ?>>31</option>
									</select>
								</div>
								<p class="fl lh28">日</p>
<?php if ($this->_tpl_vars['msg']['ymd02_year']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['ymd02_year']; ?>
</li>
								</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['msg']['ymd02_month']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['ymd02_month']; ?>
</li>
								</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['msg']['ymd02_day']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['ymd02_day']; ?>
</li>
								</div>
<?php endif; ?>
					</td>
				</tr>
				<tr>
					<th>ymd03</th>
					<td><div class="fl mr05">
									<select name="ymd03_year">
										<option value="">----</option>
										<option value="2001" <?php if ($this->_tpl_vars['form']['ymd03_year'] == 2001): ?>selected="selected"<?php endif; ?>>2001</option>
										<option value="2002" <?php if ($this->_tpl_vars['form']['ymd03_year'] == 2002): ?>selected="selected"<?php endif; ?>>2002</option>
										<option value="2003" <?php if ($this->_tpl_vars['form']['ymd03_year'] == 2003): ?>selected="selected"<?php endif; ?>>2003</option>
										<option value="2004" <?php if ($this->_tpl_vars['form']['ymd03_year'] == 2004): ?>selected="selected"<?php endif; ?>>2004</option>
										<option value="2005" <?php if ($this->_tpl_vars['form']['ymd03_year'] == 2005): ?>selected="selected"<?php endif; ?>>2005</option>
										<option value="2006" <?php if ($this->_tpl_vars['form']['ymd03_year'] == 2006): ?>selected="selected"<?php endif; ?>>2006</option>
										<option value="2007" <?php if ($this->_tpl_vars['form']['ymd03_year'] == 2007): ?>selected="selected"<?php endif; ?>>2007</option>
										<option value="2008" <?php if ($this->_tpl_vars['form']['ymd03_year'] == 2008): ?>selected="selected"<?php endif; ?>>2008</option>
										<option value="2009" <?php if ($this->_tpl_vars['form']['ymd03_year'] == 2009): ?>selected="selected"<?php endif; ?>>2009</option>
										<option value="2010" <?php if ($this->_tpl_vars['form']['ymd03_year'] == 2010): ?>selected="selected"<?php endif; ?>>2010</option>
										<option value="2011" <?php if ($this->_tpl_vars['form']['ymd03_year'] == 2011): ?>selected="selected"<?php endif; ?>>2011</option>
										<option value="2012" <?php if ($this->_tpl_vars['form']['ymd03_year'] == 2012): ?>selected="selected"<?php endif; ?>>2012</option>
										<option value="2013" <?php if ($this->_tpl_vars['form']['ymd03_year'] == 2013): ?>selected="selected"<?php endif; ?>>2013</option>
										<option value="2014" <?php if ($this->_tpl_vars['form']['ymd03_year'] == 2014): ?>selected="selected"<?php endif; ?>>2014</option>
									</select>
								</div>
								<p class="fl lh28 mr15">年</p>
								<div class="fl mr05">
									<select name="ymd03_month">
										<option value="">--</option>
										<option value="1" <?php if ($this->_tpl_vars['form']['ymd03_month'] == 1): ?>selected="selected"<?php endif; ?>>1</option>
										<option value="2" <?php if ($this->_tpl_vars['form']['ymd03_month'] == 2): ?>selected="selected"<?php endif; ?>>2</option>
										<option value="3" <?php if ($this->_tpl_vars['form']['ymd03_month'] == 3): ?>selected="selected"<?php endif; ?>>3</option>
										<option value="4" <?php if ($this->_tpl_vars['form']['ymd03_month'] == 4): ?>selected="selected"<?php endif; ?>>4</option>
										<option value="5" <?php if ($this->_tpl_vars['form']['ymd03_month'] == 5): ?>selected="selected"<?php endif; ?>>5</option>
										<option value="6" <?php if ($this->_tpl_vars['form']['ymd03_month'] == 6): ?>selected="selected"<?php endif; ?>>6</option>
										<option value="7" <?php if ($this->_tpl_vars['form']['ymd03_month'] == 7): ?>selected="selected"<?php endif; ?>>7</option>
										<option value="8" <?php if ($this->_tpl_vars['form']['ymd03_month'] == 8): ?>selected="selected"<?php endif; ?>>8</option>
										<option value="9" <?php if ($this->_tpl_vars['form']['ymd03_month'] == 9): ?>selected="selected"<?php endif; ?>>9</option>
										<option value="10" <?php if ($this->_tpl_vars['form']['ymd03_month'] == 10): ?>selected="selected"<?php endif; ?>>10</option>
										<option value="11" <?php if ($this->_tpl_vars['form']['ymd03_month'] == 11): ?>selected="selected"<?php endif; ?>>11</option>
										<option value="12" <?php if ($this->_tpl_vars['form']['ymd03_month'] == 12): ?>selected="selected"<?php endif; ?>>12</option>
									</select>
								</div>
								<p class="fl lh28 mr15">月</p>
								<div class="fl mr05">
									<select name="ymd03_day">
										<option value="">--</option>
										<option value="1" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 1): ?>selected="selected"<?php endif; ?>>1</option>
										<option value="2" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 2): ?>selected="selected"<?php endif; ?>>2</option>
										<option value="3" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 3): ?>selected="selected"<?php endif; ?>>3</option>
										<option value="4" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 4): ?>selected="selected"<?php endif; ?>>4</option>
										<option value="5" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 5): ?>selected="selected"<?php endif; ?>>5</option>
										<option value="6" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 6): ?>selected="selected"<?php endif; ?>>6</option>
										<option value="7" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 7): ?>selected="selected"<?php endif; ?>>7</option>
										<option value="8" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 8): ?>selected="selected"<?php endif; ?>>8</option>
										<option value="9" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 9): ?>selected="selected"<?php endif; ?>>9</option>
										<option value="10" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 10): ?>selected="selected"<?php endif; ?>>10</option>
										<option value="11" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 11): ?>selected="selected"<?php endif; ?>>11</option>
										<option value="12" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 12): ?>selected="selected"<?php endif; ?>>12</option>
										<option value="13" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 13): ?>selected="selected"<?php endif; ?>>13</option>
										<option value="14" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 14): ?>selected="selected"<?php endif; ?>>14</option>
										<option value="15" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 15): ?>selected="selected"<?php endif; ?>>15</option>
										<option value="16" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 16): ?>selected="selected"<?php endif; ?>>16</option>
										<option value="17" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 17): ?>selected="selected"<?php endif; ?>>17</option>
										<option value="18" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 18): ?>selected="selected"<?php endif; ?>>18</option>
										<option value="19" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 19): ?>selected="selected"<?php endif; ?>>19</option>
										<option value="20" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 20): ?>selected="selected"<?php endif; ?>>20</option>
										<option value="21" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 21): ?>selected="selected"<?php endif; ?>>21</option>
										<option value="22" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 22): ?>selected="selected"<?php endif; ?>>22</option>
										<option value="23" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 23): ?>selected="selected"<?php endif; ?>>23</option>
										<option value="24" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 24): ?>selected="selected"<?php endif; ?>>24</option>
										<option value="25" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 25): ?>selected="selected"<?php endif; ?>>25</option>
										<option value="26" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 26): ?>selected="selected"<?php endif; ?>>26</option>
										<option value="27" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 27): ?>selected="selected"<?php endif; ?>>27</option>
										<option value="28" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 28): ?>selected="selected"<?php endif; ?>>28</option>
										<option value="29" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 29): ?>selected="selected"<?php endif; ?>>29</option>
										<option value="30" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 30): ?>selected="selected"<?php endif; ?>>30</option>
										<option value="31" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 31): ?>selected="selected"<?php endif; ?>>31</option>
									</select>
								</div>
								<p class="fl lh28">日</p>
<?php if ($this->_tpl_vars['msg']['ymd03_year']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['ymd03_year']; ?>
</li>
								</ul>
<?php endif; ?>
<?php if ($this->_tpl_vars['msg']['ymd03_month']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['ymd03_month']; ?>
</li>
								</ul>
<?php endif; ?>
<?php if ($this->_tpl_vars['msg']['ymd03_day']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['ymd03_day']; ?>
</li>
								</ul>
<?php endif; ?>
					</td>
				</tr>
				
				
				<tr>
					<th>textarea03</th>
					<td>
							<textarea class="textarea_w500" name="textarea03"><?php echo $this->_tpl_vars['form']['textarea03']; ?>
</textarea>
<?php if ($this->_tpl_vars['msg']['textarea03']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['textarea03']; ?>
</li>
								</ul>
<?php endif; ?>
						</td>
				</tr>
				<tr>
					<th>textarea04</th>
					<td>
							<textarea class="textarea_w500" name="textarea04"><?php echo $this->_tpl_vars['form']['textarea04']; ?>
</textarea>
<?php if ($this->_tpl_vars['msg']['textarea04']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['textarea04']; ?>
</li>
								</ul>
<?php endif; ?>
						</td>
				</tr>
				<tr>
					<th>textarea05</th>
					<td>

							<textarea class="textarea_w500" name="textarea05"><?php echo $this->_tpl_vars['form']['textarea05']; ?>
</textarea>
<?php if ($this->_tpl_vars['msg']['textarea05']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['textarea05']; ?>
</li>
								</ul>
<?php endif; ?>
						</td>
				</tr>
				<tr>
					<th>textarea06</th>
					<td>
							<textarea class="textarea_w500" name="textarea06"><?php echo $this->_tpl_vars['form']['textarea06']; ?>
</textarea>
<?php if ($this->_tpl_vars['msg']['textarea06']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['textarea06']; ?>
</li>
								</ul>
<?php endif; ?>
						</td>
				</tr>
				<tr>
					<th>textarea07</th>
					<td>
							<textarea class="textarea_w500" name="textarea07"><?php echo $this->_tpl_vars['form']['textarea07']; ?>
</textarea>
<?php if ($this->_tpl_vars['msg']['textarea07']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['textarea07']; ?>
</li>
								</ul>
<?php endif; ?>
						</td>
				</tr>
				<tr>
					<th>textarea08</th>
					<td>
							<textarea class="textarea_w500" name="textarea08"><?php echo $this->_tpl_vars['form']['textarea08']; ?>
</textarea>
<?php if ($this->_tpl_vars['msg']['textarea08']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['textarea08']; ?>
</li>
								</ul>
<?php endif; ?>
						</td>
				</tr>
				<tr>
					<th>textarea09</th>
					<td>
							<textarea class="textarea_w500" name="textarea09"><?php echo $this->_tpl_vars['form']['textarea09']; ?>
</textarea>
<?php if ($this->_tpl_vars['msg']['textarea09']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['textarea09']; ?>
</li>
								</ul>
<?php endif; ?>
						</td>
				</tr>
				<tr>
					<th>textarea10</th>
					<td>
							<textarea class="textarea_w500" name="textarea10"><?php echo $this->_tpl_vars['form']['textarea10']; ?>
</textarea>
<?php if ($this->_tpl_vars['msg']['textarea10']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['textarea10']; ?>
</li>
								</ul>
<?php endif; ?>
						</td>
				</tr>
				
				<tr>
					<th>text02</th>
							<td>
								<input class="txt_w250" type="text" name="text02" value="<?php echo $this->_tpl_vars['form']['text02']; ?>
" />
<?php if ($this->_tpl_vars['msg']['text02']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['text02']; ?>
</li>
								</ul>
<?php endif; ?>
							</td>
				</tr>
				<tr>
					<th>text03</th>
							<td>
								<input class="txt_w250" type="text" name="text03" value="<?php echo $this->_tpl_vars['form']['text03']; ?>
" />
<?php if ($this->_tpl_vars['msg']['text03']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['text03']; ?>
</li>
								</ul>
<?php endif; ?>
							</td>
				</tr>
				<tr>
					<th>text04</th>
							<td>
								<input class="txt_w250" type="text" name="text04" value="<?php echo $this->_tpl_vars['form']['text04']; ?>
" />
<?php if ($this->_tpl_vars['msg']['text04']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['text04']; ?>
</li>
								</ul>
<?php endif; ?>
							</td>
				</tr>
				<tr>
					<th>text05</th>
							<td>
								<input class="txt_w250" type="text" name="text05" value="<?php echo $this->_tpl_vars['form']['text05']; ?>
" />
<?php if ($this->_tpl_vars['msg']['text05']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['text05']; ?>
</li>
								</ul>
<?php endif; ?>
							</td>
				</tr>
				<tr>
					<th>text06</th>
							<td>
								<input class="txt_w250" type="text" name="text06" value="<?php echo $this->_tpl_vars['form']['text06']; ?>
" />
<?php if ($this->_tpl_vars['msg']['text06']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['text06']; ?>
</li>
								</ul>
<?php endif; ?>
							</td>
				</tr>
				<tr>
					<th>text07</th>
					<td>
								<input class="txt_w250" type="text" name="text07" value="<?php echo $this->_tpl_vars['form']['text07']; ?>
" />
<?php if ($this->_tpl_vars['msg']['text07']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['text07']; ?>
</li>
								</ul>
<?php endif; ?>
							</td>
				</tr>
				<tr>
					<th>text08</th>
							<td>
								<input class="txt_w250" type="text" name="text08" value="<?php echo $this->_tpl_vars['form']['text08']; ?>
" />
<?php if ($this->_tpl_vars['msg']['text08']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['text08']; ?>
</li>
								</ul>
<?php endif; ?>
							</td>
				</tr>
				<tr>
					<th>text09</th>
							<td>
								<input class="txt_w250" type="text" name="text09" value="<?php echo $this->_tpl_vars['form']['text09']; ?>
" />
<?php if ($this->_tpl_vars['msg']['text09']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['text09']; ?>
</li>
								</ul>
<?php endif; ?>
							</td>
				</tr>
				<tr>
					<th>text10</th>
							<td>
								<input class="txt_w250" type="text" name="text10" value="<?php echo $this->_tpl_vars['form']['text10']; ?>
" />
<?php if ($this->_tpl_vars['msg']['text10']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['text10']; ?>
</li>
								</ul>
<?php endif; ?>
							</td>
				</tr>
				
				
				<tr>
					<th>radio02</th>
							<td>
								<ul class="list_01">
									<li><label><input type="radio" name="radio02" value="1" <?php if ($this->_tpl_vars['form']['radio02'] == 1): ?>checked="checked"<?php endif; ?> />&nbsp;値1</label></li>
									<li><label><input type="radio" name="radio02" value="2" <?php if ($this->_tpl_vars['form']['radio02'] == 2): ?>checked="checked"<?php endif; ?> />&nbsp;値2</label></li>
									<li><label><input type="radio" name="radio02" value="3" <?php if ($this->_tpl_vars['form']['radio02'] == 3): ?>checked="checked"<?php endif; ?> />&nbsp;値3</label></li>
								</ul>
<?php if ($this->_tpl_vars['msg']['radio02']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['radio02']; ?>
</li>
								</ul>
<?php endif; ?>
							</td>
				</tr>
				<tr>
					<th>radio03</th>
							<td>
								<ul class="list_01">
									<li><label><input type="radio" name="radio03" value="1" <?php if ($this->_tpl_vars['form']['radio03'] == 1): ?>checked="checked"<?php endif; ?> />&nbsp;値1</label></li>
									<li><label><input type="radio" name="radio03" value="2" <?php if ($this->_tpl_vars['form']['radio03'] == 2): ?>checked="checked"<?php endif; ?> />&nbsp;値2</label></li>
									<li><label><input type="radio" name="radio03" value="3" <?php if ($this->_tpl_vars['form']['radio03'] == 3): ?>checked="checked"<?php endif; ?> />&nbsp;値3</label></li>
								</ul>
<?php if ($this->_tpl_vars['msg']['radio03']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['radio03']; ?>
</li>
								</ul>
<?php endif; ?>
							</td>
				</tr>
				<tr>
					<th>radio04</th>
							<td>
								<ul class="list_01">
									<li><label><input type="radio" name="radio04" value="1" <?php if ($this->_tpl_vars['form']['radio04'] == 1): ?>checked="checked"<?php endif; ?> />&nbsp;値1</label></li>
									<li><label><input type="radio" name="radio04" value="2" <?php if ($this->_tpl_vars['form']['radio04'] == 2): ?>checked="checked"<?php endif; ?> />&nbsp;値2</label></li>
									<li><label><input type="radio" name="radio04" value="3" <?php if ($this->_tpl_vars['form']['radio04'] == 3): ?>checked="checked"<?php endif; ?> />&nbsp;値3</label></li>
								</ul>
<?php if ($this->_tpl_vars['msg']['radio04']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['radio04']; ?>
</li>
								</ul>
<?php endif; ?>
							</td>
				</tr>
				<tr>
					<th>radio05</th>
							<td>
								<ul class="list_01">
									<li><label><input type="radio" name="radio05" value="1" <?php if ($this->_tpl_vars['form']['radio05'] == 1): ?>checked="checked"<?php endif; ?> />&nbsp;値1</label></li>
									<li><label><input type="radio" name="radio05" value="2" <?php if ($this->_tpl_vars['form']['radio05'] == 2): ?>checked="checked"<?php endif; ?> />&nbsp;値2</label></li>
									<li><label><input type="radio" name="radio05" value="3" <?php if ($this->_tpl_vars['form']['radio05'] == 3): ?>checked="checked"<?php endif; ?> />&nbsp;値3</label></li>
								</ul>
<?php if ($this->_tpl_vars['msg']['radio05']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['radio05']; ?>
</li>
								</ul>
<?php endif; ?>
							</td>
				</tr>
				
				<tr>
					<th>check02/th>
					<td>
						<ul class="list_01">
							<li><label><input type="checkbox" name="check02[]" value="1" <?php if ($this->_tpl_vars['form']['check02']['1']): ?>checked="checked"<?php endif; ?> />&nbsp;値1</label></li>
							<li><label><input type="checkbox" name="check02[]" value="2" <?php if ($this->_tpl_vars['form']['check02']['2']): ?>checked="checked"<?php endif; ?> />&nbsp;値2</label></li>
							<li><label><input type="checkbox" name="check02[]" value="3" <?php if ($this->_tpl_vars['form']['check02']['3']): ?>checked="checked"<?php endif; ?> />&nbsp;値3</label></li>
						</ul>
<?php if ($this->_tpl_vars['msg']['check02']): ?>
						<ul class="error">
							<li><?php echo $this->_tpl_vars['msg']['check02']; ?>
</li>
						</ul>
<?php endif; ?>
					</td>
				</tr>
				<tr>
					<th>check03</th>
							<td>
								<ul class="list_01">
									<li><label><input type="checkbox" name="check03[]" value="1" <?php if ($this->_tpl_vars['form']['check03']['1']): ?>checked="checked"<?php endif; ?> />&nbsp;値1</label></li>
									<li><label><input type="checkbox" name="check03[]" value="2" <?php if ($this->_tpl_vars['form']['check03']['2']): ?>checked="checked"<?php endif; ?> />&nbsp;値2</label></li>
									<li><label><input type="checkbox" name="check03[]" value="3" <?php if ($this->_tpl_vars['form']['check03']['3']): ?>checked="checked"<?php endif; ?> />&nbsp;値3</label></li>
								</ul>
<?php if ($this->_tpl_vars['msg']['check03']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['check03']; ?>
</li>
								</ul>
<?php endif; ?>
							</td>
				</tr>
				<tr>
					<th>check04</th>
							<td>
								<ul class="list_01">
									<li><label><input type="checkbox" name="check04[]" value="1" <?php if ($this->_tpl_vars['form']['check04']['1']): ?>checked="checked"<?php endif; ?> />&nbsp;値1</label></li>
									<li><label><input type="checkbox" name="check04[]" value="2" <?php if ($this->_tpl_vars['form']['check04']['2']): ?>checked="checked"<?php endif; ?> />&nbsp;値2</label></li>
									<li><label><input type="checkbox" name="check04[]" value="3" <?php if ($this->_tpl_vars['form']['check04']['3']): ?>checked="checked"<?php endif; ?> />&nbsp;値3</label></li>
								</ul>
<?php if ($this->_tpl_vars['msg']['check04']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['check04']; ?>
</li>
								</ul>
<?php endif; ?>
							</td>
				</tr>
				<tr>
					<th>check05</th>
							<td>
								<ul class="list_01">
									<li><label><input type="checkbox" name="check05[]" value="1" <?php if ($this->_tpl_vars['form']['check05']['1']): ?>checked="checked"<?php endif; ?> />&nbsp;値1</label></li>
									<li><label><input type="checkbox" name="check05[]" value="2" <?php if ($this->_tpl_vars['form']['check05']['2']): ?>checked="checked"<?php endif; ?> />&nbsp;値2</label></li>
									<li><label><input type="checkbox" name="check05[]" value="3" <?php if ($this->_tpl_vars['form']['check05']['3']): ?>checked="checked"<?php endif; ?> />&nbsp;値3</label></li>
								</ul>
<?php if ($this->_tpl_vars['msg']['check05']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['check05']; ?>
</li>
								</ul>
<?php endif; ?>
							</td>
				</tr>
				<tr>
					<th>file01</th>
					<td>
<?php if ($this->_tpl_vars['form']['file01']): ?>
<a href="./file.php?id=<?php echo $this->_tpl_vars['form']['file01']; ?>
"><?php echo $this->_tpl_vars['form']['file01_name']; ?>
</a><br>
<input type="checkbox" name="file01_del" value="1">このファイルを削除<br>
<input type="hidden" name="file01_old" value="<?php echo $this->_tpl_vars['form']['file01']; ?>
">
<?php endif; ?>
					<input type="file" name="file01">
<?php if ($this->_tpl_vars['msg']['file01']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['file01']; ?>
</li>
								</ul>
<?php endif; ?>
					</td>
				</tr>
				<tr>
					<th>file02</th>
					<td>
<?php if ($this->_tpl_vars['form']['file02']): ?>
<a href="./file.php?id=<?php echo $this->_tpl_vars['form']['file02']; ?>
"><?php echo $this->_tpl_vars['form']['file02_name']; ?>
</a><br>
<input type="checkbox" name="file02_del" value="1">このファイルを削除<br>
<input type="hidden" name="file02_old" value="<?php echo $this->_tpl_vars['form']['file02']; ?>
">
<?php endif; ?>
					<input type="file" name="file02">
<?php if ($this->_tpl_vars['msg']['file02']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['file02']; ?>
</li>
								</ul>
<?php endif; ?>
					</td>
				</tr>
				<tr>
					<th>file03</th>
					<td>
<?php if ($this->_tpl_vars['form']['file03']): ?>
<a href="./file.php?id=<?php echo $this->_tpl_vars['form']['file03']; ?>
"><?php echo $this->_tpl_vars['form']['file03_name']; ?>
</a><br>
<input type="checkbox" name="file03_del" value="1">このファイルを削除<br>
<input type="hidden" name="file03_old" value="<?php echo $this->_tpl_vars['form']['file03']; ?>
">
<?php endif; ?>
					<input type="file" name="file03">
<?php if ($this->_tpl_vars['msg']['file03']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['file03']; ?>
</li>
								</ul>
<?php endif; ?>
					</td>
				</tr>
				<tr>
					<th>file04</th>
					<td>
<?php if ($this->_tpl_vars['form']['file04']): ?>
<a href="./file.php?id=<?php echo $this->_tpl_vars['form']['file04']; ?>
"><?php echo $this->_tpl_vars['form']['file04_name']; ?>
</a><br>
<input type="checkbox" name="file04_del" value="1">このファイルを削除<br>
<input type="hidden" name="file04_old" value="<?php echo $this->_tpl_vars['form']['file01']; ?>
">
<?php endif; ?>
					<input type="file" name="file04">
<?php if ($this->_tpl_vars['msg']['file04']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['file04']; ?>
</li>
								</ul>
<?php endif; ?>
					</td>
				</tr>
				<tr>
					<th>file05</th>
					<td>
<?php if ($this->_tpl_vars['form']['file05']): ?>
<a href="./file.php?id=<?php echo $this->_tpl_vars['form']['file05']; ?>
"><?php echo $this->_tpl_vars['form']['file05_name']; ?>
</a><br>
<input type="checkbox" name="file05_del" value="1">このファイルを削除<br>
<input type="hidden" name="file05_old" value="<?php echo $this->_tpl_vars['form']['file05']; ?>
">
<?php endif; ?>
					<input type="file" name="file05">
<?php if ($this->_tpl_vars['msg']['file05']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['file05']; ?>
</li>
								</ul>
<?php endif; ?>
					</td>
				</tr>

				<tr>
					<th>select02</th>
					<td>
						<select name="select02">
							<option value="">----</option>
							<option value="1" <?php if ($this->_tpl_vars['form']['select02'] == 1): ?>selected="selected"<?php endif; ?>>値1</option>
							<option value="2" <?php if ($this->_tpl_vars['form']['select02'] == 2): ?>selected="selected"<?php endif; ?>>値2</option>
							<option value="3" <?php if ($this->_tpl_vars['form']['select02'] == 3): ?>selected="selected"<?php endif; ?>>値3</option>
						</select>
<?php if ($this->_tpl_vars['msg']['select02']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['select02']; ?>
</li>
								</ul>
<?php endif; ?>
					</td>
				</tr>
				<tr>
					<th>select03</th>
					<td>
						<select name="select03">
							<option value="">----</option>
							<option value="1" <?php if ($this->_tpl_vars['form']['select03'] == 1): ?>selected="selected"<?php endif; ?>>値1</option>
							<option value="2" <?php if ($this->_tpl_vars['form']['select03'] == 2): ?>selected="selected"<?php endif; ?>>値2</option>
							<option value="3" <?php if ($this->_tpl_vars['form']['select03'] == 3): ?>selected="selected"<?php endif; ?>>値3</option>
						</select>
<?php if ($this->_tpl_vars['msg']['select03']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['select03']; ?>
</li>
								</ul>
<?php endif; ?>
					</td>
				</tr>
				<tr>
					<th>select04</th>
					<td>
						<select name="select04">
							<option value="">----</option>
							<option value="1" <?php if ($this->_tpl_vars['form']['select04'] == 1): ?>selected="selected"<?php endif; ?>>値1</option>
							<option value="2" <?php if ($this->_tpl_vars['form']['select04'] == 2): ?>selected="selected"<?php endif; ?>>値2</option>
							<option value="3" <?php if ($this->_tpl_vars['form']['select04'] == 3): ?>selected="selected"<?php endif; ?>>値3</option>
						</select>
<?php if ($this->_tpl_vars['msg']['select04']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['select04']; ?>
</li>
								</ul>
<?php endif; ?>
					</td>
				</tr>
				<tr>
					<th>select05</th>
					<td>
						<select name="select05">
							<option value="">----</option>
							<option value="1" <?php if ($this->_tpl_vars['form']['select05'] == 1): ?>selected="selected"<?php endif; ?>>値1</option>
							<option value="2" <?php if ($this->_tpl_vars['form']['select05'] == 2): ?>selected="selected"<?php endif; ?>>値2</option>
							<option value="3" <?php if ($this->_tpl_vars['form']['select05'] == 3): ?>selected="selected"<?php endif; ?>>値3</option>
						</select>
<?php if ($this->_tpl_vars['msg']['select05']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['select05']; ?>
</li>
								</ul>
<?php endif; ?>
					</td>
				</tr>-->
						<tr>
							<th>備考</th>
							<td>
								<textarea class="textarea_w96p" name="biko" cols="30" rows="5"><?php echo $this->_tpl_vars['form']['biko']; ?>
</textarea>
<?php if ($this->_tpl_vars['msg']['biko']): ?>
								<div class="error">
									<li><?php echo $this->_tpl_vars['msg']['biko']; ?>
</li>
								</div>
<?php endif; ?>
							</td>
						</tr>
				</tr>
					

<!--
						<tr>
							<th>
								<span class="fl">利用規約</span>
								<em class="fr"><img src="<?php echo $this->_tpl_vars['top']; ?>
common/images/em.jpg" width="34" height="16" alt="必須" /></em>
							</th>
							<td>
								<p class="mb05"><a href="<?php echo $this->_tpl_vars['top']; ?>
kiyaku.html" target="_blank">利用規約</a>に</p>
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

<!--<!--<?php if (! $this->_tpl_vars['login']): ?>
						<tr>
							<th>会員登録</th>
							<td>
							<div class="pass">
								<label><input type="checkbox" name="regist" value="1" id="pass01" class="on-off" <?php if ($this->_tpl_vars['form']['regist'] == 1): ?>checked="checked"<?php endif; ?> />&nbsp;会員登録する</label>
									<ul>
										<li>会員登録する場合は、ログイン用パスワードを設定してください。</li>
										<li>パスワード：<input class="txt_w250" type="password" name="passwd" value="<?php echo $this->_tpl_vars['form']['passwd']; ?>
" />
											<span class="note">※半角英数字で入力してください</span>
										</li>
									</ul>
<?php if ($this->_tpl_vars['msg']['passwd']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['passwd']; ?>
</li>
								</ul>
<?php endif; ?>
							</div>
<?php if ($this->_tpl_vars['msg']['regist']): ?>
								<ul class="error">
									<li><?php echo $this->_tpl_vars['msg']['regist']; ?>
</li>
								</ul>
<?php endif; ?>
							</td>
						</tr>-->
<?php endif; ?>
					</table>

					<dl class="kiyaku ">
						<dt>ご利用規約</dt>
						<dd>
							<div class="wrap">
							
<div class="tx-bold">保育bizのサービス内容</div>
<p class="mb10">保育bizに掲載された情報は取材時または掲載開始時の情報を表示しております。
検索結果として表示される情報の正確さ、信頼性、完全性、合法性、道徳性、著作権の許諾などについて保育bizは一切の責任を負いません。</p>

<div class="tx-bold">利用規約の範囲</div>
<p class="mb10">保育bizの利用者は保育bizの利用に関して適用される、以下の利用規約を承認するものとします。</p>

<div class="tx-bold">利用規約の変更</div>
<p class="mb10">本利用規約は如何なる理由でも通知なしに変更する場合があります。</p>

<div class="tx-bold">サービスの変更・停止</div>
<p class="mb10">当社は、当サイトの全てまたは一部のサービスをいつでも、変更または停止することができるものとします。サービス変更・停止の際、当社はできうる限りの方法で、利用者に対してその旨を事前に告知するものとします。但し、天災などやむを得ぬ場合は事前に告知することなく、サービスを変更・停止できるものとします。 サービスの変更または停止に伴い、利用者に損害が発生した場合、当社は一切の責任を負わないものとします。</p>

<div class="tx-bold">責任の制約</div>
<p class="mb10">如何なる状況においても当社は、第三者を介したものも含め、本ソフトウェアまたはサービスの利用者による使用または誤用に対する責任を一切負いません。この責任の制約は、当社が、そのような損害の可能性について通告されていた場合であっても、それが保証、契約、故意または無意識による不法行為、その他に基づいているかどうかによらず、直接、間接、付随、結果的、特殊、懲戒的および懲罰的損害賠償を回避するために適用されます。この責任の制約は、損害が、第三者を介したものも含め、本ソフトウェアまたはサービスの使用または誤用および依存の結果であるか、本ソフトウェアまたはサービスを使用できないためか、本ソフトウェアまたはサービスの中断、一時停止、終了のいずれかの結果かにかかわらず、適用されます。この責任の制約は、権利侵害の防止方法による本質的目的の不履行にかかわらず法律で許容された最大の範囲で適用されます。</p>


<div class="tx-bold">禁止事項</div>
<p>利用者は、保育bizにおいて以下の行為をすることはできません。</p>
<ul class="mb10">
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
<p class="mb10">保育bizは、ホームページ内に掲載された求人情報を自動的に検索し、結果を作成しております。保育bizは、検索結果として表示される内容に関して、カテゴリ分類目的以外の内容確認をおこなっておりません。 検索結果として表示される情報の正確さ、信頼性、完全性、合法性、道徳性、著作権の許諾などについて保育bizは一切の責任を負いません。</p>


<div class="tx-bold">著作権</div>
<p class="mb10">保育bizのレイアウト、デザインおよび構造に関する著作権は株式会社タキザワキャリアに帰属します。保育bizのホームページや検索結果ページをWEBサイトで反映し、検索結果をリフォーマットして表示することは禁じられています。</p>

<div class="tx-bold">その他</div>
<p class="mb10">利用者のみなさまと保育bizの関係につきましては、日本国法が適用されるものとします。</p>
							</div>
						</dd>
					</dl>
					<div class="btn_wrap">
					  <input type="submit" id="btn-submit"  class="button-submit opa" value="送信する" />
					</div>
</form>
				</div><!-- //.contact_form -->
			</div><!-- //.detail_contact -->
			</div>
		</div>
		<!-- メインコンテンツ終了 -->
	</div>
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