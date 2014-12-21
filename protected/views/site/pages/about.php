<?php

$this->beginWidget('MiniForm',array(
    'header' => Yii::t('app',"About"),
)); 


?>



גרסה: <?php echo $version; ?><br />
 <a href='<?php echo Yii::app()->createAbsoluteUrl('/newUpdate');?>'><?php echo Yii::t('app','Update')?></a>
<br />
רישיון תוכנה: <a href='http://www.mozilla.org/MPL/2.0/'>Mozilla Public License Version 2.0</a> (בקיצור: MPL 2.0)<br />
אישור רישום ברשות המיסים: מס' <a href='http://www.linet.org.il/images/accounting_stuff/Linet3_0RegCert.pdf'>179403</a> <br />
<br />
<div class="alert">
    <h4>אזהרה:</h1><br />
למרות שרישיון ה-MPL 2.0  מאפשר לך לשנות את קוד התוכנה, כל שינוי כאמור בקוד, יוצר למעשה גרסה חדשה לתוכנה, ובכך מבטל אוטומאטית את אישור הרישום של רשות המסים לגרסת תוכנת לינט שנמצאה בשימושך עד לפני השינוי.<br /> 
במילים אחרות: כל שינוי שהוא בקוד התוכנה הופך את גרסת תוכנת הנה"ח ששונתה על ידך לבלתי חוקית לשימוש בתור מערכת ממוחשבת לניהול ספרים בישראל.<br />
רק רישום גרסת התוכנה ששינית ברשות המסים על ידך ובאחריותך, יוכל להפוך את גרסת התוכנה ששינית חזרה לתוכנה חוקית לשימוש בתור מערכת ממוחשבת לניהול ספרים בישראל.<br />
</div>
<br />

 .<br />


<?php $this->endWidget(); ?>
