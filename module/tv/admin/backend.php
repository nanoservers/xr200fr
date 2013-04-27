<?php
require 'header.php';

$op = tv_CleanVars ( $_REQUEST, 'op', 'new', 'string' );
// Admin header
xoops_cp_header ();
// Redirect to content page
if (! isset ( $_REQUEST )) {
	
	redirect_header("index.php", 3, _AM_TV_MSG_NOTINFO);
	// Include footer
	xoops_cp_footer ();
	exit ();
}
 
switch ($op) {
	case 'addlist' :
	   $obj = $list_handler->create ();
		$obj->setVars ( $_REQUEST );
		$obj->setVar ( 'list_created', time () );
		$obj->setVar ( 'list_order', $list_handler->setorder() );
		if (! $list_handler->insert ( $obj )) {
			redirect_header ( 'onclick="javascript:history.go(-1);"', 1, _AM_TV_MSG_ERROR );
			xoops_cp_footer ();
			exit ();
		}
		
		// Redirect page
		redirect_header ( 'list.php', 1, _AM_TV_MSG_WAIT );
		xoops_cp_footer ();
		exit ();
		break;
		
	case 'editlist' :
		$list_id = tv_CleanVars ( $_REQUEST, 'list_id', 0, 'int' );
		if ($list_id > 0) {
			$obj = $list_handler->get ( $list_id );
			$obj->setVars ( $_POST );
			
			if (! $list_handler->insert ( $obj )) {
				redirect_header ( 'onclick="javascript:history.go(-1);"', 1, _AM_TV_MSG_ERROR );
				xoops_cp_footer ();
				exit ();
			}
		}	
		
		// Redirect page
		redirect_header ( 'list.php', 1, _AM_TV_MSG_WAIT );
		xoops_cp_footer ();
		exit ();
		break;
	
	case 'deletelist' :
	   $list_id = tv_CleanVars ( $_REQUEST, 'list_id', 0, 'int' );
	   $obj = $list_handler->get ( $list_id );
		if (! $list_handler->delete ( $obj )) {
			echo $obj->getHtmlErrors ();
		}
		
		// Redirect page
		redirect_header ( 'list.php', 1, _AM_TV_MSG_WAIT );
		xoops_cp_footer ();
		exit ();
		break;
		
	case 'additem' :
		$obj = $item_handler->create ();
		$obj->setVars ( $_REQUEST );
		$obj->setVar ( 'item_created', time () );
		
		$item_handler->uploadimg ( $obj, $_REQUEST ['item_img'] );

		if (! $item_handler->insert ( $obj )) {
			redirect_header ( 'onclick="javascript:history.go(-1);"', 1, _AM_TV_MSG_ERROR );
			xoops_cp_footer ();
			exit ();
		}
		
		// Redirect page
		redirect_header ( 'item.php', 1, _AM_TV_MSG_WAIT );
		xoops_cp_footer ();
		exit ();
		break;
		
	case 'edititem' :
	   $item_id = tv_CleanVars ( $_REQUEST, 'item_id', 0, 'int' );
		if ($item_id > 0) {
		   $obj = $item_handler->get ($item_id);
			$obj->setVars ( $_REQUEST );
			
			$obj->setVar ( 'item_order', $item_handler->setitemorder() );
			$item_handler->uploadimg ( $obj, $_REQUEST ['item_img'] );
			
			if($_REQUEST['item_default'] == 1) {
				$item_handler->updateAll ( 'item_default', 0, $obj );
			}
		
			if (! $item_handler->insert ( $obj )) {
				redirect_header ( 'onclick="javascript:history.go(-1);"', 1, _AM_TV_MSG_ERROR );
				xoops_cp_footer ();
				exit ();
			}
		}
		// Redirect page
		redirect_header ( 'item.php', 1, _AM_TV_MSG_WAIT );
		xoops_cp_footer ();
		exit ();
		break;	
		
	case 'deleteitem' :
	   $item_id = tv_CleanVars ( $_REQUEST, 'item_id', 0, 'int' );
	   $obj = $item_handler->get ( $item_id );
	   unlink(XOOPS_URL . '/uploads/slideshow/' .$obj->getVar ( 'item_img'));
		if (! $item_handler->delete ( $obj )) {
			echo $obj->getHtmlErrors ();
		}
		// Redirect page
		redirect_header ( 'item.php', 1, _AM_TV_MSG_WAIT );
		xoops_cp_footer ();
		exit ();
		break;	
		
	 case 'item_status' :
		$item_id = tv_CleanVars ( $_REQUEST, 'item_id', 0, 'int' );
		if ($item_id > 0) {
			$obj = & $item_handler->get ( $item_id );
			$old = $obj->getVar ( 'item_status' );
			$obj->setVar ( 'item_status', ! $old );
			if ($item_handler->insert ( $obj )) {
				exit ();
			}
			echo $obj->getHtmlErrors ();
		}
		break;
		
	 case 'item_select' :
		$item_id = tv_CleanVars ( $_REQUEST, 'item_id', 0, 'int' );
		if ($item_id > 0) {
			$obj = & $item_handler->get ( $item_id );
			$old = $obj->getVar ( 'item_select' );
			$obj->setVar ( 'item_select', ! $old );
			if ($item_handler->insert ( $obj )) {
				exit ();
			}
			echo $obj->getHtmlErrors ();
		}
		break;	
		
	 case 'list_status' :
		$list_id = tv_CleanVars ( $_REQUEST, 'list_id', 0, 'int' );
		if ($list_id > 0) {
			$obj = & $list_handler->get ( $list_id );
			$old = $obj->getVar ( 'list_status' );
			$obj->setVar ( 'list_status', ! $old );
			if ($list_handler->insert ( $obj )) {
				exit ();
			}
			echo $obj->getHtmlErrors ();
		}
		break;	
		
}

// Redirect page
redirect_header("index.php", 3, _AM_TV_MSG_NOTINFO);
// Include footer
xoops_cp_footer ();
exit ();
?>