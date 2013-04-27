<?php

if (!defined("XOOPS_ROOT_PATH")) {
	die("XOOPS root path not defined");
}

class cv_profile_congress extends XoopsObject
{ 
	public function __construct()
	{
		$this->initVar('profile_congress_id',XOBJ_DTYPE_INT,null,false);
		$this->initVar('profile_congress_profile',XOBJ_DTYPE_INT,null,false);
		$this->initVar('profile_congress_congress',XOBJ_DTYPE_INT,null,false);
		$this->initVar('profile_congress_type',XOBJ_DTYPE_TXTBOX,null,false);
		$this->initVar('profile_congress_title',XOBJ_DTYPE_TXTBOX,null,false);
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

class CvCv_profile_congressHandler extends XoopsPersistableObjectHandler
{
	public function __construct($db)
	{	//							           Table					Classe				Id
		parent::__construct($db, 'cv_profile_congress', 'cv_profile_congress', 'profile_congress_id');
	}	
}
?>