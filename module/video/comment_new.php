<?php
include 'header.php';
$com_itemid = isset ( $_GET ['com_itemid'] ) ? intval ( $_GET ['com_itemid'] ) : 0;
if ($com_itemid > 0) {
	// Get file title	$sql = 'SELECT title, cid FROM ' . $xoopsDB->prefix ( 'video_downloads' ) . " WHERE lid=" . $com_itemid;
	$result = $xoopsDB->query ( $sql );
	if ($result) {
		$categories = video_MygetItemIds ( 'video_view', 'video' );
		$row = $xoopsDB->fetchArray ( $result );
		if (! in_array ( $row ['cid'], $categories )) {
			redirect_header ( XOOPS_URL, 2, _NOPERM );
			exit ();
		}
		$com_replytitle = $row ['title'];
		include XOOPS_ROOT_PATH . '/include/comment_new.php';
	}
}
?>