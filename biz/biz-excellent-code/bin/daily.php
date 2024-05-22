<?php
require_once(realpath(dirname(__FILE__) . "/../") . "/lib/config.php");
require_once("item.php");
require_once("user.php");
require_once("access.php");

$inst = DBConnection::getConnection($DB_URI);
/*
$sql = "update `item` set oubo=(select count(*) from oubo where item_id=item.item_id) WHERE 1";
$inst->db_exec($sql);
$sql = "update user set count=(select count(*) from oubo where user_id=user.user_id) where 1";
$inst->db_exec($sql);
$sql = "update station set count=(select count(*) from search where kind='station' and value=station.station_cd) where 1";
$inst->db_exec($sql);
$sql = "update address set count=(select count(*) from search where kind='kinmu_city' and value=address.city_cd) where 1";
$inst->db_exec($sql);
*/
// 昨日のアクセス集計
$t = time() - 60 * 60 * 24;
//$t = strtotime('2016-10-31');
$d = date('Y-m-d', $t);
$rec["access_date"] = $d;
$rec["kind"] = 2;
$ret = Access::findData($rec);
if (!$ret) {
	Access::addData($rec);
}

$sql = "update access a, (select count(*) as cnt from access where access_date='{$d}' and kind=1) b set a.count=b.cnt where access_date='{$d}' and kind=2";
$inst->db_exec($sql);
$sql = "delete from access where kind=1 and access_date='{$d}'";
//$inst->db_exec($sql);
// 前月のアクセス集計
if (date('d') == 1) {
	$y = date('Y', $t);
	$m = date('m', $t);
	$d = date('Y-m-1', $t);	// 前月1日
	$rec["access_date"] = $d;
	$rec["kind"] = 3;
	$ret = Access::findData($rec);
	if (!$ret) {
		Access::addData($rec);
	}
	$sql = "update access a, (select sum(count) as cnt from access where year(access_date)={$y} and month(access_date)={$m} and kind=2) b set a.count=b.cnt where access_date='{$d}' and kind=3";
	$inst->db_exec($sql);
	$sql = "delete from access where kind=2 and access_date='{$d}'";
	//$inst->db_exec($sql);
}
