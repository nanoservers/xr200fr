<?php
/**
 * XOOPS form element
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license         GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 * @package         kernel
 * @subpackage      form
 * @since           2.0.0
 * @author          Kazumi Ono (AKA onokazu) http://www.myweb.ne.jp/, http://jp.xoops.org/
 * @version         $Id: formtextdateselect.php 7591 2011-09-13 16:37:10Z forxoops $
 */

if (!defined('XOOPS_ROOT_PATH')) {
	die("XOOPS root path not defined");
}

/**
 * A text field with calendar popup
 */

class XoopsFormTextDateSelect extends XoopsFormText
{

	function XoopsFormTextDateSelect($caption, $name, $size = 15, $value = 0)
	{
		$value = !is_numeric($value) ? time() : intval($value);
		$value = ($value == 0) ? time() : $value;
		$this->XoopsFormText($caption, $name, $size, 25, $value);
	}

	function render()
	{
    	$ele_name = $this->getName();
		$ele_value = $this->getValue(false);
        if (is_string($ele_value)) {
            $display_value = $ele_value;
            $ele_value = time();
        } else {
            $display_value = date("Y-m-d", $ele_value);
        }

		$jstime = formatTimestamp( $ele_value, 'F j Y, H:i:s' );
		include_once XOOPS_ROOT_PATH.'/include/calendarjs.php';
		return "<input type='text' name='".$ele_name."' id='".$ele_name."' size='".$this->getSize()."' maxlength='".$this->getMaxlength()."' value='".$display_value."'".$this->getExtra()." /><input type='reset' value=' ... ' onclick='return showCalendar(\"".$ele_name."\");'>";
	}
}
?>