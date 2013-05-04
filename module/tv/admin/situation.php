<?php
require 'header.php';
xoops_cp_header();
$op = tv_CleanVars($_REQUEST, 'op', '', 'string');

switch($op) { 
	case 'save':
	   $configHandler =& xoops_gethandler('config');
	   $moduleIdCriteria = new Criteria('conf_modid',$xoopsModule->getVar('mid'));
	   
	   if(isset($_POST['situation_text'])) {
		   if(xoops_getModuleOption ( 'situation', 'tv' ) != $_POST['situation_text']) {
		    $criteria = new CriteriaCompo();
		    $criteria->add($moduleIdCriteria);
		    $criteria->add(new Criteria('conf_name','situation'));
		    $config = $configHandler->getConfigs($criteria);
		    $config = $config[0];
		    $configValue = array(
		          'conf_modid'=>$xoopsModule->getVar('mid'),
		          'conf_catid'=>0,
		          'conf_name'=>'situation',
		          'conf_value'=>$_POST['situation_text'],
		          'conf_formtype'=>'hidden',
		          'conf_valuetype'=>'text'
		         );
		    $config->setVars($configValue);
		    $configHandler->insertConfig($config);
		   }
	   }
	   redirect_header("situation.php", 3, _AM_TV_SITUATION_CONFIGURATION_SAVED);
		break;
	
	case 'default':
	default:
      $xoTheme->addStylesheet(XOOPS_URL . '/modules/system/css/admin.css');
		$form = new XoopsThemeForm(_AM_TV_SITUATION_FORM, 'situation', 'situation.php', 'post', true);
		
		$d = new XoopsFormTextArea ( _AM_TV_SITUATION_ITEMS, 'situation_text', xoops_getModuleOption ( 'situation', 'tv' ), 5, 80 );
		$d->setDescription ( _AM_TV_SITUATION_ITEMS_DESC );
		$form->addElement ( $d );
		$form->addElement(new XoopsFormHidden("op", 'save'));
	   $form->addElement(new XoopsFormButton("", "submit", _SUBMIT, "submit"));
		$xoopsTpl->assign('form', $form->render());
		
		$xoopsTpl->display(XOOPS_ROOT_PATH . '/modules/tv/templates/admin/tv_situation.html');
		// footer
		
		break;
}

xoops_cp_footer();
?>