<?php
/**
 * Smarty date_timestamp modifier plugin
 *
 * Type:     modifier<br>
 * Name:     date2days<br>
 * Purpose:  date to timestamp<br>
 * @return	days from target_date
 */
function smarty_modifier_date2days($target_date = '')
{
	if ($target_date == '') {
		return "";
	}
	$timestamp = time() - strtotime($target_date);
	return intval($timestamp / (24 * 3600));
}

?>
