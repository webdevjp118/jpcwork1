<?php
$ngram_len = 4;

include_once("../lib/config.php");
include_once("ngram_converter.php");
include_once("item.php");
include_once("common_func.php");

ini_set("max_execution_time", 0);

if ($_REQUEST["keyword"]) {
	$t = microtime(true);

	$page = $_REQUEST["page"];
	$ngram = new NgramConverter();
	$db = new Item();
	$db->search[] = array("field" => "status", "value" => "1", "cond" => "=");
	$keywords = explode(" ", $_REQUEST["keyword"]);
	if ($keywords) {
		foreach ($keywords as $val) {
			if ($val) {
				$db->search[] = array("expression" => $ngram->make_match_sql($val, 'searchtext', $ngram_len));
			}
		}
	}
	$db->page = $page;
	$db->limit = 20;
	$count = $db->getCount();
	$pages = intval(($count + $db->limit - 1) / $db->limit);
	if ($pages > 1) {
		$pager = page_index2($page, $pages, 10);
	}
	$list = $db->getList();
	$total = $count;
	$start = $page * $db->limit + 1;
	$end = $page * $db->limit + count($list);
	$list = $db->getList();

	$lap = intval((microtime(true) - $t) * 1000);
}
if ($_REQUEST["id"]) {
	$item = Item::getData($_REQUEST["id"]);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="content-script-Type" content="text/javascript" />
<title>管理者画面</title>
<link rel="stylesheet" href="../admin/css/admin.css" type="text/css" media="screen" />
<script type="text/javascript">
function do_page(page)
{
	document.form1.page.value = page;
	document.form1.submit();
}
</script>
</head>
<body>
<form name="form1" method="post" action="fulltext_test.php">
<input type="hidden" name="page" value="">
<input type="text" name="keyword" value="<?php echo $_REQUEST["keyword"];?>">
<input type="submit" value=" 検索 ">　半角スペースで区切って複数指定可能
</form>
<hr>
<?php if ($list) { ?>
<?php if ($total) { 
echo "<br>" , $total . "件中 " . $start . "～" . $end;
echo "&nbsp;<a href=\"javascript:do_page({$pager["prev"]["no"]});\">{$pager["prev"]["name"]}</a>&nbsp;";
echo "<a href=\"javascript:do_page({$pager["next"]["no"]});\">{$pager["next"]["name"]}</a>&nbsp;　実行時間:{$lap}ミリ秒<br>";
?>
<?php } ?>
<table>
<tr>
<th>求人ID</th>
<th>担当ID</th>
<th>タイトル</th>
<th>説明</th>
<th>PR</th>
</tr>
<?php	foreach ($list as $val) { ?>
<tr>
<td><a href="fulltext_test.php?id=<?php echo $val["item_id"]; ?>"><?php echo $val["item_id"]; ?></a></td>
<td><?php echo $val["tantou_id"]; ?></td>
<td><?php echo $val["title"]; ?></td>
<td><?php echo $val["description"]; ?></td>
<td><?php echo $val["pr"]; ?></td>
</tr>
<?php } ?>
</table>
<?php } ?>
<?php if ($item) { ?>
<table>
<?php foreach ($item as $key => $val) { if ($val) { ?>
<tr><th><?php echo $key;?></th><td><?php if (is_array($val)) echo implode(",", $val); else echo $val;?></td></tr>
<?php } } ?>
</table>
<?php } ?>
</body>
</html>
