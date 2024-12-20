<?php

define("SITENAME", "派遣求人パッケージ");

// -------------------------------------------
// データベースの初期設定
if (substr($_SERVER["HTTP_HOST"], 0, 9) == "localhost") {
	// 開発環境
	// MySQLのID
	$mysql_id	= "root";
	// MySQLのパスワード
	$mysql_pass	= "test1234";
	// MySQLのデータベース
	$mysql_db		= "selecty_db";
	$mysql_debug_db = "selecty_db";
	// MySQLのサーバ
	$mysql_server = "192.168.1.6";

	define("TOP", "/demo-reqruit.info/");
	define("TOP_URL", "http://localhost/demo-reqruit.info/");

	define("DEBUG", "1");
} else {
	// 本番環境
	// MySQLのID
	$mysql_id	= "xs432387_use";
	// MySQLのパスワード
	$mysql_pass	= "ipmj9a6u";
	// MySQLのデータベース
	$mysql_db		= "xs432387_db1";
	$mysql_debug_db = "xs432387_db1";
	// MySQLのサーバ
	$mysql_server = "localhost";

	define("TOP", "/");
	define("TOP_URL", "http://hoikubiz.com/");
}

$DB_URI = array(
	"host" => $mysql_server,
	"db" => $mysql_db,
	"user" => $mysql_id,
	"pass" => $mysql_pass,
);

// ライブラリのパス
$path[] = get_include_path();
//if (isset($_SERVER["WINDIR"])) {	// Windows
if (strncmp(php_uname(), "Windows", 7) == 0) { 
	define("BASE_DIR", realpath(dirname(__FILE__) . "/../") . "");
	$path[] = BASE_DIR . "lib\\";
	$path[] = dirname(__FILE__) . "\\";
	set_include_path(join(';', $path));		// for Windows
} else {
	define("BASE_DIR", realpath(dirname(__FILE__) . "/../") . "/");
	$path[] = BASE_DIR . "lib/";
	$path[] = dirname(__FILE__) . "/";
	set_include_path(join(':', $path));	// for Linux
}
//var_dump(get_include_path());

define("SCRIPT_ENCODING", "UTF-8");
define("DB_ENCODING", "UTF-8");


// 登録画像保存
define("IMAGE_DIR", BASE_DIR . "/userdata/images/");
//define(IMAGE_FOLDER, BASE_DIR . "/userdata/images/");
define(IMAGE_URL, TOP . "userdata/images/");

// 登録ファイルの保存
define("FILE_DIR", BASE_DIR . "/userdata/files/");
//define(FILE_FOLDER, BASE_DIR . "/userdata/files/");
define(FILE_URL, TOP . "userdata/files/");

// -------------------------------------------
// 設定

define("INFO_SETUP", 1);
define("INFO_MAIL", 100);

// -------------------------------------------
//	使用可能なファイルタイプ
//
$image_type = array(
	'image/pjpeg' => 'jpg',
	'image/jpeg'  => 'jpg',
	'image/gif'   => 'gif',
	'image/x-png' => 'png',
	'image/png'   => 'png',
);

define("IMAGE_MAX", 512 * 1024);

// -------------------------------------------

// マスター種類
define("MAST_SYOKUSYU", 1);
define("MAST_KOYOU", 2);
define("MAST_KODAWARI1", 3);
define("MAST_KODAWARI2", 4);
define("MAST_KODAWARI3", 5);

$area_list = array(
	"1" => "北海道",
	"2" => "東北",
	"3" => "関東",
	"4" => "北陸・甲信越",
	"5" => "東海",
	"6" => "関西",
	"7" => "中国",
	"8" => "四国",
	"9" => "九州",
	"10" => "沖縄",
);

$area_pref_list = array(
	"1" => array("1"),
	"2" => array("2","3","4","5","6","7"),
	"3" => array("8","9","10","11","12","13","14"),
	"4" => array("15","16","17","18","19","20"),
	"5" => array("21","22","23","24"),
	"6" => array("25","26","27","28","29","30"),
	"7" => array("31","32","33","34","35"),
	"8" => array("36","37","38","39"),
	"9" => array("40","41","42","43","44","45","46"),
	"10" => array("47"),
);

//	都道府県
$pref_list = array(	
	"1" => "北海道",
	"2" => "青森県",
	"3" => "岩手県",
	"4" => "宮城県",
	"5" => "秋田県",
	"6" => "山形県",
	"7" => "福島県",
	"8" => "茨城県",
	"9" => "栃木県",
	"10" => "群馬県",
	"11" => "埼玉県",
	"12" => "千葉県",
	"13" => "東京都",
	"14" => "神奈川県",
	"15" => "新潟県",
	"16" => "富山県",
	"17" => "石川県",
	"18" => "福井県",
	"19" => "山梨県",
	"20" => "長野県",
	"21" => "岐阜県",
	"22" => "静岡県",
	"23" => "愛知県",
	"24" => "三重県",
	"25" => "滋賀県",
	"26" => "京都府",
	"27" => "大阪府",
	"28" => "兵庫県",
	"29" => "奈良県",
	"30" => "和歌山県",
	"31" => "鳥取県",
	"32" => "島根県",
	"33" => "岡山県",
	"34" => "広島県",
	"35" => "山口県",
	"36" => "徳島県",
	"37" => "香川県",
	"38" => "愛媛県",
	"39" => "高知県",
	"40" => "福岡県",
	"41" => "佐賀県",
	"42" => "長崎県",
	"43" => "熊本県",
	"44" => "大分県",
	"45" => "宮崎県",
	"46" => "鹿児島県",
	"47" => "沖縄県",
	"48" => "海外",
	"99" => "非公開",
);

$news_kind_list = array(
	"1" => "お知らせ",
	"2" => "イベント",
);

$shikaku_list = array(
	"1" => "保育士",
	"2" => "幼稚園教諭",
	"3" => "栄養士",
	"4" => "調理師",
	"5" => "園長",
	"6" => "主任",
	"7" => "看護師",
	"8" => "児童指導員",
	"9" => "児童発達支援管理責任者",
	"10" => "作業療法士",
	"11" => "理学療法士",
	"12" => "言語聴覚士",
	"13" => "臨床心理士",
);

$open_list = array(
	"1" => "公開",
	"2" => "非公開",
);

$contact_kind_list = array(
	"1" => "採用に関して",
	"2" => "掲載に関して",
	"3" => "その他",
);

$contact_kind_list2 = array(
	"1" => "資料請求について",
	"2" => "求人掲載について",
	"3" => "お問い合わせ",
	"4" => "その他",
);

$confirm_list = array(
	"1" => "同意する",
	"2" => "同意しない",
);

$regist_list = array(
	"1" => "会員登録する",
);

$oubo_status_list = array(
	"0" => "未対応",
	"1" => "対応中",
	"2" => "対応済み",
);

$oubo_kind_list = array(
	"1" => "応募",
	"2" => "相談",
);

// コンテンツのカテゴリ
$contents_kind_list = array(
	"1" => "保育士のお仕事",
	"2" => "保育士の転職",
	"3" => "保育士のお悩み相談",
	"4" => "保育士のキャリアアップ",
);
// コンテンツのURL用半角英数字　（$contents_kind_listと合わせてください）
$contents_kind_url_list = array(
	"1" => "cat1",
	"2" => "cat2",
	"3" => "cat3",
	"4" => "cat4",
);


// 以下HTMLのフォームの内容にあわせて修正してください

$keitai_list = array(
	"1" => "勤務形態1",
	"2" => "勤務形態2",
	"3" => "勤務形態3",
	"4" => "勤務形態4",
);

$jiki_list = array(
	"1" => "入職時期1",
	"2" => "入職時期2",
	"3" => "入職時期3",
	"4" => "入職時期4",
);

//応募（性別）
$radio01_list = array(
	"1" => "男性",
	"2" => "女性",
);

$radio02_list = array(
	"1" => "値1",
	"2" => "値2",
	"3" => "値3",
);

$radio03_list = array(
	"1" => "値1",
	"2" => "値2",
	"3" => "値3",
);

$radio04_list = array(
	"1" => "値1",
	"2" => "値2",
	"3" => "値3",
);

$radio05_list = array(
	"1" => "値1",
	"2" => "値2",
	"3" => "値3",
);

//応募（保有資格）
/*
$check01_list = array(
	"1" => "保育士",
	"2" => "幼稚園教諭",
	"3" => "栄養士",
	"4" => "調理師",
	"5" => "園長",
	"6" => "主任",
	"7" => "看護師",
	"8" => "児童指導員",
	"9" => "児童発達支援管理責任者",
	"10" => "作業療法士",
	"11" => "理学療法士",
	"12" => "言語聴覚士",
	"13" => "臨床心理士",
);
*/
$check01_list = array(
	"1" => "ETC",
	"2" => "該当なし",
	"3" => "HW",
);

$check02_list = array(
	"1" => "値1",
	"2" => "値2",
	"3" => "値3",
);

$check03_list = array(
	"1" => "値1",
	"2" => "値2",
	"3" => "値3",
);

$check04_list = array(
	"1" => "値1",
	"2" => "値2",
	"3" => "値3",
);

$check05_list = array(
	"1" => "値1",
	"2" => "値2",
	"3" => "値3",
);

$select01_list = array(
	"1" => "値1",
	"2" => "値2",
	"3" => "値3",
);

$select02_list = array(
	"1" => "値1",
	"2" => "値2",
	"3" => "値3",
);

$select03_list = array(
	"1" => "値1",
	"2" => "値2",
	"3" => "値3",
);

$select04_list = array(
	"1" => "値1",
	"2" => "値2",
	"3" => "値3",
);

$select05_list = array(
	"1" => "値1",
	"2" => "値2",
	"3" => "値3",
);

?>
