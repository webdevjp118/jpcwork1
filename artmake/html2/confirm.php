<?php
	session_start();
	$ticket = md5(uniqid(rand(), true));
	$_SESSION['ticket'] = $ticket;
?>

<!DOCTYPE html>
<html>

<head>
	<title>ArtMake</title>
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
<?php if(!isset($_POST["formcode"]) || ($_POST["formcode"] != "bK9CEQgv")): ?>
    <p>不正なアクセスです</p>
    <?php return; ?>
<?php endif; ?>
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
	<section class="reservation_section">
		<div class="custom_container">
			<div class="regular_heading">
				<h2>入力内容のご確認</h2>
			</div>
			<div class="reservation_form_box">
				<div class="reservation_para">
					<p>入力内容をご確認のうえ、お間違いが無ければ「予約する」ボタンを押して送信してください。<br/>
				</div>
				<form class="reservation_form" method="post" action="send.php">
					<div class="reservation_form_group">
						<label>診療メニュー</label>
						<div class="reservation_form_cont">
							<div class="select_filled confirm_value">
                                <?php echo htmlspecialchars($_POST["menu"]); ?><input type="hidden" name="menu" value="<?php echo htmlspecialchars($_POST["menu"]); ?>">
							</div>
						</div>
					</div>
					<div class="reservation_form_group">
						<label>希望日時</label>
						<div class="reservation_form_cont">
							<div class="reservation_form_inner_group">
								<label>第一希望</label>
								<div class="reservation_form_inner_cont">
									<div class="input_filled confirm_value">
                                        <?php echo htmlspecialchars($_POST["date01"]); ?><input type="hidden" name="date01" value="<?php echo htmlspecialchars($_POST["date01"]); ?>">
                                        <?php echo htmlspecialchars($_POST["time01"]); ?><input type="hidden" name="time01" value="<?php echo htmlspecialchars($_POST["time01"]); ?>"> ～ 
                                        <?php echo htmlspecialchars($_POST["time0102"]); ?><input type="hidden" name="time0102" value="<?php echo htmlspecialchars($_POST["time0102"]); ?>">
									</div>
								</div>
							</div>
							<div class="reservation_form_inner_group">
								<label>第二希望 </label>
								<div class="reservation_form_inner_cont">
									<div class="input_filled confirm_value">
                                        <?php echo htmlspecialchars($_POST["date02"]); ?><input type="hidden" name="date02" value="<?php echo htmlspecialchars($_POST["date02"]); ?>">
                                        <?php echo htmlspecialchars($_POST["time02"]); ?><input type="hidden" name="time02" value="<?php echo htmlspecialchars($_POST["time02"]); ?>"> ～ 
                                        <?php echo htmlspecialchars($_POST["time0202"]); ?><input type="hidden" name="time0202" value="<?php echo htmlspecialchars($_POST["time0202"]); ?>">
									</div>
								</div>
							</div>
							<div class="reservation_form_inner_group">
								<label>第三希望</label>
								<div class="reservation_form_inner_cont">
									<div class="input_filled confirm_value">
                                        <?php echo htmlspecialchars($_POST["date03"]); ?><input type="hidden" name="date03" value="<?php echo htmlspecialchars($_POST["date03"]); ?>">
                                        <?php echo htmlspecialchars($_POST["time03"]); ?><input type="hidden" name="time03" value="<?php echo htmlspecialchars($_POST["time03"]); ?>"><?php if($_POST["time03"]) echo " ～ "; ?>
                                        <?php echo htmlspecialchars($_POST["time0302"]); ?><input type="hidden" name="time0302" value="<?php echo htmlspecialchars($_POST["time0302"]); ?>">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="reservation_form_group">
						<label>当日の治療を <br/>
							ご希望されますか？ </label>
						<div class="reservation_form_cont">
							<div class="radio_filled confirm_value">
                                <?php echo htmlspecialchars($_POST["todayCnsl"]); ?><input type="hidden" name="todayCnsl" value="<?php echo htmlspecialchars($_POST["todayCnsl"]); ?>">
							</div>
						</div>
					</div>
					<div class="reservation_form_group">
						<label>メールアドレス </label>
						<div class="reservation_form_cont">
							<div class="input_filled confirm_value">
                                <?php echo htmlspecialchars($_POST["email"]); ?><input type="hidden" name="email" value="<?php echo htmlspecialchars($_POST["email"]); ?>">
							</div>
						</div>
					</div>
					<div class="reservation_form_group">
						<label>性別 </label>
						<div class="reservation_form_cont">
							<div class="radio_filled_flex confirm_value">
                                <?php echo htmlspecialchars($_POST["sex"]); ?><input type="hidden" name="sex" value="<?php echo htmlspecialchars($_POST["sex"]); ?>">
							</div>
						</div>
					</div>
					<div class="reservation_form_group">
						<label>お名前(フリガナ) </label>
						<div class="reservation_form_cont">
							<div class="input_filled confirm_value">
								<?php echo htmlspecialchars($_POST["furigana"]); ?><input type="hidden" name="furigana" value="<?php echo htmlspecialchars($_POST["furigana"]); ?>">
							</div>
						</div>
					</div>
					<div class="reservation_form_group">
						<label>年齢 </label>
						<div class="reservation_form_cont">
							<div class="input_filled confirm_value">
                                <?php echo htmlspecialchars($_POST["age"]); ?><input type="hidden" name="age" value="<?php echo htmlspecialchars($_POST["age"]); ?>">
							</div>
						</div>
					</div>
					<div class="reservation_form_group">
						<label>電話番号 </label>
						<div class="reservation_form_cont">
							<div class="input_filled confirm_value">
                                <?php echo htmlspecialchars($_POST["tel"]); ?><input type="hidden" name="tel" value="<?php echo htmlspecialchars($_POST["tel"]); ?>">
							</div>
						</div>
					</div>
					<div class="reservation_form_group">
						<label>既往歴 </label>
						<div class="reservation_form_cont">
							<div class="radio_filled_flex confirm_value">
                                <?php echo htmlspecialchars($_POST["goclinicrec"]); ?><input type="hidden" name="goclinicrec" value="<?php echo htmlspecialchars($_POST["goclinicrec"]); ?>">
							</div>
						</div>
					</div>
					<div class="reservation_form_group">
						<label>コメント<br/>
						(ご相談・ご質問など) </label>
						<div class="reservation_form_cont">
							<div class="textarea_filled confirm_value">
                                <?php
                                $textarea = htmlspecialchars($_POST["textarea"]);
                                echo nl2br($textarea);
                                ?><input type="hidden" name="textarea" value="<?php echo htmlspecialchars($_POST["textarea"]); ?>">
							</div>
						</div>
					</div>
                    <input type="hidden" name="formcode" value="<?php echo htmlspecialchars($_POST["formcode"]); ?>">
                    <input type="hidden" name="ticket" value="<?php echo htmlspecialchars($ticket); ?>">
                    <input type="hidden" name="pageurl" value="<?php echo htmlspecialchars($_POST["pageurl"]); ?>">
					<div class="reservation_form_submit confirm_value">
                        <input type="button" value="戻る" onclick="history.back();" /><input type="submit" value="予約する" />
					</div>
				</form>
			</div>
		</div>
	</section>
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