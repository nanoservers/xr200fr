<?php 
// Call header
require dirname(__FILE__) . '/header.php';
// Display Admin menu class
$admin_class->addInfoBox(_AM_CV_INDEX_ADMENU1);
$admin_class->addInfoBoxLine(_AM_CV_INDEX_ADMENU1, _AM_CV_INDEX_TOTAL, '');
$xoopsTpl->assign('renderindex', $admin_class->renderIndex());
// Call template file
$xoopsTpl->display(XOOPS_ROOT_PATH . '/modules/cv/templates/admin/cv_index.html');
// Call footer
require dirname(__FILE__) . '/footer.php';
?>