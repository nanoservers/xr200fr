<?php
	$downloadsfield_Handler =& xoops_getModuleHandler('video_field', 'video');
	$obj =& $downloadsfield_Handler->create();
	$obj =& $downloadsfield_Handler->create();
	$obj =& $downloadsfield_Handler->create();
	$obj =& $downloadsfield_Handler->create();
	//platform
   $obj =& $downloadsfield_Handler->create();
	
	
	//Creation du fichier ".$namemodule."/
	copy(XOOPS_ROOT_PATH."/modules/".$namemodule."/images/icon/duration.png", XOOPS_ROOT_PATH."/uploads/".$namemodule."/images/field/duration.png");
?>