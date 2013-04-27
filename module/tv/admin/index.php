<?php
require 'header.php';
xoops_cp_header();
$index_admin = new ModuleAdmin();

$folder = array(
	XOOPS_ROOT_PATH . '/uploads/tv/', 
);

$index_admin = new ModuleAdmin();
$index_admin->addInfoBox(_AM_TV_INDEX_INFO);
$index_admin->addInfoBoxLine(_AM_TV_INDEX_INFO, _AM_TV_INDEX_LISTS, $list_handler->listCount());
$index_admin->addInfoBoxLine(_AM_TV_INDEX_INFO, _AM_TV_INDEX_ITEMS, $item_handler->itemCount());


foreach (array_keys( $folder) as $i) {
    $index_admin->addConfigBoxLine($folder[$i], 'folder');
    $index_admin->addConfigBoxLine(array($folder[$i], '777'), 'chmod');
}

$xoopsTpl->assign('renderindex', $index_admin->renderIndex());
// Call template file
$xoopsTpl->display(XOOPS_ROOT_PATH . '/modules/tv/templates/admin/tv_index.html');
// footer
xoops_cp_footer();
?>