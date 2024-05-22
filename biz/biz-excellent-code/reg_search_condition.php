<?php

error_reporting(0);
// クラス
require_once("common.php");
require_once("formcheck.php");

// クラスの生成
$ap = new Application();

$contact_check = array(
	array("a_vals", "*", "", false, "エリア"),
	array("t_vals", "*", "", false, "都道府県"),
	array("c_vals", "*", "", false, "市町村"),
	array("s_vals", "*", "", false, "職種"),
	array("k_vals", "*", "", false, "雇用形態"),
	array("x_vals", "*", "", false, "こだわり条件"),
	array("a_condition", "*", "", false, "エリア hidden"),
	array("t_condition", "*", "", false, "都道府県 hidden"),
	array("c_condition", "*", "", false, "市町村 hidden"),
	array("mail", "*", "", false, "メールアドレス"),
);

$form = FormCheck::get_form($contact_check, $_REQUEST);


if( empty($form['a_vals']) and 
	empty($form['t_vals']) and
	empty($form['c_vals']) and
	empty($form['s_vals']) and
	empty($form['k_vals']) and
	empty($form['x_vals']) and
	empty($form['a_condition'])  and
	empty($form['t_condition'])  and
	empty($form['c_condition'])  
){
		$list = array("res" => "-1" , "error_msg" => "検索条件が選択されていません");
}else{
	// ///////////////////////////////////////////////////////////////
	// エリアの取得
	if(empty($form["a_vals"])){
		$form["a_vals"] = $form["a_condition"];
	}
	
	// ///////////////////////////////////////////////////////////////
	// 都道府県
	if(empty($form["t_vals"])){
		$form["t_vals"] = $form["t_condition"];
	}
	
	// ///////////////////////////////////////////////////////////////
	// 市町村
	if(empty($form["c_vals"])){
		$form["c_vals"] = $form["c_condition"];
	}
	
	$sql = "select count(*) as count from serch_condition where ";
	$sql .= "`mail` = '" . $form['mail'] . "'";
	$sql .= " and  `a_vals` = '" . $form['a_vals'] . "'";
	$sql .= " and  `t_vals` = '" . $form['t_vals'] . "'";
	$sql .= " and  `c_vals` = '" . $form['c_vals'] . "'";
	$sql .= " and  `s_vals` = '" . $form['s_vals'] . "'";
	$sql .= " and  `k_vals` = '" . $form['k_vals'] . "'";
	$sql .= " and  `x_vals` = '" . $form['x_vals'] . "'";
	$sql .= " and  `send_flg` = " . 0 . ";";
	$ret = $ap->inst->search_sql($sql);
	
	if ($ret["data"]) {
		foreach ($ret["data"] as $val) {
			$cnt = $val["count"];
		}
	}
	
	
	if( $cnt > 0 ){
	
		$list = array("res" => "-1" , "error_msg" => "登録済みの条件です");
	
	}else{
	
		$sql = "insert into serch_condition (`mail`,`a_vals`,`t_vals`,`c_vals`,`s_vals`,`k_vals`,`x_vals`,`up_date` )";
		$sql .= " VALUES (";
		$sql .= "'" . $form['mail'] . "'";
		$sql .= ", '" . $form['a_vals'] . "'";
		$sql .= ", '" . $form['t_vals'] . "'";
		$sql .= ", '" . $form['c_vals'] . "'";
		$sql .= ", '" . $form['s_vals'] . "'";
		$sql .= ", '" . $form['k_vals'] . "'";
		$sql .= ", '" . $form['x_vals'] . "'";
		$sql .= ", DATE_FORMAT( NOW(), '%Y-%m-%d 00:00:00')";
		$sql .= ");";
		
		$ap->inst->db_exec($sql);
	
		$list = array("res" => "0");
	}
}			
			  
header("Content-type: application/json; charset=UTF-8");
echo json_encode($list);
exit;