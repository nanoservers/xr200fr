<?php
defined("XOOPS_ROOT_PATH") or die("XOOPS root path not defined");

$dirname = basename(dirname(dirname(__FILE__)));
$module_handler = xoops_gethandler('module');
$module = $module_handler->getByDirname($dirname);
$pathIcon32 = $module->getInfo('icons32');

$adminmenu = array();

$i = 1;
$adminmenu[$i]["title"] = _MI_CV_MENU_HOME;
$adminmenu[$i]["link"]  = "admin/index.php";
$adminmenu[$i]["desc"] = '';
$adminmenu[$i]["icon"] = $pathIcon32.'/home.png';
$i++;
$adminmenu[$i]["title"] = _MI_CV_MENU_PROFILE;
$adminmenu[$i]["link"]  = "admin/profile.php";
$adminmenu[$i]["desc"] = '';
$adminmenu[$i]["icon"] = $pathIcon32.'/content.png';
$i++;
$adminmenu[$i]["title"] = _MI_CV_MENU_PROJECT;
$adminmenu[$i]["link"]  = "admin/project.php";
$adminmenu[$i]["desc"] = '';
$adminmenu[$i]["icon"] = $pathIcon32.'/content.png';
$i++;
$adminmenu[$i]["title"] = _MI_CV_MENU_PAPER;
$adminmenu[$i]["link"]  = "admin/paper.php";
$adminmenu[$i]["desc"] = '';
$adminmenu[$i]["icon"] = $pathIcon32.'/content.png';
$i++;
$adminmenu[$i]["title"] = _MI_CV_MENU_THESIS;
$adminmenu[$i]["link"]  = "admin/thesis.php";
$adminmenu[$i]["desc"] = '';
$adminmenu[$i]["icon"] = $pathIcon32.'/content.png';
$i++;
$adminmenu[$i]["title"] = _MI_CV_MENU_CONGRESS;
$adminmenu[$i]["link"]  = "admin/congress.php";
$adminmenu[$i]["desc"] = '';
$adminmenu[$i]["icon"] = $pathIcon32.'/content.png';
