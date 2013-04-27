<?php
error_reporting ( 0 );
include "header.php";
$lid = audio_CleanVars ( $_REQUEST, 'lid', 0, 'int' );
$cid = audio_CleanVars ( $_REQUEST, 'cid', 0, 'int' );
$quality = audio_CleanVars ( $_REQUEST, 'quality', 'low', 'string' );

$view_downloads = $downloads_Handler->get ( $lid );
if (count ( $view_downloads ) == 0) {
	redirect_header ( 'index.php', 3, _MD_AUDIO_SINGLEFILE_NONEXISTENT );
	exit ();
}
//redirection si pas de permission (cat)
$categories = audio_MygetItemIds ( 'audio_view', 'audio' );
if (! in_array ( $view_downloads->getVar ( 'cid' ), $categories )) {
	redirect_header ( XOOPS_URL, 2, _NOPERM );
	exit ();
}
//redirection si pas de permission (t�l�charger)
if ($xoopsModuleConfig ['permission_download'] == 1) {
	$categories = audio_MygetItemIds ( 'audio_download', 'audio' );
	if (! in_array ( $view_downloads->getVar ( 'cid' ), $categories )) {
		redirect_header ( XOOPS_URL, 2, _MD_AUDIO_SINGLEFILE_NOPERMDOWNLOAD );
		exit ();
	}
} else {
	$item = audio_MygetItemIds ( 'audio_download_item', 'audio' );
	if (! in_array ( $view_downloads->getVar ( 'lid' ), $item )) {
		redirect_header ( XOOPS_URL, 2, _MD_AUDIO_SINGLEFILE_NOPERMDOWNLOAD );
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
		redirect_header ( XOOPS_URL . "/modules/audio/singlefile.php?cid=$cid&amp;lid=$lid", 30, _MD_AUDIO_NOPERMISETOLINK );
		exit ();
	}
}

// ajout +1 pour les hits
$sql = sprintf ( "UPDATE %s SET hits = hits+1 WHERE lid = %u AND status > 0", $xoopsDB->prefix ( "audio_downloads" ), $lid );
$xoopsDB->queryF ( $sql );

switch($quality) {
	case 'high':
	   $url = $view_downloads->getVar ( 'url', 'n' ) . "/uploads/audio/downloads/" . $view_downloads->getVar ( 'filename', 'n' );
		break;
		
	case 'low':
	   $url = $view_downloads->getVar ( 'url', 'n' ) . "/uploads/audio/mp3/" . $view_downloads->getVar ( 'filename', 'n' ) .".mp3";
		break;
}	

if(!$url) {
	redirect_header ( XOOPS_URL . "/modules/audio/singlefile.php?cid=$cid&amp;lid=$lid", 30, _MD_AUDIO_NOPERMISETOLINK );
}	

if (! preg_match ( "/^ed2k*:\/\//i", $url )) {
	Header ( "Location: $url" );
}
echo "<html><head><meta http-equiv=\"Refresh\" content=\"0; URL=" . $url . "\"></meta></head><body></body></html>";
exit ();
?>