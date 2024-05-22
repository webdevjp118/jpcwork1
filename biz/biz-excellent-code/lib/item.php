<?php
require_once("dbaccess.php");
class Item extends DbAccess {

	static $t_table = array(
		'title' => 'item',
		'name' => 'item',
		'fields' => array(
			1 => 'item_id',
			2 => 'tantou_id',
			3 => 'title',
			4 => 'description',
			5 => 'keyword',
			6 => 'recommend',
			7 => 'pickup',
			8 => 'image',
			9 => 'pr',
			10 => 'kodawari',
			11 => 'syokusyu',
			12 => 'koyou',
			13 => 'kinmuti',
			14 => 'moyori',
			15 => 'kikan',
			16 => 'jikan',
			17 => 'kyujitsu',
			18 => 'kyuyo',
			19 => 'kinmu_zip',
			20 => 'kinmu_pref',
			21 => 'kinmu_city',
			22 => 'kinmu_address1',
			23 => 'kiinmu_address2',
			24 => 'shigoto',
			25 => 'koutsuu',
			26 => 'taisyou',
			27 => 'shikaku',
			28 => 'teate',
			29 => 'fukuri',
			30 => 'mensetsu_zip',
			31 => 'mensetsu_pref',
			32 => 'mensetsu_city',
			33 => 'mensetsu_addr1',
			34 => 'mensetsu_addr2',
			35 => 'consult',
			36 => 'ymd01',
			37 => 'ymd02',
			38 => 'ymd03',
			39 => 'textarea01',
			40 => 'textarea02',
			41 => 'textarea03',
			42 => 'textarea04',
			43 => 'textarea05',
			44 => 'textarea06',
			45 => 'textarea07',
			46 => 'textarea08',
			47 => 'textarea09',
			48 => 'textarea10',
			49 => 'text01',
			50 => 'text02',
			51 => 'text03',
			52 => 'text04',
			53 => 'text05',
			54 => 'text06',
			55 => 'text07',
			56 => 'text08',
			57 => 'text09',
			58 => 'text10',
			59 => 'radio01',
			60 => 'radio02',
			61 => 'radio03',
			62 => 'radio04',
			63 => 'radio05',
			64 => 'check01',
			65 => 'check02',
			66 => 'check03',
			67 => 'check04',
			68 => 'check05',
			69 => 'file01',
			70 => 'file02',
			71 => 'file03',
			72 => 'file04',
			73 => 'file05',
			74 => 'select01',
			75 => 'select02',
			76 => 'select03',
			77 => 'select04',
			78 => 'select05',
			79 => 'biko',
			80 => 'status',
			81 => 'up_date',
			82 => 'reg_date',
		),
		'seq' => 'item_id'
	);

	function Item($page=0, $limit=0, $order="", $search=array()) {
		parent::DbAccess($page, $limit, $order, $search, self::$t_table["name"], self::$t_table["seq"]);
	}

	function getData($id, $fields="", $raw=null) {
		return parent::getData($id, $fields, $raw, self::$t_table["name"], self::$t_table["seq"]);
	}

	function addData($data, $raw=null) {
		return parent::addData($data, $raw, self::$t_table["name"], self::$t_table["seq"]);
	}

	function updateData($id, $data, $raw=null) {
		return parent::updateData($id, $data, $raw, self::$t_table["name"], self::$t_table["seq"]);
	}

	function deleteData($id) {
		return parent::deleteData($id, self::$t_table["name"], self::$t_table["seq"]);
	}

	function findData($cond, $fields=null, $raw=null, $order=null, $page=null) {
		return parent::findData($cond, $fields, $raw, self::$t_table["name"], $order, $page);
	}
}
?>