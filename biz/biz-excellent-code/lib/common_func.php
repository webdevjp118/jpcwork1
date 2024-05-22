<?php

require_once("smarty/Smarty.class.php");
require_once("mail.php");
require_once("JSON.php");
require_once("ngram_converter.php");

// 共通関数
// -----------------------------------
// カンマ要素をINDEXとした配列にする
function multi_value($val, $list=null)
{
	$ret = array();
	if (is_array($val)) {
		$ary = $val;
	} else {
		$ary = explode(",", $val);
	}
	if ($ary) {
		foreach ($ary as $v) {
			if ($list) {
				$ret[$v] = $list[$v]["name"];
			} else {
				$ret[$v] = "1";
			}
		}
	}
	return $ret;
}
// 配列の要素に対応する文字列を返す
function multi_string($val, $list, $sep="")
{
	$ret = array();
	if (is_array($val)) {
		$ary = $val;
	} else {
		$ary = explode(",", $val);
	}
	if ($ary) {
		foreach ($ary as $v) {
			if (is_array($list[$v])) {
				$ret[] = $list[$v]["name"];
			} else {
				$ret[] = $list[$v];
			}
		}
	}
	if ($sep && $ret) {
		return join($sep, $ret);
	}
	return $ret;
}

function get_const_list($kind=1)
{
	$const_list = array();
	$db = new ConstData();
	$db->search[] = array("field" => "kind", "value" => $kind, "cond" => "=");
	$db->order[] = array("field" => "no");
	$list = $db->getList();
	if ($list) {
		foreach ($list as $val) {
			$const_list[$val["no"]] = $val["name"];
		}
	}
//dump($const_list);
	return $const_list;
}
function get_city_name($city_cd)
{
	if ($city_cd) {
		$v["city_cd"] = $city_cd;
		$ret = Address::findData($v);
		if ($ret) {
			return $ret[0]["city"];
		}
	}
	return $city_cd;
}
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

function disp_item($item, $csv=0)
{
	global $radio01_list;
	global $radio02_list;
	global $radio03_list;
	global $radio04_list;
	global $radio05_list;
	global $check01_list;
	global $check02_list;
	global $check03_list;
	global $check04_list;
	global $check05_list;
	global $select01_list;
	global $select02_list;
	global $select03_list;
	global $select04_list;
	global $select05_list;
	global $pref_list;
	global $open_list;
	global $confirm_list;
	global $area_pref_list;

	if ($csv == 0) {
		foreach ($area_pref_list as $key => $val) {
			if (in_array($item["kinmu_pref"], $val)) {
				$item["kinmu_area"] = $key;
				break;
			}
		}
		$item["kinmu_pref_v"] = $item["kinmu_pref"];
		$item["syokusyu_v"] = multi_value($item["syokusyu"], $_SESSION["mast_syokusyu"]);
		$item["koyou_v"] = multi_value($item["koyou"], $_SESSION["mast_koyou"]);
		$item["kodawari1_v"] = multi_value($item["kodawari1"], $_SESSION["mast_kodawari1"]);
		$item["kodawari2_v"] = multi_value($item["kodawari2"], $_SESSION["mast_kodawari2"]);
		$item["kodawari3_v"] = multi_value($item["kodawari3"], $_SESSION["mast_kodawari3"]);
	}
	$item["syokusyu"] = multi_string($item["syokusyu"], $_SESSION["mast_syokusyu"], "、");
	$item["koyou"] = multi_string($item["koyou"], $_SESSION["mast_koyou"], "、");
	$item["kodawari1"] = multi_string($item["kodawari1"], $_SESSION["mast_kodawari1"], "、");
	$item["kodawari2"] = multi_string($item["kodawari2"], $_SESSION["mast_kodawari2"], "、");
	$item["kodawari3"] = multi_string($item["kodawari3"], $_SESSION["mast_kodawari3"], "、");
	$item["radio01"] = $radio01_list[$item["radio01"]];
	$item["radio02"] = $radio02_list[$item["radio02"]];
	$item["radio03"] = $radio03_list[$item["radio03"]];
	$item["radio04"] = $radio04_list[$item["radio04"]];
	$item["radio05"] = $radio05_list[$item["radio05"]];
	$item["check01"] = multi_string($item["check01"], $check01_list, "、");
	$item["check02"] = multi_string($item["check02"], $check02_list, "、");
	$item["check03"] = multi_string($item["check03"], $check03_list, "、");
	$item["check04"] = multi_string($item["check04"], $check04_list, "、");
	$item["check05"] = multi_string($item["check05"], $check05_list, "、");
	$item["select01"] = $select01_list[$item["select01"]];
	$item["select02"] = $select02_list[$item["select02"]];
	$item["select03"] = $select03_list[$item["select03"]];
	$item["select04"] = $select04_list[$item["select04"]];
	$item["select05"] = $select05_list[$item["select05"]];
	$item["kinmu_pref"] = $pref_list[$item["kinmu_pref"]];
	$item["mensetsu_pref"] = $pref_list[$item["mensetsu_pref"]];
	$item["status"] = $open_list[$item["status"]];
	if ($item["confirm"]) {
		$item["confirm"] = $confirm_list[$item["confirm"]];
	}
	if ($item["file01"]) {
		$f = File::getData($item["file01"]);
		if ($f) {
			if ($csv) {
				$item["file01_name"] = $f["file_name"];
			} else {
				$item["file01_name"] = $f["file_name"];
				$item["file01_file"] = $f["save_name"];
			}
		}
	}
	if ($item["file02"]) {
		$f = File::getData($item["file02"]);
		if ($f) {
			if ($csv) {
				$item["file02_name"] = $f["file_name"];
			} else {
				$item["file02_name"] = $f["file_name"];
				$item["file02_file"] = $f["save_name"];
			}
		}
	}
	if ($item["file03"]) {
		$f = File::getData($item["file03"]);
		if ($f) {
			if ($csv) {
				$item["file03_name"] = $f["file_name"];
			} else {
				$item["file03_name"] = $f["file_name"];
				$item["file03_file"] = $f["save_name"];
			}
		}
	}
	if ($item["file04"]) {
		$f = File::getData($item["file04"]);
		if ($f) {
			if ($csv) {
				$item["file04_name"] = $f["file_name"];
			} else {
				$item["file04_name"] = $f["file_name"];
				$item["file04_file"] = $f["save_name"];
			}
		}
	}
	if ($item["file05"]) {
		$f = File::getData($item["file05"]);
		if ($f) {
			if ($csv) {
				$item["file05_name"] = $f["file_name"];
			} else {
				$item["file05_name"] = $f["file_name"];
				$item["file05_file"] = $f["save_name"];
			}
		}
	}
	if ($item["kinmu_city"]) {
		$item["kinmu_city"] = get_city_name($item["kinmu_city"]);
	}
	if ($item["mensetsu_city"]) {
		$item["mensetsu_city"] = get_city_name($item["mensetsu_city"]);
	}
	return $item;
}
function disp_user($item)
{
	global $radio01_list;
	global $radio02_list;
	global $radio03_list;
	global $radio04_list;
	global $radio05_list;
	global $check01_list;
	global $check02_list;
	global $check03_list;
	global $check04_list;
	global $check05_list;
	global $select01_list;
	global $select02_list;
	global $select03_list;
	global $select04_list;
	global $select05_list;
	global $pref_list;
	global $open_list;
	global $shikaku_list;
	global $confirm_list;
	global $keitai_list;
	global $jiki_list;
	
	$item["shikaku"] = multi_string($item["shikaku"], $shikaku_list, "、");
	$item["radio01"] = $radio01_list[$item["radio01"]];
	$item["radio02"] = $radio02_list[$item["radio02"]];
	$item["radio03"] = $radio03_list[$item["radio03"]];
	$item["radio04"] = $radio04_list[$item["radio04"]];
	$item["radio05"] = $radio05_list[$item["radio05"]];
	$item["check01"] = multi_string($item["check01"], $check01_list, "、");
	$item["check02"] = multi_string($item["check02"], $check02_list, "、");
	$item["check03"] = multi_string($item["check03"], $check03_list, "、");
	$item["check04"] = multi_string($item["check04"], $check04_list, "、");
	$item["check05"] = multi_string($item["check05"], $check05_list, "、");
	$item["select01"] = $select01_list[$item["select01"]];
	$item["select02"] = $select02_list[$item["select02"]];
	$item["select03"] = $select03_list[$item["select03"]];
	$item["select04"] = $select04_list[$item["select04"]];
	$item["select05"] = $select05_list[$item["select05"]];
	$item["pref"] = $pref_list[$item["pref"]];
	$item["status"] = $open_list[$item["status"]];
	if ($item["keitai"]) {
		$item["keitai"] = $keitai_list[$item["keitai"]];
	}
	if ($item["jiki"]) {
		$item["jiki"] = $jiki_list[$item["jiki"]];
	}
	if ($item["confirm"]) {
		$item["confirm"] = $confirm_list[$item["confirm"]];
	}
	if ($item["file01"]) {
		$f = File::getData($item["file01"]);
		if ($f) {
			$item["file01_name"] = $f["file_name"];
			$item["file01_file"] = $f["save_name"];
		}
	}
	if ($item["file02"]) {
		$f = File::getData($item["file02"]);
		if ($f) {
			$item["file02_name"] = $f["file_name"];
			$item["file02_file"] = $f["save_name"];
		}
	}
	if ($item["file03"]) {
		$f = File::getData($item["file03"]);
		if ($f) {
			$item["file03_name"] = $f["file_name"];
			$item["file03_file"] = $f["save_name"];
		}
	}
	if ($item["file04"]) {
		$f = File::getData($item["file04"]);
		if ($f) {
			$item["file04_name"] = $f["file_name"];
			$item["file04_file"] = $f["save_name"];
		}
	}
	if ($item["file05"]) {
		$f = File::getData($item["file05"]);
		if ($f) {
			$item["file05_name"] = $f["file_name"];
			$item["file05_file"] = $f["save_name"];
		}
	}
	if ($item["birthday"]) {
		$ary = explode("-", $item["birthday"]);
		$item["age"] = intval((intval(date("Ymd")) - intval($ary[0] . $ary[1] . $ary[2])) / 10000);
	}
	return $item;
}
// カテゴリの文字への変換
function disp_category($item, $sep="")
{
	if (is_array($item)) {
		$cate = array();
		foreach ($item as $val) {
			$cate[] = disp_category($val);
		}
	} else {
		// 単一
		$cate = Category::getData($item);
		return $cate["title"];
	}
	if ($sep && $cate) {
		return join($sep, $cate);
	}
	return $cate;
}
function movie_resize($movie, $sx="400", $sy="325")
{
	if (eregi("width=&quot;([0-9]+)&quot;", $movie, $matches)) {
		$x = $matches[1];
		$str_x = $matches[0];
	} else if (eregi("width=\"([0-9]+)\"", $movie, $matches)) {
		$x = $matches[1];
		$str_x = $matches[0];
	}
	if (eregi("height=&quot;([0-9]+)&quot;", $movie, $matches)) {
		$y = $matches[1];
		$str_y = $matches[0];
	} else if (eregi("height=\"([0-9]+)\"", $movie, $matches)) {
		$y = $matches[1];
		$str_y = $matches[0];
	}
	if ($x && $y) {
		if ($x > $sx) {
			$sy = intval($y * $sx / $x);
		} else if ($y > $sy) {
			$sx = intval($x * $sy / $y);
		} else {
			$sx = $x;
			$sy = $y;
		}
	}
	$movie = str_replace($str_x, "width=&quot;" . $sx . "&quot;", $movie);
	$movie = str_replace($str_y, "height=&quot;" . $sy . "&quot;", $movie);
	return $movie;
}
/* SCRIPT_ENCODINGがSJISの場合に有効にする
// Smarty SJIS対応用関数1
function m_convert_encoding_to_eucjp($template_source) {
    if (function_exists("mb_convert_encoding")) {
        //文字コードを変換する
        return mb_convert_encoding($template_source, "EUC-JP", "SJIS");
    }
    return $template_source;
}

// Smarty SJIS対応用関数2
function m_convert_encoding_to_sjis($template_source) {
    if (function_exists("mb_convert_encoding")) {
        //文字コードを変換する
        return mb_convert_encoding($template_source, "SJIS", "EUC-JP");
    }
    return $template_source;
}
*/
// テンプレートを使用してメールを送信する
function template_mail($to, $subject_tpl, $body_tpl, $info, $manager="")
{
	$smarty = new Smarty();
// SCRIPT_ENCODINGがSJISの場合に有効にする
//	$smarty->register_prefilter("m_convert_encoding_to_eucjp");
//	$smarty->register_postfilter("m_convert_encoding_to_sjis");
	// メール用リソース設定
	$smarty->register_resource('mail', 
		array(
			"mail_get_template",
			"mail_get_timestamp",
			"mail_get_secure",
			"mail_get_trusted",
		)
	);
	//
	$smarty->assign("sitename", SITE_NAME);
	$smarty->assign("url", TOP_URL);
	$smarty->assign("loginurl", TOP_URL . "login.html");
	//
	if (is_array($info)) {
		foreach ($info as $key => $val) {
			$smarty->assign($key, $val);
		}
	} else {
		$smarty->assign("info", $info);
	}
	$mail = get_info(INFO_MAIL);
//	$subject = "【" . $mail["fromname"] . "】 " . $mail[$subject_tpl];
	$subject = "【" . $mail["fromname"] . "】 " . $smarty->fetch("mail:" . $subject_tpl);
	$body = $smarty->fetch("mail:" . $body_tpl) . "\n" . $mail["sign"];
	if ($to) {
		$ret = sendmail($mail["email"], $to, $subject, $body, array(), $mail["email"], $mail["fromname"]);
	}
	if ($manager && $mail[$manager]) {
		$ret = sendmail($mail["email"], $mail[$manager], $subject, $body, array(), $mail["email"], $mail["fromname"]);
	}
	return $ret;
}

// メール用テンプレート取得処理(データベースより)
function mail_get_template($name, &$source, $smarty)
{
	$mail = get_info(INFO_MAIL);
	if ($mail[$name]) {
		$source = $mail[$name];
	} else {
		$source = "該当リソースなし";
	}
	return true;
}

function mail_get_timestamp($name, &$timestamp, $smarty)
{
	$timestamp = time();
	return true;
}

function mail_get_secure($name, $smarty)
{
	return true;
}

function mail_get_trusted($name, $smarty)
{
	//
}

/*
 * ページインデックス作成
 * $cur : 現在のページ（0始まり）
 * $pages : 全ページ数
 */
function page_index($cur, $pages)
{
	$page = array();
	$no = 0;
	if ($cur > 0) {
		$page['prev'] = array('no' => $cur - 1, 'name' => '前へ', 'link' => 1);
	}
	for ($i = 0; $i < $pages; $i++) {
		if ($i == $cur) {
			$page['list'][$no] = array('no' => $i, 'name' => $i + 1);
		} else {
			$page['list'][$no] = array('no' => $i, 'name' => $i + 1, 'link' => 1);
		}
		$no++;
	}
	if ($cur < ($pages - 1)) {
		$page['next'] = array('no' => $cur + 1, 'name' => '次へ', 'link' => 1);
	}
	return $page;
}
/*
 * ページインデックス作成(ページ切り替えを10までに制限)
 * $cur : 現在のページ（0始まり）
 * $pages : 全ページ数
 * $maxpage ： ページリストの最大数
 */
function page_index2($cur, $pages, $maxpage=10)
{
	$page = array();
	$no = 0;
	if ($cur > 0) {
		$page['prev'] = array('no' => $cur - 1, 'name' => '前へ', 'link' => 1);
	}
	$start = 0;
	$end = $pages;
	if ($pages > $maxpage) {
		if ($cur > intval($maxpage / 2)) {
			$start = $cur - intval($maxpage / 2);
		}
		$end = $start + $maxpage;
		if ($end > $pages) {
			$end = $pages;
			$start = $end - $maxpage;
		}
		if ($start == 1) {
			$start = 0;
		} else if ($start > 1) {
			$page['prev_skip'] = "1";
			$page['top'] = array('no' => 0, 'name' => '1', 'link' => 1);
		}
		if (($end + 1) == $pages) {
			$end = $pages;
		} else if ($end < $pages) {
			$page['next_skip'] = "1";
			$page['last'] = array('no' => $pages - 1, 'name' => $pages, 'link' => 1);
		}
	}
	for ($i = $start; $i < $end; $i++) {
		if ($i == $cur) {
			$page['list'][$no] = array('no' => $i, 'name' => $i + 1);
		} else {
			$page['list'][$no] = array('no' => $i, 'name' => $i + 1, 'link' => 1);
		}
		$no++;
	}
	if ($cur < ($pages - 1)) {
		$page['next'] = array('no' => $cur + 1, 'name' => '次へ', 'link' => 1);
	}
	return $page;
}
// Google GeoCodeで住所から緯度経度を得る
function GetGeocode($add)
{
	require_once('JSON.php');

	$latlng =array();
	$str = "";
	$url = "http://maps.google.com/maps/api/geocode/json?address='".trim($add)."'&sensor=false";
	// レスポンスを取得
	$res = file_get_contents($url);
	// JSON形式から連想配列へ変換
	$json = new Services_JSON();
	$res_array = $json->decode($res);
	$results = $res_array->results;
	$lat = $results[0]->geometry->location->lat;
	$lng = $results[0]->geometry->location->lng;
	return array($lat, $lng);
}

// デバッグダンプ
function dump($data) {
	echo "<pre>";
	var_dump($data);
	echo "</pre>";
}
?>
