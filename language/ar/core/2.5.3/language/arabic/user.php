<?php
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code 
 which is considered copyrighted (c) material of the original comment or credit authors.
 
 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

/**
 *  Xoops Language
 *
 * @copyright       The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license         http://www.fsf.org/copyleft/gpl.html GNU public license
 * @package         kernel
 * @subpackage      Xoops User Language
 * @since           2.0.0
 * @author          Kazumi Ono <onokazu@xoops.org>
 * @version         $Id$
 */
defined('XOOPS_ROOT_PATH') or die('Restricted access');

// _LANGCODE: fa
// _CHARSET : UTF-8
// Translator: XOOPS Translation Team
//%%%%%%		File Name user.php 		%%%%%
define('_US_NOTREGISTERED', 'غير مشترك ؟ <a href="register.php">اضغط هنا</a>.');
define('_US_LOSTPASSWORD', 'كلمة المرور مفقودة ؟');
define('_US_NOPROBLEM', 'أدخل بريدك الذي اشتركت به');
define('_US_YOUREMAIL', 'بريدك : ');
define('_US_SENDPASSWORD', 'أرسل كلمة المرور');
define('_US_LOGGEDOUT', 'لقد تم تسجيل خروجك');
define('_US_THANKYOUFORVISIT', 'شكرا لزيارتك موقعنا');
define('_US_INCORRECTLOGIN', 'تسجيل دخول خطأ');
define('_US_LOGGINGU', 'شكرا لتسجيل دخولك  %s');
// 2001-11-17 ADD
define('_US_NOACTTPADM', 'العضو المختار غير منشط للاشتراك<br>يرجى مراسلة صاحب الموقع');
define('_US_ACTKEYNOT', 'المفتاح التنشيطي غير صحيح');
define('_US_ACONTACT', 'الاشتراك المشار إليه نشط أو مستخدم مسبقاا');
define('_US_ACTLOGIN', 'تم تنشيط اشتراكك يرجى تسجيل الدخول الآن');
define('_US_NOPERMISS', 'عفوا ليس لديك الصلاحية لإجراء هذه العملية');
define('_US_SURETODEL', 'هل أنت متأكد من أنك تريد مسح اشتراكك أو حسابك ؟');
define('_US_REMOVEINFO', 'ذلك يعني ان كل معلوماتك ستمسح من قاعدة البيانات');
define('_US_BEENDELED', 'تم مسح حسابك');
define('_US_ACTFAILD', 'فشل في تفعيل العضوية');
//%%%%%%		File Name register.php 		%%%%%
define('_US_USERREG', 'بيانات التسجيل');
define('_US_NICKNAME', 'اسم المستخدم');
define('_US_EMAIL', 'البريد');
define('_US_ALLOWVIEWEMAIL', 'السماح للأعضاء بمشاهدة بريدي');
define('_US_WEBSITE', 'الموقع');
define('_US_TIMEZONE', 'التوقيت');
define('_US_AVATAR', 'الصورة الشخصية');
define('_US_VERIFYPASS', 'تأكيد كلمة المرور');
define('_US_SUBMIT', 'أرسل');
define('_US_USERNAME', 'اسم المستخدم');
define('_US_FINISH', 'انتهى');
define('_US_REGISTERNG', 'لايمكن تسجيل عضو جديد');
define('_US_MAILOK', 'السماح باستقبال رسائل<br />من مدير الموقع ؟');
define('_US_DISCLAIMER', 'الاتفاقية');
define('_US_IAGREE', 'انا موافق');
define('_US_UNEEDAGREE', 'آسف .  نرجو قبول الاتفاقية لإمكانية تسجيلك');
define('_US_NOREGISTER', 'نأسف لقد تم اغلاق التسجيل في الموقع حاليا');
// %s is username. This is a subject for email
define('_US_USERKEYFOR', 'رابط تفعيل الاشتراك للعضو  %s');
define('_US_YOURREGISTERED', 'أنت الآن عضو في موقعنا. انتظر بريدًا يحتوي على تنشيط الاشتراك و اتبع التعليمات ');
define('_US_YOURREGMAILNG', 'لقد تم تسجيلك الآن ولكن نحن نعاني من عطل في البريد لذلك يرجى مراسلة المدير في حالة عدم وصول رابط تفعيل الإشتراك');
define('_US_YOURREGISTERED2', 'لقد تسجيلك الآن ولكن سيتم تفعيل اشتراكك من قبل مدير الموقع');
// %s is your site name
define('_US_NEWUSERREGAT', 'عضو جديد %s');
// %s is a username
define('_US_HASJUSTREG', '%s قام بالاشتراك الآن');
define('_US_INVALIDMAIL', 'بريد خاطئ');
define('_US_EMAILNOSPACES', 'الخطأ البريد يحتوي على فراغ');
define('_US_INVALIDNICKNAME', 'اسم المستخدم خاطئ');
define('_US_NICKNAMETOOLONG', 'إسم المستخدم يجب ان يكون اقل من  %s حرف');
define('_US_NICKNAMETOOSHORT', 'إسم المستخدم يجب أن يكون أكثر من  %s حرف');
define('_US_NAMERESERVED', 'إسم المستخدم محجوز');
define('_US_NICKNAMENOSPACES', 'لا يمكن الفصل بفاراغ في اسم المستخدم');
define('_US_NICKNAMETAKEN', 'اسم المستخدم مأخوذ');
define('_US_EMAILTAKEN', 'هذا البريد مسجل لدينا مسبقا');
define('_US_ENTERPWD', 'يجب تحديد كلمة مرور');
define('_US_SORRYNOTFOUND', 'عفوا لم يتم ايجاد ما تبحث عنه فإسم المستخدم غير متطابق مع أحد المستخدمين');
// %s is your site name
define('_US_NEWPWDREQ', 'طلب كلمة مرور جديده من  %s');
define('_US_YOURACCOUNT', 'حسابك في  %s');
define('_US_MAILPWDNG', 'mail_password: لم نستطع تحديث البيانات يرجى مراسلة المدير');
// %s is a username
define('_US_PWDMAILED', 'تم إرسال كلمة المرور إلى %s');
define('_US_CONFMAIL', 'بريد تفعيل اشتراك ل %s');
define('_US_ACTVMAILNG', 'يوجد خطأ في إرسال البريد إلى %s');
define('_US_ACTVMAILOK', 'تم إرسال التبليغ إلى %s');
//%%%%%%		File Name userinfo.php 		%%%%%
define('_US_SELECTNG', 'يرجى العودة ويجب اختيار اسم المستخدم');
define('_US_PM', 'رسالة خاصة');
define('_US_ICQ', 'ICQ');
define('_US_AIM', 'AIM');
define('_US_YIM', 'YIM');
define('_US_MSNM', 'MSNM');
define('_US_LOCATION', 'الدولة');
define('_US_OCCUPATION', 'الوظيفة');
define('_US_INTEREST', 'الهواية');
define('_US_SIGNATURE', 'التوقيع');
define('_US_EXTRAINFO', 'معلومات اضافية');
define('_US_EDITPROFILE', 'تحرير المعلومات الشخصية');
define('_US_LOGOUT', 'تسجيل خروج');
define('_US_INBOX', 'الوارد');
define('_US_MEMBERSINCE', 'عضو منذ');
define('_US_RANK', 'الرتبة');
define('_US_POSTS', 'مشاركات/تعليقات');
define('_US_LASTLOGIN', 'آخر تسجيل دخول');
define('_US_ALLABOUT', 'كل معلومات %s');
define('_US_STATISTICS', 'الإحصائيات');
define('_US_MYINFO', 'معلوماتي');
define('_US_BASICINFO', 'معلومات رئيسية');
define('_US_MOREABOUT', 'معلومات اضافية عني');
define('_US_SHOWALL', 'عرض الكل');
//%%%%%%		File Name edituser.php 		%%%%%
define('_US_PROFILE', 'المعلومات الشخصية');
define('_US_REALNAME', 'الاسم');
define('_US_SHOWSIG', 'دائما اعرض توقيعي');
define('_US_CDISPLAYMODE', 'طريقة عرض التعليقات');
define('_US_CSORTORDER', 'طريقة سرد التعليقات');
define('_US_PASSWORD', 'كلمة المرور');
define('_US_TYPEPASSTWICE', '(أكتب كلمة المرور مرتين لتغيرها)');
define('_US_SAVECHANGES', 'حفظ التعديلات');
define('_US_NOEDITRIGHT', 'عفوا لا يمكنك تحرير معلومات هذا العضو');
define('_US_PASSNOTSAME', 'كلمة المرور غير متطابقة');
define('_US_PWDTOOSHORT', 'عفوا كلمة المكرور يجب أن تحتوي أكثر من <strong>%s</strong> حروف');
define('_US_PROFUPDATED', 'تم تحديث معلوماتك الشخصية');
define('_US_USECOOKIE', 'تخزين الملفات المؤقته لمدة سنة');
define('_US_NO', 'لا');
define('_US_DELACCOUNT', 'مسح الاشتراك');
define('_US_MYAVATAR', 'صورتي الشخصية');
define('_US_UPLOADMYAVATAR', 'تحميل الصورة الشخصية');
define('_US_MAXPIXEL', 'أكبر حجم للبيكسل');
define('_US_MAXIMGSZ', 'أكبر حجم للصورة بالبايت');
define('_US_SELFILE', 'إختر الملف');
define('_US_OLDDELETED', 'صورتك الشخصية السابقة سيتم مسحها');
define('_US_CHOOSEAVT', 'إختر الصورة الشخصية من المتاح لديك');
define('_US_PRESSLOGIN', 'اضغط على الزر أدناه لتسجيل الدخول');
define('_US_ADMINNO', 'الأعضاء الموجودين في قائمة المشرفين والمدراء لايمكن حذفهم');
define('_US_GROUPS', 'مجموعة العضو');
define('_US_REMEMBERME', 'تذكرني');
// Welcoming emai/PM subject
define('_US_WELCOME_SUBJECT', 'مرحبا بك في %s');

?>