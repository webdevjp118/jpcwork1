<?php
require_once("dbaccess.php");
class Contents extends DbAccess {

	static $t_table = array(
		'title' => 'contents',
		'name' => 'contents',
		'fields' => array(
			1 => 'seq',
			2 => 'title',
			3 => 'contents',
			4 => 'keyword',
			5 => 'url',
			6 => 'list_image',
			7 => 'list_text',
			8 => 'head1',
			9 => 'image1',
			10 => 'text1',
			11 => 'head2',
			12 => 'image2',
			13 => 'text2',
			14 => 'head3',
			15 => 'image3',
			16 => 'text3',
			17 => 'head4',
			18 => 'image4',
			19 => 'text4',
			20 => 'head5',
			21 => 'image5',
			22 => 'text5',
			23 => 'contents_date',
			24 => 'reg_date',
		),
		'seq' => 'seq'
	);

	function Contents($page=0, $limit=0, $order="", $search=array()) {
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