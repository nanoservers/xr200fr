<?php
include_once 'header.php';
// template d'affichage
$xoopsOption ['template_main'] = 'audio_brokenfile.html';
include_once XOOPS_ROOT_PATH . '/header.php';
$xoTheme->addStylesheet ( XOOPS_URL . '/modules/' . $xoopsModule->getVar ( 'dirname', 'n' ) . '/css/style.css', null );
//On recupere la valeur de l'argument op dans l'URL$
$op = audio_CleanVars ( $_REQUEST, 'op', 'liste', 'string' );
$lid = audio_CleanVars ( $_REQUEST, 'lid', 0, 'int' );
//redirection si pas de permission de vote
if ($perm_vote == false) {
	redirect_header ( 'index.php', 2, _NOPERM );
	exit ();
}
$view_downloads = $downloads_Handler->get ( $lid );
// redirection si le t�l�chargement n'existe pas ou n'est pas activ�
if (count ( $view_downloads ) == 0 || $view_downloads->getVar ( 'status' ) == 0) {
	redirect_header ( 'index.php', 3, _MD_AUDIO_SINGLEFILE_NONEXISTENT );
	exit ();
}
//redirection si pas de permission (cat)
$categories = audio_MygetItemIds ( 'audio_view', 'audio' );
if (! in_array ( $view_downloads->getVar ( 'cid' ), $categories )) {
	redirect_header ( XOOPS_URL, 2, _NOPERM );
	exit ();
}

//Les valeurs de op qui vont permettre d'aller dans les differentes parties de la page
switch ($op)
{
	// Vue liste
	case "liste" :
		//tableau des cat�gories
		$criteria = new CriteriaCompo ();
		$criteria->setSort ( 'cat_weight ASC, cat_title' );
		$criteria->setOrder ( 'ASC' );
		$criteria->add ( new Criteria ( 'cat_cid', '(' . implode ( ',', $categories ) . ')', 'IN' ) );
		$downloadscat_arr = $downloadscat_Handler->getall ( $criteria );
		$mytree = new XoopsObjectTree ( $downloadscat_arr, 'cat_cid', 'cat_pid' );
		//breadcrumb
		$breadcrumb = audio_PathTreeUrl ( $mytree, $view_downloads->getVar ( 'cid' ), $downloadscat_arr, 'cat_title', $prefix = ' &raquo; ', true, 'ASC', true );
		$breadcrumb .= ' &raquo; <a href="singlefile.php?lid=' . $view_downloads->getVar ( 'lid' ) . '">' . $view_downloads->getVar ( 'title' ) . '</a>';
		$breadcrumb .= ' &raquo; ' . _MD_AUDIO_SINGLEFILE_REPORTBROKEN;
		$xoopsTpl->assign ( 'breadcrumb', $breadcrumb );
		// r�f�rencement
		// titre de la page
		$pagetitle = _MD_AUDIO_SINGLEFILE_REPORTBROKEN . ' - ' . $view_downloads->getVar ( 'title' ) . ' - ';
		$pagetitle .= audio_PathTreeUrl ( $mytree, $view_downloads->getVar ( 'cid' ), $downloadscat_arr, 'cat_title', $prefix = ' - ', false, 'DESC', true );
		$xoopsTpl->assign ( 'xoops_pagetitle', $pagetitle );
		//description
		$xoTheme->addMeta ( 'meta', 'description', strip_tags ( _MD_AUDIO_SINGLEFILE_REPORTBROKEN . ' (' . $view_downloads->getVar ( 'title' ) . ')' ) );
		//Affichage du formulaire de fichier bris�*/
		$obj = & $downloadsbroken_Handler->create ();
		$form = $obj->getForm ( $lid );
		$xoopsTpl->assign ( 'themeForm', $form->render () );
		break;
		// save
	case "save" :
		$obj = & $downloadsbroken_Handler->create ();
		if (empty ( $xoopsUser )) {
			$ratinguser = 0;
		} else {
			$ratinguser = $xoopsUser->getVar ( 'uid' );
		}
		if ($ratinguser != 0) {
			// si c'est un membre on v�rifie qu'il n'envoie pas 2 fois un rapport
			$criteria = new CriteriaCompo ();
			$criteria->add ( new Criteria ( 'lid', $lid ) );
			$downloadsbroken_arr = $downloadsbroken_Handler->getall ( $criteria );
			foreach ( array_keys ( $downloadsbroken_arr ) as $i ) {
				if ($downloadsbroken_arr [$i]->getVar ( 'sender' ) == $ratinguser) {
					redirect_header ( 'singlefile.php?lid=' . $lid, 2, _MD_AUDIO_BROKENFILE_ALREADYREPORTED );
					exit ();
				}
			}
		} else {
			// si c'est un utilisateur anonyme on v�rifie qu'il n'envoie pas 2 fois un rapport
			$criteria = new CriteriaCompo ();
			$criteria->add ( new Criteria ( 'lid', $lid ) );
			$criteria->add ( new Criteria ( 'sender', 0 ) );
			$criteria->add ( new Criteria ( 'ip', getenv ( "REMOTE_ADDR" ) ) );
			if ($downloadsbroken_Handler->getCount ( $criteria ) >= 1) {
				redirect_header ( 'singlefile.php?lid=' . $lid, 2, _MD_AUDIO_BROKENFILE_ALREADYREPORTED );
				exit ();
			}
		}
		$erreur = false;
		$message_erreur = '';
		// Test avant la validation
		xoops_load ( "captcha" );
		$xoopsCaptcha = XoopsCaptcha::getInstance ();
		if (! $xoopsCaptcha->verify ()) {
			$message_erreur .= $xoopsCaptcha->getMessage () . '<br>';
			$erreur = true;
		}
		$obj->setVar ( 'lid', $lid );
		$obj->setVar ( 'sender', $ratinguser );
		$obj->setVar ( 'ip', getenv ( "REMOTE_ADDR" ) );
		if ($erreur == true) {
			$xoopsTpl->assign ( 'message_erreur', $message_erreur );
		} else {
			if ($downloadsbroken_Handler->insert ( $obj )) {
				$tags = array ();
				$tags ['BROKENREPORTS_URL'] = XOOPS_URL . '/modules/' . $xoopsModule->getVar ( 'dirname' ) . '/admin/broken.php';
				$notification_handler = & xoops_gethandler ( 'notification' );
				$notification_handler->triggerEvent ( 'global', 0, 'file_broken', $tags );
				redirect_header ( 'singlefile.php?lid=' . $lid, 2, _MD_AUDIO_BROKENFILE_THANKSFORINFO );
			}
			echo $obj->getHtmlErrors ();
		}

		//Affichage du formulaire de notation des t�l�chargements
		$form = & $obj->getForm ( $lid );
		$xoopsTpl->assign ( 'themeForm', $form->render () );
		break;
}
include XOOPS_ROOT_PATH . '/footer.php';
?>