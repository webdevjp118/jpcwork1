<?php
require_once("dbaccess.php");
class File extends DbAccess {

	static $t_table = array(
		'title' => 'file',
		'name' => 'file',
		'fields' => array(
			1 => 'file_id',
			2 => 'user_id',
			3 => 'file_name',
			4 => 'save_name',
			5 => 'title',
			6 => 'type',
			7 => 'size',
			8 => 'reg_date',
		),
		'seq' => 'file_id'
	);

	function File($page=0, $limit=0, $order="", $search=array()) {
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
/*
CREATE TABLE `file` (
  `file_id` int(11) NOT NULL auto_increment COMMENT '�t�@�C��ID',
  `user_id` int(11) default NULL COMMENT '�o�^��',
  `file_name` tinytext collate utf8_unicode_ci COMMENT '�t�@�C����',
  `save_name` tinytext collate utf8_unicode_ci COMMENT '�ۑ��t�@�C����',
  `title` tinytext collate utf8_unicode_ci COMMENT '�^�C�g��',
  `type` tinytext collate utf8_unicode_ci COMMENT '�t�@�C���^�C�v',
  `size` int(11) default NULL COMMENT '�T�C�Y',
  `reg_date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP COMMENT '�o�^��',
  PRIMARY KEY  (`file_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;
*/
function save_file($file, $user_id=0, $title="", $save_path="")
{
	$fp = fopen($file["tmp_name"], "rb");
	if ($fp) {
		$item["user_id"] = $user_id;
		$id = File::addData($item, true);
		if ($id) {
			if ($title) {
				$upd["title"] = $title;
			}
			$upd["type"] = $file["type"];
			$upd["size"] = $file["size"];
			$upd["file_name"] = $file["name"];
			File::updateData($id, $upd);	// �����R�[�h�ϊ��Ή�
		}
		// ���t�@�C���̕ۑ�
		if ($save_path) {
			$ary = explode(".", $file["name"]);
			if (count($ary) > 1) {
				$ext = $ary[count($ary) - 1];
			} else {
				$ext = "dat";
			}
			$save_name = sprintf("%08d.%s", $id, $ext);
			$full_name = $save_path . $save_name;
			copy($file["tmp_name"], $full_name);	// �I���W�i����ۑ�
			//
			unset($upd);
			$upd["save_name"] = $save_name;
			File::updateData($id, $upd);
		}
		return $id;
	} else {
		echo "File open error.";
	}
	return false;
}
// �w��̃C���[�W�������̂��̂Ȃ�폜
function delete_file($id, $user_id = 0)
{
	$file = File::getData($id, array("user_id", "type"));
	if ($file["user_id"] == $user_id) {
		if (defined("FILE_DIR")) {
			$filename = FILE_DIR . $file["save_file"];
			unlink($filename);
		}
		return File::deleteData($id);
	}
	return false;
}
// �t�H�[������̉摜�o�^
function form_file($key, &$msg, $type=array(), $size=0)
{
	$file_id = '';
	if ($_FILES[$key]["name"]) {
		// �ȑO�̉摜�������
		if ($_REQUEST[$key . "_old"]) {
			// �����ł͍폜�ł��Ȃ�
			//delete_file($_REQUEST[$key . "_old"], $id);
		}
		$error = "";
		if ($type) {
			if ($type[$_FILES[$key]["type"]]) {
				// ok
			} else {
				$error = "�t�@�C���̎�ނ�����������܂���";
			}
		}
		if ($size) {
			if ($_FILES[$key]["type"] > $size) {
				$error = "�t�@�C���̃T�C�Y���傫�����܂�";
			}
		}
		if ($error == "") {
			if (defined("FILE_DIR")) {
				$file_id = save_file($_FILES[$key], 0, "", FILE_DIR);
			} else {
				$file_id = save_file($_FILES[$key], 0, "");
			}
			if ($file_id) {
				//
			} else {
				$error = "�ۑ��ł��܂���ł����B";
			}
		}
		if ($error) {
			$msg[$key] = $error;
		}
	} else if ($_REQUEST[$key . "_old"]) {
		if ($_REQUEST[$key . "_del"]) {
			// �����ł͍폜�ł��Ȃ�
			//delete_file($_REQUEST[$key . "_old"], $id);	// �摜�͍폜
			$file_id = array();
		} else {
			$file_id = $_REQUEST[$key . "_old"];	// �O��̉摜�̂܂�
		}
	}
	return $file_id;
}
?>