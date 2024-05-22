<?php /* Smarty version 2.6.22, created on 2018-11-16 09:59:03
         compiled from admin-branch.html */ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>営業所管理 | 管理画面</title>
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

<h1>営業所管理</h1>

<ol class="breadcrumb">
<li><a href="admin.html"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">営業所管理</li>
</ol>
</section>


<!-- Main content -->
<section class="content">

<div class="row">
<div class="col-md-8">


	<div class="box box-default same_height">

	<div class="box-header with-border">
	<i class="fa fa-search"></i>
	<h3 class="box-title">絞り込み検索</h3>
	</div><!-- /.box-header -->

	<form name="form1" action="./" method="get" class="form-horizontal">



	<div class="box-body">

	<input type="hidden" name="act" value="admin-branch">
	<input type="hidden" name="mode" value="form">
	<input type="hidden" name="page" value="">
	<input type="hidden" name="order" value="">

	<div class="row">
	<div class="col-sm-12 col-xs-12 col_vam">
	<label>営業所名</label>
	<input type="text" name="name" value="<?php echo $this->_tpl_vars['form']['name']; ?>
" class="form-control">
	</div>
	</div>
	</div><!-- /.box-body -->


	<div class="box-body">
	<div class="row">
	<div class="col-sm-4 col-xs-12 col-sm-offset-4">
	<button type="button" class="btn btn-block btn-success" onClick="document.form1.submit()">検索する</button>
	</div>
	</div><!-- /.row wrap -->
	</div><!-- /.box-body -->


	</form>
	</div><!-- /.box -->
</div>
<div class="col-md-4">


<div class="box box-default same_height">

<div class="box-header with-border">
<i class="fa fa-search"></i>
<h3 class="box-title">営業所の新規作成</h3>
</div><!-- /.box-header -->

<div class="box-body">

<div class="row">
<div class="col-sm-4 col-xs-12">
<?php if ($this->_tpl_vars['admin']['auth8']['1']): ?>
<a href="admin-branch-edit.html" class="btn btn-warning"><i class="fa fa-plus-square"></i> 新規作成</a>
<?php endif; ?>
</div>

</div><!-- /.row wrap -->
</div><!-- /.box-body -->

</div><!-- /.box -->
</div>


<div class="col-xs-12">
<div class="box box-default">
<div class="box-body">


<?php if ($this->_tpl_vars['list']): ?>
<table id="table_summary" class="table table-bordered table-hover" summary="表">
<thead>
<tr>
<th>営業所名</th>
<?php if ($this->_tpl_vars['admin']['auth8']['2']): ?>
<th>編集</th>
<?php endif; ?>
<?php if ($this->_tpl_vars['admin']['auth8']['3']): ?>
<th>削除</th>
<?php endif; ?>
</tr>
</thead>
<tbody>
<?php $this->assign('class', 'bg01'); ?>
<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<tr>
<td><?php echo $this->_tpl_vars['item']['name']; ?>
</td>
<?php if ($this->_tpl_vars['admin']['auth8']['2']): ?>
<td>
<a href="admin-branch-edit.html&id=<?php echo $this->_tpl_vars['item']['seq']; ?>
" class="btn btn-block btn-default btn-xs"><i class="fa fa-pencil"></i> 編集</a>
</td>
<?php endif; ?>
<?php if ($this->_tpl_vars['admin']['auth8']['3']): ?>
<td>
<a href="javascript:do_delete(<?php echo $this->_tpl_vars['item']['seq']; ?>
)" class="btn btn-block btn-default btn-xs"><i class="fa fa-trash"></i> 削除</a>
</td>
<?php endif; ?>
</tr>
<?php if ($this->_tpl_vars['class'] == 'bg01'): ?>
<?php $this->assign('class', 'bg02'); ?>
<?php else: ?>
<?php $this->assign('class', 'bg01'); ?>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
</tbody>
</table>
<?php else: ?>
<p>登録情報がありません。</p>
<?php endif; ?>


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
function do_delete(id)
{
	if (confirm(\'削除しても良いですか？\')) {
		location = \'./admin-branch.html&mode=delete&id=\' + id;
	}
}
function do_page(page)
{
//	document.form1.page.value = page;
//	document.form1.submit();
	document.location = \'admin-branch.html&page=\' + page;
}
</script>
'; ?>

</body>
</html>