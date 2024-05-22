<?php /* Smarty version 2.6.22, created on 2021-06-18 17:45:28
         compiled from contents-edit.html */ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>コンテンツ管理 | 管理画面</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="common/AdminLTE/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="common/AdminLTE/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="common/AdminLTE/css/AdminLTE.min.css">
<link rel="stylesheet" href="common/AdminLTE/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="common/css/common.css?<?php echo time(); ?>
">
<link rel="stylesheet" href="common/css/content_editor.css?<?php echo time(); ?>
">
<link rel="shortcut icon" href="common/img/favicon.ico">
<link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-lightness/jquery-ui.css" rel="stylesheet" />
<!-- <script type="text/javascript" src="common/js/nicEdit_ja/nicEdit.js"></script> -->
<!--
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript" src="common/js/nicEdit_ja/load.js"></script>
-->
<!-- <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script> -->

<!--<script src="//cdn.ckeditor.com/4.5.8/full/ckeditor.js"></script>-->
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

<h1>コンテンツ管理</h1>

<ol class="breadcrumb">
<li class="active"><i class="fa fa-dashboard"></i> Home</li>
<li><a href="">コンテンツ管理</a></li>
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


<form name="form1" action="contents-edit.html" method="post" enctype="multipart/form-data">
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
<input type="text" class="form-control pull-right" name="contents_date" value="<?php echo $this->_tpl_vars['form']['contents_date']; ?>
" id="datepicker">
</div><!-- /.input group -->

<?php if ($this->_tpl_vars['msg']['contents_date']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['contents_date']; ?>
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
<th>カテゴリ<span>必須</span></th>
<td>
<select name="kind" class="input_select form-control">
<option value="">選択してください</option>
<?php $_from = $this->_tpl_vars['kind']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
<option value="<?php echo $this->_tpl_vars['key']; ?>
" <?php if ($this->_tpl_vars['form']['kind'] == $this->_tpl_vars['key']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['item']; ?>
</option>
<?php endforeach; endif; unset($_from); ?>
</select>
<?php if ($this->_tpl_vars['msg']['kind']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['kind']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>
<tr>
<th>description<span>必須</span></th>
<td>
<input class="input_w10 form-control" type="text" name="contents" value="<?php echo $this->_tpl_vars['form']['contents']; ?>
">
<?php if ($this->_tpl_vars['msg']['contents']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['contents']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>
<tr>
<th>keywords<span>必須</span></th>
<td>
<input class="input_w10 form-control" type="text" name="keyword" value="<?php echo $this->_tpl_vars['form']['keyword']; ?>
">
<p>※半角カンマで区切り、1個～10個のワードを指定してください。</p>
<?php if ($this->_tpl_vars['msg']['keyword']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['keyword']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>
<!--<tr>
<th>URL</th>
<td>
<input class="input_w10 form-control" type="text" name="url" value="<?php echo $this->_tpl_vars['form']['url']; ?>
">
<p>※半角英数字で入力してください。</p>
<?php if ($this->_tpl_vars['msg']['url']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['url']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>-->
<tr>
<th>一覧用サムネイル</th>
<td>
<?php if ($this->_tpl_vars['form']['list_image']): ?>
<img src="../img.php?id=<?php echo $this->_tpl_vars['form']['list_image']; ?>
" width="200">
<input type="hidden" name="list_image_old" value="<?php echo $this->_tpl_vars['form']['list_image']; ?>
">
<div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary"><input type="checkbox" name="list_image_del" value="1">削除する</label></div>
<?php endif; ?>
<input type="file" name="list_image" />
<?php if ($this->_tpl_vars['msg']['list_image']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['list_image']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>
<tr>
<th>一覧用テキスト<span>必須</span></th>
<td>
<textarea class="textarea_w10 form-control" name="list_text"><?php echo $this->_tpl_vars['form']['list_text']; ?>
</textarea>
<?php if ($this->_tpl_vars['msg']['list_text']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['list_text']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>

<tr>
<th>コンテンツの設定</th>
<td class="content_editor_bg">

<!--modal-->
<div class="modal fade" id="modal-default">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">何を追加しますか？</h4>
</div>
<div class="modal-body">
<button type="button" class="btn btn-app" data-content-editor-addpoint="0" data-content-editor-additem="1" data-dismiss="modal"><i class="fa fa-header"></i> 見出し<b>大</b></button>
<button type="button" class="btn btn-app" data-content-editor-addpoint="0" data-content-editor-additem="2" data-dismiss="modal"><i class="fa fa-header"></i> 見出し<b>中</b></button>
<button type="button" class="btn btn-app" data-content-editor-addpoint="0" data-content-editor-additem="3" data-dismiss="modal"><i class="fa fa-header"></i> 見出し<b>小</b></button>
<button type="button" class="btn btn-app" data-content-editor-addpoint="0" data-content-editor-additem="4" data-dismiss="modal"><i class="fa fa-picture-o"></i> 画像</button>
<button type="button" class="btn btn-app" data-content-editor-addpoint="0" data-content-editor-additem="5" data-dismiss="modal"><i class="fa fa-align-left"></i> テキスト</button>
<button type="button" class="btn btn-app" data-content-editor-addpoint="0" data-content-editor-additem="6" data-dismiss="modal"><i class="fa fa-window-maximize"></i> 囲みテキスト</button>
<button type="button" class="btn btn-app" data-content-editor-addpoint="0" data-content-editor-additem="7" data-dismiss="modal"><i class="fa fa-list-ul"></i> リスト</button>
<button type="button" class="btn btn-app" data-content-editor-addpoint="0" data-content-editor-additem="8" data-dismiss="modal"><i class="fa fa-link"></i> リンク</button>
<button type="button" class="btn btn-app" data-content-editor-addpoint="0" data-content-editor-additem="9" data-dismiss="modal"><i class="fa fa-code"></i> HTML</button>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default pull-left" data-dismiss="modal">キャンセル</button>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--/modal-->

<div data-content-editor>

<!--item-->
<div class="content_editor_item content_editor_item_default" data-content-editor-default>
<div>コンテンツを追加してください</div>
<div class="content_editor_box_btn_add"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus" aria-hidden="true"></i></button></div>
</div>
<!--/item-->


<?php if ($this->_tpl_vars['form_editor']): ?>
<?php $_from = $this->_tpl_vars['form_editor']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['editor_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['editor_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['editor']):
        $this->_foreach['editor_loop']['iteration']++;
?>

	<?php if ($this->_tpl_vars['editor']['name'] == 'editor_list'): ?>
		<div class="content_editor_item" data-content-editor-item="7">
		<div class="content_editor_box_btn_add"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus" aria-hidden="true"></i></button></div>
		<div class="content_editor_item_body">
		<dl>
		<dt>
		<span>リスト</span>
		<div class="content_editor_box_btn_remove" data-content-editor-remove><button type="button" class="btn btn-link"><i class="fa fa-times" aria-hidden="true"></i></button></div>
		</dt>
		<dd><textarea class="textarea_w10 textarea_h12 form-control" name="editor_list<?php echo ($this->_foreach['editor_loop']['iteration']-1); ?>
" placeholder="リスト表示したいテキストを改行して入力してください&#13;&#10;例：&#13;&#10;リストA&#13;&#10;リストB&#13;&#10;リストC&#13;&#10;出力時に上記がリスト化された状態で表示されます。"><?php echo $this->_tpl_vars['editor']['text1']; ?>
</textarea></dd>
		</dl>
		</div>
		</div>

	<?php elseif ($this->_tpl_vars['editor']['name'] == 'editor_memo'): ?>
		<div class="content_editor_item" data-content-editor-item="6">
		<div class="content_editor_box_btn_add"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus" aria-hidden="true"></i></button></div>
		<div class="content_editor_item_body">
		<dl>
		<dt>
		<span>囲みテキスト</span>
		<div class="content_editor_box_btn_remove" data-content-editor-remove><button type="button" class="btn btn-link"><i class="fa fa-times" aria-hidden="true"></i></button></div>
		</dt>
		<dd><textarea class="textarea_w10 form-control" name="editor_memo<?php echo ($this->_foreach['editor_loop']['iteration']-1); ?>
" placeholder="テキストを入力してください"><?php echo $this->_tpl_vars['editor']['text1']; ?>
</textarea></dd>
		</dl>
		</div>
		</div>

	<?php elseif ($this->_tpl_vars['editor']['name'] == 'editor_textarea'): ?>
		<div class="content_editor_item" data-content-editor-item="5">
		<div class="content_editor_box_btn_add"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus" aria-hidden="true"></i></button></div>
		<div class="content_editor_item_body">
		<dl>
		<dt>
		<span>テキスト</span>
		<div class="content_editor_box_btn_remove" data-content-editor-remove><button type="button" class="btn btn-link"><i class="fa fa-times" aria-hidden="true"></i></button></div>
		</dt>
		<dd><textarea class="textarea_w10 form-control" name="editor_textarea<?php echo ($this->_foreach['editor_loop']['iteration']-1); ?>
" placeholder="テキストを入力してください"><?php echo $this->_tpl_vars['editor']['text1']; ?>
</textarea></dd>
		</dl>
		</div>
		</div>

	<?php elseif ($this->_tpl_vars['editor']['name'] == 'editor_headline'): ?>
		<div class="content_editor_item" data-content-editor-item="1">
		<div class="content_editor_box_btn_add"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus" aria-hidden="true"></i></button></div>
		<div class="content_editor_item_body">
		<dl>
		<dt>
		<span>見出し大</span>
		<div class="content_editor_box_btn_remove" data-content-editor-remove><button type="button" class="btn btn-link"><i class="fa fa-times" aria-hidden="true"></i></button></div>
		</dt>
		<dd><input type="text" name="editor_headline<?php echo ($this->_foreach['editor_loop']['iteration']-1); ?>
" value="<?php echo $this->_tpl_vars['editor']['text1']; ?>
" class="input_w24 form-control" placeholder="見出し大を入力してください"></dd>
		</dl>
		</div>
		</div>

	<?php elseif ($this->_tpl_vars['editor']['name'] == 'editor_heading'): ?>
		<div class="content_editor_item" data-content-editor-item="2">
		<div class="content_editor_box_btn_add"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus" aria-hidden="true"></i></button></div>
		<div class="content_editor_item_body">
		<dl>
		<dt>
		<span>見出し中</span>
		<div class="content_editor_box_btn_remove" data-content-editor-remove><button type="button" class="btn btn-link"><i class="fa fa-times" aria-hidden="true"></i></button></div>
		</dt>
		<dd><input type="text" name="editor_heading<?php echo ($this->_foreach['editor_loop']['iteration']-1); ?>
" value="<?php echo $this->_tpl_vars['editor']['text1']; ?>
" class="input_w24 form-control" placeholder="見出し中を入力してください"></dd>
		</dl>
		</div>
		</div>

	<?php elseif ($this->_tpl_vars['editor']['name'] == 'editor_subheading'): ?>
		<div class="content_editor_item" data-content-editor-item="3">
		<div class="content_editor_box_btn_add"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus" aria-hidden="true"></i></button></div>
		<div class="content_editor_item_body">
		<dl>
		<dt>
		<span>見出し小</span>
		<div class="content_editor_box_btn_remove" data-content-editor-remove><button type="button" class="btn btn-link"><i class="fa fa-times" aria-hidden="true"></i></button></div>
		</dt>
		<dd><input type="text" name="editor_subheading<?php echo ($this->_foreach['editor_loop']['iteration']-1); ?>
" value="<?php echo $this->_tpl_vars['editor']['text1']; ?>
" class="input_w24 form-control" placeholder="見出し小を入力してください"></dd>
		</dl>
		</div>
		</div>

	<?php elseif ($this->_tpl_vars['editor']['name'] == 'editor_images'): ?>
		<div class="content_editor_item" data-content-editor-item="4">
		<div class="content_editor_box_btn_add"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus" aria-hidden="true"></i></button></div>
		<div class="content_editor_item_body">
		<dl>
		<dt>
		<span>画像</span>
		<div class="content_editor_box_btn_remove" data-content-editor-remove><button type="button" class="btn btn-link"><i class="fa fa-times" aria-hidden="true"></i></button></div>
		</dt>
		<dd>
		<div class="content_editor_image">
		<div class="content_editor_image_select">
		<ul class="list_photo_select">
		<li>
		<label>
			<figure><img src="../img.php?id=<?php echo $this->_tpl_vars['editor']['image']; ?>
" width="200"></figure>
		<!-- <img src="img/noimage.png" alt=""> -->
		<input type="file" name="editor_images<?php echo ($this->_foreach['editor_loop']['iteration']-1); ?>
" />
		<span class="btn btn-default">画像の選択</span>
		</label>
		<input type="hidden" name="editor_images_old<?php echo ($this->_foreach['editor_loop']['iteration']-1); ?>
" value="<?php echo $this->_tpl_vars['editor']['image']; ?>
"/>
		</li>
		</ul>
		</div>
		<div class="content_editor_image_text">
			<?php $this->assign('alt_num', ($this->_foreach['editor_loop']['iteration']-1)+1); ?>
			<?php $this->assign('cap_num', ($this->_foreach['editor_loop']['iteration']-1)+2); ?>
		<input type="text" name="editor_alt<?php echo $this->_tpl_vars['alt_num']; ?>
" value="<?php echo $this->_tpl_vars['form_editor'][$this->_tpl_vars['alt_num']]['text1']; ?>
" class="input_w24 form-control" placeholder="altタグを入力してください">
		<p>※画像に関連する文言を入力してください（SEO上入力必須です）</p>
		<input type="text" name="editor_caption<?php echo $this->_tpl_vars['cap_num']; ?>
" value="<?php echo $this->_tpl_vars['form_editor'][$this->_tpl_vars['cap_num']]['text1']; ?>
" class="input_w24 form-control" placeholder="キャプションを入力してください（任意）">
		</div>
		</div>
		</dd>
		</dl>
		</div>
		</div>

	<?php elseif ($this->_tpl_vars['editor']['name'] == 'editor_linktext'): ?>

		<?php $this->assign('editor_linkurl_num', ($this->_foreach['editor_loop']['iteration']-1)+1); ?>
		<?php $this->assign('editor_linkblank_num', ($this->_foreach['editor_loop']['iteration']-1)+2); ?>

		<div class="content_editor_item" data-content-editor-item="8">
		<div class="content_editor_box_btn_add"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus" aria-hidden="true"></i></button></div>
		<div class="content_editor_item_body">
		<dl>
		<dt>
		<span>リンク<?php echo $this->_tpl_vars['form_editor'][$this->_tpl_vars['editor_linkblank_num']]['text1']; ?>
</span>
		<div class="content_editor_box_btn_remove" data-content-editor-remove><button type="button" class="btn btn-link"><i class="fa fa-times" aria-hidden="true"></i></button></div>
		</dt>
		<dd>
		<div class="form-group"><input type="text" name="editor_linktext<?php echo ($this->_foreach['editor_loop']['iteration']-1); ?>
" value="<?php echo $this->_tpl_vars['editor']['text1']; ?>
" class="input_w24 form-control" placeholder="リンクテキスト"></div>
		<div class="form-group"><input type="text" name="editor_linkurl<?php echo $this->_tpl_vars['editor_linkurl_num']; ?>
" value="<?php echo $this->_tpl_vars['form_editor'][$this->_tpl_vars['editor_linkurl_num']]['text1']; ?>
" class="input_w24 form-control" placeholder="URL"></div>
		<div class="form-group"><label>新しいウィンドウで開く</b></label>
		<div class="btn-group btn_radio btn_radio_2col" data-toggle="buttons">
		<label class="btn btn-default <?php if ($this->_tpl_vars['form_editor'][$this->_tpl_vars['editor_linkblank_num']]['text1'] == '1'): ?>active<?php endif; ?> "><input type="radio" name="editor_linkblank<?php echo $this->_tpl_vars['editor_linkblank_num']; ?>
" autocomplete="off" value="1"  <?php if ($this->_tpl_vars['form_editor'][$this->_tpl_vars['editor_linkblank_num']]['text1'] == '1'): ?>checked="checked"<?php endif; ?> />ON</label>
		<label class="btn btn-default <?php if ($this->_tpl_vars['form_editor'][$this->_tpl_vars['editor_linkblank_num']]['text1'] == '2'): ?>active<?php endif; ?>"><input type="radio" name="editor_linkblank<?php echo $this->_tpl_vars['editor_linkblank_num']; ?>
" autocomplete="off" value="2" <?php if ($this->_tpl_vars['form_editor'][$this->_tpl_vars['editor_linkblank_num']]['text1'] == '2'): ?>checked="checked"<?php endif; ?> />OFF</label>
		</div>
		</div>
		</dd>
		</dl>
		</div>
		</div>

	<?php elseif ($this->_tpl_vars['editor']['name'] == 'editor_htmltext'): ?>

		<div class="content_editor_item" data-content-editor-item="9">
		<div class="content_editor_box_btn_add"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus" aria-hidden="true"></i></button></div>
		<div class="content_editor_item_body">
		<dl>
		<dt>
		<span>HTML</span>
		<div class="content_editor_box_btn_remove" data-content-editor-remove><button type="button" class="btn btn-link"><i class="fa fa-times" aria-hidden="true"></i></button></div>
		</dt>
		<dd>
		<textarea class="textarea_w10 form-control" name="editor_htmltext<?php echo ($this->_foreach['editor_loop']['iteration']-1); ?>
" placeholder="テキストを入力してください"><?php echo $this->_tpl_vars['editor']['text1']; ?>
</textarea>
		</dd>
		</dl>
		</div>
		</div>

	<?php endif; ?>

<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>


</div>
</td>
</tr>

<tr>
<th>公開・非公開</th>
<td>

<div class="btn-group btn_radio btn_radio_2col" data-toggle="buttons">
<label class="btn btn-primary<?php if ($this->_tpl_vars['form']['status'] == 1): ?> active<?php endif; ?>"><input type="radio" name="status" autocomplete="off" value="1" <?php if ($this->_tpl_vars['form']['status'] == 1): ?>checked="checked"<?php endif; ?> />公開</label>
<label class="btn btn-primary<?php if ($this->_tpl_vars['form']['status'] == 2): ?> active<?php endif; ?>"><input type="radio" name="status" autocomplete="off" value="2" <?php if ($this->_tpl_vars['form']['status'] == 2): ?>checked="checked"<?php endif; ?> />非公開</label>
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


<!--content editor template-->
<div class="content_editor_template" data-content-editor-template>

<!--item-->
<div class="content_editor_item" data-content-editor-item="1">
<div class="content_editor_box_btn_add"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus" aria-hidden="true"></i></button></div>
<div class="content_editor_item_body">
<dl>
<dt>
<span>見出し大</span>
<div class="content_editor_box_btn_remove" data-content-editor-remove><button type="button" class="btn btn-link"><i class="fa fa-times" aria-hidden="true"></i></button></div>
</dt>
<dd><input type="text" name="editor_headline" value="" class="input_w24 form-control" placeholder="見出し大を入力してください"></dd>
</dl>
</div>
</div>
<!--/item-->

<!--item-->
<div class="content_editor_item" data-content-editor-item="2">
<div class="content_editor_box_btn_add"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus" aria-hidden="true"></i></button></div>
<div class="content_editor_item_body">
<dl>
<dt>
<span>見出し中</span>
<div class="content_editor_box_btn_remove" data-content-editor-remove><button type="button" class="btn btn-link"><i class="fa fa-times" aria-hidden="true"></i></button></div>
</dt>
<dd><input type="text" name="editor_heading" value="" class="input_w24 form-control" placeholder="見出し中を入力してください"></dd>
</dl>
</div>
</div>
<!--/item-->

<!--item-->
<div class="content_editor_item" data-content-editor-item="3">
<div class="content_editor_box_btn_add"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus" aria-hidden="true"></i></button></div>
<div class="content_editor_item_body">
<dl>
<dt>
<span>見出し小</span>
<div class="content_editor_box_btn_remove" data-content-editor-remove><button type="button" class="btn btn-link"><i class="fa fa-times" aria-hidden="true"></i></button></div>
</dt>
<dd><input type="text" name="editor_subheading" value="" class="input_w24 form-control" placeholder="見出し小を入力してください"></dd>
</dl>
</div>
</div>
<!--/item-->

<!--item-->
<div class="content_editor_item" data-content-editor-item="4">
<div class="content_editor_box_btn_add"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus" aria-hidden="true"></i></button></div>
<div class="content_editor_item_body">
<dl>
<dt>
<span>画像</span>
<div class="content_editor_box_btn_remove" data-content-editor-remove><button type="button" class="btn btn-link"><i class="fa fa-times" aria-hidden="true"></i></button></div>
</dt>
<dd>
<div class="content_editor_image">
<div class="content_editor_image_select">
<ul class="list_photo_select">
<li>
<label>
<figure><img src="img/noimage.png" alt=""></figure>
<input type="file" name="editor_images" />
<span class="btn btn-default">画像の選択</span>
</label>
</li>
</ul>
</div>
<div class="content_editor_image_text">
<input type="text" name="editor_alt" value="" class="input_w24 form-control" placeholder="altタグを入力してください">
<p>※画像に関連する文言を入力してください（SEO上入力必須です）</p>
<input type="text" name="editor_caption" value="" class="input_w24 form-control" placeholder="キャプションを入力してください（任意）">
</div>
</div>
</dd>
</dl>
</div>
</div>
<!--/item-->

<!--item-->
<div class="content_editor_item" data-content-editor-item="5">
<div class="content_editor_box_btn_add"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus" aria-hidden="true"></i></button></div>
<div class="content_editor_item_body">
<dl>
<dt>
<span>テキスト</span>
<div class="content_editor_box_btn_remove" data-content-editor-remove><button type="button" class="btn btn-link"><i class="fa fa-times" aria-hidden="true"></i></button></div>
</dt>
<dd><textarea class="textarea_w10 form-control" name="editor_textarea" placeholder="テキストを入力してください"></textarea></dd>
</dl>
</div>
</div>
<!--/item-->

<!--item-->
<div class="content_editor_item" data-content-editor-item="6">
<div class="content_editor_box_btn_add"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus" aria-hidden="true"></i></button></div>
<div class="content_editor_item_body">
<dl>
<dt>
<span>囲みテキスト</span>
<div class="content_editor_box_btn_remove" data-content-editor-remove><button type="button" class="btn btn-link"><i class="fa fa-times" aria-hidden="true"></i></button></div>
</dt>
<dd><textarea class="textarea_w10 form-control" name="editor_memo" placeholder="テキストを入力してください"></textarea></dd>
</dl>
</div>
</div>
<!--/item-->

<!--item-->
<div class="content_editor_item" data-content-editor-item="7">
<div class="content_editor_box_btn_add"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus" aria-hidden="true"></i></button></div>
<div class="content_editor_item_body">
<dl>
<dt>
<span>リスト</span>
<div class="content_editor_box_btn_remove" data-content-editor-remove><button type="button" class="btn btn-link"><i class="fa fa-times" aria-hidden="true"></i></button></div>
</dt>
<dd><textarea class="textarea_w10 textarea_h12 form-control" name="editor_list" placeholder="リスト表示したいテキストを改行して入力してください&#13;&#10;例：&#13;&#10;リストA&#13;&#10;リストB&#13;&#10;リストC&#13;&#10;出力時に上記がリスト化された状態で表示されます。"></textarea></dd>
</dl>
</div>
</div>
<!--/item-->

<!--item-->
<div class="content_editor_item" data-content-editor-item="8">
<div class="content_editor_box_btn_add"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus" aria-hidden="true"></i></button></div>
<div class="content_editor_item_body">
<dl>
<dt>
<span>リンク</span>
<div class="content_editor_box_btn_remove" data-content-editor-remove><button type="button" class="btn btn-link"><i class="fa fa-times" aria-hidden="true"></i></button></div>
</dt>
<dd>
<div class="form-group"><input type="text" name="editor_linktext" value="" class="input_w24 form-control" placeholder="リンクテキスト"></div>
<div class="form-group"><input type="text" name="editor_linkurl" value="" class="input_w24 form-control" placeholder="URL"></div>
<div class="form-group"><label>新しいウィンドウで開く</b></label>
<div class="btn-group btn_radio btn_radio_2col" data-toggle="buttons">
<label class="btn btn-default active"><input type="radio" name="editor_linkblank" autocomplete="off" value="1" checked="checked" />ON</label>
<label class="btn btn-default"><input type="radio" name="editor_linkblank" autocomplete="off" value="2"  />OFF</label>
</div>
</div>
</dd>
</dl>
</div>
</div>
<!--/item-->

<!--item-->
<div class="content_editor_item" data-content-editor-item="9">
<div class="content_editor_box_btn_add"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus" aria-hidden="true"></i></button></div>
<div class="content_editor_item_body">
<dl>
<dt>
<span>HTML</span>
<div class="content_editor_box_btn_remove" data-content-editor-remove><button type="button" class="btn btn-link"><i class="fa fa-times" aria-hidden="true"></i></button></div>
</dt>
<dd>
<textarea class="textarea_w10 form-control" name="editor_htmltext" placeholder="テキストを入力してください"></textarea>
</dd>
</dl>
</div>
</div>
<!--/item-->
</div>
<!--/content editor template-->



<script src="common/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>

<script src="common/AdminLTE/bootstrap/js/bootstrap.min.js"></script>
<script src="common/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="common/AdminLTE/plugins/fastclick/fastclick.js"></script>
<script src="common/AdminLTE/js/app.min.js"></script>
<script src="common/AdminLTE/js/demo.js"></script>
<script src="common/js/common.js"></script>
<script src="common/js/content_editor.js?<?php echo time(); ?>
"></script>

<script src="../common/js/mini_ajax.js"></script>
<?php echo '
<script>
$(function(){
	$("#datepicker").datepicker();
});

function do_confirm()
{
	if (confirm("以下の内容で登録しますか？")) {
		//nicEditors.findEditor(\'list_text\').saveContent();
		//nicEditors.findEditor(\'text1\').saveContent();
		//nicEditors.findEditor(\'text2\').saveContent();
		//nicEditors.findEditor(\'text3\').saveContent();
		//nicEditors.findEditor(\'text4\').saveContent();
		//nicEditors.findEditor(\'text5\').saveContent();
		//nicEditors.findEditor(\'myEdit\').saveContent();
		document.form1.submit();
	}
}
</script>
'; ?>


</body>
</html>