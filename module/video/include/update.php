<?php
function xoops_module_update_video() {
	$sql = "ALTER TABLE `" . $db->prefix('video_downloads') . "` CHANGE `top` `top` TINYINT( 1 ) NOT NULL DEFAULT '0' ;";
	$sql = "ALTER TABLE `" . $db->prefix('video_cat') . "` ADD `cat_tab` TINYINT( 1 ) NOT NULL DEFAULT '0' ;";
	$sql = "ALTER TABLE `" . $db->prefix('video_downloads') . "` ADD `extra` TEXT NOT NULL;";
	$sql = "ALTER TABLE `" . $db->prefix('video_downloads') . "` ADD `related` VARCHAR( 255 ) NOT NULL DEFAULT '' ;";
?>