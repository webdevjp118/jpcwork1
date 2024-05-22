<?php /* Smarty version 2.6.22, created on 2021-06-21 10:37:34
         compiled from admin-graph.html */ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>トップ｜管理画面</title>
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





</div><!-- /.row -->




<!--グラフ下情報テーブル-->
<div class="row">
<div class="col-xs-6"><!-- ブートストラップ レイアウト用タグ -->

<div class="box box-info">
<div class="box-header with-border">
<h3 class="box-title">ログ</h3>

<!--<div class="box-tools pull-right">
<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
</div>-->

</div>
<!-- /.box-header -->

<div class="box-body">
<div class="table-responsive">
<table class="table">
<col>
<col class="w20">
<tbody>
<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<tr>
<td class="nowrap"><?php echo $this->_tpl_vars['item']['reg_date']; ?>
</td>
<td><?php echo $this->_tpl_vars['item']['name']; ?>
さんが<?php echo $this->_tpl_vars['item']['action']; ?>
</td>
</tr>
<?php endforeach; endif; unset($_from); ?>
</tbody>
</table>
</div>
<!-- /.table-responsive -->
</div>
<!-- /.box-body -->
<div class="box-footer clearfix">
<a href="admin.html" class="btn btn-sm btn-info btn-flat pull-right">もっと見る</a>
<!--<a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">白いボタン</a>-->
</div>
<!-- /.box-footer -->
</div>
<!-- /.box -->


</div><!-- /ブートストラップ レイアウト用タグ -->



<div class="col-xs-6"><!-- ブートストラップ レイアウト用タグ -->

<div class="box box-success">

<div class="box-header">
<h3 class="box-title">よく見られている求人</h3>
</div><!-- /.box-header -->

<div class="box-body">
<table id="table_summary" class="table table-hover" summary="表">

<tbody>
<?php $_from = $this->_tpl_vars['view']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<tr>
<td><a href="admin-item-edit.html&id=<?php echo $this->_tpl_vars['item']['item_id']; ?>
">【<?php echo $this->_tpl_vars['item']['kinmu_pref']; ?>
<?php echo $this->_tpl_vars['item']['kinmu_city']; ?>
】<?php echo $this->_tpl_vars['item']['title']; ?>
</a></td>
</tr>
<?php endforeach; endif; unset($_from); ?>
</tbody>
</table>

</div><!-- /.box-body -->
</div><!-- /.box -->

</div><!-- /ブートストラップ レイアウト用タグ -->

<!--/グラフ下情報テーブル-->















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
<script src="common/AdminLTE/plugins/chartjs/Chart.min.js"></script><!--グラフ実装用-->
<script src="common/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="common/AdminLTE/plugins/fastclick/fastclick.js"></script>
<script src="common/AdminLTE/js/app.min.js"></script>
<script src="common/AdminLTE/js/demo.js"></script>
<script src="common/js/common.js"></script>

<?php echo '
<script>
$(function () {
	
	/* ChartJS
	* -------
	* Here we will create a few charts using ChartJS
	* カンバスタグで実装されているので、色は全てRGBA、16進色で指定する必要がある
	*/
	
	//--------------
	//- エリアチャート 応募 -
	//--------------
	
	var areaChart_ouboCanvas = $("#areaChart_oubo").get(0).getContext("2d");
	
	var areaChart_oubo = new Chart(areaChart_ouboCanvas);
	
	var areaChart_ouboData = {
		
		labels: [
'; ?>

<?php $_from = $this->_tpl_vars['oubo']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
		"<?php echo $this->_tpl_vars['item']['m']; ?>
月",
<?php endforeach; endif; unset($_from); ?>
<?php echo '
		],
		
		datasets: [
			
			//1画面に複数のグラフを追加したい場合以下のブラケットを複製し、「,」で区切って後に続ける
			//その時色は、RGBAもしくは16進数で任意の色を設定する
			{
				label: "項目名を入れます",
				fillColor: "#bfe8b9",
				strokeColor: "#59c04b",
				pointColor: "#000000",
				pointStrokeColor: "#59c04b",
				pointHighlightFill: "#fff",
				pointHighlightStroke: "#59c04b",
				data: [
'; ?>

<?php $_from = $this->_tpl_vars['oubo']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
		"<?php echo $this->_tpl_vars['item']['count']; ?>
",
<?php endforeach; endif; unset($_from); ?>
<?php echo '
				]//月ごとの値を入力(グラフのメモリの最大値はこの中の最大値が基準)
			}
		]
	};
	
	//Optionsは変更しなくても問題は起きません。
	var areaChart_ouboOptions = {
		
		//Boolean - If we should show the scale at all
		showScale: true,
		//Boolean - Whether grid lines are shown across the chart
		scaleShowGridLines: false,
		//String - Colour of the grid lines
		scaleGridLineColor: "rgba(0,0,0,.05)",
		//Number - Width of the grid lines
		scaleGridLineWidth: 1,
		//Boolean - Whether to show horizontal lines (except X axis)
		scaleShowHorizontalLines: true,
		//Boolean - Whether to show vertical lines (except Y axis)
		scaleShowVerticalLines: true,
		//Boolean - Whether the line is curved between points
		bezierCurve: true,
		//Number - Tension of the bezier curve between points
		bezierCurveTension: 0.3,
		//Boolean - Whether to show a dot for each point
		pointDot: false,
		//Number - Radius of each point dot in pixels
		pointDotRadius: 4,
		//Number - Pixel width of point dot stroke
		pointDotStrokeWidth: 1,
		//Number - amount extra to add to the radius to cater for hit detection outside the drawn point
		pointHitDetectionRadius: 20,
		//Boolean - Whether to show a stroke for datasets
		datasetStroke: true,
		//Number - Pixel width of dataset stroke
		datasetStrokeWidth: 2,
		//Boolean - Whether to fill the dataset with a color
		datasetFill: true,
		//String - A legend template
		legendTemplate: "<ul class=\\"<%=name.toLowerCase()%>-legend\\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\\"background-color:<%=datasets[i].fillColor%>\\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
		//Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
		maintainAspectRatio: true,
		//Boolean - whether to make the chart responsive to window resizing
		responsive: true
	};
	
	//Create the line chart + 凡例を取得
	var areaChart_ouboLegend=areaChart_oubo.Line(areaChart_ouboData, areaChart_ouboOptions).generateLegend();
	
	//エリアチャートの凡例をどこに表示するか（デフォルトではCSSにて強制的に非表示にしてます）
	$(\'#areaChart_oubo + .legend\').html(areaChart_ouboLegend);

	
	//--------------
	//- エリアチャート アクセス解析 -
	//--------------
	
	var areaChart_accessCanvas = $("#areaChart_access").get(0).getContext("2d");
	
	var areaChart_access = new Chart(areaChart_accessCanvas);
	
	var areaChart_accessData = {
		
		labels: [
'; ?>

<?php $_from = $this->_tpl_vars['access']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
		"<?php echo $this->_tpl_vars['item']['m']; ?>
月",
<?php endforeach; endif; unset($_from); ?>
<?php echo '
		],
		
		datasets: [
			
			//1画面に複数のグラフを追加したい場合以下のブラケットを複製し、「,」で区切って後に続ける
			//その時色は、RGBAもしくは16進数で任意の色を設定する
			{
				label: "項目名を入れます",
				fillColor: "#b9d7e8",
				strokeColor: "#3b8bba",
				pointColor: "#000000",
				pointStrokeColor: "#3b8bba",
				pointHighlightFill: "#fff",
				pointHighlightStroke: "#3b8bba",
				data: [
'; ?>

<?php $_from = $this->_tpl_vars['access']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
		"<?php echo $this->_tpl_vars['item']['count']; ?>
",
<?php endforeach; endif; unset($_from); ?>
<?php echo '
				]//月ごとの値を入力(グラフのメモリの最大値はこの中の最大値が基準)
			}
		]
	};
	
	//Optionsは変更しなくても問題は起きません。
	var areaChart_accessOptions = {
		
		//Boolean - If we should show the scale at all
		showScale: true,
		//Boolean - Whether grid lines are shown across the chart
		scaleShowGridLines: false,
		//String - Colour of the grid lines
		scaleGridLineColor: "rgba(0,0,0,.05)",
		//Number - Width of the grid lines
		scaleGridLineWidth: 1,
		//Boolean - Whether to show horizontal lines (except X axis)
		scaleShowHorizontalLines: true,
		//Boolean - Whether to show vertical lines (except Y axis)
		scaleShowVerticalLines: true,
		//Boolean - Whether the line is curved between points
		bezierCurve: true,
		//Number - Tension of the bezier curve between points
		bezierCurveTension: 0.3,
		//Boolean - Whether to show a dot for each point
		pointDot: false,
		//Number - Radius of each point dot in pixels
		pointDotRadius: 4,
		//Number - Pixel width of point dot stroke
		pointDotStrokeWidth: 1,
		//Number - amount extra to add to the radius to cater for hit detection outside the drawn point
		pointHitDetectionRadius: 20,
		//Boolean - Whether to show a stroke for datasets
		datasetStroke: true,
		//Number - Pixel width of dataset stroke
		datasetStrokeWidth: 2,
		//Boolean - Whether to fill the dataset with a color
		datasetFill: true,
		//String - A legend template
		legendTemplate: "<ul class=\\"<%=name.toLowerCase()%>-legend\\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\\"background-color:<%=datasets[i].fillColor%>\\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
		//Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
		maintainAspectRatio: true,
		//Boolean - whether to make the chart responsive to window resizing
		responsive: true
	};
	
	//Create the line chart + 凡例を取得
	var areaChart_accessLegend=areaChart_access.Line(areaChart_accessData, areaChart_accessOptions).generateLegend();
	
	//エリアチャートの凡例をどこに表示するか（デフォルトではCSSにて強制的に非表示にしてます）
	$(\'#areaChart_access + .legend\').html(areaChart_accessLegend);
});


</script>
'; ?>

</body>
</html>