<?php /* Smarty version 2.6.22, created on 2021-07-26 23:35:08
         compiled from admin-item.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'admin-item.html', 366, false),)), $this); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>求人情報管理 | 管理画面</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="common/AdminLTE/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="common/AdminLTE/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="common/AdminLTE/css/AdminLTE.min.css">
<link rel="stylesheet" href="common/AdminLTE/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="common/css/common.css">
<link rel="shortcut icon" href="common/img/favicon.ico">
<script type="text/javascript">
<?php echo '
function do_import(){

	if(document.form3.csvfile.value == ""){
		window.alert(\'インポートするファイルを選択してください\');
		return false;
	}
	document.form3.submit();
}
'; ?>

</script>
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

<h1>求人情報管理</h1>

<ol class="breadcrumb">
<li><a href="admin.html"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">求人情報管理</li>
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

<input type="hidden" name="act" value="admin-item">
<input type="hidden" name="mode" value="form">
<input type="hidden" name="page" value="">
<input type="hidden" name="order" value="">
<input type="hidden" name="csv" value="">

<div class="row">
<div class="col-sm-12 col-xs-12 col_vam">
<label>求人タイトル、求人No、登録担当者名</label>
<input type="text" name="title" value="<?php echo $this->_tpl_vars['form']['title']; ?>
" class="form-control">
</div>
</div>
</div><!-- /.box-body -->



<div class="box-body">
<div class="row"><!--.row wrap-->

<div class="col-sm-6 col-xs-12 mb10">
<label>エリア</label>
<div class="row">
<div class="col-xs-6">
<select name="pref" class="form-control" onChange="change_pref(this.value)">
<option value="">---&nbsp;指定しない&nbsp;---</option>
<option value="1" <?php if ($this->_tpl_vars['form']['pref'] == 1): ?>selected="selected"<?php endif; ?>>北海道</option>
<option value="2" <?php if ($this->_tpl_vars['form']['pref'] == 2): ?>selected="selected"<?php endif; ?>>青森県</option>
<option value="3" <?php if ($this->_tpl_vars['form']['pref'] == 3): ?>selected="selected"<?php endif; ?>>岩手県</option>
<option value="4" <?php if ($this->_tpl_vars['form']['pref'] == 4): ?>selected="selected"<?php endif; ?>>宮城県</option>
<option value="5" <?php if ($this->_tpl_vars['form']['pref'] == 5): ?>selected="selected"<?php endif; ?>>秋田県</option>
<option value="6" <?php if ($this->_tpl_vars['form']['pref'] == 6): ?>selected="selected"<?php endif; ?>>山形県</option>
<option value="7" <?php if ($this->_tpl_vars['form']['pref'] == 7): ?>selected="selected"<?php endif; ?>>福島県</option>
<option value="8" <?php if ($this->_tpl_vars['form']['pref'] == 8): ?>selected="selected"<?php endif; ?>>茨城県</option>
<option value="9" <?php if ($this->_tpl_vars['form']['pref'] == 9): ?>selected="selected"<?php endif; ?>>栃木県</option>
<option value="10" <?php if ($this->_tpl_vars['form']['pref'] == 10): ?>selected="selected"<?php endif; ?>>群馬県</option>
<option value="11" <?php if ($this->_tpl_vars['form']['pref'] == 11): ?>selected="selected"<?php endif; ?>>埼玉県</option>
<option value="12" <?php if ($this->_tpl_vars['form']['pref'] == 12): ?>selected="selected"<?php endif; ?>>千葉県</option>
<option value="13" <?php if ($this->_tpl_vars['form']['pref'] == 13): ?>selected="selected"<?php endif; ?>>東京都</option>
<option value="14" <?php if ($this->_tpl_vars['form']['pref'] == 14): ?>selected="selected"<?php endif; ?>>神奈川県</option>
<option value="15" <?php if ($this->_tpl_vars['form']['pref'] == 15): ?>selected="selected"<?php endif; ?>>新潟県</option>
<option value="16" <?php if ($this->_tpl_vars['form']['pref'] == 16): ?>selected="selected"<?php endif; ?>>富山県</option>
<option value="17" <?php if ($this->_tpl_vars['form']['pref'] == 17): ?>selected="selected"<?php endif; ?>>石川県</option>
<option value="18" <?php if ($this->_tpl_vars['form']['pref'] == 18): ?>selected="selected"<?php endif; ?>>福井県</option>
<option value="19" <?php if ($this->_tpl_vars['form']['pref'] == 19): ?>selected="selected"<?php endif; ?>>山梨県</option>
<option value="20" <?php if ($this->_tpl_vars['form']['pref'] == 20): ?>selected="selected"<?php endif; ?>>長野県</option>
<option value="21" <?php if ($this->_tpl_vars['form']['pref'] == 21): ?>selected="selected"<?php endif; ?>>岐阜県</option>
<option value="22" <?php if ($this->_tpl_vars['form']['pref'] == 22): ?>selected="selected"<?php endif; ?>>静岡県</option>
<option value="23" <?php if ($this->_tpl_vars['form']['pref'] == 23): ?>selected="selected"<?php endif; ?>>愛知県</option>
<option value="24" <?php if ($this->_tpl_vars['form']['pref'] == 24): ?>selected="selected"<?php endif; ?>>三重県</option>
<option value="25" <?php if ($this->_tpl_vars['form']['pref'] == 25): ?>selected="selected"<?php endif; ?>>滋賀県</option>
<option value="26" <?php if ($this->_tpl_vars['form']['pref'] == 26): ?>selected="selected"<?php endif; ?>>京都府</option>
<option value="27" <?php if ($this->_tpl_vars['form']['pref'] == 27): ?>selected="selected"<?php endif; ?>>大阪府</option>
<option value="28" <?php if ($this->_tpl_vars['form']['pref'] == 28): ?>selected="selected"<?php endif; ?>>兵庫県</option>
<option value="29" <?php if ($this->_tpl_vars['form']['pref'] == 29): ?>selected="selected"<?php endif; ?>>奈良県</option>
<option value="30" <?php if ($this->_tpl_vars['form']['pref'] == 30): ?>selected="selected"<?php endif; ?>>和歌山県</option>
<option value="31" <?php if ($this->_tpl_vars['form']['pref'] == 31): ?>selected="selected"<?php endif; ?>>鳥取県</option>
<option value="32" <?php if ($this->_tpl_vars['form']['pref'] == 32): ?>selected="selected"<?php endif; ?>>島根県</option>
<option value="33" <?php if ($this->_tpl_vars['form']['pref'] == 33): ?>selected="selected"<?php endif; ?>>岡山県</option>
<option value="34" <?php if ($this->_tpl_vars['form']['pref'] == 34): ?>selected="selected"<?php endif; ?>>広島県</option>
<option value="35" <?php if ($this->_tpl_vars['form']['pref'] == 35): ?>selected="selected"<?php endif; ?>>山口県</option>
<option value="36" <?php if ($this->_tpl_vars['form']['pref'] == 36): ?>selected="selected"<?php endif; ?>>徳島県</option>
<option value="37" <?php if ($this->_tpl_vars['form']['pref'] == 37): ?>selected="selected"<?php endif; ?>>香川県</option>
<option value="38" <?php if ($this->_tpl_vars['form']['pref'] == 38): ?>selected="selected"<?php endif; ?>>愛媛県</option>
<option value="39" <?php if ($this->_tpl_vars['form']['pref'] == 39): ?>selected="selected"<?php endif; ?>>高知県</option>
<option value="40" <?php if ($this->_tpl_vars['form']['pref'] == 40): ?>selected="selected"<?php endif; ?>>福岡県</option>
<option value="41" <?php if ($this->_tpl_vars['form']['pref'] == 41): ?>selected="selected"<?php endif; ?>>佐賀県</option>
<option value="42" <?php if ($this->_tpl_vars['form']['pref'] == 42): ?>selected="selected"<?php endif; ?>>長崎県</option>
<option value="43" <?php if ($this->_tpl_vars['form']['pref'] == 43): ?>selected="selected"<?php endif; ?>>熊本県</option>
<option value="44" <?php if ($this->_tpl_vars['form']['pref'] == 44): ?>selected="selected"<?php endif; ?>>大分県</option>
<option value="45" <?php if ($this->_tpl_vars['form']['pref'] == 45): ?>selected="selected"<?php endif; ?>>宮崎県</option>
<option value="46" <?php if ($this->_tpl_vars['form']['pref'] == 46): ?>selected="selected"<?php endif; ?>>鹿児島県</option>
<option value="47" <?php if ($this->_tpl_vars['form']['pref'] == 47): ?>selected="selected"<?php endif; ?>>沖縄県</option>
</select>
</div>
<div class="col-xs-6">
<select name="city" id="city" class="form-control">
<option value="">---&nbsp;指定しない&nbsp;---</option>
<option value=""></option>
</select>
</div>
</div>
</div>

<!--
<div class="col-sm-3 col-xs-12 mb10">
<label>ステータス</label>
<select name="status" class="form-control">
<option value="" selected="selected">---&nbsp;指定しない&nbsp;---</option>
<option value="1" <?php if ($this->_tpl_vars['form']['status'] == 1): ?>selected="selected"<?php endif; ?>>公開</option>
<option value="2" <?php if ($this->_tpl_vars['form']['status'] == 2): ?>selected="selected"<?php endif; ?>>非公開</option>
</select>
</div>
-->

<div class="col-sm-3 col-xs-12 mb10">
<label>ステータス</label>
<select name="status" class="form-control">
<option value="">---&nbsp;指定しない&nbsp;---</option>
<option value="1" <?php if ($this->_tpl_vars['form']['status'] == 1): ?>selected="selected"<?php endif; ?>>公開</option>
<option value="2" <?php if ($this->_tpl_vars['form']['status'] == 2): ?>selected="selected"<?php endif; ?>>非公開</option>
</select>
</div>

<!--
<div class="col-sm-3 col-xs-12 mb10">
<label>オプション</label>
<select name="" class="form-control">
<option value="" selected="selected">---&nbsp;指定しない&nbsp;---</option>
<option value=""></option>
</select>
</div>
-->

<div class="col-sm-3 col-xs-12">
<label>登録担当者</label>
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

</div><!-- /.row wrap -->
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
<div class="box-body">


<?php if ($this->_tpl_vars['admin']['auth2']['1']): ?>
<div class="mb10">
<a href="admin-item-edit.html" class="btn btn-block btn-warning"><i class="fa fa-plus-square"></i> 新しく求人情報を登録する</a>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['admin']['auth2']['4']): ?>
<div class="mb10">
<a href="javascript:do_csv()" class="btn btn-block btn-default"><i class="fa fa-download "></i> 求人情報をエクスポートする</a>
</div>
<form name="form3" action="./index.php?act=admin-item" method="post" class="form-horizontal" enctype="multipart/form-data">
	<input type="hidden" name="import" value="1">
	<div class="mb10">
	<a href="javascript:do_import()" class="btn btn-block btn-default"><i class="fa fa-upload "></i> 求人情報をインポートする</a>
	<input class="mt10" type="file" name="csvfile" size="30" />
	</div>
</form>
<?php endif; ?>

<!--自動更新＋ヘルプ-->
<div class="box_btn_help">
<div class="box_btn_help_switch">

<form name="form_autoupdate" action="./" method="post" class="form-horizontal">
<input type="hidden" name="mode" value="autoupdate">
<div class="btn-group btn_radio w22" data-toggle="buttons">
<label class="btn btn-primary w12 <?php if ($this->_tpl_vars['autoupdate'] == 1): ?>active<?php endif; ?> "><input type="radio" name="autoupdate" value="1" <?php if ($this->_tpl_vars['autoupdate'] == 1): ?>checked<?php endif; ?> onchange="post_auto(this.value);" />自動更新をON</label>
<label class="btn btn-primary w12 <?php if ($this->_tpl_vars['autoupdate'] != 1): ?>active<?php endif; ?> "><input type="radio" name="autoupdate" value="0" <?php if ($this->_tpl_vars['autoupdate'] != 1): ?>checked<?php endif; ?> onchange="post_auto(this.value);" />自動更新をOFF</label>
</div>
<?php echo '
<script type="text/javascript">
function post_auto(v){
	$.ajax({
		type: \'GET\',
		url:"./?act=autoupdate&value=" + v,
		success : function(data){
			alert(data);
		}
	});
}
</script>
'; ?>


<div class="btn-group w01">
<button type="button" class="btn btn-default btn-sm dropdown-toggle btn_help fs05 " data-toggle="dropdown">
<i class="ion-help"></i></button>
<div class="dropdown-menu pull-right dropdown_menu_help" role="menu">
<p>自動更新ONにしておくと、最終更新日が30日を経過した求人情報に対して、 最新の更新日を付与します。<br>
（indeedでは古い更新日が表示されている求人情 報が読み込まれないため、indeedへの最適化をご希望される場合は必ずONに してください）</p>
</div>
</div>

</form>

</div>
</div>
<!--/自動更新＋ヘルプ-->

</div><!-- /.box-body -->
</div><!-- /.box -->
</div>



<div class="col-xs-12">

<div class="box box-default">
<form name="form2" action="./admin-item.html" method="post" class="form-horizontal">
	<input type="hidden" name="act" value="admin-item">
	<input type="hidden" name="mode" value="">
	<input type="hidden" name="page" value="<?php echo $this->_tpl_vars['page']; ?>
">
	<input type="hidden" name="item_number" value="">
<div class="box-body">

<?php if ($this->_tpl_vars['list']): ?>

<div class="box_publishing clearfix">
<div class="box_publishing_left">
<p>チェックした求人をすべて<br class="visible-xs-block">
<a href="javascript:do_publish()" class="btn btn-warning"><i class="ion-loop"></i> 公開にする</a>
<a href="javascript:do_unpublish()" class="btn btn-danger"><i class="ion-close"></i> 非公開にする</a>
</p>
</div>
<div class="box_publishing_right">
<p>表示件数<span class="hidden-xs">切り替え</span>
<select name="page_items_number" class="ml05" onChange="javascript:change_page_items_number()">
	<option value="20" <?php if ($this->_tpl_vars['page_item_number'] == 20 || ! $this->_tpl_vars['page_item_number']): ?>selected=selected<?php endif; ?>>20</option>
	<option value="50" <?php if ($this->_tpl_vars['page_item_number'] == 50): ?>selected=selected<?php endif; ?>>50</option>
	<option value="100" <?php if ($this->_tpl_vars['page_item_number'] == 100): ?>selected=selected<?php endif; ?>>100</option>
</select>
</p>
</div>
</div>

<table id="table_summary" class="table table-bordered table-hover" summary="表">
<thead>
<tr>
<th>
<label class="input_check_edit" id="input_check_edit_all"><input type="checkbox" name="" value=""></label>
</th>
<th>
<?php if ($this->_tpl_vars['order'] == 1): ?>
▲
<?php else: ?>
<a href="javascript:do_order(1)">▲</a>
<?php endif; ?>
<?php if ($this->_tpl_vars['order'] == 2): ?>
▼
<?php else: ?>
<a href="javascript:do_order(2)">▼</a>
<?php endif; ?>
&nbsp;更新日時</th>
<th>画像</th>
<th>求人タイトル</th>
<th>登録担当者</th>
<th>ステータス</th>
<th>
<?php if ($this->_tpl_vars['order'] == 3): ?>
▲
<?php else: ?>
<a href="javascript:do_order(3)">▲</a>
<?php endif; ?>
<?php if ($this->_tpl_vars['order'] == 4): ?>
▼
<?php else: ?>
<a href="javascript:do_order(4)">▼</a>
<?php endif; ?>
&nbsp;応募</th>
<th>参照</th>
<?php if ($this->_tpl_vars['admin']['auth2']['1']): ?><th>複製</th><?php endif; ?>
<?php if ($this->_tpl_vars['admin']['auth2']['2']): ?><th>編集</th><?php endif; ?>
<?php if ($this->_tpl_vars['admin']['auth2']['3']): ?><th>削除</th><?php endif; ?>
</tr>
</thead>

<tbody>

<?php $this->assign('class', 'bg01'); ?>
<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<tr>
<td><label class="input_check_edit"><input type="checkbox" name="item_ids[]" value="<?php echo $this->_tpl_vars['item']['item_id']; ?>
"></label></td>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['up_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y/%m/%d %H:%M:%S") : smarty_modifier_date_format($_tmp, "%Y/%m/%d %H:%M:%S")); ?>
</td>
<td class="txtC">
<?php if ($this->_tpl_vars['item']['image']): ?>
<img src="../img.php?id=<?php echo $this->_tpl_vars['item']['image']; ?>
" width="120" />
<?php else: ?>
<img src="common/AdminLTE/img/noimage.jpg" width="120" alt="該当画像なし" />
<?php endif; ?>
</td>
<td><a href="admin-item-edit.html&id=<?php echo $this->_tpl_vars['item']['item_id']; ?>
"><?php echo $this->_tpl_vars['item']['title']; ?>
</a><p class="no_01">求人No.<?php echo $this->_tpl_vars['item']['item_id']; ?>
</p></td>
<td>
<?php if ($this->_tpl_vars['admin']['auth1']['2']): ?>
<a href="admin-authority-edit.html&id=<?php echo $this->_tpl_vars['item']['tantou']['seq']; ?>
"><?php echo $this->_tpl_vars['item']['tantou']['name']; ?>

<?php else: ?>
<?php echo $this->_tpl_vars['item']['tantou']['name']; ?>

<?php endif; ?>
</td>
<td><?php if ($this->_tpl_vars['item']['status'] == 1): ?>公開<?php else: ?>非公開<?php endif; ?></td>
<td><a href="admin-entry.html&title=<?php echo $this->_tpl_vars['item']['item_id']; ?>
"><?php echo $this->_tpl_vars['item']['oubo']; ?>
&nbsp;人</a></td>
<td><a href="../detail/<?php echo $this->_tpl_vars['item']['item_id']; ?>
" target="_blank" class="btn btn-block btn-default btn-xs">参照 <i class="fa fa-external-link"></i></a></td>
<?php if ($this->_tpl_vars['admin']['auth2']['1']): ?>
<td>
<a href="admin-item-edit.html&id=<?php echo $this->_tpl_vars['item']['item_id']; ?>
&mode=copy" class="btn btn-block btn-default btn-xs"><i class="fa fa-files-o"></i> 複製</a>
</td>
<?php endif; ?>
<?php if ($this->_tpl_vars['admin']['auth2']['2']): ?>
<td>
<a href="admin-item-edit.html&id=<?php echo $this->_tpl_vars['item']['item_id']; ?>
" class="btn btn-block btn-default btn-xs"><i class="fa fa-pencil"></i> 編集</a>
</td>
<?php endif; ?>
<?php if ($this->_tpl_vars['admin']['auth2']['3']): ?>
<td>
<?php if ($this->_tpl_vars['item']['oubo']): ?>
<a href="javascript:void(0);" class="btn btn-block btn-default btn-xs" disabled="disabled"><i class="fa fa-trash"></i> 削除</a>
<?php else: ?>
<a href="javascript:do_delete(<?php echo $this->_tpl_vars['item']['item_id']; ?>
)" class="btn btn-block btn-default btn-xs"><i class="fa fa-trash"></i> 削除</a>
<?php endif; ?>
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

<div class="box_publishing clearfix">
<div class="box_publishing_left">
<p>チェックした求人をすべて<br class="visible-xs-block">
<a href="javascript:do_publish()" class="btn btn-warning"><i class="ion-loop"></i> 公開にする</a>
<a href="javascript:do_unpublish()" class="btn btn-danger"><i class="ion-close"></i> 非公開にする</a>
</p>
</div>
<div class="box_publishing_right">
<p>表示件数<span class="hidden-xs">切り替え</span>
<select name="page_items_number2" class="ml05" onChange="javascript:change_page_items_number2()">
	<option value="20" <?php if ($this->_tpl_vars['page_item_number'] == 20 || ! $this->_tpl_vars['page_item_number']): ?>selected=selected<?php endif; ?>>20</option>
	<option value="50" <?php if ($this->_tpl_vars['page_item_number'] == 50): ?>selected=selected<?php endif; ?>>50</option>
	<option value="100" <?php if ($this->_tpl_vars['page_item_number'] == 100): ?>selected=selected<?php endif; ?>>100</option>
</select>
</p>
</div>
</div>

<?php else: ?>
<p>登録情報がありません。</p>
<?php endif; ?>

</div><!-- /.box-body -->
</form>
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
<script src="common/AdminLTE/bootstrap/js/bootstrap.min.js"></script>
<script src="common/AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="common/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="common/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="common/AdminLTE/plugins/fastclick/fastclick.js"></script>
<script src="common/AdminLTE/js/app.min.js"></script>
<script src="common/AdminLTE/js/demo.js"></script>
<script src="common/js/common.js"></script>

<script src="../common/js/mini_ajax.js"></script>
<script>
var pref = '<?php echo $this->_tpl_vars['form']['pref']; ?>
';
var city = '<?php echo $this->_tpl_vars['form']['city']; ?>
';
</script>

<?php echo '
<script>
function set_select(sel, info, pref) {

	// 全て削除
	while (sel.options.length > 1) {

		sel.options[sel.options.length-1] = null;
	}

	var n = 1;

	for (i in info) {

		sel.options.length = n;

		if (info[i]) {
			sel.options[n++] = new Option(info[i], i, false, false);
		}
	}

	sel.options[0].selected = true;
}

function change_pref(v){

	var str = ajax.gets("../?act=get_city&id=" + v);
	eval("var city_data = " + str);
	set_select(document.getElementById(\'city\'), city_data);
}

function do_delete(id){

	if (confirm(\'削除しても良いですか？\')) {
		location = \'./admin-item.html&mode=delete&id=\' + id;
	}
}

function do_page(page){

	document.form1.page.value = page;
	document.form1.submit();
}

function do_csv(){

	document.form1.csv.value = "1";
	document.form1.submit();
}

function do_order(ord){

	document.form1.order.value = ord;
	document.form1.page.value = "";
	document.form1.submit();
}

function do_publish(){
	if (confirm(\'チェックした求人を全て公開してもよろしいですか？\')) {
		document.form2.mode.value = \'publish\';
		document.form2.submit();
	}
}
function do_unpublish(){
	if (confirm(\'チェックした求人を全て非公開してもよろしいですか？\')) {
		document.form2.mode.value = \'unpublish\';
		document.form2.submit();
	}
}
function change_page_items_number(){
		document.form2.mode.value = \'change_page_item_number\';
		obj = document.form2.page_items_number;
		index = obj.selectedIndex;
		//alert(index);
		//if (index != 0){
		  item_number = obj.options[index].value;
		//}
		//alert(item_number);
		document.form2.item_number.value = item_number;
		document.form2.submit();
}
function change_page_items_number2(){
		document.form2.mode.value = \'change_page_item_number\';
		obj = document.form2.page_items_number2;
		index = obj.selectedIndex;
		item_number = obj.options[index].value;

		document.form2.item_number.value = item_number;
		document.form2.submit();
}

$(function() {

	change_pref(pref);
	document.form1.city.value = city;

});
</script>

'; ?>

</body>
</html>