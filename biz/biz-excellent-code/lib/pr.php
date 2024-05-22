<?php
require_once("dbaccess.php");
class Pr extends DbAccess {

	static $t_table = array(
		'title' => 'pr',
		'name' => 'pr',
		'fields' => array(
			1 => 'seq',
			2 => 'title',
			3 => 'image',
			4 => 'url',
			5 => 'blank',
			6 => 'pr_date',
			7 => 'status',
			8 => 'reg_date',
		),
		'seq' => 'seq'
	);

	function Pr($page=0, $limit=0, $order="", $search=array()) {
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