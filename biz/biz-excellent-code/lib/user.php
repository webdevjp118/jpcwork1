<?php
require_once("dbaccess.php");
class User extends DbAccess {

	static $t_table = array(
		'title' => 'user',
		'name' => 'user',
		'fields' => array(
			1 => 'user_id',
			2 => 'company',
			3 => 'company_kana',
			4 => 'zip',
			5 => 'pref',
			6 => 'address1',
			7 => 'address2',
			8 => 'birthday',
			9 => 'shikaku',
			10 => 'tel',
			11 => 'email',
			12 => 'passwd',
			13 => 'keitai',
			14 => 'kinmu',
			15 => 'ymd01',
			16 => 'ymd02',
			17 => 'ymd03',
			18 => 'textarea01',
			19 => 'textarea02',
			20 => 'textarea03',
			21 => 'textarea04',
			22 => 'textarea05',
			23 => 'textarea06',
			24 => 'textarea07',
			25 => 'textarea08',
			26 => 'textarea09',
			27 => 'textarea10',
			28 => 'text01',
			29 => 'text02',
			30 => 'text03',
			31 => 'text04',
			32 => 'text05',
			33 => 'text06',
			34 => 'text07',
			35 => 'text08',
			36 => 'text09',
			37 => 'text10',
			38 => 'radio01',
			39 => 'radio02',
			40 => 'radio03',
			41 => 'radio04',
			42 => 'radio05',
			43 => 'check01',
			44 => 'check02',
			45 => 'check03',
			46 => 'check04',
			47 => 'check05',
			48 => 'file01',
			49 => 'file02',
			50 => 'file03',
			51 => 'file04',
			52 => 'file05',
			53 => 'select01',
			54 => 'select02',
			55 => 'select03',
			56 => 'select04',
			57 => 'select05',
			58 => 'biko',
			59 => 'status',
			60 => 'up_date',
			61 => 'reg_date',
		),
		'seq' => 'user_id'
	);

	function User($page=0, $limit=0, $order="", $search=array()) {
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