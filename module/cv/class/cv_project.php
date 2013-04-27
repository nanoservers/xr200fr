<?php

if (!defined("XOOPS_ROOT_PATH")) {
	die("XOOPS root path not defined");
}

class cv_project extends XoopsObject
{ 
	public function __construct()
	{
		$this->initVar('project_id',XOBJ_DTYPE_INT,null,false);
		$this->initVar('project_title_fa',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('project_title_en',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('project_study_type',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('project_plan_type',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('project_environment',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('project_necessity',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('project_method',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('project_center',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('project_create',XOBJ_DTYPE_INT,null,false);
		$this->initVar('project_status',XOBJ_DTYPE_INT,null,false);
		$this->initVar('project_uid',XOBJ_DTYPE_INT,null,false);
		$this->initVar('project_desc',XOBJ_DTYPE_TXTAREA,null,false);
	}	
	
   public function Form()
	{
		$form = new XoopsThemeForm(_AM_CV_FORM, 'save', 'project.php', 'post', true);
		$form->setExtra('enctype="multipart/form-data"');
		$form->addElement(new XoopsFormHidden('op', 'save'));
		$form->addElement(new XoopsFormHidden('project_id', $this->getVar('project_id', 'e')));
		$form->addElement(new XoopsFormText(_AM_CV_TITLE_FA, 'project_title_fa', 50, 255, $this->getVar('project_title_fa')),true);
		$form->addElement(new XoopsFormText(_AM_CV_TITLE_EN, 'project_title_en', 50, 255, $this->getVar('project_title_en')),true);
      // 
		$project_study_type = new XoopsFormSelect(_AM_CV_STUDY_TYPE, 'project_study_type',$this->getVar('project_study_type'));
		$project_study_type->addOption(_AM_CV_STUDY_TYPE_1, _AM_CV_STUDY_TYPE_1);
	   $project_study_type->addOption(_AM_CV_STUDY_TYPE_2, _AM_CV_STUDY_TYPE_2);
	   $project_study_type->addOption(_AM_CV_STUDY_TYPE_3, _AM_CV_STUDY_TYPE_3);
	   $project_study_type->addOption(_AM_CV_STUDY_TYPE_4, _AM_CV_STUDY_TYPE_4);
	   $project_study_type->addOption(_AM_CV_STUDY_TYPE_5, _AM_CV_STUDY_TYPE_5);
	   $project_study_type->addOption(_AM_CV_STUDY_TYPE_6, _AM_CV_STUDY_TYPE_6);
	   $project_study_type->addOption(_AM_CV_STUDY_TYPE_7, _AM_CV_STUDY_TYPE_7);
	   $project_study_type->addOption(_AM_CV_STUDY_TYPE_8, _AM_CV_STUDY_TYPE_8);
	   $project_study_type->addOption(_AM_CV_STUDY_TYPE_9, _AM_CV_STUDY_TYPE_9);
	   $project_study_type->addOption(_AM_CV_STUDY_TYPE_10, _AM_CV_STUDY_TYPE_10);
	   $project_study_type->addOption(_AM_CV_STUDY_TYPE_11, _AM_CV_STUDY_TYPE_11);
	   $project_study_type->addOption(_AM_CV_STUDY_TYPE_12, _AM_CV_STUDY_TYPE_12);
	   $project_study_type->addOption(_AM_CV_STUDY_TYPE_13, _AM_CV_STUDY_TYPE_13);
	   $project_study_type->addOption(_AM_CV_STUDY_TYPE_14, _AM_CV_STUDY_TYPE_14);
		$form->addElement($project_study_type,true);
		//
		$project_plan_type = new XoopsFormSelect(_AM_CV_PLAN_TYPE, 'project_plan_type',$this->getVar('project_plan_type'));
		$project_plan_type->addOption(_AM_CV_PLAN_TYPE_1, _AM_CV_PLAN_TYPE_1);
	   $project_plan_type->addOption(_AM_CV_PLAN_TYPE_2, _AM_CV_PLAN_TYPE_2);
	   $project_plan_type->addOption(_AM_CV_PLAN_TYPE_3, _AM_CV_PLAN_TYPE_3);
	   $project_plan_type->addOption(_AM_CV_PLAN_TYPE_4, _AM_CV_PLAN_TYPE_4);
		$form->addElement($project_plan_type,true);
      //
		$form->addElement(new XoopsFormText(_AM_CV_ENVIRONMENT, 'project_environment', 50, 255, $this->getVar('project_environment')),true);
		$form->addElement(new XoopsFormText(_AM_CV_NECESSITY, 'project_necessity', 50, 255, $this->getVar('project_necessity')),true);
		$form->addElement(new XoopsFormText(_AM_CV_METHOD, 'project_method', 50, 255, $this->getVar('project_method')),true);
		$form->addElement(new XoopsFormText(_AM_CV_CENTER, 'project_center', 50, 255, $this->getVar('project_center')),true);
		$form->addElement(new XoopsFormTextArea(_AM_CV_DESC, 'project_desc', $this->getVar('project_desc','e'),5,80));
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

class CvCv_projectHandler extends XoopsPersistableObjectHandler
{
	public function __construct($db)
	{	//							           Table					Classe				Id
		parent::__construct($db, 'cv_project', 'cv_project', 'project_id');
	}	
	
	public function GetList($option) 
	{
		$ret = array();
		$criteria = new CriteriaCompo();
		$criteria->setSort('project_id');
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