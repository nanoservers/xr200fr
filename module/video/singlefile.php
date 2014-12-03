<?php

include_once 'header.php';
// template d'affichage
$xoopsOption ['template_main'] = 'video_singlefile.html';
include_once XOOPS_ROOT_PATH . '/header.php';
// Get Id
$lid = video_CleanVars ( $_REQUEST, 'lid', 0, 'int' );

// Add page css and java
$xoTheme->addStylesheet ( XOOPS_URL . '/modules/' . $xoopsModule->getVar ( 'dirname', 'n' ) . '/css/style.css', null );
$xoTheme->addStylesheet ( XOOPS_URL . '/modules/' . $xoopsModule->getVar ( 'dirname', 'n' ) . '/css/singlefile.css', null );
$xoTheme->addStylesheet ( XOOPS_URL . '/modules/system/css/ui/' . xoops_getModuleOption ( 'jquery_theme', 'system' ) . '/ui.all.css' );
$xoTheme->addScript ( "browse.php?Frameworks/jquery/jquery.js" );
$xoTheme->addScript ( "browse.php?Frameworks/jquery/plugins/jquery.ui.js" );
//$xoTheme->addScript ( XOOPS_URL . '/modules/' . $xoopsModule->getVar ( 'dirname', 'n' ) . '/js/ui.js' );

// Get video
$view_downloads = $downloads_Handler->get ( $lid );

// redirection si le téléchargement n'existe pas ou n'est pas activé
if (count ( $view_downloads ) == 0 || $view_downloads->getVar ( 'status' ) == 0) {
	redirect_header ( 'index.php', 3, _MD_VIDEO_SINGLEFILE_NONEXISTENT );
	exit ();
}

// pour les permissions
$categories = video_MygetItemIds ( 'video_view', 'video' );
if (! in_array ( $view_downloads->getVar ( 'cid' ), $categories )) {
	redirect_header ( XOOPS_URL, 2, _NOPERM );
	exit ();
}

//tableau des catégories
$criteria = new CriteriaCompo ();
$criteria->setSort ( 'cat_weight ASC, cat_title' );
$criteria->setOrder ( 'ASC' );
$criteria->add ( new Criteria ( 'cat_cid', '(' . implode ( ',', $categories ) . ')', 'IN' ) );
$downloadscat_arr = $downloadscat_Handler->getall ( $criteria );
$mytree = new XoopsObjectTree ( $downloadscat_arr, 'cat_cid', 'cat_pid' );


foreach($downloadscat_arr as $downloadcat) {
	if($downloadcat->getVar('cat_cid') == $view_downloads->getVar ( 'cid' )) {
		$xoopsTpl->assign ( 'cat_cid', $downloadcat->getVar('cat_cid'));
		$xoopsTpl->assign ( 'cat_pid', $downloadcat->getVar('cat_pid'));
		$xoopsTpl->assign ( 'cat_title',  $downloadcat->getVar('cat_title'));
		$xoopsTpl->assign ( 'cat_imgurl', $downloadcat->getVar('cat_imgurl'));
		$xoopsTpl->assign ( 'cat_weight', $downloadcat->getVar('cat_weight'));
		$xoopsTpl->assign ( 'cat_tab', $downloadcat->getVar('cat_tab') );
		$selected = $downloadcat->getVar('cat_tab');
	}
}

//selected tab
$tab = "
$(function() {
	$('#info-tab').tabs({
		collapsible: true ,
		selected: " . $selected . " ,
	});
});
";
$xoTheme->addScript ( null, array ('type' => 'text/javascript', 'charset' => _CHARSET ), $tab );  


//breadcrumb
$breadcrumb = video_PathTreeUrl ( $mytree, $view_downloads->getVar ( 'cid' ), $downloadscat_arr, 'cat_title', $prefix = ' &raquo; ', true, 'ASC', true );
$breadcrumb = $breadcrumb . ' &raquo; ' . $view_downloads->getVar ( 'title' );
$xoopsTpl->assign ( 'breadcrumb', $breadcrumb );

// sortie des informations
if ($view_downloads->getVar ( 'logourl' ) == 'blank.gif') {
	$imgurl = '';
} else {
	$imgurl = $view_downloads->getVar ( 'url' ) . $uploadpach_shots . $view_downloads->getVar ( 'logourl' );
}
// Défini si la personne est un admin
if (is_object ( $xoopsUser ) && $xoopsUser->isAdmin ( $xoopsModule->mid () )) {
	$adminlink = '<a href="' . XOOPS_URL . '/modules/video/admin/downloads.php?op=view_downloads&amp;downloads_lid=' . $_REQUEST ['lid'] . '" title="' . _MD_VIDEO_EDITTHISDL . '"><img src="' . XOOPS_URL . '/modules/video/images/editicon.png" width="16px" height="16px" border="0" alt="' . _MD_VIDEO_EDITTHISDL . '" /></a>';
} else {
	$adminlink = '';
}

// Get submiter info
$criteria = new CriteriaCompo ();
$criteria->add ( new Criteria ( 'cid', '(' . implode ( ',', $categories ) . ')', 'IN' ));
$criteria->add ( new Criteria ( 'status', 0, '!=' ) );
$criteria->add ( new Criteria ( 'submitter', $view_downloads->getVar ( 'submitter' )));
$videocount = $downloads_Handler->getCount ( $criteria );

// build information
$new = video_Thumbnail ( $view_downloads->getVar ( 'date' ), $view_downloads->getVar ( 'status' ) );
$pop = video_Popular ( $view_downloads->getVar ( 'hits' ) );
$description = $view_downloads->getVar ( 'description' );

$flashFile2 = '';
$flashFile3 = '';
// Set file link
if ($view_downloads->getVar('type') == 'flv') {
	$flashFile = $view_downloads->getVar('url') . $uploadpach_flv . $view_downloads->getVar('filename') . '.flv';
	$xoTheme->addScript ( XOOPS_URL . '/modules/' . $xoopsModule->getVar ( 'dirname', 'n' ) . '/js/jwplayer/jwplayer.js' );
} elseif ($view_downloads->getVar('type') == 'mp4') {
	$flashFile = $view_downloads->getVar('url') . $uploadpach_mp4 . $view_downloads->getVar('filename') . '.mp4';
	$xoTheme->addScript ( XOOPS_URL . '/modules/' . $xoopsModule->getVar ( 'dirname', 'n' ) . '/js/jwplayer/jwplayer.js' );
    //$xoTheme->addScript ( XOOPS_URL . '/modules/' . $xoopsModule->getVar ( 'dirname', 'n' ) . '/player/jwplayer/jwplayer.js' );
    //$xoTheme->addScript ( XOOPS_URL . '/modules/' . $xoopsModule->getVar ( 'dirname', 'n' ) . '/player/jwplayer/jwplayer.html5.js' );

    //$xoTheme->addScript ( XOOPS_URL . '/modules/video/player/flowplayer/flowplayer.min.js' );
    //$xoTheme->addStylesheet ( XOOPS_URL . '/modules/video/player/flowplayer/skin/minimalist.css' );
    
    //if (!empty($xoopsModuleConfig ['jwplayerKey'])) {
    //	$jwplayerKey = "jwplayer.key='" . $xoopsModuleConfig ['jwplayerKey'] . "';";
    //	$xoTheme->addScript ( null, array ('type' => 'text/javascript', 'charset' => _CHARSET ), $jwplayerKey); 
    //}

    if (!empty($view_downloads->getVar('filename2'))) {
    	$flashFile2 = $view_downloads->getVar('url') . $uploadpach_mp4 . $view_downloads->getVar('filename2') . '.mp4';
    }

    if (!empty($view_downloads->getVar('filename3'))) {
    	$flashFile3 = $view_downloads->getVar('url') . $uploadpach_mp4 . $view_downloads->getVar('filename3') . '.mp4';
    }
}

// Set information for template
$xoopsTpl->assign ( 'description', str_replace ( '[pagebreak]', '', $description ) );
$xoopsTpl->assign ( 'lid', $lid );
$xoopsTpl->assign ( 'cid', $view_downloads->getVar ( 'cid' ) );
$xoopsTpl->assign ( 'imgurl', $imgurl );
$xoopsTpl->assign ( 'logourl', XOOPS_URL . '/' . $xoopsModuleConfig ['overlogo'] );
$xoopsTpl->assign ( 'flvHeight', $xoopsModuleConfig ['playerHeight'] );
$xoopsTpl->assign ( 'flvWidth', $xoopsModuleConfig ['playerWidth'] );
$xoopsTpl->assign ( 'imageStr', 'image' );
$xoopsTpl->assign ( 'fulltitle', $view_downloads->getVar ( 'title' ) . $new . $pop );
$xoopsTpl->assign ( 'title', $view_downloads->getVar ( 'title' ) );
$xoopsTpl->assign ( 'adminlink', $adminlink );
$xoopsTpl->assign ( 'flashFile', $flashFile);
$xoopsTpl->assign ( 'flashFile2', $flashFile2);
$xoopsTpl->assign ( 'flashFile3', $flashFile3);
$xoopsTpl->assign ( 'date', formatTimestamp ( $view_downloads->getVar ( 'date' ), 's' ) );
$xoopsTpl->assign ( 'author', XoopsUser::getUnameFromId ( $view_downloads->getVar ( 'submitter' ) ) );
$xoopsTpl->assign ( 'uid', $view_downloads->getVar ( 'submitter' ) );
$xoopsTpl->assign ( 'videocount', $videocount );
$xoopsTpl->assign ( 'hits', sprintf ( _MD_VIDEO_SINGLEFILE_NBTELECH, $view_downloads->getVar ( 'hits' ) ) );
$xoopsTpl->assign ( 'rating', number_format ( $view_downloads->getVar ( 'rating' ), 1 ) );
$xoopsTpl->assign ( 'votes', sprintf ( _MD_VIDEO_SINGLEFILE_VOTES, $view_downloads->getVar ( 'votes' ) ) );
$xoopsTpl->assign ( 'nb_comments', sprintf ( _MD_VIDEO_SINGLEFILE_COMMENTS, $view_downloads->getVar ( 'comments' ) ) );
$xoopsTpl->assign ( 'shwo_bookmark', $xoopsModuleConfig ['shwo_bookmark'] );
$xoopsTpl->assign ( 'show_social', $xoopsModuleConfig ['show_social'] );
$xoopsTpl->assign ( 'extra', $view_downloads->getVar ( 'extra' ) );
$xoopsTpl->assign ( 'type', $view_downloads->getVar('type'));

// pour les champs supplémentaires
$criteria = new CriteriaCompo ();
$criteria->setSort ( 'weight ASC, title' );
$criteria->setOrder ( 'ASC' );
$criteria->add ( new Criteria ( 'status', 1 ) );
$downloads_field = $downloadsfield_Handler->getall ( $criteria );
$nb_champ = count ( $downloads_field );
$champ_sup = '';
$champ_sup_vide = 0;
foreach ( array_keys ( $downloads_field ) as $i ) {
	if ($downloads_field [$i]->getVar ( 'status_def' ) == 1) {
		if ($downloads_field [$i]->getVar ( 'fid' ) == 1) {
			//page d'accueil
			if ($view_downloads->getVar ( 'homepage' ) != '') {
				$champ_sup = '&nbsp;' . _AM_VIDEO_FORMHOMEPAGE . ':&nbsp;<a href="' . $view_downloads->getVar ( 'homepage' ) . '">' . _MD_VIDEO_SINGLEFILE_ICI . '</a>';
				$champ_sup_vide ++;
			}
		}
		if ($downloads_field [$i]->getVar ( 'fid' ) == 2) {
			//version
			if ($view_downloads->getVar ( 'version' ) != '') {
				$champ_sup = '&nbsp;' . _AM_VIDEO_FORMVERSION . ':&nbsp;' . $view_downloads->getVar ( 'version' );
				$champ_sup_vide ++;
			}
		}
		if ($downloads_field [$i]->getVar ( 'fid' ) == 3) {
			//taille du fichier
			if ($view_downloads->getVar ( 'size' ) != '') {
				$champ_sup = '&nbsp;' . _AM_VIDEO_FORMSIZE . ':&nbsp;' . trans_size($view_downloads->getVar ( 'size' ));
				$champ_sup_vide ++;
			}
		}
		if ($downloads_field [$i]->getVar ( 'fid' ) == 4) {
			//duration
			if ($view_downloads->getVar ( 'duration' ) != '') {
				$champ_sup = '&nbsp;' . _AM_VIDEO_DURATION . ':&nbsp;' . formatTime($view_downloads->getVar ( 'duration' ));
				$champ_sup_vide ++;
			}
		}
		if ($downloads_field [$i]->getVar ( 'fid' ) == 5) {
			//plateforme
			if ($view_downloads->getVar ( 'platform' ) != '') {
				$champ_sup = '&nbsp;' . _AM_VIDEO_FORMPLATFORM . ':&nbsp;' . $view_downloads->getVar ( 'platform' );
				$champ_sup_vide ++;
			}
		}
		$contenu = '';
	} else {
		$view_data = $downloadsfielddata_Handler->get ();
		$criteria = new CriteriaCompo ();
		$criteria->add ( new Criteria ( 'lid', $_REQUEST ['lid'] ) );
		$criteria->add ( new Criteria ( 'fid', $downloads_field [$i]->getVar ( 'fid' ) ) );
		$downloadsfielddata = $downloadsfielddata_Handler->getall ( $criteria );
		$contenu = '';
		foreach ( array_keys ( $downloadsfielddata ) as $j ) {
			$contenu = $downloadsfielddata [$j]->getVar ( 'data', 'n' );
		}
		if ($contenu != '') {
			$champ_sup = '&nbsp;' . $downloads_field [$i]->getVar ( 'title' ) . ':&nbsp;' . $contenu;
			$champ_sup_vide ++;
		}
	}
	if ($champ_sup != '') {
		$xoopsTpl->append ( 'champ_sup', array ('image' => $uploadurl_field . $downloads_field [$i]->getVar ( 'img' ), 'data' => $champ_sup, 'title' => $downloads_field [$i]->getVar ( 'title' ), 'contenu' => $contenu ) );
	}
	$champ_sup = '';
}
if ($nb_champ > 0 && $champ_sup_vide > 0) {
	$xoopsTpl->assign ( 'sup_aff', true );
} else {
	$xoopsTpl->assign ( 'sup_aff', false );
}
//permission
$xoopsTpl->assign ( 'perm_vote', $perm_vote );
$xoopsTpl->assign ( 'perm_modif', $perm_modif );
$categories = video_MygetItemIds ( 'video_download', 'video' );
$item = video_MygetItemIds ( 'video_download_item', 'video' );
if ($xoopsModuleConfig ['permission_download'] == 1) {
	if (! in_array ( $view_downloads->getVar ( 'cid' ), $categories )) {
		$xoopsTpl->assign ( 'perm_download', false );
	} else {
		$xoopsTpl->assign ( 'perm_download', true );
	}
} else {
	if (! in_array ( $view_downloads->getVar ( 'lid' ), $item )) {
		$xoopsTpl->assign ( 'perm_download', false );
	} else {
		$xoopsTpl->assign ( 'perm_download', true );
	}
}

// pour utiliser tellafriend.
if (($xoopsModuleConfig ['usetellafriend'] == 1) and (is_dir ( '../tellafriend' ))) {
	$string = sprintf ( _MD_VIDEO_SINGLEFILE_INTFILEFOUND, $xoopsConfig ['sitename'] . ':  ' . XOOPS_URL . '/modules/video/singlefile.php?lid=' . $_REQUEST ['lid'] );
	$subject = sprintf ( _MD_VIDEO_SINGLEFILE_INTFILEFOUND, $xoopsConfig ['sitename'] );
	if (stristr ( $subject, '%' ))
	$subject = rawurldecode ( $subject );
	if (stristr ( $string, '%3F' ))
	$string = rawurldecode ( $string );
	if (preg_match ( '/(' . preg_quote ( XOOPS_URL, '/' ) . '.*)$/i', $string, $matches )) {
		$target_uri = str_replace ( '&amp;', '&', $matches [1] );
	} else {
		$target_uri = XOOPS_URL . $_SERVER ['REQUEST_URI'];
	}
	$tellafriend_texte = '<a target="_top" href="' . XOOPS_URL . '/modules/tellafriend/index.php?target_uri=' . rawurlencode ( $target_uri ) . '&amp;subject=' . rawurlencode ( $subject ) . '">' . _MD_VIDEO_SINGLEFILE_TELLAFRIEND . '</a>';
} else {
	$tellafriend_texte = '<a target="_top" href="mailto:?subject=' . rawurlencode ( sprintf ( _MD_VIDEO_SINGLEFILE_INTFILEFOUND, $xoopsConfig ['sitename'] ) ) . '&amp;body=' . rawurlencode ( sprintf ( _MD_VIDEO_SINGLEFILE_INTFILEFOUND, $xoopsConfig ['sitename'] ) . ':  ' . XOOPS_URL . '/modules/video/singlefile.php?lid=' . $_REQUEST ['lid'] ) . '">' . _MD_VIDEO_SINGLEFILE_TELLAFRIEND . '</a>';
}
$xoopsTpl->assign ( 'tellafriend_texte', $tellafriend_texte );

// référencement
// tags
if (($xoopsModuleConfig ['usetag'] == 1) and (is_dir ( '../tag' ))) {
	require_once XOOPS_ROOT_PATH . '/modules/tag/include/tagbar.php';
	$xoopsTpl->assign ( 'tags', true );
	$xoopsTpl->assign ( 'tagbar', tagBar ( $_REQUEST ['lid'], 0 ) );
} else {
	$xoopsTpl->assign ( 'tags', false );
}

// ajout +1 pour les hits
$obj = $downloads_Handler->get ( $view_downloads->getVar ( 'lid' ) );
$obj->setVar ( 'hits', $view_downloads->getVar ( 'hits' ) + 1 );
$downloads_Handler->insert ( $obj );

// titre de la page
$pagetitle = $view_downloads->getVar ( 'title' ) . ' - ';
$pagetitle .= video_PathTreeUrl ( $mytree, $view_downloads->getVar ( 'cid' ), $downloadscat_arr, 'cat_title', $prefix = ' - ', false, 'DESC', true );
$xoopsTpl->assign ( 'xoops_pagetitle', $pagetitle );

//description
if (strpos ( $description, '[pagebreak]' ) == false) {
	$description_short = substr ( $description, 0, 160 );
} else {
	$description_short = substr ( $description, 0, strpos ( $description, '[pagebreak]' ) );
}
$xoTheme->addMeta ( 'meta', 'description', strip_tags ( $description_short ) );

// Start Related video
$criteria = new CriteriaCompo ();
$criteria->add ( new Criteria ( 'status', 0, '!=' ) );
if($view_downloads->getVar ( 'related' )) {
	$criteria->add ( new Criteria ( 'lid', '(' . $view_downloads->getVar ( 'related' ) . ')', 'IN' ) );
} else {
	$criteria->add ( new Criteria ( 'cid', $view_downloads->getVar ( 'cid' ), '=' ) );
}
$criteria->setSort ( 'RAND()' );
$criteria->setLimit ( $xoopsModuleConfig ['nbbl'] );
$related_arr = $downloads_Handler->getall ( $criteria );
foreach ( array_keys ( $related_arr ) as $i ) {
	$related [$i] ['lid'] = $related_arr [$i]->getVar ( 'lid' );
	$related [$i] ['title'] = $related_arr [$i]->getVar ( 'title' );
	$related [$i] ['logourl'] = $related_arr [$i]->getVar ( 'url' ) . $uploadpach_shots . $related_arr [$i]->getVar ( 'logourl' );
	$related [$i] ['hits'] = $related_arr [$i]->getVar ( "hits" );
	$related [$i] ['date'] = formatTimeStamp ( $related_arr [$i]->getVar ( "date" ), "s" );
}
$xoopsTpl->assign ( 'videoblock', $related );
$xoopsTpl->assign ( 'showvideoblock', 1 );
$xoopsTpl->assign ( 'shotwidth', $xoopsModuleConfig ['shotwidth'] );
// End Related video

include XOOPS_ROOT_PATH . '/include/comment_view.php';
include XOOPS_ROOT_PATH . '/footer.php';
?>