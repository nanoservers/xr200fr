<?php

if (!defined("XOOPS_ROOT_PATH")) {
	die("XOOPS root path not defined");
}

class cv_thesis extends XoopsObject
{ 
	public function __construct()
	{
		$this->initVar('thesis_id',XOBJ_DTYPE_INT,null,false);
		$this->initVar('thesis_student_firstname',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('thesis_student_lastname',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('thesis_degree',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('thesis_title',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('thesis_defense_date',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('thesis_create',XOBJ_DTYPE_INT,null,false);
		$this->initVar('thesis_status',XOBJ_DTYPE_INT,null,false);
	}
	
	public function Form()
	{
		$form = new XoopsThemeForm(_AM_CV_FORM, 'save', 'thesis.php', 'post', true);
		$form->setExtra('enctype="multipart/form-data"');
		$form->addElement(new XoopsFormHidden('op', 'save'));
		$form->addElement(new XoopsFormHidden('thesis_id', $this->getVar('thesis_id', 'e')));
		$form->addElement(new XoopsFormText(_AM_CV_FIRSTNAME, 'thesis_student_firstname', 50, 255, $this->getVar('thesis_student_firstname')),true);
		$form->addElement(new XoopsFormText(_AM_CV_LASTNAME, 'thesis_student_lastname', 50, 255, $this->getVar('thesis_student_lastname')),true);
		$form->addElement(new XoopsFormText(_AM_CV_DEGREE, 'thesis_degree', 50, 100, $this->getVar('thesis_degree')),true);
		$form->addElement(new XoopsFormText(_AM_CV_TITLE, 'thesis_title', 50, 255, $this->getVar('thesis_title')),true);
		$form->addElement(new XoopsFormText(_AM_CV_DEFENSE_DATE, 'thesis_defense_date', 50, 100, $this->getVar('thesis_defense_date')),true);
		$form->addElement(new XoopsFormRadioYN(_AM_CV_STATUS, 'thesis_status', $this->getVar('thesis_status', 'e')));
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

class CvCv_thesisHandler extends XoopsPersistableObjectHandler
{
	public function __construct($db)
	{	//							           Table					Classe				Id
		parent::__construct($db, 'cv_thesis', 'cv_thesis', 'thesis_id');
	}	
	
	public function GetList($option) 
	{
		$ret = array();
		$criteria = new CriteriaCompo();
		$criteria->setSort('thesis_id');
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