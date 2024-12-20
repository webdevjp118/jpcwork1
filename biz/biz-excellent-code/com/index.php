<?php
error_reporting(0);
// クラス
require_once("common.php");
require_once("formcheck.php");

// クラスの生成
$ap = new Application();

define("AUTH_LOGIN", 1);
define("AUTH_LOGOUT", 2);
define("AUTH_AUTH_ADD", 11);
define("AUTH_AUTH_EDIT", 12);
define("AUTH_AUTH_DEL", 13);
define("AUTH_AUTH_CSV", 14);
define("AUTH_ITEM_ADD", 21);
define("AUTH_ITEM_EDIT", 22);
define("AUTH_ITEM_DEL", 23);
define("AUTH_ITEM_CSV", 24);
define("AUTH_USER_ADD", 31);
define("AUTH_USER_EDIT", 32);
define("AUTH_USER_DEL", 33);
define("AUTH_USER_CSV", 34);
define("AUTH_OUBO_ADD", 41);
define("AUTH_OUBO_EDIT", 42);
define("AUTH_OUBO_DEL", 43);
define("AUTH_OUBO_CSV", 44);
define("AUTH_NEWS_ADD", 51);
define("AUTH_NEWS_EDIT", 52);
define("AUTH_NEWS_DEL", 53);
define("AUTH_NEWS_CSV", 54);
define("AUTH_CONTENTS_ADD", 61);
define("AUTH_CONTENTS_EDIT", 62);
define("AUTH_CONTENTS_DEL", 63);
define("AUTH_CONTENTS_CSV", 64);
define("AUTH_PR_ADD", 71);
define("AUTH_PR_EDIT", 72);
define("AUTH_PR_DEL", 73);
define("AUTH_PR_CSV", 77);

$action_list = array(
	AUTH_LOGIN => "",
	AUTH_LOGOUT => "",
	AUTH_AUTH_ADD => "<a href=\"admin-authority.html\">権限管理</a>",
	AUTH_AUTH_EDIT => "<a href=\"admin-authority.html\">権限管理</a>",
	AUTH_AUTH_DEL => "<a href=\"admin-authority.html\">権限管理</a>",
	AUTH_AUTH_CSV => "<a href=\"admin-authority.html\">権限管理</a>",
	AUTH_ITEM_ADD => "<a href=\"admin-item.html\">求人情報管理</a>",
	AUTH_ITEM_EDIT => "<a href=\"admin-item.html\">求人情報管理</a>",
	AUTH_ITEM_DEL => "<a href=\"admin-item.html\">求人情報管理</a>",
	AUTH_ITEM_CSV => "<a href=\"admin-item.html\">求人情報管理</a>",
	AUTH_USER_ADD => "<a href=\"admin-user.html\">会員管理</a>",
	AUTH_USER_EDIT => "<a href=\"admin-user.html\">会員管理</a>",
	AUTH_USER_DEL => "<a href=\"admin-user.html\">会員管理</a>",
	AUTH_USER_CSV => "<a href=\"admin-user.html\">会員管理</a>",
	AUTH_OUBO_ADD => "<a href=\"admin-user.html\">会員管理</a>",
	AUTH_OUBO_EDIT => "<a href=\"admin-entry.html\">応募管理</a>",
	AUTH_OUBO_DEL => "<a href=\"admin-entry.html\">応募管理</a>",
	AUTH_OUBO_CSV => "<a href=\"admin-entry.html\">応募管理</a>",
	AUTH_NEWS_ADD => "<a href=\"news.html\">お知らせ管理</a>",
	AUTH_NEWS_EDIT => "<a href=\"news.html\">お知らせ管理</a>",
	AUTH_NEWS_DEL => "<a href=\"news.html\">お知らせ管理</a>",
	AUTH_NEWS_CSV => "<a href=\"news.html\">お知らせ管理</a>",
	AUTH_CONTENTS_ADD => "<a href=\"contents.html\">コンテンツ管理</a>",
	AUTH_CONTENTS_EDIT => "<a href=\"contents.html\">コンテンツ管理</a>",
	AUTH_CONTENTS_DEL => "<a href=\"contents.html\">コンテンツ管理</a>",
	AUTH_CONTENTS_CSV => "<a href=\"contents.html\">コンテンツ管理</a>",
	AUTH_PR_ADD => "<a href=\"admin-pr.html\">PR管理</a>",
	AUTH_PR_EDIT => "<a href=\"admin-pr.html\">PR管理</a>",
	AUTH_PR_DEL => "<a href=\"admin-pr.html\">PR管理</a>",
	AUTH_PR_CSV => "<a href=\"admin-pr.html\">PR管理</a>",
);

$action_list2 = array(
	AUTH_LOGIN => "ログイン",
	AUTH_LOGOUT => "ログアウト",
	AUTH_AUTH_ADD => "追加",
	AUTH_AUTH_EDIT => "編集",
	AUTH_AUTH_DEL => "削除",
	AUTH_AUTH_CSV => "CSVエクスポート",
	AUTH_ITEM_ADD => "追加",
	AUTH_ITEM_EDIT => "編集",
	AUTH_ITEM_DEL => "削除",
	AUTH_ITEM_CSV => "CSVエクスポート",
	AUTH_USER_ADD => "追加",
	AUTH_USER_EDIT => "編集",
	AUTH_USER_DEL => "削除",
	AUTH_USER_CSV => "CSVエクスポート",
	AUTH_OUBO_ADD => "追加",
	AUTH_OUBO_EDIT => "編集",
	AUTH_OUBO_DEL => "削除",
	AUTH_OUBO_CSV => "CSVエクスポート",
	AUTH_NEWS_ADD => "追加",
	AUTH_NEWS_EDIT => "編集",
	AUTH_NEWS_DEL => "削除",
	AUTH_NEWS_CSV => "CSVエクスポート",
	AUTH_CONTENTS_ADD => "追加",
	AUTH_CONTENTS_EDIT => "編集",
	AUTH_CONTENTS_DEL => "削除",
	AUTH_CONTENTS_CSV => "CSVエクスポート",
	AUTH_PR_ADD => "追加",
	AUTH_PR_EDIT => "編集",
	AUTH_PR_DEL => "削除",
	AUTH_PR_CSV => "CSVエクスポート",
);

// -----------------------------------
if ($ap->act == "logout") {
	add_action(AUTH_LOGOUT, $_SESSION["AUTH_LOGIN"]["seq"]);
	unset($_SESSION["AUTH_LOGIN"]);
	header("location: login.html");
	exit;
}
// ログイン
if ($ap->act == "login") {
	if ($_REQUEST["mode"] == "form") {
		if ($_REQUEST["email"] && $_REQUEST["passwd"]) {
			$cond["email"] = $_REQUEST["email"];
			$cond["passwd"] = $_REQUEST["passwd"];
			$cond["status"] = "1";	// ログイン可
			$ret = Tantou::findData($cond);
			if ($ret) {
				$_SESSION["AUTH_LOGIN"] = $ret[0];
				if ($_REQUEST["autologin"]) {
					// ログイン情報のCookieへの保存
					setLoginCookie($_SESSION["AUTH_LOGIN"]["email"], $_SESSION["AUTH_LOGIN"]["seq"], LOGIN_COOKIE);
				}
				// 最終ログイン
				$sql = "update tantou set last_date=now() where seq=" . $_SESSION["AUTH_LOGIN"]["seq"];
				$ap->inst->db_exec($sql);
				// アクション
				add_action(AUTH_LOGIN, $_SESSION["AUTH_LOGIN"]["seq"]);
				//
				$_SESSION["AUTH_LOGIN"]["auth1"] = multi_value($_SESSION["AUTH_LOGIN"]["auth1"]);
				$_SESSION["AUTH_LOGIN"]["auth2"] = multi_value($_SESSION["AUTH_LOGIN"]["auth2"]);
				$_SESSION["AUTH_LOGIN"]["auth3"] = multi_value($_SESSION["AUTH_LOGIN"]["auth3"]);
				$_SESSION["AUTH_LOGIN"]["auth4"] = multi_value($_SESSION["AUTH_LOGIN"]["auth4"]);
				$_SESSION["AUTH_LOGIN"]["auth5"] = multi_value($_SESSION["AUTH_LOGIN"]["auth5"]);
				$_SESSION["AUTH_LOGIN"]["auth6"] = multi_value($_SESSION["AUTH_LOGIN"]["auth6"]);
				$_SESSION["AUTH_LOGIN"]["auth7"] = multi_value($_SESSION["AUTH_LOGIN"]["auth7"]);
				$_SESSION["AUTH_LOGIN"]["auth8"] = multi_value($_SESSION["AUTH_LOGIN"]["auth8"]);
				//
				header("location: ./admin-graph.html");
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
	$ap->template = "admin-login.html";
	unset($_SESSION["AUTH_LOGIN"]);
	$ap->view();
	exit();
}
if ($ap->act == "password") {
	if ($_REQUEST["mode"]) {
		if ($_REQUEST["email"]) {
			$cond["email"] = $_REQUEST["email"];
			$ret = User::findData($cond);
			if ($ret) {
				// メール送信
				template_mail($_REQUEST["email"], "mail1_subject", "mail1_body", array("passwd" => $ret[0]["passwd"], "name" => $ret[0]["name"]));
				$msg[] = "パスワードをメールで送信しました。";
				$ap->template = "login.html";
			} else {
				$msg[] = "該当するメールアドレスがありません。 ";
			}
		} else {
			$msg[] = "「メールアドレス」欄が未入力になっています。 ";
		}
	}
	$ap->set("msg", $msg);
	$ap->set("form", $form);
	$ap->view();
	exit();
}
// -----------------------------------
// 以下ログインが必要
login_check();
// マスタ一覧
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
}
$ap->set("mast_syokusyu", $_SESSION["mast_syokusyu"]);
if (!isset($_SESSION["mast_koyou"])) {
	$list = array();
	$sql = "select * from master where kind=" . MAST_KOYOU . " order by item_id";
	$ret = $ap->inst->search_sql($sql);
	if ($ret["data"]) {
		foreach ($ret["data"] as $val) {
			$rec["id"] = $val["item_id"];
			$rec["name"] = $val["contents"];
			$list[$val["item_id"]] = $rec;
		}
	}
	$_SESSION["mast_koyou"] = $list;
}
$ap->set("mast_koyou", $_SESSION["mast_koyou"]);
if (!isset($_SESSION["mast_kodawari1"])) {
	$list = array();
	$sql = "select * from master where kind=" . MAST_KODAWARI1 . " order by item_id";
	$ret = $ap->inst->search_sql($sql);
	if ($ret["data"]) {
		foreach ($ret["data"] as $val) {
			$rec["id"] = $val["item_id"];
			$rec["name"] = $val["contents"];
			$list[$val["item_id"]] = $rec;
		}
	}
	$_SESSION["mast_kodawari1"] = $list;
}
$ap->set("mast_kodawari1", $_SESSION["mast_kodawari1"]);
if (!isset($_SESSION["mast_kodawari2"])) {
	$list = array();
	$sql = "select * from master where kind=" . MAST_KODAWARI2 . " order by item_id";
	$ret = $ap->inst->search_sql($sql);
	if ($ret["data"]) {
		foreach ($ret["data"] as $val) {
			$rec["id"] = $val["item_id"];
			$rec["name"] = $val["contents"];
			$list[$val["item_id"]] = $rec;
		}
	}
	$_SESSION["mast_kodawari2"] = $list;
}
$ap->set("mast_kodawari2", $_SESSION["mast_kodawari2"]);
if (!isset($_SESSION["mast_kodawari3"])) {
	$list = array();
	$sql = "select * from master where kind=" . MAST_KODAWARI3 . " order by item_id";
	$ret = $ap->inst->search_sql($sql);
	if ($ret["data"]) {
		foreach ($ret["data"] as $val) {
			$rec["id"] = $val["item_id"];
			$rec["name"] = $val["contents"];
			$list[$val["item_id"]] = $rec;
		}
	}
	$_SESSION["mast_kodawari3"] = $list;
}
$ap->set("mast_kodawari3", $_SESSION["mast_kodawari3"]);
// 担当者一覧
if (!$_SESSION["tantou_list"]) {
	$db = new Tantou();
//	$db->search[] = array("field" => "status", "value" => "1", "cond" => "=");
	$db->order[] = array("field" => "reg_date", "desc" => "1");
	$db->page = 0;
	$db->limit = 0;
	$list = $db->getList();
	$list2 = array();
	if ($list) {
		foreach ($list as $val) {
			unset($v);
			$v["tantou_id"] = $val["seq"];
			$v["name"] = $val["name"];
			$list2[] = $v;
		}
	}
	$_SESSION["tantou_list"] = $list2;
}
$ap->set("tantou_list", $_SESSION["tantou_list"]);

// 営業所一覧
if (!$_SESSION["branch_list"]) {
	$db = new Branch();
//	$db->search[] = array("field" => "status", "value" => "1", "cond" => "=");
	$db->order[] = array("field" => "reg_date", "desc" => "1");
	$db->page = 0;
	$db->limit = 0;
	$list = $db->getList();
	$list2 = array();
	if ($list) {
		foreach ($list as $val) {
			unset($v);
			$v["branch_id"] = $val["seq"];
			$v["name"] = $val["name"];
			$list2[] = $v;
		}
	}
	$_SESSION["branch_list"] = $list2;
}
$ap->set("branch_list", $_SESSION["branch_list"]);
//
$ap->set("admin", $_SESSION["AUTH_LOGIN"]);
//
if (!$_SESSION["HISTORY"]) {
	// 自分の履歴
	$db = new Action();
	$db->search[] = array("field" => "tantou_id", "value" => $_SESSION["AUTH_LOGIN"]["seq"], "cond" => "=");
	$db->order[] = array("field" => "reg_date", "desc" => "1");
	$db->page = $page;
	$db->limit = PAGE_ITEMS;
	$count = $db->getCount();
	$pages = intval(($count + $db->limit - 1) / $db->limit);
	if ($pages > 1) {
		$_SESSION["HISTORY_PAGER"] = page_index2($page, $pages, 10);
	}
	$list = $db->getList();
	if ($list) {
		$list2 = array();
		foreach ($list as $val) {
			$list2[] = disp_action($val);
		}
		$_SESSION["HISTORY"] = $list2;
	}
}
$ap->set("history", $_SESSION["HISTORY"]);	// アクション履歴
$ap->set("history_pager", $_SESSION["HISTORY_PAGER"]);
//
if (!$_SESSION["ADMIN_COUNT"]) {
	// 未対応件数
	$sql = "select count(*) as cnt from oubo where status=0";
	$ret = $ap->inst->search_sql($sql);
	if ($ret["count"]) {
		$count = $ret["data"][0]["cnt"];
	} else {
		$count = "0";
	}
	$_SESSION["ADMIN_COUNT"] = $count;
}
$ap->set("count", $_SESSION["ADMIN_COUNT"]);

// -----------------------------------
if ($ap->act == "admin-graph") {
	$y = date('Y') - 1;
	$m = date('m');
	for ($i = 0; $i < 12; $i++) {
		$d = sprintf("%04d-%02d-01", $y, $m);
		$oubo[$d]["y"] = $y;
		$oubo[$d]["m"] = $m;
		$oubo[$d]["count"] = 0;
		$accs[di]["y"] = $y;
		$acc[$d]["m"] = $m;
		$acc[$d]["count"] = 0;
		$m++;
		if ($m > 12) {
			$m = 1;
			$y++;
		}
	}
	$d = sprintf("%04d-%02d-01", date('Y') - 1, date('m'));
	$sql = "select * from access where kind=3 and access_date>='{$d}' order by access_date";
	$ret = $ap->inst->search_sql($sql);
	if ($ret["data"]) {
		foreach ($ret["data"] as $val) {
			if ($acc[$val["access_date"]]) {
				$acc[$val["access_date"]]["count"] = $val["count"];
			}
		}
	}
	$ap->set("access", $acc);
	//
	$sql = "select count(*) as c,year(reg_date) as y, month(reg_date) as m from oubo group by year(reg_date), month(reg_date) order by year(reg_date) desc, month(reg_date) desc";
	$ret = $ap->inst->search_sql($sql);
	if ($ret["data"]) {
		foreach ($ret["data"] as $val) {
			$ym = sprintf("%04d-%02d-01", $val["y"], $val["m"]);
			if ($oubo[$ym]) {
				$oubo[$ym]["count"] = $val["c"];
			}
		}
	}
	$ap->set("oubo", $oubo);
	//
	$db = new Action();
	$db->order[] = array("field" => "reg_date", "desc" => "1");
	$db->page = 0;
	$db->limit = 10;
	$count = $db->getCount();
	$list = $db->getList();
	if ($list) {
		$list2 = array();
		foreach ($list as $val) {
			$list2[] = disp_action($val);
		}
		$ap->set("list", $list2);
	}
	//
	$db = new Item();
	$db->search[] = array("field" => "status", "value" => "1", "cond" => "=");
	$db->order[] = array("field" => "view_count", "desc" => "1");
	$db->page = 0;
	$db->limit = 10;
	$count = $db->getCount();
	$list = $db->getList();
	if ($list) {
		unset($list2);
		foreach ($list as $val) {
			$list2[] = disp_item($val, 1);
		}
		$ap->set("view", $list2);
	}
}
if ($ap->act == "admin") {
	// 履歴
	$page = $_REQUEST["page"];
	$db = new Action();
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
			$list2[] = disp_action($val);
		}
		$ap->set("list", $list2);
	}
/*
	// 未対応件数
	$sql = "select count(*) as cnt from oubo where status=0";
	$ret = $ap->inst->search_sql($sql);
	if ($ret["count"]) {
		$count = $ret["data"][0]["cnt"];
	} else {
		$count = "0";
	}
	$ap->set("count", $count);
*/
}
// -----------------------------------
if ($ap->act == "admin-authority") {
	access_page_auth_check("admin-authority");
	if ($_REQUEST["mode"] == "delete") {
		$id = $_REQUEST["id"];
		$auth = Tantou::getData($id);
		if ($auth) {
			add_action(AUTH_AUTH_DEL, $_SESSION["AUTH_LOGIN"]["seq"], $id, $auth["name"]);
			Tantou::deleteData($id);
			unset($_SESSION["tantou_list"]);
		}
	}
	// 担当求人数再計算
	$sql = "update tantou set count=(select count(*) from item where tantou_id=tantou.seq)";
	$ap->inst->db_exec($sql);
	// 担当応募数再計算
	$sql = "update tantou set oubo=(select count(*) from oubo where tantou_id=tantou.seq)";
	$ap->inst->db_exec($sql);
	//
	$page = $_REQUEST["page"];
	$keyword = $_REQUEST["keyword"];
	$status = $_REQUEST["status"];
	$db = new Tantou();
	if ($keyword) {
		$where_keyword[] = array("field" => "name", "value" => "%{$keyword}%", "cond" => "like", "relation" => "or");
		$where_keyword[] = array("field" => "email", "value" => "%{$keyword}%", "cond" => "like", "relation" => "or");
		$db->search[] = array("nest" => $where_keyword);
		$form["keyword"] = $keyword;
	}
	if ($status) {
		$db->search[] = array("field" => "status", "value" => $status, "cond" => "=");
		$form["status"] = $status;
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
		$ap->set("list", $list);
	}
	$ap->set("form", $form);
}

// 担当者登録処理
if ($ap->act == "admin-authority-edit") {
	access_page_auth_check("admin-authority");

$authority_check = array(
	// フォーム項目名 文字種 最大文字数 必須 表示名称
	array("mode", "*", "", false, "モード"),
	array("name", "*", "", true, "お名前"),
	array("email", "MAIL", "", true, "メールアドレス"),
	array("passwd", "*", "", true, "パスワード"),
	array("auth1", "*", "", false, "権限管理"),
	array("auth2", "*", "", false, "求人管理"),
	array("auth3", "*", "", false, "会員管理"),
	array("auth4", "*", "", false, "応募管理"),
	array("auth5", "*", "", false, "サイトからのお知らせ"),
	array("auth6", "*", "", false, "コンテンツ管理"),
	array("auth7", "*", "", false, "PR管理"),
	array("auth8", "*", "", false, "営業管理"),
	array("status", "*", "", true, ""),
	array("mail", "*", "", false, ""),
	array("seq", "*", "", false, ""),
);

	if ($_REQUEST["mode"]) {
		$form = FormCheck::get_form($authority_check, $_REQUEST);
		$msg = FormCheck::check($form, $authority_check);
		if ($form["email"]) {
			$cond["email"] = $form["email"];
			$ret = Tantou::findData($cond);
			if ($ret) {
				foreach ($ret as $val) {
					if ($val["seq"] != $form["seq"]) {
						$msg["email"] = "このメールアドレスは利用できません";
					}
				}
			}
		}
		if ($msg) {
			foreach ($msg as $key => $v) {
				$data["error"][$key] = $v;
			}
			$ap->set("msg", $msg);
		} else {
			// 直接保存
		if ($form["seq"]) {
			$tantou = Tantou::getData($form["seq"]);
			$ap->set("tantou", $tantou);
		}
		// 保存
		$item['name'] = $form["name"];
		$item["email"] = $form["email"];
		$item["passwd"] = $form["passwd"];
		$item["auth1"] = $form["auth1"];
		$item["auth2"] = $form["auth2"];
		$item["auth3"] = $form["auth3"];
		$item["auth4"] = $form["auth4"];
		$item["auth5"] = $form["auth5"];
		$item["auth6"] = $form["auth6"];
		$item["auth7"] = $form["auth7"];
		$item["auth8"] = $form["auth8"];
		$item["status"] = $form["status"];
		$item['up_date'] = "now()";
		if ($form["seq"]) {
			$id = $form["seq"];
			Tantou::updateData($id, $item);
			add_action(AUTH_AUTH_EDIT, $_SESSION["AUTH_LOGIN"]["seq"], $form["seq"], $form["name"]);
		} else {
			$id = Tantou::addData($item);
			add_action(AUTH_AUTH_ADD, $_SESSION["AUTH_LOGIN"]["seq"], $id, $form["name"]);
		}
		if ($id == $_SESSION["AUTH_LOGIN"]["seq"]) {	// 自分の情報の場合更新
			$_SESSION["AUTH_LOGIN"] = Tantou::getData($id);
			$_SESSION["AUTH_LOGIN"]["auth1"] = multi_value($_SESSION["AUTH_LOGIN"]["auth1"]);
			$_SESSION["AUTH_LOGIN"]["auth2"] = multi_value($_SESSION["AUTH_LOGIN"]["auth2"]);
			$_SESSION["AUTH_LOGIN"]["auth3"] = multi_value($_SESSION["AUTH_LOGIN"]["auth3"]);
			$_SESSION["AUTH_LOGIN"]["auth4"] = multi_value($_SESSION["AUTH_LOGIN"]["auth4"]);
			$_SESSION["AUTH_LOGIN"]["auth5"] = multi_value($_SESSION["AUTH_LOGIN"]["auth5"]);
			$_SESSION["AUTH_LOGIN"]["auth6"] = multi_value($_SESSION["AUTH_LOGIN"]["auth6"]);
			$_SESSION["AUTH_LOGIN"]["auth7"] = multi_value($_SESSION["AUTH_LOGIN"]["auth7"]);
			$_SESSION["AUTH_LOGIN"]["auth8"] = multi_value($_SESSION["AUTH_LOGIN"]["auth8"]);
		}
		unset($_SESSION["tantou_list"]);
		if ($form["mail"]) {
			// メール送信
			template_mail($form["email"], "mail6_subject", "mail6_body", array("form" => $form, "name" => $form["name"]), "manager");
		}
		$ap->template = "admin-authority-edit-thankyou.html";
/*
			$_SESSION["form"] = $form;
			$form = disp_auth($form);
			$ap->template = "admin-authority-edit-confirm.html";
*/
		}
	} else {
		if ($_REQUEST["id"]) {
			$form = Tantou::getData($_REQUEST["id"]);
			$form["auth1"] = multi_value($form["auth1"]);
			$form["auth2"] = multi_value($form["auth2"]);
			$form["auth3"] = multi_value($form["auth3"]);
			$form["auth4"] = multi_value($form["auth4"]);
			$form["auth5"] = multi_value($form["auth5"]);
			$form["auth6"] = multi_value($form["auth6"]);
			$form["auth7"] = multi_value($form["auth7"]);
			$form["auth8"] = multi_value($form["auth8"]);
		} else {
			// デフォルト
			$form["status"] = "1";
		}
	}
	if ($form["seq"]) {
		$tid = $form["seq"];
		$sql = "update tantou set count=(select count(*) from item where tantou_id={$tid}) where seq={$tid}";
		$ap->inst->db_exec($sql);
		//
		$sql = "update tantou set oubo=(select count(*) from oubo where tantou_id={$tid}) where seq={$tid}";
		$ap->inst->db_exec($sql);
		//
		$tantou = Tantou::getData($form["seq"]);
		//
		$sql = "select count(*) as cnt from oubo where tantou_id={$tid}";
		$ret = $ap->inst->search_sql($sql);
		if ($ret["count"]) {
			$tantou["oubo"] = $ret["data"][0]["cnt"];
		}
		$ap->set("tantou", $tantou);
	}
	// アクション一覧
	$page = $_REQUEST["page"];
	$db = new Action();
	$db->search[] = array("field" => "tantou_id", "value" => $form["seq"], "cond" => "=");
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
			$list2[] = disp_action($val);
		}
		$ap->set("list", $list2);
	}
	$ap->set("form", $form);
}
if ($ap->act == "admin-authority-edit-reinput") {
	access_page_auth_check("admin-authority");
	// 再入力
	$ap->template = "admin-authority-edit.html";
	$form = $_SESSION["form"];
	unset($_SESSION["form"]);
	$form["auth1"] = multi_value($form["auth1"]);
	$form["auth2"] = multi_value($form["auth2"]);
	$form["auth3"] = multi_value($form["auth3"]);
	$form["auth4"] = multi_value($form["auth4"]);
	$form["auth5"] = multi_value($form["auth5"]);
	$form["auth6"] = multi_value($form["auth6"]);
	$form["auth7"] = multi_value($form["auth7"]);
	$form["auth8"] = multi_value($form["auth8"]);
	$ap->set("form", $form);
	if ($form["seq"]) {
		$tantou = Tantou::getData($form["seq"]);
		$ap->set("tantou", $tantou);
	}
}
if ($ap->act == "admin-authority-edit-thankyou") {
	access_page_auth_check("admin-authority");
	if ($_REQUEST["reinput_x"]) {
		$form =	$_SESSION["form"];
		unset($_SESSION["form"]);
		$ap->set("form", $form);
		$ap->template = "contact.html";
	} else if ($_SESSION["form"]) {
	// 保存
		$form = $_SESSION["form"];
		unset($_SESSION["form"]);
		if ($form["seq"]) {
			$tantou = Tantou::getData($form["seq"]);
			$ap->set("tantou", $tantou);
		}
		// 保存
		$item['name'] = $form["name"];
		$item["email"] = $form["email"];
		$item["passwd"] = $form["passwd"];
		$item["auth1"] = $form["auth1"];
		$item["auth2"] = $form["auth2"];
		$item["auth3"] = $form["auth3"];
		$item["auth4"] = $form["auth4"];
		$item["auth5"] = $form["auth5"];
		$item["auth6"] = $form["auth6"];
		$item["auth7"] = $form["auth7"];
		$item["auth8"] = $form["auth8"];
		$item["status"] = $form["status"];
		$item['up_date'] = "now()";
		if ($form["seq"]) {
			$id = $form["seq"];
			Tantou::updateData($id, $item);
			add_action(AUTH_AUTH_EDIT, $_SESSION["AUTH_LOGIN"]["seq"], $form["seq"], $form["name"]);
		} else {
			$id = Tantou::addData($item);
			add_action(AUTH_AUTH_ADD, $_SESSION["AUTH_LOGIN"]["seq"], $id, $form["name"]);
		}
		if ($id == $_SESSION["AUTH_LOGIN"]["seq"]) {	// 自分の情報の場合更新
			$_SESSION["AUTH_LOGIN"] = Tantou::getData($id);
			$_SESSION["AUTH_LOGIN"]["auth1"] = multi_value($_SESSION["AUTH_LOGIN"]["auth1"]);
			$_SESSION["AUTH_LOGIN"]["auth2"] = multi_value($_SESSION["AUTH_LOGIN"]["auth2"]);
			$_SESSION["AUTH_LOGIN"]["auth3"] = multi_value($_SESSION["AUTH_LOGIN"]["auth3"]);
			$_SESSION["AUTH_LOGIN"]["auth4"] = multi_value($_SESSION["AUTH_LOGIN"]["auth4"]);
			$_SESSION["AUTH_LOGIN"]["auth5"] = multi_value($_SESSION["AUTH_LOGIN"]["auth5"]);
			$_SESSION["AUTH_LOGIN"]["auth6"] = multi_value($_SESSION["AUTH_LOGIN"]["auth6"]);
			$_SESSION["AUTH_LOGIN"]["auth7"] = multi_value($_SESSION["AUTH_LOGIN"]["auth7"]);
			$_SESSION["AUTH_LOGIN"]["auth8"] = multi_value($_SESSION["AUTH_LOGIN"]["auth8"]);
		}
		unset($_SESSION["tantou_list"]);
		if ($form["mail"]) {
			// メール送信
			template_mail($form["email"], "mail6_subject", "mail6_body", array("form" => $form, "name" => $form["name"]), "manager");
		}
	}
}

//求人更新日時　自動更新設定 ------------------------
if ($ap->act == "autoupdate") {
	$value["contents"] = $_REQUEST["value"];
	unset($cond);
//	$cond["kind"] = INFO_AUTOUPDATE; // 求人更新日時　自動更新設定
	$cond["kind"] = 127; // 求人更新日時　自動更新設定
	$ret = Info::findData($cond);
	if ($ret) {
//		Info::updateData($ret[0]["info_id"], $value["contents"]);
		$sql = "update info set contents={$value["contents"]} where info_id={$ret[0]["info_id"]}";
		$ap->inst->db_exec($sql);
	} else {
		unset($item);
//		rec["kind"] = INFO_AUTOUPDATE; // 求人更新日時　自動更新設定
		$rec["kind"] = 127; // 求人更新日時　自動更新設定
		$rec["contents"] = $value["contents"];
		Info::addData($rec);
	}
	if ($value["contents"] == 1) {
		echo "自動更新設定をONに設定しました。";
	} else {
		echo "自動更新設定をOFFに設定しました。";
	}
	exit;
}
// -----------------------------------------------

// -----------------------------------
if ($ap->act == "admin-item") {
	access_page_auth_check("admin-item");

// 自動更新設定値取得 ------------------------
	unset($cond);
//	$cond["kind"] = INFO_AUTOUPDATE; // 求人更新日時　自動更新設定
	$cond["kind"] = 127; // 求人更新日時　自動更新設定
	$ret = Info::findData($cond);
	if ($ret) {
		$autoupdate = $ret[0]["contents"];
		$ap->set("autoupdate", $autoupdate);
	}
// 自動更新設定値取得 ------------------------

	//一括公開
	if($_REQUEST["mode"] == "publish"){
		foreach ($_POST['item_ids'] as $key => $item_id) {
			$value['status'] = 1;
			Item::updateData($item_id, $value);

			// addressテーブルの求人件数をupdateするよう修正 20200517
			$item = Item::getData($item_id);
			$sql = "update address set count=(select count(*) from item where kinmu_city='{$item["kinmu_city"]}' AND status = 1) where city_cd='{$item["kinmu_city"]}'";
			$ap->inst->db_exec($sql);
			//
		}
	}
	//一括非公開
	if($_REQUEST["mode"] == "unpublish"){
		foreach ($_POST['item_ids'] as $key => $item_id) {
			$value['status'] = 2;
			Item::updateData($item_id, $value);
			
			// addressテーブルの求人件数をupdateするよう修正 20200517
			$item = Item::getData($item_id);
			$sql = "update address set count=(select count(*) from item where kinmu_city='{$item["kinmu_city"]}' AND status = 1) where city_cd='{$item["kinmu_city"]}'";
			$ap->inst->db_exec($sql);
			//
		}
	}
	if ($_REQUEST["mode"] == "delete") {
		$id = $_REQUEST["id"];
		$item = Item::getData($id);
		if ($item) {
			add_action(AUTH_ITEM_DEL, $_SESSION["AUTH_LOGIN"]["seq"], $id, $item["title"]);
			Item::deleteData($id);
			//
			save_search($id, "kinmu_pref");
			save_search($id, "kinmu_city");
			save_search($id, "keyword");
			save_search($id, "kodawari1");
			save_search($id, "kodawari2");
			save_search($id, "kodawari3");
			save_search($id, "syokusyu");
			save_search($id, "koyou");
			save_search($id, "check01");
			save_search($id, "check02");
			save_search($id, "check03");
			save_search($id, "check04");
			save_search($id, "check05");
			save_search($id, "station");
			//
			$sql = "delete from oubo where item_id={$id}";
			$ap->inst->db_exec($sql);
			$tantou_id = $_SESSION["AUTH_LOGIN"]["seq"];
			$sql = "update tantou set count=(select count(*) from item where tantou_id={$tantou_id}) where seq={$tantou_id}";
			//
			update_search();
			//
			if ($_SESSION["last_query"]) {
				header("location: ./?" . $_SESSION["last_query"]);
				unset($_SESSION["last_query"]);
				exit;
			}
		}
	}
	$page = $_REQUEST["page"];
	$ap->set("page", $page);

	//1ページあたりの表示件数
	$limit = PAGE_ITEMS;
	//表示件数変更
	//Cookie取得
	if($_COOKIE['page_items_number']){
		//Cookieに表示件数が保存されている場合は、その値をセット
		$limit = $_COOKIE['page_items_number'];
	}
	//表示数切り替えをした場合、選択した値を利用し、Cookieにセット
	if($_REQUEST["mode"] == "change_page_item_number"){
		setcookie('page_items_number',$_POST['item_number']);
		$limit = $_POST['item_number'];
	}
	$ap->set("page_item_number", $limit);

	if ($_REQUEST["csv"]) {
		$page = 0;
		$limit = 0;
	}
	$page = $_REQUEST["page"];
	$pref = $_REQUEST["pref"];
	$city = $_REQUEST["city"];
	$status = $_REQUEST["status"];
	$title = $_REQUEST["title"];
	$tantou_id = $_REQUEST["tantou_id"];
	$order = $_REQUEST["order"];
	$db = new Item();
	$db->join[] = array("join" => "join", "table" => "tantou", "col1" => "tantou_id", "col2" => "tantou.seq");
	$db->join[] = array("join" => "left join", "table" => "branch", "col1" => "branch_id", "col2" => "branch.seq");

	if ($pref) {
		$db->search[] = array("field" => "kinmu_pref", "value" => $pref, "cond" => "=");
		$form["pref"] = $pref;
	}
	if ($city) {
//		$where_c[] = array("field" => "city_cd", "value" => $city, "cond" => "=");
//		$db->search[] = array("field" => "kinmu_city", "cond" => "in",
//			"select" => array("table" => "address", "where" => $where_c, "fields" => array("distinct city")));
		$db->search[] = array("field" => "kinmu_city", "value" => $city, "cond" => "=");
		$form["city"] = $city;
	}
	if ($status) {
		$db->search[] = array("field" => "item.status", "value" => $status, "cond" => "=");
		$form["status"] = $status;
	}
	if ($title) {
		$where_keyword[] = array("field" => "title", "value" => "%{$title}%", "cond" => "like", "relation" => "or");
		$where_keyword[] = array("field" => "item_id", "value" => "%{$title}%", "cond" => "like", "relation" => "or");
		$where_keyword[] = array("field" => "text01", "value" => "%{$title}%", "cond" => "like", "relation" => "or");
		$where_keyword[] = array("field" => "tantou.name", "value" => "%{$title}%", "cond" => "like", "relation" => "or");
		$where_keyword[] = array("field" => "branch.name", "value" => "%{$title}%", "cond" => "like", "relation" => "or");
		$db->search[] = array("nest" => $where_keyword);
		$form["title"] = $title;
	}
	if ($tantou_id) {
		$db->search[] = array("field" => "item.tantou_id", "value" => $tantou_id, "cond" => "=");
		$form["tantou_id"] = $tantou_id;
	}
	if ($order) {
		if ($order == 1) {
			$db->order[] = array("field" => "item.up_date");
		}
		if ($order == 2) {
			$db->order[] = array("field" => "item.up_date", "desc" => "1");
		}
		if ($order == 3) {
			$db->order[] = array("field" => "item.oubo");
		}
		if ($order == 4) {
			$db->order[] = array("field" => "item.oubo", "desc" => "1");
		}
		$ap->set("order", $order);
	}
	//else{
	//	$db->order[] = array("field" => "item.check01", "asc" => "1");
	//}
	$db->order[] = array("field" => "reg_date", "desc" => "1");
	$db->page = $page;
	$db->limit = $limit;
	$count = $db->getCount();
	if ($limit) {
		$pages = intval(($count + $db->limit - 1) / $db->limit);
		if ($pages > 1) {
			$ap->set("pager", page_index2($page, $pages, 10));
		}
	}
	$list = $db->getList(array("item.*", "tantou.name"));
	if ($_REQUEST["csv"]) {
		
		$db2 = new Item();
		$db2->join[] = array("join" => "join", "table" => "tantou", "col1" => "tantou_id", "col2" => "tantou.seq");
		$db2->join[] = array("join" => "left join", "table" => "branch", "col1" => "branch_id", "col2" => "branch.seq");
		$db2->order[] = array("field" => "item_id", "asc" => "1");
		$list = $db2->getList(array("item.*", "tantou.name"));
		
		$list2 = array();
		foreach ($list as $val) {
			$list2[] = disp_item($val, 1);
		}
		add_action(AUTH_ITEM_CSV, $_SESSION["AUTH_LOGIN"]["seq"]);
		put_csv($list2);
	}

	//CSVインポート処理
	if ($_REQUEST["import"]) {
		if (is_uploaded_file($_FILES["csvfile"]["tmp_name"])) {

			$file_tmp_name = $_FILES["csvfile"]["tmp_name"];
			$file_name = $_FILES["csvfile"]["name"];

			//拡張子を判定
			if (pathinfo($file_name, PATHINFO_EXTENSION) != 'csv') {
				$err_msg = 'CSVファイルのみ対応しています。';
			} else {
				//ファイルをdataディレクトリに移動
				if (move_uploaded_file($file_tmp_name, "./data/" . $file_name)) {
					//後で削除できるように権限を644に
					chmod("./data/" . $file_name, 0644);

					
					//if (($fp = fopen("./data/" . $file_name, "r")) === FALSE) {
					//		//TODO:エラー処理
					//}

					// CSVの中身がダブルクオーテーションで囲われていない場合に一文字目が化けるのを回避
					//setlocale(LC_ALL, 'ja_JP');

					//$buf = mb_convert_encoding(file_get_contents("./data/" . $file_name), "UTF-8", "sjis");
					//$buf = file_get_contents("./data/" . $file_name);
					//$fp = tmpfile();
					//fwrite($fp, $buf);
					//rewind($fp);

					
					//$fp = fopen("./data/" . $file_name, "r");
					
					$i=0;
					
					$line = file_get_contents("./data/" . $file_name);
					$line = mb_convert_encoding($line, 'UTF-8', 'sjis');
					
					// 一時ファイルの作成
					$temp = tmpfile();
					// メタデータからファイルパスを取得して読み込み
					$meta = stream_get_meta_data($temp);
					// 一時ファイル書き込み
					fwrite($temp, $line);
					// ファイルポインタの位置を先頭に
					rewind($temp);

					$file = new SplFileObject($meta['uri'], 'rb');
					$file->setFlags(SplFileObject::READ_CSV);
					$file->setCsvControl( ',', '"' );
					//$file->setCsvControl("\t", "\"");

					setlocale(LC_ALL, 'ja_JP.UTF-8');

					//while (($csv_data = fgetcsv($fp)) !== FALSE) {
					foreach ($file as $csv_data) {
							//mb_convert_variables('UTF-8', 'sjis-win', $csv_data);
							//mb_convert_variables('UTF-8', 'sjis', $csv_data);
							//$csv_data = mb_convert_encoding($csv_data, 'UTF-8', 'sjis');
							
							if($i == 0){
									// タイトル行
									$header = $csv_data;
									$i++;
									continue;
							}

							$data[] = $csv_data;
							$i++;
					}

					//fclose($fp);
					unlink('./data/'.$file_name);


					$kodawari1 = array();
					$kodawari2 = array();
					$kodawari3 = array();
					$syokusyu = array();
					$koyou = array();
					$kinmu_pref = array();
					$kinmu_city = array();

					$ret = Master::findData();

					if ($ret) {
						foreach ($ret as $val) {
							if($val["kind"] == "1"){
								$syokusyu[$val["contents"]] = $val["item_id"];
							}
							elseif($val["kind"] == "2"){
								$koyou[$val["contents"]] = $val["item_id"];
							}
							elseif($val["kind"] == "3"){
								$kodawari1[$val["contents"]] = $val["item_id"];
							}
							elseif($val["kind"] == "4"){
								$kodawari2[$val["contents"]] = $val["item_id"];
							}
							elseif($val["kind"] == "5"){
								$kodawari3[$val["contents"]] = $val["item_id"];
							}
						}
					}
					$sql = "select pref_cd, pref from address WHERE pref IS NOT NULL GROUP BY pref_cd, pref";
					$ret = $ap->inst->search_sql($sql);
					if ($ret['data']) {
						foreach ($ret['data'] as $val) {
							$kinmu_pref[$val["pref"]] = $val["pref_cd"];
						}
					}

					$sql = "select city_cd, city from address WHERE city IS NOT NULL";
					$ret = $ap->inst->search_sql($sql);
					if ($ret['data']) {
						foreach ($ret['data'] as $val) {
							$kinmu_city[$val["city"]] = $val["city_cd"];
						}
					}

					// CSVファイルの読み込み
					// $objFile = new SplFileObject($meta['uri'], 'rb');
					// $objFile = new SplFileObject($meta['uri']);
					// $objFile->setFlags(SplFileObject::READ_CSV);
					// $objFile->setCsvControl("\t", "\"");

					// foreach ($objFile as $aryData) {
					
					// キーワード検索用
					include_once("ngram_converter.php");
					mb_regex_encoding("UTF-8");
					$ngram = new NgramConverter();
						
					foreach ($data as $aryData) {
						//１行目はタイトルなので無視

						//item_idを取得
						// $item_id = $aryData[0];

						//システムIDを取得
						$item_id = $aryData[0];

						//データの有無
						$item_data = NULL;
						if($item_id){
								$item_data = Item::getData($item_id);
						}

						$_is_existed = false;				//データが存在しているか
						$_updating_moyori = true;		//最寄り駅を更新するか否か: デフォルトは更新するにセットしておく

						//データが既に存在している場合
						if(!empty($item_data)){
							$_is_existed = true;

							//現在の所在地情報と同じ場合
							//if($kinmu_pref[$aryData[21]] == $item_data["kinmu_pref"] &&
							//		$kinmu_city[$aryData[22]] == $item_data["kinmu_city"] &&
							//		$aryData[23] == $item_data["kinmu_address1"]){
							//	//所在地が同じ場合、最寄り駅を更新しない
							//	$_updating_moyori = false;
							//}

							//現在の所在地情報と同じ場合
							if($kinmu_pref[$aryData[27]] == $item_data["kinmu_pref"] &&
									$kinmu_city[$aryData[28]] == $item_data["kinmu_city"] &&
									$aryData[29] == $item_data["kinmu_address1"]){
								//所在地が同じ場合、最寄り駅を更新しない
								$_updating_moyori = false;
							}

						}

						$item = array();
						$item["tantou_id"] 	 = $aryData[1]?intval($aryData[1]):NULL;
						$item["branch_id"] 	 	= $aryData[2]?intval($aryData[2]):NULL;
						$item['title'] 			 = $aryData[3]?$aryData[3]:NULL;
						$item['description'] = $aryData[4]?$aryData[4]:NULL;
						$item['keyword'] 		 = $aryData[5]?$aryData[5]:NULL;
						$item['recommend'] 	 = $aryData[6]?$aryData[6]:NULL;
						$item['pickup'] 		 = $aryData[7]?intval($aryData[7]):NULL;
						$item['image'] 			 = $aryData[8]?$aryData[8]:NULL;
						$item['pr'] 				 = $aryData[9]?$aryData[9]:NULL;

						$kodawari1_array = explode("、", $aryData[10]);
						$kodawari1_array1 = array();
						foreach ($kodawari1_array as $v) {
							$kodawari1_array1[] = $kodawari1[$v];
						}
						if(!empty($kodawari1_array1)){
							$item['kodawari1'] = $kodawari1_array1;
						}else{
							$item['kodawari1'] = NULL;
						}

						$kodawari2_array = explode("、", $aryData[11]);
						$kodawari2_array1 = array();
						foreach ($kodawari2_array as $v) {
							$kodawari2_array1[] = $kodawari2[$v];
						}
						if(!empty($kodawari2_array1)){
							$item['kodawari2'] = $kodawari2_array1;
						}else{
							$item['kodawari2'] = NULL;
						}

						$syokusyu_array = explode("、", $aryData[13]);
						$syokusyu_array1 = array();
						foreach ($syokusyu_array as $v) {
							$syokusyu_array1[] = $syokusyu[$v];
						}
						if(!empty($syokusyu_array1)){
							$item['syokusyu'] = $syokusyu_array1;
						}else{
							$item['syokusyu'] = NULL;
						}

						$koyou_array = explode("、", $aryData[15]);
						$koyou_array1 = array();
						foreach ($koyou_array as $v) {
							$koyou_array1[] = $koyou[$v];
						}
						if(!empty($koyou_array1)){
							$item['koyou'] = $koyou_array1;
						}else{
							$item['koyou'] = NULL;
						}
						$item['indeed'] 				  = $aryData[14]?$aryData[14]:NULL;
						$item['kikan'] 					  = $aryData[18]?$aryData[18]:NULL;
						$item['jikan'] 					  = $aryData[19]?$aryData[19]:NULL;
						$item['kyujitsu'] 			  = $aryData[20]?$aryData[20]:NULL;
						$item['kyuyo'] 					  = $aryData[21]?$aryData[21]:NULL;
						//$item['kyuyo_type'] 		  = $aryData[22]?$aryData[22]:NULL;
						$item['kyuyo_type'] 		  = $aryData[22]?$aryData[22]:0;
						$item['kyuyo_google'] 	  = $aryData[23]?$aryData[23]:NULL;
						$item['kyuyo_min_google'] = $aryData[24]?$aryData[24]:NULL;
						$item['kyuyo_max_google'] = $aryData[25]?$aryData[25]:NULL;
						$item['kinmu_zip'] 				= $aryData[26]?$aryData[26]:NULL;

						if($kinmu_pref[$aryData[27]]){
							$item['kinmu_pref'] = intval($kinmu_pref[$aryData[27]]);
						}else{
							$item['kinmu_pref'] = NULL;
						}

						if($kinmu_city[$aryData[28]]){
							$item['kinmu_city'] = $kinmu_city[$aryData[28]];
						}else{
							$item['kinmu_city'] = NULL;
						}

						$item['kinmu_address1'] = $aryData[29]?$aryData[29]:NULL;
						$item['kiinmu_address2'] = $aryData[30]?$aryData[30]:NULL;
						$item['text03'] 				= $aryData[59]?$aryData[59]:NULL;
						//$item['station'] = $aryData[31]?$aryData[31]:NULL;
						$item['shigoto'] 				= $aryData[32]?$aryData[32]:NULL;
						$item['koutsuu'] 				= $aryData[33]?$aryData[33]:NULL;
						$item['taisyou'] 				= $aryData[34]?$aryData[34]:NULL;
						$item['shikaku'] 				= $aryData[35]?$aryData[35]:NULL;
						$item['teate'] 					= $aryData[36]?$aryData[36]:NULL;
						$item['fukuri'] 				= $aryData[37]?$aryData[37]:NULL;
						$item['mensetsu_zip'] 	= $aryData[38]?$aryData[38]:NULL;

						// $item['mensetsu_pref'] = $aryData[33]?$aryData[33]:NULL;
						if($kinmu_pref[$aryData[39]]){
							$item['mensetsu_pref'] = $kinmu_pref[$aryData[39]];
						}else{
							$item['mensetsu_pref'] = NULL;
						}
						// $item['mensetsu_city'] = $aryData[34]?$aryData[34]:NULL;
						if($kinmu_city[$aryData[40]]){
							$item['mensetsu_city'] = $kinmu_city[$aryData[40]];
						}else{
							$item['mensetsu_city'] = NULL;
						}
						$item['mensetsu_addr1'] = $aryData[41]?$aryData[41]:NULL;
						$item['mensetsu_addr2'] = $aryData[42]?$aryData[42]:NULL;
						$item['consult'] 				= $aryData[43]?$aryData[43]:NULL;
						$item['textarea01'] 		= $aryData[47]?$aryData[47]:NULL;
						$item['textarea02'] 		= $aryData[48]?$aryData[48]:NULL;
						$item['textarea03'] 		= $aryData[49]?$aryData[49]:NULL;
						$item['textarea04'] 		= $aryData[50]?$aryData[50]:NULL;
						//$item['text01'] = $aryData[55]?$aryData[515]:NULL;
						$item['text01'] 	  		= $aryData[57]?$aryData[57]:NULL;
						$item['text02'] 	  		= $aryData[58]?$aryData[58]:NULL;
						$item['text03'] 	  		= $aryData[59]?$aryData[59]:NULL;
						$item['text04'] 	  		= $aryData[60]?$aryData[60]:NULL;
						$item['text05'] 	  		= $aryData[61]?$aryData[61]:NULL;
						$item['text06'] 	  		= $aryData[62]?$aryData[62]:NULL;
						$item['text07'] 	  		= $aryData[63]?$aryData[63]:NULL;
						$item['text08'] 	  		= $aryData[64]?$aryData[64]:NULL;
						$item['text09'] 	  		= $aryData[65]?$aryData[65]:NULL;
						$item['text10'] 	  		= $aryData[66]?$aryData[66]:NULL;
						
						$check01_array = explode("、", $aryData[72]);
						$check01_array1 = array();
						foreach ($check01_array as $v) {
							if($v == "ETC"){
								$check01_array1[] = 1;
							}else if($v == "HW"){
								$check01_array1[] = 3;
							}else if($v == "該当なし"){
								$check01_array1[] = 2;
							}
						}

						if(!empty($check01_array1)){
							$item['check01'] = $check01_array1;
						}else{
							$item['check01'] = NULL;
						}
					
						$item['biko'] 		  		= $aryData[87]?$aryData[87]:NULL;
						$item['status'] = 0;
						if($aryData[88] == "公開"){
							$item['status'] = 1;
						}elseif ($aryData[88] == "非公開") {
							$item['status'] = 2;
						}
						$item['lat'] 		  		= $aryData[89]?$aryData[89]:0;
						$item['lon'] 		  		= $aryData[90]?$aryData[90]:0;
												
						// キーワード検索用
						$fulltext = $item["title"] . $item["pr"] . $item["moyori"] . $item["jikan"] . $item["kyujitsu"] . $item["kyuyo"] .
							$item["kinmu_address1"] . $item["shigoto"] . $item["koutsuu"] . $item["taisyou"] . $item["shikaku"] . $item["teate"] .
							$item["fukuri"] . $item["biko"] . $item["consult"] . $itemitem["indeed"] .
							$item["textarea01"] . $item["textarea02"] . $item["textarea03"] . $item["textarea04"] . $item["textarea05"] .
							$item["textarea06"] . $item["textarea07"] . $item["textarea08"] . $item["textarea09"] . $item["textarea10"] .
							$item["text01"] . $item["text02"] . $item["text03"] . $item["text04"] . $item["text05"] .
							$item["text06"] . $item["text07"] . $item["text08"] . $item["text09"] . $item["text10"];
						$item["searchtext"] = $ngram->to_fulltext(mb_eregi_replace("[　|《|》|（|）|\[|\]|＜|＞|\||｜|「|」|…|、|。|＃|！|？|：|［| ］]", "", $fulltext), 4);


						$item['up_date'] = $aryData[94]?$aryData[94]:"now()";

						if($aryData[95]){
							$item['reg_date'] = $aryData[95];
						}
// echo $item_id.":".$item['up_date']." ".$item['reg_date']."<br/>";
						if($item["title"]){
							if ($item_data) {
									//item_idのデータが既にあれば、UPDATE
									// Item::updateData($item_data['item_id'], $item);
									Item::updateData($item_id, $item);
							}else{
									//item_idのデータがなければ、INSERT
									// $item["item_id"] = $item_id;
									// $item['text01'] = $aryData[18]?$aryData[18]:NULL;
									$item_id = Item::addData($item);
							}
						}
						usleep(1000);
						// $aryDataList[] = $aryData;

						// 検索条件保存
						save_search($item_id, "kinmu_pref", $item["kinmu_pref"]);
						save_search($item_id, "kinmu_city", $item["kinmu_city"]);
						// save_search($item_id, "keyword", explode(",", $item["keyword"]));
						save_search($item_id, "kodawari1", $kodawari1_array1);
						save_search($item_id, "kodawari2", $kodawari2_array1);
						// save_search($item_id, "kodawari3", $kodawari3_array1);
						save_search($item_id, "syokusyu", $syokusyu_array1);
						save_search($item_id, "koyou", $koyou_array1);

						// 担当件数
						$tantou_id = $_SESSION["AUTH_LOGIN"]["seq"];
						$sql = "update tantou set count=(select count(*) from item where tantou_id={$tantou_id}) where seq={$tantou_id}";
						$ap->inst->db_exec($sql);
						// 既存処理とおもうが不具合がある・・・
						//$sql = "update address set count=(select count(*) from item where kinmu_city='{$form["kinmu_city"]}') where city_cd='{$form["kinmu_city"]}'";
						//$ap->inst->db_exec($sql);

					}

					fclose($temp);
					$objFile = null;

					// 表示件数を再カウント
					//　一旦初期化
					$sql = "update address set count=0";
					$ap->inst->db_exec($sql);

					$sql = "select item_id, kinmu_pref, kinmu_city from item WHERE status = 1 and kinmu_city is not null GROUP BY kinmu_pref, kinmu_city";
					$ret = $ap->inst->search_sql($sql);
					if ($ret['data']) {
						foreach ($ret['data'] as $val) {
							$sql = "update address set count=(select count(*) from item where kinmu_city='{$val["kinmu_city"]}' AND status = 1) where city_cd='{$val["kinmu_city"]}'";
							$ap->inst->db_exec($sql);
						}
					}
					
					$ap->template = "admin-item-edit-thankyou.html";

				}
			}
		}
		// exit;
	}//インポート処理 ここまで


	$ap->set(array("total" => $count, "start" => $page * $db->limit + 1, "end" => $page * $db->limit + count($list)));
	if ($list) {
		$list2 = array();
		foreach ($list as $val) {
			$tantou = Tantou::getData($val["tantou_id"]);
			$val["tantou"] = $tantou;
			$branch = Branch::getData($val["branch_id"]);
			$val["branch"] = $branch;
			$val["kinmu_pref"] = $pref_list[$val["kinmu_pref"]];
			$val["kinmu_city"] = get_city_name($val["kinmu_city"]);
			$list2[] = $val;
		}
		$ap->set("list", $list2);
	}
	$ap->set("form", $form);
	//
//	if ($_REQUEST["mode"] == "form") {
		$_SESSION["last_query"] = $_SERVER["QUERY_STRING"];
//	} else {
//		unset($_SESSION["last_query"]);
//	}
}

if ($ap->act == "admin-item-edit") {
	access_page_auth_check("admin-item");
$item_check = array(
	// フォーム項目名 文字種 最大文字数 必須 表示名称
	array('item_id', "*", "", false, "求人ID"),
	array("mode", "*", "", false, "モード"),
	array('tantou_id', "*", "", true, "担当者"),
	array('branch_id', "*", "", false, "営業所"),
	array('title', "*", "", true, "求人タイトル"),
	array('pr_flag', "*", "", false, "PRメッセージを反映"),
	array('description', "*", "", false, "description"),
	array('keyword', "*", "", false, "keywords"),
	array('recommend', "*", "", false, "コンサルタントオススメ"),
	array('pickup', "*", "", false, "ピックアップ"),
//	array('image', "*", "", false, "画像"),
	array('pr', "*", "", false, "PRメッセージ"),
	array('kodawari1', "*", "", false, "こだわりカテゴリ"),
	array('kodawari2', "*", "", false, "こだわりカテゴリ2"),
	array('kodawari3', "*", "", false, "こだわりカテゴリ3"),
	array('syokusyu', "*", "", false, "募集職種"),
	array('indeed', "*", "", false, "indeed用職種"),
	array('koyou', "*", "", false, "雇用形態"),
//	array('kinmuti', "*", "", false, "勤務地"),
	array('moyori', "*", "", false, "最寄駅・沿線"),
	array('kikan', "*", "", false, "勤務期間"),
	array('jikan', "*", "", false, "勤務時間"),
	array('kyujitsu', "*", "", false, "休日"),
	array('kyuyo', "*", "", false, "給与"),
	array('kyuyo_type', "N", "", false, "給与タイプ"),
	array('kyuyo_google', "N", "", false, "google掲載用給与"),
	array('kyuyo_min_google', "N", "", false, "google掲載用給与min"),
	array('kyuyo_max_google', "N", "", false, "google掲載用給与max"),
	array('kinmu_zip1', "N", "", false, "勤務地 郵便番号1"),
	array('kinmu_zip2', "N", "", false, "勤務地 郵便番号2"),
	array('kinmu_pref', "N", "", true, "勤務地 都道府県"),
	array('kinmu_city', "*", "", true, "勤務地 市区町村"),
	array('kinmu_address1', "*", "", false, "勤務地 番地まで"),
	array('kiinmu_address2', "*", "", false, "勤務地 建物名・階数"),
	array('shigoto', "*", "", false, "仕事内容"),
	array('koutsuu', "*", "", false, "交通手段"),
	array('taisyou', "*", "", false, "対象"),
	array('shikaku', "*", "", false, "応募資格"),
	array('teate', "*", "", false, "手当"),
	array('fukuri', "*", "", false, "待遇・福利厚生"),
	array('mensetsu_zip1', "N", "", false, "面接地 郵便番号1"),
	array('mensetsu_zip2', "N", "", false, "面接地 郵便番号2"),
	array('mensetsu_pref', "N", "", false, "面接地 都道府県"),
	array('mensetsu_city', "*", "", false, "面接地 市区町村"),
	array('mensetsu_addr1', "*", "", false, "面接地 番地まで"),
	array('mensetsu_addr2', "*", "", false, "面接地 建物名・階数"),
	array('consult', "*", "", false, "コンサルタントからの一言"),
	array('ymd01_year', "N", "", false, "ymd01年"),
	array('ymd01_month', "N", "", false, "ymd01月"),
	array('ymd01_day', "N", "", false, "ymd01日"),
	array('ymd02_year', "N", "", false, "ymd02年"),
	array('ymd02_month', "N", "", false, "ymd02月"),
	array('ymd02_day', "N", "", false, "ymd02日"),
	array('ymd03_year', "N", "", false, "ymd03年"),
	array('ymd03_month', "N", "", false, "ymd03月"),
	array('ymd03_day', "N", "", false, "ymd03日"),
	array('textarea01', "*", "", false, "textarea01"),
	array('textarea02', "*", "", false, "textarea02"),
	array('textarea03', "*", "", false, "textarea03"),
	array('textarea04', "*", "", false, "textarea04"),
	array('textarea05', "*", "", false, "textarea05"),
	array('textarea06', "*", "", false, "textarea06"),
	array('textarea07', "*", "", false, "textarea07"),
	array('textarea08', "*", "", false, "textarea08"),
	array('textarea09', "*", "", false, "textarea09"),
	array('textarea10', "*", "", false, "textarea10"),
	array('text01', "*", "", false, "text01"),
	array('text02', "*", "", false, "text02"),
	array('text03', "*", "", false, "text03"),
	array('text04', "*", "", false, "text04"),
	array('text05', "*", "", false, "text05"),
	array('text06', "*", "", false, "text06"),
	array('text07', "*", "", false, "text07"),
	array('text08', "*", "", false, "text08"),
	array('text09', "*", "", false, "text09"),
	array('text10', "*", "", false, "text10"),
	array('radio01', "*", "", false, "radio01"),
	array('radio02', "*", "", false, "radio02"),
	array('radio03', "*", "", false, "radio03"),
	array('radio04', "*", "", false, "radio04"),
	array('radio05', "*", "", false, "radio05"),
	array('check01', "*", "", true, "求人の種類"),
	array('check02', "*", "", false, "check02"),
	array('check03', "*", "", false, "check03"),
	array('check04', "*", "", false, "check04"),
	array('check05', "*", "", false, "check05"),
	array('file01', "*", "", false, "file01"),
	array('file02', "*", "", false, "file02"),
	array('file03', "*", "", false, "file03"),
	array('file04', "*", "", false, "file04"),
	array('file05', "*", "", false, "file05"),
	array('select01', "*", "", false, "select01"),
	array('select02', "*", "", false, "select02"),
	array('select03', "*", "", false, "select03"),
	array('select04', "*", "", false, "select04"),
	array('select05', "*", "", false, "select05"),
	array('biko', "*", "", false, "備考・メモ"),
	array('status', "*", "", true, "公開・非公開"),
	array("item_id", "*", "", false, "ID"),
	array('lat', "*", "", false, "LAT"),
	array('lon', "*", "", false, "LON"),
	array('station1', "*", "", false, "最寄駅1"),
	array('station2', "*", "", false, "最寄駅2"),
	array('station3', "*", "", false, "最寄駅3"),
	array('station4', "*", "", false, "最寄駅4"),
	array('station5', "*", "", false, "最寄駅5"),
);

/*
	// 担当者
	$db = new Tantou();
	$db->search[] = array("field" => "status", "value" => "1", "cond" => "=");
	$list = $db->getList();
	$ap->set("tantou", $list);
*/
	//
	if ($_REQUEST["mode"] == "form") {
		$form = FormCheck::get_form($item_check, $_REQUEST);
		if ($form['consult']) {		// このデータはHTMLコードOKとする
			$form['consult'] = $_REQUEST['consult'];
		}
		$msg = FormCheck::check($form, $item_check);

		// // 求人ID重複
		// if($form["item_id"]){
		// 	$cond["item_id"] = $form["item_id"];
		// 	$cond["status"] = "1";
		// 	$ret = Item::findData($cond);
		// 	if ($ret) {
		// 		foreach ($ret as $val) {
		// 			if ($val["title"] != $form["title"]) {
		// 				$msg["item_id"] = "求人IDが重複しています。変更してください。";
		// 			}
		// 		}
		// 	}
		// }

		// 求人タイトル重複
		if ($form["title"]) {
			$cond["title"] = $form["title"];
			$cond["status"] = "1";
			$ret = Item::findData($cond);
			if ($ret) {
				foreach ($ret as $val) {
					if ($val["item_id"] != $form["item_id"]) {
						$msg["title"] = "求人タイトルが重複しています。SEO上良くありませんので、変更してください。";
					}
				}
			}
		}
/*
		// 面接地が勤務地と同じ場合
		if ($_REQUEST["same_kinmuti"]) {
			if ($form['mensetsu_zip1'] == "") {
				$form['mensetsu_zip1'] = $form['kinmu_zip1'];
			}
			if ($form['mensetsu_zip2'] == "") {
				$form['mensetsu_zip2'] = $form['kinmu_zip2'];
			}
			if ($form['mensetsu_pref'] == "") {
				$form['mensetsu_pref'] = $form['kinmu_pref'];
			}
			if ($form['mensetsu_city'] == "") {
				$form['mensetsu_city'] = $form['kinmu_city'];
			}
			if ($form['mensetsu_addr1'] == "") {
				$form['mensetsu_addr1'] = $form['kinmu_address1'];
			}
			if ($form['mensetsu_addr2'] == "") {
				$form['mensetsu_addr2'] = $form['kinmu_address2'];
			}
		}
*/
		//
		$img = form_image("image", $msg, $img_type, IMAGE_MAX, 640);	// 横幅640pxに制限
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
		if ($form["email"]) {
			$cond["email"] = $form["email"];
			$ret = Tantou::findData($cond);
			if ($ret) {
				foreach ($ret as $val) {
					if ($_SESSION["LOGIN"]) {
						if ($val["tantou_id"] != $_SESSION["AUTH_LOGIN"]["tantou_id"]) {
							$msg["email"] = "このメールアドレスは利用できません。";
						}
					} else {
						$msg["email"] = "このメールアドレスは利用できません。";
					}
				}
			}
		}
		if ($msg) {
			foreach ($msg as $key => $v) {
				$data["error"][$key] = $v;
			}
			$ap->set("msg", $msg);
			$form["kodawari1"] = multi_value($form["kodawari1"]);
			$form["kodawari2"] = multi_value($form["kodawari2"]);
			$form["kodawari3"] = multi_value($form["kodawari3"]);
			$form["syokusyu"] = multi_value($form["syokusyu"]);
			$form["koyou"] = multi_value($form["koyou"]);
			$form["check01"] = multi_value($form["check01"]);
			$form["check02"] = multi_value($form["check02"]);
			$form["check03"] = multi_value($form["check03"]);
			$form["check04"] = multi_value($form["check04"]);
			$form["check05"] = multi_value($form["check05"]);
		} else {
			// 緯度経度を求める
			list($lat, $lon) = GetGeocode($pref_list[$form["kinmu_pref"]] . $form["kinmu_city"] . $form["kinmu_address1"]);
			if ($lat && $lon) {
				$form["lat"] = $lat;
				$form["lon"] = $lon;
				// 最寄り駅5つを得る
				$sql = "select line_cd,line_cd,station_cd,rr_name,line_name,station_name,(lat-35.7368781)*(lat-35.7368781)+(lon-139.315125)*(lon-139.315125) from station where 1=1 order by (lat-{$lat})*(lat-{$lat})+(lon-{$lon})*(lon-{$lon}) limit 0,5";
				$ret = $ap->inst->search_sql($sql);
				if ($ret["count"]) {
					$stations = array();
					$n = 1;
					foreach ($ret["data"] as $val) {
						$form["station" . $n++] = $val["station_cd"];
						$form["moyori"] .= $val["line_name"] . " " . $val["station_name"] . "駅<br>";
					}
				}
			}
			// 直接保存
		$item['title'] = $form["title"];
		$item['description'] = $form["description"];
		$item['keyword'] = $form["keyword"];
		$item['recommend'] = $form["recommend"];
		$item['pickup'] = $form["pickup"];
		$item['image'] = $form["image"];
		$item['pr'] = $form["pr"];
		$item['kodawari1'] = $form["kodawari1"];
		$item['kodawari2'] = $form["kodawari2"];
		$item['kodawari3'] = $form["kodawari3"];
		$item['syokusyu'] = $form["syokusyu"];
		$item['indeed'] = $form["indeed"];
		$item['koyou'] = $form["koyou"];
//		$item['kinmuti'] = $form["kinmuti"];
		$item['moyori'] = $form["moyori"];
		$item['kikan'] = $form["kikan"];
		$item['jikan'] = $form["jikan"];
		$item['kyujitsu'] = $form["kyujitsu"];
		$item['kyuyo'] = $form["kyuyo"];
		$item['kyuyo_type'] = $form["kyuyo_type"];
		$item['kyuyo_google'] = $form["kyuyo_google"];
		$item['kyuyo_min_google'] = $form["kyuyo_min_google"];
		$item['kyuyo_max_google'] = $form["kyuyo_max_google"];
		$item['kinmu_zip'] = $form["kinmu_zip1"] . "-" . $form["kinmu_zip2"];
		$item['kinmu_pref'] = $form["kinmu_pref"];
		$item['kinmu_city'] = $form["kinmu_city"];
		$item['kinmu_address1'] = $form["kinmu_address1"];
		$item['kiinmu_address2'] = $form["kiinmu_address2"];
		$item['shigoto'] = $form["shigoto"];
		$item['koutsuu'] = $form["koutsuu"];
		$item['taisyou'] = $form["taisyou"];
		$item['shikaku'] = $form["shikaku"];
		$item['teate'] = $form["teate"];
		$item['fukuri'] = $form["fukuri"];
		$item['mensetsu_zip'] = $form["mensetsu_zip1"] . "-" . $form["mensetsu_zip2"];
		$item['mensetsu_pref'] = $form["mensetsu_pref"];
		$item['mensetsu_city'] = $form["mensetsu_city"];
		$item['mensetsu_addr1'] = $form["mensetsu_addr1"];
		$item['mensetsu_addr2'] = $form["mensetsu_addr2"];
		$item['consult'] = $form["consult"];
		$item['ymd01'] = $form["ymd01"];
		$item['ymd02'] = $form["ymd02"];
		$item['ymd03'] = $form["ymd03"];
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
		$item['ymd01'] = $form["ymd01_year"] . "-" .$form["ymd01_month"] . "-" . $form["ymd01_day"];
		$item['ymd02'] = $form["ymd02_year"] . "-" .$form["ymd02_month"] . "-" . $form["ymd02_day"];
		$item['ymd03'] = $form["ymd03_year"] . "-" .$form["ymd03_month"] . "-" . $form["ymd03_day"];
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
		$item['lat'] = $form["lat"];
		$item['lon'] = $form["lon"];
		$item['status'] = $form["status"];
		$item['up_date'] = "now()";
		$item["tantou_id"] = $form["tantou_id"];
		$item["branch_id"] = $form["branch_id"];
		//$item["tantou_id"] = $_SESSION["AUTH_LOGIN"]["seq"];	// 担当者ID
		// キーワード検索用
		include_once("ngram_converter.php");
		mb_regex_encoding("UTF-8");
		$ngram = new NgramConverter();
		$fulltext = $form["title"] . $form["pr"] . $form["moyori"] . $form["jikan"] . $form["kyujitsu"] . $form["kyuyo"] .
			$form["kinmu_address1"] . $form["shigoto"] . $form["koutsuu"] . $form["taisyou"] . $form["shikaku"] . $form["teate"] .
			$form["fukuri"] . $form["biko"] . $form["consult"] . $form["indeed"] .
			$form["textarea01"] . $form["textarea02"] . $form["textarea03"] . $form["textarea04"] . $form["textarea05"] .
			$form["textarea06"] . $form["textarea07"] . $form["textarea08"] . $form["textarea09"] . $form["textarea10"] .
			$form["text01"] . $form["text02"] . $form["text03"] . $form["text04"] . $form["text05"] .
			$form["text06"] . $form["text07"] . $form["text08"] . $form["text09"] . $form["text10"];
		$item["searchtext"] = $ngram->to_fulltext(mb_eregi_replace("[　|《|》|（|）|\[|\]|＜|＞|\||｜|「|」|…|、|。|＃|！|？|：|［| ］]", "", $fulltext), 4);
		//

		if ($form["item_id"]) {
			$id = $form["item_id"];
			Item::updateData($id, $item);
			add_action(AUTH_ITEM_EDIT, $_SESSION["AUTH_LOGIN"]["seq"], $form["item_id"], $form["title"]);
		} else {

			$id = Item::addData($item);
			add_action(AUTH_ITEM_ADD, $_SESSION["AUTH_LOGIN"]["seq"], $id, $form["title"]);
		}
		// 検索条件保存
		save_search($id, "kinmu_pref", $form["kinmu_pref"]);
		save_search($id, "kinmu_city", $form["kinmu_city"]);
		save_search($id, "keyword", explode(",", $form["keyword"]));
		save_search($id, "kodawari1", $form["kodawari1"]);
		save_search($id, "kodawari2", $form["kodawari2"]);
		save_search($id, "kodawari3", $form["kodawari3"]);
		save_search($id, "syokusyu", $form["syokusyu"]);
		save_search($id, "koyou", $form["koyou"]);
		save_search($id, "check01", $form["check01"]);
		save_search($id, "check02", $form["check02"]);
		save_search($id, "check03", $form["check03"]);
		save_search($id, "check04", $form["check04"]);
		save_search($id, "check05", $form["check05"]);
		// 最寄り駅
		$station = array();
		if ($form["station1"]) {
			$station[] = $form["station1"];
		}
		if ($form["station2"]) {
			$station[] = $form["station2"];
		}
		if ($form["station3"]) {
			$station[] = $form["station3"];
		}
		if ($form["station4"]) {
			$station[] = $form["station4"];
		}
		if ($form["station5"]) {
			$station[] = $form["station5"];
		}
		save_search($id, "station", $station);
		// 担当件数
		$tantou_id = $_SESSION["AUTH_LOGIN"]["seq"];
		$sql = "update tantou set count=(select count(*) from item where tantou_id={$tantou_id}) where seq={$tantou_id}";
		$ap->inst->db_exec($sql);
		//
		$sql = "update address set count=(select count(*) from item where kinmu_city='{$form["kinmu_city"]}' AND status = 1) where city_cd='{$form["kinmu_city"]}'";
		$ap->inst->db_exec($sql);
		// メール送信
//		template_mail($form["email"], "mail2_subject", "mail2_body", array("form" => $form, "name" => $form["name"]), "manager");
		// メモ追加
		$rec["comment"] = "募集情報を編集しました。";
		$rec["tantou_id"] = $_SESSION["AUTH_LOGIN"]["seq"];
		$rec["item_id"] = $form["item_id"];
		$rec["kind"] = 1;
		Memo::addData($rec);
		//
		update_search();

	if ($_SESSION["last_query"]) {
		$ap->set("last_query", $_SESSION["last_query"]);
	//	unset($_SESSION["last_query"]);
	}
			$ap->template = "admin-item-edit-thankyou.html";
/*
			$_SESSION["form"] = $form;
			$form = disp_item($form);
			$ap->template = "admin-item-edit-confirm.html";
*/
		}
	} else {
		if ($_REQUEST["id"]) {
			if ($_REQUEST["mode"] == "memo") {
				$rec["comment"] = $_REQUEST["comment"];
				$rec["tantou_id"] = $_SESSION["AUTH_LOGIN"]["seq"];
				$rec["item_id"] = $_REQUEST["id"];
				$rec["kind"] = 1;
				Memo::addData($rec);
			}
			//
			$form = Item::getData($_REQUEST["id"]);
			$ary = explode("-", $form["kinmu_zip"]);
			$form["kinmu_zip1"] = $ary[0];
			$form["kinmu_zip2"] = $ary[1];
			$ary = explode("-", $form["mensetsu_zip"]);
			$form["mensetsu_zip1"] = $ary[0];
			$form["mensetsu_zip2"] = $ary[1];
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
			//
			$form["kodawari1"] = multi_value($form["kodawari1"]);
			$form["kodawari2"] = multi_value($form["kodawari2"]);
			$form["kodawari3"] = multi_value($form["kodawari3"]);
			$form["syokusyu"] = multi_value($form["syokusyu"]);
			$form["koyou"] = multi_value($form["koyou"]);
			$form["check01"] = multi_value($form["check01"]);
			$form["check02"] = multi_value($form["check02"]);
			$form["check03"] = multi_value($form["check03"]);
			$form["check04"] = multi_value($form["check04"]);
			$form["check05"] = multi_value($form["check05"]);
			//
			if ($_REQUEST["mode"] == "copy") {
				//unset($form["image"]);
				if ($form["image"]) {
					$id = image_copy($form["image"]);
					$form["image"] = $id;
				}
				unset($form["item_id"]);
				unset($form["file01"]);
				unset($form["file02"]);
				unset($form["file03"]);
				unset($form["file04"]);
				unset($form["file05"]);
				// コピーの場合は担当は自分にする
				$form["tantou_id"] = $_SESSION["AUTH_LOGIN"]["seq"];
			}
			if ($form["file01"]) {
				$f = File::getData($form["file01"]);
				$form["file01_name"] = $f["file_name"];
			}
			if ($form["file02"]) {
				$f = File::getData($form["file02"]);
				$form["file02_name"] = $f["file_name"];
			}
			if ($form["file03"]) {
				$f = File::getData($form["file03"]);
				$form["file03_name"] = $f["file_name"];
			}
			if ($form["file04"]) {
				$f = File::getData($form["file04"]);
				$form["file04_name"] = $f["file_name"];
			}
			if ($form["file05"]) {
				$f = File::getData($form["file05"]);
				$form["file05_name"] = $f["file_name"];
			}
		} else {
			// デフォルト
			$form["status"] = "1";
			$form["tantou_id"] = $_SESSION["AUTH_LOGIN"]["seq"];
		}
	}
	if ($form["item_id"]) {
		$info = Item::getData($form["item_id"]);
		$t = Tantou::getData($form["tantou_id"]);
		if ($t) {
			$info["tantou"] = $t["name"];
		}
		$ap->set("info", $info);
	}
/*
	// アクション一覧
	$page = $_REQUEST["page"];
	$db = new Action();
	$db->search[] = array("field" => "item_id", "value" => $form["item_id"], "cond" => "=");
	$db->search[] = array("field" => "kind", "value" => array(AUTH_ITEM_ADD,AUTH_ITEM_EDIT,AUTH_ITEM_DEL,AUTH_ITEM_CSV), "cond" => "in");
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
			$list2[] = disp_action($val);
		}
		$ap->set("list", $list2);
	}
*/
	// メモ
	if ($form["item_id"]) {	// 編集の場合のみ
		$db = new Memo();
		$db->search[] = array("field" => "item_id", "value" => $form["item_id"], "cond" => "=");
		$db->search[] = array("field" => "kind", "value" => "1", "cond" => "=");
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
				$tantou = Tantou::getData($val["tantou_id"]);
				if ($tantou) {
					$val["name"] = $tantou["name"];
				}
				$list2[] = $val;
			}
			$ap->set("list", $list2);
		}
	}
	$ap->set("form", $form);
	// 過去の面接地一覧
	$sql = "select distinct mensetsu_zip,mensetsu_pref,mensetsu_city,mensetsu_addr1,mensetsu_addr2 from item where mensetsu_zip<>'' and mensetsu_pref<>'' and mensetsu_city<>'' and mensetsu_addr1<>'' order by reg_date limit 0,10";
	$ret = $ap->inst->search_sql($sql);
	if ($ret["count"]) {
		$list = array();
		foreach ($ret["data"] as $val) {
			unset($adr);
			$ary = explode("-", $val["mensetsu_zip"]);
			$adr["zip1"] = $ary[0];
			$adr["zip2"] = $ary[1];
			$adr["pref"] = $val["mensetsu_pref"];
			$adr["city"] = $val["mensetsu_city"];
			$adr["address1"] = $val["mensetsu_addr1"];
			$adr["address2"] = $val["mensetsu_addr2"];
			$adr["address"] = $pref_list[$val["mensetsu_pref"]] . get_city_name($val["mensetsu_city"]) . $val["mensetsu_addr1"] . $val["mensetsu_addr2"];
			$list[] = $adr;
		}
		$ap->set("mensetsu_list", $list);
	}
}
if ($ap->act == "admin-item-edit-reinput") {
	access_page_auth_check("admin-item");
/*
	// 担当者
	$db = new Tantou();
	$db->search[] = array("field" => "status", "value" => "1", "cond" => "=");
	$list = $db->getList();
	$ap->set("tantou", $list);
*/
	// 再入力
	$ap->template = "admin-item-edit.html";
	$form = $_SESSION["form"];
	unset($_SESSION["form"]);
	$form["kodawari1"] = multi_value($form["kodawari1"]);
	$form["kodawari2"] = multi_value($form["kodawari2"]);
	$form["kodawari3"] = multi_value($form["kodawari3"]);
	$form["syokusyu"] = multi_value($form["syokusyu"]);
	$form["koyou"] = multi_value($form["koyou"]);
	$form["check01"] = multi_value($form["check01"]);
	$form["check02"] = multi_value($form["check02"]);
	$form["check03"] = multi_value($form["check03"]);
	$form["check04"] = multi_value($form["check04"]);
	$form["check05"] = multi_value($form["check05"]);
	//
	if ($form["item_id"]) {
		$info = Item::getData($form["item_id"]);
		$t = Tantou::getData($info["tantou_id"]);
		if ($t) {
			$info["tantou"] = $t["name"];
		}
		$ap->set("info", $info);
	}
/*
	// アクション一覧
	$page = $_REQUEST["page"];
	$db = new Action();
	$db->search[] = array("field" => "item_id", "value" => $form["item_id"], "cond" => "=");
	$db->search[] = array("field" => "kind", "value" => array(AUTH_ITEM_ADD,AUTH_ITEM_EDIT,AUTH_ITEM_DEL,AUTH_ITEM_CSV), "cond" => "in");
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
			$list2[] = disp_action($val);
		}
		$ap->set("list", $list2);
	}
*/
	// メモ
	if ($form["item_id"]) {
		$db = new Memo();
		$db->search[] = array("field" => "item_id", "value" => $form["item_id"], "cond" => "=");
		$db->search[] = array("field" => "kind", "value" => "1", "cond" => "=");
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
				$tantou = Tantou::getData($val["tantou_id"]);
				if ($tantou) {
					$val["name"] = $tantou["name"];
				}
				$list2[] = $val;
			}
			$ap->set("list", $list2);
		}
	}
	$ap->set("form", $form);
	// 過去の面接地一覧
	$sql = "select distinct mensetsu_zip,mensetsu_pref,mensetsu_city,mensetsu_addr1,mensetsu_addr2 from item where mensetsu_zip<>'' and mensetsu_pref<>'' and mensetsu_city<>'' and mensetsu_addr1<>'' order by reg_date limit 0,10";
	$ret = $ap->inst->search_sql($sql);
	if ($ret["count"]) {
		$list = array();
		foreach ($ret["data"] as $val) {
			unset($adr);
			$ary = explode("-", $val["mensetsu_zip"]);
			$adr["zip1"] = $ary[0];
			$adr["zip2"] = $ary[1];
			$adr["pref"] = $val["mensetsu_pref"];
			$adr["city"] = $val["mensetsu_city"];
			$adr["address1"] = $val["mensetsu_address1"];
			$adr["address2"] = $val["mensetsu_address2"];
			$adr["address"] = $pref_list[$val["mensetsu_pref"]] . $val["mensetsu_city"] . $val["mensetsu_addr1"] . $val["mensetsu_addr2"];
			$list[] = $adr;
		}
		$ap->set("mensetsu_list", $list);
	}
}
if ($ap->act == "admin-item-edit-thankyou") {
	access_page_auth_check("admin-item");
	if ($_REQUEST["reinput_x"]) {
		$form =	$_SESSION["form"];
		unset($_SESSION["form"]);
		$ap->set("form", $form);
		$ap->template = "contact.html";
	} else if ($_SESSION["form"]) {
	// 保存
		$form = $_SESSION["form"];
		unset($_SESSION["form"]);
		// 保存
		$item['title'] = $form["title"];
		$item['description'] = $form["description"];
		$item['keyword'] = $form["keyword"];
		$item['recommend'] = $form["recommend"];
		$item['pickup'] = $form["pickup"];
		$item['image'] = $form["image"];
		$item['pr'] = $form["pr"];
		$item['kodawari1'] = $form["kodawari1"];
		$item['kodawari2'] = $form["kodawari2"];
		$item['kodawari3'] = $form["kodawari3"];
		$item['syokusyu'] = $form["syokusyu"];
		$item['indeed'] = $form["indeed"];
		$item['koyou'] = $form["koyou"];
//		$item['kinmuti'] = $form["kinmuti"];
		$item['moyori'] = $form["moyori"];
		$item['kikan'] = $form["kikan"];
		$item['jikan'] = $form["jikan"];
		$item['kyujitsu'] = $form["kyujitsu"];
		$item['kyuyo'] = $form["kyuyo"];
		$item['kinmu_zip'] = $form["kinmu_zip1"] . "-" . $form["kinmu_zip2"];
		$item['kinmu_pref'] = $form["kinmu_pref"];
		$item['kinmu_city'] = $form["kinmu_city"];
		$item['kinmu_address1'] = $form["kinmu_address1"];
		$item['kiinmu_address2'] = $form["kiinmu_address2"];
		$item['shigoto'] = $form["shigoto"];
		$item['koutsuu'] = $form["koutsuu"];
		$item['taisyou'] = $form["taisyou"];
		$item['shikaku'] = $form["shikaku"];
		$item['teate'] = $form["teate"];
		$item['fukuri'] = $form["fukuri"];
		$item['mensetsu_zip'] = $form["mensetsu_zip1"] . "-" . $form["mensetsu_zip2"];
		$item['mensetsu_pref'] = $form["mensetsu_pref"];
		$item['mensetsu_city'] = $form["mensetsu_city"];
		$item['mensetsu_addr1'] = $form["mensetsu_addr1"];
		$item['mensetsu_addr2'] = $form["mensetsu_addr2"];
		$item['consult'] = $form["consult"];
		$item['ymd01'] = $form["ymd01"];
		$item['ymd02'] = $form["ymd02"];
		$item['ymd03'] = $form["ymd03"];
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
		$item['ymd01'] = $form["ymd01_year"] . "-" .$form["ymd01_month"] . "-" . $form["ymd01_day"];
		$item['ymd02'] = $form["ymd02_year"] . "-" .$form["ymd02_month"] . "-" . $form["ymd02_day"];
		$item['ymd03'] = $form["ymd03_year"] . "-" .$form["ymd03_month"] . "-" . $form["ymd03_day"];
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
		$item['lat'] = $form["lat"];
		$item['lon'] = $form["lon"];
		$item['status'] = $form["status"];
		$item['up_date'] = "now()";
		$item["tantou_id"] = $form["tantou_id"];
		//$item["tantou_id"] = $_SESSION["AUTH_LOGIN"]["seq"];	// 担当者ID
		//
		if ($form["item_id"]) {
			$id = $form["item_id"];
			Item::updateData($id, $item);
			add_action(AUTH_ITEM_EDIT, $_SESSION["AUTH_LOGIN"]["seq"], $form["item_id"], $form["title"]);
		} else {
			$id = Item::addData($item);
			add_action(AUTH_ITEM_ADD, $_SESSION["AUTH_LOGIN"]["seq"], $id, $form["title"]);
		}
		// 検索条件保存
		save_search($id, "kinmu_pref", $form["kinmu_pref"]);
		save_search($id, "kinmu_city", $form["kinmu_city"]);
		save_search($id, "keyword", explode(",", $form["keyword"]));
		save_search($id, "kodawari1", $form["kodawari1"]);
		save_search($id, "kodawari2", $form["kodawari2"]);
		save_search($id, "kodawari3", $form["kodawari3"]);
		save_search($id, "syokusyu", $form["syokusyu"]);
		save_search($id, "koyou", $form["koyou"]);
		save_search($id, "check01", $form["check01"]);
		save_search($id, "check02", $form["check02"]);
		save_search($id, "check03", $form["check03"]);
		save_search($id, "check04", $form["check04"]);
		save_search($id, "check05", $form["check05"]);
		// 最寄り駅
		$station = array();
		if ($form["station1"]) {
			$station[] = $form["station1"];
		}
		if ($form["station2"]) {
			$station[] = $form["station2"];
		}
		if ($form["station3"]) {
			$station[] = $form["station3"];
		}
		if ($form["station4"]) {
			$station[] = $form["station4"];
		}
		if ($form["station5"]) {
			$station[] = $form["station5"];
		}
		save_search($id, "station", $station);
		// 担当件数
		$tantou_id = $_SESSION["AUTH_LOGIN"]["seq"];
		$sql = "update tantou set count=(select count(*) from item where tantou_id={$tantou_id}) where seq={$tantou_id}";
		$ap->inst->db_exec($sql);
		//
		$sql = "update address set count=(select count(*) from item kinmu_city={$form["kinmu_city"]} AND status = 1) where city_cd={$form["kinmu_city"]}";
		$ap->inst->db_exec($sql);
		// メール送信
//		template_mail($form["email"], "mail2_subject", "mail2_body", array("form" => $form, "name" => $form["name"]), "manager");
		// メモ追加
		$rec["comment"] = "募集情報を編集しました。";
		$rec["tantou_id"] = $_SESSION["AUTH_LOGIN"]["seq"];
		$rec["item_id"] = $form["item_id"];
		$rec["kind"] = 1;
		Memo::addData($rec);
		//
		update_search();
	}
	if ($_SESSION["last_query"]) {
		$ap->set("last_query", $_SESSION["last_query"]);
	//	unset($_SESSION["last_query"]);
	}
}
// -----------------------------------
if ($ap->act == "admin-pr") {
	access_page_auth_check("admin-pr");
	if ($_REQUEST["mode"] == "delete") {
		$id = $_REQUEST["id"];
		$item = Pr::getData($id);
		if ($item) {
			add_action(AUTH_PR_DEL, $_SESSION["AUTH_LOGIN"]["seq"], $id, $item["title"]);
			Pr::deleteData($id);
		}
	}
	$page = $_REQUEST["page"];
	$db = new Pr();
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
	}
}
//
if ($ap->act == "admin-pr-edit") {
	access_page_auth_check("admin-pr");
$pr_check = array(
	// フォーム項目名 文字種 最大文字数 必須 表示名称
	array("mode", "*", "", false, "モード"),
	array('pr_date', "*", "", false, "登録日付"),
	array('title', "*", "", true, "タイトル"),
	array('contents', "*", "", false, "PRテキスト"),
//	array('image', "*", "", true, "サムネイル画像"),
	array('url', "*", "", true, "URL"),
	array('blank', "*", "", false, "新しいウィンドウで開く"),
	array('status', "*", "", true, "公開・非公開"),
	array("seq", "*", "", false, "ID"),
);

	if ($_REQUEST["mode"]) {
		$form = FormCheck::get_form($pr_check, $_REQUEST);
		$msg = FormCheck::check($form, $pr_check);
		$img = form_image("image", $msg, $img_type, IMAGE_MAX);
		if ($img) {
			$form["image"] = $img;
		} else {
		//	$msg["image"] = "サムネイル画像が指定されていません。";
		}
		if ($msg) {
			foreach ($msg as $key => $v) {
				$data["error"][$key] = $v;
			}
			$ap->set("msg", $msg);
		} else {
			// 直接保存
		$item['title'] = $form["title"];
		$item['image'] = $form["image"];
		$item['url'] = $form["url"];
		$item['blank'] = $form["blank"];
		$item['pr_date'] = $form["pr_date"];
		$item['contents'] = $form["contents"];
		$item['status'] = $form["status"];
		if ($form["seq"]) {
			Pr::updateData($form["seq"], $item);
			add_action(AUTH_PR_EDIT, $_SESSION["AUTH_LOGIN"]["seq"], $form["seq"], $form["title"]);
		} else {
			$id = Pr::addData($item);
			add_action(AUTH_PR_ADD, $_SESSION["AUTH_LOGIN"]["seq"], $id, $form["title"]);
		}
			$ap->template = "admin-pr-edit-thankyou.html";
/*
			$_SESSION["form"] = $form;
			$ap->template = "admin-pr-edit-confirm.html";
*/
		}
	} else {
		if ($_REQUEST["id"]) {
			$form = Pr::getData($_REQUEST["id"]);
		} else {
			$form["status"] = "1";
		}
	}
	$ap->set("form", $form);
}
if ($ap->act == "admin-pr-edit-reinput") {
	access_page_auth_check("admin-pr");
	// 再入力
	$ap->template = "admin-pr-edit.html";
	$form = $_SESSION["form"];
	unset($_SESSION["form"]);
	$ap->set("form", $form);
}
if ($ap->act == "admin-pr-edit-thankyou") {
	access_page_auth_check("admin-pr");
	if ($_REQUEST["reinput_x"]) {
		$form =	$_SESSION["form"];
		unset($_SESSION["form"]);
		$ap->set("form", $form);
		$ap->template = "contact.html";
	} else if ($_SESSION["form"]) {
	// 保存
		$form = $_SESSION["form"];
		unset($_SESSION["form"]);
		// 保存
		$item['title'] = $form["title"];
		$item['image'] = $form["image"];
		$item['url'] = $form["url"];
		$item['blank'] = $form["blank"];
		$item['pr_date'] = $form["pr_date"];
		$item['contents'] = $form["contents"];
		$item['status'] = $form["status"];
		if ($form["seq"]) {
			Pr::updateData($form["seq"], $item);
			add_action(AUTH_PR_EDIT, $_SESSION["AUTH_LOGIN"]["seq"], $form["seq"], $form["title"]);
		} else {
			$id = Pr::addData($item);
			add_action(AUTH_PR_ADD, $_SESSION["AUTH_LOGIN"]["seq"], $id, $form["title"]);
		}
		// メール送信
//		template_mail($form["email"], "mail2_subject", "mail2_body", array("form" => $form, "name" => $form["name"]), "manager");
	}
}
// -----------------------------------
if ($ap->act == "admin-user") {
	access_page_auth_check("admin-user");
	if ($_REQUEST["mode"] == "delete") {
		$id = $_REQUEST["id"];
		$item = User::getData($id);
		if ($item) {
			add_action(AUTH_PR_DEL, $_SESSION["AUTH_LOGIN"]["seq"], $id, $item["name"]);
			User::deleteData($id);
		}
	}
	$page = $_REQUEST["page"];
	$limit = PAGE_ITEMS;
	if ($_REQUEST["csv"]) {
		$page = 0;
		$limit = 0;
	}
	$keyword = $_REQUEST["keyword"];
	$order = $_REQUEST["order"];
	$db = new User();
	$db->search[] = array("field" => "status", "value" => "1", "cond" => "=");
	if ($keyword) {
		$where_keyword[] = array("field" => "name", "value" => "%{$keyword}%", "cond" => "like", "relation" => "or");
		$where_keyword[] = array("field" => "name_kana", "value" => "%{$keyword}%", "cond" => "like", "relation" => "or");
		$where_keyword[] = array("field" => "user_id", "value" => "%{$keyword}%", "cond" => "like", "relation" => "or");
		$where_keyword[] = array("field" => "email", "value" => "%{$keyword}%", "cond" => "like", "relation" => "or");
		$db->search[] = array("nest" => $where_keyword);
		$form["keyword"] = $keyword;
	}
	if ($order) {
		if ($order == 1) {
			$db->order[] = array("field" => "reg_date");
		}
		if ($order == 2) {
			$db->order[] = array("field" => "reg_date", "desc" => "1");
		}
		if ($order == 3) {
			$db->order[] = array("field" => "count");
		}
		if ($order == 4) {
			$db->order[] = array("field" => "count", "desc" => "1");
		}
		$ap->set("order", $order);
	}
	$db->order[] = array("field" => "reg_date", "desc" => "1");
	$db->page = $page;
	$db->limit = $limit;
	$count = $db->getCount();
	if ($limit) {
		$pages = intval(($count + $db->limit - 1) / $db->limit);
		if ($pages > 1) {
			$ap->set("pager", page_index2($page, $pages, 10));
		}
	}
	$list = $db->getList();
	if ($_REQUEST["csv"]) {
		$list2 = array();
		foreach ($list as $val) {
			$list2[] = disp_user($val);
		}
		add_action(AUTH_USER_CSV, $_SESSION["AUTH_LOGIN"]["seq"]);
		put_csv($list2);
	}
	$ap->set(array("total" => $count, "start" => $page * $db->limit + 1, "end" => $page * $db->limit + count($list)));
	if ($list) {
		$list2 = array();
		foreach ($list as $val) {
			$db = new Oubo();
			$db->search[] = array("field" => "user_id", "value" => $val["user_id"], "cond" => "=");
			$db->order[] = array("field" => "reg_date", "desc" => "1");
			$db->page = 0;
			$db->limit = 1;
			$ret = $db->getList();
			if ($ret) {
				$val["oubo"] = $ret[0];
				$val["oubo"]["status"] = $oubo_status_list[$val["oubo"]["status"]];
			}
			$list2[] = $val;
		}
		$ap->set("list", $list2);
	}
	$ap->set("form", $form);
}
//
if ($ap->act == "admin-user-edit") {
	access_page_auth_check("admin-user");
$user_check = array(
	// フォーム項目名 文字種 最大文字数 必須 表示名称
	array("mode", "*", "", false, "モード"),
	array("name", "*", "", true, "会員名"),
 	array("name_kana", "*", "", false, "会員名ふりがな"),
 	array("zip1", "N", "", false, "住所 郵便番号1"),
 	array("zip2", "N", "", false, "住所 郵便番号2"),
 	array("pref", "N", "", false, "住所 都道府県"),
 	array("city", "*", "", false, "住所 市区町村"),
 	array("address1", "*", "", false, "住所 番地まで"),
 	array("address2", "*", "", false, "住所 建物名・階数"),
 	array("birthday_year", "N", "", false, "生年月日"),
 	array("birthday_month", "N", "", false, "生年月日"),
 	array("birthday_day", "N", "", false, "生年月日"),
 	array("shikaku", "*", "", false, "保有資格"),
 	array("tel", "TEL", "", false, "連絡先"),
 	array("email", "MAIL", "", false, "メールアドレス"),
// 	array("email2", "MAIL", "", false, "メールアドレス確認用"),
 	array("passwd", "*", "", false, "パスワード"),
// 	array("passwd2", "*", "", false, "パスワード確認用"),
 	array("keitai", "*", "", false, "希望勤務形態"),
 	array("jiki", "*", "", false, "希望入職時期"),
 	array("ymd01_year", "N", "", false, "ymd01"),
 	array("ymd01_month", "N", "", false, "ymd01"),
 	array("ymd01_day", "N", "", false, "ymd01"),
 	array("ymd02_year", "N", "", false, "ymd02"),
 	array("ymd02_month", "N", "", false, "ymd02"),
 	array("ymd02_day", "N", "", false, "ymd02"),
 	array("ymd03_year", "N", "", false, "ymd03"),
 	array("ymd03_month", "N", "", false, "ymd03"),
 	array("ymd03_day", "N", "", false, "ymd03"),
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
 	array("file01", "*", "", false, "file01"),
 	array("file02", "*", "", false, "file02"),
 	array("file03", "*", "", false, "file03"),
 	array("file04", "*", "", false, "file04"),
 	array("file05", "*", "", false, "file05"),
 	array("select01", "*", "", false, "select01"),
 	array("select02", "*", "", false, "select02"),
 	array("select03", "*", "", false, "select03"),
 	array("select04", "*", "", false, "select04"),
 	array("select05", "*", "", false, "select05"),
 	array("biko", "*", "", false, "備考・メモ"),
 	array("confirm", "*", "", false, "利用規約"),
  	array("user_id", "*", "", false, "ID"),
);

	if ($_REQUEST["mode"] == "form") {
		$form = FormCheck::get_form($user_check, $_REQUEST);
		$msg = FormCheck::check($form, $user_check);
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
		if ($form["email"]) {
			$cond["email"] = $form["email"];
			$cond["regist"] = "1";
			$ret = User::findData($cond);
			if ($ret) {
				foreach ($ret as $val) {
					if ($val["user_id"] != $form["user_id"]) {
						$msg["email"] = "このメールアドレスは利用できません。";
					}
				}
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
/*
			$_SESSION["form"] = $form;
			$form = disp_user($form);
			$ap->template = "admin-user-edit-confirm.html";
*/
		// 直接保存
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
		if ($form["user_id"]) {
			$id = User::updateData($form["user_id"], $item);
			add_action(AUTH_USER_EDIT, $_SESSION["AUTH_LOGIN"]["seq"], $form["user_id"], $form["name"]);
		} else {
			$id = User::addData($item);
			add_action(AUTH_USER_ADD, $_SESSION["AUTH_LOGIN"]["seq"], $id, $form["name"]);
		}
		// メモ追加
		$rec["comment"] = "会員情報を編集しました。";
		$rec["tantou_id"] = $_SESSION["AUTH_LOGIN"]["seq"];
		$rec["user_id"] = $form["user_id"];
		$rec["kind"] = 2;
		Memo::addData($rec);
			//
			$ap->template = "admin-user-edit-thankyou.html";
		}
	} else {
		if ($_REQUEST["id"]) {
			if ($_REQUEST["mode"] == "memo") {
				$rec["comment"] = $_REQUEST["comment"];
				$rec["tantou_id"] = $_SESSION["AUTH_LOGIN"]["seq"];
				$rec["user_id"] = $_REQUEST["id"];
				$rec["kind"] = 2;
				Memo::addData($rec);
			}
			$form = User::getData($_REQUEST["id"]);
			$ary = explode("-", $form["birthday"]);
			$form["birthday_year"] = $ary[0];
			$form["birthday_month"] = $ary[1];
			$form["birthday_day"] = $ary[2];
			$ary = explode("-", $form["zip"]);
			$form["zip1"] = $ary[0];
			$form["zip2"] = $ary[1];
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
			$form["shikaku"] = multi_value($form["shikaku"]);
			$form["check01"] = multi_value($form["check01"]);
			$form["check02"] = multi_value($form["check02"]);
			$form["check03"] = multi_value($form["check03"]);
			$form["check04"] = multi_value($form["check04"]);
			$form["check05"] = multi_value($form["check05"]);
			$form["email2"] = $form["email"];
			$form["passwd2"] = $form["passwd"];
			if ($form["file01"]) {
				$f = File::getData($form["file01"]);
				$form["file01_name"] = $f["file_name"];
			}
			if ($form["file02"]) {
				$f = File::getData($form["file02"]);
				$form["file02_name"] = $f["file_name"];
			}
			if ($form["file03"]) {
				$f = File::getData($form["file03"]);
				$form["file03_name"] = $f["file_name"];
			}
			if ($form["file04"]) {
				$f = File::getData($form["file04"]);
				$form["file04_name"] = $f["file_name"];
			}
			if ($form["file05"]) {
				$f = File::getData($form["file05"]);
				$form["file05_name"] = $f["file_name"];
			}
		}
	}
	if ($form["user_id"]) {
		$user = User::getData($form["user_id"]);
		$db = new Oubo();
		$db->search[] = array("field" => "user_id", "value" => $form["user_id"], "cond" => "=");
		$db->order[] = array("field" => "reg_date", "desc" => "1");
		$db->page = 0;
		$db->limit = 1;
		$list = $db->getList();
		if ($list) {
			$user["oubo"] = $list[0];
			$user["oubo"]["status"] = $oubo_status_list[$user["oubo"]["status"]];
		}
		$ap->set("user", $user);
	}
	// メモ
	$page = $_REQUEST["page"];
	$db = new Memo();
	$db->search[] = array("field" => "user_id", "value" => $form["user_id"], "cond" => "=");
	$db->search[] = array("field" => "kind", "value" => "2", "cond" => "=");
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
			$tantou = Tantou::getData($val["tantou_id"]);
			if ($tantou) {
				$val["name"] = $tantou["name"];
			}
			$list2[] = $val;
		}
		$ap->set("list", $list2);
	}
	$ap->set("form", $form);
}
if ($ap->act == "admin-user-edit-reinput") {
	access_page_auth_check("admin-user");
	// 再入力
	$ap->template = "admin-user-edit.html";
	$form = $_SESSION["form"];
	unset($_SESSION["form"]);
	$form["shikaku"] = multi_value($form["shikaku"]);
	$form["check01"] = multi_value($form["check01"]);
	$form["check02"] = multi_value($form["check02"]);
	$form["check03"] = multi_value($form["check03"]);
	$form["check04"] = multi_value($form["check04"]);
	$form["check05"] = multi_value($form["check05"]);
	if ($form["user_id"]) {
		$user = User::getData($form["user_id"]);
		$db = new Oubo();
		$db->search[] = array("field" => "user_id", "value" => $form["user_id"], "cond" => "=");
		$db->order[] = array("field" => "reg_date", "desc" => "1");
		$db->page = 0;
		$db->limit = 1;
		$list = $db->getList();
		if ($list) {
			$user["oubo"] = $list[0];
			$user["oubo"]["status"] = $oubo_status_list[$user["oubo"]["status"]];
		}
		$ap->set("user", $user);
	}
	$ap->set("form", $form);
}
if ($ap->act == "admin-user-edit-thankyou") {
	access_page_auth_check("admin-user");
	if ($_REQUEST["reinput_x"]) {
		$form =	$_SESSION["form"];
		unset($_SESSION["form"]);
		$ap->set("form", $form);
		$ap->template = "contact.html";
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
		if ($form["user_id"]) {
			$id = User::updateData($form["user_id"], $item);
			add_action(AUTH_USER_EDIT, $_SESSION["AUTH_LOGIN"]["seq"], $form["user_id"], $form["name"]);
		} else {
			$id = User::addData($item);
			add_action(AUTH_USER_ADD, $_SESSION["AUTH_LOGIN"]["seq"], $id, $form["name"]);
		}
		// メモ追加
		$rec["comment"] = "会員情報を編集しました。";
		$rec["tantou_id"] = $_SESSION["AUTH_LOGIN"]["seq"];
		$rec["user_id"] = $form["user_id"];
		$rec["kind"] = 2;
		Memo::addData($rec);
		// メール送信
//		template_mail($form["email"], "mail2_subject", "mail2_body", array("form" => $form, "name" => $form["name"]), "manager");
	}
}
// -----------------------------------
if ($ap->act == "contents") {
	access_page_auth_check("contents");
	if ($_REQUEST["mode"] == "delete") {
		$id = $_REQUEST["id"];
		$item = Contents::getData($id);
		if ($item) {
			add_action(AUTH_PR_DEL, $_SESSION["AUTH_LOGIN"]["seq"], $id, $item["title"]);
			Contents::deleteData($id);
			save_keywords($id);	// キーワード削除
		}
	}
	$page = $_REQUEST["page"];
	$db = new Contents();
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
			$val["kind_v"] = $val["kind"];
			$val["kind"] = $contents_kind_list[$val["kind"]];
			$val["kind_url"] = $contents_kind_url_list[$val["kind_v"]];
			$list2[] = $val;
		}
		$ap->set("list", $list2);
	}
}
//
if ($ap->act == "contents-edit") {
	access_page_auth_check("contents");
$contents_check = array(
	// フォーム項目名 文字種 最大文字数 必須 表示名称
	array("mode", "*", "", false, "モード"),
	array("contents_date", "*", "", true, "登録日付"),
	array("kind", "*", "", true, "カテゴリ"),
	array('title', "*", "", true, "タイトル"),
	array('contents', "*", "", true, "description"),
	array('keyword', "*", "", true, "keywords"),
	array('url', "*", "", false, "URL"),
//	array('list_image', "*", "", true, "一覧用サムネイル"),
	array('list_text', "*", "", true, "一覧用テキスト"),
	array('head1', "*", "", false, "見出し1"),
//	array('image1', "*", "", false, "画像1"),
	array('text1', "*", "", false, "本文1"),
	array('head2', "*", "", false, "見出し2"),
//	array('image2', "*", "", false, "画像2"),
	array('text2', "*", "", false, "本文2"),
	array('head3', "*", "", false, "見出し3"),
//	array('image3', "*", "", false, "画像3"),
	array('text3', "*", "", false, "本文3"),
	array('head4', "*", "", false, "見出し4"),
//	array('image4', "*", "", false, "画像4"),
	array('text4', "*", "", false, "本文4"),
	array('head5', "*", "", false, "見出し5"),
//	array('image5', "*", "", false, "画像5"),
	array('text5', "*", "", false, "本文5"),
	array('texthtml', "*", "", false, "本文エディタ"),
	array("status", "*", "", true, "公開・非公開"),
	array("seq", "*", "", false, "ID"),
);

	if ($_REQUEST["mode"]) {
		$form = FormCheck::get_form($contents_check, $_REQUEST);
		$msg = FormCheck::check($form, $contents_check);
		$img = form_image("list_image", $msg, $img_type, IMAGE_MAX);
		if ($img) {
			$form["list_image"] = $img;
		} else {
		//	$msg["list_image"] = "一覧用画像が指定されていません。";
		}
		$img = form_image("image1", $msg, $img_type, IMAGE_MAX);
		if ($img) {
			$form["image1"] = $img;
		} else {
		//	$msg["image1"] = "画像1が指定されていません。";
		}
		$img = form_image("image2", $msg, $img_type, IMAGE_MAX);
		if ($img) {
			$form["image2"] = $img;
		} else {
		//	$msg["image2"] = "画像1が指定されていません。";
		}
		$img = form_image("image3", $msg, $img_type, IMAGE_MAX);
		if ($img) {
			$form["image3"] = $img;
		} else {
		//	$msg["image3"] = "画像1が指定されていません。";
		}
		$img = form_image("image4", $msg, $img_type, IMAGE_MAX);
		if ($img) {
			$form["image4"] = $img;
		} else {
		//	$msg["image4"] = "画像1が指定されていません。";
		}
		$img = form_image("image5", $msg, $img_type, IMAGE_MAX);
		if ($img) {
			$form["image5"] = $img;
		} else {
		//	$msg["image5"] = "画像1が指定されていません。";
		}
		if ($form["url"]) {
			$cond["url"] = $form["url"];
			$ret = Contents::findData($cond);
			if ($ret) {
				foreach ($ret as $val) {
					if ($val["seq"] != $form["seq"]) {
						$msg["url"] = "このURLは使用できません";
						break;
					}
				}
			}
// echo "<br/>";
// echo strpos($form["url"],'/');
			//「.」「/」などが含まれていたらエラー
			if(strpos($form["url"],'/') !== false || strpos($form["url"],'.') !== false || strpos($form["url"],'@') !== false){
				$msg["url"] = "URLにスラッシュ(/)やドット(.)やアットマーク(@)を使用することはできません";
			}
		}
		if ($msg) {
			foreach ($msg as $key => $v) {
				$data["error"][$key] = $v;
			}
			$ap->set("msg", $msg);
			foreach ($_REQUEST as $key => $value) {
				$num = null;
				$num = preg_replace('/[^0-9]/', '', $key);

				if($num != NULL){
					//番号削除
					$key_name = preg_replace("/\d+/", "", $key);

					$itemEditor = array();
					$itemEditor['contents_id'] = $form["seq"];
					$itemEditor['name'] = $key_name;//番号を削除したkeyを登録
					$itemEditor['text1'] = $value;

					if($key_name == 'editor_alt'){
						//editor_altの番号を取得
						$alt_num = preg_replace('/[^0-9]/', '', $key);
						//その番号の１つ前（-1）をeditor_imagesにつけたものが画像name
						$image_name = "editor_images".($alt_num-1);
						$image_old_name = "editor_images_old".($alt_num-1);

						$img = form_image($image_name, $msg, $img_type, IMAGE_MAX);
						if ($img) {
							$img_itemEditor = array();
							$img_itemEditor['contents_id'] = $form["seq"];
							$img_itemEditor['name'] = "editor_images";
							$img_itemEditor["image"] = $img;
							$contents_editor_list[] = $img_itemEditor;
						}else{
							//inputタグのファイル参照ボタンにファイルが無く、「直後」のhiddenに画像のIDが指定されている場合は、そのまま保持する
							if($_REQUEST[$image_old_name]){
								$img_itemEditor = array();
								$img_itemEditor['contents_id'] = $form["seq"];
								$img_itemEditor['name'] = "editor_images";
								$img_itemEditor["image"] = $_REQUEST[$image_old_name];
								$contents_editor_list[] = $img_itemEditor;
							}
						}
					}
					$contents_editor_list[] = $itemEditor;
				}
			}
		} else {
			// 直接保存
		$item['title'] = $form["title"];
		$item['kind'] = $form["kind"];
		$item['contents'] = $form["contents"];
		$item['keyword'] = $form["keyword"];
		$item['url'] = $form["url"];
		$item['list_image'] = $form["list_image"];
		$item['list_text'] = $form["list_text"];
		$item['head1'] = $form["head1"];
		$item['image1'] = $form["image1"];
		$item['text1'] = htmlspecialchars_decode($form["text1"]);
		$item['head2'] = $form["head2"];
		$item['image2'] = $form["image2"];
		$item['text2'] = htmlspecialchars_decode($form["text2"]);
		$item['head3'] = $form["head3"];
		$item['image3'] = $form["image3"];
		$item['text3'] = htmlspecialchars_decode($form["text3"]);
		$item['head4'] = $form["head4"];
		$item['image4'] = $form["image4"];
		$item['text4'] = htmlspecialchars_decode($form["text4"]);
		$item['head5'] = $form["head5"];
		$item['image5'] = $form["image5"];
		$item['text5'] = htmlspecialchars_decode($form["text5"]);
		$item['texthtml'] = htmlspecialchars_decode($form["texthtml"]);
		$item['contents_date'] = $form["contents_date"];
		$item['status'] = $form["status"];
		if ($form["seq"]) {
			$id = $form["seq"];
			Contents::updateData($id, $item);
			add_action(AUTH_CONTENTS_EDIT, $_SESSION["AUTH_LOGIN"]["seq"], $form["seq"], $form["title"]);

			//コンテンツ設定部分の登録
			//順番が変わっている場合があるため、一旦削除
			$sql = "delete from contents_editor where contents_id=".$form["seq"];
			$ap->inst->db_exec($sql);

			foreach ($_REQUEST as $key => $value) {
				$num = null;
				$num = preg_replace('/[^0-9]/', '', $key);

				if($num != NULL){
					//番号削除
					$key_name = preg_replace("/\d+/", "", $key);

					$itemEditor = array();
					$itemEditor['contents_id'] = $form["seq"];
					$itemEditor['name'] = $key_name;//番号を削除したkeyを登録
					$itemEditor['text1'] = $value;

					if($key_name == 'editor_alt'){
						//editor_altの番号を取得
						$alt_num = preg_replace('/[^0-9]/', '', $key);
						//その番号の１つ前（-1）をeditor_imagesにつけたものが画像name
						$image_name = "editor_images".($alt_num-1);
						$image_old_name = "editor_images_old".($alt_num-1);

						$img = form_image($image_name, $msg, $img_type, IMAGE_MAX);
						if ($img) {
							$img_itemEditor = array();
							$img_itemEditor['contents_id'] = $form["seq"];
							$img_itemEditor['name'] = "editor_images";
							$img_itemEditor["image"] = $img;
							ContentsEditor::addData($img_itemEditor);
						}else{
							//inputタグのファイル参照ボタンにファイルが無く、「直後」のhiddenに画像のIDが指定されている場合は、そのまま保持する
							if($_REQUEST[$image_old_name]){
								$img_itemEditor = array();
								$img_itemEditor['contents_id'] = $form["seq"];
								$img_itemEditor['name'] = "editor_images";
								$img_itemEditor["image"] = $_REQUEST[$image_old_name];
								ContentsEditor::addData($img_itemEditor);
							}
						}
					}

					ContentsEditor::addData($itemEditor);
				}
			}
		} else {
			$id = Contents::addData($item);
			add_action(AUTH_CONTENTS_ADD, $_SESSION["AUTH_LOGIN"]["seq"], $id, $form["title"]);

			//コンテンツ設定部分の登録
			foreach ($_REQUEST as $key => $value) {
				$num = null;
				$num = preg_replace('/[^0-9]/', '', $key);

				if($num != NULL){
					//番号削除
					$key_name = preg_replace("/\d+/", "", $key);

					$itemEditor = array();

					$itemEditor['contents_id'] = $id;
					$itemEditor['name'] = $key_name;//番号を削除したkeyを登録
					$itemEditor['text1'] = $value;

					if($key_name == 'editor_alt'){
						//editor_altの番号を取得
						$alt_num = preg_replace('/[^0-9]/', '', $key);
						//その番号の１つ前（-1）をeditor_imagesにつけたものが画像name
						$image_name = "editor_images".($alt_num-1);
						$img = form_image($image_name, $msg, $img_type, IMAGE_MAX);
						if ($img) {
							$img_itemEditor = array();
							$img_itemEditor['contents_id'] = $id;
							$img_itemEditor['name'] = "editor_images";
							$img_itemEditor["image"] = $img;
							ContentsEditor::addData($img_itemEditor);
						}
					}

					ContentsEditor::addData($itemEditor);
				}
			}

		}
		save_keywords($id, explode(",", $form["keyword"]));	// キーワード保存
		$ap->template = "contents-edit-thankyou.html";
/*
			$_SESSION["form"] = $form;
			$form["kind"] = $contents_kind_list[$form["kind"]];
			$ap->template = "contents-edit-confirm.html";
*/
		}
	} else {
		if ($_REQUEST["id"]) {
			$form = Contents::getData($_REQUEST["id"]);

			$contents_editor_list = array();
			$sql = "SELECT * FROM contents_editor where contents_id=" . $_REQUEST["id"] . " order by seq ASC";
			$ret = $ap->inst->search_sql($sql);
			if ($ret["data"]) {
				$contents_editor_list = $ret["data"];
			}

		} else {
			// デフォルト
			$form["status"] = "1";
		}
	}
	$ap->set("kind", $contents_kind_list);
	$ap->set("form", $form);
	$ap->set("form_editor", $contents_editor_list);
}
if ($ap->act == "contents-edit-reinput") {
	access_page_auth_check("contents");
	// 再入力
	$ap->template = "contents-edit.html";
	$form = $_SESSION["form"];
	unset($_SESSION["form"]);
	$ap->set("form", $form);
	$ap->set("kind", $contents_kind_list);
}
if ($ap->act == "contents-edit-thankyou") {
	access_page_auth_check("contents");
	if ($_REQUEST["reinput_x"]) {
		$form =	$_SESSION["form"];
		unset($_SESSION["form"]);
		$ap->set("form", $form);
		$ap->template = "contact.html";
	} else if ($_SESSION["form"]) {
	// 保存
		$form = $_SESSION["form"];
		unset($_SESSION["form"]);
		// 保存
		$item['title'] = $form["title"];
		$item['kind'] = $form["kind"];
		$item['contents'] = $form["contents"];
		$item['keyword'] = $form["keyword"];
		$item['url'] = $form["url"];
		$item['list_image'] = $form["list_image"];
		$item['list_text'] = $form["list_text"];
		$item['head1'] = $form["head1"];
		$item['image1'] = $form["image1"];
		$item['text1'] = $form["text1"];
		$item['head2'] = $form["head2"];
		$item['image2'] = $form["image2"];
		$item['text2'] = $form["text2"];
		$item['head3'] = $form["head3"];
		$item['image3'] = $form["image3"];
		$item['text3'] = $form["text3"];
		$item['head4'] = $form["head4"];
		$item['image4'] = $form["image4"];
		$item['text4'] = $form["text4"];
		$item['head5'] = $form["head5"];
		$item['image5'] = $form["image5"];
		$item['text5'] = $form["text5"];
		$item['texthtml'] = $form["texthtml"];
		$item['contents_date'] = $form["contents_date"];
		$item['status'] = $form["status"];
		if ($form["seq"]) {
			$id = $form["seq"];
			Contents::updateData($id, $item);
			add_action(AUTH_CONTENTS_EDIT, $_SESSION["AUTH_LOGIN"]["seq"], $form["seq"], $form["title"]);
		} else {
			$id = Contents::addData($item);
			add_action(AUTH_CONTENTS_ADD, $_SESSION["AUTH_LOGIN"]["seq"], $id, $form["title"]);
		}
		save_keywords($id, explode(",", $form["keyword"]));	// キーワード保存
		// メール送信
//		template_mail($form["email"], "mail2_subject", "mail2_body", array("form" => $form, "name" => $form["name"]), "manager");
	}
}
// -----------------------------------
if ($ap->act == "admin-branch") {
	// access_page_auth_check("contents");
	if ($_REQUEST["mode"] == "delete") {
		$id = $_REQUEST["id"];
		$item = Branch::getData($id);
		if ($item) {
			// add_action(AUTH_PR_DEL, $_SESSION["AUTH_LOGIN"]["seq"], $id, $item["title"]);
			Branch::deleteData($id);
			// save_keywords($id);	// キーワード削除
		}
	}
	$page = $_REQUEST["page"];
	$name = $_REQUEST["name"];

	$db = new Branch();

	if ($name) {
		$db->search[] = array("field" => "branch.name", "value" => "%{$name}%", "cond" => "like");
		$form["name"] = $name;
	}
	$ap->set("form", $form);

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
			// $val["kind_v"] = $val["kind"];
			// $val["kind"] = $contents_kind_list[$val["kind"]];
			$list2[] = $val;
		}
		$ap->set("list", $list2);
	}
}
//
if ($ap->act == "admin-branch-edit") {
	// access_page_auth_check("contents");
$contents_check = array(
	// フォーム項目名 文字種 最大文字数 必須 表示名称
	array("mode", "*", "", false, "モード"),
	array("name", "*", "", true, "営業所名"),
	array("email", "MAIL", "", true, "メールアドレス"),
	array("seq", "*", "", false, "ID"),
);

	if ($_REQUEST["mode"]) {
		$form = FormCheck::get_form($contents_check, $_REQUEST);
		$msg = FormCheck::check($form, $contents_check);

		if ($msg) {
			foreach ($msg as $key => $v) {
				$data["error"][$key] = $v;
			}
			$ap->set("msg", $msg);
		} else {
			// 直接保存
		$item['name'] = $form["name"];
		$item['email'] = $form["email"];

		if ($form["seq"]) {
			$id = $form["seq"];
			Branch::updateData($id, $item);
			// add_action(AUTH_CONTENTS_EDIT, $_SESSION["AUTH_LOGIN"]["seq"], $form["seq"], $form["title"]);
		} else {
			$id = Branch::addData($item);
			// add_action(AUTH_CONTENTS_ADD, $_SESSION["AUTH_LOGIN"]["seq"], $id, $form["title"]);
		}
		// save_keywords($id, explode(",", $form["keyword"]));	// キーワード保存
		$ap->template = "admin-branch-edit-thankyou.html";
/*
			$_SESSION["form"] = $form;
			$form["kind"] = $contents_kind_list[$form["kind"]];
			$ap->template = "contents-edit-confirm.html";
*/
		}
	} else {
		if ($_REQUEST["id"]) {
			$form = Branch::getData($_REQUEST["id"]);
		} else {
			// デフォルト
			// $form["status"] = "1";
		}
	}
	// $ap->set("kind", $contents_kind_list);
	$ap->set("form", $form);
}
if ($ap->act == "admin-branch-edit-reinput") {
	// access_page_auth_check("contents");
	// 再入力
	$ap->template = "admin-branch-edit.html";
	$form = $_SESSION["form"];
	unset($_SESSION["form"]);
	$ap->set("form", $form);
	// $ap->set("kind", $contents_kind_list);
}
if ($ap->act == "admin-branch-edit-thankyou") {
	// access_page_auth_check("contents");
	if ($_REQUEST["reinput_x"]) {
		$form =	$_SESSION["form"];
		unset($_SESSION["form"]);
		$ap->set("form", $form);
		$ap->template = "admin-branch.html";
	} else if ($_SESSION["form"]) {
	// 保存
		$form = $_SESSION["form"];
		unset($_SESSION["form"]);
		// 保存
		$item['name'] = $form["name"];
		$item['email'] = $form["email"];

		if ($form["seq"]) {
			$id = $form["seq"];
			Branch::updateData($id, $item);
			// add_action(AUTH_CONTENTS_EDIT, $_SESSION["AUTH_LOGIN"]["seq"], $form["seq"], $form["title"]);
		} else {
			$id = Branch::addData($item);
			// add_action(AUTH_CONTENTS_ADD, $_SESSION["AUTH_LOGIN"]["seq"], $id, $form["title"]);
		}
		// save_keywords($id, explode(",", $form["keyword"]));	// キーワード保存
		// メール送信
//		template_mail($form["email"], "mail2_subject", "mail2_body", array("form" => $form, "name" => $form["name"]), "manager");
	}
}
// -----------------------------------
if ($ap->act == "admin-entry") {
	access_page_auth_check("admin-entry");
	if ($_REQUEST["mode"] == "delete") {
		$id = $_REQUEST["id"];
		$oubo = Oubo::getData($id);
		if ($oubo) {
			add_action(AUTH_OUBO_DEL, $_SESSION["AUTH_LOGIN"]["seq"], $id, "");
			Oubo::deleteData($id);
			//
			$sql = "update user set count=(select count(*) from oubo where user_id={$oubo["user_id"]}) where user_id={$oubo["user_id"]}";
			$ap->inst->db_exec($sql);
			if ($oubo["item_id"]) {
				$sql = "update item set oubo=(select count(*) from oubo where item_id={$oubo["item_id"]}) where item_id={$oubo["item_id"]}";
				$ap->inst->db_exec($sql);
			}
		}
	}
	$page = $_REQUEST["page"];
	$limit = PAGE_ITEMS;
	if ($_REQUEST["csv"]) {
		$page = 0;
		$limit = 0;
	}
	$page = $_REQUEST["page"];
	$name = $_REQUEST["name"];
	$title = $_REQUEST["title"];
	$status = $_REQUEST["status"];
	$tantou_id = $_REQUEST["tantou_id"];
	$kind = $_REQUEST["kind"];
	$date_from = $_REQUEST["date_from"];
	$date_to = $_REQUEST["date_to"];
	$order = $_REQUEST["order"];
	//
	$db = new Oubo();
	$db->join[] = array("join" => "left join", "table" => "item", "col" => "item_id");
	$db->join[] = array("join" => "join", "table" => "user", "col" => "user_id");
	if ($kind) {
		$db->search[] = array("field" => "oubo.kind", "value" => $kind, "cond" => "=");
		$form["kind"] = $kind;
	}
	if ($name) {
		$where_name[] = array("field" => "user.name", "value" => "%{$name}%", "cond" => "like", "relation" => "or");
		$where_name[] = array("field" => "oubo.seq", "value" => "%{$name}%", "cond" => "like", "relation" => "or");
		$db->search[] = array("nest" => $where_name);
		$form["name"] = $name;
	}
	if ($title) {
		$where_title[] = array("field" => "item.title", "value" => "%{$title}%", "cond" => "like", "relation" => "or");
		$where_title[] = array("field" => "item.item_id", "value" => "{$title}", "cond" => "=", "relation" => "or");
		$db->search[] = array("nest" => $where_title);
		$form["title"] = $title;
	}
	if ($tantou_id) {
		$db->search[] = array("field" => "oubo.tantou_id", "value" => $tantou_id, "cond" => "=");
		$form["tantou_id"] = $tantou_id;
	}
	if ($date_from) {
		$db->search[] = array("field" => "date(oubo.reg_date)", "value" => $date_from, "cond" => ">=");
		$form["date_from"] = $date_from;
	}
	if ($date_to) {
		$db->search[] = array("field" => "date(oubo.reg_date)", "value" => $date_to, "cond" => "<=");
		$form["date_to"] = $date_to;
	}
	if (isset($status)&&($status !== "")) {
		$db->search[] = array("field" => "oubo.status", "value" => $status, "cond" => "=");
		$form["status"] = $status;
	}
	if ($order) {
		if ($order == 1) {
			$db->order[] = array("field" => "oubo.reg_date");
		}
		if ($order == 2) {
			$db->order[] = array("field" => "oubo.reg_date", "desc" => "1");
		}
		if ($order == 3) {
			$db->order[] = array("field" => "oubo.up_date", "desc" => "1");
		}
		if ($order == 4) {
			$db->order[] = array("field" => "oubo.up_date");
		}
		$ap->set("order", $order);
	}
	$db->order[] = array("field" => "oubo.reg_date", "desc" => "1");
	$db->page = $page;
	$db->limit = $limit;
	$count = $db->getCount();
	if ($limit) {
		$pages = intval(($count + $db->limit - 1) / $db->limit);
		if ($pages > 1) {
			$ap->set("pager", page_index2($page, $pages, 10));
		}
		$ap->set(array("total" => $count, "start" => $page * $db->limit + 1, "end" => $page * $db->limit + count($list)));
	}
	$list = $db->getList(array("seq", "item_id", "user_id", "oubo.kind", "oubo.status", "oubo.reg_date", "title", "kinmu_pref", "kinmu_city", "user.name", "oubo.tantou_id", "email", "regist", "oubo.up_date", "user.birthday", "user.text10"));
	if ($_REQUEST["csv"]) {
		$list2 = array();
		foreach ($list as $val) {
			$val["kinmu_pref"] = $pref_list[$val["kinmu_pref"]];
			$val["status"] = $oubo_status_list[$val["status"]];
			$list2[] = $val;
		}
		add_action(AUTH_OUBO_CSV, $_SESSION["AUTH_LOGIN"]["seq"]);
		put_csv($list2);
	}
	if ($list) {
		$list2 = array();
		foreach ($list as $val) {
			$val["kinmu_pref"] = $pref_list[$val["kinmu_pref"]];
			$val["status"] = $oubo_status_list[$val["status"]];
			if ($val["birthday"]) {
				$ary = explode("-", $val["birthday"]);
				$val["age"] = intval((intval(date("Ymd")) - intval($ary[0] . $ary[1] . $ary[2])) / 10000);
			}
			$t = Tantou::getData($val["tantou_id"]);
			if ($t) {
				$val["tantou"] = $t["name"];
			}
			$list2[] = $val;
		}
		$ap->set("list", $list2);
	}
	$ap->set("form", $form);
}
if ($ap->act == "admin-entry-detail") {
	access_page_auth_check("admin-entry");
	$id = $_REQUEST["id"];
	$oubo = Oubo::getData($id);
	$user = User::getData($oubo["user_id"]);
	$item = Item::getData($oubo["item_id"]);
	if ($oubo && $user) {
		if ($_REQUEST["mode"] == "memo") {
			$rec["comment"] = $_REQUEST["comment"];
			$rec["tantou_id"] = $_SESSION["AUTH_LOGIN"]["seq"];
			$rec["oubo_id"] = $_REQUEST["id"];
			$rec["kind"] = 3;
			Memo::addData($rec);
		}
		if ($_REQUEST["mode"] == "status") {
			unset($rec);
			if ($_REQUEST["status"] == "9") {
				$rec["status"] = "0";
			} else {
				$rec["status"] = $_REQUEST["status"];
			}
			if ($_REQUEST["tantou_id"]) {
				$rec["tantou_id"] = $_REQUEST["tantou_id"];
			} else {
			//	$rec["tantou_id"] = $_SESSION["AUTH_LOGIN"]["seq"];
			}
			if ($oubo["status"] != $rec["status"]) {
				$rec["up_date"] = "now()";
			}
			Oubo::updateData($oubo["seq"], $rec);
			//
			if ($_REQUEST["status"] && ($oubo["status"] != $rec["status"])) {
				$rec2["comment"] = "ステータスを「" . $oubo_status_list[$oubo["status"]] . "」から「" . $oubo_status_list[$rec["status"]] . "」に変更しました。";
				//$rec2["tantou_id"] = $rec["tantou_id"];
				$rec2["tantou_id"] = $_SESSION["AUTH_LOGIN"]["seq"];
				$rec2["oubo_id"] = $_REQUEST["id"];
				$rec2["kind"] = 3;
				Memo::addData($rec2);
				$oubo["status"] = $rec["status"];
			}
			if ($_REQUEST["tantou_id"] && ($oubo["tantou_id"] != $_REQUEST["tantou_id"])) {
				unset($rec2);
				$tantou = Tantou::getData($_REQUEST["tantou_id"]);
				$rec2["comment"] = "担当者を「" . $tantou["name"] . "」に変更しました。";
				//$rec2["tantou_id"] = $rec["tantou_id"];
				$rec2["tantou_id"] = $_SESSION["AUTH_LOGIN"]["seq"];
				$rec2["oubo_id"] = $_REQUEST["id"];
				$rec2["kind"] = 3;
				Memo::addData($rec2);
				$oubo["tantou_id"] = $rec["tantou_id"];
			}
		}
		$ap->set("oubo", $oubo);
		$ap->set("user", disp_user($user));
		if ($item) {
			$ap->set("info", disp_item($item));
		}
		// メモ
		$page = $_REQUEST["page"];
		$db = new Memo();
		$db->search[] = array("field" => "oubo_id", "value" => $id, "cond" => "=");
		$db->search[] = array("field" => "kind", "value" => "3", "cond" => "=");
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
				$tantou = Tantou::getData($val["tantou_id"]);
				if ($tantou) {
					$val["name"] = $tantou["name"];
				}
				$list2[] = $val;
			}
			$ap->set("list", $list2);
		}
	} else {
		header("location: ./");
		exit;
	}
}
// -----------------------------------
if ($ap->act == "news") {
	access_page_auth_check("news");
	if ($_REQUEST["mode"] == "delete") {
		$id = $_REQUEST["id"];
		$item = News::getData($id);
		if ($item) {
			add_action(AUTH_PR_DEL, $_SESSION["AUTH_LOGIN"]["seq"], $id, $item["title"]);
			News::deleteData($id);
		}
	}
	$page = $_REQUEST["page"];
	$db = new News();
	if ($keyword) {
//		$where_keyword[] = array("field" => "title", "value" => "%{$keyword}%", "cond" => "like", "relation" => "or");
//		$where_keyword[] = array("field" => "question", "value" => "%{$keyword}%", "cond" => "like", "relation" => "or");
//		$db->search[] = array("nest" => $where_keyword);
//		$form["keyword"] = $keyword;
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
		foreach ($list as $key => $val) {
			$list[$key]["kind_v"] = $val["kind"];
			$list[$key]["kind"] = $news_kind_list[$val["kind"]];
		}
		$ap->set("list", $list);
	}
}
//
if ($ap->act == "news-edit") {
	access_page_auth_check("news");
$news_check = array(
	// フォーム項目名 文字種 最大文字数 必須 表示名称
	array("mode", "*", "", false, "モード"),
	array('kind', "*", "", true, "カテゴリ"),
	array('title', "*", "", true, "タイトル"),
	array('contents', "*", "", true, "本文"),
	array('news_date', "*", "", true, "登録日付"),
	array('status', "*", "", true, "公開・非公開"),
	array("seq", "*", "", false, "ID"),
);

	if ($_REQUEST["mode"]) {
		$form = FormCheck::get_form($news_check, $_REQUEST);
		$msg = FormCheck::check($form, $news_check);
		$img = form_image("image", $msg, $img_type, IMAGE_MAX);
		if ($msg) {
			foreach ($msg as $key => $v) {
				$data["error"][$key] = $v;
			}
			$ap->set("msg", $msg);
		} else {
			// 直接保存
		$item['title'] = $form["title"];
		$item['kind'] = $form["kind"];
		$item['contents'] = htmlspecialchars_decode($form['contents']);
		$item['news_date'] = $form["news_date"];
		$item['status'] = $form["status"];
		if ($form["seq"]) {
			News::updateData($form["seq"], $item);
			add_action(AUTH_NEWS_EDIT, $_SESSION["AUTH_LOGIN"]["seq"], $form["seq"], $form["title"]);
		} else {
			$id = News::addData($item);
			add_action(AUTH_NEWS_ADD, $_SESSION["AUTH_LOGIN"]["seq"], $id, $form["title"]);
		}
			$ap->template = "news-edit-thankyou.html";
/*
			$_SESSION["form"] = $form;
			$form["kind"] = $news_kind_list[$form["kind"]];
			$ap->template = "news-edit-confirm.html";
*/
		}
	} else {
		if ($_REQUEST["id"]) {
			$form = News::getData($_REQUEST["id"]);
		} else {
			// デフォルト
			$form["status"] = "1";
		}
	}
	$ap->set("form", $form);
}
if ($ap->act == "news-edit-reinput") {
	access_page_auth_check("news");
	// 再入力
	$ap->template = "news-edit.html";
	$form = $_SESSION["form"];
	unset($_SESSION["form"]);
	$ap->set("form", $form);
}
if ($ap->act == "news-edit-thankyou") {
	access_page_auth_check("news");
	if ($_REQUEST["reinput_x"]) {
		$form =	$_SESSION["form"];
		unset($_SESSION["form"]);
		$ap->set("form", $form);
		$ap->template = "contact.html";
	} else if ($_SESSION["form"]) {
	// 保存
		$form = $_SESSION["form"];
		unset($_SESSION["form"]);
		// 保存
		$item['title'] = $form["title"];
		$item['kind'] = $form["kind"];
		$item['contents'] = $form["contents"];
		$item['news_date'] = $form["news_date"];
		$item['status'] = $form["status"];
		if ($form["seq"]) {
			News::updateData($form["seq"], $item);
			add_action(AUTH_NEWS_EDIT, $_SESSION["AUTH_LOGIN"]["seq"], $form["seq"], $form["title"]);
		} else {
			$id = News::addData($item);
			add_action(AUTH_NEWS_ADD, $_SESSION["AUTH_LOGIN"]["seq"], $id, $form["title"]);
		}
		// メール送信
//		template_mail($form["email"], "mail2_subject", "mail2_body", array("form" => $form, "name" => $form["name"]), "manager");
	}
}
// -----------------------------------
// トップページ・スタティックページ
$ap->fix_template();

if ($ap->template == 'index.html') {
/*
	// 新着お知らせ5件
	$db = new News();
	$db->order[] = array("field" => "reg_date", "desc" => "1");
	$db->page = 0;
	$db->limit = 10;
	$list = $db->getList();
	$ap->set("news", $list);
	// カテゴリ別質問一覧5件
	foreach ($ap->genre as $key => $val) {
		$db = new Qa();
		$db->search[] = array("field" => "category", "value" => $val["seq"], "cond" => "=");
		$db->order[] = array("field" => "reg_date", "desc" => "1");
		$db->page = 0;
		$db->limit = 5;
		$list = $db->getList();
		$ap->genre[$key]["qa"] = $list;
	}
	$ap->set("qa", $ap->genre);
*/
}
// 画面出力
$ap->view();

// -----------------------------------
function login_check($msg="")
{
	if ($_SESSION["AUTH_LOGIN"]) {
		return;
	}
	// ログイン後の飛び先（戻る場所）
	$_SESSION['NEXT_URL'] = TOP . '?act=logined';
	// 現在のパラメータを保存
	$_SESSION['REQUEST'] = $_REQUEST;
	//
	$_SESSION["login_message"] = $msg;
	header("location: login.html");
	exit;
}

function disp_auth($item)
{
$auth_list = array(
	"1" => "追加",
	"2" => "編集",
	"3" => "削除",
	"4" => "CSVエクスポート",
);

	$item["auth1"] = multi_string($item["auth1"], $auth_list, "・");
	$item["auth2"] = multi_string($item["auth2"], $auth_list, "・");
	$item["auth3"] = multi_string($item["auth3"], $auth_list, "・");
	$item["auth4"] = multi_string($item["auth4"], $auth_list, "・");
	$item["auth5"] = multi_string($item["auth5"], $auth_list, "・");
	$item["auth6"] = multi_string($item["auth6"], $auth_list, "・");
	$item["auth7"] = multi_string($item["auth7"], $auth_list, "・");
	$item["auth8"] = multi_string($item["auth8"], $auth_list, "・");

	return $item;
}
function add_action($kind, $user=NULL, $item=NULL, $contents=NULL)
{
	$rec["kind"] = $kind;
	if ($user) {
		$rec["tantou_id"] = $user;
	} else {
		$rec["tantou_id"] = $_SESSION["AUTH_LOGIN"]["seq"];
	}
	if ($item) {
		$rec["item_id"] = $item;
	}
	if ($contents) {
		$rec["contents"] = $contents;
	}
	Action::addData($rec);
	//
	unset($_SESSION["HISTORY"]);
}
function put_csv($list)
{
	$filename = "data.csv";
	//
	header("Content-disposition: attachment; filename=" . $filename);
	header("Content-type: text/x-csv; charset=SJIS");
	if ($list) {
		$str = "";
		foreach ($list[0] as $key => $val) {
			if ($str) {
				$str .= ",";
			}
			$str .= '"' . $key . '"';
		}
		echo $str . "\r\n";
		//
		foreach ($list as $val) {
			$str = "";
			foreach ($val as $val2) {
				if ($str) {
					$str .= ",";
				}
				
				$val2 = str_replace('"', '""', $val2);
				$str .= '"' . $val2 . '"';
			}
			echo mb_convert_encoding($str, "SJIS", SCRIPT_ENCODING) . "\r\n";
		}
	}
	exit;
}
function disp_action($item)
{
	global $action_list;
	global $action_list2;

	$str = "";
	if ($item["contents"]) {
		$str = "「{$item["contents"]}」を";
	}
	$item["action"] = $str . $action_list2[$item["kind"]] . "しました";
	if ($action_list[$item["kind"]]) {
		$item["info"] = $action_list[$item["kind"]] . "にて、";
	}
	$tantou = Tantou::getData($item["tantou_id"]);
	$item["name"] = $tantou["name"];
	return $item;
}
function update_search()
{
	global $ap;

	$sql = "update `item` set oubo=(select count(*) from oubo where item_id=item.item_id) WHERE 1";
	$ap->inst->db_exec($sql);
	$sql = "update user set count=(select count(*) from oubo where user_id=user.user_id) where 1";
	$ap->inst->db_exec($sql);
/*
	$sql = "update station set count=(select count(*) from search where kind='station' and value=station.station_cd) where 1";
	$ap->inst->db_exec($sql);
	$sql = "update address set count=(select count(*) from search where kind='kinmu_city' and value=address.city_cd) where 1";
	$ap->inst->db_exec($sql);
*/
}
function access_page_auth_check($act_name){

	$auth_val = $_SESSION["AUTH_LOGIN"]["auth1"];
	switch ($act_name) {
		case "admin-authority":
			$auth_val = $_SESSION["AUTH_LOGIN"]["auth1"];
			break;

		case "admin-item":
			$auth_val = $_SESSION["AUTH_LOGIN"]["auth2"];
			break;

		case "web":
			$auth_val = $_SESSION["AUTH_LOGIN"]["auth8"];
			break;

		case "admin-user":
			$auth_val = $_SESSION["AUTH_LOGIN"]["auth3"];
			break;

		case "admin-entry":
			$auth_val = $_SESSION["AUTH_LOGIN"]["auth4"];
			break;

		case "news":
			$auth_val = $_SESSION["AUTH_LOGIN"]["auth5"];
			break;

		case "contents":
			$auth_val = $_SESSION["AUTH_LOGIN"]["auth6"];
			break;

		case "admin-pr":
			$auth_val = $_SESSION["AUTH_LOGIN"]["auth7"];
			break;

		case "admin-branch":
			$auth_val = $_SESSION["AUTH_LOGIN"]["auth8"];
			break;
	}

	//権限チェック
	if(!$auth_val["1"] && !$auth_val["2"] && !$auth_val["3"]){
		header("location: ./");
		exit;
	}
}
?>
