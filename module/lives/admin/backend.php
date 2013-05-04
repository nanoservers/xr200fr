<?php
require 'header.php';

$op = lives_CleanVars ( $_REQUEST, 'op', 'add', 'string' );
// Admin header
xoops_cp_header ();
// Redirect to content page
if (! isset ( $_REQUEST )) {
	
	redirect_header("index.php", 3, _AM_SLIDESHOW_MSG_NOTINFO);
	// Include footer
	xoops_cp_footer ();
	exit ();
}
 
switch ($op) {
		
	case 'add' :
		$obj = $channel_handler->create ();
		$obj->setVars ( $_POST );
		$obj->setVar ( 'channel_create', time () );
		$obj->setVar ( 'channel_order', $channel_handler->setOrder() );
		$obj->setVar ( 'channel_img', $channel_handler->uploadImg ( $_POST ['channel_img'] ) );
		if (! $channel_handler->insert ( $obj )) {
			redirect_header ( 'onclick="javascript:history.go(-1);"', 1, _AM_LIVES_MSG_ERROR );
			xoops_cp_footer ();
			exit ();
		} else {
			// Redirect page
			redirect_header ( 'channel.php', 1, _AM_LIVES_MSG_WAIT );
			xoops_cp_footer ();
			exit ();
		}
		break;
		
	case 'edit' :
	   $channel_id = lives_CleanVars ( $_POST, 'channel_id', 0, 'int' );
		if ($channel_id > 0) {
		   $obj = $channel_handler->get ($channel_id);
			$obj->setVars ( $_POST );
			$obj->setVar ( 'channel_img', $channel_handler->uploadImg ($_POST ['channel_img'] ) );
		
			if (! $channel_handler->insert ( $obj )) {
				redirect_header ( 'onclick="javascript:history.go(-1);"', 1, _AM_LIVES_MSG_ERROR );
				xoops_cp_footer ();
				exit ();
			}
		}
		// Redirect page
		redirect_header ( 'channel.php', 1, _AM_LIVES_MSG_WAIT );
		xoops_cp_footer ();
		exit ();
		break;	
		
	case 'delete' :
	   $channel_id = lives_CleanVars ( $_POST, 'channel_id', 0, 'int' );
	   $obj = $channel_handler->get ( $channel_id );
	   unlink(XOOPS_URL . '/uploads/lives/' .$obj->getVar ( 'channel_img'));
		if (! $channel_handler->delete ( $obj )) {
			echo $obj->getHtmlErrors ();
		}
		// Redirect page
		redirect_header ( 'channel.php', 1, _AM_LIVES_MSG_WAIT );
		xoops_cp_footer ();
		exit ();
		break;	
		
	 case 'channel_status' :
		$channel_id = lives_CleanVars ( $_POST, 'channel_id', 0, 'int' );
		if ($channel_id > 0) {
			$obj = & $channel_handler->get ( $channel_id );
			$old = $obj->getVar ( 'channel_status' );
			$obj->setVar ( 'channel_status', ! $old );
			if ($channel_handler->insert ( $obj )) {
				exit ();
			}
			echo $obj->getHtmlErrors ();
		}
		break;
	
}

// Redirect page
redirect_header("index.php", 3, _AM_LIVES_MSG_NOTINFO);
// Include footer
xoops_cp_footer ();
exit ();
?>