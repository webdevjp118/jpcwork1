<?php /* Smarty version 2.6.22, created on 2021-10-23 14:00:09
         compiled from detail-contact-thankyou.html */ ?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="description" content="コーディネーターに相談する<?php if ($this->_tpl_vars['info']['title']): ?>、<?php echo $this->_tpl_vars['info']['title']; ?>
<?php endif; ?>、エントリーページ">
<meta name="keywords" content="<?php if ($this->_tpl_vars['info']['title']): ?><?php echo $this->_tpl_vars['info']['title']; ?>
,<?php endif; ?>">
<meta name="format-detection" content="telephone=no">
<title>コーディネーターに相談する<?php if ($this->_tpl_vars['info']['title']): ?>｜<?php echo $this->_tpl_vars['info']['title']; ?>
<?php endif; ?>｜保育biz</title>

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
	<div id="topics" class="clearfix pc-only">
		<ol class="clearfix">
			<li><a href="/">TOP</a>&nbsp;&gt;&nbsp;</li>
<?php if ($this->_tpl_vars['info']): ?>
<?php if ($this->_tpl_vars['info']['kinmu_pref']): ?>
			<li><a href="<?php echo $this->_tpl_vars['top']; ?>
s/t<?php echo $this->_tpl_vars['info']['kinmu_pref_v']; ?>
"><?php echo $this->_tpl_vars['info']['kinmu_pref']; ?>
</a>&nbsp;&gt;&nbsp;</li>
<?php endif; ?>
<?php if ($this->_tpl_vars['info']['kinmu_city']): ?>
			<li><a href="<?php echo $this->_tpl_vars['top']; ?>
s/c<?php echo $this->_tpl_vars['info']['kinmu_city_v']; ?>
"><?php echo $this->_tpl_vars['info']['kinmu_city']; ?>
</a>&nbsp;&gt;&nbsp;</li>
<?php endif; ?>
			<li><a href="detail/<?php echo $this->_tpl_vars['info']['item_id']; ?>
"><?php echo $this->_tpl_vars['info']['title']; ?>
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
			<div class="content_wrap mb20 clearfix">
				<div class="detail_contact clearfix">
					<div class="contact_form clearfix">
						<p class="desc">登録が完了しました。<br>担当より追ってご連絡させていただきますので、今しばらくお待ちください。</p>
						<div class="tx-center btn_wrap">
							<div class="btn_back"><a href="/" class="opa">トップへ戻る</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- メインコンテンツ終了 -->
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