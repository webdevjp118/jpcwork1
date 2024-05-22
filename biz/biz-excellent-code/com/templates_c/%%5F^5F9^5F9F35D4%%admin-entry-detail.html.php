<?php /* Smarty version 2.6.22, created on 2021-10-27 20:55:12
         compiled from admin-entry-detail.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'admin-entry-detail.html', 86, false),array('modifier', 'date2days', 'admin-entry-detail.html', 135, false),array('modifier', 'nl2br', 'admin-entry-detail.html', 336, false),)), $this); ?>
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
<li class="active"><i class="fa fa-dashboard"></i> Home</li>
<li><a href="">応募管理</a></li>
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

<div class="mb10">
<table id="table_summary" class="table table-bordered table_edit" summary="表">
<col class="w06">
<col>
<tbody>
<tr>
<th>応募日</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['oubo']['reg_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y/%m/%d %H:%M:%S") : smarty_modifier_date_format($_tmp, "%Y/%m/%d %H:%M:%S")); ?>
<p class="no_01">応募No.<?php echo $this->_tpl_vars['oubo']['seq']; ?>
</p></td>
</tr>
<tr>
<th>種別</th>
<td><?php if ($this->_tpl_vars['oubo']['kind'] == 1): ?>応募<?php else: ?>問合せ<?php endif; ?></td>
</tr>
<tr>
<th>求人タイトル</th>
<td>
<?php if ($this->_tpl_vars['info']): ?>
<a href="admin-item-edit.html&id=<?php echo $this->_tpl_vars['info']['item_id']; ?>
">【<?php echo $this->_tpl_vars['info']['kinmu_pref']; ?>
<?php echo $this->_tpl_vars['info']['kinmu_city']; ?>
】<?php echo $this->_tpl_vars['info']['title']; ?>
</a><p class="no_01">求人No.<?php echo $this->_tpl_vars['info']['item_id']; ?>
</p>
<?php else: ?>
コンサルタント相談のみで該当求人なし
<?php endif; ?>
</td>
</tr>
<tr>
<th>担当者</th>
<td>
<form name="status1" method="post" action="admin-entry-detail.html">
<input type="hidden" name="mode" value="status">
<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['oubo']['seq']; ?>
">
<select name="tantou_id" class="input_select form-control">
<option value=""></option>
<?php $_from = $this->_tpl_vars['tantou_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<option value="<?php echo $this->_tpl_vars['item']['tantou_id']; ?>
" <?php if ($this->_tpl_vars['oubo']['tantou_id'] == $this->_tpl_vars['item']['tantou_id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['item']['name']; ?>
</option>
<?php endforeach; endif; unset($_from); ?>
</select>
<input type="submit" value=" 担当者を変更する ">
</form>
</td>
</tr>
<tr>
<th>ステータス</th>
<td>
<form name="status2" method="post" action="admin-entry-detail.html">
<input type="hidden" name="mode" value="status">
<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['oubo']['seq']; ?>
">
<select name="status" class="input_select form-control">
<option value="9" <?php if ($this->_tpl_vars['oubo']['status'] == '0'): ?>selected="selected"<?php endif; ?>>未対応</option>
<option value="1" <?php if ($this->_tpl_vars['oubo']['status'] == '1'): ?>selected="selected"<?php endif; ?>>対応中</option>
<option value="2" <?php if ($this->_tpl_vars['oubo']['status'] == '2'): ?>selected="selected"<?php endif; ?>>対応終了</option>
</select>
<input type="submit" value=" ステータスを変更する ">
</form>
</td>
</tr>
<tr>
<th>放置日</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['oubo']['up_date'])) ? $this->_run_mod_handler('date2days', true, $_tmp) : smarty_modifier_date2days($_tmp)); ?>
日 ※最後にステータスを変更してからの日数です。</td>
</tr>
</tbody>
</table>
</div>


<table id="table_summary" class="table table-bordered table_edit" summary="表">
<col class="w06">
<col>
<tbody>
<tr>
<th>応募者名</th>
<td><!--<a href="admin-user-edit.html&id=<?php echo $this->_tpl_vars['user']['user_id']; ?>
">--><?php echo $this->_tpl_vars['user']['name']; ?>
 （<?php echo $this->_tpl_vars['user']['name_kana']; ?>
） <?php if ($this->_tpl_vars['user']['age']): ?>(<?php echo $this->_tpl_vars['user']['age']; ?>
)<?php endif; ?><!--</a>-->
<?php if ($this->_tpl_vars['user']['regist'] == 0): ?><?php else: ?><p class="no_01">会員No.<?php echo $this->_tpl_vars['user']['user_id']; ?>
</p><?php endif; ?>
<?php if ($this->_tpl_vars['user']['regist'] == 0): ?>
<!--<br />【同姓同名の方がいます&#160;⇒<a href="#">確認する</a>】←非会員の場合のみ表示</td>-->
<?php endif; ?>
</tr>
<!--<tr>
<th>会員種別</th>
<td><?php if ($this->_tpl_vars['user']['regist'] == 0): ?>非会員<?php else: ?>会員<?php endif; ?></td>
</tr>-->
<tr>
<th>性別</th>
<td><?php echo $this->_tpl_vars['user']['radio01']; ?>
</td>
</tr>
<!--<tr>
<th>住所</th>
<td><?php if ($this->_tpl_vars['user']['zip1'] && $this->_tpl_vars['user']['zip2']): ?><?php echo $this->_tpl_vars['user']['zip1']; ?>
-<?php echo $this->_tpl_vars['user']['zip2']; ?>
<br /><?php endif; ?>
<?php echo $this->_tpl_vars['user']['pref']; ?>
<?php echo $this->_tpl_vars['user']['city']; ?>
<?php echo $this->_tpl_vars['user']['address1']; ?>
<?php echo $this->_tpl_vars['user']['address2']; ?>
&nbsp;
<?php if ($this->_tpl_vars['user']['pref'] && $this->_tpl_vars['user']['city'] && $this->_tpl_vars['user']['address1']): ?>
⇒<a href="https://www.google.co.jp/maps/place/<?php echo $this->_tpl_vars['user']['pref']; ?>
<?php echo $this->_tpl_vars['user']['city']; ?>
<?php echo $this->_tpl_vars['user']['address1']; ?>
" target="_blank">地図を見る</a>
<?php endif; ?>
</td>
</tr>-->
<tr>
<th>生年月日</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['user']['birthday'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y年%m月%d日") : smarty_modifier_date_format($_tmp, "%Y年%m月%d日")); ?>
</td>
</tr>
<?php if ($this->_tpl_vars['user']['shikaku']): ?>
<tr>
<th>保有資格</th>
<td><?php echo $this->_tpl_vars['user']['shikaku']; ?>
</td>
</tr>
<?php endif; ?>
<!--<tr>
<th>保有資格</th>
<td><?php echo $this->_tpl_vars['user']['shikaku']; ?>
</td>
</tr>-->
<tr>
<th>電話番号</th>
<td><?php echo $this->_tpl_vars['user']['tel']; ?>
</td>
</tr>
<tr>
<th>メールアドレス</th>
<td><a href="mailto:<?php echo $this->_tpl_vars['user']['email']; ?>
"><?php echo $this->_tpl_vars['user']['email']; ?>
</a></td>
</tr>
<!--<tr>
<th>希望勤務形態</th>
<td><?php echo $this->_tpl_vars['user']['keitai']; ?>
</td>
</tr>-->
<!--<tr>
<th>希望入職時期</th>
<td><?php echo $this->_tpl_vars['user']['jiki']; ?>
</td>
</tr>-->
<!--<tr>
<th>LINE ID</th>
<td><?php echo $this->_tpl_vars['user']['text01']; ?>
</td>
</tr>-->
<!--
<tr>
<th>ymd01</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['user']['ymd01'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y/%m/%d") : smarty_modifier_date_format($_tmp, "%Y/%m/%d")); ?>
</td>
</tr><tr>
<th>ymd02</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['user']['ymd02'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y/%m/%d") : smarty_modifier_date_format($_tmp, "%Y/%m/%d")); ?>
</td>
</tr><tr>
<th>ymd03</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['user']['ymd03'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y/%m/%d") : smarty_modifier_date_format($_tmp, "%Y/%m/%d")); ?>
</td>
</tr><tr>
<th>textarea01</th>
<td><?php echo $this->_tpl_vars['user']['textarea01']; ?>
</td>
</tr><tr>
<th>textarea02</th>
<td><?php echo $this->_tpl_vars['user']['textarea02']; ?>
</td>
</tr><tr>
<th>textarea03</th>
<td><?php echo $this->_tpl_vars['user']['textarea03']; ?>
</td>
</tr><tr>
<th>textarea04</th>
<td><?php echo $this->_tpl_vars['user']['textarea04']; ?>
</td>
</tr><tr>
<th>textarea05</th>
<td><?php echo $this->_tpl_vars['user']['textarea05']; ?>
</td>
</tr><tr>
<th>textarea06</th>
<td><?php echo $this->_tpl_vars['user']['textarea06']; ?>
</td>
</tr><tr>
<th>textarea07</th>
<td><?php echo $this->_tpl_vars['user']['textarea07']; ?>
</td>
</tr><tr>
<th>textarea08</th>
<td><?php echo $this->_tpl_vars['user']['textarea08']; ?>
</td>
</tr><tr>
<th>textarea09</th>
<td><?php echo $this->_tpl_vars['user']['textarea09']; ?>
</td>
</tr><tr>
<th>textarea10</th>
<td><?php echo $this->_tpl_vars['user']['textarea10']; ?>
</td>
</tr>

<tr>
<th>text02</th>
<td><?php echo $this->_tpl_vars['user']['text02']; ?>
</td>
</tr><tr>
<th>text03</th>
<td><?php echo $this->_tpl_vars['user']['text03']; ?>
</td>
</tr><tr>
<th>text04</th>
<td><?php echo $this->_tpl_vars['user']['text04']; ?>
</td>
</tr><tr>
<th>text05</th>
<td><?php echo $this->_tpl_vars['user']['text05']; ?>
</td>
</tr><tr>
<th>text06</th>
<td><?php echo $this->_tpl_vars['user']['text06']; ?>
</td>
</tr><tr>
<th>text07</th>
<td><?php echo $this->_tpl_vars['user']['text07']; ?>
</td>
</tr><tr>
<th>text08</th>
<td><?php echo $this->_tpl_vars['user']['text08']; ?>
</td>
</tr><tr>
<th>text09</th>
<td><?php echo $this->_tpl_vars['user']['text09']; ?>
</td>
</tr><tr>
<th>text10</th>
<td><?php echo $this->_tpl_vars['user']['text10']; ?>
</td>
</tr>

<tr>
<th>radio02</th>
<td><?php echo $this->_tpl_vars['user']['radio02']; ?>
</td>
</tr><tr>
<th>radio03</th>
<td><?php echo $this->_tpl_vars['user']['radio03']; ?>
</td>
</tr><tr>
<th>radio04</th>
<td><?php echo $this->_tpl_vars['user']['radio04']; ?>
</td>
</tr><tr>
<th>radio05</th>
<td><?php echo $this->_tpl_vars['user']['radio05']; ?>
</td>
</tr>

<tr>
<th>check02</th>
<td><?php echo $this->_tpl_vars['user']['check02']; ?>
</td>
</tr><tr>
<th>check03</th>
<td><?php echo $this->_tpl_vars['user']['check03']; ?>
</td>
</tr><tr>
<th>check04</th>
<td><?php echo $this->_tpl_vars['user']['check04']; ?>
</td>
</tr><tr>
<th>check05</th>
<td><?php echo $this->_tpl_vars['user']['check05']; ?>
</td>
</tr><tr>
<th>file01</th>
<td><a href="../file.php?id=<?php echo $this->_tpl_vars['user']['file01']; ?>
"><?php echo $this->_tpl_vars['user']['file01_name']; ?>
</a></td>
</tr><tr>
<th>file02</th>
<td><a href="../file.php?id=<?php echo $this->_tpl_vars['user']['file02']; ?>
"><?php echo $this->_tpl_vars['user']['file02_name']; ?>
</a></td>
</tr><tr>
<th>file03</th>
<td><a href="../file.php?id=<?php echo $this->_tpl_vars['user']['file03']; ?>
"><?php echo $this->_tpl_vars['user']['file03_name']; ?>
</a></td>
</tr><tr>
<th>file04</th>
<td><a href="../file.php?id=<?php echo $this->_tpl_vars['user']['file04']; ?>
"><?php echo $this->_tpl_vars['user']['file04_name']; ?>
</a></td>
</tr><tr>
<th>file05</th>
<td><a href="../file.php?id=<?php echo $this->_tpl_vars['user']['file05']; ?>
"><?php echo $this->_tpl_vars['user']['file05_name']; ?>
</a></td>
</tr><tr>
<th>select01</th>
<td><?php echo $this->_tpl_vars['user']['select01']; ?>
</td>
</tr><tr>
<th>select02</th>
<td><?php echo $this->_tpl_vars['user']['select02']; ?>
</td>
</tr><tr>
<th>select03</th>
<td><?php echo $this->_tpl_vars['user']['select03']; ?>
</td>
</tr><tr>
<th>select04</th>
<td><?php echo $this->_tpl_vars['user']['select04']; ?>
</td>
</tr><tr>
<th>select05</th>
<td><?php echo $this->_tpl_vars['user']['select05']; ?>
</td>
</tr>
-->
<tr>
<th>備考・メモ</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['user']['biko'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</td>
</tr>
</tbody>
</table>


</div><!-- /.box-body -->
</div><!-- /.box -->


</div><!-- /.col -->



<!--right side memo -->
<div class="col-sm-4 col-xs-12">
<div class="box box-primary direct-chat direct-chat-primary">
<div class="box-header with-border">
<h3 class="box-title">メモ</h3>
<div class="box-tools pull-right">
<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
</div>
</div>
<!-- /.box-header -->


<div class="box-body">
<!-- Conversations are loaded here -->
<div class="direct-chat-messages">


<!-- Message. Default to the left -->
<div class="direct-chat-msg">

<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<div class="clearfix mb10">
<div class="direct-chat-info clearfix">
<span class="direct-chat-name pull-left"><a href="./admin-authority-edit.html&id=<?php echo $this->_tpl_vars['item']['tantou_id']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
</a></span>
<span class="direct-chat-timestamp pull-right"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['reg_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y/%m/%d %H:%M:%S") : smarty_modifier_date_format($_tmp, "%Y/%m/%d %H:%M:%S")); ?>
</span>
</div><!-- /.direct-chat-info -->
<img class="direct-chat-img" src="common/AdminLTE/img/user1-128x128.jpg" alt="Message User Image"><!-- /.direct-chat-img -->
<div class="direct-chat-text">
<?php echo $this->_tpl_vars['item']['comment']; ?>

</div><!-- /.direct-chat-text -->
</div>
<?php endforeach; endif; unset($_from); ?>
</div><!-- /.direct-chat-msg -->
</div><!--/.direct-chat-messages-->


<!-- Contacts are loaded here -->
<!--<div class="direct-chat-contacts">
<ul class="contacts-list">
<li><a href="#"></a></li>
</ul>
</div>
-->

</div><!-- /.box-body -->


<div class="box-footer">
<form name="form1" method="post" action="admin-entry-detail.html">
<input type="hidden" name="mode" value="memo">
<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['oubo']['seq']; ?>
">
<div class="input-group">
<input type="text" name="comment" placeholder="メモを入力" class="form-control">
<span class="input-group-btn">
<button type="submit" onClick="javascript:do_memo();return false;" class="btn btn-primary btn-flat"><i class="fa fa-sticky-note"></i> メモを書く</button>
</span>
</div>
</form>
</div>
<!-- /.box-footer-->
</div><!--/.direct-chat -->

<?php if ($this->_tpl_vars['pager']): ?>
<div class="row">
<div class="col-xs-6">
<?php if ($this->_tpl_vars['pager']['prev']): ?>
<a href="admin-entry-detail.html&id=<?php echo $this->_tpl_vars['oubo']['seq']; ?>
&page=<?php echo $this->_tpl_vars['pager']['prev']['no']; ?>
" class="btn btn-block btn-default btn-xs">前へ</a>
<?php endif; ?>
</div>
<div class="col-xs-6">
<?php if ($this->_tpl_vars['pager']['next']): ?>
<a href="admin-entry-detail.html&id=<?php echo $this->_tpl_vars['oubo']['seq']; ?>
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
function do_memo()
{
	if (document.form1.comment.value == "") {
		alert("メモを記入してください");
	} else {
		document.form1.submit();
	}
}
</script>
'; ?>


</body>
</html>
