<?php


//error_reporting(0);
// クラス
chdir(dirname(__FILE__));
echo "cron run<br/><br/>";
require_once( "common.php");

// クラスの生成
$ap = new Application();


$sql = "SELECT * FROM serch_condition WHERE send_flg = 0";
$ret = $ap->inst->search_sql($sql);

$list = $ret["data"];

if ($ret["count"]) {
	foreach ($list as $val) {
		
		//$sql = "SELECT * FROM item reg_date >= '" . $val["reg_date"] . "' and status = 1 ";
		$serch_sql  = "select * from item where status = '1' and ";
		$serch_sql .= "(reg_date >= '" . $val["up_date"] . "' or up_date >= '" . $val["up_date"] . "') ";
		
		/* -- sql sample -- 
		select * from item where status = '1' and 
		(reg_date >= '2021-08-16 00:00:00' or up_date >= '2021-08-16 00:00:00') 
		and kinmu_pref in (21,22,23,24) 
		and kinmu_pref in (23) 
		and kinmu_city in (231011) 
		and item_id in (select distinct item_id from search where kind = 'syokusyu' and value in (3)) 
		and item_id in (select distinct item_id from search where kind = 'koyou' and value in (1))
		*/

		//$db = new Item();
		//$db->search[] = array("field" => "status", "value" => "1", "cond" => "=");
		//$db->search[] = array("field" => "reg_date", "value" => $val["reg_date"], "cond" => ">=");
		//$where_keyword[] = array("field" => "reg_date", "value" => $val["up_date"], "cond" => ">=", "relation" => "or");
		//$where_keyword[] = array("field" => "up_date", "value" => $val["up_date"], "cond" => ">=", "relation" => "or");
		//$db->search[] = array("nest" => $where_keyword);

		// エリア
		$pref_data = array();
		$area = explode(",", $val["a_vals"]);
		foreach ($area as $val2) {
			//$area_name[] = $area_list[$val];
			foreach ($area_pref_list[$val2] as $val3) {
				unset($rec);
				//$rec["pref_cd"] = $val3;
				$pref_data[] = $val3;
			}
		}
		
		if( count($pref_data)  > 0 ){
			//$sql .= " AND kinmu_pref in (" . implode(",", $pref_data ) . ")";
			//$db->search[] = array("field" => "kinmu_pref", "value" => implode(",", $pref_data) , "cond" => "in");
			$serch_sql .= " and kinmu_pref in (" . implode(",", $pref_data)  . ")"; 
		}

		//　都道府県
		if( !empty($val["t_vals"]) ){
			//$sql .= " AND kinmu_pref in (" . $val["t_vals"] . ")";
			//$db->search[] = array("field" => "kinmu_pref", "value" => $val["t_vals"], "cond" => "in");
			$serch_sql .= " and kinmu_pref in (" . $val["t_vals"]  . ")"; 
		}
		
		// 市町村
		if( !empty($val["c_vals"]) ){
			//$sql .= " AND kinmu_city in (" . $val["c_vals"]  . ")";
			//$db->search[] = array("field" => "kinmu_city", "value" => $val["c_vals"], "cond" => "in");
			$serch_sql .= " and kinmu_city in (" . $val["c_vals"]  . ")"; 
		}

		// 職種
		if( !empty($val["s_vals"]) ){
			//$sql .= " AND syokusyu in (" . $val["s_vals"] . ")";
			//$where_s[] = array("field" => "kind", "value" => "syokusyu", "cond" => "=");
			//$where_s[] = array("field" => "value", "value" => $val["s_vals"] , "cond" => "in");
			//$db->search[] = array("field" => "item_id", "cond" => "in",
			//	"select" => array("table" => "search", "where" => $where_s, "fields" => array("distinct item_id")));
			$serch_sql .= " and item_id in (select distinct item_id from search where kind = 'syokusyu' and value in ( " . $val["s_vals"] . "))"; 
		}
				
		// 雇用形態
		if( !empty($val["k_vals"]) ){
			//$sql .= " AND koyou in (" .  $val["k_vals"] . ")";
			//$where_k[] = array("field" => "kind", "value" => "koyou", "cond" => "=");
			//$where_k[] = array("field" => "value", "value" => $val["k_vals"] , "cond" => "in");
			//$db->search[] = array("field" => "item_id", "cond" => "in",
			//	"select" => array("table" => "search", "where" => $where_k, "fields" => array("distinct item_id")));
			$serch_sql .= " and item_id in (select distinct item_id from search where kind = 'koyou' and value in ( " . $val["k_vals"] . "))"; 
		}

		$serch_ret = $ap->inst->search_sql($serch_sql);
		//$count = $db->getCount();
		//$mail_list = $db->getList();
		
		if( $serch_ret["count"] ){
			
			$info["item"] = $serch_ret["data"];
			template_mail($val["mail"], "mail9_subject", "mail9_body",
			array("info" => $info , "seq" => $val["seq"] ) );
						
			$sql = "update serch_condition set up_date = NOW() where seq = " . $val["seq"] . ";";
			$ap->inst->db_exec($sql);
	
//echo $sql;
//exit;
//			$ret2 = $ap->inst->search_sql($sql);

		}
	}
}
exit;