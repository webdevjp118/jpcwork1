<?php /* Smarty version 2.6.22, created on 2017-10-23 14:58:29
         compiled from login.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja">

<head>
<META http-equiv="Content-Type" content="text/html; charset=UTF-8">
<META http-equiv="Content-Style-Type" content="text/css">
<meta http-equiv="content-script-Type" content="text/javascript" />
<meta name="robots" content="noindex,nofollow">
<title>管理者画面</title>
<LINK rel="stylesheet" href="css/admin.css" type="text/css">
</head>

<body>

<div id="layout">

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="main" class="clearfix">

<div class="box">

<div class="submenu"> &nbsp;ログイン</div>

<div class="cts">
<!--中身-->


<form name="form1" method="post" action="?act=login">
<table width="100%" border="0" cellpadding="0" cellspacing="1">
<tr>
<th>ID</th>
<td>
<input type="text" name="id" value="" size="40">
</td>
</tr>
<tr>
<th>パスワード</th>
<td><input type="password" name="passwd" value="" size="40"></td>
</tr>
<tr>
<th>&nbsp;</th>
<td>
<input type="submit" value="ログイン">
</td>
</tr>
</table>
</form>
<!--中身--><BR>
</div>


</div>

<div class="btm clearfix">
</div>

</div><!--main-->

<div id="foot">
</div>


</div>
</body>
</html>