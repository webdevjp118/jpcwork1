<?php /* Smarty version 2.6.22, created on 2021-06-18 17:44:57
         compiled from admin.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'admin.html', 81, false),)), $this); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>管理画面トップ</title>
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

<h1>管理画面<small>トップ</small></h1>

<ol class="breadcrumb">
<li class="active"><i class="fa fa-dashboard"></i> Home</li>
</ol>
</section>


<!-- Main content -->
<section class="content">

<div class="row">





<div class="col-xs-12">
<div class="box">

<div class="box-header">
<h3 class="box-title">サマリー</h3>
</div><!-- /.box-header -->

<div class="box-body">


<?php if ($this->_tpl_vars['list']): ?>
<table id="table_summary" class="table table-bordered table-hover" summary="表">

<thead>
<tr>
<th>アクション日時</th>
<th>アクション者</th>
<th>アクション履歴</th>
</tr>
</thead>

<tbody>
<?php $this->assign('class', 'bg01'); ?>
<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<tr>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['reg_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y/%m/%d %H:%M:%S") : smarty_modifier_date_format($_tmp, "%Y/%m/%d %H:%M:%S")); ?>
</td>
<td>
<?php if ($this->_tpl_vars['admin']['auth1']['2']): ?>
<a href="admin-authority-edit.html&id=<?php echo $this->_tpl_vars['item']['tantou_id']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
</a>
<?php else: ?>
<a href="admin-authority.html"><?php echo $this->_tpl_vars['item']['name']; ?>
</a>
<?php endif; ?>
</td>
<td><?php echo $this->_tpl_vars['item']['info']; ?>
<?php echo $this->_tpl_vars['item']['action']; ?>
</td>
</tr>
<?php if ($this->_tpl_vars['class'] == 'bg01'): ?>
<?php else: ?>
<?php $this->assign('class', 'bg02'); ?>
<?php $this->assign('class', 'bg01'); ?>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>

</tbody>
<tfoot>
<tr>
<th>アクション日時</th>
<th>アクション者</th>
<th>アクション履歴</th>
</tr>
</tfoot>
</table>

<?php else: ?>
<p>登録情報がありません。</p>
<?php endif; ?>


</div><!-- /.box-body -->
</div><!-- /.box -->


</div><!-- /.col -->
</div><!-- /.row -->


<?php if ($this->_tpl_vars['list']): ?>
<div class="paging">

<div class="row">
<div class="col-sm-5">
<div class="dataTables_info" id="table_summary_info" role="status" aria-live="polite">対象件数(<?php echo $this->_tpl_vars['total']; ?>
件)</div>
</div>

<div class="col-sm-7">
<div class="dataTables_paginate paging_simple_numbers" id="table_summary_paginate">
<ul class="pagination">

<?php if ($this->_tpl_vars['pager']['prev']): ?>
<li class="paginate_button previous disabled" id="table_summary_previous">
<a href="javascript:do_page(<?php echo $this->_tpl_vars['pager']['prev']['no']; ?>
)" aria-controls="table_summary" data-dt-idx="<?php echo $this->_tpl_vars['pager']['prev']['no']; ?>
" tabindex="0">前の10件</a>
</li>
<?php endif; ?>

<?php if ($this->_tpl_vars['pager']['prev_skip']): ?>
<!--li class="pagination_skip">
<a href="javascript:do_page(<?php echo $this->_tpl_vars['pager']['top']['no']; ?>
)"><?php echo $this->_tpl_vars['pager']['top']['name']; ?>
</a>&nbsp;…&nbsp;
</li-->
<?php endif; ?>

<?php $_from = $this->_tpl_vars['pager']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<?php if ($this->_tpl_vars['item']['link']): ?>
<li class="paginate_button"><a href="javascript:do_page(<?php echo $this->_tpl_vars['item']['no']; ?>
)" aria-controls="table_summary" data-dt-idx="<?php echo $this->_tpl_vars['item']['name']; ?>
" tabindex="0"><?php echo $this->_tpl_vars['item']['name']; ?>
</a></li>
<?php else: ?>
<li class="paginate_button active"><span><?php echo $this->_tpl_vars['item']['name']; ?>
</span></li>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>

<?php if ($this->_tpl_vars['pager']['next_skip']): ?>
<!--li class="pagination_skip">
<a href="javascript:do_page(<?php echo $this->_tpl_vars['pager']['last']['no']; ?>
)"><?php echo $this->_tpl_vars['pager']['last']['name']; ?>
</a>&nbsp;…&nbsp;
</li-->
<?php endif; ?>

<?php if ($this->_tpl_vars['pager']['next']): ?>
<li class="paginate_button next" id="table_summary_next">
<a href="javascript:do_page(<?php echo $this->_tpl_vars['pager']['next']['no']; ?>
)" aria-controls="table_summary" data-dt-idx="<?php echo $this->_tpl_vars['pager']['next']['no']; ?>
" tabindex="0">次の10件</a>
</li>
<?php endif; ?>

</ul>
</div>
</div>
</div>

</div>
<?php endif; ?>

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
<script src="common/AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script><!--テーブルのJSでのソート・ページング機能の拡張用-->
<script src="common/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js"></script><!--テーブルのJSでのソート・ページング機能の拡張用-->
<script src="common/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="common/AdminLTE/plugins/fastclick/fastclick.js"></script>
<script src="common/AdminLTE/js/app.min.js"></script>
<script src="common/AdminLTE/js/demo.js"></script>
<script src="common/js/common.js"></script>
<?php echo '
<script>

//テーブルのソート・ページング機能の実装用
/*
	$(function () {
		$(\'#table_summary\').DataTable({
			
			"paging": false,//使用する際は、ページングのボタンが2重になるので、テンプレートに手動で挿入したページングのタグを全て削除する
			"lengthChange": false,
			"searching": false,
			"ordering": true,//ソート機能実装用
			"info": false,//データの件数を表示
			"autoWidth": false
		});
	});
*/
</script>
<script type="text/javascript">

function do_page(page){ location = \'./admin.html&page=\' + page; }

</script>
'; ?>

</body>
</html>