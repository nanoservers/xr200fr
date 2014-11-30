<?php
error_reporting ( 0 );
include "header.php";
$lid = video_CleanVars ( $_REQUEST, 'lid', 0, 'int' );
$cid = video_CleanVars ( $_REQUEST, 'cid', 0, 'int' );
$quality = video_CleanVars ( $_REQUEST, 'quality', 'low', 'string' );

$view_downloads = $downloads_Handler->get ( $lid );
if (count ( $view_downloads ) == 0) {
	redirect_header ( 'index.php', 3, _MD_VIDEO_SINGLEFILE_NONEXISTENT );
	exit ();
}
//redirection si pas de permission (cat)
$categories = video_MygetItemIds ( 'video_view', 'video' );
if (! in_array ( $view_downloads->getVar ( 'cid' ), $categories )) {
	redirect_header ( XOOPS_URL, 2, _NOPERM );
	exit ();
}
//redirection si pas de permission (t�l�charger)
if ($xoopsModuleConfig ['permission_download'] == 1) {
	$categories = video_MygetItemIds ( 'video_download', 'video' );
	if (! in_array ( $view_downloads->getVar ( 'cid' ), $categories )) {
		redirect_header ( XOOPS_URL, 2, _MD_VIDEO_SINGLEFILE_NOPERMDOWNLOAD );
		exit ();
	}
} else {
	$item = video_MygetItemIds ( 'video_download_item', 'video' );
	if (! in_array ( $view_downloads->getVar ( 'lid' ), $item )) {
		redirect_header ( XOOPS_URL, 2, _MD_VIDEO_SINGLEFILE_NOPERMDOWNLOAD );
		exit ();
	}
}

@$xoopsLogger->activated = false;
error_reporting ( 0 );
if ($xoopsModuleConfig ['check_host']) {
	$goodhost = 0;
	$referer = parse_url ( xoops_getenv ( 'HTTP_REFERER' ) );
	$referer_host = $referer ['host'];
	foreach ( $xoopsModuleConfig ['referers'] as $ref ) {
		if (! empty ( $ref ) && preg_match ( "/" . $ref . "/i", $referer_host )) {
			$goodhost = "1";
			break;
		}
	}
	if (! $goodhost) {
		redirect_header ( XOOPS_URL . "/modules/video/singlefile.php?cid=$cid&amp;lid=$lid", 30, _MD_VIDEO_NOPERMISETOLINK );
		exit ();
	}
}

// ajout +1 pour les hits
$sql = sprintf ( "UPDATE %s SET hits = hits+1 WHERE lid = %u AND status > 0", $xoopsDB->prefix ( "video_downloads" ), $lid );
$xoopsDB->queryF ( $sql );

switch($quality) {
	case 'high':
	    $url = $view_downloads->getVar ( 'url', 'n' ) . "/uploads/video/downloads/" . $view_downloads->getVar ( 'filename', 'n' );
		break;
		
	case 'low':
	    if ($view_downloads->getVar('type') == 'flv') {
	    	$url = $view_downloads->getVar('url', 'n') . "/uploads/video/flv/" . $view_downloads->getVar('filename', 'n') .".flv";
	    } elseif ($view_downloads->getVar('type') == 'mp4') {
	    	$url = $view_downloads->getVar('url', 'n') . "/uploads/video/mp4/" . $view_downloads->getVar('filename', 'n') .".mp4";
	    }
		break;
}	

if(!$url) {
	redirect_header ( XOOPS_URL . "/modules/video/singlefile.php?cid=$cid&amp;lid=$lid", 30, _MD_VIDEO_NOPERMISETOLINK );
}	

if (! preg_match ( "/^ed2k*:\/\//i", $url )) {
	Header ( "Location: $url" );
}
echo "<html><head><meta http-equiv=\"Refresh\" content=\"0; URL=" . $url . "\"></meta></head><body></body></html>";
exit ();
?>