<?php

require '../../mainfile.php';
include XOOPS_ROOT_PATH . '/modules/tv/include/functions.php';
$item_handler = xoops_getmodulehandler('item', 'tv');
$list_handler = xoops_getmodulehandler('list', 'tv');

$xoopsOption['template_main'] = 'tv_program.html';
include XOOPS_ROOT_PATH.'/header.php';

$id = tv_CleanVars($_REQUEST, 'id', '', 'int');
if (!$id) {
	redirect_header ( 'index.php', 1, _MD_TV_MSG_ERROR );
	exit ();
}	


$obj = $item_handler->get($id);
$program = $obj->toArray ();

if (!$program ['item_status']) {
	redirect_header ( 'index.php', 1, _MD_TV_MSG_ERROR );
	exit ();
}	

$program ['item_created'] = formatTimestamp ( $program ['item_created'], _MEDIUMDATESTRING );
$program ['item_imgurl'] = XOOPS_URL . '/uploads/tv/' . $program ['item_img'];
$program ['item_words'] = tv_setwords($program ['item_title']);

if (isset ( $xoTheme ) && is_object ( $xoTheme )) {
	$xoTheme->addMeta ( 'meta', 'keywords', $program ['item_words'] );
	$xoTheme->addMeta ( 'meta', 'description', $program ['item_title'] );
} elseif (isset ( $xoopsTpl ) && is_object ( $xoopsTpl )) {
	$xoopsTpl->assign ( 'xoops_meta_keywords', $program ['item_words'] );
	$xoopsTpl->assign ( 'xoops_meta_description', $program ['item_title'] );
}

$xoopsTpl->assign ( 'xoops_pagetitle', $program ['item_title'] );
$xoopsTpl->assign ( 'program', $program );

include XOOPS_ROOT_PATH.'/footer.php';
?>