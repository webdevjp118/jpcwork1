<?php /* Smarty version 2.6.22, created on 2021-06-21 10:37:09
         compiled from admin-login.html */ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>ログイン｜管理画面</title>

<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="common/AdminLTE/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="common/AdminLTE/css/AdminLTE.min.css">
<link rel="stylesheet" href="common/AdminLTE/plugins/iCheck/square/blue.css">
<link rel="stylesheet" href="common/css/common.css">
<link rel="shortcut icon" href="common/img/favicon.ico">

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="hold-transition login-page">


<div class="login-box">

<div class="login-logo">
<a href=""><b>求人管理</b>ログイン</a>
</div><!-- /.login-logo -->

<div class="login-box-body">
<p class="login-box-msg">メールアドレスとパスワードを入力します</p>

<form name="form1" action="login.html" method="post">
<input type="hidden" name="mode" value="form">

<div class="form-group has-feedback">
<input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $this->_tpl_vars['form']['email']; ?>
">
<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
</div>

<div class="form-group has-feedback">
<input type="password" name="passwd" class="form-control" placeholder="Password" value="<?php echo $this->_tpl_vars['form']['passwd']; ?>
">
<span class="glyphicon glyphicon-lock form-control-feedback"></span>
</div>


<?php if ($this->_tpl_vars['msg']): ?>
<div class="alert alert-warning alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h4><i class="icon fa fa-warning"></i> 入力エラー</h4>
<?php $_from = $this->_tpl_vars['msg']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<p><?php echo $this->_tpl_vars['item']; ?>
</p>
<?php endforeach; endif; unset($_from); ?>
</div>
<?php endif; ?>

<div class="row">
<div class="col-xs-8"><!--<div class="checkbox icheck"><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary"><input type="checkbox"> Remember Me</label></div></div>--></div><!-- /.col -->
<div class="col-xs-4"><button type="submit" name="submit" value="submit" class="btn btn-primary btn-block btn-flat">ログイン</button></div><!-- /.col -->
</div>

</form>

<!--<div class="social-auth-links text-center">
<p>- OR -</p>
<a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
Facebook</a>
<a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
Google+</a>
</div>-->
<!-- /.social-auth-links -->

<!--<a href="#">I forgot my password</a><br>-->
<!--<a href="#" class="text-center">Register a new membership</a>-->

<div class="login_footer">
<p><small>powerd by <img src="common/img/logo_palmgate.png" width="71" height="38" alt="palmgate Inc."/></small></p>
</div>

</div><!-- /.login-box-body -->
</div><!-- /.login-box -->


<script src="common/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="common/AdminLTE/bootstrap/js/bootstrap.min.js"></script>
<script src="common/AdminLTE/plugins/iCheck/icheck.min.js"></script>
<?php echo '
<script>
	$(function () {
		$(\'input\').iCheck({
			
			checkboxClass: \'icheckbox_square-blue\',
			radioClass: \'iradio_square-blue\',
			increaseArea: \'20%\' // optional
		});
	});
</script>
'; ?>

</body>
</html>