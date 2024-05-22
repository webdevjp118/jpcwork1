<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>初診のご予約フォーム｜KMクリニック(新宿)</title>
<meta name="description" content="美容皮膚科・美容外科のKMクリニック（新宿）のご来院予約フォームです。ご予約はメールもしくはお電話にて受け付けております。">
<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/module/meta.php"); ?>
<meta property="og:title" content="初診のご予約フォーム｜KMクリニック(新宿)">
<meta property="og:type" content="article">
<meta property="og:url" content="">
<meta property="og:image" content="">
<meta property="og:site_name" content="KMクリニック">
<meta property="og:description" content="美容皮膚科・美容外科のKMクリニック（新宿）のご来院予約フォームです。ご予約はメールもしくはお電話にて受け付けております。">
<link rel="stylesheet" href="/css/include.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>
<script type="text/javascript">
$(function(){
  var dateToday = new Date();
  $( ".datepicker" ).datepicker({
    minDate: dateToday,
    beforeShowDay: function(day) {
      var day = day.getDay();
      if (day == 4 || day == 1) {
        return [false, ""]
      } else {
        return [true, ""]
      }
    }
  });
});
</script>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/module/headend.php"); ?>
</head>
<body>
  <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/module/bodybegin.php"); ?>
  <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/module/header.php"); ?>
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
  <div id="reservationform">
    <script type="text/javascript">
      $(function(){
      	$("#form").validationEngine('attach', {promptPosition : "topLeft"});	
      });
    </script>
    <form id="form" method="post" action="/reserve/confirm.php">
      <ul class="form-list">
        <li class="form-list__item current"><a>初診のご予約はこちら</a></li>
        <li class="form-list__item"><a href="../reserve_re/">２回目以降の診療ご予約はこちら</a></li>
      </ul>
      <h2 class="center">初診のご予約フォーム</h2>
      <p class="lead">下記項目にご入力の上、送信ボタンをクリックしてください。<br>
      <span class="required">※</span>は必須項目です。<br>
      半角カタカナ、環境依存文字は文字化けの原因となりますので、使用しないで下さい。</p>
      <table>
        <tr>
          <th>ご相談項目 <span class="required">※</span></th>
          <td>
            <ul>
              <li>
                <input name="cnsl[]" type="checkbox" id="cnsl7" value="医療脱毛" class="validate[minCheckbox[1]]" data-prompt-position="topLeft">
                <label for="cnsl7">医療脱毛</label>
              </li>
              <li>
                <input name="cnsl[]" type="checkbox" id="cnsl1" value="いぼ/ほくろ除去" class="validate[minCheckbox[1]]" data-prompt-position="topLeft">
                <label for="cnsl1">いぼ/ほくろ除去</label>
              </li>
              <li>
                <input name="cnsl[]" type="checkbox" id="cnsl8" value="サーマクール/サーマクールアイ" class="validate[minCheckbox[1]]" data-prompt-position="topLeft">
                <label for="cnsl8">サーマクール/サーマクールアイ</label>
              </li>
              <li>
                <input name="cnsl[]" type="checkbox" id="cnsl37" value="GLP-1" class="validate[minCheckbox[1]]" data-prompt-position="topLeft">
                <label for="cnsl37">GLP-1</label>
              </li>
              <li>
                <input name="cnsl[]" type="checkbox" id="cnsl38" value="スティムシュアー" class="validate[minCheckbox[1]]" data-prompt-position="topLeft">
                <label for="cnsl38">スティムシュアー</label>
              </li>
              <li>
                <input name="cnsl[]" type="checkbox" id="cnsl16" value="クラツーアルファ" class="validate[minCheckbox[1]]" data-prompt-position="topLeft">
                <label for="cnsl16">クラツーアルファ</label>
              </li>
              <li>
                <input name="cnsl[]" type="checkbox" id="cnsl34" value="アクネスニードル" class="validate[minCheckbox[1]]" data-prompt-position="topLeft">
                <label for="cnsl34">アクネスニードル</label>
              </li>
              <li>
                <input name="cnsl[]" type="checkbox" id="cnsl35" value="プラズマ治療" class="validate[minCheckbox[1]]" data-prompt-position="topLeft">
                <label for="cnsl35">プラズマ治療</label>
              </li>
              <li>
                <input name="cnsl[]" type="checkbox" id="cnsl36" value="ハイドラフェイシャル" class="validate[minCheckbox[1]]" data-prompt-position="topLeft">
                <label for="cnsl36">ハイドラフェイシャル</label>
              </li>
              <li>
                <input name="cnsl[]" type="checkbox" id="cnsl21" value="フォトシルクプラス" class="validate[minCheckbox[1]]" data-prompt-position="topLeft">
                <label for="cnsl21">フォトシルクプラス</label>
              </li>
              <li>
                <input name="cnsl[]" type="checkbox" id="cnsl32" value="ピコレーザー（トーニング・フラクショナル）" class="validate[minCheckbox[1]]" data-prompt-position="topLeft">
                <label for="cnsl32">ピコレーザー（トーニング・フラクショナル）</label>
              </li>
              <li>
                <input name="cnsl[]" type="checkbox" id="cnsl33" value="ピコショット" class="validate[minCheckbox[1]]" data-prompt-position="topLeft">
                <label for="cnsl33">ピコショット</label>
              </li>
              <li>
                <input name="cnsl[]" type="checkbox" id="cnsl12" value="スマスセラ/スマスセラアイ" class="validate[minCheckbox[1]]" data-prompt-position="topLeft">
                <label for="cnsl12">スマスセラ/スマスセラアイ</label>
              </li>
              <li>
                <input name="cnsl[]" type="checkbox" id="cnsl17" value="ウルトラV・ショッピングリフト/トキシル" class="validate[minCheckbox[1]]" data-prompt-position="topLeft">
                <label for="cnsl17">ウルトラV・ショッピングリフト/トキシル</label>
              </li>
              <li>
                <input name="cnsl[]" type="checkbox" id="cnsl18" value="ミントリフト" class="validate[minCheckbox[1]]" data-prompt-position="topLeft">
                <label for="cnsl18">ミントリフト</label>
              </li>
              <li>
                <input name="cnsl[]" type="checkbox" id="cnsl4" value="美容点滴/美容注射（プラセンタ）" class="validate[minCheckbox[1]]" data-prompt-position="topLeft">
                <label for="cnsl4">美容点滴/美容注射（プラセンタ）</label>
              </li>
              <li>
                <input name="cnsl[]" type="checkbox" id="cnsl6" value="水光注射" class="validate[minCheckbox[1]]" data-prompt-position="topLeft">
                <label for="cnsl6">水光注射</label>
              </li>
              <li>
                <input name="cnsl[]" type="checkbox" id="cnsl14" value="ヒアルロン注射" class="validate[minCheckbox[1]]" data-prompt-position="topLeft">
                <label for="cnsl14">ヒアルロン注射</label>
              </li>
              <li>
                <input name="cnsl[]" type="checkbox" id="cnsl15" value="ボトックス注射/多汗症注射" class="validate[minCheckbox[1]]" data-prompt-position="topLeft">
                <label for="cnsl15">ボトックス注射/多汗症注射</label>
              </li>
              <li>
                <input name="cnsl[]" type="checkbox" id="cnsl19" value="ピーリング" class="validate[minCheckbox[1]]" data-prompt-position="topLeft">
                <label for="cnsl19">ピーリング</label>
              </li>
              <li>
                <input name="cnsl[]" type="checkbox" id="cnsl20" value="グロースファクター" class="validate[minCheckbox[1]]" data-prompt-position="topLeft">
                <label for="cnsl20">グロースファクター</label>
              </li>
              <li>
                <input name="cnsl[]" type="checkbox" id="cnsl22" value="ダーマペン" class="validate[minCheckbox[1]]" data-prompt-position="topLeft">
                <label for="cnsl22">ダーマペン</label>
              </li>
              <li>
                <input name="cnsl[]" type="checkbox" id="cnsl30" value="にきび治療" class="validate[minCheckbox[1]]" data-prompt-position="topLeft">
                <label for="cnsl30">にきび治療</label>
              </li>
              <li>
                <input name="cnsl[]" type="checkbox" id="cnsl3" value="脂肪溶解注射/BNLS/フーセラ" class="validate[minCheckbox[1]]" data-prompt-position="topLeft">
                <label for="cnsl3">脂肪溶解注射/BNLS/フーセラ</label>
              </li>
              <li>
                <input name="cnsl[]" type="checkbox" id="cnsl28" value="タトゥー・刺青除去" class="validate[minCheckbox[1]]" data-prompt-position="topLeft">
                <label for="cnsl28">タトゥー・刺青除去</label>
              </li>
              <li>
                <input name="cnsl[]" type="checkbox" id="cnsl29" value="プチ整形（二重まぶた・目元・目の下のたるみ）" class="validate[minCheckbox[1]]" data-prompt-position="topLeft">
                <label for="cnsl29">プチ整形（二重まぶた・目元・目の下のたるみ）</label>
              </li>
              <li>
                <input name="cnsl[]" type="checkbox" id="cnsl31" value="豊胸/隆鼻" class="validate[minCheckbox[1]]" data-prompt-position="topLeft">
                <label for="cnsl31">豊胸/隆鼻</label>
              </li>
              <li>
                <input name="cnsl[]" type="checkbox" id="cnsl25" value="医薬品/コスメ" class="validate[minCheckbox[1]]" data-prompt-position="topLeft">
                <label for="cnsl25">医薬品/コスメ</label>
              </li>

              <li>
                <input name="cnsl[]" type="checkbox" id="cnsl11" value="その他" class="validate[minCheckbox[1]]" data-prompt-position="topLeft">
                <label for="cnsl11">その他</label>
                <input name="cnsl_etc" type="text" id="cnsl_etc" size="40" placeholder="その他選択の場合にご記入ください">
              </li>
            </ul>          
          </td>
        </tr>
        <tr>
          <th>ご相談の詳細<br><small>（部位・箇所・大きさなど）</small> <span class="required">※</span></th>
          <td>
            <textarea name="detail" id="" cols="30" rows="10" class="validate[required]" data-prompt-position="topLeft" placeholder=""></textarea>
            <p>ご相談の部位・箇所・いぼ・ほくろの大きさ/場所/個数をご記入ください。<br>複数の場合は改行してください。</p>
            <p>ほくろの場合　例）1ミリ（記号不可）/おでこ/2個<br>脱毛の場合　例）全顔・上半身</p>
          </td>
        </tr>
        <tr>
          <th>ご希望日時</th>
          <td>
            <table>
              <tr>
                <th>第一希望 <span class="required">※</span></th>
                <td>
                  <input type="text" name="date01" class="validate[required] datepicker" data-prompt-position="topLeft"><br>
                  <select name="time01" class="validate[required]" data-prompt-position="topLeft">
                    <option value="">--</option>
                    <option value="11:00">11:00</option>
                    <option value="11:30">11:30</option>
                    <option value="12:00">12:00</option>
                    <option value="12:30">12:30</option>
                    <option value="13:00">13:00</option>
                    <option value="13:30">13:30</option>
                    <option value="14:00">14:00</option>
                    <option value="14:30">14:30</option>
                    <option value="15:00">15:00</option>
                    <option value="15:30">15:30</option>
                    <option value="16:00">16:00</option>
                    <option value="16:30">16:30</option>
                    <option value="17:00">17:00</option>
                    <option value="17:30">17:30</option>
                    <option value="18:00">18:00</option>
                    <option value="18:30">18:30</option>
                  </select> ～ 
                </td>
              </tr>
              <tr>
                <th>第二希望 <span class="required">※</span></th>
                <td>
                  <input type="text" name="date02" class="validate[required] datepicker" data-prompt-position="topLeft"><br>
                  <select name="time02" class="validate[required]" data-prompt-position="topLeft">
                    <option value="">--</option>
                    <option value="11:00">11:00</option>
                    <option value="11:30">11:30</option>
                    <option value="12:00">12:00</option>
                    <option value="12:30">12:30</option>
                    <option value="13:00">13:00</option>
                    <option value="13:30">13:30</option>
                    <option value="14:00">14:00</option>
                    <option value="14:30">14:30</option>
                    <option value="15:00">15:00</option>
                    <option value="15:30">15:30</option>
                    <option value="16:00">16:00</option>
                    <option value="16:30">16:30</option>
                    <option value="17:00">17:00</option>
                    <option value="17:30">17:30</option>
                    <option value="18:00">18:00</option>
                    <option value="18:30">18:30</option>
                  </select> ～ 
                </td>
              </tr>
              <tr>
                <th>第三希望</th>
                <td>
                  <input type="text" name="date03" class="datepicker"><br>
                  <select name="time03">
                    <option value="">--</option>
                    <option value="11:00">11:00</option>
                    <option value="11:30">11:30</option>
                    <option value="12:00">12:00</option>
                    <option value="12:30">12:30</option>
                    <option value="13:00">13:00</option>
                    <option value="13:30">13:30</option>
                    <option value="14:00">14:00</option>
                    <option value="14:30">14:30</option>
                    <option value="15:00">15:00</option>
                    <option value="15:30">15:30</option>
                    <option value="16:00">16:00</option>
                    <option value="16:30">16:30</option>
                    <option value="17:00">17:00</option>
                    <option value="17:30">17:30</option>
                    <option value="18:00">18:00</option>
                    <option value="18:30">18:30</option>
                  </select> ～ 
                </td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <th>当日の治療を<br>ご希望されますか？ <span class="required">※</span></th>
          <td>
            <ul>
              <li><label><input name="todayCnsl" type="radio" id="todayCnsl1" value="カウンセリング希望" class="validate[required]" data-prompt-position="topLeft">カウンセリング希望</label></li>
              <li><label><input name="todayCnsl" type="radio" id="todayCnsl2" value="カウンセリング希望＋当日に治療も希望" class="validate[required]" data-prompt-position="topLeft">カウンセリング希望＋当日に治療も希望</label></li>
            </ul>
          </td>
        </tr>
        <tr>
          <th>メールアドレス <span class="required">※</span></th>
          <td>
            <input type="email" name="email" id="emailadress" placeholder="sample@kmshinjuku.com" class="validate[required,custom[email]]" data-prompt-position="topLeft">
          </td>
        </tr>
        
        <tr>
          <th>性別 <span class="required">※</span></th>
          <td>
            <label><input name="sex" type="radio" id="sex1" value="女性" class="validate[required]" data-prompt-position="topLeft">女性</label>
						<label><input name="sex" type="radio" id="sex2" value="男性" class="validate[required]" data-prompt-position="topLeft">男性</label>
          </td>
        </tr>
        <tr>
          <th>お名前（フリガナ） <span class="required">※</span></th>
          <td>
            <input type="text" name="name" placeholder="ヤマダ ハナコ" class="validate[required]" data-prompt-position="topLeft">
          </td>
        </tr>
        <tr>
          <th>電話番号 <span class="required">※</span></th>
          <td>
            <input type="text" name="tel" placeholder="012-3456-7890（携帯電話番号も可）" class="validate[required]" data-prompt-position="topLeft">
          </td>
        </tr>
        <tr>
          <th>年齢 <span class="required">※</span></th>
          <td>
            <input type="number" name="age" placeholder="30" class="validate[required]" data-prompt-position="topLeft"> 歳
          </td>
        </tr>
        <tr>
          <th>既往歴 <span class="required">※</span><br><small>ありとご回答の方はコメント欄に<br>詳細（病歴・アレルギー等の内容）を<br>ご記入ください。</small></th>
          <td>
            <label><input type="radio" name="goclinicrec" value="なし" class="validate[required]" data-prompt-position="topLeft">なし</label>
            <label><input type="radio" name="goclinicrec" value="あり" class="validate[required]" data-prompt-position="topLeft">あり</label>
          </td>
        </tr>
        <tr>
          <th>コメント（ご相談・ご質問など）</th>
          <td>
            <textarea name="textarea" placeholder="お客様のお悩みや疑問などをご記入ください。" data-prompt-position="topLeft"></textarea>
          </td>
        </tr>
      </table>
      <div class="privacy">
        <label><input type="checkbox" name="privacypolicy" class="validate[required]" data-prompt-position="topLeft" data-errormessage="※必須項目です">プライバシーポリシーに同意する</label>
        <p><a href="/privacy/" class="linkico">個人情報保護方針はこちら</a></p>
      </div>
      <input type="hidden" name="pageurl" value="<?php echo (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>">
      <input type="hidden" name="formcode" value="bK9CEQgv">
      <div class="btnbox"><button type="submit">予約する</button></div>
    </form>
  </div>
  <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/module/footer.php"); ?>
  <?php echo $_GET['rid']; ?>
</body>
</html>
