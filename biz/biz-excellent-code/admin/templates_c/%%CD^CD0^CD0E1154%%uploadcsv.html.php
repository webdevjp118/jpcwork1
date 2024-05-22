<?php /* Smarty version 2.6.22, created on 2018-04-20 17:33:27
         compiled from uploadcsv.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="content-script-Type" content="text/javascript" />
<title>管理者画面</title>
<LINK rel="stylesheet" href="css/admin.css" type="text/css" media="screen" />
<script type="text/javascript">
<?php echo '
function do_delete()
{
	if (confirm("全てのデータを削除します。よろしいですか？")) {
'; ?>

		window.location = '?act=<?php echo $this->_tpl_vars['form']['name']; ?>
_delete';
<?php echo '
	}
}
function file_search()
{
	str = "files.php?act=filesearch";
	child = window.open(str, "filesearch", "width=400, height=370");
	child.caller = this;
	child.result = document.form1.name;
}
'; ?>

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
<h2><?php echo $this->_tpl_vars['form']['title']; ?>
アップロード・読み込み</h2>
</div>

<div class="box">

<div class="submenu">&nbsp;</div>


<div class="cts">

<?php if ($this->_tpl_vars['message']): ?>
<div class="error"><?php echo $this->_tpl_vars['message']; ?>
</div>
<?php endif; ?>

<form name="form1" enctype="multipart/form-data" method="post" action="?act=<?php echo $this->_tpl_vars['form']['name']; ?>
_uploadcsv">
<input type="hidden" id="mode" name="mode" value="<?php echo $this->_tpl_vars['mode']; ?>
">

<table width="100%" border="0" cellpadding="0" cellspacing="1">
<tr>
<th>アップロードCSV</th>
<td><input type="file" name="upload"></td>
</tr>
<tr>
<th></th>
<td>
<input type="submit" value="アップロード">&nbsp;&nbsp;
</td>
</tr>
</table>

</form>

</div>

</div>

</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

</div>
</body>
</html>