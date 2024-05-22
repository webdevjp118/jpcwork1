<?php
/**
 * 定数定義
 */

// URLパス
define("CHILD_PATH", "/reserve");

// メール関連
define("EMAIL_SUBJECT", "ご予約");
define("EMAIL_FROM", "info@kyoto.krg.or.jp");
define("EMAIL_FROM_NAME", "京都御池メディカルクリニック");
// 通知メール宛先（複数対応）
$email = array(
	'info@kyoto.krg.or.jp',
    'yamaguchi@onelife-clinic.com',
	//'mail@wakisakanaonobu.jp',
	//'fujita@digitalbox.jp',
);
// メール署名
$mail_signature = <<<EOF
==============================================================

京都御池メディカルクリニック

〒604-0924京都府京都市中京区一之船入町537−20 FISビルⅡ 8階
TEL：075-252-5252
E-MAIL：info@kyoto.krg.or.jp
https://rinku-medical-clinic.com

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
