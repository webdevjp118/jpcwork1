<?php
/*
 * 管理
 * 2009 by Crytus. Y.Kurihara
 */
require_once("../lib/config.php");

require_once("cms2.php");

require_once("master.php");
require_once("action.php");
require_once("address.php");
require_once("contents.php");
require_once("contents_editor.php");
require_once("item.php");
require_once("news.php");
require_once("oubo.php");
require_once("pr.php");
require_once("search.php");
require_once("station.php");
require_once("tantou.php");
require_once("user.php");

require_once("info.php");
require_once("info_item.php");
require_once("image.php");

require_once("common_func.php");

require_once("smarty/Smarty.class.php");

/*
require_once("mail.php");
require_once("auth.php");
*/
session_start();

/*
	function safeStripSlashes($var) {
		if (is_array($var)) {
			foreach ($var as $key => $v) {
				$var[$key] = $this->safeStripSlashes($v);
			}
			return $var;
			//return array_map('application::safeStripSlashes', $var);
		} else {
			if (get_magic_quotes_gpc()) {
				$var = stripslashes($var);
			}
			return $var;
		}
	}
*/

// magic_quotes_gpc対策
if (get_magic_quotes_gpc()) {
	$_REQUEST = safeStripSlashes($_REQUEST);
	$_GET = safeStripSlashes($_GET);
	$_POST = safeStripSlashes($_POST);
}

// --------------------------------
// 共通前処理

class administrator extends Smarty {

	var $template;
	var $act;
	var $admin_info;

	function administrator()
	{
		global $DB_URI;

		session_start();

		if (get_magic_quotes_gpc()) {
			$_REQUEST = $this->safeStripSlashes($_REQUEST);
			$_GET = $this->safeStripSlashes($_GET);
			$_POST = $this->safeStripSlashes($_POST);
		}
		$this->inst = DBConnection::getConnection($DB_URI);

		$this->set("top", TOP);
		$this->set("sitename", SITENAME);

		if (defined("GMAP_KEY")) {
			$this->set("gmap_key", GMAP_KEY);
		}
	}

	// 変数を設定
	function set($list, $value=array()) {
		if (is_array($list)) {
			foreach ($list as $key => $val) {
				$this->assign($key, $val);
			}
		} else {
			$this->assign($list, $value);
		}
	}

	// テンプレートの表示
	function view($template) {
		if ($template) {
			$this->display($template);
		} else {
			$this->display($this->template);
		}
	}
}

$html = new administrator();

//$html->debugging = true;

$act = $_REQUEST["act"];

//-----------------------------------
// 認証
if ($act == "logout") {	// ログアウト
	unset($_SESSION["ADMIN_LOGIN"]);
}
if ($act == "login") {	// ログイン
	if ($_REQUEST["id"] && $_REQUEST["passwd"]) {
		$id = htmlspecialchars($_REQUEST["id"]);
		$passwd = htmlspecialchars($_REQUEST["passwd"]);
		//
		$setup = get_info(INFO_SETUP);
		if (($id == $setup["login_id"])&&($passwd == $setup["passwd"])) {
			$_SESSION["ADMIN_LOGIN"] = $setup;
			header("location: ./");
			exit;
		}
		$data["message"] = "ログインできません。IDとパスワードを確認してください。";
	}
	$html->display("login.html");
	exit;
}
// --------------------------------
// ログイン成功後の処理の継続の場合
if ($act == 'logined') {
	$_REQUEST = $_SESSION['REQUEST'];
	unset($_SESSION['REQUEST']);
	$act = htmlspecialchars($_REQUEST['act']);
}
//-----------------------------------
if (isset($_SESSION["ADMIN_LOGIN"])) {
	$data["login"] = 1;
} else {
	$data['logout'] = 1;
}
// 管理画面はログインが必要
login_check("ログインしてください");

$admin_menu = array(
	array("title" => "登録情報"),

	array("act" => "syokusyu", "title" => "職種マスター"),
	array("act" => "koyou", "title" => "雇用形態マスター"),
	array("act" => "kodawari1", "title" => "こだわり1マスター"),
	array("act" => "kodawari2", "title" => "こだわり2マスター"),
	array("act" => "kodawari3", "title" => "こだわり3マスター"),
	array("act" => "address", "title" => "市区町村"),
	array("act" => "station", "title" => "路線駅"),

	array("act" => "address_uploadcsv", "title" => "市区町村アップロード"),
	array("act" => "station_uploadcsv", "title" => "路線駅アップロード"),
	array("act" => "tantou", "title" => "担当者"),


	array("title" => "管理情報"),
	array("act" => "mail", "title" => "メール"),
	array("act" => "setup", "title" => "設定"),
	array("act" => "logout", "title" => "ログアウト"),
);

$html->set("menu", $admin_menu);

// --------------------------------
// 写真表示
if ($act == "get_image") {
	$id = htmlspecialchars($_REQUEST["id"]);
	$file = htmlspecialchars($_REQUEST["file"]);
	$size = htmlspecialchars($_REQUEST["size"]);	// sizeで指定した矩形の切り取り
	$tx = htmlspecialchars($_REQUEST["x"]);	// x,yで指定した矩形の切り取り
	$ty = htmlspecialchars($_REQUEST["y"]);	// x,yで指定した矩形の切り取り
	$pv = htmlspecialchars($_REQUEST["pv"]);
	if ($id || $file) {
		if ($tx || $ty) {
			$sx = 0;
			$sy = 0;
			if ($tx) {
				$sx = $tx;
			}
			if ($ty) {
				$sy = $ty;
			}
		} else if ($size) {
			$sx = $size;
			$sy = $size;
		} else {
			$sx = 0;
			$sy = 0;
		}
		get_image($id, $file, $sx, $sy, $pv);
	}
	exit;
}

// --------------------------------
$act_ary = explode("_", $act);

// --------------------------------
$syokusyu_data = array(
	"name" => "syokusyu",	// 処理名
	"id" => "seq",	// IDフィールド
	"title" => "職種",
	"list" => array(
		"form" => "list.html",
		"cond" => array(
			array("field" => "kind", "value" => MAST_SYOKUSYU, "cond" => "="),
		),
		"order" => array(
			array("field" => "item_id"),
		),
		"items" => array(
			"item_id" => array(
				"title" => "情報ID",
			),
			"contents" => array(
				"title" => "内容",
			),
			"reg_date" => array(
				"title" => "登録日時",
			),
		),
 		"search" => array(	// 検索条件
		),
	),
	"input" => array(
		"form" => "contents.html",
		"items" => array(
			"kind" => array(
				"title" => "種類",
				"type" => "hidden",
				"value" => MAST_SYOKUSYU,
			),
			"item_id" => array(
				"title" => "情報ID",
				"type" => "text",
			),
			"contents" => array(
				"title" => "内容",
				"type" => "textarea",
			),
		),
	),
);


if ($act_ary[0] == "syokusyu") {
	cms2($syokusyu_data, $act_ary[1], new Master(), $msg);
}

// --------------------------------
$koyou_data = array(
	"name" => "koyou",	// 処理名
	"id" => "seq",	// IDフィールド
	"title" => "雇用",
	"list" => array(
		"form" => "list.html",
		"cond" => array(
			array("field" => "kind", "value" => MAST_KOYOU, "cond" => "="),
		),
		"order" => array(
			array("field" => "item_id"),
		),
		"items" => array(
			"item_id" => array(
				"title" => "情報ID",
			),
			"contents" => array(
				"title" => "内容",
			),
			"reg_date" => array(
				"title" => "登録日時",
			),
		),
 		"search" => array(	// 検索条件
		),
	),
	"input" => array(
		"form" => "contents.html",
		"items" => array(
			"kind" => array(
				"title" => "種類",
				"type" => "hidden",
				"value" => MAST_KOYOU,
			),
			"item_id" => array(
				"title" => "情報ID",
				"type" => "text",
			),
			"contents" => array(
				"title" => "内容",
				"type" => "textarea",
			),
		),
	),
);


if ($act_ary[0] == "koyou") {
	cms2($koyou_data, $act_ary[1], new Master(), $msg);
}

// --------------------------------
$tantou_data = array(
	"name" => "tantou",	// 処理名
	"id" => "seq",	// IDフィールド
	"title" => "担当者",
	"list" => array(
		"form" => "list.html",
		"items" => array(
			"name" => array(
				"title" => "氏名",
			),
			"email" => array(
				"title" => "メールアドレス",
			),
/*
			"passwd" => array(
				"title" => "パスワード",
			),
			"auth1" => array(
				"title" => "権限1",
			),
			"auth2" => array(
				"title" => "権限2",
			),
			"auth3" => array(
				"title" => "権限3",
			),
			"auth4" => array(
				"title" => "権限4",
			),
			"auth5" => array(
				"title" => "権限5",
			),
			"auth6" => array(
				"title" => "権限6",
			),
			"auth7" => array(
				"title" => "権限7",
			),
			"auth8" => array(
				"title" => "権限8",
			),
			"last_date" => array(
				"title" => "最終ログイン",
			),
			"count" => array(
				"title" => "作成求人",
			),
			"oubo" => array(
				"title" => "担当応募数",
			),
*/
			"status" => array(
				"title" => "状態",
			),
/*
			"up_date" => array(
				"title" => "更新日時",
			),
*/
			"reg_date" => array(
				"title" => "登録日時",
			),
		),
 		"search" => array(	// 検索条件
		),
	),
	"input" => array(
		"form" => "contents.html",
		"items" => array(
			"name" => array(
				"title" => "氏名",
				"type" => "text",
			),
			"email" => array(
				"title" => "メールアドレス",
				"type" => "text",
			),
			"passwd" => array(
				"title" => "パスワード",
				"type" => "text",
			),
			"auth1" => array(
				"title" => "権限管理",
				"type" => "checkbox",
				"list" => array(
					"1" => "追加",
					"2" => "編集",
					"3" => "削除",
				),
			),
			"auth2" => array(
				"title" => "求人管理",
				"type" => "checkbox",
				"list" => array(
					"1" => "追加",
					"2" => "編集",
					"4" => "CSVエクスポート",
					"3" => "削除",
				),
			),
			"auth3" => array(
				"title" => "会員管理",
				"type" => "checkbox",
				"list" => array(
					"1" => "追加",
					"2" => "編集",
					"4" => "CSVエクスポート",
					"3" => "削除",
				),
			),
			"auth4" => array(
				"title" => "応募管理",
				"type" => "checkbox",
				"list" => array(
					"1" => "追加",
					"2" => "編集",
					"4" => "CSVエクスポート",
					"3" => "削除",
				),
			),
			"auth5" => array(
				"title" => "サイトからのお知らせ",
				"type" => "checkbox",
				"list" => array(
					"1" => "追加",
					"2" => "編集",
					"3" => "削除",
				),
			),
			"auth6" => array(
				"title" => "コンテンツ管理",
				"type" => "checkbox",
				"list" => array(
					"1" => "追加",
					"2" => "編集",
					"3" => "削除",
				),
			),
			"auth7" => array(
				"title" => "PR管理",
				"type" => "checkbox",
				"list" => array(
					"1" => "追加",
					"2" => "編集",
					"3" => "削除",
				),
			),
/*
			"auth8" => array(
				"title" => "権限8",
				"type" => "checkbox",
				"list" => array(
					"1" => "追加",
					"2" => "編集",
					"3" => "削除",
				),
			),
*/
			"count" => array(
				"title" => "作成求人",
				"type" => "text",
			),
			"oubo" => array(
				"title" => "担当応募数",
				"type" => "text",
			),
			"status" => array(
				"title" => "ログイン",
				"type" => "select",
				"list" => array(
					"1" => "有効",
					"2" => "無効",
				),
			),
		),
	),
);

if ($act_ary[0] == "tantou") {
	cms2($tantou_data, $act_ary[1], new Tantou(), $msg);
}

// --------------------------------
$kodawari1_data = array(
	"name" => "kodawari1",	// 処理名
	"id" => "seq",	// IDフィールド
	"title" => "こだわり1",
	"list" => array(
		"form" => "list.html",
		"cond" => array(
			array("field" => "kind", "value" => MAST_KODAWARI1, "cond" => "="),
		),
		"order" => array(
			array("field" => "item_id"),
		),
		"items" => array(
			"item_id" => array(
				"title" => "情報ID",
			),
			"contents" => array(
				"title" => "内容",
			),
			"reg_date" => array(
				"title" => "登録日時",
			),
		),
 		"search" => array(	// 検索条件
		),
	),
	"input" => array(
		"form" => "contents.html",
		"items" => array(
			"kind" => array(
				"title" => "種類",
				"type" => "hidden",
				"value" => MAST_KODAWARI1,
			),
			"item_id" => array(
				"title" => "情報ID",
				"type" => "text",
			),
			"contents" => array(
				"title" => "内容",
				"type" => "textarea",
			),
		),
	),
);


if ($act_ary[0] == "kodawari1") {
	cms2($kodawari1_data, $act_ary[1], new Master(), $msg);
}
// --------------------------------
$kodawari2_data = array(
	"name" => "kodawari2",	// 処理名
	"id" => "seq",	// IDフィールド
	"title" => "こだわり2",
	"list" => array(
		"form" => "list.html",
		"cond" => array(
			array("field" => "kind", "value" => MAST_KODAWARI2, "cond" => "="),
		),
		"order" => array(
			array("field" => "item_id"),
		),
		"items" => array(
			"item_id" => array(
				"title" => "情報ID",
			),
			"contents" => array(
				"title" => "内容",
			),
			"reg_date" => array(
				"title" => "登録日時",
			),
		),
 		"search" => array(	// 検索条件
		),
	),
	"input" => array(
		"form" => "contents.html",
		"items" => array(
			"kind" => array(
				"title" => "種類",
				"type" => "hidden",
				"value" => MAST_KODAWARI2,
			),
			"item_id" => array(
				"title" => "情報ID",
				"type" => "text",
			),
			"contents" => array(
				"title" => "内容",
				"type" => "textarea",
			),
		),
	),
);


if ($act_ary[0] == "kodawari2") {
	cms2($kodawari2_data, $act_ary[1], new Master(), $msg);
}
// --------------------------------
$kodawari3_data = array(
	"name" => "kodawari3",	// 処理名
	"id" => "seq",	// IDフィールド
	"title" => "こだわり3",
	"list" => array(
		"form" => "list.html",
		"cond" => array(
			array("field" => "kind", "value" => MAST_KODAWARI3, "cond" => "="),
		),
		"order" => array(
			array("field" => "item_id"),
		),
		"items" => array(
			"item_id" => array(
				"title" => "情報ID",
			),
			"contents" => array(
				"title" => "内容",
			),
			"reg_date" => array(
				"title" => "登録日時",
			),
		),
 		"search" => array(	// 検索条件
		),
	),
	"input" => array(
		"form" => "contents.html",
		"items" => array(
			"kind" => array(
				"title" => "種類",
				"type" => "hidden",
				"value" => MAST_KODAWARI3,
			),
			"item_id" => array(
				"title" => "情報ID",
				"type" => "text",
			),
			"contents" => array(
				"title" => "内容",
				"type" => "textarea",
			),
		),
	),
);


if ($act_ary[0] == "kodawari3") {
	cms2($kodawari3_data, $act_ary[1], new Master(), $msg);
}
// --------------------------------
if ($act_ary[0] == "address") {
$address_data = array(
	"name" => "address",	// 処理名
	"id" => "seq",	// IDフィールド
	"title" => "address",
	"list" => array(
		"form" => "list.html",
		"items" => array(
			"seq" => array(
				"title" => "シーケンス",
			),
			"pref_cd" => array(
				"title" => "都道府県",
			),
			"pref" => array(
				"title" => "都道府県名",
			),
			"city_cd" => array(
				"title" => "市区町村",
			),
			"city" => array(
				"title" => "市区町村名",
			),
/*
			"reg_date" => array(
				"title" => "登録日",
			),
*/
		),
 		"search" => array(	// 検索条件
		),
	),
	"input" => array(
		"form" => "contents.html",
		"items" => array(
			"pref_cd" => array(
				"title" => "都道府県",
				"type" => "text",
			),
			"pref" => array(
				"title" => "都道府県名",
				"type" => "text",
			),
			"pref_yomi" => array(
				"title" => "都道府県よみ",
				"type" => "text",
			),
			"city_cd" => array(
				"title" => "市区町村",
				"type" => "text",
			),
			"city" => array(
				"title" => "市区町村名",
				"type" => "text",
			),
			"city_yomi" => array(
				"title" => "市区町村よみ",
				"type" => "text",
			),
		),
	),
	"csv1" => array(
		0 => "city_cd",
		1 => "pref",
		2 => "city",
		3 => "pref_yomi",
		4 => "city_yomi",
	),
	"csv2" => array(
		0 => "city_cd",
		1 => "city",
		2 => "city_yomi",
	),
);

	if ($act_ary[1] == "uploadcsv") {
		ini_set("max_execution_time", 0);

		if ($_FILES["upload"]) {
			$name = $_FILES["upload"]["tmp_name"];
		}
		if ($name) {
			$data["message"] = "";
			$fp = @fopen($name, 'r');
			if ($fp) {
				$no = 0;
				while ($line = fgetcsv($fp, 40960)) {
					if (!is_array($line)) {
						$line = explode("\t", $line);
					} else if (count($line) == 1) {
						$line = explode("\t", $line[0]);
					}
					if ($no) {	// 1行目は読み飛ばし
						unset($item);
						if (count($line) == 3) {	// 区データ
							foreach ($address_data["csv2"] as $key => $val) {
								$line[$key] = mb_convert_kana($line[$key], "C", "SJIS");
								$item[$val] = mb_convert_encoding($line[$key], DB_ENCODING, "SJIS");
							}
						} else {	// 市町村データ
							foreach ($address_data["csv1"] as $key => $val) {
								$line[$key] = mb_convert_kana($line[$key], "KV", "SJIS");
								$item[$val] = mb_convert_encoding($line[$key], DB_ENCODING, "SJIS");
							}
						}
						Address::addData($item);
					}
					$no++;
				}
				$data["message"] .= "{$no}件登録しました";
			} else {
				$data["message"] .= "ファイルがオープンできませんでした。";
			}
		}
		$html->set("form", $address_data);
		//
		$html->display("uploadcsv.html");
		exit;
	}
	cms2($address_data, $act_ary[1], new Address(), $msg);
}
// --------------------------------
if ($act_ary[0] == "station") {
$station_data = array(
	"name" => "station",	// 処理名
	"id" => "seq",	// IDフィールド
	"title" => "station",
	"list" => array(
		"form" => "list.html",
		"items" => array(
/*
			"seq" => array(
				"title" => "シーケンス",
			),
*/
			"rr_cd" => array(
				"title" => "rr_cd",
			),
/*
			"line_cd" => array(
				"title" => "line_cd",
			),
*/
			"station_cd" => array(
				"title" => "station_cd",
			),
/*
			"line_sort" => array(
				"title" => "line_sort",
			),
			"station_sort" => array(
				"title" => "station_sort",
			),
			"station_g_cd" => array(
				"title" => "station_g_cd",
			),
			"r_type" => array(
				"title" => "r_type",
			),
			"rr_name" => array(
				"title" => "rr_name",
			),
*/
			"line_name" => array(
				"title" => "line_name",
			),
			"station_name" => array(
				"title" => "station_name",
			),
/*
			"pref_cd" => array(
				"title" => "pref_cd",
			),
			"lon" => array(
				"title" => "lon",
			),
			"lat" => array(
				"title" => "lat",
			),
			"f_flag" => array(
				"title" => "f_flag",
			),
			"reg_date" => array(
				"title" => "登録日時",
			),
*/
		),
 		"search" => array(	// 検索条件
		),
	),
	"input" => array(
		"form" => "contents.html",
		"items" => array(
			"rr_cd" => array(
				"title" => "rr_cd",
				"type" => "text",
			),
			"line_cd" => array(
				"title" => "line_cd",
				"type" => "text",
			),
			"station_cd" => array(
				"title" => "station_cd",
				"type" => "text",
			),
			"line_sort" => array(
				"title" => "line_sort",
				"type" => "text",
			),
			"station_sort" => array(
				"title" => "station_sort",
				"type" => "text",
			),
			"station_g_cd" => array(
				"title" => "station_g_cd",
				"type" => "text",
			),
			"r_type" => array(
				"title" => "r_type",
				"type" => "text",
			),
			"rr_name" => array(
				"title" => "rr_name",
				"type" => "text",
			),
			"line_name" => array(
				"title" => "line_name",
				"type" => "text",
			),
			"station_name" => array(
				"title" => "station_name",
				"type" => "text",
			),
			"pref_cd" => array(
				"title" => "pref_cd",
				"type" => "text",
			),
			"lon" => array(
				"title" => "lon",
				"type" => "text",
			),
			"lat" => array(
				"title" => "lat",
				"type" => "text",
			),
			"f_flag" => array(
				"title" => "f_flag",
				"type" => "text",
			),
		),
	),
	"csv" => array(
		// フィールド位置とデータベースの項目の対応
		1 => "rr_cd",
		2 => "line_cd",
		3 => "station_cd",
		4 => "line_sort",
		5 => "station_sort",
		6 => "station_g_cd",
		7 => "r_type",
		8 => "rr_name",
		9 => "line_name",
		10 => "station_name",
		11 => "pref_cd",
		12 => "lon",
		13 => "lat",
		14 => "f_flag",
	),
);

	if ($act_ary[1] == "uploadcsv") {
		ini_set("max_execution_time", 0);

		if ($_FILES["upload"]) {
			$name = $_FILES["upload"]["tmp_name"];
		}
		if ($name) {
			$data["message"] = "";
			$fp = @fopen($name, 'r');
			if ($fp) {
				$item_list = $station_data["csv"];
				$no = 0;
				while ($line = fgetcsv($fp, 40960)) {
					if (!is_array($line)) {
						$line = explode("\t", $line);
					} else if (count($line) == 1) {
						$line = explode("\t", $line[0]);
					}
					if ($no) {	// 1行目は読み飛ばし
						unset($item);
						foreach ($item_list as $key => $val) {
							$item[$val] = mb_convert_encoding($line[$key], DB_ENCODING, "SJIS");
						}
						Station::addData($item);
					}
					$no++;
				}
				$data["message"] .= "{$no}件登録しました";
			} else {
				$data["message"] .= "ファイルがオープンできませんでした。";
			}
		}
		$html->set("form", $station_data);
		//
		$html->display("uploadcsv.html");
		exit;
	}

	cms2($station_data, $act_ary[1], new Station(), $msg);
}
// --------------------------------
// 設定
$setup_data = array(
	"id" => INFO_SETUP,
	"name" => "setup",
	"title" => "基本設定",
/*
	"list" => array(
		"form" => "list.html",
		"items" => array(
			"title" => array(
				"title" => "タイトル",
			),
		),
	),
*/
	"input" => array(
		"form" => "contents.html",
		"items" => array(
			"dummy1" => array(
				"title" => "管理者",
				"type" => "comment",
			),
			"login_id" => array(
				"title" => "ログインID",
				"type" => "text",
			),
			"passwd" => array(
				"title" => "パスワード",
				"type" => "text",
			),
		),
	),
);

if ($act == "setup") {
	unset($cond);
	$cond["kind"] = INFO_SETUP;
	$ret = Info::findData($cond);
	if (!$ret) {
		cms2($setup_data, "new", null, array());
	} else {
		$id = $ret[0]["info_id"];
		$_REQUEST["id"] = $id;
		cms2($setup_data, "edit", null, array());
	}
	$act = "setup";
}
if ($act == "setup_update") {
	cms2($setup_data, "update", null, array());
	$act = "setup";
}
if ($act == "setup") {
	$html->view("top.html");
	exit;
}

// ---------------------------------
$mail_data = array(
	"id" => INFO_MAIL,
	"name" => "mail",
	"title" => "メール設定",
/*
	"list" => array(
		"form" => "list.html",
		"items" => array(
			"title" => array(
				"title" => "タイトル",
			),
		),
	),
*/
	"input" => array(
		"form" => "contents.html",
		"items" => array(
			"dummy1" => array(
				"title" => "管理者情報",
				"type" => "comment",
			),
			"fromname" => array(
				"title" => "メール発信者",
				"type" => "text",
			),
			"email" => array(
				"title" => "送信元メールアドレス",
				"type" => "text",
			),
			"manager" => array(
				"title" => "管理者メールアドレス",
				"type" => "text",
			),
			"sign" => array(
				"title" => "シグニチャー",
				"type" => "textarea",
			),
			"dummy2" => array(
				"title" => "メール内容情報",
				"type" => "comment",
			),
			"mail1_subject" => array(
				"title" => "パスワードの再送依頼件名",
				"type" => "text",
			),
			"mail1_body" => array(
				"title" => "パスワードの再送依頼内容",
				"type" => "textarea",
			),
			"mail2_subject" => array(
				"title" => "求人情報エントリー件名",
				"type" => "text",
			),
			"mail2_body" => array(
				"title" => "求人情報エントリー内容",
				"type" => "textarea",
			),
			"mail3_subject" => array(
				"title" => "会員登録件名",
				"type" => "text",
			),
			"mail3_body" => array(
				"title" => "会員登録内容",
				"type" => "textarea",
			),
			"mail4_subject" => array(
				"title" => "コンサルタント相談件名",
				"type" => "text",
			),
			"mail4_body" => array(
				"title" => "コンサルタント相談内容",
				"type" => "textarea",
			),
			"mail5_subject" => array(
				"title" => "お問合せ件名",
				"type" => "text",
			),
			"mail5_body" => array(
				"title" => "お問合せ内容",
				"type" => "textarea",
			),
			"mail6_subject" => array(
				"title" => "アカウント設定件名",
				"type" => "text",
			),
			"mail6_body" => array(
				"title" => "アカウント設定内容",
				"type" => "textarea",
			),
			
			//　ishi.add start
			"mail7_subject" => array(
				"title" => "コーディネーターに相談件名",
				"type" => "text",
			),
			"mail7_body" => array(
				"title" => "コーディネーターに相談内容",
				"type" => "textarea",
			),

			"mail8_subject" => array(
				"title" => "採用担当者様へ件名",
				"type" => "text",
			),
			"mail8_body" => array(
				"title" => "採用担当者様へ内容",
				"type" => "textarea",
			),
			
			"mail9_subject" => array(
				"title" => "合致した求人情報の件名",
				"type" => "text",
			),
			"mail9_body" => array(
				"title" => "合致した求人情報の内容",
				"type" => "textarea",
			),
			// ishi.add end
		),
	),
);


if ($act == "mail") {
	unset($cond);
	$cond["kind"] = INFO_MAIL;
	$ret = Info::findData($cond);
	if (!$ret) {
		cms2($mail_data, "new", null, array());
	} else {
		$id = $ret[0]["info_id"];
		$_REQUEST["id"] = $id;
		cms2($mail_data, "edit", null, array());
	}
}

if ($act == "mail_update") {
	cms2($mail_data, "update", null, array());
}

// ---------------------------------
// トップメニュー画面
$html->display("top.html");
exit;

// ---------------------------------
// ログインしていなければ、ログインフォームを表示し、ログイン後もとの処理へ
function login_check($msg)
{
	// ログイン確認
	if (!isset($_SESSION["ADMIN_LOGIN"])) {
		// ログイン後の飛び先（戻る場所）
		$_SESSION['NEXT_URL'] = TOP . './?act=logined';
		// 現在のパラメータを保存
		$_SESSION['REQUEST'] = $_REQUEST;
		$_SESSION['LOGIN_MESSAGE'] = $msg;
		// ログイン処理へ
		header("Location: ./?act=login");
		exit;
	}
}

function safeStripSlashes($var)
{
	if (is_array($var)) {
		return array_map('safeStripSlashes', $var);
	} else {
		if (get_magic_quotes_gpc()) {
			$var = stripslashes($var);
		}
		return $var;
	}
}
/*
// デバッグダンプ
function dump($data) {
	echo "<pre>";
	var_dump($data);
	echo "</pre>";
}
*/
?>
