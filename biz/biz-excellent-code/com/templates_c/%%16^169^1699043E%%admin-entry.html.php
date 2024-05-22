<?php /* Smarty version 2.6.22, created on 2021-06-18 17:45:19
         compiled from admin-entry.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'admin-entry.html', 183, false),array('modifier', 'date2days', 'admin-entry.html', 204, false),)), $this); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>応募管理 | 管理画面</title>
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

<h1>応募管理</h1>

<ol class="breadcrumb">
<li><a href="admin.html"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">応募管理</li>
</ol>
</section>


<!-- Main content -->
<section class="content">

<div class="row">
<div class="col-md-8">

<div class="box box-default same_height">
<div class="box-header with-border">
<i class="fa fa-search"></i>
<h3 class="box-title">絞り込む</h3>
</div><!-- /.box-header -->

<form name="form1" action="./" method="get" class="form-horizontal">
<input type="hidden" name="act" value="admin-entry">
<input type="hidden" name="mode" value="form">
<input type="hidden" name="page" value="">
<input type="hidden" name="order" value="">
<input type="hidden" name="csv" value="">

<div class="box-body">
<div class="row">

<div class="col-sm-6 col-xs-12 mb10">
<label>応募者名、応募No</label>
<input class="form-control" type="text" name="name" value="<?php echo $this->_tpl_vars['form']['name']; ?>
">
</div>

<div class="col-sm-6 col-xs-12 mb10">
<label>求人タイトル、求人No</label>
<input class="form-control" type="text" name="title" value="<?php echo $this->_tpl_vars['form']['title']; ?>
">
</div>

<div class="col-sm-6 col-xs-12 mb10">
<label>応募日</label>
<div>
<input class="input_date form-control" type="text" name="date_from" value="<?php echo $this->_tpl_vars['form']['date_from']; ?>
" id="datepicker">
～
<input class="input_date form-control" type="text" name="date_to" value="<?php echo $this->_tpl_vars['form']['date_to']; ?>
" id="datepicker2">
</div>
</div>

<div class="col-sm-6 col-xs-12 mb10">
<label>種別</label>
<select name="kind" class="form-control">
<option value="">---&nbsp;指定しない&nbsp;---</option>
<option value="1" <?php if ($this->_tpl_vars['form']['kind'] == '1'): ?>selected="selected"<?php endif; ?>>応募</option>
<option value="2" <?php if ($this->_tpl_vars['form']['kind'] == '2'): ?>selected="selected"<?php endif; ?>>問合せ</option>
</select>
</div>

<div class="col-sm-6 col-xs-12 mb10">
<label>ステータス</label>
<select name="status" class="form-control">
<option value="">---&nbsp;指定しない&nbsp;---</option>
<option value="0" <?php if ($this->_tpl_vars['form']['status'] === '0'): ?>selected="selected"<?php endif; ?>>未対応</option>
<option value="1" <?php if ($this->_tpl_vars['form']['status'] == '1'): ?>selected="selected"<?php endif; ?>>対応中</option>
<option value="2" <?php if ($this->_tpl_vars['form']['status'] == '2'): ?>selected="selected"<?php endif; ?>>対応終了</option>
</select>
</div>

<div class="col-sm-6 col-xs-12 mb10">
<label>対応者</label>
<select name="tantou_id" class="form-control">
<option value="">---&nbsp;指定しない&nbsp;---</option>
<?php $_from = $this->_tpl_vars['tantou_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<option value="<?php echo $this->_tpl_vars['item']['tantou_id']; ?>
" <?php if ($this->_tpl_vars['form']['tantou_id'] === $this->_tpl_vars['item']['tantou_id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['item']['name']; ?>
</option>
<?php endforeach; endif; unset($_from); ?>
</select>
</div>

</div>

<div class="row">
<div class="col-sm-4 col-xs-12 col-sm-offset-4">
<button type="button" class="btn btn-block btn-success" onClick="document.form1.submit()">検索する</button>
</div>
</div>

</div><!-- /.box-body -->
</form>

</div><!-- /.box -->
</div>


<div class="col-md-4">
<div class="box box-default same_height">
<div class="box-body">

<?php if ($this->_tpl_vars['admin']['auth4']['4']): ?>
<div>
<a href="javascript:do_csv()" class="btn btn-block btn-default"><i class="fa fa-download "></i> 応募情報をエクスポートする</a>
</div>
<?php endif; ?>

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
<th>
<?php if ($this->_tpl_vars['order'] == 1): ?>▲<?php else: ?><a href="javascript:do_order(1)">▲</a><?php endif; ?>
<?php if ($this->_tpl_vars['order'] == 2): ?>▼<?php else: ?><a href="javascript:do_order(2)">▼</a><?php endif; ?>
&nbsp;応募日</th>
<th>種別</th>
<th width="150">応募者名</th>
<th>メールアドレス</th>
<th width="40%">求人タイトル</th>
<th>対応担当者</th>
<th>ステータス</th>
<th>
<?php if ($this->_tpl_vars['order'] == 3): ?>▲<?php else: ?><a href="javascript:do_order(3)">▲</a><?php endif; ?>
<?php if ($this->_tpl_vars['order'] == 4): ?>▼<?php else: ?><a href="javascript:do_order(4)">▼</a><?php endif; ?>
&nbsp;放置日</th>
<?php if ($this->_tpl_vars['admin']['auth4']['2']): ?>
<th>応募内容確認</th>
<?php endif; ?>
<?php if ($this->_tpl_vars['admin']['auth4']['3']): ?>
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
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['reg_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y/%m/%d %H:%M:%S") : smarty_modifier_date_format($_tmp, "%Y/%m/%d %H:%M:%S")); ?>
</td>
<td><!--<?php if ($this->_tpl_vars['item']['text10'] == 1): ?>Indeed<?php endif; ?>--><?php if ($this->_tpl_vars['item']['kind'] == 1): ?>応募<?php else: ?>問合せ<?php endif; ?><p class="no_01">No.<?php echo $this->_tpl_vars['item']['seq']; ?>
</p></td>
<td><!--<a href="admin-user-edit.html&id=<?php echo $this->_tpl_vars['item']['user_id']; ?>
">--><?php echo $this->_tpl_vars['item']['name']; ?>
 <?php if ($this->_tpl_vars['item']['age']): ?>(<?php echo $this->_tpl_vars['item']['age']; ?>
)<?php endif; ?><!--</a>-->
<p class="no_01"><!--<?php if ($this->_tpl_vars['item']['regist']): ?>会員<?php else: ?>非会員<?php endif; ?>--></p>
</td>
<td><a href="mailto:<?php echo $this->_tpl_vars['item']['email']; ?>
"><?php echo $this->_tpl_vars['item']['email']; ?>
</a></td>
<td>
<?php if ($this->_tpl_vars['item']['item_id']): ?>
<a href="admin-item-edit.html&id=<?php echo $this->_tpl_vars['item']['item_id']; ?>
" target="_blank">【<?php echo $this->_tpl_vars['item']['kinmu_pref']; ?>
<?php echo $this->_tpl_vars['item']['kinmu_city']; ?>
】<?php echo $this->_tpl_vars['item']['title']; ?>
</a><p class="no_01">求人No.<?php echo $this->_tpl_vars['item']['item_id']; ?>
</p>
<?php else: ?>
コンサルタント相談のみで該当求人なし
<?php endif; ?>
</td>
<td>
<?php if ($this->_tpl_vars['admin']['auth4']['2']): ?>
<a href="admin-authority-edit.html&id=<?php echo $this->_tpl_vars['item']['tantou_id']; ?>
"><?php echo $this->_tpl_vars['item']['tantou']; ?>
</a>
<?php else: ?>
<a href="admin-authority.html&id=<?php echo $this->_tpl_vars['item']['tantou_id']; ?>
"><?php echo $this->_tpl_vars['item']['tantou']; ?>
</a>
<?php endif; ?>
</td>
<td><?php echo $this->_tpl_vars['item']['status']; ?>
</td>
<td><?php if ($this->_tpl_vars['item']['up_date']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['up_date'])) ? $this->_run_mod_handler('date2days', true, $_tmp) : smarty_modifier_date2days($_tmp)); ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['reg_date'])) ? $this->_run_mod_handler('date2days', true, $_tmp) : smarty_modifier_date2days($_tmp)); ?>
<?php endif; ?>日</td>
<?php if ($this->_tpl_vars['admin']['auth4']['2']): ?>
<td>
<a href="admin-entry-detail.html&id=<?php echo $this->_tpl_vars['item']['seq']; ?>
" class="btn btn-block btn-default btn-xs"><i class="fa fa-eye"></i> 確認</a>
</td>
<?php endif; ?>
<?php if ($this->_tpl_vars['admin']['auth4']['3']): ?>
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

</div><!-- /.box-body -->
</div><!-- /.box -->


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
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>

<script src="common/AdminLTE/bootstrap/js/bootstrap.min.js"></script>
<script src="common/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="common/AdminLTE/plugins/fastclick/fastclick.js"></script>
<script src="common/AdminLTE/js/app.min.js"></script>
<script src="common/AdminLTE/js/demo.js"></script>
<script src="common/js/common.js"></script>

<script src="../common/js/mini_ajax.js"></script>
<?php echo '
<script>
$(function(){
	$("#datepicker").datepicker();
	$("#datepicker2").datepicker();
});

function do_delete(id)
{
	if (confirm(\'削除しても良いですか？\')) {
		location = \'./admin-entry.html&mode=delete&id=\' + id;
	}
}
function do_page(page)
{
	document.form1.page.value = page;
	document.form1.submit();
}
function do_csv()
{
	document.form1.csv.value = "1";
	document.form1.submit();
}
function do_order(ord)
{
	document.form1.order.value = ord;
	document.form1.page.value = "";
	document.form1.submit();
}
</script>
'; ?>

</body>
</html>