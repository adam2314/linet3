
CREATE TABLE `accCat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);


CREATE TABLE `accEav` (
  `entity` bigint(20) NOT NULL,
  `attribute` varchar(250) NOT NULL,
  `value` text NOT NULL
);

CREATE TABLE `accHist` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `account_id` int(11) DEFAULT NULL,
  `dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `details` text,
`subject` varchar(255) NOT NULL,
`type` int(11) NOT NULL,
`status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `accId6111` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `percentage` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);


INSERT INTO `accId6111` (`id`, `name`, `percentage`) VALUES
(103, 'סך התאמות חשבוניות בעקבות השלכות IFRS ', 0),
(110, 'הוצאות עודפות ', 0),
(120, 'פחת בספרים ', 0),
(130, 'פחת לצרכי מס ', 0),
(140, 'עלייה/ירידה בהפרשה לחובות מסופקים ', 0),
(150, 'עלייה/ירידה בהפרשה לחופשה והבראה ', 0),
(160, 'עלייה/ירידה בעתודה נטו לפיצויים ', 0),
(170, 'רווח/הפסד הון ממימוש רכוש קבוע ', 0),
(180, 'רווחים/הפסדים שנצברו על ניירות ערך סחירים ', 0),
(190, 'הוצאות אחרות לתיאום ', 0),
(200, 'הכנסות אחרות לתיאום ', 0),
(300, 'חלק ברווחי/הפסדי שותפות בספרים ', 0),
(310, 'הוצאות שיוחסו השנה לפי סעיף 18(ד) לפקודה ', 0),
(320, 'הפחתה/הוספה להכנסה החייבת עקב הפרשים בין רווח/הפסד לרווח לפי סעיף 18 (ד'') לפקודה', 0),
(330, 'הפחתה/הוספה להכנסה החייבת בגין רווח/הפסדחשבונאי לרווח לפי סעיף 8 (א) לפקודה ', 0),
(350, 'חלק ברווחי/הפסדי שותפות לצורכי מס ', 0),
(360, 'השפעת הדיווח לפי התקנות הדולריות ', 0),
(430, 'ניכוי בשל פחת ', 0),
(480, 'הפסדים משנים קודמות ', 0),
(490, 'הכנסה חייבת/הפסד חברה מאוחדת לפי חוק עידוד תעשיה מיסים', 0),
(510, 'הכנסה חייבת במס בשיעור מיוחד (העבר לשדה מתאים בדו"ח השנתי)', 0),
(520, 'רווח הון ריאלי ', 0),
(530, 'רווח הון אינפלציוני ', 0),
(540, 'שבח מקרקעין ', 0),
(550, 'הפסד הון להעברה ', 0),
(570, 'הפסד ריאלי מניירות ערך משנת 2005', 0),
(1010, 'ממכירות בארץ ', 0),
(1015, 'הכנסות ממכירות מבנים כקבלן בונה ', 0),
(1020, 'ממכירות לחו"ל ', 0),
(1025, 'הכנסה מביצוע עבודות כקבלן מבצע ', 0),
(1030, 'הכנסות ממתן שירותים בארץ ', 0),
(1040, 'הכנסות ממתן שירותים בחו"ל ', 0),
(1050, 'הכנסות מצדדים קשורים ', 0),
(1090, 'הכנסות אחרות ', 0),
(1305, 'שכר עבודה ונילוות ', 0),
(1310, 'עבודות חוץ וקבלני משנה ', 0),
(1320, 'קניות סחורה בארץ ', 0),
(1330, 'קניות חומרי גלם וחומרי בנייה בארץ ובחו"ל ', 0),
(1340, 'קניית סחורות בחו"ל ', 0),
(1350, 'הפרשי שער בגין קניות במטבע חוץ ', 0),
(1360, 'הוצאות לאחריות ולתביעות ', 0),
(1370, 'קניות מצדדים קשורים ', 0),
(1390, 'עלויות אחרות ', 0),
(1400, 'מלאי בתחילת התקופה ', 0),
(1450, 'מלאי בסוף התקופה ', 0),
(2005, 'מלאי תחילת תקופה ', 0),
(2010, 'שכר ונילוות ייצור ', 0),
(2015, 'עלות קרקעות ופיתוח אצל קבלן בונה ', 0),
(2020, 'עבודות חוץ וקבלני משנה ', 0),
(2025, 'הוצאות אחראיות ותביעות ', 0),
(2030, 'הוצאות חרושת וחומרי בנייה ', 0),
(2035, 'הוצאות ציוד מתכלה ', 0),
(2040, 'הוצאות הובלה ואחסנה ', 0),
(2045, 'הוצאות אריזה ', 0),
(2050, 'הוצאות אחזקה ותיקונים ', 0),
(2055, 'הוצאות מחקר ופיתוח ', 0),
(2090, 'עלויות ייצור אחרות ', 0),
(2095, 'מלאי בסוף תקופה ', 0),
(3010, 'שכר עבודה ונילוות ', 0),
(3015, 'הוצאות הובלה ואחסנה ', 0),
(3020, 'הוצאות לקבלני משנה ', 0),
(3025, 'ביטוחים ', 0),
(3030, 'עמלות ובונוסים לסוכנים עצמאים ', 0),
(3040, 'תמלוגים (זכויות הפצה)', 0),
(3045, 'הוצאות אריזה ', 0),
(3050, 'הוצאות אחזקה ותיקונים ', 0),
(3055, 'הוצאות מחקר ופיתוח ', 0),
(3060, 'נסיעות ', 0),
(3065, 'אחזקת רכב והובלות ', 0),
(3070, 'דמי שכירות וניהול נכסים ', 0),
(3075, 'מכרזים, ירידים ותערוכות ', 0),
(3080, 'פחת ', 0),
(3085, 'בגדי עבודה ', 0),
(3090, 'חשמל ומים ', 0),
(3100, 'עמלות וכרטיסי אשראי ', 0),
(3120, 'פרסום וקידום מכירות ', 0),
(3190, 'שונות נטו ', 0),
(3510, 'שכר עבודה ונילוות ', 0),
(3515, 'ביטוחים ', 0),
(3520, 'עבודות חוץ וקבלני משנה ', 0),
(3530, 'עמלות ובונוסים לסוכנים ', 0),
(3535, 'הוצאות ציוד מתכלה ', 0),
(3540, 'שירותים מקצועיים ', 0),
(3545, 'הוצאות אריזה ', 0),
(3550, 'הוצאות אחזקה ותיקונים ', 0),
(3555, 'הוצאות מחקר ופיתוח ', 0),
(3560, 'נסיעות ', 0),
(3565, 'אחזקת רכב והובלות ', 0),
(3570, 'דמי שכירות וניהול נכסים ', 0),
(3575, 'מיסים ואגרות ', 0),
(3580, 'פחת ', 0),
(3590, 'חשמל ומים ', 0),
(3595, 'שמירה וניקיון ', 0),
(3600, 'השתלמות וספרות מקצעית ', 0),
(3610, 'חובות מסופקים ואבודים ', 0),
(3620, 'פרסום וקידום מכירות ', 0),
(3625, 'כיבודים, מתנות, תרומות, קנסות ', 0),
(3630, 'הוצאות בגין צדדים קשורים ', 0),
(3640, 'דמי ניהול ', 0),
(3650, 'הוצאות דואר ותקשורת ', 0),
(3660, 'נסיעות לחו"ל ', 0),
(3665, 'הוצאות משפטיות ', 0),
(3680, 'משרדיות ', 0),
(3685, 'בגדי עבודה ', 0),
(3690, 'שונות נטו וביטולי יתרות ', 0),
(5010, 'לתאגידים בנקאיים ', 0),
(5020, 'לצדדים קשורים ', 0),
(5030, 'במטבע חוץ ', 0),
(5040, 'בגין ספקים וזכאים ', 0),
(5090, 'הוצאות מימון לאחרים ', 0),
(5110, 'מתאגידים בנקאיים ', 0),
(5120, 'מצדדים קשורים ', 0),
(5130, 'מהפרשי שער ', 0),
(5190, 'אחרות ', 0),
(5210, 'רווח הון ממימוש רכוש קבוע ', 0),
(5220, 'רווח הון אחר ', 0),
(5230, 'הכנסות מדמי ניהול ', 0),
(5235, 'הכנסות מדמי ניהול מצדדים קשורים ', 0),
(5240, 'הכנסות מדיבידנד ', 0),
(5250, 'הכנסות מהשכרת מבנים וקרקעות ', 0),
(5260, 'הכנסות מתמלוגים ', 0),
(5290, 'שונות ', 0),
(5310, 'הפסד הון ממימוש רכוש קבוע ', 0),
(5320, 'הפסד הון אחר ', 0),
(5330, 'הפרשה לירידת ערך ', 0),
(5390, 'שונות ', 0),
(5510, 'רווח/הפסד משותפות שלא נכללו בסעיפים אחרים ', 0),
(5610, 'מסים שוטפים ', 0),
(5620, 'מסים נדחים ', 0),
(5630, 'מסים בגין שנים קודמות ', 0),
(5710, 'דיבידנד לחלוקה ', 0),
(5810, 'רווח/הפסד אקויטי ', 0),
(7000, 'סה"כ רכוש שוטף ', 0),
(7110, 'שקלים ', 0),
(7120, 'מטבע חוץ ', 0),
(7150, 'פקדונות לזמן קצר ', 0),
(7210, 'אגרות חוב ממשלתיות ', 0),
(7220, 'אגרות חוב קונצרניות ', 0),
(7230, 'קרנות נאמנות ', 0),
(7240, 'מניות של חברות ישראליות ', 0),
(7290, 'ניירות ערך סחירים אחרים ', 0),
(7310, 'לקוחות בישראל ', 0),
(7320, 'לקוחות בחו"ל ', 0),
(7330, 'שטרות והמחאות לקבל ', 0),
(7350, 'הכנסות לקבל ', 0),
(7360, 'כרטיסי אשראי ', 0),
(7380, 'הפרשה לחובות מסופקים ', 0),
(7390, 'לקוחות אחרים ', 0),
(7410, 'מקדמות לספקים ואחרים ', 0),
(7420, 'הוצאות מראש ', 0),
(7430, 'מס הכנסה מקדמות בניכוי הפרשות ', 0),
(7440, 'מוסדות ממשלתיים אחרים ', 0),
(7450, 'בעלי מניות (במישרין) ', 0),
(7460, 'צדדים קשורים ', 0),
(7470, 'עובדים ', 0),
(7490, 'חייבים אחרים ויתרות חובה ', 0),
(7610, 'בגין עובדים ', 0),
(7620, 'בגין הכנסות לקבל ', 0),
(7690, 'מיסים נדחים לזמן קצר אחרים ', 0),
(7710, 'הלוואות לצדדים קשורים ', 0),
(7720, 'הלוואות לאחרים ', 0),
(7805, 'מלאי שטחי מסחר ותעשיה למכירה ', 0),
(7810, 'מלאי במחסני החברה ', 0),
(7815, 'מלאי דירות ', 0),
(7820, 'מלאי במחסני ערובה ', 0),
(7825, 'מלאי בנינים בהקמה ועבודות בביצוע - עלות ישירה ', 0),
(7830, 'מלאי בדרך ', 0),
(7840, 'מלאי במשגור ', 0),
(7850, 'מלאי בתהליך ', 0),
(7860, 'מלאי חומרי גלם ', 0),
(7870, 'עבודות בביצוע לרבות עלויות שהוונו ', 0),
(7890, 'מלאי אחר ', 0),
(8010, 'קרקע ובניינים ', 0),
(8020, 'שיפורים במושכר ', 0),
(8030, 'מכונות וציוד ', 0),
(8040, 'כלי רכב ', 0),
(8050, 'מחשבים וציוד עיבוד נתונים ', 0),
(8060, 'רהיטים ואביזרים ', 0),
(8080, 'מלאי בסיסי ', 0),
(8090, 'רכוש קבוע אחר ', 0),
(8110, 'פחת שנצבר בניינים ', 0),
(8120, 'פחת שנצבר שיפורים במושכר ', 0),
(8130, 'פחת שנצבר מכונות וציוד ', 0),
(8140, 'פחת שנצבר כלי רכב ', 0),
(8150, 'פחת שנצבר מחשבים וציוד עיבוד נתונים ', 0),
(8160, 'פחת שנצבר רהיטים ואביזרים ', 0),
(8180, 'הפרשה לירידת ערך ', 0),
(8190, 'פחת שנצבר רכוש קבוע אחר ', 0),
(8210, 'בגין גיוס הלוואות ', 0),
(8220, 'בגין שכירות לזמן ארוך ', 0),
(8290, 'אחרות ', 0),
(8310, 'עלות ', 0),
(8320, 'חלק החברה ברווח?הפסד שנצבר ', 0),
(8330, 'דיבידנדים שחולקו ', 0),
(8340, 'הלוואות ', 0),
(8350, 'שטרי הון ', 0),
(8410, 'השקעות בחברות אחרות ', 0),
(8420, 'הלוואות לחברות אחרות ', 0),
(8440, 'השקעות בני"ע סחירים ', 0),
(8450, 'שטרי הון ', 0),
(8460, 'השקעה בשותפות ', 0),
(8490, 'השקעות אחרות ', 0),
(8510, 'בגין התחייבות לפיצויים ', 0),
(8520, 'בגין רכוש קבוע ', 0),
(8590, 'אחר ', 0),
(8610, 'מוניטין ', 0),
(8620, 'הוצאות יסוד ', 0),
(8630, 'פטנט וזכויות יוצרים ', 0),
(8690, 'אחרות ', 0),
(9110, 'בנקים ומשיכות יתר ', 0),
(9120, 'הלוואות לזמן קצר ', 0),
(9130, 'חלויות שוטפות של הלוואות לזמן ארוך ', 0),
(9140, 'הלוואות מתושבי חוץ ', 0),
(9150, 'הלוואות מצדדים קשורים ', 0),
(9190, 'הלוואות מאחרים ', 0),
(9210, 'ספקים בישראל ', 0),
(9220, 'ספקים בחו"ל ', 0),
(9230, 'שטרות והמחאות לפירעון ', 0),
(9290, 'ספקים ונותני שירותים אחרים ', 0),
(9310, 'עובדים ', 0),
(9320, 'הפרשות לחופשה והבראה ', 0),
(9330, 'מוסדות בגין עובדים ', 0),
(9340, 'מס הכנסה הפרשות בניכוי מקדמות ', 0),
(9350, 'מוסדות ממשלתיים אחרים ', 0),
(9360, 'הכנסות שכ"ד מראש ', 0),
(9370, 'מקדמות מלקוחות ', 0),
(9410, 'הכנסות אחרות מראש ', 0),
(9420, 'הוצאות לשלם ', 0),
(9430, 'צדדים קשורים ', 0),
(9435, 'בעלי מניות ', 0),
(9440, 'הפרשה לאחריות ותיקונים ', 0),
(9450, 'הפרשה לתביעות ', 0),
(9460, 'הפרשות תלויות אחרות ', 0),
(9470, 'בונוסים ומענקים לשלם ', 0),
(9480, 'דיבידנד לשלם ', 0),
(9490, 'זכאים אחרים ויתרות זכות ', 0),
(9510, 'בגין עובדים ', 0),
(9520, 'בגין הפסדים להעברה ', 0),
(9530, 'מסים נדחים לזמן קצר, אחרים ', 0),
(9610, 'בנקים ', 0),
(9620, 'הלוואות לזמן ארוך בניכוי חלויות שוטפות ', 0),
(9630, 'הלוואות מצדדים קשורים ', 0),
(9640, 'הלוואות מתושבי חוץ ', 0),
(9650, 'הלוואות לזמן ארוך מאחרים ', 0),
(9660, 'שטרי הון ', 0),
(9670, 'אג"ח ', 0),
(9690, 'אחרות ', 0),
(9710, 'עתודה לפיצויים', 0),
(9720, 'ייעודה לפיצויים', 0),
(9790, 'הפרשות אחרות', 0),
(9810, 'בגין התחייבות לפיצויים ', 0),
(9820, 'בגין רכוש קבוע ', 0),
(9890, 'אחר ', 0),
(9910, 'הון מניות, הון בעל העסק, הון השותפות ', 0),
(9920, 'פרמיה על מניות ', 0),
(9930, 'קרנות הון ', 0),
(9950, 'תקבולים ע"ח אופציות ', 0),
(9980, 'רווח (הפסד) שנצבר ', 0);

CREATE TABLE `accounts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` int(11) DEFAULT NULL,
  `id6111` int(10) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `pay_terms` int(11) DEFAULT NULL,
  `src_tax` decimal(5,2) DEFAULT NULL,
  `src_date` timestamp NULL DEFAULT NULL,
  `parent_account_id` int(11) DEFAULT NULL,
  `name` varchar(80) DEFAULT NULL,
  `contact` varchar(80) DEFAULT NULL,
  `department` varchar(60) DEFAULT NULL,
  `vatnum` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `dir_phone` varchar(20) DEFAULT NULL,
  `cellular` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `web` varchar(60) DEFAULT NULL,
  `address` varchar(80) DEFAULT NULL,
  `city` varchar(40) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `currency_id` varchar(3) NOT NULL,
  `comments` text,
  `system_acc` tinyint(1) NOT NULL DEFAULT '0',
  `owner` int(11) DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `active` tinyint(1) NOT NULL DEFAULT '1',
      `bank_name` varchar(255) DEFAULT NULL,
  `bank_branch` varchar(255) DEFAULT NULL,
  `bank_acc` varchar(255) DEFAULT NULL,
  `bank_username` varchar(255) DEFAULT NULL,
  `bank_passwd` varchar(255) DEFAULT NULL,
  `iban` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `accounts` (`id`, `type`, `id6111`, `pay_terms`, `src_tax`, `src_date`, `parent_account_id`, `name`, `contact`, `department`, `vatnum`, `email`, `phone`, `dir_phone`, `cellular`, `fax`, `web`, `address`, `city`, `zip`, `currency_id`, `comments`, `system_acc`, `owner`, `modified`, `created`) VALUES
(1, 6, 0, 0, 0.00, '2013-08-11 12:43:52', 0, 'מע"מ תשומות', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 6, 0, 0, 0.00, '0000-00-00 00:00:00', 0, 'מע"מ תשומות ציוד ונכסים', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 6, 0, 0, 0.00, '0000-00-00 00:00:00', 0, 'מע"מ עסקאות', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 6, 0, 0, 0.00, '0000-00-00 00:00:00', 0, 'מע"מ חוז', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 6, 0, 0, 0.00, '0000-00-00 00:00:00', 0, 'ניכוי במקור מספקים', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 4, 0, 0, 0.00, '0000-00-00 00:00:00', 0, 'עיגול סכומים', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 4, 0, 0, 0.00, '0000-00-00 00:00:00', 0, 'קופת שיקים', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 6, 0, 0, 0.00, '0000-00-00 00:00:00', 0, 'ניכוי במקור מלקוחות', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 4, 0, 0, 0.00, '0000-00-00 00:00:00', 0, 'יתרות פתיחה', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 4, 0, 0, 0.00, '0000-00-00 00:00:00', 0, 'קופת מזומן', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 4, 0, 0, 0.00, '0000-00-00 00:00:00', 0, 'קופת אשראי', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 4, 0, 0, 0.00, '0000-00-00 00:00:00', 0, 'PayPal', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 6, 0, 0, 0.00, '0000-00-00 00:00:00', 0, 'מס הכנסה מקדמות', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 6, 0, 0, 0.00, '0000-00-00 00:00:00', 0, 'ביטוח לאומי חו"ז', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 6, 0, 0, 0.00, '0000-00-00 00:00:00', 0, 'ביטוח לאומי', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 6, 0, 0, 0.00, '0000-00-00 00:00:00', 0, 'מס הכנסה', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 2, 1320, 0, 100.00, '0000-00-00 00:00:00', 0, 'קניות מוכר 100%', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 0, 0, '2014-12-02 04:48:24', '0000-00-00 00:00:00'),
(18, 2, 1340, 0, 0.00, '0000-00-00 00:00:00', 0, 'קניות יבוא-ללא מע"מ', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 0, 0, '2014-12-02 04:49:28', '0000-00-00 00:00:00'),
(19, 2, 3065, 0, 100.00, '0000-00-00 00:00:00', 0, 'רכב מוכר 100%', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 0, 0, '2014-12-02 04:50:33', '0000-00-00 00:00:00'),
(20, 2, 3565, 0, 66.66, '0000-00-00 00:00:00', 0, 'רכב מוכר 66.66%', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 0, 0, '2014-12-02 05:02:03', '0000-00-00 00:00:00'),
(21, 2, 3065, 0, 25.00, '0000-00-00 00:00:00', 0, 'רכב מוכר 25%', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 0, 0, '2014-12-02 04:51:31', '0000-00-00 00:00:00'),
(22, 2, 3650, 0, 100.00, '0000-00-00 00:00:00', 0, 'סלולארי מוכר 100%', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 0, 0, '2014-12-02 04:58:23', '0000-00-00 00:00:00'),
(23, 2, 3650, 0, 66.66, '0000-00-00 00:00:00', 0, 'סלולארי מוכר 66.66%', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 0, 0, '2014-12-02 05:01:34', '0000-00-00 00:00:00'),
(24, 2, 3650, 0, 25.00, '0000-00-00 00:00:00', 0, 'סלולארי מוכר 25%', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 0, 0, '2014-12-02 04:59:19', '0000-00-00 00:00:00'),
(25, 2, 3060, 0, 100.00, '0000-00-00 00:00:00', 0, 'דלק מוכר 100%', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 0, 0, '2014-12-02 04:59:56', '0000-00-00 00:00:00'),
(26, 2, 3060, 0, 66.66, '0000-00-00 00:00:00', 0, 'דלק מוכר 66.66%', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 0, 0, '2014-12-02 05:01:05', '0000-00-00 00:00:00'),
(27, 2, 3060, 0, 25.00, '0000-00-00 00:00:00', 0, 'דלק מוכר 25%', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 0, 0, '2014-12-02 05:02:29', '0000-00-00 00:00:00'),
(28, 2, 2050, 0, 100.00, '0000-00-00 00:00:00', 0, 'אחזקת משרד מוכר 100%', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 0, 0, '2014-12-02 05:04:26', '0000-00-00 00:00:00'),
(29, 2, 3680, 0, 100.00, '0000-00-00 00:00:00', 0, 'הוצאות משרדיות מוכר 100%', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 0, 0, '2014-12-02 05:05:05', '0000-00-00 00:00:00'),
(30, 2, 3650, 0, 100.00, '0000-00-00 00:00:00', 0, 'טלפון קווי מוכר 100%', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 0, 0, '2014-12-02 05:05:43', '0000-00-00 00:00:00'),
(31, 2, 3650, 0, 66.66, '0000-00-00 00:00:00', 0, 'טלפון קווי מוכר 66.66%', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 0, 0, '2014-12-02 05:06:26', '0000-00-00 00:00:00'),
(32, 2, 3025, 0, 0.00, '0000-00-00 00:00:00', 0, 'ביטוח-מע"מ לא מוכר', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 0, 0, '2014-12-02 05:06:59', '0000-00-00 00:00:00'),
(33, 2, 5610, 0, 0.00, '0000-00-00 00:00:00', 0, 'אגרות- מע"מ לא מוכר', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 0, 0, '2014-12-02 05:07:56', '0000-00-00 00:00:00'),
(50, 5, 0, 0, 30.00, '0000-00-00 00:00:00', 0, 'דיבידנד', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 5, 0, 0, 0.00, '0000-00-00 00:00:00', 0, 'יתרת רווח והפסד', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, 3, 1010, 0, 17.00, '0000-00-00 00:00:00', 0, 'מכירת מוצרים בארץ', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 3, 1020, 0, 17.00, '0000-00-00 00:00:00', 0, 'מכירת שרותים בארץ', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, 3, 1030, 0, 0.00, '0000-00-00 00:00:00', 0, 'מכירת מוצרים בחו"ל', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 3, 1040, 0, 0.00, '0000-00-00 00:00:00', 0, 'מכירת שרותים בחו"ל', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 3, 200, 0, 0.00, '0000-00-00 00:00:00', 0, 'מכירות בארץ פטורות מע"מ', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 3, 0, 0, 0.00, '0000-00-00 00:00:00', 0, 'הכנסות מתרומה', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, 11, 0, 0, 0.00, '0000-00-00 00:00:00', 0, 'עובדים חו"ז', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, 0, 0, 0, 0.00, '0000-00-00 00:00:00', 0, 'לקוחות שונים', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, 1, 0, 0, 0.00, '0000-00-00 00:00:00', 0, 'ספקים שונים', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, 8, 0, 0, 0.00, '0000-00-00 00:00:00', 0, 'מחסן ראשי', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

CREATE TABLE `accTemplate` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `AccType_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `accTemplateItem` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `AccTemplate_id` int(11) NOT NULL,
  `eavFields_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

CREATE TABLE `accType` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `desc` varchar(40) NOT NULL,
  `openformat` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `accType` (`id`, `name`, `desc`, `openformat`) VALUES
(0, 'customers', 'Customers', ''),
(1, 'suppliers', 'Suppliers', '1'),
(2, 'expenses', 'Expenses', ''),
(3, 'incomes', 'Incomes', ''),
(4, 'assets & debits', 'Assets & Debits', ''),
(5, 'capital & surplus', 'Capital & Surplus', ''),
(6, 'authorities', 'Authorities', ''),
(7, 'banks', 'Banks', ''),
(8, 'warehouses', 'Warehouses', ''),
(9, 'leads', 'Leads', ''),
(10, 'contacts', 'Contacts', ''),
(11, 'workers', 'Workers', '');

CREATE TABLE `bankbook` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `account_id` int(11) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `details` varchar(60) DEFAULT NULL,
  `refnum` char(255) DEFAULT NULL,
  `sum` decimal(8,2) DEFAULT NULL,
  `total` decimal(8,2) DEFAULT NULL,
  `extCorrelation` int(11) DEFAULT NULL,
  `currency_id` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `bankName` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `bankName` (`id`, `name`) VALUES
(1, 'בנק יורו טרייד'),
(4, 'בנק יהב לעובדי המדינה'),
(6, 'בנק אדנים'),
(7, 'בנק לפיתוח התעשיה'),
(8, 'בנק הספנות לישראל'),
(9, 'בנק הדואר'),
(10, 'בנק לאומי'),
(11, 'בנק דיסקונט'),
(12, 'בנק הפועלים'),
(13, 'בנק איגוד'),
(14, 'בנק אוצר החייל'),
(17, 'בנק מרכנתיל דיסקונט'),
(19, 'בנק החקלאות לישראל'),
(20, 'בנק מזרחי טפחות'),
(22, 'Citibank N.A'),
(23, 'HSBC'),
(25, 'BNP Paribas Israel'),
(26, 'יובנק בע"מ'),
(31, 'הבנק הבינלאומי הראשון '),
(34, 'בנק ערבי ישראלי'),
(39, 'SBI State Bank of India'),
(46, 'בנק מסד'),
(48, 'קופת העובד הלאומי'),
(52, 'בנק פועלי אגודת ישראל'),
(54, 'בנק ירושלים'),
(67, 'Arab Land Bank'),
(68, 'בנק אוצר השלטון המקומי'),
(77, 'בנק לאומי למשכנתאות בע"מ'),
(90, 'בנק דיסקונט למשכנתאות'),
(99, 'בנק ישראל');


CREATE TABLE `config` (
  `id` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `eavType` varchar(255) NOT NULL,
  `hidden` tinyint(1) NOT NULL,
  `priority` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `config` (`id`, `value`, `eavType`, `hidden`, `priority`) VALUES
('company.logo', '', 'file', 0, 150),
('company.name', '', 'string', 0 ,100),
('company.vat.id', '', 'integer', 0, 101),
('company.website', '', 'string', 0, 150),
('company.en.name', '', 'string', 0, 150),
('company.stock', 'false', 'boolean', 0, 150),
('company.doublebook', 'true', 'boolean', 0, 200),
('company.tax.irs', '1', 'select({"1":"monthly","2":"bi-monthly"})', 0, 200),
('company.tax.rate', '10', 'integer', 0, 200),
('company.tax.vat', '1', 'select({"1":"monthly","2":"bi-monthly"})', 0, 200),
('company.cur', 'ILS', 'list(app\\models\\Currecies)', 0, 250),
('company.seccur', '', 'list(app\\models\\Currecies)', 0, 250),
('company.address', '', 'string', 0, 300),
('company.city', '', 'string', 0, 300),
('company.zip', '', 'string', 0, 300),
('company.po', '', 'string', 0, 300),
('company.en.address', '', 'string', 0, 300),
('company.en.city', '', 'string', 0, 300),
('company.fax', '', 'string', 0, 400),
('company.phone', '', 'string', 0, 400),
('company.mail.server', '', 'string', 0, 500),
('company.mail.user', '', 'string', 0, 500),
('company.mail.password', '', 'string', 0, 500),
('company.mail.address', '', 'string', 0, 500),
('company.mail.port', '', 'string', 0, 500),
('company.mail.ssl', '', 'boolean', 0, 500),
('company.1.warehouse', '115', 'integer', 1, 40),
('company.acc.assetvat', '2', 'integer', 1, 40),
('company.acc.buyvat', '1', 'integer', 1, 40),
('company.acc.custtax', '8', 'integer', 1, 40),
('company.acc.irs', '16', 'integer', 1, 40),
('company.acc.natinspay', '14', 'integer', 1, 40),
('company.acc.openbalance', '9', 'integer', 1, 40),
('company.acc.payvat', '4', 'integer', 1, 40),
('company.acc.pretax', '13', 'integer', 1, 40),
('company.acc.sellvat', '3', 'integer', 1, 40),
('company.path', 'TEMP', 'string', 1, 40),
('company.transaction', '1', 'integer', 1, 40),
('paypal.apiLive', 'false', 'boolean', 1, 40),
('paypal.apiPassword', '', '', 1, 40),
('paypal.apiSignature', '', '', 1, 40),
('paypal.apiUsername', '', '', 1, 40),
('server.checkTime', '20130324114336', '', 1, 40),
('server.dbVersion', '3.0', '', 1, 40),
('server.Latest', '', '', 1, 40),
('server.Version', '3.0119', '', 1, 40),
('server.wkhtmltopdf', 'xvfb-run -a -s "-screen 0 1024x768x16" wkhtmltopdf', 'string', 1, 40),
('system.auth', '179403', 'string', 1, 40),
('system.name', 'Linet 3.2', 'string', 1, 40),
('system.vendor.name', 'Speedcomp', 'string', 1, 40),
('system.vendor.vatnum', '069924504', 'string', 1, 40),
('system.version', '3.2', 'string', 1, 40),
('transactionType.chequedeposit', '4', 'integer', 1, 40),
('transactionType.manual', '0', 'integer', 1, 40),
('transactionType.openBalance', '16', 'integer', 1, 40),
('transactionType.supplierPayment', '5', 'integer', 1, 40),
('pelecard.userName', '', 'string', 1, 40), 
('pelecard.password', '', 'string', 1, 40), 
('pelecard.termNo', '', 'string', 1, 40), 
('pelecard.shopNo', '', 'string', 1, 40),
('company.sumDiff', '0.05', 'string', 1, 40),
('company.precision', '2', 'integer', 1, 40);

CREATE TABLE `curRates` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `currency_id` varchar(3) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `value` decimal(10,5) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `curRates` (`id`, `currency_id`, `date`, `value`) VALUES
(1, 'ILS', '1999-12-31 20:00:01', 1.00000);

CREATE TABLE `docCheques` (
  `doc_id` int(11) NOT NULL DEFAULT '0',
  `type` int(11) DEFAULT '0',
  `currency_id` varchar(3) NOT NULL,
  `sum` decimal(20,2) DEFAULT NULL,
  `line` int(11) NOT NULL DEFAULT '0',
  `bank_refnum` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`doc_id`,`line`)
);

CREATE TABLE `docChequesAttr` (
  `doc_id` int(11) NOT NULL,
  `line` int(11) NOT NULL,
  `attribute` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`doc_id`,`line`,`attribute`)
);


CREATE TABLE `docDetails` (
  `doc_id` int(11) unsigned NOT NULL DEFAULT '0',
  `item_id` int(11) unsigned DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `qty` decimal(5,2) DEFAULT NULL,
  `iItem` decimal(20,2) DEFAULT NULL,
  `ihItem` decimal(20,2) DEFAULT NULL,
  `unit_id` int(11) NOT NULL,
  `currency_id` varchar(3) NOT NULL,
  `iTotal` decimal(20,2) DEFAULT NULL,
  `ihTotal` decimal(20,2) DEFAULT NULL,
  `iVatRate` decimal(20,2) NOT NULL,
  `line` int(11) NOT NULL,
  `iTotalVat` decimal(20,2) NOT NULL,
  PRIMARY KEY (`doc_id`,`line`)
);

CREATE TABLE `docs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `doctype` int(11) NOT NULL,
  `docnum` int(10) DEFAULT NULL,
  `account_id` int(10) DEFAULT NULL,
  `company` varchar(80) DEFAULT NULL,
  `address` varchar(80) DEFAULT NULL,
  `city` varchar(40) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `vatnum` varchar(10) DEFAULT NULL,
  `refnum` varchar(20) NOT NULL,
  `refnum_ext` varchar(255) NOT NULL,
  `issue_date` timestamp NULL DEFAULT NULL,
  `due_date` timestamp NULL DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ref_date` timestamp NULL DEFAULT NULL,
  `discount` decimal(20,2) NOT NULL,
  `disType` tinyint(1) NOT NULL,
  `sub_total` decimal(20,2) DEFAULT NULL,
  `novat_total` decimal(20,2) DEFAULT NULL,
  `vat` decimal(20,2) DEFAULT NULL,
  `total` decimal(20,2) DEFAULT NULL,
  `currency_id` varchar(3) NOT NULL,
  `src_tax` decimal(20,2) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `printed` int(11) NOT NULL,
  `comments` text,
  `description` text NOT NULL,
  `oppt_account_id` int(11) DEFAULT NULL,
  `action` tinyint(1) NOT NULL,
  `refstatus` int(11) NOT NULL,
  `owner` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `docStatus` (
  `num` int(11) NOT NULL,
  `doc_type` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `looked` tinyint(1) NOT NULL,
  `action` varchar(255) NOT NULL,
  PRIMARY KEY (`num`,`doc_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `docStatus` (`num`, `doc_type`, `name`, `looked`, `action`) VALUES
(1, 1, 'טיוטא', 0, '0'),
(1, 2, 'טיוטא', 0, '0'),
(1, 3, 'טיוטא', 0, '0'),
(1, 4, 'טיוטא', 0, '0'),
(1, 5, 'טיוטא', 0, '0'),
(1, 6, 'טיוטא', 0, '0'),
(1, 7, 'טיוטא', 0, '0'),
(1, 8, 'טיוטא', 0, '0'),
(1, 9, 'טיוטא', 0, '0'),
(1, 10, 'טיוטא', 0, '0'),
(1, 11, 'טיוטא', 0, '0'),
(1, 12, 'טיוטא', 0, '0'),
(1, 13, 'טיוטא', 0, '0'),
(1, 14, 'טיוטא', 0, '0'),
(1, 15, 'טיוטא', 0, '0'),

(1, 16, 'הופק', 1, '1'),
(1, 17, 'הופק', 1, '-1'),
(1, 18, 'הופק', 1, '1'),
(2, 1, 'הופק', 0, '1'),
(2, 2, 'הופק', 1, '1'),
(2, 3, 'הופק', 1, '1'),
(2, 4, 'הופק', 1, '-1'),
(2, 5, 'הופק', 0, '1'),
(2, 6, 'הופק', 0, '1'),
(2, 7, 'הופק', 1, '1'),
(2, 8, 'הופק', 1, '1'),
(2, 9, 'הופק', 1, '1'),
(2, 10, 'הופק', 0, '1'),
(2, 11, 'הופק', 1, '1'),
(2, 12, 'הופק', 1, '1'),
(2, 13, 'הופק', 1, '-1'),
(2, 14, 'הופק', 1, '-1'),
(2, 15, 'הופק', 1, '1');

CREATE TABLE `docType` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `openformat` int(11) NOT NULL,
  `isdoc` tinyint(1) NOT NULL,
  `isrecipet` tinyint(1) NOT NULL,
  `iscontract` tinyint(1) NOT NULL,
  `looked` tinyint(1) NOT NULL,
  `stockAction` int(11) NOT NULL,
  `account_type` int(11) NOT NULL,
  `docStatus_id` int(11) NOT NULL,
  `last_docnum` int(11) NOT NULL,
  `oppt_account_type` int(11) DEFAULT NULL,
  `transactionType_id` int(11) DEFAULT NULL,
  `vat_acc_id` int(11) NOT NULL,
  `header` text NOT NULL,
  `footer` text NOT NULL,
  `stockSwitch` tinyint(1) NOT NULL,
  `copy` tinyint(1) NOT NULL,
  `issueLabel` varchar(255) DEFAULT NULL,
  `issueLock` tinyint(1) DEFAULT NULL,
  `dueLabel` varchar(255) DEFAULT NULL,
  `dueLock` tinyint(1) DEFAULT NULL,
  `refLabel` varchar(255) DEFAULT NULL,
  `refLock` tinyint(1) DEFAULT NULL,
  `valuedate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `docType` (`id`, `name`, `openformat`, `isdoc`, `isrecipet`, `iscontract`, `looked`, `stockAction`, `account_type`, `docStatus_id`, `last_docnum`, `oppt_account_type`, `transactionType_id`, `vat_acc_id`, `header`, `footer`, `stockSwitch`, `copy`, `issueLabel`, `issueLock`, `dueLabel`, `dueLock`, `refLabel`, `refLock`, `valuedate`) VALUES
(1, 'Proforma', 300, 1, 0, 0, 1, -1, 0, 2, 0, NULL, NULL, 3, '', '', 0, 1, 'Issue Date', 1, 'Proforma Payment Due Date', 0, NULL, 1, NULL),
(2, 'Delivery Document', 200, 1, 0, 0, 0, -1, 0, 2, 0, NULL, NULL, 3, '', '', 0, 1, 'Issue Date', 1, 'Delivery Shipment Date', 1, NULL, 1, 'issue_date'),
(3, 'Invoice', 305, 1, 0, 0, 1, -1, 0, 2, 0, NULL, 1, 3, '', '', 1, 1, 'Issue Date', 1, 'Invoice Payment Due Date', 0, NULL, 1, 'issue_date'),
(4, 'Credit Invoice', 330, 1, 0, 0, 0, 1, 0, 2, 0, NULL, 17, 3, '', '', 1, 1, 'Issue Date', 1, 'Credit Date', 1, NULL, 1, 'issue_date'),
(5, 'Return Document', 210, 1, 0, 0, 0, 1, 0, 2, 0, NULL, NULL, 3, '', '', 1, 1, 'Issue Date', 1, 'Return Shipment Date', 1, NULL, 1, 'issue_date'),
(6, 'Quote', 0, 1, 0, 0, 0, 0, 0, 2, 0, NULL, NULL, 3, '', '', 0, 0, 'Issue Date', 1, 'Quote Valid Untill', 0, NULL, 1, NULL),
(7, 'Sales Order', 100, 1, 0, 0, 0, 0, 0, 2, 0, NULL, NULL, 3, '', '', 0, 0, 'Issue Date', 1, 'Item Delivery Due Date', 0, NULL, 1, NULL),
(8, 'Receipt', 400, 0, 1, 0, 1, 0, 0, 2, 0, NULL, 3, 3, '', '', 0, 1, 'Issue Date', 1, NULL, 0, NULL, 1, NULL),
(9, 'Invoice Receipt', 320, 1, 1, 0, 1, -1, 0, 2, 0, NULL, 18, 3, '', '', 1, 1, 'Issue Date', 1, NULL, 0, NULL, 1, 'issue_date'),
(10, 'Purchase Order', 500, 1, 0, 0, 0, 0, 1, 2, 0, NULL, NULL, 3, '', '', 0, 1, 'Issue Date', 1, 'Item Delivery Due Date', 0, NULL, 1, NULL),
(11, 'Manual Invoice', 345, 1, 0, 0, 1, 1, 1, 2, 0, NULL, 11, 3, '', '', 1, 1, 'Issue Date', 1, NULL, 0, NULL, 1, NULL),
(12, 'Manual Receipt', 0, 1, 0, 0, 1, 1, 1, 2, 0, NULL, 12, 3, '', '', 0, 1, 'Issue Date', 1, NULL, 0, NULL, 1, NULL),
(13, 'Current Expense', 0, 1, 0, 0, 0, 1, 1, 2, 0, 2, 20, 1, '', '', 0, 0, 'Report Date', 0, 'Payment To Supplier Due Date', 0, 'Reference date', 0, 'issue_date'),
(14, 'Asset Expense', 0, 1, 0, 0, 0, 1, 1, 2, 0, 4, 21, 2, '', '', 0, 0, 'Report Date', 0, 'Payment To Supplier Due Date', 0, 'Reference date', 0, 'issue_date'),
(15, 'Warehouse Transaction', 830, 1, 0, 0, 0, 1, 8, 2, 0, 8, NULL, 0, '', '', 0, 1, 'Issue Date', 1, 'Inventory Transaction Date', 0, NULL, 1, 'due_date'),
(16, 'Stock entry certificate', 810, 1, 0, 0, 1, 1, 1, 1, 0, NULL, NULL, 0, '', '', 1, 1, 'Issue Date', 1, 'Inventory Entry Date', 0, NULL, 1, 'due_date'),
(17, 'Stock exit certificate', 820, 1, 0, 0, 1, -1, 1, 1, 0, NULL, NULL, 0, '', '', 1, 1, 'Issue Date', 1, 'Inventory Exit Date', 0, NULL, 1, 'due_date'),
(18, 'Receipt For Donation', 405, 0, 1, 0, 1, 0, 0, 1, 0, NULL, 3, 3, '', '', 0, 1, 'Issue Date', 1, NULL, 0, NULL, 1, NULL);
CREATE TABLE `eavAttr` (
  `entity` bigint(20) NOT NULL,
  `attribute` varchar(250) NOT NULL,
  `value` text NOT NULL
);

CREATE TABLE `eavFields` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `eavType` varchar(255) NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `extCorrelation` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `account_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `owner` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `files` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `hidden` tinyint(1) NOT NULL,
  `public` tinyint(1) NOT NULL,
  `parent_id` int(255) DEFAULT NULL,
  `parent_type` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `expire` int(11) NOT NULL,
  `hash` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `intCorrelation` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `account_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `owner` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `inventoryItem` (
  `account_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `ammount` int(11) NOT NULL,
  `idcode` varchar(255) NOT NULL
);

CREATE TABLE `itemCategories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `profit` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `itemCategories` (`id`, `name`, `profit`) VALUES
(1, 'כללי', 1);

CREATE TABLE `itemEav` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `entity` int(11) NOT NULL,
  `attribute` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `items` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `itemVatCat_id` int(11) NOT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `extcatnum` varchar(30) DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `manufacturer` varchar(40) DEFAULT NULL,
  `saleprice` decimal(20,2) DEFAULT NULL,
  `currency_id` varchar(3) DEFAULT NULL,
  `ammount` int(11) DEFAULT NULL,
  `owner` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `parent_item_id` int(11) NOT NULL,
  `isProduct` tinyint(1) NOT NULL,
  `profit` int(11) NOT NULL,
  `purchaseprice` decimal(20,2) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `stockType` int(1) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `sku` (`sku`)
);

INSERT INTO `items` (`id`, `name`, `itemVatCat_id`, `unit_id`, `extcatnum`, `sku`, `manufacturer`, `saleprice`, `currency_id`, `ammount`, `owner`, `category_id`, `parent_item_id`, `isProduct`, `profit`, `purchaseprice`, `pic`, `description`, `stockType`, `modified`, `created`) VALUES
(1, 'מקט כללי', 1, 0, NULL, '1', NULL, 0.00, 'ILS', NULL, NULL, 1, 0, 1, 0, 0.00, '', '', 0, '2014-10-07 22:00:12', '2014-10-07 22:00:12');


CREATE TABLE `itemTemplate` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `Itemcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `itemTemplateItem` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ItemTemplate_id` int(11) NOT NULL,
  `eavFields_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `itemUnits` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `precision` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `itemUnits` (`id`, `name`, `precision`) VALUES
(0, 'units', 0),
(1, 'work hours', 0),
(2, 'Meter', 0),
(3, 'liter', 0),
(4, 'gram', 0),
(5, 'Kilo gram', 0);

CREATE TABLE `itemVatCat` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `itemVatCat` (`id`, `name`) VALUES
(1, 'חייב מעמ'),
(2, 'פטור ממעמ');

CREATE TABLE `language` (
  `id` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `mail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `to` varchar(255) NOT NULL,
  `from` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `cc` varchar(255) NOT NULL,
  `bcc` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `files` int(11) NOT NULL,
  `create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `sent` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `mailTemplate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `subject` varchar(255) NOT NULL,
  `cc` varchar(255) NOT NULL,
  `bcc` varchar(255) NOT NULL,
  `entity_type` varchar(255) NOT NULL,
  `entity_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `paymentType` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `value` varchar(80) NOT NULL,
  `oppt_account_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `paymentType` (`id`, `name`, `value`, `oppt_account_id`) VALUES
(1, 'Cash', '\\app\\components\\payments\\Cash', 10),
(2, 'Check', '\\app\\components\\payments\\Check', 7),
(3, 'Credit card', '\\app\\components\\payments\\PelaCredit', 11),
(4, 'Bank transfer', '\\app\\components\\payments\\Bank', 0),
(5, 'Manual Credit', '\\app\\components\\payments\\ManualCredit', 11),
(6, 'Credit card - payments', '\\app\\components\\payments\\PelaCreditPaymnts', 11),
(7, 'Source Tax', '\\app\\components\\payments\\SourceTax', 8),
(8, 'PayPal', '\\app\\components\\payments\\PayPal', 12);

CREATE TABLE `Rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`)
);

INSERT INTO `Rights` (`itemname`, `type`, `weight`) VALUES
('Admin', 1, 0),
('Guest', 3, 2),
('User', 2, 1);

CREATE TABLE `stockAction` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `oppt_account_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `serial` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `doc_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `transactions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `num` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `refnum1` varchar(255) NOT NULL,
  `refnum2` varchar(255) NOT NULL,
  `intCorrelation` int(11) NOT NULL,
  `intType` tinyint(1) NOT NULL,
  `extCorrelation` int(11) NOT NULL,
  `valuedate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `details` varchar(255) NOT NULL,
  `currency_id` varchar(3) NOT NULL,
  `sum` decimal(20,2) NOT NULL,
  `leadsum` decimal(20,2) NOT NULL,
  `secsum` decimal(20,2) DEFAULT NULL,
  `owner_id` int(11) NOT NULL,
  `linenum` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `transactionType` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `transactionType` (`id`, `name`) VALUES
(0, 'Manual Transaction'),
(1, 'Invoice'),
(2, 'Supplier Invoice'),
(3, 'Receipt'),
(4, 'Deposit'),
(5, 'Supplier Payment'),
(6, 'Vat Payment'),
(7, 'Storeno'),
(8, 'Bank Match'),
(9, 'Source Tax Deduction'),
(10, 'PATTERN'),
(11, 'Manual Invoice'),
(12, 'Manual Receipt'),
(14, 'Pretax Transaction'),
(15, 'Salary Transaction'),
(16, 'Opening Balance'),
(17, 'Credit Invoice'),
(18, 'Invoice Receipt'),
(19, 'Return Document'),
(20, 'Current Expense'),
(21, 'Asset Expense');

CREATE TABLE `userIncomeMap` (
  `user_id` int(11) NOT NULL,
  `itemVatCat_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL
);

INSERT INTO `userIncomeMap` (`user_id`, `itemVatCat_id`, `account_id`) VALUES
(1, 1, 100),
(1, 2, 104);

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`)
);

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('sysadmin', '1', NULL);

CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `type` (`type`)
);

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/*', 2, NULL, NULL, NULL, NULL, NULL),
('/admin/*', 2, NULL, NULL, NULL, NULL, NULL),
('sysadmin', 1, 'fff', NULL, NULL, NULL, NULL);


CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
);

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('sysadmin', '/*'),
('sysadmin', '/admin/*');