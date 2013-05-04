<?php
// $Id: admin.php,v 1.18 2004/07/26 17:51:25 hthouzard Exp $
//%%%%%%	Admin Module Name  Articles 	%%%%%
define("_AM_DBUPDATED","تم تحديث قاعدة البيانات");
define("_AM_CONFIG","خيارات الأخبار");
define("_AM_AUTOARTICLES","عرض تلقائي للأخبار");
define("_AM_STORYID","رقم الخبر");
define("_AM_TITLE","العنوان");
define("_AM_TOPIC","القسم");
define("_AM_POSTER","الناشر");
define("_AM_PROGRAMMED","نهج التاريخ والوقت");
define("_AM_ACTION","التحكم");
define("_AM_EDIT","تحرير");
define("_AM_DELETE","مسح");
define("_AM_LAST10ARTS","آخر %d خبر");
define("_AM_PUBLISHED","تاريخ النشر"); // Published Date
define("_AM_GO","إذهب");
define("_AM_EDITARTICLE","تحرير الخبر");
define("_AM_POSTNEWARTICLE","إضافة خبر جديد");
define("_AM_ARTPUBLISHED","تم نشرالخبر بنجاح");
define("_AM_HELLO","السلام عليكم %s,");
define("_AM_YOURARTPUB","الخبر الذي كتبته في موقعنا تم نشره بنجاح");
define("_AM_TITLEC","العنوان: ");
define("_AM_URLC","العنوان (الوصله): ");
define("_AM_PUBLISHEDC","نشر: ");
define("_AM_RUSUREDEL","هل أنت واثق من أنك تريد مسح هذا الخبر مع جميع تعليقاته ؟");
define("_AM_YES","نعم");
define("_AM_NO","لا");
define("_AM_INTROTEXT","مقدمة الخبر");
define("_AM_EXTEXT","تكملة الخبر");
define("_AM_ALLOWEDHTML","قبول Html:");
define("_AM_DISAMILEY","تعطيل الوجوه التعبيرية");
define("_AM_DISHTML","تعطيل لغة Html");
define("_AM_APPROVE","إعتماد النشر");
define("_AM_MOVETOTOP","نقل هذا الخبر إلى الأعلى");
define("_AM_CHANGEDATETIME","تغيير تاريخ ووقت نشر الخبر");
define("_AM_NOWSETTIME","وقت النشر الحالى: %s"); // %s is datetime of publish
define("_AM_CURRENTTIME","الوقت الحالي: %s");  // %s is the current datetime
define("_AM_SETDATETIME","تحديد تاريخ ووقت النشر");
define("_AM_MONTHC","شهر:");
define("_AM_DAYC","يوم:");
define("_AM_YEARC","سنة:");
define("_AM_TIMEC","الوقت:");
define("_AM_PREVIEW","مشاهدة");
define("_AM_SAVE","حفظ");
define("_AM_PUBINHOME","نشر في المكان الرئيسي");
define("_AM_ADD","أضف");

//%%%%%%	Admin Module Name  Topics 	%%%%%

define("_AM_ADDMTOPIC","أضف قسم رئيسي");
define("_AM_TOPICNAME","اسم القسم");
// Warning, changed from 40 to 255 characters.
define("_AM_MAX40CHAR","(الحد الأقصى: 255 حرف)");
define("_AM_TOPICIMG","صورة القسم");
define("_AM_IMGNAEXLOC","الصورة يجب ان تكون في المجلد %s");
define("_AM_FEXAMPLE","مثال: software.gif");
define("_AM_ADDSUBTOPIC","أضف قسم فرعي");
define("_AM_IN","في");
define("_AM_MODIFYTOPIC","تعديل القسم");
define("_AM_MODIFY","تعديل");
define("_AM_PARENTTOPIC","القسم الرئيسي");
define("_AM_SAVECHANGE","حفظ التعديلات");
define("_AM_DEL","مسح");
define("_AM_CANCEL","تراجع");
define("_AM_WAYSYWTDTTAL","هل أنت متأكد من أنك تريد مسح القسم مع جميع أخباره و تعليقاته ؟");


// Added in Beta6
define("_AM_TOPICSMNGR","إدارة الأقسام");
define("_AM_PEARTICLES","إضافة وتحرير الأخبار");
define("_AM_NEWSUB","أخبار جديدة للنشر");
define("_AM_POSTED","بتاريخ");
define("_AM_GENERALCONF","تعديلات عامة");

// Added in RC2
define("_AM_TOPICDISPLAY","عرض صورة القسم");
define("_AM_TOPICALIGN","الإتجاه");
define("_AM_RIGHT","يمين");
define("_AM_LEFT","يسار");

define("_AM_EXPARTS","خبر منتهي الصلاحية");
define("_AM_EXPIRED","منتهي الصلاحية");
define("_AM_CHANGEEXPDATETIME","تغيير تاريخ انتهاء صلاحية الخبر");
define("_AM_SETEXPDATETIME","أدخل تاريخ انتهاء صلاحية الخبر");
define("_AM_NOWSETEXPTIME","لقد تم تحديدها في : %s");

// Added in RC3
define("_AM_ERRORTOPICNAME", "يجب ادخال عنوان الخبر");
define("_AM_EMPTYNODELETE", "لا يوجد شيء يمسح");

// Added 240304 (Mithrandir)
define('_AM_GROUPPERM', 'صلاحيات النشر/الموافقة/العرض');
define('_AM_SELFILE','أختر ملف');

// Added by Hervé
define('_AM_UPLOAD_DBERROR_SAVE','حصل خطأ في ارفاق الملف للقسم');
define('_AM_UPLOAD_ERROR','هناك خطأ في تحميل الملف');
define('_AM_UPLOAD_ATTACHFILE','الملف المرفق :');
define('_AM_APPROVEFORM', 'تصاريح النشر');
define('_AM_SUBMITFORM', 'تصاريح الإضافة');
define('_AM_VIEWFORM', 'تصاريح المشاهدة');
define('_AM_APPROVEFORM_DESC', 'اختر من يستطيع نشر الخبر');
define('_AM_SUBMITFORM_DESC', 'اخنر من يستطيع إضافة الخبر');
define('_AM_VIEWFORM_DESC', 'إختر من يستطيع مشاهدة القسم');
define('_AM_DELETE_SELFILES', 'مسح الملف المحدد');
define('_AM_TOPIC_PICTURE', 'تحميل صورة');
define('_AM_UPLOAD_WARNING', '<B>تحذير: لا تنسى اعطاء صلاحية الكتابة للمجلد التالي  : %s</B>');

define('_AM_NEWS_UPGRADECOMPLETE', 'تمت الترقية');
define('_AM_NEWS_UPDATEMODULE', 'تحديث قوالب الموديل والبلوكات');
define('_AM_NEWS_UPGRADEFAILED', 'فشلت الترقية');
define('_AM_NEWS_UPGRADE', 'تحديث');
define('_AM_ADD_TOPIC','إضافة قسم');
define('_AM_ADD_TOPIC_ERROR','خطأ, القسم موجود سلفا!');
define('_AM_ADD_TOPIC_ERROR1','خطأ: لايمكن اختيار هذا التقسيم للتقسيم الرئيسي!');
define('_AM_SUB_MENU','نشر القسم كقائمة فرعية');
define('_AM_SUB_MENU_YESNO','قائمة فرعية ؟');
define('_AM_HITS', 'الزيارات');
define('_AM_CREATED', 'تاريخ الإنشاء');

define('_AM_TOPIC_DESCR', "وصف القسم");
define('_AM_USERS_LIST', "قائمة المستخدمين");
define('_AM_PUBLISH_FRONTPAGE', "نشر في الصفحة الرئيسية");
define('_AM_NEWS_UPGRADEFAILED1', 'لايمكن إنشاء الجدول stories_files');
define('_AM_NEWS_UPGRADEFAILED2', "لايمكن تغيير طول عنوان التصنيف");
define('_AM_NEWS_UPGRADEFAILED21', "لا يمكن إضافة الحقول الجديدة للجدول topics ");
define('_AM_NEWS_UPGRADEFAILED3', 'لايمكن إنشاء الجدول stories_votedata');
define('_AM_NEWS_UPGRADEFAILED4', "لايمكن إنشاء الحقلين 'rating' و 'votes' من جدول 'story' ");
define('_AM_NEWS_UPGRADEFAILED0', "الرجاء لاحظ الرسائل وحاول إصلاح ذلك يدويا من برنامج phpMyadmin وستجد ملف تعريف الsql في مجلد 'sql' في الموديل الجديد");
define('_AM_NEWS_UPGR_ACCESS_ERROR',"خطأ, لاستخدام سكرت الترقية, يجب أن تدخل كمدير");
define('_AM_NEWS_PRUNE_BEFORE',"مسح الأخبار التي نشرت قبل");
define('_AM_NEWS_PRUNE_EXPIREDONLY',"مسح الأخبار التي انتهت صلاحيتها فقط");
define('_AM_NEWS_PRUNE_CONFIRM',"تحذير, أنت ستقوم بحذف الأخبار التي نشرت قبل %s بشكل نهائي ,(لن تستطيع الترجاع عن هذا العمل لاحقا). سيؤثر على %s خبر.<br />هل أنت متأكد  ?");
define('_AM_NEWS_PRUNE_TOPICS',"فقط الأقسام المحددة");
define('_AM_NEWS_PRUNENEWS', 'تهذيب الأخبار');
define('_AM_NEWS_EXPORT_NEWS', 'تصدير الأخبار');
define('_AM_NEWS_EXPORT_NOTHING', "عذرا ولكن لايوجد شيء لتصديرة,");
define('_AM_NEWS_PRUNE_DELETED', '%d تم حذفه');
define('_AM_NEWS_PERM_WARNING', '<h2>تحذير, يوجد 3 أزرار لكل نموذج زر , تأكد من تطبيق كل منها على حدة</h2>');
define('_AM_NEWS_EXPORT_BETWEEN', 'صدر الأخبار المنشورة بين');
define('_AM_NEWS_EXPORT_AND', ' و ');
define('_AM_NEWS_EXPORT_PRUNE_DSC', "إذا لم تختر شيئا سيتم التطبيق على كل الأقسام");
define('_AM_NEWS_EXPORT_INCTOPICS', 'تضمين التعريفات?');
define('_AM_NEWS_EXPORT_ERROR', 'خطأ أثناء محاولة إنشاء الملف %s. تم وقف العملية.');
define('_AM_NEWS_EXPORT_READY', "ملف الـXML جاهز للتنزيل. <br /><a href='%s'>أنقر هنا للتنزيل</a>.<br />لاتنسى <a href='%s'>حذفه عند الإنتهاء</a> .");
define('_AM_NEWS_RSS_URL', "رابط تغذيةRSS ");
define('_AM_NEWS_NEWSLETTER', "النشرة");
define('_AM_NEWS_NEWSLETTER_BETWEEN', 'اختر الأخبار المنشورة بين');
define('_AM_NEWS_NEWSLETTER_READY', "النشرة جاهزة للتحميل . <br /><a href='%s'>أنقر هنا للتحميل</a>.<br />لاتنسى <a href='%s'>حذفها عند الإنتهاء</a> .");
define('_AM_NEWS_DELETED_OK',"تم حذف الملف بنجاح");
define('_AM_NEWS_DELETED_PB',"حدثت مشكلة أثناء حذف الملف");
define('_AM_NEWS_STATS0','إحصائيات الأقسام');
define('_AM_NEWS_STATS','الإحصائيات');
define('_AM_NEWS_STATS1','المؤلفين بشكل فريد');
define('_AM_NEWS_STATS2','المجاميع');
define('_AM_NEWS_STATS3','احصائيات الأخبار');
define('_AM_NEWS_STATS4','الأخبار الأكثر قراءة');
define('_AM_NEWS_STATS5','الأخبار الأقل قراءة');
define('_AM_NEWS_STATS6','الأخبار الأفضل تقييما');
define('_AM_NEWS_STATS7','المؤلفين الأكثر قراءة');
define('_AM_NEWS_STATS8','المؤلفين الذي حازوا على أفضل تصويت');
define('_AM_NEWS_STATS9','أكثر المشاركين');
define('_AM_NEWS_STATS10','احصائيات المؤلفين');
define('_AM_NEWS_STATS11',"عدد الأخبار");
define('_AM_NEWS_HELP',"مساعدة");
define("_AM_NEWS_MODULEADMIN","إدارة البرنامج");
define("_AM_NEWS_GENERALSET", "إعدادات البرنامج" );
define('_AM_NEWS_GOTOMOD','إذهب إلى البرنامج');
define('_AM_NEWS_NOTHING',"عذرا , ولكن لايوجد شيء لتنزيلة !");
define('_AM_NEWS_NOTHING_PRUNE',"عذرا , ولكن لاتوجد أخبار لتنظيفها, !");
define('_AM_NEWS_TOPIC_COLOR',"لون القسم");
define('_AM_NEWS_COLOR',"اللون");
define('_AM_NEWS_REMOVE_BR',"حول وسوم الهتمل  &lt;br&gt; إلى سطر جديد ?");
// Added in 1.3 RC2
define('_AM_NEWS_PLEASE_UPGRADE',"<a href='upgrade.php'><font color='#FF0000'>الرجاء حدث البرنامج !</font></a>");

// Added in verisn 1.50
define('_AM_NEWS_NEWSLETTER_HEADER', "الترويسة");
define('_AM_NEWS_NEWSLETTER_FOOTER', "التذييل");
define('_AM_NEWS_NEWSLETTER_HTML_TAGS', "إزالة وسوم HTML ؟");
define('_AM_NEWS_VERIFY_TABLES','صيانة الجداول ');
define('_AM_NEWS_METAGEN',"مفاتيح محركات البحث");
define('_AM_NEWS_METAGEN_DESC',"نظام Metagen هو نظام يساعدك على تحسين ظهور صفحات موقعك في نتائج محركات البحث العالمية.<br />إذا لم تقم بكتابة الكلمات المفتاحية و الوصف فسوف يقوم النظام بإنشائها تلقائياً.");
define('_AM_NEWS_BLACKLIST',"القائمة السّوداء");
define('_AM_NEWS_BLACKLIST_DESC',"الكلمات في هذه القائمة سوف لن تستخدم في تكوين الكلمات المفتاحية");
define('_AM_NEWS_BLACKLIST_ADD',"إضافة ");
define('_AM_NEWS_BLACKLIST_ADD_DSC',"اكتب الكلمات المراد إضافتها للقائمة<br />(كلمة واحدة في كل سطر)");
define('_AM_NEWS_META_KEYWORDS_CNT',"أقصى عدد للكلمات المفتاحية في حالة الإنشاء الذاتي");
define('_AM_NEWS_META_KEYWORDS_ORDER',"ترتيب الكلمات المفتاحية");
define('_AM_NEWS_META_KEYWORDS_INTEXT',"تكوين الكلمات حسب ترتيبها في النص");
define('_AM_NEWS_META_KEYWORDS_FREQ1',"ترتيب تكرار الكلمات");
define('_AM_NEWS_META_KEYWORDS_FREQ2',"عكس ترتيب تكرار الكلمات");

// Added in verisn 1.67
// About.php
define("_AM_NEWS_ABOUT_RELEASEDATE",        "Released: ");
define("_AM_NEWS_ABOUT_UPDATEDATE",               "Updated: ");
define("_AM_NEWS_ABOUT_AUTHOR",                   "Author: ");
define("_AM_NEWS_ABOUT_CREDITS",                  "Credits: ");
define("_AM_NEWS_ABOUT_LICENSE",                  "License: ");
define("_AM_NEWS_ABOUT_MODULE_STATUS",            "Status: ");
define("_AM_NEWS_ABOUT_WEBSITE",                  "Website: ");
define("_AM_NEWS_ABOUT_AUTHOR_NAME",              "Author name: ");
define("_AM_NEWS_ABOUT_CHANGELOG",                "Change Log");
define("_AM_NEWS_ABOUT_MODULE_INFO",              "Module Infos");
define("_AM_NEWS_ABOUT_AUTHOR_INFO",              "Author Infos");
define("_AM_NEWS_ABOUT_DESCRIPTION",          "Description: ");
// Configuration check
define("_AM_NEWS_CONFIG_CHECK","Configuration Check");
define("_AM_NEWS_CONFIG_PHP","Minimum PHP required: %s (your version is %s)");
define("_AM_NEWS_CONFIG_XOOPS","Minimum MOHTAVA required:  %s (your version is %s)"); 
 
?>