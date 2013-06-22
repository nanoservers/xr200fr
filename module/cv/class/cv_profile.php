<?php

if (!defined("XOOPS_ROOT_PATH")) {
	die("XOOPS root path not defined");
}

class cv_profile extends XoopsObject
{ 
	public function __construct()
	{
		$this->initVar('profile_id',XOBJ_DTYPE_INT,null,false);
		$this->initVar('profile_firstname',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('profile_lastname',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('profile_email',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('profile_image',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('profile_biography',XOBJ_DTYPE_TXTAREA, null, false);
		$this->initVar('profile_create',XOBJ_DTYPE_INT,null,false);
		$this->initVar('profile_status',XOBJ_DTYPE_INT,null,false);
	}	
	
	public function Form()
	{
		$form = new XoopsThemeForm(_AM_CV_FORM, 'save', 'profile.php', 'post', true);
		$form->setExtra('enctype="multipart/form-data"');
		$form->addElement(new XoopsFormHidden('op', 'save'));
		$form->addElement(new XoopsFormHidden('profile_id', $this->getVar('profile_id', 'e')));
		$form->addElement(new XoopsFormText(_AM_CV_FIRSTNAME, 'profile_firstname', 50, 255, $this->getVar('profile_firstname')),true);
		$form->addElement(new XoopsFormText(_AM_CV_LASTNAME, 'profile_lastname', 50, 255, $this->getVar('profile_lastname')),true);
		$form->addElement(new XoopsFormText(_AM_CV_EMAIL, 'profile_email', 50, 255, $this->getVar('profile_email')),true);
		$form->addElement(new XoopsFormTextArea(_AM_CV_BIO, 'profile_biography', $this->getVar('profile_biography'),5,80));
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

class CvCv_profileHandler extends XoopsPersistableObjectHandler
{
	public function __construct($db)
	{	//							           Table					Classe				Id
		parent::__construct($db, 'cv_profile', 'cv_profile', 'profile_id');
	}	
	
	public function GetList($option) 
	{
		$ret = array();
		$criteria = new CriteriaCompo();
		$criteria->setSort('profile_id');
		$criteria->setOrder('DESC');
		$criteria->setStart($option['start']);
		$criteria->setLimit(25);
		$list = $this->getObjects($criteria, false);
		if($list) {
			foreach ($list as $root) {
				$tab = array();
				$tab = $root->toArray();
				$tab['profile_create'] = formatTimestamp($root->getVar('profile_create'), _MEDIUMDATESTRING);
				$ret[] = $tab;
			}	
		}
		return $ret;	
	}	
	
	public function GetListCount()
	{
		$criteria = new CriteriaCompo();
		return $this->getCount($criteria);
	}
}
?>