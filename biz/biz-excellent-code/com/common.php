<?php
/*
 * ƒAƒvƒŠƒP[ƒVƒ‡ƒ“’PˆÊ‚Ì‹¤’Êˆ—
 */
require_once("../lib/config.php");

require_once("master.php");
require_once("action.php");
require_once("address.php");
require_once("contents.php");
require_once("contents_editor.php");
require_once("item.php");
require_once("news.php");
require_once("oubo.php");
require_once("pr.php");
require_once("search.php");
require_once("station.php");
require_once("tantou.php");
require_once("user.php");
require_once("memo.php");
require_once("keywords.php");

require_once("info.php");
require_once("image.php");
require_once("filesave.php");
require_once("branch.php");

require_once("common_func.php");
require_once("login.php");

define("PAGE_ITEMS", 20);

// ï¿½Aï¿½vï¿½ï¿½ï¿½Pï¿½[ï¿½Vï¿½ï¿½ï¿½ï¿½ï¿½Nï¿½ï¿½ï¿½X

require_once("smarty/Smarty.class.php");

class application extends Smarty {

	var $template;
	var $act;
	var $admin_info;

	function application()
	{
		global $DB_URI;

		session_start();
/*
		// ƒeƒ“ƒvƒŒ[ƒg‚ÌSJIS‘Î‰ž(SJIS‚Ìê‡—LŒø‚É‚·‚é)
		$this->register_prefilter("convert_encoding_to_eucjp");
		$this->register_postfilter("convert_encoding_to_sjis");
*/
		if (get_magic_quotes_gpc()) {
			$_REQUEST = $this->safeStripSlashes($_REQUEST);
			$_GET = $this->safeStripSlashes($_GET);
			$_POST = $this->safeStripSlashes($_POST);
		}
		if ($_REQUEST["act"] == "logined") {
			$_REQUEST = $_SESSION['REQUEST'];
			$ap->act = $_REQUEST["act"];
		}

		$this->template = 'admin.html';	// ƒfƒtƒHƒ‹ƒg
		if ($_REQUEST["act"]) {
			$this->act = $_REQUEST["act"];
			// act‚ª‚ ‚ê‚ÎA‚»‚ê‚ªƒfƒtƒHƒ‹ƒgƒeƒ“ƒvƒŒ[ƒg
			$this->template = $this->act . '.html';
		}
/* ƒƒOƒCƒ“AƒƒOƒAƒEƒg
		if ($this->act == "logout") {
			// ƒƒOƒAƒEƒg
			unset($_SESSION["LOGIN"]);
		//	$this->act = "login";
		//	$this->template = 'login.html';
			removeLoginCookie(LOGIN_COOKIE);
		} else if (!$_SESSION["LOGIN"]) {
			$ret = isLogin(LOGIN_COOKIE);
			if ($ret) {
				$cond["user_id"] = $ret["user_id"];
				$cond["email"] = $ret["name"];
				$ret = User::findData($cond);
				if ($ret && ($ret[0]["status"] == "1")) {
					$user = $ret[0];
					$_SESSION["LOGIN"] = $user;
				}
			}
		}
		if ($_SESSION["LOGIN"]) {
			// ˆê”Ê—˜—pŽÒ‚Æ‚µ‚ÄƒƒOƒCƒ“’†
			$this->set("user_login", $_SESSION["LOGIN"]);
			$this->set("login", $_SESSION["LOGIN"]["user_id"]);
			$this->set("user_name", $_SESSION["LOGIN"]["nickname"]);
		}
*/
		// ‘Sƒy[ƒW‹¤’Êƒf[ƒ^‚ð—pˆÓ‚·‚é
		$this->inst = DBConnection::getConnection($DB_URI);
/*
		// ƒWƒƒƒ“ƒ‹ˆê——
		$sql = "select * from genre where status=1 order by ord";
		$ret = $this->inst->search_sql($sql);
		if ($ret["count"]) {
			$this->genre = $ret["data"];
			$this->set("genre", $this->genre);
		}
		// “o˜^ƒ†[ƒU[”
		$sql = "select count(*) as cnt from user where status=1";
		$ret = $this->inst->search_sql($sql);
		if ($ret["count"]) {
			$this->set("user_count", $ret["data"][0]["cnt"]);
		}
*/
		$this->set("top", TOP);
	}

	// •Ï”‚ðÝ’è
	function set($list, $value=array()) {
		if (is_array($list)) {
			foreach ($list as $key => $val) {
				$this->assign($key, $val);
			}
		} else {
			$this->assign($list, $value);
		}
	}

	// ƒeƒ“ƒvƒŒ[ƒg‚ðŠm’è‚·‚é
	function fix_template() {
		// ƒeƒ“ƒvƒŒ[ƒgƒtƒ@ƒCƒ‹‚Ì‘¶ÝŠm”F
		if (file_exists("templates/" . $this->template)) {
			//
		} else {
			// ƒtƒ@ƒCƒ‹‚ª‘¶Ý‚µ‚È‚¯‚ê‚ÎƒfƒtƒHƒ‹ƒgƒy[ƒW
			$this->template = 'index.html';
		}
	}

	// ƒeƒ“ƒvƒŒ[ƒg‚Ì•\Ž¦
	function view() {
		$this->display($this->template);
	}

	function safeStripSlashes($var) {
		if (is_array($var)) {
			foreach ($var as $key => $v) {
				$var[$key] = $this->safeStripSlashes($v);
			}
			return $var;
			//return array_map('application::safeStripSlashes', $var);
		} else {
			if (get_magic_quotes_gpc()) {
				$var = stripslashes($var);
			}
			return $var;
		}
	}

}
/*
// Smarty SJIS‘Î‰ž—pŠÖ”1
function convert_encoding_to_eucjp($template_source) {
    if (function_exists("mb_convert_encoding")) {
        //•¶ŽšƒR[ƒh‚ð•ÏŠ·‚·‚é
        return mb_convert_encoding($template_source, "EUC-JP", "SJIS");
    }
    return $template_source;
}

// Smarty SJIS‘Î‰ž—pŠÖ”2
function convert_encoding_to_sjis($template_source) {
    if (function_exists("mb_convert_encoding")) {
        //•¶ŽšƒR[ƒh‚ð•ÏŠ·‚·‚é
        return mb_convert_encoding($template_source, "SJIS", "EUC-JP");
    }
    return $template_source;
}
*/
?>
