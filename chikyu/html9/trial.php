<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
/**
 * 定数定義
 */

// URLパス
define("CHILD_PATH", "/reserve");

// メール関連
define("EMAIL_SUBJECT", "Email Subject___replace");
define("EMAIL_FROM", "info@sitedomain___replace.com");
define("EMAIL_FROM_NAME", "SITEDOMAIN___replace");
// 通知メール宛先（複数対応）
$email = array(
	'info@chikyujinclub.co.jp',
	'mitsunori.inoue@gmail.com',
);
// メール署名
$mail_signature = <<<EOF
==============================================================

SITEDOMAIN

Address___replace
TEL：PhoneNumber___replace
E-MAIL：info@chikyujinclub.co.jp
https://chikyu-jin.com.com

==============================================================
EOF;

// HTTPS 経由か判定
if (is_https()) {
	$protocol = "https://";
} else {
	$protocol = "http://";
}


/**
 * HTTPS 経由での接続かどうか判定する。
 * @return bool
 */
function is_https()
{
	// Apache
	if (isset($_SERVER['HTTPS']) === true) {
		return ($_SERVER['HTTPS'] === 'on' or $_SERVER['HTTPS'] === '1');
	// IIS
	} else if (isset($_SERVER['SSL']) === true) {
		return ($_SERVER['SSL'] === 'on');
	// Reverse proxy
	} else if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) === true) {
		return (strtolower($_SERVER['HTTP_X_FORWARDED_PROTO']) === 'https');
	// Reverse proxy
	} else if (isset($_SERVER['HTTP_X_FORWARDED_PORT']) === true) {
		return ($_SERVER['HTTP_X_FORWARDED_PORT'] === '443');
	} elseif (isset($_SERVER['SERVER_PORT']) === true) {
		return ($_SERVER['SERVER_PORT'] === '443');
	}

	return false;
}

// ホスト名取得（ポート番号削除）
$hostname = str_replace(":443", "", $_SERVER["HTTP_HOST"]);

define("SITE_DOMAIN", "chikyu-jin.com.com");
define("SITE_URL", $protocol."".SITE_DOMAIN);

// ホスト名により定数設定
switch ($hostname) {
// テスト用サーバ
case "chikyu-jin.com.work.com":
	// 開発環境
	define("IS_DEVELOPMENT", 0);
	// URL
	define("BASE_URL", $protocol."chikyu-jin.com.work.com");
	break;
// 本番用サーバ
case "www.chikyu-jin.com.com":
case "chikyu-jin.com.com":
default:
	// 開発環境
	define("IS_DEVELOPMENT", 0);
	// URL
	define("BASE_URL", $protocol."chikyu-jin.com.com");
	break;
}

// マルチバイト文字のバイト数（UTF-8 なので 3バイト）
define("MBWIDTH", 3);

// sha1() 用の salt
define('SALT', "_himitsu");

// CSRF対策用のトークン長（16 * 2 = 32バイト）
define('TOKEN_LENGTH', 16);

/**
 * 問い合わせフォーム用関数群
 */

/**
 * POST の前処理
 * 
 * @param array $ars
 * @param array $ard
 * @return boolean
 */
function preproc_post(&$ars, &$ard)
{
	// 配列の場合は処理
	if (is_array($ars)) {
		foreach ($ars as $key => $val) {
			// 配列（チェックボックス）なら再帰処理
			if (is_array($val)) {
				preproc_post($ars[$key], $ard[$key]);
			} else {
				// 特殊文字を HTML エンティティに変換
				$tmp = htmlspecialchars($val);
				// magic_quotes_gpc が On なら stripslashes()
				if (get_magic_quotes_gpc()) {
					// '\' を取り除く
					$tmp = stripslashes($tmp);
				}
				$ard[$key] = $tmp;
			}
		}
		return TRUE;
	} else {
		return FALSE;
	}
}

/**
 * GET の前処理
 * 
 * @param array $ars
 * @param array $ard
 * @return boolean
 */
function preproc_get(&$ars, &$ard)
{
	if (is_array($ars)) {
		// 特殊文字を HTML エンティティに変換
		foreach ($ars as $key => $val) {
			$ard[$key] = htmlspecialchars($val);
		}
		return TRUE;
	} else {
		return FALSE;
	}
}

/**
 * 出力用
 */
function _h($s)
{
	echo htmlspecialchars($s, ENT_QUOTES,'UTF-8');
}

/**
 * 変換のみ
 */
function _hr($s)
{
	return htmlspecialchars($s, ENT_QUOTES,'UTF-8');
}

/**
 * セッション終了処理
 * 
 * @return boolean
 */
function session_end()
{
	$_SESSION = array();
	return session_destroy();
}

/**
 * Eメールアドレス形式判定
 * 完璧ではないがある程度判定可能。
 * 
 * @param type $ma
 * @return type
 */
function is_emailaddress2($ma)
{
	// see also : http://fdays.blogspot.com/2007/10/rfc-2822-j0hn-d0e-10-pregmatch-9.html
	$ok = preg_match('/^[-+.\\w]+@[-a-z0-9]+(\\.[-a-z0-9]+)*\\.[a-z]{2,6}$/i', $ma);
	return $ok;
}

/**
 * 改行無しテキストを指定文字列で折りたたむ。
 * $fold は改行文字（列）。通常は "\n" を指定。
 * 
 * @param string $str
 * @param int $width
 * @param string $fold
 * @return string
 */
function foldtext($str, $width, $fold)
{
	$lines = explode("\n", $str);
	foreach ($lines as $line) {
		//	分割位置
		$pos = 0;
		$len = strlen($line);
		if (0 == $len) {
			$rval .= $fold;
		} else {
			while ($pos < $len) {
				$tmp = mb_strcut($line, $pos, $width, "UTF-8");
				$rval .= $tmp.$fold;
				$pos += strlen($tmp);
			}
		}
	}
	return $rval;
}

/**
 * ドキュメントルート取得
 * SSL が別ディレクトリの場合などに使う。
 * 
 * @return boolean
 */
function documentRoot()
{
	if (!isset($_SERVER["SCRIPT_NAME"]) || !isset($_SERVER["SCRIPT_FILENAME"])) {
		return false;
	}
	$name = $_SERVER["SCRIPT_NAME"];
	$filename = $_SERVER["SCRIPT_FILENAME"];
	$dr = substr($filename, 0, strlen($filename) - strlen($name));
	return str_replace("/", DIRECTORY_SEPARATOR, $dr);
}

/**
 * トークン生成
 * CSRF対策のためのトークンを生成する。
 * 
 * @return string
 */
function get_token()
{
	return bin2hex(openssl_random_pseudo_bytes(TOKEN_LENGTH));
}

/**
 * リファラーのチェック処理
 * CSRF対策としてリファラーのチェックを行なう
 * 
 * @param string $url
 * @return none
 */
function check_referer($url)
{
	// リファラーが存在しなければトップに遷移
	if (!isset($_SERVER["HTTP_REFERER"])) {
		header("Location: ./error.php");
		exit();
	}
	if (is_array($url)) {
		$rval = 0;
		// リファラーが配列内に存在しない場合はトップに遷移
		if (!in_array($_SERVER["HTTP_REFERER"], $url, true)) {
			header("Location: ./error.php");
			exit();
		}
		// リファラーが指定のものと異なる場合はトップに遷移
	} else if ($_SERVER["HTTP_REFERER"] !== $url) {
		header("Location: ./error.php");
		exit();
	}
}

/**
 * 入力値の文字エンコーディングチェック
 * UTF-8 で統一することが前提。
 * 
 * @example array_walk_recursive($array, 'check_encoding');
 */
function check_encoding($key, $value)
{
	if (!mb_check_encoding($value, 'UTF-8')) {
		die('不正な文字コード');
	}
}

/**
 * ブラウザのキャッシュを抑制
 * 
 * @return none
 */
function controlcache()
{
//	header("Pragma: no-cache");
//	header("Expires: -1");
//	header('Cache-Control: no-cache');
//	header('Cache-Control: no-store');
	header('Expires:-1');
	header('Cache-Control:');
	header('Pragma:');
}

/**
 * エラー表示用クラス名出力
 * エラー発生時のセッションは $_SESSION["error"] 固定。
 * エラー表示用のクラス名は error 固定。
 * 
 * @param string $error_sess_name
 * @param boolean $class_string
 */
function print_error_class($error_sess_name, $class_string = 0)
{
	$s = "";
	if (!empty($_SESSION["error"][$error_sess_name])) {
		if ($class_string) {
			$s = ' class="error"';
		} else {
			$s .= ' error';
		}
	}
	echo $s;
}

/**
 * 項目ごとにエラーメッセージ表示
 * エラー発生時のセッションは $_SESSION["error"] 固定。
 * エラー表示用のクラス名は error 固定。
 * 
 * @param string $error_sess_name
 * @param string $elm
 */
function print_error_each_message($error_sess_name, $elm)
{
	$s = "";
	if (!empty($_SESSION["error"][$error_sess_name])) {
		$s = '<'.$elm.' class="error">';
		$s .= $_SESSION["error"][$error_sess_name];
		$s .= '</'.$elm.'>';
	}
	echo $s;
}

/**
 * POST セッションの出力用
 * セッションは $_SESSION["post"] 固定。
 * 
 * @param type $post_sess_name
 * @param type $echo
 * @param type $print_noinput
 * @return type
 */
function print_post_session($post_sess_name, $echo = 1, $print_noinput = 0)
{
	$s = "";
	if (empty($_SESSION["post"][$post_sess_name]) and 1 == $print_noinput) {
		$s = "（未入力）";
	} else {
		$s = $_SESSION["post"][$post_sess_name];
	}
	if ($echo) {
		_h($s);
	} else {
		return $s;
	}
}

/**
 * POST セッションの出力用（電話番号・郵便番号）
 * セッションは $_SESSION["post"] 固定。
 * 
 * @param type $post_sess_name
 * @param type $echo
 * @param type $print_noinput
 * @return type
 */
function print_post_session_num($post_sess_name, $echo = 1, $print_noinput = 0)
{
	$s = "";
	if (is_array($post_sess_name)) {
		$tmp = "";
		$tmp2 = "";
		foreach ($post_sess_name as $val) {
			$tmp .= $_SESSION["post"][$val];
			$tmp2 .= $_SESSION["post"][$val]."-";
		}
		$tmp2 = substr($tmp2, 0, -1);
	} else {
		$tmp = $_SESSION["post"][$post_sess_name];
		$tmp2 = $_SESSION["post"][$post_sess_name];
	}
	if (empty($tmp) and 1 == $print_noinput) {
		$s = "（未入力）";
	} else {
		$s = $tmp2;
	}
	if ($echo) {
		_h($s);
	} else {
		return $s;
	}
}

/**
 * radio の checked 出力用
 * セッションは $_SESSION["post"] 固定。
 * 
 * @param type $post_sess_name
 * @param type $value_for_compare
 * @param type $echo
 * @return string
 */
function print_checked($post_sess_name, $value_for_compare, $echo = 1)
{
	$s = "";
	if ($value_for_compare == $_SESSION["post"][$post_sess_name]) {
		$s = " checked";
	} else {
		$s = "";
	}
	if ($echo) {
		echo $s;
	} else {
		return $s;
	}
}

/**
 * select の selected 出力用
 * セッションは $_SESSION["post"] 固定。
 * 
 * @param type $post_sess_name
 * @param type $value_for_compare
 * @param type $echo
 * @return string
 */
function print_selected($post_sess_name, $value_for_compare, $echo = 1)
{
	$s = "";
	if ($value_for_compare == $_SESSION["post"][$post_sess_name]) {
		$s = " selected";
	} else {
		$s = "";
	}
	if ($echo) {
		echo $s;
	} else {
		return $s;
	}
}

/**
 * 現在時刻とIPアドレスからキーを作成
 * 一意のIDとして使用・セッションにセットするのに使用
 * 
 * @return type
 */
function gen_key()
{
	return (sha1(date('Y-m-d H:i:s')." ".$_SERVER["REMOTE_ADDR"]));
}

/**
 * strtotime()の日本語対応版
 *
 * @param string $sDate
 * @param boolean $blnNow
 * @return integer 
 */
function mb_strtotime($sDate = null, $blnNow = true)
{
	// 日本語版の対応
	if (preg_match('/^([0-9]{4})[年]{1}([0-9]{1,2})[月]{1}([0-9]{1,2})[日]{1}[\s　]([0-9]{1,2})[時]{1}([0-9]{1,2})[分]{1}([0-9]{1,2})[秒]{1}[\s　]*$/u', $sDate, $match)) { // YYYY年MM月DD日HH時MI分SS秒
		$sTimestamp = mktime($match[4], $match[5], $match[6], $match[2], $match[3], $match[1]);
	} else if (preg_match('/^([0-9]{4})[年]([0-9]{1,2})[月]([0-9]{1,2})[日][\s　]([0-9]{1,2})[時]([0-9]{1,2})[分][\s　]*$/u', $sDate, $match)) { // YYYY年MM月DD日HH時MI分
		$sTimestamp = mktime($match[4], $match[5], 0, $match[2], $match[3], $match[1]);
	} else if (preg_match('/^([0-9]{4})[年]([0-9]{1,2})[月]([0-9]{1,2})[日][\s　]*$/u', $sDate, $match)) { // YYYY年MM月DD日
		$sTimestamp = mktime(0, 0, 0, $match[2], $match[3], $match[1]);
	// 通常
	} else {
		$sTimestamp = strtotime($sDate, $blnNow);
	}
	return $sTimestamp;
}

/**
 * 初期化処理
 */
// エラー全出力
//ini_set( 'display_errors', 1 );
// エラー表示抑止
//error_reporting(E_ALL ^ E_NOTICE);

// 文字コード指定 UTF-8
header('Content-Type: text/html; charset=UTF-8');

// XSS攻撃検知してブロック（XSS対策）
header("X-XSS-Protection: 1; mode=block");

// IEにファイルの内容からファイルの種類を決定させない（XSS対策）
header("X-Content-Type-Options: nosniff");
// IEでダウンロードしたファイルを直接開かせない。
header("X-Download-Options: noopen");

// Content Security Policy 設定（XSS対策・データインジェクション対策）
//header( "X-Content-Security-Policy: default-src 'self'" );	// Firefox
//header( "X-WebKit-CSP: default-src 'self'" );				// Chrome, Safari
//header( "Content-Security-Policy: default-src 'self'" );	// W3C

// このページを iframe に埋め込ませない
header("X-Frame-Options: DENY");

// 「戻る」ボタンでの期限切れ表示の抑制
session_cache_limiter('private, must-revalidate');

// セッション開始
session_start();

// セッションIDを再生成（セッションハイジャック対策）
session_regenerate_id(true);

// キャッシュを抑制
controlcache();

// トークン設定・確認処理（CSRF対策）
if ('POST' != $_SERVER['REQUEST_METHOD']) {
	// GET の場合はトークンをセット（トークンのチェックは行なわない）
	$_SESSION["token"] = get_token();
} else {
	// POST の場合は一律にトークンをチェック（トークンのセットは行なわない）
    if (empty($_SESSION["token"])) {
		// トークンが空の場合は不正遷移
 		header("Location: ./error.php");
		exit();
    }
	if ($_SESSION["token"] != filter_input(INPUT_POST, "token")) {
		// トークンが一致しない場合は不正遷移
 		header("Location: ./error.php");
		exit();
	}
}

// タイムゾーン設定 JST
date_default_timezone_set('Asia/Tokyo');

?>
<?php

// マルチチェックボックス用の連想配列作成
$artmp = array();
$arkey = array(
	"ご相談内容・がん先進治療",
	"ご相談内容・がん予防・再発防止",
	"ご相談内容・がん超早期発見検査",
	"ご相談内容・その他",
	);
if (!empty($arkey)) {
	foreach ($arkey as $keytmp => $valtmp) {
		if (!is_null($_SESSION["post"][$valtmp])) {
			foreach ($_SESSION["post"][$valtmp] as $key => $val) {
				$artmp[$valtmp][$val] = " checked";
			}
		}
	}
}

	/* ==================== data ==================== */

	//初期設定
	//共通
	$siteURL = (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"];
	$pageURL = (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
	$sitename = "SiteName___replace";
	$keywords = "Keywords___replace";
	$description = "Description___replace";

	//ページ設定
	$bodyClass = "transition contents contact";
	$pagename = "pagename replace";
	$catname = "";
	$pagetitle = $pagename.(($catname!="") ? " | ".$catname : "");
	$pagekeywords = "";
	$pageDescription = "";
	$pageOgpImg = "";

	/* ==================== /data ==================== */
?>

<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<!DOCTYPE html>
<html lang="ja">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">


<!-- Global site tag (gtag.js) - Google Analytics-->
<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-29983639-1']);
_gaq.push(['_trackPageview']);
(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0];
	s.parentNode.insertBefore(ga, s);
})();
</script>


<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="format-detection" content="email=no,telephone=no,address=no">
<meta name="viewport" content="width=device-width,initial-scale=1.0,shrink-to-fit=no">
<script type="text/javascript">
	if(!((navigator.userAgent.indexOf('iPhone') > 0) || navigator.userAgent.indexOf('iPod') > 0 || (navigator.userAgent.indexOf('Android') > 0 && navigator.userAgent.indexOf('Mobile') > 0))){
		document.write('<meta name="viewport" content="width=990">');
	}
</script>
<title>お試しパック　|　地球人倶楽部</title>
<meta name="description" content="地球人倶楽部は、有機・低農薬野菜と無添加食品の会員制宅配ネットワークです。">
<meta name="keywords" content="地球人倶楽部,Chikyujin-Club,プロップスジャパン,有機野菜,有機農産物,オーガニック,無農薬野菜,ナチュラルフード,無添加,自然食品,安全,安心,健康,会員制宅配,個人宅配,デリバリーサービス,こだわり,厳選">
<meta name="author" content="株式会社 プロップスジャパン">
<meta name="copyright" content="株式会社 プロップスジャパン">
<meta http-equiv="imagetoolbar" content="no" />
<!-- open graph protocol -->
<meta property="og:locale" content="ja_JP">
<meta property="og:site_name" content="地球人倶楽部">
<meta property="og:description" content="地球人倶楽部は、有機・低農薬野菜と無添加食品の会員制宅配ネットワークです。">
<meta property="og:title" content="地球人倶楽部">
<meta property="og:url" content="http://www.chikyu-jin.com">
<meta property="og:image" content="http://www.chikyu-jin.com/ogp.jpg">
<!-- icon -->
<link rel="shortcut icon" href="/favicon.ico">
<link rel="apple-touch-icon-precomposed" href="/apple-touch-icon.png">
<!-- CSS -->
<link rel="stylesheet" href="css/cssreset.css">
<link rel="stylesheet" href="css/html5-doctor-reset-stylesheet.min.css">
<link rel="stylesheet" href="css/com.css">
<!-- Javascript -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-1.12.4.min.js"><\/script>')</script>
<script defer src="js/com.js"></script>
<!-- intersection observer -->
<script defer src="js/intersection-observer-polyfill.js"></script>
<script>
    (function(d) {
      var config = {
        kitId: 'opl7zur',
        scriptTimeout: 3000,
        async: true
      },
      h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
    })(document);
</script>
<script>
$(function() {
	var observer = new IntersectionObserver(function(entries) {
		entries.forEach(function(e) {
			if (!e.isIntersecting) return;
			e.target.classList.add('move'); // 交差した時の処理
			observer.unobserve(e.target);
			// target element:
		    //   e.target				ターゲット
		    //   e.isIntersecting		交差しているかどうか
		    //   e.intersectionRatio	交差している領域の割合
		    //   e.intersectionRect		交差領域のgetBoundingClientRect()
		    //   e.boundingClientRect	ターゲットのgetBoundingClientRect()
		    //   e.rootBounds			ルートのgetBoundingClientRect()
		    //   e.time					変更が起こったタイムスタンプ
		})

	},{
    	// オプション設定
		rootMargin: '0px 0px -5% 0px' //下端から5%入ったところで発火
		//threshold: [0, 0.5, 1.0]
	});

	var target = document.querySelectorAll('.io'); //監視したい要素をNodeListで取得
	for(var i = 0; i < target.length; i++ ) {
	    observer.observe(target[i]); // 要素の監視を開始
	}

	//アニメーションによる各要素のはみ出しを解消
	$("body").wrapInner("<div style='overflow:hidden;'></div>");

});
</script>
<!-- matchHeight -->
<script defer src="js/jquery.matchHeight.js"></script>
<script>
$(function() {
	$(window).on('load',function(){
		$(".contents_nav ul > li").matchHeight();
	});
});
</script>
<!-- GoogleMap iFrame-->
<!-- <script>
	$(window).on('load', function(){
		$('.footer_map').append('<iframe src="" frameborder="0" style="border:0" allowfullscreen></iframe>');
	});
</script> -->
<!--svgxuse for IE -->
<script defer src="js/svgxuse.js"></script>
<!--[if lt IE 9]>
<script src="js/IE9.js"></script>
<script src="js/html5shiv.js"></script>
<script>
	document.createElement('main');
</script>
<![endif]-->


<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/custom.css">

<!-- プライバシーポリシー同意チェック -->
<script>
window.onpageshow = function(event) {
	var checkAgreement = document.getElementById('check');
	checkAgreement.checked = false;
};
function checkValue(check){
	var submitGo = document.getElementById('submit_go');

	if (check.checked) {
		submitGo.classList.remove("disabled");
		submitGo.removeAttribute("disabled");
	} else {
		submitGo.classList.add("disabled")
		submitGo.setAttribute("disabled", "disabled");
	}
}
</script>

<!-- 日付カレンダーIE対応 -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$( function() {
$( "#datepicker1,#datepicker2" ).datepicker( {
	dateFormat: 'yy年mm月dd日',
	monthNames: ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"],
});
} );
</script>
</head>
<body id="PAGETOP" class="<?php echo $bodyClass;?>">

<svg aria-hidden="true" style="display: none;" version="1.1" xmlns="http://www.w3.org/2000/svg">
	<defs>
		<filter id="filter_blur">
			<feGaussianBlur in="SourceGraphic" stdDeviation="2" result="blur" />
		</filter>

		<filter id="filter_monotone">
			<feColorMatrix type="saturate" values="0" />
		</filter>


		<symbol id="icon_sns_fb" viewBox="0 0 32 32">
			<path d="M32,16.1A16,16,0,1,0,13.5,31.9V20.72H9.44V16.1H13.5V12.57c0-4,2.39-6.22,6-6.22a24.77,24.77,0,0,1,3.58.31V10.6h-2a2.31,2.31,0,0,0-2.61,2.5v3h4.44l-.71,4.62H18.5V31.9A16,16,0,0,0,32,16.1Z"></path>
		</symbol>

		<symbol id="icon_sns_insta" viewbox="0 0 32 32">
			<path d="M16 2.88c4.28 0 4.787 0 6.467 0.093 1.071 0.014 2.091 0.213 3.035 0.567l-0.062-0.020c0.717 0.273 1.326 0.682 1.825 1.199l0.001 0.001c0.523 0.501 0.932 1.117 1.189 1.807l0.011 0.033c0.347 0.882 0.552 1.902 0.56 2.97l0 0.003c0.067 1.68 0.093 2.187 0.093 6.453s0 4.787-0.093 6.467c-0.008 1.071-0.213 2.092-0.58 3.031l0.020-0.058c-0.263 0.723-0.668 1.338-1.185 1.839l-0.001 0.001c-0.504 0.518-1.119 0.927-1.806 1.189l-0.034 0.011c-0.883 0.335-1.903 0.534-2.968 0.547l-0.005 0c-1.68 0.080-2.187 0.093-6.453 0.093s-4.787 0-6.467-0.093c-1.071-0.012-2.091-0.212-3.035-0.567l0.061 0.020c-0.721-0.273-1.336-0.682-1.839-1.199l-0.001-0.001c-0.518-0.504-0.927-1.119-1.189-1.806l-0.011-0.034c-0.334-0.878-0.533-1.894-0.547-2.954l-0-0.006c-0.080-1.693-0.093-2.2-0.093-6.467s0-4.787 0.093-6.467c0.014-1.071 0.213-2.091 0.567-3.035l-0.020 0.062c0.273-0.717 0.682-1.326 1.199-1.825l0.001-0.001c0.504-0.522 1.119-0.935 1.806-1.202l0.034-0.012c0.878-0.334 1.894-0.533 2.954-0.547l0.006-0c1.68 0 2.187-0.093 6.467-0.093zM16 0c-4.347 0-4.88 0-6.587 0.093-1.406 0.028-2.74 0.299-3.973 0.774l0.080-0.027c-1.116 0.414-2.069 1.036-2.853 1.826l-0.001 0.001c-0.791 0.784-1.413 1.737-1.809 2.8l-0.017 0.054c-0.445 1.149-0.716 2.478-0.746 3.867l-0 0.013c-0.093 1.72-0.093 2.253-0.093 6.6s0 4.893 0.093 6.667c0.029 1.401 0.3 2.731 0.774 3.96l-0.027-0.080c0.427 1.089 1.047 2.017 1.826 2.786l0.001 0.001c0.776 0.794 1.719 1.42 2.774 1.822l0.053 0.018c1.149 0.446 2.479 0.718 3.868 0.746l0.012 0c1.733 0.080 2.28 0.080 6.627 0.080s4.88 0 6.587-0.093c1.401-0.026 2.731-0.298 3.959-0.774l-0.079 0.027c2.162-0.84 3.84-2.518 4.661-4.625l0.019-0.055c0.44-1.129 0.711-2.434 0.746-3.798l0-0.015c0.107-1.773 0.107-2.307 0.107-6.667s0-4.893-0.093-6.6c-0.029-1.401-0.3-2.731-0.774-3.96l0.027 0.080c-0.398-1.122-1.023-2.077-1.825-2.851l-0.002-0.002c-0.787-0.786-1.739-1.408-2.799-1.809l-0.055-0.018c-1.13-0.435-2.436-0.701-3.8-0.733l-0.014-0c-1.773-0.107-2.32-0.107-6.667-0.107z"></path>
			<path d="M16 7.787c-4.543 0-8.227 3.683-8.227 8.227s3.683 8.227 8.227 8.227c4.543 0 8.227-3.683 8.227-8.227 0-0.005 0-0.009 0-0.014v0.001c0 0 0 0 0 0 0-4.536-3.677-8.213-8.213-8.213-0.005 0-0.009 0-0.014 0h0.001zM16 21.333c-2.946 0-5.333-2.388-5.333-5.333s2.388-5.333 5.333-5.333c2.946 0 5.333 2.388 5.333 5.333v0c0 2.946-2.388 5.333-5.333 5.333v0z"></path>
			<path d="M26.467 7.453c0 1.060-0.86 1.92-1.92 1.92s-1.92-0.86-1.92-1.92c0-1.060 0.86-1.92 1.92-1.92v0c0.004-0 0.009-0 0.013-0 1.053 0 1.907 0.854 1.907 1.907 0 0.005-0 0.009-0 0.014v-0.001z"></path>
		</symbol>

		<symbol id="icon_sns_tw" viewbox="0 0 32 32">
			<path d="M31.693 6.267c-1.075 0.49-2.323 0.847-3.631 1.007l-0.062 0.006c1.325-0.812 2.322-2.047 2.813-3.514l0.013-0.046c-1.177 0.731-2.547 1.29-4.010 1.599l-0.083 0.015c-1.178-1.251-2.845-2.030-4.694-2.030-3.539 0-6.412 2.855-6.44 6.388l-0 0.003c-0 0.011-0 0.024-0 0.037 0 0.503 0.063 0.991 0.182 1.457l-0.009-0.041c-5.355-0.257-10.072-2.785-13.242-6.635l-0.025-0.031c-0.539 0.919-0.858 2.025-0.858 3.205 0 2.211 1.119 4.161 2.822 5.314l0.023 0.014c-1.076-0.032-2.078-0.325-2.952-0.817l0.032 0.017v0.080c-0 0.018-0 0.038-0 0.059 0 3.109 2.202 5.703 5.132 6.307l0.042 0.007c-0.511 0.144-1.097 0.227-1.702 0.227-0.001 0-0.003 0-0.004 0h0c-0.454-0.047-0.867-0.126-1.265-0.239l0.052 0.012c0.854 2.572 3.212 4.406 6.006 4.467l0.007 0c-2.166 1.72-4.941 2.76-7.958 2.76-0.015 0-0.029-0-0.044-0h0.002c-0.017 0-0.038 0-0.058 0-0.525 0-1.041-0.034-1.548-0.1l0.060 0.006c2.777 1.814 6.178 2.893 9.831 2.893 0.017 0 0.035-0 0.052-0h-0.003c0.040 0 0.087 0 0.133 0 10.044 0 18.187-8.142 18.187-18.187 0-0.028-0-0.057-0-0.085l0 0.004c0-0.28 0-0.56 0-0.827 1.264-0.923 2.33-2.027 3.184-3.287l0.030-0.046z"></path>
		</symbol>



		<symbol id="icon_close" viewbox="0 0 32 32">
			<path d="M25.24 8.64l-1.88-1.88-7.36 7.36-7.36-7.36-1.88 1.88 7.36 7.36-7.36 7.36 1.88 1.88 7.36-7.36 7.36 7.36 1.88-1.88-7.36-7.36 7.36-7.36z"></path>
		</symbol>

		<symbol id="icon_plus" viewbox="0 0 32 32">
			<path d="M25.333 14.667h-8v-8h-2.667v8h-8v2.667h8v8h2.667v-8h8v-2.667z"></path>
		</symbol>

		<symbol id="icon_minus" viewbox="0 0 32 32">
			<path d="M6.667 14.667h18.667v2.667h-18.667v-2.667z"></path>
		</symbol>

		<symbol id="icon_mail" viewbox="0 0 32 32">
			<path d="M29.333 5.333h-26.667v21.333h26.667zM26.667 24h-21.333v-13.333l10.667 6.667 10.667-6.667zM16 14.667l-10.667-6.667h21.333z"></path>
		</symbol>

		<symbol id="icon_mail_nega" viewbox="0 0 32 32">
			<path d="M29.333 5.333h-26.667v21.333h26.667zM26.667 10.667l-10.667 6.667-10.667-6.667v-2.667l10.667 6.667 10.667-6.667z"></path>
		</symbol>

		<symbol id="icon_phone" viewbox="0 0 32 32">
			<path d="M25.64 20.347l-3.387-0.347c-0.091-0.011-0.197-0.017-0.305-0.017-0.735 0-1.4 0.297-1.882 0.778l-2.453 2.453c-3.805-1.959-6.828-4.982-8.734-8.675l-0.052-0.112 2.467-2.52c0.452-0.477 0.73-1.123 0.73-1.833 0-0.125-0.009-0.247-0.025-0.367l0.002 0.014-0.333-3.36c-0.159-1.335-1.284-2.36-2.649-2.36-0.002 0-0.003 0-0.005 0h-3.68c-0.736 0-1.333 0.597-1.333 1.333v0c0 12.518 10.148 22.667 22.667 22.667v0c0.736 0 1.333-0.597 1.333-1.333v0-3.68c-0.005-1.361-1.028-2.481-2.347-2.639l-0.013-0.001z"></path>
		</symbol>
		
		<symbol id="icon_doc" viewbox="0 0 32 32">
			<path d="M17.52 3.613h-11.84v24.773h20.64v-16zM17.973 7.84l4.133 4.16h-4.133zM8.347 25.72v-19.44h7.653v7.693h7.68v11.747z"></path>
		</symbol>

		<symbol id="icon_blank" viewbox="0 0 32 32">
			<path d="M22.093 24.76h-14.853v-14.853h7.427v-2.667h-10.093v20.187h20.187v-10.093h-2.667v7.427z"></path>
			<path d="M17.787 4.573v2.667h5.093l-9.16 9.147 1.893 1.893 9.147-9.16v5.093h2.667v-9.64h-9.64z"></path>
		</symbol>

		<symbol id="icon_dl" viewbox="0 0 32 32">
			<path d="M24 18.653v5.333h-16v-5.333h-2.667v8h21.333v-8h-2.667z"></path>
			<path d="M22.813 13.28l-1.88-1.893-3.6 3.6v-8.307h-2.667v8.307l-3.6-3.6-1.88 1.893 6.813 6.813 6.813-6.813z"></path>
		</symbol>

		<symbol id="icon_search" viewbox="0 0 32 32">
			<path d="M20.667 18.667h-1.053l-0.373-0.36c1.301-1.509 2.093-3.489 2.093-5.653 0-4.794-3.886-8.68-8.68-8.68s-8.68 3.886-8.68 8.68c0 4.794 3.886 8.68 8.68 8.68 2.165 0 4.144-0.792 5.665-2.103l-0.011 0.009 0.36 0.373v1.053l6.667 6.667 1.987-2zM12.667 18.667c-3.314 0-6-2.686-6-6s2.686-6 6-6c3.314 0 6 2.686 6 6v0c0 0.004 0 0.009 0 0.013 0 3.306-2.68 5.987-5.987 5.987-0.005 0-0.009 0-0.014-0h0.001z"></path>
		</symbol>

		<symbol id="icon_cart" viewbox="0 0 32 32">
			<path d="M22.067 17.333c0.007 0 0.015 0 0.024 0 0.982 0 1.84-0.531 2.303-1.321l0.007-0.013 4.773-8.653c0.117-0.194 0.187-0.429 0.187-0.68 0-0.736-0.597-1.333-1.333-1.333-0.009 0-0.019 0-0.028 0l0.001-0h-19.72l-1.253-2.667h-4.36v2.667h2.667l4.8 10.12-1.8 3.213c-0.225 0.383-0.357 0.842-0.357 1.333 0 1.473 1.194 2.667 2.667 2.667 0.008 0 0.017-0 0.025-0h15.999v-2.667h-16l1.467-2.667zM9.547 8h16.2l-3.68 6.667h-9.333zM10.667 24c-1.473 0-2.667 1.194-2.667 2.667s1.194 2.667 2.667 2.667c1.473 0 2.667-1.194 2.667-2.667v0c0-1.473-1.194-2.667-2.667-2.667v0zM24 24c-1.473 0-2.667 1.194-2.667 2.667s1.194 2.667 2.667 2.667c1.473 0 2.667-1.194 2.667-2.667v0c0-1.473-1.194-2.667-2.667-2.667v0z"></path>
		</symbol>

		<symbol id="icon_calendar" viewbox="0 0 32 32">
			<path d="M29.333 4h-4v-2.667h-2.667v2.667h-13.333v-2.667h-2.667v2.667h-4v26.667h26.667zM26.667 28h-21.333v-17.333h21.333z"></path>
		</symbol>

		<symbol id="icon_pin" viewbox="0 0 32 32">
			<path d="M16 3.24c-5.25 0-9.507 4.256-9.507 9.507v0c0.037 1.715 0.487 3.317 1.254 4.721l-0.027-0.054c2.718 4.294 5.445 7.997 8.404 11.497l-0.124-0.151c2.835-3.35 5.562-7.053 8.034-10.934l0.246-0.413c0.74-1.35 1.19-2.952 1.226-4.655l0-0.011c0-5.25-4.256-9.507-9.507-9.507v0zM16 15.907c-0.004 0-0.009 0-0.013 0-1.745 0-3.16-1.415-3.16-3.16s1.415-3.16 3.16-3.16c1.745 0 3.16 1.415 3.16 3.16v0c0 0 0 0 0 0 0 1.741-1.407 3.152-3.146 3.16h-0.001z"></path>
		</symbol>



		<symbol id="arrow_right" viewbox="0 0 32 32">
			<path d="M12.28 26.28l-1.893-1.893 8.4-8.387-8.4-8.387 1.893-1.893 10.267 10.28-10.267 10.28z"></path>
		</symbol>

		<symbol id="arrow_right_w" viewbox="0 0 32 32">
			<path d="M7.947 26.28l-1.88-1.893 8.387-8.387-8.387-8.387 1.88-1.893 10.28 10.28-10.28 10.28z"></path>
			<path d="M16.6 26.28l-1.88-1.893 8.387-8.387-8.387-8.387 1.88-1.893 10.28 10.28-10.28 10.28z"></path>
		</symbol>

		<symbol id="arrow_right_line" viewbox="0 0 32 32">
			<path d="M17.040 5.72l-1.893 1.893 7.067 7.053h-15.64v2.667h15.64l-7.067 7.053 1.893 1.893 10.267-10.28-10.267-10.28z"></path>
		</symbol>

		<symbol id="arrow_right_large1" viewbox="0 0 32 32">
			<path d="M9.176 30.488l-0.56-0.568 13.92-13.92-13.92-13.92 0.56-0.568 14.496 14.488-14.496 14.488z"></path>
		</symbol>

		<symbol id="arrow_right_large2" viewbox="0 0 32 32">
			<path d="M9.464 30.768l-1.136-1.128 13.64-13.64-13.64-13.64 1.136-1.128 14.768 14.768-14.768 14.768z"></path>
		</symbol>

		<symbol id="arrow_right_large3" viewbox="0 0 32 32">
			<path d="M9.232 31.336l-2.264-2.264 13.072-13.072-13.072-13.072 2.264-2.264 15.336 15.336-15.336 15.336z"></path>
		</symbol>



		<symbol id="arrow_left" viewbox="0 0 32 32">
			<path d="M19.72 26.28l-10.267-10.28 10.267-10.28 1.893 1.893-8.4 8.387 8.4 8.387-1.893 1.893z"></path>
		</symbol>

		<symbol id="arrow_left_w" viewbox="0 0 32 32">
			<path d="M24.053 26.28l-10.28-10.28 10.28-10.28 1.88 1.893-8.387 8.387 8.387 8.387-1.88 1.893z"></path>
			<path d="M15.4 26.28l-10.28-10.28 10.28-10.28 1.88 1.893-8.387 8.387 8.387 8.387-1.88 1.893z"></path>
		</symbol>

		<symbol id="arrow_left_line" viewbox="0 0 32 32">
			<path d="M25.427 14.667h-15.64l7.067-7.053-1.893-1.893-10.267 10.28 10.267 10.28 1.893-1.893-7.067-7.053h15.64v-2.667z"></path>
		</symbol>

		<symbol id="arrow_left_large1" viewbox="0 0 32 32">
			<path d="M22.816 30.488l-14.488-14.488 14.488-14.488 0.568 0.568-13.92 13.92 13.92 13.92-0.568 0.568z"></path>
		</symbol>

		<symbol id="arrow_left_large2" viewbox="0 0 32 32">
			<path d="M22.536 30.768l-14.768-14.768 14.768-14.768 1.136 1.128-13.64 13.64 13.64 13.64-1.136 1.128z"></path>
		</symbol>

		<symbol id="arrow_left_large3" viewbox="0 0 32 32">
			<path d="M22.768 31.336l-15.336-15.336 15.336-15.336 2.264 2.264-13.072 13.072 13.072 13.072-2.264 2.264z"></path>
		</symbol>



		<symbol id="arrow_up" viewbox="0 0 32 32">
			<path d="M24.387 21.613l-8.387-8.4-8.387 8.4-1.893-1.893 10.28-10.267 10.28 10.267-1.893 1.893z"></path>
		</symbol>

		<symbol id="arrow_up_line" viewbox="0 0 32 32">
			<path d="M26.28 14.96l-10.28-10.267-10.28 10.267 1.893 1.893 7.053-7.067v15.64h2.667v-15.64l7.053 7.067 1.893-1.893z"></path>
		</symbol>

		<symbol id="arrow_up_large1" viewbox="0 0 53 32">
			<path d="M49.867 28.307l-23.2-23.2-23.2 23.2-0.947-0.947 24.147-24.147 24.147 24.147-0.947 0.947z"></path>
		</symbol>

		<symbol id="arrow_up_large2" viewbox="0 0 53 32">
			<path d="M49.4 28.787l-22.733-22.733-22.733 22.733-1.893-1.893 24.627-24.613 24.627 24.613-1.893 1.893z"></path>
		</symbol>

		<symbol id="arrow_up_large3" viewbox="0 0 53 32">
			<path d="M48.453 31.053l-21.787-21.787-21.787 21.787-3.773-3.773 25.56-25.56 25.56 25.56-3.773 3.773z"></path>
		</symbol>



		<symbol id="arrow_down" viewbox="0 0 32 32">
			<path d="M16 22.547l-10.28-10.267 1.893-1.893 8.387 8.4 8.387-8.4 1.893 1.893-10.28 10.267z"></path>
		</symbol>

		<symbol id="arrow_line_down" viewbox="0 0 32 32">
			<path d="M24.387 15.147l-7.053 7.067v-15.64h-2.667v15.64l-7.053-7.067-1.893 1.893 10.28 10.267 10.28-10.267-1.893-1.893z"></path>
		</symbol>

		<symbol id="arrow_down_large1" viewbox="0 0 53 32">
			<path d="M26.667 28.787l-24.147-24.147 0.947-0.947 23.2 23.2 23.2-23.2 0.947 0.947-24.147 24.147z"></path>
		</symbol>

		<symbol id="arrow_down_large2" viewbox="0 0 53 32">
			<path d="M26.667 29.72l-24.627-24.613 1.893-1.88 22.733 22.72 22.733-22.72 1.893 1.88-24.627 24.613z"></path>
		</symbol>

		<symbol id="arrow_down_large3" viewbox="0 0 53 32">
			<path d="M26.667 30.28l-25.56-25.56 3.773-3.773 21.787 21.787 21.787-21.787 3.773 3.773-25.56 25.56z"></path>
		</symbol>



		<symbol id="arrow_bottom" viewbox="0 0 14 30">
			<path d="m0,0h6v26h-1v-1h-1v-1h-1v-1h-1v-1h-2zm8,0h6v22h-2v1h-1v1h-1v1h-1v1h-1zm-5,21h-1v1h1zm9,0h-1v1h1zm-7,2h-1v1h1zm5,0h-1v1h1zm-10,1h1v1h1v1h1v1h1v1h1v1h1v1h-6zm13,0h1v6h-6v-1h1v-1h1v-1h1v-1h1v-1h1zm-11,2h-1v1h1zm11,0h-1v1h1zm-9,2h-1v1h1zm7,0h-1v1h1z" opacity="0"/>
			<path d="m6,0h2v26h1v-1h1v-1h1v-1h1v-1h2v2h-1v1h-1v1h-1v1h-1v1h-1v1h-1v1h-2v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1v-2h2v1h1v1h1v1h1v1h1z"/>
			<path d="m2,21h1v1h-1zm9,0h1v1h-1zm-7,2h1v1h-1zm5,0h1v1h-1zm-8,3h1v1h-1zm11,0h1v1h-1zm-9,2h1v1h-1zm7,0h1v1h-1z" fill="#aaa" opacity="0"/>
		</symbol>
		
		<symbol id="arrow_top" viewbox="0 0 14 30">
			<path d="m0 0h6v1h-1v1h-1v1h-1v1h-1v1h-1v1h-1zm4 1h-1v1h1zm4-1h6v6h-1v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1zm3 1h-1v1h1zm-9 2h-1v1h1zm11 0h-1v1h1zm-8 1h1v26h-6v-22h2v-1h1v-1h1v-1h1zm3 0h1v1h1v1h1v1h1v1h2v22h-6zm-3 2h-1v1h1zm5 0h-1v1h1zm-7 2h-1v1h1zm9 0h-1v1h1z" opacity="0"/>
			<path d="m6 0h2v1h1v1h1v1h1v1h1v1h1v1h1v2h-2v-1h-1v-1h-1v-1h-1v-1h-1v26h-2v-26h-1v1h-1v1h-1v1h-1v1h-2v-2h1v-1h1v-1h1v-1h1v-1h1v-1h1z"/>
			<path d="m3 1h1v1h-1zm7 0h1v1h-1zm-9 2h1v1h-1zm11 0h1v1h-1zm-8 3h1v1h-1zm5 0h1v1h-1zm-7 2h1v1h-1zm9 0h1v1h-1z" fill="#aaa" opacity="0"/>
		</symbol>
		
		<symbol id="arrow_btn" viewbox="0 0 30 8">
			<path d="m0 0h19v1h1v-1h1v1h1v1h1v1h1v1h1v1h1v1h-26zm24 0h6v6h-1v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1zm3 1h-1v1h1zm-5 1h-1v1h1zm7 1h-1v1h1z" opacity="0"/>
			<path d="m19 0h1v1h-1zm7 1h1v1h-1zm-5 1h1v1h-1z" fill="#aaa" opacity="0"/>
			<path d="m21 0h3v1h1v1h1v1h1v1h1v1h1v1h1v2h-30v-2h26v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1z"/>
			<path d="m28 3h1v1h-1z" opacity="0"/>
		</symbol>
		
		<symbol id="arrow_link" viewbox="0 0 120 14">
			<path d="m0,0h106v2h1v1h1v1h1v1h1v1h1v1h1v1h1v1h1v1h1v1h1v1h-116zm108,0h12v12h-1v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1z" opacity="0"/>
			<path d="m106,0h2v1h1v1h1v1h1v1h1v1h1v1h1v1h1v1h1v1h1v1h1v1h1v1h1v2h-120v-2h116v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1v-1h-1z"/>
		</symbol>
	</defs>
</svg>

<div id="loader-wrapper"><div id="loader"></div></div>
<div class="scrollup"><img src="images/arrow_up.png"></div>
<main>
	
		
<?php
	if (!empty($_SESSION["error"])) :
?>
	<div class="pg2-hader">
		<header>
			<div class="header_content">
				<div class="Logo">
					<a href="http://www.chikyu-jin.com/"><img src="images/top_logo.svg" alt="logo">
					</a>
				</div>
				<div class="h_content_right">
				</div>				
			</div>
		</header>
	</div>
<?php endif; ?>
<?php	if (empty($_SESSION["error"])) : ?>  
    <div class="banner_section">
      	<header>
			<div class="header_content">
				<div class="Logo">
					<a href="http://www.chikyu-jin.com/"><img src="images/top_logo.svg" alt="logo"></a>
				</div>
				<div class="h_content_right">
				</div>				
			</div>
		</header>
      	<div class="banner_content">
          <h1>まずは地球人倶楽部を<br>味わってみませんか?</h1><br/>
      	</div>
	</div>
  	
	<div class="main_content">	
		<div class="arrow_down">
        	<img src="images/arrow_down.svg" alt="arrow_down">
      	</div>
		
		<div class="section_title">
        	<h2>おいしさ色々お試し<br class="sp">パック</h2>
      	</div>	

      	<div class="first_content_sec io fade upS">
        	<div class="price_area_section">
          		<div class="price_area">
            		<p>6,480円(税込)<br/>相当が</p>
          		</div>
          		<div class="price_rate">
            		<h1>3,240</h1>
          		</div>
				<div class="price_rate_sub">
					<p>(税込)</p>
					<h2>円</h2>
				</div>
				<div class="offer">
					半額<h2>50%</h2>OFF
				</div>
        	</div>
			<ul>
			  <li class="price_area"></li>
			  <li class="price_rate"></li>
			  <li class="price_rate_sub"></li>
			  <li> </li>
			</ul>
      	</div>
			
		<div class="product1_section io fade upS">
			<div class="parallelogram">
				<div class="productimg_wrap">
					<img src="images/product1.png">
					<div class="deliveryfree_text">配送料無料
					</div>
				</div>
				<div class="parallelogram_content">
					<div class="delivery">
						<p>〈お届けの内容〉</p><br/>
						<div class="delivery_list1">
							<ul>
								<li>季節のお野菜少量いろいろ7-8種類<span>旬一番のおいしさを葉物果菜根菜類と幅広く。</span></li>
								<li>比叡ゆば八「本さしみ湯葉」<span>比叡山延暦寺御用達。大豆の甘さ際立つとろり 柔らかなお刺身湯葉。</span></li>
								<li>洋風デリカ ストック可能な「特製 賛沢ラザニア」▼冷凍<span>イタリアンのリストランテに依頼した、ソースから手造りの人気の味わい。レンジで簡単調理ができます</span></li>
								<li>漁場・天然にこだわり「沖獲り紅鮭　甘口切身」２切▼冷凍<span>紅鮭の中でも極上品と呼ばれる北洋産。厳選のおいしさが定番です。</span></li>                                      
							</ul>
						</div>
						<div class="delivery_list2">
							<ul>
								<li>無添加ビストロソーセージ(太)2本入<span>原料の豚肉を育てるところからはじまる<br class="pc">一切の合成添加物を使用しない本格腸詰。</span></li>
								<li>動物福祉卵「エコッコ」6個<span>日本ではじめて動物福祉 (Animal Welfare)の考えに基づいて育てた健康な鶏のたまご。</span></li>
								<li>特別栽培 飛騨こしひかりプレミアム 300g(2合)<span>最も権威あるお米コンクールで11回「金賞」受賞土壌分析 残留農薬234項目検査 0.01ppm未満不検出</span></li>
							</ul>
							<div class="alergy">
								<span>アレルギー等でお召し上がりになれないものがある場合は、ご相談の上、お好みのものと差し替え致します。ご遠慮なくお申し出くださいませ。</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

  		
		<div class="clearboth"></div><br/>
		
      	<div class="product1_button hvr-icon-wobble-horizontal">
        	<a href="#application">申し込みフォームへ<svg class="arrow_btn"><use xlink:href="#arrow_btn"></use></svg></a>
     	</div>
		
		<div class="arrow_down">
			<img src="images/arrow_down.svg" alt="arrow_down">
		</div>

    
		<div class="philosphy_sec io fade upS">
			<div class="section_title">
				<h2>Philosophy</h2>
			</div>
			<div class="philosphy_content">
				<div class="philosphy_r">
					<div class="philosphy_c1">
						<div class="philosphy_icon">
							<img src="images/image1.svg" alt="image1">
						</div>
						<div class="philosphy_desc">
							<p>ー切の合成添加物、化学調味料を使用してい<span>ません。</span></p>
						</div>
					</div>
					<div class="philosphy_c2">
						<div class="philosphy_icon">
							<img src="images/image2.svg" alt="image2">
						</div>
						<div class="philosphy_desc">
							<p>産地厳選、漁場厳選。<br>卜レサビリティ一の確かな原料を使用します。</p>
						</div>
					</div>
				</div>
				<div class="philosphy_r">
					<div class="philosphy_c1">
						<div class="philosphy_icon">
						<img src="images/image3.svg" alt="image3">
						</div>
						<div class="philosphy_desc">
						<p>遺伝子組み換え原料は使用していません</p>
						</div>
					</div>
					<div class="philosphy_c2">
						<div class="philosphy_icon">
							<img src="images/image4.svg" alt="image4">
						</div>
						<div class="philosphy_desc">
							<p>食べ物を無駄にしない(フードロス撲滅)のために、受注した数だけの製造が基本です。</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="arrow_down">
			<img src="images/arrow_down.svg" alt="arrow_down">
		</div>

		<div class="container_custom">
			<div class="membership_sec io fade upS">
				<div class="section_title_big">
					<h2>地球人倶楽部の<br class="sp">会員制宅配システム</h2>
					<p>あらゆる方をサポートしたい地球人倶楽部はシステムも商品も快適さが自慢です。</p>
				</div>
				<div class="membership_box">
					<div class="box1">
						<h4>欲しいものをご自由に</h4>
						<p>りんごは1個、お豆腐は半丁、お刺身は1人前からご用意しています。2,000を超える商品の中から、お好きなものをフルチョイス。お任せの方にはパックも用意。</p>
					</div>
					<div class="box2">
						<h4>忙しい方もご安心下さい<br>あなたの為にサポートします</h4>
						<p>お帰りが遅い方、急なお出かけでもご心配なく。そんな時はご連絡下さい。クーラーボックスでご不在置き対応。美味しい食材がお帰りを待</p>
					</div>
					<div class="box1">
						<h4>地球人倶楽部は<br class="pc">あなたのコンシェルジュ</h4>
						<p>会員様専属のスタッフが特注商品やギフトのご相談も承ります。 ご相談もお気軽に。</p>
					</div>
				</div>
			</div>

			<div class="clearboth">
			</div>          

			<div class="product1_button hvr-icon-wobble-horizontal">
			  <a href="#application">申し込みフォームへ<svg class="arrow_btn"><use xlink:href="#arrow_btn"></use></svg></a>
			</div>

			<div class="arrow_down">
			  <img src="images/arrow_down.svg" alt="arrow_down">
			</div>

			<div class="section_title_big">
				<h2>生活まるごと地球人<span class="sp"></span>倶楽部</h2>
				<p>地球人倶楽部には、2000を超す食品やエコロジカルな生活雑貨がいっぱい。日本各地の郷土料理から世界の伝統食まで。毎日がもっと楽しくなる。</p>
			</div>

			<div class="sp" style="height: 210px; float: left;">
				<p>&nbsp;</p>
			</div> 

			<div class="product2_section io fade upS">
				<div class="product2_wrap">
					<div class="product2_skew">
						<img src="images/product2.png" alt="product2" class="res_veg">
						<div class="product2_section_content">
							<div class="vegitables_title">
								<div class="veg_value">
									<p>01</p>
								</div>
								<div class="veg_title">
									<h5>野菜<span>Vegetable</span></h5>
								</div>
							</div>
							<div class="vegitables_title_sub">
								<h2>健康な土から<br class="sp">生まれた野菜</h2>
							</div>
							<div class="vegitables_title_sub_desc">
								<p>力強く、生命カのある野菜たちは、生きた健康な土から生まれます。単に農薬を使っていない、化学肥料を使っていないということではなく土の中に生きる目に見えない微生物たちと農家の皆さんが一緒に育てる、持続可能な農業です。そうして育った野菜たちは、なんとも深い味わいと、心地よい香りで私たちの舌を楽しませてくれます。</p>
							</div> 
						</div>
					</div>
				</div>
			</div>

			<div class="product3_section io fade upS">
				<div class="product2_wrap">
					<div class="product3_skew">
						<img src="images/product3.png" alt="product3" class="res_rice">
						<div class="product3_section_content">
							<div class="vegitables_title">
								<div class="veg_value">
									<p>02</p>
								</div>
								<div class="veg_title">
									<h5>お米<span>Rice</span></h5>
								</div>
							</div>
							<div class="vegitables_title_sub">
								<h2>自慢のお米は<span class="sp"></span>西から東</h2>
							</div>
							<div class="vegitables_title_sub_desc">
							<p>熊本の50年にわたる自然栽培「ヒノヒカリ」。島根からは西の横綱「仁多のコシヒカリ」。美しい水が育んだ「飛騨こしひかり」に米どころ庄内の「有機つや姫]などなど。栽培と食味にこだわった自慢のお米。</p>  
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="product2_section io fade upS">
				<div class="product2_wrap">
					<div class="product2_skew">
						<img src="images/product4.png" alt="product4" class="res_bread">
						<div class="product2_section_content">
							<div class="vegitables_title">
								<div class="veg_value">
									<p>03</p>
								</div>
								<div class="veg_title">
									<h5>パン<span>Bread</span></h5>
								</div>
							</div>
							<div class="vegitables_title_sub">
								<h2>小麦の味と香りを<br class="sp">楽しむ</h2>
							</div>
							<div class="vegitables_title_sub_desc">
								<p>石臼で挽いた小麦のパンは、焼いた時の香りが違う。使用するのはオーガニックのナッツやドライフルーツ。油脂や砂糖を加えずに作ったパンなど。個性いろいろを楽しみたい。</p>
							</div> 
						</div>
					</div>
				</div>
			</div>
			<div class="product3_section io fade upS">
				<div class="product2_wrap">
					<div class="product3_skew">
						<img src="images/product5.png" alt="product3" class="res_meat">
						<div class="product3_section_content">
							<div class="vegitables_title">
								<div class="veg_value">
									<p>04</p>
								</div>
								<div class="veg_title">
									<h5>肉製品<span>Meat product</span></h5>
								</div>
							</div>
							<div class="vegitables_title_sub">
								<h2>大切に育て、<br class="sp">ていねいに<br class="pc"/>仕込む</h2>
							</div>
							<div class="vegitables_title_sub_desc">
								<p>良質なエサと一頭一頭の健康管理を徹底したお肉は様々なスライスとブロックで。特注も承ります。自慢のハム・ソーセージは一切の合成添加物を使用せず、桜の新で煙して作ります。</p>  
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="product2_section io fade upS">
				<div class="product2_wrap">
					<div class="product2_skew">
						<img src="images/product6.png" alt="product6" class="res_beauty">
						<div class="product2_section_content">
							<div class="vegitables_title">
								<div class="veg_value">
									<p>05</p>
								</div>
								<div class="veg_title">
									<h5>化粧品<span>Beauty</span></h5>
								</div>
							</div>
							<div class="vegitables_title_sub">
								<h2>いつまでも美しく<br class="sp">ありたい</h2>
							</div>
							<div class="vegitables_title_sub_desc">
								<p>デリケートなお肌の方も、より積極的なケアしたい方も。肌に有害と言われる合成添加物や合成深媒を用いない基礎化粧品をご用意。しっかり実感してみてください。</p>
							</div> 
						</div>
					</div>
				</div>
			</div>
			<div class="product3_section io fade upS">
				<div class="product2_wrap">
					<div class="product3_skew">
						<img src="images/product7.png" alt="product3" class="res_sup">
						<div class="product3_section_content">
							<div class="vegitables_title">
								<div class="veg_value">
									<p>06</p>
								</div>
								<div class="veg_title">
									<h5>雑貨<span>Deaily Supplies</span></h5>
								</div>
							</div>
							<div class="vegitables_title_sub">
								<h2>心地よく快適な<span class="sp"></span>毎日のために</h2>		
							</div>
							<div class="vegitables_title_sub_desc">
								<p>合成香料を使用せず、排水後もいち早く自然に融る洗剤。植物性100%の除菌抗菌剤やサージカルマスク。生活に必要な紙製品まで。快適な毎日に必要なものを常にご用意しています。</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="product2_section io fade upS">
				<div class="product2_wrap">
					<div class="product2_skew">
						<img src="images/product8.png" alt="product8" class="res_delica">
						<div class="product2_section_content">
							<div class="vegitables_title">
								<div class="veg_value">
									<p>07</p>
								</div>
							<div class="veg_title">
								<h5>デリカ<span>Delica Foods</span></h5>
							</div>
						</div>
						<div class="vegitables_title_sub">
							<h2>すぐにいただける<br class="sp">手造りのデリ</h2>
						</div>
						<div class="vegitables_title_sub_desc">
							<p>ご注文の数にあわせて毎日作るデリカは、毎週たっぷり20種類。原材料の産地から厳選し、化学調味料はもちろん、一切の合成添加物を使用しない調味料や原材料で作ります。お料理がちょっぴり大変になったシニアの方や、お忙しい時にも大活躍!その他、温めるだけ、解凍するだけ、炒めるだけ、焼くだけ、揚げるだけ等の半調理品の助っ人もたっぷりご用意。ご家族に自慢できる味わいです!</p>
						</div> 
					</div>
				</div>
			</div>
			</div>
			<div class="product3_section io fade upS">
				<div class="product2_wrap">
					<div class="product3_skew">
						<img src="images/kaisanbutu.png" alt="product3" class="res_fish">
						<div class="product3_section_content">
							<div class="vegitables_title">
								<div class="veg_value">
									<p>08</p>
								</div>
								<div class="veg_title">
									<h5>鮮魚<span>Fresh fish</span></h5>
								</div>
							</div>
							<div class="vegitables_title_sub">
								<h2>魚好きを唸らせる</h2>
							</div>
							<div class="vegitables_title_sub_desc">
								<p>お届け日の早朝にご注文の数だけ作るお刺身は、この道50年の魚屋の大将の目利きです。刺身ばかりか、ハモやメヌケ、マトウダイに時しらず・・・。海の旬も満喫です</p>  
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="product2_section io fade upS">
				<div class="product2_wrap">
					<div class="product2_skew">
						<img src="images/product10.png" alt="product8" class="res_daily">
						<div class="product2_section_content">
							<div class="vegitables_title">
								<div class="veg_value">
									<p>09</p>
								</div>
								<div class="veg_title">
									<h5>日配品<span>Daily</span></h5>
								</div>
							</div>
							<div class="vegitables_title_sub">
								<h2>毎日食べる<br class="sp">おいしさも</h2>
							</div>
							<div class="vegitables_title_sub_desc">
								<p>動物福祉(Animal Welfare)の考えに則った飼育環境と安全なエサで育まれた卵や牛乳。遺伝子組み換えナシの国産大豆で作られた豆腐や納豆も生産者の信念に裏打ちされた骨太品。</p>
							</div> 
						</div>
					</div>
				</div>
			</div>
			<div class="product3_section io fade upS">
				<div class="product2_wrap">
					<div class="product3_skew">
						<img src="images/yoshigaki04.png" alt="product3" class="res_flower">
						<div class="product3_section_content">
							<div class="vegitables_title">
								<div class="veg_value">
									<p>10</p>
								</div>
								<div class="veg_title">
									<h5>オーガニックフラワー<span>Organic Flower</span></h5>
								</div>
							</div>
							<div class="vegitables_title_sub">
								<h2>美しい花のある<br class="sp">暮らし</h2>
							</div>
							<div class="vegitables_title_sub_desc">
								<p>花栽培にはつきものの農薬を一切排除し、土を活かして育む精気溢れる四季の花。育種にも取り組む日本有数の生産者とともに、毎日の生活に稼りをお届けします。</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="product2_section io fade upS">
				<div class="product2_wrap">
					<div class="product2_skew">
						<img src="images/product12.png" alt="product8" class="res_swas">
						<div class="product2_section_content">
							<div class="vegitables_title">
								<div class="veg_value">
									<p>11</p>
								</div>
								<div class="veg_title">
									<h5>調味料<span>Swasoning</span></h5>
								</div>
							</div>
							<div class="vegitables_title_sub">
								<h2>おいしさの<br class="sp">決め手は<br class="sp">この調味料</h2>
							</div>
							<div class="vegitables_title_sub_desc">
								<p>毎日使う基本調味料こそ、時間をかけ、職人の技で作られたものを使いたい。伝統に育まれた世界中のおいしさが料理の味をぐぐっとアップ。</p>
							</div> 
						</div>
					</div>
				</div>
			</div>

			<div class="clearboth">
			</div>

			<div class="arrow_down">
				<img src="images/arrow_down.svg" alt="arrow_down">
			</div>

			<div class="interview_sec">
				<div class="section_title">
					<h2>お客様の声</h2>
					<p>Interview</p>
				</div>
				<div class="interview_profile">
					<div id="to_profile1" class="interview_profile_image">
						<div class="profile_image_side">
							<img src="images/customer1.jpg" alt="mdm">
						</div>
						<div class="profile_image_content">
							<p class="profile_name">つつい ともみ（脚本家・作家）</p>
							<p id="profile_detail1" class="profile_name_detail">テレビや映画の脚本家として、キネマ旬報脚本賞、日本アカデミー賞最優秀脚本賞、向田邦子賞など数々の受賞歴を持つ。主なＴＶ作品に「小石川の家」「センセイの鞄」他、映画では、「それから」「失楽園」「阿修羅のごとく」など。小説「月影の市」「女優」、エッセイ「食べる女」「おいしい庭」「着る女」ほか、著書も多数。現在、東京藝術大学大学院映像研究科教授。</p>
						</div>
					</div>
					<div class="interview_content hvr-icon-wobble-horizontal">
						<p>私は決して贅沢ではないが、細胞に入れるものだけは妥協したくないと思っている。見るもの、聴くもの、嗅ぐもの、触れるもの、そして食すもの。とりわけ食すものには五感のすべてが含まれているから大切だ。地球人倶楽部のメンバーになってもう20年。ここが扱っている商品はどれも、誰かが何処かで心を込めて作っているものばかりだ。ちゃんと美味しいものというのはやっぱり、心を込めて作らなくては出来上がらない。</p>
						<p><br></p>
					  <p>食材でも、料理でも。思いがこもっているから進歩もあるし工夫もある。</p>
					  <p id="interview_detail1" class="interview_content_detail">それでも自然が相手だから思いのままにならないこともある。そんな時には素直に感想を言うことにしている。流通が生産者からの一方通行ではなくし、相互関係でいたいからだ。地球人倶楽部は、そんな意見や感想を率直に受止め、生産者に伝えてくれる。そして、次からはもっと頑張るぞ！と、へこたれることがない。だからこっちもいっそう本気で、ちゃんと美味しいものに向き合おうと思う。いい関係だ。細胞に気持ちよい生活を送ろうと思っている私にとって、地球人倶楽部は良き仲間（パートナー）である。</p>
						<a id="show_profile1" href="#to_profile1">詳細を見る<svg class="arrow_btn"><use xlink:href="#arrow_btn"></use></svg></a>
					</div>
				</div>
			</div>
			<div class="interview_sec interview_sec2">
				<div class="interview_profile">
					<div id="to_profile2" class="interview_profile_image">
						<div class="profile_image_side">
							<img src="images/customer2.jpg" alt="mdm">
						</div>
						<div class="profile_image_content">
							<p  class="profile_name">ワタナベマキ（料理家）</p>
							<p id="profile_detail2" class="profile_name_detail">旬の素材をいかした、温かみのある料理や保存食などが得意。著書に「サルビア給食室のおいしいおべんとう手帖」（主婦と生活社）、「サルビア給食室の週末ストックと毎日のごはん」（主婦と生活社）。「サルビア給食室のドライフードレシピ」（アスペクト）、「サルビア給食室のストッおかず」（宝島社）等がある。</p>
						</div>
					</div>
					<div class="interview_content hvr-icon-wobble-horizontal interview_content2" >
						<p>地球人倶楽部さんの存在を知ったのは、先日「ストックおかず」という本を出版し、その時にたくさんの食材を提供していただいたのが最初の出会いです。本の中では実際に、生産者の方の畑をお伺いし、どのような野菜を育てているのかというお話をお聞きしました。</p>
						<p><br></p>
						<p>生産者の方を訪ねた撮影時、生産者の方と地球人倶楽部の方の関係が、とても仲がよくお互い、とても信頼し合っているのだなぁと感じました。その姿から、その信頼関係がおいしい野菜をつくり、販売するというとてもよい型になって現れてくる気がしました。 </p>

						<p id="interview_detail2" class="profile_name_detail">私は、「食」を職業にしているため、ひとつひとつの食材が、どのような土地で、どのような方が作っているのかということがとても気になります。料理は、素材ありきです。素材で、右にも左にも転びます。ですので、料理をする際は、時に素材選びには時間をかけて吟味をしています。料理は、素材ありきです。素材で、右にも左にも転びます。ですので、料理をする際は、時に素材選びには時間をかけて吟味をしています。</p>
						<a id="show_profile2" href="#to_profile2">詳細を見る<svg class="arrow_btn"><use xlink:href="#arrow_btn"></use></svg></a>
					</div>
				</div>
			</div>

			<div class="arrow_down">
			  <img src="images/arrow_down.svg" alt="arrow_down">
			</div>

			<div class="section_title_big">
				<h2>新型コロナウイルスへの<br class="sp">取り組み</h2>
			</div>
			<div class="measure_section io fade upS">
				<div class="Preventive_measures">
					<div class="corona_boxes">
						<div class="corona_box1">
							<h3>お客様担当者の予防対策</h3>
							<h4>マスク着用の徹底</h4>                            
							<p>会員の皆さまとお会いするお客様担当者は、必ずマスクを着用します</p>                            
							<h4>アルコール消毒の徹底</h4>                          		
							<p>お客様へお届けの前に都度、手のアルコール消毒、車内の消毒を徹底します。</p>
							<hr />
							<h3>物流センターでの予防対策</h3>
							<h4>マスク着用の徹底</h4>                         		                            
							<p>作業者および荷物の衛生対策として、作業に入る際はマスクの着用を徹底します。</p>
							<h4>アルコール消毒の徹底</h4>
							<p>作業開始前に、アルコール消毒をし、菌・ウィルスを持ち込むことのないよう徹底します</p>
							<hr/>
							<div class="corona_icon">
								<img src="images/cup.png">&nbsp;&nbsp;&nbsp;
								<img src="images/hand_wash.png">
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="arrow_down">
				<img src="images/arrow_down.svg" alt="arrow_down">
			</div>

			<div class="section_title">
				<h2>配送地区</h2>
			</div>

			<div class="clearboth">
			</div>

			<div class="Kanagawa_section io fade upS">
				<div class="tabs sp">
					<div class="tab">
						<input type="radio" id="rd1" name="rd" checked>
						<label class="tab-label" for="rd1">東京</label>
						<div class="tab-content">
							<div class="two_cols">
								<div class="left">
									<p>大田区</p>
									<p>品川区</p>
									<p>渋谷区</p>
									<p>新宿区</p>
									<p>世田谷区</p>
									<p>千代田区</p>
									<p>目黒区</p>
								</div>
								<div class="right">
									<p>港区(台場は除く)</p>
									<p>文京区</p>
									<p>中野区</p>
									<p>新宿区</p>
									<p>杉並区※</p>
									<p>豊島区※</p>
								</div>
							</div>
							<p class="note">※の地域は一部除く</p>
						</div>
					</div>
					<div class="tab">
						<input type="radio" id="rd2" name="rd">
						<label class="tab-label" for="rd2">神奈川</label>
						<div class="tab-content tab-content-end">
							<div class = "kanagawa_sp">
								<p class="title">横浜市</p>
								<div class="two_cols">
									<div class="left">
										<p>青葉区</p>
										<p>磯子区</p>
										<p>神奈川区</p>
										<p>金沢区</p>
										<p>港南区</p>
										<p>港北区</p>
										<p>栄区</p>
										<p>都筑区</p>
										<p>鶴見区</p>
									</div>
									<div class="right">
										<p>戸塚区</p>
										<p>中区</p>
										<p>西区</p>
										<p>保土ヶ谷区</p>
										<p>緑区</p>
										<p>南区</p>
										<p>泉区※</p>
										<p>瀬谷区※</p>
									</div>
								</div>
								<p class="title">川崎市</p>
								<div class="two_cols">
									<div class="left">
										<p>幸区</p>
										<p>中原区</p>
										<p>高津区</p>
									</div>
									<div class="right">
										<p>宮前区</p>
										<p>麻生区</p>
									</div>
								</div>
								<p class="title">鎌倉市（全域）</p>
								<div class="two_cols">
									<div class="left">
										<p>逗子市※</p>
									</div>
									<div class="right">
										<p>藤沢市※</p>
									</div>
								</div>
								<p class="note">※川崎区と多摩区は 一部のみお届け</p>
							</div>
						</div>
					</div>
				</div>
				<div class="Kanagawa_section_sub pc">
					<div class="Tokyo_sec">
						<h3>東京</h3>
						<div class="Tokyo_sec_first">
							<p>大田区</p>
							<p>品川区</p>
							<p>渋谷区</p>
							<p>新宿区</p>
							<p>世田谷区</p>
							<p>千代田区</p>
							<p>目黒区</p>
						</div>
						<div class="Tokyo_sec_second">
							<p>港区(台場は除く)</p>
							<p>文京区</p>
							<p>中野区</p>
							<p>新宿区</p>
							<p>杉並区※</p>
							<p>豊島区※</p>
						</div>
						<div class="pro_left_map">
							<p>※の地域は一部除く</p>
						</div>
					</div>
					<div class="Kanagawa_section_desc">
						<div class="other_area">
							<h3>神奈川</h3>
						</div>
						<div class="Kanagawa_section_desc_left">
							<p class="list_title">横浜市</p>
							<div class="col1">
								<p>青葉区</p>
								<p>磯子区</p>
								<p>神奈川区</p>
								<p>金沢区</p>
								<p>港南区</p>
								<p>港北区</p>
								<p>栄区</p>
								<p>都筑区</p>
								<p>鶴見区</p>
							</div>
							<div class="col2">
								<p>戸塚区</p>
								<p>中区</p>
								<p>西区</p>
								<p>保土ヶ谷区</p>
								<p>緑区</p>
								<p>南区</p>
								<p>泉区※</p>
								<p>瀬谷区※</p>
							</div>
						</div>
						<div class="Kanagawa_section_desc_right">
							<div class="col1">
								<p class="list_title">川崎市</p>
								<p>幸区</p>
								<p>中原区</p>
								<p>高津区</p>
								<p>宮前区</p>
								<p>麻生区</p>
							</div>
							<div class="col2">
								<p class="list_title">鎌倉市（全域）</p>
								<p>逗子市※</p>
								<p>藤沢市※</p>
							</div>
						</div>
						<div class="pro_left_map">
							<p>※川崎区と多摩区は 一部のみお届け</p>
						</div>
					</div>
				</div>  
			</div>

			<div class="clearboth">
			</div>  

			<div class="arrow_down">
				<img src="images/arrow_down.svg" alt="arrow_down">
			</div>

		</div>

		<div class="section_title_big">
	  		<h2>おいしさ色々お試しパック</h2>
		</div>


		<div class="first_content_sec io fade upS">
			<div class="price_area_section">
				<div class="price_area">
					<p>6,480円(税込)<br/>相当が</p>
				</div>
				<div class="price_rate">
					<h1>3,240</h1>
				</div>
				<div class="price_rate_sub">
					<p>(税込)</p>
					<h2>円</h2>
				</div>
				<div class="offer">
					半額<h2>50%</h2>OFF
				</div>
			</div>
			<ul>
				<li class="price_area"></li>
				<li class="price_rate"></li>
				<li class="price_rate_sub"></li>
				<li> </li>
			</ul>
		</div>

		<div class="product1_section io fade upS">
			<div class="parallelogram">
				<div class="productimg_wrap">
					<img src="images/product1.png">
					<div class="deliveryfree_text">
						配送料無料
					</div>
				</div>
				<div class="parallelogram_content">
					<div class="delivery">
						<p>〈お届けの内容〉</p><br/>
						<div class="delivery_list1">
							<ul>
								<li>季節のお野菜少量いろいろ7-8種類<span>旬一番のおいしさを葉物果菜根菜類と幅広く。</span></li>
								<li>比叡ゆば八「本さしみ湯葉」<span>比叡山延暦寺御用達。大豆の甘さ際立つとろり 柔らかなお刺身湯葉。</span></li>
								<li>洋風デリカ ストック可能な「特製 賛沢ラザニア」▼冷凍<span>イタリアンのリストランテに依頼した、ソースから手造りの人気の味わい。レンジで簡単調理ができます</span></li>
								<li>漁場・天然にこだわり「沖獲り紅鮭　甘口切身」２切▼冷凍<span>紅鮭の中でも極上品と呼ばれる北洋産。厳選のおいしさが定番です。</span></li>
							</ul>
						</div>
						<div class="delivery_list2">
							<ul>
								<li>無添加ビストロソーセージ(太)2本入<span>原料の豚肉を育てるところからはじまる<br class="pc">一切の合成添加物を使用しない本格腸詰。</span></li>
								<li>動物福祉卵「エコッコ」6個<span>日本ではじめて動物福祉 (Animal Welfare)の考えに基づいて育てた健康な鶏のたまご。</span></li>
								<li>特別栽培 飛騨こしひかりプレミアム 300g(2合)<span>最も権威あるお米コンクールで11回「金賞」受賞土壌分析 残留農薬234項目検査 0.01ppm未満不検出</span></li>
							</ul>
							<div class="alergy">
								<span>アレルギー等でお召し上がりになれないものがある場合は、ご相談の上、お好みのものと差し替え致します。ご遠慮なくお申し出くださいませ。</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		

		<div class="clearboth">
		</div><br/>
		
		<div class="arrow_down">
			<img src="images/arrow_down.svg" alt="arrow_down">
		</div>
	</div>
<?php endif; ?>
<div class="form_wrapper">
	<section class="inner">
		<div class="contactCotainer">
			<form id="application" action="./confirm.php" method="post">
				<div class="form_area">
					<div class="form_content">
						<div class="form_sec_title">
							<h2>申し込みフォーム</h2>
						</div>
						<div class="form_title">
							<h3></h3>
						</div>
					</div>
					<dl> 
						<dt>お名前<span>必須</span></dt>
						<dd class="short<?php print_error_class("お名前", 0); ?>"><em>姓</em><input type="text" name="お名前" value="<?php print_post_session("お名前"); ?>" placeholder=""><em>名</em><input type="text" name="お名前・名" value="<?php print_post_session("お名前・名"); ?>" placeholder=""><?php print_error_each_message("お名前", "b"); ?>
						</dd>
						<dt>フリガナ<span>必須</span></dt>
						<dd class="short<?php print_error_class("フリガナ", 0); ?>"><em>姓</em><input type="text" name="フリガナ" value="<?php print_post_session("フリガナ"); ?>" placeholder=""><em>名</em><input type="text" name="フリガナ・名" value="<?php print_post_session("フリガナ・名"); ?>" placeholder=""><?php print_error_each_message("フリガナ", "b"); ?>
						</dd>
						<dt>性別<span>必須</span></dt>
						<dd<?php print_error_class("性別", 1); ?>>
							<label><input type="radio" name="性別" value="男性"<?php print_checked("性別", "男性"); ?>>男性</label>
							<label><input type="radio" name="性別" value="女性"<?php print_checked("性別", "女性"); ?>>女性</label><?php print_error_each_message("性別", "b"); ?>
						</dd>
						<dt>生年月日</dt>
						<dd>
							<input type="text" id="datepicker1" name="生年月日" value="<?php print_post_session("生年月日"); ?>">
						</dd>
						<dt>郵便番号<span>必須</span></dt>
						<dd<?php print_error_class("郵便番号", 1); ?>>
							<input type="post" inputmode="post" name="郵便番号" maxlength="4" value="<?php print_post_session("郵便番号"); ?>"> - <input type="post" inputmode="post" name="郵便番号2" maxlength="4" value="<?php print_post_session("郵便番号2"); ?>"><span class="phone-tail">（半角数字）</span><?php print_error_each_message("電話番号", "b"); ?>
						</dd>
						<dt>都道府県<span>必須</span></dt>
						<dd class="short<?php print_error_class("都道府県", 0); ?>">
							<select name="都道府県">
								<option value="">都道府県</option>
								<option value="東京"<?php print_selected("第一希望時間", "9:30〜10:30"); ?>>東京</option>
								<option value="神奈川"<?php print_selected("第一希望時間", "10:30〜11:30"); ?>>神奈川</option>
							</select>
							<?php print_error_each_message("都道府県", "b"); ?>
						</dd>
						<dt>市区町村<span>必須</span></dt>
						<dd<?php print_error_class("市区町村", 1); ?>>
							<input type="text" name="市区町村" placeholder="例）港区地球人１-１-１（全角）" value="<?php print_post_session("市区町村"); ?>"><?php print_error_each_message("市区町村", "b"); ?>
							<p class="excuse">※全角12文字まで</p>
						</dd>
						<dt>番地<span>必須</span></dt>
						<dd<?php print_error_class("番地", 1); ?>>
							<input type="text" name="番地" placeholder="例）１-１-１（全角）" value="<?php print_post_session("番地"); ?>"><?php print_error_each_message("番地", "b"); ?>
							<p class="excuse">※全角16文字まで</p>
						</dd>
						<dt>マンション名等</dt>
						<dd<?php print_error_class("マンション名等", 1); ?>>
							<input type="text" name="マンション名等" placeholder="例）地球人ヒルズWEST1101（全角）" value="<?php print_post_session("マンション名等"); ?>"><?php print_error_each_message("マンション名等", "b"); ?>
							<p class="excuse">※全角12文字まで</p>
						</dd>
						<dt>電話番号<span>必須</span></dt>
						<dd<?php print_error_class("電話番号", 1); ?>>
							<input type="tel" inputmode="tel" name="電話番号" maxlength="4" value="<?php print_post_session("電話番号"); ?>"> - <input type="tel" inputmode="tel" name="電話番号2" maxlength="4" value="<?php print_post_session("電話番号2"); ?>"> - <input type="tel" inputmode="tel" name="電話番号3" maxlength="4" value="<?php print_post_session("電話番号3"); ?>"><span class="excuse">（半角英数字）</span><?php print_error_each_message("電話番号", "b"); ?>
						</dd>
						<dt>メールアドレス<span>必須</span></dt>
						<dd<?php print_error_class("メールアドレス", 1); ?>><input type="email" inputmode="email" name="メールアドレス" placeholder="例）hanako@chikyu-jin.com（半角英数）" value="<?php print_post_session("メールアドレス"); ?>"><span class="excuse">（半角英数字）</span><?php print_error_each_message("メールアドレス", "b"); ?></dd>
						<dt>メールアドレス（確認）<span>必須</span></dt>
						<dd<?php print_error_class("メールアドレス（確認）", 1); ?>><input type="email" inputmode="email" name="メールアドレス（確認）" placeholder="例）hanako@chikyu-jin.com（半角英数）" value="<?php print_post_session("メールアドレス（確認）"); ?>"><span class="excuse">（半角英数字）</span><?php print_error_each_message("メールアドレス（確認）", "b"); ?></dd>
						<dt>ご希望の配達曜日<br>（月～金曜日）</dt>
						<dd<?php print_error_class("ご希望の配達曜日", 1); ?>>
							<label><input type="radio" name="ご希望の配達曜日" value="月曜日"<?php print_checked("月曜日", "月曜日"); ?>>月曜日</label>
							<label><input type="radio" name="ご希望の配達曜日" value="火曜日"<?php print_checked("火曜日", "火曜日"); ?>>火曜日</label>
							<label><input type="radio" name="ご希望の配達曜日" value="水曜日"<?php print_checked("水曜日", "水曜日"); ?>>水曜日</label>
							<label><input type="radio" name="ご希望の配達曜日" value="木曜日"<?php print_checked("木曜日", "木曜日"); ?>>木曜日</label>
							<label><input type="radio" name="ご希望の配達曜日" value="金曜日"  <?php print_checked("金曜日", "金曜日"); ?>>金曜日</label><?php print_error_each_message("ご希望の配達曜日", "b"); ?>
						</dd>
						<dt>その他</dt>
						<dd<?php print_error_class("その他", 1); ?>><textarea name="その他"><?php print_post_session("その他"); ?></textarea><?php print_error_each_message("その他", "b"); ?></dd>
					</dl>
				</div>
				
				<div class="attention">
					<h3>お届けの日程について</h3>
					<p>お申し込みいただいて1日から2日程度いただき、お届けする日程を調整のうえ、ご連絡申し上げます。<br/>ただし、土曜、日曜日にお申し込みいただきました場合のお返事は、明け、月曜日となります。<br/>地球人倶楽部・お客様窓口へのお問い合わせは⇒月曜～金曜の9:00-17:00 まで。<br/>それ以外のお時間は、24 時間留守番電話のご伝言、FAX、メールでのご連絡にて承ります。</p>
					<p>※配送料無料は、自社配達エリアのみとなります。<br>
					※会員様へお配りしている商品リストや情報誌もご一緒にお届けします。<br>
					※ご利用後にしつこい勧誘活動などはおこなっておりません。ご安心してご利用下さい。<br>
					※お試しパックはご入会をご検討頂くためのものです。1回限りのご利用とさせていただきます。
					</p>
					<div class="privacypolicy_agree">
						<label><input type="checkbox" id="check" onclick="checkValue(this)"><a class="privacty-a" target="_blank" href="http://www.chikyu-jin.com/content/privacy.html">個人情報の取り扱い及びご利用規約</a>に同意する</label>
					</div>
					<div class="confirmBtn"><input type="submit" id="submit_go" class="disabled" value="送信" disabled="disabled"></div>
					<input type="hidden" name="token" value="<?php _h($_SESSION["token"]); ?>">
				</div>
			</form>
		</div><!-- /contactCotainer -->
	</section><!-- /inner -->
</div>
<div class="clearboth"></div>
<div class="window_info">
	<h2>地球人倶楽部 お問い合わせ窓口</h2>
	<p>〒224-0043 横浜市都筑区折本町97-1</p>
	<img src="images/free-dial-mark.svg" class="phone_label"> &nbsp;
	<span class="phone_number">0120-733-550</span><br class="sp"/>
	<span class="window_date">月曜日〜金曜日<br class="sp"/>　9:00〜17:00</span>
	<p>
	時間外は留守番電話がご伝言を承ります。<br class="sp"/>
	<a href="http://www.chikyu-jin.com/">chikyu-jin.com</a>
	</p>
</div>
  
<div class="main_content">
  <div class="footer_sec">
    <div class="footer_copyright">ⓒ 株式会社 プロップスジャパン</div>
  </div>
</div>
  
</main>

<!-- SmoothScroll -->
<script src="js/smooth-scroll.polyfills.js"></script> 


<script>
	var scroll = new SmoothScroll('a[href*="#"]', {
		speed: 400,
		easing:'easeOutQuint'
	});
</script>
</body>
</html>
<?php
// 不要セッションの削除
unset($_SESSION["post"]);
unset($_SESSION["error"]);
