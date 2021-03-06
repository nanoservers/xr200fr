<?php
/**
 * ExtGallery functions
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright   The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license     GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 * @author      Zoullou (http://www.zoullou.net)
 * @package     ExtGallery
 * @version     $Id$
 */

if (!defined("XOOPS_ROOT_PATH")) {
	die("XOOPS root path not defined");
}

function extgalleryComUpdate($photoId, $nbCom) {
	$photoHandler = xoops_getmodulehandler('publicphoto', 'extgallery');
	$photoHandler->modifyPhoto($photoId,array('photo_comment'=>$nbCom));
}

?>