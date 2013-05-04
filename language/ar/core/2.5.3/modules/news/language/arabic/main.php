<?php
// $Id: main.php,v 1.9 2004/07/26 17:51:25 hthouzard Exp $
//%%%%%%		File Name index.php 		%%%%%
define("_NW_PRINTER","تحظير الصفحة للطباعة");
define("_NW_SENDSTORY","أرسل هذا الخبر");
define("_NW_READMORE","إقرأ المزيد ....");
define("_NW_COMMENTS","تعليقات");
define("_NW_ONECOMMENT","تعليق واحد");
define("_NW_BYTESMORE","أكثر من %s بايت");
define("_NW_NUMCOMMENTS","%s تعليق");
define("_NW_MORERELEASES", "المزيد من  ");


//%%%%%%		File Name submit.php		%%%%%
define("_NW_SUBMITNEWS","أرسل خبر");
define("_NW_TITLE","العنوان");
define("_NW_TOPIC","الموضوع");
define("_NW_THESCOOP","الإختصار");
define("_NW_NOTIFYPUBLISH","تبليغي عبر البريد في حالة النشر");
define("_NW_POST","إضافة");
define("_NW_GO","تنفيذ العملية");
define("_NW_THANKS","شكرا لك"); //submission of news article

define("_NW_NOTIFYSBJCT","خبر جديد"); // Notification mail subject
define("_NW_NOTIFYMSG","السلام عليكم لديك خبر جديد في الموقع"); // Notification mail message

//%%%%%%		File Name archive.php		%%%%%
define("_NW_NEWSARCHIVES","أرشيف الأخبار");
define("_NW_ARTICLES","الأخبار");
define("_NW_VIEWS","مرات الزيارة");
define("_NW_DATE","التاريخ");
define("_NW_ACTIONS","الخيارات");
define("_NW_PRINTERFRIENDLY","تحضير للطباعة");

define("_NW_THEREAREINTOTAL","يوجد %s خبر من إجمالي الأخبار");

// %s is your site name
define("_NW_INTARTICLE","هناك خبر يستحق الإطلاع في %s");
define("_NW_INTARTFOUND","وجدت مقالة جميلة في %s");

define("_NW_TOPICC","القسم :");
define("_NW_URL","العنوان :");
define("_NW_NOSTORY","عفوا هذا الخبر لم ينشر أو غير موجود في قاعدة البيانات");

//%%%%%%	File Name print.php 	%%%%%

define("_NW_URLFORSTORY","عنوان هذا الخبر هو :");

// %s represents your site name
define("_NW_THISCOMESFROM","هذا الخبر من موقع %s");

// Added by Hervé
define("_NW_ATTACHEDFILES","الملفات المرفقة:");
define("_NW_ATTACHEDLIB","هذا الخبر يحوي نفس الملفات المرفقة");
define("_NW_NEWSSAMEAUTHORLINK","أخبار لنفس الكاتب");
define("_NW_NEWS_NO_TOPICS","عذراً .. لا يوجد قسم لإضافة الأخبار إليه، قم بإنشاء قسم جديد أولاً");
define("_NW_PREVIOUS_ARTICLE","الخبر السابق");
define("_NW_NEXT_ARTICLE","الخبر التالي");
define("_NW_OTHER_ARTICLES","أخبار أخرى");

// Added by Hervé in version 1.3 for rating
define("_NW_RATETHISNEWS","قيم هذا الخبر");
define("_NW_RATEIT","تقييم!");
define("_NW_TOTALRATE","التقييم الكلي");
define("_NW_RATINGLTOH","تقييم (الدرجة الأقل إلى الدرجة الأعلى)");
define("_NW_RATINGHTOL","تقييم (الدرجة الأعلى إلى الدرجة الأقل)");
define("_NW_RATINGC","تقييم: ");
define("_NW_RATINGSCALE","المجال من 1 - 10, 1 أي ضعيفة و 10 أي ممتازة.");
define("_NW_BEOBJECTIVE","يرجى التقييم بموضوعية , واختيار قيمة مناسبة للتقييم.");
define("_NW_DONOTVOTE","يرجى عدم التصويت على مشاركاتك الخاصة.");
define("_NW_RATING","تقييم");
define("_NW_VOTE","صوت");
define("_NW_NORATING","لم يتم اختيار تقييم.");
define("_NW_USERAVG","متوسط التصويتات");
define("_NW_DLRATINGS","تقييم المقالات (الأصوات الكلية: %s)");
define("_NW_ONEVOTE","1 صوت");
define("_NW_NUMVOTES","%u أصوات");		// Warning
define("_NW_CANTVOTEOWN","لاتستطيع التصويت على مشاركاتك.<br />التصويتات تخزن وتراقب.");
define("_NW_VOTEDELETED","تم حذف بيانات التصويت.");
define("_NW_VOTEONCE","الرجاء عدم التصويت اكثر من مرة.");
define("_NW_VOTEAPPRE","تم اعتماد التصويت.");
define("_NW_THANKYOU","شكرا للتصويت على %s"); // %s is your site name
define("_NW_RSSFEED","RSS تغذية");	// Warning, this text is included insided an Alt attribut (for a picture), so take care to the quotes
define("_NW_AUTHOR","الكاتب");
define("_NW_META_DESCRIPTION","وصف الميتا");
define("_NW_META_KEYWORDS","الكلمات المفتاحية للبحث");
define("_NW_MAKEPDF","إنشاء ملفpdf من الخبر");
define('_MD_POSTEDON',"نشر في : ");
define("_NW_AUTHOR_ID","رقم الناشر :");
define("_NW_POST_SORRY","عذرا , إما أنه لايوجد أي أخبار أو انك لاتملك الحق في نشر أي خبر. إذا كنت مدير الموقع الرجاء الدخول على بند الصلاحيات وضبط صلاحيات النشر.");

// Added in v 1.50
define("_NW_LINKS","روابط");
define("_NW_PAGE","صفحة");
define("_NW_BOOKMARK_ME","أضف هذا الخبر إلى المواقع التالية");
define('_AM_NEWS_TOTAL',"الإجمالي %u خبر");
define('_AM_NEWS_WHOS_WHO',"Who's Who");
define('_NW_NEWS_LIST_OF_AUTHORS',"هذه قائمة بجميع كتّاب الموقع، أنقر على اسم الكاتب لمشاهدة الأخبار التي نشرها.");
define('_AM_NEWS_TOPICS_DIRECTORY',"دليل الأقسام");
define("_NW_PAGE_AUTO_SUMMARY","صفحة %d : %s");

// Added in version 1.51
define("_NW_BOOKMARK_TO_BLINKLIST","إضافة إلى Blinklist");
define("_NW_BOOKMARK_TO_DELICIOUS","إضافة إلى del.icio.us");
define("_NW_BOOKMARK_TO_DIGG","إضافة إلى Digg");
define("_NW_BOOKMARK_TO_FARK","إضافة إلى Fark");
define("_NW_BOOKMARK_TO_FURL","إضافة إلى Furl");
define("_NW_BOOKMARK_TO_NEWSVINE","إضافة إلى Newsvine");
define("_NW_BOOKMARK_TO_REDDIT","إضافة إلى Reddit");
define("_NW_BOOKMARK_TO_SIMPY","إضافة إلى Simpy");
define("_NW_BOOKMARK_TO_SPURL","إضافة إلى Spurl");
define("_NW_BOOKMARK_TO_YAHOO","إضافة إلى Yahoo");

// Added in version 1.56
define('_NW_NOTYETSTORY',"نأسف، الخبر الذي قمت بإختياره لم يتم نشره بعد. الرجاء الزيارة لاحقاً");
define('_NW_SELECT_IMAGE', "انتخاب تصویر برای اضافه شدن به خبر");
define('_NW_CURENT_PICTURE', "تصویر فعلی");

// Added in version 1.67
define("_NW_BOOKMARK_TO_FACEBOOK", "إضافة إلى Faceboom");
define("_NW_BOOKMARK_TO_TWITTER", "إضافة إلى Twitter");
define("_NW_BOOKMARK_TO_SCRIPSTYLE", "إضافة إلى Scripstyle");
define("_NW_BOOKMARK_TO_STUMBLE", "إضافة إلى Stumble");
define("_NW_BOOKMARK_TO_TECHNORATI", "إضافة إلى Technorati");
define("_NW_BOOKMARK_TO_MIXX", "إضافة إلى Mixx");
define("_NW_BOOKMARK_TO_MYSPACE", "إضافة إلى Myspace");
define("_NW_BOOKMARK_TO_DESIGNFLOAT", "إضافة إلى Designfloat");
define("_NW_BOOKMARK_TO_BALATARIN", "إضافة إلى Balatarin");
define("_NW_BOOKMARK_TO_GOOLGEBUZZ", "إضافة إلى Google Buzz");
define("_NW_BOOKMARK_TO_GOOLGEREADER", "إضافة إلى Google Reader");
define("_NW_BOOKMARK_TO_GOOLGEBOOKMARKS", "إضافة إلى Google Bookmarks");

define("_NW_DELETE", "حذف");
define("_NW_EDIT", "ویرایش");


?>