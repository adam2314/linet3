<?php

/* * *********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */

namespace app\models;

class Help {

    private $data = [
        "/data/linet2import" => "http://www.linet.org.il/תחזוקה/יבוא-חומר-מלינט-2-ללינט-3",
        "/site/bug" => "http://www.linet.org.il/תחזוקה/דווח-על-תקלה-בלינט-3",
        "/site/about" => "http://www.linet.org.il/תחזוקה/אודות-לינט-3",
        "/data/restore" => "http://www.linet.org.il/תחזוקה/שחזור-לינט-3-מקובץ-גיבוי",
        "/data/backup" => "http://www.linet.org.il/תחזוקה/מסך-גיבוי-חברה-נוכחית",
        "/data/openfrmtimport" => "http://www.linet.org.il/תחזוקה/יבוא-קובץ-אחיד-ללינט-3",
        "/payment/admin" => "http://www.linet.org.il/הגדרות/ניהול-אמצעי-תשלום-בלינט-3",
        "/mailtemplate/admin" => "http://www.linet.org.il/הגדרות/תבניות-דואר-אלקטרוני-בלינט-3",
        "/accid6111/admin" => "http://www.linet.org.il/הגדרות/נהל-ערכי-6111-בלינט-3",
        "/admin/route" => "http://www.linet.org.il/הגדרות/נהל-תפקידים",
        "/admin/role" => "http://www.linet.org.il/הגדרות/נהל-קבוצות-משתמשים",
        "/admin/assignment" => "http://www.linet.org.il/הגדרות/שיוך-תפקידים-בלינט-תוכנה-לעסקים",
        "/users/admin" => "http://www.linet.org.il/הגדרות/ניהול-משתמשים-בלינט-3",
        "/itemvatcat/admin" => "http://www.linet.org.il/הגדרות/קטגוריית-מעמ-לפריטים",
        "/transaction/openbalance" => "http://www.linet.org.il/הגדרות/יתרות-פתיחה",
        "/currates/admin" => "http://www.linet.org.il/הגדרות/שערי-מטבע",
        "/eavfields/admin" => "http://www.linet.org.il/הגדרות/שדות-מותאמים",
        "/doctype/admin" => "http://www.linet.org.il/הגדרות/ניהול-סוגי-מסמכים",
        "/settings/admin" => "http://www.linet.org.il/הגדרות/פרטי-עסק",
        "/data/openfrmt" => "http://www.linet.org.il/מסים/צור-קובץ-אחיד-ליצוא",
        "/tax/r856" => "http://www.linet.org.il/מסים/דוח-ניכויים-856",
        "/tax/r1000" => "http://www.linet.org.il/מסים/דוח-102",
        "/data/pcn874" => "http://www.linet.org.il/מסים/הפקת-דווח-מעמ-מקוון-pcn-874",
        "/tax/taxrep" => "http://www.linet.org.il/מסים/דוח-מקדמות",
        "/tax/vat" => "http://www.linet.org.il/מסים/דוח-מעמ",
        "/reports/accounts" => "http://www.linet.org.il/דוחות/רצף-כרטסות-חשבון",
        "/reports/stock" => "http://www.linet.org.il/דוחות/דוח-מלאי",
        "/reports/stockaction" => "http://www.linet.org.il/דוחות/תנועות-מלאי",
        "/reports/balance" => "http://www.linet.org.il/דוחות/מאזן",
        "/reports/mprofloss" => "http://www.linet.org.il/דוחות/דוח-רווח-והפסד-חודשי",
        "/reports/profloss" => "http://www.linet.org.il/דוחות/דוח-רווח-והפסד",
        "/reports/owe" => "http://www.linet.org.il/דוחות/דוח-לקוחות-חייבים",
        "/reports/journal" => "http://www.linet.org.il/דוחות/דוח-תנועות-יומן",
        "/docs/create/17" => "http://www.linet.org.il/ניהול-מלאי/תעודת-יציאה-מהמלאי",
        "/docs/create/16" => "http://www.linet.org.il/ניהול-מלאי/תעודת-כניסה-למלאי",
        "/docs/create/15" => "http://www.linet.org.il/ניהול-מלאי/תעודת-העברה-בין-מחסנים",
        "/docs/create/10" => "http://www.linet.org.il/ניהול-מלאי/הפקת-הזמנת-רכש",
        "/itemunit/admin" => "http://www.linet.org.il/ניהול-מלאי/יחידות-פריטים-במערכת",
        "/itemcategory/admin" => "http://www.linet.org.il/ניהול-מלאי/יחידות-פריטים-במערכת",
        "/accounts/admin/8" => "http://www.linet.org.il/ניהול-מלאי/מחסנים",
        "/item/admin" => "http://www.linet.org.il/ניהול-מלאי/פריטים",
        "/match/dispmatch" => "http://www.linet.org.il/התאמות/הצג-התאמות",
        "/match/intmatch" => "http://www.linet.org.il/התאמות/התאמת-כרטסות",
        "/bankbook/edispmatch" => "http://www.linet.org.il/התאמות/הצג-התאמות-בנק",
        "/bankbook/extmatch" => "http://www.linet.org.il/התאמות/התאמת-בנקים",
        "/bankbook/admin" => "http://www.linet.org.il/התאמות/יבוא-דפי-בנק-ללינט-הנהלת-חשבונות",
        "/docs/create/14" => "http://www.linet.org.il/הוצאות/מסך-קליטת-רכוש-קבוע",
        "/docs/create/13" => "http://www.linet.org.il/הוצאות/קליטת-הוצאה-שוטפת",
        "/accounts/admin/1" => "http://www.linet.org.il/הוצאות/נהל-ספקים",
        "/transaction/create" => "http://www.linet.org.il/הוצאות/מסך-ביצוע-פקודות-יומן-ידניות",
        "/acccat/admin" => "http://www.linet.org.il/נהל-חשבונות/קטגוריות-חשבון-בלינט-הנהלת-חשבונות",
        "/accounts/admin" => "http://www.linet.org.il/נהל-חשבונות/חשבונות",
        "/rm/admin" => "http://www.linet.org.il/נהל-חשבונות/רישום-והצגה-של-אירועים-הקשורים-לחשבונות",
        "/docs/create/18" => "http://www.linet.org.il/קופה/הפקת-קבלה-לתרומה",
        "/outcome/create/2" => "http://www.linet.org.il/קופה/ביצוע-תשלום-לביטוח-לאומי",
        "/outcome/create/1" => "http://www.linet.org.il/קופה/ביצוע-תשלום-למעמ",
        "/outcome/create" => "http://www.linet.org.il/קופה/הפקת-תשלום-לספק",
        "/deposit/admin" => "http://www.linet.org.il/קופה/מסך-רישום-הפקדה-בבנק",
        "/docs/create/8" => "http://www.linet.org.il/קופה/הפקת-קבלה",
        "/recurring/recurring/admin" => "http://www.linet.org.il/מכירות/חשבוניות-קבועות-אוטומטיות",
        "/docs/admin" => "http://www.linet.org.il/מכירות/מסך-ניהול-מסמכים-בלינט-תוכנה-לעסקים",
        "/docs/create/4" => "http://www.linet.org.il/מכירות/הפקת-חשבונית-זיכוי",
        "/docs/create/5" => "http://www.linet.org.il/מכירות/הפקת-תעודת-החזרה-לספק",
        "/docs/create/9" => "http://www.linet.org.il/מכירות/הפקת-חשבונית-מס-קבלה",
        "/docs/create/3" => "http://www.linet.org.il/מכירות/הפקת-חשבונית-מס",
        "/docs/create/1" => "http://www.linet.org.il/מכירות/הפקת-חשבונית-עסקה",
        "/docs/create/2" => "http://www.linet.org.il/מכירות/הפקת-תעודת-משלוח",
        "/docs/create/7" => "http://www.linet.org.il/מכירות/הפקת-הזמנת-עבודה",
        "/docs/create/6" => "http://www.linet.org.il/מכירות/הפקת-הצעת-מחיר",
        "/accounts/admin/0" => "http://www.linet.org.il/מכירות/ניהול-לקוחות",
        "/index.php/site/login" => "http://www.linet.org.il/מדריך-משתמש-ללינט-כללי/חלון-ההתחברות-לינט-הנהלת-חשבונות",
        "/company/index" => "http://www.linet.org.il/מדריך-משתמש-ללינט-כללי/מסך-בחירת-חברה-ניהול-חברות",
        "/settings/dashboard" => "http://www.linet.org.il/מדריך-משתמש-ללינט-כללי/מסך-הפתיחה-dashboard",
    ];

    public function getHelp($url) {
        if (isset($this->data[$url]))
            return $this->data[$url];
        else
            return false;
    }

}
