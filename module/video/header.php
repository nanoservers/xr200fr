<?php

include "../../mainfile.php";
include_once XOOPS_ROOT_PATH . '/class/pagenav.php';
include_once XOOPS_ROOT_PATH . "/class/xoopsformloader.php";
include_once XOOPS_ROOT_PATH . "/class/tree.php";
include_once XOOPS_ROOT_PATH . '/class/xoopsform/grouppermform.php';
include_once XOOPS_ROOT_PATH . '/modules/video/include/functions.php';
include_once XOOPS_ROOT_PATH . '/modules/video/class/flv.php';
include_once XOOPS_ROOT_PATH . '/modules/video/class/mp4.php';
include_once XOOPS_ROOT_PATH . '/modules/video/class/3gp.php';
include_once XOOPS_ROOT_PATH . '/modules/video/class/frame.php';

//permission
$gperm_handler = & xoops_gethandler ( 'groupperm' );
if (is_object ( $xoopsUser )) {
	$groups = $xoopsUser->getGroups ();
} else {
	$groups = XOOPS_GROUP_ANONYMOUS;
}

xoops_loadLanguage ( "admin", $xoopsModule->getVar ( "dirname", "e" ) );
$perm_submit = ($gperm_handler->checkRight ( 'video_ac', 4, $groups, $xoopsModule->getVar ( 'mid' ) )) ? true : false;
$perm_modif = ($gperm_handler->checkRight ( 'video_ac', 8, $groups, $xoopsModule->getVar ( 'mid' ) )) ? true : false;
$perm_vote = ($gperm_handler->checkRight ( 'video_ac', 16, $groups, $xoopsModule->getVar ( 'mid' ) )) ? true : false;
$perm_upload = ($gperm_handler->checkRight ( 'video_ac', 32, $groups, $xoopsModule->getVar ( 'mid' ) )) ? true : false;
$perm_autoapprove = ($gperm_handler->checkRight ( 'video_ac', 64, $groups, $xoopsModule->getVar ( 'mid' ) )) ? true : false;
$perm_channel = ($gperm_handler->checkRight ( 'video_ac', 128, $groups, $xoopsModule->getVar ( 'mid' ) )) ? true : false;

// pour les images des categories:
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

//appel des class
$downloadscat_Handler = & xoops_getModuleHandler ( 'video_cat', 'video' );
$downloads_Handler = & xoops_getModuleHandler ( 'video_downloads', 'video' );
$downloadsvotedata_Handler = & xoops_getModuleHandler ( 'video_votedata', 'video' );
$downloadsmod_Handler = & xoops_getModuleHandler ( 'video_mod', 'video' );
$downloadsbroken_Handler = & xoops_getModuleHandler ( 'video_broken', 'video' );
$downloadsfield_Handler = & xoops_getModuleHandler ( 'video_field', 'video' );
$downloadsfielddata_Handler = & xoops_getModuleHandler ( 'video_fielddata', 'video' );
$downloadsfieldmoddata_Handler = & xoops_getModuleHandler ( 'video_modfielddata', 'video' );
?>