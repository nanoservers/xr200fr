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
 *  Xoops Language
 *
 * @copyright       The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license         http://www.fsf.org/copyleft/gpl.html GNU public license
 * @package         kernel
 * @subpackage      Xoops Auth Language
 * @since           2.0.0
 * @author          Kazumi Ono <onokazu@xoops.org>
 * @version         $Id$
 */
defined('XOOPS_ROOT_PATH') or die('Restricted access');

// _LANGCODE: fa
// _CHARSET : UTF-8
// Translator: XOOPS Translation Team

define('_AUTH_MSG_AUTH_METHOD','أستخدام %s طريقة التوثيق');
define('_AUTH_LDAP_EXTENSION_NOT_LOAD','PHP LDAP الوصلة غير صالحة (تحقق من ملف الإعدادات php.ini)');
define('_AUTH_LDAP_SERVER_NOT_FOUND','لم يستطيع الاتصال بالخادم');
define('_AUTH_LDAP_USER_NOT_FOUND','العضو %s غير موجود في دليل الخادم (%s) في %s');
define('_AUTH_LDAP_CANT_READ_ENTRY','لم يسجل الدخول %s');
define('_AUTH_LDAP_XOOPS_USER_NOTFOUND','آسف  لم يتمّ  إيجاد معلومات الدخول في قاعدة البيانات: %s <br>' .
		'الرجاء التحقق من بيانات حسابك أو أضبط التحقق على الوضع التلقائي');
define('_AUTH_LDAP_START_TLS_FAILED','فشل في فتح إتصال TLS');		
	
?>