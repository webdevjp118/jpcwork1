<?php

// �f�ڒ����l�̍X�V�������X�V���W�b�N

require_once(realpath(dirname(__FILE__) . "/../") . "/lib/config.php");
require_once("item.php");
require_once("user.php");
require_once("access.php");
require_once("info.php");

$inst = DBConnection::getConnection($DB_URI);

// �����X�V�ݒ�擾
unset($cond);
//	$cond["kind"] = INFO_AUTOUPDATE; // ���l�X�V�����@�����X�V�ݒ�
$cond["kind"] = 127; // ���l�X�V�����@�����X�V�ݒ�
$ret = Info::findData($cond);
if ($ret[0]["contents"] == 1) { // �ݒ�ON

	$db = new Item();
	$db->search[] = array("field" => "status", "value" => "1", "cond" => "=");
	$list = $db->getList();
	if ($list) {
		$target_day =  date('Y-m-d H:i:s', strtotime('-30 day', time())); // 30���O
		foreach ($list as $key => $val) {
			if(strtotime($val["up_date"]) < strtotime($target_day)){ // �X�V����30���ȑO
				// �X�V
				unset($item);
				$item["up_date"] = date('Y-m-d H:i:s');
				$item["item_id"] = $val["item_id"];
				Item::updateData($item["item_id"], $item);
				
			}
		}
	}
	
}
