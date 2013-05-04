<?php
/**
 * Installer main english strings declaration file
 *
 * @copyright   The XOOPS project http://www.xoops.org/
 * @license     http://www.fsf.org/copyleft/gpl.html GNU General Public License (GPL)
 * @package     installer
 * @since       2.3.0
 * @author      Haruki Setoyama  <haruki@planewave.org>
 * @author      Kazumi Ono <webmaster@myweb.ne.jp>
 * @author      Skalpa Keo <skalpa@xoops.org>
 * @author      Taiwen Jiang <phppp@users.sourceforge.net>
 * @author      dugris <dugris@frxoops.org>
 * @version     $Id$
 */

// _LANGCODE: fa// _CHARSET : UTF-8// Translator: XOOPS Translation Team

define( "SHOW_HIDE_HELP", "اظهار ظ اخفاء نص المساعدة" );

// License
define('LICENSE_NOT_WRITEABLE', 'ملف الترخيص %s . <br/><font style="colour:#ff0000">اجعل الملف ../include/license.php قابل للكتابة عليه</font>');
define('LICENSE_IS_WRITEABLE', 'ملف الترخيص %s');

// Configuration check page
define( "SERVER_API", "Server API" );
define( "PHP_EXTENSION", "%s extension" );
define( "CHAR_ENCODING", "الترميز" );
define( "XML_PARSING", "إستدعاء XML" );
define( "REQUIREMENTS", "المتطلبات" );
define( "_PHP_VERSION", "إصدارة PHP" );
define( "RECOMMENDED_SETTINGS", "إعدادات يوصى بها" );
define( "RECOMMENDED_EXTENSIONS", "إضافات يوصى بها" );
define( "SETTING_NAME", "عنوان الإعداد" );
define( "RECOMMENDED", "ينصح به" );
define( "CURRENT", "الحالي" );
define( "RECOMMENDED_EXTENSIONS_MSG", "هذه الإضافات غير ضرورية للإستخدام العادي، و لكنها قد تكون مطلوبة في بعض الحالات مثل تعدد اللغات و تقديم خدمة RSS  فتحتاج لوجودها في الخادم المستضيف" );
define( "NONE", "لا يوجد" );
define( "SUCCESS", "ناجح" );
define( "WARNING", "خطأ" );
define( "FAILED", "فشل" );

// Titles (main and pages)
define( "XOOPS_INSTALL_WIZARD", "تثبيت نظام إدارة المحتوى محتوا" );

define( "LANGUAGE_SELECTION", "إختيار اللغة" );
define( "LANGUAGE_SELECTION_TITLE", "أختر لغتك");        // L128
define( "INTRODUCTION", "مقدمة" );
define( "INTRODUCTION_TITLE", "مرحبا بك في مساعد تثبيت محتوا" );        // L0
define( "CONFIGURATION_CHECK", "فحص التهيئة" );
define( "CONFIGURATION_CHECK_TITLE", "التحقق من تهيئة الخادم المستضيف" );
define( "PATHS_SETTINGS", "إعدادات المسارات" );
define( "PATHS_SETTINGS_TITLE", "إعدادات المسارات" );
define( "DATABASE_CONNECTION", "الإتصال بقاعدة البيانات" );
define( "DATABASE_CONNECTION_TITLE", "الإتصال بقاعدة البيانات" );
define( "DATABASE_CONFIG", "إعدادات قاعدة البيانات" );
define( "DATABASE_CONFIG_TITLE", "إعدادات قاعدة البيانات" );
define( "CONFIG_SAVE", "حفظ إعدادات النظام" );
define( "CONFIG_SAVE_TITLE", "حفظ إعدادات النظام" );
define( "TABLES_CREATION", "إنشاء الجداول" );
define( "TABLES_CREATION_TITLE", "إنشاء جداول قاعدة البيانات" );
define( "INITIAL_SETTINGS", "الإعدادات الأولية" );
define( "INITIAL_SETTINGS_TITLE", "أدخل بياناتك الأولية" );
define( "DATA_INSERTION", "حفظ البيانات" );
define( "DATA_INSERTION_TITLE", "حفظ بياناتك في قاعدة البيانات" );
define( "WELCOME", "مرحبا" );
define( "WELCOME_TITLE", "مرحبا بك في موقعك" );        // L0


// Settings (labels and help text)
define( "XOOPS_PATHS", "مسار مجلدات MOHTAVA" );
define( "XOOPS_URLS", "رابط الموقع" );

define( "XOOPS_ROOT_PATH_LABEL", "مسار المجلد الرئيسي" );
define( "XOOPS_ROOT_PATH_HELP", "مسار المجلد الذي به مجلدات و ملفات MOHTAVA في السيرفر بدون كتابة علامة / في النهاية" );

define( "XOOPS_LIB_PATH_LABEL", "مجلد مكتبات MOHTAVA" );
define( "XOOPS_LIB_PATH_HELP", "مسار مجلد مكتبات MOHTAVA في الخادم المستضيف بدون كتابة علامة / في النهاية. و لضمان أمان أكبر ننصح بوضع هذا المجلد خارج " . XOOPS_ROOT_PATH_LABEL . "");
define( "XOOPS_DATA_PATH_LABEL", "مجلد بيانات MOHTAVA" );
define( "XOOPS_DATA_PATH_HELP", "مسار مجلد بيانات MOHTAVA الذي يحوي ملفات البيانات القابلة للكتابة عليها و يكتب المسار بدون علامة / في النهاية. و لضمان أمان أكبر ننصح بوضع هذا المجلد خارج " . XOOPS_ROOT_PATH_LABEL . "" );

define( "XOOPS_URL_LABEL", "رابط الموقع" ); // L56
define( "XOOPS_URL_HELP", "الرابط الرئيسي للموقع" ); // L58

define( "LEGEND_CONNECTION", "الإتصال بمستضيف قاعدة البيانات" );
define( "LEGEND_DATABASE", "نوع قاعدة البيانات" ); // L51

define( "DB_HOST_LABEL", "اسم الخادم المستضيف" );    // L27
define( "DB_HOST_HELP",  "اسم مستضيف قاعدة البيانات. إذا لم تكن متأكد, فإن <em>localhost</em> تعمل في أغلب الحالات"); // L67
define( "DB_USER_LABEL", "اسم المستخدم" );    // L28
define( "DB_USER_HELP",  "اسم حساب المستخدم الذي يستخدم للإتصال بقاعدة البيانات"); // L65
define( "DB_PASS_LABEL", "كلمة المرور" );    // L52
define( "DB_PASS_HELP",  "كلمة مرور لمستخدم قاعدة البيانات"); // L68
define( "DB_NAME_LABEL", "اسم قاعدة البيانات" );    // L29
define( "DB_NAME_HELP",  "اسم قاعدة البيانات في المستضيف. معالج التثبيت سوف يقوم بإنشاءها في حالة عدم تكوينها"); // L64
define( "DB_CHARSET_LABEL", "ترميز قاعدة البيانات - أختر None ترميز للغة العربية" );
define( "DB_CHARSET_HELP",  "MySQL includes character set support that enables you to store data using a variety of character sets and perform comparisons according to a variety of collations.");
define( "DB_COLLATION_LABEL", "نوع الترميز" );
define( "DB_COLLATION_HELP",  "A collation is a set of rules for comparing characters in a character set.");
define( "DB_PREFIX_LABEL", "بادئة الجداول" );    // L30
define( "DB_PREFIX_HELP",  "This prefix will be added to all new tables created to avoid name conflicts in the database. If you are unsure, just keep the default"); // L63
define( "DB_PCONNECT_LABEL", "إستخدام الإتصال المستمر" );    // L54
define( "DB_PCONNECT_HELP",  "الإفتراضي هو عدم إختيارها. إذا كنت غير متأكد فلا تختارها"); // L69
define( "DB_DATABASE_LABEL", "نوع قاعدة البيانات" );

define( "LEGEND_ADMIN_ACCOUNT", "حساب المدير" );
define( "ADMIN_LOGIN_LABEL", "اسم المستخدم للمدير" ); // L37
define( "ADMIN_EMAIL_LABEL", "البريد الإلكتروني للمدير" ); // L38
define( "ADMIN_PASS_LABEL", "كلمة المرور للمدير" ); // L39
define( "ADMIN_CONFIRMPASS_LABEL", "تأكيد كلمة المرور" ); // L74

// Buttons
define( "BUTTON_PREVIOUS", "السابق" ); // L42
define( "BUTTON_NEXT", "التالي" ); // L47

// Messages
define( "XOOPS_FOUND", "%s موجودة" );
define( "CHECKING_PERMISSIONS", "التحقق من تراخيص الكتابة على المجلدات و الملفات...." ); // L82
define( "IS_NOT_WRITABLE", "%s لا يمكن الكتابة عليه." ); // L83
define( "IS_WRITABLE", "%s يمكن الكتابة عليه." ); // L84

define( "XOOPS_PATH_FOUND", "المجلد موجود." );

define( "READY_CREATE_TABLES", "No MOHTAVA tables were detected.<br />The installer is now ready to create the MOHTAVA system tables.<br />Press <em>next</em> to proceed." );
define( "XOOPS_TABLES_FOUND", "جداول نظام MOHTAVA موجودة في قاعدة البيانات.<br />اضغط <em>التالي</em> للإنتقال للخطوة التالية." ); // L131
define( "XOOPS_TABLES_CREATED", "تم إنشاء جداول نظام MOHTAVA.<br />اضغط <em>التالي</em> للذهاب للخطوة التالية." );
define( "READY_INSERT_DATA", "معالج التثبيت جاهز الآن لإدخال بياناتك الأولية لقاعدة البيانات." );
define( "READY_SAVE_MAINFILE", "The installer is now ready to save the specified settings to <em>mainfile.php</em>.<br />Press <em>next</em> to proceed." );
define( "SAVED_MAINFILE", "حفظ الإعدادات في ملف mainfile.php" );
define( "SAVED_MAINFILE_MSG", "معالج التثبيت حفظ الإعدادات في ملف <em>mainfile.php</em>. إضغط <emالتالي</em> للإنتقال للخطوة التالية." );
define( "DATA_ALREADY_INSERTED", "بيانات MOHTAVA موجودة في قاعدة البيانات.<br />اضغط <em>التالي</em> للإنتقال للخطوة التالية." );
define( "DATA_INSERTED", "البيانات الأولية تم إدخالها إلى قاعدة البيانات.<br /اضغط <emالتالي</em> للإنتقال للخطوة التالية." );


// %s is database name
define( "DATABASE_CREATED", "قاعدة البيانات %s تم إنشائها!" ); // L43
// %s is table name
define( "TABLE_NOT_CREATED", "غير قادر على إنشاء جدول %s" ); // L118
define( "TABLE_CREATED", "جدول %s تم إنشاءه." ); // L45
define( "ROWS_INSERTED", "%d إدراج في جدول %s." ); // L119
define( "ROWS_FAILED", "فشل إدخال %d إدارج إلى جدول %s." ); // L120
define( "TABLE_ALTERED", "جدول %s تم تحديثه."); // L133
define( "TABLE_NOT_ALTERED", "فشل تحديث جدول %s."); // L134
define( "TABLE_DROPPED", "جدول %s تم حذفه."); // L163
define( "TABLE_NOT_DROPPED", "فشل حذف جدول %s."); // L164

// Error messages
define( "ERR_COULD_NOT_ACCESS", "لا يمكن الدخول إلى المجلد المخصص.الرجاء التحقق من أنه موجود في إستضافتك و أنه قابل للكتابة عليه." );
define( "ERR_NO_XOOPS_FOUND", "لم يتم العثور على المجلد المخصص لإستكمال التثبيت" );
define( "ERR_INVALID_EMAIL", "بريد إلكتروني غير صالح" ); // L73
define( "ERR_REQUIRED", "معلومات إجبارية." ); // L41
define( "ERR_PASSWORD_MATCH", "كلمة المرور غير متطابقة" );
define( "ERR_NEED_WRITE_ACCESS", "يجب إعطاء ترخيص الكتابة على المجلدات و الملفات التالية<br />يعني <em>chmod 777 directory_name</em> في خادم يونيكس أو ليونيكس<br />إذا لم تكن موجودة أو تم إنشائها بطريقة خاطئة فالرجاء إعادة تكوينها من جديد و إعطاء التراخيص بشكل يدوي." );
define( "ERR_NO_DATABASE", "لا يمكن إنشاء قاعدة البيانات.اتصل بالمسئول عن إستضافتك." ); // L31
define( "ERR_NO_DBCONNECTION", "لا يمكن الإتصال بالخادم المستضيف." ); // L106
define( "ERR_WRITING_CONSTANT", "Failed writing constant %s." ); // L122

define( "ERR_COPY_MAINFILE", "لا يمكن نسخ محتوى قالب الإعدادات في mainfile.php" );
define( "ERR_WRITE_MAINFILE", "لا يمكن الكتابة على ملف mainfile.php. تأكد من ترخيص الكتابة عليه ثم أعد المحاولة");
define( "ERR_READ_MAINFILE", "لا يمكن فتح ملف mainfile.php لقراءته" );

define( "ERR_INVALID_DBCHARSET", "الترميز '%s' غير مدعوم." );
define( "ERR_INVALID_DBCOLLATION", "مقارنة الأحرف '%s' غير مدعوم." );
define( "ERR_CHARSET_NOT_SET", "الترميز الإفتراضي ليس هو ترميز قاعدة بيانات MOHTAVA." );


define("_INSTALL_CHARSET", "utf-8");

define( "SUPPORT", "مواقع الدعم");

define( "LOGIN", "التحقق من الهوية");
define( "LOGIN_TITLE", "التحقق من الهوية");
define( "USER_LOGIN", "تسجيل دخول الإدارة" );
define( "USERNAME", "اسم المستخدم :");
define( "PASSWORD", "كلمة المرور :");

define( "ICONV_CONVERSION", "Character set conversion");
define( "ZLIB_COMPRESSION", "Zlib Compression");
define( "IMAGE_FUNCTIONS", "Image functions");
define( "IMAGE_METAS", "Image meta data (exif)");

define( "ADMIN_EXIST", "إشتراك مدير الموقع موجود مسبقاً.<br />إضغط <strong>التالي</strong> للتوجه للخطوة التالية.");

define( "CONFIG_SITE", "تعديلات الموقع" );
define( "CONFIG_SITE_TITLE", "تعديلات الموقع" );
define( "MODULES", "تركيب البرامج" );
define( "MODULES_TITLE", "تركيب البرامج" );
define( "THEME", "إختيار الثيم" );
define( "THEME_TITLE", "إختر الثيم الإفتراضي لموقعك" );

define( "INSTALLED_MODULES", "البرامج التالية تم تركيبها.<br />إضغط <strong>التالي</strong> للذهاب للخطوة التالية.");
define( "NO_MODULES_FOUND", "لا توجد برامج.<br />إضغط <strong>التالي</strong> للذهاب للخطوة التالية.");
define( "NO_INSTALLED_MODULES", "لا يوجد برنامج مثبت.<br />إضغط <strong>التالي</strong> للذهاب للخطوة التالية.");

define( "THEME_NO_SCREENSHOT", "لا توجد صورة مصغرة");

define( "IS_VALOR", " => ");

// password message
define( "PASSWORD_LABEL", "قوة كلمة السر : ");
define( "PASSWORD_DESC", "كلمة السر غير مدخلة");
define( "PASSWORD_GENERATOR", "صانع كلمات المرور");
define( "PASSWORD_GENERATE", "تنفيذ");
define( "PASSWORD_COPY", "نسخ");

define( "PASSWORD_VERY_WEAK", "ضعيفة جداً");
define( "PASSWORD_WEAK", "ضعيفة");
define( "PASSWORD_BETTER", "جيدة");
define( "PASSWORD_MEDIUM", "متوسطة");
define( "PASSWORD_STRONG", "قوية");
define( "PASSWORD_STRONGEST", "قوية جداً");
?>
