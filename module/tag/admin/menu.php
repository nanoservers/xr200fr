<?php
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code 
 which is considered copyrighted (c) material of the original comment or credit authors.
 
 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

/**
 * XOOPS tag management module
 *
 * @copyright       The XOOPS project http://sourceforge.net/projects/xoops/
 * @license         http://www.fsf.org/copyleft/gpl.html GNU public license
 * @since           1.0.0
 * @author          Taiwen Jiang <phppp@users.sourceforge.net>
 * @version         $Id: menu.php 1575 2008-05-04 15:54:26Z phppp $
 * @package         tag
 */

if (!defined('XOOPS_ROOT_PATH')) { exit(); }

$module_handler =& xoops_gethandler('module');
$xoopsModule =& XoopsModule::getByDirname('tag');
$moduleInfo =& $module_handler->get($xoopsModule->getVar('mid'));
$pathImageAdmin = $moduleInfo->getInfo('icons32');

$adminmenu = array();

$i = 1;
$adminmenu[$i]["title"] = TAG_MI_ADMENU_INDEX;
$adminmenu[$i]["link"]  = "admin/index.php";
$adminmenu[$i]["desc"] = _TAG_ADMIN_HOME_DESC;
$adminmenu[$i]["icon"] = '../../'.$pathImageAdmin.'/home.png';
$i++;
$adminmenu[$i]["title"] = TAG_MI_ADMENU_EDIT;
$adminmenu[$i]["link"]  = "admin/admin.tag.php";
$adminmenu[$i]["desc"] = _TAG_ADMIN_ABOUT_DESC;
$adminmenu[$i]["icon"] = '../../'.$pathImageAdmin.'/administration.png';
$i++;
$adminmenu[$i]["title"] = TAG_MI_ADMENU_SYNCHRONIZATION;
$adminmenu[$i]["link"]  = "admin/syn.tag.php";
$adminmenu[$i]["desc"] = _TAG_ADMIN_HELP_DESC;
$adminmenu[$i]["icon"] = '../../'.$pathImageAdmin.'/synchronized.png';
