<?php

if (!defined("XOOPS_ROOT_PATH")) {
	die("XOOPS root path not defined");
}

class cv_congress extends XoopsObject
{ 
	public function __construct()
	{
		$this->initVar('congress_id',XOBJ_DTYPE_INT,null,false);
		$this->initVar('congress_title',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('congress_date',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('congress_type',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('congress_country',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('congress_location',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('congress_create',XOBJ_DTYPE_INT,null,false);
		$this->initVar('congress_status',XOBJ_DTYPE_INT,null,false);
	}	
	
	public function Form()
	{
		$form = new XoopsThemeForm(_AM_CV_FORM, 'save', 'congress.php', 'post', true);
		$form->setExtra('enctype="multipart/form-data"');
		$form->addElement(new XoopsFormHidden('op', 'save'));
		$form->addElement(new XoopsFormHidden('congress_id', $this->getVar('congress_id', 'e')));
		$form->addElement(new XoopsFormText(_AM_CV_TITLE, 'congress_title', 50, 255, $this->getVar('congress_title')),true);
		$form->addElement(new XoopsFormText(_AM_CV_DATE, 'congress_date', 50, 100, $this->getVar('congress_date')),true);
		//
		$congress_type = new XoopsFormSelect(_AM_CV_TYPE, 'congress_type',$this->getVar('congress_type'));
		$congress_type->addOption(_AM_CV_TYPE_1, _AM_CV_TYPE_1);
	   $congress_type->addOption(_AM_CV_TYPE_2, _AM_CV_TYPE_2);
	   $congress_type->addOption(_AM_CV_TYPE_3, _AM_CV_TYPE_3);
	   $congress_type->addOption(_AM_CV_TYPE_4, _AM_CV_TYPE_4);
		$form->addElement($congress_type,true);
		//
		$form->addElement(new XoopsFormText(_AM_CV_COUNTRY, 'congress_country', 50, 100, $this->getVar('congress_country')),true);
		$form->addElement(new XoopsFormText(_AM_CV_LOCATION, 'congress_location', 50, 100, $this->getVar('congress_location')),true);
		$form->addElement(new XoopsFormRadioYN(_AM_CV_STATUS, 'congress_status', $this->getVar('congress_status', 'e')));
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

class CvCv_congressHandler extends XoopsPersistableObjectHandler
{
	public function __construct($db)
	{	//							           Table					Classe				Id
		parent::__construct($db, 'cv_congress', 'cv_congress', 'congress_id');
	}	
	
	public function GetList($option) 
	{
		$ret = array();
		$criteria = new CriteriaCompo();
		$criteria->setSort('congress_id');
		$criteria->setOrder('DESC');
		$criteria->setStart($option['start']);
		$criteria->setLimit(25);
		$list = $this->getObjects($criteria, false);
		if($list) {
			foreach ($list as $root) {
				$tab = array();
				$tab = $root->toArray();
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