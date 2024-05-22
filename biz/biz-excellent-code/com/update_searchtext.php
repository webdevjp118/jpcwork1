<?php
error_reporting (E_ALL & ~E_NOTICE & ~E_WARNING & ~E_STRICT & ~E_DEPRECATED);

require_once(realpath(dirname(__FILE__) . "/../") . "/lib/config.php");

require_once("common.php");
require_once("formcheck.php");
require_once("item.php");

$inst = DBConnection::getConnection($DB_URI);

$items = Item::findData($rec);
if ($items) {

	if (!isset($_SESSION["mast_kodawari1"])) {
		$list = array();
		$sql = "select * from master where kind=" . MAST_KODAWARI1 . " order by item_id";
		$ret = $inst->search_sql($sql);
		if ($ret["data"]) {
			foreach ($ret["data"] as $val) {
				$rec["id"] = $val["item_id"];
				$rec["name"] = $val["contents"];
				$list[$val["item_id"]] = $rec;
			}
		}
		$_SESSION["mast_kodawari1"] = $list;
	}

	if (!isset($_SESSION["mast_kodawari2"])) {
		$list = array();
		$sql = "select * from master where kind=" . MAST_KODAWARI2 . " order by item_id";
		$ret = $inst->search_sql($sql);
		if ($ret["data"]) {
			foreach ($ret["data"] as $val) {
				$rec["id"] = $val["item_id"];
				$rec["name"] = $val["contents"];
				$list[$val["item_id"]] = $rec;
			}
		}
		$_SESSION["mast_kodawari2"] = $list;
	}

	if (!isset($_SESSION["mast_kodawari3"])) {
		$list = array();
		$sql = "select * from master where kind=" . MAST_KODAWARI3 . " order by item_id";
		$ret = $inst->search_sql($sql);
		if ($ret["data"]) {
			foreach ($ret["data"] as $val) {
				$rec["id"] = $val["item_id"];
				$rec["name"] = $val["contents"];
				$list[$val["item_id"]] = $rec;
			}
		}
		$_SESSION["mast_kodawari3"] = $list;
	}

	if (!isset($_SESSION["mast_syokusyu"])) {
		$list = array();
		$sql = "select * from master where kind=" . MAST_SYOKUSYU . " order by item_id";
		$ret = $inst->search_sql($sql);
		if ($ret["data"]) {
			foreach ($ret["data"] as $val) {
				$rec["id"] = $val["item_id"];
				$rec["name"] = $val["contents"];
				$list[$val["item_id"]] = $rec;
			}
		}
		$_SESSION["mast_syokusyu"] = $list;
	}

	if (!isset($_SESSION["mast_koyou"])) {
		$list = array();
		$sql = "select * from master where kind=" . MAST_KOYOU . " order by item_id";
		$ret = $inst->search_sql($sql);
		if ($ret["data"]) {
			foreach ($ret["data"] as $val) {
				$rec["id"] = $val["item_id"];
				$rec["name"] = $val["contents"];
				$list[$val["item_id"]] = $rec;
			}
		}
		$_SESSION["mast_koyou"] = $list;
	}

	foreach ($items as $key => $form) {

		$fulltext = $form["pr"] . $form["jikan"] . $form["kyujitsu"] . $form["kyuyo"] .
			$form["shigoto"] . $form["koutsuu"] . $form["taisyou"] . $form["shikaku"] .
			$form["fukuri"] . $form["consult"] .
			$form["textarea01"] . $form["textarea02"] . $form["textarea03"] . $form["textarea04"] . $form["textarea05"] .
			$form["textarea06"] . $form["text01"] . $form["text02"] . $form["text03"]  . $form["text09"];

		if($form["kodawari1"]){
			$kodawari1_val = " ";
			foreach ($form["kodawari1"] as $key => $val) {
				foreach ($_SESSION["mast_kodawari1"] as $key2 => $val2) {
					if ($val == $val2["id"]) {
						$kodawari1_val .= $val2["name"] . " ";
						break;
					}
				}
			}
		}
		if ($form["kodawari2"]) {
			$kodawari2_val = " ";
			foreach ($form["kodawari2"] as $key => $val) {
				foreach ($_SESSION["mast_kodawari2"] as $key2 => $val2) {
					if ($val == $val2["id"]) {
						$kodawari2_val .= $val2["name"] . " ";
						break;
					}
				}
			}
		}
		if ($form["kodawari3"]) {
			$kodawari3_val = " ";
			foreach ($form["kodawari3"] as $key => $val) {
				foreach ($_SESSION["mast_kodawari3"] as $key2 => $val2) {
					if ($val == $val2["id"]) {
						$kodawari3_val .= $val2["name"] . " ";
						break;
					}
				}
			}
		}
		if ($form["syokusyu"]) {
			$syokusyu_val = " ";
			foreach ($form["syokusyu"] as $key => $val) {
				foreach ($_SESSION["mast_syokusyu"] as $key2 => $val2) {
					if ($val == $val2["id"]) {
						$syokusyu_val .= $val2["name"] . " ";
						break;
					}
				}
			}
		}
		if ($form["koyou"]) {
			$koyou_val = " ";
			foreach ($form["koyou"] as $key => $val) {
				foreach ($_SESSION["mast_koyou"] as $key2 => $val2) {
					if ($val == $val2["id"]) {
						$koyou_val .= $val2["name"] . " ";
						break;
					}
				}
			}
		}
		if ($form["check01"]) {
			$check01_val = " ";
			foreach ($form["check01"] as $key => $val) {
				$check01_val .= $check01_list[$val] . " ";
			}
		}
		if ($form["kinmu_pref"]) {
			$kinmu_pref_val = " ";
			$kinmu_pref_val = $pref_list[$form["kinmu_pref"]];
		}
		if ($form["kinmu_city"]) {
			$kinmu_city_val = " ";
			$kinmu_city_val = get_city_name($form["kinmu_city"]);
		}

		$fulltext .= $kodawari1_val . $kodawari2_val . $kodawari3_val . $syokusyu_val . $koyou_val . $check01_val . $kinmu_pref_val . $kinmu_city_val;
		//
		include_once("ngram_converter.php");
		mb_regex_encoding("UTF-8");
		$ngram = new NgramConverter();

		$searchtext = $ngram->to_fulltext(mb_eregi_replace("[　|《|》|（|）|\[|\]|＜|＞|\||｜|「|」|…|、|。|＃|！|？|：|［| ］]", "", $fulltext), 4);

		$sql = "UPDATE item SET searchtext = '{$searchtext}' WHERE item_id = ".$form['item_id'];
		$inst->db_exec($sql);

		// echo $form['item_id']."<br/>";
	}

}
php?>

<html lang="ja">
<head>
	<meta name="robots" content="noindex,nofollow">
	<meta http-equiv="Refresh" content="3;URL=/">
</head>
<body>
<p>searchtextの更新が完了しました</p>
<p>3秒後にトップページへ自動遷移します</p>
</body>
</html>
