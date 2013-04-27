<?php

include "../../mainfile.php";
include_once XOOPS_ROOT_PATH . '/class/pagenav.php';
include_once XOOPS_ROOT_PATH . "/class/xoopsformloader.php";
include_once XOOPS_ROOT_PATH . "/class/tree.php";
include_once XOOPS_ROOT_PATH . '/class/xoopsform/grouppermform.php';
include_once XOOPS_ROOT_PATH . '/modules/audio/include/functions.php';
include_once XOOPS_ROOT_PATH . '/modules/audio/class/mp3.php';

//permission
$gperm_handler = & xoops_gethandler ( 'groupperm' );
if (is_object ( $xoopsUser )) {
	$groups = $xoopsUser->getGroups ();
} else {
	$groups = XOOPS_GROUP_ANONYMOUS;
}

xoops_loadLanguage ( "admin", $xoopsModule->getVar ( "dirname", "e" ) );
$perm_submit = ($gperm_handler->checkRight ( 'audio_ac', 4, $groups, $xoopsModule->getVar ( 'mid' ) )) ? true : false;
$perm_modif = ($gperm_handler->checkRight ( 'audio_ac', 8, $groups, $xoopsModule->getVar ( 'mid' ) )) ? true : false;
$perm_vote = ($gperm_handler->checkRight ( 'audio_ac', 16, $groups, $xoopsModule->getVar ( 'mid' ) )) ? true : false;
$perm_upload = ($gperm_handler->checkRight ( 'audio_ac', 32, $groups, $xoopsModule->getVar ( 'mid' ) )) ? true : false;
$perm_autoapprove = ($gperm_handler->checkRight ( 'audio_ac', 64, $groups, $xoopsModule->getVar ( 'mid' ) )) ? true : false;
$perm_channel = ($gperm_handler->checkRight ( 'audio_ac', 128, $groups, $xoopsModule->getVar ( 'mid' ) )) ? true : false;

// pour les images des categories:
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

//appel des class
$downloadscat_Handler = & xoops_getModuleHandler ( 'audio_cat', 'audio' );
$downloads_Handler = & xoops_getModuleHandler ( 'audio_downloads', 'audio' );
$downloadsvotedata_Handler = & xoops_getModuleHandler ( 'audio_votedata', 'audio' );
$downloadsmod_Handler = & xoops_getModuleHandler ( 'audio_mod', 'audio' );
$downloadsbroken_Handler = & xoops_getModuleHandler ( 'audio_broken', 'audio' );
$downloadsfield_Handler = & xoops_getModuleHandler ( 'audio_field', 'audio' );
$downloadsfielddata_Handler = & xoops_getModuleHandler ( 'audio_fielddata', 'audio' );
$downloadsfieldmoddata_Handler = & xoops_getModuleHandler ( 'audio_modfielddata', 'audio' );
?>