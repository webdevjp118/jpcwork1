<?php
function smarty_modifier_mbtruncate($string, $length = 80, $etc = '...', $lang='UTF-8') {
    if ($length == 0) {return '';}

    if (mb_strlen($string, $lang) > $length) {
        return mb_substr($string, 0, $length, $lang).$etc;
    } else {
        return $string;
    }
}
?>
