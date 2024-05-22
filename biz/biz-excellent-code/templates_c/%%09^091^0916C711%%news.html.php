<?php /* Smarty version 2.6.22, created on 2021-10-22 15:49:42
         compiled from news.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'news.html', 79, false),)), $this); ?>
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
<link rel="stylesheet" type="text/css" href="common/css/import.css">

<!-- Font Awesome
 ================================================== -->
<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

<!-- google font
 ================================================== -->
<link href="https://fonts.googleapis.com/earlyaccess/notosansjp.css" rel="stylesheet">

<!-- Java Script
 ================================================== -->
<script src="common/js/jquery.min.js"></script>
<script src="common/js/custom.js"></script>
<script src="common/js/css_browser_selector.js"></script>

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
			<h1 class="lh18 tx-center my-font02">サイトからのお知らせ一覧</h1>
			<div class="subpage_title_eng">News</div>
		</div>
	</aside>
	<!-- メインイメージ終了 -->

	<!--パンくず開始-->
	<div id="topics" class="clearfix pc-only">
		<ol class="clearfix">
			<li><a href="/">TOP</a>&nbsp;&gt;&nbsp;</li>
			<li>サイトからのお知らせ</li>
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
						<table class="tb" cellspacing="0" summary="お知らせ">
<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
							<tr>
								<th><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['news_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y/%m/%d") : smarty_modifier_date_format($_tmp, "%Y/%m/%d")); ?>
</th>
								<td><a href="<?php echo $this->_tpl_vars['top']; ?>
news/<?php echo $this->_tpl_vars['item']['seq']; ?>
"><?php echo $this->_tpl_vars['item']['title']; ?>
</a></td>
							</tr>
<?php endforeach; endif; unset($_from); ?>
						</table>
						<!--<div class="more">
							<a href="<?php echo $this->_tpl_vars['top']; ?>
"><img src="<?php echo $this->_tpl_vars['top']; ?>
common/images/more_01.jpg" width="227" height="26" alt="サイトからのお知らせ一覧はこちら" /></a>
						</div>-->
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