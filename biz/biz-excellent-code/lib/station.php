<?php
require_once("dbaccess.php");
class Station extends DbAccess {

	static $t_table = array(
		'title' => 'station',
		'name' => 'station',
		'fields' => array(
			1 => 'seq',
			2 => 'rr_cd',
			3 => 'line_cd',
			4 => 'station_cd',
			5 => 'line_sort',
			6 => 'station_sort',
			7 => 'station_g_cd',
			8 => 'r_type',
			9 => 'rr_name',
			10 => 'line_name',
			11 => 'station_name',
			12 => 'pref_cd',
			13 => 'lon',
			14 => 'lat',
			15 => 'f_flag',
			16 => 'reg_date',
		),
		'seq' => 'seq'
	);

	function Station($page=0, $limit=0, $order="", $search=array()) {
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