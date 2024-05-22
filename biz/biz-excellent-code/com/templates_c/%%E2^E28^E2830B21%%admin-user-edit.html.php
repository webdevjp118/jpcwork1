<?php /* Smarty version 2.6.22, created on 2018-05-15 13:47:46
         compiled from admin-user-edit.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'admin-user-edit.html', 92, false),)), $this); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>会員管理 | 管理画面</title>
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

<h1>会員管理</h1>

<ol class="breadcrumb">
<li class="active"><i class="fa fa-dashboard"></i> Home</li>
<li><a href="">会員管理</a></li>
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


<form name="form1" action="admin-user-edit.html" method="post">
<input type="hidden" name="mode" value="form">
<input type="hidden" name="user_id" value="<?php echo $this->_tpl_vars['form']['user_id']; ?>
">

<table id="table_summary" class="table table-bordered table_edit" summary="表">
<tbody>
<?php if ($this->_tpl_vars['user']): ?>
<tr>
<th>会員No.</th>
<td>No.<?php echo $this->_tpl_vars['user']['user_id']; ?>
</td>
</tr>
<tr>
<th>登録日</th>
<td><?php echo ((is_array($_tmp=$this->_tpl_vars['user']['reg_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y/%m/%d %H:%M:%S") : smarty_modifier_date_format($_tmp, "%Y/%m/%d %H:%M:%S")); ?>
</td>
</tr>
<tr>
<th>応募件数</th>
<td><a href="admin-entry.html&name=<?php echo $this->_tpl_vars['user']['user_id']; ?>
"><?php echo $this->_tpl_vars['user']['count']; ?>
&nbsp;件</a></td>
</tr>
<tr>
<th>直近応募ステータス</th>
<td>
<?php if ($this->_tpl_vars['user']['oubo']): ?>
<?php echo $this->_tpl_vars['user']['oubo']['status']; ?>
<br />
<a href="admin-entry-detail.html&id=<?php echo $this->_tpl_vars['user']['oubo']['seq']; ?>
">⇒直近の応募を見る</a>
<?php endif; ?>
</td>
</tr>
<?php endif; ?>
<tr>
<th>会員名<span>必須</span></th>
<td><input class="input_w10 form-control" type="text" name="name" value="<?php echo $this->_tpl_vars['form']['name']; ?>
">
<!--<p class="no_01">会員No.123456</p></td>-->
<?php if ($this->_tpl_vars['msg']['name']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['name']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>
<tr>
<th>会員名ふりがな</th>
<td><input class="input_w10 form-control" type="text" name="name_kana" value="<?php echo $this->_tpl_vars['form']['name_kana']; ?>
">
<!--<p class="no_01">会員No.123456</p></td>-->
<?php if ($this->_tpl_vars['msg']['name_kana']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['name_kana']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>
<tr>
<th>住所&nbsp;郵便番号</th>
<td><input class="input_zip form-control" type="text" name="zip1" value="<?php echo $this->_tpl_vars['form']['zip1']; ?>
" />&nbsp;-&nbsp;
<input class="input_zip form-control" type="text" name="zip2" value="<?php echo $this->_tpl_vars['form']['zip2']; ?>
" />
<?php if ($this->_tpl_vars['msg']['zip1']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['zip1']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>
<tr>
<th>住所&nbsp;都道府県</th>
<td>
<select name="pref" class="input_select form-control">
<option value="">都道府県を選択して下さい</option>
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
<?php if ($this->_tpl_vars['msg']['pref']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['pref']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>
<tr>
<th>住所&nbsp;市区町村</th>
<td><input class="input_w10 form-control" type="text" name="city" value="<?php echo $this->_tpl_vars['form']['city']; ?>
"/>
<?php if ($this->_tpl_vars['msg']['city']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['city']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>
<tr>
<th>住所&nbsp;番地まで</th>
<td><input class="input_w10 form-control" type="text" name="address1" value="<?php echo $this->_tpl_vars['form']['address1']; ?>
"/>
<?php if ($this->_tpl_vars['msg']['address1']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['address1']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>
<tr>
<th>住所&nbsp;建物名・階数</th>
<td><input class="input_w10 form-control" type="text" name="address2" value="<?php echo $this->_tpl_vars['form']['address2']; ?>
"/>
<?php if ($this->_tpl_vars['msg']['address2']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['address2']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>
<tr>
<th>生年月日</th>
<td>

<select name="birthday_year" class="input_birthday_year form-control">
<option value="">----</option>
<option value="1940" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1940): ?>selected="selected"<?php endif; ?>>1940</option>
<option value="1941" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1941): ?>selected="selected"<?php endif; ?>>1941</option>
<option value="1942" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1942): ?>selected="selected"<?php endif; ?>>1942</option>
<option value="1943" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1943): ?>selected="selected"<?php endif; ?>>1943</option>
<option value="1944" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1944): ?>selected="selected"<?php endif; ?>>1944</option>
<option value="1945" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1945): ?>selected="selected"<?php endif; ?>>1945</option>
<option value="1946" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1946): ?>selected="selected"<?php endif; ?>>1946</option>
<option value="1947" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1947): ?>selected="selected"<?php endif; ?>>1947</option>
<option value="1948" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1948): ?>selected="selected"<?php endif; ?>>1948</option>
<option value="1949" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1949): ?>selected="selected"<?php endif; ?>>1949</option>
<option value="1950" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1950): ?>selected="selected"<?php endif; ?>>1950</option>
<option value="1951" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1951): ?>selected="selected"<?php endif; ?>>1951</option>
<option value="1952" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1952): ?>selected="selected"<?php endif; ?>>1952</option>
<option value="1953" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1953): ?>selected="selected"<?php endif; ?>>1953</option>
<option value="1954" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1954): ?>selected="selected"<?php endif; ?>>1954</option>
<option value="1955" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1955): ?>selected="selected"<?php endif; ?>>1955</option>
<option value="1956" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1956): ?>selected="selected"<?php endif; ?>>1956</option>
<option value="1957" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1957): ?>selected="selected"<?php endif; ?>>1957</option>
<option value="1958" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1958): ?>selected="selected"<?php endif; ?>>1958</option>
<option value="1959" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1959): ?>selected="selected"<?php endif; ?>>1959</option>
<option value="1960" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1960): ?>selected="selected"<?php endif; ?>>1960</option>
<option value="1961" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1961): ?>selected="selected"<?php endif; ?>>1961</option>
<option value="1962" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1962): ?>selected="selected"<?php endif; ?>>1962</option>
<option value="1963" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1963): ?>selected="selected"<?php endif; ?>>1963</option>
<option value="1964" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1964): ?>selected="selected"<?php endif; ?>>1964</option>
<option value="1965" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1965): ?>selected="selected"<?php endif; ?>>1965</option>
<option value="1966" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1966): ?>selected="selected"<?php endif; ?>>1966</option>
<option value="1967" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1967): ?>selected="selected"<?php endif; ?>>1967</option>
<option value="1968" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1968): ?>selected="selected"<?php endif; ?>>1968</option>
<option value="1969" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1969): ?>selected="selected"<?php endif; ?>>1969</option>
<option value="1970" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1970): ?>selected="selected"<?php endif; ?>>1970</option>
<option value="1971" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1971): ?>selected="selected"<?php endif; ?>>1971</option>
<option value="1972" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1972): ?>selected="selected"<?php endif; ?>>1972</option>
<option value="1973" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1973): ?>selected="selected"<?php endif; ?>>1973</option>
<option value="1974" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1974): ?>selected="selected"<?php endif; ?>>1974</option>
<option value="1975" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1975): ?>selected="selected"<?php endif; ?>>1975</option>
<option value="1976" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1976): ?>selected="selected"<?php endif; ?>>1976</option>
<option value="1977" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1977): ?>selected="selected"<?php endif; ?>>1977</option>
<option value="1978" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1978): ?>selected="selected"<?php endif; ?>>1978</option>
<option value="1979" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1979): ?>selected="selected"<?php endif; ?>>1979</option>
<option value="1980" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1980): ?>selected="selected"<?php endif; ?>>1980</option>
<option value="1981" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1981): ?>selected="selected"<?php endif; ?>>1981</option>
<option value="1982" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1982): ?>selected="selected"<?php endif; ?>>1982</option>
<option value="1983" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1983): ?>selected="selected"<?php endif; ?>>1983</option>
<option value="1984" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1984): ?>selected="selected"<?php endif; ?>>1984</option>
<option value="1985" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1985): ?>selected="selected"<?php endif; ?>>1985</option>
<option value="1986" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1986): ?>selected="selected"<?php endif; ?>>1986</option>
<option value="1987" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1987): ?>selected="selected"<?php endif; ?>>1987</option>
<option value="1988" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1988): ?>selected="selected"<?php endif; ?>>1988</option>
<option value="1989" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1989): ?>selected="selected"<?php endif; ?>>1989</option>
<option value="1990" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1990): ?>selected="selected"<?php endif; ?>>1990</option>
<option value="1991" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1991): ?>selected="selected"<?php endif; ?>>1991</option>
<option value="1992" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1992): ?>selected="selected"<?php endif; ?>>1992</option>
<option value="1993" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1993): ?>selected="selected"<?php endif; ?>>1993</option>
<option value="1994" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1994): ?>selected="selected"<?php endif; ?>>1994</option>
<option value="1995" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1995): ?>selected="selected"<?php endif; ?>>1995</option>
<option value="1996" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1996): ?>selected="selected"<?php endif; ?>>1996</option>
<option value="1997" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1997): ?>selected="selected"<?php endif; ?>>1997</option>
<option value="1998" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1998): ?>selected="selected"<?php endif; ?>>1998</option>
<option value="1999" <?php if ($this->_tpl_vars['form']['birthday_year'] == 1999): ?>selected="selected"<?php endif; ?>>1999</option>
<option value="2000" <?php if ($this->_tpl_vars['form']['birthday_year'] == 2000): ?>selected="selected"<?php endif; ?>>2000</option>
<option value="2001" <?php if ($this->_tpl_vars['form']['birthday_year'] == 2001): ?>selected="selected"<?php endif; ?>>2001</option>
<option value="2002" <?php if ($this->_tpl_vars['form']['birthday_year'] == 2002): ?>selected="selected"<?php endif; ?>>2002</option>
<option value="2003" <?php if ($this->_tpl_vars['form']['birthday_year'] == 2003): ?>selected="selected"<?php endif; ?>>2003</option>
<option value="2004" <?php if ($this->_tpl_vars['form']['birthday_year'] == 2004): ?>selected="selected"<?php endif; ?>>2004</option>
<option value="2005" <?php if ($this->_tpl_vars['form']['birthday_year'] == 2005): ?>selected="selected"<?php endif; ?>>2005</option>
<option value="2006" <?php if ($this->_tpl_vars['form']['birthday_year'] == 2006): ?>selected="selected"<?php endif; ?>>2006</option>
<option value="2007" <?php if ($this->_tpl_vars['form']['birthday_year'] == 2007): ?>selected="selected"<?php endif; ?>>2007</option>
<option value="2008" <?php if ($this->_tpl_vars['form']['birthday_year'] == 2008): ?>selected="selected"<?php endif; ?>>2008</option>
<option value="2009" <?php if ($this->_tpl_vars['form']['birthday_year'] == 2009): ?>selected="selected"<?php endif; ?>>2009</option>
<option value="2010" <?php if ($this->_tpl_vars['form']['birthday_year'] == 2010): ?>selected="selected"<?php endif; ?>>2010</option>
<option value="2011" <?php if ($this->_tpl_vars['form']['birthday_year'] == 2011): ?>selected="selected"<?php endif; ?>>2011</option>
<option value="2012" <?php if ($this->_tpl_vars['form']['birthday_year'] == 2012): ?>selected="selected"<?php endif; ?>>2012</option>
<option value="2013" <?php if ($this->_tpl_vars['form']['birthday_year'] == 2013): ?>selected="selected"<?php endif; ?>>2013</option>
<option value="2014" <?php if ($this->_tpl_vars['form']['birthday_year'] == 2014): ?>selected="selected"<?php endif; ?>>2014</option>
</select>
年
<select name="birthday_month" class="input_birthday_month form-control">
<option value="">--</option>
<option value="1" <?php if ($this->_tpl_vars['form']['birthday_month'] == 1): ?>selected="selected"<?php endif; ?>>1</option>
<option value="2" <?php if ($this->_tpl_vars['form']['birthday_month'] == 2): ?>selected="selected"<?php endif; ?>>2</option>
<option value="3" <?php if ($this->_tpl_vars['form']['birthday_month'] == 3): ?>selected="selected"<?php endif; ?>>3</option>
<option value="4" <?php if ($this->_tpl_vars['form']['birthday_month'] == 4): ?>selected="selected"<?php endif; ?>>4</option>
<option value="5" <?php if ($this->_tpl_vars['form']['birthday_month'] == 5): ?>selected="selected"<?php endif; ?>>5</option>
<option value="6" <?php if ($this->_tpl_vars['form']['birthday_month'] == 6): ?>selected="selected"<?php endif; ?>>6</option>
<option value="7" <?php if ($this->_tpl_vars['form']['birthday_month'] == 7): ?>selected="selected"<?php endif; ?>>7</option>
<option value="8" <?php if ($this->_tpl_vars['form']['birthday_month'] == 8): ?>selected="selected"<?php endif; ?>>8</option>
<option value="9" <?php if ($this->_tpl_vars['form']['birthday_month'] == 9): ?>selected="selected"<?php endif; ?>>9</option>
<option value="10" <?php if ($this->_tpl_vars['form']['birthday_month'] == 10): ?>selected="selected"<?php endif; ?>>10</option>
<option value="11" <?php if ($this->_tpl_vars['form']['birthday_month'] == 11): ?>selected="selected"<?php endif; ?>>11</option>
<option value="12" <?php if ($this->_tpl_vars['form']['birthday_month'] == 12): ?>selected="selected"<?php endif; ?>>12</option>
</select>
月
<select name="birthday_day" class="input_birthday_day form-control">
<option value="">--</option>
<option value="1" <?php if ($this->_tpl_vars['form']['birthday_day'] == 1): ?>selected="selected"<?php endif; ?>>1</option>
<option value="2" <?php if ($this->_tpl_vars['form']['birthday_day'] == 2): ?>selected="selected"<?php endif; ?>>2</option>
<option value="3" <?php if ($this->_tpl_vars['form']['birthday_day'] == 3): ?>selected="selected"<?php endif; ?>>3</option>
<option value="4" <?php if ($this->_tpl_vars['form']['birthday_day'] == 4): ?>selected="selected"<?php endif; ?>>4</option>
<option value="5" <?php if ($this->_tpl_vars['form']['birthday_day'] == 5): ?>selected="selected"<?php endif; ?>>5</option>
<option value="6" <?php if ($this->_tpl_vars['form']['birthday_day'] == 6): ?>selected="selected"<?php endif; ?>>6</option>
<option value="7" <?php if ($this->_tpl_vars['form']['birthday_day'] == 7): ?>selected="selected"<?php endif; ?>>7</option>
<option value="8" <?php if ($this->_tpl_vars['form']['birthday_day'] == 8): ?>selected="selected"<?php endif; ?>>8</option>
<option value="9" <?php if ($this->_tpl_vars['form']['birthday_day'] == 9): ?>selected="selected"<?php endif; ?>>9</option>
<option value="10" <?php if ($this->_tpl_vars['form']['birthday_day'] == 10): ?>selected="selected"<?php endif; ?>>10</option>
<option value="11" <?php if ($this->_tpl_vars['form']['birthday_day'] == 11): ?>selected="selected"<?php endif; ?>>11</option>
<option value="12" <?php if ($this->_tpl_vars['form']['birthday_day'] == 12): ?>selected="selected"<?php endif; ?>>12</option>
<option value="13" <?php if ($this->_tpl_vars['form']['birthday_day'] == 13): ?>selected="selected"<?php endif; ?>>13</option>
<option value="14" <?php if ($this->_tpl_vars['form']['birthday_day'] == 14): ?>selected="selected"<?php endif; ?>>14</option>
<option value="15" <?php if ($this->_tpl_vars['form']['birthday_day'] == 15): ?>selected="selected"<?php endif; ?>>15</option>
<option value="16" <?php if ($this->_tpl_vars['form']['birthday_day'] == 16): ?>selected="selected"<?php endif; ?>>16</option>
<option value="17" <?php if ($this->_tpl_vars['form']['birthday_day'] == 17): ?>selected="selected"<?php endif; ?>>17</option>
<option value="18" <?php if ($this->_tpl_vars['form']['birthday_day'] == 18): ?>selected="selected"<?php endif; ?>>18</option>
<option value="19" <?php if ($this->_tpl_vars['form']['birthday_day'] == 19): ?>selected="selected"<?php endif; ?>>19</option>
<option value="20" <?php if ($this->_tpl_vars['form']['birthday_day'] == 20): ?>selected="selected"<?php endif; ?>>20</option>
<option value="21" <?php if ($this->_tpl_vars['form']['birthday_day'] == 21): ?>selected="selected"<?php endif; ?>>21</option>
<option value="22" <?php if ($this->_tpl_vars['form']['birthday_day'] == 22): ?>selected="selected"<?php endif; ?>>22</option>
<option value="23" <?php if ($this->_tpl_vars['form']['birthday_day'] == 23): ?>selected="selected"<?php endif; ?>>23</option>
<option value="24" <?php if ($this->_tpl_vars['form']['birthday_day'] == 24): ?>selected="selected"<?php endif; ?>>24</option>
<option value="25" <?php if ($this->_tpl_vars['form']['birthday_day'] == 25): ?>selected="selected"<?php endif; ?>>25</option>
<option value="26" <?php if ($this->_tpl_vars['form']['birthday_day'] == 26): ?>selected="selected"<?php endif; ?>>26</option>
<option value="27" <?php if ($this->_tpl_vars['form']['birthday_day'] == 27): ?>selected="selected"<?php endif; ?>>27</option>
<option value="28" <?php if ($this->_tpl_vars['form']['birthday_day'] == 28): ?>selected="selected"<?php endif; ?>>28</option>
<option value="29" <?php if ($this->_tpl_vars['form']['birthday_day'] == 29): ?>selected="selected"<?php endif; ?>>29</option>
<option value="30" <?php if ($this->_tpl_vars['form']['birthday_day'] == 30): ?>selected="selected"<?php endif; ?>>30</option>
<option value="31" <?php if ($this->_tpl_vars['form']['birthday_day'] == 31): ?>selected="selected"<?php endif; ?>>31</option>
</select>
日
<?php if ($this->_tpl_vars['msg']['birthday_year']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['birthday_year']; ?>
</li>
</ul>
</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['msg']['birthday_month']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['birthday_month']; ?>
</li>
</ul>
</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['msg']['birthday_day']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['birthday_day']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>
<tr>
<th>保有資格</th>
<td>
<ul class="check_ul">
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['shikaku']['1']): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="shikaku[]" value="1" <?php if ($this->_tpl_vars['form']['shikaku']['1']): ?>checked="checked"<?php endif; ?> />看護師</label></div></li>
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['shikaku']['1']): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="shikaku[]" value="2" <?php if ($this->_tpl_vars['form']['shikaku']['1']): ?>checked="checked"<?php endif; ?> />准看護師</label></div></li>
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['shikaku']['1']): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="shikaku[]" value="3" <?php if ($this->_tpl_vars['form']['shikaku']['1']): ?>checked="checked"<?php endif; ?> />助産師</label></div></li>
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['shikaku']['1']): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="shikaku[]" value="4" <?php if ($this->_tpl_vars['form']['shikaku']['1']): ?>checked="checked"<?php endif; ?> />保健師</label></div></li>
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['shikaku']['1']): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="shikaku[]" value="5" <?php if ($this->_tpl_vars['form']['shikaku']['1']): ?>checked="checked"<?php endif; ?> />看護学生</label></div></li>
</ul>
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
<th>連絡先</th>
<td>携帯電話&nbsp;<input class="input_w10 form-control" type="text" name="tel" value="<?php echo $this->_tpl_vars['form']['tel']; ?>
"/>
<?php if ($this->_tpl_vars['msg']['tel']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['tel']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>
<tr>
<th>メールアドレス</th>
<td><input class="input_w10 form-control" type="text" name="email" value="<?php echo $this->_tpl_vars['form']['email']; ?>
"/>
<?php if ($this->_tpl_vars['msg']['email']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['email']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>
<!--
<tr>
<th>メールアドレス確認用</th>
<td><input class="input_w10 form-control" type="text" name="email2" value="<?php echo $this->_tpl_vars['form']['email2']; ?>
"/>
<?php if ($this->_tpl_vars['msg']['email2']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['email2']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>
-->
<tr>
<th>パスワード</th>
<td><input class="input_w10 form-control" type="password" name="passwd" value="<?php echo $this->_tpl_vars['form']['passwd']; ?>
"/>
<?php if ($this->_tpl_vars['msg']['passwd']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['passwd']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>
<!--
<tr>
<th>パスワード確認用</th>
<td><input class="input_w10 form-control" type="password" name="passwd2" value="<?php echo $this->_tpl_vars['form']['passwd2']; ?>
"/>
<?php if ($this->_tpl_vars['msg']['passwd2']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['passwd2']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>
-->
<tr>
<th>希望勤務形態</th>
<td>
<select name="keitai" class="input_select form-control">
<option value="">選択して下さい</option>
<option value="1">1</option>
</select>
<?php if ($this->_tpl_vars['msg']['keitai']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['keitai']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>
<tr>
<th>希望入職時期</th>
<td>
<select name="jiki" class="input_select form-control">
<option value="">選択して下さい</option>
<option value="jiki"></option>
</select>
<?php if ($this->_tpl_vars['msg']['jiki']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['jiki']; ?>
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
<th>text01</th>
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
<th>text02</th>
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
<th>text03</th>
<td><input class="input_w10 form-control" type="text" name="text03" value="<?php echo $this->_tpl_vars['form']['text03']; ?>
"/>
<?php if ($this->_tpl_vars['msg']['text03']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['text03']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>
<tr>
<th>text04</th>
<td><input class="input_w10 form-control" type="text" name="text04" value="<?php echo $this->_tpl_vars['form']['text04']; ?>
"/>
<?php if ($this->_tpl_vars['msg']['text04']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['text04']; ?>
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
<th>check01</th>
<td>
<ul class="check_ul">
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['check01']['1']): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="check01[]" value="1" <?php if ($this->_tpl_vars['form']['check01']['1']): ?>checked="checked"<?php endif; ?> />値1</label></div></li>
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['check01']['2']): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="check01[]" value="2" <?php if ($this->_tpl_vars['form']['check01']['2']): ?>checked="checked"<?php endif; ?> />値2</label></div></li>
<li><div class="btn-group btn_checkbox" data-toggle="buttons"><label class="btn btn-primary<?php if ($this->_tpl_vars['form']['check01']['3']): ?> active<?php endif; ?>"><input type="checkbox" autocomplete="off" name="check01[]" value="3" <?php if ($this->_tpl_vars['form']['check01']['3']): ?>checked="checked"<?php endif; ?> />値3</label></div></li>
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
</tr>-->
<tr>
<th>備考・メモ</th>
<td><textarea class="textarea_w10 form-control" name="biko"><?php echo $this->_tpl_vars['form']['biko']; ?>
</textarea></td>
<?php if ($this->_tpl_vars['msg']['biko']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['biko']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</tr>

<!--
<tr>
<th>利用規約</th>
<td><ul class="">
<li><label><input type="radio" name="confirm" value="1" <?php if ($this->_tpl_vars['form']['confirm'] == 1): ?>checked="checked"<?php endif; ?> />&nbsp;同意する</label></li>
<li><label><input type="radio" name="confirm" value="2" <?php if ($this->_tpl_vars['form']['confirm'] == 2): ?>checked="checked"<?php endif; ?> />&nbsp;同意しない</label></li>
</ul>
<?php if ($this->_tpl_vars['msg']['confirm']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['confirm']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>
<tr>
<th>会員登録</th>
<td><input class="input_w10 form-control" type="password" name="passwd" value="<?php echo $this->_tpl_vars['form']['passwd']; ?>
"/>
<?php if ($this->_tpl_vars['msg']['passwd']): ?>
<div class="error_message">
<ul>
<li><?php echo $this->_tpl_vars['msg']['passwd']; ?>
</li>
</ul>
</div>
<?php endif; ?>
</td>
</tr>
-->
</tbody>
</table>
<div class="text-right"><a href="javascript:document.form1.submit();" class="btn btn-warning"><i class="fa fa-floppy-o"></i> 登録</a></div>
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
</div><!-- /.box-body -->


<div class="box-footer">
<form name="form2" method="post" action="admin-user-edit.html">
<input type="hidden" name="mode" value="memo">
<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['form']['user_id']; ?>
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


</div>


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
<script src="common/AdminLTE/plugins/fastclick/fastclick.js"></script>
<script src="common/AdminLTE/js/app.min.js"></script>
<script src="common/AdminLTE/js/demo.js"></script>
<script src="common/js/common.js"></script>
<?php echo '
<script>
function do_memo()
{
	if (document.form2.comment.value == "") {
		alert("メモを記入してください");
	} else {
		document.form2.submit();
	}
}
</script>
'; ?>


</body>
</html>
