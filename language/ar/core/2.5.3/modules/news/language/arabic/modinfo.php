<?php
// $Id: modinfo.php,v 1.21 2004/09/01 17:48:07 hthouzard Exp $
// Module Info

// The name of this module
define('_MI_NEWS_NAME','الأخبار');

// A brief description of this module
define('_MI_NEWS_DESC',"عمل قسم خاص للأخبار ويمكن للزوار كتابة تعليق وإضافة أخبار من خلاله");

// Names of blocks for this module (Not all module has blocks)
define('_MI_NEWS_BNAME1','أقسام الأخبار');
define('_MI_NEWS_BNAME3','الخبر الرئيسي');
define('_MI_NEWS_BNAME4','أهم الأخبار');
define('_MI_NEWS_BNAME5','أخبار جديدة');
define('_MI_NEWS_BNAME6','أخبار تحت النشر');
define('_MI_NEWS_BNAME7','تصفح الأقسام');

// Sub menus in main menu block
define('_MI_NEWS_SMNAME1','أضف خبرا');
define('_MI_NEWS_SMNAME2','الأرشيف');

// Names of admin menu items
define('_MI_NEWS_ADMENU2', 'إدارة الأقسام');
define('_MI_NEWS_ADMENU3', 'تحرير و إضافة الأخبار');
define('_MI_NEWS_GROUPPERMS', 'الصلاحيات');
// Added by Hervé for prune option
define('_MI_NEWS_PRUNENEWS', 'تهذيب الأخبار');
// Added by Hervé
define('_MI_NEWS_EXPORT', 'تصدير الأخبار');

// Title of config items
define('_MI_STORYHOME', 'حدد عدد الأخبار في الصفحة الرئيسية');
define('_MI_NOTIFYSUBMIT', 'إختر نعم لتبليغ المدير عند اضافة خبر جديد');
define('_MI_DISPLAYNAV', 'إختر صح إذا أردت وضع شريط التنقل السريع بين الأخبار');
define('_MI_AUTOAPPROVE','نشر الأخبار تلقائياً دون موافقة المدير ؟');
define("_MI_ALLOWEDSUBMITGROUPS", "المجموعة التي يمكنها اضافة الأخبار");
define("_MI_ALLOWEDAPPROVEGROUPS", "المجموعة التي يمكنها اعطاء تصريح نشر الأخبار");
define("_MI_NEWSDISPLAY", "قالب الأخبار");
define("_MI_NAMEDISPLAY","اسم الناشر");
define("_MI_COLUMNMODE","الجداول");
define("_MI_STORYCOUNTADMIN","عدد الأخبار التي تظهر في لوحة التحكم : ");
define('_MI_UPLOADFILESIZE', 'الحد الأقصى لحجم الملف المرفق 1048576 = 1 ميجا');
define("_MI_UPLOADGROUPS","المجموعة التي يمكنها إضافة المرفقات");


// Description of each config items
define('_MI_STORYHOMEDSC', '');
define('_MI_NOTIFYSUBMITDSC', '');
define('_MI_DISPLAYNAVDSC', '');
define('_MI_AUTOAPPROVEDSC', '');
define("_MI_ALLOWEDSUBMITGROUPSDESC", "المجموعة المحددة يمكنها اضافة الأخبار");
define("_MI_ALLOWEDAPPROVEGROUPSDESC", "المجموعة المحددة يمكنها نشر الأخبار المضافة");
define("_MI_NEWSDISPLAYDESC", "الطريقة الإعتيادية تعني عرض الأخبار بشكل متتالي على حسب تاريخ النشر . طريقة عرض الأقسام هي عرض آخر خبر مفصلة مع عرض العناوين الأخرى في كل قسم");
define('_MI_ADISPLAYNAMEDSC', 'إختر طريقة عرض كاتب الخبر');
define("_MI_COLUMNMODE_DESC","يمكنك إختيار عدد الجداول لعرض قائمة الأخبار");
define("_MI_STORYCOUNTADMIN_DESC","");
define("_MI_UPLOADFILESIZE_DESC","");
define("_MI_UPLOADGROUPS_DESC","إختيار المجموعة التي يمكنها إرفاق ملف");

// Name of config item values
define("_MI_NEWSCLASSIC", "الإعتيادية");
define("_MI_NEWSBYTOPIC", "عرض الأقسام");
define("_MI_DISPLAYNAME1", "اسم المستخدم");
define("_MI_DISPLAYNAME2", "الإسم الحقيقي");
define("_MI_DISPLAYNAME3", "عدم عرض الكاتب");
define("_MI_UPLOAD_GROUP1","الكاتب والناشر");
define("_MI_UPLOAD_GROUP2","فقط الناشر");
define("_MI_UPLOAD_GROUP3","تعطيل الملفات المرفقة");

// Text for notifications

define('_MI_NEWS_GLOBAL_NOTIFY', 'العام');
define('_MI_NEWS_GLOBAL_NOTIFYDSC', 'خيارات التبليغ العامة');

define('_MI_NEWS_STORY_NOTIFY', 'الأخبار');
define('_MI_NEWS_STORY_NOTIFYDSC', 'التبليغات المتاحة في الأخبار');

define('_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFY', 'قسم جديد');
define('_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFYCAP', 'تبليغي عن اضافة قسم جديد');
define('_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFYDSC', 'استقبال تبليغ عند نشر قسم جديد');
define('_MI_NEWS_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} تبليغ تلقائي : قسم جديد');

define('_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFY', 'خبر مضاف');
define('_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFYCAP', 'تبليغي عند اضافة خبر ينتظر تصريح النشر');
define('_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFYDSC', 'استقبال تبليغ في حال اضافة خبر ينتظر النشر.');
define('_MI_NEWS_GLOBAL_STORYSUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} تبليغ تلقائي : خبر ينتظر النشر');

define('_MI_NEWS_GLOBAL_NEWSTORY_NOTIFY', 'خبر جديد');
define('_MI_NEWS_GLOBAL_NEWSTORY_NOTIFYCAP', 'تبليغي عند نشر أي خبر');
define('_MI_NEWS_GLOBAL_NEWSTORY_NOTIFYDSC', 'استقبال تبليغ عند نشر أي خبر جديد');
define('_MI_NEWS_GLOBAL_NEWSTORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} تبليغ تلقائي: خبر جديد');

define('_MI_NEWS_STORY_APPROVE_NOTIFY', 'تصريح نشر للخبر');
define('_MI_NEWS_STORY_APPROVE_NOTIFYCAP', 'تبليغي عند اعطاء تصريح نشر للخبر');
define('_MI_NEWS_STORY_APPROVE_NOTIFYDSC', 'إستقبال تبليغ عند إعطاء تصريح نشر للخبر');
define('_MI_NEWS_STORY_APPROVE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} تبليغ تلقائي: تم اعطاء تصريح نشر للخبر');

define('_MI_RESTRICTINDEX', 'تقييد القسم في الصفحة الرئيسية ؟');
define('_MI_RESTRICTINDEXDSC', 'اذا اخترت نعم فذلك يعني عرض أخبار القسم للأعضاء حسب التصريحات التي حددتها للمجموعات');

define('_MI_NEWSBYTHISAUTHOR', 'أخبار أخرى لنفس الكاتب');
define('_MI_NEWSBYTHISAUTHORDSC', 'إذا اخترت نعم, سيكون رابط \'مقالات لنفس المستخدم\' مرئيا');

define('_MI_NEWS_PREVNEX_LINK','إظهار رابط الخبر السابق والخبر التالي ؟');
define('_MI_NEWS_PREVNEX_LINK_DESC','في حالة إختيار \'نعم\', فسوف يظهر رابطين جديدين في أسفل الخبر. هذه الروابط ستستخدم للإنتقال إلى الخبر السابق أو التالي حسب تاريخ النشر');
define('_MI_NEWS_SUMMARY_SHOW','عرض الخلاصة ؟');
define('_MI_NEWS_SUMMARY_SHOW_DESC',' خلاصة لكل الأخبار الحالية المنشورة ستظهر في أسفل الخبر');
define('_MI_NEWS_AUTHOR_EDIT','تمكين الأعضاء من تحرير مشاركاتهم ؟');
define('_MI_NEWS_AUTHOR_EDIT_DESC','السماح لكتّاب الأخبار بتحرير مشاركاتهم');
define('_MI_NEWS_RATE_NEWS','تمكين الأعضاء من تقييم الأخبار');
define('_MI_NEWS_TOPICS_RSS','تمكين تغذية الأخبار RSS لكل قسم ؟');
define('_MI_NEWS_TOPICS_RSS_DESC',"في حالة إختيار 'نعم' فسوف تكون محتويات الأقسام قابلة للنشر في المواقع الأخرى عن طريق تقنية RSS");
define('_MI_NEWS_DATEFORMAT', "تنسيق التاريخ");
define('_MI_NEWS_DATEFORMAT_DESC',"الرجاء العودة إلى صفحة (http://fr.php.net/manual/en/function.date.php) للمزيد من المعلومات عن كيفية إختيار تنسيق التاريخ. ملاحظة، في حالة عدم كتابة أي تنسيق فسوف يتم إستخدام التنسيق الإفتراضي");
define('_MI_NEWS_META_DATA', "تمكين البيانات المساعدة للبحث (توصيفات وكلمات مفتاحية) تدخل لزيادة نسبة فعالية البحث  ؟");
define('_MI_NEWS_META_DATA_DESC', "في حالة إختيار 'نعم' فسوف يتمكن من لديه الصلاحية من إدخال مفاتيح محركات البحث : الكلمات المفتاحية و الوصف");
define('_MI_NEWS_BNAME8','أخبار عشوائية');
define('_MI_NEWS_NEWSLETTER','النشرة');
define('_MI_NEWS_STATS','الإحصائيات');
define("_MI_NEWS_FORM_OPTIONS","خيارات النموذج");
define("_MI_NEWS_FORM_COMPACT","المبسط");
define("_MI_NEWS_FORM_DHTML","DHTML");
define("_MI_NEWS_FORM_SPAW","Spaw محرر");
define("_MI_NEWS_FORM_HTMLAREA","HtmlArea محرر");
define("_MI_NEWS_FORM_FCK","FCK محرر");
define("_MI_NEWS_FORM_KOIVI","Koivi محرر");
define("_MI_NEWS_FORM_OPTIONS_DESC","إختر محرر النصوص لكي يتم إستخدامه. في حالة أن موقعك بسيط ( بمعنى أنك لم تقم بإضافة أي محررات نصوص متقدمة ففي هذه الحالة يمكنك إستخدام المحررات الإفتراضية DHTML و المبسط ).");
define("_MI_NEWS_KEYWORDS_HIGH","تمييز الكلمات المفتاحية ؟");
define("_MI_NEWS_KEYWORDS_HIGH_DESC","سيتم تلوين الكلمات المفتاحية التي اخترتها داخل الخبر");
define("_MI_NEWS_HIGH_COLOR","لون التمييز (في حال تم اختيار تمييز الكلمات)؟");
define("_MI_NEWS_HIGH_COLOR_DES","أستخدم هذا الخيار فقط في حالة إختيار نعم في الخيار السابق");
define("_MI_NEWS_INFOTIPS","طول صندوق المساعدة");
define("_MI_NEWS_INFOTIPS_DES","في حالةإستخدام هذه الميزة، الر وابط المتصلة بالأخبار سوف تظهر الحروف الأولى من الخبر. في حالة وضع 0 فإن صندوق المساعدة سوف يكون فارغاً");
define("_MI_NEWS_SITE_NAVBAR","استخدم شريط التنقل الخاص بمتصفح موزيلا وأوبرا؟");
define("_MI_NEWS_SITE_NAVBAR_DESC","في حالة تشغيل هذه الميزة فإن زوار موقعك بإمكانهم إستخدام شريط تصفح الأخبار لزيارة الأقسام من خلاله.");
define("_MI_NEWS_TABS_SKIN","إختر تنسيق الأزرار");
define("_MI_NEWS_TABS_SKIN_DESC","هذا التنسيق سوف يستخدم مع جميع البلوكات التي بها أزرار");
define("_MI_NEWS_SKIN_1","نمط الشريط");
define("_MI_NEWS_SKIN_2","حواف");
define("_MI_NEWS_SKIN_3","كلاسيكي");
define("_MI_NEWS_SKIN_4","مجلدات");
define("_MI_NEWS_SKIN_5","MacOs");
define("_MI_NEWS_SKIN_6","عادي");
define("_MI_NEWS_SKIN_7","حواف دائرية");
define("_MI_NEWS_SKIN_8","ZDnet تنسيق موقع");

// Added in version 1.50
define('_MI_NEWS_BNAME9','الأرشيف');
define("_MI_NEWS_FORM_TINYEDITOR","محرر TinyEditor");
define("_MI_NEWS_FOOTNOTES","عرض الروابط في صفحة طباعة الخبر ؟");
define("_MI_NEWS_DUBLINCORE","تفعيل نظام دبلن ؟");
define("_MI_NEWS_DUBLINCORE_DSC","للمزيد من المعلومات، <a href='http://dublincore.org/'>قم بزيارة هذا الموقع</a>");
define("_MI_NEWS_BOOKMARK_ME","عرض بلوك إضافة الخبر إلى المواقع التالية ؟");
define("_MI_NEWS_BOOKMARK_ME_DSC","هذا البلوك سوف يكون مرئي في صفحة الخبر");
define("_MI_NEWS_FF_MICROFORMAT","تفعيل ملخصات متصفح فيرفوكس 2 ؟");
define("_MI_NEWS_FF_MICROFORMAT_DSC","للمزيد من المعلومات قم بزيارة <a href='http://wiki.mozilla.org/Microsummaries' target='_blank'>هذه الصفحة</a>");
define("_MI_NEWS_WHOS_WHO","كتّاب الموقع");
define("_MI_NEWS_METAGEN","مفاتيح محركات البحث");
define("_MI_NEWS_TOPICS_DIRECTORY","دليل الأقسام");
define("_MI_NEWS_ADVERTISEMENT","الدعاية");
define("_MI_NEWS_ADV_DESCR","أدخل نص أو سكربت جافا لعرضه داخل الخبر");
define("_MI_NEWS_MIME_TYPES","أدخل إمتدادات الملفات المرخص إرفاقها (أفصل بينها بسطر)");
define("_MI_NEWS_ENHANCED_PAGENAV","إستخدام مستعرض الصفحات المتقدم ؟");
define("_MI_NEWS_ENHANCED_PAGENAV_DSC","بهذا الخيار تستطيع فصل الصفحات كالتالي : [pagebreak:عنوان الصفحة], الروابط إلى الصفحات سوف تستبدل بقائمة منسدلة و يمكنك أيضاً إستخدام [summary] لإنشاء ملخصات تلقائية للصفحات");

// Added in version 1.54
define('_MI_NEWS_CATEGORY_NOTIFY','القسم');
define('_MI_NEWS_CATEGORY_NOTIFYDSC','خيارات التبليغ التي تتم على القسم الحالي');

define('_MI_NEWS_CATEGORY_STORYPOSTED_NOTIFY', 'خبر جديد مضاف');
define('_MI_NEWS_CATEGORY_STORYPOSTED_NOTIFYCAP', 'تبليغي عند إضافة أي خبر جديد في هذا القسم');
define('_MI_NEWS_CATEGORY_STORYPOSTED_NOTIFYDSC', 'إستقبال التبليغ عند إضافة خبر جديد في هذا القسم');
define('_MI_NEWS_CATEGORY_STORYPOSTED_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} تبليغ تلقائي : خبر جديد');

// Added in version 1.63
define('_MI_NEWS_TAGS', "استعمال الكلمات الدلالية ؟");
define('_MI_NEWS_TAGS_DSC', "هذه الخاصية تعتمد على برنامج tags");
define("_MI_NEWS_BNAME10", "الكلمات الدلالية");
define("_MI_NEWS_BNAME11", "أشهر الكلمات الدلالية");
define("_MI_NEWS_INTRO_TEXT", "متنی را که میخواهید در صفحه ارسال خبر نمایش داده شود وارد کنید");
define("_MI_NEWS_IMAGE_MAX_WIDTH", "بیشترین اندازه عرض تصویر بعد از تغییر ابعداد");
define("_MI_NEWS_IMAGE_MAX_HEIGHT", "بیشترین اندازه ارتفاع تصویر بعد از تغییر ابعداد");

//Added in 1.67
define("_MI_NEWS_HELP",          "راهنمایی");
define("_MI_NEWS_ABOUT",          "درباره");
define("_MI_NEWS_HOME",          "خانه");
define("_MI_NEWS_UPGRADE",          "به روز کردن");
define("_MI_NEWS_DESCRIPTION",          "");

define("_MI_NEWS_SHARE_ME","Display share icons ?");
define("_MI_NEWS_SHARE_ME_DSC","Share icons to facebook ,twitter , google buzz");
define("_MI_NEWS_SHOWICONS","Display item icons ?");
define("_MI_NEWS_SHOWICONS_DSC","Display print , PDF and email icons in buttom of each article");
?>