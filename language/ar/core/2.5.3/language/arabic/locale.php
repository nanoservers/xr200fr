<?php
defined('XOOPS_ROOT_PATH') or die('Restricted access');

setlocale(LC_ALL, 'en_US');

// !!IMPORTANT!! insert '\' before any char among reserved chars: 'a', 'A', 'B', 'c', 'd', 'D', 'F', 'g', 'G', 'h', 'H', 'i', 'I', 'j', 'l', 'L', 'm', 'M', 'n', 'O', 'r', 's', 'S', 't', 'T', 'U', 'w', 'W', 'Y', 'y', 'z', 'Z'    
// insert double '\' before 't', 'r', 'n'
define('_TODAY', 'اليوم G:i');
define('_YESTERDAY', 'بالأمس G:i');
define('_MONTHDAY', 'n/j G:i');
define('_YEARMONTHDAY', 'Y/n/j G:i');
define('_ELAPSE', '%s مضت');
define('_TIMEFORMAT_DESC', 'التنسيقات الصحيحة: \'s\' - ' . _SHORTDATESTRING . '; \'m\' - ' . _MEDIUMDATESTRING . '; \'l\' - ' . _DATESTRING . ';<br />'.
                            '\'c\' أو \'custom\' - تنسيق يحدد حسب الفترة الفاصلة للوقت الحالي; \'e\' - الوقت الفائت; \'mysql\' - Y-m-d H:i:s;<br />'.
                            'تنسيقات خاصة - راجع صفحة  <a href=\'http://php.net/manual/en/function.date.php\' rel=\'external\'>PHP manual</a>.'
                            );

/**
 * A Xoops Local
 *
 * @package     kernel
 * @subpackage  Language
 *
 * @author      Taiwen Jiang <phppp@users.sourceforge.net>
 * @copyright   copyright (c) 2000-2009 XOOPS.org
 */
class XoopsLocal extends XoopsLocalAbstract
{
    /**
     * Number Formats
     *
     * @param unknown_type $number
     * @return unknown
     */
    function number_format($number)
    {
        return number_format($number, 2, '.', ',');
    }
    
    /**
     * Money Format 
     *
     * @param string $format
     * @param string $number
     * @return money format
     */
    function money_format($format, $number)
    {
        setlocale(LC_MONETARY, 'en_US');
        return money_format($format, $number);
    }
}
?>