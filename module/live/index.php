<?php

require '../../mainfile.php';
$xoopsOption['template_main'] = 'live_index.html';
include XOOPS_ROOT_PATH . '/header.php';
include XOOPS_ROOT_PATH . '/modules/live/include/functions.php';
include XOOPS_ROOT_PATH . '/modules/live/class/channel.php';

$channel_handler = xoops_getmodulehandler('channel', 'live');
$op = live_CleanVars ( $_REQUEST, 'op', 'new', 'string' );

$xoTheme->addStylesheet(XOOPS_URL . '/modules/live/css/style.css');

//Set public points
$wms = xoops_getModuleOption ( 'live_wms', 'live' );
$fpl = xoops_getModuleOption ( 'live_fpl', 'live' );
$fpm = xoops_getModuleOption ( 'live_fpm', 'live' );
$fph = xoops_getModuleOption ( 'live_fph', 'live' );

//Set URL
$rtmpurl = xoops_getModuleOption ( 'live_rtmpurl', 'live' );
$rtspurl = xoops_getModuleOption ( 'live_rtspurl', 'live' );
$httpurl = xoops_getModuleOption ( 'live_httpurl', 'live' );
$wmsurl = xoops_getModuleOption ( 'live_wmsurl', 'live' );

switch($op) {
	// Flash player
	case 'fpl':
	   $xoTheme->addScript(XOOPS_URL . '/modules/live/js/jwplayer/jwplayer.js');
	   $xoopsTpl->assign ( 'width', xoops_getModuleOption ( 'fplw', 'live' ) );
	   $xoopsTpl->assign ( 'height', xoops_getModuleOption ( 'fplh', 'live' ) );
	   $pagelink = ' &raquo; '._MD_LIVE_FPL;
		break;
		
	case 'fpm':
	   $xoTheme->addScript(XOOPS_URL . '/modules/live/js/jwplayer/jwplayer.js');
	   $xoopsTpl->assign ( 'width', xoops_getModuleOption ( 'fpmw', 'live' ) );
	   $xoopsTpl->assign ( 'height', xoops_getModuleOption ( 'fpmh', 'live' ) );
	   $pagelink = ' &raquo; '._MD_LIVE_FPM;
		break;
		
	case 'fph':
	   $xoTheme->addScript(XOOPS_URL . '/modules/live/js/jwplayer/jwplayer.js');
      $xoopsTpl->assign ( 'width', xoops_getModuleOption ( 'fphw', 'live' ) );
	   $xoopsTpl->assign ( 'height', xoops_getModuleOption ( 'fphh', 'live' ) );
		$pagelink = ' &raquo; '._MD_LIVE_FPH;
		break;
	
	// Silverligth
	case 'sll':
	   $xoTheme->addScript(XOOPS_URL . '/modules/live/js/silverlight.js');
	   $xoTheme->addStylesheet(XOOPS_URL . '/modules/live/css/silverlight.css');
	   $xoopsTpl->assign ( 'width', xoops_getModuleOption ( 'fplw', 'live' ) );
	   $xoopsTpl->assign ( 'height', xoops_getModuleOption ( 'fplh', 'live' ) );
	   $pagelink = ' &raquo; '._MD_LIVE_SLL;
		break;
		
	case 'slm':
	   $xoTheme->addScript(XOOPS_URL . '/modules/live/js/silverlight.js');
	   $xoTheme->addStylesheet(XOOPS_URL . '/modules/live/css/silverlight.css');
	   $xoopsTpl->assign ( 'width', xoops_getModuleOption ( 'fpmw', 'live' ) );
	   $xoopsTpl->assign ( 'height', xoops_getModuleOption ( 'fpmh', 'live' ) );
	   $pagelink = ' &raquo; '._MD_LIVE_SLM;
		break;
		
	case 'slh':
	   $xoTheme->addScript(XOOPS_URL . '/modules/live/js/silverlight.js');
	   $xoTheme->addStylesheet(XOOPS_URL . '/modules/live/css/silverlight.css');
      $xoopsTpl->assign ( 'width', xoops_getModuleOption ( 'fphw', 'live' ) );
	   $xoopsTpl->assign ( 'height', xoops_getModuleOption ( 'fphh', 'live' ) );
	   $pagelink = ' &raquo; '._MD_LIVE_SLH;
		break;
	
	// Media player		
	case 'wms':
      $xoopsTpl->assign ( 'width', xoops_getModuleOption ( 'wmsw', 'live' ) );
	   $xoopsTpl->assign ( 'height', xoops_getModuleOption ( 'wmsh', 'live' ) );
	   $pagelink = ' &raquo; '._MD_LIVE_WMS;
		break;	
		
	default:
	case 'default':  
	   $pagelink = '';
		break;			
}

//hits
$obj = $channel_handler->get ('1');
$hits = $obj->getVar ( 'channel_hits' ) + 1;
$obj->setVar ( 'channel_hits', $hits );
$channel_handler->insert ( $obj );

//Breadcrumb
$indexlink = '<a title="" href="'.XOOPS_URL.'">'._MD_LIVE_HOME.'</a>';
$modulelink = ' &raquo; <a title="'._MD_LIVE_INDEX.'" href="'.XOOPS_URL.'/modules/live">'._MD_LIVE_INDEX.'</a>';
$breadcrumb = $indexlink . $modulelink . $pagelink;

$xoopsTpl->assign ( 'wms', $wms );
$xoopsTpl->assign ( 'fpl', $fpl );
$xoopsTpl->assign ( 'fpm', $fpm );
$xoopsTpl->assign ( 'fph', $fph );

$xoopsTpl->assign ( 'rtmpurl', $rtmpurl );
$xoopsTpl->assign ( 'rtspurl', $rtspurl );
$xoopsTpl->assign ( 'httpurl', $httpurl );
$xoopsTpl->assign ( 'wmsurl', $wmsurl );

$xoopsTpl->assign ( 'op', $op );
$xoopsTpl->assign ( 'breadcrumb', $breadcrumb );
$xoopsTpl->assign ( 'imgurl', XOOPS_URL . '/modules/live/images' );
$xoopsTpl->assign ( 'moduleurl', XOOPS_URL . '/modules/live' );
$xoopsTpl->assign ( 'logourl', XOOPS_URL . xoops_getModuleOption ( 'player_logo', 'live' ) );
$xoopsTpl->assign ( 'title', xoops_getModuleOption ( 'title', 'live' ) );
$xoopsTpl->assign ( 'desc', xoops_getModuleOption ( 'desc', 'live' ) );
$xoopsTpl->assign ( 'hits', $hits );

include XOOPS_ROOT_PATH.'/footer.php';
?>