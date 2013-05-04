<?php
// $Id: english.php 2411 2008-11-14 21:01:07Z julionc $
// _LANGCODE: en
// _CHARSET : UTF-8
// Translator: XOOPS Translation Team

define( "LEGEND_XOOPS_PATHS", "مسارات مجلدات نظام إدارة المحتوى" );
define( "LEGEND_DATABASE", "ترميز قاعدة البيانات" );

define( "XOOPS_LIB_PATH_LABEL", "مسار مجلد نظام إدارة المحتوى" );
define( "XOOPS_LIB_PATH_HELP", "المسار الفعلي لمجلد مكتبة نظام إدارة المحتوى بدون الخط المائل ،من أجل التوافق;. حدد موقع المجلد خارج حدد موقع المجلد خارج" . XOOPS_ROOT_PATH . " لجعله آمنا." );
define( "XOOPS_DATA_PATH_LABEL", "مجلد بيانات النظام المخزنة" );
define( "XOOPS_DATA_PATH_HELP", "المسار الفعلي لمجلد بيانات النظام المخزنة بدون الخط المائل, من أجل التوافق;. حدد موقع المجلد خارج  " . XOOPS_ROOT_PATH . " لجعله آمنا." );

define( "DB_COLLATION_LABEL", "ترميز قاعدة البيانات و الاتصال" );
define( "DB_COLLATION_HELP",  "بما أن قواعد البيانات MySQL 4.12 تدعم تخصيص ترميز قاعدة البيانات و الاتصال. غير أنها أكثر تعقيداً مما تتوقع، لذلك يجب عدم عمل أي تعديلات ما لم تكن واثقاً من اختيارك. ");
define( "DB_COLLATION_NOCHANGE",  "لا تغيير");

define( "XOOPS_PATH_FOUND", "تمّ العثور على المسار." );
define( "ERR_COULD_NOT_ACCESS", "لا يمكن الوصول إلى المجلد المحدد. يرجى التحقق من أنه موجود و قابل للقراءة من قبل الخادم." );
define( "CHECKING_PERMISSIONS", "التحقق من تصاريح الملفات و المجلدات" );
define( "ERR_NEED_WRITE_ACCESS", "يجب إعطاء تصاريح الكتابة للوصول إلى الملفات والمجلدات التالية<br />(i.e. <em>chmod 777 directory_name</em> لخادم UNIX/LINUX)" );
define( "IS_NOT_WRITABLE", "%s غير قابل للكتابة" );
define( "IS_WRITABLE", "%s قابل للكتابة" );
define( "ERR_COULD_NOT_WRITE_MAINFILE", "خطأ في كتابة المحتوى بملف mainfile.php ،  اكتب المحتوى يدويا." );

define( "LEGEND_XOOPS_MAINFILE_FORPROTECTOR", "إعداد الملف الأساسي mainfile.php");
define( "XOOPS_MAINFILE_LABEL_FORPROTECTOR", "إذا كنت تريد تركيب برنامج الحارس المنتج من المبرمج GIJOE وليس برنامج الحارس المعدل من فريق تطوير زووبس, فالرجاء استبدال ملف <em>/upgrade/" . basename(dirname(dirname(__FILE__))) . "/mainfile.dist.php</em> بملف <em>/extras/mainfile.dist.php.protector</em>" .
                                            " (لا تنس  تغيير اسم الملف إلى <em>mainfile.dist.php</em>).<br />" .
                                            "إذا كان برنامج الحارس مثبت سابقاً و يعمل بشكل صحيح ، الرجاء تجاهل هذا الاستبدال.");
?> 
