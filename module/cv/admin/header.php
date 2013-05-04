<?php 

$path = dirname(dirname(dirname(dirname(__FILE__))));

include_once $path . '/mainfile.php';
include_once XOOPS_ROOT_PATH . '/include/cp_functions.php';
include_once XOOPS_ROOT_PATH . '/include/cp_header.php';
include_once XOOPS_ROOT_PATH . '/class/pagenav.php';
include_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';
include_once XOOPS_ROOT_PATH . '/modules/cv/class/cv_utils.php';
global $xoopsModule;

$thisModuleDir = $GLOBALS['xoopsModule']->getVar('dirname');

// Load language files
xoops_loadLanguage('admin', $thisModuleDir);
xoops_loadLanguage('modinfo', $thisModuleDir);
xoops_loadLanguage('main', $thisModuleDir);

$pathIcon16 = '../'.$xoopsModule->getInfo('icons16');
$pathIcon32 = '../'.$xoopsModule->getInfo('icons32');
$pathModuleAdmin = $xoopsModule->getInfo('dirmoduleadmin');

// Cv Handler
$project_handler = xoops_getModuleHandler('cv_project', 'cv');
$paper_handler = xoops_getModuleHandler('cv_paper', 'cv');
$congress_handler = xoops_getModuleHandler('cv_congress', 'cv');
$thesis_handler = xoops_getModuleHandler('cv_thesis', 'cv');
$profile_handler = xoops_getModuleHandler('cv_profile', 'cv');
$profile_thesis_handler = xoops_getModuleHandler('cv_profile_thesis', 'cv');
$profile_congress_handler = xoops_getModuleHandler('cv_profile_congress', 'cv');
$profile_paper_handler = xoops_getModuleHandler('cv_profile_paper', 'cv');
$profile_project_handler = xoops_getModuleHandler('cv_profile_project', 'cv');
$profile_arbitration_handler = xoops_getModuleHandler('cv_profile_arbitration', 'cv');
$profile_journal_handler = xoops_getModuleHandler('cv_profile_journal', 'cv');

// Locad admin menu class
if ( file_exists($GLOBALS['xoops']->path($pathModuleAdmin.'/moduleadmin.php'))){
	include_once $GLOBALS['xoops']->path($pathModuleAdmin.'/moduleadmin.php');
}else{
	redirect_header("../../../admin.php", 5, _AM_MODULEADMIN_MISSING, false);
}

// Set admin menu class
$admin_class = new ModuleAdmin();

// Display Admin header
xoops_cp_header();

// Add module stylesheet
$xoTheme->addStylesheet(XOOPS_URL . '/modules/system/css/ui/' . xoops_getModuleOption('jquery_theme', 'system') . '/ui.all.css');
$xoTheme->addStylesheet(XOOPS_URL . '/modules/system/css/admin.css');
?>