<?php /* Smarty version 2.6.22, created on 2021-07-26 15:42:42
         compiled from admin-authority-edit.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'admin-authority-edit.html', 87, false),)), $this); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>権限管理 | 管理画面</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="common/AdminLTE/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="common/AdminLTE/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="common/AdminLTE/css/AdminLTE.min.css">
<link rel="stylesheet" href="common/AdminLTE/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="common/css/common.css">
<link rel="shortcut icon" href="common/img/favicon.ico">

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">



<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header_.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/side.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">

<h1>権限管理</h1>

<ol class="breadcrumb">
<li class="active"><i class="fa fa-dashboard"></i> Home</li>
<li><a href="">権限管理</a></li>
<li class="active">登録・編集</li>
</ol>
</section>


<!-- Main content -->
<section class="content">
<div class="row">



<?php if ($this->_tpl_vars['msg']): ?>
<div class="col-xs-12">
<div class="box box-default">

<div class="box-body">
<div class="callout callout-warning">
<h4>入力内容に不備があります</h4>
</div>
</div><!-- /.box-body -->

</div><!-- /.box -->
</div><!-- /.col -->
<?php endif; ?>


<div class="col-sm-8 col-xs-12">
<div class="box box-warning">

<div class="box-header">
<h3 class="box-title">登録・編集</h3>
</div><!-- /.box-header -->

<div class="box-body">


<form name="form1" action="admin-authority-edit.html" method="post">
<input type="hidden" name="mode" value="form">
<input type="hidden" name="seq" value="<?php echo $this->_tpl_vars['form']['seq']; ?>
">
<table id="table_summary" class="table table-bordered table_edit" summary="表">
<tbody>
<?php if ($this->_tpl_vars['tantou']): ?>
<tr>
<th>最終ログイン日時</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['tantou']['last_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y/%m/%d %H:%I:%S") : smarty_modifier_date_format($_tmp, "%Y/%m/%d %H:%I:%S")); ?>
</td>
</tr>
<?php endif; ?>
<tr>
<th>名前<span>必須</span></th>
<td>
<input class="input_w10 form-control" type="text" name="name" value="<?php echo $this->_tpl_vars['form']['name']; ?>
">
<?php if ($this->_tpl_vars['msg']['name']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['name']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>
<tr>
<th>ログインメールアドレス<span>必須</span></th>
<td><input class="input_w10 form-control" type="text" name="email" value="<?php echo $this->_tpl_vars['form']['email']; ?>
">
<?php if ($this->_tpl_vars['msg']['email']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['email']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>
<tr>
<th>ログインパスワード<span>必須</span></th>
<td><input class="input_w10 form-control" type="password" name="passwd" value="<?php echo $this->_tpl_vars['form']['passwd']; ?>
">
<?php if ($this->_tpl_vars['msg']['passwd']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['passwd']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>
<?php if ($this->_tpl_vars['tantou']): ?>
<tr>
<th>担当求人情報</th>
<td>
<?php if ($this->_tpl_vars['tantou']['count']): ?>
<a href="admin-item.html&tantou_id=<?php echo $this->_tpl_vars['form']['seq']; ?>
"><?php echo $this->_tpl_vars['tantou']['count']; ?>
&nbsp;件</a>
<?php else: ?>
0&nbsp;件
<?php endif; ?>
</td>
</tr>
<tr>
<th>担当応募情報</th>
<td>
<?php if ($this->_tpl_vars['tantou']['oubo']): ?>
<a href="admin-entry.html&tantou_id=<?php echo $this->_tpl_vars['form']['seq']; ?>
"><?php echo $this->_tpl_vars['tantou']['oubo']; ?>
&nbsp;件</a>
<?php else: ?>
0&nbsp;件
<?php endif; ?>
</td>
</tr>
<?php endif; ?>
<tr>
<th>権限<span>必須</span></th>
<td id="allCheck">
<div class="kengen_list" style="margin-bottom:15px;">
<p class="kengen_p">すべての権限を</p>
<ul class="kengen_ul">
<li>：</li>
<li><a href="javascript:do_enabled()" class="btn btn-warning"><i class="ion-loop"></i> 有効にする</a></li>
<li><a href="javascript:do_disabled()" class="btn btn-danger"><i class="ion-close"></i> 無効にする</a></li>
</ul>
</div>

<div class="kengen_list">
<p class="kengen_p">権限管理の</p>
<ul class="kengen_ul">
<li>：</li>
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['auth1']['1']): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="auth1[]" value="1" <?php if ($this->_tpl_vars['form']['auth1']['1']): ?>checked="checked"<?php endif; ?> />追加</label></div></li>
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['auth1']['2']): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="auth1[]" value="2" <?php if ($this->_tpl_vars['form']['auth1']['2']): ?>checked="checked"<?php endif; ?> />編集</label></div></li>
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['auth1']['3']): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="auth1[]" value="3" <?php if ($this->_tpl_vars['form']['auth1']['3']): ?>checked="checked"<?php endif; ?> />削除</label></div></li>
</ul>
</div>

<div class="kengen_list">
<p class="kengen_p">求人管理の</p>
<ul class="kengen_ul">
<li>：</li>
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['auth2']['1']): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="auth2[]" value="1" <?php if ($this->_tpl_vars['form']['auth2']['1']): ?>checked="checked"<?php endif; ?> />追加</label></div></li>
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['auth2']['2']): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="auth2[]" value="2" <?php if ($this->_tpl_vars['form']['auth2']['2']): ?>checked="checked"<?php endif; ?> />編集</label></div></li>
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['auth2']['4']): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="auth2[]" value="4" <?php if ($this->_tpl_vars['form']['auth2']['4']): ?>checked="checked"<?php endif; ?> />CSVエクスポート</label></div></li>
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['auth2']['3']): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="auth2[]" value="3" <?php if ($this->_tpl_vars['form']['auth2']['3']): ?>checked="checked"<?php endif; ?> />削除</label></div></li>
</ul>
</div>



<div class="kengen_list">
<p class="kengen_p">応募管理の</p>
<ul class="kengen_ul">
<li>：</li>
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['auth4']['1']): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="auth4[]" value="1" <?php if ($this->_tpl_vars['form']['auth4']['1']): ?>checked="checked"<?php endif; ?> />閲覧</label></div></li>
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['auth4']['2']): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="auth4[]" value="2" <?php if ($this->_tpl_vars['form']['auth4']['2']): ?>checked="checked"<?php endif; ?> />編集</label></div></li>
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['auth4']['4']): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="auth4[]" value="4" <?php if ($this->_tpl_vars['form']['auth4']['4']): ?>checked="checked"<?php endif; ?> />CSVエクスポート</label></div></li>
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['auth4']['3']): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="auth4[]" value="3" <?php if ($this->_tpl_vars['form']['auth4']['3']): ?>checked="checked"<?php endif; ?> />削除</label></div></li>
</ul>
</div>



<div class="kengen_list">
<p class="kengen_p"><span class="txt10">サイトからのお知らせの</span></p>
<ul class="kengen_ul">
<li>：</li>
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['auth5']['1']): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="auth5[]" value="1" <?php if ($this->_tpl_vars['form']['auth5']['1']): ?>checked="checked"<?php endif; ?> />追加</label></div></li>
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['auth5']['2']): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="auth5[]" value="2" <?php if ($this->_tpl_vars['form']['auth5']['2']): ?>checked="checked"<?php endif; ?> />編集</label></div></li>
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['auth5']['3']): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="auth5[]" value="3" <?php if ($this->_tpl_vars['form']['auth5']['3']): ?>checked="checked"<?php endif; ?> />削除</label></div></li>
</ul>
</div>

<div class="kengen_list">
<p class="kengen_p"><span class="txt10">コンテンツ管理の</span></p>
<ul class="kengen_ul">
<li>：</li>
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['auth6']['1']): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="auth6[]" value="1" <?php if ($this->_tpl_vars['form']['auth6']['1']): ?>checked="checked"<?php endif; ?> />追加</label></div></li>
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['auth6']['2']): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="auth6[]" value="2" <?php if ($this->_tpl_vars['form']['auth6']['2']): ?>checked="checked"<?php endif; ?> />編集</label></div></li>
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['auth6']['3']): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="auth6[]" value="3" <?php if ($this->_tpl_vars['form']['auth6']['3']): ?>checked="checked"<?php endif; ?> />削除</label></div></li>
</ul>
</div>


</td>
</tr>
<tr>
<th>設定メール</th>
<td>
<div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['mail'] == 1): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="mail" value="1" <?php if ($this->_tpl_vars['form']['mail'] == 1): ?>checked="checked"<?php endif; ?> />送信する</label></div>
<p class="">※設定メールにはログインURL及びログインに必要なメールアドレスとパスワードが送信されます。</p>
</td>
</tr>
<tr>
<th>ログイン<span>必須</span></th>
<td>

<div class="btn-group btn_radio btn_radio_2col" data-toggle="buttons">
<label class="btn btn-primary<?php if ($this->_tpl_vars['form']['status'] == 1): ?> active<?php endif; ?>"><input type="radio" name="status" autocomplete="off" value="1" <?php if ($this->_tpl_vars['form']['status'] == 1): ?>checked="checked"<?php endif; ?> />可</label>
<label class="btn btn-primary<?php if ($this->_tpl_vars['form']['status'] == 2): ?> active<?php endif; ?>"><input type="radio" name="status" autocomplete="off" value="2" <?php if ($this->_tpl_vars['form']['status'] == 2): ?>checked="checked"<?php endif; ?> />不可</label>
</div>

</td>
</tr>
</tbody>
</table>
<div class="text-right"><a href="javascript:do_confirm()" class="btn btn-warning"><i class="fa fa-floppy-o"></i> 保存</a></div>
</form>

</div><!-- /.box-body -->
</div><!-- /.box -->


</div><!-- /.col -->



<!--right side memo -->
<div class="col-sm-4 col-xs-12">

<div class="box box-primary direct-chat direct-chat-primary">
<div class="box-header with-border">
<?php if ($this->_tpl_vars['tantou']): ?>
<h3 class="box-title"><?php echo $this->_tpl_vars['tantou']['name']; ?>
さんのアクション履歴</h3>
<?php else: ?>
<h3 class="box-title">アクション履歴</h3>
<?php endif; ?>
<div class="box-tools pull-right">
<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
</div>
</div>
<!-- /.box-header -->


<div class="box-body">
<div class="direct-chat-messages">
<?php if ($this->_tpl_vars['tantou']): ?>
<?php if ($this->_tpl_vars['list']): ?>
<table class="table" cellspacing="0" summary="表">
<tbody>
<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<tr>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['reg_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y/%m/%d %H:%M:%S") : smarty_modifier_date_format($_tmp, "%Y/%m/%d %H:%M:%S")); ?>
<p><?php echo $this->_tpl_vars['item']['info']; ?>
<?php echo $this->_tpl_vars['item']['action']; ?>
</p></td>
</tr>
<?php endforeach; endif; unset($_from); ?>
</tbody>
</table>
<?php else: ?>
<p>該当する履歴はありません。</p>
<?php endif; ?>
<?php else: ?>
<p>該当する履歴はありません。</p>
<?php endif; ?>

</div>
</div><!-- /.box-body -->

</div><!--/.direct-chat -->

<?php if ($this->_tpl_vars['pager']): ?>
<div class="row">
<div class="col-xs-6">
<?php if ($this->_tpl_vars['pager']['prev']): ?>
<a href="admin-authority-edit.html&id=<?php echo $this->_tpl_vars['item']['item_id']; ?>
&page=<?php echo $this->_tpl_vars['pager']['prev']['no']; ?>
" class="btn btn-block btn-default btn-xs">前へ</a>
<?php endif; ?>
</div>
<div class="col-xs-6">
<?php if ($this->_tpl_vars['pager']['next']): ?>
<a href="admin-authority-edit.html&id=<?php echo $this->_tpl_vars['item']['item_id']; ?>
&page=<?php echo $this->_tpl_vars['pager']['next']['no']; ?>
" class="btn btn-block btn-default btn-xs">次へ</a>
<?php endif; ?>
</div>
</div>
<?php endif; ?>

</div><!-- /.col -->


</div><!-- /.row -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->



<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer_.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>





<!-- Add the sidebar's background. This div must be placed
immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<script src="common/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="common/AdminLTE/bootstrap/js/bootstrap.min.js"></script>
<script src="common/AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="common/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="common/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="common/AdminLTE/plugins/fastclick/fastclick.js"></script>
<script src="common/AdminLTE/js/app.min.js"></script>
<script src="common/AdminLTE/js/demo.js"></script>
<script src="common/js/common.js"></script>

<script src="../common/js/mini_ajax.js"></script>
<?php echo '
<script>
function do_confirm()
{
	if (confirm("以下の内容で登録しますか？")) {
		document.form1.submit();
	}
}
function do_enabled(){
	$(\'#allCheck .btn-primary\').addClass("active");
	$(\'#allCheck input[type=checkbox]\').prop(\'checked\', true);
}
function do_disabled(){
	$(\'#allCheck .btn-primary\').removeClass("active");
	$(\'#allCheck input[type=checkbox]\').prop(\'checked\', false);
}

</script>
'; ?>


</body>
</html>