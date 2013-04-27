<?php
include_once 'header.php';
// template d'affichage
$xoopsOption ['template_main'] = 'audio_modfile.html';
include_once XOOPS_ROOT_PATH . '/header.php';
$xoTheme->addStylesheet ( XOOPS_URL . '/modules/' . $xoopsModule->getVar ( 'dirname', 'n' ) . '/css/style.css', null );
//On recupere la valeur de l'argument op dans l'URL$
$op = audio_CleanVars ( $_REQUEST, 'op', 'list', 'string' );
// redirection si pas de droit pour poster
if ($perm_modif == false) {
	redirect_header ( 'index.php', 2, _NOPERM );
	exit ();
}
$lid = audio_CleanVars ( $_REQUEST, 'lid', 0, 'int' );
//information du t�l�chargement
$view_downloads = $downloads_Handler->get ( $lid );
// redirection si le t�l�chargement n'existe pas ou n'est pas activ�
if (count ( $view_downloads ) == 0 || $view_downloads->getVar ( 'status' ) == 0) {
	redirect_header ( 'index.php', 3, _MD_AUDIO_SINGLEFILE_NONEXISTENT );
	exit ();
}
//Les valeurs de op qui vont permettre d'aller dans les differentes parties de la page
switch ($op)
{
	// Vue liste
		//breadcrumb
		$categories = audio_MygetItemIds ( 'audio_view', 'audio' );
		if (! in_array ( $view_downloads->getVar ( 'cid' ), $categories )) {
			redirect_header ( 'index.php', 2, _NOPERM );
			exit ();
		}
		//tableau des cat�gories
		$criteria->setSort ( 'cat_weight ASC, cat_title' );
		$criteria->setOrder ( 'ASC' );
		$criteria->add ( new Criteria ( 'cat_cid', '(' . implode ( ',', $categories ) . ')', 'IN' ) );
		$downloadscat_arr = $downloadscat_Handler->getall ( $criteria );
		$mytree = new XoopsObjectTree ( $downloadscat_arr, 'cat_cid', 'cat_pid' );
		//breadcrumb
		$breadcrumb .= ' &raquo; <a href="singlefile.php?lid=' . $view_downloads->getVar ( 'lid' ) . '">' . $view_downloads->getVar ( 'title' ) . '</a>';
		$breadcrumb .= ' &raquo; ' . _MD_AUDIO_SINGLEFILE_MODIFY;
		$xoopsTpl->assign ( 'breadcrumb', $breadcrumb );
		// r�f�rencement
		$pagetitle .= audio_PathTreeUrl ( $mytree, $view_downloads->getVar ( 'cid' ), $downloadscat_arr, 'cat_title', $prefix = ' - ', false, 'DESC', true );
		$xoopsTpl->assign ( 'xoops_pagetitle', $pagetitle );
		//description
		//Affichage du formulaire de notation des t�l�chargements
		$form = $obj->getForm ( $lid, false, $donnee = array () );
		$xoopsTpl->assign ( 'themeForm', $form->render () );
		break;
		// save
		include_once XOOPS_ROOT_PATH . '/class/uploader.php';
		$obj = & $downloadsmod_Handler->create ();
		$erreur = false;
		$message_erreur = '';
		$donnee = array ();
		$obj->setVar ( 'title', $_POST ['title'] );
		$donnee ['title'] = $_POST ['title'];
		$obj->setVar ( 'cid', $_POST ['cid'] );
		$donnee ['cid'] = $_POST ['cid'];
		$obj->setVar ( 'lid', $_POST ['lid'] );
		$obj->setVar ( 'homepage', formatURL ( $_POST ["homepage"] ) );
		$donnee ['homepage'] = formatURL ( $_POST ["homepage"] );
		$obj->setVar ( 'version', $_POST ["version"] );
		$donnee ['version'] = $_POST ["version"];
		$obj->setVar ( 'size', $_POST ["size"] );
		$donnee ['size'] = $_POST ["size"];
		$donnee ['type_size'] = $_POST ['type_size'];
		if (isset ( $_POST ['platform'] )) {
			$obj->setVar ( 'platform', implode ( '|', $_POST ['platform'] ) );
			$donnee ['platform'] = implode ( '|', $_POST ["platform"] );
		} else {
			$donnee ['platform'] = '';
		}
		$obj->setVar ( 'description', $_POST ["description"] );
		$donnee ['description'] = $_POST ["description"];
		$obj->setVar ( 'modifysubmitter', ! empty ( $xoopsUser ) ? $xoopsUser->getVar ( 'uid' ) : 0 );
		// erreur si la taille du fichier n'est pas un nombre
			if ($_REQUEST ['size'] == '0' || $_REQUEST ['size'] == '') {
				$erreur = false;
			} else {
				$erreur = true;
				$message_erreur .= _MD_AUDIO_ERREUR_SIZE . '<br>';
			}
		}

		// erreur si la cat�gorie est vide
			if ($_REQUEST ['cid'] == 0) {
				$erreur = true;
				$message_erreur .= _MD_AUDIO_ERREUR_NOCAT . '<br>';
			}
		}
		// erreur si le captcha est faux
		$xoopsCaptcha = XoopsCaptcha::getInstance ();
		if (! $xoopsCaptcha->verify ()) {
			$message_erreur .= $xoopsCaptcha->getMessage () . '<br>';
			$erreur = true;
		}
		// pour enregistrer temporairement les valeur des champs sup
		$criteria->setSort ( 'weight ASC, title' );
		$criteria->setOrder ( 'ASC' );
		$downloads_field = $downloadsfield_Handler->getall ( $criteria );
		foreach ( array_keys ( $downloads_field ) as $i ) {
			if ($downloads_field [$i]->getVar ( 'status_def' ) == 0) {
				$nom_champ = 'champ' . $downloads_field [$i]->getVar ( 'fid' );
				$donnee [$nom_champ] = $_POST [$nom_champ];
			}
		}
		if ($erreur == true) {
			$xoopsTpl->assign ( 'message_erreur', $message_erreur );
		} else {
			$obj->setVar ( 'size', $_POST ['size'] . ' ' . $_POST ['type_size'] );
			// Pour le fichier
				$uploader = new XoopsMediaUploader ( $uploaddir_downloads, explode ( '|', $xoopsModuleConfig ['mimetype'] ), $xoopsModuleConfig ['maxuploadsize'], null, null );
				if ($uploader->fetchMedia ( $_POST ['xoops_upload_file'] [0] )) {
					if ($xoopsModuleConfig ['newnamedownload']) {
						$uploader->setPrefix ( $xoopsModuleConfig ['prefixdownloads'] );
					}
					$uploader->fetchMedia ( $_POST ['xoops_upload_file'] [0] );
					if (! $uploader->upload ()) {
						$errors = $uploader->getErrors ();
						redirect_header ( "javascript:history.go(-1)", 3, $errors );
					} else {
						$obj->setVar ( 'url', $uploadurl_downloads . $uploader->getSavedFileName () );
					}
				} else {
					$obj->setVar ( 'url', $_REQUEST ['url'] );
				}
			}
				
			// Pour l'image
				$uploader_2 = new XoopsMediaUploader ( $uploaddir_shots, array ('image/gif', 'image/jpeg', 'image/pjpeg', 'image/x-png', 'image/png' ), $xoopsModuleConfig ['maxuploadsize'], null, null );
				if ($uploader_2->fetchMedia ( $_POST ['xoops_upload_file'] [1] )) {
					$uploader_2->setPrefix ( 'downloads_' );
					$uploader_2->fetchMedia ( $_POST ['xoops_upload_file'] [1] );
					if (! $uploader_2->upload ()) {
						$errors = $uploader_2->getErrors ();
						redirect_header ( "javascript:history.go(-1)", 3, $errors );
					} else {
						$obj->setVar ( 'logourl', $uploader_2->getSavedFileName () );
					}
				} else {
					$obj->setVar ( 'logourl', $_REQUEST ['logo_img'] );
				}
			}
				
			if ($downloadsmod_Handler->insert ( $obj )) {
				$lid_dowwnloads = $obj->get_new_enreg ();
				// R�cup�ration des champs suppl�mentaires:
				$criteria->setSort ( 'weight ASC, title' );
				$criteria->setOrder ( 'ASC' );
				$downloads_field = $downloadsfield_Handler->getall ( $criteria );
				foreach ( array_keys ( $downloads_field ) as $i ) {
					if ($downloads_field [$i]->getVar ( 'status_def' ) == 0) {
						$objdata = & $downloadsfieldmoddata_Handler->create ();
						$nom_champ = 'champ' . $downloads_field [$i]->getVar ( 'fid' );
						$objdata->setVar ( 'moddata', $_POST [$nom_champ] );
						$objdata->setVar ( 'lid', $lid_dowwnloads );
						$objdata->setVar ( 'fid', $downloads_field [$i]->getVar ( 'fid' ) );
						$downloadsfieldmoddata_Handler->insert ( $objdata ) or $objdata->getHtmlErrors ();
					}
				}
				$tags = array ();
				$tags ['MODIFYREPORTS_URL'] = XOOPS_URL . '/modules/' . $xoopsModule->getVar ( 'dirname' ) . '/admin/modified.php';
				$notification_handler = & xoops_gethandler ( 'notification' );
				$notification_handler->triggerEvent ( 'global', 0, 'file_modify', $tags );
				redirect_header ( 'singlefile.php?lid=' . intval ( $_REQUEST ['lid'] ), 1, _MD_AUDIO_MODFILE_THANKSFORINFO );
			}
			echo $obj->getHtmlErrors ();
		}
		//Affichage du formulaire de notation des t�l�chargements
		$xoopsTpl->assign ( 'themeForm', $form->render () );
		break;
}
include XOOPS_ROOT_PATH . '/footer.php';
?>