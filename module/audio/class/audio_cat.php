<?php
if (!defined("XOOPS_ROOT_PATH")) {
		$this->initVar("cat_tab",XOBJ_DTYPE_INT,null,false,1);
	function getForm($action = false)
		// seleted tab
		$tab = new XoopsFormSelect ( _AM_AUDIO_FORMTAB, 'cat_tab', $this->getVar ( "cat_tab" ) );
		$tab->addOption ( '0', _AM_AUDIO_FORMTABACTION );
		$tab->addOption ( '1', _AM_AUDIO_FORMTABINFO );
		$tab->addOption ( '2', _AM_AUDIO_FORMTABDESC );
		$tab->addOption ( '3', _AM_AUDIO_FORMTABEMBED );
		$tab->addOption ( '4', _AM_AUDIO_FORMTABMORE );
		$form->addElement ( $tab );
		//pour enregistrer le formulaire
}