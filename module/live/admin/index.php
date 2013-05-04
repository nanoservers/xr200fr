<?php
require 'header.php';
xoops_cp_header();
$index_admin = new ModuleAdmin();

$xoopsTpl->assign('renderindex', $index_admin->renderIndex());
// Call template file
$xoopsTpl->display(XOOPS_ROOT_PATH . '/modules/live/templates/admin/live_index.html');
// footer
xoops_cp_footer();
?> 
