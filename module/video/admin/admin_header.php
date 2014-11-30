<?php

// Include xoops admin header
include_once '../../../include/cp_header.php';
//die("Serial Register");
include_once(XOOPS_ROOT_PATH."/class/xoopsmodule.php");
include_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";
include_once XOOPS_ROOT_PATH."/class/tree.php";
include_once XOOPS_ROOT_PATH."/class/xoopslists.php";
include_once XOOPS_ROOT_PATH.'/class/pagenav.php';
include_once XOOPS_ROOT_PATH.'/class/xoopsform/grouppermform.php';
include_once XOOPS_ROOT_PATH.'/modules/video/class/flv.php';
include_once XOOPS_ROOT_PATH.'/modules/video/class/mp4.php';
include_once XOOPS_ROOT_PATH.'/modules/video/class/3gp.php';
include_once XOOPS_ROOT_PATH.'/modules/video/class/frame.php';
include_once XOOPS_ROOT_PATH.'/modules/video/class/Serial.php';

include_once("../include/functions.php");
$xoopsModule = XoopsModule::getByDirname("video");
if ( $xoopsUser ) {
	if ( !$xoopsUser->isAdmin($xoopsModule->mid()) ) {
		redirect_header(XOOPS_URL."/",3,_NOPERM);
		exit();
	}
} else {
	redirect_header(XOOPS_URL."/",3,_NOPERM);
	exit();
}

$serObj = new Serial(8);
$GenSerialStr = XOOPS_URL . $_SERVER['SERVER_ADDR'];
$serial = $xoopsModuleConfig['serial'];
if ( !$serObj->validate($serial,$GenSerialStr) ) {
	//redirect_header(XOOPS_URL."/modules/system/admin.php?fct=preferences&op=showmod&mod=".$xoopsModule->mid(),3,_REGISTER_ERROR .'<BR/>'.XOOPS_URL);
	//exit();
}

// Include language file
xoops_loadLanguage('admin', 'system');
xoops_loadLanguage('admin', $xoopsModule->getVar('dirname', 'e'));
xoops_loadLanguage('modinfo', $xoopsModule->getVar('dirname', 'e'));

//param�tres:
// pour les images des cat�gories:
$uploaddir = XOOPS_ROOT_PATH . '/uploads/video/images/cats/';
$uploadurl = XOOPS_URL . '/uploads/video/images/cats/';
$uploadpach = '/uploads/video/images/cats/';
// pour les fichiers
$uploaddir_downloads = XOOPS_ROOT_PATH . '/uploads/video/downloads/';
$uploadurl_downloads = XOOPS_URL . '/uploads/video/downloads/';
$uploadpach_downloads = '/uploads/video/downloads/';
// pour les fichiers
$uploaddir_flv = XOOPS_ROOT_PATH . '/uploads/video/flv/';
$uploadurl_flv = XOOPS_URL . '/uploads/video/flv/';
$uploadpach_flv = '/uploads/video/flv/';
// pour les fichiers
$uploaddir_mp4 = XOOPS_ROOT_PATH . '/uploads/video/mp4/';
$uploadurl_mp4 = XOOPS_URL . '/uploads/video/mp4/';
$uploadpach_mp4 = '/uploads/video/mp4/';
// pour les logos
$uploaddir_shots = XOOPS_ROOT_PATH . '/uploads/video/images/shots/';
$uploadurl_shots = XOOPS_URL . '/uploads/video/images/shots/';
$uploadpach_shots = '/uploads/video/images/shots/';
// pour les images des champs:
$uploaddir_field = XOOPS_ROOT_PATH . '/uploads/video/images/field/';
$uploadurl_field = XOOPS_URL . '/uploads/video/images/field/';
$uploadpach_field =  '/uploads/video/images/field/';
/////////////

//appel des class
$downloadscat_Handler =& xoops_getModuleHandler('video_cat', 'video');
$downloads_Handler =& xoops_getModuleHandler('video_downloads', 'video');
$downloadsvotedata_Handler =& xoops_getModuleHandler('video_votedata', 'video');
$downloadsfield_Handler =& xoops_getModuleHandler('video_field', 'video');
$downloadsfielddata_Handler =& xoops_getModuleHandler('video_fielddata', 'video');
$downloadsbroken_Handler =& xoops_getModuleHandler('video_broken', 'video');
$downloadsmod_Handler =& xoops_getModuleHandler('video_mod', 'video');
$downloadsfieldmoddata_Handler =& xoops_getModuleHandler('video_modfielddata', 'video');
?>