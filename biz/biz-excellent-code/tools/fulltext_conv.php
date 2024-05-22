<?php
$ngram_len = 4;

include_once("../lib/config.php");
//include_once("ngram_converter.php");
include_once("item.php");
include_once("common_func.php");

ini_set("max_execution_time", 0);

$inst = DBConnection::getConnection($DB_URI);
//$ngram = new NgramConverter();

$page = 0;
while (1) {
	$count = $page * 100;
	$sql = "select * from item where 1=1 order by reg_date desc limit {$count}, 100";
	$ret = $inst->search_sql($sql);
	if ($ret["count"] > 0) {
		foreach ($ret["data"] as $val) {
/*
			$fulltext = $val["title"] . $val["pr"] . $val["moyori"] . $val["jikan"] . $val["kyujitsu"] . $val["kyuyo"] .
				$val["consult"] . $val["kinmu_address1"] . $val["shigoto"] . $val["koutsuu"] . $val["taisyou"] . 
				$val["shikaku"] . $val["teate"] . $val["fukuri"] . $val["biko"] .
				$val["textarea01"] . $val["textarea02"] . $val["textarea03"] . $val["textarea04"] . $val["textarea05"] . 
				$val["textarea06"] . $val["textarea07"] . $val["textarea08"] . $val["textarea09"] . $val["textarea10"] . 
				$val["text01"] . $val["text02"] . $val["text03"] . $val["text04"] . $val["text05"] . 
				$val["text06"] . $val["text07"] . $val["text08"] . $val["text09"] . $val["text10"];
			unset($upd);
			$upd["searchtext"] = $ngram->to_fulltext($fulltext, $ngram_len);
*/
			$upd["searchtext"] = make_fulltext($val);
			Item::updateData($val["item_id"], $upd);
		}
	} else {
		break;
	}
	echo $count . "<br>";
	$page++;
}
/*
// 全文検索用のngramデータを作成する。
function make_fulltext($item, $ngram_len=4)
{
	$ngram = new NgramConverter();

	$fulltext = $item["title"] . $item["pr"] . $item["moyori"] . $item["jikan"] . $item["kyujitsu"] . $item["kyuyo"] .
		$item["consult"] . $item["kinmu_address1"] . $item["shigoto"] . $item["koutsuu"] . $item["taisyou"] . 
		$item["shikaku"] . $item["teate"] . $item["fukuri"] . $item["biko"] .
		$item["textarea01"] . $item["textarea02"] . $item["textarea03"] . $item["textarea04"] . $item["textarea05"] . 
		$item["textarea06"] . $item["textarea07"] . $item["textarea08"] . $item["textarea09"] . $item["textarea10"] . 
		$item["text01"] . $item["text02"] . $item["text03"] . $item["text04"] . $item["text05"] . 
		$item["text06"] . $item["text07"] . $item["text08"] . $item["text09"] . $item["text10"];
	// 記号取り去り
	mb_regex_encoding("UTF-8");
	$searchtext = $ngram->to_fulltext(mb_eregi_replace("[　|《|》|（|）|\[|\]|＜|＞|\||｜|「|」|…|、|。|＃|！|？|：|［| ］]", "", $fulltext), $ngram_len);
	// 記号そのまま
	//$searchtext = $ngram->to_fulltext($fulltext, $ngram_len);
	return $searchtext;
}
*/
?>
