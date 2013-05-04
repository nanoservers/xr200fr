<?php

require '../../mainfile.php';
include XOOPS_ROOT_PATH . '/modules/tv/include/functions.php';
$item_handler = xoops_getmodulehandler('item', 'tv');
$list_handler = xoops_getmodulehandler('list', 'tv');

$xoopsOption['template_main'] = 'tv_index.html';
include XOOPS_ROOT_PATH.'/header.php';

$day = tv_CleanVars($_REQUEST, 'day', '', 'int');
if($day) {
	$day = $day - 1;
}	

$xoTheme->addStylesheet ( XOOPS_URL . '/modules/tv/css/style.css', null );
$xoTheme->addStylesheet ( XOOPS_URL . '/modules/system/css/ui/' . xoops_getModuleOption ( 'jquery_theme', 'system' ) . '/ui.all.css' );

$xoTheme->addScript ( 'browse.php?Frameworks/jquery/jquery.js' );
$xoTheme->addScript ( 'browse.php?Frameworks/jquery/plugins/jquery.ui.js' );
$tab = "
$(function() {
	$('#info-tab').tabs({
		collapsible: true ,
		selected: " . $day . " ,
	});
});
";
$xoTheme->addScript ( null, array ('type' => 'text/javascript', 'charset' => _CHARSET ), $tab );  

$lists = $list_handler->userList();

$xoopsTpl->assign ( 'lists', $lists );

include XOOPS_ROOT_PATH.'/footer.php';
?>