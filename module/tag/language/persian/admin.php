<?php
/**
 * Tag management for XOOPS
 *
 * @copyright	The XOOPS project http://www.xoops.org/
 * @license		http://www.fsf.org/copyleft/gpl.html GNU public license
 * @author		Taiwen Jiang (phppp or D.J.) <php_pp@hotmail.com>
 * @since		1.00
 * @version		$Id$
 * @package		tag
 */

if (!defined('XOOPS_ROOT_PATH')){ exit(); }
define("TAG_AM_TERM", "برچسب (کلمات کلیدی)");

define("TAG_AM_STATS", "اطلاعات ایستا");
define("TAG_AM_COUNT_TAG", "تعداد برچسب‌ها");
define("TAG_AM_COUNT_ITEM", "تعداد موارد");
define("TAG_AM_COUNT_MODULE", "تعداد ماژول‌ها");
define('TAG_AM_COUNT_MODULE_TITLE', 'تعداد تگ/ تعداد ماژول');

define("TAG_AM_EDIT", "مدیریت برچسب");
define("TAG_AM_SYNCHRONIZATION", "همزمانی");

define("TAG_AM_ACTIVE", "فعال");
define("TAG_AM_INACTIVE", "غیرفعال");
define("TAG_AM_GLOBAL", "عمومی");
define("TAG_AM_ALL", "همه ماژول‌ها");
define("TAG_AM_NUM", "تعداد برای هر زمان");
define("TAG_AM_IN_PROCESS", "همزمانی داده‌ها در حال انجام است، لطفا چند لحظه صبر کنید ...");
define("TAG_AM_FINISHED", "همزمانی داده‌ها انجام شد.");

//2.3.1

// About.php
define('_AM_TAG_ABOUT_RELEASEDATE',        'Released: ');
define('_AM_TAG_ABOUT_UPDATEDATE',               'Updated: ');
define('_AM_TAG_ABOUT_AUTHOR',                   'Author: ');
define('_AM_TAG_ABOUT_CREDITS',                  'Credits: ');
define('_AM_TAG_ABOUT_LICENSE',                  'License: ');
define('_AM_TAG_ABOUT_MODULE_STATUS',            'Status: ');
define('_AM_TAG_ABOUT_WEBSITE',                  'Website: ');
define('_AM_TAG_ABOUT_AUTHOR_NAME',              'Author name: ');
define('_AM_TAG_ABOUT_CHANGELOG',                'Change Log');
define('_AM_TAG_ABOUT_MODULE_INFO',              'Module Infos');
define('_AM_TAG_ABOUT_AUTHOR_INFO',              'Author Infos');
define('_AM_TAG_ABOUT_DESCRIPTION',          'Description: ');

// text in admin footer
define('_AM_TAG_ADMIN_FOOTER',                 "<div class='right smallsmall italic pad5'><b>" . $xoopsModule->getVar("name") . "</b> is maintained by the <a class='tooltip' rel='external' href='http://xoops.org/' title='Visit XOOPS Community'>XOOPS Community</a></div>");

// Configuration check
define('_AM_TAG_CONFIG_CHECK','Configuration Check');
define('_AM_TAG_CONFIG_PHP',"Minimum PHP required: %s (your version is %s)");
define('_AM_TAG_CONFIG_XOOPS',"Minimum XOOPS required:  %s (your version is %s)"); 

//ModuleAdmin
define('_AM_MODULEADMIN_MISSING','Error: The ModuleAdmin class is missing. Please install the ModuleAdmin Class into /Frameworks (see /docs/readme.txt)');