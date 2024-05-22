<?php /* Smarty version 2.6.22, created on 2021-10-22 16:48:25
         compiled from admin-item-edit.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'admin-item-edit.html', 99, false),)), $this); ?>
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
<li class="active"><i class="fa fa-dashboard"></i> Home</li>
<li><a href="">求人情報管理</a></li>
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



<form name="form1" action="admin-item-edit.html" method="post" enctype="multipart/form-data">
<input type="hidden" name="mode" value="form">
<input type="hidden" name="item_id" value="<?php echo $this->_tpl_vars['form']['item_id']; ?>
">


<table id="table_summary" class="table table-bordered table_edit" summary="表">
<tbody>


<tr>
<th>求人No.</th>
<td>No.<?php echo $this->_tpl_vars['info']['item_id']; ?>

</td>
</tr>

<?php if ($this->_tpl_vars['info']): ?>
<tr>
<th>最終更新日時</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['info']['up_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y/%m/%d %H:%M:%S") : smarty_modifier_date_format($_tmp, "%Y/%m/%d %H:%M:%S")); ?>
</td>
</tr>
<?php endif; ?>


<tr>
<th>登録担当者</th>
<td><select name="tantou_id" class="input_w10 form-control">
<option value="">---&nbsp;担当者をお選びください&nbsp;---</option>
<?php $_from = $this->_tpl_vars['tantou_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<option value="<?php echo $this->_tpl_vars['item']['tantou_id']; ?>
" <?php if ($this->_tpl_vars['form']['tantou_id'] == $this->_tpl_vars['item']['tantou_id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['item']['name']; ?>
</option>
<?php endforeach; endif; unset($_from); ?>
</select>
<?php if ($this->_tpl_vars['msg']['tantou_id']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['tantou_id']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<!--<tr>
<th>営業所</th>
<td><select name="branch_id" class="input_w10 form-control">
<option value="">---&nbsp;営業所をお選びください&nbsp;---</option>
<?php $_from = $this->_tpl_vars['branch_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<option value="<?php echo $this->_tpl_vars['item']['branch_id']; ?>
" <?php if ($this->_tpl_vars['form']['branch_id'] == $this->_tpl_vars['item']['branch_id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['item']['name']; ?>
</option>
<?php endforeach; endif; unset($_from); ?>
</select>
<?php if ($this->_tpl_vars['msg']['branch_id']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['branch_id']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>-->


<?php if ($this->_tpl_vars['info']): ?>
<tr>
<th>応募者数</th>
<td><a href="admin-entry.html&title=<?php echo $this->_tpl_vars['info']['item_id']; ?>
"><?php echo $this->_tpl_vars['info']['oubo']; ?>
&nbsp;人</a></td>
</tr>
<?php endif; ?>


<tr>
<th>求人タイトル<span>必須</span></th>
<td>
<input class="input_w20 form-control" type="text" name="title" value="<?php echo $this->_tpl_vars['form']['title']; ?>
">
<p>例：【○○区/日勤パート】看護師募集！時給○○○円、○○駅徒歩1分！</p>
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
<th>コンサルタントオススメ</th>
<td><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['recommend'] == 1): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="recommend" value="1" <?php if ($this->_tpl_vars['form']['recommend'] == 1): ?>checked="checked"<?php endif; ?> />表示する</label></div>
<p>※チェックを入れるとコンサルタントのオススメとして表示されます。</p>
<?php if ($this->_tpl_vars['msg']['recommend']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['recommend']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>ピックアップ</th>
<td><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['pickup'] == 1): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="pickup" value="1" <?php if ($this->_tpl_vars['form']['pickup'] == 1): ?>checked="checked"<?php endif; ?> />表示する</label></div>
<p>※チェックを入れるとピックアップとして表示されます。</p>
<?php if ($this->_tpl_vars['msg']['pickup']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['pickup']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>
	
	

<tr>
<th>画像</th>
<td>
<?php if ($this->_tpl_vars['form']['image']): ?>
<img src="../img.php?id=<?php echo $this->_tpl_vars['form']['image']; ?>
" width="200">
<input type="hidden" name="image_old" value="<?php echo $this->_tpl_vars['form']['image']; ?>
">
<div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary"><input type="checkbox" name="image_del" value="1"> 削除する</label></div>
<?php endif; ?>
<input type="file" name="image">
<?php if ($this->_tpl_vars['msg']['image']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['image']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>



<!--<tr>
<th>勤務地&nbsp;郵便番号</th>
<td><input class="input_zip form-control" type="text" name="kinmu_zip1" value="<?php echo $this->_tpl_vars['form']['kinmu_zip1']; ?>
" />&nbsp;-&nbsp;
<input class="input_zip form-control" type="text" name="kinmu_zip2" value="<?php echo $this->_tpl_vars['form']['kinmu_zip2']; ?>
" />


<input class="input_zip form-control" type="text" name="kinmu_zip2" value="<?php echo $this->_tpl_vars['form']['kinmu_zip2']; ?>
" onKeyUp="AjaxZip3.zip2addr('kinmu_zip1','kinmu_zip2','kinmu_pref','kinmu_city','kinmu_address1');" />
<?php if ($this->_tpl_vars['msg']['kinmu_zip1']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['kinmu_zip1']; ?>
</li>
</ul>
</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['msg']['kinmu_zip2']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['kinmu_zip2']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>-->


<tr>
<th>勤務地&nbsp;都道府県<span>必須</span></th>
<td>
<select name="kinmu_pref" onChange="change_pref(this.value, 'kinmu_city')" class="input_select form-control">
<option value="">都道府県を選択して下さい</option>
<option value="1" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 1): ?>selected="selected"<?php endif; ?>>北海道</option>
<option value="2" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 2): ?>selected="selected"<?php endif; ?>>青森県</option>
<option value="3" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 3): ?>selected="selected"<?php endif; ?>>岩手県</option>
<option value="4" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 4): ?>selected="selected"<?php endif; ?>>宮城県</option>
<option value="5" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 5): ?>selected="selected"<?php endif; ?>>秋田県</option>
<option value="6" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 6): ?>selected="selected"<?php endif; ?>>山形県</option>
<option value="7" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 7): ?>selected="selected"<?php endif; ?>>福島県</option>
<option value="8" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 8): ?>selected="selected"<?php endif; ?>>茨城県</option>
<option value="9" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 9): ?>selected="selected"<?php endif; ?>>栃木県</option>
<option value="10" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 10): ?>selected="selected"<?php endif; ?>>群馬県</option>
<option value="11" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 11): ?>selected="selected"<?php endif; ?>>埼玉県</option>
<option value="12" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 12): ?>selected="selected"<?php endif; ?>>千葉県</option>
<option value="13" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 13): ?>selected="selected"<?php endif; ?>>東京都</option>
<option value="14" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 14): ?>selected="selected"<?php endif; ?>>神奈川県</option>
<option value="15" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 15): ?>selected="selected"<?php endif; ?>>新潟県</option>
<option value="16" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 16): ?>selected="selected"<?php endif; ?>>富山県</option>
<option value="17" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 17): ?>selected="selected"<?php endif; ?>>石川県</option>
<option value="18" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 18): ?>selected="selected"<?php endif; ?>>福井県</option>
<option value="19" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 19): ?>selected="selected"<?php endif; ?>>山梨県</option>
<option value="20" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 20): ?>selected="selected"<?php endif; ?>>長野県</option>
<option value="21" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 21): ?>selected="selected"<?php endif; ?>>岐阜県</option>
<option value="22" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 22): ?>selected="selected"<?php endif; ?>>静岡県</option>
<option value="23" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 23): ?>selected="selected"<?php endif; ?>>愛知県</option>
<option value="24" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 24): ?>selected="selected"<?php endif; ?>>三重県</option>
<option value="25" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 25): ?>selected="selected"<?php endif; ?>>滋賀県</option>
<option value="26" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 26): ?>selected="selected"<?php endif; ?>>京都府</option>
<option value="27" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 27): ?>selected="selected"<?php endif; ?>>大阪府</option>
<option value="28" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 28): ?>selected="selected"<?php endif; ?>>兵庫県</option>
<option value="29" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 29): ?>selected="selected"<?php endif; ?>>奈良県</option>
<option value="30" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 30): ?>selected="selected"<?php endif; ?>>和歌山県</option>
<option value="31" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 31): ?>selected="selected"<?php endif; ?>>鳥取県</option>
<option value="32" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 32): ?>selected="selected"<?php endif; ?>>島根県</option>
<option value="33" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 33): ?>selected="selected"<?php endif; ?>>岡山県</option>
<option value="34" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 34): ?>selected="selected"<?php endif; ?>>広島県</option>
<option value="35" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 35): ?>selected="selected"<?php endif; ?>>山口県</option>
<option value="36" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 36): ?>selected="selected"<?php endif; ?>>徳島県</option>
<option value="37" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 37): ?>selected="selected"<?php endif; ?>>香川県</option>
<option value="38" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 38): ?>selected="selected"<?php endif; ?>>愛媛県</option>
<option value="39" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 39): ?>selected="selected"<?php endif; ?>>高知県</option>
<option value="40" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 40): ?>selected="selected"<?php endif; ?>>福岡県</option>
<option value="41" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 41): ?>selected="selected"<?php endif; ?>>佐賀県</option>
<option value="42" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 42): ?>selected="selected"<?php endif; ?>>長崎県</option>
<option value="43" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 43): ?>selected="selected"<?php endif; ?>>熊本県</option>
<option value="44" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 44): ?>selected="selected"<?php endif; ?>>大分県</option>
<option value="45" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 45): ?>selected="selected"<?php endif; ?>>宮崎県</option>
<option value="46" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 46): ?>selected="selected"<?php endif; ?>>鹿児島県</option>
<option value="47" <?php if ($this->_tpl_vars['form']['kinmu_pref'] == 47): ?>selected="selected"<?php endif; ?>>沖縄県</option>
</select>
<?php if ($this->_tpl_vars['msg']['kinmu_pref']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['kinmu_pref']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>


<tr>
<th>勤務地&nbsp;市区町村<span>必須</span></th>
<td>
<select name="kinmu_city" id="kinmu_city" class="input_select form-control">
<option value="">市区を選択して下さい</option>
</select>
<!--input class="input_w10 form-control" type="text" name="kinmu_city" value="<?php echo $this->_tpl_vars['form']['kinmu_city']; ?>
"/-->
<?php if ($this->_tpl_vars['msg']['kinmu_city']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['kinmu_city']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>


<tr>
<th>勤務地&nbsp;番地まで</th>
<td><input class="input_w10 form-control" type="text" name="kinmu_address1" value="<?php echo $this->_tpl_vars['form']['kinmu_address1']; ?>
"/>
<?php if ($this->_tpl_vars['msg']['kinmu_address1']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['kinmu_address1']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>


<tr>
<th>勤務地&nbsp;建物名・階数</th>
<td><input class="input_w10 form-control" type="text" name="kiinmu_address2" value="<?php echo $this->_tpl_vars['form']['kiinmu_address2']; ?>
"/>
<?php if ($this->_tpl_vars['msg']['kiinmu_address2']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['kiinmu_address2']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>


	
<tr>
<th>緯度</th>
<td><input class="input_w10 form-control" type="text" name="lat" value="<?php echo $this->_tpl_vars['form']['lat']; ?>
"/>
<?php if ($this->_tpl_vars['msg']['lat']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['lat']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>
	

<tr>
<th>経度</th>
<td><input class="input_w10 form-control" type="text" name="lon" value="<?php echo $this->_tpl_vars['form']['lon']; ?>
"/>
<?php if ($this->_tpl_vars['msg']['lon']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['lon']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>
	


<tr>
<th>施設名</th>
<td><input class="input_w10 form-control" type="text" name="text02" value="<?php echo $this->_tpl_vars['form']['text02']; ?>
"/>
<?php if ($this->_tpl_vars['msg']['text02']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['text02']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>
	

<tr>
<th>募集職種</th>
<td>
<ul class="check_ul">
<!--<?php $_from = $this->_tpl_vars['mast_syokusyu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['syokusyu'][$this->_tpl_vars['item']['id']]): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="syokusyu[]" value="<?php echo $this->_tpl_vars['item']['id']; ?>
" <?php if ($this->_tpl_vars['form']['syokusyu'][$this->_tpl_vars['item']['id']]): ?>checked="checked"<?php endif; ?> /><?php echo $this->_tpl_vars['item']['name']; ?>
</label></div></li>
<?php endforeach; endif; unset($_from); ?>-->

<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['syokusyu'][1]): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="syokusyu[]" value="1" <?php if ($this->_tpl_vars['form']['syokusyu'][1]): ?>checked="checked"<?php endif; ?> />保育士</label></div></li>
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['syokusyu'][2]): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="syokusyu[]" value="2" <?php if ($this->_tpl_vars['form']['syokusyu'][2]): ?>checked="checked"<?php endif; ?> />幼稚園教諭</label></div></li>
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['syokusyu'][3]): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="syokusyu[]" value="3" <?php if ($this->_tpl_vars['form']['syokusyu'][3]): ?>checked="checked"<?php endif; ?> />園長</label></div></li>
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['syokusyu'][4]): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="syokusyu[]" value="4" <?php if ($this->_tpl_vars['form']['syokusyu'][4]): ?>checked="checked"<?php endif; ?> />主任</label></div></li>
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['syokusyu'][5]): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="syokusyu[]" value="5" <?php if ($this->_tpl_vars['form']['syokusyu'][5]): ?>checked="checked"<?php endif; ?> />看護師</label></div></li>
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['syokusyu'][6]): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="syokusyu[]" value="6" <?php if ($this->_tpl_vars['form']['syokusyu'][6]): ?>checked="checked"<?php endif; ?> />栄養士</label></div></li>
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['syokusyu'][7]): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="syokusyu[]" value="7" <?php if ($this->_tpl_vars['form']['syokusyu'][7]): ?>checked="checked"<?php endif; ?> />調理師</label></div></li>
	
	

</ul>
<?php if ($this->_tpl_vars['msg']['syokusyu']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['syokusyu']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>
indeed用職種
<!-- button with a dropdown -->
<div class="btn-group">
<button type="button" class="btn btn-default btn-sm dropdown-toggle btn_help" data-toggle="dropdown">
<i class="ion-help"></i></button>
<div class="dropdown-menu pull-left dropdown_menu_help" role="menu">
<p>
※indeedを運用される場合は必ず入力してください。<br />
※18文字以内で入力してください。<br />
※検索用の簡素化された職種のみがindeedに表示がされてしまうと、簡素すぎるためクリック率が低下するため、以下のように多少キャッチーな 表現で入力すると効果が上がります。
</p>
<table>
<tr>
<td>×</td>
<th>ケアマネージャー</th>
<td>⇒</td>
<td>○</td>
<td>有料老人ホームのケアマネージャー(正社員)</td>
</tr>
<tr>
<td>×</td>
<th>看護師</th>
<td>⇒</td>
<td>○</td>
<td>訪問看護師(完全週休2日・日勤)</td>
</tr>
<tr>
<td>×</td>
<th>歯科助手</th>
<td>⇒</td>
<td>○</td>
<td>歯科助手・受付（未経験からでもOK! ）</td>
</tr>
</table>
<p>競合の出稿方法を以下indeedから実際に検索いただけますと、参考になります。<br />
<a href="https://jp.indeed.com/" target="_blank">https://jp.indeed.com/（indeed公式サイト）</a></p>
</div>
</div>
</th>
<td>
<input class="input_w10 form-control" type="text" name="indeed" value="<?php echo $this->_tpl_vars['form']['indeed']; ?>
" maxlength="18">
</td>
</tr>

<!--
<tr>
<th>
indeedの自動更新
<div class="btn-group">
<button type="button" class="btn btn-default btn-sm dropdown-toggle btn_help" data-toggle="dropdown">
<i class="ion-help"></i></button>
<div class="dropdown-menu pull-left dropdown_menu_help" role="menu">
<p>自動更新をオンに設定いただくと、求人情報の最終更新日が自動更新されます。<br>
この機能は、indeed広告運用を最適化するための機能となります。<br>
indeedが求人情報の鮮度を重要視しているというアルゴリズムに対応したものであります。<br>
自動更新は機械的と判定されないため、一括で行われるのではなく、求人ごとにランダムに更新日が付与されるようになっています。</p>
</div>
</div>
</th>
<td>
<ul class="check_ul check_ul_2col">
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-info active"><input type="checkbox" autocomplete="off" name="" value="" checked="checked" /><i class="ion-ios-clock"></i> <span class="text_off">自動更新をONにする</span><span class="text_on">自動更新をOFFにする</span></label></div></li>
</ul>

<div class="error_message">
<ul>
<li></li>
</ul>
</div>

</td>
</tr>
-->


<tr>
<th>雇用形態</th>
<td>
<ul class="check_ul">
<?php $_from = $this->_tpl_vars['mast_koyou']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
	
<li><label><input type="radio" autocomplete="off" name="koyou[]" value="<?php echo $this->_tpl_vars['item']['id']; ?>
" <?php if ($this->_tpl_vars['form']['koyou'][$this->_tpl_vars['item']['id']]): ?>checked="checked"<?php endif; ?> /><?php echo $this->_tpl_vars['item']['name']; ?>
</label>
</li>
<?php endforeach; endif; unset($_from); ?>
</ul>
<?php if ($this->_tpl_vars['msg']['koyou']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['koyou']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>


<tr>
<th>給与（一覧）</th>
<td><input class="input_w10 form-control" type="text" name="text01" value="<?php echo $this->_tpl_vars['form']['text01']; ?>
"/>
<?php if ($this->_tpl_vars['msg']['text01']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['text01']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>給与（詳細）</th>
<td><textarea class="textarea_w10 form-control" name="kyuyo"><?php echo $this->_tpl_vars['form']['kyuyo']; ?>
</textarea>
<!--input class="input_w10 form-control" type="text" name="kyuyo" value="<?php echo $this->_tpl_vars['form']['kyuyo']; ?>
"-->
<p>例：【月給】410,000円～</p>
<?php if ($this->_tpl_vars['msg']['kyuyo']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['kyuyo']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>Google掲載用給与</th>
<td>
<select name="kyuyo_type" class="input_select form-control">
<option value="">給与タイプを選択してください</option>
<option value="1" <?php if ($this->_tpl_vars['form']['kyuyo_type'] == 1): ?>selected="selected"<?php endif; ?>>時給</option>
<option value="2" <?php if ($this->_tpl_vars['form']['kyuyo_type'] == 2): ?>selected="selected"<?php endif; ?>>週給</option>
<option value="3" <?php if ($this->_tpl_vars['form']['kyuyo_type'] == 3): ?>selected="selected"<?php endif; ?>>月給</option>
<option value="4" <?php if ($this->_tpl_vars['form']['kyuyo_type'] == 4): ?>selected="selected"<?php endif; ?>>年収</option>
</select><br/>
<input style="margin-top:10px;" class="input_w10 form-control" type="text" name="kyuyo_google" value="<?php if ($this->_tpl_vars['form']['kyuyo_google'] == 0): ?><?php else: ?><?php echo $this->_tpl_vars['form']['kyuyo_google']; ?>
<?php endif; ?>"> 円
<p>半角数値で入力してください (カンマは不要)</p>
<br/>
<p>範囲で給与を指定する場合は、以下に半角数値で入力してください (カンマは不要)</p>
<input class="input_w10 form-control" type="text" name="kyuyo_min_google" value="<?php if ($this->_tpl_vars['form']['kyuyo_min_google'] == 0): ?><?php else: ?><?php echo $this->_tpl_vars['form']['kyuyo_min_google']; ?>
<?php endif; ?>"> 円 〜 <input style="margin-top:10px;" class="input_w10 form-control" type="text" name="kyuyo_max_google" value="<?php if ($this->_tpl_vars['form']['kyuyo_max_google'] == 0): ?><?php else: ?><?php echo $this->_tpl_vars['form']['kyuyo_max_google']; ?>
<?php endif; ?>"> 円

<?php if ($this->_tpl_vars['msg']['kyuyo_google']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['kyuyo_google']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>



<tr>
<th>PRメッセージ</th>
<td><textarea class="textarea_w10 form-control" name="pr"><?php echo $this->_tpl_vars['form']['pr']; ?>
</textarea>
<?php if ($this->_tpl_vars['msg']['pr']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['pr']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>こだわり条件</th>
<td>
<ul class="check_ul">
<?php $_from = $this->_tpl_vars['mast_kodawari1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['kodawari1'][$this->_tpl_vars['item']['id']]): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="kodawari1[]" value="<?php echo $this->_tpl_vars['item']['id']; ?>
" <?php if ($this->_tpl_vars['form']['kodawari1'][$this->_tpl_vars['item']['id']]): ?>checked="checked"<?php endif; ?> /><?php echo $this->_tpl_vars['item']['name']; ?>
</label></div></li>
<?php endforeach; endif; unset($_from); ?>
</ul>
<?php if ($this->_tpl_vars['msg']['kodawari1']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['kodawari1']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>求人特集</th>
<td>
<ul class="check_ul">
<?php $_from = $this->_tpl_vars['mast_kodawari2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['kodawari2'][$this->_tpl_vars['item']['id']]): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="kodawari2[]" value="<?php echo $this->_tpl_vars['item']['id']; ?>
" <?php if ($this->_tpl_vars['form']['kodawari2'][$this->_tpl_vars['item']['id']]): ?>checked="checked"<?php endif; ?> /><?php echo $this->_tpl_vars['item']['name']; ?>
</label></div></li>
<?php endforeach; endif; unset($_from); ?>
</ul>
<?php if ($this->_tpl_vars['msg']['kodawari2']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['kodawari2']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>


<!--<tr>
<th>こだわりカテゴリ3</th>
<td>
<ul class="check_ul">
<?php $_from = $this->_tpl_vars['mast_kodawari3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['kodawari3'][$this->_tpl_vars['item']['id']]): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="kodawari3[]" value="<?php echo $this->_tpl_vars['item']['id']; ?>
" <?php if ($this->_tpl_vars['form']['kodawari3'][$this->_tpl_vars['item']['id']]): ?>checked="checked"<?php endif; ?> /><?php echo $this->_tpl_vars['item']['name']; ?>
</label></div></li>
<?php endforeach; endif; unset($_from); ?>
</ul>
<?php if ($this->_tpl_vars['msg']['kodawari3']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['kodawari3']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>-->



<tr>
<th>仕事内容</th>
<td><textarea class="textarea_w10 form-control" name="shigoto"><?php echo $this->_tpl_vars['form']['shigoto']; ?>
</textarea>
<?php if ($this->_tpl_vars['msg']['shigoto']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['shigoto']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>


<tr>
<th>勤務時間</th>
<td><textarea class="textarea_w10 form-control" name="jikan"><?php echo $this->_tpl_vars['form']['jikan']; ?>
</textarea>
<!--input class="input_w10 form-control" type="text" name="jikan" value="<?php echo $this->_tpl_vars['form']['jikan']; ?>
"-->
<p>例：09:00～17:00　※残業月10時間程度(手当支給されます)</p>
<?php if ($this->_tpl_vars['msg']['jikan']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['jikan']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>


<tr>
<th>休日</th>
<td><textarea class="textarea_w10 form-control" name="kyujitsu"><?php echo $this->_tpl_vars['form']['kyujitsu']; ?>
</textarea>
<!--input class="input_w10 form-control" type="text" name="kyujitsu" value="<?php echo $this->_tpl_vars['form']['kyujitsu']; ?>
"-->
<p>例：4週8休年末年始休暇(5日)、夏季休暇(3日)慶弔休暇、有給休暇、育児休暇、産前産後休暇、有給休暇など</p>
<?php if ($this->_tpl_vars['msg']['kyujitsu']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['kyujitsu']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>


<tr>
<th>応募資格</th>
<td><textarea class="textarea_w10 form-control" name="shikaku"><?php echo $this->_tpl_vars['form']['shikaku']; ?>
</textarea>
<!--input class="input_w10 form-control" type="text" name="shikaku" value="<?php echo $this->_tpl_vars['form']['shikaku']; ?>
"-->
<?php if ($this->_tpl_vars['msg']['shikaku']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['shikaku']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>手当</th>
<td><textarea class="textarea_w10 form-control" name="teate"><?php echo $this->_tpl_vars['form']['teate']; ?>
</textarea>
<?php if ($this->_tpl_vars['msg']['teate']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['teate']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>待遇・福利厚生</th>
<td><textarea class="textarea_w10 form-control" name="fukuri"><?php echo $this->_tpl_vars['form']['fukuri']; ?>
</textarea>
<!--input class="input_w10 form-control" type="text" name="fukuri" value="<?php echo $this->_tpl_vars['form']['fukuri']; ?>
"-->
<?php if ($this->_tpl_vars['msg']['fukuri']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['fukuri']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>


<!--
<tr>
<th>勤務地</th>
<td><input class="input_w10 form-control" type="text" name="kinmuti" value="<?php echo $this->_tpl_vars['form']['kinmuti']; ?>
"/>
<?php if ($this->_tpl_vars['msg']['kinmuti']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['kinmuti']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>
-->


<!--<tr>
<th>最寄駅・沿線</th>
<td><?php echo $this->_tpl_vars['form']['station']; ?>

<?php if ($this->_tpl_vars['form']['moyori'] == ""): ?>「最寄り駅は勤務地住所から自動取得されます」<?php else: ?><?php echo $this->_tpl_vars['form']['moyori']; ?>
<?php endif; ?>
<input type="hidden" name="station" value="<?php echo $this->_tpl_vars['form']['moyori']; ?>
">
<?php if ($this->_tpl_vars['msg']['moyori']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['moyori']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>-->


<!--<tr>
<th>勤務期間</th>
<td><textarea class="textarea_w10 form-control" name="kikan"><?php echo $this->_tpl_vars['form']['kikan']; ?>
</textarea>
<p>例：○○ヶ月～○○ヶ月</p>
<?php if ($this->_tpl_vars['msg']['kikan']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['kikan']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>-->

<tr>
<th>最寄り駅</th>
<td><textarea class="textarea_w10 form-control" name="koutsuu"><?php echo $this->_tpl_vars['form']['koutsuu']; ?>
</textarea>
<p>例：公共の交通機関をご利用ください。</p>
<?php if ($this->_tpl_vars['msg']['koutsuu']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['koutsuu']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<!--<tr>
<th>対象</th>
<td><textarea class="textarea_w10 form-control" name="taisyou"><?php echo $this->_tpl_vars['form']['taisyou']; ?>
</textarea>
<?php if ($this->_tpl_vars['msg']['taisyou']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['taisyou']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>-->

<!--
<tr>
<th>面接地</th>
<td>
<div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary"><input type="checkbox" name="same_kinmuti" value="1" onClick="do_change(this.checked);"> 勤務地と同じ</label></div>
</td>
</tr>

<tr>
<th>面接地&nbsp;郵便番号</th>
<td><input class="input_zip form-control" type="text" name="mensetsu_zip1" value="<?php echo $this->_tpl_vars['form']['mensetsu_zip1']; ?>
" />&nbsp;-&nbsp;
<input class="input_zip form-control" type="text" name="mensetsu_zip2" value="<?php echo $this->_tpl_vars['form']['mensetsu_zip2']; ?>
" onKeyUp="AjaxZip3.zip2addr('mensetsu_zip1','mensetsu_zip2','mensetsu_pref','mensetsu_city','mensetsu_addr1');" />
<?php if ($this->_tpl_vars['msg']['mensetsu_zip1']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['mensetsu_zip1']; ?>
</li>
</ul>
</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['msg']['mensetsu_zip2']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['mensetsu_zip2']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<a name="mensetsu"></a>

<tr>
<th>面接地&nbsp;都道府県</th>
<td>
<select name="mensetsu_pref" onChange="change_pref(this.value, 'mensetsu_city')" class="input_select form-control">
<option value="">都道府県を選択して下さい</option>
<option value="1" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 1): ?>selected="selected"<?php endif; ?>>北海道</option>
<option value="2" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 2): ?>selected="selected"<?php endif; ?>>青森県</option>
<option value="3" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 3): ?>selected="selected"<?php endif; ?>>岩手県</option>
<option value="4" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 4): ?>selected="selected"<?php endif; ?>>宮城県</option>
<option value="5" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 5): ?>selected="selected"<?php endif; ?>>秋田県</option>
<option value="6" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 6): ?>selected="selected"<?php endif; ?>>山形県</option>
<option value="7" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 7): ?>selected="selected"<?php endif; ?>>福島県</option>
<option value="8" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 8): ?>selected="selected"<?php endif; ?>>茨城県</option>
<option value="9" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 9): ?>selected="selected"<?php endif; ?>>栃木県</option>
<option value="10" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 10): ?>selected="selected"<?php endif; ?>>群馬県</option>
<option value="11" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 11): ?>selected="selected"<?php endif; ?>>埼玉県</option>
<option value="12" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 12): ?>selected="selected"<?php endif; ?>>千葉県</option>
<option value="13" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 13): ?>selected="selected"<?php endif; ?>>東京都</option>
<option value="14" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 14): ?>selected="selected"<?php endif; ?>>神奈川県</option>
<option value="15" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 15): ?>selected="selected"<?php endif; ?>>新潟県</option>
<option value="16" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 16): ?>selected="selected"<?php endif; ?>>富山県</option>
<option value="17" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 17): ?>selected="selected"<?php endif; ?>>石川県</option>
<option value="18" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 18): ?>selected="selected"<?php endif; ?>>福井県</option>
<option value="19" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 19): ?>selected="selected"<?php endif; ?>>山梨県</option>
<option value="20" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 20): ?>selected="selected"<?php endif; ?>>長野県</option>
<option value="21" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 21): ?>selected="selected"<?php endif; ?>>岐阜県</option>
<option value="22" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 22): ?>selected="selected"<?php endif; ?>>静岡県</option>
<option value="23" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 23): ?>selected="selected"<?php endif; ?>>愛知県</option>
<option value="24" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 24): ?>selected="selected"<?php endif; ?>>三重県</option>
<option value="25" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 25): ?>selected="selected"<?php endif; ?>>滋賀県</option>
<option value="26" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 26): ?>selected="selected"<?php endif; ?>>京都府</option>
<option value="27" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 27): ?>selected="selected"<?php endif; ?>>大阪府</option>
<option value="28" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 28): ?>selected="selected"<?php endif; ?>>兵庫県</option>
<option value="29" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 29): ?>selected="selected"<?php endif; ?>>奈良県</option>
<option value="30" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 30): ?>selected="selected"<?php endif; ?>>和歌山県</option>
<option value="31" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 31): ?>selected="selected"<?php endif; ?>>鳥取県</option>
<option value="32" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 32): ?>selected="selected"<?php endif; ?>>島根県</option>
<option value="33" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 33): ?>selected="selected"<?php endif; ?>>岡山県</option>
<option value="34" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 34): ?>selected="selected"<?php endif; ?>>広島県</option>
<option value="35" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 35): ?>selected="selected"<?php endif; ?>>山口県</option>
<option value="36" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 36): ?>selected="selected"<?php endif; ?>>徳島県</option>
<option value="37" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 37): ?>selected="selected"<?php endif; ?>>香川県</option>
<option value="38" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 38): ?>selected="selected"<?php endif; ?>>愛媛県</option>
<option value="39" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 39): ?>selected="selected"<?php endif; ?>>高知県</option>
<option value="40" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 40): ?>selected="selected"<?php endif; ?>>福岡県</option>
<option value="41" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 41): ?>selected="selected"<?php endif; ?>>佐賀県</option>
<option value="42" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 42): ?>selected="selected"<?php endif; ?>>長崎県</option>
<option value="43" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 43): ?>selected="selected"<?php endif; ?>>熊本県</option>
<option value="44" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 44): ?>selected="selected"<?php endif; ?>>大分県</option>
<option value="45" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 45): ?>selected="selected"<?php endif; ?>>宮崎県</option>
<option value="46" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 46): ?>selected="selected"<?php endif; ?>>鹿児島県</option>
<option value="47" <?php if ($this->_tpl_vars['form']['mensetsu_pref'] == 47): ?>selected="selected"<?php endif; ?>>沖縄県</option>
</select>
<?php if ($this->_tpl_vars['mensetsu_list']): ?>
<span class="mLft10"><a href="#open01">過去に登録した面接地から選択する</a></span>
<div id="modal">
<div id="open01">
<a href="#" class="close_overlay">×</a>
<span class="modal_window">
<h3>過去に登録した面接地から選択する</h3>
<?php $_from = $this->_tpl_vars['mensetsu_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<p><a href="javascript:set_mensetsu('<?php echo $this->_tpl_vars['item']['zip1']; ?>
', '<?php echo $this->_tpl_vars['item']['zip2']; ?>
', '<?php echo $this->_tpl_vars['item']['pref']; ?>
', '<?php echo $this->_tpl_vars['item']['city']; ?>
', '<?php echo $this->_tpl_vars['item']['address1']; ?>
', '<?php echo $this->_tpl_vars['item']['address2']; ?>
')"><?php echo $this->_tpl_vars['item']['address']; ?>
</a><span class="fr mr15"></span></p>
<?php endforeach; endif; unset($_from); ?>
<a href="#mensetsu">【×】CLOSE&nbsp;</a>
</span>
</div>
</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['msg']['mensetsu_pref']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['mensetsu_pref']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>面接地&nbsp;市区町村</th>
<td>
<select name="mensetsu_city" id="mensetsu_city" class="input_select form-control">
<option value="">市区を選択して下さい</option>
</select>
<?php if ($this->_tpl_vars['msg']['mensetsu_city']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['mensetsu_city']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>面接地&nbsp;番地まで</th>
<td><input class="input_w10 form-control" type="text" name="mensetsu_addr1" value="<?php echo $this->_tpl_vars['form']['mensetsu_addr1']; ?>
"/>
<?php if ($this->_tpl_vars['msg']['mensetsu_addr1']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['mensetsu_addr1']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>面接地&nbsp;建物名・階数</th>
<td><input class="input_w10 form-control" type="text" name="mensetsu_addr2" value="<?php echo $this->_tpl_vars['form']['mensetsu_addr2']; ?>
"/>
<?php if ($this->_tpl_vars['msg']['mensetsu_addr2']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['mensetsu_addr2']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>-->

<tr>
<th>コンサルタントからの一言</th>
<td><textarea class="textarea_w10 form-control" name="consult"><?php echo $this->_tpl_vars['form']['consult']; ?>
</textarea>
<p>HTMLの入力ができます。</p>
<?php if ($this->_tpl_vars['msg']['consult']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['consult']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<!--
<tr>
<th>ymd01</th>
<td><div class="fl mr05">
<select name="ymd01_year" class="input_select form-control">
<option value="">----</option>
<option value="2001" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 2001): ?>selected="selected"<?php endif; ?>>2001</option>
<option value="2002" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 2002): ?>selected="selected"<?php endif; ?>>2002</option>
<option value="2003" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 2003): ?>selected="selected"<?php endif; ?>>2003</option>
<option value="2004" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 2004): ?>selected="selected"<?php endif; ?>>2004</option>
<option value="2005" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 2005): ?>selected="selected"<?php endif; ?>>2005</option>
<option value="2006" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 2006): ?>selected="selected"<?php endif; ?>>2006</option>
<option value="2007" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 2007): ?>selected="selected"<?php endif; ?>>2007</option>
<option value="2008" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 2008): ?>selected="selected"<?php endif; ?>>2008</option>
<option value="2009" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 2009): ?>selected="selected"<?php endif; ?>>2009</option>
<option value="2010" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 2010): ?>selected="selected"<?php endif; ?>>2010</option>
<option value="2011" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 2011): ?>selected="selected"<?php endif; ?>>2011</option>
<option value="2012" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 2012): ?>selected="selected"<?php endif; ?>>2012</option>
<option value="2013" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 2013): ?>selected="selected"<?php endif; ?>>2013</option>
<option value="2014" <?php if ($this->_tpl_vars['form']['ymd01_year'] == 2014): ?>selected="selected"<?php endif; ?>>2014</option>
</select>
</div>
<p class="fl lh28 mr15">年</p>
<div class="fl mr05">
<select name="ymd01_month" class="input_select form-control">
<option value="">--</option>
<option value="1" <?php if ($this->_tpl_vars['form']['ymd01_month'] == 1): ?>selected="selected"<?php endif; ?>>1</option>
<option value="2" <?php if ($this->_tpl_vars['form']['ymd01_month'] == 2): ?>selected="selected"<?php endif; ?>>2</option>
<option value="3" <?php if ($this->_tpl_vars['form']['ymd01_month'] == 3): ?>selected="selected"<?php endif; ?>>3</option>
<option value="4" <?php if ($this->_tpl_vars['form']['ymd01_month'] == 4): ?>selected="selected"<?php endif; ?>>4</option>
<option value="5" <?php if ($this->_tpl_vars['form']['ymd01_month'] == 5): ?>selected="selected"<?php endif; ?>>5</option>
<option value="6" <?php if ($this->_tpl_vars['form']['ymd01_month'] == 6): ?>selected="selected"<?php endif; ?>>6</option>
<option value="7" <?php if ($this->_tpl_vars['form']['ymd01_month'] == 7): ?>selected="selected"<?php endif; ?>>7</option>
<option value="8" <?php if ($this->_tpl_vars['form']['ymd01_month'] == 8): ?>selected="selected"<?php endif; ?>>8</option>
<option value="9" <?php if ($this->_tpl_vars['form']['ymd01_month'] == 9): ?>selected="selected"<?php endif; ?>>9</option>
<option value="10" <?php if ($this->_tpl_vars['form']['ymd01_month'] == 10): ?>selected="selected"<?php endif; ?>>10</option>
<option value="11" <?php if ($this->_tpl_vars['form']['ymd01_month'] == 11): ?>selected="selected"<?php endif; ?>>11</option>
<option value="12" <?php if ($this->_tpl_vars['form']['ymd01_month'] == 12): ?>selected="selected"<?php endif; ?>>12</option>
</select>
</div>
<p class="fl lh28 mr15">月</p>
<div class="fl mr05">
<select name="ymd01_day" class="input_select form-control">
<option value="">--</option>
<option value="1" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 1): ?>selected="selected"<?php endif; ?>>1</option>
<option value="2" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 2): ?>selected="selected"<?php endif; ?>>2</option>
<option value="3" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 3): ?>selected="selected"<?php endif; ?>>3</option>
<option value="4" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 4): ?>selected="selected"<?php endif; ?>>4</option>
<option value="5" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 5): ?>selected="selected"<?php endif; ?>>5</option>
<option value="6" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 6): ?>selected="selected"<?php endif; ?>>6</option>
<option value="7" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 7): ?>selected="selected"<?php endif; ?>>7</option>
<option value="8" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 8): ?>selected="selected"<?php endif; ?>>8</option>
<option value="9" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 9): ?>selected="selected"<?php endif; ?>>9</option>
<option value="10" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 10): ?>selected="selected"<?php endif; ?>>10</option>
<option value="11" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 11): ?>selected="selected"<?php endif; ?>>11</option>
<option value="12" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 12): ?>selected="selected"<?php endif; ?>>12</option>
<option value="13" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 13): ?>selected="selected"<?php endif; ?>>13</option>
<option value="14" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 14): ?>selected="selected"<?php endif; ?>>14</option>
<option value="15" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 15): ?>selected="selected"<?php endif; ?>>15</option>
<option value="16" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 16): ?>selected="selected"<?php endif; ?>>16</option>
<option value="17" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 17): ?>selected="selected"<?php endif; ?>>17</option>
<option value="18" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 18): ?>selected="selected"<?php endif; ?>>18</option>
<option value="19" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 19): ?>selected="selected"<?php endif; ?>>19</option>
<option value="20" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 20): ?>selected="selected"<?php endif; ?>>20</option>
<option value="21" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 21): ?>selected="selected"<?php endif; ?>>21</option>
<option value="22" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 22): ?>selected="selected"<?php endif; ?>>22</option>
<option value="23" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 23): ?>selected="selected"<?php endif; ?>>23</option>
<option value="24" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 24): ?>selected="selected"<?php endif; ?>>24</option>
<option value="25" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 25): ?>selected="selected"<?php endif; ?>>25</option>
<option value="26" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 26): ?>selected="selected"<?php endif; ?>>26</option>
<option value="27" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 27): ?>selected="selected"<?php endif; ?>>27</option>
<option value="28" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 28): ?>selected="selected"<?php endif; ?>>28</option>
<option value="29" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 29): ?>selected="selected"<?php endif; ?>>29</option>
<option value="30" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 30): ?>selected="selected"<?php endif; ?>>30</option>
<option value="31" <?php if ($this->_tpl_vars['form']['ymd01_day'] == 31): ?>selected="selected"<?php endif; ?>>31</option>
</select>
</div>
<p class="fl lh28">日</p>
<?php if ($this->_tpl_vars['msg']['ymd01_year']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['ymd01_year']; ?>
</li>
</ul>
</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['msg']['ymd01_month']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['ymd01_month']; ?>
</li>
</ul>
</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['msg']['ymd01_day']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['ymd01_day']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>ymd02</th>
<td><div class="fl mr05">
<select name="ymd02_year" class="input_select form-control">
<option value="">----</option>
<option value="2001" <?php if ($this->_tpl_vars['form']['ymd02_year'] == 2001): ?>selected="selected"<?php endif; ?>>2001</option>
<option value="2002" <?php if ($this->_tpl_vars['form']['ymd02_year'] == 2002): ?>selected="selected"<?php endif; ?>>2002</option>
<option value="2003" <?php if ($this->_tpl_vars['form']['ymd02_year'] == 2003): ?>selected="selected"<?php endif; ?>>2003</option>
<option value="2004" <?php if ($this->_tpl_vars['form']['ymd02_year'] == 2004): ?>selected="selected"<?php endif; ?>>2004</option>
<option value="2005" <?php if ($this->_tpl_vars['form']['ymd02_year'] == 2005): ?>selected="selected"<?php endif; ?>>2005</option>
<option value="2006" <?php if ($this->_tpl_vars['form']['ymd02_year'] == 2006): ?>selected="selected"<?php endif; ?>>2006</option>
<option value="2007" <?php if ($this->_tpl_vars['form']['ymd02_year'] == 2007): ?>selected="selected"<?php endif; ?>>2007</option>
<option value="2008" <?php if ($this->_tpl_vars['form']['ymd02_year'] == 2008): ?>selected="selected"<?php endif; ?>>2008</option>
<option value="2009" <?php if ($this->_tpl_vars['form']['ymd02_year'] == 2009): ?>selected="selected"<?php endif; ?>>2009</option>
<option value="2010" <?php if ($this->_tpl_vars['form']['ymd02_year'] == 2010): ?>selected="selected"<?php endif; ?>>2010</option>
<option value="2011" <?php if ($this->_tpl_vars['form']['ymd02_year'] == 2011): ?>selected="selected"<?php endif; ?>>2011</option>
<option value="2012" <?php if ($this->_tpl_vars['form']['ymd02_year'] == 2012): ?>selected="selected"<?php endif; ?>>2012</option>
<option value="2013" <?php if ($this->_tpl_vars['form']['ymd02_year'] == 2013): ?>selected="selected"<?php endif; ?>>2013</option>
<option value="2014" <?php if ($this->_tpl_vars['form']['ymd02_year'] == 2014): ?>selected="selected"<?php endif; ?>>2014</option>
</select>
</div>
<p class="fl lh28 mr15">年</p>
<div class="fl mr05">
<select name="ymd02_month" class="input_select form-control">
<option value="">--</option>
<option value="1" <?php if ($this->_tpl_vars['form']['ymd02_month'] == 1): ?>selected="selected"<?php endif; ?>>1</option>
<option value="2" <?php if ($this->_tpl_vars['form']['ymd02_month'] == 2): ?>selected="selected"<?php endif; ?>>2</option>
<option value="3" <?php if ($this->_tpl_vars['form']['ymd02_month'] == 3): ?>selected="selected"<?php endif; ?>>3</option>
<option value="4" <?php if ($this->_tpl_vars['form']['ymd02_month'] == 4): ?>selected="selected"<?php endif; ?>>4</option>
<option value="5" <?php if ($this->_tpl_vars['form']['ymd02_month'] == 5): ?>selected="selected"<?php endif; ?>>5</option>
<option value="6" <?php if ($this->_tpl_vars['form']['ymd02_month'] == 6): ?>selected="selected"<?php endif; ?>>6</option>
<option value="7" <?php if ($this->_tpl_vars['form']['ymd02_month'] == 7): ?>selected="selected"<?php endif; ?>>7</option>
<option value="8" <?php if ($this->_tpl_vars['form']['ymd02_month'] == 8): ?>selected="selected"<?php endif; ?>>8</option>
<option value="9" <?php if ($this->_tpl_vars['form']['ymd02_month'] == 9): ?>selected="selected"<?php endif; ?>>9</option>
<option value="10" <?php if ($this->_tpl_vars['form']['ymd02_month'] == 10): ?>selected="selected"<?php endif; ?>>10</option>
<option value="11" <?php if ($this->_tpl_vars['form']['ymd02_month'] == 11): ?>selected="selected"<?php endif; ?>>11</option>
<option value="12" <?php if ($this->_tpl_vars['form']['ymd02_month'] == 12): ?>selected="selected"<?php endif; ?>>12</option>
</select>
</div>
<p class="fl lh28 mr15">月</p>
<div class="fl mr05">
<select name="ymd02_day" class="input_select form-control">
<option value="">--</option>
<option value="1" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 1): ?>selected="selected"<?php endif; ?>>1</option>
<option value="2" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 2): ?>selected="selected"<?php endif; ?>>2</option>
<option value="3" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 3): ?>selected="selected"<?php endif; ?>>3</option>
<option value="4" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 4): ?>selected="selected"<?php endif; ?>>4</option>
<option value="5" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 5): ?>selected="selected"<?php endif; ?>>5</option>
<option value="6" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 6): ?>selected="selected"<?php endif; ?>>6</option>
<option value="7" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 7): ?>selected="selected"<?php endif; ?>>7</option>
<option value="8" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 8): ?>selected="selected"<?php endif; ?>>8</option>
<option value="9" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 9): ?>selected="selected"<?php endif; ?>>9</option>
<option value="10" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 10): ?>selected="selected"<?php endif; ?>>10</option>
<option value="11" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 11): ?>selected="selected"<?php endif; ?>>11</option>
<option value="12" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 12): ?>selected="selected"<?php endif; ?>>12</option>
<option value="13" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 13): ?>selected="selected"<?php endif; ?>>13</option>
<option value="14" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 14): ?>selected="selected"<?php endif; ?>>14</option>
<option value="15" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 15): ?>selected="selected"<?php endif; ?>>15</option>
<option value="16" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 16): ?>selected="selected"<?php endif; ?>>16</option>
<option value="17" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 17): ?>selected="selected"<?php endif; ?>>17</option>
<option value="18" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 18): ?>selected="selected"<?php endif; ?>>18</option>
<option value="19" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 19): ?>selected="selected"<?php endif; ?>>19</option>
<option value="20" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 20): ?>selected="selected"<?php endif; ?>>20</option>
<option value="21" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 21): ?>selected="selected"<?php endif; ?>>21</option>
<option value="22" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 22): ?>selected="selected"<?php endif; ?>>22</option>
<option value="23" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 23): ?>selected="selected"<?php endif; ?>>23</option>
<option value="24" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 24): ?>selected="selected"<?php endif; ?>>24</option>
<option value="25" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 25): ?>selected="selected"<?php endif; ?>>25</option>
<option value="26" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 26): ?>selected="selected"<?php endif; ?>>26</option>
<option value="27" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 27): ?>selected="selected"<?php endif; ?>>27</option>
<option value="28" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 28): ?>selected="selected"<?php endif; ?>>28</option>
<option value="29" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 29): ?>selected="selected"<?php endif; ?>>29</option>
<option value="30" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 30): ?>selected="selected"<?php endif; ?>>30</option>
<option value="31" <?php if ($this->_tpl_vars['form']['ymd02_day'] == 31): ?>selected="selected"<?php endif; ?>>31</option>
</select>
</div>
<p class="fl lh28">日</p>
<?php if ($this->_tpl_vars['msg']['ymd02_year']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['ymd02_year']; ?>
</li>
</ul>
</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['msg']['ymd02_month']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['ymd02_month']; ?>
</li>
</ul>
</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['msg']['ymd02_day']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['ymd02_day']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>ymd03</th>
<td><div class="fl mr05">
<select name="ymd03_year" class="input_select form-control">
<option value="">----</option>
<option value="2001" <?php if ($this->_tpl_vars['form']['ymd03_year'] == 2001): ?>selected="selected"<?php endif; ?>>2001</option>
<option value="2002" <?php if ($this->_tpl_vars['form']['ymd03_year'] == 2002): ?>selected="selected"<?php endif; ?>>2002</option>
<option value="2003" <?php if ($this->_tpl_vars['form']['ymd03_year'] == 2003): ?>selected="selected"<?php endif; ?>>2003</option>
<option value="2004" <?php if ($this->_tpl_vars['form']['ymd03_year'] == 2004): ?>selected="selected"<?php endif; ?>>2004</option>
<option value="2005" <?php if ($this->_tpl_vars['form']['ymd03_year'] == 2005): ?>selected="selected"<?php endif; ?>>2005</option>
<option value="2006" <?php if ($this->_tpl_vars['form']['ymd03_year'] == 2006): ?>selected="selected"<?php endif; ?>>2006</option>
<option value="2007" <?php if ($this->_tpl_vars['form']['ymd03_year'] == 2007): ?>selected="selected"<?php endif; ?>>2007</option>
<option value="2008" <?php if ($this->_tpl_vars['form']['ymd03_year'] == 2008): ?>selected="selected"<?php endif; ?>>2008</option>
<option value="2009" <?php if ($this->_tpl_vars['form']['ymd03_year'] == 2009): ?>selected="selected"<?php endif; ?>>2009</option>
<option value="2010" <?php if ($this->_tpl_vars['form']['ymd03_year'] == 2010): ?>selected="selected"<?php endif; ?>>2010</option>
<option value="2011" <?php if ($this->_tpl_vars['form']['ymd03_year'] == 2011): ?>selected="selected"<?php endif; ?>>2011</option>
<option value="2012" <?php if ($this->_tpl_vars['form']['ymd03_year'] == 2012): ?>selected="selected"<?php endif; ?>>2012</option>
<option value="2013" <?php if ($this->_tpl_vars['form']['ymd03_year'] == 2013): ?>selected="selected"<?php endif; ?>>2013</option>
<option value="2014" <?php if ($this->_tpl_vars['form']['ymd03_year'] == 2014): ?>selected="selected"<?php endif; ?>>2014</option>
</select>
</div>
<p class="fl lh28 mr15">年</p>
<div class="fl mr05">
<select name="ymd03_month" class="input_select form-control">
<option value="">--</option>
<option value="1" <?php if ($this->_tpl_vars['form']['ymd03_month'] == 1): ?>selected="selected"<?php endif; ?>>1</option>
<option value="2" <?php if ($this->_tpl_vars['form']['ymd03_month'] == 2): ?>selected="selected"<?php endif; ?>>2</option>
<option value="3" <?php if ($this->_tpl_vars['form']['ymd03_month'] == 3): ?>selected="selected"<?php endif; ?>>3</option>
<option value="4" <?php if ($this->_tpl_vars['form']['ymd03_month'] == 4): ?>selected="selected"<?php endif; ?>>4</option>
<option value="5" <?php if ($this->_tpl_vars['form']['ymd03_month'] == 5): ?>selected="selected"<?php endif; ?>>5</option>
<option value="6" <?php if ($this->_tpl_vars['form']['ymd03_month'] == 6): ?>selected="selected"<?php endif; ?>>6</option>
<option value="7" <?php if ($this->_tpl_vars['form']['ymd03_month'] == 7): ?>selected="selected"<?php endif; ?>>7</option>
<option value="8" <?php if ($this->_tpl_vars['form']['ymd03_month'] == 8): ?>selected="selected"<?php endif; ?>>8</option>
<option value="9" <?php if ($this->_tpl_vars['form']['ymd03_month'] == 9): ?>selected="selected"<?php endif; ?>>9</option>
<option value="10" <?php if ($this->_tpl_vars['form']['ymd03_month'] == 10): ?>selected="selected"<?php endif; ?>>10</option>
<option value="11" <?php if ($this->_tpl_vars['form']['ymd03_month'] == 11): ?>selected="selected"<?php endif; ?>>11</option>
<option value="12" <?php if ($this->_tpl_vars['form']['ymd03_month'] == 12): ?>selected="selected"<?php endif; ?>>12</option>
</select>
</div>
<p class="fl lh28 mr15">月</p>
<div class="fl mr05">
<select name="ymd03_day" class="input_select form-control">
<option value="">--</option>
<option value="1" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 1): ?>selected="selected"<?php endif; ?>>1</option>
<option value="2" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 2): ?>selected="selected"<?php endif; ?>>2</option>
<option value="3" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 3): ?>selected="selected"<?php endif; ?>>3</option>
<option value="4" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 4): ?>selected="selected"<?php endif; ?>>4</option>
<option value="5" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 5): ?>selected="selected"<?php endif; ?>>5</option>
<option value="6" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 6): ?>selected="selected"<?php endif; ?>>6</option>
<option value="7" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 7): ?>selected="selected"<?php endif; ?>>7</option>
<option value="8" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 8): ?>selected="selected"<?php endif; ?>>8</option>
<option value="9" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 9): ?>selected="selected"<?php endif; ?>>9</option>
<option value="10" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 10): ?>selected="selected"<?php endif; ?>>10</option>
<option value="11" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 11): ?>selected="selected"<?php endif; ?>>11</option>
<option value="12" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 12): ?>selected="selected"<?php endif; ?>>12</option>
<option value="13" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 13): ?>selected="selected"<?php endif; ?>>13</option>
<option value="14" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 14): ?>selected="selected"<?php endif; ?>>14</option>
<option value="15" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 15): ?>selected="selected"<?php endif; ?>>15</option>
<option value="16" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 16): ?>selected="selected"<?php endif; ?>>16</option>
<option value="17" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 17): ?>selected="selected"<?php endif; ?>>17</option>
<option value="18" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 18): ?>selected="selected"<?php endif; ?>>18</option>
<option value="19" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 19): ?>selected="selected"<?php endif; ?>>19</option>
<option value="20" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 20): ?>selected="selected"<?php endif; ?>>20</option>
<option value="21" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 21): ?>selected="selected"<?php endif; ?>>21</option>
<option value="22" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 22): ?>selected="selected"<?php endif; ?>>22</option>
<option value="23" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 23): ?>selected="selected"<?php endif; ?>>23</option>
<option value="24" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 24): ?>selected="selected"<?php endif; ?>>24</option>
<option value="25" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 25): ?>selected="selected"<?php endif; ?>>25</option>
<option value="26" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 26): ?>selected="selected"<?php endif; ?>>26</option>
<option value="27" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 27): ?>selected="selected"<?php endif; ?>>27</option>
<option value="28" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 28): ?>selected="selected"<?php endif; ?>>28</option>
<option value="29" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 29): ?>selected="selected"<?php endif; ?>>29</option>
<option value="30" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 30): ?>selected="selected"<?php endif; ?>>30</option>
<option value="31" <?php if ($this->_tpl_vars['form']['ymd03_day'] == 31): ?>selected="selected"<?php endif; ?>>31</option>
</select>
</div>
<p class="fl lh28">日</p>
<?php if ($this->_tpl_vars['msg']['ymd03_year']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['ymd03_year']; ?>
</li>
</ul>
</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['msg']['ymd03_month']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['ymd03_month']; ?>
</li>
</ul>
</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['msg']['ymd03_day']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['ymd03_day']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>textarea01</th>
<td><textarea class="textarea_w10 form-control" name="textarea01"><?php echo $this->_tpl_vars['form']['textarea01']; ?>
</textarea>
<?php if ($this->_tpl_vars['msg']['textarea01']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['textarea01']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>textarea02</th>
<td><textarea class="textarea_w10 form-control" name="textarea02"><?php echo $this->_tpl_vars['form']['textarea02']; ?>
</textarea>
<?php if ($this->_tpl_vars['msg']['textarea02']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['textarea02']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>textarea03</th>
<td><textarea class="textarea_w10 form-control" name="textarea03"><?php echo $this->_tpl_vars['form']['textarea03']; ?>
</textarea>
<?php if ($this->_tpl_vars['msg']['textarea03']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['textarea03']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>textarea04</th>
<td><textarea class="textarea_w10 form-control" name="textarea04"><?php echo $this->_tpl_vars['form']['textarea04']; ?>
</textarea>
<?php if ($this->_tpl_vars['msg']['textarea04']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['textarea04']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>textarea05</th>
<td><textarea class="textarea_w10 form-control" name="textarea05"><?php echo $this->_tpl_vars['form']['textarea05']; ?>
</textarea>
<?php if ($this->_tpl_vars['msg']['textarea05']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['textarea05']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>textarea06</th>
<td><textarea class="textarea_w10 form-control" name="textarea06"><?php echo $this->_tpl_vars['form']['textarea06']; ?>
</textarea>
<?php if ($this->_tpl_vars['msg']['textarea06']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['textarea06']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>textarea07</th>
<td><textarea class="textarea_w10 form-control" name="textarea07"><?php echo $this->_tpl_vars['form']['textarea07']; ?>
</textarea>
<?php if ($this->_tpl_vars['msg']['textarea07']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['textarea07']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>textarea08</th>
<td><textarea class="textarea_w10 form-control" name="textarea08"><?php echo $this->_tpl_vars['form']['textarea08']; ?>
</textarea>
<?php if ($this->_tpl_vars['msg']['textarea08']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['textarea08']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>textarea09</th>
<td><textarea class="textarea_w10 form-control" name="textarea09"><?php echo $this->_tpl_vars['form']['textarea09']; ?>
</textarea>
<?php if ($this->_tpl_vars['msg']['textarea09']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['textarea09']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>textarea10</th>
<td><textarea class="textarea_w10 form-control" name="textarea10"><?php echo $this->_tpl_vars['form']['textarea10']; ?>
</textarea>
<?php if ($this->_tpl_vars['msg']['textarea10']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['textarea10']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>







<tr>
<th>text05</th>
<td><input class="input_w10 form-control" type="text" name="text05" value="<?php echo $this->_tpl_vars['form']['text05']; ?>
"/>
<?php if ($this->_tpl_vars['msg']['text05']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['text05']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>text06</th>
<td><input class="input_w10 form-control" type="text" name="text06" value="<?php echo $this->_tpl_vars['form']['text06']; ?>
"/>
<?php if ($this->_tpl_vars['msg']['text06']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['text06']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>text07</th>
<td><input class="input_w10 form-control" type="text" name="text07" value="<?php echo $this->_tpl_vars['form']['text07']; ?>
"/>
<?php if ($this->_tpl_vars['msg']['text07']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['text07']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>text08</th>
<td><input class="input_w10 form-control" type="text" name="text08" value="<?php echo $this->_tpl_vars['form']['text08']; ?>
"/>
<?php if ($this->_tpl_vars['msg']['text08']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['text08']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>text09</th>
<td><input class="input_w10 form-control" type="text" name="text09" value="<?php echo $this->_tpl_vars['form']['text09']; ?>
"/>
<?php if ($this->_tpl_vars['msg']['text09']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['text09']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>text10</th>
<td><input class="input_w10 form-control" type="text" name="text10" value="<?php echo $this->_tpl_vars['form']['text10']; ?>
"/>
<?php if ($this->_tpl_vars['msg']['text10']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['text10']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>radio01</th>
<td>
<ul class="check_ul">
<li><label><input type="radio" name="radio01" value="1" <?php if ($this->_tpl_vars['form']['radio01'] == 1): ?>checked="checked"<?php endif; ?> />&nbsp;値1</label></li>
<li><label><input type="radio" name="radio01" value="2" <?php if ($this->_tpl_vars['form']['radio01'] == 2): ?>checked="checked"<?php endif; ?> />&nbsp;値2</label></li>
<li><label><input type="radio" name="radio01" value="3" <?php if ($this->_tpl_vars['form']['radio01'] == 3): ?>checked="checked"<?php endif; ?> />&nbsp;値3</label></li>
</ul>
<?php if ($this->_tpl_vars['msg']['radio01']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['radio01']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>radio02</th>
<td>
<ul class="check_ul">
<li><label><input type="radio" name="radio02" value="1" <?php if ($this->_tpl_vars['form']['radio02'] == 1): ?>checked="checked"<?php endif; ?> />&nbsp;値1</label></li>
<li><label><input type="radio" name="radio02" value="2" <?php if ($this->_tpl_vars['form']['radio02'] == 2): ?>checked="checked"<?php endif; ?> />&nbsp;値2</label></li>
<li><label><input type="radio" name="radio02" value="3" <?php if ($this->_tpl_vars['form']['radio02'] == 3): ?>checked="checked"<?php endif; ?> />&nbsp;値3</label></li>
</ul>
<?php if ($this->_tpl_vars['msg']['radio02']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['radio02']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>radio03</th>
<td>
<ul class="check_ul">
<li><label><input type="radio" name="radio03" value="1" <?php if ($this->_tpl_vars['form']['radio03'] == 1): ?>checked="checked"<?php endif; ?> />&nbsp;値1</label></li>
<li><label><input type="radio" name="radio03" value="2" <?php if ($this->_tpl_vars['form']['radio03'] == 2): ?>checked="checked"<?php endif; ?> />&nbsp;値2</label></li>
<li><label><input type="radio" name="radio03" value="3" <?php if ($this->_tpl_vars['form']['radio03'] == 3): ?>checked="checked"<?php endif; ?> />&nbsp;値3</label></li>
</ul>
<?php if ($this->_tpl_vars['msg']['radio03']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['radio03']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>radio04</th>
<td>
<ul class="check_ul">
<li><label><input type="radio" name="radio04" value="1" <?php if ($this->_tpl_vars['form']['radio04'] == 1): ?>checked="checked"<?php endif; ?> />&nbsp;値1</label></li>
<li><label><input type="radio" name="radio04" value="2" <?php if ($this->_tpl_vars['form']['radio04'] == 2): ?>checked="checked"<?php endif; ?> />&nbsp;値2</label></li>
<li><label><input type="radio" name="radio04" value="3" <?php if ($this->_tpl_vars['form']['radio04'] == 3): ?>checked="checked"<?php endif; ?> />&nbsp;値3</label></li>
</ul>
<?php if ($this->_tpl_vars['msg']['radio04']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['radio04']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>radio05</th>
<td>
<ul class="check_ul">
<li><label><input type="radio" name="radio05" value="1" <?php if ($this->_tpl_vars['form']['radio05'] == 1): ?>checked="checked"<?php endif; ?> />&nbsp;値1</label></li>
<li><label><input type="radio" name="radio05" value="2" <?php if ($this->_tpl_vars['form']['radio05'] == 2): ?>checked="checked"<?php endif; ?> />&nbsp;値2</label></li>
<li><label><input type="radio" name="radio05" value="3" <?php if ($this->_tpl_vars['form']['radio05'] == 3): ?>checked="checked"<?php endif; ?> />&nbsp;値3</label></li>
</ul>
<?php if ($this->_tpl_vars['msg']['radio05']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['radio05']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>



<tr>
<th>check02</th>
<td>
<ul class="check_ul">
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['check02']['1']): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="check02[]" value="1" <?php if ($this->_tpl_vars['form']['check02']['1']): ?>checked="checked"<?php endif; ?> />値1</label></div></li>
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['check02']['2']): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="check02[]" value="2" <?php if ($this->_tpl_vars['form']['check02']['2']): ?>checked="checked"<?php endif; ?> />値2</label></div></li>
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['check02']['3']): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="check02[]" value="3" <?php if ($this->_tpl_vars['form']['check02']['3']): ?>checked="checked"<?php endif; ?> />値3</label></div></li>
</ul>
<?php if ($this->_tpl_vars['msg']['check02']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['check02']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>check03</th>
<td>
<ul class="check_ul">
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['check03']['1']): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="check03[]" value="1" <?php if ($this->_tpl_vars['form']['check03']['1']): ?>checked="checked"<?php endif; ?> />値1</label></div></li>
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['check03']['2']): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="check03[]" value="2" <?php if ($this->_tpl_vars['form']['check03']['2']): ?>checked="checked"<?php endif; ?> />値2</label></div></li>
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['check03']['3']): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="check03[]" value="3" <?php if ($this->_tpl_vars['form']['check03']['3']): ?>checked="checked"<?php endif; ?> />値3</label></div></li>
</ul>
<?php if ($this->_tpl_vars['msg']['check03']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['check03']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>check04</th>
<td>
<ul class="check_ul">
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['check04']['1']): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="check04[]" value="1" <?php if ($this->_tpl_vars['form']['check04']['1']): ?>checked="checked"<?php endif; ?> />値1</label></div></li>
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['check04']['2']): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="check04[]" value="2" <?php if ($this->_tpl_vars['form']['check04']['2']): ?>checked="checked"<?php endif; ?> />値2</label></div></li>
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['check04']['3']): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="check04[]" value="3" <?php if ($this->_tpl_vars['form']['check04']['3']): ?>checked="checked"<?php endif; ?> />値3</label></div></li>
</ul>
<?php if ($this->_tpl_vars['msg']['check04']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['check04']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>check05</th>
<td>
<ul class="check_ul">
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['check05']['1']): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="check05[]" value="1" <?php if ($this->_tpl_vars['form']['check05']['1']): ?>checked="checked"<?php endif; ?> />値1</label></div></li>
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['check05']['2']): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="check05[]" value="2" <?php if ($this->_tpl_vars['form']['check05']['2']): ?>checked="checked"<?php endif; ?> />値2</label></div></li>
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['check05']['3']): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="check05[]" value="3" <?php if ($this->_tpl_vars['form']['check05']['3']): ?>checked="checked"<?php endif; ?> />値3</label></div></li>
</ul>
<?php if ($this->_tpl_vars['msg']['check05']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['check05']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>file01</th>
<td>
<?php if ($this->_tpl_vars['form']['file01']): ?>
<a href="./file.php?id=<?php echo $this->_tpl_vars['form']['file01']; ?>
"><?php echo $this->_tpl_vars['form']['file01_name']; ?>
</a><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary"><input type="checkbox" name="file01_del" value="1">このファイルを削除</label></div>
<input type="hidden" name="file01_old" value="<?php echo $this->_tpl_vars['form']['file01']; ?>
">
<?php endif; ?>
<input type="file" name="file01">
<?php if ($this->_tpl_vars['msg']['file01']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['file01']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>file02</th>
<td>
<?php if ($this->_tpl_vars['form']['file02']): ?>
<a href="./file.php?id=<?php echo $this->_tpl_vars['form']['file02']; ?>
"><?php echo $this->_tpl_vars['form']['file02_name']; ?>
</a><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary"><input type="checkbox" name="file02_del" value="1">このファイルを削除</label></div>
<input type="hidden" name="file02_old" value="<?php echo $this->_tpl_vars['form']['file02']; ?>
">
<?php endif; ?>
<input type="file" name="file02">
<?php if ($this->_tpl_vars['msg']['file02']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['file02']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>file03</th>
<td>
<?php if ($this->_tpl_vars['form']['file03']): ?>
<a href="./file.php?id=<?php echo $this->_tpl_vars['form']['file03']; ?>
"><?php echo $this->_tpl_vars['form']['file03_name']; ?>
</a><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary"><input type="checkbox" name="file03_del" value="1">このファイルを削除</label></div>
<input type="hidden" name="file03_old" value="<?php echo $this->_tpl_vars['form']['file03']; ?>
">
<?php endif; ?>
<input type="file" name="file03">
<?php if ($this->_tpl_vars['msg']['file03']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['file03']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>file04</th>
<td>
<?php if ($this->_tpl_vars['form']['file04']): ?>
<a href="./file.php?id=<?php echo $this->_tpl_vars['form']['file04']; ?>
"><?php echo $this->_tpl_vars['form']['file04_name']; ?>
</a><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary"><input type="checkbox" name="file04_del" value="1">このファイルを削除</label></div>
<input type="hidden" name="file04_old" value="<?php echo $this->_tpl_vars['form']['file04']; ?>
">
<?php endif; ?>
<input type="file" name="file04">
<?php if ($this->_tpl_vars['msg']['file04']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['file04']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>file05</th>
<td>
<?php if ($this->_tpl_vars['form']['file05']): ?>
<a href="./file.php?id=<?php echo $this->_tpl_vars['form']['file05']; ?>
"><?php echo $this->_tpl_vars['form']['file05_name']; ?>
</a><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary"><input type="checkbox" name="file05_del" value="1">このファイルを削除</label></div>
<input type="hidden" name="file05_old" value="<?php echo $this->_tpl_vars['form']['file05']; ?>
">
<?php endif; ?>
<input type="file" name="file05">
<?php if ($this->_tpl_vars['msg']['file05']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['file05']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>select01</th>
<td>
<select name="select01" class="input_select form-control">
<option value="">----</option>
<option value="1" <?php if ($this->_tpl_vars['form']['select01'] == 1): ?>selected="selected"<?php endif; ?>>1</option>
<option value="2" <?php if ($this->_tpl_vars['form']['select01'] == 2): ?>selected="selected"<?php endif; ?>>2</option>
<option value="3" <?php if ($this->_tpl_vars['form']['select01'] == 3): ?>selected="selected"<?php endif; ?>>3</option>
</select>
<?php if ($this->_tpl_vars['msg']['select01']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['select01']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>select02</th>
<td>
<select name="select02" class="input_select form-control">
<option value="">----</option>
<option value="1" <?php if ($this->_tpl_vars['form']['select02'] == 1): ?>selected="selected"<?php endif; ?>>1</option>
<option value="2" <?php if ($this->_tpl_vars['form']['select02'] == 2): ?>selected="selected"<?php endif; ?>>2</option>
<option value="3" <?php if ($this->_tpl_vars['form']['select02'] == 3): ?>selected="selected"<?php endif; ?>>3</option>
</select>
<?php if ($this->_tpl_vars['msg']['select02']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['select02']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>select03</th>
<td>
<select name="select03" class="input_select form-control">
<option value="">----</option>
<option value="1" <?php if ($this->_tpl_vars['form']['select03'] == 1): ?>selected="selected"<?php endif; ?>>1</option>
<option value="2" <?php if ($this->_tpl_vars['form']['select03'] == 2): ?>selected="selected"<?php endif; ?>>2</option>
<option value="3" <?php if ($this->_tpl_vars['form']['select03'] == 3): ?>selected="selected"<?php endif; ?>>3</option>
</select>
<?php if ($this->_tpl_vars['msg']['select03']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['select03']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>select04</th>
<td>
<select name="select04" class="input_select form-control">
<option value="">----</option>
<option value="1" <?php if ($this->_tpl_vars['form']['select04'] == 1): ?>selected="selected"<?php endif; ?>>1</option>
<option value="2" <?php if ($this->_tpl_vars['form']['select04'] == 2): ?>selected="selected"<?php endif; ?>>2</option>
<option value="3" <?php if ($this->_tpl_vars['form']['select04'] == 3): ?>selected="selected"<?php endif; ?>>3</option>
</select>
<?php if ($this->_tpl_vars['msg']['select04']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['select04']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>select05</th>
<td>
<select name="select05" class="input_select form-control">
<option value="">----</option>
<option value="1" <?php if ($this->_tpl_vars['form']['select05'] == 1): ?>selected="selected"<?php endif; ?>>1</option>
<option value="2" <?php if ($this->_tpl_vars['form']['select05'] == 2): ?>selected="selected"<?php endif; ?>>2</option>
<option value="3" <?php if ($this->_tpl_vars['form']['select05'] == 3): ?>selected="selected"<?php endif; ?>>3</option>
</select>
<?php if ($this->_tpl_vars['msg']['select05']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['select05']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>
-->

<!--<tr>
<th>description</th>
<td>
<div class="mb05"><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['pr_flag'] == 1): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="pr_flag" value="1" <?php if ($this->_tpl_vars['form']['pr_flag'] == 1): ?>checked="checked"<?php endif; ?> />PRメッセージを反映する</label></div></div>
<input class="input_w10 form-control" type="text" name="description" value="<?php echo $this->_tpl_vars['form']['description']; ?>
">
<?php if ($this->_tpl_vars['msg']['description']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['description']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>keywords</th>
<td>
<input class="input_w10 form-control" type="text" name="keyword" value="<?php echo $this->_tpl_vars['form']['keyword']; ?>
">
<p>※半角カンマで区切り、1個～10個のワードを指定してください。</p>
<p>※こだわりカテゴリ、募集職種、雇用形態、勤務地都道府県、市区、最寄り駅、沿線が自動で初期入力されます。</p>
<?php if ($this->_tpl_vars['msg']['keyword']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['keyword']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>-->

<tr>
<th>備考・メモ</th>
<td><textarea class="textarea_w10 form-control" name="biko"><?php echo $this->_tpl_vars['form']['biko']; ?>
</textarea>
<?php if ($this->_tpl_vars['msg']['biko']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['biko']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>
	
<!--<tr>	
<th>検索用テキスト</th>
<td><textarea class="textarea_w10 form-control" name="searchtext"><?php echo $this->_tpl_vars['form']['searchtext']; ?>
</textarea>
</td>
</tr>-->


<tr>
<th>求人の種類<span>必須</span></th>
<td>
<ul class="check_ul">
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['check01']['1']): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="check01[]" value="1" <?php if ($this->_tpl_vars['form']['check01']['1']): ?>checked="checked"<?php endif; ?> />ETC</label></div></li>
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['check01']['3']): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="check01[]" value="3" <?php if ($this->_tpl_vars['form']['check01']['3']): ?>checked="checked"<?php endif; ?> />HW</label></div></li>
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['check01']['2']): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="check01[]" value="2" <?php if ($this->_tpl_vars['form']['check01']['2']): ?>checked="checked"<?php endif; ?> />該当なし</label></div></li>
</ul>
<?php if ($this->_tpl_vars['msg']['check01']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['check01']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>



<tr>
<th>公開・非公開<span>必須</span></th>
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



<!--right side memo -->
<div class="col-sm-4 col-xs-12">


<div class="box box-primary direct-chat direct-chat-primary">
<div class="box-header with-border">
<h3 class="box-title">メモ</h3>

<div class="box-tools pull-right">
<!--<span data-toggle="tooltip" title="3 New Messages" class="badge bg-light-blue">3</span>-->
<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
<!--<button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle"><i class="fa fa-comments"></i></button>-->
<!--<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
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
<form name="form2" method="post" action="admin-item-edit.html">
<input type="hidden" name="mode" value="memo">
<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['form']['item_id']; ?>
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
<a href="admin-item-edit.html&id=<?php echo $this->_tpl_vars['item']['item_id']; ?>
&page=<?php echo $this->_tpl_vars['pager']['prev']['no']; ?>
" class="btn btn-block btn-default btn-xs">前へ</a>
<?php endif; ?>
</div>
<div class="col-xs-6">
<?php if ($this->_tpl_vars['pager']['next']): ?>
<a href="admin-item-edit.html&id=<?php echo $this->_tpl_vars['item']['item_id']; ?>
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
<script>
var kinmu_pref = '<?php echo $this->_tpl_vars['form']['kinmu_pref']; ?>
';
var kinmu_city = '<?php echo $this->_tpl_vars['form']['kinmu_city']; ?>
';
var mensetsu_pref = '<?php echo $this->_tpl_vars['form']['mensetsu_pref']; ?>
';
var mensetsu_city = '<?php echo $this->_tpl_vars['form']['mensetsu_city']; ?>
';
</script>

<?php echo '
<script>
function set_select(sel, info, pref){

	// 全て削除
	while (sel.options.length > 1) {
		sel.options[sel.options.length - 1] = null;
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

function change_pref(v, city) {

	var str = ajax.gets("../?act=get_city&id=" + v);
	eval("var city_data = " + str);
	set_select(document.getElementById(city), city_data);
}

function set_mensetsu(zip1, zip2, pref, city, address1, address2){

	document.form1.mensetsu_zip1.value = zip1;
	document.form1.mensetsu_zip2.value = zip2;
	document.form1.mensetsu_pref.value = pref;
	change_pref(pref, \'mensetsu_city\');
	document.form1.mensetsu_city.value = city;
	document.form1.mensetsu_addr1.value = address1;
	document.form1.mensetsu_addr2.value = address2;
}

function do_memo() {

	if (document.form2.comment.value == "") {

		alert("メモを記入してください");

	} else {

		document.form2.submit();
	}
}

function do_change(flag) {

	if (flag) {

		set_mensetsu(
			document.form1.kinmu_zip1.value,
			document.form1.kinmu_zip2.value,
			document.form1.kinmu_pref.value,
			document.form1.kinmu_city.value,
			document.form1.kinmu_address1.value,
			document.form1.kinmu_address2.value
		);
	}
}

function do_confirm() {

	if (confirm("以下の内容で登録しますか？")) {
		document.form1.submit();
	}
}

$(function () {

	if (kinmu_pref != \'\') {
		change_pref(kinmu_pref, \'kinmu_city\');
		document.form1.kinmu_city.value = kinmu_city;
	}

	if (mensetsu_pref != \'\') {
		change_pref(mensetsu_pref, \'mensetsu_city\');
		document.form1.mensetsu_city.value = mensetsu_city;
	}
});

</script>
'; ?>


</body>
</html>