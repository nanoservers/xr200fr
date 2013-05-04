<?php

class lives_channel extends XoopsObject {
	
	public function lives_channel() {
		$this->initVar ( 'channel_id', XOBJ_DTYPE_INT );
		$this->initVar ( 'channel_title', XOBJ_DTYPE_TXTBOX );
		$this->initVar ( 'channel_alias', XOBJ_DTYPE_TXTBOX );
		$this->initVar ( 'channel_text', XOBJ_DTYPE_TXTAREA, '' );
		$this->initVar ( 'channel_img', XOBJ_DTYPE_TXTBOX );
		$this->initVar ( 'channel_wms_pp', XOBJ_DTYPE_TXTBOX );
		$this->initVar ( 'channel_low_pp', XOBJ_DTYPE_TXTBOX );
		$this->initVar ( 'channel_medium_pp', XOBJ_DTYPE_TXTBOX );
		$this->initVar ( 'channel_high_pp', XOBJ_DTYPE_TXTBOX );
		$this->initVar ( 'channel_rtmp_url', XOBJ_DTYPE_TXTBOX );
		$this->initVar ( 'channel_rtsp_url', XOBJ_DTYPE_TXTBOX );
		$this->initVar ( 'channel_http_url', XOBJ_DTYPE_TXTBOX );
		$this->initVar ( 'channel_mms_url', XOBJ_DTYPE_TXTBOX );
		$this->initVar ( 'channel_order', XOBJ_DTYPE_INT );
		$this->initVar ( 'channel_create', XOBJ_DTYPE_INT );
		$this->initVar ( 'channel_hits', XOBJ_DTYPE_INT );
		$this->initVar ( 'channel_status', XOBJ_DTYPE_INT ,'1');
		
		$this->db = $GLOBALS ['xoopsDB'];
		$this->table = $this->db->prefix ( 'lives_channel' );
	}
		
	public function GetForm() {	
		$form = new XoopsThemeForm ( _AM_LIVES_CHANNEL_FORM, 'channel', 'backend.php', 'post' );
		$form->setExtra ( 'enctype="multipart/form-data"' );
		if ($this->isNew ()) {
			$form->addElement ( new XoopsFormHidden ( 'op', 'add' ) );
		} else {
			$form->addElement ( new XoopsFormHidden ( 'op', 'edit' ) );
		}
		$form->addElement ( new XoopsFormHidden ( 'channel_id', $this->getVar ( 'channel_id', 'e' ) ) );
		$form->addElement ( new XoopsFormText ( _AM_LIVES_CHANNEL_TITLE, 'channel_title', 50, 255, $this->getVar ( 'channel_title', 'e' ) ), true );
		$form->addElement ( new XoopsFormText ( _AM_LIVES_CHANNEL_ALIAS, 'channel_alias', 50, 255, $this->getVar ( 'channel_alias', 'e' ) ), true );
		$form->addElement ( new XoopsFormTextArea ( _AM_LIVES_CHANNEL_TEXT, 'channel_text', $this->getVar ( 'channel_text', 'e' ), 5, 80 ) );
      // Image
      $channel_img = $this->getVar ( 'channel_img' ) ? $this->getVar ( 'channel_img' ) : 'blank.gif';
		$upload_dir = '/uploads/lives/';
		$upload_channel_img = new XoopsFormElementTray ( _AM_LIVES_CHANNEL_IMG, '<br />' );
		$upload_channel_img->addElement ( new XoopsFormLabel ( '', "<img style='max-width: 500px; max-height: 500px;' src='" . XOOPS_URL . $upload_dir . $channel_img . "' name='image_item' id='image_item' alt='' />" ) );
		$upload_channel_img->addElement ( new XoopsFormFile ( _AM_LIVES_CHANNEL_FORMUPLOAD, 'channel_img', xoops_getModuleOption ( 'img_size', 'lives' )  ), false );
		$form->addElement ( $upload_channel_img );
		// pp
		$form->addElement ( new XoopsFormText ( _AM_LIVES_CHANNEL_WMSPP, 'channel_wms_pp', 20, 20, $this->getVar ( 'channel_wms_pp', 'e' ) ), false );
		$form->addElement ( new XoopsFormText ( _AM_LIVES_CHANNEL_LOWPP, 'channel_low_pp', 20, 20, $this->getVar ( 'channel_low_pp', 'e' ) ), false );
		$form->addElement ( new XoopsFormText ( _AM_LIVES_CHANNEL_MEDIUM, 'channel_medium_pp', 20, 20, $this->getVar ( 'channel_medium_pp', 'e' ) ), false );
		$form->addElement ( new XoopsFormText ( _AM_LIVES_CHANNEL_HIGH, 'channel_high_pp', 20, 20, $this->getVar ( 'channel_high_pp', 'e' ) ), false );
		// links
		$form->addElement ( new XoopsFormText ( _AM_LIVES_CHANNEL_RTMPUTL, 'channel_rtmp_url', 50, 255, $this->getVar ( 'channel_rtmp_url', 'e' ) ), false );
		$form->addElement ( new XoopsFormText ( _AM_LIVES_CHANNEL_RTSPURL, 'channel_rtsp_url', 50, 255, $this->getVar ( 'channel_rtsp_url', 'e' ) ), false );
		$form->addElement ( new XoopsFormText ( _AM_LIVES_CHANNEL_HTTPURL, 'channel_http_url', 50, 255, $this->getVar ( 'channel_http_url', 'e' ) ), false );
		$form->addElement ( new XoopsFormText ( _AM_LIVES_CHANNEL_MMSURL, 'channel_mms_url', 50, 255, $this->getVar ( 'channel_mms_url', 'e' ) ), false );
		// other
      $status = new XoopsFormSelect(_AM_LIVES_CHANNEL_STATUS, 'channel_status',$this->getVar ( 'channel_status', 'e' ));
		$status->addOption(0, _AM_LIVES_CHANNEL_STATUS1);
		$status->addOption(1, _AM_LIVES_CHANNEL_STATUS2);
		$status->addOption(2, _AM_LIVES_CHANNEL_STATUS3);
		$form->addElement($status);	
      // Button 
		$button_tray = new XoopsFormElementTray ( '', '' );
		$submit_btn = new XoopsFormButton ( '', 'post', _SUBMIT, 'submit' );
		$button_tray->addElement ( $submit_btn );
		$cancel_btn = new XoopsFormButton ( '', 'cancel', _CANCEL, 'cancel' );
		$cancel_btn->setExtra ( 'onclick="javascript:history.go(-1);"' );
		$button_tray->addElement ( $cancel_btn );
		$form->addElement ( $button_tray );
		$form->display ();
	}
	
	public function toArray() {
		$ret = array ();
		$vars = $this->getVars ();
		foreach ( array_keys ( $vars ) as $i ) {
			$ret [$i] = $this->getVar ( $i );
		}
		return $ret;
	}
}

class livesChannelHandler extends XoopsPersistableObjectHandler {
	
	public function livesChannelHandler($db) {
		parent::XoopsPersistableObjectHandler ( $db, 'lives_channel', 'lives_channel', 'channel_id', 'channel_title' );
	}

	public function setOrder() {
		$criteria = new CriteriaCompo ();
		$criteria->setSort ( 'channel_order' );
		$criteria->setOrder ( 'DESC' );
		$criteria->setLimit ( 1 );
		$last = $this->getObjects ( $criteria );
		$order = 1;
		foreach ( $last as $channel ) {
			$order = $channel->getVar ( 'channel_order' ) + 1;
		}
		return $order;
	}

	public function uploadImg($image) {
		include_once XOOPS_ROOT_PATH . "/class/uploader.php";
		$uploader_img = new XoopsMediaUploader ( 
			XOOPS_ROOT_PATH . '/uploads/lives/', 
			xoops_getModuleOption ( 'img_mime', 'lives' ), 
			xoops_getModuleOption ( 'img_size', 'lives' ), 
			xoops_getModuleOption ( 'img_maxwidth', 'lives' ), 
			xoops_getModuleOption ( 'img_maxheight', 'lives' ) 
		);
		if ($uploader_img->fetchMedia ( 'channel_img' )) {
			 $uploader_img->setPrefix ( 'channel_' );
			 $uploader_img->fetchMedia ( 'channel_img' );
			 if (! $uploader_img->upload ()) {
				$errors = $uploader_img->getErrors ();
				redirect_header( "javascript:history.go(-1)", 3, $errors );
				xoops_cp_footer ();
			   exit ();
			 } else {
				 return  $uploader_img->getSavedFileName ();
			 }
		} else {
			if (isset ( $image )) {
				return $image;
			}
		}
	}
	
	public function AdminList($info) {
		$ret = array ();
		$criteria = new CriteriaCompo ();
      $criteria->setSort ( 'channel_order' );
		$criteria->setOrder ( 'ASC' );
		$criteria->setLimit ( $info ['limit'] );
		$criteria->setStart ( $info ['start'] );
		$obj = $this->getObjects ( $criteria, false );
		if ($obj) {
			foreach ( $obj as $root ) {
				$tab = array ();
				$tab = $root->toArray ();
				$tab ['imgurl'] = XOOPS_URL . '/uploads/lives/' . $root->getVar ( 'channel_img' );
				$ret [] = $tab;
			}	
		}
		return $ret;	
	}	
	
	public function UserList() {
		$ret = array ();
		$criteria = new CriteriaCompo ();
		$criteria->add(new Criteria('channel_status', 0,'!='));
      $criteria->setSort ( 'channel_order' );
		$criteria->setOrder ( 'DESC' );
		$obj = $this->getObjects ( $criteria, false );
		if ($obj) {
			foreach ( $obj as $root ) {
				$tab = array ();
				$tab = $root->toArray ();
				$tab ['imgurl'] = XOOPS_URL . '/uploads/lives/' . $root->getVar ( 'channel_img' );
				$tab ['url'] = XOOPS_URL . '/modules/lives/index.php?id=' . $root->getVar ( 'channel_id' ) . '&amp;channel=' . $root->getVar ( 'channel_alias' );
				$ret [] = $tab;
			}	
		}
		return $ret;	
	}
	
	public function Count($info = null) {
		$criteria = new CriteriaCompo ();
		return $this->getCount ( $criteria );
	}


}	

?>