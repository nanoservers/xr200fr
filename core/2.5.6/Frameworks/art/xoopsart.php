<?php
/**
 * Xoops Frameworks addon: art
 *
 * @copyright       The XOOPS project http://sourceforge.net/projects/xoops/
 * @license         GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 * @author          Taiwen Jiang <phppp@users.sourceforge.net>
 * @since           1.00
 * @version         $Id: xoopsart.php 8066 2011-11-06 05:09:33Z beckmi $
 * @package         Frameworks
 */
 
class XoopsArt 
{
    function __construct()
    {
    }
    
    function XoopsArt()
    {
        $this->__construct();
    }
    
    /**
     * Load a collective functions of Frameworks
     *
     * @param    string    $group        name of  the collective functions, empty for functions.php
     * @return    bool
     */
    function loadFunctions($group = "")
    {
        return include_once FRAMEWORKS_ROOT_PATH . "/art/functions.{$group}" . (empty($group) ? "" : "." ) . "php";
    }
}
?>