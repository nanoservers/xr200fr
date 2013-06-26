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
 * Installer final page
 *
 * See the enclosed file license.txt for licensing information.
 * If you did not receive this file, get it at http://www.fsf.org/copyleft/gpl.html
 *
 * @copyright   The XOOPS project http://www.xoops.org/
 * @license     http://www.fsf.org/copyleft/gpl.html GNU General Public License (GPL)
 * @package     installer
 * @since       2.3.0
 * @author      Haruki Setoyama  <haruki@planewave.org>
 * @author      Kazumi Ono <webmaster@myweb.ne.jp>
 * @author      Skalpa Keo <skalpa@xoops.org>
 * @author      Taiwen Jiang <phppp@users.sourceforge.net>
 * @author      DuGris (aka L. JEN) <dugris@frxoops.org>
 * @version     $Id: page_end.php 10997 2013-02-06 08:37:08Z beckmi $
**/

require_once './include/common.inc.php';
$_SESSION = array();
setcookie( 'xo_install_user', '', null, null, null );
defined('XOOPS_INSTALL') or die('XOOPS Installation wizard die');

$installer_modified = "install_remove_" . uniqid(mt_rand());
register_shutdown_function('install_finalize', $installer_modified);

/**
  * Placing folder renamed in $_SESSION
  * and echoing to document for use in install_tpl.php
 **/
 
$_SESSION['newinstallPRO'] = XOOPS_URL.'/'.$installer_modified.'/js/prototype-1.6.0.3.js';
$_SESSION['newinstallINST'] = XOOPS_URL.'/'.$installer_modified.'/js/xo-installer.js';
if (file_exists('language/' . $wizard->language . '/style.css')) {
    $_SESSION['newinstallCSS'] = XOOPS_URL.'/'.'language/' . $wizard->language . '/style.css';
    $_SESSION['newinstallCSSDeflt'] = XOOPS_URL.'/'.$installer_modified.'/css/style.css';
} else {
    $_SESSION['newinstallCSSDeflt'] = XOOPS_URL.'/'.$installer_modified.'/css/style.css';
    $_SESSION['newinstallCSS'] = '';
}

$js  = '<script type="text/javascript">';
$js .= 'var newPro = '.json_encode($_SESSION["newinstallPRO"]).';';
$js .= 'var newINST = '.json_encode($_SESSION["newinstallINST"]).';';
$js .= 'var newCSS = '.json_encode($_SESSION["newinstallCSS"]).';';
$js .= 'var newCSS = '.json_encode($_SESSION["newinstallCSSDeflt"]).';';
$js .= '</script>';
echo $js;

$pageHasForm = false;

$content = "";
include "./language/{$wizard->language}/finish.php";

include './include/install_tpl.php';
?>       