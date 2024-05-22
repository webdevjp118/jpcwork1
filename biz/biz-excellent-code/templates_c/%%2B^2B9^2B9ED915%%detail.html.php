<?php /* Smarty version 2.6.22, created on 2021-10-22 16:51:29
         compiled from detail.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'nl2br', 'detail.html', 143, false),)), $this); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="robots" content="index,follow,noarchive" />
<meta name="description" content="<?php echo $this->_tpl_vars['info']['title']; ?>
｜<?php echo $this->_tpl_vars['info']['syokusyu']; ?>
/<?php echo $this->_tpl_vars['info']['koyou']; ?>
の求人を募集中です。<?php echo $this->_tpl_vars['info']['kinmu_pref']; ?>
<?php echo $this->_tpl_vars['info']['kinmu_city']; ?>
の<?php echo $this->_tpl_vars['info']['syokusyu']; ?>
の求人・募集は保育bizにお任せください。">
<meta name="keywords" content="<?php echo $this->_tpl_vars['info']['syokusyu']; ?>
,<?php echo $this->_tpl_vars['info']['koyou']; ?>
,求人,<?php echo $this->_tpl_vars['info']['kinmu_city']; ?>
,">
<title><?php echo $this->_tpl_vars['info']['title']; ?>
｜<?php echo $this->_tpl_vars['info']['kinmu_pref']; ?>
<?php echo $this->_tpl_vars['info']['kinmu_city']; ?>
の<?php echo $this->_tpl_vars['info']['syokusyu']; ?>
の求人・募集｜保育biz</title>

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

<!--slick START---------------------------------->
<script src="<?php echo $this->_tpl_vars['top']; ?>
common/slick/slick.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['top']; ?>
common/slick/slick.css" />
<script src="<?php echo $this->_tpl_vars['top']; ?>
common/slick/custom.js"></script>
<!--slick END---------------------------------->

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
<div id="wrapper" class="bg_gray detail_page">

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<!-- メインイメージ開始 -->
	<aside class="subpage_title detail">
		<div class="mywidth flex column flex-center flex-middle">
			<h1 class="lh18 tx-center my-font02">求人詳細</h1>
			<div class="subpage_title_eng">Detail</div>
		</div>
	</aside>
	<!-- メインイメージ終了 -->

	<!-- パンくず開始 -->
	<div id="topics" class="left pc-only">
		<ul>
			<li><a href="<?php echo $this->_tpl_vars['top']; ?>
">TOP</a>&nbsp;&gt;&nbsp;</li>
			<li><a href="<?php echo $this->_tpl_vars['top']; ?>
s/">絞込み検索</a>&nbsp;&gt;&nbsp;</li>
			<li><a href="<?php echo $this->_tpl_vars['top']; ?>
s/a<?php echo $this->_tpl_vars['info']['kinmu_area']; ?>
/t<?php echo $this->_tpl_vars['info']['kinmu_pref_v']; ?>
/"><?php echo $this->_tpl_vars['info']['kinmu_pref']; ?>
</a>&nbsp;&gt;&nbsp;</li>
			<li><a href="<?php echo $this->_tpl_vars['top']; ?>
s/a<?php echo $this->_tpl_vars['info']['kinmu_area']; ?>
/t<?php echo $this->_tpl_vars['info']['kinmu_pref_v']; ?>
/c<?php echo $this->_tpl_vars['info']['kinmu_city_v']; ?>
/"><?php echo $this->_tpl_vars['info']['kinmu_city']; ?>
</a>&nbsp;&gt;&nbsp;</li>
			<li><?php echo $this->_tpl_vars['info']['title']; ?>
</li>
		</ul>
	</div>
	<!-- パンくず開始 -->

	<!-- コンテンツ開始 -->
	<article id="content" class="clearfix">

		<div class="content_wrap clearfix">

			<div class="recruit_info detail">
				<h2 class="tit my-font02"><?php echo $this->_tpl_vars['info']['title']; ?>
</h2>
				<div class="wrap">
					<div class="info_wrap">
						<div class="image_box">
<?php if ($this->_tpl_vars['info']['image']): ?>
							<img src="<?php echo $this->_tpl_vars['top']; ?>
img.php?id=<?php echo $this->_tpl_vars['info']['image']; ?>
" alt="<?php echo $this->_tpl_vars['info']['title']; ?>
" />
<?php else: ?>
	<?php if ($this->_tpl_vars['info']['item_id']%22 > 0): ?>
		<img src="<?php echo $this->_tpl_vars['top']; ?>
noimg/<?php echo $this->_tpl_vars['info']['item_id']%22; ?>
.jpg" alt="<?php echo $this->_tpl_vars['info']['title']; ?>
" />
	<?php else: ?>
		<img src="<?php echo $this->_tpl_vars['top']; ?>
noimg/22.jpg" alt="<?php echo $this->_tpl_vars['info']['title']; ?>
" />
	<?php endif; ?>
							<!--img src="<?php echo $this->_tpl_vars['top']; ?>
common/images/noimg.png" alt="<?php echo $this->_tpl_vars['info']['title']; ?>
" /-->
<?php endif; ?>
						</div>
						<div class="info">
							<div class="data">
<?php if ($this->_tpl_vars['info']['text02']): ?>
								<dl>
									<dt>施設名</dt>
									<dd><?php echo $this->_tpl_vars['info']['text02']; ?>
</dd>
								</dl>
<?php endif; ?>	
<?php if ($this->_tpl_vars['info']['text01']): ?>
								<dl>
									<dt>施設名</dt>
									<dd><?php echo $this->_tpl_vars['info']['text01']; ?>
</dd>
								</dl>
<?php endif; ?>															
<?php if ($this->_tpl_vars['info']['kinmu_pref']): ?>
								<dl>
									<dt>勤務地</dt>
									<dd><?php echo $this->_tpl_vars['info']['kinmu_pref']; ?>
<?php echo $this->_tpl_vars['info']['kinmu_city']; ?>
<?php echo $this->_tpl_vars['info']['kinmu_address1']; ?>
<?php echo $this->_tpl_vars['info']['kinmu_address2']; ?>
</dd>
								</dl>
<?php endif; ?>
<?php if ($this->_tpl_vars['info']['indeed']): ?>
								<dl>
									<dt>職種</dt>
									<dd><?php echo $this->_tpl_vars['info']['indeed']; ?>
</dd>
								</dl>
<?php endif; ?>
<?php if ($this->_tpl_vars['info']['koyou']): ?>
								<dl>
									<dt>雇用形態</dt>
									<dd><?php echo $this->_tpl_vars['info']['koyou']; ?>
</dd>
								</dl>
<?php endif; ?>

							</div>
							<ul class="category">
<?php $_from = $this->_tpl_vars['mast_kodawari1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item2']):
?>
<?php if ($this->_tpl_vars['info']['kodawari1_v'][$this->_tpl_vars['item2']['id']]): ?>
<li><?php echo $this->_tpl_vars['item2']['name']; ?>
</li>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
							</ul>
						</div>
					</div>
<?php if ($this->_tpl_vars['info']['pr']): ?>
					<dl class="recommend_point">
						<dt>PRメッセージ</dt>
						<dd><?php echo ((is_array($_tmp=$this->_tpl_vars['info']['pr'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</dd>
					</dl>
<?php endif; ?>
					<div class="btn_wrap">
						<a class="btn02 opa" href="<?php echo $this->_tpl_vars['top']; ?>
detail/<?php echo $this->_tpl_vars['info']['item_id']; ?>
/contact/">問い合わせる</a>
					</div>
				</div>
			</div>


			<div class="recruit_data">
				<h2 class="content-title my-font02">求人情報詳細</h2>
				<table class="tb">
<?php if ($this->_tpl_vars['info']['shigoto']): ?>
					<tr>
						<th>仕事内容</th>
						<td><?php echo ((is_array($_tmp=$this->_tpl_vars['info']['shigoto'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</td>
					</tr>
<?php endif; ?>		
					
<?php if ($this->_tpl_vars['info']['kyuyo']): ?>
					<tr>
						<th>給与</th>
						<td><?php echo ((is_array($_tmp=$this->_tpl_vars['info']['kyuyo'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</td>
					</tr>
<?php endif; ?>
					
<?php if ($this->_tpl_vars['info']['jikan']): ?>
					<tr>
						<th>勤務時間</th>
						<td><?php echo ((is_array($_tmp=$this->_tpl_vars['info']['jikan'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</td>
					</tr>
<?php endif; ?>
<?php if ($this->_tpl_vars['info']['kyujitsu']): ?>
					<tr>
						<th>休日</th>
						<td><?php echo ((is_array($_tmp=$this->_tpl_vars['info']['kyujitsu'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</td>
					</tr>
<?php endif; ?>
<?php if ($this->_tpl_vars['info']['shikaku']): ?>
					<tr>
						<th>応募資格</th>
						<td><?php echo ((is_array($_tmp=$this->_tpl_vars['info']['shikaku'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</td>
					</tr>
<?php endif; ?>
<?php if ($this->_tpl_vars['info']['teate']): ?>
					<tr>
						<th>手当</th>
						<td><?php echo ((is_array($_tmp=$this->_tpl_vars['info']['teate'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</td>
					</tr>
<?php endif; ?>
<?php if ($this->_tpl_vars['info']['fukuri']): ?>
					<tr>
						<th>待遇・福利厚生</th>
						<td><?php echo ((is_array($_tmp=$this->_tpl_vars['info']['fukuri'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</td>
					</tr>
<?php endif; ?>
<?php if ($this->_tpl_vars['info']['koutsuu']): ?>
					<tr>
						<th>最寄り駅</th>
						<td><?php echo ((is_array($_tmp=$this->_tpl_vars['info']['koutsuu'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</td>
					</tr>
<?php endif; ?>
				</table>
				<div class="btn_wrap">
					<a class="btn02 opa" href="<?php echo $this->_tpl_vars['top']; ?>
detail/<?php echo $this->_tpl_vars['info']['item_id']; ?>
/contact/">問い合わせる</a>
				</div>
			</div>
			


<?php if ($this->_tpl_vars['info']['consult']): ?>
			<div class="consultant_message">
				<h2 class="content-title my-font02">コンサルタントからの一言</h2>
				<img class="image" src="<?php echo $this->_tpl_vars['top']; ?>
common/images/consultant.png" />
				<div class="message">
					<div class="balloon pc-only">
						<p><?php echo ((is_array($_tmp=$this->_tpl_vars['info']['consult'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p>
					</div>
					<p class="sp-only"><?php echo ((is_array($_tmp=$this->_tpl_vars['info']['consult'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p>
				</div>
			</div>
<?php endif; ?>


			<div class="relation_wrap">
				<h2 class="content-title my-font02">関連求人</h2>
				<div class="slick-class01">
<?php $_from = $this->_tpl_vars['view']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
					<a href="/detail/<?php echo $this->_tpl_vars['item']['item_id']; ?>
/" class="box opa">
						<div class="img_wrap">
<?php if ($this->_tpl_vars['item']['image']): ?>
						  <img src="<?php echo $this->_tpl_vars['top']; ?>
img.php?id=<?php echo $this->_tpl_vars['item']['image']; ?>
" alt="<?php echo $this->_tpl_vars['item']['title']; ?>
" />
<?php else: ?>
	<?php if ($this->_tpl_vars['item']['item_id']%22 > 0): ?>
		<img src="<?php echo $this->_tpl_vars['top']; ?>
noimg/<?php echo $this->_tpl_vars['item']['item_id']%22; ?>
.jpg" alt="<?php echo $this->_tpl_vars['item']['title']; ?>
" />
	<?php else: ?>
		<img src="<?php echo $this->_tpl_vars['top']; ?>
noimg/22.jpg" alt="<?php echo $this->_tpl_vars['item']['title']; ?>
" />
	<?php endif; ?>
						  <!--img src="<?php echo $this->_tpl_vars['top']; ?>
common/images/noimg.png" alt="<?php echo $this->_tpl_vars['item']['title']; ?>
" /-->
<?php endif; ?>
<?php if ($this->_tpl_vars['item']['syokusyu']): ?><div class="occu point-back02 white f13 lh10"><?php echo $this->_tpl_vars['item']['syokusyu']; ?>
</div><?php endif; ?>
						</div><!-- //.img_wrap -->
						<div class="txt_wrap">
						  <div class="base-color01 tx-bold f14 lh16"><?php echo $this->_tpl_vars['item']['title']; ?>
</div>
						
						</div><!-- //.txt_wrap -->
					</a><!-- //.box -->
<?php endforeach; endif; unset($_from); ?>
				</div><!-- //.slick-class01 -->
			</div><!-- //.relation_wrap -->

<?php if ($this->_tpl_vars['recommend']): ?>
			<div class="relation_wrap">
				<h2 class="content-title my-font02">コンサルタントおすすめの求人</h2>
				<div class="slick-class01">
<?php $_from = $this->_tpl_vars['recommend']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
					<a href="/detail/<?php echo $this->_tpl_vars['item']['item_id']; ?>
/" class="box opa">
						<div class="img_wrap">
<?php if ($this->_tpl_vars['item']['image']): ?>
						  <img src="<?php echo $this->_tpl_vars['top']; ?>
img.php?id=<?php echo $this->_tpl_vars['item']['image']; ?>
" alt="<?php echo $this->_tpl_vars['item']['title']; ?>
" />
<?php else: ?>
						  <img src="<?php echo $this->_tpl_vars['top']; ?>
common/images/noimg.png" alt="<?php echo $this->_tpl_vars['item']['title']; ?>
" />
<?php endif; ?>
<?php if ($this->_tpl_vars['item']['syokusyu']): ?><div class="occu point-back02 white f13 lh10"><?php echo $this->_tpl_vars['item']['syokusyu']; ?>
</div><?php endif; ?>
						</div><!-- //.img_wrap -->
						<div class="txt_wrap">
						  <div class="base-color01 tx-bold f14 lh16"><?php echo $this->_tpl_vars['item']['title']; ?>
</div>
						  <p class="f13 lh18 base-color01">テキストが入るテキストが入るテキストが入るテキストが入る</p>
						</div><!-- //.txt_wrap -->
					</a><!-- //.box -->
<?php endforeach; endif; unset($_from); ?>
				</div><!-- //.slick-class01 -->
			</div><!-- //.relation_wrap -->
<?php endif; ?>

			
			<div class="other_conditions">
				<h2 class="content-title my-font02">この求人は以下の条件に合致しています<span class="note pc-only">※リンクをクリックすると以下の条件の求人情報一覧ページへ移動します。</span></h2>
				<p class="note sp-only">※リンクをクリックすると以下の条件の求人情報一覧ページへ移動します。</p>
				<dl>
					<dt class="point-back02 white">勤務地</dt>
					<dd>
<?php if ($this->_tpl_vars['info']['kinmu_city_v']): ?>
					  <ul>
						<li><a href="<?php echo $this->_tpl_vars['top']; ?>
s/a<?php echo $this->_tpl_vars['info']['kinmu_area']; ?>
/t<?php echo $this->_tpl_vars['info']['kinmu_pref_v']; ?>
" class="opa"><?php echo $this->_tpl_vars['info']['kinmu_pref']; ?>
</a></li>
						<li><a href="<?php echo $this->_tpl_vars['top']; ?>
s/a<?php echo $this->_tpl_vars['info']['kinmu_area']; ?>
/t<?php echo $this->_tpl_vars['info']['kinmu_pref_v']; ?>
/c<?php echo $this->_tpl_vars['info']['kinmu_city_v']; ?>
" class="opa"><?php echo $this->_tpl_vars['info']['kinmu_city']; ?>
</a></li>
					  </ul>
<?php else: ?>
					  <ul>
						<li><a href="<?php echo $this->_tpl_vars['top']; ?>
s/t<?php echo $this->_tpl_vars['info']['kinmu_pref_v']; ?>
" class="opa"><?php echo $this->_tpl_vars['info']['kinmu_pref']; ?>
<?php echo $this->_tpl_vars['info']['kinmu_city']; ?>
</a></li>
					  </ul>
<?php endif; ?>
					</dd>
				</dl>
				<dl>
					<dt class="point-back02 white">職種</dt>
					<dd>
<?php if ($this->_tpl_vars['info']['syokusyu_v']): ?>
					  <ul>
<?php $_from = $this->_tpl_vars['info']['syokusyu_v']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
						<li><a href="<?php echo $this->_tpl_vars['top']; ?>
s/s<?php echo $this->_tpl_vars['key']; ?>
/" class="opa"><?php echo $this->_tpl_vars['item']; ?>
</a></li>

<?php endforeach; endif; unset($_from); ?>
					  </ul>
<?php endif; ?>
					</dd>
				</dl>
				<dl>
					<dt class="point-back02 white">雇用形態</dt>
					<dd>
<?php if ($this->_tpl_vars['info']['koyou_v']): ?>
					  <ul>
<?php $_from = $this->_tpl_vars['info']['koyou_v']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
						<li><a href="<?php echo $this->_tpl_vars['top']; ?>
s/k<?php echo $this->_tpl_vars['key']; ?>
/" class="opa"><?php echo $this->_tpl_vars['item']; ?>
</a></li>
<?php endforeach; endif; unset($_from); ?>
					  </ul>
<?php endif; ?>
					</dd>
				</dl>
				<dl>
					<dt class="point-back02 white">こだわり</dt>
					<dd>
<?php if ($this->_tpl_vars['info']['kodawari1_v']): ?>
					  <ul>
<?php $_from = $this->_tpl_vars['info']['kodawari1_v']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
						<li><a href="<?php echo $this->_tpl_vars['top']; ?>
s/x<?php echo $this->_tpl_vars['key']; ?>
/" class="opa"><?php echo $this->_tpl_vars['item']; ?>
</a></li>
<?php endforeach; endif; unset($_from); ?>

					  </ul>
<?php endif; ?>
					</dd>
				</dl>
			</div>

		</div>

	</article>
	<!-- コンテンツ終了 -->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<!--<div class="sp-only">
	<div id="follow-fotter">
		<div class="flex flex-space-b">
			<div class="box">
				<a href="tel:03-5789-5255" class="foot-button1 green-back opa2 my-font01 point-color01"><i class="fa fa-phone" aria-hidden="true"></i>03-5789-5255</a>
			</div>
			<div class="box">
				<a href="<?php echo $this->_tpl_vars['top']; ?>
detail/<?php echo $this->_tpl_vars['info']['item_id']; ?>
/contact/" class="foot-button2 white opa2">コーディネーター<br>に相談する</a>
			</div>
		</div>
	</div>
</div>--><!-- //.sp-only -->

</div>
</body>
</html>