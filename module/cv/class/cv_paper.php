<?php

if (!defined("XOOPS_ROOT_PATH")) {
	die("XOOPS root path not defined");
}

class cv_paper extends XoopsObject
{ 
	public function __construct()
	{
		$this->initVar('paper_id',XOBJ_DTYPE_INT,null,false);
		$this->initVar('paper_group',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('paper_title',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('paper_type',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('paper_project',XOBJ_DTYPE_INT,null,false);
		$this->initVar('paper_magazine_name',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('paper_magazine_year',XOBJ_DTYPE_INT,null,false);
		$this->initVar('paper_magazine_volume',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('paper_magazine_issue',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('paper_magazine_page_start',XOBJ_DTYPE_INT,null,false);
		$this->initVar('paper_magazine_page_end',XOBJ_DTYPE_INT,null,false);
		$this->initVar('paper_file',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('paper_create',XOBJ_DTYPE_INT,null,false);
		$this->initVar('paper_status',XOBJ_DTYPE_INT,null,false);
	}	
	
	public function Form()
	{
		$form = new XoopsThemeForm(_AM_CV_FORM, 'save', 'paper.php', 'post', true);
		$form->setExtra('enctype="multipart/form-data"');
		$form->addElement(new XoopsFormHidden('op', 'save'));
		$form->addElement(new XoopsFormHidden('paper_id', $this->getVar('paper_id', 'e')));
      $form->addElement(new XoopsFormText(_AM_CV_GROUP, 'paper_group', 50, 255, $this->getVar('paper_group')),true);
      $form->addElement(new XoopsFormText(_AM_CV_TITLE, 'paper_title', 50, 255, $this->getVar('paper_title')),true);
      $form->addElement(new XoopsFormText(_AM_CV_TYPE, 'paper_type', 50, 255, $this->getVar('paper_type')),true);
      $form->addElement(new XoopsFormText(_AM_CV_MAGAZINE_NAME, 'paper_magazine_name', 50, 255, $this->getVar('paper_magazine_name')),true);
      $form->addElement(new XoopsFormText(_AM_CV_MAGAZINE_YEAR, 'paper_magazine_year', 4, 4, $this->getVar('paper_magazine_year')),true);
      $form->addElement(new XoopsFormText(_AM_CV_MAGAZINE_VOLUME, 'paper_magazine_volume', 50, 255, $this->getVar('paper_magazine_volume')),true);
      $form->addElement(new XoopsFormText(_AM_CV_MAGAZINE_ISSUE, 'paper_magazine_issue', 50, 255, $this->getVar('paper_magazine_issue')),true);
      $form->addElement(new XoopsFormText(_AM_CV_MAGAZINE_PAGE_START, 'paper_magazine_page_start', 4, 4, $this->getVar('paper_magazine_page_start')),true);
      $form->addElement(new XoopsFormText(_AM_CV_MAGAZINE_PAGE_END, 'paper_magazine_page_end', 4, 4, $this->getVar('paper_magazine_page_end')),true);
		$form->addElement(new XoopsFormFile(_AM_CV_FILE, 'paper_file', 10000000000),false);
      $form->addElement(new XoopsFormRadioYN(_AM_CV_STATUS, 'paper_status', $this->getVar('paper_status', 'e')));
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

class CvCv_paperHandler extends XoopsPersistableObjectHandler
{
	public function __construct($db)
	{	//							           Table					Classe				Id
		parent::__construct($db, 'cv_paper', 'cv_paper', 'paper_id');
	}	
	
	public function GetList($option) 
	{
		$ret = array();
		$criteria = new CriteriaCompo();
		$criteria->setSort('paper_id');
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