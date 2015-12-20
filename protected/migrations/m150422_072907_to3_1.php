<?php

use yii\db\Schema;
use yii\db\Migration;
use app\models\Company;
use app\helpers\dbMaster;

class m150422_072907_to3_1 extends Migration {

    private $openformat = array(
        array('id' => '1000', 'description' => 'קוד רשומה', 'type' => 's', 'size' => '4', 'record' => '1', 'export' => 'A000', 'import' => 'A000', 'type_id' => 'A000'),
        array('id' => '1001', 'description' => 'נתנוים עתדיים', 'type' => 's', 'size' => '5', 'record' => '1', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'A000'),
        array('id' => '1002', 'description' => 'סך רשומות בקובץ', 'type' => 'n', 'size' => '15', 'record' => '1', 'export' => 'file.linecount', 'import' => 'file.linecount', 'type_id' => 'A000'),
        array('id' => '1003', 'description' => 'עוסק מורשה', 'type' => 'n', 'size' => '9', 'record' => '1', 'export' => 'company.vatnum', 'import' => 'company.vatnum', 'type_id' => 'A000'),
        array('id' => '1004', 'description' => 'מזהה ראשי', 'type' => 'n', 'size' => '15', 'record' => '1', 'export' => 'this.id', 'import' => 'NA', 'type_id' => 'A000'),
        array('id' => '1005', 'description' => 'קבוע מערכת', 'type' => 's', 'size' => '8', 'record' => '1', 'export' => '&OF1.31&', 'import' => '&OF1.31&', 'type_id' => 'A000'),
        array('id' => '1006', 'description' => 'רישום תוכנה', 'type' => 'n', 'size' => '8', 'record' => '1', 'export' => 'system.auth', 'import' => 'system.auth', 'type_id' => 'A000'),
        array('id' => '1007', 'description' => 'שם תוכנה', 'type' => 's', 'size' => '20', 'record' => '1', 'export' => 'system.name', 'import' => 'system.name', 'type_id' => 'A000'),
        array('id' => '1008', 'description' => 'מהדורה', 'type' => 's', 'size' => '20', 'record' => '1', 'export' => 'system.version', 'import' => 'system.version', 'type_id' => 'A000'),
        array('id' => '1009', 'description' => 'עמ של יצרן', 'type' => 'n', 'size' => '9', 'record' => '1', 'export' => 'system.vendor.vatnum', 'import' => 'system.vendor.vatnum', 'type_id' => 'A000'),
        array('id' => '1010', 'description' => 'יצרן תוכנה', 'type' => 's', 'size' => '20', 'record' => '1', 'export' => 'system.vendor.name', 'import' => 'system.vendor.name', 'type_id' => 'A000'),
        array('id' => '1011', 'description' => 'סוג תוכנה', 'type' => 'n', 'size' => '1', 'record' => '1', 'export' => '2', 'import' => '2', 'type_id' => 'A000'),
        array('id' => '1012', 'description' => 'נתיב שמירת קובץ', 'type' => 's', 'size' => '50', 'record' => '1', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'A000'),
        array('id' => '1013', 'description' => 'סוג הנהחש', 'type' => 'n', 'size' => '1', 'record' => '1', 'export' => '2', 'import' => '2', 'type_id' => 'A000'),
        array('id' => '1014', 'description' => 'איזון חשבונאי נדרש', 'type' => 'n', 'size' => '1', 'record' => '1', 'export' => '1', 'import' => '1', 'type_id' => 'A000'),
        array('id' => '1015', 'description' => 'מספר חברה ברשם החברות', 'type' => 'n', 'size' => '9', 'record' => '1', 'export' => 'company.vatnum', 'import' => 'settings.vatnum', 'type_id' => 'A000'),
        array('id' => '1016', 'description' => 'תיק ניכויים', 'type' => 'n', 'size' => '9', 'record' => '1', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'A000'),
        array('id' => '1017', 'description' => 'נתונים עתידיים', 'type' => 's', 'size' => '10', 'record' => '1', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'A000'),
        array('id' => '1018', 'description' => 'שם העסק', 'type' => 's', 'size' => '50', 'record' => '1', 'export' => 'this.name', 'import' => 'settings.name', 'type_id' => 'A000'),
        array('id' => '1019', 'description' => 'מען העסק רחוב', 'type' => 's', 'size' => '50', 'record' => '1', 'export' => 'this.address', 'import' => 'settings.address', 'type_id' => 'A000'),
        array('id' => '1020', 'description' => 'מען העסק מס בית', 'type' => 's', 'size' => '10', 'record' => '1', 'export' => 'this.address', 'import' => 'settings.address', 'type_id' => 'A000'),
        array('id' => '1021', 'description' => 'מען העסק עיר', 'type' => 's', 'size' => '30', 'record' => '1', 'export' => 'this.city', 'import' => 'settings.city', 'type_id' => 'A000'),
        array('id' => '1022', 'description' => 'מען העסק מיקוד', 'type' => 's', 'size' => '8', 'record' => '1', 'export' => 'this.zip', 'import' => 'settings.zip', 'type_id' => 'A000'),
        array('id' => '1023', 'description' => 'שנת המס', 'type' => 'n', 'size' => '4', 'record' => '1', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'A000'),
        array('id' => '1024', 'description' => 'תאריך חיתוך', 'type' => 'date', 'size' => '8', 'record' => '1', 'export' => 'start', 'import' => 'start', 'type_id' => 'A000'),
        array('id' => '1025', 'description' => 'תאריך חיתוך סןף', 'type' => 'date', 'size' => '8', 'record' => '1', 'export' => 'end', 'import' => 'end', 'type_id' => 'A000'),
        array('id' => '1026', 'description' => 'תאריך הפקה', 'type' => 'date', 'size' => '8', 'record' => '1', 'export' => 'now', 'import' => 'now', 'type_id' => 'A000'),
        array('id' => '1027', 'description' => 'שעת הפקה', 'type' => 'hour', 'size' => '4', 'record' => '1', 'export' => 'now', 'import' => 'now', 'type_id' => 'A000'),
        array('id' => '1028', 'description' => 'קוד שפה', 'type' => 'n', 'size' => '1', 'record' => '1', 'export' => '0', 'import' => '0', 'type_id' => 'A000'),
        array('id' => '1029', 'description' => 'סט תווים', 'type' => 'n', 'size' => '1', 'record' => '1', 'export' => '1', 'import' => '1', 'type_id' => 'A000'),
        array('id' => '1030', 'description' => 'שם תוכנת הכיווץ', 'type' => 's', 'size' => '20', 'record' => '1', 'export' => 'zip', 'import' => 'zip', 'type_id' => 'A000'),
        array('id' => '1031', 'description' => '', 'type' => '', 'size' => '0', 'record' => '0', 'export' => '', 'import' => '', 'type_id' => 'A002'),
        array('id' => '1032', 'description' => 'מטבע מוביל', 'type' => 's', 'size' => '3', 'record' => '1', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'A000'),
        array('id' => '1033', 'description' => '', 'type' => '', 'size' => '0', 'record' => '0', 'export' => '', 'import' => '', 'type_id' => 'A002'),
        array('id' => '1034', 'description' => 'סניפים/ענפים', 'type' => 'n', 'size' => '1', 'record' => '1', 'export' => '0', 'import' => '0', 'type_id' => 'A000'),
        array('id' => '1035', 'description' => 'נתונים עתידיים', 'type' => 's', 'size' => '46', 'record' => '1', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'A000'),
        array('id' => '1050', 'description' => 'סוג רשומה', 'type' => 's', 'size' => '4', 'record' => '10', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'A001'),
        array('id' => '1051', 'description' => 'סך רשומות', 'type' => 'n', 'size' => '15', 'record' => '10', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'A001'),
        array('id' => '1100', 'description' => 'קוד רשומה', 'type' => 's', 'size' => '4', 'record' => '9', 'export' => 'A100', 'import' => 'A100', 'type_id' => 'A100'),
        array('id' => '1101', 'description' => 'מס רשומה', 'type' => 'n', 'size' => '9', 'record' => '9', 'export' => 'file.line', 'import' => 'file.line', 'type_id' => 'A100'),
        array('id' => '1102', 'description' => 'עוסק מורשה', 'type' => 'n', 'size' => '9', 'record' => '9', 'export' => 'company.vatnum', 'import' => 'company.vatnum', 'type_id' => 'A100'),
        array('id' => '1103', 'description' => 'מזהה ראשי', 'type' => 'n', 'size' => '15', 'record' => '9', 'export' => 'this.id', 'import' => 'this.id', 'type_id' => 'A100'),
        array('id' => '1104', 'description' => 'קבוע מערכת', 'type' => 's', 'size' => '8', 'record' => '9', 'export' => '&OF1.31&', 'import' => '&OF1.31&', 'type_id' => 'A100'),
        array('id' => '1105', 'description' => 'נתונים עתדיים', 'type' => 's', 'size' => '50', 'record' => '9', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'A100'),
        array('id' => '1150', 'description' => 'קוד רשומה', 'type' => 's', 'size' => '4', 'record' => '8', 'export' => 'Z900', 'import' => 'Z900', 'type_id' => 'Z900'),
        array('id' => '1151', 'description' => 'מס רשומה', 'type' => 'n', 'size' => '9', 'record' => '8', 'export' => 'file.line', 'import' => 'file.line', 'type_id' => 'Z900'),
        array('id' => '1152', 'description' => 'עוסק מורשה', 'type' => 'n', 'size' => '9', 'record' => '8', 'export' => 'company.vatnum', 'import' => 'company.vatnum', 'type_id' => 'Z900'),
        array('id' => '1153', 'description' => 'מזהה ראשי', 'type' => 'n', 'size' => '9', 'record' => '8', 'export' => 'this.id', 'import' => 'this.id', 'type_id' => 'Z900'),
        array('id' => '1154', 'description' => 'קבוע מערכת', 'type' => 's', 'size' => '8', 'record' => '8', 'export' => '&OF1.31&', 'import' => '&OF1.31&', 'type_id' => 'Z900'),
        array('id' => '1155', 'description' => 'סך רשומות בקובץ', 'type' => 'n', 'size' => '15', 'record' => '8', 'export' => 'file.linecount', 'import' => 'file.linecount', 'type_id' => 'Z900'),
        array('id' => '1156', 'description' => 'נתונים עתדיים', 'type' => 's', 'size' => '50', 'record' => '8', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'Z900'),
        array('id' => '1200', 'description' => 'קוד רשימה', 'type' => 's', 'size' => '4', 'record' => '4', 'export' => 'C100', 'import' => 'C100', 'type_id' => 'C100'),
        array('id' => '1201', 'description' => 'רשומה בקובץ', 'type' => 'n', 'size' => '9', 'record' => '4', 'export' => 'file.line', 'import' => 'file.line', 'type_id' => 'C100'),
        array('id' => '1202', 'description' => 'עוסק מורשה', 'type' => 'n', 'size' => '9', 'record' => '4', 'export' => 'company.vatnum', 'import' => 'company.vatnum', 'type_id' => 'C100'),
        array('id' => '1203', 'description' => 'סוג מסמך', 'type' => 'n', 'size' => '3', 'record' => '4', 'export' => 'func.OpenfrmtType', 'import' => 'func.OpenfrmtType', 'type_id' => 'C100'),
        array('id' => '1204', 'description' => 'מספר מסמך', 'type' => 's', 'size' => '20', 'record' => '4', 'export' => 'this.docnum', 'import' => 'this.docnum', 'type_id' => 'C100'),
        array('id' => '1205', 'description' => 'תאריך הפקה', 'type' => 'date', 'size' => '8', 'record' => '4', 'export' => 'this.issue_date', 'import' => 'this.issue_date', 'type_id' => 'C100'),
        array('id' => '1206', 'description' => 'שעת הפקה', 'type' => 'hour', 'size' => '4', 'record' => '4', 'export' => 'this.issue_date', 'import' => 'this.issue_date', 'type_id' => 'C100'),
        array('id' => '1207', 'description' => 'שם לקוח/ספק', 'type' => 's', 'size' => '50', 'record' => '4', 'export' => 'this.company', 'import' => 'this.company', 'type_id' => 'C100'),
        array('id' => '1208', 'description' => 'מען רחוב', 'type' => 's', 'size' => '50', 'record' => '4', 'export' => 'this.address', 'import' => 'this.address', 'type_id' => 'C100'),
        array('id' => '1209', 'description' => 'מען מס בית', 'type' => 's', 'size' => '10', 'record' => '4', 'export' => 'this.address', 'import' => 'this.address', 'type_id' => 'C100'),
        array('id' => '1210', 'description' => 'מען עיר', 'type' => 's', 'size' => '30', 'record' => '4', 'export' => 'this.city', 'import' => 'this.city', 'type_id' => 'C100'),
        array('id' => '1211', 'description' => 'מען מיקוד', 'type' => 's', 'size' => '8', 'record' => '4', 'export' => 'this.zip', 'import' => 'this.zip', 'type_id' => 'C100'),
        array('id' => '1212', 'description' => 'מען מדינה', 'type' => 's', 'size' => '30', 'record' => '4', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'C100'),
        array('id' => '1213', 'description' => 'מען קוד מדינה', 'type' => 's', 'size' => '2', 'record' => '4', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'C100'),
        array('id' => '1214', 'description' => 'טלפון', 'type' => 's', 'size' => '15', 'record' => '4', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'C100'),
        array('id' => '1215', 'description' => 'עוסק מורשה לקוח', 'type' => 'n', 'size' => '9', 'record' => '4', 'export' => 'this.vatnum', 'import' => 'this.vatnum', 'type_id' => 'C100'),
        array('id' => '1216', 'description' => 'תאריך ערך', 'type' => 'date', 'size' => '8', 'record' => '4', 'export' => 'this.due_date', 'import' => 'this.due_date', 'type_id' => 'C100'),
        array('id' => '1217', 'description' => 'סכום סופי של המסמך במט"ח', 'type' => 'v99', 'size' => '15', 'record' => '4', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'C100'),
        array('id' => '1218', 'description' => 'קוד מטח', 'type' => 's', 'size' => '3', 'record' => '4', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'C100'),
        array('id' => '1219', 'description' => 'סכום לפני הנחה', 'type' => 'v99', 'size' => '15', 'record' => '4', 'export' => 'this.sub_total', 'import' => 'this.sub_total', 'type_id' => 'C100'),
        array('id' => '1220', 'description' => 'הנחה', 'type' => 'v99', 'size' => '15', 'record' => '4', 'export' => 'NA', 'import' => 'this.discount', 'type_id' => 'C100'),
        array('id' => '1221', 'description' => 'סכום ללא מעמ', 'type' => 'v99', 'size' => '15', 'record' => '4', 'export' => 'this.novat_total', 'import' => 'this.novat_total', 'type_id' => 'C100'),
        array('id' => '1222', 'description' => 'סכום מעמ', 'type' => 'v99', 'size' => '15', 'record' => '4', 'export' => 'this.vat', 'import' => 'this.vat', 'type_id' => 'C100'),
        array('id' => '1223', 'description' => 'סכום כולל', 'type' => 'v99', 'size' => '15', 'record' => '4', 'export' => 'this.total', 'import' => 'this.total', 'type_id' => 'C100'),
        array('id' => '1224', 'description' => 'סכום ניכוי במקור', 'type' => 'v99', 'size' => '12', 'record' => '4', 'export' => 'this.src_tax', 'import' => 'this.src_tax', 'type_id' => 'C100'),
        array('id' => '1225', 'description' => 'מספר לקוח בתוכנה', 'type' => 's', 'size' => '15', 'record' => '4', 'export' => 'this.account_id', 'import' => 'this.account_id', 'type_id' => 'C100'),
        array('id' => '1226', 'description' => 'שדה התאמה', 'type' => 's', 'size' => '10', 'record' => '4', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'C100'),
        array('id' => '1227', 'description' => '', 'type' => '', 'size' => '0', 'record' => '0', 'export' => '', 'import' => '', 'type_id' => 'C101'),
        array('id' => '1228', 'description' => 'מסמך מבוטל', 'type' => 's', 'size' => '1', 'record' => '4', 'export' => 'this.status', 'import' => 'this.status', 'type_id' => 'C100'),
        array('id' => '1229', 'description' => '', 'type' => '', 'size' => '0', 'record' => '0', 'export' => '', 'import' => '', 'type_id' => 'C101'),
        array('id' => '1230', 'description' => 'תאריך המסמך', 'type' => 'date', 'size' => '8', 'record' => '4', 'export' => 'this.issue_date', 'import' => 'this.issue_date', 'type_id' => 'C100'),
        array('id' => '1231', 'description' => 'מזהה סניף/ענף', 'type' => 's', 'size' => '7', 'record' => '4', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'C100'),
        array('id' => '1232', 'description' => '', 'type' => '', 'size' => '0', 'record' => '0', 'export' => '', 'import' => '', 'type_id' => 'C101'),
        array('id' => '1233', 'description' => 'מבצע הפעולה', 'type' => 's', 'size' => '9', 'record' => '4', 'export' => 'this.owner', 'import' => 'this.owner', 'type_id' => 'C100'),
        array('id' => '1234', 'description' => 'שדה מקשר לשורה', 'type' => 'n', 'size' => '7', 'record' => '4', 'export' => 'this.id', 'import' => 'this.id', 'type_id' => 'C100'),
        array('id' => '1235', 'description' => 'שטח לנתונים עתידיים', 'type' => 's', 'size' => '13', 'record' => '4', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'C100'),
        array('id' => '1250', 'description' => 'קוד רשומה', 'type' => 's', 'size' => '4', 'record' => '5', 'export' => 'D110', 'import' => 'D110', 'type_id' => 'D110'),
        array('id' => '1251', 'description' => 'מספר רשומה', 'type' => 'n', 'size' => '9', 'record' => '5', 'export' => 'file.line', 'import' => 'file.line', 'type_id' => 'D110'),
        array('id' => '1252', 'description' => 'עוסק מורשה', 'type' => 'n', 'size' => '9', 'record' => '5', 'export' => 'company.vatnum', 'import' => 'company.vatnum', 'type_id' => 'D110'),
        array('id' => '1253', 'description' => 'סוג מסמך', 'type' => 'n', 'size' => '3', 'record' => '5', 'export' => 'func.OpenfrmtType', 'import' => 'func.OpenfrmtType', 'type_id' => 'D110'),
        array('id' => '1254', 'description' => 'מספר המסמך', 'type' => 's', 'size' => '20', 'record' => '5', 'export' => 'func.getNum', 'import' => 'func.getNum', 'type_id' => 'D110'),
        array('id' => '1255', 'description' => 'מספר שורה במסמך', 'type' => 'n', 'size' => '4', 'record' => '5', 'export' => 'this.line', 'import' => 'this.line', 'type_id' => 'D110'),
        array('id' => '1256', 'description' => 'סוג מסמך בסיס', 'type' => 'n', 'size' => '3', 'record' => '5', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'D110'),
        array('id' => '1257', 'description' => 'מספר מסמך בסיס', 'type' => 's', 'size' => '20', 'record' => '5', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'D110'),
        array('id' => '1258', 'description' => 'סוג עסקה', 'type' => 'n', 'size' => '1', 'record' => '5', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'D110'),
        array('id' => '1259', 'description' => 'מקט פנימי', 'type' => 's', 'size' => '20', 'record' => '5', 'export' => 'this.item_id', 'import' => 'this.item_id', 'type_id' => 'D110'),
        array('id' => '1260', 'description' => 'תיאור הטובין או הפריט', 'type' => 's', 'size' => '30', 'record' => '5', 'export' => 'this.name', 'import' => 'this.name', 'type_id' => 'D110'),
        array('id' => '1261', 'description' => 'שם יצרן', 'type' => 's', 'size' => '50', 'record' => '5', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'D110'),
        array('id' => '1262', 'description' => 'מספר סידורי של היצרן', 'type' => 's', 'size' => '30', 'record' => '5', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'D110'),
        array('id' => '1263', 'description' => 'תיאור יחידת מידה', 'type' => 's', 'size' => '20', 'record' => '5', 'export' => 'this.unit_id', 'import' => 'this.unit_id', 'type_id' => 'D110'),
        array('id' => '1264', 'description' => 'הכמות', 'type' => 'v9999', 'size' => '17', 'record' => '5', 'export' => 'this.qty', 'import' => 'this.qty', 'type_id' => 'D110'),
        array('id' => '1265', 'description' => 'מחיר ליחידה ללא מעמ', 'type' => 'v99', 'size' => '15', 'record' => '5', 'export' => 'this.iItem', 'import' => 'this.iItem', 'type_id' => 'D110'),
        array('id' => '1266', 'description' => 'הנחת שורה', 'type' => 'v99', 'size' => '15', 'record' => '5', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'D110'),
        array('id' => '1267', 'description' => 'סך סכום לשורה', 'type' => 'v99', 'size' => '15', 'record' => '5', 'export' => 'this.iTotal', 'import' => 'this.iTotal', 'type_id' => 'D110'),
        array('id' => '1268', 'description' => 'שיעור המעמ בשורה', 'type' => 'n', 'size' => '4', 'record' => '5', 'export' => 'this.iVatRate', 'import' => 'this.iVatRate', 'type_id' => 'D110'),
        array('id' => '1269', 'description' => '', 'type' => '', 'size' => '0', 'record' => '0', 'export' => '', 'import' => '', 'type_id' => 'D111'),
        array('id' => '1270', 'description' => 'מזהה סניף/ענף', 'type' => 's', 'size' => '7', 'record' => '5', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'D110'),
        array('id' => '1271', 'description' => '', 'type' => '', 'size' => '0', 'record' => '0', 'export' => '', 'import' => '', 'type_id' => 'D111'),
        array('id' => '1272', 'description' => 'תאריך המסמך', 'type' => 'date', 'size' => '8', 'record' => '5', 'export' => 'func.getDate', 'import' => 'func.getDate', 'type_id' => 'D110'),
        array('id' => '1273', 'description' => 'שדה מקושר לכותרת', 'type' => 'n', 'size' => '7', 'record' => '5', 'export' => 'this.doc_id', 'import' => 'this.doc_id', 'type_id' => 'D110'),
        array('id' => '1274', 'description' => 'מזהה סניף/ענף למסמך בסיס', 'type' => 's', 'size' => '7', 'record' => '5', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'D110'),
        array('id' => '1275', 'description' => 'נתונים עתידיים', 'type' => 's', 'size' => '21', 'record' => '5', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'D110'),
        array('id' => '1300', 'description' => 'קוד רשומה', 'type' => 's', 'size' => '4', 'record' => '6', 'export' => 'D120', 'import' => 'D120', 'type_id' => 'D120'),
        array('id' => '1301', 'description' => 'מספר רשומה', 'type' => 'n', 'size' => '9', 'record' => '6', 'export' => 'file.line', 'import' => 'file.line', 'type_id' => 'D120'),
        array('id' => '1302', 'description' => 'עוסק מורשה', 'type' => 'n', 'size' => '9', 'record' => '6', 'export' => 'company.vatnum', 'import' => 'company.vatnum', 'type_id' => 'D120'),
        array('id' => '1303', 'description' => 'סוג מסמך', 'type' => 'n', 'size' => '3', 'record' => '6', 'export' => 'func.OpenfrmtType', 'import' => 'func.OpenfrmtType', 'type_id' => 'D120'),
        array('id' => '1304', 'description' => 'מספר מסמך', 'type' => 's', 'size' => '20', 'record' => '6', 'export' => 'func.getNum', 'import' => 'func.getNum', 'type_id' => 'D120'),
        array('id' => '1305', 'description' => 'מספר שורה במסמך', 'type' => 'n', 'size' => '4', 'record' => '6', 'export' => 'this.line', 'import' => 'this.line', 'type_id' => 'D120'),
        array('id' => '1306', 'description' => 'סוג אמצעי תשלום', 'type' => 'n', 'size' => '1', 'record' => '6', 'export' => 'this.type', 'import' => 'this.type', 'type_id' => 'D120'),
        array('id' => '1307', 'description' => 'מספר בנק', 'type' => 'n', 'size' => '10', 'record' => '6', 'export' => 'this.bank', 'import' => 'this.bank', 'type_id' => 'D120'),
        array('id' => '1308', 'description' => 'מספר סניף', 'type' => 'n', 'size' => '10', 'record' => '6', 'export' => 'this.branch', 'import' => 'this.branch', 'type_id' => 'D120'),
        array('id' => '1309', 'description' => 'מספר חשבון', 'type' => 'n', 'size' => '15', 'record' => '6', 'export' => 'this.cheque_acct', 'import' => 'this.cheque_acct', 'type_id' => 'D120'),
        array('id' => '1310', 'description' => 'מספר המחאה', 'type' => 'n', 'size' => '10', 'record' => '6', 'export' => 'this.cheque_num', 'import' => 'this.cheque_num', 'type_id' => 'D120'),
        array('id' => '1311', 'description' => 'תאריך פרעון', 'type' => 'date', 'size' => '8', 'record' => '6', 'export' => 'NA', 'import' => 'this.cheque_date', 'type_id' => 'D120'),
        array('id' => '1312', 'description' => 'סכום השורה', 'type' => 'v99', 'size' => '15', 'record' => '6', 'export' => 'this.sum', 'import' => 'this.sum', 'type_id' => 'D120'),
        array('id' => '1313', 'description' => 'קוד החברה הסולקת', 'type' => 'n', 'size' => '1', 'record' => '6', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'D120'),
        array('id' => '1314', 'description' => 'שם הכרטיס הנסלק', 'type' => 's', 'size' => '20', 'record' => '6', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'D120'),
        array('id' => '1315', 'description' => 'סוג עסקת אשראי', 'type' => 'n', 'size' => '1', 'record' => '6', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'D120'),
        array('id' => '1316', 'description' => '', 'type' => '', 'size' => '0', 'record' => '0', 'export' => '', 'import' => '', 'type_id' => 'D121'),
        array('id' => '1317', 'description' => '', 'type' => '', 'size' => '0', 'record' => '0', 'export' => '', 'import' => '', 'type_id' => 'D121'),
        array('id' => '1318', 'description' => '', 'type' => '', 'size' => '0', 'record' => '0', 'export' => '', 'import' => '', 'type_id' => 'D121'),
        array('id' => '1319', 'description' => '', 'type' => '', 'size' => '0', 'record' => '0', 'export' => '', 'import' => '', 'type_id' => 'D121'),
        array('id' => '1320', 'description' => 'מזהה סניף/ענף', 'type' => 's', 'size' => '7', 'record' => '6', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'D120'),
        array('id' => '1321', 'description' => '', 'type' => '', 'size' => '0', 'record' => '0', 'export' => '', 'import' => '', 'type_id' => 'D121'),
        array('id' => '1322', 'description' => 'תאריך מסמך', 'type' => 'date', 'size' => '8', 'record' => '6', 'export' => 'func.getDate', 'import' => 'this.cheque_date', 'type_id' => 'D120'),
        array('id' => '1323', 'description' => 'שדה מקשר לכותרת', 'type' => 'n', 'size' => '7', 'record' => '6', 'export' => 'this.doc_id', 'import' => 'this.doc_id', 'type_id' => 'D120'),
        array('id' => '1324', 'description' => 'נתונים עתידיים', 'type' => 's', 'size' => '60', 'record' => '6', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'D120'),
        array('id' => '1350', 'description' => 'קוד רשומה', 'type' => 's', 'size' => '4', 'record' => '2', 'export' => 'B100', 'import' => 'B100', 'type_id' => 'B100'),
        array('id' => '1351', 'description' => 'מספר רשומה', 'type' => 'n', 'size' => '9', 'record' => '2', 'export' => 'file.line', 'import' => 'file.line', 'type_id' => 'B100'),
        array('id' => '1352', 'description' => 'עוסק מורשה', 'type' => 'n', 'size' => '9', 'record' => '2', 'export' => 'company.vatnum', 'import' => 'company.vatnum', 'type_id' => 'B100'),
        array('id' => '1353', 'description' => 'מספר תנועה', 'type' => 'n', 'size' => '10', 'record' => '2', 'export' => 'this.num', 'import' => 'this.num', 'type_id' => 'B100'),
        array('id' => '1354', 'description' => 'מספר שורה בתנועה', 'type' => 'n', 'size' => '5', 'record' => '2', 'export' => 'this.linenum', 'import' => 'this.linenum', 'type_id' => 'B100'),
        array('id' => '1355', 'description' => 'מנה', 'type' => 'n', 'size' => '8', 'record' => '2', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'B100'),
        array('id' => '1356', 'description' => 'סוג תנועה', 'type' => 's', 'size' => '15', 'record' => '2', 'export' => 'this.type', 'import' => 'this.type', 'type_id' => 'B100'),
        array('id' => '1357', 'description' => 'אסמכתא', 'type' => 's', 'size' => '20', 'record' => '2', 'export' => 'this.refnum1', 'import' => 'this.refnum1', 'type_id' => 'B100'),
        array('id' => '1358', 'description' => 'סוג מסמך אסמכתא', 'type' => 'n', 'size' => '3', 'record' => '2', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'B100'),
        array('id' => '1359', 'description' => 'אסמכתא 2', 'type' => 's', 'size' => '20', 'record' => '2', 'export' => 'this.refnum2', 'import' => 'this.refnum2', 'type_id' => 'B100'),
        array('id' => '1360', 'description' => 'סוג מסמך אסמכתא 2', 'type' => 'n', 'size' => '3', 'record' => '2', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'B100'),
        array('id' => '1361', 'description' => 'פרטים', 'type' => 's', 'size' => '50', 'record' => '2', 'export' => 'this.details', 'import' => 'this.details', 'type_id' => 'B100'),
        array('id' => '1362', 'description' => 'תאריך', 'type' => 'date', 'size' => '8', 'record' => '2', 'export' => 'this.reg_date', 'import' => 'this.reg_date', 'type_id' => 'B100'),
        array('id' => '1363', 'description' => 'תאריך ערך', 'type' => 'date', 'size' => '8', 'record' => '2', 'export' => 'this.valuedate', 'import' => 'this.valuedate', 'type_id' => 'B100'),
        array('id' => '1364', 'description' => 'חשבון בתנועה', 'type' => 's', 'size' => '15', 'record' => '2', 'export' => 'this.account_id', 'import' => 'this.account_id', 'type_id' => 'B100'),
        array('id' => '1365', 'description' => 'חשבון נגדי', 'type' => 's', 'size' => '15', 'record' => '2', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'B100'),
        array('id' => '1366', 'description' => 'סימן הפועלה', 'type' => 'n', 'size' => '1', 'record' => '2', 'export' => 'func.opefrmtMrk', 'import' => 'func.opefrmtMrk', 'type_id' => 'B100'),
        array('id' => '1367', 'description' => 'קוד מטבע מטח', 'type' => 's', 'size' => '3', 'record' => '2', 'export' => 'this.currency_id', 'import' => 'this.currency_id', 'type_id' => 'B100'),
        array('id' => '1368', 'description' => 'סכום הפעולה', 'type' => 'v99', 'size' => '15', 'record' => '2', 'export' => 'this.leadsum', 'import' => 'this.leadsum', 'type_id' => 'B100'),
        array('id' => '1369', 'description' => 'סכום מטח', 'type' => 'v99', 'size' => '15', 'record' => '2', 'export' => 'this.sum', 'import' => 'this.sum', 'type_id' => 'B100'),
        array('id' => '1370', 'description' => 'שדה כמות', 'type' => 'v99', 'size' => '12', 'record' => '2', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'B100'),
        array('id' => '1371', 'description' => 'שדה התאמה 1', 'type' => 's', 'size' => '10', 'record' => '2', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'B100'),
        array('id' => '1372', 'description' => 'שדה התאמה 2', 'type' => 's', 'size' => '10', 'record' => '2', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'B100'),
        array('id' => '1373', 'description' => '', 'type' => '', 'size' => '0', 'record' => '0', 'export' => '', 'import' => '', 'type_id' => 'B101'),
        array('id' => '1374', 'description' => 'מזהה סניף/ענף', 'type' => 's', 'size' => '7', 'record' => '2', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'B100'),
        array('id' => '1375', 'description' => 'תאריך הזנה', 'type' => 'date', 'size' => '8', 'record' => '2', 'export' => 'this.reg_date', 'import' => 'this.reg_date', 'type_id' => 'B100'),
        array('id' => '1376', 'description' => 'מבצע פעולה', 'type' => 's', 'size' => '9', 'record' => '2', 'export' => 'this.owner_id', 'import' => 'this.owner_id', 'type_id' => 'B100'),
        array('id' => '1377', 'description' => 'נתונים עתידיים', 'type' => 's', 'size' => '25', 'record' => '2', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'B100'),
        array('id' => '1400', 'description' => 'קוד רשומה', 'type' => 's', 'size' => '4', 'record' => '3', 'export' => 'B110', 'import' => 'B110', 'type_id' => 'B110'),
        array('id' => '1401', 'description' => 'מספר רשומה', 'type' => 'n', 'size' => '9', 'record' => '3', 'export' => 'file.line', 'import' => 'file.line', 'type_id' => 'B110'),
        array('id' => '1402', 'description' => 'עוסק מורשה', 'type' => 'n', 'size' => '9', 'record' => '3', 'export' => 'company.vatnum', 'import' => 'company.vatnum', 'type_id' => 'B110'),
        array('id' => '1403', 'description' => 'מפתח החשבון', 'type' => 's', 'size' => '15', 'record' => '3', 'export' => 'this.id', 'import' => 'this.id', 'type_id' => 'B110'),
        array('id' => '1404', 'description' => 'שם חשבון', 'type' => 's', 'size' => '50', 'record' => '3', 'export' => 'this.name', 'import' => 'this.name', 'type_id' => 'B110'),
        array('id' => '1405', 'description' => 'קוד מאזן בוחן', 'type' => 's', 'size' => '15', 'record' => '3', 'export' => 'this.type', 'import' => 'this.type', 'type_id' => 'B110'),
        array('id' => '1406', 'description' => 'תיאור קוד מאזן בוחן', 'type' => 's', 'size' => '30', 'record' => '3', 'export' => 'func.getType', 'import' => 'typedesc', 'type_id' => 'B110'),
        array('id' => '1407', 'description' => 'מען רחוב', 'type' => 's', 'size' => '30', 'record' => '3', 'export' => 'this.address', 'import' => 'this.address', 'type_id' => 'B110'),
        array('id' => '1408', 'description' => 'מען מספר בית', 'type' => 's', 'size' => '50', 'record' => '3', 'export' => 'this.address', 'import' => 'this.address', 'type_id' => 'B110'),
        array('id' => '1409', 'description' => 'מען עיר', 'type' => 's', 'size' => '10', 'record' => '3', 'export' => 'this.city', 'import' => 'this.city', 'type_id' => 'B110'),
        array('id' => '1410', 'description' => 'מען מיקוד', 'type' => 's', 'size' => '8', 'record' => '3', 'export' => 'this.zip', 'import' => 'this.zip', 'type_id' => 'B110'),
        array('id' => '1411', 'description' => 'מען מדינה', 'type' => 's', 'size' => '30', 'record' => '3', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'B110'),
        array('id' => '1412', 'description' => 'קוד מדינה', 'type' => 's', 'size' => '2', 'record' => '3', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'B110'),
        array('id' => '1413', 'description' => 'חשבון מרכז', 'type' => 's', 'size' => '15', 'record' => '3', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'B110'),
        array('id' => '1414', 'description' => 'יתרת חשבון בתחילת החתך', 'type' => 'v99', 'size' => '15', 'record' => '3', 'export' => 'limit.getBalance', 'import' => 'limit.getBalance', 'type_id' => 'B110'),
        array('id' => '1415', 'description' => 'סהכ חובה', 'type' => 'v99', 'size' => '15', 'record' => '3', 'export' => 'limit.getPos', 'import' => 'limit.getPos', 'type_id' => 'B110'),
        array('id' => '1416', 'description' => 'סהכ זכות', 'type' => 'v99', 'size' => '15', 'record' => '3', 'export' => 'limit.getNeg', 'import' => 'limit.getNeg', 'type_id' => 'B110'),
        array('id' => '1417', 'description' => 'קוד בסיווג חשבונאי', 'type' => 'n', 'size' => '4', 'record' => '3', 'export' => 'this.id6111', 'import' => 'this.id6111', 'type_id' => 'B110'),
        array('id' => '1418', 'description' => '', 'type' => '', 'size' => '0', 'record' => '0', 'export' => '', 'import' => '', 'type_id' => 'B111'),
        array('id' => '1419', 'description' => 'מספר עוסק לקוח', 'type' => 'n', 'size' => '9', 'record' => '3', 'export' => 'this.vatnum', 'import' => 'this.vatnum', 'type_id' => 'B110'),
        array('id' => '1420', 'description' => '', 'type' => '', 'size' => '0', 'record' => '0', 'export' => '', 'import' => '', 'type_id' => 'B111'),
        array('id' => '1421', 'description' => 'מזהה סניף/ענף', 'type' => 's', 'size' => '7', 'record' => '3', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'B110'),
        array('id' => '1422', 'description' => 'יתרת חשבון בתחילת חתך במטח', 'type' => 'v99', 'size' => '15', 'record' => '3', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'B110'),
        array('id' => '1423', 'description' => 'קוד מטבע יתרת חשבון במטח', 'type' => 's', 'size' => '3', 'record' => '3', 'export' => 'NA', 'import' => 'this.currency_id', 'type_id' => 'B110'),
        array('id' => '1424', 'description' => 'שטח לנתונים עתדיים', 'type' => 's', 'size' => '16', 'record' => '3', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'B110'),
        array('id' => '1450', 'description' => 'קוד רשומה', 'type' => 's', 'size' => '4', 'record' => '7', 'export' => 'M100', 'import' => 'M100', 'type_id' => 'M100'),
        array('id' => '1451', 'description' => 'רשומה בקובץ', 'type' => 'n', 'size' => '9', 'record' => '7', 'export' => 'file.line', 'import' => 'file.line', 'type_id' => 'M100'),
        array('id' => '1452', 'description' => 'עוסק מורשה', 'type' => 'n', 'size' => '9', 'record' => '7', 'export' => 'company.vatnum', 'import' => 'company.vatnum', 'type_id' => 'M100'),
        array('id' => '1453', 'description' => 'מקט פריט', 'type' => 's', 'size' => '20', 'record' => '7', 'export' => 'this.id', 'import' => 'this.id', 'type_id' => 'M100'),
        array('id' => '1454', 'description' => 'מקט ספק יצרן', 'type' => 's', 'size' => '20', 'record' => '7', 'export' => 'this.extcatnum', 'import' => 'this.extcatnum', 'type_id' => 'M100'),
        array('id' => '1455', 'description' => 'מקט פנימי', 'type' => 's', 'size' => '20', 'record' => '7', 'export' => 'this.id', 'import' => 'this.id', 'type_id' => 'M100'),
        array('id' => '1456', 'description' => 'שם פריט', 'type' => 's', 'size' => '50', 'record' => '7', 'export' => 'this.name', 'import' => 'this.name', 'type_id' => 'M100'),
        array('id' => '1457', 'description' => 'קוד מיון', 'type' => 's', 'size' => '10', 'record' => '7', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'M100'),
        array('id' => '1458', 'description' => 'תיאור קוד מיון', 'type' => 's', 'size' => '30', 'record' => '7', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'M100'),
        array('id' => '1459', 'description' => 'תיאור יחידת מידה', 'type' => 's', 'size' => '20', 'record' => '7', 'export' => 'this.unit_id', 'import' => 'this.unit_id', 'type_id' => 'M100'),
        array('id' => '1460', 'description' => 'יתרת פריטת לתחילת חתך', 'type' => 'v99', 'size' => '12', 'record' => '7', 'export' => 'ammount', 'import' => 'ammount', 'type_id' => 'M100'),
        array('id' => '1461', 'description' => 'סך הכל כניסות', 'type' => 'v99', 'size' => '12', 'record' => '7', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'M100'),
        array('id' => '1462', 'description' => 'סך הכל יציאות', 'type' => 'v99', 'size' => '12', 'record' => '7', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'M100'),
        array('id' => '1463', 'description' => '', 'type' => '99', 'size' => '10', 'record' => '7', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'M100'),
        array('id' => '1464', 'description' => '', 'type' => '99', 'size' => '10', 'record' => '7', 'export' => 'this.saleprice', 'import' => 'this.saleprice', 'type_id' => 'M100'),
        array('id' => '1465', 'description' => 'נתונים עתדיים', 'type' => 's', 'size' => '50', 'record' => '7', 'export' => 'NA', 'import' => 'NA', 'type_id' => 'M100')
    );
    public $menu = array(
        array('id' => '1', 'name' => 'Settings', 'route' => NULL, 'icon' => 'glyphicon glyphicon-cog', 'parent' => '80', 'order' => '0'),
        array('id' => '2', 'name' => 'Business Details', 'route' => 'settings/admin', 'icon' => NULL, 'parent' => '1', 'order' => '0'),
        array('id' => '3', 'name' => 'Manual Journal Voucher', 'route' => 'transaction/create', 'icon' => NULL, 'parent' => '32', 'order' => '0'),
        array('id' => '4', 'name' => 'Business Docs', 'route' => 'doctype/admin', 'icon' => NULL, 'parent' => '1', 'order' => '0'),
        array('id' => '5', 'name' => 'Custom Fields', 'route' => 'eavfields/admin', 'icon' => NULL, 'parent' => '1', 'order' => '0'),
        array('id' => '6', 'name' => 'Currency Rates', 'route' => 'currates/admin', 'icon' => NULL, 'parent' => '1', 'order' => '0'),
        array('id' => '7', 'name' => 'Opening Balances', 'route' => 'transaction/openbalance', 'icon' => NULL, 'parent' => '1', 'order' => '0'),
        array('id' => '8', 'name' => 'Contact Item', 'route' => 'rm/admin', 'icon' => NULL, 'parent' => '12', 'order' => '0'),
        array('id' => '9', 'name' => 'Tax Category For Items', 'route' => 'itemvatcat/admin', 'icon' => NULL, 'parent' => '1', 'order' => '0'),
        array('id' => '10', 'name' => 'Manage Users', 'route' => 'users/admin', 'icon' => NULL, 'parent' => '1', 'order' => '0'),
        array('id' => '11', 'name' => 'Manage Groups', 'route' => 'admin/role', 'icon' => '', 'parent' => '1', 'order' => '20'),
        array('id' => '12', 'name' => 'Manage Accounts', 'route' => NULL, 'icon' => 'glyphicon glyphicon-folder-open', 'parent' => '80', 'order' => '0'),
        array('id' => '13', 'name' => 'Accounts', 'route' => 'accounts/admin', 'icon' => NULL, 'parent' => '12', 'order' => '0'),
        array('id' => '16', 'name' => 'Stock', 'route' => NULL, 'icon' => 'glyphicon glyphicon-tag', 'parent' => '0', 'order' => '7'),
        array('id' => '17', 'name' => 'Items', 'route' => 'item/admin', 'icon' => NULL, 'parent' => '16', 'order' => '0'),
        array('id' => '18', 'name' => 'Werehouses', 'route' => 'accounts/admin/8', 'icon' => NULL, 'parent' => '16', 'order' => '0'),
        array('id' => '19', 'name' => 'Categories', 'route' => 'itemcategory/admin', 'icon' => NULL, 'parent' => '16', 'order' => '0'),
        array('id' => '20', 'name' => 'Units', 'route' => 'itemunit/admin', 'icon' => NULL, 'parent' => '16', 'order' => '0'),
        
        array('id' => '22', 'name' => 'Income', 'route' => NULL, 'icon' => 'glyphicon glyphicon-thumbs-up', 'parent' => '0', 'order' => '2'),
        array('id' => '23', 'name' => 'Quote', 'route' => 'docs/create/6', 'icon' => NULL, 'parent' => '22', 'order' => '0'),
        array('id' => '24', 'name' => 'Sales Order', 'route' => 'docs/create/7', 'icon' => NULL, 'parent' => '22', 'order' => '0'),
        array('id' => '25', 'name' => 'Delivery Doc', 'route' => 'docs/create/2', 'icon' => NULL, 'parent' => '22', 'order' => '0'),
        array('id' => '26', 'name' => 'Proforma', 'route' => 'docs/create/1', 'icon' => NULL, 'parent' => '22', 'order' => '0'),
        array('id' => '27', 'name' => 'Invoice', 'route' => 'docs/create/3', 'icon' => NULL, 'parent' => '22', 'order' => '0'),
        array('id' => '28', 'name' => 'Invoice Receipt', 'route' => 'docs/create/9', 'icon' => NULL, 'parent' => '22', 'order' => '0'),
        array('id' => '29', 'name' => 'Return Doc.', 'route' => 'docs/create/5', 'icon' => NULL, 'parent' => '22', 'order' => '0'),
        array('id' => '30', 'name' => 'Credit Inv.', 'route' => 'docs/create/4', 'icon' => NULL, 'parent' => '22', 'order' => '0'),
        array('id' => '31', 'name' => 'Print Docs.', 'route' => 'docs/admin', 'icon' => NULL, 'parent' => '22', 'order' => '0'),
        array('id' => '32', 'name' => 'Expense', 'route' => NULL, 'icon' => 'glyphicon glyphicon-shopping-cart', 'parent' => '0', 'order' => '3'),
        array('id' => '33', 'name' => 'Manage Suppliers', 'route' => 'accounts/admin/1', 'icon' => NULL, 'parent' => '32', 'order' => '0'),
        array('id' => '34', 'name' => 'Purchase Order', 'route' => 'docs/create/10', 'icon' => NULL, 'parent' => '16', 'order' => '0'),
        array('id' => '35', 'name' => 'Insert Business Expense', 'route' => 'docs/create/13', 'icon' => NULL, 'parent' => '32', 'order' => '0'),
        array('id' => '36', 'name' => 'Insert Assets Expense', 'route' => 'docs/create/14', 'icon' => NULL, 'parent' => '32', 'order' => '0'),
        array('id' => '37', 'name' => 'Cash Register', 'route' => NULL, 'icon' => 'glyphicon glyphicon-usd', 'parent' => '0', 'order' => '4'),
        array('id' => '38', 'name' => 'Receipt', 'route' => 'docs/create/8', 'icon' => NULL, 'parent' => '37', 'order' => '0'),
        array('id' => '39', 'name' => 'Bank Deposits', 'route' => 'deposit/admin', 'icon' => NULL, 'parent' => '37', 'order' => '0'),
        array('id' => '40', 'name' => 'Supplier Payment', 'route' => 'outcome/create', 'icon' => NULL, 'parent' => '37', 'order' => '0'),
        array('id' => '41', 'name' => 'VAT payment', 'route' => 'outcome/create/1', 'icon' => NULL, 'parent' => '37', 'order' => '0'),
        array('id' => '42', 'name' => 'Nat. Ins. payment', 'route' => 'outcome/create/2', 'icon' => NULL, 'parent' => '37', 'order' => '0'),
        array('id' => '43', 'name' => 'Reconciliations', 'route' => NULL, 'icon' => 'glyphicon glyphicon-eye-open', 'parent' => '0', 'order' => '5'),
        array('id' => '44', 'name' => 'Bank Sheet Import', 'route' => 'bankbook/admin', 'icon' => NULL, 'parent' => '43', 'order' => '0'),
        array('id' => '45', 'name' => 'Bank Recon.', 'route' => 'bankbook/extmatch', 'icon' => NULL, 'parent' => '43', 'order' => '0'),
        array('id' => '46', 'name' => 'Show Bank Recon', 'route' => 'bankbook/edispmatch', 'icon' => NULL, 'parent' => '43', 'order' => '0'),
        array('id' => '47', 'name' => 'Accounts Recon.', 'route' => 'match/intmatch', 'icon' => NULL, 'parent' => '43', 'order' => '0'),
        array('id' => '48', 'name' => 'Display Recon.', 'route' => 'match/dispmatch', 'icon' => NULL, 'parent' => '43', 'order' => '0'),
        array('id' => '49', 'name' => 'Reports', 'route' => NULL, 'icon' => 'glyphicon glyphicon-stats', 'parent' => '0', 'order' => '6'),
        array('id' => '50', 'name' => 'Display Transactions', 'route' => 'reports/journal', 'icon' => NULL, 'parent' => '49', 'order' => '0'),
        array('id' => '51', 'name' => 'Customers Debits', 'route' => 'reports/owe', 'icon' => NULL, 'parent' => '49', 'order' => '0'),
        array('id' => '52', 'name' => 'Profit And Loss', 'route' => 'reports/profloss', 'icon' => NULL, 'parent' => '49', 'order' => '0'),
        array('id' => '53', 'name' => 'Monthly Prof. And Loss', 'route' => 'reports/mprofloss', 'icon' => NULL, 'parent' => '49', 'order' => '0'),
        array('id' => '54', 'name' => 'VAT Calculation', 'route' => 'reports/vat', 'icon' => NULL, 'parent' => '49', 'order' => '0'),
        array('id' => '55', 'name' => 'Balance', 'route' => 'reports/balance', 'icon' => NULL, 'parent' => '49', 'order' => '0'),
        array('id' => '56', 'name' => 'In Advance Income Tax Pay', 'route' => 'reports/taxrep', 'icon' => NULL, 'parent' => '49', 'order' => '0'),
        array('id' => '57', 'name' => 'Import Export', 'route' => NULL, 'icon' => 'glyphicon glyphicon-transfer', 'parent' => '80', 'order' => '0'),
        array('id' => '58', 'name' => 'Open Format File', 'route' => 'data/openfrmt', 'icon' => NULL, 'parent' => '57', 'order' => '0'),
        array('id' => '59', 'name' => 'Import Open Format', 'route' => 'data/openfrmtimport', 'icon' => NULL, 'parent' => '57', 'order' => '0'),
        array('id' => '60', 'name' => 'General Backup', 'route' => 'data/backup', 'icon' => NULL, 'parent' => '57', 'order' => '0'),
        array('id' => '61', 'name' => 'Restore From Backup', 'route' => 'data/restore', 'icon' => NULL, 'parent' => '57', 'order' => '0'),
        array('id' => '62', 'name' => 'PCN874 Report', 'route' => 'data/pcn874', 'icon' => NULL, 'parent' => '57', 'order' => '0'),
        array('id' => '63', 'name' => 'Support', 'route' => NULL, 'icon' => 'glyphicon glyphicon-info-sign', 'parent' => '80', 'order' => '0'),
        array('id' => '64', 'name' => 'Update', 'route' => 'newupdate/', 'icon' => NULL, 'parent' => '63', 'order' => '0'),
        array('id' => '65', 'name' => 'Paid Support', 'route' => 'site/support', 'icon' => NULL, 'parent' => '63', 'order' => '0'),
        array('id' => '66', 'name' => 'About', 'route' => 'site/about', 'icon' => NULL, 'parent' => '63', 'order' => '0'),
        array('id' => '67', 'name' => 'Bug Report', 'route' => 'site/bug', 'icon' => NULL, 'parent' => '63', 'order' => '0'),
        array('id' => '68', 'name' => 'Warehouse Transaction', 'route' => 'docs/create/15', 'icon' => NULL, 'parent' => '16', 'order' => '0'),
        array('id' => '69', 'name' => 'Manage Roles', 'route' => 'admin/route', 'icon' => '', 'parent' => '1', 'order' => '30'),
        array('id' => '70', 'name' => 'Stock Transaction', 'route' => 'reports/stockaction', 'icon' => '', 'parent' => '49', 'order' => '0'),
        array('id' => '71', 'name' => 'Id6111 Admin', 'route' => 'accid6111/admin', 'icon' => NULL, 'parent' => '1', 'order' => '40'),
        array('id' => '72', 'name' => 'Mail Template', 'route' => 'mailtemplate/admin', 'icon' => NULL, 'parent' => '1', 'order' => '50'),
        array('id' => '73', 'name' => 'Stock', 'route' => 'reports/stock', 'icon' => NULL, 'parent' => '49', 'order' => '0'),
        array('id' => '74', 'name' => 'Linet 2 Import', 'route' => 'data/linet2import', 'icon' => NULL, 'parent' => '57', 'order' => '0'),
        array('id' => '75', 'name' => 'Bulk Balance', 'route' => 'reports/accounts', 'icon' => NULL, 'parent' => '49', 'order' => '0'),
        array('id' => '76', 'name' => 'Account Categories', 'route' => 'acccat/admin', 'icon' => NULL, 'parent' => '12', 'order' => '0'),
        array('id' => '77', 'name' => 'Payment Admin', 'route' => 'payment/admin', 'icon' => NULL, 'parent' => '1', 'order' => '60'),
        array('id' => '78', 'name' => 'Stock entry certificate', 'route' => 'docs/create/16', 'icon' => NULL, 'parent' => '16', 'order' => '0'),
        array('id' => '79', 'name' => 'Stock exit certificate', 'route' => 'docs/create/17', 'icon' => NULL, 'parent' => '16', 'order' => '0'),
        array('id' => '80', 'name' => 'General', 'route' => NULL, 'icon' => 'glyphicon glyphicon-flag', 'parent' => '0', 'order' => '1'),
        array('id' => '81', 'name' => 'Manage Customers', 'route' => 'accounts/admin/0', 'icon' => NULL, 'parent' => '22', 'order' => '-1'),
        array('id' => '82', 'name' => 'Manage Assignments', 'route' => 'admin/assignment', 'icon' => NULL, 'parent' => '1', 'order' => '19'),
        array('id' => '83', 'name' => 'Receipt For Donation', 'route' => 'docs/create/18', 'icon' => NULL, 'parent' => '37', 'order' => '0')
    );
    private $auth_assignment = array(
        array('item_name' => 'authenticated', 'user_id' => '1', 'created_at' => '1427731054'),
        array('item_name' => 'authenticated', 'user_id' => '2', 'created_at' => '1427730633'),
        array('item_name' => 'sysadmin', 'user_id' => '1', 'created_at' => NULL)
    );
    private $auth_item = array(
        array('name' => '/*', 'type' => '2', 'description' => NULL, 'rule_name' => NULL, 'data' => NULL, 'created_at' => NULL, 'updated_at' => NULL),
        array('name' => '/admin/*', 'type' => '2', 'description' => NULL, 'rule_name' => NULL, 'data' => NULL, 'created_at' => NULL, 'updated_at' => NULL),
        array('name' => '/api/*', 'type' => '2', 'description' => NULL, 'rule_name' => NULL, 'data' => NULL, 'created_at' => NULL, 'updated_at' => NULL),
        array('name' => '/company/index', 'type' => '2', 'description' => NULL, 'rule_name' => NULL, 'data' => NULL, 'created_at' => NULL, 'updated_at' => NULL),
        array('name' => '/site/download', 'type' => '2', 'description' => NULL, 'rule_name' => NULL, 'data' => NULL, 'created_at' => NULL, 'updated_at' => NULL),
        array('name' => '/site/logout', 'type' => '2', 'description' => NULL, 'rule_name' => NULL, 'data' => NULL, 'created_at' => NULL, 'updated_at' => NULL),
        array('name' => 'authenticated', 'type' => '1', 'description' => 'authenticated', 'rule_name' => NULL, 'data' => NULL, 'created_at' => NULL, 'updated_at' => NULL),
        array('name' => 'guest', 'type' => '1', 'description' => 'guest', 'rule_name' => NULL, 'data' => NULL, 'created_at' => NULL, 'updated_at' => NULL),
        array('name' => 'sysadmin', 'type' => '1', 'description' => 'fff', 'rule_name' => NULL, 'data' => NULL, 'created_at' => NULL, 'updated_at' => NULL)
    );
    private $auth_item_child = array(
        array('parent' => 'sysadmin', 'child' => '/*'),
        array('parent' => 'sysadmin', 'child' => '/admin/*'),
        array('parent' => 'guest', 'child' => '/api/*'),
        array('parent' => 'authenticated', 'child' => '/company/index'),
        array('parent' => 'guest', 'child' => '/site/download'),
        array('parent' => 'authenticated', 'child' => '/site/logout'),
        array('parent' => 'guest', 'child' => '/site/logout')
    );

    public function up() {
        echo "holly";
        

        $this->truncateTable("menu");
        $this->truncateTable("openformat");

        if (dbMaster::tableExists("AuthAssignment")) {
            $this->dropTable("AuthAssignment");
            $this->dropTable("Rights");
            $this->dropTable("AuthItem");
            $this->dropTable("AuthItemChild");

            
        }
        
        $table = Yii::$app->db->schema->getTableSchema('menu');
        if(!isset($table->columns['order'])) {
            $this->renameColumn("menu", "sort", "order");
            $this->renameColumn("menu", "url", "route");
            $this->renameColumn("menu", "label", "name");
        }
        $this->batchInsert("openformat", ['id', 'description', 'type', 'size', 'record', 'export', 'import', 'type_id'], $this->openformat);
        $this->batchInsert("menu", ['id', 'name', 'route', 'icon', 'parent', 'order'], $this->menu);


        //create authassiment,x,u
        if (!dbMaster::tableExists("auth_assignment")) {
            $this->createTable('auth_assignment', [
                'item_name' => Schema::TYPE_STRING . ' NOT NULL',
                'user_id' => Schema::TYPE_STRING . ' NOT NULL',
                'created_at' => Schema::TYPE_INTEGER,
            ]);

            $this->createTable('auth_item', [
                'name' => Schema::TYPE_STRING . ' NOT NULL',
                'type' => Schema::TYPE_INTEGER,
                'description' => Schema::TYPE_TEXT,
                'rule_name' => Schema::TYPE_STRING,
                'data' => Schema::TYPE_TEXT,
                'created_at' => Schema::TYPE_INTEGER,
                'updated_at' => Schema::TYPE_INTEGER,
            ]);

            $this->createTable('auth_item_child', [
                'parent' => Schema::TYPE_STRING . ' NOT NULL',
                'child' => Schema::TYPE_STRING . ' NOT NULL',
            ]);

            $this->createTable('auth_rule', [
                'parent' => Schema::TYPE_STRING . ' NOT NULL',
                'child' => Schema::TYPE_TEXT,
                'created_at' => Schema::TYPE_INTEGER,
                'updated_at' => Schema::TYPE_INTEGER,
            ]);

            $this->batchInsert("auth_assignment", ['item_name', 'user_id', 'created_at'], $this->auth_assignment);
            $this->batchInsert("auth_item", ['name', 'type', 'description', 'rule_name', 'data', 'created_at', 'updated_at'], $this->auth_item);
            $this->batchInsert("auth_item_child", ['parent', 'child'], $this->auth_item_child);
        }
        //companies..
        $companys = Company::find()->All();
        foreach ($companys as $company) {
            //update payment,config
            $this->update($company->prefix . 'paymentType', ['value' => '\app\components\payments\Cash'], ['id' => 1]);
            $this->update($company->prefix . 'paymentType', ['value' => '\app\components\payments\Check'], ['id' => 2]);
            $this->update($company->prefix . 'paymentType', ['value' => '\app\components\payments\PelaCredit'], ['id' => 3]);
            $this->update($company->prefix . 'paymentType', ['value' => '\app\components\payments\Bank'], ['id' => 4]);
            $this->update($company->prefix . 'paymentType', ['value' => '\app\components\payments\ManualCredit'], ['id' => 5]);
            $this->update($company->prefix . 'paymentType', ['value' => '\app\components\payments\PelaCreditPaymnts'], ['id' => 6]);
            $this->update($company->prefix . 'paymentType', ['value' => '\app\components\payments\SourceTax'], ['id' => 7]);

            $this->update($company->prefix . 'config', ["eavType" => "list(app\models\Currecies)"], ["id" => "company.cur"]);
            $this->update($company->prefix . 'config', ["eavType" => "list(app\models\Currecies)"], ["id" => "company.seccur"]);
            $this->update($company->prefix . 'config', ["eavType" => 'select({"1":"monthly","2":"bi-monthly"})'], ["id" => "company.tax.irs"]);
            $this->update($company->prefix . 'config', ["eavType" => 'select({"1":"monthly","2":"bi-monthly"})'], ["id" => "company.tax.vat"]);
            if (dbMaster::tableExists($company->prefix . "AuthAssignment")) {
                $this->dropTable($company->prefix . "AuthAssignment");
                $this->dropTable($company->prefix . "Rights");
                $this->dropTable($company->prefix . "AuthItem");
                $this->dropTable($company->prefix . "AuthItemChild");
            }
            if (!dbMaster::tableExists($company->prefix . 'auth_assignment')) {
                $this->createTable($company->prefix . 'auth_assignment', [
                    'item_name' => Schema::TYPE_STRING . ' NOT NULL',
                    'user_id' => Schema::TYPE_STRING . ' NOT NULL',
                    'created_at' => Schema::TYPE_INTEGER,
                ]);

                $this->createTable($company->prefix . 'auth_item', [
                    'name' => Schema::TYPE_STRING . ' NOT NULL',
                    'type' => Schema::TYPE_INTEGER,
                    'description' => Schema::TYPE_TEXT,
                    'rule_name' => Schema::TYPE_STRING,
                    'data' => Schema::TYPE_TEXT,
                    'created_at' => Schema::TYPE_INTEGER,
                    'updated_at' => Schema::TYPE_INTEGER,
                ]);

                $this->createTable($company->prefix . 'auth_item_child', [
                    'parent' => Schema::TYPE_STRING . ' NOT NULL',
                    'child' => Schema::TYPE_STRING . ' NOT NULL',
                ]);

                $this->createTable($company->prefix . 'auth_rule', [
                    'parent' => Schema::TYPE_STRING . ' NOT NULL',
                    'child' => Schema::TYPE_TEXT,
                    'created_at' => Schema::TYPE_INTEGER,
                    'updated_at' => Schema::TYPE_INTEGER,
                ]);

                $this->batchInsert($company->prefix . "auth_assignment", ['item_name', 'user_id', 'created_at'], $this->auth_assignment);
                $this->batchInsert($company->prefix . "auth_item", ['name', 'type', 'description', 'rule_name', 'data', 'created_at', 'updated_at'], $this->auth_item);
                $this->batchInsert($company->prefix . "auth_item_child", ['parent', 'child'], $this->auth_item_child);
            }
        }

        return true;
    }

    public function down() {
        echo "m150422_072907_to3_1 reverted.\n";

        return true;
    }

    /*
      // Use safeUp/safeDown to run migration code within a transaction
      public function safeUp()
      {
      }

      public function safeDown()
      {
      }
     */

    private function tableExsits() {

        $connection = Yii::$app->db; //get connection
        $dbSchema = $connection->schema;
        //or $connection->getSchema();
        $tables = $dbSchema->getTableNames(); //returns array of tbl schema's
        foreach ($tables as $tbl) {
            if (strpos($tbl, $this->prefix) === 0) {
                //echo $tbl->rawName, ":<br/>", implode(', ', $tbl->columnNames), "<br/>\n";
                //$dbSchema->dropTable($tbl);
                $command = $connection->createCommand()->dropTable($tbl);
                $command->execute(); // execute the non-query SQL
                //echo "holyshit:". $tbl . "<br/>\n";
            }
        }
    }

}
