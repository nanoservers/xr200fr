<?php
$content .=
"<h3>موقعك</h3>
<p> الآن <a href='../index.php'>إضغط هنا</a> لمشاهدة الصفحة الرئيسية لموقعك </p>
<h3>الدعم الفني</h3>
<p>راجع <a href='http://xoops.sourceforge.net/' rel='external'>The XOOPS Project</a></p>
";

$content .=
"<h3>إجراءات الأمان</h3>
<p>معالج التثبيت سوف يحاول تعديل موقعك لإعتبارات أمنية. لذلك يجب عليك التحقق من التالي:
<div class='confirmMsg'>
ملف <em>mainfile.php</em> يجب أن يكون للقراءة فقط.<br />
حذف مجلد <em>{$installer_modified}</em> (أو <em>install</em> في حالة أنه لم تتم إعادة تسميته بواسطة معالج التثبيت)  من موقعك.
</div>
</p>
";

?>