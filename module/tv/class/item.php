<?php

class tv_item extends XoopsObject {
	
	public function tv_item() {
		$this->initVar ( 'item_id', XOBJ_DTYPE_INT );
		$this->initVar ( 'item_title', XOBJ_DTYPE_TXTBOX );
		$this->initVar ( 'item_text', XOBJ_DTYPE_TXTAREA );
		$this->initVar ( 'item_status', XOBJ_DTYPE_INT , '1');
		$this->initVar ( 'item_img', XOBJ_DTYPE_TXTBOX );
		$this->initVar ( 'item_created', XOBJ_DTYPE_INT);
		$this->initVar ( 'item_select', XOBJ_DTYPE_INT);
      $this->initVar ( 'dohtml', XOBJ_DTYPE_INT, 1 );
		$this->initVar ( 'doxcode', XOBJ_DTYPE_INT, 1 );
		$this->initVar ( 'dosmiley', XOBJ_DTYPE_INT, 1 );
		$this->initVar ( 'doimage', XOBJ_DTYPE_INT, 1 );
		$this->initVar ( 'dobr', XOBJ_DTYPE_INT, 1 );
      		
		$this->db = $GLOBALS ['xoopsDB'];
		$this->table = $this->db->prefix ( 'tv_item' );
	}
		
	public function getItemForm() {	
		$form = new XoopsThemeForm ( _AM_TV_ITEM_FORM, 'item', 'backend.php', 'post' );
		$form->setExtra ( 'enctype="multipart/form-data"' );
		if ($this->isNew ()) {
			$form->addElement ( new XoopsFormHidden ( 'op', 'additem' ) );
		} else {
			$form->addElement ( new XoopsFormHidden ( 'op', 'edititem' ) );
		}
		$form->addElement ( new XoopsFormHidden ( 'item_id', $this->getVar ( 'item_id', 'e' ) ) );
		$form->addElement ( new XoopsFormText ( _AM_TV_ITEM_TITLE, 'item_title', 50, 255, $this->getVar ( 'item_title', 'e' ) ), true );
		//
		$editor_tray = new XoopsFormElementTray ( _AM_TV_ITEM_TEXT, '<br />' );
		if (class_exists ( 'XoopsFormEditor' )) {
			$configs = array ('name' => 'item_text', 'value' => $this->getVar ( 'item_text', 'e' ), 'rows' => 25, 'cols' => 90, 'width' => '100%', 'height' => '400px', 'editor' => xoops_getModuleOption ( 'form_editor', 'tv' ) );
			$editor_tray->addElement ( new XoopsFormEditor ( '', 'item_text', $configs, false, $onfailure = 'textarea' ) );
		} else {
			$editor_tray->addElement ( new XoopsFormDhtmlTextArea ( '', 'item_text', $this->getVar ( 'item_text', 'e' ), '100%', '100%' ) );
		}
		$form->addElement ($editor_tray);
		//
		$form->addElement ( new XoopsFormRadioYN ( _AM_TV_ITEM_STATUS, 'item_status', $this->getVar ( 'item_status', 'e' ) ) );
		$form->addElement ( new XoopsFormRadioYN ( _AM_TV_ITEM_SELECT, 'item_select', $this->getVar ( 'item_select', 'e' ) ) );
      // Image
      $item_img = $this->getVar ( 'item_img' ) ? $this->getVar ( 'item_img' ) : 'blank.gif';
		$imgdir = '/uploads/tv/';
		$fileseltray_item_img = new XoopsFormElementTray ( _AM_TV_ITEM_IMG, '<br />' );
		$fileseltray_item_img->addElement ( new XoopsFormLabel ( '', "<img style='max-width: 500px; max-height: 500px;' src='" . XOOPS_URL . $imgdir . $item_img . "' name='image_item' id='image_item' alt='' />" ) );
		$fileseltray_item_img->addElement ( new XoopsFormFile ( _AM_TV_ITEM_FORMUPLOAD, 'item_img', xoops_getModuleOption ( 'img_size', 'tv' )  ), false );
		$form->addElement ( $fileseltray_item_img );
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

class tvItemHandler extends XoopsPersistableObjectHandler {
	
	public function tvItemHandler($db) {
		parent::XoopsPersistableObjectHandler ( $db, 'tv_item', 'tv_item', 'item_id', 'item_title' );
	}

	public function uploadimg($obj, $image) {
		include_once XOOPS_ROOT_PATH . "/class/uploader.php";
		$uploader_img = new XoopsMediaUploader ( 
		XOOPS_ROOT_PATH . '/uploads/tv/', 
		xoops_getModuleOption ( 'img_mime', 'tv' ), 
		xoops_getModuleOption ( 'img_size', 'tv' ), 
		xoops_getModuleOption ( 'img_maxwidth', 'tv' ), 
		xoops_getModuleOption ( 'img_maxheight', 'tv' ) 
		);
		if ($uploader_img->fetchMedia ( 'item_img' )) {
			$uploader_img->setPrefix ( 'tv_' );
			$uploader_img->fetchMedia ( 'item_img' );
			if (! $uploader_img->upload ()) {
				$errors = $uploader_img->getErrors ();
				fmcontent_Redirect ( "javascript:history.go(-1)", 3, $errors );
				xoops_cp_footer ();
			   exit ();
			} else {
				$obj->setVar ( 'item_img', $uploader_img->getSavedFileName () );
			}
		} else {
			if (isset ( $image )) {
				$obj->setVar ( 'item_img', $image );
			}
		}
	}
	
	public function itemAdminList($info) {
		$ret = array ();
		$criteria = new CriteriaCompo ();
		
      $criteria->setSort ( $info ['item_sort'] );
		$criteria->setOrder ( $info ['item_order'] );
		$criteria->setLimit ( $info ['item_limit'] );
		$criteria->setStart ( $info ['item_start'] );
		
		$obj = $this->getObjects ( $criteria, false );
		if ($obj) {
			foreach ( $obj as $root ) {
				$tab = array ();
				$tab = $root->toArray ();
				$tab ['imgurl'] = XOOPS_URL . '/uploads/tv/' . $root->getVar ( 'item_img' );
				$tab ['itemurl'] = XOOPS_URL . '/modules/tv/program.php?id=' . $root->getVar ( 'item_id' );
				$ret [] = $tab;
			}	
		}
		
		return $ret;	
	}	
	
	public function itemCount() {
		$criteria = new CriteriaCompo ();
		return $this->getCount ( $criteria );
	}

   public function selectList() {
   	$ret = array ();
		$criteria = new CriteriaCompo ();
		$criteria->add ( new Criteria ( 'item_status', 1 ) );
		$criteria->add ( new Criteria ( 'item_select', 1 ) );
		$criteria->setOrder ( 'DESC' );
		
		$obj = $this->getObjects ( $criteria, false );
		if ($obj) {
			foreach ( $obj as $root ) {
				$tab = array ();
				$tab = $root->toArray ();
				$tab ['imgurl'] = XOOPS_URL . '/uploads/tv/' . $root->getVar ( 'item_img' );
				$tab ['itemurl'] = XOOPS_URL . '/modules/tv/program.php?id=' . $root->getVar ( 'item_id' );
				$ret [] = $tab;
			}	
		}
		
		return $ret;
   }	
}	

?>