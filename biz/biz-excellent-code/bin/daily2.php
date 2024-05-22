<?php

// 掲載中求人の更新日自動更新ロジック

require_once(realpath(dirname(__FILE__) . "/../") . "/lib/config.php");
require_once("item.php");
require_once("user.php");
require_once("access.php");
require_once("info.php");

$inst = DBConnection::getConnection($DB_URI);

// 自動更新設定取得
unset($cond);
//	$cond["kind"] = INFO_AUTOUPDATE; // 求人更新日時　自動更新設定
$cond["kind"] = 127; // 求人更新日時　自動更新設定
$ret = Info::findData($cond);
if ($ret[0]["contents"] == 1) { // 設定ON

	$db = new Item();
	$db->search[] = array("field" => "status", "value" => "1", "cond" => "=");
	$list = $db->getList();
	if ($list) {
		$target_day =  date('Y-m-d H:i:s', strtotime('-30 day', time())); // 30日前
		foreach ($list as $key => $val) {
			if(strtotime($val["up_date"]) < strtotime($target_day)){ // 更新日が30日以前
				// 更新
				unset($item);
				$item["up_date"] = date('Y-m-d H:i:s');
				$item["item_id"] = $val["item_id"];
				Item::updateData($item["item_id"], $item);
				
			}
		}
	}
	
}
