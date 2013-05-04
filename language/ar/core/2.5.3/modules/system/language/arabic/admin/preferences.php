<?php
/**
 * @copyright   The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license     http://www.fsf.org/copyleft/gpl.html GNU public license
 * _LANGCODE    en
 * _CHARSET     UTF-8
 * @version     $Id: preferences.php 5570 2010-10-20 20:51:35Z beckmi $
 */
 
// dont change
define("_AM_DBUPDATED",_AM_SYSTEM_DBUPDATED);

//Nav
define("_AM_SYSTEM_PREFERENCES_NAV_MAIN","Preferences");
/*define("_AM_SYSTEM_PREFERENCES_NAV_MD_AM_GENERAL","General Settings");
define("_AM_SYSTEM_PREFERENCES_NAV_MD_AM_USERSETTINGS","User Info Settings");
define("_AM_SYSTEM_PREFERENCES_NAV_MD_AM_METAFOOTER","Meta Tags and Footer");
define("_AM_SYSTEM_PREFERENCES_NAV_MD_AM_CENSOR","Word Censoring Options");
define("_AM_SYSTEM_PREFERENCES_NAV_MD_AM_SEARCH","Search Options");
define("_AM_SYSTEM_PREFERENCES_NAV_MD_AM_MAILER","Mail Setup");
define("_AM_SYSTEM_PREFERENCES_NAV_MD_AM_AUTHENTICATION","Authentication Options");*/

//Tips
define("_AM_SYSTEM_PREFERENCES_NAV_TIPS","<ul><li>Manage all site settings.</li></ul>");
/*

define("_AM_SYSTEM_PREFERENCES_NAV_TIPS_MD_AM_GENERAL","A faire");
define("_AM_SYSTEM_PREFERENCES_NAV_TIPS_MD_AM_USERSETTINGS","A faire");
define("_AM_SYSTEM_PREFERENCES_NAV_TIPS_MD_AM_METAFOOTER","A faire");
define("_AM_SYSTEM_PREFERENCES_NAV_TIPS_MD_AM_CENSOR","A faire");
define("_AM_SYSTEM_PREFERENCES_NAV_TIPS_MD_AM_SEARCH","A faire");
define("_AM_SYSTEM_PREFERENCES_NAV_TIPS_MD_AM_MAILER","A faire");
define("_AM_SYSTEM_PREFERENCES_NAV_TIPS_MD_AM_AUTHENTICATION","A faire");
*/
define("_AM_DBUPDATED",_MD_AM_DBUPDATED);
define("_MD_AM_SITEPREF", "خيارات الموقع");
define("_MD_AM_SITENAME", "إسم الموقع");
define("_MD_AM_SLOGAN", "وصف مختصر لموقعك");
define("_MD_AM_ADMINML", "بريد مدير الموقع");
define("_MD_AM_LANGUAGE", "اللغة");
define("_MD_AM_STARTPAGE", "البرنامج الأساسي عند دخول الموقع");
define("_MD_AM_NONE", "لا يوجد");
define("_MD_AM_SERVERTZ", "الوقت في السيرفر");
define("_MD_AM_DEFAULTTZ", "الوقت لديك");
define("_MD_AM_DTHEME", "الثيم الافتراضي");
define("_MD_AM_THEMESET", "تحديد الثيم");
define("_MD_AM_ANONNAME", "اسم المستخدم للزوار");
define("_MD_AM_MINPASS", "الحد الأدنى من الحروف لكلمة المرور");
define("_MD_AM_NEWUNOTIFY", "أرسل لي بريدا في حال اشتراك جديد");
define("_MD_AM_SELFDELETE", "السماح للأعضاء بإلغاء اشتراكاتهم ؟");
define("_MD_AM_LOADINGIMG", "عرض صورة التحميل ؟");
define("_MD_AM_USEGZIP", "إستخدام خاصية الضغط (gzip) في السيرفر وهي تحتاج إلى إصدارة البي أتش بي رقم 4.0.5 وما فوق وأنت تستخدم الإصدارة رقم  %s");
define("_MD_AM_UNAMELVL", "ما هي طريقة تسجيل الأعضاء في استخدام الحروف (من حيث الدقة) ");
define("_MD_AM_STRICT", "حروف وأرقام (الطريقة الأساسية)");
define("_MD_AM_MEDIUM", "دقة متوسطة");
define("_MD_AM_LIGHT", "بدون تدقيق (ينصح به للغة العربية)");
define("_MD_AM_USERCOOKIE", "اسم ملف الكوكيز للأعضاء");
define("_MD_AM_USERCOOKIEDSC", "في حالة  وضع اسم  الكوكيز، ميزة 'تذكرني' سوف تكون نشطة لتسجيل الدخول. إذا اختار المستخدم هذه الميزة فسيتمكن من الدخول تلقائياً و باستمرار لمدة سنة كاملة.");
define("_MD_AM_USEMYSESS", "استخدام طريقة أخرى لحفظ الكوكيز");
define("_MD_AM_USEMYSESSDSC", "اختر نعم لإضافة واختيار الطريقة");
define("_MD_AM_SESSNAME", "اسم الطريقة");
define("_MD_AM_SESSNAMEDSC", "اسم الطريقة (فقط اذا قمت بتفعيل الطريقة الأخرى)");
define("_MD_AM_SESSEXPIRE", "الإنتهاء");
define("_MD_AM_SESSEXPIREDSC", "اكتب الحد الأقصى لتخزين معلومات العضو بالدقائق (متوافق مع اصدارة PHP4.2.0)");
define("_MD_AM_BANNERS", "تفعيل الإعلانات ؟");
define("_MD_AM_MYIP", "عنوانك IP");
define("_MD_AM_MYIPDSC", "هذا الرقم لا ينطبق على الإعلان وتغيره في كل زيارة");
define("_MD_AM_ALWDHTML", "لغة أتش تي أم أل مفلعة في كل المشاركات");
define("_MD_AM_INVLDMINPASS", "يرجى إدخال العدد الصحيح في كلمة المرور");
define("_MD_AM_INVLDUCOOK", "خطأ في اسم الملف المؤقت للعضو");
define("_MD_AM_INVLDSCOOK", "خطأ في اسم الملف المؤقت للطريقة الأخرى");
define("_MD_AM_INVLDSEXP", "خطأ في إعطاء قيمة انتهاء الملف المؤقت في الطريقة الأخرى");
define("_MD_AM_ADMNOTSET", "بريد المدير لم يحدد");
define("_MD_AM_YES", "نعم");
define("_MD_AM_NO", "لا");
define("_MD_AM_DONTCHNG", "لا تقم بالتغيير");
define("_MD_AM_REMEMBER", "تذكر ان تعطي هذا الملف ترخيص رقم 666");
define("_MD_AM_IFUCANT", "اذا لم يكن لديك المقدرة لإعطاء ترخيص يرجى تعديل الملف يدويا");


define("_MD_AM_COMMODE", "طريقة عرض التعليقات الطبيعية");
define("_MD_AM_COMORDER", "طريقة سرد التعليقات الطبيعية");
define("_MD_AM_ALLOWHTML", "قبول أتش تي أم أل في التعليق ؟");
define("_MD_AM_DEBUGMODE", "نظام تعديل الخطأ");
define("_MD_AM_DEBUGMODEDSC", "يرجى عدم تشغيله لأنه قد يحدث أخطاء في الموقع");
define("_MD_AM_AVATARALLOW", "قبول تحميل صورة شخصية للأعضاء ؟");
define("_MD_AM_AVATARMP", "أقل عدد مشاركات مطلوب");
define("_MD_AM_AVATARMPDSC", "اكتب عدد المشاركات التي يجب أن يتجاوزها العضو ليقوم بتحميل صورته الشخصية");
define("_MD_AM_AVATARW", "أقصى عرض الصورة (بيكسل)");
define("_MD_AM_AVATARH", "أقصى إرتفاع للصورة (بيكسل)");
define("_MD_AM_AVATARMAX", "أكبر حجم للصورة (بايت)");
define("_MD_AM_AVATARCONF", "خيارات تحميل الصورة الشخصية");
define("_MD_AM_CHNGUTHEME", "تغيير كل قوالب الأعضاء");
define("_MD_AM_NOTIFYTO", "اختر المجوعة التي سيتم تبليغها في حالة اشتراك عضو جديد");
define("_MD_AM_ALLOWTHEME", "السماح للأعضاء باختيار القالب للموقع");
define("_MD_AM_ALLOWIMAGE", "السماح للأعضاء بعرض الصور بالمشاركات ؟");

define("_MD_AM_USERACTV", "عن طريق إرسال رابط تفعيل الاشتراك للعضو");
define("_MD_AM_AUTOACTV", "تفعيل تلقائي");
define("_MD_AM_ADMINACTV", "تفعيل عن طريق المدير");
define("_MD_AM_ACTVTYPE", "اختر طريقة إرسال مفتاح تنشيط الاشتراك  للمسجلين الجدد");
define("_MD_AM_ACTVGROUP", "إختر المجموعة التي سيتم تبليغها");
define("_MD_AM_ACTVGROUPDSC", "فقط عند اختيار تفعيل عن طريق المدير يمكنك تفعيل هذه الخاصية");
define("_MD_AM_USESSL", "إستخدام SSL في تسجيل الدخول");
define("_MD_AM_SSLPOST", "أدخل اسم التحويل");
define("_MD_AM_SSLPOSTDSC", "إذا كنت غير متأكد من هذه الخطوة اكتب أي اسم يصعب تخمينه باللغة الإنجليزية");
define("_MD_AM_DEBUGMODE0", "لا يعمل");
define("_MD_AM_DEBUGMODE1", "عرض رسائل الخطأ في أسفل الصفحة");
define("_MD_AM_DEBUGMODE2", "عرض رسائل الخطأ في نافذة منبثقة");
define("_MD_AM_DEBUGMODE3", "عرض رسائل الخطأ الخاصة بالقوالب");
define("_MD_AM_MINUNAME", "الحد الأدنى لحروف اسم المستخدم");
define("_MD_AM_MAXUNAME", "الحد الأقصى لحروف اسم المستخدم");
define("_MD_AM_GENERAL", "التعديلات العامة");
define("_MD_AM_USERSETTINGS", "تعديلات الأعضاء");
define("_MD_AM_ALLWCHGMAIL", "السماح للأعضاء بتغير بريدهم ؟");
define("_MD_AM_ALLWCHGMAILDSC", "");
define("_MD_AM_IPBAN", "منع عناوين IP");
define("_MD_AM_BADEMAILS", "أدخل عناوين البريد التي لا يمكن استخدامها في البيانات الشخصية للأعضاء");
define("_MD_AM_BADEMAILSDSC", "افصل الواحد عن الآخر بعلامة <strong>|</strong>");
define("_MD_AM_BADUNAMES", "أدخل أسماء المستخدمين التي لا يمكن التسجيل بها");
define("_MD_AM_BADUNAMESDSC", "افصل الاسم عن الآخر بعلامة  <strong>|</strong>");
define("_MD_AM_DOBADIPS", "أدخل عناوين IP الممنوعة في موقعك");
define("_MD_AM_DOBADIPSDSC", "الأعضاء الذين ينتمون إلى عناوين IP التالية لا يمكنهم تصفح الموقع");
define("_MD_AM_BADIPS", "أدخل عناوين IP المطرودة <br />افصل الواحد عن الآخر بعلامة  <strong>|</strong>");
define("_MD_AM_BADIPSDSC", "^aaa.bbb.ccc سيطرد أي عضو يحمل مثل هذه الأرقام  aaa.bbb.ccc<br />aaa.bbb.ccc$ ذلك يعني طرد رقم IP الذي ينتهي بهذا العنوان aaa.bbb.ccc<br />aaa.bbb.ccc ذلك يعني طرد أي رقمي أي بي مشابه لذلك الأي بي  aaa.bbb.ccc");
define("_MD_AM_PREFMAIN", "الصفحة الرئيسية للتعديلات");
define("_MD_AM_METAKEY", "الكلمات المفتاحية");
define("_MD_AM_METAKEYDSC", "الكلمات المفتاحية التي سيتم ايجاد موقعك من خلالها في محركات البحث استخدم علامة , للفصل بين كلمة وأخرى");
define("_MD_AM_METARATING", "ترتيب الميتا");
define("_MD_AM_METARATINGDSC", "اختر مدة ترتيب الميتا تاغ");
define("_MD_AM_METAOGEN", "General");
define("_MD_AM_METAO14YRS", "14 years");
define("_MD_AM_METAOREST", "Restricted");
define("_MD_AM_METAOMAT", "Mature");
define("_MD_AM_METAROBOTS", "نهج البحث");
define("_MD_AM_METAROBOTSDSC", "اختر طريقة البحث في موقعك هل هي للصفحة الرئيسية فقط أم للكل");
define("_MD_AM_INDEXFOLLOW", "الصفحة الرئيسية  و  روابطها");
define("_MD_AM_NOINDEXFOLLOW", "فقط روابط الموقع");
define("_MD_AM_INDEXNOFOLLOW", "الصفحة الرئيسية فقط");
define("_MD_AM_NOINDEXNOFOLLOW", "لا صفحة رئيسية ولا روابط الموقع");
define("_MD_AM_METAAUTHOR", "الناشر");
define("_MD_AM_METAAUTHORDSC", "اكتب اسم ناشر الموقع أو صاحبه ،  اكتب بريده  أو اسم شكرته أو اسم مستخدمه");
define("_MD_AM_METACOPYR", "حقوق الموقع");
define("_MD_AM_METACOPYRDSC", "اكتب حقوق موقعك هنا");
define("_MD_AM_METADESC", "وصف موقعك");
define("_MD_AM_METADESCDSC", "اكتب وصف موقعك للتعريف به في محركات البحث");
define("_MD_AM_METAFOOTER", "الميتا تاغ الهيدر والفوتر");
define("_MD_AM_FOOTER", "تذيل الموقع");
define("_MD_AM_FOOTERDSC", "تأكد من كتابة الرابط كاملا بداية من http:// و إلا سوف لن يعمل الرابط جيدا داخل صفحات البرامج");
define("_MD_AM_CENSOR", "تعديلات الكلمات الممنوعة");
define("_MD_AM_DOCENSOR", "تفعيل خاصية الرقابة على الكلمات ؟");
define("_MD_AM_DOCENSORDSC", "يفضل عدم تشغيلها لتسريع تصفح الموقع");
define("_MD_AM_CENSORWRD", "الكلمات الممنوعة");
define("_MD_AM_CENSORWRDDSC", "أدخل الكلمات الممنوعة في المشاركات <br />افصل الكلمة عن الأخرى بعلامة <strong>|</strong>");
define("_MD_AM_CENSORRPLC", "الاستبدال بكلمة :");
define("_MD_AM_CENSORRPLCDSC", "أدخل الكلمة التي ستستبدل بها الكلمة الممنوعة");

define("_MD_AM_SEARCH", "تعديلات البحث");
define("_MD_AM_DOSEARCH", "تفعيل خاصة البحث ؟");
define("_MD_AM_DOSEARCHDSC", "تفعيل خاصية البحث بالمشاركات والمواضيع في موقعك");
define("_MD_AM_MINSEARCH", "أقل عدد حروف");
define("_MD_AM_MINSEARCHDSC", "أدخل أقل عدد من الحروف ليتم قبول البحث في الكلمة المدخلة");
define("_MD_AM_MODCONFIG", "خيارات التعديل");
define("_MD_AM_DSPDSCLMR", "عرض اتفاقية الاشتراك؟");
define("_MD_AM_DSPDSCLMRDSC", "اختر نعم لتفعيل هذه الخاصية");
define("_MD_AM_REGDSCLMR", "شروط الاشتراك");
define("_MD_AM_REGDSCLMRDSC", "اكتب شروط الاشتراك في موقعك");
define("_MD_AM_ALLOWREG", "فتح باب التسجيل في الموقع ؟");
define("_MD_AM_ALLOWREGDSC", "اختر نعم للسماح بالتسجيل في موقعك");
define("_MD_AM_THEMEFILE", "تحديث مجلد الثيمات بشكل تلقائي ؟");
define("_MD_AM_THEMEFILEDSC", "هذا الخيار يعني في حالة وجود أي ملف معدل أو جديد في مجلد الثيم المستخدم  في موقعك ، سيتم تحديثه تلقائيا و يفضل تعطيل هذه الخاصية إذا كان موقعك يعمل");
define("_MD_AM_CLOSESITE", "إيقاف الموقع ؟");
define("_MD_AM_CLOSESITEDSC", "اختر نعم لإيقاف الموقع عن العمل ");
define("_MD_AM_CLOSESITEOK", "اختر المجوعات التي يمكنها تصفح الموقع حتى و لو أغلقته.");
define("_MD_AM_CLOSESITEOKDSC", "مدير الموقع و مجموعته ـ بشكل طبيعي ـ لن يتأثر بهذا التغيير و يستطيع دخول الموقع");
define("_MD_AM_CLOSESITETXT", "سبب إيقاف الموقع");
define("_MD_AM_CLOSESITETXTDSC", "أكتب سبب ايقافك للموقع حتى يعرف زواره ذلك السبب");
define("_MD_AM_SITECACHE", "Site-wide Cache");
define("_MD_AM_SITECACHEDSC", "Caches whole contents of the site for a specified amount of time to enhance performance. Setting site-wide cache will override module-level cache, block-level cache, and module item level cache if any.");
define("_MD_AM_MODCACHE", "التخزين المؤقت");
define("_MD_AM_MODCACHEDSC", "تخزين محتويات  الموقع  مؤقتا لضمان الأداء الحسن. التخزين الموسع المؤقت  يؤدي إلى تجاهل التخزين على مستوى البرامج و البلوكات ، و برنامج الأخبار ");
define("_MD_AM_NOMODULE", "لا يوجد أيّ برنامج لاستخدام التخزين المؤقت");
define("_MD_AM_DTPLSET", "القالب الرئيسي");
define("_MD_AM_SSLLINK", "عنوان SSL لتسجيل الدخول");

// added for mailer
define("_MD_AM_MAILER", "تهيئة البريد");
define("_MD_AM_MAILER_MAIL", "");
define("_MD_AM_MAILER_SENDMAIL", "");
define("_MD_AM_MAILER_", "");
define("_MD_AM_MAILFROM", "بريد المرسل");
define("_MD_AM_MAILFROMDESC", "");
define("_MD_AM_MAILFROMNAME", "اسم المرسل");
define("_MD_AM_MAILFROMNAMEDESC", "");
// RMV-NOTIFY
define("_MD_AM_MAILFROMUID", "من");
define("_MD_AM_MAILFROMUIDDESC", "حدّد اسم المستخدم لمرسل البريد");
define("_MD_AM_MAILERMETHOD", "طريقة إرسال البريد");
define("_MD_AM_MAILERMETHODDESC", "طريقة إرسال البريد في موقعك");
define("_MD_AM_SMTPHOST", "سيرفر أو سيرفرات SMTP");
define("_MD_AM_SMTPHOSTDESC", "اكتب اسم سيرفر SMTP لإرسال البريد يمكنك كتابة كل واحد في سطر ان أردت");
define("_MD_AM_SMTPUSER", "اسم مستخدم SMTP");
define("_MD_AM_SMTPUSERDESC", "اسم المستخدم لسيرفر إرسال SMTP");
define("_MD_AM_SMTPPASS", "كلمة مرور SMTP");
define("_MD_AM_SMTPPASSDESC", "اكتب كلمة مرور لسيرفر إرسال SMTP");
define("_MD_AM_SENDMAILPATH", "مسار إرسال البريد ");
define("_MD_AM_SENDMAILPATHDESC", "اكتب عنوان مترجم إرسال البريد في موقعك");
define("_MD_AM_THEMEOK", "اختيار الثيم للأعضاء");
define("_MD_AM_THEMEOKDSC", "اختر الثيمات المتاحة للأعضاء");


// SOAP Clauses
define("_MD_AM_SOAP_CLIENT", "SOAP - SOAP API");
define("_MD_AM_SOAP_CLIENTDESC","This is the address of the soap server.");
define("_MD_AM_SOAP_PROVISION", "SOAP - Provision");
define("_MD_AM_SOAP_PROVISIONDESC","If you want the new user provisioned, say 'yes'");
define("_MD_AM_SOAP_PROVISIONGROUP", "SOAP - Rank to Provision");
define("_MD_AM_SOAP_PROVISIONGROUPDESC","This is the ranks a new user from the soap server is put in.");

define("_MD_AM_SOAP_WSDL", "SOAP - SOAP WSDL");
define("_MD_AM_SOAP_WSDLDESC","If you need a wdsl soap service enable this option.");
define("_MD_AM_SOAP_USERNAME", "SOAP - SOAP Username");
define("_MD_AM_SOAP_USERNAMEDESC","This is the username of your account on the soap server.");
define("_MD_AM_SOAP_PASSWORD", "SOAP - SOAP Password");
define("_MD_AM_SOAP_PASSWORDDESC","If you need a password with the soap service put it in here.");
define("_MD_AM_SOAP_KEEPCLIENT", "SOAP - Client Alive");
define("_MD_AM_SOAP_KEEPCLIENTDESC","Keep The Soap Client Alive.");
define("_MD_AM_SOAP_FILTERPERSON", "SOAP - Special Accounts");
define("_MD_AM_SOAP_FILTERPERSONDESC","Special Accounts that use Xoops Authentication.");
define("_MD_AM_SOAP_CLIENTPROXYHOST", "SOAP - Proxy Hostname");
define("_MD_AM_SOAP_CLIENTPROXYHOSTDESC","SOAP Servers Proxy Server.");
define("_MD_AM_SOAP_CLIENTPROXYPORT", "SOAP - Proxy port");
define("_MD_AM_SOAP_CLIENTPROXYPORTDESC","SOAP Servers Proxy Server Port Number <br>ie: 0 - 65535");
define("_MD_AM_SOAP_CLIENTPROXYUSERNAME", "SOAP - Proxy Username");
define("_MD_AM_SOAP_CLIENTPROXYUSERNAMEDESC","SOAP Servers Proxy Server Username");
define("_MD_AM_SOAP_CLIENTPROXYPASSWORD", "SOAP - Proxy Password");
define("_MD_AM_SOAP_CLIENTPROXYPASSWORDDESC","SOAP Servers Proxy Server Password.");
define("_MD_AM_SOAP_SOAP_TIMEOUT", "SOAP - SOAP Timeout");
define("_MD_AM_SOAP_SOAP_TIMEOUTDESC","Keep The Soap Query Alive for <strong>xx</strong> seconds.");
define("_MD_AM_SOAP_SOAP_RESPONSETIMEOUT", "SOAP - SOAP Response Timeout");
define("_MD_AM_SOAP_SOAP_RESPONSETIMEOUTDESC","Keep The Soap Query Alive for <strong>xx</strong> seconds.");
define("_MD_AM_SOAP_FIELDMAPPING","MOHTAVA-Auth server fields mapping");
define("_MD_AM_SOAP_FIELDMAPPINGDESC","Describe here the mapping between the MOHTAVA database field and the LDAP Authentication system field." .
		"<br><br>Format [MOHTAVA Database field]=[Auth system SOAP attribute]" .
		"<br>for example : email=mail" .
		"<br>Separate each with a |" .
		"<br><br>!! For advanced users !!");


// Xoops Authentication constants
define("_MD_AM_AUTH_CONFOPTION_XOOPS", "MOHTAVA Database");
define("_MD_AM_AUTH_CONFOPTION_LDAP", "Standard LDAP Directory");
define("_MD_AM_AUTH_CONFOPTION_AD", "Microsoft Active Directory &copy");
define("_MD_AM_AUTH_CONFOPTION_SOAP", "MOHTAVA Soap Authentication");
define("_MD_AM_AUTHENTICATION", "خيارات التحقق من الهوية");
define("_MD_AM_AUTHMETHOD", "طريقة التحقق من الهوية");
define("_MD_AM_AUTHMETHODDESC", "ما الطريقة المستخدمة للتحقّق من هوية المستخدمين ؟");
define("_MD_AM_LDAP_MAIL_ATTR", " سمة بريد-LDAP");
define("_MD_AM_LDAP_MAIL_ATTR_DESC", "الاسم الذي يمثل البريد");
define("_MD_AM_LDAP_NAME_ATTR", "LDAP - Common Name Field Name");
define("_MD_AM_LDAP_NAME_ATTR_DESC", "The name of the Common Name attribute in your LDAP directory.");
define("_MD_AM_LDAP_SURNAME_ATTR", "الاسم المعطى أو المخصّص LDAP للقب الشخص المستخدم");
define("_MD_AM_LDAP_SURNAME_ATTR_DESC", "الاسم المعطى أو المخصّص LDAP للقب الشخص المستخدم ( هو غالبًا 'sn')");
define("_MD_AM_LDAP_GIVENNAME_ATTR", "الاسم المعطى أو المخصّص للشخص المستخدم");
define("_MD_AM_LDAP_GIVENNAME_ATTR_DSC", "الاسم المعطى أو المخصّص و الممثل للشخص المستخدم (هو غالبًا givenname)");
define("_MD_AM_LDAP_BASE_DN", "LDAP - Base DN");
define("_MD_AM_LDAP_BASE_DN_DESC", "The base DN (Distinguished Name) of your LDAP directory tree.");
define("_MD_AM_LDAP_PORT", " رقم المنفذ-LDAP ");
define("_MD_AM_LDAP_PORT_DESC", "The port number needed to access your LDAP directory server.");
define("_MD_AM_LDAP_SERVER", "اسم الخادم-LDAP");
define("_MD_AM_LDAP_SERVER_DESC", "اسم أو عنوان الخادم - LDAP");

define("_MD_AM_LDAP_MANAGER_DN", "DN للبحث");
define("_MD_AM_LDAP_MANAGER_DN_DESC", " DN المستخدم المسموح له بالبحث ( مثل manager)");
define("_MD_AM_LDAP_MANAGER_PASS", "كلمة المرور للبحث");
define("_MD_AM_LDAP_MANAGER_PASS_DESC", "كلمة مرور المستخدم المسموح له بالبحث");
define("_MD_AM_LDAP_VERSION", " نسخة البروتوكول LDAP");
define("_MD_AM_LDAP_VERSION_DESC", "  نسخة البروتوكول : 2 أو 3 ");
define("_MD_AM_LDAP_USERS_BYPASS", "المستخدمون المسموح لهم بتجاوزالتحقق من الهويهLDAP");
define("_MD_AM_LDAP_USERS_BYPASS_DESC", "تحقق من الهوية مباشر عن طريق قاعدة البيانات (افصل الأسماء بــ |)");

define("_MD_AM_LDAP_USETLS", " استخدام اتّصال TLS");
define("_MD_AM_LDAP_USETLS_DESC", " الاتصال  -Transport Layer Security- TLS يعتمد على المنفذ 389 القياسي<BR>" .
                                  " أمّا نسخة البروتوكول LDAP فيجب أن تكون 3");

define("_MD_AM_LDAP_LOGINLDAP_ATTR", "السمة أو الميزة المستخدمة للبحث عن مستخدم");
define("_MD_AM_LDAP_LOGINLDAP_ATTR_D", "إذا اخترت سابقًا (نعم)لاسم المستخدم الموجود في DN يجب أن يتوافق و اسم(مستخدم «محتوا»)");
define("_MD_AM_LDAP_LOGINNAME_ASDN", "اسم مستخدم «محتوا» للدخول و الموجود في DN");
define("_MD_AM_LDAP_LOGINNAME_ASDN_D", "اسم المستخدم للدخول مستعمل في LDAP DN (مثل : uid=<loginname>,dc=MOHTAVA,dc=com)<br>البيانات المدخلة مقروءة مباشرة في خادم LDAP من غير بحث");

define("_MD_AM_LDAP_FILTER_PERSON", "مرشح البحث (فلتر) LADP لإيجاد المستخدمين");
define("_MD_AM_LDAP_FILTER_PERSON_DESC", "مرشحLADPخاص، للبحث عن المستخدمين. @@اسم المستخدم@@ مستبدل بأسماء المستخدمين<br> يُترك فارغا إن كنت لا تدري!" .
        "<br />مثل : (&(objectclass=person)(samaccountname=@@loginname@@)) لــ AD" .
        "<br />مثل : (&(objectclass=inetOrgPerson)(uid=@@loginname@@)) لــ LDAP");

define("_MD_AM_LDAP_DOMAIN_NAME", "اسم النطاق");
define("_MD_AM_LDAP_DOMAIN_NAME_DESC", "اسم نطاق «ويندوز». لـ ADS و NT Server فقط");

define("_MD_AM_LDAP_PROVIS", "تزويد تلقائي لحساب «محتوا»");
define("_MD_AM_LDAP_PROVIS_DESC", "إنشاء حساب «محتوا» تلقائيا إذا تمّ التحقّق من الهويّة");

define("_MD_AM_LDAP_PROVIS_GROUP", "التعيين التلقائي في المجموعة");
define("_MD_AM_LDAP_PROVIS_GROUP_DSC", "اخيار المجموعة التي يتمّ تعيين المستخدمين الجدد ضمنها");

define("_MD_AM_LDAP_FIELD_MAPPING_ATTR", "تواصل نظام محتوا للتحقق من الهويّة");
define("_MD_AM_LDAP_FIELD_MAPPING_DESC", "صف هنا التواصل ما بين قاعدة بيانات «محتوا» و حقل نظام التحقق من الهوية LDAP" .
        "<br /><br />الشكل [MOHTAVA Database field]=[Auth system LDAP attribute]" .
        "<br />على سبيل المثال : email=mail" .
        "<br />افصل بين كلّ بـ |" .
        "<br /><br />!! للمستخدمين المتمرّسين الأكفاء !!");

define("_MD_AM_LDAP_PROVIS_UPD", "الإبقاء على تزويد حساب «محتوا»");
define("_MD_AM_LDAP_PROVIS_UPD_DESC", "حساب مستخدم «محتوا» في تزامن دائم و خادم التحقّق من الهُويّة");


define("_MD_AM_CPANEL", "واجهة لوحة الإدارة");
define("_MD_AM_CPANELDSC", "ثيم خاص بلوحة الإدارة");

define("_MD_AM_WELCOMETYPE", "إرسال رسالة ترحيبية");
define("_MD_AM_WELCOMETYPE_DESC", "طريقة إرسال رسالة ترحيبية إلى المشترك الجديد بعد إتمامه للتسجيل بنجاح");
define("_MD_AM_WELCOMETYPE_EMAIL", "بريد إلكتروني");
define("_MD_AM_WELCOMETYPE_PM", "رسالة خاصة");
define("_MD_AM_WELCOMETYPE_BOTH", "بريد و رسالة خاصة");

define("_MD_AM_MODULEPREF", "تعديلات البرنامج");

// Preference module system

define("_AM_SYSTEM_PREFERENCES_SETTINGS","System Module Settings");
?>