<?php
// index.php
define('_AM_VIDEO_INDEX_BROKEN', "%s تم ارسال تقرير حول وجود عطل في شريط الفيديو");
define('_AM_VIDEO_INDEX_CATEGORIES', "%s فيه متفرع في قاعدة البيانات");
define('_AM_VIDEO_INDEX_DOWNLOADS', "%s شريط الفيديو موجود في قاعدة البيانات");
define('_AM_VIDEO_INDEX_DOWNLOADSWAITING', "%s في انتظار المصادقة على شريط الفيديو");
define('_AM_VIDEO_INDEX_MODIFIED', "%s تم ارسال طلب تنقيح معلومات شريط الفيديو");
define('_AM_VIDEO_INDEX_MAXFILESIZE', "أكبر حجم للفايل الذي يمكن تحميله (السيرفر)");
define('_AM_VIDEO_INDEX_POSTMAXSIZE', "اكبر حجم للارسال عبر الاميل");
define('_AM_VIDEO_INDEX_MAXVIDEOSIZE', "أكبر حجم للفايل الذي يمكن تحميله");

//category.php
define("_AM_VIDEO_CAT_NEW", "فرع جديد");
define("_AM_VIDEO_CAT_LIST", "فهرسة الفروع");
define("_AM_VIDEO_DELDOWNLOADS", "with the following downloads:");
define("_AM_VIDEO_DELSOUSCAT", "The following categories will be totally deleted:");

//downloads.php
define("_AM_VIDEO_DOWNLOADS_LISTE", "فهرسة أشرطة الفيديو");
define("_AM_VIDEO_DOWNLOADS_NEW", "شريط فيديو جديد");
define("_AM_VIDEO_DOWNLOADS_NEWUPLOAD", "ادخال معلومات شريط الفيديو");
define("_AM_VIDEO_DOWNLOADS_NEWCONVERT", "تبديل شريط الفيديو");
define("_AM_VIDEO_DOWNLOADS_NEWCOPY", "نسخ شريط الفيديو");
define("_AM_VIDEO_DOWNLOADS_SEARCH", "البحث");
define("_AM_VIDEO_DOWNLOADS_VOTESANONYME", "وجهة نظر الضيف (مجموع وجهات النظر : %s)");
define("_AM_VIDEO_DOWNLOADS_VOTESUSER", "وجهة نظر المستخدم (مجموع وجهات النظر : %s)");
define("_AM_VIDEO_DOWNLOADS_VOTE_USER", "المستخدمون");
define("_AM_VIDEO_DOWNLOADS_VOTE_IP", "العنوان IP");
define("_AM_VIDEO_DOWNLOADS_WAIT", "ينتظر المصادقة");
define("_AM_VIDEO_DOWNLOADS_EDITFORM", "أدخل رقم شريط الفيديو من أجل التنقيح");

//broken.php
define("_AM_VIDEO_BROKEN_SENDER", "تقرير للمنتج");
define("_AM_VIDEO_BROKEN_SURDEL", "هل أنت متأكد من أنك تريد حذف هذا التقرير؟");

//modified.php
define("_AM_VIDEO_MODIFIED_MOD", "تم ارساله عبر;");
define("_AM_VIDEO_MODIFIED_ORIGINAL", "الأصلي");
define("_AM_VIDEO_MODIFIED_SURDEL", "هل أنت متأكد أنك تريد حذف طلب تعديل شريط الفيديو؟");

//field.php
define("_AM_VIDEO_DELDATA", "المعلومات التالية:");
define("_AM_VIDEO_FIELD_LIST", "فهرسة الحقول");
define("_AM_VIDEO_FIELD_NEW", "حقل جديد");

//permissions.php
define("_AM_VIDEO_PERMISSIONS_4", "ارسال شريط الفيديو");
define("_AM_VIDEO_PERMISSIONS_8", "ارسال التعديلات");
define("_AM_VIDEO_PERMISSIONS_16", "النص المستلم");
define("_AM_VIDEO_PERMISSIONS_32", "تحميل شريط الفيديو");
define("_AM_VIDEO_PERMISSIONS_64", "المصادقة الآلية على أشرطة الفيديو التي تم ارسالها");
define("_AM_VIDEO_PERMISSIONS_128", "مشاهدة شبكة المستخدمين");
define("_AM_VIDEO_PERM_AUTRES", "سائر المواضيع التي يمكن الحصول عليها");
define("_AM_VIDEO_PERM_AUTRES_DSC", "اختر المجموعة التي تستطيع:");
define("_AM_VIDEO_PERM_DOWNLOAD", " الاستلام");
define("_AM_VIDEO_PERM_DOWNLOAD_DSC", "اختر المجموعة التي تستطيع استلام شريط الفيديو في هذا المتفرع");
define("_AM_VIDEO_PERM_DOWNLOAD_DSC2", "اختر المجموعات التي تستطيع استلام شريط الفيديو");
define("_AM_VIDEO_PERM_SUBMIT", "الارسال");
define("_AM_VIDEO_PERM_SUBMIT_DSC", "اختر المجموعات التي تستطيع ارسال شريط الفيديو في المتفرع");
define("_AM_VIDEO_PERM_VIEW", "المشاهدة");
define("_AM_VIDEO_PERM_VIEW_DSC", "اختر المجموعات التي تستطيع مشاهدة شريط الفيديو في المتفرعات التي تم تحديدها");

//Pour les options de filtre
define("_AM_VIDEO_ORDER", "الطلبات: ");
define("_AM_VIDEO_TRIPAR", "تم تنظيمه وفق: ");

//Formulaire et tableau
define("_AM_VIDEO_FORMADD", "الاضافة");
define("_AM_VIDEO_FORMACTION", "الاداء");
define("_AM_VIDEO_FORMAFFICHE", "عرض الحقل؟");
define("_AM_VIDEO_FORMAFFICHESEARCH", "البحث عن الحقل؟");
define("_AM_VIDEO_FORMAPPROVE", "Aprouve");
define("_AM_VIDEO_FORMCAT", "الفرع");
define("_AM_VIDEO_FORMCOMMENTS", "وجهات النظر");
define("_AM_VIDEO_FORMDATE", "تاريخ الارسال");
define("_AM_VIDEO_FORMDATEUPDATE", "تحديث التاريخ");
define("_AM_VIDEO_FORMDATEUPDATE_NO", "لا");
define("_AM_VIDEO_FORMDATEUPDATE_YES", "نعم -->");
define("_AM_VIDEO_FORMDEL", "الحذف");
define("_AM_VIDEO_FORMDISPLAY", "العرض");
define("_AM_VIDEO_FORMEDIT", "التنقيح");
define("_AM_VIDEO_FORMFILE", "شريط الفيديو");
define("_AM_VIDEO_FORMHITS", " إلقاء نظرة");
define("_AM_VIDEO_FORMHOMEPAGE", "الموقع الالكتروني للمنتج");
define("_AM_VIDEO_FORMLOCK", "عدم تفعيل شريط الفيديو");
define("_AM_VIDEO_FORMIGNORE", "التجاهل");
define("_AM_VIDEO_FORMINCAT", "ضمن المتفرع");
define("_AM_VIDEO_FORMIMAGE", "التصوير");
define("_AM_VIDEO_FORMFRAME", "الثانية – لقطة من الفيلم");
define("_AM_VIDEO_FORMIMG", "التصوير");
define("_AM_VIDEO_FORMPAYPAL", "Paypal address for donation");
define("_AM_VIDEO_FORMPATH", "أشرطة الفيديو الموجودة في: %s");
define("_AM_VIDEO_FORMPLATFORM", "المنصة");
define("_AM_VIDEO_FORMSUBMITTER", "تم ارساله عبر ");
define("_AM_VIDEO_FORMRATING", "الملاحظات");
define("_AM_VIDEO_FORMSIZE", "حجم شريط الفيديو");
define("_AM_VIDEO_FORMSTATUS", "وضعية التحميل");
define("_AM_VIDEO_FORMSTATUS_OK", "تمت المصادقة");
define("_AM_VIDEO_FORMSUREDEL", "اهل أنت متأكد من أنك تريد الحذف  : <b><span style='color : Red'> %s </span></b>");
define("_AM_VIDEO_FORMTEXT", "التوضيحات");
define("_AM_VIDEO_FORMTEXTDOWNLOADS", "التوضيحات");
define("_AM_VIDEO_FORMTITLE", "العنوان");
define("_AM_VIDEO_FORMUPLOAD", "التحميل");
define("_AM_VIDEO_FORMURL", "عنوان شريط الفيديو:");
define("_AM_VIDEO_FORM_FLVURL", "اسم شريط الفيديو:");
define("_AM_VIDEO_FORMVALID", "تفعيل شريط الفيديو هذا");
define("_AM_VIDEO_FORMVERSION", "النسخة");
define("_AM_VIDEO_FORMVOTE", "التصويت");
define("_AM_VIDEO_FORMWEIGHT", "الحجم");
define("_AM_VIDEO_FORMWITHFILE", "مع شريط الفيديو: ");
define("_AM_VIDEO_DURATION", "المدة");
define("_AM_VIDEO_TOP", "المختار");
define("_AM_VIDEO_FORMTAB", "الترتيب الافتراضي");
define("_AM_VIDEO_NEWIMG", "تغيير الصورة");

define("_AM_VIDEO_FORMTABACTION", "الأنشطة");
define("_AM_VIDEO_FORMTABINFO", " المعلومات");
define("_AM_VIDEO_FORMTABDESC", "التوضيحات");
define("_AM_VIDEO_FORMTABEMBED", "جزء لا يتجزأ");
define("_AM_VIDEO_FORMTABMORE", "المزيد من أشرطة الفيديو");

//Message d'erreur
define("_AM_VIDEO_ERREUR_CAT", "انك لا تستطيع استخدام هذا المتفرع");
define("_AM_VIDEO_ERREUR_NOBMODDOWNLOADS", "لا يوجد أي تنقيح لشريط الفيديو");
define("_AM_VIDEO_ERREUR_NOBROKENDOWNLOADS", "ليس هناك أي شريط فيديو عاطل");
define("_AM_VIDEO_ERREUR_NOCAT", "عليك اختيار متفرع واحد!");
define("_AM_VIDEO_ERREUR_NODESCRIPTION", "عليك تكميل البيانات");
define("_AM_VIDEO_ERREUR_NODOWNLOADS", "لا يوجد أي شريط فيديو للاستلام");
define("_AM_VIDEO_ERREUR_SIZE", "يجب ادخال ارقام حول حجم شريط الفيديو");
define("_AM_VIDEO_ERREUR_WEIGHT", "يجب ادخال حجم التنظيمات على شكل ارقام");

//Message de redirection
define("_AM_VIDEO_REDIRECT_DELOK", "تم حذفه بنجاح");
define("_AM_VIDEO_REDIRECT_NOCAT", "عليك صناعة فرع");
define("_AM_VIDEO_REDIRECT_NODELFIELD", "ليس باستطاعتك حذف هذا القسم (قسم اساسي)");
define("_AM_VIDEO_REDIRECT_SAVE", "تم التسجیل بنجاح");

define("_REGISTER_ERROR", "الرمز الذي تم ادخاله خاطئ الرجاء ادخال الرمز بشكل صحيح في قسم التنظيمات");

define("_AM_VIDEO_MB", " ميغابايت ");
define("_AM_VIDEO_KB", " كيلوبايت ");

//Mail
define("_AM_VIDEO_MAIL_SUBJECT", "المصادقة على شريط الفيديو المرسل");
define("_AM_VIDEO_MAIL_TITLE", "السلام عليكم %s");
define("_AM_VIDEO_MAIL_MSG", "شريط الفيديو الذي تم ارساله اطلع عليه المسؤولين في الموقع %s وصادقوا عليه");
define("_AM_VIDEO_MAIL_URL", "يمكن لمتصفحي الموقع الحصول على شريط الفيديو الآن");

//version 1.25
define("_AM_VIDEO_FORMEXTRATEXT", "المعلومات الاضافية");
define("_AM_VIDEO_FORMRELATED", "أشرطة فيديو مشابهة");

// version 1.30
define('_AM_VIDEO_FORM_MP4URL', 'Low quality');
define('_AM_VIDEO_FORM_MP4URL2', 'Medium quality');
define('_AM_VIDEO_FORM_MP4URL3', 'High quality');

// version 1.33
define('_AM_VIDEO_TYPE', 'Video type');
?>