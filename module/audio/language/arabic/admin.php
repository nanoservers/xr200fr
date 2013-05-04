<?php
// index.php
define('_AM_AUDIO_INDEX_BROKEN',"%s تم ارسال تقرير حول وجود عطل في شريط الصوت");
define('_AM_AUDIO_INDEX_CATEGORIES',"%s فيه متفرع في قاعدة البيانات");
define('_AM_AUDIO_INDEX_DOWNLOADS',"%s شريط الصوت موجود في قاعدة البيانات");
define('_AM_AUDIO_INDEX_DOWNLOADSWAITING',"%s في انتظار المصادقة على شريط الصوت");
define('_AM_AUDIO_INDEX_MODIFIED',"%s تم ارسال طلب تنقيح معلومات شريط الصوت");
define('_AM_AUDIO_INDEX_MAXFILESIZE',"أكبر حجم للفايل الذي يمكن تحميله (السيرفر)");
define('_AM_AUDIO_INDEX_POSTMAXSIZE',"اكبر حجم للارسال عبر الاميل");
define('_AM_AUDIO_INDEX_MAXVIDEOSIZE',"أكبر حجم للفايل الذي يمكن تحميله");

//category.php
define("_AM_AUDIO_CAT_NEW","فرع جديد");
define("_AM_AUDIO_CAT_LIST","فهرسة الفروع");
define("_AM_AUDIO_DELDOWNLOADS","with the following downloads:");
define("_AM_AUDIO_DELSOUSCAT","The following categories will be totally deleted:");

//downloads.php
define("_AM_AUDIO_DOWNLOADS_LISTE","فهرسة أشرطة الصوت");
define("_AM_AUDIO_DOWNLOADS_NEW","شريط صوت جديد");
define("_AM_AUDIO_DOWNLOADS_NEWUPLOAD","ادخال معلومات شريط الصوت");
define("_AM_AUDIO_DOWNLOADS_NEWCONVERT","تبديل شريط الصوت");
define("_AM_AUDIO_DOWNLOADS_NEWCOPY","نسخ شريط الصوت");
define("_AM_AUDIO_DOWNLOADS_SEARCH","البحث");
define("_AM_AUDIO_DOWNLOADS_VOTESANONYME","وجهة نظر الضيف (مجموع وجهات النظر : %s)");
define("_AM_AUDIO_DOWNLOADS_VOTESUSER","وجهة نظر المستخدم (مجموع وجهات النظر : %s)");
define("_AM_AUDIO_DOWNLOADS_VOTE_USER","المستخدمون");
define("_AM_AUDIO_DOWNLOADS_VOTE_IP","العنوان IP");
define("_AM_AUDIO_DOWNLOADS_WAIT","ينتظر المصادقة");
define("_AM_AUDIO_DOWNLOADS_EDITFORM","أدخل رقم شريط الصوت من أجل التنقيح");

//broken.php
define("_AM_AUDIO_BROKEN_SENDER","تقرير للمنتج");
define("_AM_AUDIO_BROKEN_SURDEL","هل أنت متأكد من أنك تريد حذف هذا التقرير؟");

//modified.php
define("_AM_AUDIO_MODIFIED_MOD","تم ارساله عبر;");
define("_AM_AUDIO_MODIFIED_ORIGINAL","الأصلي");
define("_AM_AUDIO_MODIFIED_SURDEL","هل أنت متأكد أنك تريد حذف طلب تعديل شريط الصوت؟");

//field.php
define("_AM_AUDIO_DELDATA","المعلومات التالية:");
define("_AM_AUDIO_FIELD_LIST","فهرسة الحقول");
define("_AM_AUDIO_FIELD_NEW","حقل جديد");

//permissions.php
define("_AM_AUDIO_PERMISSIONS_4","ارسال شريط الصوت");
define("_AM_AUDIO_PERMISSIONS_8","ارسال التعديلات");
define("_AM_AUDIO_PERMISSIONS_16","النص المستلم");
define("_AM_AUDIO_PERMISSIONS_32","تحميل شريط الصوت");
define("_AM_AUDIO_PERMISSIONS_64","المصادقة الآلية على أشرطة الصوت التي تم ارسالها");
define("_AM_AUDIO_PERMISSIONS_128","مشاهدة شبكة المستخدمين");
define("_AM_AUDIO_PERM_AUTRES", "سائر المواضيع التي يمكن الحصول عليها");
define("_AM_AUDIO_PERM_AUTRES_DSC", "اختر المجموعة التي تستطيع:");
define("_AM_AUDIO_PERM_DOWNLOAD", " الاستلام");
define("_AM_AUDIO_PERM_DOWNLOAD_DSC", "اختر المجموعة التي تستطيع استلام شريط الصوت في هذا المتفرع");
define("_AM_AUDIO_PERM_DOWNLOAD_DSC2", "اختر المجموعات التي تستطيع استلام شريط الصوت");
define("_AM_AUDIO_PERM_SUBMIT", "الارسال");
define("_AM_AUDIO_PERM_SUBMIT_DSC", "اختر المجموعات التي تستطيع ارسال شريط الصوت في المتفرع");
define("_AM_AUDIO_PERM_VIEW", "المشاهدة");
define("_AM_AUDIO_PERM_VIEW_DSC", "اختر المجموعات التي تستطيع مشاهدة شريط الصوت في المتفرعات التي تم تحديدها");

//Pour les options de filtre
define("_AM_AUDIO_ORDER","الطلبات: ");
define("_AM_AUDIO_TRIPAR","تم تنظيمه وفق: ");

//Formulaire et tableau
define("_AM_AUDIO_FORMADD","الاضافة");
define("_AM_AUDIO_FORMACTION","الاداء");
define("_AM_AUDIO_FORMAFFICHE","عرض الحقل؟");
define("_AM_AUDIO_FORMAFFICHESEARCH","البحث عن الحقل؟");
define("_AM_AUDIO_FORMAPPROVE","Aprouve");
define("_AM_AUDIO_FORMCAT","الفرع");
define("_AM_AUDIO_FORMCOMMENTS","وجهات النظر");
define("_AM_AUDIO_FORMDATE","تاريخ الارسال");
define("_AM_AUDIO_FORMDATEUPDATE","تحديث التاريخ");
define("_AM_AUDIO_FORMDATEUPDATE_NO","لا");
define("_AM_AUDIO_FORMDATEUPDATE_YES","نعم -->");
define("_AM_AUDIO_FORMDEL","الحذف");
define("_AM_AUDIO_FORMDISPLAY","العرض");
define("_AM_AUDIO_FORMEDIT","التنقيح");
define("_AM_AUDIO_FORMFILE","شريط الصوت");
define("_AM_AUDIO_FORMHITS"," إلقاء نظرة");
define("_AM_AUDIO_FORMHOMEPAGE","الموقع الالكتروني للمنتج");
define("_AM_AUDIO_FORMLOCK","عدم تفعيل شريط الصوت");
define("_AM_AUDIO_FORMIGNORE","التجاهل");
define("_AM_AUDIO_FORMINCAT","ضمن المتفرع");
define("_AM_AUDIO_FORMIMAGE","التصوير");
define("_AM_AUDIO_FORMFRAME","الثانية – لقطة من الفيلم");
define("_AM_AUDIO_FORMIMG","التصوير");
define("_AM_AUDIO_FORMPAYPAL","Paypal address for donation");
define("_AM_AUDIO_FORMPATH","أشرطة الصوت الموجودة في: %s");
define("_AM_AUDIO_FORMPLATFORM","المنصة");
define("_AM_AUDIO_FORMSUBMITTER","تم ارساله عبر ");
define("_AM_AUDIO_FORMRATING","الملاحظات");
define("_AM_AUDIO_FORMSIZE","حجم شريط الصوت");
define("_AM_AUDIO_FORMSTATUS","وضعية التحميل");
define("_AM_AUDIO_FORMSTATUS_OK","تمت المصادقة");
define("_AM_AUDIO_FORMSUREDEL", "اهل أنت متأكد من أنك تريد الحذف  : <b><span style='color : Red'> %s </span></b>");
define("_AM_AUDIO_FORMTEXT","التوضيحات");
define("_AM_AUDIO_FORMTEXTDOWNLOADS","التوضيحات");
define("_AM_AUDIO_FORMTITLE","العنوان");
define("_AM_AUDIO_FORMUPLOAD","التحميل");
define("_AM_AUDIO_FORMURL","عنوان شريط الصوت:");
define("_AM_AUDIO_FORM_FLVURL","اسم شريط الصوت:");
define("_AM_AUDIO_FORMVALID","تفعيل شريط الصوت هذا");
define("_AM_AUDIO_FORMVERSION","النسخة");
define("_AM_AUDIO_FORMVOTE","التصويت");
define("_AM_AUDIO_FORMWEIGHT","الحجم");
define("_AM_AUDIO_FORMWITHFILE","مع شريط الصوت: ");
define("_AM_AUDIO_DURATION","المدة");
define("_AM_AUDIO_TOP","المختار");
define("_AM_AUDIO_FORMTAB","الترتيب الافتراضي");
define("_AM_AUDIO_NEWIMG","تغيير الصورة");

define("_AM_AUDIO_FORMTABACTION","الأنشطة");
define("_AM_AUDIO_FORMTABINFO"," المعلومات");
define("_AM_AUDIO_FORMTABDESC", "التوضيحات");
define("_AM_AUDIO_FORMTABEMBED","جزء لا يتجزأ");
define("_AM_AUDIO_FORMTABMORE","المزيد من أشرطة الصوت");

//Message d'erreur
define("_AM_AUDIO_ERREUR_CAT","انك لا تستطيع استخدام هذا المتفرع");
define("_AM_AUDIO_ERREUR_NOBMODDOWNLOADS","لا يوجد أي تنقيح لشريط الصوت");
define("_AM_AUDIO_ERREUR_NOBROKENDOWNLOADS","ليس هناك أي شريط صوت عاطل");
define("_AM_AUDIO_ERREUR_NOCAT","عليك اختيار متفرع واحد!");
define("_AM_AUDIO_ERREUR_NODESCRIPTION","عليك تكميل البيانات");
define("_AM_AUDIO_ERREUR_NODOWNLOADS","لا يوجد أي شريط صوت للاستلام");
define("_AM_AUDIO_ERREUR_SIZE","يجب ادخال ارقام حول حجم شريط الصوت");
define("_AM_AUDIO_ERREUR_WEIGHT","يجب ادخال حجم التنظيمات على شكل ارقام");

//Message de redirection
define("_AM_AUDIO_REDIRECT_DELOK","تم حذفه بنجاح");
define("_AM_AUDIO_REDIRECT_NOCAT","عليك صناعة فرع");
define("_AM_AUDIO_REDIRECT_NODELFIELD","ليس باستطاعتك حذف هذا القسم (قسم اساسي)");
define("_AM_AUDIO_REDIRECT_SAVE","تم التسجیل بنجاح");

define("_REGISTER_ERROR","الرمز الذي تم ادخاله خاطئ الرجاء ادخال الرمز بشكل صحيح في قسم التنظيمات");

define("_AM_AUDIO_MB"," ميغابايت ");
define("_AM_AUDIO_KB"," كيلوبايت ");

//Mail
define("_AM_AUDIO_MAIL_SUBJECT","المصادقة على شريط الصوت المرسل");
define("_AM_AUDIO_MAIL_TITLE","السلام عليكم %s");
define("_AM_AUDIO_MAIL_MSG","شريط الصوت الذي تم ارساله اطلع عليه المسؤولين في الموقع %s وصادقوا عليه");
define("_AM_AUDIO_MAIL_URL","يمكن لمتصفحي الموقع الحصول على شريط الصوت الآن");

//version 1.25
define("_AM_AUDIO_FORMEXTRATEXT","المعلومات الاضافية");
define("_AM_AUDIO_FORMRELATED","أشرطة صوت مشابهة");
?>