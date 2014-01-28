
--
-- foreign key checks, autocomit and start a transaction
--

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT=0;
START TRANSACTION;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Structure for table `AuthAssignment`
--

DROP TABLE IF EXISTS `AuthAssignment`;

CREATE TABLE `AuthAssignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `AuthAssignment`
--

INSERT INTO `AuthAssignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
 ('Admin', '1', NULL, 'N;'),
 ('Authenticated', '2', NULL, 'N;');



--
-- Structure for table `AuthItem`
--

DROP TABLE IF EXISTS `AuthItem`;

CREATE TABLE `AuthItem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `AuthItem`
--

INSERT INTO `AuthItem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
 ('Accounts.*', '1', NULL, NULL, 'N;'),
 ('Accounts.Admin', '0', NULL, NULL, 'N;'),
 ('Accounts.Ajax', '0', NULL, NULL, 'N;'),
 ('Accounts.Autocomplete', '0', NULL, NULL, 'N;'),
 ('Accounts.Create', '0', NULL, NULL, 'N;'),
 ('Accounts.Delete', '0', NULL, NULL, 'N;'),
 ('Accounts.Index', '0', NULL, NULL, 'N;'),
 ('Accounts.JSON', '0', NULL, NULL, 'N;'),
 ('Accounts.Transaction', '0', NULL, NULL, 'N;'),
 ('Accounts.Update', '0', NULL, NULL, 'N;'),
 ('Accounts.View', '0', NULL, NULL, 'N;'),
 ('AccTemplate.*', '1', NULL, NULL, 'N;'),
 ('AccTemplate.Admin', '0', NULL, NULL, 'N;'),
 ('AccTemplate.Create', '0', NULL, NULL, 'N;'),
 ('AccTemplate.Delete', '0', NULL, NULL, 'N;'),
 ('AccTemplate.Index', '0', NULL, NULL, 'N;'),
 ('AccTemplate.SaveSub', '0', NULL, NULL, 'N;'),
 ('AccTemplate.Update', '0', NULL, NULL, 'N;'),
 ('AccTemplate.View', '0', NULL, NULL, 'N;'),
 ('Acctype.*', '1', NULL, NULL, 'N;'),
 ('Acctype.Admin', '0', NULL, NULL, 'N;'),
 ('Acctype.Create', '0', NULL, NULL, 'N;'),
 ('Acctype.Delete', '0', NULL, NULL, 'N;'),
 ('Acctype.Index', '0', NULL, NULL, 'N;'),
 ('Acctype.Update', '0', NULL, NULL, 'N;'),
 ('Acctype.View', '0', NULL, NULL, 'N;'),
 ('Admin', '2', NULL, NULL, 'N;'),
 ('Authenticated', '2', 'Authenticated user', NULL, 'N;'),
 ('Comment.*', '1', 'Access all comment actions', NULL, 'N;'),
 ('Comment.Approve', '0', 'Approve comments', NULL, 'N;'),
 ('Comment.Delete', '0', 'Delete comments', NULL, 'N;'),
 ('Comment.Update', '0', 'Update comments', NULL, 'N;'),
 ('CommentAdministration', '1', 'Administration of comments', NULL, 'N;'),
 ('Companies.*', '1', NULL, NULL, 'N;'),
 ('Companies.Index', '0', NULL, NULL, 'N;'),
 ('Companies.Update', '0', NULL, NULL, 'N;'),
 ('Companies.View', '0', NULL, NULL, 'N;'),
 ('Company.*', '1', NULL, NULL, 'N;'),
 ('Company.Index', '0', NULL, NULL, 'N;'),
 ('Currates.*', '1', NULL, NULL, 'N;'),
 ('Currates.Admin', '0', NULL, NULL, 'N;'),
 ('Currates.Create', '0', NULL, NULL, 'N;'),
 ('Currates.Delete', '0', NULL, NULL, 'N;'),
 ('Currates.Getrate', '0', NULL, NULL, 'N;'),
 ('Currates.Index', '0', NULL, NULL, 'N;'),
 ('Currates.Update', '0', NULL, NULL, 'N;'),
 ('Currates.View', '0', NULL, NULL, 'N;'),
 ('Currencies.*', '1', NULL, NULL, 'N;'),
 ('Currencies.Autocomplete', '0', NULL, NULL, 'N;'),
 ('Currencies.Index', '0', NULL, NULL, 'N;'),
 ('Doccheques.*', '1', NULL, NULL, 'N;'),
 ('Doccheques.Admin', '0', NULL, NULL, 'N;'),
 ('Doccheques.Create', '0', NULL, NULL, 'N;'),
 ('Doccheques.Delete', '0', NULL, NULL, 'N;'),
 ('Doccheques.Index', '0', NULL, NULL, 'N;'),
 ('Doccheques.Update', '0', NULL, NULL, 'N;'),
 ('Doccheques.View', '0', NULL, NULL, 'N;'),
 ('Docdetails.*', '1', NULL, NULL, 'N;'),
 ('Docdetails.Admin', '0', NULL, NULL, 'N;'),
 ('Docdetails.Create', '0', NULL, NULL, 'N;'),
 ('Docdetails.Delete', '0', NULL, NULL, 'N;'),
 ('Docdetails.Index', '0', NULL, NULL, 'N;'),
 ('Docdetails.Update', '0', NULL, NULL, 'N;'),
 ('Docdetails.View', '0', NULL, NULL, 'N;'),
 ('Docs.*', '1', NULL, NULL, 'N;'),
 ('Docs.Admin', '0', NULL, NULL, 'N;'),
 ('Docs.Create', '0', NULL, NULL, 'N;'),
 ('Docs.Delete', '0', NULL, NULL, 'N;'),
 ('Docs.Duplicate', '0', NULL, NULL, 'N;'),
 ('Docs.Index', '0', NULL, NULL, 'N;'),
 ('Docs.Status', '0', NULL, NULL, 'N;'),
 ('Docs.Update', '0', NULL, NULL, 'N;'),
 ('Docs.View', '0', NULL, NULL, 'N;'),
 ('Doctype.*', '1', NULL, NULL, 'N;'),
 ('Doctype.Admin', '0', NULL, NULL, 'N;'),
 ('Doctype.Create', '0', NULL, NULL, 'N;'),
 ('Doctype.Delete', '0', NULL, NULL, 'N;'),
 ('Doctype.Index', '0', NULL, NULL, 'N;'),
 ('Doctype.Update', '0', NULL, NULL, 'N;'),
 ('Doctype.View', '0', NULL, NULL, 'N;'),
 ('EavFields.*', '1', NULL, NULL, 'N;'),
 ('EavFields.Admin', '0', NULL, NULL, 'N;'),
 ('EavFields.Create', '0', NULL, NULL, 'N;'),
 ('EavFields.Delete', '0', NULL, NULL, 'N;'),
 ('EavFields.Index', '0', NULL, NULL, 'N;'),
 ('EavFields.Update', '0', NULL, NULL, 'N;'),
 ('EavFields.View', '0', NULL, NULL, 'N;'),
 ('Editor', '2', 'Editor', NULL, 'N;'),
 ('Fields.*', '1', NULL, NULL, 'N;'),
 ('Fields.Admin', '0', NULL, NULL, 'N;'),
 ('Fields.Create', '0', NULL, NULL, 'N;'),
 ('Fields.Delete', '0', NULL, NULL, 'N;'),
 ('Fields.Index', '0', NULL, NULL, 'N;'),
 ('Fields.Update', '0', NULL, NULL, 'N;'),
 ('Fields.View', '0', NULL, NULL, 'N;'),
 ('Guest', '2', 'Guest user', NULL, 'N;'),
 ('Item.*', '1', NULL, NULL, 'N;'),
 ('Item.Admin', '0', NULL, NULL, 'N;'),
 ('Item.Autocomplete', '0', NULL, NULL, 'N;'),
 ('Item.Create', '0', NULL, NULL, 'N;'),
 ('Item.Delete', '0', NULL, NULL, 'N;'),
 ('Item.Index', '0', NULL, NULL, 'N;'),
 ('Item.JSON', '0', NULL, NULL, 'N;'),
 ('Item.Template', '0', NULL, NULL, 'N;'),
 ('Item.Update', '0', NULL, NULL, 'N;'),
 ('Item.View', '0', NULL, NULL, 'N;'),
 ('Itemcategory.*', '1', NULL, NULL, 'N;'),
 ('Itemcategory.Admin', '0', NULL, NULL, 'N;'),
 ('Itemcategory.Create', '0', NULL, NULL, 'N;'),
 ('Itemcategory.Delete', '0', NULL, NULL, 'N;'),
 ('Itemcategory.Index', '0', NULL, NULL, 'N;'),
 ('Itemcategory.Update', '0', NULL, NULL, 'N;'),
 ('Itemcategory.View', '0', NULL, NULL, 'N;'),
 ('Itemunit.*', '1', NULL, NULL, 'N;'),
 ('Itemunit.Admin', '0', NULL, NULL, 'N;'),
 ('Itemunit.Create', '0', NULL, NULL, 'N;'),
 ('Itemunit.Delete', '0', NULL, NULL, 'N;'),
 ('Itemunit.Index', '0', NULL, NULL, 'N;'),
 ('Itemunit.Update', '0', NULL, NULL, 'N;'),
 ('Itemunit.View', '0', NULL, NULL, 'N;'),
 ('Minify.*', '1', NULL, NULL, 'N;'),
 ('Minify.Index', '0', NULL, NULL, 'N;'),
 ('Post.*', '1', 'Access all post actions', NULL, 'N;'),
 ('Post.Admin', '0', 'Administer posts', NULL, 'N;'),
 ('Post.Create', '0', 'Create posts', NULL, 'N;'),
 ('Post.Delete', '0', 'Delete posts', NULL, 'N;'),
 ('Post.Update', '0', 'Update posts', NULL, 'N;'),
 ('Post.View', '0', 'View posts', NULL, 'N;'),
 ('PostAdministrator', '1', 'Administration of posts', NULL, 'N;'),
 ('PostUpdateOwn', '0', 'Update own posts', 'return Yii::app()->user->id==$params[\"userid\"];', 'N;'),
 ('Reports.*', '1', NULL, NULL, 'N;'),
 ('Reports.Contact', '0', NULL, NULL, 'N;'),
 ('Reports.Error', '0', NULL, NULL, 'N;'),
 ('Reports.Index', '0', NULL, NULL, 'N;'),
 ('Reports.Journal', '0', NULL, NULL, 'N;'),
 ('Reports.Login', '0', NULL, NULL, 'N;'),
 ('Reports.Logout', '0', NULL, NULL, 'N;'),
 ('Showdocs.*', '1', NULL, NULL, 'N;'),
 ('Showdocs.Admin', '0', NULL, NULL, 'N;'),
 ('Showdocs.Create', '0', NULL, NULL, 'N;'),
 ('Showdocs.Delete', '0', NULL, NULL, 'N;'),
 ('Showdocs.Index', '0', NULL, NULL, 'N;'),
 ('Showdocs.Status', '0', NULL, NULL, 'N;'),
 ('Showdocs.Update', '0', NULL, NULL, 'N;'),
 ('Showdocs.View', '0', NULL, NULL, 'N;'),
 ('Site.*', '1', NULL, NULL, 'N;'),
 ('Site.Contact', '0', NULL, NULL, 'N;'),
 ('Site.Error', '0', NULL, NULL, 'N;'),
 ('Site.Index', '0', NULL, NULL, 'N;'),
 ('Site.Login', '0', NULL, NULL, 'N;'),
 ('Site.Logout', '0', NULL, NULL, 'N;'),
 ('Users.*', '1', NULL, NULL, 'N;'),
 ('Users.Admin', '0', NULL, NULL, 'N;'),
 ('Users.Create', '0', NULL, NULL, 'N;'),
 ('Users.Delete', '0', NULL, NULL, 'N;'),
 ('Users.Index', '0', NULL, NULL, 'N;'),
 ('Users.Update', '0', NULL, NULL, 'N;'),
 ('Users.View', '0', NULL, NULL, 'N;');



--
-- Structure for table `AuthItemChild`
--

DROP TABLE IF EXISTS `AuthItemChild`;

CREATE TABLE `AuthItemChild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Structure for table `Rights`
--

DROP TABLE IF EXISTS `Rights`;

CREATE TABLE `Rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `Rights`
--

INSERT INTO `Rights` (`itemname`, `type`, `weight`) VALUES
 ('Authenticated', '2', '1'),
 ('Editor', '2', '0'),
 ('Guest', '2', '2');



--
-- Structure for table `accCountry`
--

DROP TABLE IF EXISTS `accCountry`;

CREATE TABLE `accCountry` (
  `id` varchar(2) NOT NULL DEFAULT '',
  `name` varchar(255) DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `accCountry`
--

INSERT INTO `accCountry` (`id`, `name`) VALUES
 ('AD', 'Andorra'),
 ('AE', 'United Arab Emirates'),
 ('AF', 'Afghanistan'),
 ('AG', 'Antigua and Barbuda'),
 ('AI', 'Anguilla'),
 ('AL', 'Albania'),
 ('AM', 'Armenia'),
 ('AN', 'Netherlands Antilles'),
 ('AO', 'Angola'),
 ('AQ', 'Antarctica'),
 ('AR', 'Argentina'),
 ('AS', 'American Samoa'),
 ('AT', 'Austria'),
 ('AU', 'Australia'),
 ('AW', 'Aruba'),
 ('AX', 'Aland Islands'),
 ('AZ', 'Azerbaijan'),
 ('BA', 'Bosnia and Herzegovina'),
 ('BB', 'Barbados'),
 ('BD', 'Bangladesh'),
 ('BE', 'Belgium'),
 ('BF', 'Burkina Faso'),
 ('BG', 'Bulgaria'),
 ('BH', 'Bahrain'),
 ('BI', 'Burundi'),
 ('BJ', 'Benin'),
 ('BL', 'Saint Barthélemy'),
 ('BM', 'Bermuda'),
 ('BN', 'Brunei Darussalam'),
 ('BO', 'Bolivia, Plurinational State of'),
 ('BR', 'Brazil'),
 ('BS', 'Bahamas'),
 ('BT', 'Bhutan'),
 ('BV', 'Bouvet Island'),
 ('BW', 'Botswana'),
 ('BY', 'Belarus'),
 ('BZ', 'Belize'),
 ('CA', 'Canada'),
 ('CC', 'Cocos (Keeling) Islands'),
 ('CD', 'Congo, the Democratic Republic of the'),
 ('CF', 'Central African Republic'),
 ('CG', 'Congo'),
 ('CH', 'Switzerland'),
 ('CI', 'Cote d\'Ivoire'),
 ('CK', 'Cook Islands'),
 ('CL', 'Chile'),
 ('CM', 'Cameroon'),
 ('CN', 'China'),
 ('CO', 'Colombia'),
 ('CR', 'Costa Rica'),
 ('CU', 'Cuba'),
 ('CV', 'Cape Verde'),
 ('CX', 'Christmas Island'),
 ('CY', 'Cyprus'),
 ('CZ', 'Czech Republic'),
 ('DE', 'Germany'),
 ('DJ', 'Djibouti'),
 ('DK', 'Denmark'),
 ('DM', 'Dominica'),
 ('DO', 'Dominican Republic'),
 ('DZ', 'Algeria'),
 ('EC', 'Ecuador'),
 ('EE', 'Estonia'),
 ('EG', 'Egypt'),
 ('EH', 'Western Sahara'),
 ('ER', 'Eritrea'),
 ('ES', 'Spain'),
 ('ET', 'Ethiopia'),
 ('FI', 'Finland'),
 ('FJ', 'Fiji'),
 ('FK', 'Falkland Islands (Malvinas)'),
 ('FM', 'Micronesia, Federated States of'),
 ('FO', 'Faroe Islands'),
 ('FR', 'France'),
 ('GA', 'Gabon'),
 ('GB', 'United Kingdom'),
 ('GD', 'Grenada'),
 ('GE', 'Georgia'),
 ('GF', 'French Guiana'),
 ('GG', 'Guernsey'),
 ('GH', 'Ghana'),
 ('GI', 'Gibraltar'),
 ('GL', 'Greenland'),
 ('GM', 'Gambia'),
 ('GN', 'Guinea'),
 ('GP', 'Guadeloupe'),
 ('GQ', 'Equatorial Guinea'),
 ('GR', 'Greece'),
 ('GS', 'South Georgia and the South Sandwich Islands'),
 ('GT', 'Guatemala'),
 ('GU', 'Guam'),
 ('GW', 'Guinea-Bissau'),
 ('GY', 'Guyana'),
 ('HK', 'Hong Kong'),
 ('HM', 'Heard Island and McDonald Islands'),
 ('HN', 'Honduras'),
 ('HR', 'Croatia'),
 ('HT', 'Haiti'),
 ('HU', 'Hungary'),
 ('ID', 'Indonesia'),
 ('IE', 'Ireland'),
 ('IL', 'Israel'),
 ('IM', 'Isle of Man'),
 ('IN', 'India'),
 ('IO', 'British Indian Ocean Territory'),
 ('IQ', 'Iraq'),
 ('IR', 'Iran, Islamic Republic of'),
 ('IS', 'Iceland'),
 ('IT', 'Italy'),
 ('JE', 'Jersey'),
 ('JM', 'Jamaica'),
 ('JO', 'Jordan'),
 ('JP', 'Japan'),
 ('KE', 'Kenya'),
 ('KG', 'Kyrgyzstan'),
 ('KH', 'Cambodia'),
 ('KI', 'Kiribati'),
 ('KM', 'Comoros'),
 ('KN', 'Saint Kitts and Nevis'),
 ('KP', 'Korea, Democratic People\'s Republic of'),
 ('KR', 'Korea, Republic of'),
 ('KW', 'Kuwait'),
 ('KY', 'Cayman Islands'),
 ('KZ', 'Kazakhstan'),
 ('LA', 'Lao People\'s Democratic Republic'),
 ('LB', 'Lebanon'),
 ('LC', 'Saint Lucia'),
 ('LI', 'Liechtenstein'),
 ('LK', 'Sri Lanka'),
 ('LR', 'Liberia'),
 ('LS', 'Lesotho'),
 ('LT', 'Lithuania'),
 ('LU', 'Luxembourg'),
 ('LV', 'Latvia'),
 ('LY', 'Libyan Arab Jamahiriya'),
 ('MA', 'Morocco'),
 ('MC', 'Monaco'),
 ('MD', 'Moldova, Republic of'),
 ('ME', 'Montenegro'),
 ('MF', 'Saint Martin (French part)'),
 ('MG', 'Madagascar'),
 ('MH', 'Marshall Islands'),
 ('MK', 'Macedonia, the former Yugoslav Republic of'),
 ('ML', 'Mali'),
 ('MM', 'Myanmar'),
 ('MN', 'Mongolia'),
 ('MO', 'Macao'),
 ('MP', 'Northern Mariana Islands'),
 ('MQ', 'Martinique'),
 ('MR', 'Mauritania'),
 ('MS', 'Montserrat'),
 ('MT', 'Malta'),
 ('MU', 'Mauritius'),
 ('MV', 'Maldives'),
 ('MW', 'Malawi'),
 ('MX', 'Mexico'),
 ('MY', 'Malaysia'),
 ('MZ', 'Mozambique'),
 ('NA', 'Namibia'),
 ('NC', 'New Caledonia'),
 ('NE', 'Niger'),
 ('NF', 'Norfolk Island'),
 ('NG', 'Nigeria'),
 ('NI', 'Nicaragua'),
 ('NL', 'Netherlands'),
 ('NO', 'Norway'),
 ('NP', 'Nepal'),
 ('NR', 'Nauru'),
 ('NU', 'Niue'),
 ('NZ', 'New Zealand'),
 ('OM', 'Oman'),
 ('PA', 'Panama'),
 ('PE', 'Peru'),
 ('PF', 'French Polynesia'),
 ('PG', 'Papua New Guinea'),
 ('PH', 'Philippines'),
 ('PK', 'Pakistan'),
 ('PL', 'Poland'),
 ('PM', 'Saint Pierre and Miquelon'),
 ('PN', 'Pitcairn'),
 ('PR', 'Puerto Rico'),
 ('PS', 'Palestinian Territory, Occupied'),
 ('PT', 'Portugal'),
 ('PW', 'Palau'),
 ('PY', 'Paraguay'),
 ('QA', 'Qatar'),
 ('RE', 'Reunion  Réunion'),
 ('RO', 'Romania'),
 ('RS', 'Serbia'),
 ('RU', 'Russian Federation'),
 ('RW', 'Rwanda'),
 ('SA', 'Saudi Arabia'),
 ('SB', 'Solomon Islands'),
 ('SC', 'Seychelles'),
 ('SD', 'Sudan'),
 ('SE', 'Sweden'),
 ('SG', 'Singapore'),
 ('SH', 'Saint Helena'),
 ('SI', 'Slovenia'),
 ('SJ', 'Svalbard and Jan Mayen'),
 ('SK', 'Slovakia'),
 ('SL', 'Sierra Leone'),
 ('SM', 'San Marino'),
 ('SN', 'Senegal'),
 ('SO', 'Somalia'),
 ('SR', 'Suriname'),
 ('ST', 'Sao Tome and Principe'),
 ('SV', 'El Salvador'),
 ('SY', 'Syrian Arab Republic'),
 ('SZ', 'Swaziland'),
 ('TC', 'Turks and Caicos Islands'),
 ('TD', 'Chad'),
 ('TF', 'French Southern Territories'),
 ('TG', 'Togo'),
 ('TH', 'Thailand'),
 ('TJ', 'Tajikistan'),
 ('TK', 'Tokelau'),
 ('TL', 'Timor-Leste'),
 ('TM', 'Turkmenistan'),
 ('TN', 'Tunisia'),
 ('TO', 'Tonga'),
 ('TR', 'Turkey'),
 ('TT', 'Trinidad and Tobago'),
 ('TV', 'Tuvalu'),
 ('TW', 'Taiwan, Province of China'),
 ('TZ', 'Tanzania, United Republic of'),
 ('UA', 'Ukraine'),
 ('UG', 'Uganda'),
 ('UM', 'United States Minor Outlying Islands'),
 ('US', 'United States'),
 ('UY', 'Uruguay'),
 ('UZ', 'Uzbekistan'),
 ('VA', 'Holy See (Vatican City State)'),
 ('VC', 'Saint Vincent and the Grenadines'),
 ('VE', 'Venezuela, Bolivarian Republic of'),
 ('VG', 'Virgin Islands, British'),
 ('VI', 'Virgin Islands, U.S.'),
 ('VN', 'Viet Nam'),
 ('VU', 'Vanuatu'),
 ('WF', 'Wallis and Futuna'),
 ('WS', 'Samoa'),
 ('YE', 'Yemen'),
 ('YT', 'Mayotte'),
 ('ZA', 'South Africa'),
 ('ZM', 'Zambia'),
 ('ZW', 'Zimbabwe');



--
-- Structure for table `accEav`
--

DROP TABLE IF EXISTS `accEav`;

CREATE TABLE `accEav` (
  `entity` bigint(20) unsigned NOT NULL,
  `attribute` varchar(250) NOT NULL,
  `value` text NOT NULL,
KEY `ikEntity` (`entity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `accEav`
--

INSERT INTO `accEav` (`entity`, `attribute`, `value`) VALUES
 ('201', '3', '192.168.0.122'),
 ('201', '4', '192.168.0.111'),
 ('201', '3', '192.168.0.122'),
 ('201', '4', '192.168.0.111');



--
-- Structure for table `accHist`
--

DROP TABLE IF EXISTS `accHist`;

CREATE TABLE `accHist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) unsigned DEFAULT NULL,
  `dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `details` text,
  PRIMARY KEY (`id`),
  KEY `prefix` (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Data for table `accHist`
--

INSERT INTO `accHist` (`id`, `account_id`, `dt`, `details`) VALUES
 ('1', '204', '2011-11-12 00:00:00', 'כייע');



--
-- Structure for table `accId6111`
--

DROP TABLE IF EXISTS `accId6111`;

CREATE TABLE `accId6111` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `percentage` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `accId6111`
--

INSERT INTO `accId6111` (`id`, `name`, `percentage`) VALUES
 ('1010', ' הכנסות ממכירות בארץ', '0'),
 ('1020', ' הכנסות ממכירות לחו\"ל', '0'),
 ('1030', ' הכנסות ממתן שירותים בארץ', '0'),
 ('1040', ' הכנסות ממתן שירותים בחו\"ל', '0'),
 ('1090', ' הכנסות אחרות', '0'),
 ('3510', ' שכר עבודה ונילוות', '0'),
 ('3515', ' ביטוחים', '0'),
 ('3520', ' עבודות חוץ וקבלני משנה', '0'),
 ('3530', ' עמלות ובונוסים לסוכנים', '0'),
 ('3535', ' הוצאות ציוד מתכלה', '0'),
 ('3540', ' שירותים מקצועיים', '0'),
 ('3545', ' הוצאות אריזה', '0'),
 ('3550', ' הוצאות אחזקה ותיקונים', '0'),
 ('3555', ' הוצאות מחקר ופיתוח', '0'),
 ('3560', ' נסיעות', '0'),
 ('3565', ' אחזקת רכב והובלות', '0'),
 ('3570', ' דמי שכירות וניהול נכסים', '0'),
 ('3575', ' מיסים ואגרות', '0'),
 ('3580', ' פחת', '0'),
 ('3590', ' חשמל ומים', '0'),
 ('3595', ' שמירה וניקיון', '0'),
 ('3600', ' השתלמות וספרות מקצועית', '0'),
 ('3610', ' חובות מסופקים ואבודים', '0'),
 ('3620', ' פרסום וקידום מכירות', '0'),
 ('3625', ' כיבודים מתנות תרומות קנסות', '0'),
 ('3640', ' דמי ניהול', '0'),
 ('3650', ' הוצאות דואר ותקשורת', '0'),
 ('3660', ' נסיעות לחו\"ל', '0'),
 ('3665', ' הוצאות משפטיות', '0'),
 ('3680', ' משרדיות', '0'),
 ('3685', ' בגדי עבודה', '0'),
 ('3690', ' שונות נטו וביטולי יתרות', '0'),
 ('5010', ' עמלות בנק', '0'),
 ('5090', ' עמלות כרטיסי אשראי', '0');



--
-- Structure for table `accTemplate`
--

DROP TABLE IF EXISTS `accTemplate`;

CREATE TABLE `accTemplate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `AccType_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `AccType_id` (`AccType_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Data for table `accTemplate`
--

INSERT INTO `accTemplate` (`id`, `name`, `AccType_id`) VALUES
 ('22', 'ניסיון', '0'),
 ('24', 'נכסים', '4');



--
-- Structure for table `accTemplateItem`
--

DROP TABLE IF EXISTS `accTemplateItem`;

CREATE TABLE `accTemplateItem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `AccTemplate_id` int(11) NOT NULL,
  `eavFields_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `AccTemplate_id` (`AccTemplate_id`),
  KEY `eavFields_id` (`eavFields_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Data for table `accTemplateItem`
--

INSERT INTO `accTemplateItem` (`id`, `AccTemplate_id`, `eavFields_id`) VALUES
 ('26', '24', '2'),
 ('27', '24', '1'),
 ('28', '22', '3'),
 ('29', '22', '4');



--
-- Structure for table `accType`
--

DROP TABLE IF EXISTS `accType`;

CREATE TABLE `accType` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `desc` varchar(40) NOT NULL,
  `openformat` varchar(5) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Data for table `accType`
--

INSERT INTO `accType` (`id`, `name`, `desc`, `openformat`) VALUES
 ('0', 'customers', 'Customers', ''),
 ('1', 'suppliers', 'Suppliers', '1'),
 ('2', 'outcomes', 'Outcomes', ''),
 ('3', 'incomes', 'Incomes', ''),
 ('4', 'assets', 'Assets', ''),
 ('5', 'liabilities', 'Liabilities', ''),
 ('6', 'authorities', 'Authorities', ''),
 ('7', 'banks', 'Banks', ''),
 ('8', 'warehouses', 'Warehouses', ''),
 ('9', 'leads', 'Leads', ''),
 ('10', 'contacts', 'Contacts', '');



--
-- Structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;

CREATE TABLE `accounts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` int(11) DEFAULT NULL,
  `id6111` int(10) unsigned DEFAULT NULL,
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
  PRIMARY KEY (`id`),
  KEY `id6111` (`id6111`),
  KEY `owner` (`owner`),
  KEY `type` (`type`),
KEY `parent_account_id` (`parent_account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=214 DEFAULT CHARSET=utf8;

--
-- Data for table `accounts`
--

INSERT INTO `accounts` (`id`, `type`, `id6111`, `pay_terms`, `src_tax`, `src_date`, `parent_account_id`, `name`, `contact`, `department`, `vatnum`, `email`, `phone`, `dir_phone`, `cellular`, `fax`, `web`, `address`, `city`, `zip`, `currency_id`, `comments`, `system_acc`, `owner`, `modified`, `created`) VALUES
 ('1', '6', '0', '0', '0.00', '2013-08-11 15:43:52', '0', 'מע\"מ תשומות', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('2', '6', '0', '0', '0.00', '0000-00-00 00:00:00', '0', 'מע\"מ תשומות ציוד ונכסים', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('3', '6', '0', '0', '0.00', '0000-00-00 00:00:00', '0', 'מע\"מ עסקאות', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('4', '6', '0', '0', '0.00', '0000-00-00 00:00:00', '0', 'מע\"מ חוז', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('5', '6', '0', '0', '0.00', '0000-00-00 00:00:00', '0', 'ניכוי במקור מספקים', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('6', '4', '0', '0', '0.00', '0000-00-00 00:00:00', '0', 'עיגול סכומים', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('7', '4', '0', '0', '0.00', '0000-00-00 00:00:00', '0', 'קופת שיקים', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('8', '6', '0', '0', '0.00', '0000-00-00 00:00:00', '0', 'ניכוי במקור מלקוחות', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('9', '4', '0', '0', '0.00', '0000-00-00 00:00:00', '0', 'יתרות פתיחה', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('10', '4', '0', '0', '0.00', '0000-00-00 00:00:00', '0', 'קופת מזומן', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('11', '4', '0', '0', '0.00', '0000-00-00 00:00:00', '0', 'קופת אשראי', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('13', '6', '0', '0', '0.00', '0000-00-00 00:00:00', '0', 'מס הכנסה מקדמות', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('14', '6', '0', '0', '0.00', '0000-00-00 00:00:00', '0', 'ביטוח לאומי חו\"ז', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('15', '6', '0', '0', '0.00', '0000-00-00 00:00:00', '0', 'ביטוח לאומי', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('16', '6', '0', '0', '0.00', '0000-00-00 00:00:00', '0', 'מס הכנסה', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('17', '2', '0', '0', '0.00', '0000-00-00 00:00:00', '0', 'שווי שימוש', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('18', '2', '3510', '0', '0.00', '0000-00-00 00:00:00', '0', 'שכר עבודה', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('30', '2', '3575', '0', '0.00', '0000-00-00 00:00:00', '0', 'אגרות', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('31', '2', '3550', '0', '100.00', '0000-00-00 00:00:00', '0', 'אחזקת אתר אינטרנט', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('32', '2', '3550', '0', '100.00', '0000-00-00 00:00:00', '0', 'אחזקת משרד', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('33', '2', '3565', '0', '100.00', '0000-00-00 00:00:00', '0', 'אחזקת רכב', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('34', '2', '3565', '0', '66.66', '0000-00-00 00:00:00', '0', 'אחזקת רכב', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('35', '2', '3545', '0', '100.00', '0000-00-00 00:00:00', '0', 'אריזות', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('36', '2', '3575', '0', '0.00', '0000-00-00 00:00:00', '0', 'ארנונה', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('37', '2', '3650', '0', '100.00', '0000-00-00 00:00:00', '0', 'בולים', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('38', '2', '3685', '0', '100.00', '0000-00-00 00:00:00', '0', 'ביגוד מקצועי', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('39', '2', '3515', '0', '0.00', '0000-00-00 00:00:00', '0', 'ביטוח אחר', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('40', '2', '3515', '0', '0.00', '0000-00-00 00:00:00', '0', 'ביטוח אחריות מקצועית', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('41', '2', '3515', '0', '0.00', '0000-00-00 00:00:00', '0', 'ביטוח משרד', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('42', '2', '3515', '0', '0.00', '0000-00-00 00:00:00', '0', 'ביטוח צד ג', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('43', '2', '3515', '0', '0.00', '0000-00-00 00:00:00', '0', 'ביטוח ציוד', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('44', '2', '3650', '0', '100.00', '0000-00-00 00:00:00', '0', 'דואר', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('45', '2', '3565', '0', '25.00', '0000-00-00 00:00:00', '0', 'דלק', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('46', '2', '3565', '0', '100.00', '0000-00-00 00:00:00', '0', 'דלק', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('47', '2', '3575', '0', '0.00', '0000-00-00 00:00:00', '0', 'דמי חבר', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('48', '2', '3575', '0', '0.00', '0000-00-00 00:00:00', '0', 'דמי חבר', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('49', '2', '3680', '0', '100.00', '0000-00-00 00:00:00', '0', 'הדפסות', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('50', '2', '3565', '0', '100.00', '0000-00-00 00:00:00', '0', 'הובלות', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('51', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', 'הנהלת חשבונות', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('52', '2', '3600', '0', '100.00', '0000-00-00 00:00:00', '0', 'השתלמות מקצועית', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('53', '2', '3565', '0', '100.00', '0000-00-00 00:00:00', '0', 'חנייה', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('54', '2', '3590', '0', '100.00', '0000-00-00 00:00:00', '0', 'חשמל', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('55', '2', '3650', '0', '100.00', '0000-00-00 00:00:00', '0', 'טלפון קווי', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('56', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', 'יחסי ציבור', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('57', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', 'יעוץ אחר', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('58', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', 'יעוץ כלכלי', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('59', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', 'יעוץ מס', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('60', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', 'יעוץ מקצועי', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('61', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', 'יעוץ משפטי', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('62', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', 'יעוץ שיווקי', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('63', '2', '3625', '0', '100.00', '0000-00-00 00:00:00', '0', 'כיבוד קל בבית העסק', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('64', '2', '3625', '0', '66.66', '0000-00-00 00:00:00', '0', 'כיבוד קל בבית העסק', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('65', '2', '3560', '0', '100.00', '0000-00-00 00:00:00', '0', 'כרטיס אוטובוס', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('66', '2', '3560', '0', '100.00', '0000-00-00 00:00:00', '0', 'כרטיס רכבת', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('67', '2', '3565', '0', '0.00', '0000-00-00 00:00:00', '0', 'ליסינג', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('68', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', 'מחשוב', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('69', '2', '3650', '0', '100.00', '0000-00-00 00:00:00', '0', 'מנוי אינטרנט', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('70', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', 'מנוי הנהלת חשבונות', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('71', '2', '3650', '0', '100.00', '0000-00-00 00:00:00', '0', 'מעטפות', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('72', '2', '3690', '0', '100.00', '0000-00-00 00:00:00', '0', 'משלוחים', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('73', '2', '3665', '0', '100.00', '0000-00-00 00:00:00', '0', 'משפטיות', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('74', '2', '3680', '0', '100.00', '0000-00-00 00:00:00', '0', 'משרדיות', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('75', '2', '3690', '0', '100.00', '0000-00-00 00:00:00', '0', 'מתנות לחג ללקוחות וספקים', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('76', '2', '3595', '0', '100.00', '0000-00-00 00:00:00', '0', 'ניקיון', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('77', '2', '3660', '0', '0.00', '0000-00-00 00:00:00', '0', 'נסיעות לחו\"ל', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('78', '2', '3650', '0', '100.00', '0000-00-00 00:00:00', '0', 'סלולר', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('79', '2', '3650', '0', '66.66', '0000-00-00 00:00:00', '0', 'סלולר', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('80', '2', '3600', '0', '100.00', '0000-00-00 00:00:00', '0', 'ספרות מקצועית', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('81', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', 'עיצוב גרפי', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('82', '2', '5090', '0', '100.00', '0000-00-00 00:00:00', '0', 'עמלות PAYPAL', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('83', '2', '5010', '0', '0.00', '0000-00-00 00:00:00', '0', 'עמלות בנק', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('84', '2', '5090', '0', '100.00', '0000-00-00 00:00:00', '0', 'עמלות כרטיסי אשראי', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('85', '2', '3580', '0', '0.00', '0000-00-00 00:00:00', '0', 'פחת', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('86', '2', '3620', '0', '100.00', '0000-00-00 00:00:00', '0', 'פרסום', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('87', '2', '3520', '0', '100.00', '0000-00-00 00:00:00', '0', 'קבלני משנה', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('88', '2', '3620', '0', '100.00', '0000-00-00 00:00:00', '0', 'קידום מכירות', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('89', '2', '1340', '0', '0.00', '0000-00-00 00:00:00', '0', 'קניות בחו\"ל', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('90', '2', '3565', '0', '0.00', '0000-00-00 00:00:00', '0', 'רשיון רכב', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('91', '2', '3690', '0', '100.00', '0000-00-00 00:00:00', '0', 'שונות', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('92', '2', '3620', '0', '100.00', '0000-00-00 00:00:00', '0', 'שיווק', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('93', '2', '3570', '0', '100.00', '0000-00-00 00:00:00', '0', 'שכירת משרד', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('94', '2', '3570', '0', '100.00', '0000-00-00 00:00:00', '0', 'שכירת ציוד', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('95', '2', '3565', '0', '0.00', '0000-00-00 00:00:00', '0', 'שכירת רכב', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('96', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', 'שכר טרחה רואה חשבון', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('97', '2', '3690', '0', '100.00', '0000-00-00 00:00:00', '0', 'שליחויות', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('98', '2', '3595', '0', '100.00', '0000-00-00 00:00:00', '0', 'שמירה', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('99', '2', '3550', '0', '100.00', '0000-00-00 00:00:00', '0', 'תיקונים', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('100', '3', '1010', '0', '18.00', '2013-08-19 15:03:50', '0', 'מכירת מוצרים בארץ', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('101', '3', '1020', '0', '16.00', '2013-08-19 15:03:57', '0', 'מכירת שרותים בארץ', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('102', '3', '1030', '0', '0.00', '2013-08-19 15:04:06', '0', 'מכירת מוצרים בחו\"ל', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('103', '3', '1040', '0', '0.00', '2013-08-19 15:04:11', '0', 'מכירת שרותים בחו\"ל', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('107', '2', '0', '0', '0.00', '0000-00-00 00:00:00', '0', 'קניות', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('109', '2', '0', '0', '0.00', '0000-00-00 00:00:00', '0', 'הוצאות שונות', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('110', '1', '0', '0', '0.00', '0000-00-00 00:00:00', '0', 'עובדים חו\"ז', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('111', '2', '3565', '0', '66.66', '0000-00-00 00:00:00', '0', 'דלק', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('112', '2', '3680', '0', '0.00', '0000-00-00 00:00:00', '0', 'תקשורת', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('113', '0', '0', '0', '0.00', '0000-00-00 00:00:00', '0', 'לקוחות שונים', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('114', '1', '0', '0', '0.00', '0000-00-00 00:00:00', '0', 'ספקים שונים', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('150', '7', '0', '0', '0.00', '2013-08-19 15:04:18', '0', 'בנק דיסקונט 433', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('151', '2', '0', '0', '0.00', '0000-00-00 00:00:00', '0', 'עמלות בנקים', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('201', '0', '1010', '0', '0.00', '2013-06-18 15:15:18', '0', 'משרד הבטחון', '', '', '123345678', 'nirshahrur3@gmail.com', '09876543201', '', '', '', 'http://www.idf.co.il', '', 'רעננה', '42234', 'USD', '', '0', '1', '2013-09-12 10:20:56', '0000-00-00 00:00:00'),
 ('202', '0', '0', '30', '0.00', '2013-06-18 15:19:15', '0', 'קיבוץ נירים', '', '', '51080921', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('203', '0', '0', '-30', '0.00', '2013-08-19 15:04:31', '0', 'יעקב בן יוסף', 'יוסף חן', '', '334244435', '', '0771234567', '052766868', '', '0722512343', '', 'דרך השלום 7', 'ראשון לציון', '23345', 'ILS', '', '0', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('204', '0', '0', '-90', '0.00', '2013-08-19 15:05:54', '0', 'חנות מחשבים', '', '', '534645768', '', '0771234567', '052766868', '', '0722512343', '', 'דה האז 1', 'תל אביב', '42234', 'ILS', '', '0', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('205', '2', '3690', '0', '100.00', '0000-00-00 00:00:00', '0', 'רכש סחורה למכירה', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('206', '0', '1010', NULL, '0.00', '2013-08-19 15:06:01', NULL, 'Google Inc', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('207', NULL, '1010', NULL, '0.00', NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('208', NULL, '1010', NULL, '0.00', NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('209', NULL, '1010', NULL, '0.00', NULL, NULL, 'חשבון הכנסות5  מעמ', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('210', '3', '1010', NULL, '5.00', '2013-08-21 14:26:10', NULL, 'חשבון הכנסות 5 מעמ', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('212', '0', '1010', NULL, '0.00', NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('213', '3', '1010', NULL, '0.00', NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');



--
-- Structure for table `bankName`
--

DROP TABLE IF EXISTS `bankName`;

CREATE TABLE `bankName` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `bankName`
--

INSERT INTO `bankName` (`id`, `name`) VALUES
 ('1', 'בנק יורו טרייד'),
 ('4', 'בנק יהב לעובדי המדינה'),
 ('6', 'בנק אדנים'),
 ('7', 'בנק לפיתוח התעשיה'),
 ('8', 'בנק הספנות לישראל'),
 ('9', 'בנק הדואר'),
 ('10', 'בנק לאומי'),
 ('11', 'בנק דיסקונט'),
 ('12', 'בנק הפועלים'),
 ('13', 'בנק איגוד'),
 ('14', 'בנק אוצר החייל'),
 ('17', 'בנק מרכנתיל דיסקונט'),
 ('19', 'בנק החקלאות לישראל'),
 ('20', 'בנק מזרחי טפחות'),
 ('22', 'Citibank N.A'),
 ('23', 'HSBC'),
 ('25', 'BNP Paribas Israel'),
 ('26', 'יובנק בע\"מ'),
 ('31', 'הבנק הבינלאומי הראשון '),
 ('34', 'בנק ערבי ישראלי'),
 ('39', 'SBI State Bank of India'),
 ('46', 'בנק מסד'),
 ('48', 'קופת העובד הלאומי'),
 ('52', 'בנק פועלי אגודת ישראל'),
 ('54', 'בנק ירושלים'),
 ('67', 'Arab Land Bank'),
 ('68', 'בנק אוצר השלטון המקומי'),
 ('77', 'בנק לאומי למשכנתאות בע\"מ'),
 ('90', 'בנק דיסקונט למשכנתאות'),
 ('99', 'בנק ישראל');



--
-- Structure for table `bankbook`
--

DROP TABLE IF EXISTS `bankbook`;

CREATE TABLE `bankbook` (
  `num` int(10) unsigned DEFAULT NULL,
  `account` int(11) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `details` varchar(60) DEFAULT NULL,
  `refnum` char(10) DEFAULT NULL,
  `sum` decimal(8,2) DEFAULT NULL,
  `total` decimal(8,2) DEFAULT NULL,
  `cor_num` varchar(30) DEFAULT NULL,
KEY `num` (`num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `bankbook`
--

INSERT INTO `bankbook` (`num`, `account`, `date`, `details`, `refnum`, `sum`, `total`, `cor_num`) VALUES
 ('12', '150', '2011-10-19 00:00:00', 'הע. אינטרנט700', '9608', '-6000.00', '-7156.76', '0'),
 ('11', '150', '2011-10-16 00:00:00', 'XXXXXXXXXXXXXX', '180140', '-84.33', '-1156.76', '0'),
 ('10', '150', '2011-10-16 00:00:00', '\"לאומי קארד בע', '34685', '-375.36', '-1072.43', '0'),
 ('9', '150', '2011-10-16 00:00:00', 'כרטיסי אשראי ל', '8547', '-1060.63', '-697.07', '0'),
 ('7', '150', '2012-01-01 00:00:00', '123456789', '2324', '-3000.00', '100640.00', '0'),
 ('6', '150', '2012-01-01 00:00:00', '123456789', '2324', '40.00', '103640.00', '0'),
 ('8', '150', '2011-11-01 00:00:00', '12345TEST10875', '1122', '100.00', '-24021.03', '0'),
 ('5', '150', '2012-01-01 00:00:00', '123456789', '2324', '92000.00', '103600.00', '0'),
 ('4', '150', '2012-01-01 00:00:00', '123456789', '2324', '5800.00', '11600.00', '0'),
 ('3', '150', '2012-01-01 00:00:00', '123456789', '2324', '800.00', '5800.00', '0'),
 ('2', '150', '2012-01-01 00:00:00', '123456789', '2324', '5000.00', '5000.00', '0'),
 ('1', '150', '2012-01-01 00:00:00', '123456789', '2324', '3400.00', '0.00', '0'),
 ('13', '150', '2011-10-21 00:00:00', 'קצבת ילדים    ', '13104', '169.00', '-6987.76', '0');



--
-- Structure for table `blackList`
--

DROP TABLE IF EXISTS `blackList`;

CREATE TABLE `blackList` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `value` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;

CREATE TABLE `companies` (
  `companyname` varchar(80) DEFAULT NULL,
  `manager` varchar(80) DEFAULT NULL,
  `regnum` char(10) DEFAULT NULL,
  `address` varchar(128) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `zip` char(6) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `cellular` varchar(50) DEFAULT NULL,
  `web` varchar(128) DEFAULT NULL,
  `tax` decimal(4,2) DEFAULT NULL,
  `taxrep` int(11) DEFAULT NULL,
  `vat` decimal(4,2) DEFAULT NULL,
  `vatrep` int(11) DEFAULT NULL,
  `template` varchar(128) DEFAULT NULL,
  `logo` text,
  `header` varchar(255) DEFAULT NULL,
  `footer` varchar(255) DEFAULT NULL,
  `doc_template` varchar(128) DEFAULT NULL,
  `receipt_template` varchar(128) DEFAULT NULL,
  `invoice_receipt_template` varchar(128) DEFAULT NULL,
  `bidi` int(11) NOT NULL,
  `credit` int(11) NOT NULL,
  `credituser` varchar(10) NOT NULL,
  `creditpwd` varchar(10) NOT NULL,
  `creditallow` varchar(200) NOT NULL,
  `num1` int(11) DEFAULT NULL,
  `num2` int(11) DEFAULT NULL,
  `num3` int(11) DEFAULT NULL,
  `num4` int(11) DEFAULT NULL,
  `num5` int(11) DEFAULT NULL,
  `num6` int(11) DEFAULT NULL,
  `num7` int(11) DEFAULT NULL,
  `num8` int(11) DEFAULT NULL,
  `num9` int(11) DEFAULT NULL,
  `num10` int(11) DEFAULT NULL,
  `num12` int(11) DEFAULT NULL,
`num11` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Data for table `companies`
--

INSERT INTO `companies` (`companyname`, `manager`, `regnum`, `address`, `city`, `zip`, `phone`, `cellular`, `web`, `tax`, `taxrep`, `vat`, `vatrep`, `template`, `logo`, `header`, `footer`, `doc_template`, `receipt_template`, `invoice_receipt_template`, `bidi`, `credit`, `credituser`, `creditpwd`, `creditallow`, `num1`, `num2`, `num3`, `num4`, `num5`, `num6`, `num7`, `num8`, `num9`, `num10`, `num12`, `num11`) VALUES
 ('קריסטל בע&quot;מ', 'אדם', '67866889', 'החשמונאים 121', 'תל אביב', '90210', '0771234567', '0777654321', '', '10.00', '2', '17.00', '1', '', '40f26e6e5928a9756309e91c6368d8f745f8ff8c.png', '', '', '', '', '', '2', '1', '123', '321', 'a:4:{i:1;s:2:\"on\";i:2;s:2:\"on\";i:3;s:2:\"on\";i:4;s:2:\"on\";}', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL);



--
-- Structure for table `config`
--

DROP TABLE IF EXISTS `config`;

CREATE TABLE `config` (
  `id` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `eavType` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `config`
--

INSERT INTO `config` (`id`, `value`, `eavType`) VALUES
 ('company.acc.assetvat', '3', 'integer'),
 ('company.acc.buyvat', '1', 'integer'),
 ('company.acc.custtax', '8', 'integer'),
 ('company.acc.openbalance', '9', 'integer'),
 ('company.acc.payvat', '4', 'integer'),
 ('company.acc.sellvat', '3', 'int'),
 ('company.address', 'גבעת גאולה 1', 'string'),
 ('company.city', 'רמת גן', 'string'),
 ('company.cur', 'ILS', 'list(curRates)'),
 ('company.logo', '', ''),
 ('company.name', 'נכסעים בעמ', 'string'),
 ('company.path', 'test', 'string'),
 ('company.pdfprint', 'true', 'boolean'),
 ('company.seccur', 'USD', 'list(curRates)'),
 ('company.stock', 'false', 'boolean'),
 ('company.transaction', '75', 'int'),
 ('company.vat.id', '69924504', 'int'),
 ('company.vat.type', '1', 'int'),
 ('company.zip', '52215', 'string'),
 ('paypal.apiLive', 'false', 'boolean'),
 ('paypal.apiPassword', '1377498089', ''),
 ('paypal.apiSignature', 'AAIVQYQw1NM1GpwV39qoyAlLZqNaArnmriH3xY5IQg-ENXEhq9jz27IB', ''),
 ('paypal.apiUsername', 'adam2314-facilitator_api1.gmail.com', ''),
 ('server.checkTime', '20130324114336', ''),
 ('server.dbVersion', '2.21', ''),
 ('server.Latest', '', ''),
 ('server.Version', '2.21', ''),
 ('server.wkhtmltopdf', 'xvfb-run -a -s \"-screen 0 1024x768x16\" wkhtmltopdf', 'string'),
 ('transactionType.manual', '0', 'integer'),
 ('transactionType.openBalance', '16', 'integer');



--
-- Structure for table `creditErrorCode`
--

DROP TABLE IF EXISTS `creditErrorCode`;

CREATE TABLE `creditErrorCode` (
  `ErrorID` int(3) NOT NULL DEFAULT '0',
  `ErrorText` varchar(158) DEFAULT NULL,
PRIMARY KEY (`ErrorID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Data for table `creditErrorCode`
--

INSERT INTO `creditErrorCode` (`ErrorID`, `ErrorText`) VALUES
 ('0', 'עסקה תקינה.'),
 ('1', 'חסום החרם כרטיס.'),
 ('2', 'גנוב החרם כרטיס.'),
 ('3', 'התקשר לחברת האשראי.'),
 ('4', 'סירוב.'),
 ('5', 'מזויף החרם כרטיס.'),
 ('6', 'ת.ז או CVV שגויים.'),
 ('7', 'חובה להתקשר לחברת האשראי.'),
 ('8', 'תקלה בבניית מפתח גישה לקובץ חסומים.'),
 ('9', 'לא הצליח להתקשר, התקשר לחברת האשראי.'),
 ('10', 'תוכנית הופסקה עפ\"י הוראת המפעיל (ESC) או COMPORT לא ניתן לפתיחה (WINDOWS).'),
 ('15', 'אין התאמה בין המספר שהוקלד לפס המגנטי.'),
 ('17', 'לא הוקלדו 4 הספרות האחרונות.'),
 ('19', 'רשומה בקובץ INT_IN קצרה מ-16 תווים.'),
 ('20', 'קובץ קלט (INT_IN) לא קיים.'),
 ('21', 'קובץ חסומים (NEG) לא קיים או לא מעודכן - בצע שידור או בקשה לאישור עבור כל עסקה.'),
 ('22', 'אחד מקבצי הפרמטרים או ווקטורים לא קיים.'),
 ('23', 'קובץ תאריכים (DATA) לא קיים.'),
 ('24', 'קובץ אתחול (START) לא קיים.'),
 ('25', 'הפרש בימים בקליטת חסומים גדול מדי - בצע שידור או בקשה לאישור עבור כל עסקה.'),
 ('26', 'הפרש דורות בקליטת חסומים גדול מדי - בצע שידור או בקשה לאישור עבור כל עסקה.'),
 ('27', 'כאשר לא הוכנס פס מגנטי כולו הגדר עסקה כעסקה טלפונית או כעסקת חתימה בלבד.'),
 ('28', 'מספר מסוף מרכזי לא הוכנס למסוף המוגדר לעבודה כרב ספק.'),
 ('29', 'מספר מוטב לא הוכנס למסוף המוגדר לעבודה כרב מוטב.'),
 ('30', 'מסוף שאינו מעודכן כרב ספק/רק מוטב והוקלד מס\' ספק/מס\' מוטב.'),
 ('31', 'מסוך מעודכן כרב ספק והוקלד גם כמס\' מוטב.'),
 ('32', 'קובץ חסומים ישן מדי - בצע תקשורת או בקש אישור עבור כל עסקה .'),
 ('33', 'כרטיס לא תקין.'),
 ('34', 'כרטיס לא רשאי לבצע במסוף זה או אין אישור לעסקה כזאת.'),
 ('35', 'כרטיס לא רשאי לבצע עסקה עם סוג אשראי זה.'),
 ('36', 'פג תוקף'),
 ('37', 'שגיאה בתשלומים - סכום עסקה צריך להיות שווה תשלום ראשון + (תשלום קבוע כפול מס\' תשלומים)'),
 ('38', 'לא ניתן לבצע עסקה מעל תקרה לכרטיס אשראי חיוב מיידי.'),
 ('39', 'סיפרת ביקורת לא תקינה.'),
 ('40', 'מסוף שמוגדר כרב מוטב הוקלד מס\' ספק.'),
 ('41', 'מעל תקרה, אך קובץ מכיל הוראה לא לבצע שאילתא (J1,J2,J3).'),
 ('42', 'חסום בספק, אך קובץ הקלט מכיל הוראה לא לבצע שאילתא (J1,J2,J3).'),
 ('43', 'אקראית, אך קובץ הקלט מכיל הוראה לא לבצע שאילתא (J1,J2,J3).'),
 ('44', 'מסוף לא רשאי לבקש אישור ללא עסקה, אך קובץ הקלט מכיל (J5).'),
 ('45', 'מסוף לא רשאי לבצע אישור ביוזמתו, אך קובץ הקלט מכיל (J6).'),
 ('46', 'יש לבקש אישור, אך קובץ הקלט מכיל הוראה לא לבצע שאילתא (J1,J2,J3).'),
 ('47', 'יש לבקש אישור בשל בעיה הקשורה לקכ\"ח אך קובץ הקלט מכיל הוראה לא לבצע שאילתא.'),
 ('51', 'מספר רכב לא תקין.'),
 ('52', 'מד מרחק לא הוקלד.'),
 ('53', 'מסוף לא מוגדר כתחנת דלק. (הועבר כרטיס דלק או קוד עסקה לא מתאים).'),
 ('57', 'לא הוקלד מספר תעודת זהות.'),
 ('58', 'לא הוקלד CVV2.'),
 ('59', 'לא הוקלדו מספר תעודת הזהות וה-CVV2.'),
 ('60', 'צרוף ABS לא נמצא בהתחלת נתוני קלט בזיכרון.'),
 ('61', 'מספר כרטיס לא נמצא או נמצא פעמיים.'),
 ('62', 'סוג עסקה לא תקין.'),
 ('63', 'קוד עסקה לא תקין.'),
 ('64', 'סוג אשראי לא תקין.'),
 ('65', 'מטבע לא תקין.'),
 ('66', 'קיים תשלום ראשון ו/או תשלום קבוע לסוג אשראי שונה מתשלומים.'),
 ('67', 'קיים מספר תשלומים לסוג אשראי שאינו דורש זה.'),
 ('68', 'לא ניתן להצמיד לדולר או למדד לסוג אשראי שונה מתשלומים.'),
 ('69', 'אורך הפס המגנטי קצר מידי.'),
 ('70', 'לא מוגדר מכשיר להקשת מספר סודי.'),
 ('71', 'חובה להקליד מספר סודי.'),
 ('72', 'קכ\"ח לא זמין - העבר בקורא מגנטי.'),
 ('73', 'הכרטיס נושא שבב ויש להעבירו דרך הקכ\"ח.'),
 ('74', 'דחייה - כרטיס נעול.'),
 ('75', 'דחייה - פעולה עם קכ\"ח לא הסתיימה בזמן הראוי.'),
 ('76', 'דחייה - נתונים אשר התקבלו מקכ\"ח אינם מוגדרים במערכת.'),
 ('77', 'הוקש מספר סודי שגוי.'),
 ('80', 'הוכנס \"קוד מועדון\" לסוג אשראי לא מתאים.'),
 ('99', 'לא מצליח לקרוא/לכתוב/לפתוח קובץ TRAN.'),
 ('101', 'אין אישור מחברת אשראי לעבודה.'),
 ('106', 'למסוף אין אישור לביצוע שאילתא לאשראי חיוב מיידי.'),
 ('107', 'סכום העסקה גדול מדי - חלק למספר העסקאות.'),
 ('108', 'למסוף אין אישור לבצע עסקאות מאולצות.'),
 ('109', 'למסוף אין אישור לכרטיס עם קוד השרות 587.'),
 ('110', 'למסוף אין אישור לכרטיס חיוב מיידי.'),
 ('111', 'למסוף אין אישור לעסקה בתשלומים.'),
 ('112', 'למסוף אין אישור לעסקה טלפון/חתימה בלבד בתשלומים.'),
 ('113', 'למסוף אין אישור לעסקה טלפונית.'),
 ('114', 'למסוף אין אישור לעסקה \"חתימה בלבד\".'),
 ('115', 'למסוף אין אישור לעסקה בדולרים.'),
 ('116', 'למסוף אין אישור לעסקת מועדון.'),
 ('117', 'למסוף אין אישור לעסקת כוכבים/נקודות/מיילים.'),
 ('118', 'למסוף אין אישור לאשראי ישראקרדיט.'),
 ('119', 'למסוף אין אישור לאשראי אמקס קרדיט.'),
 ('120', 'למסוף אין אישור להצמדה לדולר.'),
 ('121', 'למסוף אין אישור להצמדה למדד.'),
 ('122', 'למסוף אין אישור להצמדה למדד לכרטיסי חו\"ל.'),
 ('123', 'למסוף אין אישור לעסקת כוכבים/נקודות/מיילים לסוג אשראי זה.'),
 ('124', 'למסוף אין אישור לאשראי קרדיט בתשלומים לכרטיסי ישראכרט.'),
 ('125', 'למסוף אין אישור לאשראי קרדיט בתשלומים לכרטיסי אמקס.'),
 ('126', 'למסוף אין אישור לקוד מועדון זה.'),
 ('127', 'למסוף אין אישור לעסקת חיוב מיידי פרט לכרטיסי חיוב מיידי.'),
 ('128', 'למסוף אין אישור לקבל כרטיסי ויזה אשר מתחילים ב-3.'),
 ('129', 'למסוף אין אישור לבצע עסקת זכות מעל תקרה.'),
 ('130', 'כרטיס לא רשאי לבצע עסקת מועדון.'),
 ('131', 'כרטיס לא רשאי לבצע עסקת כוכבים/נקודות/מיילים.'),
 ('132', 'כרטיס לא רשאי לבצע עסקאות בדולרים (רגילות או טלפוניות).'),
 ('133', 'כרטיס לא תקף על פי רשימת כרטיסים תקפים של ישראכרט.'),
 ('134', 'כרטיס לא תקין עפ\"י הגדרת המערכת (VECTOR1 של ישראכרט) - מס\' הספרות בכרטיס - שגוי.'),
 ('135', 'כרטיס לא רשאי לבצע עסקאות דולריות עפ\"י הגדרת המערכת (VECTOR1 של ישראכרט).'),
 ('136', 'הכרטיס שיין לקבוצת כרטיסים אשר אינה רשאית לבצע עסקאות עפ\"י הגדרת המערכת (VECTOR20 של ויזה).'),
 ('137', 'קידומת הכרטיס (7 ספרות) לא תקפה עפ\"י הגדרת המערכת (VECTOR21 של דיינרס).'),
 ('138', 'כרטיס לא רשאי לבצע עסקאות בתשלומים על פי רשימת כרטיסים תקפים של ישראכרט.'),
 ('139', 'מספר תשלומים גדול מידי על פי רשימת כרטיסים תקפים של ישראכרט.'),
 ('140', 'כרטיסי ויזה ודיינרס לא רשאים לבצע עסקאות מועדון בתשלומים.'),
 ('141', 'סידרת כרטיסים לא תקפה עפ\"י הגדרת המערכת (VECTOR5 של ישראכרט).'),
 ('142', 'קוד שרות לא תקף עפ\"י הגדרת המערכת (VECTOR6 של ישראכרט).'),
 ('143', 'קידומת הכרטיס (2 ספרות) לא תקפה עפ\"י הגדרת המערכת (VECTOR7 של ישראכרט).'),
 ('144', 'קוד שרות לא תקף עפ\"י הגדרת המערכת (VECTOR12 של ויזה).'),
 ('145', 'קוד שרות לא תקף עפ\"י הגדרת המערכת (VECTOR13 של ויזה).'),
 ('146', 'לכרטיס חיוב מיידי אסור לבצע עסקאות זכות.'),
 ('147', 'כרטיס לא רשאי לבצע עסקאות בתשלומים עפ\"י וקטור 31 של לאומיקארד.'),
 ('148', 'כרטיס לא רשאי לבצע עסקאות טלפוניות וחתימה בלבד עפ\"י וקטור 31 של לאומיקארד.'),
 ('149', 'כרטיס לא רשאי לבצע עסקאות טלפוניות עפ\"י וקטור 31 של לאומיקארד.'),
 ('150', 'אשראי לא מאושר לכרטיסי חיוב מיידי.'),
 ('151', 'אשראי לא מאושר לכרטיסי חו\"ל.'),
 ('152', 'קוד מועדון לא תקין.'),
 ('153', 'כרטיס לא רשאי לבצע עסקאות אשראי גמיש (עדיף +30/) עפ\"י הגדרת המערכת (VECTOR21 של דיינרס).'),
 ('154', 'כרטיס לא רשאי לבצע עסקאות חיוב מיידי עפ\"י הגדרת המערכת (VECTOR21 של דיינרס).'),
 ('155', 'סכום המינימלי לתשלום בעסקת קרדיט קטן מידי.'),
 ('156', 'מספר תשלומים לעסקת קרדיט לא תקין.'),
 ('157', 'תקרה 0 לסוג כרטיס זה בעסקה עם אשראי רגיל או קרדיט.'),
 ('158', 'תקרה 0 לסוג כרטיס זה בעסקה עם אשראי חיוב מיידי.'),
 ('159', 'תקרה 0 לסוג כרטיס זה בעסקת חיוב מיידי בדולרים.'),
 ('160', 'תקרה 0 לסוג כרטיס זה בעסקה טלפונית.'),
 ('161', 'תקרה 0 לסוג כרטיס זה בעסקת זכות.'),
 ('162', 'תקרה 0 לסוג כרטיס זה בעסקת תשלומים.'),
 ('163', 'כרטיס אמריקן אקספרס אשר הונפק בחו\"ל לא רשאי לבצע עסקאות בתשלומים.'),
 ('164', 'כרטיסי אשראי JCB רשאי לבצע עסקאות רק באשראי רגיל.'),
 ('165', 'סכום בכוכבים/נקודות/מיילים גדול מסכום העסקה.'),
 ('166', 'כרטיס מועדון לא בתחום של המסוף.'),
 ('167', 'לא ניתן לבצע עסקת כוכבים/נקודות/מיילים בדולרים.'),
 ('168', 'למסוף אין אישור לעסקה דולרית עם סוג אשראי זה.'),
 ('169', 'לא ניתן לבצע עסקת זכות עם אשראי שונה מהרגיל.'),
 ('170', 'סכום הנחה בכוכבים/נקודות/מיילים גדול מהמותר.'),
 ('171', 'לא ניתן לבצע עסקה מאולצת לכרטיס/אשראי חיוב מיידי.'),
 ('172', 'לא ניתן לבטל עסקה קודמת (עסקת זכות או מספר כרטיס אינו זהה).'),
 ('173', 'עסקה כפולה.'),
 ('174', 'למסוף אין אישור להצמדה למדד לאשראי זה.'),
 ('175', 'למסוף אין אישור להצמדה לדולר לאשראי זה.'),
 ('176', 'כרטיס אינו תקף עפ\"י הגדרת המערכת (וקטור 1 של ישראכרט).'),
 ('177', 'בתחנות דלק לא ניתן לבצע \"שרות עצמי\" אלא \"שרות עצמי בתחנות דלק\".'),
 ('178', 'אסור לבצע עסקת זכות בכוכבים/נקודות/מיילים.'),
 ('179', 'אסור לבצע עסקת זכות בדולר בכרטיס תייר.'),
 ('180', 'בכרטיס מועדון לא ניתן לבצע עסקה טלפונית.'),
 ('200', 'מסוף נסגר אצל שבא – פנה לשירות איזיקארד.'),
 ('250', 'בעיית זהוי (שם משתמש, סיסמא, מספר מסוף לא תקינים).'),
 ('256', 'מספר עסקה (TransactionNumber) - אינו ייחודי עבור תאריך עסקה (TransactionDate).'),
 ('257', 'לא נמצא מידע נדרש'),
 ('259', 'תקלת שב\"א - אין גישה למסד נתונים'),
 ('260', 'אחד או יותר מפרמטרים המועברים לפונקציה לא תקין (בד\"כ ערכים לא נומריים איפה שצריך נומרי(.'),
 ('280', 'בד\"כ time-out, דה\"נו לקח יותר מדקה לחזור למשתמש. במידה וחוזר לעצמו יש לפנות לשב\"א.');



--
-- Structure for table `curRates`
--

DROP TABLE IF EXISTS `curRates`;

CREATE TABLE `curRates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `currency_id` varchar(3) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `value` decimal(10,5) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

--
-- Data for table `curRates`
--

INSERT INTO `curRates` (`id`, `currency_id`, `date`, `value`) VALUES
 ('40', 'ILS', '2013-07-04 09:30:05', '1.00000'),
 ('41', 'USD', '2013-08-11 15:02:25', '3.40000');



--
-- Structure for table `currencies`
--

DROP TABLE IF EXISTS `currencies`;

CREATE TABLE `currencies` (
  `id` varchar(3) DEFAULT NULL,
  `code` varchar(3) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
`symbol` varchar(17) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `currencies`
--

INSERT INTO `currencies` (`id`, `code`, `name`, `symbol`) VALUES
 ('AED', '784', 'United Arab Emirates dirham', 'د.إ'),
 ('AFN', '971', 'Afghani', '؋'),
 ('ALL', '008', 'Lek', 'L'),
 ('AMD', '051', 'Armenian dram', 'դր.'),
 ('ANG', '532', 'Netherlands Antillean guilder', 'ƒ'),
 ('AOA', '973', 'Kwanza', 'Kz'),
 ('ARS', '032', 'Argentine peso', '$'),
 ('AUD', '036', 'Australian dollar', '$'),
 ('AWG', '533', 'Aruban guilder', 'ƒ'),
 ('AZN', '944', 'Azerbaijanian manat', NULL),
 ('BAM', '977', 'Convertible marks', 'KM'),
 ('BBD', '052', 'Barbados dollar', '$'),
 ('BDT', '050', 'Bangladeshi taka', '৳'),
 ('BGN', '975', 'Bulgarian lev', 'лв'),
 ('BHD', '048', 'Bahraini dinar', 'ب.د'),
 ('BIF', '108', 'Burundian franc', 'Fr'),
 ('BMD', '060', 'Bermudian dollar (customarily known as Bermuda dollar)', '$'),
 ('BND', '096', 'Brunei dollar', '$'),
 ('BOB', '068', 'Boliviano', 'Bs'),
 ('BOV', '984', 'Bolivian Mvdol (funds code)', NULL),
 ('BRL', '986', 'Brazilian real', 'R$'),
 ('BSD', '044', 'Bahamian dollar', '$'),
 ('BTN', '064', 'Ngultrum', NULL),
 ('BWP', '072', 'Pula', 'P'),
 ('BYR', '974', 'Belarussian ruble', 'Br'),
 ('BZD', '084', 'Belize dollar', '$'),
 ('CAD', '124', 'Canadian dollar', '$'),
 ('CDF', '976', 'Franc Congolais', 'Fr'),
 ('CHE', '947', 'WIR euro (complementary currency)', '€'),
 ('CHF', '756', 'Swiss franc', 'Fr'),
 ('CHW', '948', 'WIR franc (complementary currency)', 'Fr'),
 ('CLF', '990', 'Unidad de Fomento (funds code)', NULL),
 ('CLP', '152', 'Chilean peso', '$'),
 ('CNY', '156', 'Renminbi', '¥'),
 ('COP', '170', 'Colombian peso', '$'),
 ('COU', '970', 'Unidad de Valor Real', NULL),
 ('CRC', '188', 'Costa Rican colon', '₡'),
 ('CUP', '192', 'Cuban peso', '$'),
 ('CVE', '132', 'Cape Verde escudo', NULL),
 ('CZK', '203', 'Czech koruna', 'Kč'),
 ('DJF', '262', 'Djibouti franc', 'Fr'),
 ('DKK', '208', 'Danish krone', 'kr'),
 ('DOP', '214', 'Dominican peso', '$'),
 ('DZD', '012', 'Algerian dinar', 'د.ج'),
 ('EEK', '233', 'Kroon', 'KR'),
 ('EGP', '818', 'Egyptian pound', 'ج.م'),
 ('ERN', '232', 'Nakfa', 'Nfk'),
 ('ETB', '230', 'Ethiopian birr', NULL),
 ('EUR', '978', 'Euro', '€'),
 ('FJD', '242', 'Fiji dollar', '$'),
 ('FKP', '238', 'Falkland Islands pound', '£'),
 ('GBP', '826', 'Pound sterling', '£'),
 ('GEL', '981', 'Lari', 'ლ'),
 ('GHS', '936', 'Cedi', NULL),
 ('GIP', '292', 'Gibraltar pound', '£'),
 ('GMD', '270', 'Dalasi', 'D'),
 ('GNF', '324', 'Guinea franc', 'Fr'),
 ('GTQ', '320', 'Quetzal', 'Q'),
 ('GYD', '328', 'Guyana dollar', '$'),
 ('HKD', '344', 'Hong Kong dollar', '$'),
 ('HNL', '340', 'Lempira', 'L'),
 ('HRK', '191', 'Croatian kuna', 'kn'),
 ('HTG', '332', 'Haiti gourde', 'G'),
 ('HUF', '348', 'Forint', 'Ft'),
 ('IDR', '360', 'Rupiah', '₨'),
 ('ILS', '376', 'Israeli new sheqel', '₪'),
 ('INR', '356', 'Indian rupee', '₨'),
 ('IQD', '368', 'Iraqi dinar', 'ع.د'),
 ('IRR', '364', 'Iranian rial', '﷼'),
 ('ISK', '352', 'Iceland krona', 'kr'),
 ('JMD', '388', 'Jamaican dollar', '$'),
 ('JOD', '400', 'Jordanian dinar', 'د.ا'),
 ('JPY', '392', 'Japanese yen', '¥'),
 ('KES', '404', 'Kenyan shilling', 'Sh'),
 ('KGS', '417', 'Som', NULL),
 ('KHR', '116', 'Riel', '៛'),
 ('KMF', '174', 'Comoro franc', 'Fr'),
 ('KPW', '408', 'North Korean won', '₩'),
 ('KRW', '410', 'South Korean won', '₩'),
 ('KWD', '414', 'Kuwaiti dinar', 'د.ك'),
 ('KYD', '136', 'Cayman Islands dollar', '$'),
 ('KZT', '398', 'Tenge', 'Т'),
 ('LAK', '418', 'Kip', '₭'),
 ('LBP', '422', 'Lebanese pound', 'ل.ل'),
 ('LKR', '144', 'Sri Lanka rupee', 'ரூ'),
 ('LRD', '430', 'Liberian dollar', '$'),
 ('LSL', '426', 'Loti', 'L'),
 ('LTL', '440', 'Lithuanian litas', 'Lt'),
 ('LVL', '428', 'Latvian lats', 'Ls'),
 ('LYD', '434', 'Libyan dinar', 'ل.د'),
 ('MAD', '504', 'Moroccan dirham', 'د.م.'),
 ('MDL', '498', 'Moldovan leu', 'L'),
 ('MGA', '969', 'Malagasy ariary', NULL),
 ('MKD', '807', 'Denar', 'ден'),
 ('MMK', '104', 'Kyat', 'K'),
 ('MNT', '496', 'Tugrik', '₮'),
 ('MOP', '446', 'Pataca', 'P'),
 ('MRO', '478', 'Ouguiya', 'UM'),
 ('MUR', '480', 'Mauritius rupee', '₨'),
 ('MVR', '462', 'Rufiyaa', 'ރ'),
 ('MWK', '454', 'Kwacha', 'MK'),
 ('MXN', '484', 'Mexican peso', '$'),
 ('MXV', '979', 'Mexican Unidad de Inversion (UDI) (funds code)', NULL),
 ('MYR', '458', 'Malaysian ringgit', 'RM'),
 ('MZN', '943', 'Metical', 'MTn'),
 ('NAD', '516', 'Namibian dollar', '$'),
 ('NGN', '566', 'Naira', '₦'),
 ('NIO', '558', 'Cordoba oro', 'C$'),
 ('NOK', '578', 'Norwegian krone', 'kr'),
 ('NPR', '524', 'Nepalese rupee', '₨'),
 ('NZD', '554', 'New Zealand dollar', '$'),
 ('OMR', '512', 'Rial Omani', 'ر.ع.'),
 ('PAB', '590', 'Balboa', 'B/.'),
 ('PEN', '604', 'Nuevo sol', 'S/.'),
 ('PGK', '598', 'Kina', 'K'),
 ('PHP', '608', 'Philippine peso', '₱'),
 ('PKR', '586', 'Pakistan rupee', '₨'),
 ('PLN', '985', 'Zloty', 'zł'),
 ('PYG', '600', 'Guarani', '₲'),
 ('QAR', '634', 'Qatari rial', 'ر.ق'),
 ('RON', '946', 'Romanian new leu', 'L'),
 ('RSD', '941', 'Serbian dinar', 'din. או дин.'),
 ('RUB', '643', 'Russian rouble', 'р.'),
 ('RWF', '646', 'Rwanda franc', 'Fr'),
 ('SAR', '682', 'Saudi riyal', 'ر.س'),
 ('SBD', '090', 'Solomon Islands dollar', '$'),
 ('SCR', '690', 'Seychelles rupee', '₨'),
 ('SDG', '938', 'Sudanese pound', NULL),
 ('SEK', '752', 'Swedish krona', 'kr'),
 ('SGD', '702', 'Singapore dollar', '$'),
 ('SHP', '654', 'Saint Helena pound', '£'),
 ('SKK', '703', 'Slovak koruna', 'Sk'),
 ('SLL', '694', 'Leone', 'Le'),
 ('SOS', '706', 'Somali shilling', 'Sh'),
 ('SRD', '968', 'Surinam dollar', '$'),
 ('STD', '678', 'Dobra', 'Db'),
 ('SYP', '760', 'Syrian pound', 'ل.س'),
 ('SZL', '748', 'Lilangeni', 'L'),
 ('THB', '764', 'Baht', '฿'),
 ('TJS', '972', 'Somoni', 'ЅМ'),
 ('TMM', '795', 'Manat', 'm'),
 ('TND', '788', 'Tunisian dinar', 'د.ت'),
 ('TOP', '776', 'Pa\'anga', 'T$'),
 ('TRY', '949', 'New Turkish lira', '₤'),
 ('TTD', '780', 'Trinidad and Tobago dollar', '$'),
 ('TWD', '901', 'New Taiwan dollar', '$'),
 ('TZS', '834', 'Tanzanian shilling', 'Sh'),
 ('UAH', '980', 'Hryvnia', '₴'),
 ('UGX', '800', 'Uganda shilling', 'Sh'),
 ('USD', '840', 'US dollar', '$'),
 ('USN', '997', 'United States dollar (next day) (funds code)', NULL),
 ('USS', '998', 'United States dollar (same day) (funds code) (one source claims it is no longer used', NULL),
 ('UYU', '858', 'Peso Uruguayo', '$'),
 ('UZS', '860', 'Uzbekistan som', NULL),
 ('VEF', '937', 'Venezuelan bolםvar fuerte', 'Bs'),
 ('VND', '704', 'Vietnamese d?ng', '₫'),
 ('VUV', '548', 'Vatu', 'Vt'),
 ('WST', '882', 'Samoan tala', 'T'),
 ('XAF', '950', 'CFA franc BEAC', 'Fr'),
 ('XAG', '961', 'Silver (one troy ounce)', NULL),
 ('XAU', '959', 'Gold (one troy ounce)', NULL),
 ('XBA', '955', 'European Composite Unit (EURCO) (bond market unit)', NULL),
 ('XBB', '956', 'European Monetary Unit (E.M.U.-6) (bond market unit)', NULL),
 ('XBC', '957', 'European Unit of Account 9 (E.U.A.-9) (bond market unit)', NULL),
 ('XBD', '958', 'European Unit of Account 17 (E.U.A.-17) (bond market unit)', NULL),
 ('XCD', '951', 'East Caribbean dollar', NULL),
 ('XDR', '960', 'Special Drawing Rights', NULL),
 ('XFU', 'Nil', 'UIC franc (special settlement currency)', NULL),
 ('XOF', '952', 'CFA Franc BCEAO', NULL),
 ('XPD', '964', 'Palladium (one troy ounce)', NULL),
 ('XPF', '953', 'CFP franc', 'Fr'),
 ('XPT', '962', 'Platinum (one troy ounce)', NULL),
 ('XTS', '963', 'Code reserved for testing purposes', NULL),
 ('XXX', '999', 'No currency', NULL),
 ('YER', '886', 'Yemeni rial', '﷼'),
 ('ZAR', '710', 'South African rand', 'R'),
 ('ZMK', '894', 'Kwacha', 'ZK'),
 ('ZWD', '716', 'Zimbabwe dollar', '$');



--
-- Structure for table `docCheques`
--

DROP TABLE IF EXISTS `docCheques`;

CREATE TABLE `docCheques` (
  `doc_id` varchar(10) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `refnum` varchar(255) NOT NULL,
  `creditcompany` int(11) DEFAULT NULL,
  `cheque_num` char(10) DEFAULT NULL,
  `bank` char(3) DEFAULT NULL,
  `branch` char(3) DEFAULT NULL,
  `cheque_acct` char(20) DEFAULT NULL,
  `cheque_date` timestamp NULL DEFAULT NULL,
  `currency_id` varchar(3) NOT NULL,
  `sum` decimal(20,2) DEFAULT NULL,
  `bank_refnum` char(10) DEFAULT NULL,
  `dep_date` timestamp NULL DEFAULT NULL,
`line` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `docCheques`
--

INSERT INTO `docCheques` (`doc_id`, `type`, `refnum`, `creditcompany`, `cheque_num`, `bank`, `branch`, `cheque_acct`, `cheque_date`, `currency_id`, `sum`, `bank_refnum`, `dep_date`, `line`) VALUES
 ('2', '2', '', '150', '4586565433', '1', '123', '1', '2012-01-02 00:00:00', '', '5000.00', '123', '2012-01-02 00:00:00', '1'),
 ('2', '4', '', '150', '4586565433', '1', '123', '1', '2012-01-02 00:00:00', '', '5000.00', '', '0000-00-00 00:00:00', '2'),
 ('2', '1', '', '150', '', '', '', '', '2012-01-02 00:00:00', '', '5000.00', '123', '2012-01-02 00:00:00', '3'),
 ('6', '2', '', '150', '4586565433', '1', '123', '1', '2012-01-02 00:00:00', '', '5000.00', '98776', '2012-01-02 00:00:00', '1'),
 ('5', '4', '', '150', '4586565433', '1', '123', '1', '2012-01-02 00:00:00', '', '58000.00', '321', '2012-01-02 00:00:00', '1'),
 ('4', '2', '', '150', '4586565433', '1', '123', '1', '2012-01-02 00:00:00', '', '800.00', '321', '2012-01-02 00:00:00', '1'),
 ('3', '4', '', '150', '', '', '', '', '2012-01-02 00:00:00', '', '34000.00', '321', '2012-01-02 00:00:00', '1'),
 ('18', '1', '', '0', '', '', '', '', '2012-01-04 00:00:00', '', '500.00', '123', '2012-01-04 00:00:00', '1'),
 ('17', '2', '', '0', '4586565433', '1', '123', '1', '2012-01-04 00:00:00', '', '24.60', '123', '2012-01-04 00:00:00', '1'),
 ('16', '4', '', '150', '4586565433', '1', '123', '1', '2012-01-04 00:00:00', '', '30000.00', '', '0000-00-00 00:00:00', '1'),
 ('13', '4', '', '150', '4586565433', '1', '123', '1', '2012-01-04 00:00:00', '', '34800.00', '', '0000-00-00 00:00:00', '1'),
 ('10', '4', '', '150', '43645', '12', '344', '32432534', '2012-01-03 00:00:00', '', '5000.00', '', '0000-00-00 00:00:00', '1'),
 ('7', '1', '', '150', '', '', '', '', '2012-01-02 00:00:00', '', '9200.00', '123', '2012-01-02 00:00:00', '1'),
 ('8', '1', '', '150', '', '', '', '', '2012-01-03 00:00:00', '', '50.00', '1', '2012-01-03 00:00:00', '1'),
 ('30', '2', '', NULL, '5432', '12', '754', '108906', '2011-06-11 00:00:00', '', '17700.00', '', '0000-00-00 00:00:00', '1'),
 ('33', '2', '', NULL, '5432', '12', '754', '108906', '2011-06-11 00:00:00', '', '17700.00', '', '0000-00-00 00:00:00', '1'),
 ('34', '2', '', NULL, '5432', '12', '754', '108906', '2011-06-11 00:00:00', '', '17700.00', '', '0000-00-00 00:00:00', '1'),
 ('35', '2', '', NULL, '5432', '12', '754', '108906', '2011-06-11 00:00:00', '', '17700.00', '', '0000-00-00 00:00:00', '1'),
 ('36', '2', '', NULL, '5432', '12', '754', '108906', '2011-06-11 00:00:00', '', '17700.00', '', '0000-00-00 00:00:00', '1'),
 ('38', '2', '', NULL, '5432', '12', '754', '108906', '2011-06-11 00:00:00', '', '17700.00', '', '0000-00-00 00:00:00', '1');



--
-- Structure for table `docDetails`
--

DROP TABLE IF EXISTS `docDetails`;

CREATE TABLE `docDetails` (
  `doc_id` int(10) unsigned DEFAULT NULL,
  `item_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `qty` decimal(5,2) DEFAULT NULL,
  `unit_price` decimal(20,2) DEFAULT NULL,
  `unit_id` int(11) NOT NULL,
  `currency_id` varchar(3) NOT NULL,
  `price` decimal(20,2) DEFAULT NULL,
  `invprice` decimal(20,2) DEFAULT NULL,
  `vat` decimal(20,2) NOT NULL,
  `line` int(11) NOT NULL,
  KEY `doc_id` (`doc_id`),
  KEY `item_id` (`item_id`),
  KEY `unit_id` (`unit_id`),
KEY `unit_id_2` (`unit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `docDetails`
--

INSERT INTO `docDetails` (`doc_id`, `item_id`, `name`, `description`, `qty`, `unit_price`, `unit_id`, `currency_id`, `price`, `invprice`, `vat`, `line`) VALUES
 ('27', '3359', '3359', 'קפה', '1.00', '4000.00', '0', 'ILS', '4000.00', '4000.00', '0.00', '1'),
 ('27', '3352', '3352', 'תה', '1.00', '445.00', '0', 'ILS', '445.00', '445.00', '0.00', '2'),
 ('28', '57', '57', '', '1.00', '20000.00', '0', 'ILS', '20000.00', '20000.00', '0.00', '1'),
 ('30', '56', 'M16', '', '1.00', '15000.00', '0', 'ILS', '15000.00', '15000.00', '0.00', '1'),
 ('31', '56', 'M16', '', '1.00', '15000.00', '0', 'ILS', '15000.00', '15000.00', '0.00', '1'),
 ('32', '56', 'M16', '', '1.00', '15000.00', '0', 'ILS', '15000.00', '15000.00', '0.00', '1'),
 ('33', '56', 'M16', '', '1.00', '15000.00', '0', 'ILS', '15000.00', '15000.00', '0.00', '1'),
 ('34', '56', 'M16', '', '1.00', '15000.00', '0', 'ILS', '15000.00', '15000.00', '0.00', '1'),
 ('35', '56', 'M16', '', '1.00', '15000.00', '0', 'ILS', '15000.00', '15000.00', '0.00', '1'),
 ('36', '56', 'M16', '', '1.00', '15000.00', '0', 'ILS', '15000.00', '15000.00', '0.00', '1'),
 ('37', '57', 'M4', '', '1.00', '20000.00', '0', 'ILS', '20000.00', '20000.00', '0.00', '1'),
 ('38', '56', 'M16', '', '1.00', '15000.00', '0', 'ILS', '15000.00', '15000.00', '0.00', '1'),
 ('39', '56', 'M16', '', '1.00', '15000.00', '0', 'ILS', '15000.00', '15000.00', '0.00', '1'),
 ('15', '3361', 'שעת עבודה פיתוח PHP', '', '1.00', '220.00', '0', 'ILS', '220.00', '220.00', '39.60', '1'),
 ('15', '3362', 'שעת עבודה פיתוח PHP', '', '1.00', '220.00', '0', 'ILS', '220.00', '220.00', '39.60', '2'),
 ('40', '56', 'M16', '', '1.00', '15000.00', '0', 'ILS', '15000.00', '15000.00', '2700.00', '1'),
 ('41', '56', 'M16', '', '1.00', '15000.00', '0', 'ILS', '15000.00', '15000.00', '2700.00', '1'),
 ('42', '3355', 'בלטה', '', '1.00', '15000.00', '0', 'ILS', '15000.00', '15000.00', '2700.00', '1'),
 ('43', '3360', 'מ16 בדולר', '', '1.00', '4000.00', '0', 'ILS', '4000.00', '4000.00', '720.00', '1'),
 ('45', '3351', 'ילקוט', '', '1.00', '445.00', '0', 'ILS', '445.00', '445.00', '80.10', '1'),
 ('46', '3360', 'מ16 בדולר', '', '1.00', '4000.00', '0', 'ILS', '4000.00', '4000.00', '720.00', '1'),
 ('47', '3351', 'ילקוט', '', '1.00', '445.00', '0', 'ILS', '445.00', '445.00', '80.10', '1'),
 ('48', '3351', 'ילקוט', '', '1.00', '445.00', '0', 'ILS', '445.00', '445.00', '80.10', '1'),
 ('49', '56', 'M16', '', '1.00', '15000.00', '0', 'ILS', '15000.00', '15000.00', '2700.00', '1'),
 ('50', '56', 'M16', '', '1.00', '15000.00', '0', 'ILS', '15000.00', '15000.00', '2700.00', '1'),
 ('51', '56', 'M16', '', '1.00', '15000.00', '0', 'ILS', '15000.00', '15000.00', '2700.00', '1'),
 ('52', '57', 'M4', '', '1.00', '20000.00', '0', 'ILS', '20000.00', '20000.00', '3600.00', '1'),
 ('53', '3352', 'בלטה', '', '1.00', '445.00', '0', 'ILS', '445.00', '445.00', '80.10', '1'),
 ('92', '3352', 'בלטה', '', '1.00', '445.00', '0', 'ILS', '445.00', '445.00', '80.10', '1'),
 ('93', '3352', 'בלטה', '', '1.00', '445.00', '0', 'ILS', '445.00', '445.00', '80.10', '1'),
 ('94', '3352', 'בלטה', '', '1.00', '445.00', '0', 'ILS', '445.00', '445.00', '80.10', '1'),
 ('95', '3352', 'בלטה', '', '1.00', '445.00', '0', 'ILS', '445.00', '445.00', '80.10', '1'),
 ('96', '3352', 'בלטה', '', '1.00', '445.00', '0', 'ILS', '445.00', '445.00', '80.10', '1'),
 ('97', '3352', 'בלטה', '', '1.00', '445.00', '0', 'ILS', '445.00', '445.00', '80.10', '1'),
 ('98', '3352', 'בלטה', '', '1.00', '445.00', '0', 'ILS', '445.00', '445.00', '80.10', '1'),
 ('99', '3352', 'בלטה', '', '1.00', '445.00', '0', 'ILS', '445.00', '445.00', '80.10', '1'),
 ('100', '3352', 'בלטה', '', '1.00', '445.00', '0', 'ILS', '445.00', '445.00', '80.10', '1'),
 ('101', '3352', 'בלטה', '', '1.00', '445.00', '0', 'ILS', '445.00', '445.00', '80.10', '1'),
 ('102', '3352', 'בלטה', '', '1.00', '445.00', '0', 'ILS', '445.00', '445.00', '80.10', '1'),
 ('103', '3352', 'בלטה', '', '1.00', '445.00', '0', 'ILS', '445.00', '445.00', '80.10', '1'),
 ('104', '3352', 'בלטה', '', '1.00', '445.00', '0', 'ILS', '445.00', '445.00', '80.10', '1'),
 ('105', '3352', 'בלטה', '', '1.00', '445.00', '0', 'ILS', '445.00', '445.00', '80.10', '1'),
 ('106', '3352', 'בלטה', '', '1.00', '445.00', '0', 'ILS', '445.00', '445.00', '80.10', '1'),
 ('107', '3352', 'בלטה', '', '1.00', '445.00', '0', 'ILS', '445.00', '445.00', '80.10', '1'),
 ('108', '3352', 'בלטה', '', '1.00', '445.00', '0', 'ILS', '445.00', '445.00', '80.10', '1'),
 ('109', '3352', 'בלטה', '', '1.00', '445.00', '0', 'ILS', '445.00', '445.00', '80.10', '1'),
 ('110', '3352', 'בלטה', '', '1.00', '445.00', '0', 'ILS', '445.00', '445.00', '80.10', '1'),
 ('111', '3352', 'בלטה', '', '1.00', '445.00', '0', 'ILS', '445.00', '445.00', '80.10', '1'),
 ('112', '3352', 'בלטה', '', '1.00', '445.00', '0', 'ILS', '445.00', '445.00', '80.10', '1'),
 ('113', '3352', 'בלטה', '', '1.00', '445.00', '0', 'ILS', '445.00', '445.00', '80.10', '1'),
 ('114', '3352', 'בלטה', '', '1.00', '445.00', '0', 'ILS', '445.00', '445.00', '80.10', '1'),
 ('115', '3352', 'בלטה', '', '1.00', '445.00', '0', 'ILS', '445.00', '445.00', '80.10', '1'),
 ('116', '3352', 'בלטה', '', '1.00', '445.00', '0', 'ILS', '445.00', '445.00', '80.10', '1'),
 ('117', '3352', 'בלטה', '', '1.00', '445.00', '0', 'ILS', '445.00', '445.00', '80.10', '1'),
 ('118', '3352', 'בלטה', '', '1.00', '445.00', '0', 'ILS', '445.00', '445.00', '80.10', '1'),
 ('119', '3352', 'בלטה', '', '1.00', '445.00', '0', 'ILS', '445.00', '445.00', '80.10', '1'),
 ('120', '3352', 'בלטה', '', '1.00', '445.00', '0', 'ILS', '445.00', '130.88', '23.56', '1'),
 ('121', '3360', 'מ16 בדולר', '', '1.00', '4000.00', '0', 'ILS', '4000.00', '4000.00', '720.00', '1'),
 ('122', '56', 'M16', '', '1.00', '15000.00', '0', 'ILS', '15000.00', '15000.00', '2700.00', '1'),
 ('123', '57', 'M4', '', '1.00', '20000.00', '0', 'ILS', '20000.00', '20000.00', '3600.00', '1'),
 ('125', '3357', 'M16', '', '1.00', '4000.00', '0', 'ILS', '4000.00', '4000.00', '720.00', '1'),
 ('126', '3354', 'קקי', '', '1.00', '1.00', '0', 'ILS', '1.00', '1.00', '0.18', '1'),
 ('127', '58', 'שרת חזק ביותר', '', '1.00', '10000.00', '0', 'USD', '10000.00', '34000.00', '6120.00', '1'),
 ('128', '57', 'M4', '', '0.00', '20000.00', '0', 'ILS', '0.00', '0.00', '0.00', '1'),
 ('129', '56', 'M16', '', '1.00', '15000.00', '0', 'ILS', '15000.00', '15000.00', '2700.00', '1'),
 ('130', '56', 'M16', '', '1.00', '15000.00', '0', 'ILS', '15000.00', '15000.00', '2700.00', '1');



--
-- Structure for table `docStatus`
--

DROP TABLE IF EXISTS `docStatus`;

CREATE TABLE `docStatus` (
  `num` int(11) NOT NULL,
  `doc_type` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `looked` tinyint(1) NOT NULL,
  `action` varchar(255) NOT NULL,
  KEY `doc_type` (`doc_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `docStatus`
--

INSERT INTO `docStatus` (`num`, `doc_type`, `name`, `looked`, `action`) VALUES
 ('1', '1', 'טיוטא', '0', '0'),
 ('2', '1', 'הופק', '0', '1'),
 ('3', '1', 'ממתין לאישור', '0', '1'),
 ('4', '1', 'מבוטל', '1', '1'),
 ('1', '2', 'טיוטא', '0', '0'),
 ('2', '2', 'הופק', '0', '1'),
 ('3', '2', 'ממתין לאישור', '0', '0'),
 ('4', '2', 'מבוטל', '1', '1'),
 ('1', '3', 'טיוטא', '0', '0'),
 ('2', '3', 'הופק', '0', '1'),
 ('3', '3', 'ממתין לאישור', '0', '0'),
 ('4', '3', 'מבוטל', '1', '1'),
 ('1', '4', 'טיוטא', '0', '0'),
 ('2', '4', 'הופק', '0', '1'),
 ('3', '4', 'ממתין לאישור', '1', '1'),
 ('4', '4', 'מבוטל', '1', '1'),
 ('1', '5', 'טיוטא', '0', '0'),
 ('2', '5', 'הופק', '0', '1'),
 ('3', '5', 'ממתין לאישור', '1', '1'),
 ('4', '5', 'מבוטל', '1', '1'),
 ('1', '6', 'טיוטא', '0', '0'),
 ('2', '6', 'הופק', '0', '1'),
 ('3', '6', 'ממתין לאישור', '1', '1'),
 ('4', '6', 'מבוטל', '1', '1'),
 ('1', '7', 'טיוטא', '0', '0'),
 ('2', '7', 'הופק', '0', '1'),
 ('3', '7', 'ממתין לאישור', '1', '1'),
 ('4', '7', 'מבוטל', '1', '1'),
 ('1', '8', 'טיוטא', '0', '0'),
 ('2', '8', 'הופק', '0', '1'),
 ('3', '8', 'ממתין לאישור', '1', '1'),
 ('4', '8', 'מבוטל', '1', '1'),
 ('1', '9', 'טיוטא', '0', '0'),
 ('2', '9', 'הופק', '0', '1'),
 ('3', '9', 'ממתין לאישור', '1', '1'),
 ('4', '9', 'מבוטל', '1', '1'),
 ('1', '10', 'טיוטא', '0', '0'),
 ('2', '10', 'הופק', '0', '1'),
 ('3', '10', 'ממתין לאישור', '1', '1'),
 ('4', '10', 'מבוטל', '1', '1'),
 ('1', '11', 'הופק', '1', '1'),
 ('1', '12', 'הופק', '1', '1');



--
-- Structure for table `docType`
--

DROP TABLE IF EXISTS `docType`;

CREATE TABLE `docType` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id`),
  KEY `account_type` (`account_type`),
  KEY `docStatus_id` (`docStatus_id`),
KEY `docStatus_id_2` (`docStatus_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Data for table `docType`
--

INSERT INTO `docType` (`id`, `name`, `openformat`, `isdoc`, `isrecipet`, `iscontract`, `looked`, `stockAction`, `account_type`, `docStatus_id`, `last_docnum`, `oppt_account_type`, `transactionType_id`, `vat_acc_id`) VALUES
 ('1', 'Proforma', '300', '1', '0', '0', '1', '-1', '0', '1', '2', NULL, NULL, '3'),
 ('2', 'Delivery doc.', '200', '1', '0', '0', '0', '-1', '0', '1', '0', NULL, NULL, '3'),
 ('3', 'Invoice', '305', '1', '0', '0', '1', '-1', '0', '3', '91', NULL, '1', '3'),
 ('4', 'Credit invoice', '330', '1', '0', '0', '0', '1', '0', '1', '0', NULL, '17', '3'),
 ('5', 'Return document', '210', '1', '0', '0', '0', '1', '0', '1', '0', NULL, '19', '3'),
 ('6', 'Quote', '0', '1', '0', '0', '0', '0', '0', '0', '2', NULL, NULL, '3'),
 ('7', 'Sales Order', '0', '1', '0', '0', '0', '0', '0', '0', '1', NULL, NULL, '3'),
 ('8', 'Receipt', '400', '0', '1', '0', '1', '0', '0', '1', '0', NULL, '3', '3'),
 ('9', 'Invoice Receipt', '320', '1', '1', '0', '1', '-1', '0', '4', '6', NULL, '18', '3'),
 ('10', 'Parchace Order', '500', '1', '0', '0', '0', '0', '1', '1', '0', NULL, NULL, '3'),
 ('11', 'Manual invoice', '0', '1', '0', '0', '1', '1', '1', '1', '1', NULL, '11', '3'),
 ('12', 'Manual receipt', '0', '1', '0', '0', '1', '1', '1', '1', '0', NULL, '12', '3'),
 ('13', 'Buisness outcome', '0', '1', '0', '0', '0', '0', '0', '0', '0', '2', '5', '1'),
 ('14', 'Asstes outcome', '0', '1', '0', '0', '0', '0', '0', '0', '0', '4', '5', '2');



--
-- Structure for table `docs`
--

DROP TABLE IF EXISTS `docs`;

CREATE TABLE `docs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `doctype` int(11) NOT NULL,
  `docnum` int(10) unsigned DEFAULT NULL,
  `account_id` int(10) unsigned DEFAULT NULL,
  `company` varchar(80) DEFAULT NULL,
  `address` varchar(80) DEFAULT NULL,
  `city` varchar(40) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `vatnum` varchar(10) DEFAULT NULL,
  `refnum` varchar(20) DEFAULT NULL,
  `issue_date` timestamp NULL DEFAULT NULL,
  `due_date` timestamp NULL DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `discount` decimal(20,2) NOT NULL,
  `sub_total` decimal(20,2) DEFAULT NULL,
  `novat_total` decimal(20,2) DEFAULT NULL,
  `vat` decimal(20,2) DEFAULT NULL,
  `total` decimal(20,2) DEFAULT NULL,
  `currency_id` varchar(3) NOT NULL,
  `src_tax` decimal(20,2) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `printed` int(11) DEFAULT NULL,
  `comments` text,
  `oppt_account_id` int(11) DEFAULT NULL,
  `owner` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `owner` (`owner`),
  KEY `account_id` (`account_id`),
  KEY `status` (`status`),
KEY `doctype` (`doctype`)
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=utf8;

--
-- Data for table `docs`
--

INSERT INTO `docs` (`id`, `doctype`, `docnum`, `account_id`, `company`, `address`, `city`, `zip`, `vatnum`, `refnum`, `issue_date`, `due_date`, `modified`, `discount`, `sub_total`, `novat_total`, `vat`, `total`, `currency_id`, `src_tax`, `status`, `printed`, `comments`, `oppt_account_id`, `owner`) VALUES
 ('40', '1', '1', '113', 'לקוחות שונים', '', '', '', '', '', '2013-09-23 10:09:33', '1970-09-01 14:09:46', '2013-09-23 14:09:46', '0.00', '15000.00', NULL, '2700.00', '17700.00', 'ILS', NULL, '1', NULL, '', NULL, '1'),
 ('41', '3', '5', '201', 'משרד הבטחון', '', 'רעננה', '42234', '123345678', '', '2013-09-01 15:09:07', '2013-09-08 18:09:52', '2013-09-22 18:09:52', '0.00', '15000.00', NULL, '2700.00', '17700.00', 'USD', NULL, '1', NULL, '', NULL, '1'),
 ('42', '7', '1', '204', 'חנות מחשבים', 'דה האז 1', 'תל אביב', '42234', '534645768', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0.00', '15000.00', NULL, '2700.00', '17700.00', 'ILS', NULL, '3', NULL, '', NULL, NULL),
 ('43', '3', '6', '206', 'Google Inc', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0.00', '4000.00', NULL, '720.00', '4720.00', 'ILS', NULL, '3', NULL, '', NULL, NULL),
 ('44', '3', '7', '202', 'קיבוץ נירים', '', '', '', '51080921', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0.00', '0.00', NULL, '0.00', '0.00', 'ILS', NULL, '3', NULL, '', NULL, NULL),
 ('45', '3', '8', '203', 'יעקב בן יוסף', 'דרך השלום 7', 'ראשון לציון', '23345', '334244435', '', '1970-09-01 02:09:00', '2003-09-15 17:09:38', '2013-09-18 17:09:38', '0.00', '445.00', NULL, '80.10', '525.10', 'ILS', NULL, '1', NULL, '', NULL, '1'),
 ('46', '3', '9', '206', 'Google Inc', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0.00', '4000.00', NULL, '720.00', '4720.00', 'ILS', NULL, '3', NULL, '', NULL, NULL),
 ('47', '3', '10', '203', 'יעקב בן יוסף', 'דרך השלום 7', 'ראשון לציון', '23345', '334244435', '45', '1970-01-01 02:01:00', '2003-09-15 10:09:00', '1970-01-01 02:01:00', '0.00', '445.00', NULL, '80.10', '525.10', 'ILS', NULL, '3', NULL, '', NULL, NULL),
 ('48', '3', '11', '203', 'יעקב בן יוסף', 'דרך השלום 7', 'ראשון לציון', '23345', '334244435', '47', '1970-01-01 02:01:00', '2003-09-15 10:09:53', '1970-01-01 02:01:00', '0.00', '445.00', NULL, '80.10', '525.10', 'ILS', NULL, '3', NULL, '', NULL, NULL),
 ('49', '3', '12', '201', 'משרד הבטחון', '', 'רעננה', '42234', '123345678', '', '1970-09-01 02:09:00', '1970-09-01 20:09:50', '2013-09-18 20:09:50', '0.00', '15000.00', NULL, '2700.00', '17700.00', 'USD', NULL, '3', NULL, '', NULL, '1'),
 ('50', '3', '13', '201', 'משרד הבטחון', '', 'רעננה', '42234', '123345678', '49', '2013-09-10 10:09:49', '2003-09-08 10:09:49', '1970-01-01 02:01:00', '0.00', '15000.00', NULL, '2700.00', '17700.00', 'USD', NULL, '3', NULL, '', NULL, NULL),
 ('51', '3', '14', '201', 'משרד הבטחון', '', 'רעננה', '42234', '123345678', '50', '2013-09-10 10:09:31', '2003-09-08 10:09:31', '2013-09-10 10:09:31', '0.00', '15000.00', NULL, '2700.00', '17700.00', 'USD', NULL, '3', NULL, '', NULL, NULL),
 ('52', '11', '1', '110', NULL, '', '', '', '', '', '2013-09-11 17:09:18', '1970-09-01 17:09:40', '2013-09-11 17:09:40', '0.00', '20000.00', NULL, '3600.00', '23600.00', 'ILS', NULL, '1', NULL, '', NULL, NULL),
 ('53', '3', '15', '201', 'משרד הבטחון', '', 'רעננה', '42234', '123345678', '', '2013-09-12 14:09:03', '1970-01-01 02:01:00', '2013-09-12 14:09:03', '0.00', '445.00', NULL, '80.10', '525.10', 'ILS', NULL, '2', NULL, '', NULL, '1'),
 ('92', '3', '54', '201', 'משרד הבטחון', '', 'רעננה', '42234', '123345678', '53', '2013-09-12 15:09:42', '1970-09-01 15:09:42', '2013-09-12 15:09:42', '0.00', '445.00', NULL, '80.10', '525.10', 'ILS', NULL, '3', NULL, '', NULL, '1'),
 ('93', '3', '55', '201', 'משרד הבטחון', '', 'רעננה', '42234', '123345678', '92', '2013-09-12 15:09:04', '1970-09-01 15:09:04', '2013-09-12 15:09:04', '0.00', '445.00', NULL, '80.10', '525.10', 'ILS', NULL, '3', NULL, '', NULL, '1'),
 ('94', '3', '56', '201', 'משרד הבטחון', '', 'רעננה', '42234', '123345678', '93', '2013-09-12 15:09:17', '1970-09-01 15:09:17', '2013-09-12 15:09:17', '0.00', '445.00', NULL, '80.10', '525.10', 'ILS', NULL, '3', NULL, '', NULL, '1'),
 ('95', '3', '57', '201', 'משרד הבטחון', '', 'רעננה', '42234', '123345678', '94', '2013-09-12 15:09:34', '1970-09-01 15:09:34', '2013-09-12 15:09:34', '0.00', '445.00', NULL, '80.10', '525.10', 'ILS', NULL, '3', NULL, '', NULL, '1'),
 ('96', '3', '58', '201', 'משרד הבטחון', '', 'רעננה', '42234', '123345678', '95', '2013-09-12 15:09:22', '1970-09-01 15:09:22', '2013-09-12 15:09:22', '0.00', '445.00', NULL, '80.10', '525.10', 'ILS', NULL, '3', NULL, '', NULL, '1'),
 ('97', '3', '59', '201', 'משרד הבטחון', '', 'רעננה', '42234', '123345678', '95', '2013-09-12 15:09:06', '1970-09-01 15:09:06', '2013-09-12 15:09:06', '0.00', '445.00', NULL, '80.10', '525.10', 'ILS', NULL, '3', NULL, '', NULL, '1'),
 ('98', '3', '60', '201', 'משרד הבטחון', '', 'רעננה', '42234', '123345678', '95', '2013-09-12 15:09:19', '1970-09-01 15:09:19', '2013-09-12 15:09:19', '0.00', '445.00', NULL, '80.10', '525.10', 'ILS', NULL, '3', NULL, '', NULL, '1'),
 ('99', '3', '61', '201', 'משרד הבטחון', '', 'רעננה', '42234', '123345678', '95', '2013-09-12 15:09:11', '1970-09-01 15:09:11', '2013-09-12 15:09:11', '0.00', '445.00', NULL, '80.10', '525.10', 'ILS', NULL, '3', NULL, '', NULL, '1'),
 ('100', '3', '62', '201', 'משרד הבטחון', '', 'רעננה', '42234', '123345678', '95', '2013-09-12 15:09:40', '1970-09-01 15:09:40', '2013-09-12 15:09:40', '0.00', '445.00', NULL, '80.10', '525.10', 'ILS', NULL, '3', NULL, '', NULL, '1'),
 ('101', '3', '63', '201', 'משרד הבטחון', '', 'רעננה', '42234', '123345678', '95', '2013-09-12 15:09:15', '1970-09-01 15:09:15', '2013-09-12 15:09:15', '0.00', '445.00', NULL, '80.10', '525.10', 'ILS', NULL, '3', NULL, '', NULL, '1'),
 ('102', '3', '64', '201', 'משרד הבטחון', '', 'רעננה', '42234', '123345678', '95', '2013-09-12 15:09:47', '1970-09-01 15:09:47', '2013-09-12 15:09:47', '0.00', '445.00', NULL, '80.10', '525.10', 'ILS', NULL, '3', NULL, '', NULL, '1'),
 ('103', '3', '65', '201', 'משרד הבטחון', '', 'רעננה', '42234', '123345678', '95', '2013-09-12 15:09:56', '1970-09-01 15:09:56', '2013-09-12 15:09:56', '0.00', '445.00', NULL, '80.10', '525.10', 'ILS', NULL, '3', NULL, '', NULL, '1'),
 ('104', '3', '66', '201', 'משרד הבטחון', '', 'רעננה', '42234', '123345678', '103', '2013-09-12 16:09:40', '1970-09-01 16:09:40', '2013-09-12 16:09:40', '0.00', '445.00', NULL, '80.10', '525.10', 'ILS', NULL, '3', NULL, '', NULL, '1'),
 ('105', '3', '67', '201', 'משרד הבטחון', '', 'רעננה', '42234', '123345678', '104', '2013-09-12 16:09:14', '1970-09-01 16:09:14', '2013-09-12 16:09:14', '0.00', '445.00', NULL, '80.10', '525.10', 'ILS', NULL, '3', NULL, '', NULL, '1'),
 ('106', '3', '68', '201', 'משרד הבטחון', '', 'רעננה', '42234', '123345678', '104', '2013-09-12 16:09:05', '1970-09-01 16:09:05', '2013-09-12 16:09:05', '0.00', '445.00', NULL, '80.10', '525.10', 'ILS', NULL, '3', NULL, '', NULL, '1'),
 ('107', '3', '69', '201', 'משרד הבטחון', '', 'רעננה', '42234', '123345678', '104', '2013-09-12 16:09:41', '1970-09-01 16:09:41', '2013-09-12 16:09:41', '0.00', '445.00', NULL, '80.10', '525.10', 'ILS', NULL, '3', NULL, '', NULL, '1'),
 ('108', '3', '70', '201', 'משרד הבטחון', '', 'רעננה', '42234', '123345678', '104', '2013-09-12 16:09:44', '1970-09-01 16:09:44', '2013-09-12 16:09:44', '0.00', '445.00', NULL, '80.10', '525.10', 'ILS', NULL, '3', NULL, '', NULL, '1'),
 ('109', '3', '71', '201', 'משרד הבטחון', '', 'רעננה', '42234', '123345678', '104', '2013-09-12 16:09:20', '1970-09-01 16:09:20', '2013-09-12 16:09:20', '0.00', '445.00', NULL, '80.10', '525.10', 'ILS', NULL, '3', NULL, '', NULL, '1'),
 ('110', '3', '72', '201', 'משרד הבטחון', '', 'רעננה', '42234', '123345678', '109', '2013-09-12 16:09:31', '1970-09-01 16:09:31', '2013-09-12 16:09:31', '0.00', '445.00', NULL, '80.10', '525.10', 'ILS', NULL, '3', NULL, '', NULL, '1'),
 ('111', '3', '73', '201', 'משרד הבטחון', '', 'רעננה', '42234', '123345678', '110', '2013-09-12 16:09:40', '1970-09-01 16:09:40', '2013-09-12 16:09:40', '0.00', '445.00', NULL, '80.10', '525.10', 'ILS', NULL, '3', NULL, '', NULL, '1'),
 ('112', '3', '74', '201', 'משרד הבטחון', '', 'רעננה', '42234', '123345678', '110', '2013-09-12 16:09:56', '1970-09-01 16:09:56', '2013-09-12 16:09:56', '0.00', '445.00', NULL, '80.10', '525.10', 'ILS', NULL, '3', NULL, '', NULL, '1'),
 ('113', '3', '75', '201', 'משרד הבטחון', '', 'רעננה', '42234', '123345678', '110', '2013-09-12 16:09:39', '1970-09-01 16:09:39', '2013-09-12 16:09:39', '0.00', '445.00', NULL, '80.10', '525.10', 'ILS', NULL, '3', NULL, '', NULL, '1'),
 ('114', '3', '76', '201', 'משרד הבטחון', '', 'רעננה', '42234', '123345678', '110', '2013-09-12 16:09:19', '1970-09-01 16:09:19', '2013-09-12 16:09:19', '0.00', '445.00', NULL, '80.10', '525.10', 'ILS', NULL, '3', NULL, '', NULL, '1'),
 ('115', '3', '77', '201', 'משרד הבטחון', '', 'רעננה', '42234', '123345678', '110', '2013-09-12 16:09:38', '1970-09-01 16:09:38', '2013-09-12 16:09:38', '0.00', '445.00', NULL, '80.10', '525.10', 'ILS', NULL, '3', NULL, '', NULL, '1'),
 ('116', '3', '78', '201', 'משרד הבטחון', '', 'רעננה', '42234', '123345678', '110', '2013-09-12 16:09:22', '1970-09-01 16:09:22', '2013-09-12 16:09:22', '0.00', '445.00', NULL, '80.10', '525.10', 'ILS', NULL, '3', NULL, '', NULL, '1'),
 ('117', '3', '79', '201', 'משרד הבטחון', '', 'רעננה', '42234', '123345678', '116', '2013-09-12 17:09:23', '1970-09-01 17:09:23', '2013-09-12 17:09:23', '0.00', '445.00', NULL, '80.10', '525.10', 'ILS', NULL, '3', NULL, '', NULL, '1'),
 ('118', '3', '80', '201', 'משרד הבטחון', '', 'רעננה', '42234', '123345678', '116', '2013-09-12 17:09:34', '1970-09-01 17:09:34', '2013-09-12 17:09:34', '0.00', '445.00', NULL, '80.10', '525.10', 'ILS', NULL, '3', NULL, '', NULL, '1'),
 ('119', '3', '81', '201', 'משרד הבטחון', '', 'רעננה', '42234', '123345678', '118', '2013-09-12 17:09:21', '1970-09-01 17:09:21', '2013-09-12 17:09:21', '0.00', '445.00', NULL, '80.10', '525.10', 'ILS', NULL, '3', NULL, '', NULL, '1'),
 ('120', '3', '82', '201', 'משרד הבטחון', '', 'רעננה', '42234', '123345678', '119', '2013-09-12 17:09:43', '1970-09-01 17:09:43', '2013-09-12 17:09:43', '0.00', '130.88', NULL, '23.56', '154.44', 'USD', NULL, '3', NULL, '', NULL, '1'),
 ('121', '3', '83', '206', 'Google Inc', '', '', '', '', '43', '2013-09-12 20:09:53', '1970-01-01 02:01:00', '2013-09-12 20:09:53', '0.00', '4000.00', NULL, '720.00', '4720.00', 'ILS', NULL, '3', NULL, '', NULL, '1'),
 ('122', '3', '84', '201', 'משרד הבטחון', '', 'רעננה', '42234', '123345678', '', '2013-09-13 15:09:09', '1970-01-01 02:01:00', '2013-09-13 15:09:09', '0.00', '15000.00', NULL, '2700.00', '17700.00', 'USD', NULL, '3', NULL, '', NULL, '1'),
 ('123', '3', '85', '201', 'משרד הבטחון', '', 'רעננה', '42234', '123345678', '', '2013-09-18 19:09:00', '1970-09-01 20:09:12', '2013-09-18 20:09:12', '0.00', '20000.00', NULL, '3600.00', '23600.00', 'USD', NULL, '3', NULL, '', NULL, '1'),
 ('124', '3', '86', '0', '', '', '', '', '', '', '2013-09-19 17:09:56', '1970-01-01 02:01:00', '2013-09-19 17:09:56', '0.00', '0.00', NULL, '0.00', '0.00', 'ILS', NULL, '3', NULL, '', NULL, '1'),
 ('125', '3', '87', '201', 'משרד הבטחון', '', 'רעננה', '42234', '123345678', '', '2013-09-19 17:09:32', '2013-09-26 17:09:32', '2013-09-19 17:09:32', '0.00', '4000.00', NULL, '720.00', '4720.00', 'ILS', NULL, '3', NULL, '', NULL, '1'),
 ('126', '3', '88', '206', 'Google Inc', '', '', '', '', '', '2013-09-19 17:09:09', '1970-01-01 02:01:00', '2013-09-19 17:09:09', '0.00', '1.00', NULL, '0.18', '1.18', 'ILS', NULL, '3', NULL, '', NULL, '1'),
 ('127', '3', '89', '206', 'Google Inc', '', '', '', '', '', '2013-09-19 19:09:13', '1970-01-01 02:01:00', '2013-09-19 19:09:13', '0.00', '34000.00', NULL, '6120.00', '40120.00', 'ILS', NULL, '3', NULL, '', NULL, '1'),
 ('128', '1', '2', '201', 'משרד הבטחון', '', 'רעננה', '42234', '123345678', '', '2013-09-19 19:09:02', '1970-01-01 02:01:00', '2013-09-19 19:09:02', '0.00', '0.00', NULL, '0.00', '0.00', 'USD', NULL, '1', NULL, '', NULL, '1'),
 ('129', '3', '90', '113', 'לקוחות שונים', '', '', '', '', '', '2013-09-19 19:09:46', '1970-01-01 02:01:00', '2013-09-19 19:09:46', '0.00', '15000.00', NULL, '2700.00', '17700.00', 'ILS', NULL, '3', NULL, '', NULL, '1'),
 ('130', '3', '91', '113', 'לקוחות שונים', '', '', '', '', '', '2013-09-19 19:09:01', '1970-01-01 02:01:00', '2013-09-19 19:09:01', '0.00', '15000.00', NULL, '2700.00', '17700.00', 'ILS', NULL, '3', NULL, '', NULL, '1');



--
-- Structure for table `eavAttr`
--

DROP TABLE IF EXISTS `eavAttr`;

CREATE TABLE `eavAttr` (
  `entity` bigint(20) unsigned NOT NULL,
  `attribute` varchar(250) NOT NULL,
  `value` text NOT NULL,
KEY `ikEntity` (`entity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `eavAttr`
--

INSERT INTO `eavAttr` (`entity`, `attribute`, `value`) VALUES
 ('3359', 'testing', 'bla'),
 ('58', 'סלד', '7200'),
 ('58', 'סלד', '7200'),
 ('58', 'גודל', '80GB'),
 ('57', 'סלד', '7200'),
 ('57', 'סלד', '7200'),
 ('57', 'גודל', '80GB');



--
-- Structure for table `eavFields`
--

DROP TABLE IF EXISTS `eavFields`;

CREATE TABLE `eavFields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `eavType` varchar(255) NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Data for table `eavFields`
--

INSERT INTO `eavFields` (`id`, `name`, `eavType`, `min`, `max`) VALUES
 ('1', 'Mobile', 'string', '0', '10'),
 ('2', 'Catagory', 'string', '0', '10'),
 ('3', 'PDC_addr', 'string', '0', '100'),
 ('4', 'SDC_addr', 'string', '0', '100');



--
-- Structure for table `fields`
--

DROP TABLE IF EXISTS `fields`;

CREATE TABLE `fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `tablename` varchar(40) NOT NULL,
  `data` varchar(60) NOT NULL,
  `desc` varchar(80) NOT NULL,
  `sort` int(11) NOT NULL,
  `minlen` int(11) NOT NULL DEFAULT '0',
  `maxlen` int(11) NOT NULL DEFAULT '0',
PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=108 DEFAULT CHARSET=utf8;

--
-- Data for table `fields`
--

INSERT INTO `fields` (`id`, `name`, `tablename`, `data`, `desc`, `sort`, `minlen`, `maxlen`) VALUES
 ('1', 'num', 'items', 'AUTO', 'none', '0', '0', '0'),
 ('2', 'prefix', 'items', 'PREFIX', 'none', '0', '0', '0'),
 ('3', 'account', 'items', 'AUTOSELECT(accounts.company,num)', 'Income account', '2', '0', '0'),
 ('4', 'name', 'items', 'TEXT', 'Item name', '1', '2', '0'),
 ('5', 'unit', 'items', 'AUTOSELECT(units.name,id)', 'Unit', '3', '0', '0'),
 ('6', 'extcatnum', 'items', 'TEXT', 'Supplier cat. num.', '4', '0', '0'),
 ('7', 'manufacturer', 'items', 'TEXT', 'Manufacturer Name', '5', '0', '0'),
 ('8', 'defprice', 'items', 'PRICE', 'Unit price', '6', '0', '0'),
 ('9', 'currency', 'items', 'AUTOSELECT(currency.name,code)', 'Currency', '7', '0', '0'),
 ('10', 'ammount', 'items', 'NUM', 'Ammount', '8', '0', '0'),
 ('11', 'owner', 'items', 'AUTOSELECT(login.fullname,id)', 'Owner', '9', '0', '0'),
 ('58', 'web', 'accounts', 'WEB', 'Web site', '15', '0', '0'),
 ('57', 'fax', 'accounts', 'PHONE', 'Fax', '14', '0', '0'),
 ('56', 'cellular', 'accounts', 'PHONE', 'Cellular', '13', '0', '0'),
 ('55', 'dir_phone', 'accounts', 'PHONE', 'Direct phone', '12', '0', '0'),
 ('54', 'phone', 'accounts', 'PHONE', 'Phone', '11', '0', '0'),
 ('53', 'email', 'accounts', 'EMAIL', 'Email', '10', '0', '0'),
 ('52', 'department', 'accounts', 'TEXT', 'Department', '9', '0', '0'),
 ('51', 'contact', 'accounts', 'TEXT', 'Contact', '8', '0', '0'),
 ('50', 'src_date', 'accounts', 'DATE', 'Valid date', '6', '0', '0'),
 ('49', 'src_tax', 'accounts', 'NUM', 'Recocnized VAT', '5', '0', '0'),
 ('48', 'pay_terms', 'accounts', 'TEXT', 'Payment terms', '4', '0', '0'),
 ('47', 'id6111', 'accounts', 'NUM', '6111 clause', '3', '0', '0'),
 ('46', 'vatnum', 'accounts', 'NUM', 'Registration number', '2', '0', '0'),
 ('45', 'company', 'accounts', 'TEXT', 'Account name', '1', '0', '0'),
 ('44', 'grp', 'accounts', 'HIDDEN', 'none', '0', '0', '0'),
 ('43', 'type', 'accounts', 'HIDDEN', 'Account type', '0', '0', '0'),
 ('42', 'prefix', 'accounts', 'PREFIX', 'none', '0', '0', '0'),
 ('41', 'num', 'accounts', 'AUTO', 'none', '0', '0', '0'),
 ('59', 'address', 'accounts', 'TEXT', 'Address', '16', '0', '0'),
 ('60', 'city', 'accounts', 'TEXT', 'City', '17', '0', '0'),
 ('61', 'zip', 'accounts', 'NUM', 'Zip', '18', '0', '0'),
 ('62', 'comments', 'accounts', 'TEXT', 'Comments', '19', '0', '0'),
 ('63', 'owner', 'accounts', 'AUTOSELECT(login.fullname,id)', 'Owner', '20', '0', '0'),
 ('65', 'num', 'docs', 'AUTO', 'none', '0', '0', '0'),
 ('66', 'prefix', 'docs', 'PREFIX', 'none', '0', '0', '0'),
 ('67', 'doctype', 'docs', 'HIDDEN', 'none', '0', '0', '0'),
 ('68', 'docnum', 'docs', 'HIDDEN', 'none', '0', '0', '0'),
 ('69', 'status', 'docs', 'HIDDEN', 'none', '0', '0', '0'),
 ('70', 'printed', 'docs', 'HIDDEN', 'none', '0', '0', '0'),
 ('71', 'account', 'docs', 'AUTOCOMPLETE(Account.0,num)', 'Customer', '1', '0', '0'),
 ('72', 'company', 'docs', 'TEXT', 'Company', '2', '0', '0'),
 ('73', 'vatnum', 'docs', 'NUM', 'Reg. num', '3', '0', '0'),
 ('74', 'address', 'docs', 'ADDRESS', 'Address', '4', '0', '0'),
 ('75', 'city', 'docs', 'TEXT', 'City', '5', '0', '0'),
 ('76', 'zip', 'docs', 'NUM', 'Zip', '6', '0', '0'),
 ('77', 'refnum', 'docs', 'NUM', 'Order number', '7', '0', '0'),
 ('78', 'issue_date', 'docs', 'DATE', 'Date', '8', '0', '0'),
 ('79', 'due_date', 'docs', 'DATE', 'To be paid until', '9', '0', '0'),
 ('80', 'comments', 'docs', 'TEXT', 'Comments', '10', '0', '0'),
 ('81', 'owner', 'docs', 'AUTOSELECT(login.fullname,id)', 'Owner', '11', '0', '0'),
 ('82', 'sub_total', 'docs', 'READONLY', 'Total for VAT', '12', '0', '0'),
 ('83', 'novat_total', 'docs', 'READONLY', 'No vat total', '13', '0', '0'),
 ('84', 'vat', 'docs', 'READONLY', 'VAT', '14', '0', '0'),
 ('85', 'total', 'docs', 'READONLY', 'Total', '15', '0', '0'),
 ('86', 'src_tax', 'docs', 'READONLY', 'Source tax', '16', '0', '0'),
 ('87', 'prefix', 'docdetails', 'PREFIX', 'none', '0', '0', '0'),
 ('88', 'num', 'docdetails', 'AUTO', 'none', '0', '0', '0'),
 ('89', 'cat_num', 'docdetails', 'AUTOCOMPLETE(Item.0,num)', 'Item', '1', '0', '0'),
 ('90', 'description', 'docdetails', 'TEXT', 'Description', '2', '0', '0'),
 ('91', 'qty', 'docdetails', 'NUM', 'Qty.', '3', '0', '0'),
 ('92', 'unit_price', 'docdetails', 'PRICE', 'Price', '4', '0', '0'),
 ('93', 'currency', 'docdetails', 'AUTOSELECT(currencies.name,id)', 'Currency', '5', '0', '0'),
 ('94', 'price', 'docdetails', 'PRICE', 'Total', '6', '0', '0'),
 ('95', 'nisprice', 'docdetails', 'PRICE', 'Total NIS', '7', '0', '0'),
 ('96', 'prefix', 'cheques', 'PREFIX', 'none', '0', '0', '0'),
 ('97', 'refnum', 'cheques', 'HIDDEN', 'none', '0', '0', '0'),
 ('98', 'type', 'cheques', 'AUTOSELECT(paymentType.name,id)', 'Payment method', '1', '0', '0'),
 ('99', 'creditcompany', 'cheques', 'AUTOSELECT(accounts.company,num)\r\n', 'Income Bank', '2', '0', '0'),
 ('100', 'cheque_num', 'cheques', 'NUM', 'Number', '3', '0', '0'),
 ('101', 'bank', 'cheques', 'TEXT', 'Bank', '4', '0', '0'),
 ('102', 'branch', 'cheques', 'NUM', 'Branch', '5', '0', '0'),
 ('103', 'cheque_acct', 'cheques', 'NUM', 'Account no.', '6', '0', '0'),
 ('104', 'cheque_date', 'cheques', 'DATE', 'Date', '7', '0', '0'),
 ('105', 'sum', 'cheques', 'PRICE', 'Sum', '8', '0', '0'),
 ('106', 'bank_refnum', 'cheques', 'HIDDEN', 'none', '0', '0', '0'),
 ('107', 'dep_date', 'cheques', 'HIDDEN', 'none', '0', '0', '0');



--
-- Structure for table `inventoryItem`
--

DROP TABLE IF EXISTS `inventoryItem`;

CREATE TABLE `inventoryItem` (
  `account_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `ammount` int(11) NOT NULL,
`idcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Structure for table `itemCategories`
--

DROP TABLE IF EXISTS `itemCategories`;

CREATE TABLE `itemCategories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `profit` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Data for table `itemCategories`
--

INSERT INTO `itemCategories` (`id`, `name`, `profit`) VALUES
 ('1', 'נשק', '10'),
 ('2', 'דיסק קשיח', '10'),
 ('3', 'כרטיס מסך', '10'),
 ('4', 'שעות עבודה', '0');



--
-- Structure for table `itemEav`
--

DROP TABLE IF EXISTS `itemEav`;

CREATE TABLE `itemEav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entity` int(11) NOT NULL,
  `attribute` int(11) NOT NULL,
  `value` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Data for table `itemEav`
--

INSERT INTO `itemEav` (`id`, `entity`, `attribute`, `value`) VALUES
 ('10', '58', '2', '0'),
 ('11', '58', '2', '0'),
 ('16', '56', '1', '11111'),
 ('17', '56', '3', '22222'),
 ('18', '56', '1', '11111'),
 ('19', '56', '3', '22222');



--
-- Structure for table `itemUnits`
--

DROP TABLE IF EXISTS `itemUnits`;

CREATE TABLE `itemUnits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `precision` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Data for table `itemUnits`
--

INSERT INTO `itemUnits` (`id`, `name`, `precision`) VALUES
 ('0', 'units', '0'),
 ('1', 'work hours', '0'),
 ('2', 'Meter', '0'),
 ('3', 'liter', '0'),
 ('4', 'gram', '0'),
 ('5', 'Kilo gram', '0');



--
-- Structure for table `itemVatCat`
--

DROP TABLE IF EXISTS `itemVatCat`;

CREATE TABLE `itemVatCat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Data for table `itemVatCat`
--

INSERT INTO `itemVatCat` (`id`, `name`) VALUES
 ('1', 'חייב מעמ'),
 ('2', 'פטור ממעמ'),
 ('10', 'מעמ מופחת'),
 ('12', 'מכירה באילת'),
 ('13', 'מכירת פיתות בשוק השחור');



--
-- Structure for table `items`
--

DROP TABLE IF EXISTS `items`;

CREATE TABLE `items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `itemVatCat_id` int(11) NOT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `extcatnum` varchar(30) DEFAULT NULL,
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
  KEY `currency_id` (`currency_id`),
  KEY `category_id` (`category_id`),
  KEY `parent_item_id` (`parent_item_id`),
KEY `itemVatCat_id` (`itemVatCat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3363 DEFAULT CHARSET=utf8;

--
-- Data for table `items`
--

INSERT INTO `items` (`id`, `name`, `itemVatCat_id`, `unit_id`, `extcatnum`, `manufacturer`, `saleprice`, `currency_id`, `ammount`, `owner`, `category_id`, `parent_item_id`, `isProduct`, `profit`, `purchaseprice`, `pic`, `description`, `stockType`, `modified`, `created`) VALUES
 ('56', 'M16', '1', '1', '321', '', '15000.00', 'ILS', '0', '8', '1', '0', '0', '0', '0.00', '', '', '0', '2013-09-12 10:24:40', '0000-00-00 00:00:00'),
 ('57', 'M4', '1', '1', '', '', '20000.00', '0', '0', '1', '1', '0', '0', '0', '0.00', '', '', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('58', 'שרת חזק ביותר', '1', '1', '', '', '10000.00', 'USD', '0', '1', '1', '0', '0', '0', '0.00', '', '', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('3351', 'ילקוט', '1', '1', '76543', NULL, '445.00', 'ILS', NULL, '1', '1', '0', '0', '0', '0.00', '', '', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('3352', 'בלטה', '1', '1', 'kjhg', NULL, '445.00', '0', NULL, '1', '0', '0', '0', '0', '0.00', '', '', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('3354', 'קקי', '1', '1', '654', NULL, '1.00', '0', NULL, '1', '0', '0', '0', '0', '0.00', '', '', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('3355', 'בלטה', '1', '1', '654', NULL, '15000.00', '0', NULL, '1', '0', '0', '0', '0', '0.00', '', '', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('3356', 'מחסנית', '1', '1', '1', NULL, '15.00', '0', NULL, '1', '0', '0', '0', '0', '0.00', '', '', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('3357', 'M16', '1', '1', '1', NULL, '4000.00', '0', NULL, '1', '0', '0', '0', '0', '0.00', '', '', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('3358', 'מחסנית', '1', '1', '1', NULL, '15.00', '0', NULL, '1', '0', '0', '0', '0', '0.00', '', '', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('3359', 'פר\"יט קר\'ב\'\\\'', '10', '1', '1', NULL, '4000.00', 'ILS', NULL, '1', '1', '0', '0', '0', '0.00', '', '', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('3360', 'מ16 בדולר', '1', '1', '16', NULL, '4000.00', '0', NULL, '1', '0', '0', '0', '0', '0.00', '', '', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('3361', 'שעת עבודה פיתוח PHP', '1', '1', NULL, NULL, '220.00', NULL, NULL, NULL, '4', '0', '0', '10', '0.00', '', '', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('3362', 'שעת עבודה פיתוח PHP', '1', '1', NULL, NULL, '220.00', '0', NULL, NULL, '1', '0', '1', '0', '0.00', '', '', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');



--
-- Structure for table `language`
--

DROP TABLE IF EXISTS `language`;

CREATE TABLE `language` (
  `id` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `language`
--

INSERT INTO `language` (`id`, `name`) VALUES
 ('en_us', 'English'),
 ('he_il', 'עברית');



--
-- Structure for table `openformat`
--

DROP TABLE IF EXISTS `openformat`;

CREATE TABLE `openformat` (
  `id` int(11) NOT NULL,
  `desc` text NOT NULL,
  `type` text NOT NULL,
  `size` int(11) NOT NULL,
  `record` int(11) NOT NULL,
  `action` text NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Data for table `openformat`
--

INSERT INTO `openformat` (`id`, `desc`, `type`, `size`, `record`, `action`) VALUES
 ('1000', 'קוד רשומה', 's', '4', '1', 'companies'),
 ('1001', 'נתנוים עתדיים', 's', '5', '1', 'NA'),
 ('1002', 'סך רשומות בקובץ', 'n', '15', '1', 'NA'),
 ('1003', 'עוסק מורשה', 'n', '9', '1', 'regnum'),
 ('1004', 'מזהה ראשי', 'n', '15', '1', 'prefix'),
 ('1005', 'קבוע מערכת', 's', '8', '1', 'NA'),
 ('1006', 'רישום תוכנה', 'n', '8', '1', 'NA'),
 ('1007', 'שם תוכנה', 's', '20', '1', 'NA'),
 ('1008', 'מהדורה', 's', '20', '1', 'NA'),
 ('1009', 'עמ של יצרן', 'n', '9', '1', 'NA'),
 ('1010', 'יצרן תוכנה', 's', '20', '1', 'NA'),
 ('1011', 'סוג תוכנה', 'n', '1', '1', '??'),
 ('1012', 'נתיב שמירת קובץ', 's', '50', '1', 'NA'),
 ('1013', 'סוג הנהחש', 'n', '1', '1', '??'),
 ('1014', 'איזון חשבונאי נדרש', 'n', '1', '1', '??'),
 ('1015', 'מספר חברה ברשם החברות', 'n', '9', '1', 'NA'),
 ('1016', 'תיק ניכויים', 'n', '9', '1', 'NA'),
 ('1017', 'נתונים עתידיים', 's', '10', '1', 'NA'),
 ('1018', 'שם העסק', 's', '50', '1', 'companyname'),
 ('1019', 'מען העסק רחוב', 's', '50', '1', 'address'),
 ('1020', 'מען העסק מס בית', 's', '10', '1', 'address'),
 ('1021', 'מען העסק עיר', 's', '30', '1', 'city'),
 ('1022', 'מען העסק מיקוד', 's', '8', '1', 'zip'),
 ('1023', 'שנת המס', 'n', '4', '1', 'NA'),
 ('1024', 'תאריך חיתוך', 'n', '8', '1', 'NA'),
 ('1025', 'תאריך חיתוך סןף', 'n', '8', '1', 'NA'),
 ('1026', 'תאריך הפקה', 'n', '8', '1', 'NA'),
 ('1027', 'שעת הפקה', 'n', '4', '1', 'NA'),
 ('1028', 'קוד שפה', 'n', '1', '1', 'NA'),
 ('1029', 'סט תווים', 'n', '1', '1', 'NA'),
 ('1030', 'שם תוכנת הכיווץ', 's', '20', '1', 'NA'),
 ('1031', '', '', '0', '0', ''),
 ('1032', 'מטבע מוביל', 's', '3', '1', 'NA'),
 ('1033', '', '', '0', '0', ''),
 ('1034', 'סניפים/ענפים', 'n', '1', '1', 'NA'),
 ('1035', 'נתונים עתידיים', 's', '46', '1', 'NA'),
 ('1050', 'סוג רשומה', 's', '4', '10', 'NA'),
 ('1051', 'סך רשומות', 'n', '15', '10', 'NA'),
 ('1100', 'קוד רשומה', 's', '4', '9', 'openline'),
 ('1101', 'מס רשומה', 'n', '9', '9', 'NA'),
 ('1102', 'עוסק מורשה', 'n', '9', '9', 'NA'),
 ('1103', 'מזהה ראשי', 'n', '15', '9', 'NA'),
 ('1104', 'קבוע מערכת', 's', '8', '9', 'NA'),
 ('1105', 'נתונים עתדיים', 's', '50', '9', 'NA'),
 ('1150', 'קוד רשומה', 's', '4', '8', 'NA'),
 ('1151', 'מס רשומה', 'n', '9', '8', 'NA'),
 ('1152', 'עוסק מורשה', 'n', '9', '8', 'NA'),
 ('1153', 'מזהה ראשי', 'n', '9', '8', 'NA'),
 ('1154', 'קבוע מערכת', 's', '8', '8', 'NA'),
 ('1155', 'סך רשומות בקובץ', 'n', '15', '8', 'NA'),
 ('1156', 'נתונים עתדיים', 's', '50', '8', 'NA'),
 ('1200', 'קוד רשימה', 's', '4', '4', 'doc/rcpt'),
 ('1201', 'רשומה בקובץ', 'n', '9', '4', 'NA'),
 ('1202', 'עוסק מורשה', 'n', '9', '4', 'NA'),
 ('1203', 'סוג מסמך', 'n', '3', '4', 'doctype'),
 ('1204', 'מספר מסמך', 's', '20', '4', 'docnum'),
 ('1205', 'תאריך הפקה', 'date', '8', '4', 'NA'),
 ('1206', 'שעת הפקה', 'hour', '4', '4', 'NA'),
 ('1207', 'שם לקוח/ספק', 's', '50', '4', 'company'),
 ('1208', 'מען רחוב', 's', '50', '4', 'address'),
 ('1209', 'מען מס בית', 's', '10', '4', 'address'),
 ('1210', 'מען עיר', 's', '30', '4', 'city'),
 ('1211', 'מען מיקוד', 's', '8', '4', 'zip'),
 ('1212', 'מען מדינה', 's', '30', '4', 'NA'),
 ('1213', 'מען קוד מדינה', 's', '2', '4', 'NA'),
 ('1214', 'טלפון', 's', '15', '4', 'NA'),
 ('1215', 'עוסק מורשה לקוח', 'n', '9', '4', 'vatnum'),
 ('1216', 'תאריך ערך', 'date', '8', '4', 'due_date'),
 ('1217', 'סכום סופי של המסמך במט\"ח', 'v99', '15', '4', 'NA'),
 ('1218', 'קוד מטח', 's', '3', '4', 'NA'),
 ('1219', 'סכום לפני הנחה', 'v99', '15', '4', 'sub_total'),
 ('1220', 'הנחה', 'v99', '15', '4', 'NA'),
 ('1221', 'סכום ללא מעמ', 'v99', '15', '4', 'sub_total'),
 ('1222', 'סכום מעמ', 'v99', '15', '4', 'vat'),
 ('1223', 'סכום כולל', 'v99', '15', '4', 'total'),
 ('1224', 'סכום ניכוי במקור', 'v99', '12', '4', 'NA'),
 ('1225', 'מספר לקוח בתוכנה', 's', '15', '4', 'account'),
 ('1226', 'שדה התאמה', 's', '10', '4', 'NA'),
 ('1227', '', '', '0', '0', ''),
 ('1228', 'מסמך מבוטל', 's', '1', '4', 'status'),
 ('1229', '', '', '0', '0', ''),
 ('1230', 'תאריך המסמך', 'date', '8', '4', 'issue_date'),
 ('1231', 'מזהה סניף/ענף', 's', '7', '4', 'NA'),
 ('1232', '', '', '0', '0', ''),
 ('1233', 'מבצע הפעולה', 's', '9', '4', 'NA'),
 ('1234', 'שדה מקשר לשורה', 'n', '7', '4', 'num'),
 ('1235', 'שטח לנתונים עתידיים', 's', '13', '4', 'NA'),
 ('1250', 'קוד רשומה', 's', '4', '5', 'docdetials'),
 ('1251', 'מספר רשומה', 'n', '9', '5', 'NA'),
 ('1252', 'עוסק מורשה', 'n', '9', '5', 'NA'),
 ('1253', 'סוג מסמך', 'n', '3', '5', 'doctype'),
 ('1254', 'מספר המסמך', 's', '20', '5', 'num'),
 ('1255', 'מספר שורה במסמך', 'n', '4', '5', 'NA'),
 ('1256', 'סוג מסמך בסיס', 'n', '3', '5', 'NA'),
 ('1257', 'מספר מסמך בסיס', 's', '20', '5', 'NA'),
 ('1258', 'סוג עסקה', 'n', '1', '5', 'NA'),
 ('1259', 'מקט פנימי', 's', '20', '5', 'cat_num'),
 ('1260', 'תיאור הטובין או הפריט', 's', '30', '5', 'description'),
 ('1261', 'שם יצרן', 's', '50', '5', 'NA'),
 ('1262', 'מספר סידורי של היצרן', 's', '30', '5', 'NA'),
 ('1263', 'תיאור יחידת מידה', 's', '20', '5', 'NA'),
 ('1264', 'הכמות', 'v9999', '17', '5', 'qty'),
 ('1265', 'מחיר ליחידה ללא מעמ', 'v99', '15', '5', 'unit_price'),
 ('1266', 'הנחת שורה', 'v99', '15', '5', 'NA'),
 ('1267', 'סך סכום לשורה', 'v99', '15', '5', 'price'),
 ('1268', 'שיעור המעמ בשורה', 'n', '2', '5', 'NA'),
 ('1269', '', '', '0', '0', ''),
 ('1270', 'מזהה סניף/ענף', 's', '7', '5', 'NA'),
 ('1271', '', '', '0', '0', ''),
 ('1272', 'תאריך המסמך', 'date', '8', '5', 'NA'),
 ('1273', 'שדה מקושר לכותרת', 'n', '7', '5', 'NA'),
 ('1274', 'מזהה סניף/ענף למסמך בסיס', 's', '7', '5', 'NA'),
 ('1275', 'נתונים עתידיים', 's', '21', '5', 'NA'),
 ('1300', 'קוד רשומה', 's', '4', '6', 'cheques'),
 ('1301', 'מספר רשומה', 'n', '9', '6', 'NA'),
 ('1302', 'עוסק מורשה', 'n', '9', '6', 'NA'),
 ('1303', 'סוג מסמך', 'n', '3', '6', 'doctype'),
 ('1304', 'מספר מסמך', 's', '20', '6', 'refnum'),
 ('1305', 'מספר שורה במסמך', 'n', '4', '6', 'NA'),
 ('1306', 'סוג אמצעי תשלום', 'n', '1', '6', 'type'),
 ('1307', 'מספר בנק', 'n', '10', '6', 'bank'),
 ('1308', 'מספר סניף', 'n', '10', '6', 'branch'),
 ('1309', 'מספר חשבון', 'n', '15', '6', 'cheque_date'),
 ('1310', 'מספר המחאה', 'n', '10', '6', 'cheque_num'),
 ('1311', 'תאריך פרעון', 'date', '8', '6', 'cheque_date'),
 ('1312', 'סכום השורה', 'v99', '15', '6', 'sum'),
 ('1313', 'קוד החברה הסולקת', 'n', '1', '6', 'NA'),
 ('1314', 'שם הכרטיס הנסלק', 's', '20', '6', 'NA'),
 ('1315', 'סוג עסקת אשראי', 'n', '1', '6', 'NA'),
 ('1316', '', '', '0', '0', ''),
 ('1317', '', '', '0', '0', ''),
 ('1318', '', '', '0', '0', ''),
 ('1319', '', '', '0', '0', ''),
 ('1320', 'מזהה סניף/ענף', 's', '7', '6', 'NA'),
 ('1321', '', '', '0', '0', ''),
 ('1322', 'תאריך מסמך', 'date', '8', '6', 'NA'),
 ('1323', 'שדה מקשר לכותרת', 'n', '7', '6', 'NA'),
 ('1324', 'נתונים עתידיים', 's', '60', '6', 'NA'),
 ('1350', 'קוד רשומה', 's', '4', '2', 'transactions'),
 ('1351', 'מספר רשומה', 'n', '9', '2', 'NA'),
 ('1352', 'עוסק מורשה', 'n', '9', '2', 'NA'),
 ('1353', 'מספר תנועה', 'n', '10', '2', 'num'),
 ('1354', 'מספר שורה בתנועה', 'n', '5', '2', 'NA'),
 ('1355', 'מנה', 'n', '8', '2', 'NA'),
 ('1356', 'סוג תנועה', 's', '15', '2', 'type'),
 ('1357', 'אסמכתא', 's', '20', '2', 'refnum1'),
 ('1358', 'סוג מסמך אסמכתא', 'n', '3', '2', 'NA'),
 ('1359', 'אסמכתא 2', 's', '20', '2', 'refnum2'),
 ('1360', 'סוג מסמך אסמכתא 2', 'n', '3', '2', 'NA'),
 ('1361', 'פרטים', 's', '50', '2', 'details'),
 ('1362', 'תאריך', 'date', '8', '2', 'date'),
 ('1363', 'תאריך ערך', 'date', '8', '2', 'date'),
 ('1364', 'חשבון בתנועה', 's', '15', '2', 'account'),
 ('1365', 'חשבון נגדי', 's', '15', '2', 'account1'),
 ('1366', 'סימן הפועלה', 'n', '1', '2', 'value'),
 ('1367', 'קוד מטבע מטח', 's', '3', '2', 'NA'),
 ('1368', 'סכום הפעולה', 'v99', '15', '2', 'sum'),
 ('1369', 'סכום מטח', 'v99', '15', '2', 'NA'),
 ('1370', 'שדה כמות', 'v99', '12', '2', 'NA'),
 ('1371', 'שדה התאמה 1', 's', '10', '2', 'NA'),
 ('1372', 'שדה התאמה 2', 's', '10', '2', 'NA'),
 ('1373', '', '', '0', '0', ''),
 ('1374', 'מזהה סניף/ענף', 's', '7', '2', 'NA'),
 ('1375', 'תאריך הזנה', 'date', '8', '2', 'NA'),
 ('1376', 'מבצע פעולה', 's', '9', '2', 'NA'),
 ('1377', 'נתונים עתידיים', 's', '25', '2', 'NA'),
 ('1400', 'קוד רשומה', 's', '4', '3', 'accounts'),
 ('1401', 'מספר רשומה', 'n', '9', '3', 'NA'),
 ('1402', 'עוסק מורשה', 'n', '9', '3', 'NA'),
 ('1403', 'מפתח החשבון', 's', '15', '3', 'num'),
 ('1404', 'שם חשבון', 's', '50', '3', 'company'),
 ('1405', 'קוד מאזן בוחן', 's', '15', '3', 'type'),
 ('1406', 'תיאור קוד מאזן בוחן', 's', '30', '3', 'typedesc'),
 ('1407', 'מען רחוב', 's', '30', '3', 'address'),
 ('1408', 'מען מספר בית', 's', '50', '3', 'address'),
 ('1409', 'מען עיר', 's', '10', '3', 'city'),
 ('1410', 'מען מיקוד', 's', '8', '3', 'zip'),
 ('1411', 'מען מדינה', 's', '30', '3', 'NA'),
 ('1412', 'קוד מדינה', 's', '2', '3', 'NA'),
 ('1413', 'חשבון מרכז', 's', '15', '3', 'NA'),
 ('1414', 'יתרת חשבון בתחילת החתך', 'v99', '15', '3', 'NA'),
 ('1415', 'סהכ חובה', 'v99', '15', '3', 'NA'),
 ('1416', 'סהכ זכות', 'v99', '15', '3', 'NA'),
 ('1417', 'קוד בסיווג חשבונאי', 'n', '4', '3', 'id6111'),
 ('1418', '', '', '0', '0', ''),
 ('1419', 'מספר עוסק לקוח', 'n', '9', '3', 'vatnum'),
 ('1420', '', '', '0', '0', ''),
 ('1421', 'מזהה סניף/ענף', 's', '7', '3', 'NA'),
 ('1422', 'יתרת חשבון בתחילת חתך במטח', 'v99', '15', '3', 'NA'),
 ('1423', 'קוד מטבע יתרת חשבון במטח', 's', '3', '3', 'NA'),
 ('1424', 'שטח לנתונים עתדיים', 's', '16', '3', 'NA'),
 ('1450', 'קוד רשומה', 's', '4', '7', 'items'),
 ('1451', 'רשומה בקובץ', 'n', '9', '7', 'NA'),
 ('1452', 'עוסק מורשה', 'n', '9', '7', 'NA'),
 ('1453', 'מקט פריט', 's', '20', '7', 'num'),
 ('1454', 'מקט ספק יצרן', 's', '20', '7', 'extcatnum'),
 ('1455', 'מקט פנימי', 's', '20', '7', 'manufacturer'),
 ('1456', 'שם פריט', 's', '50', '7', 'name'),
 ('1457', 'קוד מיון', 's', '10', '7', 'NA'),
 ('1458', 'תיאור קוד מיון', 's', '30', '7', 'NA'),
 ('1459', 'תיאור יחידת מידה', 's', '20', '7', 'unit'),
 ('1460', 'יתרת פריטת לתחילת חתך', 'v99', '12', '7', 'ammount'),
 ('1461', 'סך הכל כניסות', 'v99', '12', '7', 'NA'),
 ('1462', 'סך הכל יציאות', 'v99', '12', '7', 'NA'),
 ('1463', '', 'v99', '10', '7', 'NA'),
 ('1464', '', 'v99', '10', '7', 'defprice'),
 ('1465', 'נתונים עתדיים', 's', '50', '7', 'NA');



--
-- Structure for table `openformattype`
--

DROP TABLE IF EXISTS `openformattype`;

CREATE TABLE `openformattype` (
  `id` int(2) NOT NULL DEFAULT '0',
  `str` varchar(4) DEFAULT NULL,
  `desc` varchar(26) DEFAULT NULL,
  `type` varchar(8) DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Data for table `openformattype`
--

INSERT INTO `openformattype` (`id`, `str`, `desc`, `type`) VALUES
 ('1', 'A000', 'רשימת פתיחה', 'INI'),
 ('2', 'B100', 'תנועת הנהח', 'BKMVDATA'),
 ('3', 'B110', 'חשבון בהנהח', 'BKMVDATA'),
 ('4', 'C100', 'כותרת מסמך', 'BKMVDATA'),
 ('5', 'D110', 'פריט מסמך', 'BKMVDATA'),
 ('6', 'D120', 'פריט קבלה', 'BKMVDATA'),
 ('7', 'M100', 'פריט מלאי', 'BKMVDATA'),
 ('8', 'Z900', 'רשומת סגירה DATA', 'BKMVDATA'),
 ('9', 'A100', 'רשימת פתיחה DATA', 'BKMVDATA'),
 ('10', 'B100', 'תנועת הנהח', 'INI'),
 ('11', 'B110', 'חשבון בהנהח', 'INI'),
 ('12', 'C100', 'כותרת מסמך', 'INI'),
 ('13', 'D110', 'פריט מסמך', 'INI'),
 ('14', 'D120', 'פריט קבלה', 'INI'),
 ('15', 'M100', 'פריט מלאי', 'INI');



--
-- Structure for table `paymentType`
--

DROP TABLE IF EXISTS `paymentType`;

CREATE TABLE `paymentType` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `value` varchar(80) NOT NULL,
  `oppt_account_id` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Data for table `paymentType`
--

INSERT INTO `paymentType` (`id`, `name`, `value`, `oppt_account_id`) VALUES
 ('1', 'Cash', '', '150'),
 ('2', 'Cheque', '', '150'),
 ('3', 'Credit card', '', '150'),
 ('4', 'Bank transfer', '', '150'),
 ('5', 'Manual Credit', '', '150');



--
-- Structure for table `tranrep`
--

DROP TABLE IF EXISTS `tranrep`;

CREATE TABLE `tranrep` (
  `prefix` varchar(40) DEFAULT NULL,
  `num` int(10) unsigned DEFAULT NULL,
  `date` date DEFAULT NULL,
  `refnum` char(20) DEFAULT NULL,
  `acctnum` int(10) unsigned DEFAULT NULL,
  `acctname` varchar(80) DEFAULT NULL,
  `opacct` int(10) unsigned DEFAULT NULL,
  `opacctname` varchar(40) DEFAULT NULL,
  `details` varchar(256) DEFAULT NULL,
  `total` decimal(8,2) DEFAULT NULL,
  `vat` decimal(8,2) DEFAULT NULL,
  `sum` decimal(8,2) DEFAULT NULL,
  KEY `prefix` (`prefix`,
`num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Structure for table `transactionType`
--

DROP TABLE IF EXISTS `transactionType`;

CREATE TABLE `transactionType` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Data for table `transactionType`
--

INSERT INTO `transactionType` (`id`, `name`) VALUES
 ('0', 'Manual'),
 ('1', 'Invoice'),
 ('2', 'Supplier Invoicve'),
 ('3', 'Receipt'),
 ('4', 'CHEQUEDEPOSIT'),
 ('5', 'SUPPLIERPAYMENT'),
 ('6', 'vat'),
 ('7', 'STORENO'),
 ('8', 'BANKMATCH'),
 ('9', 'SRCTAX'),
 ('10', 'PATTERN'),
 ('11', 'MANINVOICE'),
 ('12', 'MANRECEIPT'),
 ('14', 'TRAN_PRETAX'),
 ('15', 'TRAN_SALARY'),
 ('16', 'OPBALANCE'),
 ('17', 'RETURNINV'),
 ('18', 'INVRCPT'),
 ('19', 'DOCREDIT'),
 ('20', 'DOCPROFORMA'),
 ('21', 'DELIVERY');



--
-- Structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `refnum1` varchar(255) NOT NULL,
  `refnum2` varchar(255) NOT NULL,
  `valuedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `details` varchar(255) NOT NULL,
  `currency_id` varchar(3) NOT NULL,
  `sum` decimal(20,2) NOT NULL,
  `leadsum` decimal(20,2) NOT NULL,
  `secsum` decimal(20,2) DEFAULT NULL,
  `owner_id` int(11) NOT NULL,
  `linenum` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

--
-- Data for table `transactions`
--

INSERT INTO `transactions` (`id`, `num`, `account_id`, `type`, `refnum1`, `refnum2`, `valuedate`, `date`, `details`, `currency_id`, `sum`, `leadsum`, `secsum`, `owner_id`, `linenum`) VALUES
 ('7', '39', '0', '0', '108', '', '0000-00-00 00:00:00', '2013-09-12 16:09:45', 'משרד הבטחון', '0', '445.00', '445.00', '445.00', '1', '1'),
 ('8', '39', '201', '0', '108', '', '0000-00-00 00:00:00', '2013-09-12 16:09:45', 'משרד הבטחון', '0', '525.10', '525.10', '525.10', '1', '2'),
 ('9', '39', '201', '0', '108', '', '0000-00-00 00:00:00', '2013-09-12 16:09:45', 'משרד הבטחון', '0', '80.10', '80.10', '80.10', '1', '3'),
 ('10', '40', '0', '0', '109', '', '0000-00-00 00:00:00', '2013-09-12 16:09:20', 'משרד הבטחון', 'ILS', '445.00', '445.00', '445.00', '1', '1'),
 ('11', '40', '201', '0', '109', '', '0000-00-00 00:00:00', '2013-09-12 16:09:20', 'משרד הבטחון', 'ILS', '525.10', '525.10', '525.10', '1', '2'),
 ('12', '40', '201', '0', '109', '', '0000-00-00 00:00:00', '2013-09-12 16:09:20', 'משרד הבטחון', 'ILS', '80.10', '80.10', '80.10', '1', '3'),
 ('13', '41', '0', '0', '110', '', '2013-09-12 16:09:31', '2013-09-12 16:09:31', 'משרד הבטחון', 'ILS', '445.00', '445.00', '445.00', '1', '1'),
 ('14', '41', '201', '0', '110', '', '2013-09-12 16:09:31', '2013-09-12 16:09:31', 'משרד הבטחון', 'ILS', '525.10', '525.10', '525.10', '1', '2'),
 ('15', '41', '201', '0', '110', '', '2013-09-12 16:09:31', '2013-09-12 16:09:31', 'משרד הבטחון', 'ILS', '80.10', '80.10', '80.10', '1', '3'),
 ('16', '42', '100', '0', '116', '', '2013-09-12 16:09:22', '2013-09-12 16:09:22', 'משרד הבטחון', 'ILS', '445.00', '445.00', '445.00', '1', '1'),
 ('17', '42', '201', '0', '116', '', '2013-09-12 16:09:22', '2013-09-12 16:09:22', 'משרד הבטחון', 'ILS', '525.10', '525.10', '525.10', '1', '2'),
 ('18', '42', '3', '0', '116', '', '2013-09-12 16:09:22', '2013-09-12 16:09:22', 'משרד הבטחון', 'ILS', '80.10', '80.10', '80.10', '1', '3'),
 ('19', '44', '100', '0', '118', '', '2013-09-12 17:09:34', '2013-09-12 17:09:34', 'משרד הבטחון', 'ILS', '445.00', '445.00', '445.00', '1', '1'),
 ('20', '44', '201', '0', '118', '', '2013-09-12 17:09:34', '2013-09-12 17:09:34', 'משרד הבטחון', 'USD', '1785.34', '525.10', '1785.34', '1', '2'),
 ('21', '44', '3', '0', '118', '', '2013-09-12 17:09:34', '2013-09-12 17:09:34', 'משרד הבטחון', 'ILS', '80.10', '80.10', '80.10', '1', '3'),
 ('22', '45', '100', '0', '119', '', '2013-09-12 17:09:21', '2013-09-12 17:09:21', 'משרד הבטחון', 'ILS', '445.00', '445.00', '445.00', '1', '1'),
 ('23', '45', '201', '0', '119', '', '2013-09-12 17:09:21', '2013-09-12 17:09:21', 'משרד הבטחון', 'USD', '154.44', '525.10', '154.44', '1', '2'),
 ('24', '45', '3', '0', '119', '', '2013-09-12 17:09:21', '2013-09-12 17:09:21', 'משרד הבטחון', 'ILS', '80.10', '80.10', '80.10', '1', '3'),
 ('25', '46', '100', '0', '120', '', '2013-09-12 17:09:43', '2013-09-12 17:09:43', 'משרד הבטחון', 'ILS', '445.00', '445.00', '445.00', '1', '1'),
 ('26', '46', '201', '0', '120', '', '2013-09-12 17:09:43', '2013-09-12 17:09:43', 'משרד הבטחון', 'USD', '154.44', '525.10', '154.44', '1', '2'),
 ('27', '46', '3', '0', '120', '', '2013-09-12 17:09:43', '2013-09-12 17:09:43', 'משרד הבטחון', 'ILS', '80.10', '80.10', '80.10', '1', '3'),
 ('28', '58', '113', '0', '321', '123', '2013-09-12 20:17:20', '2013-09-12 20:09:20', 'ניסיון', 'ILS', '50.00', '50.00', '50.00', '1', '1'),
 ('29', '59', '100', '0', '121', '', '2013-09-12 20:09:53', '2013-09-12 20:09:53', 'Google Inc', 'ILS', '4000.00', '4000.00', '4000.00', '1', '1'),
 ('30', '59', '206', '0', '121', '', '2013-09-12 20:09:53', '2013-09-12 20:09:53', 'Google Inc', 'ILS', '4720.00', '4720.00', '4720.00', '1', '2'),
 ('31', '59', '3', '0', '121', '', '2013-09-12 20:09:53', '2013-09-12 20:09:53', 'Google Inc', 'ILS', '720.00', '720.00', '720.00', '1', '3'),
 ('32', '60', '100', '0', '122', '', '2013-09-13 15:09:09', '2013-09-13 15:09:09', 'משרד הבטחון', 'ILS', '15000.00', '15000.00', '15000.00', '1', '1'),
 ('33', '60', '201', '0', '122', '', '2013-09-13 15:09:09', '2013-09-13 15:09:09', 'משרד הבטחון', 'USD', '17700.00', '60180.00', '17700.00', '1', '2'),
 ('34', '60', '3', '0', '122', '', '2013-09-13 15:09:09', '2013-09-13 15:09:09', 'משרד הבטחון', 'ILS', '9180.00', '9180.00', '9180.00', '1', '3'),
 ('35', '61', '201', '0', '321', '123', '2013-09-17 11:22:00', '2013-09-17 11:09:00', 'ידני', 'USD', '29.41', '100.00', '29.41', '1', '1'),
 ('36', '62', '201', '0', '321', '123', '2013-09-17 11:22:00', '2013-09-17 11:09:00', 'ידני', 'USD', '-14.71', '-50.00', '-14.71', '1', '2'),
 ('37', '63', '201', '0', '321', '123', '2013-09-17 11:22:00', '2013-09-17 11:09:00', 'ידני', 'USD', '-14.71', '-50.00', '-14.71', '1', '3'),
 ('38', '64', '201', '0', '321', '123', '2013-09-17 11:26:55', '2013-09-17 11:09:55', 'ידני 2', 'USD', '-29.41', '-100.00', '-29.41', '1', '1'),
 ('39', '64', '113', '0', '321', '123', '2013-09-17 11:26:55', '2013-09-17 11:09:55', 'ידני 2', 'ILS', '50.00', '50.00', '50.00', '1', '2'),
 ('40', '65', '201', '0', '321', '123', '2013-09-17 11:28:36', '2013-09-17 11:09:36', 'ידני 3', 'USD', '-29.41', '-100.00', '-29.41', '1', '1'),
 ('41', '65', '202', '0', '321', '123', '2013-09-17 11:28:36', '2013-09-17 11:09:36', 'ידני 3', 'ILS', '50.00', '50.00', '50.00', '1', '2'),
 ('42', '65', '203', '0', '321', '123', '2013-09-17 11:28:36', '2013-09-17 11:09:36', 'ידני 3', 'ILS', '50.00', '50.00', '50.00', '1', '3'),
 ('43', '66', '100', '0', '123', '', '2013-09-18 19:09:00', '2013-09-18 19:09:00', 'משרד הבטחון', 'ILS', '20000.00', '20000.00', '20000.00', '1', '1'),
 ('44', '66', '201', '0', '123', '', '2013-09-18 19:09:00', '2013-09-18 19:09:00', 'משרד הבטחון', 'USD', '23600.00', '80240.00', '23600.00', '1', '2'),
 ('45', '66', '3', '0', '123', '', '2013-09-18 19:09:00', '2013-09-18 19:09:00', 'משרד הבטחון', 'ILS', '12240.00', '12240.00', '12240.00', '1', '3'),
 ('46', '67', '84', '16', '', '', '2013-10-01 15:02:26', '2013-10-01 15:10:26', 'Opening Balance', 'ILS', '200.00', '200.00', '200.00', '1', '1'),
 ('47', '67', '9', '16', '', '', '2013-10-01 15:02:26', '2013-10-01 15:10:26', 'Opening Balance', 'ILS', '-200.00', '-200.00', '-200.00', '1', '2'),
 ('48', '68', '204', '16', '', '', '2013-10-01 15:04:51', '2013-10-01 15:10:51', 'Opening Balance', 'ILS', '201.00', '201.00', '201.00', '1', '1'),
 ('49', '68', '9', '16', '', '', '2013-10-01 15:04:51', '2013-10-01 15:10:51', 'Opening Balance', 'ILS', '-201.00', '-201.00', '-201.00', '1', '2'),
 ('50', '69', '206', '16', '', '', '2013-10-01 15:05:19', '2013-10-01 15:10:19', 'Opening Balance', 'ILS', '50.00', '50.00', '50.00', '1', '1'),
 ('51', '69', '9', '16', '', '', '2013-10-01 15:05:19', '2013-10-01 15:10:19', 'Opening Balance', 'ILS', '-50.00', '-50.00', '-50.00', '1', '2'),
 ('56', '74', '3', '6', '', '', '0000-00-00 00:00:00', '2013-10-07 16:10:17', 'vat', 'ILS', '-22460.40', '-22460.40', '-22460.40', '1', '1'),
 ('57', '74', '4', '6', '', '', '0000-00-00 00:00:00', '2013-10-07 16:10:17', 'vat', 'ILS', '22460.40', '22460.40', '22460.40', '1', '2'),
 ('58', '74', '1', '6', '', '', '0000-00-00 00:00:00', '2013-10-07 16:10:17', 'vat', 'ILS', '0.00', '0.00', '0.00', '1', '3'),
 ('59', '74', '4', '6', '', '', '0000-00-00 00:00:00', '2013-10-07 16:10:18', 'vat', 'ILS', '0.00', '0.00', '0.00', '1', '4'),
 ('60', '74', '3', '6', '', '', '0000-00-00 00:00:00', '2013-10-07 16:10:18', 'vat', 'ILS', '22460.40', '22460.40', '22460.40', '1', '5'),
 ('61', '74', '4', '6', '', '', '0000-00-00 00:00:00', '2013-10-07 16:10:18', 'vat', 'ILS', '-22460.40', '-22460.40', '-22460.40', '1', '6');



--
-- Structure for table `userIncomeMap`
--

DROP TABLE IF EXISTS `userIncomeMap`;

CREATE TABLE `userIncomeMap` (
  `user_id` int(11) NOT NULL,
  `itemVatCat_id` int(11) NOT NULL,
  `account_id` int(11) unsigned NOT NULL,
  KEY `itemVatCat_id` (`itemVatCat_id`),
  KEY `account_id` (`account_id`),
KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `userIncomeMap`
--

INSERT INTO `userIncomeMap` (`user_id`, `itemVatCat_id`, `account_id`) VALUES
 ('1', '1', '100'),
 ('1', '2', '102'),
 ('8', '1', '100'),
 ('8', '2', '100'),
 ('9', '1', '100'),
 ('9', '2', '100'),
 ('1', '10', '210'),
 ('8', '10', '100'),
 ('9', '10', '100'),
 ('1', '12', '103'),
 ('8', '12', '100'),
 ('9', '12', '100'),
 ('1', '13', '100'),
 ('8', '13', '100'),
 ('9', '13', '100');



SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
