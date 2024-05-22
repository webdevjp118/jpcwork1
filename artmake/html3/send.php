<?php
    error_reporting(E_ERROR | E_PARSE); //back
	session_start();
	$ticket = isset($_POST['ticket']) ? $_POST['ticket'] : '';
	$save   = isset($_SESSION['ticket']) ? $_SESSION['ticket'] : '';
	unset($_SESSION['ticket']);
?>

<!DOCTYPE html>
<html>

<head>
    <title>送信完了｜KMクリニック</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale = 1.0, user-scalable = no">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

	<link rel="stylesheet" type="text/css" href="css/slick.css"/>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="icon" href="images/favicon.png">
</head>

<?php


?>

<body>

<header class="site_header">
    <div class="custom_container">
        <a href="indx.html">
            <img src="images/logo.png" alt="logo image">
        </a>
        <a href="javascript:void(0);" class="navbar_toggler csp" type="button" data-toggle="collapse"
            data-target="#collapsibleNavbar">
            <div class="navbar_toggler_inner"></div>
        </a>
        <nav class="custom_navbar">
            <ul>
                <li>
                    <a href="tell:0352720212" class="number_link"><i class="fas fa-phone-alt"></i>03-5272-0212
                        <span>受付時間：10:30～19:00</span></a>
                </li>
                <li>
                    <a href="#">診療時間：11:00～19:00<span>休診日：月・木</span></a>
                </li>
                <li>
                    <a href="#" class="contact_btn"><i class="far fa-envelope"></i>ご予約</a>
                </li>
            </ul>
        </nav>
    </div>
</header>

<main class="send_result">
<?php
$sTo          = '';
$sFromMail    = '';
$sSubject     = '';
$sMessage     = '';
$sHeaders     = '';

//送信内容
$goclinicrec = htmlspecialchars($_POST["goclinicrec"]);
$todayCnsl = htmlspecialchars($_POST["todayCnsl"]);
$sex = htmlspecialchars($_POST["sex"]);
    
$menu = htmlspecialchars($_POST["menu"]);
$date01 = htmlspecialchars($_POST["date01"]);
$time01 = htmlspecialchars($_POST["time01"]);
$time0102 = htmlspecialchars($_POST["time0102"]);
$date02 = htmlspecialchars($_POST["date02"]);
$time02 = htmlspecialchars($_POST["time02"]);
$time0202 = htmlspecialchars($_POST["time0202"]);
$date03 = htmlspecialchars($_POST["date03"]);
$time03 = htmlspecialchars($_POST["time03"]);
$time0302 = htmlspecialchars($_POST["time0302"]);
$age = htmlspecialchars($_POST["age"]);
$furigana = htmlspecialchars($_POST["furigana"]);
$age = htmlspecialchars($_POST["age"]);
$email = htmlspecialchars($_POST["email"]);
$tel = htmlspecialchars($_POST["tel"]);
$textarea = htmlspecialchars($_POST["textarea"]);
$pageurl = htmlspecialchars($_POST["pageurl"]);
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
date_default_timezone_set('Asia/Tokyo');
$senddate = date("Y/m/d H:i:s");
$useragent = $_SERVER["HTTP_USER_AGENT"];
$remoteaddr = $_SERVER["REMOTE_ADDR"];


if(preg_match('/qq\.com/',$email)){
	return;
}   
if(!$email || $_POST["formcode"] != "bK9CEQgv"){
//	echo "不正なアクセスです err:01"; //back
//	return;
}
if($ticket != $save){
//	echo "不正なアクセスです err:02"; //back
//	return;
}

//送信先
$sTo = "reserve@kmshinjuku.com,web@kmshinjuku.com";

//送信元
$sFromMail    = 'web@kmshinjuku.com';
//題
$sSubject     = '【KMクリニック】ご予約フォームからの送信';
//ヘッダー
$sHeaders     = 'From:' . mb_encode_mimeheader($furigana) . '<'.$email.'>';
//本文
$sMessage .= 

"------------------------------------------------------------
このメールは（http://www.kmshinjuku.com/form/）から送信されています。
------------------------------------------------------------

KMクリニック公式サイトからのご予約のお問い合わせがありました。
3営業日以内に担当者より折り返しのご連絡をお願いします。"

. "\n\n■診療メニュー\n" . $menu
. "\n\n■第一希望\n" . $date01 . " " . $time01 . "～" . $time0102
. "\n\n■第二希望\n" . $date02 . " " . $time02 . "～" . $time0202
. "\n\n■第三希望\n" . $date03 . " " . $time03 . "～" . $time0302
. "\n\n■お名前（フリガナ）\n" . $furigana
. "\n\n■年齢\n" . $age
. "\n\n■性別\n" . $sex
. "\n\n■当日の治療\n" . $todayCnsl
. "\n\n■email\n" . $email
. "\n\n■電話番号\n" . $tel
. "\n\n■既往歴\n" . $goclinicrec
. "\n\n■コメント（ご相談・ご質問など）\n" . $textarea
. "\n\n------------------------------"
. "\n\n■送信日時\n" . $senddate
. "\n\n■ユーザーエージェント\n" . $useragent
. "\n\n■IPアドレス\n" . $remoteaddr
. "\n\n■ホスト名\n" . $hostname
. "\n\n■問い合わせのページURL\n" . $pageurl;

//送信処理
mb_language('ja');
mb_internal_encoding('UTF-8');
if(mb_send_mail($sTo, $sSubject, $sMessage, $sHeaders)){
?>
    <h2 class="center">送信完了致しました。</h2>
<p class="lead">ご予約内容を自動返信メールにてお送りいたしました。<br>万が一届いていない場合はお電話にてお問い合わせください。</p>
<dl class="noYetReservation">
<dt>まだ予約確定ではございません</dt>
<dd><p>予約状況の確認は担当者よりメールまたは、電話にてご連絡させて頂きます。<br>又、ご予約は、お電話でご予約の確認が取れ次第、予約が確定いたします。</p></dd>
</dl>
<p class="contactSuppriment">送信メール（ドメイン@kmshinjuku.com）が届かない場合は、「携帯電話」または「メールサービス」の"迷惑フィルタ"にかかっている場合が考えられます。<br>お問い合わせ5日間が経過しても、返信がない場合、ご自身の《迷惑メールフィルタの設定》を<br>ご確認いただき、設定完了後に、再度お問い合わせフォームよりご連絡いただきますようお願い致します。</p>
<div class="contactInfo">予約状況のご案内は、2営業日以内にご連絡いたします。<br>万一、連絡がなかった場合はお電話にてお問い合わせください。<span>新宿院：<a href="tel:0352720212">03-5272-0212</a></span></div>
<dl class="contactOutro">
    <dt>ご来院に当たり、ご注意ください</dt>
    <dd><p>ご来院がご予約時間を過ぎますと、施術時間を変更またはご予約自体をキャンセルさせて頂く場合がございます。<br>他の患者様のご迷惑にもなりますので、ご予約時間にご来院頂けない場合は、お手数ではございますが、必ずご連絡ご連絡をお願致します。</p></dd>
</dl>
<?php
}else{
    echo '<p>送信に失敗致しました。<br>ブラウザの戻るボタンから戻ってもう一度送信してください。</p>';
}

//登録者への送信メール
$tTo          = '';
$tFromMail    = '';
$tSubject     = '';
$tMessage     = '';
$tHeaders     = '';

//送信先
$tTo          = $email;
//送信元
$tFromMail    = 'web@kmshinjuku.com';
//題
$tSubject     = '【KMクリニック】ご予約[自動返信]';
//ヘッダー
$tHeaders     = 'From:web@kmshinjuku.com';
//本文
$tMessage .=
$furigana . "様\n\n" . 
"------------------------------------------------------------
このメールはフォームよりデータを送信いただきますと、自動的に送信されます。
------------------------------------------------------------

この度は、KMクリニックにカウンセリング予約をお申し込み頂きまして
ありがとうございます。

予約状況の確認は担当者よりメールまたは、電話にてご連絡させて頂きます。
又、ご予約は、お電話でご予約の確認が取れ次第、予約が確定いたします。

※予約状況のご案内は、2営業日以内にご連絡いたします。万一、連絡が
なかった場合にはお電話にてお問い合わせください。
※当日・前日など直前のご予約につきましては対応致しかねる場合がござい
ますので、直接お電話にてご確認ください。

▼送信内容▼
\n■診療メニュー\n" . $menu
. "\n\n■第一希望\n" . $date01 . " " . $time01 . "～" . $time0102
. "\n\n■第二希望\n" . $date02 . " " . $time02 . "～" . $time0202
. "\n\n■第三希望\n" . $date03 . " " . $time03 . "～" . $time0302
. "\n\n■お名前（フリガナ）\n" . $furigana
. "\n\n■年齢\n" . $age
. "\n\n■性別\n" . $sex
. "\n\n■当日の治療\n" . $todayCnsl
. "\n\n■email\n" . $email
. "\n\n■電話番号\n" . $tel
. "\n\n■既往歴\n" . $goclinicrec
. "\n\n■コメント（ご相談・ご質問など）\n" . $textarea .

"\n\n -------------------------------------------- 

予約確認の連絡をさせて頂きますのでしばらくお待ちください。
ご不明点やご質問がございましたら下記までご連絡ください。

また、本メールにお心当たりのない場合は、
誠に恐縮ですが破棄していただきますよう、お願いいたします。

=====================================================
KM新宿クリニック
〒160-0021
東京都新宿区歌舞伎町2-46-5
KM新宿ビル8F
TEL：03-5272-0212

https://www.kmshinjuku.com/
--------------------------------------------";


if(mb_send_mail($tTo, $tSubject, $tMessage, $tHeaders)){
}else{
    echo '<p>送信に失敗致しました。<br>ブラウザの戻るボタンから戻ってもう一度送信してください。</p>';
}

?>

</main>

	<footer class="site_footer">
		<div class="custom_container">
			<p>Copyright &copy; 医療アートメイク専門サイト｜美容皮膚科・美容外科のKM新宿クリニック All Rights Reserved.</p>
		</div>
	</footer>
	<section class="fixed_button_section csp_675">
		<div class="fixed_button_section_inner">
			<div class="bttn_call_wrap">
				<a href="#" class="bttn bttn_call"><i class="fas fa-phone-alt"></i> <span>電話</span></a>
			</div>
			<div class="btn_mail_wrap">
				<a href="#" class="bttn bttn_mail"><i class="fas fa-envelope"></i> <span>ご予約</span></a>
			</div>
			<div class="btn_line_wrap">
				<a href="#" class="bttn bttn_line"><i class="fab fa-line"></i> <span>LINE予約</span></a>
			</div>
		</div>
	</section>
	<div class="pagetop"><a href="javascript:void(0)"><i class="fas fa-chevron-up"></i></a></div>
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<!-- <script src="js/additional-methods.min.js"></script> -->
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>

	<script src="js/slick.min.js"></script>
	<script src="js/fonts-awesome-5.js"></script>
	<script src="js/intersection-observer-polyfill.js"></script>
	<script src="js/custom.js"></script>
</body>

</html>