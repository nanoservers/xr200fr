<?php 
include 'header.php';
$xoopsOption['template_main'] = 'lives_index.html';
include XOOPS_ROOT_PATH . '/header.php';

// Add css
$xoTheme->addStylesheet(XOOPS_URL . '/modules/lives/css/style.css');

$channel = lives_CleanVars ( $_GET, 'channel', '', 'string' );
$id = lives_CleanVars ( $_GET, 'id', '', 'int' );
$op = lives_CleanVars ( $_GET, 'op', 'list', 'string' );

if(empty($channel) && empty($id)) {
	// Get channel info
	$channels = $channel_handler->UserList();
   $xoopsTpl->assign('channels', $channels);
	$type = 'list';
	$channellink = '';
	$pagelink = '';
} else {
	// Check set id
	if(!isset($id)) {
		redirect_header ( 'index.php', 3, _MD_LIVES_NONEXISTENT );
	   exit ();
	}	
	// Get channel info
	$obj = $channel_handler->get($id);
	$channel = $obj->toArray();
	// Check 
	if($channel['channel_id']  && $channel['channel_status'] != 1) {
		redirect_header ( 'index.php', 3, _MD_LIVES_NONEXISTENT );
	   exit ();
	}	

	switch($op) {
		// Flash player
		case 'fpl':
		   $xoTheme->addScript(XOOPS_URL . '/modules/lives/js/jwplayer/jwplayer.js');
		   $xoopsTpl->assign ( 'width', xoops_getModuleOption ( 'fplw', 'lives' ) );
		   $xoopsTpl->assign ( 'height', xoops_getModuleOption ( 'fplh', 'lives' ) );
		   $pagelink = ' &raquo; '._MD_LIVES_FPL;
			break;
			
		case 'fpm':
		   $xoTheme->addScript(XOOPS_URL . '/modules/lives/js/jwplayer/jwplayer.js');
		   $xoopsTpl->assign ( 'width', xoops_getModuleOption ( 'fpmw', 'lives' ) );
		   $xoopsTpl->assign ( 'height', xoops_getModuleOption ( 'fpmh', 'lives' ) );
		   $pagelink = ' &raquo; '._MD_LIVES_FPM;
			break;
			
		case 'fph':
		   $xoTheme->addScript(XOOPS_URL . '/modules/lives/js/jwplayer/jwplayer.js');
	      $xoopsTpl->assign ( 'width', xoops_getModuleOption ( 'fphw', 'lives' ) );
		   $xoopsTpl->assign ( 'height', xoops_getModuleOption ( 'fphh', 'lives' ) );
			$pagelink = ' &raquo; '._MD_LIVES_FPH;
			break;
		
		// Silverligth
		case 'sll':
		   $xoTheme->addScript(XOOPS_URL . '/modules/lives/js/silverlight.js');
		   $xoTheme->addStylesheet(XOOPS_URL . '/modules/lives/css/silverlight.css');
		   $xoopsTpl->assign ( 'width', xoops_getModuleOption ( 'fplw', 'lives' ) );
		   $xoopsTpl->assign ( 'height', xoops_getModuleOption ( 'fplh', 'lives' ) );
		   $pagelink = ' &raquo; '._MD_LIVES_SLL;
			break;
			
		case 'slm':
		   $xoTheme->addScript(XOOPS_URL . '/modules/lives/js/silverlight.js');
		   $xoTheme->addStylesheet(XOOPS_URL . '/modules/lives/css/silverlight.css');
		   $xoopsTpl->assign ( 'width', xoops_getModuleOption ( 'fpmw', 'lives' ) );
		   $xoopsTpl->assign ( 'height', xoops_getModuleOption ( 'fpmh', 'lives' ) );
		   $pagelink = ' &raquo; '._MD_LIVES_SLM;
			break;
			
		case 'slh':
		   $xoTheme->addScript(XOOPS_URL . '/modules/lives/js/silverlight.js');
		   $xoTheme->addStylesheet(XOOPS_URL . '/modules/lives/css/silverlight.css');
	      $xoopsTpl->assign ( 'width', xoops_getModuleOption ( 'fphw', 'lives' ) );
		   $xoopsTpl->assign ( 'height', xoops_getModuleOption ( 'fphh', 'lives' ) );
		   $pagelink = ' &raquo; '._MD_LIVES_SLH;
			break;
		
		// Media player		
		case 'wms':
	      $xoopsTpl->assign ( 'width', xoops_getModuleOption ( 'wmsw', 'lives' ) );
		   $xoopsTpl->assign ( 'height', xoops_getModuleOption ( 'wmsh', 'lives' ) );
		   $pagelink = ' &raquo; '._MD_LIVES_WMS;
			break;	
			
		default:
		case 'default':  
		   $pagelink = '';
			break;			
	}
   
   //hits
	$obj->setVar ( 'channel_hits', $channel['channel_hits'] + 1);
	$channel_handler->insert ( $obj );

	// Set config
	$url = XOOPS_URL . '/modules/lives/index.php?id=' . $channel['channel_id'] . '&amp;channel=' . $channel['channel_alias'];
	$config['wmslink'] = $url . '&amp;op=wms';
	$config['fpllink'] = $url . '&amp;op=fpl';
	$config['fpmlink'] = $url . '&amp;op=fpm';
	$config['fphlink'] = $url . '&amp;op=fph';
	$config['slllink'] = $url . '&amp;op=sll';
	$config['slmlink'] = $url . '&amp;op=slm';
	$config['slhlink'] = $url . '&amp;op=slh';
	
	// Set view
	$xoopsTpl->assign('channel', $channel);
	$xoopsTpl->assign('config', $config);
	$xoopsTpl->assign('op', $op);
	$type = 'channel';
	$channellink = ' &raquo; <a title="' . $channel['channel_title'] . '" href="' . $url . '">' . $channel['channel_title'] . '</a>';
}

$mainlink = '<a title="' . _MD_LIVES_HOME . '" href="' . XOOPS_URL . '">' . _MD_LIVES_HOME . '</a> &raquo; ';
$mainlink .= '<a title="' . _MD_LIVES_LIVES . '" href="' . XOOPS_URL . '/modules/lives">' . _MD_LIVES_LIVES . '</a>';

$xoopsTpl->assign('type', $type);
$xoopsTpl->assign('breadcrumb', $mainlink . $channellink . $pagelink);
$xoopsTpl->assign ( 'imgurl', XOOPS_URL . '/modules/lives/images' );
$xoopsTpl->assign ( 'moduleurl', XOOPS_URL . '/modules/lives' );

include XOOPS_ROOT_PATH.'/footer.php';
?>