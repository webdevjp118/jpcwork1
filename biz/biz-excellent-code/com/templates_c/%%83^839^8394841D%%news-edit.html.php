<?php /* Smarty version 2.6.22, created on 2021-06-22 14:24:50
         compiled from news-edit.html */ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>サイトからのお知らせ管理 | 管理画面</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="common/AdminLTE/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="common/AdminLTE/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="common/AdminLTE/css/AdminLTE.min.css">
<link rel="stylesheet" href="common/AdminLTE/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="common/css/common.css">
<link rel="shortcut icon" href="common/img/favicon.ico">
<link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-lightness/jquery-ui.css" rel="stylesheet" />
<!--
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
-->
<script type="text/javascript" src="common/js/ckeditor/ckeditor.js"></script>
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

<h1>サイトからのお知らせ管理</h1>

<ol class="breadcrumb">
<li class="active"><i class="fa fa-dashboard"></i> Home</li>
<li><a href="">サイトからのお知らせ管理</a></li>
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


<div class="col-xs-12">
<div class="box box-warning">

<div class="box-header">
<h3 class="box-title">登録・編集</h3>
</div><!-- /.box-header -->

<div class="box-body">

<form name="form1" action="news-edit.html" method="post">
<input type="hidden" name="mode" value="form">
<input type="hidden" name="seq" value="<?php echo $this->_tpl_vars['form']['seq']; ?>
">
<table id="table_summary" class="table table-bordered table_edit" summary="表">
<tbody>
<tr>
<th>登録日付<span>必須</span></th>
<td>

<div class="input-group date">
<div class="input-group-addon">
<i class="fa fa-calendar"></i>
</div>
<input type="text" class="form-control pull-right" name="news_date" value="<?php echo $this->_tpl_vars['form']['news_date']; ?>
" id="datepicker">
</div><!-- /.input group -->

<?php if ($this->_tpl_vars['msg']['news_date']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['news_date']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>
<tr>
<th>カテゴリ<span>必須</span></th>
<td>
<select name="kind" class="form-control">
<option value="">選択してください</option>
<option value="1" <?php if ($this->_tpl_vars['form']['kind'] == 1): ?>selected="selected"<?php endif; ?>>お知らせ</option>
<option value="2" <?php if ($this->_tpl_vars['form']['kind'] == 2): ?>selected="selected"<?php endif; ?>>イベント</option>
</select>
<?php if ($this->_tpl_vars['msg']['title']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['title']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>
<tr>
<th>タイトル<span>必須</span></th>
<td>
<input class="input_w10 form-control" type="text" name="title" value="<?php echo $this->_tpl_vars['form']['title']; ?>
">
<?php if ($this->_tpl_vars['msg']['title']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['title']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>
<tr>
                    <th>本文<span class="hissu">必須</span></th>
					<td><textarea class="textarea_w100" name="contents"><?php echo $this->_tpl_vars['form']['contents']; ?>
</textarea></td>
<?php if ($this->_tpl_vars['msg']['contents']): ?>
						<div class="error_message002 mTop05">
							<ul>
								<li><?php echo $this->_tpl_vars['msg']['contents']; ?>
</li>
							</ul>
						</div>
<?php endif; ?>
				</tr>
<tr>
<th>公開・非公開</th>
<td>

<div class="btn-group btn_radio btn_radio_2col" data-toggle="buttons">
<label class="btn btn-primary<?php if ($this->_tpl_vars['form']['status'] == 1): ?> active<?php endif; ?>"><input type="radio" name="status" autocomplete="off" value="1" <?php if ($this->_tpl_vars['form']['status'] == 1): ?>checked="checked"<?php endif; ?> />公開</label>
<label class="btn btn-primary<?php if ($this->_tpl_vars['form']['status'] == 2): ?> active<?php endif; ?>"><input type="radio" name="status" autocomplete="off" value="2" <?php if ($this->_tpl_vars['form']['status'] == 2): ?>checked="checked"<?php endif; ?> />非公開</label>
</div>

<?php if ($this->_tpl_vars['msg']['status']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['status']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>
</tbody>
</table>
<div class="text-right"><a href="javascript:do_confirm()" class="btn btn-warning"><i class="fa fa-floppy-o"></i> 保存</a></div>
</form>


</div><!-- /.box-body -->
</div><!-- /.box -->


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
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>

<script src="common/AdminLTE/bootstrap/js/bootstrap.min.js"></script>
<script src="common/AdminLTE/plugins/fastclick/fastclick.js"></script>
<script src="common/AdminLTE/js/app.min.js"></script>
<script src="common/AdminLTE/js/demo.js"></script>
<script src="common/js/common.js"></script>
<?php echo '
<script>
$(function(){
	$("#datepicker").datepicker();
});

function do_confirm()
{
	if (confirm("以下の内容で登録しますか？")) {
		//nicEditors.findEditor(\'contents1\').saveContent();
		document.form1.submit();
	}
}
</script>
'; ?>


</body>
</html>