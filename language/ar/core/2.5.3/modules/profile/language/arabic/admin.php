<?php
// $Id$
// _LANGCODE: fa
// _CHARSET : UTF-8
// Translator: XOOPS Translation Team

define("_PROFILE_AM_FIELD", "خانة");
define("_PROFILE_AM_FIELDS", "خانات");
define("_PROFILE_AM_CATEGORY", "القسم");
define("_PROFILE_AM_STEP", "مرحلة");

define("_PROFILE_AM_SAVEDSUCCESS", "%s جديدة تم حفظها");
define("_PROFILE_AM_DELETEDSUCCESS", "%s حذفت بنجاح");
define("_PROFILE_AM_RUSUREDEL", "هل انت متأكد من انك تريد حذف %s");
define("_PROFILE_AM_FIELDNOTCONFIGURABLE", "الخانة غير قابلة للتعديل.");

define("_PROFILE_AM_ADD", "اضافة %s");
define("_PROFILE_AM_EDIT", "تعديل %s");
define("_PROFILE_AM_TYPE", "نوع الخانة");
define("_PROFILE_AM_VALUETYPE", "نوع القيمة");
define("_PROFILE_AM_NAME", "الاسم");
define("_PROFILE_AM_TITLE", "العنوان");
define("_PROFILE_AM_DESCRIPTION", "الوصف");
define("_PROFILE_AM_REQUIRED", "اجباري?");
define("_PROFILE_AM_MAXLENGTH", "الطول الاقصى");
define("_PROFILE_AM_WEIGHT", "الحجم");
define("_PROFILE_AM_DEFAULT", "الافتراضي");
define("_PROFILE_AM_NOTNULL", "غير فارغ؟");

define("_PROFILE_AM_ARRAY", "مصفوفة");
define("_PROFILE_AM_EMAIL", "بريد الكتروني");
define("_PROFILE_AM_INT", "أرقام");
define("_PROFILE_AM_TXTAREA", "صندوق نص");
define("_PROFILE_AM_TXTBOX", "خانة نص");
define("_PROFILE_AM_URL", "رابط");
define("_PROFILE_AM_OTHER", "غير ذلك");
define("_PROFILE_AM_FLOAT", "Floating Point");
define("_PROFILE_AM_DECIMAL", "Decimal Number");
define("_PROFILE_AM_UNICODE_ARRAY", "Unicode Array");
define("_PROFILE_AM_UNICODE_EMAIL", "Unicode Email");
define("_PROFILE_AM_UNICODE_TXTAREA", "Unicode Text Area");
define("_PROFILE_AM_UNICODE_TXTBOX", "Unicode Text field");
define("_PROFILE_AM_UNICODE_URL", "Unicode URL");

define("_PROFILE_AM_PROF_VISIBLE_ON", "الخانة مرئية في الملف الشخصي لهذه المجموعة");
define("_PROFILE_AM_PROF_VISIBLE_FOR", "الخانة مرئية في الملف الشخصي لأجل هذه المجموعات");
define("_PROFILE_AM_PROF_VISIBLE", "المشاهدة");
define("_PROFILE_AM_PROF_EDITABLE", "الحقل قابل للتعديل من الملف الشخصي");
define("_PROFILE_AM_PROF_REGISTER", "ظاهر في نموذج التسجيل");
define("_PROFILE_AM_PROF_SEARCH", "يمكن البحث عنه من قبل هذه المجموعات");
define("_PROFILE_AM_PROF_ACCESS", "يمكن الوصول اليه من قبل هذه المجموعات");
define("_PROFILE_AM_PROF_ACCESS_DESC", 
        "<ul>" .
        "<li>مجموعات المدراء: اذا كان المشترك ينتمي الى مجموعة المشرفين, يمكن للمستخدم الحالي مشاهدة بياناته ان كان ينتمي الى مجموعة يحق لها مشاهدة بيانات الاداريين</li>" .
        "<li>المجموعة غير الأساسية: اذا كان المشترك ينتمي الى مجموعة غير اساسية اي ليست ادارية او مشتركين او زوار , يحق له مشاهدة بيانات المجموعات الاخرى في حال كانت المجموعة التي ينتمي اليها لديها الصلاحيات في ذلك</li>" .
        "<li>مجموعة المشتركين: اذا كان المشترك ينتمي الى مجموعة المشتركين, يحق للمشترك الحالي مشاهدة بياناته ان كان ينتمي الى مجموعة لديها الصلاحيات بمشاهدة بيانات المشتركين</li>" .
        "</ul>");

define("_PROFILE_AM_FIELDVISIBLE", "الخانة ");
define("_PROFILE_AM_FIELDVISIBLEFOR", " مرئية لمجموعة ");
define("_PROFILE_AM_FIELDVISIBLEON", " عند مشاهدة بيانات ");
define("_PROFILE_AM_FIELDVISIBLETOALL", "- الكل");
define("_PROFILE_AM_FIELDNOTVISIBLE", "غير مرئية");

define("_PROFILE_AM_CHECKBOX", "Checkbox");
define("_PROFILE_AM_GROUP", "Group Select");
define("_PROFILE_AM_GROUPMULTI", "Group Multi Select");
define("_PROFILE_AM_LANGUAGE", "Language Select");
define("_PROFILE_AM_RADIO", "Radio Buttons");
define("_PROFILE_AM_SELECT", "Select");
define("_PROFILE_AM_SELECTMULTI", "Multi Select");
define("_PROFILE_AM_TEXTAREA", "Text Area");
define("_PROFILE_AM_DHTMLTEXTAREA", "DHTML Text Area");
define("_PROFILE_AM_TEXTBOX", "Text Field");
define("_PROFILE_AM_TIMEZONE", "Timezone");
define("_PROFILE_AM_YESNO", "Radio Yes/No");
define("_PROFILE_AM_DATE", "Date");
define("_PROFILE_AM_AUTOTEXT", "Auto Text");
define("_PROFILE_AM_DATETIME", "Date and Time");
define("_PROFILE_AM_LONGDATE", "Long Date");

define("_PROFILE_AM_ADDOPTION", "إضافة إختيارات");
define("_PROFILE_AM_REMOVEOPTIONS", "حذف الإختيارات");
define("_PROFILE_AM_KEY", "القيمة التي ستحفظ");
define("_PROFILE_AM_VALUE", "النص الذي سيعرض");

// User management
define("_PROFILE_AM_EDITUSER", "تعديل الاشتراك");
define("_PROFILE_AM_SELECTUSER", "إختر العضو");
define("_PROFILE_AM_ADDUSER","إضافة عضو جديد");
define("_PROFILE_AM_THEME","الثيم");
define("_PROFILE_AM_RANK","الرتبة");
define("_PROFILE_AM_USERDONEXIT","العضو غير موجود!");
define("_PROFILE_MA_USERLEVEL", "حالة العضو");

define("_PROFILE_MA_ACTIVE", "نشط");
define("_PROFILE_MA_INACTIVE", "غير نشط");
define("_PROFILE_AM_USERCREATED", "تم انشاء الحساب");

define("_PROFILE_AM_CANNOTDELETESELF", "حذف اشتراكك الشخصي غير مسموح به - اذهب الى صفحة بياناتك واحذف اشتراكك من هناك");
define("_PROFILE_AM_CANNOTDELETEADMIN", "حذف اشتراك المدير غير ممكن");

define("_PROFILE_AM_NOSELECTION", "لم يتم اختيار اي عضو");
define("_PROFILE_AM_USER_ACTIVATED", "تم تفعيل الإشتراك");
define("_PROFILE_AM_USER_DEACTIVATED", "تم تعطيل الإشتراك");
define("_PROFILE_AM_USER_NOT_ACTIVATED", "خطأ: العضوية غير منشطة");
define("_PROFILE_AM_USER_NOT_DEACTIVATED", "خطأ: العضوية غير معطلة");

define("_PROFILE_AM_STEPNAME", "اسم المرحلة");
define("_PROFILE_AM_STEPORDER", "ترتيب المرحلة");
define("_PROFILE_AM_STEPSAVE", "الحفظ بعد المرحلة");
define("_PROFILE_AM_STEPINTRO", "وصف المرحلة");

?>