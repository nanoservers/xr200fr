<?php
if (!defined("XOOPS_ROOT_PATH")) {
		$this->initVar("cat_tab",XOBJ_DTYPE_INT,null,false,1);
	function getForm($action = false)
		// seleted tab
		$tab = new XoopsFormSelect ( _AM_VIDEO_FORMTAB, 'cat_tab', $this->getVar ( "cat_tab" ) );
		$tab->addOption ( '0', _AM_VIDEO_FORMTABACTION );
		$tab->addOption ( '1', _AM_VIDEO_FORMTABINFO );
		$tab->addOption ( '2', _AM_VIDEO_FORMTABDESC );
		$tab->addOption ( '3', _AM_VIDEO_FORMTABEMBED );
		$tab->addOption ( '4', _AM_VIDEO_FORMTABMORE );
		$form->addElement ( $tab );
		//pour enregistrer le formulaire
}