<?php
//毎月1日に、前々月のログファイルを削除
$log_dir_path = realpath(dirname(__FILE__) . "/../") . "/log/";
// echo $log_dir_path."<br/>";

//前々月
$target_month = date('Ym', strtotime(date('Y-m-1') . '-2 month'));
// echo $target_month."<br/>";

foreach (glob($log_dir_path . $target_month .'*.log') as $file) {
  // globで取得したファイルをunlinkで1つずつ削除
  unlink($file);
  // echo $file.'を削除しました<br/>';
}

?>
