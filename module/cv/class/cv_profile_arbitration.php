<?php

if (!defined("XOOPS_ROOT_PATH")) {
	die("XOOPS root path not defined");
}

class cv_profile_arbitration extends XoopsObject
{ 
	public function __construct()
	{
		$this->initVar('profile_arbitration_id',XOBJ_DTYPE_INT,null,false);
		$this->initVar('profile_arbitration_profile',XOBJ_DTYPE_INT,null,false);
		$this->initVar('profile_arbitration_paper_title',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('profile_arbitration_paper_journal',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('profile_arbitration_type',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('profile_arbitration_lang',XOBJ_DTYPE_TXTBOX,null,false);
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

class CvCv_profile_arbitrationHandler extends XoopsPersistableObjectHandler
{
	public function __construct($db)
	{	//							           Table					Classe				Id
		parent::__construct($db, 'cv_profile_arbitration', 'cv_profile_arbitration', 'profile_arbitration_id');
	}	
}
?>