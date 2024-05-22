<?php /* Smarty version 2.6.22, created on 2018-05-15 13:47:41
         compiled from admin-user.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'admin-user.html', 126, false),)), $this); ?>
<?php echo '<?xml'; ?>
 version="1.0" encoding="UTF-8"<?php echo '?>'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<title>会員管理｜管理画面</title>
<link rel="stylesheet" type="text/css" href="common/css/import.css" media="all" />
<script type="text/javascript" src="common/js/jquery.js" charset="utf-8"></script>
<script type="text/javascript" src="common/js/rollover.js" charset="utf-8"></script>


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>
<link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-lightness/jquery-ui.css" rel="stylesheet" />
<script type="text/javascript">
<?php echo '
function do_delete(id)
{
if (confirm(\'削除しても良いですか？\')) {
location = \'./admin-user.html&mode=delete&id=\' + id;
}
}
function do_page(page)
{
document.form1.page.value = page;
document.form1.submit();
}
function do_csv()
{
document.form1.csv.value = 1;
document.form1.submit();
}
function do_order(ord)
{
document.form1.order.value = ord;
document.form1.page.value = "";
document.form1.submit();
}
'; ?>

</script>
</head>
<body>
<div id="wrapper">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!--コンテンツ開始-->
<div id="content">
<div class="wrap">
<h2 class="admin_h2_title">会員管理</h2>
<div class="search_area_01">
<form name="form1" action="./" method="get">
<input type="hidden" name="act" value="admin-user">
<input type="hidden" name="mode" value="form">
<input type="hidden" name="page" value="">
<input type="hidden" name="order" value="">
<input type="hidden" name="csv" value="">
<div class="search_icon_01">
<input class="input_w10 form-control" type="text" name="keyword" value="<?php echo $this->_tpl_vars['form']['keyword']; ?>
">&nbsp;(会員名、会員名ふりがな、会員No、メールアドレス)
<span class="fr mr15"><img class="over" src="common/img/search_btn_02.png" width="160" height="36" alt="検索する" onClick="document.form1.submit()" /></span>
</div>
<!--
<div class="mBtm10 mLft50">
<input class="input_w10 form-control" type="text" name="item" value="<?php echo $this->_tpl_vars['form']['item']; ?>
">&nbsp;(求人タイトル、求人No)
</div>
<ul class="">
<li>ステータス&nbsp;
<select name="status" class="input_w04 form-control">
<option value="">---&nbsp;指定しない&nbsp;---</option>
<option value="0" <?php if ($this->_tpl_vars['form']['status'] == 0): ?>selected="selected"<?php endif; ?>>未対応</option>
<option value="1" <?php if ($this->_tpl_vars['form']['status'] == 1): ?>selected="selected"<?php endif; ?>>対応中</option>
<option value="2" <?php if ($this->_tpl_vars['form']['status'] == 2): ?>selected="selected"<?php endif; ?>>対応終了</option>
</select>
</li>
</ul>
-->
</form>
</div>
<div class="ex_02">
<?php if ($this->_tpl_vars['admin']['auth3']['4']): ?>
<a href="javascript:do_csv()"><p class="">会員情報をエクスポートする</p></a>
<?php endif; ?>
</div>
<?php if ($this->_tpl_vars['list']): ?>
<table class="table_01" cellspacing="0" summary="表">
<tr>
<th>
<?php if ($this->_tpl_vars['order'] == 1): ?>
▲
<?php else: ?>
<a href="javascript:do_order(1)">▲</a>
<?php endif; ?>
<?php if ($this->_tpl_vars['order'] == 2): ?>
▼
<?php else: ?>
<a href="javascript:do_order(2)">▼</a>
<?php endif; ?>
&nbsp;登録日</th>
<th>会員名</th>
<th>メールアドレス</th>
<th>
<?php if ($this->_tpl_vars['order'] == 3): ?>
▲
<?php else: ?>
<a href="javascript:do_order(3)">▲</a>
<?php endif; ?>
<?php if ($this->_tpl_vars['order'] == 4): ?>
▼
<?php else: ?>
<a href="javascript:do_order(4)">▼</a>
<?php endif; ?>
&nbsp;応募件数</th>
<th>直近応募ステータス</th>
<?php if ($this->_tpl_vars['admin']['auth3']['2']): ?>
<th>確認</th>
<?php endif; ?>
<?php if ($this->_tpl_vars['admin']['auth3']['3']): ?>
<th>削除</th>
<?php endif; ?>
</tr>
<?php $this->assign('class', 'bg01'); ?>
<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<tr class="<?php echo $this->_tpl_vars['class']; ?>
" onmouseover="this.style.backgroundColor='#fff4c2'" onmouseout="this.style.backgroundColor=''">
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['reg_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y/%m/%d %H:%M:%S") : smarty_modifier_date_format($_tmp, "%Y/%m/%d %H:%M:%S")); ?>
</td>
<td>
<?php if ($this->_tpl_vars['item']['oubo']): ?>
<a href="admin-user-edit.html&id=<?php echo $this->_tpl_vars['item']['user_id']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
　（<?php echo $this->_tpl_vars['item']['name_kana']; ?>
）</a><p class="no_01">会員No.<?php echo $this->_tpl_vars['item']['user_id']; ?>
</p>
<?php else: ?>
<?php echo $this->_tpl_vars['item']['name']; ?>
　（<?php echo $this->_tpl_vars['item']['name_kana']; ?>
）<p class="no_01">会員No.<?php echo $this->_tpl_vars['item']['user_id']; ?>
</p>
<?php endif; ?>
</td>
<td><a href="mailto:<?php echo $this->_tpl_vars['item']['email']; ?>
"><?php echo $this->_tpl_vars['item']['email']; ?>
</a></td>
<td><a href="admin-entry.html&name=<?php echo $this->_tpl_vars['item']['user_id']; ?>
"><?php echo $this->_tpl_vars['item']['count']; ?>
&nbsp;件</a></td>
<td>
<?php if ($this->_tpl_vars['item']['oubo']): ?>
<?php echo $this->_tpl_vars['item']['oubo']['status']; ?>
<br /><a href="admin-entry-detail.html&id=<?php echo $this->_tpl_vars['item']['oubo']['seq']; ?>
">⇒直近の応募を見る</a>
<?php endif; ?>
</td>
<?php if ($this->_tpl_vars['admin']['auth3']['2']): ?>
<td class="w66">
<a href="admin-user-edit.html&id=<?php echo $this->_tpl_vars['item']['user_id']; ?>
"><img class="over" src="common/img/btn_11.jpg" width="47" height="21" alt="確認" /></a>
</td>
<?php endif; ?>
<?php if ($this->_tpl_vars['admin']['auth3']['3']): ?>
<td class="w66">
<a href="javascript:do_delete(<?php echo $this->_tpl_vars['item']['user_id']; ?>
)"><img class="over" src="common/img/btn_05.jpg" width="47" height="21" alt="削除" /></a>
</td>
<?php endif; ?>
</tr>
<?php if ($this->_tpl_vars['class'] == 'bg01'): ?>
<?php $this->assign('class', 'bg02'); ?>
<?php else: ?>
<?php $this->assign('class', 'bg01'); ?>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
</table>
<div class="paging">
<?php if ($this->_tpl_vars['pager']['prev']): ?>
<a href="javascript:do_page(<?php echo $this->_tpl_vars['pager']['prev']['no']; ?>
)">前の10件</a>
<?php endif; ?>
<?php if ($this->_tpl_vars['pager']['prev_skip']): ?>
<!--a href="javascript:do_page(<?php echo $this->_tpl_vars['pager']['top']['no']; ?>
)"><?php echo $this->_tpl_vars['pager']['top']['name']; ?>
</a>
&nbsp;…&nbsp;-->
<?php endif; ?>
<?php $_from = $this->_tpl_vars['pager']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<?php if ($this->_tpl_vars['item']['link']): ?>
<a href="javascript:do_page(<?php echo $this->_tpl_vars['item']['no']; ?>
)"><?php echo $this->_tpl_vars['item']['name']; ?>
</a>
<?php else: ?>
<span><?php echo $this->_tpl_vars['item']['name']; ?>
</span>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<?php if ($this->_tpl_vars['pager']['next_skip']): ?>
<!--&nbsp;…&nbsp;
<a href="javascript:do_page(<?php echo $this->_tpl_vars['pager']['last']['no']; ?>
)"><?php echo $this->_tpl_vars['pager']['last']['name']; ?>
</a-->
<?php endif; ?>
<?php if ($this->_tpl_vars['pager']['next']): ?>
<a href="javascript:do_page(<?php echo $this->_tpl_vars['pager']['next']['no']; ?>
)">次の10件</a>
<?php endif; ?>
<p>対象件数(<?php echo $this->_tpl_vars['total']; ?>
件)</p>
</div>
<?php else: ?>
<div class="paging">
<p>登録情報がありません。</p>
</div>
<?php endif; ?>
</div></div>
<!--コンテンツ：右コンテンツ終了-->

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
</html>