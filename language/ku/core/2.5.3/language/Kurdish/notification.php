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

define ('_NOT_NOTIFICATIONOPTIONS', 'ڕێکخستنەکانی زانیاری');
define ('_NOT_UPDATENOW', 'بەڕۆژی بکە');
define ('_NOT_UPDATEOPTIONS', 'ڕێکخستنەکانی بەڕۆژ کردنی زانیاری');
define ('_NOT_CLEAR', 'پڕۆسەی پاککردنەوە');
define ('_NOT_CHECKALL', 'هەڵبژارتنی هەموان');
define ('_NOT_MODULE', 'ماژۆڵ');
define ('_NOT_CATEGORY', 'دەستە');
define ('_NOT_ITEMID', 'نیشانە');
define ('_NOT_ITEMNAME', 'ناو');
define ('_NOT_EVENT', 'ڕووداو');
define ('_NOT_EVENTS', 'رووداوەکان');
define ('_NOT_ACTIVENOTIFICATIONS', 'زانیارییەکانی بەکار');
define ('_NOT_NAMENOTAVAILABLE', 'ئەم ناوە لە بەردەست نییە');

// RMV-NEW : TODO: remove NAMENOTAVAILBLE above
define ('_NOT_ITEMNAMENOTAVAILABLE', 'ناوی ئەم تڵە لە بەردەست نییە');
define ('_NOT_ITEMTYPENOTAVAILABLE', 'جۆری ئەم تڵە لە بەردەست نییە');
define ('_NOT_ITEMURLNOTAVAILABLE', 'ناونیسانی ئەم تڵە لە بەردەست نییە');
define ('_NOT_DELETINGNOTIFICATIONS', 'پاککردنەوەی زانیارییەکان');
define ('_NOT_DELETESUCCESS', 'پاککردنەوەی زانیارییەکان سەرکەوتوو بوو');
define ('_NOT_UPDATEOK', 'ڕێکخستنەکانی زانیاری بە ڕۆژ کرا');
define ('_NOT_NOTIFICATIONMETHODIS', 'شێوەی زانیاری');
define ('_NOT_EMAIL', 'ئیمێڵ');
define ('_NOT_PM', 'پەیامی کەسی');
define ('_NOT_DISABLE', 'بەستراوە');
define ('_NOT_CHANGE', 'گۆڕان');
define ('_NOT_NOACCESS', 'دەستپیگەیشتنی ئێوە بەم بەشە داخراوە');

// Text for module config options
define ('_NOT_ENABLE', 'کردنەوە');
define ('_NOT_NOTIFICATION', 'زانیاری دان');
define ('_NOT_CONFIG_ENABLED', 'بەکار کردنی زانیاری دان');
define ('_NOT_CONFIG_ENABLEDDSC', 'ئەم ماژۆڵە توانایی ئەمە دەدا بە کاربەران کە لە ڕووداوەکانی ماڵپەڕ ئاگادار بنەوە');
define ('_NOT_CONFIG_EVENTS', 'بەکار کردنی رووداوەکانی تایبەت');
define ('_NOT_CONFIG_EVENTSDSC', 'هەڵبژێرە کە ئاگاداری لە کام رووداوەکان بۆ کام کاربەری ئێوە بەکار بکرێت');
define ('_NOT_CONFIG_ENABLE', 'بەکارکردنی زانیاری دان');
define ('_NOT_CONFIG_ENABLEDSC', 'ئەم ماژۆڵە توانایی ئاگادار بوون لە ڕوداوەکانی ماڵپەڕ دەدا بە کاربەران،بەڵێ هەڵبژێرە بۆ بەکار کردنی ئەم تواناییە');
define ('_NOT_CONFIG_DISABLE', 'لەکار خستنی زانیاری دان');
define ('_NOT_CONFIG_ENABLEBLOCK', 'تەنیا جۆری بلۆکی بەکار بکریت');
define ('_NOT_CONFIG_ENABLEINLINE', 'تەنیا جۆری هێلی بەکار بکرێت');
define ('_NOT_CONFIG_ENABLEBOTH', 'هەردوو جۆری بلۆکی و هێڵی بەکار بکرێن');

// For notification about comment events
define ('_NOT_COMMENT_NOTIFY', 'زێدەکردنی ڕا');
define ('_NOT_COMMENT_NOTIFYCAP', 'هەرکات ڕایەکی تازە درا لە سەر ئەم بابەتە ئاگادارم کە');
define ('_NOT_COMMENT_NOTIFYDSC', 'هەرکات ڕایەکی تازە درا لەسەر ئەم بابەتە بۆ منی بنێرە');
define ('_NOT_COMMENT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE}  آگهی‌رسانی خودکار: نظر اضافه شده به{X_ITEM_TYPE}');
define ('_NOT_COMMENTSUBMIT_NOTIFY', 'ڕا سەقامگیرکرا');
define ('_NOT_COMMENTSUBMIT_NOTIFYCAP', 'هەر کات ڕایەکی تازە بۆ ئەم بابەتە سەقامگیر کرا ئاگادارم کە');
define ('_NOT_COMMENTSUBMIT_NOTIFYDSC', 'هەر کات ڕایەکی تازە بۆ ئەم بابەتە سەقامگیر کرا بۆ منی بنێرە');
define ('_NOT_COMMENTSUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} زانیاری خۆکار:ڕای سەقامگیر کراو بۆ  {X_ITEM_TYPE}');

// For notification bookmark feature
// (Not really notification, but easy to do with this module)
define ('_NOT_BOOKMARK_NOTIFY', 'نیشانە');
define ('_NOT_BOOKMARK_NOTIFYCAP', 'ئەم تڵانە نیشان بکە بەڵام زانیاری مەدە');
define ('_NOT_BOOKMARK_NOTIFYDSC', 'شوێنگێڕی ئەم تڵە بێ وەرگرتنی زانیاری ڕووداو');

// For user profile
// FIXME: These should be reworded a little...
define ('_NOT_NOTIFYMETHOD', 'شێوەی زانیاری:ئەوکاتەی ئەنجومەنێک شوێنگێڕ دەکەی.بە چ شێوەیەک  دەتهەوێ لە ڕووداوەکانی ئاگادار بی؟');
define ('_NOT_METHOD_EMAIL', 'ئیمێل لە ناونیشانی نووسراو');
define ('_NOT_METHOD_PM', 'پەیامی کەسی');
define ('_NOT_METHOD_DISABLE', 'لە کار خستراو');
define ('_NOT_NOTIFYMODE', 'جۆرێک زانیاری لە ڕووداو');
define ('_NOT_MODE_SENDALWAYS', 'زانیاری لە تەواوی ڕووداوەکانی هەڵبژارتراو');
define ('_NOT_MODE_SENDONCE', 'جارێک زانیاری بدە');
define ('_NOT_MODE_SENDONCEPERLOGIN', 'جارێک زانیاری بدە و لەکاری بخە تا هاتنە وەی دووبارەی من');
define ('_NOT_NOTHINGTODELETE', 'هیچ شتێک بۆ ڕەشکردنەوە نییە.');

?>