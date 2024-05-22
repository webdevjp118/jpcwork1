<?php /* Smarty version 2.6.22, created on 2021-10-22 15:48:37
         compiled from contents.html */ ?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="robots" content="index,follow,noarchive" />
<meta name="description" content="保育bizの転職役立ちコラムに関するページです。">
<meta name="keywords" content="転職役立ちコラム,保育士,保育園,幼稚園求人,転職,保育biz">
<meta name="format-detection" content="telephone=no">
<title>転職役立ちコラム｜保育biz</title>

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
	<aside class="subpage_title column">
		<div class="mywidth flex column flex-center flex-middle">
			<h1 class="lh18 tx-center my-font02">転職役立ちコラム</h1>
			<div class="subpage_title_eng">Column</div>
		</div>
	</aside>
	<!-- メインイメージ終了 -->
		
	<!--パンくず開始-->
	<div id="topics" class="clearfix pc-only">
		<ol class="clearfix">
			<li><a href="/">TOP</a>&nbsp;&gt;&nbsp;</li>
			<li>転職役立ちコラム</li>
		</ol>
	</div>
	<!--パンくず終了-->
	
	
	<!--コンテンツ開始-->
	<div id="content" class="clearfix">
		<!-- メインコンテンツ開始 -->
		<div id="main">
		
			<div class="content_wrap clearfix">
			<!-- コラム開始 -->

				
<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
				<div class="column_wrap">
					<div class="column_list_item">
						<a href="<?php echo $this->_tpl_vars['top']; ?>
contents/<?php echo $this->_tpl_vars['item']['kind']; ?>
/<?php echo $this->_tpl_vars['item']['seq']; ?>
" class="img">
<?php if ($this->_tpl_vars['item']['list_image']): ?>
							<img src="<?php echo $this->_tpl_vars['top']; ?>
img.php?id=<?php echo $this->_tpl_vars['item']['list_image']; ?>
" alt="<?php echo $this->_tpl_vars['item']['title']; ?>
" />
<?php else: ?>
							<img src="<?php echo $this->_tpl_vars['top']; ?>
common/images/noimg.png" alt="<?php echo $this->_tpl_vars['item']['title']; ?>
" />
<?php endif; ?>
						</a>
						<div class="right_box">
							<a href="<?php echo $this->_tpl_vars['top']; ?>
contents/<?php echo $this->_tpl_vars['item']['kind']; ?>
/<?php echo $this->_tpl_vars['item']['seq']; ?>
" class="tit"><?php echo $this->_tpl_vars['item']['title']; ?>
</a>
							<p class="desc"><?php echo $this->_tpl_vars['item']['list_text']; ?>
</p>
						</div>
					</div>
				</div>
<?php endforeach; endif; unset($_from); ?>
				

				<!--ページャー開始-->
				<div class="paging clearfix">
				<ul>
					<?php if ($this->_tpl_vars['pager']): ?>
					<?php if ($this->_tpl_vars['pager']['prev']): ?>
						<?php if ($this->_tpl_vars['pager']['prev']['no'] == 0): ?>
						<li class="next"><a href="./">&lt;</a></li>
						<?php else: ?>
						<li class="next"><a href="./<?php echo $this->_tpl_vars['pager']['prev']['no']; ?>
">&lt;</a></li>
						<?php endif; ?>
					<?php else: ?>
					<?php endif; ?>
					<?php $_from = $this->_tpl_vars['pager']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
					<?php if ($this->_tpl_vars['item']['link']): ?>
						<?php if ($this->_tpl_vars['item']['no'] == 0): ?>
						<li><a href="./"><?php echo $this->_tpl_vars['item']['name']; ?>
</a></li>
						<?php else: ?>
						<li><a href="./<?php echo $this->_tpl_vars['item']['no']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
</a></li>
						<?php endif; ?>
					<?php else: ?>
					<li><span class="active"><?php echo $this->_tpl_vars['item']['name']; ?>
</span></li>
					<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>
					<?php if ($this->_tpl_vars['pager']['next']): ?>
					<li class="next"><a href="./<?php echo $this->_tpl_vars['pager']['next']['no']; ?>
">&gt;</a></li>
					<?php else: ?>
					<?php endif; ?>
					<?php endif; ?>
				</ul>
				</div>
				<!--ページャー終了-->


<!--				<div class="column_wrap clearfix">
<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
					<div class="con_01 clearfix">
						<div class="head clearfix">
							<p class="tit"><a href="<?php echo $this->_tpl_vars['top']; ?>
contents/<?php echo $this->_tpl_vars['item']['kind']; ?>
"><?php echo $this->_tpl_vars['item']['keyword']; ?>
</a></p>
						</div>
						<div class="wrap clearfix">
							<div class="message clearfix">
<?php $_from = $this->_tpl_vars['item']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item2']):
?>
								<p class="eclipse">&middot;&nbsp;<a href="<?php echo $this->_tpl_vars['top']; ?>
contents/<?php echo $this->_tpl_vars['item2']['kind']; ?>
/<?php echo $this->_tpl_vars['item2']['seq']; ?>
"><?php echo $this->_tpl_vars['item2']['title']; ?>
</a></p>
<?php endforeach; endif; unset($_from); ?>
							</div>
							<div class="txt_center btn_wrap mb15"><a href="<?php echo $this->_tpl_vars['top']; ?>
contents/<?php echo $this->_tpl_vars['item']['kind']; ?>
">カテゴリ名の記事一覧へ</a></div>
						</div>

					</div>
<?php endforeach; endif; unset($_from); ?>
				</div>-->




			</div><!-- 医師転職コラム終了 -->
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