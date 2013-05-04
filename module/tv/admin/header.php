<?php
require '../../../mainfile.php';
require_once XOOPS_ROOT_PATH . '/include/cp_header.php';
require_once XOOPS_ROOT_PATH . '/class/tree.php';
include_once XOOPS_ROOT_PATH . '/class/pagenav.php';

include XOOPS_ROOT_PATH . '/modules/tv/include/functions.php';
 
if ( file_exists($GLOBALS['xoops']->path('/Frameworks/moduleclasses/moduleadmin/moduleadmin.php'))){
   include_once $GLOBALS['xoops']->path('/Frameworks/moduleclasses/moduleadmin/moduleadmin.php');
   //return true;
}else{
   redirect_header("../../../admin.php", 5, _AM_MODULEADMIN_MISSING, false); 
   //return false;
}

xoops_load('xoopsformloader');
 
 
$item_handler = xoops_getmodulehandler('item', 'tv');
$list_handler = xoops_getmodulehandler('list', 'tv');
 
?>