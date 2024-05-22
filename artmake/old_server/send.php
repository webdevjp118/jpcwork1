<?php
	session_start();
	$ticket = isset($_POST['ticket']) ? $_POST['ticket'] : '';
	$save   = isset($_SESSION['ticket']) ? $_SESSION['ticket'] : '';
	unset($_SESSION['ticket']);
?>
<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>送信完了｜KMクリニック</title>
<meta name="robots" content="noindex,nofollow">
<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/module/meta.php"); ?>
<meta property="og:title" content="">
<meta property="og:type" content="article">
<meta property="og:url" content="">
<meta property="og:image" content="">
<meta property="og:site_name" content="">
<meta property="og:description" content="">
<link rel="stylesheet" href="/css/include.css">
<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/module/headend.php"); ?>
</head>
<body>
<!--ADmemeCVタグ-->
<img height="1" width="1" style="border-style:none;" src="https://v9999.adv.admeme.net/tag/pixel?pid=km-shin-clinic&ref=" />
<img height="1" width="1" style="border-style:none;" src="https://v9999.adv.admeme.net/tag/pixel?pid=km-shin-clinic&cv=103" />
<img height="1" width="1" style="border-style:none;" src="https://v9999.adv.admeme.net/tag/pixel" />
<img height="1" width="1" style="border-style:none;" src="https://cm.g.doubleclick.net/pixel?google_nid=kpis&google_cm" />
<img height="1" width="1" style="border-style:none;" src="https://mt.mobsmart.net/pixel?mobsmart_nid=kpismt&pid=km-shin-clinic&cv=103" />
<iframe height="1" width="1" style="border-style:none;" src="https://m.mobsmart.net/nm?mobsmart_nid=kpismt&pid=km-shin-clinic&cv=103"></iframe>
<img height="1" width="1" style="border-style:none;" src="https://cm.g.doubleclick.net/pixel?google_nid=kpis&google_hm=a20tc2hpbi1jbGluaWM=&google_redir=https%3A%2F%2Fv9999.adv.admeme.net%2Ftag%2Fpixel" />
<img height="1" width="1" style="border-style:none;" src="https://jp-u.openx.net/w/1.0/cm?id=9b4b07c1-b7bb-4c59-a12f-dec521767490&r=https%3A%2F%2Fv9999.adv.admeme.net%2Fdrtb%2Fn%3Foid%3D" />
<img height="1" width="1" style="border-style:none;" src="https://jp-u.openx.net/w/1.0/sd?id=537090543&val=km-shin-clinic&r=https%3A%2F%2Fv9999.adv.admeme.net%2Ftag%2Fpixel" />


<!--ADmemeCVタグここまで-->
  <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/module/bodybegin.php"); ?>
  <?php  require_once($_SERVER['DOCUMENT_ROOT'] . "/module/header.php"); ?>
  <?php
    $current = 0;
    require_once($_SERVER['DOCUMENT_ROOT'] . "/module/nav/top.php");
  ?>
  <div id="pagetitle" class="pricetitle">
    <h1>ご予約フォーム</h1>
  </div>
  <nav id="breadcrumb">
    <ul>
      <li><a href="/">HOME</a></li>
      <li>ご予約フォーム</li>
    </ul>
  </nav>
  <main id="reservationform">
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
$name = htmlspecialchars($_POST["name"]);
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
	echo "不正なアクセスです err:01";
	return;
}
if($ticket != $save){
	echo "不正なアクセスです err:02";
	return;
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
  <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/module/footer.php"); ?>
  <?php echo $_GET['rid']; ?>
<!-- Yahoo Code for your Conversion Page -->
<script type="text/javascript">
    /* <![CDATA[ */
    var yahoo_conversion_id = 1000025671;
    var yahoo_conversion_label = "0aPXCMiQxAMQiMq7ygM";
    var yahoo_conversion_value = 0;
    /* ]]> */
</script>
<script type="text/javascript"
src="https://s.yimg.jp/images/listing/tool/cv/conversion.js">
</script>
<noscript>
    <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt=""
src="https://b91.yahoo.co.jp/pagead/conversion/1000025671/?value=0&label=0aP
XCMiQxAMQiMq7ygM&guid=ON&script=0&disvt=true"/>
    </div>
</noscript>
</body>
</html>
