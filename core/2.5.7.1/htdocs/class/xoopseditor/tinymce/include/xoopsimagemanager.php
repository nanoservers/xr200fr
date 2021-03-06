<?php
/**
 *  TinyMCE adapter for XOOPS
 *
 * @copyright       The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license         http://www.fsf.org/copyleft/gpl.html GNU public license
 * @package         class
 * @subpackage      editor
 * @since           2.3.0
 * @author          Laurent JEN <dugris@frxoops.org>
 * @version         $Id: xoopsimagemanager.php 12034 2013-09-14 04:38:02Z beckmi $
 */

if (!defined("XOOPS_ROOT_PATH")) { die("XOOPS root path not defined"); }

// check categories readability by group
$groups = is_object( $GLOBALS["xoopsUser"] ) ? $GLOBALS["xoopsUser"]->getGroups() : array( XOOPS_GROUP_ANONYMOUS );
$imgcat_handler =& xoops_gethandler('imagecategory');
if ( count($imgcat_handler->getList($groups, 'imgcat_read', 1)) == 0 ) {
    return false;
}
return true;
