<?php
error_reporting(0);
// クラス
require_once("common.php");
require_once("formcheck.php");

// クラスの生成
$ap = new Application();

// -----------------------------------
// AJAX
// Area -> Pref
if ($ap->act == "get_pref") {
	echo "{";
	$id = $_REQUEST["id"];
	if ($_REQUEST["use"]) {
		$sql = "select pref_cd,sum(`count`) as cnt from address where count>0 group by pref_cd";
		$ret = $ap->inst->search_sql($sql);
		if ($ret["count"]) {
			foreach ($ret["data"] as $val) {
				$pref = intval($val["pref_cd"]);
				echo "'" . $pref . "':'" . $pref_list[$pref] . "',";
			}
		}
	} else {
		$list = $area_pref_list[$id];
		if ($list) {
			foreach ($list as $val) {
				echo "'" . $val . "':'" . $pref_list[$val] . "',";
			}
		}
	}
	echo "'':''}";
	exit;
}
// Pref -> City
if ($ap->act == "get_city") {
	$id = $_REQUEST["id"];
	if ($id) {
		if ($_REQUEST["use"]) {
			$sql = "SELECT distinct city_cd,city FROM address WHERE substring(city_cd, 1, 2)={$id} and city is not null and city<>'' and and count>0 order by city_cd asc";
		} else {
			$sql = "SELECT distinct city_cd,city FROM address WHERE substring(city_cd, 1, 2)={$id} and city is not null and city<>'' order by city_cd asc";
		}
		$ret = $ap->inst->search_sql($sql);
		$list = $ret["data"];
	}
	echo "{";
	if ($list) {
		foreach ($list as $val) {
			echo "'" . $val["city_cd"] . "':'" . $val["city"] . "',";
		}
	}
	echo "'':''}";
	exit;
}
// Area -> Rosen
if ($ap->act == "get_rosen") {
	$id = $_REQUEST["id"];
	if ($id) {
		if ($_REQUEST["use"]) {
			$sql = "select line_cd,line_name from station where pref_cd in (" . implode(",", $area_pref_list[$id]) . ") and count>0 group by line_cd";
		} else {
			$sql = "select line_cd,line_name from station where pref_cd in (" . implode(",", $area_pref_list[$id]) . ") group by line_cd";
		}
		$ret = $ap->inst->search_sql($sql);
		$list = $ret["data"];
	}
	echo "{";
	if ($list) {
		foreach ($list as $val) {
			echo "'" . $val["line_cd"] . "':'" . $val["line_name"] . "',";
		}
	}
	echo "'':''}";
	exit;
}
// Pref -> Rosen
if ($ap->act == "get_rosen2") {
	$id = $_REQUEST["id"];
	if ($id) {
		if ($_REQUEST["use"]) {
			$sql = "select line_cd,line_name from station where pref_cd={$id} and count>0 group by line_cd";
		} else {
			$sql = "select line_cd,line_name from station where pref_cd={$id} group by line_cd";
		}
		$ret = $ap->inst->search_sql($sql);
		$list = $ret["data"];
	}
	echo "{";
	if ($list) {
		foreach ($list as $val) {
			echo "'" . $val["line_cd"] . "':'" . $val["line_name"] . "',";
		}
	}
	echo "'':''}";
	exit;
}
// Rosen -> Station
if ($ap->act == "get_station") {
	$id = $_REQUEST["id"];
	if ($id) {
		if ($_REQUEST["use"]) {
			$sql = "select station_cd,station_name from station where line_cd={$id} and count>0";
		} else {
			$sql = "select station_cd,station_name from station where line_cd={$id}";
		}
		$ret = $ap->inst->search_sql($sql);
		$list = $ret["data"];
	}
	echo "{";
	if ($list) {
		foreach ($list as $val) {
			echo "'" . $val["station_cd"] . "':'" . $val["station_name"] . "',";
		}
	}
	echo "'':''}";
	exit;
}

$ap->set("top", TOP);
// -----------------------------------
// ログイン
if ($ap->act == "login") {
	if ($_REQUEST["mode"] == "form") {
		if ($_REQUEST["email"] && $_REQUEST["passwd"]) {
			$cond["email"] = $_REQUEST["email"];
			$cond["passwd"] = $_REQUEST["passwd"];
			$cond["status"] = "1";	// 会員登録
			$ret = User::findData($cond);
			if ($ret) {
				unset($_SESSION["KENTOU_COUNT"]);
				$_SESSION["LOGIN"] = $ret[0];
				if ($_REQUEST["autologin"]) {
					// ログイン情報のCookieへの保存
					setLoginCookie($_SESSION["LOGIN"]["email"], $_SESSION["LOGIN"]["user_id"], LOGIN_COOKIE);
				}
				if ($_SESSION['NEXT_URL']) {
					header("location: " . $_SESSION['NEXT_URL']);
					unset($_SESSION['NEXT_URL']);
				} else {
					header("location: ./user-edit.html");
				}
				exit;
			}
			$msg[] = "「メールアドレス」または「パスワード」が違います！";
		} else {
			if (!$_REQUEST["email"]) {
				$msg[] = "「メールアドレス」欄が未入力になっています。 ";
			}
			if (!$_REQUEST["passwd"]) {
				$msg[] = "「パスワード」欄が未入力になっています。 ";
			}
		}
		$form["email"] = $_REQUEST["email"];
		$form["passwd"] = $_REQUEST["passwd"];
		$ap->set("msg", $msg);
		$ap->set("form", $form);
	}
	unset($_SESSION["LOGIN"]);
}
if ($ap->act == "password") {
	if ($_REQUEST["mode"]) {
		if ($_REQUEST["email"]) {
			$cond["email"] = $_REQUEST["email"];
			$cond["status"] = "1";	// 会員登録
			$ret = User::findData($cond);
			if ($ret) {
				// メール送信
				template_mail($_REQUEST["email"], "mail1_subject", "mail1_body", array("passwd" => $ret[0]["passwd"], "name" => $ret[0]["name"]));
				$msg[] = "パスワードをメールで送信しました。";
				$ap->template = "password-thankyou.html";
			} else {
				$msg[] = "該当するメールアドレスがありません。 ";
			}
		} else {
			$msg[] = "「メールアドレス」欄が未入力になっています。 ";
		}
	}
	$ap->set("msg", $msg);
	$ap->set("form", $form);
}
if (!$_SESSION["ACCESS"][$_SERVER["REQUEST_URI"]]) {
	$_SESSION["ACCESS"][$_SERVER["REQUEST_URI"]] = "1";
	add_access($_SERVER["REQUEST_URI"]);
}
// -----------------------------------
if (!isset($_SESSION["mast_syokusyu"])) {
	$list = array();
	$sql = "select * from master where kind=" . MAST_SYOKUSYU . " order by item_id";
	$ret = $ap->inst->search_sql($sql);
	if ($ret["data"]) {
		foreach ($ret["data"] as $val) {
			$rec["id"] = $val["item_id"];
			$rec["name"] = $val["contents"];
			$list[$val["item_id"]] = $rec;
		}
	}
	$_SESSION["mast_syokusyu"] = $list;
	// 利用されている職種
	$list2 = array();
	$sql = "select value from search where kind='syokusyu' and item_id IS NOT NULL group by value order by abs(value)";
	$ret = $ap->inst->search_sql($sql);
	if ($ret["data"]) {
		foreach ($ret["data"] as $val) {
			$id = $val["value"];
			$rec["id"] = $id;
			$rec["name"] = $list[$id]["name"];
			$list2[$id] = $rec;
		}
	}
	$_SESSION["use_syokusyu"] = $list2;
}
$ap->set("mast_syokusyu", $_SESSION["mast_syokusyu"]);
//
if (!isset($_SESSION["mast_koyou"])) {
	$list = array();
	$sql = "select * from master where kind=" . MAST_KOYOU . " order by item_id";
	$ret = $ap->inst->search_sql($sql);
	if ($ret["data"]) {
		foreach ($ret["data"] as $val) {
			$rec["id"] = $val["item_id"];
			$rec["name"] = $val["contents"];
			if ($rec["name"]) {
				$list[$val["item_id"]] = $rec;
			}
		}
	}
	$_SESSION["mast_koyou"] = $list;
	// 利用されている雇用形態
	$list2 = array();
	$sql = "select value from search where kind='koyou' and item_id IS NOT NULL group by value order by abs(value)";
	$ret = $ap->inst->search_sql($sql);
	if ($ret["data"]) {
		foreach ($ret["data"] as $val) {
			$id = $val["value"];
			$rec["id"] = $id;
			$rec["name"] = $list[$id]["name"];
			if ($rec["name"]) {
				$list2[$id] = $rec;
			}
		}
	}
	$_SESSION["use_koyou"] = $list2;
}
$ap->set("mast_koyou", $_SESSION["mast_koyou"]);
//
if (!isset($_SESSION["mast_kodawari1"])) {
	$list = array();
	$sql = "select * from master where kind=" . MAST_KODAWARI1 . " order by item_id";
	$ret = $ap->inst->search_sql($sql);
	if ($ret["data"]) {
		foreach ($ret["data"] as $val) {
			$rec["id"] = $val["item_id"];
			$rec["name"] = $val["contents"];
			if ($rec["name"]) {
				$list[$val["item_id"]] = $rec;
			}
		}
	}
	$_SESSION["mast_kodawari1"] = $list;
	// 利用されているこだわり１
	$list2 = array();
	$sql = "select value from search where kind='kodawari1' and item_id IS NOT NULL group by value order by abs(value)";
	$ret = $ap->inst->search_sql($sql);
	if ($ret["data"]) {
		foreach ($ret["data"] as $val) {
			$id = $val["value"];
			$rec["id"] = $id;
			$rec["name"] = $list[$id]["name"];
			if ($rec["name"]) {
				$list2[$id] = $rec;
			}
		}
	}
	$_SESSION["use_kodawari1"] = $list2;
}
$ap->set("mast_kodawari1", $_SESSION["mast_kodawari1"]);
//
if (!isset($_SESSION["mast_kodawari2"])) {
	$list = array();
	$sql = "select * from master where kind=" . MAST_KODAWARI2 . " order by item_id";
	$ret = $ap->inst->search_sql($sql);
	if ($ret["data"]) {
		foreach ($ret["data"] as $val) {
			$rec["id"] = $val["item_id"];
			$rec["name"] = $val["contents"];
			if ($rec["name"]) {
				$list[$val["item_id"]] = $rec;
			}
		}
	}
	$_SESSION["mast_kodawari2"] = $list;
	// 利用されているこだわり2
	$list2 = array();
	$sql = "select value from search where kind='kodawari2' and item_id IS NOT NULL group by value order by abs(value)";
	$ret = $ap->inst->search_sql($sql);
	if ($ret["data"]) {
		foreach ($ret["data"] as $val) {
			$id = $val["value"];
			$rec["id"] = $id;
			$rec["name"] = $list[$id]["name"];
			if ($rec["name"]) {
				$list2[$id] = $rec;
			}
		}
	}
	$_SESSION["use_kodawari2"] = $list2;
}
$ap->set("mast_kodawari2", $_SESSION["mast_kodawari2"]);
//
if (!isset($_SESSION["mast_kodawari3"])) {
	$list = array();
	$sql = "select * from master where kind=" . MAST_KODAWARI3 . " order by item_id";
	$ret = $ap->inst->search_sql($sql);
	if ($ret["data"]) {
		foreach ($ret["data"] as $val) {
			$rec["id"] = $val["item_id"];
			$rec["name"] = $val["contents"];
			if ($rec["name"]) {
				$list[$val["item_id"]] = $rec;
			}
		}
	}
	$_SESSION["mast_kodawari3"] = $list;
	// 利用されているこだわり3
	$list2 = array();
	$sql = "select value from search where kind='kodawari3' and item_id IS NOT NULL group by value order by abs(value)";
	$ret = $ap->inst->search_sql($sql);
	if ($ret["data"]) {
		foreach ($ret["data"] as $val) {
			$id = $val["value"];
			$rec["id"] = $id;
			$rec["name"] = $list[$id]["name"];
			if ($rec["name"]) {
				$list2[$id] = $rec;
			}
		}
	}
	$_SESSION["use_kodawari3"] = $list2;
}
$ap->set("mast_kodawari3", $_SESSION["mast_kodawari3"]);
//
// -----------------------------------
if ($_SESSION["LOGIN"]) {
	$ap->set("login", $_SESSION["LOGIN"]);
}
if ($_SESSION["AUTH_LOGIN"]) {
	$ap->set("manager", $_SESSION["AUTH_LOGIN"]);	// 管理者ログイン中
}
// -----------------------------------
if ($ap->act == "contents") {
	$page = $_REQUEST["p"];

	$db = new Contents();
	// $db->search[] = array("field" => "kind", "value" => $kind, "cond" => "=");
	$db->search[] = array("field" => "status", "value" => "1", "cond" => "=");
	// $db->order[] = array("field" => "contents_date", "desc" => "1");
	$db->order[] = array("field" => "reg_date", "desc" => "1");

	$db->page = $page;
	$db->limit = PAGE_ITEMS;
	$count = $db->getCount();
	$pages = intval(($count + $db->limit - 1) / $db->limit);
	if ($pages > 1) {
		$ap->set("pager", page_index2($page, $pages, 10));
	}
	$list = $db->getList();
	$ap->set(array("total" => $count, "start" => $page * $db->limit + 1, "end" => $page * $db->limit + count($list)));

	if ($list) {
		$ap->set("list", $list);
		// $ap->set("category", $contents_kind_list[$kind]);
	} else {
		header("location: ./contents.html");
		exit;
	}
}
if ($ap->act == "contents-category") {

	//alternate用
	$myurl2 = (empty($_SERVER["HTTPS"]) ? "http://" : "https://"). "sp.". $_SERVER["HTTP_HOST"]. $_SERVER["REQUEST_URI"];
	$ap->set("myurl2", $myurl2);

	$kind = $_REQUEST["keyword"];
	$page = $_REQUEST["p"];

	//半角英字が含まれている場合、カテゴリIDに置き換える
	if (preg_match("/[a-zA-Z]/", $kind)) {
		foreach ($contents_kind_url_list as $key => $value) {
			if($kind == $value){
				$kind = $key;
				break;
			}
		}
	}

	$db = new Contents();
	if($kind){
		$db->search[] = array("field" => "kind", "value" => $kind, "cond" => "=");
	}
	$db->search[] = array("field" => "status", "value" => "1", "cond" => "=");
	$db->order[] = array("field" => "contents_date", "desc" => "1");

	$db->page = $page;
	$db->limit = PAGE_ITEMS;
	$count = $db->getCount();
	$pages = intval(($count + $db->limit - 1) / $db->limit);
	if ($pages > 1) {
		$ap->set("pager", page_index2($page, $pages, 10));
	}
	$list = $db->getList();
	$ap->set(array("total" => $count, "start" => $page * $db->limit + 1, "end" => $page * $db->limit + count($list)));

	if ($list) {
		$list2 = array();
		foreach ($list as $val) {
			$val["kind_v"] = $val["kind"];
			$val["kind"] = $contents_kind_list[$val["kind"]];
			$val["kind_url"] = $contents_kind_url_list[$val["kind_v"]];
			$list2[] = $val;
		}
		$ap->set("list", $list2);
		$ap->set("category", $contents_kind_list[$kind]);
		$ap->set("category_url", $contents_kind_url_list[$kind]);
	} else {
		header("location: ./contents.html");
		exit;
	}
}
if ($ap->act == "contents-detail") {

	$_id = $_REQUEST["id"];

	//alternate用
	$myurl2 = (empty($_SERVER["HTTPS"]) ? "http://" : "https://"). "sp.". $_SERVER["HTTP_HOST"]. $_SERVER["REQUEST_URI"];
	$ap->set("myurl2", $myurl2);

	//urlが入っている場合は、url文字列からIDを取得する
	if($_REQUEST["url"]){
		$cond['url'] = $_REQUEST["url"];
		$ret = Contents::findData($cond);
		if ($ret) {
			foreach ($ret as $val) {
				$_id = $val["seq"];
				break;
			}
		}else{
			//該当するページがない場合は、contents.htmlページへ遷移
			header("location: ./contents.html");
		}
	}

	$info = Contents::getData($_id);
	if ($info && (($info["status"] == "1")||$_SESSION["AUTH_LOGIN"])) {
		$info["kind_name"] = $contents_kind_list[$info["kind"]];
		$info["kind_url"] = $contents_kind_url_list[$info["kind"]];
		$info['text1'] = htmlspecialchars_decode($info['text1']);
		$info['text2'] = htmlspecialchars_decode($info['text2']);
		$info['text3'] = htmlspecialchars_decode($info['text3']);
		$info['text4'] = htmlspecialchars_decode($info['text4']);
		$info['text5'] = htmlspecialchars_decode($info['text5']);

		$contents_editor_list = array();
		$sql = "SELECT * FROM contents_editor where contents_id=" . $_id . " order by seq ASC";
		$ret = $ap->inst->search_sql($sql);
		if ($ret["data"]) {
			$d_val = array();
			foreach ($ret["data"] as $key => $d) {
				if($d['name'] == 'editor_list'){
					//リストの場合は、text1を改行で分解
					$d_val[] = array('seq'=>$d['seq'],'contents_id' => $d['seq'],'name' => $d['name'],'text1' => explode("\n", $d['text1']));
				}else{
					$d_val[] = $d;
				}
				// $contents_editor_list[] = $d;
			}
			$contents_editor_list = $d_val;
		}

		$ap->set("info", $info);
		$ap->set("info_editor", $contents_editor_list);

	} else {
		header("location: ./");
		exit;
	}
}
// -----------------------------------
// コンサルタント問合せ処理
if ($ap->act == "consultant") {

$consultant_check = array(
	// フォーム項目名 文字種 最大文字数 必須 表示名称
	array("mode", "*", "", false, "モード"),
	array("name", "*", "", true, "お名前"),
 	array("name_kana", "*", "", true, "お名前ふりがな"),
 	array("zip1", "N", "", false, "住所 郵便番号1"),
 	array("zip2", "N", "", false, "住所 郵便番号2"),
 	array("pref", "N", "", false, "住所 都道府県"),
 	array("city", "*", "", false, "住所 市区町村"),
 	array("address1", "*", "", false, "住所 番地まで"),
 	array("address2", "*", "", false, "住所 建物名・階数"),
 	array("birthday_year", "N", "", true, "生年月日"),
 	array("birthday_month", "N", "", true, "生年月日"),
 	array("birthday_day", "N", "", true, "生年月日"),
 	array("shikaku", "*", "", false, "保有資格"),
 	array("tel", "TEL", "", true, "連絡先"),
 	array("email", "MAIL", "", false, "メールアドレス"),
 	array("keitai", "*", "", false, "希望勤務形態"),
 	array("jiki", "*", "", false, "希望入職時期"),
 	array("biko", "*", "", false, "備考・メモ"),
 	array("confirm", "*", "", false, "利用規約"),
 	array("item_id", "*", "", false, "ID"),
);

	if ($_REQUEST["mode"]) {
		$form = FormCheck::get_form($consultant_check, $_REQUEST);
		$msg = FormCheck::check($form, $consultant_check);
		$img = form_image("image", $msg, $img_type, IMAGE_MAX);
		if ($img) {
			$form["image"] = $img;
		} else {
		//	$msg["image"] = "画像が指定されていません。";
		}
		if ($form["confirm"]) {
			if ($form["confirm"] != "1") {
				$msg["confirm"] = "利用規約にご同意いただけない場合は登録できません";
			}
		}
		if ($msg) {
			foreach ($msg as $key => $v) {
				$data["error"][$key] = $v;
			}
			$ap->set("msg", $msg);
		} else {
			// $_SESSION["form"] = $form;
			// $form = disp_user($form);
			// 保存
			$item["name"] = $form["name"];
			$item["name_kana"] = $form["name_kana"];
			$item["zip"] = $form["zip1"] . "-" . $form["zip2"];
			$item["pref"] = $form["pref"];
			$item["city"] = $form["city"];
			$item["address1"] = $form[""];
			$item["address2"] = $form[""];
			$item["birthday"] = $form["birthday_year"] . "-" . $form["birthday_month"] . "-" . $form["birthday_day"];
			$item["shikaku"] = $form["shikaku"];
			$item["tel"] = $form["tel"];
			$item["email"] = $form["email"];
			$item["keitai"] = $form["keitai"];
			$item["jiki"] = $form["jiki"];
			$item["biko"] = $form["biko"];
			$item["status"] = "0";	// 問合せ
			$item['regist'] = "0";
			$item['up_date'] = "now()";
			$user_id = User::addData($item);
			// メール送信
			$info["date"] = date('Y/m/d');
			if ($form["item_id"]) {
				// 求人への応募の場合
				$rec["item_id"] = $form["item_id"];
				$rec["user_id"] = $user_id;
				$rec["kind"] = "1";	// 応募
				$rec["up_date"] = "now()";
				$oubo_id = Oubo::addData($rec);
				$info["id"] = $oubo_id;
				// 応募数設定
				$item_id = $form["item_id"];
				$sql = "update item set oubo=(select count(*) from oubo where item_id={$item_id}) where item_id={$item_id}";
				$ap->inst->db_exec($sql);
				$sql = "update user set count=(select count(*) from oubo where user_id={$user_id}) where user_id={$user_id}";
				$ap->inst->db_exec($sql);
			} else {
				// 問合せのみの場合
				$rec["item_id"] = "0";
				$rec["user_id"] = $user_id;
				$rec["kind"] = "2";	// 問合せ
				$rec["up_date"] = "now()";
				Oubo::addData($rec);
			}
			
			template_mail($form["email"], "mail4_subject", "mail4_body",
				array("info" => $info, "form" => disp_user($form), "name" => $form["name"]), "manager");


			$ap->template = "consultant-thankyou.html";
		}
	} else {
		unset($_SESSION["form"]);
		if ($_SESSION["LOGIN"]) {
			$form = $_SESSION["LOGIN"];
			$ary = explode("-", $form["zip"]);
			$form["zip1"] = $ary[0];
			$form["zip2"] = $ary[1];
			$ary = explode("-", $form["birthday"]);
			$form["birthday_year"] = $ary[0];
			$form["birthday_month"] = $ary[1];
			$form["birthday_day"] = $ary[2];
			$form["shikaku"] = multi_value($form["shikaku"]);
		}
		if ($_REQUEST["id"]) {
			$form["item_id"] = $_REQUEST["id"];
		}
	}
	$ap->set("form", $form);
}
if ($ap->act == "consultant-reinput") {
	// 再入力
	$ap->template = "consultant.html";
	$form = $_SESSION["form"];
	unset($_SESSION["form"]);
	$form["shikaku"] = multi_value($form["shikaku"]);
	$ap->set("form", $form);
}
if ($ap->act == "consultant-thankyou") {

}
// -----------------------------------
if ($ap->act == "detail") {

	//どこから遷移してきたか確認
	$ref = $_SERVER['HTTP_REFERER'];
	//Indeedから遷移してきた場合は、sessionにセット
	if(strpos($ref,'indeed.com') !== false){
		$_SESSION["REFERER_INDEED"] = 1;
	}

	$id = $_REQUEST["id"];
	$item = Item::getData($id);
	if ($item) {
		if ((!$_SESSION["AUTH_LOGIN"])&&($item["status"] != "1")) {
			// 非公開、管理者以外は閲覧不可
			header("location: /");
			exit;
		}elseif(preg_match('|(\d+)$|', $_SERVER["REQUEST_URI"], $m)){
			// 末尾にスラッシュがない場合、スラッシュを付けてリダイレクト
			header("location: ./{$m[1]}/");
			exit;
		}
/*
		$cond["city"] = $item["kinmu_city"];
		$ret = Address::findData($cond);
		if ($ret) {
			$item["kinmu_city_v"] = $ret[0]["city_cd"];
		}
*/
		$item["kinmu_city_v"] = $item["kinmu_city"];
		$item["kentou"] = is_kentou($id);	// 検討リストに入っているか？

		$koyou_list = $item["koyou"];
		$koyou_tag = "";
		foreach ($koyou_list as $key => $val) {
			if($val == 1){$koyou_tag = $koyou_tag. '"FULL_TIME",';}//正社員
			if($val == 2){$koyou_tag = $koyou_tag. '"TEMPORARY",';}//派遣社員
			if($val == 3){$koyou_tag = $koyou_tag. '"PART_TIME",';}//アルバイト
			if($val == 4){$koyou_tag = $koyou_tag. '"PART_TIME",';}//パート

		}
		$koyou_tag = rtrim($koyou_tag, ',');
		$ap->set("koyou_tag", $koyou_tag);

		// コンサルからの一言追加　start
		$file = file_get_contents(__DIR__ . '/consul.txt');
		$consuls = explode("\n", $file);
		
		$arr_consuls = array();
		foreach($consuls as $consul){
			if(!empty($consul)){
				$arr_consuls[] = $consul;
			}
		}
		
		$cnt = count($arr_consuls);
		$num = ( $id % $cnt ) == 0 ? $cnt - 1 : ( $id % $cnt ) - 1;
		

		$item["consult"] = $arr_consuls[$num];
		// コンサルからの一言追加　end
		
		$ap->set("info", disp_item($item));

		$host = (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"];
		$ap->set("host", $host);

		//alternate用
		$sp_host = (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . "sp." . $_SERVER["HTTP_HOST"];
		$ap->set("sp_host", $sp_host);
		//

		// 他の人の見た求人5件
			// 同じ都道府県×同じ市区×同じ職種	：$item['kinmu_pref'] x $item['kinmu_city'] x $item['syokusyu']
			$sql1 = "SELECT * FROM item
							WHERE kinmu_pref = ".$item['kinmu_pref']."
							AND kinmu_city = ".$item['kinmu_city']."
							AND syokusyu = ".$item['syokusyu']." AND item_id != ".$item['item_id']." LIMIT 0, 5;";
			// 同じ都道府県×同じ職種	：$item['kinmu_pref'] x $item['syokusyu']
			$sql2 = "SELECT * FROM item
							WHERE kinmu_pref = ".$item['kinmu_pref']."
							AND syokusyu = ".$item['syokusyu']." AND item_id != ".$item['item_id']." LIMIT 0, 5;";
			// 同じ市区	：$item['kinmu_city']
			$sql3 = "SELECT * FROM item
							WHERE kinmu_city = ".$item['kinmu_city']." AND item_id != ".$item['item_id']." LIMIT 0, 5;";
			// 同じ都道府県	：$item['kinmu_pref']
			$sql4 = "SELECT * FROM item
							WHERE kinmu_pref = ".$item['kinmu_pref']." AND item_id != ".$item['item_id']." LIMIT 0, 5;";
			// 同じ職種	：$item['syokusyu']
			$sql5 = "SELECT * FROM item
							WHERE syokusyu = ".$item['syokusyu']." AND item_id != ".$item['item_id']." LIMIT 0, 5;";
			//ランダム
			$sql6 = "SELECT * FROM item ORDER BY RAND() LIMIT 0, 5;";
		//$sql = "select distinct item_id2 from view where item_id1={$id} order by count desc limit 0, 5";


		$ret1 = $ap->inst->search_sql($sql1);
		$ret2 = $ap->inst->search_sql($sql2);
		$ret3 = $ap->inst->search_sql($sql3);
		$ret4 = $ap->inst->search_sql($sql4);
		$ret5 = $ap->inst->search_sql($sql5);
		$ret6 = $ap->inst->search_sql($sql6);
		// $ret = array_merge($ret1["data"],$ret2["data"],$ret3["data"],$ret4["data"],$ret5["data"]);
		$ret = array();
		if($ret1["data"]){
			$ret = array_merge($ret, $ret1["data"]);
		}
		if($ret2["data"]){
			$ret = array_merge($ret, $ret2["data"]);
		}
		if($ret3["data"]){
			$ret = array_merge($ret, $ret3["data"]);
		}
		if($ret4["data"]){
			$ret = array_merge($ret, $ret4["data"]);
		}
		if($ret5["data"]){
			$ret = array_merge($ret, $ret5["data"]);
		}
		if($ret6["data"]){
			$ret = array_merge($ret, $ret6["data"]);
		}
		// $ret = array_merge($ret1["data"],$ret2["data"],$ret3["data"]);
		$ret = array_slice($ret , 0, 6);

		$list = array();
		foreach ($ret as $val) {
			$v = Item::getData($val["item_id"]);
			if ($v && ($v["status"] == "1")) {
				$list[$v["item_id"]] = disp_item($v);
			}
		}
		$ap->set("view", $list);

		// コンサルタントがおススメ
		$sql = "select * from item where recommend=1 order by reg_date desc limit 0, 5";
		$ret = $ap->inst->search_sql($sql);
		if ($ret["count"]) {
			$list = array();
			foreach ($ret["data"] as $val) {
				if ($val["status"] == "1") {
					$list[] = disp_item($val);
				}
			}
			$ap->set("recommend", $list);
		}
		//
		last_view($id);
	} else {
		header("location: /");
		exit;
	}
	$ap->set("url", TOP_URL);
}
// -----------------------------------
if ($ap->act == "detail-contact") {
$consultant_check = array(
	// フォーム項目名 文字種 最大文字数 必須 表示名称
	array("mode", "*", "", false, "モード"),
	array("name", "*", "", true, "氏名"),
 	array("name_kana", "*", "", true, "カナ"),
 	array("zip1", "N", "", false, "住所 郵便番号1"),
 	array("zip2", "N", "", false, "住所 郵便番号2"),
 	array("pref", "N", "", false, "住所 都道府県"),
 	array("city", "*", "", false, "住所 市区町村"),
 	array("address1", "*", "", false, "住所 番地まで"),
 	array("address2", "*", "", false, "住所 建物名・階数"),
 	array("birthday_year", "N", "", true, "生年月日・年"),
 	array("birthday_month", "N", "", true, "生年月日・月"),
 	array("birthday_day", "N", "", true, "生年月日・日"),
 	array("shikaku", "*", "", false, "保有資格"),
 	array("tel", "TEL", "", true, "電話番号"),
 	array("email", "MAIL", "", true, "メールアドレス"),
// 	array("email2", "MAIL", "", true, "メールアドレス確認用"),
// 	array("passwd", "*", "", false, "パスワード"),
// 	array("passwd2", "*", "", true, "パスワード確認用"),
 	array("keitai", "*", "", false, "ご希望の勤務形態"),
 	array("jiki", "*", "", false, "就職可能な時期"),
 	array("ymd01_year", "N", "", false, "ymd01・年"),
 	array("ymd01_month", "N", "", false, "ymd01・月"),
 	array("ymd01_day", "N", "", false, "ymd01・日"),
 	array("ymd02_year", "N", "", false, "ymd02・年"),
 	array("ymd02_month", "N", "", false, "ymd02・月"),
 	array("ymd02_day", "N", "", false, "ymd02・日"),
 	array("ymd03_year", "N", "", false, "ymd03・年"),
 	array("ymd03_month", "N", "", false, "ymd03・月"),
 	array("ymd03_day", "N", "", false, "ymd03・日"),
 	array("textarea01", "*", "", false, "textarea01"),
 	array("textarea02", "*", "", false, "textarea02"),
 	array("textarea03", "*", "", false, "textarea03"),
 	array("textarea04", "*", "", false, "textarea04"),
 	array("textarea05", "*", "", false, "textarea05"),
 	array("textarea06", "*", "", false, "textarea06"),
 	array("textarea07", "*", "", false, "textarea07"),
 	array("textarea08", "*", "", false, "textarea08"),
 	array("textarea09", "*", "", false, "textarea09"),
 	array("textarea10", "*", "", false, "textarea10"),
 	array("text01", "*", "", false, "LINE ID"),
 	array("text02", "*", "", false, "text02"),
 	array("text03", "*", "", false, "text03"),
 	array("text04", "*", "", false, "text04"),
 	array("text05", "*", "", false, "text05"),
 	array("text06", "*", "", false, "text06"),
 	array("text07", "*", "", false, "text07"),
 	array("text08", "*", "", false, "text08"),
 	array("text09", "*", "", false, "text09"),
 	array("text10", "*", "", false, "text10"),
 	array("radio01", "*", "", true, "性別"),
 	array("radio02", "*", "", false, "radio02"),
 	array("radio03", "*", "", false, "radio03"),
 	array("radio04", "*", "", false, "radio04"),
 	array("radio05", "*", "", false, "radio05"),
 	array("check01", "*", "", false, "保有資格"),
 	array("check02", "*", "", false, "check02"),
 	array("check03", "*", "", false, "check03"),
 	array("check04", "*", "", false, "check04"),
 	array("check05", "*", "", false, "check05"),
//	array("file01", "*", "", false, "file01"),
//	array("file02", "*", "", false, "file02"),
//	array("file03", "*", "", false, "file03"),
//	array("file04", "*", "", false, "file04"),
//	array("file05", "*", "", false, "file05"),
 	array("select01", "*", "", false, "select01"),
 	array("select02", "*", "", false, "select02"),
 	array("select03", "*", "", false, "select03"),
 	array("select04", "*", "", false, "select04"),
 	array("select05", "*", "", false, "select05"),
 	array("biko", "*", "", false, "備考・メモ"),
 	array("confirm", "*", "", false, "利用規約"),
 	array("regist", "*", "", false, "会員登録"),
 	array("passwd", "*", "", false, "パスワード"),
 	array("item_list", "*", "", false, "ID"),
 	array("kind", "*", "", false, ""),
);

	if ($_REQUEST["mode"]) {
		$form = FormCheck::get_form($consultant_check, $_REQUEST);
		$msg = FormCheck::check($form, $consultant_check);
		$img = form_image("image", $msg, $img_type, IMAGE_MAX);
		if ($img) {
			$form["image"] = $img;
		} else {
		//	$msg["image"] = "画像が指定されていません。";
		}
		$file = form_file("file01", $msg, $img_type, IMAGE_MAX);
		if ($file) {
			$form["file01"] = $file;
		} else {
		//	$msg["file01"] = "ファイルが指定されていません。";
		}
		$file = form_file("file02", $msg, $img_type, IMAGE_MAX);
		if ($file) {
			$form["file02"] = $file;
		} else {
		//	$msg["file02"] = "ファイルが指定されていません。";
		}
		$file = form_file("file03", $msg, $img_type, IMAGE_MAX);
		if ($file) {
			$form["file03"] = $file;
		} else {
		//	$msg["file03"] = "ファイルが指定されていません。";
		}
		$file = form_file("file04", $msg, $img_type, IMAGE_MAX);
		if ($file) {
			$form["file04"] = $file;
		} else {
		//	$msg["file04"] = "ファイルが指定されていません。";
		}
		$file = form_file("file05", $msg, $img_type, IMAGE_MAX);
		if ($file) {
			$form["file05"] = $file;
		} else {
		//	$msg["file05"] = "ファイルが指定されていません。";
		}
		if($_SESSION["REFERER_INDEED"]){
			$form["text10"] = $_SESSION["REFERER_INDEED"];
		}

		if ($form["regist"]) {
			if ($form["email"]) {
				$cond["email"] = $form["email"];
				$cond["status"] = "1";
				$cond["regist"] = "1";
				$ret = User::findData($cond);
				if ($ret) {
					$msg["email"] = "このメールアドレスは利用できません。";
				}
			} else {
				$msg["email"] = "メールアドレスが入力されていません。";
			}
			if ($form["passwd"] == "") {
				$msg["passwd"] = "パスワードを入力してください。";
			}
		}
		if ($form["confirm"]) {
			if ($form["confirm"] != "1") {
				$msg["confirm"] = "利用規約にご同意いただけない場合は登録できません";
			}
		}
		
		if ($msg) {
			foreach ($msg as $key => $v) {
				$data["error"][$key] = $v;
			}
			$ap->set("msg", $msg);
			$form["kodawari"] = multi_value($form["kodawari"]);
			$form["syokusyu"] = multi_value($form["syokusyu"]);
			$form["koyou"] = multi_value($form["koyou"]);
			$form["check01"] = multi_value($form["check01"]);
			$form["check02"] = multi_value($form["check02"]);
			$form["check03"] = multi_value($form["check03"]);
			$form["check04"] = multi_value($form["check04"]);
			$form["check05"] = multi_value($form["check05"]);
		} else {
			// $_SESSION["form"] = $form;
			// $form = disp_user($form);
			$ap->template = "detail-contact-thankyou.html";
			if ($form["kind"] == "item") {
				$item = Item::getData($form["item_list"][0]);
				$item["kinmu_city_v"] = $item["kinmu_city"];
				$ap->set("info", disp_item($item));
			}

			if ($form["item_list"]) {
				$list = array();
				$top = array();
				foreach ($form["item_list"] as $val) {
					$item = Item::getData($val);
					if (!$top) {
						$top = $item;
					}
					$list[] = disp_item($item);
				}
				$ap->set("list", $list);
				if ($top) {
					$top["kinmu_city_v"] = $top["kinmu_city"];
					$ap->set("info", disp_item($top));
				}
				$ap->set("form", $form);
			}
			// 保存
			unset($item);
			$item["name"] = $form["name"];
			$item["name_kana"] = $form["name_kana"];
			$item["zip"] = $form["zip1"] . "-" . $form["zip2"];
			$item["pref"] = $form["pref"];
			$item["city"] = $form["city"];
			$item["address1"] = $form["address1"];
			$item["address2"] = $form["address2"];
			$item["birthday"] = $form["birthday_year"] . "-" . $form["birthday_month"] . "-" . $form["birthday_day"];
			$item["shikaku"] = $form["shikaku"];
			$item["tel"] = $form["tel"];
			$item["email"] = $form["email"];
			$item["keitai"] = $form["keitai"];
			$item["jiki"] = $form["jiki"];
			$item['ymd01'] = $form["ymd01_year"] . "-" .$form["ymd01_month"] . "-" . $form["ymd01_day"];
			$item['ymd02'] = $form["ymd02_year"] . "-" .$form["ymd02_month"] . "-" . $form["ymd02_day"];
			$item['ymd03'] = $form["ymd03_year"] . "-" .$form["ymd03_month"] . "-" . $form["ymd03_day"];
			$item['textarea01'] = $form["textarea01"];
			$item['textarea02'] = $form["textarea02"];
			$item['textarea03'] = $form["textarea03"];
			$item['textarea04'] = $form["textarea04"];
			$item['textarea05'] = $form["textarea05"];
			$item['textarea06'] = $form["textarea06"];
			$item['textarea07'] = $form["textarea07"];
			$item['textarea08'] = $form["textarea08"];
			$item['textarea09'] = $form["textarea09"];
			$item['textarea10'] = $form["textarea10"];
			$item['text01'] = $form["text01"];
			$item['text02'] = $form["text02"];
			$item['text03'] = $form["text03"];
			$item['text04'] = $form["text04"];
			$item['text05'] = $form["text05"];
			$item['text06'] = $form["text06"];
			$item['text07'] = $form["text07"];
			$item['text08'] = $form["text08"];
			$item['text09'] = $form["text09"];
			$item['text10'] = $form["text10"];
			$item['radio01'] = $form["radio01"];
			$item['radio02'] = $form["radio02"];
			$item['radio03'] = $form["radio03"];
			$item['radio04'] = $form["radio04"];
			$item['radio05'] = $form["radio05"];
			$item['check01'] = $form["check01"];
			$item['check02'] = $form["check02"];
			$item['check03'] = $form["check03"];
			$item['check04'] = $form["check04"];
			$item['check05'] = $form["check05"];
			$item['file01'] = $form["file01"];
			$item['file02'] = $form["file02"];
			$item['file03'] = $form["file03"];
			$item['file04'] = $form["file04"];
			$item['file05'] = $form["file05"];
			$item['select01'] = $form["select01"];
			$item['select02'] = $form["select02"];
			$item['select03'] = $form["select03"];
			$item['select04'] = $form["select04"];
			$item['select05'] = $form["select05"];
			$item['biko'] = $form["biko"];
			if ($_SESSION["LOGIN"]) {
				$user_id = $_SESSION["LOGIN"]["user_id"];
				$item['up_date'] = "now()";
				User::updateData($user_id, $item);
			} else {
				$item["regist"] = $form["regist"];
				if ($form["regist"]) {
					$item["passwd"] = $form["passwd"];
					$item['status'] = "1";	// 会員登録
				} else {
					$item['status'] = "0";	// 会員登録しない
				}
				$item['up_date'] = "now()";
				$user_id = User::addData($item);
			}
			// メール送信
			/*
			応募日：{$info.date}
			求人タイトル：{$info.title}
			求人ページ：{$info.url}
			求人No：{$info.info_id}
			応募No：{$info.oubo_id}
			*/
			$info["date"] = date('Y/m/d');
			$items = array();
			if ($form["item_list"]) {
				// 特定の求人への問合せの場合（応募）
				foreach ($form["item_list"] as $item_id) {
					$rec["item_id"] = $item_id;
					$rec["user_id"] = $user_id;
					$rec["kind"] = "1";	// 応募
					$rec["up_date"] = "now()";
					$oubo_id = Oubo::addData($rec);
					// 応募数設定
					$sql = "update item set oubo=(select count(*) from oubo where item_id={$item_id}) where item_id={$item_id}";
					$ap->inst->db_exec($sql);
					$sql = "update user set count=(select count(*) from oubo where user_id={$user_id}) where user_id={$user_id}";
					$ap->inst->db_exec($sql);
					//
					$i = Item::getData($item_id);
					unset($v);
					$v["title"] = $i["title"];
					$v["info_id"] = $item_id;
					$v["oubo_id"] = $oubo_id;
					array_push($items, $v);
					
					//$items[] = $v;

					//求人に営業所が設定されている場合は、営業所にもメールを送信する
					if($i["branch_id"]){
						$b = Branch::getData($i["branch_id"]);
						if($b && $b["email"]){
							template_mail($b["email"], "mail2_subject", "mail2_body",
								array("info" => $info, "form" => disp_user($form), "name" => $form["name"]));
						}

					}
				}
				// 求人エントリーありがとうございました
				$info["item"] = $items;
				template_mail($form["email"], "mail2_subject", "mail2_body",
					array("info" => $info, "form" => disp_user($form), "name" => $form["name"]));
					
			} else {
				// 求人を特定しない相談の場合
				$rec["item_id"] = "0";
				$rec["user_id"] = $user_id;
				$rec["kind"] = "2";	// 相談
				$rec["up_date"] = "now()";
				Oubo::addData($rec);
				
				// コンサルタントへの相談ありがとうございました
				template_mail($form["email"], "mail7_subject", "mail7_body",
					array("info" => $info, "form" => disp_user($form), "name" => $form["name"]), "manager");

			}
			//reCAPTCHA 設定
			$site_key = '6LeExAAaAAAAAHxjx5S6kG6h4VF4MVQ31_Xz48Xi';
			$secret_key = '6LeExAAaAAAAAOMxv8ieI55yYNCZGCWCMdg7Ocq-';

			//reCAPTCHA トークン
			$token = "";
			if (!empty($_POST[ 'g-recaptcha-response' ])) {
			$token = $_POST[ 'g-recaptcha-response' ];
			}

			if ( !empty($token) ) {

				//cURLでrecaptchaにアクセス
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
				curl_setopt($ch, CURLOPT_POST, true );
				//POSTパラメタ
				curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(
					'secret' => $secret_key,
					'response' => $token
				)));
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // curl_exec() 経由で応答データを直接取得(文字列)できるようにする

				//結果取得
				$res = curl_exec($ch);
				curl_close($ch);

				//レスポンスのjsonをデコードし取得
				$result = json_decode( $res );
				if ( $result->success  ) {   				
						
					$info["item"] = $items;
					template_mail($form["email"], "mail2_subject", "mail2_body",
					array("info" => $info, "form" => disp_user($form), "name" => $form["name"]), "manager");
				} else {
						if ($ap->act == "detail-contact") {
							$form =	$_SESSION["form"];
							unset($_SESSION["form"]);
							$ap->set("form", $form);
							$ap->template = "detail-contact.html";
						}
				}
			}
			//reCAPTCHA 設定ここまで
				
		}
	} else {
		if ($_SESSION["LOGIN"]) {
			$form = $_SESSION["LOGIN"];
			$form["shikaku"] = multi_value($form["shikaku"]);
			$form["check01"] = multi_value($form["check01"]);
			$form["check02"] = multi_value($form["check02"]);
			$form["check03"] = multi_value($form["check03"]);
			$form["check04"] = multi_value($form["check04"]);
			$form["check05"] = multi_value($form["check05"]);
			$ary = explode("-", $form["zip"]);
			$form["zip1"] = $ary[0];
			$form["zip2"] = $ary[1];
			$ary = explode("-", $form["birthday"]);
			$form["birthday_year"] = $ary[0];
			$form["birthday_month"] = $ary[1];
			$form["birthday_day"] = $ary[2];
			$ary = explode("-", $form["ymd01"]);
			$form["ymd01_year"] = $ary[0];
			$form["ymd01_month"] = $ary[1];
			$form["ymd01_day"] = $ary[2];
			$ary = explode("-", $form["ymd02"]);
			$form["ymd02_year"] = $ary[0];
			$form["ymd02_month"] = $ary[1];
			$form["ymd02_day"] = $ary[2];
			$ary = explode("-", $form["ymd03"]);
			$form["ymd03_year"] = $ary[0];
			$form["ymd03_month"] = $ary[1];
			$form["ymd03_day"] = $ary[2];
		}
		if ($_REQUEST["id"]) {
			// 個別案件問合せ
			$form["item_list"][] = $_REQUEST["id"];
			$form["kind"] = "item";
			$item = Item::getData($_REQUEST["id"]);
			if(!$item){
				header("location: /");
				exit;
			}
			$item["kinmu_city_v"] = $item["kinmu_city"];
			$ap->set("info", disp_item($item));
		} else if ($_REQUEST["kentou"]) {
			// 検討リストに問合せ
			$form["kind"] = "kentou";
			if ($_SESSION["KENTOU"]) {
				foreach ($_SESSION["KENTOU"] as $val) {
					$form["item_list"][] = $val;
				}
			}
		} else if ($_SESSION["LOGIN"]) {
			$form["kind"] = "pickup";
			// ピックアップに問合せ
			$page = $_REQUEST["page"];
			$db = new Pickup();
			$db->search[] = array("field" => "user_id", "value" => $_SESSION["LOGIN"]["user_id"], "cond" => "=");
			$db->order[] = array("field" => "reg_date", "desc" => "1");
			$db->page = $page;
			$db->limit = PAGE_ITEMS;
			$list = $db->getList();
			if ($list) {
				foreach ($list as $val) {
					$form["item_list"][] = $val["item_id"];
				}
			}
		}
	}

// 他の人の見た求人5件
			// ①同じ市町村/同じ職種が一致 :: 同じ都道府県×同じ市区×同じ職種	：$item['kinmu_pref'] x $item['kinmu_city'] x $item['syokusyu']
			$sql1 = "SELECT * FROM item
							WHERE kinmu_pref = ".$item['kinmu_pref']."
							AND kinmu_city = ".$item['kinmu_city']."
							AND syokusyu = ".$item['syokusyu']." AND item_id != ".$item['item_id'].";";//" LIMIT 0, 6;";
			// ②同じ都道府県/同じ職種が一致 :: 同じ都道府県×同じ職種	：$item['kinmu_pref'] x $item['syokusyu']
			$sql2 = "SELECT * FROM item
							WHERE kinmu_pref = ".$item['kinmu_pref']."
							AND syokusyu = ".$item['syokusyu']." AND item_id != ".$item['item_id'].";";//" LIMIT 0, 6;";
			// ③同じ市町村のみ/全職種が一致  :: 同じ市区	：$item['kinmu_city']
			$sql3 = "SELECT * FROM item
							WHERE kinmu_city = ".$item['kinmu_city']." AND item_id != ".$item['item_id'].";";//" LIMIT 0, 6;";
			// ④同じ都道府県のみ/全職種が一致 :: 同じ都道府県	：$item['kinmu_pref']
			$sql4 = "SELECT * FROM item
							WHERE kinmu_pref = ".$item['kinmu_pref']." AND item_id != ".$item['item_id'].";";//" LIMIT 0, 6;";

			// 同じ職種	：$item['syokusyu']
			$sql5 = "SELECT * FROM item
							WHERE syokusyu = ".$item['syokusyu']." AND item_id != ".$item['item_id']." LIMIT 0, 5;";
			//ランダム
			$sql6 = "SELECT * FROM item ORDER BY RAND() LIMIT 0, 5;";
		//$sql = "select distinct item_id2 from view where item_id1={$id} order by count desc limit 0, 5";


		$ret1 = $ap->inst->search_sql($sql1);
		$ret2 = $ap->inst->search_sql($sql2);
		$ret3 = $ap->inst->search_sql($sql3);
		$ret4 = $ap->inst->search_sql($sql4);
		// $ret5 = $ap->inst->search_sql($sql5);
		// $ret6 = $ap->inst->search_sql($sql6);
		// $ret = array_merge($ret1["data"],$ret2["data"],$ret3["data"],$ret4["data"],$ret5["data"]);
		$ret = array();
		if($ret1["data"]){
			$ret = array_merge($ret, $ret1["data"]);
		}
		if($ret2["data"]){
			$ret = array_merge($ret, $ret2["data"]);
		}
		if($ret3["data"]){
			$ret = array_merge($ret, $ret3["data"]);
		}
		if($ret4["data"]){
			$ret = array_merge($ret, $ret4["data"]);
		}
// var_dump($ret);
		// if($ret5["data"]){
		// 	$ret = array_merge($ret, $ret5["data"]);
		// }
		// if($ret6["data"]){
		// 	$ret = array_merge($ret, $ret6["data"]);
		// }
		// $ret = array_merge($ret1["data"],$ret2["data"],$ret3["data"]);
		// $ret = array_slice($ret , 0, 6);

		$list = array();
		foreach ($ret as $val) {
			$v = Item::getData($val["item_id"]);
			if ($v && ($v["status"] == "1")) {
				$list[$v["item_id"]] = disp_item($v);
			}
		}
		$ap->set("view", $list);

	if ($form["item_list"]) {
		$list = array();
		foreach ($form["item_list"] as $val) {
			$item = Item::getData($val);
			$list[] = disp_item($item);
		}
		$ap->set("list", $list);
	}
	$ap->set("form", $form);
}
if ($ap->act == "detail-contact-reinput") {
	// 再入力
	$ap->template = "detail-contact.html";
	$form = $_SESSION["form"];
	unset($_SESSION["form"]);
	$ap->set("form", $form);
	if ($form["item_list"]) {
		$top = array();
		$list = array();
		foreach ($form["item_list"] as $val) {
			$item = Item::getData($val);
			if (!$top) {
				$top = $item;
			}
			$list[] = disp_item($item);
		}
		if ($top) {
			$top["kinmu_city_v"] = $top["kinmu_city"];
			$ap->set("info", disp_item($top));
		}
		$ap->set("list", $list);
	}
}
if ($ap->act == "detail-contact-thankyou") {

}
// -----------------------------------
if ($ap->act == "register") {
$register_check = array(
	// フォーム項目名 文字種 最大文字数 必須 表示名称
	array("mode", "*", "", false, "モード"),
	array("name", "*", "", true, "会員名"),
 	array("name_kana", "*", "", true, "会員名ふりがな"),
 	array("zip1", "N", "", false, "住所 郵便番号1"),
 	array("zip2", "N", "", false, "住所 郵便番号2"),
 	array("pref", "N", "", false, "住所 都道府県"),
 	array("city", "*", "", false, "住所 市区町村"),
 	array("address1", "*", "", false, "住所 番地まで"),
 	array("address2", "*", "", false, "住所 建物名・階数"),
 	array("birthday_year", "N", "", true, "生年月日・年"),
 	array("birthday_month", "N", "", true, "生年月日・月"),
 	array("birthday_day", "N", "", true, "生年月日・日"),
 	array("shikaku", "*", "", false, "保有資格"),
 	array("tel", "TEL", "", true, "連絡先"),
 	array("email", "MAIL", "", true, "メールアドレス"),
 	array("email2", "MAIL", "", true, "メールアドレス確認用"),
 	array("passwd", "*", "", true, "パスワード"),
 	array("passwd2", "*", "", true, "パスワード確認用"),
 	array("keitai", "*", "", true, "希望勤務形態"),
 	array("jiki", "*", "", true, "希望入職時期"),
 	array("ymd01_year", "N", "", false, "ymd01・年"),
 	array("ymd01_month", "N", "", false, "ymd01・月"),
 	array("ymd01_day", "N", "", false, "ymd01・日"),
 	array("ymd02_year", "N", "", false, "ymd02・年"),
 	array("ymd02_month", "N", "", false, "ymd02・月"),
 	array("ymd02_day", "N", "", false, "ymd02・日"),
 	array("ymd03_year", "N", "", false, "ymd03・年"),
 	array("ymd03_month", "N", "", false, "ymd03・月"),
 	array("ymd03_day", "N", "", false, "ymd03・日"),
 	array("textarea01", "*", "", false, "textarea01"),
 	array("textarea02", "*", "", false, "textarea02"),
 	array("textarea03", "*", "", false, "textarea03"),
 	array("textarea04", "*", "", false, "textarea04"),
 	array("textarea05", "*", "", false, "textarea05"),
 	array("textarea06", "*", "", false, "textarea06"),
 	array("textarea07", "*", "", false, "textarea07"),
 	array("textarea08", "*", "", false, "textarea08"),
 	array("textarea09", "*", "", false, "textarea09"),
 	array("textarea10", "*", "", false, "textarea10"),
 	array("text01", "*", "", false, "text01"),
 	array("text02", "*", "", false, "text02"),
 	array("text03", "*", "", false, "text03"),
 	array("text04", "*", "", false, "text04"),
 	array("text05", "*", "", false, "text05"),
 	array("text06", "*", "", false, "text06"),
 	array("text07", "*", "", false, "text07"),
 	array("text08", "*", "", false, "text08"),
 	array("text09", "*", "", false, "text09"),
 	array("text10", "*", "", false, "text10"),
 	array("radio01", "*", "", false, "radio01"),
 	array("radio02", "*", "", false, "radio02"),
 	array("radio03", "*", "", false, "radio03"),
 	array("radio04", "*", "", false, "radio04"),
 	array("radio05", "*", "", false, "radio05"),
 	array("check01", "*", "", false, "check01"),
 	array("check02", "*", "", false, "check02"),
 	array("check03", "*", "", false, "check03"),
 	array("check04", "*", "", false, "check04"),
 	array("check05", "*", "", false, "check05"),
//	array("file01", "*", "", false, "file01"),
//	array("file02", "*", "", false, "file02"),
//	array("file03", "*", "", false, "file03"),
//	array("file04", "*", "", false, "file04"),
//	array("file05", "*", "", false, "file05"),
 	array("select01", "*", "", false, "select01"),
 	array("select02", "*", "", false, "select02"),
 	array("select03", "*", "", false, "select03"),
 	array("select04", "*", "", false, "select04"),
 	array("select05", "*", "", false, "select05"),
 	array("biko", "*", "", false, "備考・メモ"),
 	array("confirm", "*", "", false, "利用規約"),
);

	if ($_REQUEST["mode"]) {
		$form = FormCheck::get_form($register_check, $_REQUEST);
		$msg = FormCheck::check($form, $register_check);
		$file = form_file("file01", $msg, $img_type, IMAGE_MAX);
		if ($file) {
			$form["file01"] = $file;
		} else {
		//	$msg["file01"] = "ファイルが指定されていません。";
		}
		$file = form_file("file02", $msg, $img_type, IMAGE_MAX);
		if ($file) {
			$form["file02"] = $file;
		} else {
		//	$msg["file02"] = "ファイルが指定されていません。";
		}
		$file = form_file("file03", $msg, $img_type, IMAGE_MAX);
		if ($file) {
			$form["file03"] = $file;
		} else {
		//	$msg["file03"] = "ファイルが指定されていません。";
		}
		$file = form_file("file04", $msg, $img_type, IMAGE_MAX);
		if ($file) {
			$form["file04"] = $file;
		} else {
		//	$msg["file04"] = "ファイルが指定されていません。";
		}
		$file = form_file("file05", $msg, $img_type, IMAGE_MAX);
		if ($file) {
			$form["file05"] = $file;
		} else {
		//	$msg["file05"] = "ファイルが指定されていません。";
		}
		if ($form["email"] && $form["email2"]) {
			if ($form["email"] == $form["email2"]) {
				$cond["email"] = $form["email"];
				$cond["status"] = "1";
				$ret = User::findData($cond);
				if ($ret) {
					$msg["email"] = "このメールアドレスは利用できません。";
				}
			} else {
				$msg["email"] = "メールアドレスが一致していません。";
			}
		}
		if ($form["passwd"] && $form["passwd2"]) {
			if ($form["passwd"] != $form["passwd2"]) {
				$msg["passwd"] = "パスワードが一致していません。";
			}
		}
		if ($form["confirm"]) {
			if ($form["confirm"] != "1") {
				$msg["confirm"] = "利用規約にご同意いただけない場合は登録できません";
			}
		}
		if ($msg) {
			foreach ($msg as $key => $v) {
				$data["error"][$key] = $v;
			}
			$ap->set("msg", $msg);
			$form["shikaku"] = multi_value($form["shikaku"]);
			$form["check01"] = multi_value($form["check01"]);
			$form["check02"] = multi_value($form["check02"]);
			$form["check03"] = multi_value($form["check03"]);
			$form["check04"] = multi_value($form["check04"]);
			$form["check05"] = multi_value($form["check05"]);
		} else {
			$_SESSION["form"] = $form;
			$form = disp_user($form);
			$ap->template = "register-confirm.html";
		}
	} else {
		unset($_SESSION["form"]);
		$form = User::getData($_REQUEST["id"]);
		$form["email2"] = $form["email"];
		$form["passwd2"] = $form["passwd"];
		$form["shikaku"] = multi_value($form["shikaku"]);
		$form["check01"] = multi_value($form["check01"]);
		$form["check02"] = multi_value($form["check02"]);
		$form["check03"] = multi_value($form["check03"]);
		$form["check04"] = multi_value($form["check04"]);
		$form["check05"] = multi_value($form["check05"]);
	}
	$ap->set("form", $form);
}
if ($ap->act == "register-reinput") {
	// 再入力
	$ap->template = "register.html";
	$form = $_SESSION["form"];
	unset($_SESSION["form"]);
	$form["shikaku"] = multi_value($form["shikaku"]);
	$form["check01"] = multi_value($form["check01"]);
	$form["check02"] = multi_value($form["check02"]);
	$form["check03"] = multi_value($form["check03"]);
	$form["check04"] = multi_value($form["check04"]);
	$form["check05"] = multi_value($form["check05"]);
	$ap->set("form", $form);
}
if ($ap->act == "register-thankyou") {
	if ($_REQUEST["reinput_x"]) {
		$form =	$_SESSION["form"];
		unset($_SESSION["form"]);
		$ap->set("form", $form);
		$ap->template = "register.html";
	} else if ($_SESSION["form"]) {
	// 保存
		$form = $_SESSION["form"];
		unset($_SESSION["form"]);
		// 保存
		$item["name"] = $form["name"];
		$item["name_kana"] = $form["name_kana"];
		$item["zip"] = $form["zip1"] . "-" . $form["zip2"];
		$item["pref"] = $form["pref"];
		$item["city"] = $form["city"];
		$item["address1"] = $form["address1"];
		$item["address2"] = $form["address2"];
		$item["birthday"] = $form["birthday_year"] . "-" . $form["birthday_month"] . "-" . $form["birthday_day"];
		$item["tel"] = $form["tel"];
		$item["email"] = $form["email"];
		$item["passwd"] = $form["passwd"];
		$item["keitai"] = $form["keitai"];
		$item["shikaku"] = $form["shikaku"];
		$item["jiki"] = $form["jiki"];
		$item["ymd01"] = $form["ymd01_year"] . "-" . $form["ymd01_month"] . "-" . $form["ymd01_day"];
		$item["ymd02"] = $form["ymd02_year"] . "-" . $form["ymd02_month"] . "-" . $form["ymd02_day"];
		$item["ymd03"] = $form["ymd03_year"] . "-" . $form["ymd03_month"] . "-" . $form["ymd03_day"];
		$item["textarea01"] = $form["textarea01"];
		$item["textarea02"] = $form["textarea02"];
		$item["textarea03"] = $form["textarea03"];
		$item["textarea04"] = $form["textarea04"];
		$item["textarea05"] = $form["textarea05"];
		$item["textarea06"] = $form["textarea06"];
		$item["textarea07"] = $form["textarea07"];
		$item["textarea08"] = $form["textarea08"];
		$item["textarea09"] = $form["textarea09"];
		$item["textarea10"] = $form["textarea10"];
		$item["text01"] = $form["text01"];
		$item["text02"] = $form["text02"];
		$item["text03"] = $form["text03"];
		$item["text04"] = $form["text04"];
		$item["text05"] = $form["text05"];
		$item["text06"] = $form["text06"];
		$item["text07"] = $form["text07"];
		$item["text08"] = $form["text08"];
		$item["text09"] = $form["text09"];
		$item["text10"] = $form["text10"];
		$item["radio01"] = $form["radio01"];
		$item["radio02"] = $form["radio02"];
		$item["radio03"] = $form["radio03"];
		$item["radio04"] = $form["radio04"];
		$item["radio05"] = $form["radio05"];
		$item["check01"] = $form["check01"];
		$item["check02"] = $form["check02"];
		$item["check03"] = $form["check03"];
		$item["check04"] = $form["check04"];
		$item["check05"] = $form["check05"];
		$item["file01"] = $form["file01"];
		$item["file02"] = $form["file02"];
		$item["file03"] = $form["file03"];
		$item["file04"] = $form["file04"];
		$item["file05"] = $form["file05"];
		$item["select01"] = $form["select01"];
		$item["select02"] = $form["select02"];
		$item["select03"] = $form["select03"];
		$item["select04"] = $form["select04"];
		$item["select05"] = $form["select05"];
		$item["biko"] = $form["biko"];
		$item["regist"] = "1";	// 会員登録
		$item['status'] = "1";
		$item['up_date'] = "now()";
		$id = User::addData($item);
		// メール送信
		template_mail($form["email"], "mail3_subject", "mail3_body", array("id" => $id, "form" => disp_user($form), "name" => $form["name"]), "manager");
	}
}

if ($ap->act == "release") {

	if ($_REQUEST["id"]) {
		$sql = "update serch_condition set send_flg = 1 , up_date = NOW() where seq = " . $_REQUEST["id"] . ";";
		$ap->inst->db_exec($sql);
	}
	
	$ap->template = "release.html";
}

// -----------------------------------
if ($ap->act == "user-edit") {
	login_check();

$register_check = array(
	// フォーム項目名 文字種 最大文字数 必須 表示名称
	array("mode", "*", "", false, "モード"),
	array("name", "*", "", true, "会員名"),
 	array("name_kana", "*", "", true, "会員名ふりがな"),
 	array("zip1", "N", "", false, "住所 郵便番号1"),
 	array("zip2", "N", "", false, "住所 郵便番号2"),
 	array("pref", "N", "", false, "住所 都道府県"),
 	array("city", "*", "", false, "住所 市区町村"),
 	array("address1", "*", "", false, "住所 番地まで"),
 	array("address2", "*", "", false, "住所 建物名・階数"),
 	array("birthday_year", "N", "", true, "生年月日・年"),
 	array("birthday_month", "N", "", true, "生年月日・月"),
 	array("birthday_day", "N", "", true, "生年月日・日"),
 	array("shikaku", "*", "", false, "保有資格"),
 	array("tel", "TEL", "", true, "連絡先"),
 	array("email", "MAIL", "", true, "メールアドレス"),
 	array("email2", "MAIL", "", true, "メールアドレス確認用"),
 	array("passwd", "*", "", true, "パスワード"),
 	array("passwd2", "*", "", true, "パスワード確認用"),
 	array("keitai", "*", "", true, "希望勤務形態"),
 	array("jiki", "*", "", true, "希望入職時期"),
 	array("ymd01_year", "N", "", false, "ymd01・年"),
 	array("ymd01_month", "N", "", false, "ymd01・月"),
 	array("ymd01_day", "N", "", false, "ymd01・日"),
 	array("ymd02_year", "N", "", false, "ymd02・年"),
 	array("ymd02_month", "N", "", false, "ymd02・月"),
 	array("ymd02_day", "N", "", false, "ymd02・日"),
 	array("ymd03_year", "N", "", false, "ymd03・年"),
 	array("ymd03_month", "N", "", false, "ymd03・月"),
 	array("ymd03_day", "N", "", false, "ymd03・日"),
 	array("textarea01", "*", "", false, "textarea01"),
 	array("textarea02", "*", "", false, "textarea02"),
 	array("textarea03", "*", "", false, "textarea03"),
 	array("textarea04", "*", "", false, "textarea04"),
 	array("textarea05", "*", "", false, "textarea05"),
 	array("textarea06", "*", "", false, "textarea06"),
 	array("textarea07", "*", "", false, "textarea07"),
 	array("textarea08", "*", "", false, "textarea08"),
 	array("textarea09", "*", "", false, "textarea09"),
 	array("textarea10", "*", "", false, "textarea10"),
 	array("text01", "*", "", false, "text01"),
 	array("text02", "*", "", false, "text02"),
 	array("text03", "*", "", false, "text03"),
 	array("text04", "*", "", false, "text04"),
 	array("text05", "*", "", false, "text05"),
 	array("text06", "*", "", false, "text06"),
 	array("text07", "*", "", false, "text07"),
 	array("text08", "*", "", false, "text08"),
 	array("text09", "*", "", false, "text09"),
 	array("text10", "*", "", false, "text10"),
 	array("radio01", "*", "", false, "radio01"),
 	array("radio02", "*", "", false, "radio02"),
 	array("radio03", "*", "", false, "radio03"),
 	array("radio04", "*", "", false, "radio04"),
 	array("radio05", "*", "", false, "radio05"),
 	array("check01", "*", "", false, "check01"),
 	array("check02", "*", "", false, "check02"),
 	array("check03", "*", "", false, "check03"),
 	array("check04", "*", "", false, "check04"),
 	array("check05", "*", "", false, "check05"),
//	array("file01", "*", "", false, "file01"),
//	array("file02", "*", "", false, "file02"),
//	array("file03", "*", "", false, "file03"),
//	array("file04", "*", "", false, "file04"),
//	array("file05", "*", "", false, "file05"),
 	array("select01", "*", "", false, "select01"),
 	array("select02", "*", "", false, "select02"),
 	array("select03", "*", "", false, "select03"),
 	array("select04", "*", "", false, "select04"),
 	array("select05", "*", "", false, "select05"),
 	array("biko", "*", "", false, "備考・メモ"),
 	array("confirm", "*", "", false, "利用規約"),
);

	if ($_REQUEST["mode"]) {
		$form = FormCheck::get_form($register_check, $_REQUEST);
		$msg = FormCheck::check($form, $register_check);
		if ($form["email"] && $form["email2"]) {
			if ($form["email"] == $form["email2"]) {
				$cond["email"] = $form["email"];
				$cond["status"] = "1";
				$ret = User::findData($cond);
				if ($ret) {
					foreach ($ret as $val) {
						if ($val["user_id"] != $_SESSION["LOGIN"]["user_id"]) {
							$msg["email"] = "このメールアドレスは利用できません。";
							break;
						}
					}
				}
			} else {
				$msg["email"] = "メールアドレスが一致していません。";
			}
		}
		if ($form["confirm"]) {
			if ($form["confirm"] != "1") {
				$msg["confirm"] = "利用規約にご同意いただけない場合は登録できません";
			}
		}
		if ($msg) {
			foreach ($msg as $key => $v) {
				$data["error"][$key] = $v;
			}
			$ap->set("msg", $msg);
			$form["shikaku"] = multi_value($form["shikaku"]);
			$form["check01"] = multi_value($form["check01"]);
			$form["check02"] = multi_value($form["check02"]);
			$form["check03"] = multi_value($form["check03"]);
			$form["check04"] = multi_value($form["check04"]);
			$form["check05"] = multi_value($form["check05"]);
		} else {
			$_SESSION["form"] = $form;
			$form = disp_user($form);
			$ap->template = "user-edit-confirm.html";
		}
	} else {
		unset($_SESSION["form"]);
		$form = $_SESSION["LOGIN"];
		$ary = explode("-", $form["zip"]);
		$form["zip1"] = $ary[0];
		$form["zip2"] = $ary[1];
		$ary = explode("-", $form["birthday"]);
		$form["birthday_year"] = $ary[0];
		$form["birthday_month"] = $ary[1];
		$form["birthday_day"] = $ary[2];
		$ary = explode("-", $form["ymd01"]);
		$form["ymd01_year"] = $ary[0];
		$form["ymd01_month"] = $ary[1];
		$form["ymd01_day"] = $ary[2];
		$ary = explode("-", $form["ymd02"]);
		$form["ymd02_year"] = $ary[0];
		$form["ymd02_month"] = $ary[1];
		$form["ymd02_day"] = $ary[2];
		$ary = explode("-", $form["ymd03"]);
		$form["ymd03_year"] = $ary[0];
		$form["ymd03_month"] = $ary[1];
		$form["ymd03_day"] = $ary[2];
		$form["email2"] = $form["email"];
		$form["passwd2"] = $form["passwd"];
		//
		$form["shikaku"] = multi_value($form["shikaku"]);
		$form["check01"] = multi_value($form["check01"]);
		$form["check02"] = multi_value($form["check02"]);
		$form["check03"] = multi_value($form["check03"]);
		$form["check04"] = multi_value($form["check04"]);
		$form["check05"] = multi_value($form["check05"]);
	}
	$ap->set("form", $form);
}
if ($ap->act == "user-edit-reinput") {
	// 再入力
	$ap->template = "user-edit.html";
	$form = $_SESSION["form"];
	unset($_SESSION["form"]);
	$form["shikaku"] = multi_value($form["shikaku"]);
	$form["check01"] = multi_value($form["check01"]);
	$form["check02"] = multi_value($form["check02"]);
	$form["check03"] = multi_value($form["check03"]);
	$form["check04"] = multi_value($form["check04"]);
	$form["check05"] = multi_value($form["check05"]);
	$ap->set("form", $form);
}
if ($ap->act == "user-edit-thankyou") {
	if ($_REQUEST["reinput_x"]) {
		$form =	$_SESSION["form"];
		unset($_SESSION["form"]);
		$ap->set("form", $form);
		$ap->template = "register.html";
	} else if ($_SESSION["form"]) {
	// 保存
		$form = $_SESSION["form"];
		unset($_SESSION["form"]);
		// 保存
		$item["name"] = $form["name"];
		$item["name_kana"] = $form["name_kana"];
		$item["zip"] = $form["zip1"] . "-" . $form["zip2"];
		$item["pref"] = $form["pref"];
		$item["city"] = $form["city"];
		$item["address1"] = $form["address1"];
		$item["address2"] = $form["address2"];
		$item["birthday"] = $form["birthday_year"] . "-" . $form["birthday_month"] . "-" . $form["birthday_day"];
		$item["tel"] = $form["tel"];
		$item["email"] = $form["email"];
		$item["passwd"] = $form["passwd"];
		$item["keitai"] = $form["keitai"];
		$item["shikaku"] = $form["shikaku"];
		$item["jiki"] = $form["jiki"];
		$item["ymd01"] = $form["ymd01_year"] . "-" . $form["ymd01_month"] . "-" . $form["ymd01_day"];
		$item["ymd02"] = $form["ymd02_year"] . "-" . $form["ymd02_month"] . "-" . $form["ymd02_day"];
		$item["ymd03"] = $form["ymd03_year"] . "-" . $form["ymd03_month"] . "-" . $form["ymd03_day"];
		$item["textarea01"] = $form["textarea01"];
		$item["textarea02"] = $form["textarea02"];
		$item["textarea03"] = $form["textarea03"];
		$item["textarea04"] = $form["textarea04"];
		$item["textarea05"] = $form["textarea05"];
		$item["textarea06"] = $form["textarea06"];
		$item["textarea07"] = $form["textarea07"];
		$item["textarea08"] = $form["textarea08"];
		$item["textarea09"] = $form["textarea09"];
		$item["textarea10"] = $form["textarea10"];
		$item["text01"] = $form["text01"];
		$item["text02"] = $form["text02"];
		$item["text03"] = $form["text03"];
		$item["text04"] = $form["text04"];
		$item["text05"] = $form["text05"];
		$item["text06"] = $form["text06"];
		$item["text07"] = $form["text07"];
		$item["text08"] = $form["text08"];
		$item["text09"] = $form["text09"];
		$item["text10"] = $form["text10"];
		$item["radio01"] = $form["radio01"];
		$item["radio02"] = $form["radio02"];
		$item["radio03"] = $form["radio03"];
		$item["radio04"] = $form["radio04"];
		$item["radio05"] = $form["radio05"];
		$item["check01"] = $form["check01"];
		$item["check02"] = $form["check02"];
		$item["check03"] = $form["check03"];
		$item["check04"] = $form["check04"];
		$item["check05"] = $form["check05"];
		$item["file01"] = $form["file01"];
		$item["file02"] = $form["file02"];
		$item["file03"] = $form["file03"];
		$item["file04"] = $form["file04"];
		$item["file05"] = $form["file05"];
		$item["select01"] = $form["select01"];
		$item["select02"] = $form["select02"];
		$item["select03"] = $form["select03"];
		$item["select04"] = $form["select04"];
		$item["select05"] = $form["select05"];
		$item["biko"] = $form["biko"];
		$item['up_date'] = "now()";
		User::updateData($_SESSION["LOGIN"]["user_id"], $item);
		//
		$user = User::getData($_SESSION["LOGIN"]["user_id"]);
		$_SESSION["LOGIN"] = $user;
	}
}
// -----------------------------------
// 検討リスト
if ($ap->act == "kentou") {
	if ($_SESSION["LOGIN"]) {	// ログイン状態
		if ($_REQUEST["id"] && ($_REQUEST["mode"] == "del")) {
			$item = Pickup::getData($_REQUEST["id"]);
			if ($item["user_id"] == $_SESSION["LOGIN"]["user_id"]) {
				Pickup::deleteData($_REQUEST["id"]);
				header("location: ./kentou.html");
				exit;
			} else {
				$msg[] = "未登録です";
			}
		} else if ($_REQUEST["id"]) {
			$cond["item_id"] = $_REQUEST["id"];
			$cond["user_id"] = $_SESSION["LOGIN"]["user_id"];
			$ret = Pickup::findData($cond);
			if (!$ret) {
				$rec["item_id"] = $_REQUEST["id"];
				$rec["user_id"] = $_SESSION["LOGIN"]["user_id"];
				Pickup::addData($rec);
				header("location: ./kentou.html");
				exit;
			} else {
				$msg[] = "登録済みです";
			}
		}
		$db = new Pickup();
		$db->search[] = array("field" => "user_id", "value" => $_SESSION["LOGIN"]["user_id"], "cond" => "=");
		$db->order[] = array("field" => "reg_date", "desc" => "1");
		$db->page = 0;
		$db->limit = 0;
		$list = $db->getList();
		if ($list) {
			foreach ($list as $val) {
				$item = Item::getData($val["item_id"]);
				$val["item"] = disp_item($item);
				$list2[] = $val;
			}
			$ap->set("list", $list2);
			$ap->set("count", count($list2));
		}
	} else {
		if ($_REQUEST["id"] && ($_REQUEST["mode"] == "del")) {
			if ($_SESSION["KENTOU"]) {
				$new = array();
				foreach ($_SESSION["KENTOU"] as $val) {
					if ($val != $_REQUEST["id"]) {
						$new[] = $val;
					} else {
						//
					}
				}
				$_SESSION["KENTOU"] = $new;
			}
			header("location: ./kentou.html");
			exit;
		} else if ($_REQUEST["id"]) {
			$new = array();
			$flag = 0;
			if ($_SESSION["KENTOU"]) {
				foreach ($_SESSION["KENTOU"] as $val) {
					if ($val != $_REQUEST["id"]) {
						$new[] = $val;
					} else {
						$flag = 1;
					}
				}
			}
			if ($flag == 0) {
				$new[] = $_REQUEST["id"];
			}
			$_SESSION["KENTOU"] = $new;
			header("location: ./kentou.html");
			exit;
		}
		if ($_SESSION["KENTOU"]) {
			$list2 = array();
			foreach ($_SESSION["KENTOU"] as $val) {
				$item = Item::getData($val);
				unset($v);
				$v["seq"] = $val;
				$v["item_id"] = $val;
				$v["item"] = disp_item($item);
				$list2[] = $v;
			}
			$ap->set("list", $list2);
			$ap->set("count", count($list2));
		}
	}
}
// -----------------------------------
// 検索
if ($ap->act == "search") {

	$myurl = (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"].'/';
	$myurl = preg_replace('#//$#','/', str_replace('/o1', '', $myurl));
	// cannonicalタグ用URLからページャーを表す「p1」「p2」などを削除する
	$myurl = preg_replace('#/p\d+/?$#', '', $myurl);
	// cannonicalタグ用URLからパラメータを削除する
	
	$urls  = parse_url($myurl);
	$myurl = str_replace("?{$urls['query']}", '', $myurl) . '/';
	$myurl = preg_replace('|//$|', '/', $myurl);

	if(
		!preg_match('|/$|', $_SERVER["REQUEST_URI"]) &&
		!preg_match('|/p\d+/?$|', $_SERVER["REQUEST_URI"])
	){
		// p以外のＵＲＬにアクセスした際に、末尾に/なしの場合は/ありにリダイレクト
		$myurl = preg_replace('|//$|', '/', $myurl);
		header("location: {$myurl}");
		exit;
	}

	$ap->set("myurl", $myurl);

	//alternate用
	$myurl2 = str_replace($_SERVER["HTTP_HOST"], "sp." . $_SERVER["HTTP_HOST"], $myurl);
	$ap->set("myurl2", $myurl2);
	//

	$ap->set("use_syokusyu", $_SESSION["use_syokusyu"]);
	$ap->set("use_koyou", $_SESSION["use_koyou"]);
	$ap->set("use_kodawari1", $_SESSION["use_kodawari1"]);
	$ap->set("use_kodawari2", $_SESSION["use_kodawari2"]);
	$ap->set("use_kodawari3", $_SESSION["use_kodawari3"]);
	//
	$page = $_REQUEST["page"];
	//
	$ap->set("search", $_REQUEST["s"]);

	$latLng = array(0, 0);
	$isSearchingNearBy = false;
	if ($_REQUEST["s"]) {
		$area = array();
		$pref = array();
		// 検索条件の解析
		$s = explode("/", $_REQUEST["s"]);
		if (count($s) >= 3 && $s[0] == 'coord'
            && $s[1] !== 0 && $s[2] !== 0
        ) {
            $latLng = array($s[1] * 1, $s[2] * 1);
            $isSearchingNearBy = true;
		    $s = array();
        }
		foreach ($s as $val) {
			if ($val != "") {
				if ($pref_name[$val]) {	// 都道府県名
					$pref[] = $pref_name[$val];
				} else if (substr($val, 0, 1) == "a") {	// エリア
					if (substr($val, 1) == 1) {
						$pref[] = "1";	// 北海道、沖縄は直接都道府県の区分へ
					} else if (substr($val, 1) == 10) {
						$pref[] = "47";	// 北海道、沖縄は直接都道府県の区分へ
					} else {
						$area[] = substr($val, 1);
					}
				} else if (substr($val, 0, 1) == "t") {	// 都道府県
					if (!in_array(substr($val, 1), $pref)) {
						$pref[] = substr($val, 1);
					}
				} else if (substr($val, 0, 1) == "c") {	// 市区町村
					$city[] = substr($val, 1);
				} else if (substr($val, 0, 1) == "r") {	// 路線
					$rosen[] = substr($val, 1);
				} else if (substr($val, 0, 1) == "e") {	// 駅
					$station[] = substr($val, 1);
				} else if (substr($val, 0, 1) == "s") {	// 職種
					$syokusyu[] = substr($val, 1);
				} else if (substr($val, 0, 1) == "k") {	// 雇用
					$koyou[] = substr($val, 1);
				} else if (substr($val, 0, 1) == "x") {	// こだわり1
					$kodawari1[] = substr($val, 1);
				} else if (substr($val, 0, 1) == "y") {	// こだわり2
					$kodawari2[] = substr($val, 1);
				} else if (substr($val, 0, 1) == "z") {	// こだわり3
					$kodawari3[] = substr($val, 1);
				} else if (substr($val, 0, 1) == "w") {	// キーワード
					$keyword = html_entity_decode(substr($val, 1));
				} else if (substr($val, 0, 1) == "p") {	// ページ
					$page = substr($val, 1);
				} else if (substr($val, 0, 1) == "o") {	// 順序
					$ord = substr($val, 1);
				} else {
				}
				if ($city && (!$pref)) {
					foreach ($city as $val) {
						if (!in_array(intval(substr($val, 0, 2)), $pref)) {
							$pref[] = intval(substr($val, 0, 2));
						}
					}
				}
			}
		}
	}
	
	$form["a_condition"] = implode("," , $area);
	$form["t_condition"] = implode("," , $pref);
	$form["c_condition"] = implode("," , $city);

	// 検索条件用
	if ((!$area)&& $pref) {
		foreach ($pref as $id) {
			foreach ($area_pref_list as $key => $val) {
				if (in_array($id, $val)) {
					$area[] = $key;
				}
			}
		}
	}
	if ($area) {
		$area = array_unique($area);
		$area_cond = "";
		if ($area) {
			foreach ($area as $val) {
				$area_cond .= "a" . $val . "/";
			}
		}
 	}
 	if ($pref) {
 		$pref_cond = "";
 		if ($pref) {
			foreach ($pref as $val) {
				$pref_cond .= "t" . $val . "/";
			}
		}
	}
 	if ($city) {
 		$city_cond = "";
		if ($city) {
			foreach ($city as $val) {
				$city_cond .= "c" . $val . "/";
			}
		}
	}
 	if ($rosen) {
 		$rosen_cond = "";
		if ($rosen) {
			foreach ($rosen as $val) {
				$rosen_cond .= "r" . $val . "/";
			}
		}
	}
 	if ($station) {
 		$station_cond = $rosen_cond;
		if ($station) {
			foreach ($station as $val) {
				$station_cond .= "e" . $val . "/";
			}
		}
	}
	$top_cond = $area_cond . $pref_cond . $city_cond . $rosen_cond . $statioin_cond;
	if ($syokusyu) {
		$syokusyu_cond = "";
		foreach ($syokusyu as $val) {
			$syokusyu_cond .= "s" . $val . "/";
		}
	}
	if ($koyou) {
		$koyou_cond = "";
		foreach ($koyou as $val) {
			$koyou_cond .= "k" . $val . "/";
		}
	}
	if ($kodawari1) {
		$kodawari1_cond = "";
		foreach ($kodawari1 as $val) {
			$kodawari1_cond .= "x" . $val . "/";
		}
	}
	if ($kodawari2) {
		$kodawari2_cond = "";
		foreach ($kodawari2 as $val) {
			$kodawari2_cond .= "y" . $val . "/";
		}
	}
	if ($kodawari3) {
		$kodawari3_cond = "";
		foreach ($kodawari3 as $val) {
			$kodawari3_cond .= "z" . $val . "/";
		}
	}
	if ($keyword) {
		$keyword_cond = "w" . $keyword . "/";
	}
	$ap->set("area_cond1", "");
	$ap->set("area_cond2", $pref_cond . $city_cond . $syokusyu_cond . $koyou_cond . $kodawari1_cond . $kodawari2_cond . $kodawari3_cond . $keyword_cond);
	//
	$ap->set("pref_cond1", $area_cond);
	$ap->set("pref_cond2", $city_cond . $syokusyu_cond . $koyou_cond . $kodawari1_cond . $kodawari2_cond . $kodawari3_cond . $keyword_cond);
	//
	$ap->set("city_cond1", $area_cond . $pref_cond);
	$ap->set("city_cond2", $syokusyu_cond . $koyou_cond . $kodawari1_cond . $kodawari2_cond . $kodawari3_cond . $keyword_cond);
	//
	$ap->set("rosen_cond1", $area_cond . $pref_cond . $city_cond);
	$ap->set("rosen_cond2", $syokusyu_cond . $koyou_cond . $kodawari1_cond . $kodawari2_cond . $kodawari3_cond . $keyword_cond);
	//
	$ap->set("station_cond1", $area_cond . $pref_cond . $city_cond . $rosen_cond);
	$ap->set("station_cond2", $syokusyu_cond . $koyou_cond . $kodawari1_cond . $kodawari2_cond . $kodawari3_cond . $keyword_cond);
	//
	$ap->set("syokusyu_cond1", $top_cond);
	$ap->set("syokusyu_cond2", $koyou_cond . $kodawari1_cond . $kodawari2_cond . $kodawari3_cond . $keyword_cond);
	//
	$ap->set("koyou_cond1", $top_cond . $syokusyu_cond);
	$ap->set("koyou_cond2", $kodawari1_cond . $kodawari2_cond . $kodawari3_cond . $keyword_cond);
	//
	$ap->set("kodawari1_cond1", $top_cond . $syokusyu_cond . $koyou_cond);
	$ap->set("kodawari1_cond2", $kodawari2_cond . $kodawari3_cond . $keyword_cond);
	//
	$ap->set("kodawari2_cond1", $top_cond . $syokusyu_cond . $koyou_cond . $kodawari1_cond);
	$ap->set("kodawari2_cond2", $kodawari3_cond . $keyword_cond);
	//
	$ap->set("kodawari3_cond1", $top_cond . $syokusyu_cond . $koyou_cond . $kodawari1_cond . $kodawari2_cond);
	$ap->set("kodawari3_cond2", $keyword_cond);
	// パンくず作成
	if ($area) {
		$tag = array();
//		$c = $syokusyu_cond . $koyou_cond . $kodawari1_cond . $kodawari2_cond . $kodawari3_cond . $keyword_cond;
		foreach ($area as $id) {
			if ($c) {
				$tag[] = "<a href=\"" . TOP . "s/a" . $id . "/" . $c . "\">" . $area_list[$id] . "</a>";
			} else {
				$tag[] = "<a href=\"" . TOP . "s/a" . $id . "/" . "\">" . $area_list[$id] . "</a>";
			}
		}
		$tags[] = implode("、", $tag);
	}
	if ($pref) {
		$tag = array();
		$c1 = $area_cond;
//		$c2 = $syokusyu_cond . $koyou_cond . $kodawari1_cond . $kodawari2_cond . $kodawari3_cond . $keyword_cond;
		foreach ($pref as $id) {
			if ($c1) {
				$tag[] = "<a href=\"" . TOP . "s/" . $c1 . "t" . $id . "/" . $c2 . "\">" . $pref_list[$id] . "</a>";
			} else {
				$tag[] = "<a href=\"" . TOP . "s/t" . $id . "/" . "\">" . $pref_list[$id] . "</a>";
			}
		}
		$tags[] = implode("、", $tag);
	}
	$city_key = "";
	if ($city) {
		$tag = array();
		$c1 = $area_cond . $pref_cond;
//		$c2 = $syokusyu_cond . $koyou_cond . $kodawari1_cond . $kodawari2_cond . $kodawari3_cond . $keyword_cond;
		$cn = array();
		foreach ($city as $id) {
			unset($cd);
			$cd["city_cd"] = $id;
			$ret = Address::findData($cd);
			if ($ret) {
				$cn[] = $ret[0]["city"];
				if ($c1) {
					$tag[] = "<a href=\"" . TOP . "s/" . $c1 . "c" . $id . "/" . $c2 . "\">" . $ret[0]["city"] . "</a>";
				} else {
					$tag[] = "<a href=\"" . TOP . "s/c" . $id . "/" . "\">" . $ret[0]["city"] . "</a>";
				}
			}
		}
		$city_key = implode("、", $cn);
		$tags[] = implode("、", $tag);
	}
	if ($rosen) {
		$tag = array();
		$c1 = $area_cond . $pref_cond . $city_cond;
//		$c2 = $syokusyu_cond . $koyou_cond . $kodawari1_cond . $kodawari2_cond . $kodawari3_cond . $keyword_cond;
		foreach ($rosen as $id) {
			unset($c1);
			$c["line_cd"] = $id;
			$ret = Station::findData($c);
			if ($ret) {
				if ($c1) {
					$tag[] = "<a href=\"" . TOP . "s/" . $c1 . "c" . $id . "/" . $c2 . "\">" . $ret[0]["line_name"] . "</a>";
				} else {
					$tag[] = "<a href=\"" . TOP . "s/c" . $id . "\">" . $ret[0]["line_name"] . "</a>";
				}
			}
		}
		$tags[] = implode("、", $tag);
	}
	if ($station) {
		$tag = array();
		$c1 = $top_cond . $syokusyu_cond;
//		$c2 = $koyou_cond . $kodawari1_cond . $kodawari2_cond . $kodawari3_cond . $keyword_cond;
		foreach ($station as $id) {
			unset($cd);
			$cd["station_cd"] = $id;
			$ret = Station::findData($cd);
			if ($ret) {
				if ($c1) {
					$tag[] = "<a href=\"" . TOP . "s/" . $c1 . "e" . $id . "/" . $c2 . "\">" . $ret[0]["station_name"] . "</a>";
				} else {
					$tag[] = "<a href=\"" . TOP . "s/e" . $id . "\">" . $ret[0]["station_name"] . "</a>";
				}
			}
		}
		$tags[] = implode("、", $tag);
	}
	if ($syokusyu) {
		$tag = array();
		$c1 = $top_cond;
//		$c2 = $koyou_cond . $kodawari1_cond . $kodawari2_cond . $kodawari3_cond . $keyword_cond;
		foreach ($syokusyu as $id) {
			if ($c1) {
				$tag[] = "<a href=\"" . TOP . "s/" . $c1 . "s" . $id . "/" . $c2 . "\">" . $_SESSION["mast_syokusyu"][$id]["name"] . "</a>";
			} else {
				$tag[] = "<a href=\"" . TOP . "s/s" . $id . "\">" . $_SESSION["mast_syokusyu"][$id]["name"] . "</a>";
			}
		}
		$tags[] = implode("、", $tag);
	}
	if ($koyou) {
		$tag = array();
		$c1 = $top_cond . $syokusyu_cond;
//		$c2 = $kodawari1_cond . $kodawari2_cond . $kodawari3_cond . $keyword_cond;
		foreach ($koyou as $id) {
			if ($c1) {
				$tag[] = "<a href=\"" . TOP . "s/" . $c1 . "k" . $id . "/" . $c2 . "\">" . $_SESSION["mast_koyou"][$id]["name"] . "</a>";
			} else {
				$tag[] = "<a href=\"" . TOP . "s/k" . $id . "\">" . $_SESSION["mast_koyou"][$id]["name"] . "</a>";
			}
		}
		$tags[] = implode("、", $tag);
	}
	if ($kodawari1) {
		$tag = array();
		$c1 = $top_cond . $syokusyu_cond . $koyou_cond;
//		$c2 = $kodawari2_cond . $kodawari3_cond . $keyword_cond;
		foreach ($kodawari1 as $id) {
			if ($c1) {
				$tag[] = "<a href=\"" . TOP . "s/" . $c1 . "x" . $id . "/" . $c2 . "\">" . $_SESSION["mast_kodawari1"][$id]["name"] . "</a>";
			} else {
				$tag[] = "<a href=\"" . TOP . "s/x" . $id . "\">" . $_SESSION["mast_kodawari1"][$id]["name"] . "</a>";
			}
		}
		$tags[] = implode("、", $tag);
	}
	if ($kodawari2) {
		$tag = array();
		$c1 = $top_cond . $syokusyu_cond . $koyou_cond . $kodawari1_cond;
//		$c2 = $kodawari3_cond . $keyword_cond;
		foreach ($kodawari2 as $id) {
			if ($c1) {
				$tag[] = "<a href=\"" . TOP . "s/" . $c1 . "y" . $id . "/" . $c2 . "\">" . $_SESSION["mast_kodawari2"][$id]["name"] . "</a>";
			} else {
				$tag[] = "<a href=\"" . TOP . "s/y" . $id . "\">" . $_SESSION["mast_kodawari2"][$id]["name"] . "</a>";
			}
		}
		$tags[] = implode("、", $tag);
	}
	if ($kodawari3) {
		$tag = array();
		$c1 = $top_cond . $syokusyu_cond . $koyou_cond . $kodawari1_cond . $kodawari2_cond;
//		$c2 = $keyword_cond;
		foreach ($kodawari3 as $id) {
			if ($c1) {
				$tag[] = "<a href=\"" . TOP . "s/" . $c1 . "z" . $id . "/" . $c2 . "\">" . $_SESSION["mast_kodawari3"][$id]["name"] . "</a>";
			} else {
				$tag[] = "<a href=\"" . TOP . "s/z" . $id . "\">" . $_SESSION["mast_kodawari3"][$id]["name"] . "</a>";
			}
		}
		$tags[] = implode("、", $tag);
	}
	if ($keyword) {
		$c1 = $top_cond . $syokusyu_cond . $koyou_cond . $kodawari1_cond . $kodawari2_cond . $kodawari3_cond;
		$tag = array();
		$tag[] = "<a href=\"" . TOP . "s/" . $c1 . "w" . htmlentities($keyword) . "\">" . $keyword . "</a>";
		$tags[] = implode("、", $tag);
	}
	if ($isSearchingNearBy) { // 現在地による検索
	    $tags[] = '<a href="' . TOP . 's/coord/' . implode('/', $latLng) . '/">現在地</a>';
    }
	$ap->set("tags", $tags);
	//
	if ($rosen_cond || $statioin_cond) {
		$ap->set("rosen_tab", "1");
	}
	if ($pref) {
		$pref_name = array();
		foreach ($pref as $val) {
			$pref_name[] = $pref_list[$val];
		}
		// 都道府県指定あり
		// 市区町村一覧
		if (count($pref) > 1) {
			$sql = "SELECT distinct city_cd,city FROM address WHERE substring(city_cd, 1, 2) in (" . implode(",", $pref) . ") and city is not null and city<>'' and count>0";
		} else {
			$sql = "SELECT distinct city_cd,city FROM address WHERE substring(city_cd, 1, 2)={$pref[0]} and city is not null and city<>'' and count>0";
		}
		$ret = $ap->inst->search_sql($sql);
		$ap->set("city", $ret["data"]);
		if ($rosen) {
			// 路線あり
			$rosen_name = array();
			// 駅一覧
			if (count($rosen) > 1) {
				$sql = "select station_cd,station_name,line_cd,line_name from station where line_cd in (" . implode(",", $rosen) . ") and count>0";
			} else {
				$sql = "select station_cd,station_name,line_cd,line_name from station where line_cd='{$rosen[0]}' and count>0";
			}
			$ret = $ap->inst->search_sql($sql);
			if ($ret["data"]) {
				foreach ($ret["data"] as $val) {
					$rosen_name[$val["line_cd"]] = $val["line_name"];
				}
				$ap->set("station", $ret["data"]);
			}
			$ap->set("rosen_name", implode("、", $rosen_name));
			$ap->set("rosen_list", $rosen);
		} else {
			// 路線一覧
			if (count($pref) > 1) {
				$sql = "select line_cd,line_name from station where pref_cd in (" . implode(",", $pref) . ") and count>0 group by line_cd";
			} else {
				$sql = "select line_cd,line_name from station where pref_cd={$pref[0]} and count>0 group by line_cd";
			}
			$ret = $ap->inst->search_sql($sql);
			if ($ret["data"]) {
				$ap->set("rosen", $ret["data"]);
			}
		}
		$ap->set("tab", "1");
		$ap->set("pref_name", implode("、", $pref_name));
		$ap->set("pref_list", $pref);
	} else if ($area) {
		$area_name = array();
		// 地域指定あり
		// 都道府県一覧
		$pref_data = array();
		foreach ($area as $val) {
			$area_name[] = $area_list[$val];
			foreach ($area_pref_list[$val] as $val2) {
				unset($rec);
				$rec["pref_cd"] = $val2;
				$rec["pref_name"] = $pref_list[$val2];
				$pref_data[] = $rec;
			}
		}
		$ap->set("pref", $pref_data);
		$ap->set("area_name", implode("、", $area_name));
		// エリア路線
		$areas = array();
		foreach ($area as $val) {
			$areas = array_merge($areas, $area_pref_list[$val]);
		}
		$sql = "select line_cd,line_name from station where pref_cd in (" . implode(",", $areas) . ") group by line_cd";
		$ret = $ap->inst->search_sql($sql);
		$list = $ret["data"];
	} else {
		// エリア一覧のみ
		$ap->set("area", "1");
	}
	$db = new Item();
	$db->search[] = array("field" => "status", "value" => "1", "cond" => "=");
	if ($area) {
		if (!$pref) {
			foreach ($pref_data as $v) {
				$p[] = intval($v["pref_cd"]);
			}
			$db->search[] = array("field" => "kinmu_pref", "value" => $p, "cond" => "in");
		}
		$area_key = multi_string($area, $area_list, "、");
		$ap->set("area_key", $area_key);
		$form["area"] = multi_value($area);
	}
	if ($pref) {
		if (count($pref) > 1) {
			$db->search[] = array("field" => "kinmu_pref", "value" => $pref, "cond" => "in");
		} else {
			$db->search[] = array("field" => "kinmu_pref", "value" => $pref[0], "cond" => "=");
		}
		$pref_key = multi_string($pref, $pref_list, "、");
		$form["pref"] = multi_value($pref);
	}
	if ($city) {
/*
		$where_c[] = array("field" => "city_cd", "value" => $city, "cond" => "in");
		$db->search[] = array("field" => "kinmu_city", "cond" => "in",
			"select" => array("table" => "address", "where" => $where_c, "fields" => array("distinct city")));
*/
		if (count($city) > 1) {
			$db->search[] = array("field" => "kinmu_city", "value" => $city, "cond" => "in");
		} else {
			$db->search[] = array("field" => "kinmu_city", "value" => $city[0], "cond" => "=");
		}
		$form["city"] = multi_value($city);
	}
	if ($rosen) {
		$ap->set("rosen_key", $rosen_name);
		$form["rosen"] = multi_value($rosen);
	}
	if ($station) {
		$where_e[] = array("field" => "kind", "value" => "station", "cond" => "=");
		$where_e[] = array("field" => "value", "value" => $station, "cond" => "in");
		$db->search[] = array("field" => "item_id", "cond" => "in",
			"select" => array("table" => "search", "where" => $where_e, "fields" => array("distinct item_id")));
		$form["station"] = multi_value($station);
	}
	if ($syokusyu) {
		$where_s[] = array("field" => "kind", "value" => "syokusyu", "cond" => "=");
		$where_s[] = array("field" => "value", "value" => $syokusyu, "cond" => "in");
		$db->search[] = array("field" => "item_id", "cond" => "in",
			"select" => array("table" => "search", "where" => $where_s, "fields" => array("distinct item_id")));
		$syokusyu_key = multi_string($syokusyu, $_SESSION["mast_syokusyu"], "、");
		$form["syokusyu"] = multi_value($syokusyu);
	}
	if ($koyou) {
		$where_k[] = array("field" => "kind", "value" => "koyou", "cond" => "=");
		$where_k[] = array("field" => "value", "value" => $koyou, "cond" => "in");
		$db->search[] = array("field" => "item_id", "cond" => "in",
			"select" => array("table" => "search", "where" => $where_k, "fields" => array("distinct item_id")));
		$koyou_key = multi_string($koyou, $_SESSION["mast_koyou"], "、");
		$form["koyou"] = multi_value($koyou);
	}
	if ($kodawari1) {
		$where_1[] = array("field" => "kind", "value" => "kodawari1", "cond" => "=");
		$where_1[] = array("field" => "value", "value" => $kodawari1, "cond" => "in");
		$db->search[] = array("field" => "item_id", "cond" => "in",
			"select" => array("table" => "search", "where" => $where_1, "fields" => array("distinct item_id")));
		$kodawari[] = multi_string($kodawari1, $_SESSION["mast_kodawari1"], "、");
		$form["kodawari1"] = multi_value($kodawari1);
	}
	if ($kodawari2) {
		$where_2[] = array("field" => "kind", "value" => "kodawari2", "cond" => "=");
		$where_2[] = array("field" => "value", "value" => $kodawari2, "cond" => "in");
		$db->search[] = array("field" => "item_id", "cond" => "in",
			"select" => array("table" => "search", "where" => $where_2, "fields" => array("distinct item_id")));
		$kodawari[] = multi_string($kodawari2, $_SESSION["mast_kodawari2"], "、");
		$form["kodawari2"] = multi_value($kodawari2);
	}
	if ($kodawari3) {
		$where_3[] = array("field" => "kind", "value" => "kodawari3", "cond" => "=");
		$where_3[] = array("field" => "value", "value" => $kodawari3, "cond" => "in");
		$db->search[] = array("field" => "item_id", "cond" => "in",
			"select" => array("table" => "search", "where" => $where_3, "fields" => array("distinct item_id")));
		$kodawari[] = multi_string($kodawari3, $_SESSION["mast_kodawari3"], "、");
		$form["kodawari3"] = multi_value($kodawari3);
	}
	if ($kodawari) {
		$kodawari_key = implode("、", $kodawari);
	}
	if ($keyword) {
		include_once("ngram_converter.php");
		$ngram = new NgramConverter();
		$keywords = explode(" ", $keyword);
		foreach ($keywords as $val) {
			if ($val) {
				$db->search[] = array("expression" => $ngram->make_match_sql($val, 'searchtext', $ngram_len));
			}
		}
/*
		$where_k[] = array("field" => "kind", "value" => "keyword", "cond" => "=");
		$where_k[] = array("field" => "value", "value" => $keyword, "cond" => "=");
		$db->search[] = array("field" => "item_id", "cond" => "in",
			"select" => array("table" => "search", "where" => $where_k, "fields" => array("distinct item_id")));
*/
/*
		$where_keyword[] = array("field" => "title", "value" => "%{$keyword}%", "cond" => "like", "relation" => "or");
		$where_keyword[] = array("field" => "question", "value" => "%{$keyword}%", "cond" => "like", "relation" => "or");
		$db->search[] = array("nest" => $where_keyword);
*/
		//
		$keyword_key = "「" . $keyword . "」";
		$form["keyword"] = $keyword;
	}
	if ($ord == 1) {
		$form["ord"] = $ord;
	} else if ($ord == 2) {
		$form["ord"] = $ord;
	}
    if ($isSearchingNearBy) {
        $rangeLat = NEARBY_RANGE_LAT;
        $rangeLng = NEARBY_RANGE_LNG;
        $sql = <<<JOY
        SELECT * FROM item
        WHERE lat > 0 AND lon > 0
            AND ABS(lat-{$latLng[0]}) < {$rangeLat} AND ABS(lon-{$latLng[1]}) < {$rangeLng}
        ORDER BY POW(lat-{$latLng[0]}, 2) + POW(lon-{$latLng[1]}, 2)
        LIMIT 5
JOY;
        $list = $ap->inst->search_sql($sql);

        $ap->set("noindex", 1);
        if ($list['count'] > 0) {
            $dispItems = array();
            foreach ($list['data'] as $item) {
                $item["kentou"] = is_kentou($item["item_id"]);
                $dispItems[] = disp_item($item);
            }
            $ap->set("list", $dispItems);
        } else {
            $ap->set("list", array());
        }
        $ap->set(array("total" => $list['count'], "start" => 1, "end" => $list['count']));
    } else {
        $db->order[] = array("field" => "check01", "asc" => "1");
        $db->order[] = array("field" => "up_date", "desc" => "1");
        $db->page = $page;
        $db->limit = PAGE_ITEMS;
        $count = $db->getCount();
        $pages = intval(($count + $db->limit - 1) / $db->limit);
        if ($pages > 1) {
            $ap->set("pager", page_index2($page, $pages, 10));
        }
        $list = $db->getList();
        $ap->set(array("total" => $count, "start" => $page * $db->limit + 1, "end" => $page * $db->limit + count($list)));
        if ($list) {
            $list2 = array();
            foreach ($list as $val) {
                $val["kentou"] = is_kentou($val["item_id"]);
                $list2[] = disp_item($val);
            }
            $ap->set("list", $list2);
            if($page >= 1) $ap->set("noindex", 1);
        } else {
            $ap->set("noindex", 1);

            // 検索結果なし（条件を絞って検索）
            $db = new Item();
            $db->search[] = array("field" => "status", "value" => "1", "cond" => "=");
            if ($syokusyu) {
                $where_s[] = array("field" => "kind", "value" => "syokusyu", "cond" => "=");
                $where_s[] = array("field" => "value", "value" => $syokusyu, "cond" => "in");
                $db->search[] = array("field" => "item_id", "cond" => "in",
                    "select" => array("table" => "search", "where" => $where_s, "fields" => array("distinct item_id")));
                $ap->set("syokusyu_key", multi_string($syokusyu, $_SESSION["mast_syokusyu"], "、"));
            } else if ($koyou) {
                $where_k[] = array("field" => "kind", "value" => "koyou", "cond" => "=");
                $where_k[] = array("field" => "value", "value" => $koyou, "cond" => "in");
                $db->search[] = array("field" => "item_id", "cond" => "in",
                    "select" => array("table" => "search", "where" => $where_k, "fields" => array("distinct item_id")));
                $ap->set("koyou_key", multi_string($koyou, $_SESSION["mast_koyou"], "、"));
            } else if ($kodawari1) {
                $where_1[] = array("field" => "kind", "value" => "kodawari1", "cond" => "=");
                $where_1[] = array("field" => "value", "value" => $kodawari1, "cond" => "in");
                $db->search[] = array("field" => "item_id", "cond" => "in",
                    "select" => array("table" => "search", "where" => $where_1, "fields" => array("distinct item_id")));
                $kodawari[] = multi_string($kodawari1, $_SESSION["mast_kodawari1"], "、");
            }
            if ($city) {
                $where_c[] = array("field" => "city_cd", "value" => $city, "cond" => "in");
                $db->search[] = array("field" => "kinmu_city", "cond" => "in",
                    "select" => array("table" => "address", "where" => $where_c, "fields" => array("distinct city")));
                $ap->set("city_key", multi_string($city, $area_list, "、"));
            } else if ($pref) {
                if (count($pref) > 1) {
                    $db->search[] = array("field" => "kinmu_pref", "value" => $pref, "cond" => "in");
                } else {
                    $db->search[] = array("field" => "kinmu_pref", "value" => $pref[0], "cond" => "=");
                }
                $ap->set("pref_key", multi_string($pref, $pref_list, "、"));
            }
            if ($ord == 1) {
                $form["ord"] = $ord;
            } else if ($ord == 2) {
                $form["ord"] = $ord;
            }
            $db->order[] = array("field" => "reg_date", "desc" => "1");
            $db->page = $page;
            $db->limit = PAGE_ITEMS;
            $count = $db->getCount();
            $pages = intval(($count + $db->limit - 1) / $db->limit);
            if ($pages > 1) {
                $ap->set("pager", page_index2($page, $pages, 10));
            }
            $list = $db->getList();
            $ap->set(array("total" => $count, "start" => $page * $db->limit + 1, "end" => $page * $db->limit + count($list)));
            if ($list) {
                $list2 = array();
                foreach ($list as $val) {
                    $val["kentou"] = is_kentou($val["item_id"]);
                    $list2[] = disp_item($val);
                }
                $ap->set("list", $list2);
                $ap->set("search2", "1");
            }
        }
    }

	// 検索条件
	$cond = array();
	if ($syokusyu_key) {
		$cond[] = $syokusyu_key;
	}
	if ($koyou_key) {
		$cond[] = $koyou_key;
	}
	if ($kodawari_key) {
		$cond[] = $kodawari_key;
	}
	if ($keyword_key) {
		$cond[] = $keyword_key;
	}
	$str = "";
	if ($area_key || $pref_key || $city_key) {
		if ($pref_key || $city_key) {
			$str = $pref_key . $city_key . "の";
		} else {
			$str = $area_key . "の";
		}
	}
	if ($cond) {
		$str .= implode("、", $cond);
		$str .= "から";
	}
	if ($latLng[0] !== 0 && $latLng[1] !== 0) {
	    $str = '現在地から';
    }
	$str .= "お仕事を探す";
	$now_page = $db->page + 1;
	if($now_page > 1) $str .= "（{$now_page}ページ目）";
	$ap->set("search_cond", $str);
	//
	$ap->set("form", $form);
}
// -----------------------------------
// お知らせ一覧
if ($ap->act == "news") {
	$page = $_REQUEST["page"];
	//
	$db = new News();
	$db->search[] = array("field" => "status", "value" => "1", "cond" => "=");
	$db->search[] = array("field" => "kind", "value" => "1", "cond" => "=");
	$db->order[] = array("field" => "news_date", "desc" => "1");
	$db->page = $page;
	$db->limit = PAGE_ITEMS;
	$count = $db->getCount();
	$pages = intval(($count + $db->limit - 1) / $db->limit);
	if ($pages > 1) {
		$ap->set("pager", page_index($page, $pages));
	}
	$list = $db->getList();
	$ap->set(array("total" => $count, "start" => $page * $db->limit + 1, "end" => $page * $db->limit + count($list)));
	if ($list) {
		//
	}
	//
	$ap->set("list", $list);
	$ap->set("form", $form);
}
// お知らせ詳細
if ($ap->act == "news-detail") {
	// トップページの情報を得る
	$news = News::getData($_REQUEST["id"]);
	$ap->set("news", $news);
}
// -----------------------------------
// イベント一覧
if ($ap->act == "event") {
	$page = $_REQUEST["page"];
	//
	$db = new News();
	$db->search[] = array("field" => "status", "value" => "1", "cond" => "=");
	$db->search[] = array("field" => "kind", "value" => "2", "cond" => "=");
	$db->order[] = array("field" => "news_date", "desc" => "1");
	$db->page = $page;
	$db->limit = PAGE_ITEMS;
	$count = $db->getCount();
	$pages = intval(($count + $db->limit - 1) / $db->limit);
	if ($pages > 1) {
		$ap->set("pager", page_index($page, $pages));
	}
	$list = $db->getList();
	$ap->set(array("total" => $count, "start" => $page * $db->limit + 1, "end" => $page * $db->limit + count($list)));
	if ($list) {
		//
	}
	//
	$ap->set("list", $list);
	$ap->set("form", $form);
}
// お知らせ詳細
if ($ap->act == "event-detail") {
	// トップページの情報を得る
	$news = News::getData($_REQUEST["id"]);
	$news['contents'] = htmlspecialchars_decode($news['contents']);
	$ap->set("news", $news);
}
// -----------------------------------
// 問合せ
if ($ap->act == "contact") {

$contact_check = array(
	// フォーム項目名 文字種 最大文字数 必須 表示名称
	array("mode", "*", "", false, "モード"),
	array("kind", "*", "", true, "お問合せ種別"),
	array("name", "*", "", true, "事業所名"),
 	array("name_kana", "*", "", true, "ご担当者名"),
 	array("zip1", "N", "", false, "住所 郵便番号1"),
 	array("zip2", "N", "", false, "住所 郵便番号2"),
 	array("pref", "N", "", false, "住所 都道府県"),
 	array("city", "*", "", false, "住所 市区町村"),
 	array("address1", "*", "", false, "住所 番地まで"),
 	array("address2", "*", "", false, "住所 建物名・階数"),
 	array("tel", "TEL", "", true, "電話番号"),
 	array("email", "MAIL", "", true, "メールアドレス"),
	array("contents", "*", "", false, "お問合せ内容 "),
 	array("confirm", "*", "", false, "利用規約"),
);
	if ($_REQUEST["mode"]) {
		$form = FormCheck::get_form($contact_check, $_REQUEST);
		$msg = FormCheck::check($form, $contact_check);
		if ($form["confirm"]) {
			if ($form["confirm"] != "1") {
				$msg["confirm"] = "利用規約にご同意いただけない場合はお問合せできません";
			}
		}
		

		if ($msg) {
			foreach ($msg as $key => $v) {
				$data["error"][$key] = $v;
			}
			$ap->set("msg", $msg);
		} else {
			
			$ap->template = "contact-thankyou.html";


			//reCAPTCHA　設定 
			$site_key = '6LeExAAaAAAAAHxjx5S6kG6h4VF4MVQ31_Xz48Xi';
			$secret_key = '6LeExAAaAAAAAOMxv8ieI55yYNCZGCWCMdg7Ocq-';

			//reCAPTCHA トークン
			$token = "";
			if (!empty($_POST[ 'g-recaptcha-response' ])) {
			$token = $_POST[ 'g-recaptcha-response' ];
			}

			if ( !empty($token) ) {

			//cURLでrecaptchaにアクセス
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
			curl_setopt($ch, CURLOPT_POST, true );
			//POSTパラメタ
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(
				'secret' => $secret_key,
				'response' => $token
			)));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // curl_exec() 経由で応答データを直接取得(文字列)できるようにする

			//結果取得
			$res = curl_exec($ch);
			curl_close($ch);

			//レスポンスのjsonをデコードし取得
			$result = json_decode( $res );
			if ( $result->success  ) {   				
					// $form = disp_contact($form);
					unset($_SESSION["form"]);
					$mail = get_info(INFO_MAIL);
					$mail["fromname"] = $mail["fromname2"];
					$mail["email"] = $mail["email2"];
					$mail["manager"] = $mail["manager2"];
					// メール送信
					template_mail($form["email"], "mail5_subject", "mail5_body",
						array("name" => $form["name"], "form" => disp_contact($form)), "manager2", $mail);

					$ap->template = "contact-thankyou.html";
			} else {
					if ($ap->act == "contact-reinput") {
						$form =	$_SESSION["form"];
						unset($_SESSION["form"]);
						$ap->set("form", $form);
						$ap->template = "contact.html";
					}
			}
			}
			//reCAPTCHA　設定ここまで
			
			// 採用担当者様へ
			$form["kind_name"] = $contact_kind_list2[$form["kind"]];
			template_mail($form["email"], "mail8_subject", "mail8_body",
				array("info" => $info, "form" => disp_user($form), "name" => $form["name"]));
		}
	} else {
		unset($_SESSION["form"]);
	}
	$ap->set("form", $form);
}
if ($ap->act == "contact-reinput") {
	$form =	$_SESSION["form"];
	unset($_SESSION["form"]);
	$ap->set("form", $form);
	$ap->template = "contact.html";
}
if ($ap->act == "contact-thankyou") {

}

// -----------------------------------
// トップページ・スタティックページ
$ap->fix_template();

if ($ap->template == 'index.html') {
	$ap->set("use_syokusyu", $_SESSION["use_syokusyu"]);
	$ap->set("use_koyou", $_SESSION["use_koyou"]);
	$ap->set("use_kodawari1", $_SESSION["use_kodawari1"]);
	$ap->set("use_kodawari2", $_SESSION["use_kodawari2"]);
	$ap->set("use_kodawari3", $_SESSION["use_kodawari3"]);
	// 新着お知らせ6件
	$db = new News();
	$db->search[] = array("field" => "status", "value" => "1", "cond" => "=");
	$db->search[] = array("field" => "kind", "value" => "1", "cond" => "=");
	$db->order[] = array("field" => "news_date", "desc" => "1");
	$db->page = 0;
	$db->limit = 6;
	$list = $db->getList();
	$ap->set("news", $list);
	// コンテンツ4件
	$db = new Pr();
	$db->search[] = array("field" => "status", "value" => "1", "cond" => "=");
	$db->order[] = array("field" => "reg_date", "desc" => "1");
	$db->page = 0;
	$db->limit = 4;
	$list = $db->getList();
	$ap->set("pr_contents", $list);
	// 新着お仕事4件
	$db = new Item();
	$db->search[] = array("field" => "status", "value" => "1", "cond" => "=");
	// $db->search[] = array("field" => "image", "value" => "0", "cond" => ">");
	$db->order[] = array("field" => "reg_date", "desc" => "1");
	$db->page = 0;
	$db->limit = 10;
	$ret = $db->getList();
	foreach ($ret as $val) {
		$list[] = disp_item($val);
	}
	$ap->set("items", $list);
	// ピックアップお仕事4件
	$db = new Item();
	$db->search[] = array("field" => "status", "value" => "1", "cond" => "=");
	$db->search[] = array("field" => "pickup", "value" => "1", "cond" => "=");
	$db->search[] = array("field" => "image", "value" => "0", "cond" => ">");
	$db->order[] = array("field" => "reg_date", "desc" => "1");
	$db->page = 0;
	$db->limit = 0;
	$list = $db->getList();
	if ($list) {
		foreach ($list as $key => $val) {
			if ($val["syokusyu"]) {
				foreach ($val["syokusyu"] as $val2) {
					$list[$key]["syokusyu_list"][] = $_SESSION["mast_syokusyu"][$val2]["name"];
				}
			}
			if ($val["koyou"]) {
				foreach ($val["koyou"] as $val2) {
					$list[$key]["koyou_list"][] = $_SESSION["mast_koyou"][$val2]["name"];
				}
			}
		}
		// こだわりの種類で分類
		foreach ($_SESSION["mast_kodawari1"] as $val) {
			unset($items);
			$items["name"] = $val["name"];
			foreach ($list as $val2) {
				if ($val2["kodawari1"] && in_array($val["id"], $val2["kodawari1"])) {
					if (count($items["list"]) < 8) {
						$items["list"][] = $val2;
					} else {
						break;
					}
				}
			}
			if ($items["list"]) {
				$list2[] = $items;
			}
		}
		$ap->set("pickup", $list2);
	}

	// ピックアップお仕事4件:全国
	$db = new Item();
	$db->search[] = array("field" => "status", "value" => "1", "cond" => "=");
	$db->search[] = array("field" => "pickup", "value" => "1", "cond" => "=");
	$db->search[] = array("field" => "image", "value" => "0", "cond" => ">");
	$db->order[] = array("field" => "reg_date", "desc" => "1");
	$db->page = 0;
	$db->limit = 10;
	$ret = $db->getList();
	foreach ($ret as $val) {
		foreach ($area_pref_list as $key => $area_pref_array) {
			if(in_array($val['kinmu_pref'], $area_pref_array)){
				$val['area'] = $area_list[$key];
			}
		}
		$list_all[] = disp_item($val);
	}
	$ap->set("pickup_all", $list_all);

	// ピックアップお仕事4件:東海
	// var_dump($area_pref_list);
	$p = $area_pref_list[5];
	$db->search[] = array("field" => "status", "value" => "1", "cond" => "=");
	$db->search[] = array("field" => "pickup", "value" => "1", "cond" => "=");
	$db->search[] = array("field" => "kinmu_pref", "value" => $p, "cond" => "in");
	$db->search[] = array("field" => "image", "value" => "0", "cond" => ">");
	$db->order[] = array("field" => "reg_date", "desc" => "1");
	$db->page = 0;
	$db->limit = 4;
	$ret = $db->getList();
	foreach ($ret as $val) {
		foreach ($area_pref_list as $key => $area_pref_array) {
			if(in_array($val['kinmu_pref'], $area_pref_array)){
				$val['area'] = $area_list[$key];
			}
		}
		$list_toukai[] = disp_item($val);
	}
	$ap->set("pickup_toukai", $list_toukai);

	// ピックアップお仕事4件:愛知
	//pref_cd = 23
	$p = $area_pref_list[5];
	$db->search[] = array("field" => "status", "value" => "1", "cond" => "=");
	$db->search[] = array("field" => "pickup", "value" => "1", "cond" => "=");
	$db->search[] = array("field" => "kinmu_pref", "value" => "23", "cond" => "in");
	$db->search[] = array("field" => "image", "value" => "0", "cond" => ">");
	$db->order[] = array("field" => "reg_date", "desc" => "1");
	$db->page = 0;
	$db->limit = 4;
	$ret = $db->getList();
	foreach ($ret as $val) {
		foreach ($area_pref_list as $key => $area_pref_array) {
			if(in_array($val['kinmu_pref'], $area_pref_array)){
				$val['area'] = $area_list[$key];
			}
		}
		$list_aichi[] = disp_item($val);
	}
	$ap->set("pickup_aichi", $list_aichi);


	// コンテンツ4件:全て
	$db = new Contents();
	$db->search[] = array("field" => "status", "value" => "1", "cond" => "=");
	$db->search[] = array("field" => "list_image", "value" => "0", "cond" => ">");
	$db->order[] = array("field" => "reg_date", "desc" => "1");
	$db->page = 0;
	$db->limit = 10;
	$ret = $db->getList();
	foreach ($ret as $val) {
		$val["contents_category"] = $contents_kind_list[$val['kind']];
		$contents_all[] = $val;
	}
	$ap->set("contents_all", $contents_all);

	// コンテンツ4件:カテゴリ1
	$db = new Contents();
	$db->search[] = array("field" => "status", "value" => "1", "cond" => "=");
	$db->search[] = array("field" => "kind", "value" => "1", "cond" => "=");
	$db->search[] = array("field" => "list_image", "value" => "0", "cond" => ">");
	$db->order[] = array("field" => "reg_date", "desc" => "1");
	$db->page = 0;
	$db->limit = 4;
	$contents_1 = $db->getList();
	$ap->set("contents_1", $contents_1);

	// コンテンツ4件:カテゴリ2
	$db = new Contents();
	$db->search[] = array("field" => "status", "value" => "1", "cond" => "=");
	$db->search[] = array("field" => "kind", "value" => "2", "cond" => "=");
	$db->search[] = array("field" => "list_image", "value" => "0", "cond" => ">");
	$db->order[] = array("field" => "reg_date", "desc" => "1");
	$db->page = 0;
	$db->limit = 4;
	$contents_2 = $db->getList();
	$ap->set("contents_2", $contents_2);

	// コンテンツ4件:カテゴリ3
	$db = new Contents();
	$db->search[] = array("field" => "status", "value" => "1", "cond" => "=");
	$db->search[] = array("field" => "kind", "value" => "3", "cond" => "=");
	$db->search[] = array("field" => "list_image", "value" => "0", "cond" => ">");
	$db->order[] = array("field" => "reg_date", "desc" => "1");
	$db->page = 0;
	$db->limit = 4;
	$contents_3 = $db->getList();
	$ap->set("contents_3", $contents_3);

	// コンテンツ4件:カテゴリ4
	$db = new Contents();
	$db->search[] = array("field" => "status", "value" => "1", "cond" => "=");
	$db->search[] = array("field" => "kind", "value" => "4", "cond" => "=");
	$db->search[] = array("field" => "list_image", "value" => "0", "cond" => ">");
	$db->order[] = array("field" => "reg_date", "desc" => "1");
	$db->page = 0;
	$db->limit = 4;
	$contents_4 = $db->getList();
	$ap->set("contents_4", $contents_4);

	// コンテンツ4件:カテゴリ5
	$db = new Contents();
	$db->search[] = array("field" => "status", "value" => "1", "cond" => "=");
	$db->search[] = array("field" => "kind", "value" => "5", "cond" => "=");
	$db->search[] = array("field" => "list_image", "value" => "0", "cond" => ">");
	$db->order[] = array("field" => "reg_date", "desc" => "1");
	$db->page = 0;
	$db->limit = 4;
	$contents_5 = $db->getList();
	$ap->set("contents_5", $contents_5);

	// コンテンツ4件:カテゴリ6
	$db = new Contents();
	$db->search[] = array("field" => "status", "value" => "1", "cond" => "=");
	$db->search[] = array("field" => "kind", "value" => "6", "cond" => "=");
	$db->search[] = array("field" => "list_image", "value" => "0", "cond" => ">");
	$db->order[] = array("field" => "reg_date", "desc" => "1");
	$db->page = 0;
	$db->limit = 4;
	$contents_6 = $db->getList();
	$ap->set("contents_6", $contents_6);

	// コンテンツ4件:カテゴリ7
	$db = new Contents();
	$db->search[] = array("field" => "status", "value" => "1", "cond" => "=");
	$db->search[] = array("field" => "kind", "value" => "7", "cond" => "=");
	$db->search[] = array("field" => "list_image", "value" => "0", "cond" => ">");
	$db->order[] = array("field" => "reg_date", "desc" => "1");
	$db->page = 0;
	$db->limit = 4;
	$contents_7 = $db->getList();
	$ap->set("contents_7", $contents_7);

	// コンテンツ4件:カテゴリ8
	$db = new Contents();
	$db->search[] = array("field" => "status", "value" => "1", "cond" => "=");
	$db->search[] = array("field" => "kind", "value" => "8", "cond" => "=");
	$db->search[] = array("field" => "list_image", "value" => "0", "cond" => ">");
	$db->order[] = array("field" => "reg_date", "desc" => "1");
	$db->page = 0;
	$db->limit = 4;
	$contents_8 = $db->getList();
	$ap->set("contents_8", $contents_8);
}
if ($ap->act == 'nearby') { // 現在地の半径10キロ以内の求人を読み込む
    $lat = $_REQUEST['lat'];
    $lng = $_REQUEST['lng'];
    $rangeLat = NEARBY_RANGE_LAT;
    $rangeLng = NEARBY_RANGE_LNG;
    $sql = <<<JOY
        SELECT item_id, text02, title, image, syokusyu, koyou, kinmuti
               kinmu_zip, kinmu_pref, kinmu_city, kinmu_address1, kiinmu_address2,
               lat, lon, address.city AS city_name
        FROM item
        LEFT JOIN address ON address.city_cd = item.kinmu_city
        WHERE lat > 0 AND lon > 0
            AND ABS(lat-{$lat}) < {$rangeLat} AND ABS(lon-{$lng}) < {$rangeLng}
        ORDER BY POW(lat-{$lat}, 2) + POW(lon-{$lng}, 2)
JOY;
    $items = $ap->inst->search_sql($sql);

    // 都道府県
    $prefectures = array(
        '01' => '北海道',        '02' => '青森県',        '03' => '岩手県',        '04' => '宮城県',        '05' => '秋田県',
        '06' => '山形県',        '07' => '福島県',        '08' => '茨城県',        '09' => '栃木県',        '10' => '群馬県',
        '11' => '埼玉県',        '12' => '千葉県',        '13' => '東京都',        '14' => '神奈川県',      '15' => '新潟県',
        '16' => '富山県',        '17' => '石川県',        '18' => '福井県',        '19' => '山梨県',        '20' => '長野県',
        '21' => '岐阜県',        '22' => '静岡県',        '23' => '愛知県',        '24' => '三重県',        '25' => '滋賀県',
        '26' => '京都府',        '27' => '大阪府',        '28' => '兵庫県',        '29' => '奈良県',        '30' => '和歌山県',
        '31' => '鳥取県',        '32' => '島根県',        '33' => '岡山県',        '34' => '広島県',        '35' => '山口県',
        '36' => '徳島県',        '37' => '香川県',        '38' => '愛媛県',        '39' => '高知県',        '40' => '福岡県',
        '41' => '佐賀県',        '42' => '長崎県',        '43' => '熊本県',        '44' => '大分県',        '45' => '宮崎県',
        '46' => '鹿児島県',      '47' => '沖縄県'
    );

    // 職種
    $mstSyokusyu = array();
    $sql = "select * from master where kind=" . MAST_SYOKUSYU . " order by item_id";
    $ret = $ap->inst->search_sql($sql);
    if ($ret["data"]) {
        foreach ($ret["data"] as $val) {
            $mstSyokusyu[$val["item_id"]] = $val["contents"];
        }
    }

    // 雇用形態
    $mstKoyou = array();
    $sql = "select * from master where kind=" . MAST_KOYOU . " order by item_id";
    $ret = $ap->inst->search_sql($sql);
    if ($ret["data"]) {
        foreach ($ret["data"] as $val) {
            $mstKoyou[$val["item_id"]] = $val["contents"];
        }
    }

    echo json_encode(array(
        'items' => $items,
        'prefectures' => $prefectures,
        'syokusyu' => $mstSyokusyu,
        'koyou' => $mstKoyou,
    ));
    exit;
}
// 共通
if ($_SESSION["LOGIN"]) {
	if (!$_SESSION["KENTOU_COUNT"]) {
		$db = new Pickup();
		$db->search[] = array("field" => "user_id", "value" => $_SESSION["LOGIN"]["user_id"], "cond" => "=");
		$db->order[] = array("field" => "reg_date", "desc" => "1");
		$db->page = 0;
		$db->limit = 0;
		$list = $db->getList();
		if ($list) {
			foreach ($list as $val) {
				if (count($list2) < 5) {
					$item = Item::getData($val["item_id"]);
					if ($item["status"] == "1") {
					//	$val["item"] = disp_item($item);
						$list2[] = $val;
					}
				}
			}
			$_SESSION["KENTOU"] = $list2;
			$_SESSION["KENTOU_COUNT"] = count($list2);
		}
	}
	$ap->set("kentou_list", $_SESSION["KENTOU"]);
	$ap->set("kentou_count", $_SESSION["KENTOU_COUNT"]);
	//
} else {
	if (!$_SESSION["KENTOU_LIST"]) {
		// 先頭5件を表示
		$list = array();
		if ($_SESSION["KENTOU"]) {
			$ary = array_reverse($_SESSION["KENTOU"]);
			foreach ($ary as $val) {
				if (count($list) < 5) {
					$item = Item::getData($val);
					$list[] = $item;
				}
			}
		}
		$_SESSION["KENTOU_LIST"] = $list;
		$list = array();
	}
	$ap->set("kentou_list", $_SESSION["KENTOU_LIST"]);
	$ap->set("kentou_count", count($_SESSION["KENTOU"]));
}
if (!isset($_SESSION["PR_LIST"])) {
	$db = new Pr();
	$db->order[] = array("field" => "reg_date", "desc" => "1");
	$db->page = 0;
	$db->limit = 0;
	$list = $db->getList();
	$_SESSION["PR_LIST"] = $list;
}
$ap->set("pr_list", $_SESSION["PR_LIST"]);
//
if ($_SESSION["VIEW"]) {	// 保存されたものがあるか？
	if (!isset($_SESSION["VIEW_LIST"])) {	// 表示用一覧がなければ作る
		$list = array();
		$ary = array_reverse($_SESSION["VIEW"]);	// 保存されたものを逆順で（新しいものを先に）
		foreach ($ary as $val) {
			if (count($list) < 5) {		// 最大5件まで
				$item = Item::getData($val);
				$list[] = $item;
			}
		}
		$_SESSION["VIEW_LIST"] = $list;
		$list = array();
	}
	$ap->set("view_list", $_SESSION["VIEW_LIST"]);
}
$ap->set("view_count", count($_SESSION["VIEW_LIST"]));
// 画面出力
$ap->view();

// -----------------------------------
function login_check($msg="")
{
	if ($_SESSION["LOGIN"]) {
		return;
	}
	// ログイン後の飛び先（戻る場所）
	$_SESSION['NEXT_URL'] = './?act=logined';
	// 現在のパラメータを保存
	$_SESSION['REQUEST'] = $_REQUEST;
	//
	$_SESSION["login_message"] = $msg;
	header("location: login.html");
	exit;
}

function disp_contact($item)
{
	global $contact_kind_list;
	global $pref_list;
	global $confirm_list;

	if ($item["kind"]) {
		$item["kind"] = $contact_kind_list[$item["kind"]];
	}
	if ($item["pref"]) {
		$item["pref"] = $pref_list[$item["pref"]];
	}
	if ($item["confirm"]) {
		$item["confirm"] = $confirm_list[$item["confirm"]];
	}
	return $item;
}

function add_view($id1, $ids)
{
	global $ap;

	if (!is_array($ids)) {
		$ids = array($ids);
	}
	foreach ($ids as $id2) {
		unset($cond);
		$cond["item_id1"] = $id1;
		$cond["item_id2"] = $id2;
		$ret = View::findData($cond);
		if ($ret) {
			$sql = "update view set count=count+1 where seq=" . $ret[0]["seq"];
			$ap->inst->db_exec($sql);
		} else {
			unset($rec);
			$rec["item_id1"] = $id1;
			$rec["item_id2"] = $id2;
			$rec["count"] = "1";
			View::addData($rec);
		}
		unset($cond);
		$cond["item_id1"] = $id2;
		$cond["item_id2"] = $id1;
		$ret = View::findData($cond);
		if ($ret) {
			$sql = "update view set count=count+1 where seq=" . $ret[0]["seq"];
			$ap->inst->db_exec($sql);
		} else {
			unset($rec);
			$rec["item_id1"] = $id2;
			$rec["item_id2"] = $id1;
			$rec["count"] = "1";
			View::addData($rec);
		}
	}
}

function last_view($id)
{
	global $ap;

	if (!$_SESSION["VIEW"][$id]) {
		if ($_SESSION["VIEW"]) {
			add_view($id, $_SESSION["VIEW"]);
		}
		$_SESSION["VIEW"][$id] = $id;
		unset($_SESSION["VIEW_LIST"]);
		//
		$sql = "update item set view_count=view_count+1 where item_id={$id}";
		$ap->inst->db_exec($sql);
	}
}
// 検討リストに入っているか？
function is_kentou($id)
{
	if ($_SESSION["KENTOU"]) {
		if (in_array($id, $_SESSION["KENTOU"])) {
			return $id;
		}
	}
	return 0;
}
// アクセス数カウント処理
function add_access($url)
{
	if (!$_SESSION["UUID"]) {
		if (!$_COOKIE["UUID"]) {
			$uuid = md5(time() . $url);
			setcookie ("UUID", $uuid, time() + 60 * 60 * 24 * 30);
		} else {
			$uuid = $_COOKIE["UUID"];
		}
		$_SESSION["UUID"] = $uuid;
	}
	$item["kind"] = 1;
	$item["url"] = $url;
	$item["uuid"] = $_SESSION["UUID"];
	$item["access_date"] = date('Y-m-d');
	$ret = Access::findData($item);
	if (!$ret) {
		Access::addData($item);
	}
}
