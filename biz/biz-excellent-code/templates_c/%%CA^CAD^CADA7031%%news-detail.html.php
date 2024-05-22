<?php /* Smarty version 2.6.22, created on 2021-10-22 15:49:43
         compiled from news-detail.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'news-detail.html', 77, false),array('modifier', 'nl2br', 'news-detail.html', 79, false),)), $this); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="robots" content="index,follow,noarchive" />
<meta name="description" content="保育bizのサイトからのお知らせに関するページです">
<meta name="keywords" content="サイトからのお知らせ,保育士,保育園,幼稚園求人,転職,保育biz">
<meta name="format-detection" content="telephone=no">
<title>サイトからのお知らせ｜保育biz</title>

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
	<aside class="subpage_title news">
		<div class="mywidth flex column flex-center flex-middle">
			<h1 class="lh18 tx-center my-font02">サイトからのお知らせ</h1>
			<div class="subpage_title_eng">News</div>
		</div>
	</aside>
	<!-- メインイメージ終了 -->

	<!--パンくず開始-->
	<div id="topics" class="clearfix pc-only">
		<ol class="clearfix">
			<li><a href="/">TOP</a>&nbsp;&gt;&nbsp;</li>
			<li><a href="<?php echo $this->_tpl_vars['top']; ?>
news/">サイトからのお知らせ</a><!--&nbsp;&gt;&nbsp;--></li>
			<!--<li>サイトからのお知らせ詳細</a></li>-->
		</ol>
	</div>
	<!--パンくず終了-->
	
	<!--コンテンツ開始-->
	<div id="content" class="clearfix">
		<!-- メインコンテンツ開始 -->
		<div id="main">
			<!-- サイトからのお知らせ開始 -->
			<div class="content_wrap mb20 clearfix">
				<div class="wrap clearfix">
					<div class="news_wrap">
						<div class="news_detail">
							<p><?php echo ((is_array($_tmp=$this->_tpl_vars['news']['news_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y/%m/%d") : smarty_modifier_date_format($_tmp, "%Y/%m/%d")); ?>
</p>
							<p class="news_tit point-color02"><?php echo $this->_tpl_vars['news']['title']; ?>
</p>
							<p class="desc"><?php echo ((is_array($_tmp=$this->_tpl_vars['news']['contents'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p>
						</div>
						<div class="btn_back">
							<a href="<?php echo $this->_tpl_vars['top']; ?>
news.html" class="tx-center">一覧へ戻る</a>
						</div>
					</div>
				</div>
			</div>
			<!-- サイトからのお知らせ終了 -->
		</div>
		<!-- メインコンテンツ終了 -->
	</div>
	<!--コンテンツ終了-->
	
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

</div><!--div#wrapper:end-->
</body>
</html>