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
);

$form = FormCheck::get_form($contact_check, $_REQUEST);


// ///////////////////////////////////////////////////////////////
// エリアの取得
if(empty($form["a_vals"])){
	$form["a_vals"] = $form["a_condition"];
}
$array = explode(",",$form["a_vals"]);

$pref = "";
foreach($array as $val) {
	$val = intval($val);
	$pref .= "<li>$area_list[$val]</li>";
}
if( $pref == "" || $pref == "<li></li>"){
	$pref = '<li>未選択</li>';
}

// ///////////////////////////////////////////////////////////////
// 都道府県
if(empty($form["t_vals"])){
	$form["t_vals"] = $form["t_condition"];
}

if($form["t_vals"]){
	$array = explode(",",$form["t_vals"]);
	$pref = "";
	foreach($array as $val) {
		$val = intval($val);
		$pref .= "<li>$pref_list[$val]</li>";
	}
	if( $pref == "" || $pref == "<li></li>"){
		$pref = '<li>未選択</li>';
	}
}

// ///////////////////////////////////////////////////////////////
// 市町村
if(empty($form["c_vals"])){
	$form["c_vals"] = $form["c_condition"];
}

if($form["c_vals"]){
	$array = explode(",",$form["c_vals"]);
	$pref = "";
	foreach($array as $val) {

		$sql = "SELECT distinct city_cd,city FROM address WHERE city_cd={$val} and city is not null and city<>'' order by city_cd asc";
		$ret = $ap->inst->search_sql($sql);

		$list = $ret["data"];

		if ($list) {

			foreach ($list as $val) {
				$pref .= "<li>" . $val["city"] . "</li>";
				//echo "'" . $val["city_cd"] . "':'" . $val["city"] . "',";
			}
		}
	}
	
	if( $pref == "" || $pref == "<li></li>"){
		$pref = '<li>未選択</li>';
	}
}


		
// ///////////////////////////////////////////////////////////////
// 職種
$array = explode(",",$form["s_vals"]);

$mstSyokusyu = array();
$sql = "select * from master where kind=" . MAST_SYOKUSYU . " order by item_id";
$ret = $ap->inst->search_sql($sql);
if ($ret["data"]) {
	foreach ($ret["data"] as $val) {
		$mstSyokusyu[$val["item_id"]] = $val["contents"];
	}
}

$syokusyu = "";
foreach($array as $val) {
	$val = intval($val);
	$syokusyu .= "<li>$mstSyokusyu[$val]</li>";
}
if( $syokusyu == "" || $syokusyu == "<li></li>"){
	$syokusyu = '<li>未選択</li>';
}

// ///////////////////////////////////////////////////////////////
// 雇用形態
$array = explode(",",$form["k_vals"]);

$mstKoyou = array();
$sql = "select * from master where kind=" . MAST_KOYOU . " order by item_id";
$ret = $ap->inst->search_sql($sql);
if ($ret["data"]) {
	foreach ($ret["data"] as $val) {
		$mstKoyou[$val["item_id"]] = $val["contents"];
	}
}

$koyou = "";
foreach($array as $val) {
	$val = intval($val);
	$koyou .= "<li>$mstKoyou[$val]</li>";
}
if( $koyou == "" || $koyou == "<li></li>"){
	$koyou = '<li>未選択</li>';
}


// ///////////////////////////////////////////////////////////////
// こだわり条件
$array = explode(",",$form["x_vals"]);

$kodawari_list = array();
$sql = "select * from master where kind=" . MAST_KODAWARI1 . " order by item_id";
$ret = $ap->inst->search_sql($sql);
if ($ret["data"]) {
	foreach ($ret["data"] as $val) {
		$kodawari_list[$val["item_id"]] = $val["contents"];
	}
}
	
$kodawari = "";
foreach($array as $val) {
	$val = intval($val);
	$kodawari .= "<li>$kodawari_list[$val]</li>";
}
if( $kodawari == "" || $kodawari == "<li></li>"){
	$kodawari = '<li>未選択</li>';
}


$list = array("pref" => $pref, 
			  "syokusyu" => $syokusyu, 
			  "koyou" => $koyou, 
			  "kodawari" => $kodawari, 
			  );
			  
header("Content-type: application/json; charset=UTF-8");
echo json_encode($list);
exit;