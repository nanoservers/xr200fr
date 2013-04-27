<?php

if (!defined("XOOPS_ROOT_PATH")) {
	die("XOOPS root path not defined");
}

class cv_profile_thesis extends XoopsObject
{ 
	public function __construct()
	{
		$this->initVar('profile_thesis_id',XOBJ_DTYPE_INT,null,false);
		$this->initVar('profile_thesis_profile',XOBJ_DTYPE_INT,null,false);
		$this->initVar('profile_thesis_thesis',XOBJ_DTYPE_INT,null,false);
		$this->initVar('profile_thesis_post',XOBJ_DTYPE_TXTBOX,null,false);
	}	
	
	public function Form($profile)
	{
		$form = new XoopsThemeForm(_AM_CV_FORM, 'save', 'profile.php', 'post', true);
		$form->setExtra('enctype="multipart/form-data"');
		$form->addElement(new XoopsFormHidden('op', 'profile_thesis'));
		$form->addElement(new XoopsFormHidden('level', 'save'));
		$form->addElement(new XoopsFormHidden('profile', $profile['profile_id']));
		
		
		$form->addElement(new XoopsFormButton('', 'submit', _SUBMIT, 'submit'));
		$form->display();
	}
	
	/**
	 * Returns an array representation of the object
	 *
	 * @return array
	 **/
	public function toArray() 
	{
		$ret = array ();
		$vars = $this->getVars ();
		foreach ( array_keys ( $vars ) as $i ) {
			$ret [$i] = $this->getVar ( $i );
		}
		return $ret;
	}
}

class CvCv_profile_thesisHandler extends XoopsPersistableObjectHandler
{
	public function __construct($db)
	{	//							           Table					Classe				Id
		parent::__construct($db, 'cv_profile_thesis', 'cv_profile_thesis', 'profile_thesis_id');
	}	
}
?>