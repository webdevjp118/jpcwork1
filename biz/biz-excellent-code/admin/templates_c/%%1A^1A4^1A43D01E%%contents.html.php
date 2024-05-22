<?php /* Smarty version 2.6.22, created on 2017-10-23 14:59:01
         compiled from contents.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="content-script-Type" content="text/javascript" />
<title>管理者画面</title>
<LINK rel="stylesheet" href="css/admin.css" type="text/css" media="screen" />
<script type="text/javascript">
<!--
<?php echo '
function delete_conf(id)
{
	if (confirm("削除してもよろしいですか？")) {
'; ?>

		window.location = '?act=<?php echo $this->_tpl_vars['item_form']['name']; ?>
_delete&id=' + id;
<?php echo '
	}
}
function do_page(page)
{
'; ?>

	location = '?act=<?php echo $this->_tpl_vars['item_form']['name']; ?>
_edit&id=<?php echo $this->_tpl_vars['id']; ?>
&page=' + page;
<?php echo '
}
function do_hide(items, btn)
{
	var i, item;
	var open = 0;
	ary = items.split(\',\');
	for (i = 0; i < ary.length; i++) {
		item = document.getElementById("tr_" + ary[i]);
		if (item) {
			if (item.style.display == "none") {
				item.style.display = "";
				open = 1;
			} else {
				item.style.display = "none";
			}
		}
	}
 	item = document.getElementById(btn);
	if (open) {
		item.src = \'open.gif\';
	} else {
		item.src = \'close.gif\';
	}
}
'; ?>

//-->
</script>
</head>

<body>

<div id="layout">

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="main" class="clearfix">
<div class="top">
<h2><?php echo $this->_tpl_vars['page_title']; ?>
</h2>
</div>
<div class="box">

<div class="submenu">
<?php if ($this->_tpl_vars['list_menu']): ?>
<a href="?act=<?php echo $this->_tpl_vars['form']['name']; ?>
"><?php echo $this->_tpl_vars['form']['title']; ?>
</a> > 登録・編集
<?php endif; ?>
&nbsp;</div>

<div class="cts">
<!--中身-->

<form name="form1" enctype="multipart/form-data" method="post" action="?act=<?php echo $this->_tpl_vars['form']['name']; ?>
_update">
<input type="hidden" id="mode" name="mode" value="<?php echo $this->_tpl_vars['mode']; ?>
">
<input type="hidden" id="id" name="id" value="<?php echo $this->_tpl_vars['id']; ?>
">
<input type="hidden" id="page" name="page" value="">

<?php if ($this->_tpl_vars['message']): ?>
<div class="error"><?php echo $this->_tpl_vars['message']; ?>
</div>
<?php endif; ?>


<table id="tb_<?php echo $this->_tpl_vars['item']['name']; ?>
" width="100%" border="0" cellpadding="0" cellspacing="1">
<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<?php if ($this->_tpl_vars['item']['hidden']): ?>
<input type="hidden" id="<?php echo $this->_tpl_vars['item']['name']; ?>
" name="<?php echo $this->_tpl_vars['item']['name']; ?>
" value="<?php echo $this->_tpl_vars['item']['value']; ?>
">
<?php else: ?>
<tr id="tr_<?php echo $this->_tpl_vars['item']['name']; ?>
">
<?php if ($this->_tpl_vars['item']['comment']): ?>
<?php if ($this->_tpl_vars['item']['title']): ?>
<th id="th_<?php echo $this->_tpl_vars['item']['name']; ?>
" colspan="2" width="100%">
<?php if ($this->_tpl_vars['item']['hide']): ?><p style="float:left"><a href="javascript:do_hide('<?php echo $this->_tpl_vars['item']['hide']; ?>
','btn_<?php echo $this->_tpl_vars['item']['name']; ?>
')"><img id="btn_<?php echo $this->_tpl_vars['item']['name']; ?>
" src="close.gif" boarder="0"></a></p><?php endif; ?><?php if ($this->_tpl_vars['item']['require']): ?><p class="require">※</p><?php endif; ?><?php echo $this->_tpl_vars['item']['title']; ?>

</th>
<?php else: ?>
<th id="td_<?php echo $this->_tpl_vars['item']['name']; ?>
" colspan="2" width="100%"><hr></th>
<?php endif; ?>
<?php else: ?>
<th id="th_<?php echo $this->_tpl_vars['item']['name']; ?>
" width="20%"><?php if ($this->_tpl_vars['item']['require']): ?><p class="require">※</p><?php endif; ?><?php echo $this->_tpl_vars['item']['title']; ?>
</th>
<td id="td_<?php echo $this->_tpl_vars['item']['name']; ?>
" width="100%">
<?php if ($this->_tpl_vars['item']['text']): ?>
<input type="text" id="<?php echo $this->_tpl_vars['item']['name']; ?>
" name="<?php echo $this->_tpl_vars['item']['name']; ?>
" value="<?php echo $this->_tpl_vars['item']['value']; ?>
" maxlength="<?php echo $this->_tpl_vars['item']['length']; ?>
" size="70"<?php if ($this->_tpl_vars['item']['disable']): ?> disabled="disabled"<?php endif; ?>>
<?php endif; ?>

<?php if ($this->_tpl_vars['item']['textarea']): ?>
<textarea id="<?php echo $this->_tpl_vars['item']['name']; ?>
" name="<?php echo $this->_tpl_vars['item']['name']; ?>
" <?php if ($this->_tpl_vars['item']['cols']): ?>cols="<?php echo $this->_tpl_vars['item']['cols']; ?>
"<?php else: ?>cols="60"<?php endif; ?> <?php if ($this->_tpl_vars['item']['rows']): ?>rows="<?php echo $this->_tpl_vars['item']['rows']; ?>
"<?php else: ?>rows="10"<?php endif; ?><?php if ($this->_tpl_vars['item']['disable']): ?> disabled="disabled"<?php endif; ?>><?php echo $this->_tpl_vars['item']['value']; ?>
</textarea>
<?php endif; ?>

<?php if ($this->_tpl_vars['item']['image']): ?>
<?php if ($this->_tpl_vars['item']['value']): ?>
<a href="./?act=get_image&id=<?php echo $this->_tpl_vars['item']['value']; ?>
" target="_blank"><img src="?act=get_image&id=<?php echo $this->_tpl_vars['item']['value']; ?>
&x=200"></a>
<br />
<input type="checkbox" id="<?php echo $this->_tpl_vars['item']['name']; ?>
" name="<?php echo $this->_tpl_vars['item']['name']; ?>
_del" value="<?php echo $this->_tpl_vars['item']['value']; ?>
"> この画像を削除
<input type="hidden" id="<?php echo $this->_tpl_vars['item']['name']; ?>
_old" name="<?php echo $this->_tpl_vars['item']['name']; ?>
_old" value="<?php echo $this->_tpl_vars['item']['value']; ?>
">
<br />
<?php endif; ?>
<input type="file" id="<?php echo $this->_tpl_vars['item']['name']; ?>
" name="<?php echo $this->_tpl_vars['item']['name']; ?>
" size="50">
<?php endif; ?>

<?php if ($this->_tpl_vars['item']['display']): ?>
<?php echo $this->_tpl_vars['item']['value']; ?>

<?php endif; ?>

<?php if ($this->_tpl_vars['item']['image_file']): ?>
<?php if ($this->_tpl_vars['item']['value']): ?>
<img id="<?php echo $this->_tpl_vars['item']['name']; ?>
_img" src="<?php echo $this->_tpl_vars['item']['value']; ?>
" width="200"><br>
<?php endif; ?>
<input type="text" id="<?php echo $this->_tpl_vars['item']['name']; ?>
" name="<?php echo $this->_tpl_vars['item']['name']; ?>
" value="<?php echo $this->_tpl_vars['item']['value']; ?>
" size="50">(画像のURL)
<?php endif; ?>

<?php if ($this->_tpl_vars['item']['select']): ?>
<input type="hidden" name="<?php echo $this->_tpl_vars['item']['name']; ?>
_value" id="<?php echo $this->_tpl_vars['item']['name']; ?>
_value" value="<?php echo $this->_tpl_vars['item']['value']; ?>
">
<select id="<?php echo $this->_tpl_vars['item']['name']; ?>
" name="<?php echo $this->_tpl_vars['item']['name']; ?>
"<?php if ($this->_tpl_vars['item']['disable']): ?> disabled="disabled"<?php endif; ?>>
<?php $_from = $this->_tpl_vars['item']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item2']):
?>
<option value="<?php echo $this->_tpl_vars['item2']['value']; ?>
" <?php echo $this->_tpl_vars['item2']['sel']; ?>
><?php echo $this->_tpl_vars['item2']['name']; ?>
</option>
<?php endforeach; endif; unset($_from); ?>
</select>
<?php endif; ?>

<?php if ($this->_tpl_vars['item']['radio']): ?>
<?php $_from = $this->_tpl_vars['item']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item2']):
?>
<input type="radio" id="<?php echo $this->_tpl_vars['item2']['name']; ?>
_<?php echo $this->_tpl_vars['item2']['value']; ?>
" name="<?php echo $this->_tpl_vars['item']['name']; ?>
" value="<?php echo $this->_tpl_vars['item2']['value']; ?>
" <?php echo $this->_tpl_vars['item2']['sel']; ?>
<?php if ($this->_tpl_vars['item']['disable']): ?> disabled="disabled"<?php endif; ?>><?php echo $this->_tpl_vars['item2']['name']; ?>
&nbsp;&nbsp;
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['item']['checkbox']): ?>
<?php if ($this->_tpl_vars['item']['list']): ?>
<?php $_from = $this->_tpl_vars['item']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item2']):
?>
<input type="checkbox" id="<?php echo $this->_tpl_vars['item2']['key']; ?>
" name="<?php echo $this->_tpl_vars['item2']['key']; ?>
" value="<?php echo $this->_tpl_vars['item2']['value']; ?>
" <?php echo $this->_tpl_vars['item2']['sel']; ?>
<?php if ($this->_tpl_vars['item']['disable']): ?> disabled="disabled"<?php endif; ?>><?php echo $this->_tpl_vars['item2']['name']; ?>

<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>
<?php if (! $this->_tpl_vars['item']['list']): ?>
<input type="checkbox" id="<?php echo $this->_tpl_vars['item']['name']; ?>
" name="<?php echo $this->_tpl_vars['item']['name']; ?>
" value="<?php echo $this->_tpl_vars['item']['value']; ?>
" <?php echo $this->_tpl_vars['item']['checked']; ?>
<?php if ($this->_tpl_vars['item']['disable']): ?> disabled="disabled"<?php endif; ?>>
<?php endif; ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['item']['reference']): ?>
<?php if (! $this->_tpl_vars['item']['select']): ?>
<?php if ($this->_tpl_vars['item']['link']): ?>
<a href="<?php echo $this->_tpl_vars['item']['link']; ?>
<?php echo $this->_tpl_vars['item']['value']; ?>
"><?php echo $this->_tpl_vars['item']['reference_value']; ?>
</a>
<?php endif; ?>
<?php if (! $this->_tpl_vars['item']['link']): ?>
<?php echo $this->_tpl_vars['item']['reference_value']; ?>

<?php endif; ?>
<input type="hidden" id="<?php echo $this->_tpl_vars['item']['name']; ?>
" name="<?php echo $this->_tpl_vars['item']['name']; ?>
" value="<?php echo $this->_tpl_vars['item']['value']; ?>
">
<?php endif; ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['item']['link']): ?>
<a href="<?php echo $this->_tpl_vars['item']['link']; ?>
<?php echo $this->_tpl_vars['item']['value']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
</a>
<?php endif; ?>

<?php if ($this->_tpl_vars['item']['date']): ?>
<input type="text" id="<?php echo $this->_tpl_vars['item']['name']; ?>
_year" name="<?php echo $this->_tpl_vars['item']['name']; ?>
_year" value="<?php echo $this->_tpl_vars['item']['value']/$this->_tpl_vars['ear']; ?>
" <?php echo $this->_tpl_vars['item']['list']/$this->_tpl_vars['el_year']; ?>
<?php if ($this->_tpl_vars['item']['disable']): ?> disabled="disabled"<?php endif; ?>>&nbsp;
<input type="text" id="<?php echo $this->_tpl_vars['item']['name']; ?>
_month" name="<?php echo $this->_tpl_vars['item']['name']; ?>
_month" value="<?php echo $this->_tpl_vars['item']['value']/$this->_tpl_vars['onth']; ?>
" <?php echo $this->_tpl_vars['item']['list']/$this->_tpl_vars['el_year']; ?>
<?php if ($this->_tpl_vars['item']['disable']): ?> disabled="disabled"<?php endif; ?>>&nbsp;
<input type="text" id="<?php echo $this->_tpl_vars['item']['name']; ?>
_day" name="<?php echo $this->_tpl_vars['item']['name']; ?>
_day" value="<?php echo $this->_tpl_vars['item']['value']/$this->_tpl_vars['ay']; ?>
" <?php echo $this->_tpl_vars['item']['list']/$this->_tpl_vars['el_year']; ?>
<?php if ($this->_tpl_vars['item']['disable']): ?> disabled="disabled"<?php endif; ?>>&nbsp;
<?php endif; ?>
<?php if ($this->_tpl_vars['item']['date_sel']): ?>
<select id="<?php echo $this->_tpl_vars['item']['name']; ?>
_year" name="<?php echo $this->_tpl_vars['item']['name']; ?>
_year"<?php if ($this->_tpl_vars['item']['disable']): ?> disabled="disabled"<?php endif; ?>>
<option value=""></option>
<?php $_from = $this->_tpl_vars['item']['years']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item2']):
?>
<option value="<?php echo $this->_tpl_vars['item2']['value']; ?>
" <?php echo $this->_tpl_vars['item2']['sel']; ?>
><?php echo $this->_tpl_vars['item2']['value']; ?>
</option>
<?php endforeach; endif; unset($_from); ?>
</select> 年&nbsp;
<select id="<?php echo $this->_tpl_vars['item']['name']; ?>
_month" name="<?php echo $this->_tpl_vars['item']['name']; ?>
_month"<?php if ($this->_tpl_vars['item']['disable']): ?> disabled="disabled"<?php endif; ?>>
<option value=""></option>
<option value="01" <?php echo $this->_tpl_vars['item']['month01']; ?>
>1</option>
<option value="02" <?php echo $this->_tpl_vars['item']['month02']; ?>
>2</option>
<option value="03" <?php echo $this->_tpl_vars['item']['month03']; ?>
>3</option>
<option value="04" <?php echo $this->_tpl_vars['item']['month04']; ?>
>4</option>
<option value="05" <?php echo $this->_tpl_vars['item']['month05']; ?>
>5</option>
<option value="06" <?php echo $this->_tpl_vars['item']['month06']; ?>
>6</option>
<option value="07" <?php echo $this->_tpl_vars['item']['month07']; ?>
>7</option>
<option value="08" <?php echo $this->_tpl_vars['item']['month08']; ?>
>8</option>
<option value="09" <?php echo $this->_tpl_vars['item']['month09']; ?>
>9</option>
<option value="10" <?php echo $this->_tpl_vars['item']['month10']; ?>
>10</option>
<option value="11" <?php echo $this->_tpl_vars['item']['month11']; ?>
>11</option>
<option value="12" <?php echo $this->_tpl_vars['item']['month12']; ?>
>12</option>
</select> 月&nbsp;
<select id="<?php echo $this->_tpl_vars['item']['name']; ?>
_day" name="<?php echo $this->_tpl_vars['item']['name']; ?>
_day"<?php if ($this->_tpl_vars['item']['disable']): ?> disabled="disabled"<?php endif; ?>>
<option value=""></option>
<option value="01" <?php echo $this->_tpl_vars['item']['day01']; ?>
>1</option>
<option value="02" <?php echo $this->_tpl_vars['item']['day02']; ?>
>2</option>
<option value="03" <?php echo $this->_tpl_vars['item']['day03']; ?>
>3</option>
<option value="04" <?php echo $this->_tpl_vars['item']['day04']; ?>
>4</option>
<option value="05" <?php echo $this->_tpl_vars['item']['day05']; ?>
>5</option>
<option value="06" <?php echo $this->_tpl_vars['item']['day06']; ?>
>6</option>
<option value="07" <?php echo $this->_tpl_vars['item']['day07']; ?>
>7</option>
<option value="08" <?php echo $this->_tpl_vars['item']['day08']; ?>
>8</option>
<option value="09" <?php echo $this->_tpl_vars['item']['day09']; ?>
>9</option>
<option value="10" <?php echo $this->_tpl_vars['item']['day10']; ?>
>10</option>
<option value="11" <?php echo $this->_tpl_vars['item']['day11']; ?>
>11</option>
<option value="12" <?php echo $this->_tpl_vars['item']['day12']; ?>
>12</option>
<option value="13" <?php echo $this->_tpl_vars['item']['day13']; ?>
>13</option>
<option value="14" <?php echo $this->_tpl_vars['item']['day14']; ?>
>14</option>
<option value="15" <?php echo $this->_tpl_vars['item']['day15']; ?>
>15</option>
<option value="16" <?php echo $this->_tpl_vars['item']['day16']; ?>
>16</option>
<option value="17" <?php echo $this->_tpl_vars['item']['day17']; ?>
>17</option>
<option value="18" <?php echo $this->_tpl_vars['item']['day18']; ?>
>18</option>
<option value="19" <?php echo $this->_tpl_vars['item']['day19']; ?>
>19</option>
<option value="20" <?php echo $this->_tpl_vars['item']['day20']; ?>
>20</option>
<option value="21" <?php echo $this->_tpl_vars['item']['day21']; ?>
>21</option>
<option value="22" <?php echo $this->_tpl_vars['item']['day22']; ?>
>22</option>
<option value="23" <?php echo $this->_tpl_vars['item']['day23']; ?>
>23</option>
<option value="24" <?php echo $this->_tpl_vars['item']['day24']; ?>
>24</option>
<option value="25" <?php echo $this->_tpl_vars['item']['day25']; ?>
>25</option>
<option value="26" <?php echo $this->_tpl_vars['item']['day26']; ?>
>26</option>
<option value="27" <?php echo $this->_tpl_vars['item']['day27']; ?>
>27</option>
<option value="28" <?php echo $this->_tpl_vars['item']['day28']; ?>
>28</option>
<option value="29" <?php echo $this->_tpl_vars['item']['day29']; ?>
>29</option>
<option value="30" <?php echo $this->_tpl_vars['item']['day30']; ?>
>30</option>
<option value="31" <?php echo $this->_tpl_vars['item']['day31']; ?>
>31</option>
</select> 日
<?php endif; ?>
<?php if ($this->_tpl_vars['item']['yearmonth_sel']): ?>
<select id="<?php echo $this->_tpl_vars['item']['name']; ?>
_year" name="<?php echo $this->_tpl_vars['item']['name']; ?>
_year"<?php if ($this->_tpl_vars['item']['disable']): ?> disabled="disabled"<?php endif; ?>>
<option value=""></option>
<?php $_from = $this->_tpl_vars['item']['years']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item2']):
?>
<option value="<?php echo $this->_tpl_vars['item2']['value']; ?>
" <?php echo $this->_tpl_vars['item2']['sel']; ?>
><?php echo $this->_tpl_vars['item2']['value']; ?>
</option>
<?php endforeach; endif; unset($_from); ?>
</select> 年&nbsp;
<select id="<?php echo $this->_tpl_vars['item']['name']; ?>
_month" name="<?php echo $this->_tpl_vars['item']['name']; ?>
_month"<?php if ($this->_tpl_vars['item']['disable']): ?> disabled="disabled"<?php endif; ?>>
<option value=""></option>
<option value="01" <?php echo $this->_tpl_vars['item']['month01']; ?>
>1</option>
<option value="02" <?php echo $this->_tpl_vars['item']['month02']; ?>
>2</option>
<option value="03" <?php echo $this->_tpl_vars['item']['month03']; ?>
>3</option>
<option value="04" <?php echo $this->_tpl_vars['item']['month04']; ?>
>4</option>
<option value="05" <?php echo $this->_tpl_vars['item']['month05']; ?>
>5</option>
<option value="06" <?php echo $this->_tpl_vars['item']['month06']; ?>
>6</option>
<option value="07" <?php echo $this->_tpl_vars['item']['month07']; ?>
>7</option>
<option value="08" <?php echo $this->_tpl_vars['item']['month08']; ?>
>8</option>
<option value="09" <?php echo $this->_tpl_vars['item']['month09']; ?>
>9</option>
<option value="10" <?php echo $this->_tpl_vars['item']['month10']; ?>
>10</option>
<option value="11" <?php echo $this->_tpl_vars['item']['month11']; ?>
>11</option>
<option value="12" <?php echo $this->_tpl_vars['item']['month12']; ?>
>12</option>
</select> 月
<?php endif; ?>

<?php if ($this->_tpl_vars['item']['time']): ?>
<input type="text" id="<?php echo $this->_tpl_vars['item']['name']; ?>
_hour" name="<?php echo $this->_tpl_vars['item']['name']; ?>
_hour" value="<?php echo $this->_tpl_vars['item']['value']/$this->_tpl_vars['our']; ?>
" <?php echo $this->_tpl_vars['item']['list']/$this->_tpl_vars['el_hour']; ?>
<?php if ($this->_tpl_vars['item']['disable']): ?> disabled="disabled"<?php endif; ?>>&nbsp;
<input type="text" id="<?php echo $this->_tpl_vars['item']['name']; ?>
_min" name="<?php echo $this->_tpl_vars['item']['name']; ?>
_min" value="<?php echo $this->_tpl_vars['item']['value']/$this->_tpl_vars['in']; ?>
" <?php echo $this->_tpl_vars['item']['list']/$this->_tpl_vars['el_min']; ?>
<?php if ($this->_tpl_vars['item']['disable']): ?> disabled="disabled"<?php endif; ?>>&nbsp;
<?php endif; ?>
<?php if ($this->_tpl_vars['item']['time_sel']): ?>
<select id="<?php echo $this->_tpl_vars['item']['name']; ?>
_hour" name="<?php echo $this->_tpl_vars['item']['name']; ?>
_hour"<?php if ($this->_tpl_vars['item']['disable']): ?> disabled="disabled"<?php endif; ?>>
<option value=""></option>
<option value="00" <?php echo $this->_tpl_vars['item']['hour00']; ?>
>00</option>
<option value="01" <?php echo $this->_tpl_vars['item']['hour01']; ?>
>01</option>
<option value="02" <?php echo $this->_tpl_vars['item']['hour02']; ?>
>02</option>
<option value="03" <?php echo $this->_tpl_vars['item']['hour03']; ?>
>03</option>
<option value="04" <?php echo $this->_tpl_vars['item']['hour04']; ?>
>04</option>
<option value="05" <?php echo $this->_tpl_vars['item']['hour05']; ?>
>05</option>
<option value="06" <?php echo $this->_tpl_vars['item']['hour06']; ?>
>06</option>
<option value="07" <?php echo $this->_tpl_vars['item']['hour07']; ?>
>07</option>
<option value="08" <?php echo $this->_tpl_vars['item']['hour08']; ?>
>08</option>
<option value="09" <?php echo $this->_tpl_vars['item']['hour09']; ?>
>09</option>
<option value="10" <?php echo $this->_tpl_vars['item']['hour10']; ?>
>10</option>
<option value="11" <?php echo $this->_tpl_vars['item']['hour11']; ?>
>11</option>
<option value="12" <?php echo $this->_tpl_vars['item']['hour12']; ?>
>12</option>
<option value="13" <?php echo $this->_tpl_vars['item']['hour13']; ?>
>13</option>
<option value="14" <?php echo $this->_tpl_vars['item']['hour14']; ?>
>14</option>
<option value="15" <?php echo $this->_tpl_vars['item']['hour15']; ?>
>15</option>
<option value="16" <?php echo $this->_tpl_vars['item']['hour16']; ?>
>16</option>
<option value="17" <?php echo $this->_tpl_vars['item']['hour17']; ?>
>17</option>
<option value="18" <?php echo $this->_tpl_vars['item']['hour18']; ?>
>18</option>
<option value="19" <?php echo $this->_tpl_vars['item']['hour19']; ?>
>19</option>
<option value="20" <?php echo $this->_tpl_vars['item']['hour20']; ?>
>20</option>
<option value="21" <?php echo $this->_tpl_vars['item']['hour21']; ?>
>21</option>
<option value="22" <?php echo $this->_tpl_vars['item']['hour22']; ?>
>22</option>
<option value="23" <?php echo $this->_tpl_vars['item']['hour23']; ?>
>23</option>
</select> 時&nbsp;
<select id="<?php echo $this->_tpl_vars['item']['name']; ?>
_min" name="<?php echo $this->_tpl_vars['item']['name']; ?>
_min"<?php if ($this->_tpl_vars['item']['disable']): ?> disabled="disabled"<?php endif; ?>>
<option value=""></option>
<option value="00" <?php echo $this->_tpl_vars['item']['min00']; ?>
>00</option>
<option value="01" <?php echo $this->_tpl_vars['item']['min01']; ?>
>01</option>
<option value="02" <?php echo $this->_tpl_vars['item']['min02']; ?>
>02</option>
<option value="03" <?php echo $this->_tpl_vars['item']['min03']; ?>
>03</option>
<option value="04" <?php echo $this->_tpl_vars['item']['min04']; ?>
>04</option>
<option value="05" <?php echo $this->_tpl_vars['item']['min05']; ?>
>05</option>
<option value="06" <?php echo $this->_tpl_vars['item']['min06']; ?>
>06</option>
<option value="07" <?php echo $this->_tpl_vars['item']['min07']; ?>
>07</option>
<option value="08" <?php echo $this->_tpl_vars['item']['min08']; ?>
>08</option>
<option value="09" <?php echo $this->_tpl_vars['item']['min09']; ?>
>09</option>
<option value="10" <?php echo $this->_tpl_vars['item']['min10']; ?>
>10</option>
<option value="11" <?php echo $this->_tpl_vars['item']['min11']; ?>
>11</option>
<option value="12" <?php echo $this->_tpl_vars['item']['min12']; ?>
>12</option>
<option value="13" <?php echo $this->_tpl_vars['item']['min13']; ?>
>13</option>
<option value="14" <?php echo $this->_tpl_vars['item']['min14']; ?>
>14</option>
<option value="15" <?php echo $this->_tpl_vars['item']['min15']; ?>
>15</option>
<option value="16" <?php echo $this->_tpl_vars['item']['min16']; ?>
>16</option>
<option value="17" <?php echo $this->_tpl_vars['item']['min17']; ?>
>17</option>
<option value="18" <?php echo $this->_tpl_vars['item']['min18']; ?>
>18</option>
<option value="19" <?php echo $this->_tpl_vars['item']['min19']; ?>
>19</option>
<option value="20" <?php echo $this->_tpl_vars['item']['min20']; ?>
>20</option>
<option value="21" <?php echo $this->_tpl_vars['item']['min21']; ?>
>21</option>
<option value="22" <?php echo $this->_tpl_vars['item']['min22']; ?>
>22</option>
<option value="23" <?php echo $this->_tpl_vars['item']['min23']; ?>
>23</option>
<option value="24" <?php echo $this->_tpl_vars['item']['min24']; ?>
>24</option>
<option value="25" <?php echo $this->_tpl_vars['item']['min25']; ?>
>25</option>
<option value="26" <?php echo $this->_tpl_vars['item']['min26']; ?>
>26</option>
<option value="27" <?php echo $this->_tpl_vars['item']['min27']; ?>
>27</option>
<option value="28" <?php echo $this->_tpl_vars['item']['min28']; ?>
>28</option>
<option value="29" <?php echo $this->_tpl_vars['item']['min29']; ?>
>29</option>
<option value="30" <?php echo $this->_tpl_vars['item']['min30']; ?>
>30</option>
<option value="31" <?php echo $this->_tpl_vars['item']['min31']; ?>
>31</option>
<option value="32" <?php echo $this->_tpl_vars['item']['min32']; ?>
>32</option>
<option value="33" <?php echo $this->_tpl_vars['item']['min33']; ?>
>33</option>
<option value="34" <?php echo $this->_tpl_vars['item']['min34']; ?>
>34</option>
<option value="35" <?php echo $this->_tpl_vars['item']['min35']; ?>
>35</option>
<option value="36" <?php echo $this->_tpl_vars['item']['min36']; ?>
>36</option>
<option value="37" <?php echo $this->_tpl_vars['item']['min37']; ?>
>37</option>
<option value="38" <?php echo $this->_tpl_vars['item']['min38']; ?>
>38</option>
<option value="39" <?php echo $this->_tpl_vars['item']['min39']; ?>
>39</option>
<option value="40" <?php echo $this->_tpl_vars['item']['min40']; ?>
>40</option>
<option value="41" <?php echo $this->_tpl_vars['item']['min41']; ?>
>41</option>
<option value="42" <?php echo $this->_tpl_vars['item']['min42']; ?>
>42</option>
<option value="43" <?php echo $this->_tpl_vars['item']['min43']; ?>
>43</option>
<option value="44" <?php echo $this->_tpl_vars['item']['min44']; ?>
>44</option>
<option value="45" <?php echo $this->_tpl_vars['item']['min45']; ?>
>45</option>
<option value="46" <?php echo $this->_tpl_vars['item']['min46']; ?>
>46</option>
<option value="47" <?php echo $this->_tpl_vars['item']['min47']; ?>
>47</option>
<option value="48" <?php echo $this->_tpl_vars['item']['min48']; ?>
>48</option>
<option value="49" <?php echo $this->_tpl_vars['item']['min49']; ?>
>49</option>
<option value="50" <?php echo $this->_tpl_vars['item']['min50']; ?>
>50</option>
<option value="51" <?php echo $this->_tpl_vars['item']['min51']; ?>
>51</option>
<option value="52" <?php echo $this->_tpl_vars['item']['min52']; ?>
>52</option>
<option value="53" <?php echo $this->_tpl_vars['item']['min53']; ?>
>53</option>
<option value="54" <?php echo $this->_tpl_vars['item']['min54']; ?>
>54</option>
<option value="55" <?php echo $this->_tpl_vars['item']['min55']; ?>
>55</option>
<option value="56" <?php echo $this->_tpl_vars['item']['min56']; ?>
>56</option>
<option value="57" <?php echo $this->_tpl_vars['item']['min57']; ?>
>57</option>
<option value="58" <?php echo $this->_tpl_vars['item']['min58']; ?>
>58</option>
<option value="59" <?php echo $this->_tpl_vars['item']['min59']; ?>
>59</option>
</select> 分&nbsp;
<?php endif; ?>
<?php if ($this->_tpl_vars['item']['datetime']): ?>
<input type="text" id="<?php echo $this->_tpl_vars['item']['name']; ?>
_year" name="<?php echo $this->_tpl_vars['item']['name']; ?>
_year" value="<?php echo $this->_tpl_vars['item']['value']['year']; ?>
" <?php echo $this->_tpl_vars['item']['list']['sel_year']; ?>
<?php if ($this->_tpl_vars['item']['disable']): ?> disabled="disabled"<?php endif; ?>>&nbsp;
<input type="text" id="<?php echo $this->_tpl_vars['item']['name']; ?>
_month" name="<?php echo $this->_tpl_vars['item']['name']; ?>
_month" value="<?php echo $this->_tpl_vars['item']['value']['month']; ?>
" <?php echo $this->_tpl_vars['item']['list']['sel_year']; ?>
<?php if ($this->_tpl_vars['item']['disable']): ?> disabled="disabled"<?php endif; ?>>&nbsp;
<input type="text" id="<?php echo $this->_tpl_vars['item']['name']; ?>
_day" name="<?php echo $this->_tpl_vars['item']['name']; ?>
_day" value="<?php echo $this->_tpl_vars['item']['value']['day']; ?>
" <?php echo $this->_tpl_vars['item']['list']['sel_year']; ?>
<?php if ($this->_tpl_vars['item']['disable']): ?> disabled="disabled"<?php endif; ?>>&nbsp;
<input type="text" id="<?php echo $this->_tpl_vars['item']['name']; ?>
_hour" name="<?php echo $this->_tpl_vars['item']['name']; ?>
_hour" value="<?php echo $this->_tpl_vars['item']['value']['hour']; ?>
" <?php echo $this->_tpl_vars['item']['list']['sel_hour']; ?>
<?php if ($this->_tpl_vars['item']['disable']): ?> disabled="disabled"<?php endif; ?>>&nbsp;
<input type="text" id="<?php echo $this->_tpl_vars['item']['name']; ?>
_min" name="<?php echo $this->_tpl_vars['item']['name']; ?>
_min" value="<?php echo $this->_tpl_vars['item']['value']['min']; ?>
" <?php echo $this->_tpl_vars['item']['list']['sel_min']; ?>
<?php if ($this->_tpl_vars['item']['disable']): ?> disabled="disabled"<?php endif; ?>>&nbsp;
<?php endif; ?>
<?php if ($this->_tpl_vars['item']['datetime_sel']): ?>
<select id="<?php echo $this->_tpl_vars['item']['name']; ?>
_year" name="<?php echo $this->_tpl_vars['item']['name']; ?>
_year"<?php if ($this->_tpl_vars['item']['disable']): ?> disabled="disabled"<?php endif; ?>>
<option value=""></option>
<?php $_from = $this->_tpl_vars['item']['years']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item2']):
?>
<option value="<?php echo $this->_tpl_vars['item2']['value']; ?>
" <?php echo $this->_tpl_vars['item2']['sel']; ?>
><?php echo $this->_tpl_vars['item2']['value']; ?>
</option>
<?php endforeach; endif; unset($_from); ?>
</select> 年&nbsp;
<select id="<?php echo $this->_tpl_vars['item']['name']; ?>
_month" name="<?php echo $this->_tpl_vars['item']['name']; ?>
_month"<?php if ($this->_tpl_vars['item']['disable']): ?> disabled="disabled"<?php endif; ?>>
<option value=""></option>
<option value="01" <?php echo $this->_tpl_vars['item']['month01']; ?>
>1</option>
<option value="02" <?php echo $this->_tpl_vars['item']['month02']; ?>
>2</option>
<option value="03" <?php echo $this->_tpl_vars['item']['month03']; ?>
>3</option>
<option value="04" <?php echo $this->_tpl_vars['item']['month04']; ?>
>4</option>
<option value="05" <?php echo $this->_tpl_vars['item']['month05']; ?>
>5</option>
<option value="06" <?php echo $this->_tpl_vars['item']['month06']; ?>
>6</option>
<option value="07" <?php echo $this->_tpl_vars['item']['month07']; ?>
>7</option>
<option value="08" <?php echo $this->_tpl_vars['item']['month08']; ?>
>8</option>
<option value="09" <?php echo $this->_tpl_vars['item']['month09']; ?>
>9</option>
<option value="10" <?php echo $this->_tpl_vars['item']['month10']; ?>
>10</option>
<option value="11" <?php echo $this->_tpl_vars['item']['month11']; ?>
>11</option>
<option value="12" <?php echo $this->_tpl_vars['item']['month12']; ?>
>12</option>
</select> 月&nbsp;
<select id="<?php echo $this->_tpl_vars['item']['name']; ?>
_day" name="<?php echo $this->_tpl_vars['item']['name']; ?>
_day"<?php if ($this->_tpl_vars['item']['disable']): ?> disabled="disabled"<?php endif; ?>>
<option value=""></option>
<option value="01" <?php echo $this->_tpl_vars['item']['day01']; ?>
>1</option>
<option value="02" <?php echo $this->_tpl_vars['item']['day02']; ?>
>2</option>
<option value="03" <?php echo $this->_tpl_vars['item']['day03']; ?>
>3</option>
<option value="04" <?php echo $this->_tpl_vars['item']['day04']; ?>
>4</option>
<option value="05" <?php echo $this->_tpl_vars['item']['day05']; ?>
>5</option>
<option value="06" <?php echo $this->_tpl_vars['item']['day06']; ?>
>6</option>
<option value="07" <?php echo $this->_tpl_vars['item']['day07']; ?>
>7</option>
<option value="08" <?php echo $this->_tpl_vars['item']['day08']; ?>
>8</option>
<option value="09" <?php echo $this->_tpl_vars['item']['day09']; ?>
>9</option>
<option value="10" <?php echo $this->_tpl_vars['item']['day10']; ?>
>10</option>
<option value="11" <?php echo $this->_tpl_vars['item']['day11']; ?>
>11</option>
<option value="12" <?php echo $this->_tpl_vars['item']['day12']; ?>
>12</option>
<option value="13" <?php echo $this->_tpl_vars['item']['day13']; ?>
>13</option>
<option value="14" <?php echo $this->_tpl_vars['item']['day14']; ?>
>14</option>
<option value="15" <?php echo $this->_tpl_vars['item']['day15']; ?>
>15</option>
<option value="16" <?php echo $this->_tpl_vars['item']['day16']; ?>
>16</option>
<option value="17" <?php echo $this->_tpl_vars['item']['day17']; ?>
>17</option>
<option value="18" <?php echo $this->_tpl_vars['item']['day18']; ?>
>18</option>
<option value="19" <?php echo $this->_tpl_vars['item']['day19']; ?>
>19</option>
<option value="20" <?php echo $this->_tpl_vars['item']['day20']; ?>
>20</option>
<option value="21" <?php echo $this->_tpl_vars['item']['day21']; ?>
>21</option>
<option value="22" <?php echo $this->_tpl_vars['item']['day22']; ?>
>22</option>
<option value="23" <?php echo $this->_tpl_vars['item']['day23']; ?>
>23</option>
<option value="24" <?php echo $this->_tpl_vars['item']['day24']; ?>
>24</option>
<option value="25" <?php echo $this->_tpl_vars['item']['day25']; ?>
>25</option>
<option value="26" <?php echo $this->_tpl_vars['item']['day26']; ?>
>26</option>
<option value="27" <?php echo $this->_tpl_vars['item']['day27']; ?>
>27</option>
<option value="28" <?php echo $this->_tpl_vars['item']['day28']; ?>
>28</option>
<option value="29" <?php echo $this->_tpl_vars['item']['day29']; ?>
>29</option>
<option value="30" <?php echo $this->_tpl_vars['item']['day30']; ?>
>30</option>
<option value="31" <?php echo $this->_tpl_vars['item']['day31']; ?>
>31</option>
</select> 日
<select id="<?php echo $this->_tpl_vars['item']['name']; ?>
_hour" name="<?php echo $this->_tpl_vars['item']['name']; ?>
_hour"<?php if ($this->_tpl_vars['item']['disable']): ?> disabled="disabled"<?php endif; ?>>
<option value=""></option>
<option value="00" <?php echo $this->_tpl_vars['item']['hour00']; ?>
>00</option>
<option value="01" <?php echo $this->_tpl_vars['item']['hour01']; ?>
>01</option>
<option value="02" <?php echo $this->_tpl_vars['item']['hour02']; ?>
>02</option>
<option value="03" <?php echo $this->_tpl_vars['item']['hour03']; ?>
>03</option>
<option value="04" <?php echo $this->_tpl_vars['item']['hour04']; ?>
>04</option>
<option value="05" <?php echo $this->_tpl_vars['item']['hour05']; ?>
>05</option>
<option value="06" <?php echo $this->_tpl_vars['item']['hour06']; ?>
>06</option>
<option value="07" <?php echo $this->_tpl_vars['item']['hour07']; ?>
>07</option>
<option value="08" <?php echo $this->_tpl_vars['item']['hour08']; ?>
>08</option>
<option value="09" <?php echo $this->_tpl_vars['item']['hour09']; ?>
>09</option>
<option value="10" <?php echo $this->_tpl_vars['item']['hour10']; ?>
>10</option>
<option value="11" <?php echo $this->_tpl_vars['item']['hour11']; ?>
>11</option>
<option value="12" <?php echo $this->_tpl_vars['item']['hour12']; ?>
>12</option>
<option value="13" <?php echo $this->_tpl_vars['item']['hour13']; ?>
>13</option>
<option value="14" <?php echo $this->_tpl_vars['item']['hour14']; ?>
>14</option>
<option value="15" <?php echo $this->_tpl_vars['item']['hour15']; ?>
>15</option>
<option value="16" <?php echo $this->_tpl_vars['item']['hour16']; ?>
>16</option>
<option value="17" <?php echo $this->_tpl_vars['item']['hour17']; ?>
>17</option>
<option value="18" <?php echo $this->_tpl_vars['item']['hour18']; ?>
>18</option>
<option value="19" <?php echo $this->_tpl_vars['item']['hour19']; ?>
>19</option>
<option value="20" <?php echo $this->_tpl_vars['item']['hour20']; ?>
>20</option>
<option value="21" <?php echo $this->_tpl_vars['item']['hour21']; ?>
>21</option>
<option value="22" <?php echo $this->_tpl_vars['item']['hour22']; ?>
>22</option>
<option value="23" <?php echo $this->_tpl_vars['item']['hour23']; ?>
>23</option>
</select> 時&nbsp;
<select id="<?php echo $this->_tpl_vars['item']['name']; ?>
_min" name="<?php echo $this->_tpl_vars['item']['name']; ?>
_min"<?php if ($this->_tpl_vars['item']['disable']): ?> disabled="disabled"<?php endif; ?>>
<option value=""></option>
<option value="00" <?php echo $this->_tpl_vars['item']['min00']; ?>
>00</option>
<option value="01" <?php echo $this->_tpl_vars['item']['min01']; ?>
>01</option>
<option value="02" <?php echo $this->_tpl_vars['item']['min02']; ?>
>02</option>
<option value="03" <?php echo $this->_tpl_vars['item']['min03']; ?>
>03</option>
<option value="04" <?php echo $this->_tpl_vars['item']['min04']; ?>
>04</option>
<option value="05" <?php echo $this->_tpl_vars['item']['min05']; ?>
>05</option>
<option value="06" <?php echo $this->_tpl_vars['item']['min06']; ?>
>06</option>
<option value="07" <?php echo $this->_tpl_vars['item']['min07']; ?>
>07</option>
<option value="08" <?php echo $this->_tpl_vars['item']['min08']; ?>
>08</option>
<option value="09" <?php echo $this->_tpl_vars['item']['min09']; ?>
>09</option>
<option value="10" <?php echo $this->_tpl_vars['item']['min10']; ?>
>10</option>
<option value="11" <?php echo $this->_tpl_vars['item']['min11']; ?>
>11</option>
<option value="12" <?php echo $this->_tpl_vars['item']['min12']; ?>
>12</option>
<option value="13" <?php echo $this->_tpl_vars['item']['min13']; ?>
>13</option>
<option value="14" <?php echo $this->_tpl_vars['item']['min14']; ?>
>14</option>
<option value="15" <?php echo $this->_tpl_vars['item']['min15']; ?>
>15</option>
<option value="16" <?php echo $this->_tpl_vars['item']['min16']; ?>
>16</option>
<option value="17" <?php echo $this->_tpl_vars['item']['min17']; ?>
>17</option>
<option value="18" <?php echo $this->_tpl_vars['item']['min18']; ?>
>18</option>
<option value="19" <?php echo $this->_tpl_vars['item']['min19']; ?>
>19</option>
<option value="20" <?php echo $this->_tpl_vars['item']['min20']; ?>
>20</option>
<option value="21" <?php echo $this->_tpl_vars['item']['min21']; ?>
>21</option>
<option value="22" <?php echo $this->_tpl_vars['item']['min22']; ?>
>22</option>
<option value="23" <?php echo $this->_tpl_vars['item']['min23']; ?>
>23</option>
<option value="24" <?php echo $this->_tpl_vars['item']['min24']; ?>
>24</option>
<option value="25" <?php echo $this->_tpl_vars['item']['min25']; ?>
>25</option>
<option value="26" <?php echo $this->_tpl_vars['item']['min26']; ?>
>26</option>
<option value="27" <?php echo $this->_tpl_vars['item']['min27']; ?>
>27</option>
<option value="28" <?php echo $this->_tpl_vars['item']['min28']; ?>
>28</option>
<option value="29" <?php echo $this->_tpl_vars['item']['min29']; ?>
>29</option>
<option value="30" <?php echo $this->_tpl_vars['item']['min30']; ?>
>30</option>
<option value="31" <?php echo $this->_tpl_vars['item']['min31']; ?>
>31</option>
<option value="32" <?php echo $this->_tpl_vars['item']['min32']; ?>
>32</option>
<option value="33" <?php echo $this->_tpl_vars['item']['min33']; ?>
>33</option>
<option value="34" <?php echo $this->_tpl_vars['item']['min34']; ?>
>34</option>
<option value="35" <?php echo $this->_tpl_vars['item']['min35']; ?>
>35</option>
<option value="36" <?php echo $this->_tpl_vars['item']['min36']; ?>
>36</option>
<option value="37" <?php echo $this->_tpl_vars['item']['min37']; ?>
>37</option>
<option value="38" <?php echo $this->_tpl_vars['item']['min38']; ?>
>38</option>
<option value="39" <?php echo $this->_tpl_vars['item']['min39']; ?>
>39</option>
<option value="40" <?php echo $this->_tpl_vars['item']['min40']; ?>
>40</option>
<option value="41" <?php echo $this->_tpl_vars['item']['min41']; ?>
>41</option>
<option value="42" <?php echo $this->_tpl_vars['item']['min42']; ?>
>42</option>
<option value="43" <?php echo $this->_tpl_vars['item']['min43']; ?>
>43</option>
<option value="44" <?php echo $this->_tpl_vars['item']['min44']; ?>
>44</option>
<option value="45" <?php echo $this->_tpl_vars['item']['min45']; ?>
>45</option>
<option value="46" <?php echo $this->_tpl_vars['item']['min46']; ?>
>46</option>
<option value="47" <?php echo $this->_tpl_vars['item']['min47']; ?>
>47</option>
<option value="48" <?php echo $this->_tpl_vars['item']['min48']; ?>
>48</option>
<option value="49" <?php echo $this->_tpl_vars['item']['min49']; ?>
>49</option>
<option value="50" <?php echo $this->_tpl_vars['item']['min50']; ?>
>50</option>
<option value="51" <?php echo $this->_tpl_vars['item']['min51']; ?>
>51</option>
<option value="52" <?php echo $this->_tpl_vars['item']['min52']; ?>
>52</option>
<option value="53" <?php echo $this->_tpl_vars['item']['min53']; ?>
>53</option>
<option value="54" <?php echo $this->_tpl_vars['item']['min54']; ?>
>54</option>
<option value="55" <?php echo $this->_tpl_vars['item']['min55']; ?>
>55</option>
<option value="56" <?php echo $this->_tpl_vars['item']['min56']; ?>
>56</option>
<option value="57" <?php echo $this->_tpl_vars['item']['min57']; ?>
>57</option>
<option value="58" <?php echo $this->_tpl_vars['item']['min58']; ?>
>58</option>
<option value="59" <?php echo $this->_tpl_vars['item']['min59']; ?>
>59</option>
</select> 分&nbsp;
<?php endif; ?>
<?php if ($this->_tpl_vars['item']['gmap']): ?>
<style type="text/css">
#<?php echo $this->_tpl_vars['item']['name']; ?>

<?php echo '
{
	border: solid 1px #666666;
	width: 365px;
	height: 250px;
}
'; ?>

</style>
<div id="<?php echo $this->_tpl_vars['item']['name']; ?>
"></div>
<input type="text" id="<?php echo $this->_tpl_vars['item']['name']; ?>
_lat" name="<?php echo $this->_tpl_vars['item']['name']; ?>
_lat" value="<?php echo $this->_tpl_vars['item']['value']/$this->_tpl_vars['at']; ?>
">
<input type="text" id="<?php echo $this->_tpl_vars['item']['name']; ?>
_lon" name="<?php echo $this->_tpl_vars['item']['name']; ?>
_lon" value="<?php echo $this->_tpl_vars['item']['value']/$this->_tpl_vars['on']; ?>
">
<input type="text" id="<?php echo $this->_tpl_vars['item']['name']; ?>
_zoom" name="<?php echo $this->_tpl_vars['item']['name']; ?>
_zoom" value="<?php echo $this->_tpl_vars['item']['value']/$this->_tpl_vars['oom']; ?>
">
<input type="button" id="<?php echo $this->_tpl_vars['item']['name']; ?>
_btn" name="<?php echo $this->_tpl_vars['item']['name']; ?>
_btn" value="設定">
<?php endif; ?>

<?php if ($this->_tpl_vars['item']['message']): ?>
<div class="error"><?php echo $this->_tpl_vars['item']['message']; ?>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['item']['buttons']): ?>
<div class="buttons">
<?php $_from = $this->_tpl_vars['item']['buttons']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item2']):
?>
<input type="button" name="<?php echo $this->_tpl_vars['item2']['name']; ?>
" id="<?php echo $this->_tpl_vars['item2']['name']; ?>
" value="<?php echo $this->_tpl_vars['item2']['title']; ?>
">&nbsp;&nbsp;
<?php endforeach; endif; unset($_from); ?>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['item']['info']): ?>
<div class="comment" id="<?php echo $this->_tpl_vars['item']['name']; ?>
_comment"><?php echo $this->_tpl_vars['item']['info']; ?>
</div>
<?php endif; ?>

</td>
 <?php endif; ?>
</tr>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<tr>
<th width="20%">&nbsp;</th>
<td>
<?php if (! $this->_tpl_vars['nosave']): ?>
<input type="submit" value=" 保存 ">
<?php endif; ?>
<?php $_from = $this->_tpl_vars['buttons']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<?php if ($this->_tpl_vars['item']['act']): ?>
&nbsp;<input type="button" value="<?php echo $this->_tpl_vars['item']['name']; ?>
" onClick="window.location='<?php echo $this->_tpl_vars['item']['act']; ?>
<?php echo $this->_tpl_vars['id']; ?>
'">
<?php endif; ?>
<?php if ($this->_tpl_vars['item']['onclick']): ?>
&nbsp;<input type="button" value="<?php echo $this->_tpl_vars['item']['name']; ?>
" onClick="<?php echo $this->_tpl_vars['item']['onclick']; ?>
">
<?php endif; ?>
<?php if ($this->_tpl_vars['item']['info']): ?>
<span class="error"><?php echo $this->_tpl_vars['item']['info']; ?>
</div>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
</td>
</tr>
</table>

</form>

<?php if ($this->_tpl_vars['item_form']): ?>
<?php if (! $this->_tpl_vars['item_form']['nonew']): ?>
<a href="?act=<?php echo $this->_tpl_vars['item_form']['name']; ?>
_new"><?php echo $this->_tpl_vars['item_form']['title']; ?>
新規追加</a>
<?php endif; ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['item_list']): ?>
<br/>
<table width="100%" border="0" cellpadding="0" cellspacing="1">
<tr>
<?php $_from = $this->_tpl_vars['title']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<th width="20%"><?php echo $this->_tpl_vars['item']['title']; ?>
</th>
<?php endforeach; endif; unset($_from); ?>
<th width="20%">&nbsp;</th>
</tr>
<?php $_from = $this->_tpl_vars['item_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<tr>
<?php $_from = $this->_tpl_vars['item']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item2']):
?>
<td><?php echo $this->_tpl_vars['item2']; ?>
</td>
<?php endforeach; endif; unset($_from); ?>
<td>
<?php if ($this->_tpl_vars['item_form']['preview']): ?>
<a href="<?php echo $this->_tpl_vars['top']; ?>
<?php echo $this->_tpl_vars['item_form']['preview']; ?>
<?php echo $this->_tpl_vars['item']['id']; ?>
" target="_blank">[プレビュー]</a>&nbsp;&nbsp;
<?php endif; ?>
<?php $_from = $this->_tpl_vars['item_buttons']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item2']):
?>
<input type="button" value="<?php echo $this->_tpl_vars['item2']['name']; ?>
" onClick="window.location='<?php echo $this->_tpl_vars['item2']['act']; ?>
<?php echo $this->_tpl_vars['item']['id']; ?>
'">&nbsp;
<?php endforeach; endif; unset($_from); ?>
<input type="button" value="編集" onClick="window.location='?act=<?php echo $this->_tpl_vars['item_form']['name']; ?>
_edit&id=<?php echo $this->_tpl_vars['item']['id']; ?>
'">&nbsp;
<input type="button" value="削除" onClick="delete_conf(<?php echo $this->_tpl_vars['item']['id']; ?>
)">
</td>
</tr>
<?php endforeach; endif; unset($_from); ?>
</table>
<?php endif; ?>

<?php if ($this->_tpl_vars['item_pager']): ?>
<br/>
<?php if ($this->_tpl_vars['item_pager']['prev']): ?>
<a href="javascript:do_page(<?php echo $this->_tpl_vars['item_pager']['prev']['no']; ?>
)"><< 前へ</a> |
<?php else: ?>
<< 前へ |
<?php endif; ?>
<?php $_from = $this->_tpl_vars['item_pager']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item2']):
?>
<?php if ("\$".($this->_tpl_vars['item2']).".link"): ?>
<a href="javascript:do_page(<?php echo $this->_tpl_vars['item2']['no']; ?>
)">[<?php echo $this->_tpl_vars['item2']['name']; ?>
]</a> |
<?php else: ?>
[<?php echo $this->_tpl_vars['item2']['name']; ?>
] |
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<?php if ($this->_tpl_vars['item_pager']['next']): ?>
<a href="javascript:do_page(<?php echo $this->_tpl_vars['item_pager']['next']['no']; ?>
)">次へ >></a>
<?php else: ?>
次へ >>
<?php endif; ?>
<?php endif; ?>


<!--中身-->
</div>
</div>
<div class="btm clearfix"></div>
</div><!--main-->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

</div>
<?php if ($this->_tpl_vars['script']): ?>
<?php $_from = $this->_tpl_vars['script']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['item']; ?>
" charset="utf-8"></script>
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>
<script type="text/javascript">
<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<?php if ($this->_tpl_vars['item']['hide']): ?>do_hide('<?php echo $this->_tpl_vars['item']['hide']; ?>
','btn_<?php echo $this->_tpl_vars['item']['name']; ?>
');<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
</script>
</body>
</html>