<?php
require_once("dbaccess.php");
class Search extends DbAccess {

	static $t_table = array(
		'title' => 'search',
		'name' => 'search',
		'fields' => array(
			1 => 'seq',
			2 => 'kind',
			3 => 'item_id',
			4 => 'contents',
			5 => 'reg_date',
		),
		'seq' => 'seq'
	);

	function Search($page=0, $limit=0, $order="", $search=array()) {
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
//---------------------------------
// �������̕ۑ�
function save_search($item_id, $kind, $values=array())
{
	global $DB_URI;

	$inst = DBConnection::getConnection($DB_URI);
	$sql = "delete from search where item_id={$item_id} and kind='{$kind}'";
	$inst->db_exec($sql);
	if (is_array($values)) {
		foreach (array_unique($values) as $key => $val) {
			if ($val) {
				unset($item);
				$item['item_id'] = $item_id;
				$item['kind'] = $kind;
				$item['value'] = $val;
				Search::addData($item);
			}
		}
	} else if ($values) {
		unset($item);
		$item['item_id'] = $item_id;
		$item['kind'] = $kind;
		$item['value'] = $values;
		Search::addData($item);
	}
}
?>