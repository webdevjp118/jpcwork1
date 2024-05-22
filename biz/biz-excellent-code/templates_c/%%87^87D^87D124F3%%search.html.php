<?php /* Smarty version 2.6.22, created on 2021-10-22 16:51:37
         compiled from search.html */ ?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="robots" content="index,follow,noarchive" />
<meta name="description" content="<?php echo $this->_tpl_vars['search_cond']; ?>
">
<meta name="keywords" content="検索結果,<?php echo $this->_tpl_vars['search_cond']; ?>
">
<meta name="format-detection" content="telephone=no">
<title><?php echo $this->_tpl_vars['search_cond']; ?>
｜保育biz</title>

<link rel="contents" href="/sitemap.xml" />

<!-- Mobile Specific
 ================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

<!-- CSS
 ================================================== -->
<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['top']; ?>
common/css/import.css">

<!-- Font Awesome
 ================================================== -->
<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

<!-- google font
 ================================================== -->
<link href="https://fonts.googleapis.com/earlyaccess/notosansjp.css" rel="stylesheet">

<?php echo '
<style>
	table.tbl-place-info {
		width: 280px;
		background-color: #DDD;
		/*border: 1px solid #DDD;*/

		font-family: "Noto Sans JP", "ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro",
		"メイリオ", Meiryo, Osaka, "ＭＳ Ｐゴシック", "MS PGothic", sans-serif;

		/* round border */
		/*border-radius: 8px;*/

		/* transparent
		zoom: 1;
		filter: alpha(opacity=90);
		opacity: 0.9; */
	}

	table.tbl-place-info td {
		/*font-family: Arial;*/
		font-size: 14px;
		text-align: center;
		line-height: 2;
		background-color: #FFFFFF;
		border: 1px solid #DDD;
	}
	table.tbl-place-info td.title_f {
		text-align: left;
	}
	table.tbl-place-info td.title_f a {
		font-size: 16px;
		font-weight: bold;
		color: #0f74a8;
		padding-left: 5px;
	}
	table.tbl-place-info .colorful_f {
		background-color: #f7f5ed;
	}
	table.tbl-place-info .cat_f {
		font-weight: bold;
	}
	table.tbl-place-info .place_name {
		text-align: left;
		padding-left: 5px;
	}
	table.tbl-place-info .place_name span {
		font-weight: bold;
		font-size: 14px;
	}
</style>
'; ?>


<!-- Java Script
 ================================================== -->
<script src="<?php echo $this->_tpl_vars['top']; ?>
common/js/jquery.min.js"></script>
<script src="<?php echo $this->_tpl_vars['top']; ?>
common/js/custom.js"></script>
<script src="<?php echo $this->_tpl_vars['top']; ?>
common/js/css_browser_selector.js"></script>
<script>
<?php echo '
$(function(){
	$(document).ready(function(){
		search_condition();
	});

  // 勤務地
  $(\'input[name=a]\').on(\'change\', function(){
	search_condition();
  });

  // 都道府県
  $(\'input[name=t]\').on(\'change\', function(){
	search_condition();
  });

  // 市町村
  $(\'input[name=c]\').on(\'change\', function(){
	search_condition();
  });

  // 職種
  $(\'input[name=s]\').on(\'change\', function(){
	search_condition();
  });
  
  // 雇用形態
  $(\'input[name=k]\').on(\'change\', function(){
	search_condition();
  });
  // こだわり条件
  /*
  $(\'input[name=x]\').on(\'change\', function(){
	search_condition();
  });
  */
  
  function search_condition(){
	var a_vals = $(\'input[name=a]:checked\').map(function(){
      return $(this).val()
    }).get();
	a_vals = a_vals.toString();
	
    var t_vals = $(\'input[name=t]:checked\').map(function(){
      return $(this).val();
    }).get();
	t_vals = t_vals.toString();

    var c_vals = $(\'input[name=c]:checked\').map(function(){
      return $(this).val();
    }).get();
	c_vals = c_vals.toString();

	var s_vals = $(\'input[name=s]:checked\').map(function(){
      return $(this).val();
    }).get();
	s_vals = s_vals.toString();

    var k_vals = $(\'input[name=k]:checked\').map(function(){
      return $(this).val();
    }).get();
	k_vals = k_vals.toString();

	// こだわり条件は対象外
	var x_vals = "";
    //var x_vals = $(\'input[name=x]:checked\').map(function(){
    //  return $(this).val();
    //}).get();
	//x_vals = x_vals.toString();

	var a_condition = $(\'#a_condition\').val();
	a_condition = a_condition.toString();
	
	var t_condition = $(\'#t_condition\').val();
	t_condition = t_condition.toString();

	var c_condition = $(\'#c_condition\').val();
	c_condition = c_condition.toString();

	$("#mail").val("");
	$("#error_mail1").hide();
	$("#error_mail2").hide();
	$("#reg_success").hide();
	$("#search_div").show();
	
	$.ajax({
		type: "POST",
		url: "https://hoikubiz.com/search_condition.php",
		data: { "a_vals" : a_vals, 
				"t_vals" : t_vals,
				"c_vals" : c_vals,
				"s_vals" : s_vals,
				"k_vals" : k_vals,
				"x_vals" : x_vals,
				"a_condition" : a_condition,
				"t_condition" : t_condition,
				"c_condition" : c_condition,
				},
		dataType : "json"
	}).done(function(data){
		$("#area_condition").html(data.pref);
		$("#syokusyu_condition").html(data.syokusyu);
		$("#koyou_condition").html(data.koyou);
		//$("#kodawari_condition").html(data.kodawari);
	}).fail(function(XMLHttpRequest, status, e){
		alert(e);
	});

  }
    
});

function do_search_condition_reg()
{
	var mail = $("#mail").val();
	var reg = /^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}.[A-Za-z0-9]{1,}$/;
	if (reg.test(mail)) 
	{
		
		var a_vals = $(\'input[name=a]:checked\').map(function(){
		return $(this).val()
		}).get();
		a_vals = a_vals.toString();
		
		var t_vals = $(\'input[name=t]:checked\').map(function(){
		return $(this).val();
		}).get();
		t_vals = t_vals.toString();
	
		var c_vals = $(\'input[name=c]:checked\').map(function(){
		return $(this).val();
		}).get();
		c_vals = c_vals.toString();
	
		var s_vals = $(\'input[name=s]:checked\').map(function(){
		return $(this).val();
		}).get();
		s_vals = s_vals.toString();
	
		var k_vals = $(\'input[name=k]:checked\').map(function(){
		return $(this).val();
		}).get();
		k_vals = k_vals.toString();
	
		// こだわり条件は対象外
		var x_vals = "";
		//var x_vals = $(\'input[name=x]:checked\').map(function(){
		//return $(this).val();
		//}).get();
		//x_vals = x_vals.toString();

		var a_condition = $(\'#a_condition\').val();
		a_condition = a_condition.toString();
		
		var t_condition = $(\'#t_condition\').val();
		t_condition = t_condition.toString();
	
		var c_condition = $(\'#c_condition\').val();
		c_condition = c_condition.toString();

		var  mail = $("#mail").val();
		mail = mail.toString();
		
		$.ajax({
			type: "POST",
			url: "https://hoikubiz.com/reg_search_condition.php",
			data: { "a_vals" : a_vals, 
					"t_vals" : t_vals,
					"c_vals" : c_vals,
					"s_vals" : s_vals,
					"k_vals" : k_vals,
					"x_vals" : x_vals,
					"a_condition" : a_condition,
					"t_condition" : t_condition,
					"c_condition" : c_condition,
					"mail" : mail,
					},
			dataType : "json"
		}).done(function(data){
			if(data.res == 0 ){
				$("#error_mail1").hide();
				$("#reg_success").show();
				$("#search_div").hide();
			}else{				
				$("#error_mail1").hide();
				$("#error_mail2").text(data.error_msg);
				$("#error_mail2").show();
				$("#reg_success").hide();
			}
		}).fail(function(XMLHttpRequest, status, e){
			alert(e);
		});
			
	}else{
		$("#error_mail1").show();
		$("#error_mail2").hide();
		$("#reg_success").hide();
	}
	
}
'; ?>

</script>


<!-- remodal
 ================================================== -->
<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['top']; ?>
common/remodal/remodal.css">
<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['top']; ?>
common/remodal/remodal-default-theme.css">
<script src="<?php echo $this->_tpl_vars['top']; ?>
common/remodal/remodal.js"></script>


<link rel="canonical" href="<?php echo $this->_tpl_vars['myurl']; ?>
">
<?php if ($this->_tpl_vars['pager']['prev']): ?>
<?php if ($this->_tpl_vars['pager']['prev']['no']): ?>
<link rel="prev" href="./p<?php echo $this->_tpl_vars['pager']['prev']['no']; ?>
" />
<?php else: ?>
<link rel="prev" href="./" />
<?php endif; ?>
<?php endif; ?>
<?php if ($this->_tpl_vars['pager']['next']): ?>
<?php if ($this->_tpl_vars['pager']['next']['no']): ?>
<link rel="next" href="./p<?php echo $this->_tpl_vars['pager']['next']['no']; ?>
" />
<?php else: ?>
<link rel="next" href="./" />
<?php endif; ?>
<?php endif; ?>
<?php if ($this->_tpl_vars['noindex']): ?>
<meta name="robots" content="noindex,follow">
<?php endif; ?>


<script type="text/javascript" src="<?php echo $this->_tpl_vars['top']; ?>
common/js/mini_ajax.js"></script>
<script type="text/javascript">
var pref = '<?php echo $this->_tpl_vars['form']['pref']; ?>
';
var city = '<?php echo $this->_tpl_vars['form']['city']; ?>
';
var url = '<?php echo $this->_tpl_vars['top']; ?>
s/';
var rosen_tab = '<?php echo $this->_tpl_vars['rosen_tab']; ?>
';
<?php echo '
function set_select(sel, info, pref)
{
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
function change_pref(v)
{
	var str = ajax.gets("./?act=get_city&use=1&id=" + v);
	eval("var city_data = " + str);
	set_select(document.getElementById(\'city\'), city_data);
}
function sel_area(v)
{
	var str = ajax.gets("./?act=get_rosen&use=1&id=" + v);
	eval("var ajax_data = " + str);
	set_select(document.getElementById(\'rosen\'), ajax_data);
}
function sel_rosen(v)
{
	var str = ajax.gets("./?act=get_station&use=1&id=" + v);
	eval("var ajax_data = " + str);
	set_select(document.getElementById(\'station\'), ajax_data);
}
function do_search(form)
{
	var g=function(n){
		return form.getElementsByTagName(n)
	};
	var nv=function(e){
		if(e.name) {
			if (e.value) {
				return encodeURIComponent(e.name) + \'\' + encodeURIComponent(e.value) + \'/\';
			}
		}
		return \'\';
	};
	var i=collect(g(\'input\'),function(i){
		if((i.type!=\'radio\'&&i.type!=\'checkbox\')||i.checked) return nv(i)
	});
	var s=collect(g(\'select\'),nv);
	var t=collect(g(\'textarea\'),nv);
//	url += i.concat(s).concat(t).join(\'/\');
	var a = [];
	for (idx in i) {
		if (i[idx] != \'\') {
			a.push(i[idx]);
//alert("i=" + i[idx]);
		}
	}
	for (idx in s) {
		if (s[idx] != \'\') {
			a.push(s[idx]);
//alert("s=" + s[idx]);
		}
	}
	for (idx in t) {
		if (t[idx] != \'\') {
			a.push(t[idx]);
//alert("t=" + t[idx]);
		}
	}
//	var url = \'s/\' + a.join(\'/\');
//	url += a.join(\'/\');
	url += a.join(\'\');
	document.location = url;
}
function do_page(page)
{
	document.form1.p.value = page;
	document.form2.p.value = page;
	if (document.getElementById(\'tab01\').style.display == "block") {
		do_search(document.form1);
	} else {
		do_search(document.form2);
	}
}
function do_order(ord)
{
	document.form1.o.value = ord;
	document.form2.o.value = ord;
	if (document.getElementById(\'tab01\').style.display == "block") {
		do_search(document.form1);
	} else {
		do_search(document.form2);
	}
}
window.onload = function() {
	if (rosen_tab) {
		document.getElementById(\'tab01\').style.display = "none";
		document.getElementById(\'tab02\').style.display = "block";
	} else {
		document.getElementById(\'tab01\').style.display = "block";
		document.getElementById(\'tab02\').style.display = "none";
	}
}
$(function() {
  $(document).on("keypress", "input:not(.allow_submit)", function(event) {
    return event.which !== 13;
  });
});
'; ?>

//-->
</script>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/analytics.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</head>



<body>

<div id="wrapper" class="bg_gray">

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<!-- メインイメージ開始 -->
	<aside class="subpage_title search">
		<div class="mywidth flex column flex-center flex-middle">
			<h1 class="lh18 tx-center my-font02">お仕事を探す</h1>
			<div class="subpage_title_eng">Search</div>
		</div>
	</aside>
	<!-- メインイメージ終了 -->
	
	<!-- パンくず開始 -->
	<div id="topics" class="left pc-only">
		<ul>
			<li><a href="<?php echo $this->_tpl_vars['top']; ?>
">TOP</a>&nbsp;&gt;&nbsp;</li>
			<li><a href="<?php echo $this->_tpl_vars['top']; ?>
s/">お仕事を探す</a></li>
			<?php $_from = $this->_tpl_vars['tags']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
			<li>&nbsp;&gt;&nbsp;<?php echo $this->_tpl_vars['item']; ?>
</li>
			<?php endforeach; endif; unset($_from); ?>
		</ul>
	</div>
	<!-- パンくず開始 -->
	
	<!-- コンテンツ開始 -->
	<article id="content" class="clearfix">

		<div class="content_wrap clearfix">

		<form name="form1" action="search.html" method="post">
			<input type="hidden" name="o" value="<?php echo $this->_tpl_vars['form']['order']; ?>
">
			<input type="hidden" name="p" value="">

			<input type="hidden" id="a_condition" value="<?php echo $this->_tpl_vars['form']['a_condition']; ?>
">
			<input type="hidden" id="t_condition" value="<?php echo $this->_tpl_vars['form']['t_condition']; ?>
">
			<input type="hidden" id="c_condition" value="<?php echo $this->_tpl_vars['form']['c_condition']; ?>
">

						
			<!-- //.search_neighborhood -->

			<div class="search_form_wrap">
<!--<?php if ($this->_tpl_vars['area']): ?>-->			
				<dl class="part">
					<dt>勤務地<span class="sub">から探す</span></dt>
					<dd>
						<ul class="list">
							<!--<li>
								<label><input name="t" value="13" type="checkbox">&nbsp;東京都</label>
							</li>
							<li>
								<label><input name="t" value="14" type="checkbox">&nbsp;神奈川県</label>
							</li>
							<li>
								<label><input name="t" value="11" type="checkbox">&nbsp;埼玉県</label>
							</li>
							<li>
								<label><input name="t" value="12" type="checkbox">&nbsp;千葉県</label>
							</li>
							<li>
								<label><input name="t" value="8" type="checkbox">&nbsp;茨城県</label>
							</li>
							<li>
								<label><input name="t" value="9" type="checkbox">&nbsp;栃木県</label>
							</li>
							<li>
								<label><input name="t" value="10" type="checkbox">&nbsp;群馬県</label>
							</li>-->
							<li>
								<label>
									<input type="checkbox" name="a" value="1" <?php if ($this->_tpl_vars['form']['area']['1']): ?>checked="checked"<?php endif; ?> />
									&#160;北海道</label>
								</li>
							<li>
								<label>
									<input type="checkbox" name="a" value="2" <?php if ($this->_tpl_vars['form']['area']['2']): ?>checked="checked"<?php endif; ?> />
									&#160;東北</label>
							</li>
							<li>
								<label>
									<input type="checkbox" name="a" value="3" <?php if ($this->_tpl_vars['form']['area']['3']): ?>checked="checked"<?php endif; ?> />
								&#160;関東</label>
							</li>
							<li>
								<label>
									<input type="checkbox" name="a" value="4" <?php if ($this->_tpl_vars['form']['area']['4']): ?>checked="checked"<?php endif; ?> />
									&#160;北陸・甲信越</label>
							</li>
							<li>
								<label>
									<input type="checkbox" name="a" value="5" <?php if ($this->_tpl_vars['form']['area']['5']): ?>checked="checked"<?php endif; ?> />
									&#160;東海</label>
							</li>
							<li>
								<label>
									<input type="checkbox" name="a" value="6" <?php if ($this->_tpl_vars['form']['area']['6']): ?>checked="checked"<?php endif; ?> />
									&#160;関西</label>
							</li>
							<li>
								<label>
									<input type="checkbox" name="a" value="7" <?php if ($this->_tpl_vars['form']['area']['7']): ?>checked="checked"<?php endif; ?> />
									&#160;中国</label>
							</li>
							<li>
								<label>
									<input type="checkbox" name="a" value="8" <?php if ($this->_tpl_vars['form']['area']['8']): ?>checked="checked"<?php endif; ?> />
									&#160;四国</label>
							</li>
							<li>
								<label>
									<input type="checkbox" name="a" value="9" <?php if ($this->_tpl_vars['form']['area']['9']): ?>checked="checked"<?php endif; ?> />
									&#160;九州</label>
							</li>
							<li>
								<label>
									<input type="checkbox" name="a" value="10" <?php if ($this->_tpl_vars['form']['area']['10']): ?>checked="checked"<?php endif; ?> />
									&#160;沖縄</label>
							</li>
						</ul>
					</dd>
				</dl>
<!--<?php endif; ?>-->
<?php $_from = $this->_tpl_vars['pref_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
				<input type="hidden" name="t" value="<?php echo $this->_tpl_vars['item']; ?>
">
<?php endforeach; endif; unset($_from); ?>			


<?php if ($this->_tpl_vars['pref']): ?>
					<dl class="part">
						<dt><?php echo $this->_tpl_vars['area_name']; ?>
<span class="sub">から探す</span></dt>
						<dd>
							<ul class="list">
<?php $_from = $this->_tpl_vars['pref']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
								<li>
									<label>
										<input type="checkbox" name="t" value="<?php echo $this->_tpl_vars['item']['pref_cd']; ?>
" <?php if ($this->_tpl_vars['form']['pref'][$this->_tpl_vars['item']['pref_cd']]): ?>checked="checked"<?php endif; ?> />
										&#160;<?php echo $this->_tpl_vars['item']['pref_name']; ?>
</label>
								</li>
<?php endforeach; endif; unset($_from); ?>
							</ul>
						</dd>
					</dl>
<?php endif; ?>

									
					
<?php if ($this->_tpl_vars['city']): ?>
					<dl class="part">
						<dt><?php echo $this->_tpl_vars['pref_name']; ?>
<span class="sub">の市区町村からお仕事を探す</span></dt>
						<dd>
							<ul class="list">
								<?php $_from = $this->_tpl_vars['city']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
								<li>
									<label>
										<input type="checkbox" name="c" value="<?php echo $this->_tpl_vars['item']['city_cd']; ?>
" <?php if ($this->_tpl_vars['form']['city'][$this->_tpl_vars['item']['city_cd']]): ?>checked="checked"<?php endif; ?> />
										&#160;<?php echo $this->_tpl_vars['item']['city']; ?>
</label>
								</li>
								<?php endforeach; endif; unset($_from); ?>
							</ul>
						</dd>
					</dl>
<?php endif; ?>

					<dl class="part">
						<dt>職種<span class="sub">から探す</span></dt>
						<dd>
							<ul class="list">
								<li>
									<label><input type="checkbox" name="s" value="1" <?php if ($this->_tpl_vars['form']['syokusyu'][1]): ?>checked="checked"<?php endif; ?> />&nbsp;保育士</label>
								</li>
								<li>
									<label><input type="checkbox" name="s" value="2" <?php if ($this->_tpl_vars['form']['syokusyu'][2]): ?>checked="checked"<?php endif; ?> />&nbsp;幼稚園教諭</label>
								</li>
								<li>
									<label><input type="checkbox" name="s" value="3" <?php if ($this->_tpl_vars['form']['syokusyu'][3]): ?>checked="checked"<?php endif; ?> />&nbsp;園長</label>
								</li>
								<li>
									<label><input type="checkbox" name="s" value="4" <?php if ($this->_tpl_vars['form']['syokusyu'][4]): ?>checked="checked"<?php endif; ?> />&nbsp;主任</label>
								</li>
								<li>
									<label><input type="checkbox" name="s" value="5" <?php if ($this->_tpl_vars['form']['syokusyu'][5]): ?>checked="checked"<?php endif; ?> />&nbsp;看護師</label>
								</li>
								<li>
									<label><input type="checkbox" name="s" value="6" <?php if ($this->_tpl_vars['form']['syokusyu'][6]): ?>checked="checked"<?php endif; ?> />&nbsp;栄養士</label>
								</li>
								<li>
									<label><input type="checkbox" name="s" value="7" <?php if ($this->_tpl_vars['form']['syokusyu'][7]): ?>checked="checked"<?php endif; ?> />&nbsp;調理師</label>
								</li>
							</ul>
						</dd>
					</dl>	
	
		
					<dl class="part">
						<dt>雇用形態<span class="sub">から探す</span></dt>
						<dd>
							<ul class="list">
<?php $_from = $this->_tpl_vars['use_koyou']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
								<li>
									<label><input type="checkbox" name="k" value="<?php echo $this->_tpl_vars['item']['id']; ?>
" <?php if ($this->_tpl_vars['form']['koyou'][$this->_tpl_vars['item']['id']]): ?>checked="checked"<?php endif; ?> />&nbsp;<?php echo $this->_tpl_vars['item']['name']; ?>
</label>
								</li>
<?php endforeach; endif; unset($_from); ?>
								<!--<li>
									<label><input name="k" value="1" type="checkbox" <?php if ($this->_tpl_vars['form']['koyou'][1]): ?>checked="checked"<?php endif; ?>>&nbsp;常勤</label>
								</li>
								<li>
									<label><input name="k" value="2" type="checkbox" <?php if ($this->_tpl_vars['form']['koyou'][2]): ?>checked="checked"<?php endif; ?>>&nbsp;非常勤</label>
								</li>-->
							</ul>
						</dd>
					</dl>
				

<?php if ($this->_tpl_vars['use_kodawari1']): ?>							
				<dl class="part">
					<dt>こだわり条件<span class="sub">から探す</span></dt>
					<dd>
						<ul class="list">
<?php $_from = $this->_tpl_vars['use_kodawari1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>						
							<li>
								<label>
									<input type="checkbox" name="x" value="<?php echo $this->_tpl_vars['item']['id']; ?>
" <?php if ($this->_tpl_vars['form']['kodawari1'][$this->_tpl_vars['item']['id']]): ?>checked="checked"<?php endif; ?> />
									&nbsp;<?php echo $this->_tpl_vars['item']['name']; ?>
</label>
							</li>
<?php endforeach; endif; unset($_from); ?>
						</ul>
					</dd>
				</dl>
<?php endif; ?>



<?php if ($this->_tpl_vars['use_kodawari2']): ?>	
				<dl class="part">
					<dt>求人特集<span class="sub">から探す</span></dt>
					<dd>
						<ul class="list">
							<li>
								<label><input type="checkbox" name="y" value="1" <?php if ($this->_tpl_vars['form']['kodawari2'][1]): ?>checked="checked"<?php endif; ?> />&nbsp;無資格・未経験可</label>
							</li>
							<li>
								<label><input type="checkbox" name="y" value="2" <?php if ($this->_tpl_vars['form']['kodawari2'][2]): ?>checked="checked"<?php endif; ?> />&nbsp;住宅手当あり</label>
							</li>
							<li>
								<label><input type="checkbox" name="y" value="3" <?php if ($this->_tpl_vars['form']['kodawari2'][3]): ?>checked="checked"<?php endif; ?> />&nbsp;夜勤無し</label>
							</li>
						</ul>
					</dd>
				</dl>
<?php endif; ?>


<?php if ($this->_tpl_vars['use_kodawari3']): ?>			
				<dl class="part">
					<dt>こだわり3<span class="sub">から探す</span></dt>
					<dd>
						<ul class="list">
<?php $_from = $this->_tpl_vars['use_kodawari3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
								<li class="cate">
									<label>
										<input type="checkbox" name="z" value="<?php echo $this->_tpl_vars['item']['id']; ?>
" <?php if ($this->_tpl_vars['form']['kodawari3'][$this->_tpl_vars['item']['id']]): ?>checked="checked"<?php endif; ?> />
										&nbsp;<?php echo $this->_tpl_vars['item']['name']; ?>
</label>
								</li>
<?php endforeach; endif; unset($_from); ?>
						</ul>
					</dd>
				</dl>
<?php endif; ?>

											
				<dl class="part keyword">
					<dt>キーワード<span class="sub">から探す</span></dt>
					<dd><input class="text" type="text" name="w" value="<?php echo $this->_tpl_vars['form']['keyword']; ?>
" /></dd>
				</dl>
				
				<div class="tx-center">
					<input class="btn opa white point-back01 my-font01" type="button" style="cursor: pointer;" value="上記の条件で検索する" onClick="do_search(document.form1)" />
				</div>
				
				<div class="mt30 sp-mt20 sp-mb20 tx-center">
					<a href="javascript:void(0)" data-remodal-target="modal_notification" class="btn btn-notice opa my-font01" />この条件で通知を受け取る</a>
				</div>
				
				<div class="remodal notification-wrap" data-remodal-id="modal_notification" data-remodal-options="hashTracking: true">
					<button data-remodal-action="close" class="remodal-close"><img src="<?php echo $this->_tpl_vars['top']; ?>
common/images/notice-close.png"></button>
					<div class="notification-list flex wrap flex-left flex-middle sp-flex-top">
						<div class="item-name">エリア</div>
						<ul class="flex flex-left flex-middle wrap" id="area_condition">
						  <li>未選択</li>
						</ul>
						<div class="item-name">職種</div>
						<ul class="flex flex-left flex-middle wrap" id="syokusyu_condition">
						  <li>未選択</li>
						</ul>
						<div class="item-name">雇用形態</div>
						<ul class="flex flex-left flex-middle wrap" id="koyou_condition">
						  <li>未選択</li>
						</ul>
						<!--
						<div class="item-name">こだわり条件</div>
						<ul class="flex flex-left flex-middle wrap" id="kodawari_condition">
						  <li>未選択</li>
						</ul>
						-->
					</div>
					<div class="notification-form" id="search_div">

						<dl>
							<dt>メールアドレス</dt>
							<dd>
								<input type="text" class="" id="mail">
								<p class="error" id="error_mail1" style="display:none;">メールアドレスが入力されていません　</p>
								<p class="error" id="error_mail2" style="display:none;"></p>
							</dd>
						</dl>
						<!--a href="#" class="btn-notification point-back01 white my-font01 opa"　onClick="do_search_condition_reg()">送信する</a-->
						<input class="btn-notification point-back01 white my-font01 opa" type="button" style="border:none;" value="送信する" onClick="do_search_condition_reg()"/>
					</div><!-- //.notification-form -->
					<p class="" id="reg_success" style="display:none;">登録が完了しました</p>
				</div><!-- //.remodal.notification-wrap -->
				
			</div>
		</form>
		
		
		<div class="search_result_wrap clearfix">
			
			<div class="title_wrap">
				<h2 class="tit">求人情報一覧</h2>
			</div>
			<div class="search_result">
				&nbsp;&nbsp;<span class="num"><?php echo $this->_tpl_vars['total']; ?>
</span><span class="bold">&nbsp;件&nbsp;</span><!--<?php echo $this->_tpl_vars['start']; ?>
～<?php echo $this->_tpl_vars['end']; ?>
件-->
			</div>

<?php if ($this->_tpl_vars['search2']): ?>
				<div class="search_result_message clear">
					<p>検索結果が見つかりませんでした。<br />
						検索条件に近い求人情報を表示しています。</p>
				</div>
<?php endif; ?>
<?php if (count ( $this->_tpl_vars['list'] ) == 0): ?>
				<div class="search_result_message">
					<p>検索結果が見つかりませんでした。</p>
				</div>
<?php endif; ?>
				
				
<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['loop']['iteration']++;
?>
			<div class="recruit_info">

				<h3 class="tit"><a href="<?php echo $this->_tpl_vars['top']; ?>
detail/<?php echo $this->_tpl_vars['item']['item_id']; ?>
" class="my-font02 opa"><?php echo $this->_tpl_vars['item']['title']; ?>
</a></h3>
				
				<div class="wrap">
					<div class="info_wrap">
						<a href="<?php echo $this->_tpl_vars['top']; ?>
detail/<?php echo $this->_tpl_vars['item']['item_id']; ?>
" class="image_box opa" >
<?php if ($this->_tpl_vars['item']['image']): ?>				
							<img src="<?php echo $this->_tpl_vars['top']; ?>
img.php?id=<?php echo $this->_tpl_vars['item']['image']; ?>
" alt="<?php echo $this->_tpl_vars['item']['title']; ?>
" />
<?php else: ?>				
	<?php if ($this->_tpl_vars['item']['item_id']%22 > 0): ?>
		<img src="<?php echo $this->_tpl_vars['top']; ?>
noimg/<?php echo $this->_tpl_vars['item']['item_id']%22; ?>
.jpg" alt="<?php echo $this->_tpl_vars['item']['title']; ?>
" />
	<?php else: ?>
		<img src="<?php echo $this->_tpl_vars['top']; ?>
noimg/22.jpg" alt="<?php echo $this->_tpl_vars['item']['title']; ?>
" />
	<?php endif; ?>
							<!--img src="<?php echo $this->_tpl_vars['top']; ?>
common/images/noimg.png" alt="<?php echo $this->_tpl_vars['item']['title']; ?>
" /-->
<?php endif; ?>
						</a>
						<div class="info">
							<div class="data">
<?php if ($this->_tpl_vars['item']['text02']): ?>	
								<dl>
									<dt>施設名</dt>
									<dd><?php echo $this->_tpl_vars['item']['text02']; ?>
</dd>
								</dl>
<?php endif; ?>
<?php if ($this->_tpl_vars['item']['text01']): ?>	
								<dl>
									<dt>施設名</dt>
									<dd><?php echo $this->_tpl_vars['item']['text01']; ?>
</dd>
								</dl>
<?php endif; ?>
								<dl>
									<dt>勤務地</dt>
									<dd><?php echo $this->_tpl_vars['item']['kinmu_pref']; ?>
<?php echo $this->_tpl_vars['item']['kinmu_city']; ?>
<?php echo $this->_tpl_vars['item']['kinmu_address1']; ?>
<?php echo $this->_tpl_vars['item']['kinmu_address2']; ?>
</dd>
								</dl>
								<dl>
									<dt>職種</dt>
									<dd><?php echo $this->_tpl_vars['item']['indeed']; ?>
</dd>
								</dl>
								<dl>
									<dt>雇用形態</dt>
									<dd><?php echo $this->_tpl_vars['item']['koyou']; ?>
</dd>
								</dl>
<!--<?php if ($this->_tpl_vars['item']['kyuyo']): ?>	
								<dl>
									<dt>給与</dt>
									<dd><?php echo $this->_tpl_vars['item']['kyuyo']; ?>
</dd>
								</dl>
<?php endif; ?>-->
							</div>
						</div>
					</div>
					
					<div class="btn_wrap">
						<a class="btn01 fl opa" href="<?php echo $this->_tpl_vars['top']; ?>
detail/<?php echo $this->_tpl_vars['item']['item_id']; ?>
">詳細を見る</a>
						<a class="btn02 fr opa" href="<?php echo $this->_tpl_vars['top']; ?>
detail/<?php echo $this->_tpl_vars['item']['item_id']; ?>
/contact/">問い合わせる</a>
					</div>

				</div>
			</div>
<?php endforeach; endif; unset($_from); ?>



<!--ページャー開始-->
<?php if ($this->_tpl_vars['pager']): ?>
			<div class="paging clearfix">
				<ul>
<?php if ($this->_tpl_vars['pager']['prev']): ?>
<?php if ($this->_tpl_vars['pager']['prev']['no']): ?>
					<li class="prev"><a href="./p<?php echo $this->_tpl_vars['pager']['prev']['no']; ?>
"><</a></li>
<?php else: ?>
					<li class="prev"><a href="./"><</a></li>
<?php endif; ?>
<?php endif; ?>
<?php if ($this->_tpl_vars['pager']['prev_skip']): ?>
						&nbsp;…&nbsp;
<?php endif; ?>
<?php $_from = $this->_tpl_vars['pager']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<?php if ($this->_tpl_vars['item']['link']): ?>
<?php if ($this->_tpl_vars['item']['no']): ?>
					<li><a href="./p<?php echo $this->_tpl_vars['item']['no']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
</a></li>
<?php else: ?>
					<li><a href="./"><?php echo $this->_tpl_vars['item']['name']; ?>
</a></li>
<?php endif; ?>
<?php else: ?>
					<li><span class="active"><?php echo $this->_tpl_vars['item']['name']; ?>
</span></li>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<?php if ($this->_tpl_vars['pager']['next_skip']): ?>
						&nbsp;…&nbsp;
<?php endif; ?>
<?php if ($this->_tpl_vars['pager']['next']): ?>
<?php if ($this->_tpl_vars['pager']['next']['no']): ?>
					<li class="next"><a href="./p<?php echo $this->_tpl_vars['pager']['next']['no']; ?>
">></a></li>
<?php else: ?>
					<li class="next"><a href="./">></a></li>
<?php endif; ?>
<?php endif; ?>
				</ul>
			</div>
<?php endif; ?>
<!--ページャー終了-->

			
		</div>
		
		</div>

	</article>
	<!-- コンテンツ終了 -->
	
	
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

</div>
<script>
	let g_topURL = '<?php echo $this->_tpl_vars['top']; ?>
';
</script>
<script src="/common/js/gmap.js"></script>
<script src="//maps.google.com/maps/api/js?sensor=true&key=AIzaSyB42taNnaV_QF4rubt1ksDOiHkgTdvueXg&callback=initMap"></script>
</body>
</html>