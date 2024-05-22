<?php /* Smarty version 2.6.22, created on 2017-10-23 14:58:33
         compiled from top.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="content-script-Type" content="text/javascript" />
<title>管理者画面</title>
<LINK rel="stylesheet" href="css/admin.css" type="text/css" media="screen" />
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
<h2>設定</h2>
</div>

<div class="box">

<div class="submenu">
&nbsp;</div>


<div class="cts">

<?php if ($this->_tpl_vars['message']): ?>
<div class="error"><?php echo $this->_tpl_vars['message']; ?>
</div>
<?php endif; ?>

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