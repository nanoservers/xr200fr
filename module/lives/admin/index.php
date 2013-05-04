<?php
require 'header.php';
xoops_cp_header();
$index_admin = new ModuleAdmin();

$folder = array(
	XOOPS_ROOT_PATH . '/uploads/lives/', 
);

$index_admin = new ModuleAdmin();
$index_admin->addInfoBox(_AM_LIVES_INDEX_INFO);
$index_admin->addInfoBoxLine(_AM_LIVES_INDEX_INFO, _AM_LIVES_INDEX_CHANNEL, $channel_handler->Count());


foreach (array_keys( $folder) as $i) {
    $index_admin->addConfigBoxLine($folder[$i], 'folder');
    $index_admin->addConfigBoxLine(array($folder[$i], '777'), 'chmod');
}

$xoopsTpl->assign('renderindex', $index_admin->renderIndex());
// Call template file
$xoopsTpl->display(XOOPS_ROOT_PATH . '/modules/lives/templates/admin/lives_index.html');
// footer
xoops_cp_footer();
?>