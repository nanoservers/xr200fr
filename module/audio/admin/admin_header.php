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
include_once XOOPS_ROOT_PATH.'/modules/audio/class/mp3.php';
include_once XOOPS_ROOT_PATH.'/modules/audio/class/Serial.php';

include_once("../include/functions.php");
$xoopsModule = XoopsModule::getByDirname("audio");
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
$uploaddir = XOOPS_ROOT_PATH . '/uploads/audio/images/cats/';
$uploadurl = XOOPS_URL . '/uploads/audio/images/cats/';
$uploadpach = '/uploads/audio/images/cats/';
// pour les fichiers
$uploaddir_downloads = XOOPS_ROOT_PATH . '/uploads/audio/downloads/';
$uploadurl_downloads = XOOPS_URL . '/uploads/audio/downloads/';
$uploadpach_downloads = '/uploads/audio/downloads/';
// pour les fichiers
$uploaddir_mp3 = XOOPS_ROOT_PATH . '/uploads/audio/mp3/';
$uploadurl_mp3 = XOOPS_URL . '/uploads/audio/mp3/';
$uploadpach_mp3 = '/uploads/audio/mp3/';
// pour les logos
$uploaddir_shots = XOOPS_ROOT_PATH . '/uploads/audio/images/shots/';
$uploadurl_shots = XOOPS_URL . '/uploads/audio/images/shots/';
$uploadpach_shots = '/uploads/audio/images/shots/';
// pour les images des champs:
$uploaddir_field = XOOPS_ROOT_PATH . '/uploads/audio/images/field/';
$uploadurl_field = XOOPS_URL . '/uploads/audio/images/field/';
$uploadpach_field =  '/uploads/audio/images/field/';
/////////////

//appel des class
$downloadscat_Handler =& xoops_getModuleHandler('audio_cat', 'audio');
$downloads_Handler =& xoops_getModuleHandler('audio_downloads', 'audio');
$downloadsvotedata_Handler =& xoops_getModuleHandler('audio_votedata', 'audio');
$downloadsfield_Handler =& xoops_getModuleHandler('audio_field', 'audio');
$downloadsfielddata_Handler =& xoops_getModuleHandler('audio_fielddata', 'audio');
$downloadsbroken_Handler =& xoops_getModuleHandler('audio_broken', 'audio');
$downloadsmod_Handler =& xoops_getModuleHandler('audio_mod', 'audio');
$downloadsfieldmoddata_Handler =& xoops_getModuleHandler('audio_modfielddata', 'audio');
?>