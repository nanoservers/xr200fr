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
 * @subpackage      Xoops Notification Language
 * @since           2.0.0
 * @author          Kazumi Ono <onokazu@xoops.org>
 * @version         $Id$
 */
defined('XOOPS_ROOT_PATH') or die('Restricted access');

// _LANGCODE: fa
// _CHARSET : UTF-8
// Translator: XOOPS Translation Team
// RMV-NOTIFY
// Text for various templates...
define ('_NOT_NOTIFICATIONOPTIONS', 'خيارات التبليغ');
define ('_NOT_UPDATENOW', 'تحديث الآن');
define ('_NOT_UPDATEOPTIONS', 'تحديث خيارات التبليغ');
define ('_NOT_CLEAR', 'مسح');
define ('_NOT_CHECKALL', 'تحديد الكل');
define ('_NOT_MODULE', 'الموديل');
define ('_NOT_CATEGORY', 'القسم');
define ('_NOT_ITEMID', 'الرقم');
define ('_NOT_ITEMNAME', 'الإسم');
define ('_NOT_EVENT', 'التبليغ');
define ('_NOT_EVENTS', 'التبليغات');
define ('_NOT_ACTIVENOTIFICATIONS', 'تفعيل التبليغ');
define ('_NOT_NAMENOTAVAILABLE', 'الإسم غير متاح');
// RMV-NEW : TODO: remove NAMENOTAVAILBLE above
define ('_NOT_ITEMNAMENOTAVAILABLE', 'الإسم المدخل غير متاح');
define ('_NOT_ITEMTYPENOTAVAILABLE', 'نسق المدخل غير متاح');
define ('_NOT_ITEMURLNOTAVAILABLE', 'رابط المدخل غير متاح');
define ('_NOT_DELETINGNOTIFICATIONS', 'مسح التبليغات');
define ('_NOT_DELETESUCCESS', 'تم  تنفيذ العملية بنجاح');
define ('_NOT_UPDATEOK', 'خيارات التبليغات تم تحديثها');
define ('_NOT_NOTIFICATIONMETHODIS', 'طريقة التبليغات الآن  ');
define ('_NOT_EMAIL', 'البريد');
define ('_NOT_PM', 'رسائل خاصة');
define ('_NOT_DISABLE', 'تعطيل');
define ('_NOT_CHANGE', 'تغيير');
define ('_NOT_NOACCESS', 'ليس لديك الصلاحية لدخول هذه الصفحة');
// Text for module config options
define ('_NOT_ENABLE', 'تفعيل');
define ('_NOT_NOTIFICATION', 'التبليغات');
define ('_NOT_CONFIG_ENABLED', 'تفعيل التبليغات');
define ('_NOT_CONFIG_ENABLEDDSC', 'هذا البرنامج يقبل من الأعضاء خاصية التبليغ في حالة وجود أي جديد اختر نعم لتفعيل هذه الخاصية');
define ('_NOT_CONFIG_EVENTS', 'حدد التبليغات المفعله');
define ('_NOT_CONFIG_EVENTSDSC', 'حدد التبليغات المتاحة التي يستطيع أعضاؤك الاشتراك فيها');
define ('_NOT_CONFIG_ENABLE', 'تفعيل التبليغات');
define ('_NOT_CONFIG_ENABLEDSC', 'هذه الخدمة تعني امكانية اعلامك بكل جديد عن الموضوع أو القسم الذي ستختاره في حالة اضافة اي جديد');
define ('_NOT_CONFIG_DISABLE', 'تعطيل التبليغات');
define ('_NOT_CONFIG_ENABLEBLOCK', 'تفعيل البلوك فقط');
define ('_NOT_CONFIG_ENABLEINLINE', 'تفعيل في الموضوع فقط');
define ('_NOT_CONFIG_ENABLEBOTH', 'تفعيل النوعين السابقين');
// For notification about comment events
define ('_NOT_COMMENT_NOTIFY', 'تمت اضافة تعليق');
define ('_NOT_COMMENT_NOTIFYCAP', 'أبلغني في حالة كتابة تعليق أو رد على هذا الموضوع');
define ('_NOT_COMMENT_NOTIFYDSC', 'استقبال تبليغ اذا تم الرد على هذا الموضوع أو تم اعطاء تصريح قبول لهذا الموضوع');
define ('_NOT_COMMENT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} تبليغ أوتوماتيكي : تمت اضافة تعليك على  {X_ITEM_TYPE}');
define ('_NOT_COMMENTSUBMIT_NOTIFY', 'تمت اضافة التعليق');
define ('_NOT_COMMENTSUBMIT_NOTIFYCAP', 'أبلغني في حالة كتابة تعليق أو رد لهذا الموضوع');
define ('_NOT_COMMENTSUBMIT_NOTIFYDSC', 'استقبال تبليغ اذا تم الرد على هذا الموضوع أو تم اعطاء تصريح قبول لهذا الموضوع');
define ('_NOT_COMMENTSUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} تبليغ أوتوماتيكي : تمت اضافة تعليك على  {X_ITEM_TYPE}');
// For notification bookmark feature
// (Not really notification, but easy to do with this module)
define ('_NOT_BOOKMARK_NOTIFY', 'المفضلة');
define ('_NOT_BOOKMARK_NOTIFYCAP', 'أضف هذا الموضوع للمفضلة');
define ('_NOT_BOOKMARK_NOTIFYDSC', 'سأتابع هذا الموضوع دون تلقي أي تبليغ');
// For user profile
// FIXME: These should be reworded a little...
define ('_NOT_NOTIFYMETHOD', 'طريقة التبليغ التي تفضلها ؟');
define ('_NOT_METHOD_EMAIL', 'عبر البريد');
define ('_NOT_METHOD_PM', 'عبر الرسائل الخاصة');
define ('_NOT_METHOD_DISABLE', 'تعطيل هذه الميزة');
define ('_NOT_NOTIFYMODE', 'خاصية التبليغ الطبيعية');
define ('_NOT_MODE_SENDALWAYS', 'تبليغي عن كل التحديثات');
define ('_NOT_MODE_SENDONCE', 'تبليغي مرة  واحدة');
define ('_NOT_MODE_SENDONCEPERLOGIN', 'تبليغي مره واحدة  لحين تسجيل دخولي');
define ('_NOT_NOTHINGTODELETE', 'لا يوجد ما يستحق الحذف.');

?>