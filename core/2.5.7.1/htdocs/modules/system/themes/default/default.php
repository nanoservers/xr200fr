<?php
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

xoops_load('gui', 'system');

/*
 * Xoops Cpanel default GUI class
 *
 * @copyright   The XOOPS project http://sf.net/projects/xoops/
 * @license     http://www.fsf.org/copyleft/gpl.html GNU public license
 * @package     system
 * @usbpackage  GUI
 * @since       2.5
 * @author      Voltan      <djvoltan@gmail.com>
 * @version     1.3
 * @version     $Id$
 */

class XoopsGuiDefault extends XoopsSystemGui
{

	function __construct()
	{
	}

	function XoopsGuiDefault()
	{
		$this->__construct();
	}

	function validate()
	{
		return true;
	}


	function header()
	{
		parent::header();

		global $xoopsConfig, $xoopsUser, $xoopsModule, $xoTheme, $xoopsTpl;

		$xoTheme->addStylesheet( XOOPS_ADMINTHEME_URL . '/default/css/style.css' );
		$xoTheme->addStylesheet( XOOPS_ADMINTHEME_URL . '/default/css/main.css' );

		$modulesinfo = $this->modulesinfo();
		$modmenuinfo = $this->modmenuinfo($xoopsModule);
        $this->template->assign('lang_cp', _CPHOME);
		$this->template->assign('mod_options', $modmenuinfo['mod_options']);
		$this->template->assign('modpath', $modmenuinfo['modpath']);
		$this->template->assign('modname', $modmenuinfo['modname']);
		$this->template->assign('modid', $modmenuinfo['modid']);
		$this->template->assign('moddir', $modmenuinfo['moddir']);
		$this->template->assign('submits',$this->submits($modulesinfo , $xoopsUser));

		$this->template->append('navitems', array('link' => XOOPS_URL . '/admin.php', 'text' => _CPHOME, 'menu' => $this->mainmenu()));
		$this->template->append('navitems', array('link' => XOOPS_URL . '/modules/system/admin.php?fct=modulesadmin','text' => _AM_SYSTEM_MODULES, 'menu' => $this->moduleinfo($modulesinfo , $xoopsUser)));
		
		$this->template->append('navitems', array('link' => XOOPS_URL . '/modules/system/admin.php?fct=preferences','text' => _OXYGEN_SITEPREF, 'menu' => $this->systempref()));
		$this->template->append('navitems', array('link' => XOOPS_URL . '/modules/system/admin.php?fct=preferences', 'text' => _OXYGEN_MODULESPREF, 'menu' => $this->modulespref($modulesinfo,$xoopsUser)));
		
		$this->template->append('navitems', array('link' => XOOPS_URL . '/modules/' . $modmenuinfo['moddir'] . '/' . $modmenuinfo['adminindex'],'text' => $modmenuinfo['modname'],  'menu' => $modmenuinfo['mod_options']));
		
		if (empty($xoopsModule)){
			$this->template->assign ( 'modules', $this->listmodules($modulesinfo , $xoopsUser) );
		}
	}

	function modulesinfo() {
		$module_handler =& xoops_gethandler('module');
		$criteria = new CriteriaCompo();
		$criteria->add(new Criteria('hasadmin', 1));
		$criteria->add(new Criteria('isactive', 1));
		$criteria->setSort('mid');
		$mods = $module_handler->getObjects($criteria);
		return $mods;
	}

	function mainmenu() {
		$menu = array();
		$menu[0]['link'] = XOOPS_URL;
		$menu[0]['title'] = _YOURHOME;
		$menu[0]['absolute'] = 1;
		$menu[1]['link'] = 'http://www.mohtava.com/modules/news/';
		$menu[1]['title'] = _OXYGEN_NEWS;
		$menu[1]['absolute'] = 1;
		$menu[1]['icon'] = XOOPS_ADMINTHEME_URL . '/default/images/xoops.png';
		$menu[2]['link'] = XOOPS_URL . '/user.php?op=logout';
		$menu[2]['title'] = _LOGOUT;
		$menu[2]['absolute'] = 1;
		$menu[2]['icon'] = XOOPS_ADMINTHEME_URL . '/default/images/logout.png';
		return $menu;
	}

	function systempref() {
		$menu = array();
		$menu[] = array(
            'link'      => XOOPS_URL . '/modules/system/admin.php?fct=preferences&amp;op=show&amp;confcat_id=1',
            'title'     => _OXYGEN_GENERAL,
            'absolute'  => 1);
		$menu[] = array(
            'link'      => XOOPS_URL . '/modules/system/admin.php?fct=preferences&amp;op=show&amp;confcat_id=2',
            'title'     => _OXYGEN_USERSETTINGS,
            'absolute'  => 1);
		$menu[] = array(
            'link'      => XOOPS_URL . '/modules/system/admin.php?fct=preferences&amp;op=show&amp;confcat_id=3',
            'title'     => _OXYGEN_METAFOOTER,
            'absolute'  => 1);
		$menu[] = array(
            'link'      => XOOPS_URL . '/modules/system/admin.php?fct=preferences&amp;op=show&amp;confcat_id=4',
            'title'     => _OXYGEN_CENSOR,
            'absolute'  => 1);
		$menu[] = array(
            'link'      => XOOPS_URL . '/modules/system/admin.php?fct=preferences&amp;op=show&amp;confcat_id=5',
            'title'     => _OXYGEN_SEARCH,
            'absolute'  => 1);
		$menu[] = array(
            'link'      => XOOPS_URL . '/modules/system/admin.php?fct=preferences&amp;op=show&amp;confcat_id=6',
            'title'     => _OXYGEN_MAILER,
            'absolute'  => 1);
		$menu[] = array(
            'link'      => XOOPS_URL . '/modules/system/admin.php?fct=preferences&amp;op=show&amp;confcat_id=7',
            'title'     => _OXYGEN_AUTHENTICATION,
            'absolute'  => 1);
		$menu[] = array(
            'link'      => XOOPS_URL . '/modules/system/admin.php?fct=preferences&amp;op=showmod&amp;mod=1',
            'title'     => _OXYGEN_MODULESETTINGS,
            'absolute'  => 1);
		return $menu;
	}

	function modulespref($modulesinfo , $xoopsUser) {
		$moduleperm_handler = xoops_gethandler('groupperm');
		$menu = array();
		foreach ($modulesinfo as $mod) {
			$rtn = array();
			$sadmin = $moduleperm_handler->checkRight('module_admin', $mod->getVar('mid'), $xoopsUser->getGroups());
			if ($sadmin && ($mod->getVar('hasnotification') || is_array($mod->getInfo('config')) || is_array($mod->getInfo('comments')))) {
				$rtn['link'] = XOOPS_URL . '/modules/system/admin.php?fct=preferences&amp;op=showmod&amp;mod=' . $mod->getVar('mid');
				$rtn['title'] = $mod->name();
				$rtn['absolute'] = 1;
				$rtn['icon'] = XOOPS_ADMINTHEME_URL . '/gui/oxygen/icons/prefs_small.png';
				$menu[] = $rtn;
			}

		}
		return $menu;
	}

	function moduleinfo($modulesinfo , $xoopsUser) {
		$menu = array();
		$moduleperm_handler = xoops_gethandler('groupperm');
		foreach ($modulesinfo as $mod) {
			$rtn = array();
			$submit = array();
			$modOptions = array();                                                         //add for sub menus
			$sadmin = $moduleperm_handler->checkRight('module_admin', $mod->getVar('mid'), $xoopsUser->getGroups());
			if ($sadmin) {
				$info = $mod->getInfo();
				if (!empty($info['adminindex'])) {
					$rtn['link'] = XOOPS_URL . '/modules/'. $mod->getVar('dirname', 'n') . '/' . $info['adminindex'];
				} else {
					$rtn['link'] = XOOPS_URL . '/modules/system/admin.php?fct=preferences&amp;op=showmod&amp;mod=' . $mod->getVar('mid');
				}
				$rtn['title'] = $mod->name();
				$rtn['absolute'] = 1;
				//$rtn['url'] = XOOPS_URL . '/modules/'. $mod->getVar('dirname', 'n') . '/'; //add for sub menus
				//$modOptions = $mod->getAdminMenu();                                        //add for sub menus
				//$rtn['options'] = $modOptions;                                             //add for sub menus

				if (isset($info['icon']) && $info['icon'] != '' ) {
					$rtn['icon'] = XOOPS_URL . '/modules/' . $mod->getVar('dirname', 'n') . '/' . $info['icon'];
				}
				$menu[] = $rtn;
			}

		}
		return $menu;
	}

	function submits($modulesinfo , $xoopsUser) {
		$submits = array();
		$moduleperm_handler = xoops_gethandler('groupperm');
		foreach ($modulesinfo as $mod) {
			$submit = array();
			$sadmin = $moduleperm_handler->checkRight('module_admin', $mod->getVar('mid'), $xoopsUser->getGroups());
			if ($sadmin) {
				$submit['title'] = $mod->getVar('dirname', 'n');
				$submits[] =  $submit;
			}
		}
		return $submits;
	}

	function modmenuinfo($xoopsModule) {
		$modmenuinfo = array();
        
		include dirname(__FILE__) . '/menu.php';
		if (empty($xoopsModule) || 'system' == $xoopsModule->getVar('dirname', 'n')) {
			$modmenuinfo['moddir'] = 'system';
			$modmenuinfo['modpath'] = XOOPS_URL . '/admin.php';
			$modmenuinfo['modname'] = _OXYGEN_SYSOPTIONS;
			$modmenuinfo['modid'] = 1;
			$modmenuinfo['mod_options'] = $adminmenu;
			$modmenuinfo['adminindex'] = 'admin.php';
			foreach (array_keys($modmenuinfo['mod_options']) as $item) {
				$modmenuinfo['mod_options'][$item]['link'] = empty($modmenuinfo['mod_options'][$item]['absolute']) ? XOOPS_URL . '/modules/'.$modmenuinfo['moddir'].'/' . $modmenuinfo['mod_options'][$item]['link'] : $modmenuinfo['mod_options'][$item]['link'];
				$modmenuinfo['mod_options'][$item]['icon'] = empty($modmenuinfo['mod_options'][$item]['icon']) ? '' : XOOPS_ADMINTHEME_URL . '/default/' . $modmenuinfo['mod_options'][$item]['icon'];
				unset($modmenuinfo['mod_options'][$item]['icon_small']);
			}
		} else {
			$info = $xoopsModule->getInfo ();
			$modmenuinfo['moddir'] = $xoopsModule->getVar('dirname', 'n');
			$modmenuinfo['modpath'] = XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname', 'n');
			$modmenuinfo['modname'] = $xoopsModule->getVar('name');
			$modmenuinfo['modid'] = $xoopsModule->getVar('mid');
			$modmenuinfo['mod_options'] = $xoopsModule->getAdminMenu();
			$modmenuinfo['adminindex'] = $info ['adminindex'];
			foreach (array_keys($modmenuinfo['mod_options']) as $item) {
				$modmenuinfo['mod_options'][$item]['link'] = empty($modmenuinfo['mod_options'][$item]['absolute']) ? XOOPS_URL . "/modules/".$modmenuinfo['moddir']."/" . $modmenuinfo['mod_options'][$item]['link'] : $modmenuinfo['mod_options'][$item]['link'];
				$modmenuinfo['mod_options'][$item]['icon'] = empty($modmenuinfo['mod_options'][$item]['icon']) ? '' : XOOPS_URL . "/modules/".$modmenuinfo['moddir']."/" . $modmenuinfo['mod_options'][$item]['icon'];
			}
		}
		return $modmenuinfo;
	}

	function listmodules($modulesinfo , $xoopsUser) {
		$moduleperm_handler = xoops_gethandler('groupperm');
		$rtns = array();
		foreach ( $modulesinfo as $mod ) {
			$sadmin = $moduleperm_handler->checkRight ( 'module_admin', $mod->getVar ( 'mid' ), $xoopsUser->getGroups () );
			if ($sadmin) {

				$rtn = array ();
				$info = $mod->getInfo ();
				if (! empty ( $info ['adminindex'] )) {
					$rtn ['link'] = XOOPS_URL . '/modules/' . $mod->getVar ( 'dirname', 'n' ) . '/' . $info ['adminindex'];
				} else {
					$rtn ['link'] = XOOPS_URL . '/modules/system/admin.php?fct=preferences&amp;op=showmod&amp;mod=' . $mod->getVar ( 'mid' );
				}
				$rtn ['title'] = $mod->getVar ('name');
				$rtn ['description'] = $mod->getInfo('description');
				$rtn ['absolute'] = 1;
				$rtn ['icon'] = XOOPS_URL . '/modules/' . $mod->getVar ( 'dirname', 'n' ) . '/' . $info ['image'];
				$rtns[] =  $rtn;

			}
		}
		return $rtns;
	}

}

?>