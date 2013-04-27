<?php

if (!defined("XOOPS_ROOT_PATH")) {
	die("XOOPS root path not defined");
}

class video_downloads extends XoopsObject
{
	// constructor
	function __construct()
	{
		$this->XoopsObject();
		$this->initVar("lid",XOBJ_DTYPE_INT,null,false,11);
		$this->initVar("cid",XOBJ_DTYPE_INT,null,false,5);
		$this->initVar("title",XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar("url",XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar("filename",XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar("homepage",XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar("version",XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar("size",XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar("duration",XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar("platform",XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar("description",XOBJ_DTYPE_TXTAREA, null, false);
		$this->initVar('dohtml', XOBJ_DTYPE_INT, 1, false);
		$this->initVar("logourl",XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar("submitter",XOBJ_DTYPE_INT,null,false,11);
		$this->initVar("status",XOBJ_DTYPE_INT,null,false,2);
		$this->initVar("date",XOBJ_DTYPE_INT,null,false,10);
		$this->initVar("hits",XOBJ_DTYPE_INT,null,false,10);
		$this->initVar("rating",XOBJ_DTYPE_OTHER,null,false,10);
		$this->initVar("votes",XOBJ_DTYPE_INT,null,false,11);
		$this->initVar("comments",XOBJ_DTYPE_INT,null,false,11);
		$this->initVar("top",XOBJ_DTYPE_INT,1,false,1);
		$this->initVar("paypal",XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar("extra",XOBJ_DTYPE_TXTAREA, null, false);
		$this->initVar("related",XOBJ_DTYPE_TXTBOX, null, false);
		 
		//pour les jointures:
		$this->initVar("cat_title",XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar("cat_imgurl",XOBJ_DTYPE_TXTBOX, null, false);
	}

	function get_new_enreg()
	{
		global $xoopsDB;
		$new_enreg = $xoopsDB->getInsertId();
		return $new_enreg;
	}

	function video_downloads()
	{
		$this->__construct();
	}

	function getForm($donnee = array(), $form_type, $erreur = false, $action = false)
	{
		global $xoopsDB, $xoopsModule, $xoopsModuleConfig, $xoopsUser;
		if ($action === false) {
			$action = $_SERVER['REQUEST_URI'];
		}
		//permission pour uploader
		$gperm_handler =& xoops_gethandler('groupperm');
		$groups = is_object($xoopsUser) ? $xoopsUser->getGroups() : XOOPS_GROUP_ANONYMOUS;
		if ($xoopsUser) {
			if ( !$xoopsUser->isAdmin($xoopsModule->mid()) ) {
				$perm_upload = ($gperm_handler->checkRight('video_ac', 32, $groups, $xoopsModule->getVar('mid'))) ? true : false ;
			} else {
				$perm_upload = true;
			}
		} else {
			$perm_upload = ($gperm_handler->checkRight('video_ac', 32, $groups, $xoopsModule->getVar('mid'))) ? true : false ;
		}
		//nom du formulaire selon l'action (editer ou ajouter):
		$title = $this->isNew() ? sprintf(_AM_VIDEO_FORMADD) : sprintf(_AM_VIDEO_FORMEDIT);

		//cr�ation du formulaire
		$form = new XoopsThemeForm($title, 'form', $action, 'post', true);
		$form->setExtra('enctype="multipart/form-data"');
		//titre
		$form->addElement(new XoopsFormText(_AM_VIDEO_FORMTITLE, 'title', 50, 255, $this->getVar('title')), true);
		// fichier
		$fichier = new XoopsFormElementTray(_AM_VIDEO_FORMFILE,'<br /><br />');
      if($this->isNew()) {
	      switch($form_type) {
		      case 'copy':
			      $url = $this->isNew() ? '' : $this->getVar('url');
					$formflv = new XoopsFormText(_AM_VIDEO_FORM_FLVURL, 'flvUrl', 75, 255, $this->getVar('filename'));
					$fichier->addElement($formflv,true);
					$formurl = new XoopsFormText(_AM_VIDEO_FORMURL, 'url', 75, 255, $url);
					$fichier->addElement($formurl,true);
	      		$video_type = 'copy';
		      break;
		      
		      case 'upload':
					$fichier->addElement(new XoopsFormFile(_AM_VIDEO_FORMUPLOAD , 'attachedfile', $xoopsModuleConfig['maxuploadsize']), true);
				   $video_type = 'upload';
		      break;
		      
		      case 'convert':
			      $formflv = new XoopsFormText(_AM_VIDEO_FORM_FLVURL, 'flvUrl', 75, 255, $this->getVar('filename'));
					$fichier->addElement($formflv,true);
	      		$video_type = 'convert';
		      break;	
	      }			
      } else {
      	if ( $xoopsUser->isAdmin($xoopsModule->mid()) ) {
				$url = $this->isNew() ? '' : $this->getVar('url');
				$formflv = new XoopsFormText(_AM_VIDEO_FORM_FLVURL, 'flvUrl', 75, 255, $this->getVar('filename'));
				$fichier->addElement($formflv,true);
				$formurl = new XoopsFormText(_AM_VIDEO_FORMURL, 'url', 75, 255, $url);
				$fichier->addElement($formurl,true);
				$video_type = 'edit';
	      }
      }
      $form->addElement($fichier);	
      $form->addElement(new XoopsFormHidden('video_type', $video_type));
		//cat�gorie
		$downloadscat_Handler =& xoops_getModuleHandler('video_cat', 'video');
		$categories = video_MygetItemIds('video_submit', 'video');
		$criteria = new CriteriaCompo();
		$criteria->setSort('cat_weight ASC, cat_title');
		$criteria->setOrder('ASC');

		if ($xoopsUser) {
			if ( !$xoopsUser->isAdmin($xoopsModule->mid()) ) {
				$criteria->add(new Criteria('cat_cid', '(' . implode(',', $categories) . ')','IN'));
			}
		} else {
			$criteria->add(new Criteria('cat_cid', '(' . implode(',', $categories) . ')','IN'));
		}
		$downloadscat_arr = $downloadscat_Handler->getall($criteria);
		if (count($downloadscat_arr) == 0){
			redirect_header('index.php', 2,  _NOPERM);
		}
		
		$mytree = new XoopsObjectTree($downloadscat_arr, 'cat_cid', 'cat_pid');
		$form->addElement(new XoopsFormLabel(_AM_VIDEO_FORMINCAT, $mytree->makeSelBox('cid', 'cat_title','--',$this->getVar('cid'),false)), true);
		 
		if ($xoopsUser->isAdmin($xoopsModule->mid()) ) {
			$form->addElement ( new XoopsFormRadioYN ( _AM_VIDEO_TOP, 'top', $this->getVar ( 'top', 'e' ) ) );
		} 
		 		
		//titre
		//$form->addElement(new XoopsFormText(_AM_VIDEO_DURATION , 'duration', 10, 50, $this->getVar('duration')), false);
		
		//affichage des champs
		$downloadsfield_Handler =& xoops_getModuleHandler('video_field', 'video');
		$criteria = new CriteriaCompo();
		$criteria->setSort('weight ASC, title');
		$criteria->setOrder('ASC');
		$downloads_field = $downloadsfield_Handler->getall($criteria);
		foreach (array_keys($downloads_field) as $i) {
			if ($downloads_field[$i]->getVar('status_def') == 1){
				if ($downloads_field[$i]->getVar('fid') == 1){
					//page d'accueil
					if ($downloads_field[$i]->getVar('status') == 1){
						$form->addElement(new XoopsFormText(_AM_VIDEO_FORMHOMEPAGE, 'homepage', 50, 255, $this->getVar('homepage')));
					} else {
						$form->addElement(new XoopsFormHidden('homepage', ''));
					}
				}
				if ($downloads_field[$i]->getVar('fid') == 2){
					//version
					if ($downloads_field[$i]->getVar('status') == 1){
						$form->addElement(new XoopsFormText(_AM_VIDEO_FORMVERSION, 'version', 10, 255, $this->getVar('version')));
					} else {
						$form->addElement(new XoopsFormHidden('version', ''));
					}
				}
				if ($downloads_field[$i]->getVar('fid') == 3){
					//version
					if ($downloads_field[$i]->getVar('status') == 1){
						$form->addElement(new XoopsFormText(_AM_VIDEO_FORMSIZE, 'size', 10, 50, $this->getVar('size')));
					} else {
						$form->addElement(new XoopsFormHidden('size', ''));
					}
					/*
					//taille du fichier
					if ($downloads_field[$i]->getVar('status') == 1){
						if ($this->isNew()) {
							$size_value = $this->getVar('size');
							if ($erreur == false){
								$type_value = '[Ko]';
							} else {
								$type_value = $donnee['type_size'];
							}
						} else {
							$size_value_arr = explode(' ', $this->getVar('size'));
							$size_value = $size_value_arr[0];
							if ($erreur == false){
								if(isset($size_value_arr[1])) {
									$type_value = $size_value_arr[1];
								} else {
									$type_value = '';
								}
							} else {
								$type_value = $donnee['type_size'];
							}
						}
						$aff_size = new XoopsFormElementTray(_AM_VIDEO_FORMSIZE,'');
						$aff_size->addElement(new XoopsFormText('', 'size', 10, 255, $size_value));
						$form->addElement($aff_size);
					} else {
						$form->addElement(new XoopsFormHidden('size', ''));
						$form->addElement(new XoopsFormHidden('type_size', ''));
					}
					*/
				}
				if ($downloads_field[$i]->getVar('fid') == 4){
					//duration
					if ($downloads_field[$i]->getVar('status') == 1){
						$form->addElement(new XoopsFormText(_AM_VIDEO_DURATION, 'duration', 10, 50, $this->getVar('duration')));
					} else {
						$form->addElement(new XoopsFormHidden('duration', ''));
					}
				}
           if ($downloads_field[$i]->getVar('fid') == 5){
					//plateforme
					if ($downloads_field[$i]->getVar('status') == 1){
						$platformselect = new XoopsFormSelect(_AM_VIDEO_FORMPLATFORM, 'platform', explode('|',$this->getVar('platform')), 5, true);
						$platform_array = explode('|',$xoopsModuleConfig['plateform']);
						foreach( $platform_array as $platform ) {
							$platformselect->addOption("$platform", $platform);
						}
						$form->addElement($platformselect, false);
					} else {
						$form->addElement(new XoopsFormHidden('platform', ''));
					}
				}
			} else {
				$contenu = '';
				$contenu_iddata = '';
				$nom_champ = 'champ' . $downloads_field[$i]->getVar('fid');
				$downloadsfielddata_Handler =& xoops_getModuleHandler('video_fielddata', 'video');
				$criteria = new CriteriaCompo();
				$criteria->add(new Criteria('lid', $this->getVar('lid')));
				$criteria->add(new Criteria('fid', $downloads_field[$i]->getVar('fid')));
				$downloadsfielddata = $downloadsfielddata_Handler->getall($criteria);
				foreach (array_keys($downloadsfielddata) as $j) {
					if ($erreur == true) {
						$contenu = $donnee[$nom_champ];
					} else {
						if (!$this->isNew()) {
							$contenu = $downloadsfielddata[$j]->getVar('data');
						}
					}
					$contenu_iddata = $downloadsfielddata[$j]->getVar('iddata');
				}
				$iddata = 'iddata' . $downloads_field[$i]->getVar('fid');
				if (!$this->isNew()) {
					$form->addElement(new XoopsFormHidden($iddata, $contenu_iddata));
				}
				if ($downloads_field[$i]->getVar('status') == 1){
					$form->addElement(new XoopsFormText($downloads_field[$i]->getVar('title'), $nom_champ, 50, 255, $contenu));
				} else {
					$form->addElement(new XoopsFormHidden($nom_champ, ''));
				}
			}
		}
		
		//description
		$editor_configs=array();
		$editor_configs["name"] ="description";
		$editor_configs["value"] = $this->getVar('description', 'e');
		$editor_configs["rows"] = 20;
		$editor_configs["cols"] = 100;
		$editor_configs["width"] = "100%";
		$editor_configs["height"] = "400px";
		$editor_configs["editor"] = $xoopsModuleConfig['editor'];
		$form->addElement( new XoopsFormEditor(_AM_VIDEO_FORMTEXTDOWNLOADS, "description", $editor_configs), true);
		//extra
		if ($xoopsModuleConfig['shwo_extra'] == 1) {
			$form->addElement( new XoopsFormEditor(_AM_VIDEO_FORMEXTRATEXT, "extra", $editor_configs), false);
		}
		//tag
		if (is_dir('../../tag') || is_dir('../tag')){
			$dir_tag_ok = True;
		} else {
			$dir_tag_ok = False;
		}
		if (($xoopsModuleConfig['usetag'] == 1) and $dir_tag_ok){
			$tagId = $this->isNew() ? 0 : $this->getVar('lid');
			if ($erreur == true) {
				$tagId = $donnee['TAG'];
			}
			require_once XOOPS_ROOT_PATH.'/modules/tag/include/formtag.php';
			$form->addElement(new XoopsFormTag('tag', 60, 255, $tagId, 0));
		}
		//image
		$uploaddir = XOOPS_ROOT_PATH . '/uploads/video/images/shots/' . $this->getVar('logourl');
		$downloadscat_img = $this->getVar('logourl') ? $this->getVar('logourl') : 'blank.gif';
		if (!is_file($uploaddir)){
			$downloadscat_img = 'blank.gif';
		}
		$uploadirectory='/uploads/video/images/shots';
		$imgtray = new XoopsFormElementTray(_AM_VIDEO_FORMIMG,'<br />');
		$imageFrame = new XoopsFormText(_AM_VIDEO_FORMFRAME, 'frame_shot', 30, 60 , '15');
		$imgtray->addElement($imageFrame,false);
		if(!$this->isNew()) {
			$imgtray->addElement( new XoopsFormLabel( '', "<br /><img width='400'  src='" . $this->getVar('url') . "/" . $uploadirectory . "/" . $downloadscat_img . "' name='image3' id='image3' alt='' />" ) );
		}
		$fileseltray= new XoopsFormElementTray('','<br />');
		if ($perm_upload == true) {
			$fileseltray->addElement(new XoopsFormFile(_AM_VIDEO_FORMUPLOAD , 'attachedimage', $xoopsModuleConfig['maxuploadsize']), false);
		}
		$imgtray->addElement($fileseltray);
		$imgtray->addElement(new XoopsFormText(_AM_VIDEO_FORMIMG, 'logourl', 50, 255, $this->getVar('logourl')), false);
		if(!$this->isNew()) {
		   $newimg = new XoopsFormCheckBox('', 'newimg', '0');
		   $newimg->addOption(1, _AM_VIDEO_NEWIMG);
		   $imgtray->addElement($newimg);
		} else {
			$form->addElement(new XoopsFormHidden('newimg', '1'));
		}	
		$form->addElement($imgtray);
		// pour changer de poster et pour ne pas mettre � jour la date:
		if ($xoopsUser) {
			if ( $xoopsUser->isAdmin($xoopsModule->mid()) ) {
				// auteur
				if ($this->isNew()) {
					$submitter = !empty($xoopsUser) ? $xoopsUser->getVar('uid') : 0;
					$donnee['date_update'] = 0;
				} else {
					$submitter = $this->getVar('submitter');
					$v_date = $this->getVar('date');
				}
				if ($erreur == true) {
					$date_update = $donnee['date_update'];
					$v_status = $donnee['status'];
					$submitter = $donnee['submitter'];
				} else {
					$date_update = 'N';
					$v_status = 0;
				}
				$form->addElement(new XoopsFormSelectUser(_AM_VIDEO_FORMSUBMITTER, 'submitter', true, $submitter, 1, false), true);
				// date
				if (!$this->isNew()) {
					$selection_date = new XoopsFormElementTray(_AM_VIDEO_FORMDATEUPDATE);
					$date = new XoopsFormRadio('', 'date_update', $date_update);
					$options = array('N' =>_AM_VIDEO_FORMDATEUPDATE_NO . ' (' . formatTimestamp($v_date,'s') . ')', 'Y' => _AM_VIDEO_FORMDATEUPDATE_YES);
					$date->addOptionArray($options);
					$selection_date->addElement($date);
					$selection_date->addElement(new XoopsFormTextDateSelect('', 'date', '', strtotime(formatTimestamp(time()))));
					$form->addElement($selection_date);
				}
				$status = new XoopsFormCheckBox(_AM_VIDEO_FORMSTATUS, 'status', $v_status);
				$status->addOption(1, _AM_VIDEO_FORMSTATUS_OK);
				$form->addElement($status);

				if ($xoopsModuleConfig['permission_download'] == 2) {
					$member_handler = & xoops_gethandler('member');
					$group_list = &$member_handler->getGroupList();
					$gperm_handler = &xoops_gethandler('groupperm');
					$full_list = array_keys($group_list);
					global $xoopsModule;
					if(!$this->isNew()) {
						$item_ids_download = $gperm_handler->getGroupIds('video_download_item', $this->getVar('lid'), $xoopsModule->getVar('mid'));
						$item_ids_downloa = array_values($item_ids_download);
						$item_news_can_download_checkbox = new XoopsFormCheckBox(_AM_VIDEO_PERM_DOWNLOAD_DSC, 'item_download[]', $item_ids_download);
					} else {
						$item_news_can_download_checkbox = new XoopsFormCheckBox(_AM_VIDEO_PERM_DOWNLOAD_DSC, 'item_download[]', $full_list);
					}
					$item_news_can_download_checkbox->addOptionArray($group_list);
					$form->addElement($item_news_can_download_checkbox);
				}
				
			}
		}
      
      //related
      if ($xoopsModuleConfig['video_related'] == true){
	      $form->addElement(new XoopsFormText(_AM_VIDEO_FORMRELATED, 'related', 50, 255, $this->getVar('related')), false);
		}
		//paypal
		if ($xoopsModuleConfig['use_paypal'] == true){
			$form->addElement(new XoopsFormText(_AM_VIDEO_FORMPAYPAL, 'paypal', 50, 255, $this->getVar('paypal')), false);
		}
		// captcha
		$form->addElement(new XoopsFormCaptcha(), true);
		// pour passer "lid" si on modifie la cat�gorie
		if (!$this->isNew()) {
			$form->addElement(new XoopsFormHidden('lid', $this->getVar('lid')));
			$form->addElement(new XoopsFormHidden('downloads_modified', true));
		}
		//pour enregistrer le formulaire
		$form->addElement(new XoopsFormHidden('op', 'save_downloads'));
		//bouton d'envoi du formulaire
		$form->addElement(new XoopsFormButton('', 'submit', _SUBMIT, 'submit'));
		return $form;
	}
	
	function FormOne($uuid, $cid) {
		global $xoopsDB, $xoopsModule, $xoopsModuleConfig, $xoopsUser;
		//permission pour uploader
		$gperm_handler =& xoops_gethandler('groupperm');
		$groups = is_object($xoopsUser) ? $xoopsUser->getGroups() : XOOPS_GROUP_ANONYMOUS;
		if ($xoopsUser) {
			if ( !$xoopsUser->isAdmin($xoopsModule->mid()) ) {
				$perm_upload = ($gperm_handler->checkRight('video_ac', 32, $groups, $xoopsModule->getVar('mid'))) ? true : false ;
			} else {
				$perm_upload = true;
			}
		} else {
			$perm_upload = ($gperm_handler->checkRight('video_ac', 32, $groups, $xoopsModule->getVar('mid'))) ? true : false ;
		}
		//cr�ation du formulaire
		$form = new XoopsThemeForm(_AM_VIDEO_FORMADD, 'form', 'submit.php', 'post', true);
		$form->setExtra('enctype="multipart/form-data"');
		// video
		if ($perm_upload == true) {
			$video_upload = new XoopsFormFile (_AM_VIDEO_FORMUPLOAD, 'attachedfile', $xoopsModuleConfig['maxuploadsize']);
			$video = new XoopsFormElementTray ( _AM_VIDEO_FORMFILE );
			$video->addElement ( $video_upload );
			$form->addElement ($video);
			$form->addElement (new XoopsFormLabel('', '<br /><span class="progressbar" id="uploadprogressbar">0%</span>'));
		}
		if($cid) {
			$form->addElement(new XoopsFormHidden('cid', $cid));
		}	
		// captcha
		$form->addElement(new XoopsFormCaptcha(), true);
		//pour enregistrer le formulaire
		$form->addElement(new XoopsFormHidden('progress_key', $uuid));
		//pour enregistrer le formulaire
		$form->addElement(new XoopsFormHidden('op', 'upload'));
		//pour enregistrer le formulaire
		$form->addElement(new XoopsFormHiddenToken());
		//bouton d'envoi du formulaire
		$form->addElement(new XoopsFormButton('', 'submit', _SUBMIT, 'submit'));
		return $form;
	}
	
	function FormTwo() {
		global $xoopsDB, $xoopsModule, $xoopsModuleConfig, $xoopsUser;
		//cr�ation du formulaire
		$form = new XoopsThemeForm(_AM_VIDEO_FORMADD, 'form', $action = false, 'post', true);
		$form->setExtra('enctype="multipart/form-data"');
		//titre
		$form->addElement(new XoopsFormText(_AM_VIDEO_FORMTITLE, 'title', 50, 255, $this->getVar('title')), true);
		
		//cat�gorie
		$downloadscat_Handler =& xoops_getModuleHandler('video_cat', 'video');
		$categories = video_MygetItemIds('video_submit', 'video');
		$criteria = new CriteriaCompo();
		$criteria->setSort('cat_weight ASC, cat_title');
		$criteria->setOrder('ASC');
		if ($xoopsUser) {
			if ( !$xoopsUser->isAdmin($xoopsModule->mid()) ) {
				$criteria->add(new Criteria('cat_cid', '(' . implode(',', $categories) . ')','IN'));
			}
		} else {
			$criteria->add(new Criteria('cat_cid', '(' . implode(',', $categories) . ')','IN'));
		}
		$downloadscat_arr = $downloadscat_Handler->getall($criteria);
		if (count($downloadscat_arr) == 0){
			redirect_header('index.php', 2,  _NOPERM);
		}
		$mytree = new XoopsObjectTree($downloadscat_arr, 'cat_cid', 'cat_pid');
		$form->addElement(new XoopsFormLabel(_AM_VIDEO_FORMINCAT, $mytree->makeSelBox('cid', 'cat_title','--',$this->getVar('cid'),false)), true);
		 
		if ($xoopsUser->isAdmin($xoopsModule->mid()) ) {
			$form->addElement ( new XoopsFormRadioYN ( _AM_VIDEO_TOP, 'top', $this->getVar ( 'top', 'e' ) ) );
		} 

		//affichage des champs
		$downloadsfield_Handler =& xoops_getModuleHandler('video_field', 'video');
		$criteria = new CriteriaCompo();
		$criteria->setSort('weight ASC, title');
		$criteria->setOrder('ASC');
		$downloads_field = $downloadsfield_Handler->getall($criteria);
		foreach (array_keys($downloads_field) as $i) {
			if ($downloads_field[$i]->getVar('status_def') == 1){
				if ($downloads_field[$i]->getVar('fid') == 1){
					//page d'accueil
					if ($downloads_field[$i]->getVar('status') == 1){
						$form->addElement(new XoopsFormText(_AM_VIDEO_FORMHOMEPAGE, 'homepage', 50, 255, $this->getVar('homepage')));
					} else {
						$form->addElement(new XoopsFormHidden('homepage', ''));
					}
				}
				if ($downloads_field[$i]->getVar('fid') == 2){
					//version
					if ($downloads_field[$i]->getVar('status') == 1){
						$form->addElement(new XoopsFormText(_AM_VIDEO_FORMVERSION, 'version', 10, 255, $this->getVar('version')));
					} else {
						$form->addElement(new XoopsFormHidden('version', ''));
					}
				}
				if ($downloads_field[$i]->getVar('fid') == 4){
					//plateforme
					if ($downloads_field[$i]->getVar('status') == 1){
						$platformselect = new XoopsFormSelect(_AM_VIDEO_FORMPLATFORM, 'platform', explode('|',$this->getVar('platform')), 5, true);
						$platform_array = explode('|',$xoopsModuleConfig['plateform']);
						foreach( $platform_array as $platform ) {
							$platformselect->addOption("$platform", $platform);
						}
						$form->addElement($platformselect, false);
					} else {
						$form->addElement(new XoopsFormHidden('platform', ''));
					}
				}
			} else {
				$contenu = '';
				$contenu_iddata = '';
				$nom_champ = 'champ' . $downloads_field[$i]->getVar('fid');
				$downloadsfielddata_Handler =& xoops_getModuleHandler('video_fielddata', 'video');
				$criteria = new CriteriaCompo();
				$criteria->add(new Criteria('lid', $this->getVar('lid')));
				$criteria->add(new Criteria('fid', $downloads_field[$i]->getVar('fid')));
				$downloadsfielddata = $downloadsfielddata_Handler->getall($criteria);
				foreach (array_keys($downloadsfielddata) as $j) {
					if ($erreur == true) {
						$contenu = $donnee[$nom_champ];
					} else {
						if (!$this->isNew()) {
							$contenu = $downloadsfielddata[$j]->getVar('data');
						}
					}
					$contenu_iddata = $downloadsfielddata[$j]->getVar('iddata');
				}
				$iddata = 'iddata' . $downloads_field[$i]->getVar('fid');
				if (!$this->isNew()) {
					$form->addElement(new XoopsFormHidden($iddata, $contenu_iddata));
				}
				if ($downloads_field[$i]->getVar('status') == 1){
					$form->addElement(new XoopsFormText($downloads_field[$i]->getVar('title'), $nom_champ, 50, 255, $contenu));
				} else {
					$form->addElement(new XoopsFormHidden($nom_champ, ''));
				}
			}
		}
		
		//description
		$editor_configs=array();
		$editor_configs["name"] ="description";
		$editor_configs["value"] = $this->getVar('description', 'e');
		$editor_configs["rows"] = 20;
		$editor_configs["cols"] = 100;
		$editor_configs["width"] = "100%";
		$editor_configs["height"] = "400px";
		$editor_configs["editor"] = $xoopsModuleConfig['editor'];
		$form->addElement( new XoopsFormEditor(_AM_VIDEO_FORMTEXTDOWNLOADS, "description", $editor_configs), true);
		//extra
		if ($xoopsModuleConfig['shwo_extra'] == 1) {
			$form->addElement( new XoopsFormEditor(_AM_VIDEO_FORMEXTRATEXT, "extra", $editor_configs), false);
		}
		//tag
		if (is_dir('../../tag') || is_dir('../tag')){
			$dir_tag_ok = True;
		} else {
			$dir_tag_ok = False;
		}
		if (($xoopsModuleConfig['usetag'] == 1) and $dir_tag_ok){
			$tagId = $this->isNew() ? 0 : $this->getVar('lid');
			if ($erreur == true) {
				$tagId = $donnee['TAG'];
			}
			require_once XOOPS_ROOT_PATH.'/modules/tag/include/formtag.php';
			$form->addElement(new XoopsFormTag('tag', 60, 255, $tagId, 0));
		}
		//image
		$form->addElement(new XoopsFormText(_AM_VIDEO_FORMFRAME, 'frame_shot', 30, 60 , '15'));
		// pour changer de poster et pour ne pas mettre  jour la date:
		if ($xoopsUser) {
			if ( $xoopsUser->isAdmin($xoopsModule->mid()) ) {
				$status = new XoopsFormCheckBox(_AM_VIDEO_FORMSTATUS, 'status', 0);
				$status->addOption(1, _AM_VIDEO_FORMSTATUS_OK);
				$form->addElement($status);
			}
		}
		//pour enregistrer le formulaire
		$form->addElement(new XoopsFormHiddenToken());
		//pour enregistrer le formulaire
		$form->addElement(new XoopsFormHidden('op', 'save'));
		//bouton d'envoi du formulaire
		$form->addElement(new XoopsFormButton('', 'submit', _SUBMIT, 'submit'));
		return $form;
	}		
}

class videovideo_downloadsHandler extends XoopsPersistableObjectHandler
{
	function __construct(&$db)
	{
		parent::__construct($db, "video_downloads", 'video_downloads', 'lid', 'title');
	}
}
?>