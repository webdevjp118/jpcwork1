<?php
function smarty_function_info_list( $params, &$smarty ){
	require('../class/dbClass.php');
	$dbClass = new dbClass;
	
	$res = $dbClass->cntDentos();
	$row = $res->fetchRow(DB_FETCHMODE_ASSOC);
	$dentos_cnt = $row['dentos_cnt'];
	
	$res = $dbClass->cntOffer();
	$row = $res->fetchRow(DB_FETCHMODE_ASSOC);
	$offer_cnt = $row['offer_cnt'];
	
	$res = $dbClass->cntUser();
	$row = $res->fetchRow(DB_FETCHMODE_ASSOC);
	$user_cnt = $row['user_cnt'];
	
	$smarty->assign($params['dentos_cnt'], $dentos_cnt);
	$smarty->assign($params['offer_cnt'], $offer_cnt);
	$smarty->assign($params['user_cnt'], $user_cnt);
}
?>

