<?php
// --------------------------------
// �ʐ^�\��

require_once("lib/config.php");
require_once("image.php");

$id = htmlspecialchars($_REQUEST["id"]);
$file = htmlspecialchars($_REQUEST["file"]);
$size = htmlspecialchars($_REQUEST["size"]);	// size�Ŏw�肵����`�̐؂���
$tx = htmlspecialchars($_REQUEST["x"]);	// x,y�Ŏw�肵����`�̐؂���
$ty = htmlspecialchars($_REQUEST["y"]);	// x,y�Ŏw�肵����`�̐؂���
$pv = htmlspecialchars($_REQUEST["pv"]);
if ($id || $file) {
	if ($tx || $ty) {
		$sx = 0;
		$sy = 0;
		if ($tx) {
			$sx = $tx;
		}
		if ($ty) {
			$sy = $ty;
		}
	} else if ($size) {
		$sx = $size;
		$sy = $size;
	} else {
		$sx = 0;
		$sy = 0;
	}
	get_image($id, $file, $sx, $sy, $pv);
}
?>
