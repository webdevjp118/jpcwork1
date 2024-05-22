<?php
require_once("dbaccess.php");
class Tantou extends DbAccess {

	static $t_table = array(
		'title' => 'tantou',
		'name' => 'tantou',
		'fields' => array(
			1 => 'seq',
			2 => 'name',
			3 => 'email',
			4 => 'passwd',
			5 => 'auth1',
			6 => 'auth2',
			7 => 'auth3',
			8 => 'auth4',
			9 => 'auth5',
			10 => 'auth6',
			11 => 'auth7',
			12 => 'auth8',
			13 => 'status',
			14 => 'up_date',
			15 => 'reg_date',
		),
		'seq' => 'seq'
	);

	function Tantou($page=0, $limit=0, $order="", $search=array()) {
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