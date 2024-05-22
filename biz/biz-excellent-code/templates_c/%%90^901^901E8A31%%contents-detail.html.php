<?php /* Smarty version 2.6.22, created on 2021-10-22 19:20:56
         compiled from contents-detail.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'nl2br', 'contents-detail.html', 97, false),)), $this); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="robots" content="index,follow,noarchive" />
<meta name="description" content="<?php echo $this->_tpl_vars['info']['contents']; ?>
">
<meta name="keywords" content="<?php echo $this->_tpl_vars['info']['keyword']; ?>
">
<meta name="format-detection" content="telephone=no">
<title><?php echo $this->_tpl_vars['info']['title']; ?>
｜保育biz</title>

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
			<li><a href="<?php echo $this->_tpl_vars['top']; ?>
contentsall/">転職役立ちコラム</a>&nbsp;&gt;&nbsp;</li>
			<!--<li><a href="<?php echo $this->_tpl_vars['top']; ?>
contents/<?php echo $this->_tpl_vars['info']['kind']; ?>
"><?php echo $this->_tpl_vars['info']['kind_name']; ?>
</a>&nbsp;&gt;&nbsp;</li>-->
			<li><?php echo $this->_tpl_vars['info']['title']; ?>
</li>
		</ol>
	</div>
	<!--パンくず終了-->
	
	<!--コンテンツ開始-->
	<div id="content" class="clearfix">
		<!-- メインコンテンツ開始 -->
		<div id="main">
			<!-- コラム開始 -->
			<div class="content_wrap clearfix">
			
				<!-- 特集コンテンツ開始 -->
				<div class="column_wrap detail">
					
					<h2 class="blog_content_title point-color02"><?php echo $this->_tpl_vars['info']['title']; ?>
</h2>

<?php if ($this->_tpl_vars['info_editor']): ?>
<?php $_from = $this->_tpl_vars['info_editor']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['editor_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['editor_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['editor']):
        $this->_foreach['editor_loop']['iteration']++;
?>

<?php if ($this->_tpl_vars['editor']['name'] == 'editor_list'): ?>
<!-- リスト -->
<ul class="blog_content_list">
<?php $_from = $this->_tpl_vars['editor']['text1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['li_val']):
?>
	<li><?php echo $this->_tpl_vars['li_val']; ?>
</li>
<?php endforeach; endif; unset($_from); ?>
</ul>

<?php elseif ($this->_tpl_vars['editor']['name'] == 'editor_memo'): ?>
<!-- 囲みテキスト -->
<div class="blog_content_text2"><?php echo ((is_array($_tmp=$this->_tpl_vars['editor']['text1'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</div>

<?php elseif ($this->_tpl_vars['editor']['name'] == 'editor_textarea'): ?>
<!-- テキスト -->
<div class="blog_content_text"><?php echo ((is_array($_tmp=$this->_tpl_vars['editor']['text1'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</div>

<?php elseif ($this->_tpl_vars['editor']['name'] == 'editor_headline'): ?>
<!-- 見出し大 -->
<h2 class="blog_content_head01"><?php echo $this->_tpl_vars['editor']['text1']; ?>
</h2>

<?php elseif ($this->_tpl_vars['editor']['name'] == 'editor_heading'): ?>
<!-- 見出し中 -->
<h3 class="blog_content_head02"><?php echo $this->_tpl_vars['editor']['text1']; ?>
</h3>

<?php elseif ($this->_tpl_vars['editor']['name'] == 'editor_subheading'): ?>
<!-- 見出し小 -->
<h4 class="blog_content_head03"><?php echo $this->_tpl_vars['editor']['text1']; ?>
</h4>

<?php elseif ($this->_tpl_vars['editor']['name'] == 'editor_images'): ?>
<!-- 画像 -->
<?php $this->assign('alt_num', ($this->_foreach['editor_loop']['iteration']-1)+1); ?>
<?php $this->assign('cap_num', ($this->_foreach['editor_loop']['iteration']-1)+2); ?>
<figure class="blog_content_image"><img src="/img.php?id=<?php echo $this->_tpl_vars['editor']['image']; ?>
" width="80%" alt="<?php echo $this->_tpl_vars['info_editor'][$this->_tpl_vars['alt_num']]['text1']; ?>
"><figcaption><?php echo $this->_tpl_vars['info_editor'][$this->_tpl_vars['cap_num']]['text1']; ?>
</figcaption></figure>

<?php elseif ($this->_tpl_vars['editor']['name'] == 'editor_linktext'): ?>
<!-- リンク -->
<?php $this->assign('editor_linkurl_num', ($this->_foreach['editor_loop']['iteration']-1)+1); ?>
<?php $this->assign('editor_linkblank_num', ($this->_foreach['editor_loop']['iteration']-1)+2); ?>
<a href="<?php echo $this->_tpl_vars['info_editor'][$this->_tpl_vars['editor_linkurl_num']]['text1']; ?>
" <?php if ($this->_tpl_vars['info_editor'][$this->_tpl_vars['editor_linkblank_num']]['text1'] == '1'): ?>target="_blank"<?php endif; ?>><?php echo $this->_tpl_vars['editor']['text1']; ?>
</a>

<?php elseif ($this->_tpl_vars['editor']['name'] == 'editor_htmltext'): ?>
<!-- HTML -->
<?php echo $this->_tpl_vars['editor']['text1']; ?>


<?php endif; ?>

<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>
					<div class="tx-center mt50 sp-mt20 btn_back">
						<a href="<?php echo $this->_tpl_vars['top']; ?>
contentsall/" class="opa">コラム一覧へ戻る</a>
					</div>

				</div><!-- 特集コンテンツ終了 -->
					
			</div><!-- コラム終了 -->
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