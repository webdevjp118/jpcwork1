<?php /* Smarty version 2.6.22, created on 2017-10-23 14:58:35
         compiled from list.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="content-script-Type" content="text/javascript" />
<title>管理者画面</title>
<LINK rel="stylesheet" href="css/admin.css" type="text/css" media="screen" />
<script type="text/javascript">
<!--
<?php echo '
function delete_conf(id)
{
	if (confirm("削除してもよろしいですか？")) {
'; ?>

		window.location = '?act=<?php echo $this->_tpl_vars['form']['name']; ?>
_delete&id=' + id;
<?php echo '
	}
}
function do_page(page)
{
	document.form1.page.value = page;
	document.form1.submit();
}
'; ?>

//-->
</script>
</head>

<body>

<div id="layout">

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="main" class="clearfix">

<div class="top">
<h2><?php echo $this->_tpl_vars['page_title']; ?>
</h2>
</div>

<div class="box">

<div class="submenu">
<?php echo $this->_tpl_vars['form']['title']; ?>

&nbsp;
<?php if (! $this->_tpl_vars['form']['nonew']): ?>
<!--div style="float:right"><a href="?act=<?php echo $this->_tpl_vars['form']['name']; ?>
_new">新規追加</a></div-->
<div style="float:right;"><input type="button" value=" 新規追加 " onClick="location='?act=<?php echo $this->_tpl_vars['form']['name']; ?>
_new'"></div>
<?php endif; ?>
</div>

<div class="cts">
<!--中身-->

<?php if (! $this->_tpl_vars['form']['nonew']): ?>
<!--a href="?act=<?php echo $this->_tpl_vars['form']['name']; ?>
_new">新規追加</a-->
<?php endif; ?>

<?php if ($this->_tpl_vars['message']): ?>
<div class="error"><?php echo $this->_tpl_vars['message']; ?>
</div>
<?php endif; ?>

<form name="form1" method="get">
<input type="hidden" name="act" value="<?php echo $this->_tpl_vars['form']['name']; ?>
_list">
<input type="hidden" name="page" value="">
<?php if ($this->_tpl_vars['search']): ?>
<table width="100%" border="0" cellpadding="0" cellspacing="1">
<?php $_from = $this->_tpl_vars['search']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<tr>
<th><?php echo $this->_tpl_vars['item']['title']; ?>
</th>
<td>
<?php if ($this->_tpl_vars['item']['text']): ?>
<input type="text" name="<?php echo $this->_tpl_vars['item']['name']; ?>
" value="<?php echo $this->_tpl_vars['item']['value']; ?>
" size="40">
<?php endif; ?>
<?php if ($this->_tpl_vars['item']['select']): ?>
<input type="hidden" name="<?php echo $this->_tpl_vars['itm']['name']; ?>
_value" id="<?php echo $this->_tpl_vars['item']['name']; ?>
_value" value="<?php echo $this->_tpl_vars['item']['value']; ?>
">
<select id="<?php echo $this->_tpl_vars['item']['name']; ?>
" name="<?php echo $this->_tpl_vars['item']['name']; ?>
">
<option value=""></option>
<?php $_from = $this->_tpl_vars['item']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item2']):
?>
<option value="<?php echo $this->_tpl_vars['item2']['value']; ?>
" <?php echo $this->_tpl_vars['item2']['sel']; ?>
><?php echo $this->_tpl_vars['item2']['name']; ?>
</option>
<?php endforeach; endif; unset($_from); ?>
</select>
<?php endif; ?>
<?php if ($this->_tpl_vars['item']['date_period']): ?>
<select name="<?php echo $this->_tpl_vars['item']['name']; ?>
_yearfrom">
<option value=""></option>
<?php $_from = $this->_tpl_vars['item']['yearfrom']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item2']):
?>
<option value="<?php echo $this->_tpl_vars['item2']['value']; ?>
" <?php echo $this->_tpl_vars['item2']['sel']; ?>
><?php echo $this->_tpl_vars['item2']['name']; ?>
</option>
<?php endforeach; endif; unset($_from); ?>
</select>/
<select name="<?php echo $this->_tpl_vars['item']['name']; ?>
_monthfrom">
<option value=""></option>
<?php $_from = $this->_tpl_vars['item']['monthfrom']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item2']):
?>
<option value="<?php echo $this->_tpl_vars['item2']['value']; ?>
" <?php echo $this->_tpl_vars['item2']['sel']; ?>
><?php echo $this->_tpl_vars['item2']['name']; ?>
</option>
<?php endforeach; endif; unset($_from); ?>
</select>/
<select name="<?php echo $this->_tpl_vars['item']['name']; ?>
_dayfrom">
<option value=""></option>
<?php $_from = $this->_tpl_vars['item']['dayfrom']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item2']):
?>
<option value="<?php echo $this->_tpl_vars['item2']['value']; ?>
" <?php echo $this->_tpl_vars['item2']['sel']; ?>
><?php echo $this->_tpl_vars['item2']['name']; ?>
</option>
<?php endforeach; endif; unset($_from); ?>
</select>～
<select name="<?php echo $this->_tpl_vars['item']['name']; ?>
_yearto">
<option value=""></option>
<?php $_from = $this->_tpl_vars['item']['yearto']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item2']):
?>
<option value="<?php echo $this->_tpl_vars['item2']['value']; ?>
" <?php echo $this->_tpl_vars['item2']['sel']; ?>
><?php echo $this->_tpl_vars['item2']['name']; ?>
</option>
<?php endforeach; endif; unset($_from); ?>
</select>/
<select name="<?php echo $this->_tpl_vars['item']['name']; ?>
_monthto">
<option value=""></option>
<?php $_from = $this->_tpl_vars['item']['monthto']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item2']):
?>
<option value="<?php echo $this->_tpl_vars['item2']['value']; ?>
" <?php echo $this->_tpl_vars['item2']['sel']; ?>
><?php echo $this->_tpl_vars['item2']['name']; ?>
</option>
<?php endforeach; endif; unset($_from); ?>
</select>/
<select name="<?php echo $this->_tpl_vars['item']['name']; ?>
_dayto">
<option value=""></option>
<?php $_from = $this->_tpl_vars['item']['dayto']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item2']):
?>
<option value="<?php echo $this->_tpl_vars['item2']['value']; ?>
" <?php echo $this->_tpl_vars['item2']['sel']; ?>
><?php echo $this->_tpl_vars['item2']['name']; ?>
</option>
<?php endforeach; endif; unset($_from); ?>
</select>
<?php endif; ?>
<?php if ($this->_tpl_vars['item']['range']): ?>
<input type="text" name="<?php echo $this->_tpl_vars['item']['name']; ?>
_min" value="<?php echo $this->_tpl_vars['item']['value_min']; ?>
" size="20"> ～ 
<input type="text" name="<?php echo $this->_tpl_vars['item']['name']; ?>
_max" value="<?php echo $this->_tpl_vars['item']['value_max']; ?>
" size="20">
<?php endif; ?>
<?php if ($this->_tpl_vars['item']['info']): ?>
<br>
<?php echo $this->_tpl_vars['item']['info']; ?>

<?php endif; ?>
</td>
</tr>
<?php endforeach; endif; unset($_from); ?>
<tr>
<th>&nbsp;</th>
<td>
<input type="button" value="検索" onClick="document.form1.act.value='<?php echo $this->_tpl_vars['form']['name']; ?>
_list';document.form1.submit()">&nbsp;&nbsp;
<?php if ($this->_tpl_vars['csv']): ?>
<input type="button" value="CSV出力" onClick="document.form1.act.value='<?php echo $this->_tpl_vars['form']['name']; ?>
_csv';document.form1.submit()">&nbsp;&nbsp;
<?php endif; ?>
</td>
</tr>
</table>
<br/>
<?php endif; ?>
</form>

<table width="100%" border="0" cellpadding="0" cellspacing="1" class="list">
<tr>
<?php $_from = $this->_tpl_vars['title']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<th><?php echo $this->_tpl_vars['item']['title']; ?>
</th>
<?php endforeach; endif; unset($_from); ?>
<th>&nbsp;</th>
</tr>
<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<tr class="<?php echo $this->_tpl_vars['item']['rowclass']; ?>
">
<?php $_from = $this->_tpl_vars['item']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item2']):
?>
<td><?php echo $this->_tpl_vars['item2']; ?>
</td>
<?php endforeach; endif; unset($_from); ?>
<td>
<?php if ($this->_tpl_vars['form']['preview']): ?>
<a href="<?php echo $this->_tpl_vars['top']; ?>
<?php echo $this->_tpl_vars['form']['preview']; ?>
<?php echo $this->_tpl_vars['item']['id']; ?>
" target="_blank">[プレビュー]</a>&nbsp;&nbsp;
<?php endif; ?>
<?php if (! $this->_tpl_vars['item']['nobuttons']): ?>
<?php $_from = $this->_tpl_vars['buttons']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item2']):
?>
<input type="button" value="<?php echo $this->_tpl_vars['item2']['name']; ?>
" onClick="window.location='<?php echo $this->_tpl_vars['item2']['act']; ?>
<?php echo $this->_tpl_vars['item']['id']; ?>
'">&nbsp;
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>
<?php if (! $this->_tpl_vars['nobuttons']): ?>
<input type="button" value="編集" onClick="window.location='?act=<?php echo $this->_tpl_vars['form']['name']; ?>
_edit&id=<?php echo $this->_tpl_vars['item']['id']; ?>
'">&nbsp;
<input type="button" value="削除" onClick="delete_conf(<?php echo $this->_tpl_vars['item']['id']; ?>
)">
<?php endif; ?>
</td>
</tr>
<?php endforeach; endif; unset($_from); ?>
</table>

<?php if ($this->_tpl_vars['pager']): ?>
<br/>
<?php if ($this->_tpl_vars['pager']['prev']): ?>
<a href="javascript:do_page(<?php echo $this->_tpl_vars['pager']['prev']['no']; ?>
)"><< 前へ</a> |
<?php else: ?>
<< 前へ |
<?php endif; ?>
<?php if ($this->_tpl_vars['pager']['prev_skip']): ?>
 <a href="javascript:do_page(0)">[先頭]</a>  ･･･ 
<?php endif; ?>
<?php $_from = $this->_tpl_vars['pager']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<?php if ($this->_tpl_vars['item']['link']): ?>
<a href="javascript:do_page(<?php echo $this->_tpl_vars['item']['no']; ?>
)">[<?php echo $this->_tpl_vars['item']['name']; ?>
]</a> |
<?php else: ?>
[<?php echo $this->_tpl_vars['item']['name']; ?>
] |
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<?php if ($this->_tpl_vars['pager']['next_skip']): ?>
 ･･･  <a href="javascript:do_page(99999)">[最後]</a> |
<?php endif; ?>
<?php if ($this->_tpl_vars['pager']['next']): ?>
<a href="javascript:do_page(<?php echo $this->_tpl_vars['pager']['next']['no']; ?>
)">次へ >></a>
<?php else: ?>
次へ >>
<?php endif; ?>
<?php endif; ?>

<!--中身-->
</div>


</div>

<div class="btm clearfix">
</div>

</div><!--main-->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

</div>
<?php if ($this->_tpl_vars['script']): ?>
<?php $_from = $this->_tpl_vars['script']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['item']; ?>
"></script>
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>
</body>
</html>