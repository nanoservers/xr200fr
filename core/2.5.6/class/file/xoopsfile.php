<?php
/**
 * File factory For XOOPS
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright   The XOOPS project http://www.xoops.org/
 * @license     GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 * @package     class
 * @subpackage  file
 * @since       2.3.0
 * @author      Taiwen Jiang <phppp@users.sourceforge.net>
 * @version     $Id: xoopsfile.php 10264 2012-11-21 04:52:11Z beckmi $
 */
defined('XOOPS_ROOT_PATH') or die('Restricted access');

/**
 * XoopsFile
 *
 * @package
 * @author Taiwen Jiang <phppp@users.sourceforge.net>
 * @access public
 */
class XoopsFile
{
    /**
     * XoopsFile::__construct()
     */
    function __construct()
    {
    }

    /**
     * XoopsFile::XoopsFile()
     */
    function XoopsFile()
    {
        $this->__construct();
    }

    /**
     * XoopsFile::getInstance()
     *
     * @return
     */
    function getInstance()
    {
        static $instance;
        if (!isset($instance)) {
            $class = __CLASS__;
            $instance = new $class();
        }
        return $instance;
    }

    /**
     * XoopsFile::load()
     *
     * @param string $name
     * @return
     */
    static function load($name = 'file')
    {
        switch ($name) {
            case 'folder':
                if (!class_exists('XoopsFolderHandler')) {
                    if (file_exists($folder = dirname(__FILE__) . '/folder.php')) {
                        include $folder;
                    } else {
                        trigger_error('Require Item : ' . str_replace(XOOPS_ROOT_PATH, '', $folder) . ' In File ' . __FILE__ . ' at Line ' . __LINE__, E_USER_WARNING);
                        return false;
                    }
                }
                break;
            case 'file':
            default:
                if (!class_exists('XoopsFileHandler')) {
                    if (file_exists($file = dirname(__FILE__) . '/file.php')) {
                        include $file;
                    } else {
                        trigger_error('Require File : ' . str_replace(XOOPS_ROOT_PATH, '', $file) . ' In File ' . __FILE__ . ' at Line ' . __LINE__, E_USER_WARNING);
                        return false;
                    }
                }
                break;
        }

        return true;
    }

    /**
     * XoopsFile::getHandler()
     *
     * @param string $name
     * @param mixed $path
     * @param mixed $create
     * @param mixed $mode
     * @return
     */
    static function getHandler($name = 'file', $path = false, $create = false, $mode = null)
    {
        $handler = null;
        XoopsFile::load($name);
        $class = 'Xoops' . ucfirst($name) . 'Handler';
        if (class_exists($class)) {
            $handler = new $class($path, $create, $mode);
        } else {
            trigger_error('Class ' . $class . ' not exist in File ' . __FILE__ . ' at Line ' . __LINE__, E_USER_WARNING);
        }
        return $handler;
    }
}

?>