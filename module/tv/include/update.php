<?php
function xoops_module_update_tv() {
	$sql = "ALTER TABLE `" . $db->prefix('tv_list') . "` ADD `list_minute2` tinyint(3) NOT NULL;";
	
	$sql = "ALTER TABLE `" . $db->prefix('tv_list') . "` ADD `list_hour2` tinyint(3) NOT NULL;";
	
	$sql = "ALTER TABLE `" . $db->prefix('tv_list') . "` ADD `list_minute3` tinyint(3) NOT NULL;";
	
	$sql = "ALTER TABLE `" . $db->prefix('tv_list') . "` ADD `list_hour3` tinyint(3) NOT NULL;";
	return true;
?>