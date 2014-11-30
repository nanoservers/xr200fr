<?php
// index.php
define('_AM_VIDEO_INDEX_BROKEN',"%s گزارش ویدیو خراب ارسال شده است");
define('_AM_VIDEO_INDEX_CATEGORIES',"%s شاخه در پایگاه داده ها قرار دارد");
define('_AM_VIDEO_INDEX_DOWNLOADS',"%s ویدیو در پایگاه داده ها قرار دارد");
define('_AM_VIDEO_INDEX_DOWNLOADSWAITING',"%s ویدیو در انتظار تایید است");
define('_AM_VIDEO_INDEX_MODIFIED',"%s درخواست ویرایش اطلاعات ویدیو ارسال شده است");
define('_AM_VIDEO_INDEX_MAXFILESIZE',"بیشترین اندازه فایل قابل بارگذاری ( سرور ) ");
define('_AM_VIDEO_INDEX_POSTMAXSIZE',"بیشترین اندازه ارسال با فرمت پست ");
define('_AM_VIDEO_INDEX_MAXVIDEOSIZE',"بیشترین اندازه فایل قابل بارگذاری ( ماژول ) ");

//category.php
define("_AM_VIDEO_CAT_NEW","شاخه جدید");
define("_AM_VIDEO_CAT_LIST","فهرست شاخه ها");
define("_AM_VIDEO_DELDOWNLOADS","with the following downloads:");
define("_AM_VIDEO_DELSOUSCAT","The following categories will be totally deleted:");

//downloads.php
define("_AM_VIDEO_DOWNLOADS_LISTE","فهرست ویدیو ها");
define("_AM_VIDEO_DOWNLOADS_NEW","ویدیو جدید");
define("_AM_VIDEO_DOWNLOADS_NEWUPLOAD","آپلود ویدیو");
define("_AM_VIDEO_DOWNLOADS_NEWCONVERT","تبدیل ویدیو");
define("_AM_VIDEO_DOWNLOADS_NEWCOPY","کپی ویدیو");
define("_AM_VIDEO_DOWNLOADS_SEARCH","جستجو");
define("_AM_VIDEO_DOWNLOADS_VOTESANONYME","رای توسط مهمان (مجمو آرا : %s)");
define("_AM_VIDEO_DOWNLOADS_VOTESUSER","رای توسط کاربر (مجموع آرا : %s)");
define("_AM_VIDEO_DOWNLOADS_VOTE_USER","کابران");
define("_AM_VIDEO_DOWNLOADS_VOTE_IP","آدرس IP");
define("_AM_VIDEO_DOWNLOADS_WAIT","منتظر برای تایید");
define("_AM_VIDEO_DOWNLOADS_EDITFORM","شماره ویدیو را برای ویرایش وارد کنید");

//broken.php
define("_AM_VIDEO_BROKEN_SENDER","گزارش به سازنده");
define("_AM_VIDEO_BROKEN_SURDEL","آیا شما اطمینان دارید که میخواهید این گزارش را حذف کنید؟");

//modified.php
define("_AM_VIDEO_MODIFIED_MOD","ارسال شده توسط;");
define("_AM_VIDEO_MODIFIED_ORIGINAL","اصل");
define("_AM_VIDEO_MODIFIED_SURDEL","ایا شما اطمینان دارید که میخواهید این درخواست اصلاح ویدیو را حذف کنید؟");

//field.php
define("_AM_VIDEO_DELDATA","با اطلاعات زیر:");
define("_AM_VIDEO_FIELD_LIST","فهرست فیلد ها");
define("_AM_VIDEO_FIELD_NEW","فیلد جدید");

//permissions.php
define("_AM_VIDEO_PERMISSIONS_4","ارسال ویدیو");
define("_AM_VIDEO_PERMISSIONS_8","ارسال اطلاحیه");
define("_AM_VIDEO_PERMISSIONS_16","متن دریافت");
define("_AM_VIDEO_PERMISSIONS_32","بارگذاری ویدیو");
define("_AM_VIDEO_PERMISSIONS_64","تایید خودکار ویدیو های ارسال شده");
define("_AM_VIDEO_PERMISSIONS_128","مشاهده شبکه کاربران");
define("_AM_VIDEO_PERM_AUTRES", "دیگر دسترسی ها");
define("_AM_VIDEO_PERM_AUTRES_DSC", "گروهی را انتخاب کنید که میتوانند:");
define("_AM_VIDEO_PERM_DOWNLOAD", "دسترسی دریافت");
define("_AM_VIDEO_PERM_DOWNLOAD_DSC", "گروه هایی که میتوانند ویدیو در این شاخه را دریافت کنند انتخاب کنید");
define("_AM_VIDEO_PERM_DOWNLOAD_DSC2", "گروه هایی که میتوانند ویدیو دریافت کنند انتخاب کنید");
define("_AM_VIDEO_PERM_SUBMIT", "دسترسی ارسال");
define("_AM_VIDEO_PERM_SUBMIT_DSC", "گروه های را که میتوانند ویدیو در شاخه ارسال کنند انتخاب کنید");
define("_AM_VIDEO_PERM_VIEW", "دسترسی دیدن");
define("_AM_VIDEO_PERM_VIEW_DSC", "گروه هایی را که میتوانند ویدیو ها را در شاخه های مشخص شده ببینند انتخاب کنید");

//Pour les options de filtre
define("_AM_VIDEO_ORDER"," سفارشی: ");
define("_AM_VIDEO_TRIPAR","مرتب شده بر اساس: ");

//Formulaire et tableau
define("_AM_VIDEO_FORMADD","اضافه");
define("_AM_VIDEO_FORMACTION","عملکرد");
define("_AM_VIDEO_FORMAFFICHE","نمایش فیلد ؟");
define("_AM_VIDEO_FORMAFFICHESEARCH","جستجوی فیلد؟");
define("_AM_VIDEO_FORMAPPROVE","Aprouve");
define("_AM_VIDEO_FORMCAT","شاخه");
define("_AM_VIDEO_FORMCOMMENTS","تعداد نظر ها");
define("_AM_VIDEO_FORMDATE","تاریخ ارسال");
define("_AM_VIDEO_FORMDATEUPDATE","به روز کردن تاریخ");
define("_AM_VIDEO_FORMDATEUPDATE_NO","نه");
define("_AM_VIDEO_FORMDATEUPDATE_YES","بله -->");
define("_AM_VIDEO_FORMDEL","حذف");
define("_AM_VIDEO_FORMDISPLAY","نمایش");
define("_AM_VIDEO_FORMEDIT","ویرایش");
define("_AM_VIDEO_FORMFILE","ویدیو");
define("_AM_VIDEO_FORMHITS","بازدید");
define("_AM_VIDEO_FORMHOMEPAGE","سایت سازنده");
define("_AM_VIDEO_FORMLOCK","غیر فعال کردن ویدیو");
define("_AM_VIDEO_FORMIGNORE","نادیده گرفتن");
define("_AM_VIDEO_FORMINCAT","در شاخه");
define("_AM_VIDEO_FORMIMAGE","تصویر");
define("_AM_VIDEO_FORMFRAME","ثانیه - فریم از فیلم");
define("_AM_VIDEO_FORMIMG","تصویر");
define("_AM_VIDEO_FORMPAYPAL","Paypal address for donation");
define("_AM_VIDEO_FORMPATH","ویدیو ها موجود در: %s");
define("_AM_VIDEO_FORMPLATFORM","پلت فرم");
define("_AM_VIDEO_FORMSUBMITTER","ارسال شده به وسیله ");
define("_AM_VIDEO_FORMRATING","یاداشت");
define("_AM_VIDEO_FORMSIZE","حجم ویدیو");
define("_AM_VIDEO_FORMSTATUS","وضعیت دانلود");
define("_AM_VIDEO_FORMSTATUS_OK","تایید شده");
define("_AM_VIDEO_FORMSUREDEL", "ایا شما اطماینا دارید که میخواهید  : <b><span style='color : Red'> %s </span></b> حذف کنید");
define("_AM_VIDEO_FORMTEXT","توضیحات");
define("_AM_VIDEO_FORMTEXTDOWNLOADS","توضیحات");
define("_AM_VIDEO_FORMTITLE","عنوان");
define("_AM_VIDEO_FORMUPLOAD","بارگذاری");
define("_AM_VIDEO_FORMURL","آدرس ویدیو:");
define("_AM_VIDEO_FORM_FLVURL","نام ویدیو:");
define("_AM_VIDEO_FORMVALID","فعال کردن این ویدیو");
define("_AM_VIDEO_FORMVERSION","نسخه");
define("_AM_VIDEO_FORMVOTE","رای");
define("_AM_VIDEO_FORMWEIGHT","وزن");
define("_AM_VIDEO_FORMWITHFILE","با ویدیو: ");
define("_AM_VIDEO_DURATION","مدت زمان");
define("_AM_VIDEO_TOP","منتخب");
define("_AM_VIDEO_FORMTAB","تب پیش فرض");
define("_AM_VIDEO_NEWIMG","تغییر تصویر");

define("_AM_VIDEO_FORMTABACTION","فعالیت ها");
define("_AM_VIDEO_FORMTABINFO","اطلاعات");
define("_AM_VIDEO_FORMTABDESC", "توضیحات");
define("_AM_VIDEO_FORMTABEMBED","کد امبد");
define("_AM_VIDEO_FORMTABMORE","ویدیو بیشتر");

//Message d'erreur
define("_AM_VIDEO_ERREUR_CAT","شما نمیتوانید از این شاخه استفاده کنید (looping on itself)");
define("_AM_VIDEO_ERREUR_NOBMODDOWNLOADS","هیچ ویرایش ویدیوی موجود نیست");
define("_AM_VIDEO_ERREUR_NOBROKENDOWNLOADS","هیچ ویدیو خرابی موجود نیست");
define("_AM_VIDEO_ERREUR_NOCAT","شما باید یک شاخه انتخاب کنید!");
define("_AM_VIDEO_ERREUR_NODESCRIPTION","شما باید توضیحات را تکمیل کنید");
define("_AM_VIDEO_ERREUR_NODOWNLOADS","هیچ ویدیوی برای دریافت موجود ندارد");
define("_AM_VIDEO_ERREUR_SIZE","حجم ویدیو باید به صورت عدد وارد شود");
define("_AM_VIDEO_ERREUR_WEIGHT","وزن چینش باید به صورت عدد وارد شود");

//Message de redirection
define("_AM_VIDEO_REDIRECT_DELOK","با موفقیت حذف شد");
define("_AM_VIDEO_REDIRECT_NOCAT","شما باید یک شاخه بسازید");
define("_AM_VIDEO_REDIRECT_NODELFIELD","شما نمیتوانید این فیلد را حذف کنید (فیلد پایه)");
define("_AM_VIDEO_REDIRECT_SAVE","با موفقیت ثبت شد");

define("_REGISTER_ERROR","مجوز وارد شده درست نیست، لطفا در بخش تنظیمات ماژول مجوز درست را وارد کنید.");

define("_AM_VIDEO_MB"," مگابایت ");
define("_AM_VIDEO_KB"," کیلو بایت ");

//Mail
define("_AM_VIDEO_MAIL_SUBJECT","تایید ویدیو ارسالی");
define("_AM_VIDEO_MAIL_TITLE","با سلام %s عزیز");
define("_AM_VIDEO_MAIL_MSG","ویدیو ارسالی شما در تاریخ %s توسط مدیران وب سایت بررسی و تایید گردید . هم اکنون ویدیو برای کاربران وب سایت قابل دسترسی است.");
define("_AM_VIDEO_MAIL_URL","برای مشاهده ویدیو به لینک رو به رو مراجعه نمایید");

//version 1.25
define("_AM_VIDEO_FORMEXTRATEXT","اطلاعات اضافی");
define("_AM_VIDEO_FORMRELATED","ویدیو های مشابه");

// version 1.30
define('_AM_VIDEO_FORM_MP4URL', 'نام ویدیو');
?>