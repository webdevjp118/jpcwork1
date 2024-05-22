<?php
	session_start();
	$ticket = md5(uniqid(rand(), true));
	$_SESSION['ticket'] = $ticket;
?>
<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>入力内容のご確認｜KMクリニック</title>
<meta name="robots" content="noindex,nofollow">
<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/module/meta.php"); ?>
<meta property="og:title" content="">
<meta property="og:type" content="article">
<meta property="og:url" content="">
<meta property="og:image" content="">
<meta property="og:site_name" content="">
<meta property="og:description" content="">
<link rel="stylesheet" href="/css/include.css">
<script type="text/javascript">
$(function(){
	//ダブルクリックによる2重送信防止
	$("form").submit(function() {
		var self = this;
		$(":submit", self).prop("disabled", true);
		setTimeout(function() {
			$(":submit", self).prop("disabled", false);
		}, 10000);
	});		
});
</script>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/module/headend.php"); ?>
</head>
<body>
  <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/module/bodybegin.php"); ?>
  <?php  require_once($_SERVER['DOCUMENT_ROOT'] . "/module/header.php"); ?>
  <?php
    $current = 0;
    require_once($_SERVER['DOCUMENT_ROOT'] . "/module/nav/non_top.php");
  ?>
  <div id="pagetitle" class="pricetitle">
    <h1>初診のご予約フォーム</h1>
  </div>
  <nav id="breadcrumb">
    <ul>
      <li><a href="/">HOME</a></li>
      <li>初診のご予約フォーム</li>
    </ul>
  </nav>
  <main id="reservationform">
    <?php if($_POST["formcode"] != "bK9CEQgv"): ?>
    <p>不正なアクセスです</p>
    <?php return; ?>
    <?php endif; ?>
    <form id="form" method="post" action="/reserve/send.php">
      <h2 class="center">入力内容のご確認</h2>
      <p class="lead">入力内容をご確認のうえ、お間違いが無ければ「予約する」ボタンを押して送信してください。</p>
      <table>
        <tr>
          <th>ご相談項目</th>
          <td>
            <?php
              $cnsl = implode("、",$_POST['cnsl']);
            ?>
            <?php echo htmlspecialchars($cnsl); ?><input type="hidden" name="cnsl" value="<?php echo htmlspecialchars($cnsl); ?>">
            <?php if($_POST["cnsl_etc"]): ?>
            <div style="margin-top: 0.5em;">その他：<?php echo htmlspecialchars($_POST["cnsl_etc"]); ?><input type="hidden" name="cnsl_etc" value="<?php echo htmlspecialchars($_POST["cnsl_etc"]); ?>"></div>
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <th>ご相談の詳細</th>
          <td>
            <?php
              $detail = htmlspecialchars($_POST["detail"]);
              echo nl2br($detail);
            ?><input type="hidden" name="detail" value="<?php echo htmlspecialchars($_POST["detail"]); ?>">
          </td>
        </tr>
        <tr>
          <th>ご希望日時</th>
          <td>
            <table>
              <tr>
                <th>第一希望</th>
                <td>  
                  <?php echo htmlspecialchars($_POST["date01"]); ?><input type="hidden" name="date01" value="<?php echo htmlspecialchars($_POST["date01"]); ?>">
                  <?php echo htmlspecialchars($_POST["time01"]); ?><input type="hidden" name="time01" value="<?php echo htmlspecialchars($_POST["time01"]); ?>"> ～ 
                  <?php echo htmlspecialchars($_POST["time0102"]); ?><input type="hidden" name="time0102" value="<?php echo htmlspecialchars($_POST["time0102"]); ?>">
                </td>
              </tr>
              <tr>
                <th>第二希望</th>
                <td>
                  <?php echo htmlspecialchars($_POST["date02"]); ?><input type="hidden" name="date02" value="<?php echo htmlspecialchars($_POST["date02"]); ?>">
                  <?php echo htmlspecialchars($_POST["time02"]); ?><input type="hidden" name="time02" value="<?php echo htmlspecialchars($_POST["time02"]); ?>"> ～ 
                  <?php echo htmlspecialchars($_POST["time0202"]); ?><input type="hidden" name="time0202" value="<?php echo htmlspecialchars($_POST["time0202"]); ?>">
                </td>
              </tr>
              <tr>
                <th>第三希望</th>
                <td>
                  <?php echo htmlspecialchars($_POST["date03"]); ?><input type="hidden" name="date03" value="<?php echo htmlspecialchars($_POST["date03"]); ?>">
                  <?php echo htmlspecialchars($_POST["time03"]); ?><input type="hidden" name="time03" value="<?php echo htmlspecialchars($_POST["time03"]); ?>"><?php if($_POST["time03"]) echo " ～ "; ?>
                  <?php echo htmlspecialchars($_POST["time0302"]); ?><input type="hidden" name="time0302" value="<?php echo htmlspecialchars($_POST["time0302"]); ?>">
                </td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <th>当日の治療を<br>ご希望されますか？</th>
          <td>
            <?php echo htmlspecialchars($_POST["todayCnsl"]); ?><input type="hidden" name="todayCnsl" value="<?php echo htmlspecialchars($_POST["todayCnsl"]); ?>">
          </td>
        </tr>
        <tr>
          <th>メールアドレス</th>
          <td>
            <?php echo htmlspecialchars($_POST["email"]); ?><input type="hidden" name="email" value="<?php echo htmlspecialchars($_POST["email"]); ?>">
          </td>
        </tr>
        <tr>
          <th>性別</th>
          <td>
            <?php echo htmlspecialchars($_POST["sex"]); ?><input type="hidden" name="sex" value="<?php echo htmlspecialchars($_POST["sex"]); ?>">
          </td>
        </tr>
        <tr>
          <th>お名前（フリガナ）</th>
          <td>
            <?php echo htmlspecialchars($_POST["name"]); ?><input type="hidden" name="name" value="<?php echo htmlspecialchars($_POST["name"]); ?>">
          </td>
        </tr>
        <tr>
          <th>電話番号</th>
          <td>
            <?php echo htmlspecialchars($_POST["tel"]); ?><input type="hidden" name="tel" value="<?php echo htmlspecialchars($_POST["tel"]); ?>">
          </td>
        </tr>
        <tr>
          <th>既往歴</th>
          <td>
            <?php echo htmlspecialchars($_POST["goclinicrec"]); ?><input type="hidden" name="goclinicrec" value="<?php echo htmlspecialchars($_POST["goclinicrec"]); ?>">
          </td>
        </tr>
        <tr>
          <th>年齢</th>
          <td>
            <?php echo htmlspecialchars($_POST["age"]); ?><input type="hidden" name="age" value="<?php echo htmlspecialchars($_POST["age"]); ?>">
          </td>
        </tr>
        <tr>
          <th>コメント（ご相談・ご質問など）</th>
          <td>
            <?php
              $textarea = htmlspecialchars($_POST["textarea"]);
              echo nl2br($textarea);
            ?><input type="hidden" name="textarea" value="<?php echo htmlspecialchars($_POST["textarea"]); ?>">
          </td>
        </tr>
      </table>
      <input type="hidden" name="formcode" value="<?php echo htmlspecialchars($_POST["formcode"]); ?>">
      <input type="hidden" name="ticket" value="<?php echo htmlspecialchars($ticket); ?>">
      <input type="hidden" name="pageurl" value="<?php echo htmlspecialchars($_POST["pageurl"]); ?>">
      <div class="btnbox"><a href="javascript:history.back();" class="back">戻る</a><button type="submit">予約する</button></div>
    </form>
  </main>
  <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/module/footer.php"); ?>
  <?php echo $_GET['rid']; ?>
</body>
</html>
