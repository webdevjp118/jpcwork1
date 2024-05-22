<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Include the {@link shared.make_timestamp.php} plugin
 */
require_once $smarty->_get_plugin_filepath('shared', 'make_timestamp');
/**
 * Smarty date_timestamp modifier plugin
 *
 * Type:     modifier<br>
 * Name:     date_timestamp<br>
 * Purpose:  date to timestamp<br>
 * @return timestamp
 * @uses smarty_make_timestamp()
 */
function smarty_modifier_date_timestamp($string, $target_date = '')
{
	if ($string != '') {
		$timestamp = smarty_make_timestamp($string);
	} else {
		$timestamp = time();
	}
	if ($target_date == 'diff') {
		$timestamp = time() - $timestamp;
	}
	return $timestamp;
}

/* vim: set expandtab: */

?>
