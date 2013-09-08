-- phpMyAdmin SQL Dump
-- version 3.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Sep 08, 2013 at 04:05 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.9-4ubuntu2.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `linetnew`
--

-- --------------------------------------------------------

--
-- Table structure for table `accCountry`
--

CREATE TABLE IF NOT EXISTS `accCountry` (
  `id` varchar(2) NOT NULL DEFAULT '',
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accCountry`
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
('CI', 'Cote d''Ivoire'),
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
('KP', 'Korea, Democratic People''s Republic of'),
('KR', 'Korea, Republic of'),
('KW', 'Kuwait'),
('KY', 'Cayman Islands'),
('KZ', 'Kazakhstan'),
('LA', 'Lao People''s Democratic Republic'),
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

-- --------------------------------------------------------

--
-- Table structure for table `accEav`
--

CREATE TABLE IF NOT EXISTS `accEav` (
  `entity` bigint(20) unsigned NOT NULL,
  `attribute` varchar(250) NOT NULL,
  `value` text NOT NULL,
  KEY `ikEntity` (`entity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accEav`
--


-- --------------------------------------------------------

--
-- Table structure for table `accHist`
--

CREATE TABLE IF NOT EXISTS `accHist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) unsigned DEFAULT NULL,
  `dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `details` text,
  PRIMARY KEY (`id`),
  KEY `prefix` (`account_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `accHist`
--

INSERT INTO `accHist` (`id`, `account_id`, `dt`, `details`) VALUES
(1, 204, '2011-11-12 00:00:00', 'כייע');

-- --------------------------------------------------------

--
-- Table structure for table `accId6111`
--

CREATE TABLE IF NOT EXISTS `accId6111` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `percentage` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accId6111`
--

INSERT INTO `accId6111` (`id`, `name`, `percentage`) VALUES
(1010, ' הכנסות ממכירות בארץ', 0),
(1020, ' הכנסות ממכירות לחו"ל', 0),
(1030, ' הכנסות ממתן שירותים בארץ', 0),
(1040, ' הכנסות ממתן שירותים בחו"ל', 0),
(1090, ' הכנסות אחרות', 0),
(3510, ' שכר עבודה ונילוות', 0),
(3515, ' ביטוחים', 0),
(3520, ' עבודות חוץ וקבלני משנה', 0),
(3530, ' עמלות ובונוסים לסוכנים', 0),
(3535, ' הוצאות ציוד מתכלה', 0),
(3540, ' שירותים מקצועיים', 0),
(3545, ' הוצאות אריזה', 0),
(3550, ' הוצאות אחזקה ותיקונים', 0),
(3555, ' הוצאות מחקר ופיתוח', 0),
(3560, ' נסיעות', 0),
(3565, ' אחזקת רכב והובלות', 0),
(3570, ' דמי שכירות וניהול נכסים', 0),
(3575, ' מיסים ואגרות', 0),
(3580, ' פחת', 0),
(3590, ' חשמל ומים', 0),
(3595, ' שמירה וניקיון', 0),
(3600, ' השתלמות וספרות מקצועית', 0),
(3610, ' חובות מסופקים ואבודים', 0),
(3620, ' פרסום וקידום מכירות', 0),
(3625, ' כיבודים מתנות תרומות קנסות', 0),
(3640, ' דמי ניהול', 0),
(3650, ' הוצאות דואר ותקשורת', 0),
(3660, ' נסיעות לחו"ל', 0),
(3665, ' הוצאות משפטיות', 0),
(3680, ' משרדיות', 0),
(3685, ' בגדי עבודה', 0),
(3690, ' שונות נטו וביטולי יתרות', 0),
(5010, ' עמלות בנק', 0),
(5090, ' עמלות כרטיסי אשראי', 0);

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
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
  PRIMARY KEY (`id`),
  KEY `id6111` (`id6111`),
  KEY `owner` (`owner`),
  KEY `type` (`type`),
  KEY `parent_account_id` (`parent_account_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=214 ;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `type`, `id6111`, `pay_terms`, `src_tax`, `src_date`, `parent_account_id`, `name`, `contact`, `department`, `vatnum`, `email`, `phone`, `dir_phone`, `cellular`, `fax`, `web`, `address`, `city`, `zip`, `currency_id`, `comments`, `system_acc`, `owner`) VALUES
(1, 6, 0, 0, 0.00, '2013-08-11 15:43:52', 0, 'מע"מ תשומות', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(2, 6, 0, 0, 0.00, '0000-00-00 00:00:00', 0, 'מע"מ תשומות ציוד ונכסים', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(3, 6, 0, 0, 0.00, '0000-00-00 00:00:00', 0, 'מע"מ עסקאות', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(4, 6, 0, 0, 0.00, '0000-00-00 00:00:00', 0, 'מע"מ חוז', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(5, 6, 0, 0, 0.00, '0000-00-00 00:00:00', 0, 'ניכוי במקור מספקים', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(6, 4, 0, 0, 0.00, '0000-00-00 00:00:00', 0, 'עיגול סכומים', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(7, 4, 0, 0, 0.00, '0000-00-00 00:00:00', 0, 'קופת שיקים', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(8, 6, 0, 0, 0.00, '0000-00-00 00:00:00', 0, 'ניכוי במקור מלקוחות', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(9, 4, 0, 0, 0.00, '0000-00-00 00:00:00', 0, 'יתרות פתיחה', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(10, 4, 0, 0, 0.00, '0000-00-00 00:00:00', 0, 'קופת מזומן', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(11, 4, 0, 0, 0.00, '0000-00-00 00:00:00', 0, 'קופת אשראי', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(13, 6, 0, 0, 0.00, '0000-00-00 00:00:00', 0, 'מס הכנסה מקדמות', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(14, 6, 0, 0, 0.00, '0000-00-00 00:00:00', 0, 'ביטוח לאומי חו"ז', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(15, 6, 0, 0, 0.00, '0000-00-00 00:00:00', 0, 'ביטוח לאומי', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(16, 6, 0, 0, 0.00, '0000-00-00 00:00:00', 0, 'מס הכנסה', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(17, 2, 0, 0, 0.00, '0000-00-00 00:00:00', 0, 'שווי שימוש', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(18, 2, 3510, 0, 0.00, '0000-00-00 00:00:00', 0, 'שכר עבודה', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(30, 2, 3575, 0, 0.00, '0000-00-00 00:00:00', 0, 'אגרות', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(31, 2, 3550, 0, 100.00, '0000-00-00 00:00:00', 0, 'אחזקת אתר אינטרנט', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(32, 2, 3550, 0, 100.00, '0000-00-00 00:00:00', 0, 'אחזקת משרד', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(33, 2, 3565, 0, 100.00, '0000-00-00 00:00:00', 0, 'אחזקת רכב', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(34, 2, 3565, 0, 66.66, '0000-00-00 00:00:00', 0, 'אחזקת רכב', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(35, 2, 3545, 0, 100.00, '0000-00-00 00:00:00', 0, 'אריזות', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(36, 2, 3575, 0, 0.00, '0000-00-00 00:00:00', 0, 'ארנונה', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(37, 2, 3650, 0, 100.00, '0000-00-00 00:00:00', 0, 'בולים', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(38, 2, 3685, 0, 100.00, '0000-00-00 00:00:00', 0, 'ביגוד מקצועי', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(39, 2, 3515, 0, 0.00, '0000-00-00 00:00:00', 0, 'ביטוח אחר', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(40, 2, 3515, 0, 0.00, '0000-00-00 00:00:00', 0, 'ביטוח אחריות מקצועית', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(41, 2, 3515, 0, 0.00, '0000-00-00 00:00:00', 0, 'ביטוח משרד', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(42, 2, 3515, 0, 0.00, '0000-00-00 00:00:00', 0, 'ביטוח צד ג', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(43, 2, 3515, 0, 0.00, '0000-00-00 00:00:00', 0, 'ביטוח ציוד', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(44, 2, 3650, 0, 100.00, '0000-00-00 00:00:00', 0, 'דואר', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(45, 2, 3565, 0, 25.00, '0000-00-00 00:00:00', 0, 'דלק', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(46, 2, 3565, 0, 100.00, '0000-00-00 00:00:00', 0, 'דלק', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(47, 2, 3575, 0, 0.00, '0000-00-00 00:00:00', 0, 'דמי חבר', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(48, 2, 3575, 0, 0.00, '0000-00-00 00:00:00', 0, 'דמי חבר', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(49, 2, 3680, 0, 100.00, '0000-00-00 00:00:00', 0, 'הדפסות', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(50, 2, 3565, 0, 100.00, '0000-00-00 00:00:00', 0, 'הובלות', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(51, 2, 3540, 0, 100.00, '0000-00-00 00:00:00', 0, 'הנהלת חשבונות', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(52, 2, 3600, 0, 100.00, '0000-00-00 00:00:00', 0, 'השתלמות מקצועית', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(53, 2, 3565, 0, 100.00, '0000-00-00 00:00:00', 0, 'חנייה', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(54, 2, 3590, 0, 100.00, '0000-00-00 00:00:00', 0, 'חשמל', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(55, 2, 3650, 0, 100.00, '0000-00-00 00:00:00', 0, 'טלפון קווי', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(56, 2, 3540, 0, 100.00, '0000-00-00 00:00:00', 0, 'יחסי ציבור', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(57, 2, 3540, 0, 100.00, '0000-00-00 00:00:00', 0, 'יעוץ אחר', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(58, 2, 3540, 0, 100.00, '0000-00-00 00:00:00', 0, 'יעוץ כלכלי', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(59, 2, 3540, 0, 100.00, '0000-00-00 00:00:00', 0, 'יעוץ מס', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(60, 2, 3540, 0, 100.00, '0000-00-00 00:00:00', 0, 'יעוץ מקצועי', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(61, 2, 3540, 0, 100.00, '0000-00-00 00:00:00', 0, 'יעוץ משפטי', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(62, 2, 3540, 0, 100.00, '0000-00-00 00:00:00', 0, 'יעוץ שיווקי', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(63, 2, 3625, 0, 100.00, '0000-00-00 00:00:00', 0, 'כיבוד קל בבית העסק', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(64, 2, 3625, 0, 66.66, '0000-00-00 00:00:00', 0, 'כיבוד קל בבית העסק', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(65, 2, 3560, 0, 100.00, '0000-00-00 00:00:00', 0, 'כרטיס אוטובוס', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(66, 2, 3560, 0, 100.00, '0000-00-00 00:00:00', 0, 'כרטיס רכבת', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(67, 2, 3565, 0, 0.00, '0000-00-00 00:00:00', 0, 'ליסינג', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(68, 2, 3540, 0, 100.00, '0000-00-00 00:00:00', 0, 'מחשוב', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(69, 2, 3650, 0, 100.00, '0000-00-00 00:00:00', 0, 'מנוי אינטרנט', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(70, 2, 3540, 0, 100.00, '0000-00-00 00:00:00', 0, 'מנוי הנהלת חשבונות', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(71, 2, 3650, 0, 100.00, '0000-00-00 00:00:00', 0, 'מעטפות', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(72, 2, 3690, 0, 100.00, '0000-00-00 00:00:00', 0, 'משלוחים', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(73, 2, 3665, 0, 100.00, '0000-00-00 00:00:00', 0, 'משפטיות', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(74, 2, 3680, 0, 100.00, '0000-00-00 00:00:00', 0, 'משרדיות', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(75, 2, 3690, 0, 100.00, '0000-00-00 00:00:00', 0, 'מתנות לחג ללקוחות וספקים', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(76, 2, 3595, 0, 100.00, '0000-00-00 00:00:00', 0, 'ניקיון', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(77, 2, 3660, 0, 0.00, '0000-00-00 00:00:00', 0, 'נסיעות לחו"ל', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(78, 2, 3650, 0, 100.00, '0000-00-00 00:00:00', 0, 'סלולר', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(79, 2, 3650, 0, 66.66, '0000-00-00 00:00:00', 0, 'סלולר', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(80, 2, 3600, 0, 100.00, '0000-00-00 00:00:00', 0, 'ספרות מקצועית', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(81, 2, 3540, 0, 100.00, '0000-00-00 00:00:00', 0, 'עיצוב גרפי', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(82, 2, 5090, 0, 100.00, '0000-00-00 00:00:00', 0, 'עמלות PAYPAL', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(83, 2, 5010, 0, 0.00, '0000-00-00 00:00:00', 0, 'עמלות בנק', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(84, 2, 5090, 0, 100.00, '0000-00-00 00:00:00', 0, 'עמלות כרטיסי אשראי', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(85, 2, 3580, 0, 0.00, '0000-00-00 00:00:00', 0, 'פחת', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(86, 2, 3620, 0, 100.00, '0000-00-00 00:00:00', 0, 'פרסום', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(87, 2, 3520, 0, 100.00, '0000-00-00 00:00:00', 0, 'קבלני משנה', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(88, 2, 3620, 0, 100.00, '0000-00-00 00:00:00', 0, 'קידום מכירות', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(89, 2, 1340, 0, 0.00, '0000-00-00 00:00:00', 0, 'קניות בחו"ל', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(90, 2, 3565, 0, 0.00, '0000-00-00 00:00:00', 0, 'רשיון רכב', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(91, 2, 3690, 0, 100.00, '0000-00-00 00:00:00', 0, 'שונות', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(92, 2, 3620, 0, 100.00, '0000-00-00 00:00:00', 0, 'שיווק', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(93, 2, 3570, 0, 100.00, '0000-00-00 00:00:00', 0, 'שכירת משרד', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(94, 2, 3570, 0, 100.00, '0000-00-00 00:00:00', 0, 'שכירת ציוד', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(95, 2, 3565, 0, 0.00, '0000-00-00 00:00:00', 0, 'שכירת רכב', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(96, 2, 3540, 0, 100.00, '0000-00-00 00:00:00', 0, 'שכר טרחה רואה חשבון', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(97, 2, 3690, 0, 100.00, '0000-00-00 00:00:00', 0, 'שליחויות', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(98, 2, 3595, 0, 100.00, '0000-00-00 00:00:00', 0, 'שמירה', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(99, 2, 3550, 0, 100.00, '0000-00-00 00:00:00', 0, 'תיקונים', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(100, 3, 1010, 0, 18.00, '2013-08-19 15:03:50', 0, 'מכירת מוצרים בארץ', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 0, 0),
(101, 3, 1020, 0, 16.00, '2013-08-19 15:03:57', 0, 'מכירת שרותים בארץ', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 0, 0),
(102, 3, 1030, 0, 0.00, '2013-08-19 15:04:06', 0, 'מכירת מוצרים בחו"ל', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 0, 0),
(103, 3, 1040, 0, 0.00, '2013-08-19 15:04:11', 0, 'מכירת שרותים בחו"ל', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 0, 0),
(107, 2, 0, 0, 0.00, '0000-00-00 00:00:00', 0, 'קניות', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(109, 2, 0, 0, 0.00, '0000-00-00 00:00:00', 0, 'הוצאות שונות', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(110, 1, 0, 0, 0.00, '0000-00-00 00:00:00', 0, 'עובדים חו"ז', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(111, 2, 3565, 0, 66.66, '0000-00-00 00:00:00', 0, 'דלק', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(112, 2, 3680, 0, 0.00, '0000-00-00 00:00:00', 0, 'תקשורת', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(113, 0, 0, 0, 0.00, '0000-00-00 00:00:00', 0, 'לקוחות שונים', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(114, 1, 0, 0, 0.00, '0000-00-00 00:00:00', 0, 'ספקים שונים', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(150, 7, 0, 0, 0.00, '2013-08-19 15:04:18', 0, 'בנק דיסקונט 433', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 0, 0),
(151, 2, 0, 0, 0.00, '0000-00-00 00:00:00', 0, 'עמלות בנקים', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 0),
(201, 0, 1010, 0, 0.00, '2013-06-18 15:15:18', 0, 'משרד הבטחון', '', '', '123345678', 'nirshahrur3@gmail.com', '09876543201', '', '', '', 'http://www.idf.co.il', '', 'רעננה', '42234', 'USD', '', 0, 1),
(202, 0, 0, 30, 0.00, '2013-06-18 15:19:15', 0, 'קיבוץ נירים', '', '', '51080921', '', '', '', '', '', '', '', '', '', 'ILS', '', 0, 1),
(203, 0, 0, -30, 0.00, '2013-08-19 15:04:31', 0, 'יעקב בן יוסף', 'יוסף חן', '', '334244435', '', '0771234567', '052766868', '', '0722512343', '', 'דרך השלום 7', 'ראשון לציון', '23345', 'ILS', '', 0, 1),
(204, 0, 0, -90, 0.00, '2013-08-19 15:05:54', 0, 'חנות מחשבים', '', '', '534645768', '', '0771234567', '052766868', '', '0722512343', '', 'דה האז 1', 'תל אביב', '42234', 'ILS', '', 0, 1),
(205, 2, 3690, 0, 100.00, '0000-00-00 00:00:00', 0, 'רכש סחורה למכירה', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 1, 1),
(206, 0, 1010, NULL, 0.00, '2013-08-19 15:06:01', NULL, 'Google Inc', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 0, NULL),
(207, NULL, 1010, NULL, 0.00, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 0, NULL),
(208, NULL, 1010, NULL, 0.00, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 0, NULL),
(209, NULL, 1010, NULL, 0.00, NULL, NULL, 'חשבון הכנסות5  מעמ', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 0, NULL),
(210, 3, 1010, NULL, 5.00, '2013-08-21 14:26:10', NULL, 'חשבון הכנסות 5 מעמ', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 0, NULL),
(212, 0, 1010, NULL, 0.00, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 0, NULL),
(213, 3, 1010, NULL, 0.00, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `accTemplate`
--

CREATE TABLE IF NOT EXISTS `accTemplate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `AccType_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `AccType_id` (`AccType_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `accTemplate`
--

INSERT INTO `accTemplate` (`id`, `name`, `AccType_id`) VALUES
(22, 'ניסיון', 1),
(24, 'נכסים', 4);

-- --------------------------------------------------------

--
-- Table structure for table `accTemplateItem`
--

CREATE TABLE IF NOT EXISTS `accTemplateItem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `AccTemplate_id` int(11) NOT NULL,
  `eavFields_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `AccTemplate_id` (`AccTemplate_id`),
  KEY `eavFields_id` (`eavFields_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `accTemplateItem`
--

INSERT INTO `accTemplateItem` (`id`, `AccTemplate_id`, `eavFields_id`) VALUES
(26, 24, 2),
(27, 24, 1),
(28, 22, 3),
(29, 22, 4);

-- --------------------------------------------------------

--
-- Table structure for table `accType`
--

CREATE TABLE IF NOT EXISTS `accType` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `desc` varchar(40) NOT NULL,
  `openformat` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `accType`
--

INSERT INTO `accType` (`id`, `name`, `desc`, `openformat`) VALUES
(0, 'customers', 'Customers', ''),
(1, 'suppliers', 'Suppliers', '1'),
(2, 'outcomes', 'Outcomes', ''),
(3, 'incomes', 'Incomes', ''),
(4, 'assets', 'Assets', ''),
(5, 'liabilities', 'Liabilities', ''),
(6, 'authorities', 'Authorities', ''),
(7, 'banks', 'Banks', ''),
(8, 'warehouses', 'Warehouses', ''),
(9, 'leads', 'Leads', ''),
(10, 'contacts', 'Contacts', '');

-- --------------------------------------------------------

--
-- Table structure for table `AuthAssignment`
--

CREATE TABLE IF NOT EXISTS `AuthAssignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `AuthAssignment`
--

INSERT INTO `AuthAssignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('Admin', '1', NULL, 'N;'),
('Authenticated', '2', NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `AuthItem`
--

CREATE TABLE IF NOT EXISTS `AuthItem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `AuthItem`
--

INSERT INTO `AuthItem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('Accounts.*', 1, NULL, NULL, 'N;'),
('Accounts.Admin', 0, NULL, NULL, 'N;'),
('Accounts.Ajax', 0, NULL, NULL, 'N;'),
('Accounts.Autocomplete', 0, NULL, NULL, 'N;'),
('Accounts.Create', 0, NULL, NULL, 'N;'),
('Accounts.Delete', 0, NULL, NULL, 'N;'),
('Accounts.Index', 0, NULL, NULL, 'N;'),
('Accounts.JSON', 0, NULL, NULL, 'N;'),
('Accounts.Transaction', 0, NULL, NULL, 'N;'),
('Accounts.Update', 0, NULL, NULL, 'N;'),
('Accounts.View', 0, NULL, NULL, 'N;'),
('AccTemplate.*', 1, NULL, NULL, 'N;'),
('AccTemplate.Admin', 0, NULL, NULL, 'N;'),
('AccTemplate.Create', 0, NULL, NULL, 'N;'),
('AccTemplate.Delete', 0, NULL, NULL, 'N;'),
('AccTemplate.Index', 0, NULL, NULL, 'N;'),
('AccTemplate.SaveSub', 0, NULL, NULL, 'N;'),
('AccTemplate.Update', 0, NULL, NULL, 'N;'),
('AccTemplate.View', 0, NULL, NULL, 'N;'),
('Acctype.*', 1, NULL, NULL, 'N;'),
('Acctype.Admin', 0, NULL, NULL, 'N;'),
('Acctype.Create', 0, NULL, NULL, 'N;'),
('Acctype.Delete', 0, NULL, NULL, 'N;'),
('Acctype.Index', 0, NULL, NULL, 'N;'),
('Acctype.Update', 0, NULL, NULL, 'N;'),
('Acctype.View', 0, NULL, NULL, 'N;'),
('Admin', 2, NULL, NULL, 'N;'),
('Authenticated', 2, 'Authenticated user', NULL, 'N;'),
('Comment.*', 1, 'Access all comment actions', NULL, 'N;'),
('Comment.Approve', 0, 'Approve comments', NULL, 'N;'),
('Comment.Delete', 0, 'Delete comments', NULL, 'N;'),
('Comment.Update', 0, 'Update comments', NULL, 'N;'),
('CommentAdministration', 1, 'Administration of comments', NULL, 'N;'),
('Companies.*', 1, NULL, NULL, 'N;'),
('Companies.Index', 0, NULL, NULL, 'N;'),
('Companies.Update', 0, NULL, NULL, 'N;'),
('Companies.View', 0, NULL, NULL, 'N;'),
('Company.*', 1, NULL, NULL, 'N;'),
('Company.Index', 0, NULL, NULL, 'N;'),
('Currates.*', 1, NULL, NULL, 'N;'),
('Currates.Admin', 0, NULL, NULL, 'N;'),
('Currates.Create', 0, NULL, NULL, 'N;'),
('Currates.Delete', 0, NULL, NULL, 'N;'),
('Currates.Getrate', 0, NULL, NULL, 'N;'),
('Currates.Index', 0, NULL, NULL, 'N;'),
('Currates.Update', 0, NULL, NULL, 'N;'),
('Currates.View', 0, NULL, NULL, 'N;'),
('Currencies.*', 1, NULL, NULL, 'N;'),
('Currencies.Autocomplete', 0, NULL, NULL, 'N;'),
('Currencies.Index', 0, NULL, NULL, 'N;'),
('Doccheques.*', 1, NULL, NULL, 'N;'),
('Doccheques.Admin', 0, NULL, NULL, 'N;'),
('Doccheques.Create', 0, NULL, NULL, 'N;'),
('Doccheques.Delete', 0, NULL, NULL, 'N;'),
('Doccheques.Index', 0, NULL, NULL, 'N;'),
('Doccheques.Update', 0, NULL, NULL, 'N;'),
('Doccheques.View', 0, NULL, NULL, 'N;'),
('Docdetails.*', 1, NULL, NULL, 'N;'),
('Docdetails.Admin', 0, NULL, NULL, 'N;'),
('Docdetails.Create', 0, NULL, NULL, 'N;'),
('Docdetails.Delete', 0, NULL, NULL, 'N;'),
('Docdetails.Index', 0, NULL, NULL, 'N;'),
('Docdetails.Update', 0, NULL, NULL, 'N;'),
('Docdetails.View', 0, NULL, NULL, 'N;'),
('Docs.*', 1, NULL, NULL, 'N;'),
('Docs.Admin', 0, NULL, NULL, 'N;'),
('Docs.Create', 0, NULL, NULL, 'N;'),
('Docs.Delete', 0, NULL, NULL, 'N;'),
('Docs.Duplicate', 0, NULL, NULL, 'N;'),
('Docs.Index', 0, NULL, NULL, 'N;'),
('Docs.Status', 0, NULL, NULL, 'N;'),
('Docs.Update', 0, NULL, NULL, 'N;'),
('Docs.View', 0, NULL, NULL, 'N;'),
('Doctype.*', 1, NULL, NULL, 'N;'),
('Doctype.Admin', 0, NULL, NULL, 'N;'),
('Doctype.Create', 0, NULL, NULL, 'N;'),
('Doctype.Delete', 0, NULL, NULL, 'N;'),
('Doctype.Index', 0, NULL, NULL, 'N;'),
('Doctype.Update', 0, NULL, NULL, 'N;'),
('Doctype.View', 0, NULL, NULL, 'N;'),
('EavFields.*', 1, NULL, NULL, 'N;'),
('EavFields.Admin', 0, NULL, NULL, 'N;'),
('EavFields.Create', 0, NULL, NULL, 'N;'),
('EavFields.Delete', 0, NULL, NULL, 'N;'),
('EavFields.Index', 0, NULL, NULL, 'N;'),
('EavFields.Update', 0, NULL, NULL, 'N;'),
('EavFields.View', 0, NULL, NULL, 'N;'),
('Editor', 2, 'Editor', NULL, 'N;'),
('Fields.*', 1, NULL, NULL, 'N;'),
('Fields.Admin', 0, NULL, NULL, 'N;'),
('Fields.Create', 0, NULL, NULL, 'N;'),
('Fields.Delete', 0, NULL, NULL, 'N;'),
('Fields.Index', 0, NULL, NULL, 'N;'),
('Fields.Update', 0, NULL, NULL, 'N;'),
('Fields.View', 0, NULL, NULL, 'N;'),
('Guest', 2, 'Guest user', NULL, 'N;'),
('Item.*', 1, NULL, NULL, 'N;'),
('Item.Admin', 0, NULL, NULL, 'N;'),
('Item.Autocomplete', 0, NULL, NULL, 'N;'),
('Item.Create', 0, NULL, NULL, 'N;'),
('Item.Delete', 0, NULL, NULL, 'N;'),
('Item.Index', 0, NULL, NULL, 'N;'),
('Item.JSON', 0, NULL, NULL, 'N;'),
('Item.Template', 0, NULL, NULL, 'N;'),
('Item.Update', 0, NULL, NULL, 'N;'),
('Item.View', 0, NULL, NULL, 'N;'),
('Itemcategory.*', 1, NULL, NULL, 'N;'),
('Itemcategory.Admin', 0, NULL, NULL, 'N;'),
('Itemcategory.Create', 0, NULL, NULL, 'N;'),
('Itemcategory.Delete', 0, NULL, NULL, 'N;'),
('Itemcategory.Index', 0, NULL, NULL, 'N;'),
('Itemcategory.Update', 0, NULL, NULL, 'N;'),
('Itemcategory.View', 0, NULL, NULL, 'N;'),
('Itemunit.*', 1, NULL, NULL, 'N;'),
('Itemunit.Admin', 0, NULL, NULL, 'N;'),
('Itemunit.Create', 0, NULL, NULL, 'N;'),
('Itemunit.Delete', 0, NULL, NULL, 'N;'),
('Itemunit.Index', 0, NULL, NULL, 'N;'),
('Itemunit.Update', 0, NULL, NULL, 'N;'),
('Itemunit.View', 0, NULL, NULL, 'N;'),
('Minify.*', 1, NULL, NULL, 'N;'),
('Minify.Index', 0, NULL, NULL, 'N;'),
('Post.*', 1, 'Access all post actions', NULL, 'N;'),
('Post.Admin', 0, 'Administer posts', NULL, 'N;'),
('Post.Create', 0, 'Create posts', NULL, 'N;'),
('Post.Delete', 0, 'Delete posts', NULL, 'N;'),
('Post.Update', 0, 'Update posts', NULL, 'N;'),
('Post.View', 0, 'View posts', NULL, 'N;'),
('PostAdministrator', 1, 'Administration of posts', NULL, 'N;'),
('PostUpdateOwn', 0, 'Update own posts', 'return Yii::app()->user->id==$params["userid"];', 'N;'),
('Reports.*', 1, NULL, NULL, 'N;'),
('Reports.Contact', 0, NULL, NULL, 'N;'),
('Reports.Error', 0, NULL, NULL, 'N;'),
('Reports.Index', 0, NULL, NULL, 'N;'),
('Reports.Journal', 0, NULL, NULL, 'N;'),
('Reports.Login', 0, NULL, NULL, 'N;'),
('Reports.Logout', 0, NULL, NULL, 'N;'),
('Showdocs.*', 1, NULL, NULL, 'N;'),
('Showdocs.Admin', 0, NULL, NULL, 'N;'),
('Showdocs.Create', 0, NULL, NULL, 'N;'),
('Showdocs.Delete', 0, NULL, NULL, 'N;'),
('Showdocs.Index', 0, NULL, NULL, 'N;'),
('Showdocs.Status', 0, NULL, NULL, 'N;'),
('Showdocs.Update', 0, NULL, NULL, 'N;'),
('Showdocs.View', 0, NULL, NULL, 'N;'),
('Site.*', 1, NULL, NULL, 'N;'),
('Site.Contact', 0, NULL, NULL, 'N;'),
('Site.Error', 0, NULL, NULL, 'N;'),
('Site.Index', 0, NULL, NULL, 'N;'),
('Site.Login', 0, NULL, NULL, 'N;'),
('Site.Logout', 0, NULL, NULL, 'N;'),
('Users.*', 1, NULL, NULL, 'N;'),
('Users.Admin', 0, NULL, NULL, 'N;'),
('Users.Create', 0, NULL, NULL, 'N;'),
('Users.Delete', 0, NULL, NULL, 'N;'),
('Users.Index', 0, NULL, NULL, 'N;'),
('Users.Update', 0, NULL, NULL, 'N;'),
('Users.View', 0, NULL, NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `AuthItemChild`
--

CREATE TABLE IF NOT EXISTS `AuthItemChild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `AuthItemChild`
--


-- --------------------------------------------------------

--
-- Table structure for table `bankbook`
--

CREATE TABLE IF NOT EXISTS `bankbook` (
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
-- Dumping data for table `bankbook`
--

INSERT INTO `bankbook` (`num`, `account`, `date`, `details`, `refnum`, `sum`, `total`, `cor_num`) VALUES
(12, 150, '2011-10-19 00:00:00', 'הע. אינטרנט700', '9608', -6000.00, -7156.76, '0'),
(11, 150, '2011-10-16 00:00:00', 'XXXXXXXXXXXXXX', '180140', -84.33, -1156.76, '0'),
(10, 150, '2011-10-16 00:00:00', '"לאומי קארד בע', '34685', -375.36, -1072.43, '0'),
(9, 150, '2011-10-16 00:00:00', 'כרטיסי אשראי ל', '8547', -1060.63, -697.07, '0'),
(7, 150, '2012-01-01 00:00:00', '123456789', '2324', -3000.00, 100640.00, '0'),
(6, 150, '2012-01-01 00:00:00', '123456789', '2324', 40.00, 103640.00, '0'),
(8, 150, '2011-11-01 00:00:00', '12345TEST10875', '1122', 100.00, -24021.03, '0'),
(5, 150, '2012-01-01 00:00:00', '123456789', '2324', 92000.00, 103600.00, '0'),
(4, 150, '2012-01-01 00:00:00', '123456789', '2324', 5800.00, 11600.00, '0'),
(3, 150, '2012-01-01 00:00:00', '123456789', '2324', 800.00, 5800.00, '0'),
(2, 150, '2012-01-01 00:00:00', '123456789', '2324', 5000.00, 5000.00, '0'),
(1, 150, '2012-01-01 00:00:00', '123456789', '2324', 3400.00, 0.00, '0'),
(13, 150, '2011-10-21 00:00:00', 'קצבת ילדים    ', '13104', 169.00, -6987.76, '0');

-- --------------------------------------------------------

--
-- Table structure for table `bankName`
--

CREATE TABLE IF NOT EXISTS `bankName` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bankName`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `blackList`
--

CREATE TABLE IF NOT EXISTS `blackList` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `value` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `blackList`
--


-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
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
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`companyname`, `manager`, `regnum`, `address`, `city`, `zip`, `phone`, `cellular`, `web`, `tax`, `taxrep`, `vat`, `vatrep`, `template`, `logo`, `header`, `footer`, `doc_template`, `receipt_template`, `invoice_receipt_template`, `bidi`, `credit`, `credituser`, `creditpwd`, `creditallow`, `num1`, `num2`, `num3`, `num4`, `num5`, `num6`, `num7`, `num8`, `num9`, `num10`, `num12`, `num11`) VALUES
('קריסטל בע&quot;מ', 'אדם', '67866889', 'החשמונאים 121', 'תל אביב', '90210', '0771234567', '0777654321', '', 10.00, 2, 17.00, 1, '', '40f26e6e5928a9756309e91c6368d8f745f8ff8c.png', '', '', '', '', '', 2, 1, '123', '321', 'a:4:{i:1;s:2:"on";i:2;s:2:"on";i:3;s:2:"on";i:4;s:2:"on";}', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id` varchar(255) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `value`) VALUES
('checkTime', '20130324114336'),
('company.address', 'גבעת גאולה 1'),
('company.city', 'רמת גן'),
('company.cur', 'ILS'),
('company.logo', ''),
('company.name', 'נכסעים בעמ'),
('company.seccur', 'USD'),
('company.stock', 'false'),
('company.vatid', '69924504'),
('company.zip', '52215'),
('dbVersion', '2.21'),
('Latest', ''),
('paypal.apiLive', 'false'),
('paypal.apiPassword', '1377498089'),
('paypal.apiSignature', 'AAIVQYQw1NM1GpwV39qoyAlLZqNaArnmriH3xY5IQg-ENXEhq9jz27IB'),
('paypal.apiUsername', 'adam2314-facilitator_api1.gmail.com'),
('server.Version', '2.21');

-- --------------------------------------------------------

--
-- Table structure for table `creditErrorCode`
--

CREATE TABLE IF NOT EXISTS `creditErrorCode` (
  `ErrorID` int(3) NOT NULL DEFAULT '0',
  `ErrorText` varchar(158) DEFAULT NULL,
  PRIMARY KEY (`ErrorID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `creditErrorCode`
--

INSERT INTO `creditErrorCode` (`ErrorID`, `ErrorText`) VALUES
(0, 'עסקה תקינה.'),
(1, 'חסום החרם כרטיס.'),
(2, 'גנוב החרם כרטיס.'),
(3, 'התקשר לחברת האשראי.'),
(4, 'סירוב.'),
(5, 'מזויף החרם כרטיס.'),
(6, 'ת.ז או CVV שגויים.'),
(7, 'חובה להתקשר לחברת האשראי.'),
(8, 'תקלה בבניית מפתח גישה לקובץ חסומים.'),
(9, 'לא הצליח להתקשר, התקשר לחברת האשראי.'),
(10, 'תוכנית הופסקה עפ"י הוראת המפעיל (ESC) או COMPORT לא ניתן לפתיחה (WINDOWS).'),
(15, 'אין התאמה בין המספר שהוקלד לפס המגנטי.'),
(17, 'לא הוקלדו 4 הספרות האחרונות.'),
(19, 'רשומה בקובץ INT_IN קצרה מ-16 תווים.'),
(20, 'קובץ קלט (INT_IN) לא קיים.'),
(21, 'קובץ חסומים (NEG) לא קיים או לא מעודכן - בצע שידור או בקשה לאישור עבור כל עסקה.'),
(22, 'אחד מקבצי הפרמטרים או ווקטורים לא קיים.'),
(23, 'קובץ תאריכים (DATA) לא קיים.'),
(24, 'קובץ אתחול (START) לא קיים.'),
(25, 'הפרש בימים בקליטת חסומים גדול מדי - בצע שידור או בקשה לאישור עבור כל עסקה.'),
(26, 'הפרש דורות בקליטת חסומים גדול מדי - בצע שידור או בקשה לאישור עבור כל עסקה.'),
(27, 'כאשר לא הוכנס פס מגנטי כולו הגדר עסקה כעסקה טלפונית או כעסקת חתימה בלבד.'),
(28, 'מספר מסוף מרכזי לא הוכנס למסוף המוגדר לעבודה כרב ספק.'),
(29, 'מספר מוטב לא הוכנס למסוף המוגדר לעבודה כרב מוטב.'),
(30, 'מסוף שאינו מעודכן כרב ספק/רק מוטב והוקלד מס'' ספק/מס'' מוטב.'),
(31, 'מסוך מעודכן כרב ספק והוקלד גם כמס'' מוטב.'),
(32, 'קובץ חסומים ישן מדי - בצע תקשורת או בקש אישור עבור כל עסקה .'),
(33, 'כרטיס לא תקין.'),
(34, 'כרטיס לא רשאי לבצע במסוף זה או אין אישור לעסקה כזאת.'),
(35, 'כרטיס לא רשאי לבצע עסקה עם סוג אשראי זה.'),
(36, 'פג תוקף'),
(37, 'שגיאה בתשלומים - סכום עסקה צריך להיות שווה תשלום ראשון + (תשלום קבוע כפול מס'' תשלומים)'),
(38, 'לא ניתן לבצע עסקה מעל תקרה לכרטיס אשראי חיוב מיידי.'),
(39, 'סיפרת ביקורת לא תקינה.'),
(40, 'מסוף שמוגדר כרב מוטב הוקלד מס'' ספק.'),
(41, 'מעל תקרה, אך קובץ מכיל הוראה לא לבצע שאילתא (J1,J2,J3).'),
(42, 'חסום בספק, אך קובץ הקלט מכיל הוראה לא לבצע שאילתא (J1,J2,J3).'),
(43, 'אקראית, אך קובץ הקלט מכיל הוראה לא לבצע שאילתא (J1,J2,J3).'),
(44, 'מסוף לא רשאי לבקש אישור ללא עסקה, אך קובץ הקלט מכיל (J5).'),
(45, 'מסוף לא רשאי לבצע אישור ביוזמתו, אך קובץ הקלט מכיל (J6).'),
(46, 'יש לבקש אישור, אך קובץ הקלט מכיל הוראה לא לבצע שאילתא (J1,J2,J3).'),
(47, 'יש לבקש אישור בשל בעיה הקשורה לקכ"ח אך קובץ הקלט מכיל הוראה לא לבצע שאילתא.'),
(51, 'מספר רכב לא תקין.'),
(52, 'מד מרחק לא הוקלד.'),
(53, 'מסוף לא מוגדר כתחנת דלק. (הועבר כרטיס דלק או קוד עסקה לא מתאים).'),
(57, 'לא הוקלד מספר תעודת זהות.'),
(58, 'לא הוקלד CVV2.'),
(59, 'לא הוקלדו מספר תעודת הזהות וה-CVV2.'),
(60, 'צרוף ABS לא נמצא בהתחלת נתוני קלט בזיכרון.'),
(61, 'מספר כרטיס לא נמצא או נמצא פעמיים.'),
(62, 'סוג עסקה לא תקין.'),
(63, 'קוד עסקה לא תקין.'),
(64, 'סוג אשראי לא תקין.'),
(65, 'מטבע לא תקין.'),
(66, 'קיים תשלום ראשון ו/או תשלום קבוע לסוג אשראי שונה מתשלומים.'),
(67, 'קיים מספר תשלומים לסוג אשראי שאינו דורש זה.'),
(68, 'לא ניתן להצמיד לדולר או למדד לסוג אשראי שונה מתשלומים.'),
(69, 'אורך הפס המגנטי קצר מידי.'),
(70, 'לא מוגדר מכשיר להקשת מספר סודי.'),
(71, 'חובה להקליד מספר סודי.'),
(72, 'קכ"ח לא זמין - העבר בקורא מגנטי.'),
(73, 'הכרטיס נושא שבב ויש להעבירו דרך הקכ"ח.'),
(74, 'דחייה - כרטיס נעול.'),
(75, 'דחייה - פעולה עם קכ"ח לא הסתיימה בזמן הראוי.'),
(76, 'דחייה - נתונים אשר התקבלו מקכ"ח אינם מוגדרים במערכת.'),
(77, 'הוקש מספר סודי שגוי.'),
(80, 'הוכנס "קוד מועדון" לסוג אשראי לא מתאים.'),
(99, 'לא מצליח לקרוא/לכתוב/לפתוח קובץ TRAN.'),
(101, 'אין אישור מחברת אשראי לעבודה.'),
(106, 'למסוף אין אישור לביצוע שאילתא לאשראי חיוב מיידי.'),
(107, 'סכום העסקה גדול מדי - חלק למספר העסקאות.'),
(108, 'למסוף אין אישור לבצע עסקאות מאולצות.'),
(109, 'למסוף אין אישור לכרטיס עם קוד השרות 587.'),
(110, 'למסוף אין אישור לכרטיס חיוב מיידי.'),
(111, 'למסוף אין אישור לעסקה בתשלומים.'),
(112, 'למסוף אין אישור לעסקה טלפון/חתימה בלבד בתשלומים.'),
(113, 'למסוף אין אישור לעסקה טלפונית.'),
(114, 'למסוף אין אישור לעסקה "חתימה בלבד".'),
(115, 'למסוף אין אישור לעסקה בדולרים.'),
(116, 'למסוף אין אישור לעסקת מועדון.'),
(117, 'למסוף אין אישור לעסקת כוכבים/נקודות/מיילים.'),
(118, 'למסוף אין אישור לאשראי ישראקרדיט.'),
(119, 'למסוף אין אישור לאשראי אמקס קרדיט.'),
(120, 'למסוף אין אישור להצמדה לדולר.'),
(121, 'למסוף אין אישור להצמדה למדד.'),
(122, 'למסוף אין אישור להצמדה למדד לכרטיסי חו"ל.'),
(123, 'למסוף אין אישור לעסקת כוכבים/נקודות/מיילים לסוג אשראי זה.'),
(124, 'למסוף אין אישור לאשראי קרדיט בתשלומים לכרטיסי ישראכרט.'),
(125, 'למסוף אין אישור לאשראי קרדיט בתשלומים לכרטיסי אמקס.'),
(126, 'למסוף אין אישור לקוד מועדון זה.'),
(127, 'למסוף אין אישור לעסקת חיוב מיידי פרט לכרטיסי חיוב מיידי.'),
(128, 'למסוף אין אישור לקבל כרטיסי ויזה אשר מתחילים ב-3.'),
(129, 'למסוף אין אישור לבצע עסקת זכות מעל תקרה.'),
(130, 'כרטיס לא רשאי לבצע עסקת מועדון.'),
(131, 'כרטיס לא רשאי לבצע עסקת כוכבים/נקודות/מיילים.'),
(132, 'כרטיס לא רשאי לבצע עסקאות בדולרים (רגילות או טלפוניות).'),
(133, 'כרטיס לא תקף על פי רשימת כרטיסים תקפים של ישראכרט.'),
(134, 'כרטיס לא תקין עפ"י הגדרת המערכת (VECTOR1 של ישראכרט) - מס'' הספרות בכרטיס - שגוי.'),
(135, 'כרטיס לא רשאי לבצע עסקאות דולריות עפ"י הגדרת המערכת (VECTOR1 של ישראכרט).'),
(136, 'הכרטיס שיין לקבוצת כרטיסים אשר אינה רשאית לבצע עסקאות עפ"י הגדרת המערכת (VECTOR20 של ויזה).'),
(137, 'קידומת הכרטיס (7 ספרות) לא תקפה עפ"י הגדרת המערכת (VECTOR21 של דיינרס).'),
(138, 'כרטיס לא רשאי לבצע עסקאות בתשלומים על פי רשימת כרטיסים תקפים של ישראכרט.'),
(139, 'מספר תשלומים גדול מידי על פי רשימת כרטיסים תקפים של ישראכרט.'),
(140, 'כרטיסי ויזה ודיינרס לא רשאים לבצע עסקאות מועדון בתשלומים.'),
(141, 'סידרת כרטיסים לא תקפה עפ"י הגדרת המערכת (VECTOR5 של ישראכרט).'),
(142, 'קוד שרות לא תקף עפ"י הגדרת המערכת (VECTOR6 של ישראכרט).'),
(143, 'קידומת הכרטיס (2 ספרות) לא תקפה עפ"י הגדרת המערכת (VECTOR7 של ישראכרט).'),
(144, 'קוד שרות לא תקף עפ"י הגדרת המערכת (VECTOR12 של ויזה).'),
(145, 'קוד שרות לא תקף עפ"י הגדרת המערכת (VECTOR13 של ויזה).'),
(146, 'לכרטיס חיוב מיידי אסור לבצע עסקאות זכות.'),
(147, 'כרטיס לא רשאי לבצע עסקאות בתשלומים עפ"י וקטור 31 של לאומיקארד.'),
(148, 'כרטיס לא רשאי לבצע עסקאות טלפוניות וחתימה בלבד עפ"י וקטור 31 של לאומיקארד.'),
(149, 'כרטיס לא רשאי לבצע עסקאות טלפוניות עפ"י וקטור 31 של לאומיקארד.'),
(150, 'אשראי לא מאושר לכרטיסי חיוב מיידי.'),
(151, 'אשראי לא מאושר לכרטיסי חו"ל.'),
(152, 'קוד מועדון לא תקין.'),
(153, 'כרטיס לא רשאי לבצע עסקאות אשראי גמיש (עדיף +30/) עפ"י הגדרת המערכת (VECTOR21 של דיינרס).'),
(154, 'כרטיס לא רשאי לבצע עסקאות חיוב מיידי עפ"י הגדרת המערכת (VECTOR21 של דיינרס).'),
(155, 'סכום המינימלי לתשלום בעסקת קרדיט קטן מידי.'),
(156, 'מספר תשלומים לעסקת קרדיט לא תקין.'),
(157, 'תקרה 0 לסוג כרטיס זה בעסקה עם אשראי רגיל או קרדיט.'),
(158, 'תקרה 0 לסוג כרטיס זה בעסקה עם אשראי חיוב מיידי.'),
(159, 'תקרה 0 לסוג כרטיס זה בעסקת חיוב מיידי בדולרים.'),
(160, 'תקרה 0 לסוג כרטיס זה בעסקה טלפונית.'),
(161, 'תקרה 0 לסוג כרטיס זה בעסקת זכות.'),
(162, 'תקרה 0 לסוג כרטיס זה בעסקת תשלומים.'),
(163, 'כרטיס אמריקן אקספרס אשר הונפק בחו"ל לא רשאי לבצע עסקאות בתשלומים.'),
(164, 'כרטיסי אשראי JCB רשאי לבצע עסקאות רק באשראי רגיל.'),
(165, 'סכום בכוכבים/נקודות/מיילים גדול מסכום העסקה.'),
(166, 'כרטיס מועדון לא בתחום של המסוף.'),
(167, 'לא ניתן לבצע עסקת כוכבים/נקודות/מיילים בדולרים.'),
(168, 'למסוף אין אישור לעסקה דולרית עם סוג אשראי זה.'),
(169, 'לא ניתן לבצע עסקת זכות עם אשראי שונה מהרגיל.'),
(170, 'סכום הנחה בכוכבים/נקודות/מיילים גדול מהמותר.'),
(171, 'לא ניתן לבצע עסקה מאולצת לכרטיס/אשראי חיוב מיידי.'),
(172, 'לא ניתן לבטל עסקה קודמת (עסקת זכות או מספר כרטיס אינו זהה).'),
(173, 'עסקה כפולה.'),
(174, 'למסוף אין אישור להצמדה למדד לאשראי זה.'),
(175, 'למסוף אין אישור להצמדה לדולר לאשראי זה.'),
(176, 'כרטיס אינו תקף עפ"י הגדרת המערכת (וקטור 1 של ישראכרט).'),
(177, 'בתחנות דלק לא ניתן לבצע "שרות עצמי" אלא "שרות עצמי בתחנות דלק".'),
(178, 'אסור לבצע עסקת זכות בכוכבים/נקודות/מיילים.'),
(179, 'אסור לבצע עסקת זכות בדולר בכרטיס תייר.'),
(180, 'בכרטיס מועדון לא ניתן לבצע עסקה טלפונית.'),
(200, 'מסוף נסגר אצל שבא – פנה לשירות איזיקארד.'),
(250, 'בעיית זהוי (שם משתמש, סיסמא, מספר מסוף לא תקינים).'),
(256, 'מספר עסקה (TransactionNumber) - אינו ייחודי עבור תאריך עסקה (TransactionDate).'),
(257, 'לא נמצא מידע נדרש'),
(259, 'תקלת שב"א - אין גישה למסד נתונים'),
(260, 'אחד או יותר מפרמטרים המועברים לפונקציה לא תקין (בד"כ ערכים לא נומריים איפה שצריך נומרי(.'),
(280, 'בד"כ time-out, דה"נו לקח יותר מדקה לחזור למשתמש. במידה וחוזר לעצמו יש לפנות לשב"א.');

-- --------------------------------------------------------

--
-- Table structure for table `curRates`
--

CREATE TABLE IF NOT EXISTS `curRates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `currency_id` varchar(3) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `value` decimal(10,5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `curRates`
--

INSERT INTO `curRates` (`id`, `currency_id`, `date`, `value`) VALUES
(40, 'ILS', '2013-07-04 09:30:05', 1.00000),
(41, 'USD', '2013-08-11 15:02:25', 3.40000);

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE IF NOT EXISTS `currencies` (
  `id` varchar(3) DEFAULT NULL,
  `code` varchar(3) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `symbol` varchar(17) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currencies`
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
('TOP', '776', 'Pa''anga', 'T$'),
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

-- --------------------------------------------------------

--
-- Table structure for table `docCheques`
--

CREATE TABLE IF NOT EXISTS `docCheques` (
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
-- Dumping data for table `docCheques`
--

INSERT INTO `docCheques` (`doc_id`, `type`, `refnum`, `creditcompany`, `cheque_num`, `bank`, `branch`, `cheque_acct`, `cheque_date`, `currency_id`, `sum`, `bank_refnum`, `dep_date`, `line`) VALUES
('2', 2, '', 150, '4586565433', '1', '123', '1', '2012-01-02 00:00:00', '', 5000.00, '123', '2012-01-02 00:00:00', 1),
('2', 4, '', 150, '4586565433', '1', '123', '1', '2012-01-02 00:00:00', '', 5000.00, '', '0000-00-00 00:00:00', 2),
('2', 1, '', 150, '', '', '', '', '2012-01-02 00:00:00', '', 5000.00, '123', '2012-01-02 00:00:00', 3),
('6', 2, '', 150, '4586565433', '1', '123', '1', '2012-01-02 00:00:00', '', 5000.00, '98776', '2012-01-02 00:00:00', 1),
('5', 4, '', 150, '4586565433', '1', '123', '1', '2012-01-02 00:00:00', '', 58000.00, '321', '2012-01-02 00:00:00', 1),
('4', 2, '', 150, '4586565433', '1', '123', '1', '2012-01-02 00:00:00', '', 800.00, '321', '2012-01-02 00:00:00', 1),
('3', 4, '', 150, '', '', '', '', '2012-01-02 00:00:00', '', 34000.00, '321', '2012-01-02 00:00:00', 1),
('18', 1, '', 0, '', '', '', '', '2012-01-04 00:00:00', '', 500.00, '123', '2012-01-04 00:00:00', 1),
('17', 2, '', 0, '4586565433', '1', '123', '1', '2012-01-04 00:00:00', '', 24.60, '123', '2012-01-04 00:00:00', 1),
('16', 4, '', 150, '4586565433', '1', '123', '1', '2012-01-04 00:00:00', '', 30000.00, '', '0000-00-00 00:00:00', 1),
('13', 4, '', 150, '4586565433', '1', '123', '1', '2012-01-04 00:00:00', '', 34800.00, '', '0000-00-00 00:00:00', 1),
('10', 4, '', 150, '43645', '12', '344', '32432534', '2012-01-03 00:00:00', '', 5000.00, '', '0000-00-00 00:00:00', 1),
('7', 1, '', 150, '', '', '', '', '2012-01-02 00:00:00', '', 9200.00, '123', '2012-01-02 00:00:00', 1),
('8', 1, '', 150, '', '', '', '', '2012-01-03 00:00:00', '', 50.00, '1', '2012-01-03 00:00:00', 1),
('30', 2, '', NULL, '5432', '12', '754', '108906', '2011-06-11 00:00:00', '', 17700.00, '', '0000-00-00 00:00:00', 1),
('33', 2, '', NULL, '5432', '12', '754', '108906', '2011-06-11 00:00:00', '', 17700.00, '', '0000-00-00 00:00:00', 1),
('34', 2, '', NULL, '5432', '12', '754', '108906', '2011-06-11 00:00:00', '', 17700.00, '', '0000-00-00 00:00:00', 1),
('35', 2, '', NULL, '5432', '12', '754', '108906', '2011-06-11 00:00:00', '', 17700.00, '', '0000-00-00 00:00:00', 1),
('36', 2, '', NULL, '5432', '12', '754', '108906', '2011-06-11 00:00:00', '', 17700.00, '', '0000-00-00 00:00:00', 1),
('38', 2, '', NULL, '5432', '12', '754', '108906', '2011-06-11 00:00:00', '', 17700.00, '', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `docDetails`
--

CREATE TABLE IF NOT EXISTS `docDetails` (
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
-- Dumping data for table `docDetails`
--

INSERT INTO `docDetails` (`doc_id`, `item_id`, `name`, `description`, `qty`, `unit_price`, `unit_id`, `currency_id`, `price`, `invprice`, `vat`, `line`) VALUES
(27, 3359, '3359', 'קפה', 1.00, 4000.00, 0, 'ILS', 4000.00, 4000.00, 0.00, 1),
(27, 3352, '3352', 'תה', 1.00, 445.00, 0, 'ILS', 445.00, 445.00, 0.00, 2),
(28, 57, '57', '', 1.00, 20000.00, 0, 'ILS', 20000.00, 20000.00, 0.00, 1),
(30, 56, 'M16', '', 1.00, 15000.00, 0, 'ILS', 15000.00, 15000.00, 0.00, 1),
(31, 56, 'M16', '', 1.00, 15000.00, 0, 'ILS', 15000.00, 15000.00, 0.00, 1),
(32, 56, 'M16', '', 1.00, 15000.00, 0, 'ILS', 15000.00, 15000.00, 0.00, 1),
(33, 56, 'M16', '', 1.00, 15000.00, 0, 'ILS', 15000.00, 15000.00, 0.00, 1),
(34, 56, 'M16', '', 1.00, 15000.00, 0, 'ILS', 15000.00, 15000.00, 0.00, 1),
(35, 56, 'M16', '', 1.00, 15000.00, 0, 'ILS', 15000.00, 15000.00, 0.00, 1),
(36, 56, 'M16', '', 1.00, 15000.00, 0, 'ILS', 15000.00, 15000.00, 0.00, 1),
(37, 57, 'M4', '', 1.00, 20000.00, 0, 'ILS', 20000.00, 20000.00, 0.00, 1),
(38, 56, 'M16', '', 1.00, 15000.00, 0, 'ILS', 15000.00, 15000.00, 0.00, 1),
(39, 56, 'M16', '', 1.00, 15000.00, 0, 'ILS', 15000.00, 15000.00, 0.00, 1),
(15, 3361, 'שעת עבודה פיתוח PHP', '', 1.00, 220.00, 0, 'ILS', 220.00, 220.00, 39.60, 1),
(15, 3362, 'שעת עבודה פיתוח PHP', '', 1.00, 220.00, 0, 'ILS', 220.00, 220.00, 39.60, 2),
(40, 56, 'M16', '', 1.00, 15000.00, 0, 'ILS', 15000.00, 15000.00, 2700.00, 1),
(41, 56, 'M16', '', 1.00, 15000.00, 0, 'ILS', 15000.00, 15000.00, 2700.00, 1),
(42, 3355, 'בלטה', '', 1.00, 15000.00, 0, 'ILS', 15000.00, 15000.00, 2700.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `docs`
--

CREATE TABLE IF NOT EXISTS `docs` (
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
  `owner` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `owner` (`owner`),
  KEY `account_id` (`account_id`),
  KEY `status` (`status`),
  KEY `doctype` (`doctype`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `docs`
--

INSERT INTO `docs` (`id`, `doctype`, `docnum`, `account_id`, `company`, `address`, `city`, `zip`, `vatnum`, `refnum`, `issue_date`, `due_date`, `discount`, `sub_total`, `novat_total`, `vat`, `total`, `currency_id`, `src_tax`, `status`, `printed`, `comments`, `owner`) VALUES
(40, 1, 1, 113, 'לקוחות שונים', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.00, 15000.00, NULL, 2700.00, 17700.00, 'ILS', NULL, 1, NULL, '', NULL),
(41, 3, 5, 201, 'משרד הבטחון', '', 'רעננה', '42234', '123345678', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.00, 15000.00, NULL, 2700.00, 17700.00, 'USD', NULL, 1, NULL, '', NULL),
(42, 7, 1, 204, 'חנות מחשבים', 'דה האז 1', 'תל אביב', '42234', '534645768', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.00, 15000.00, NULL, 2700.00, 17700.00, 'ILS', NULL, 3, NULL, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `docStatus`
--

CREATE TABLE IF NOT EXISTS `docStatus` (
  `num` int(11) NOT NULL,
  `doc_type` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `looked` tinyint(1) NOT NULL,
  `action` varchar(255) NOT NULL,
  KEY `doc_type` (`doc_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `docStatus`
--

INSERT INTO `docStatus` (`num`, `doc_type`, `name`, `looked`, `action`) VALUES
(1, 1, 'טיוטא', 0, '0'),
(2, 1, 'הופק', 0, '1'),
(3, 1, 'ממתין לאישור', 1, '1'),
(4, 1, 'מבוטל', 1, '1'),
(1, 2, 'טיוטא', 0, '0'),
(2, 2, 'הופק', 0, '1'),
(3, 2, 'ממתין לאישור', 1, '1'),
(4, 2, 'מבוטל', 1, '1'),
(1, 3, 'טיוטא', 0, '0'),
(2, 3, 'הופק', 0, '1'),
(3, 3, 'ממתין לאישור', 1, '1'),
(4, 3, 'מבוטל', 1, '1'),
(1, 4, 'טיוטא', 0, '0'),
(2, 4, 'הופק', 0, '1'),
(3, 4, 'ממתין לאישור', 1, '1'),
(4, 4, 'מבוטל', 1, '1'),
(1, 5, 'טיוטא', 0, '0'),
(2, 5, 'הופק', 0, '1'),
(3, 5, 'ממתין לאישור', 1, '1'),
(4, 5, 'מבוטל', 1, '1'),
(1, 6, 'טיוטא', 0, '0'),
(2, 6, 'הופק', 0, '1'),
(3, 6, 'ממתין לאישור', 1, '1'),
(4, 6, 'מבוטל', 1, '1'),
(1, 7, 'טיוטא', 0, '0'),
(2, 7, 'הופק', 0, '1'),
(3, 7, 'ממתין לאישור', 1, '1'),
(4, 7, 'מבוטל', 1, '1'),
(1, 8, 'טיוטא', 0, '0'),
(2, 8, 'הופק', 0, '1'),
(3, 8, 'ממתין לאישור', 1, '1'),
(4, 8, 'מבוטל', 1, '1'),
(1, 9, 'טיוטא', 0, '0'),
(2, 9, 'הופק', 0, '1'),
(3, 9, 'ממתין לאישור', 1, '1'),
(4, 9, 'מבוטל', 1, '1'),
(1, 10, 'טיוטא', 0, '0'),
(2, 10, 'הופק', 0, '1'),
(3, 10, 'ממתין לאישור', 1, '1'),
(4, 10, 'מבוטל', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `docType`
--

CREATE TABLE IF NOT EXISTS `docType` (
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
  PRIMARY KEY (`id`),
  KEY `account_type` (`account_type`),
  KEY `docStatus_id` (`docStatus_id`),
  KEY `docStatus_id_2` (`docStatus_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `docType`
--

INSERT INTO `docType` (`id`, `name`, `openformat`, `isdoc`, `isrecipet`, `iscontract`, `looked`, `stockAction`, `account_type`, `docStatus_id`, `last_docnum`) VALUES
(1, 'Proforma', 0, 1, 0, 0, 1, -1, 0, 1, 1),
(2, 'Delivery doc.', 0, 1, 0, 0, 0, -1, 0, 0, 0),
(3, 'Invoice', 0, 1, 0, 0, 1, -1, 0, 3, 5),
(4, 'Credit invoice', 0, 1, 0, 0, 0, 1, 0, 0, 0),
(5, 'Return document', 0, 1, 0, 0, 0, 1, 0, 0, 0),
(6, 'Quote', 0, 1, 0, 0, 0, 0, 0, 0, 2),
(7, 'Sales Order', 0, 1, 0, 0, 0, 0, 0, 0, 1),
(8, 'Receipt', 0, 0, 1, 0, 1, 0, 0, 0, 0),
(9, 'Invoice Receipt', 0, 1, 1, 0, 1, -1, 0, 4, 6),
(10, 'Parchace Order', 0, 1, 0, 0, 0, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `eavAttr`
--

CREATE TABLE IF NOT EXISTS `eavAttr` (
  `entity` bigint(20) unsigned NOT NULL,
  `attribute` varchar(250) NOT NULL,
  `value` text NOT NULL,
  KEY `ikEntity` (`entity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `eavAttr`
--

INSERT INTO `eavAttr` (`entity`, `attribute`, `value`) VALUES
(3359, 'testing', 'bla'),
(58, 'סלד', '7200'),
(58, 'סלד', '7200'),
(58, 'גודל', '80GB'),
(57, 'סלד', '7200'),
(57, 'סלד', '7200'),
(57, 'גודל', '80GB');

-- --------------------------------------------------------

--
-- Table structure for table `eavFields`
--

CREATE TABLE IF NOT EXISTS `eavFields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `eavType` varchar(255) NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `eavFields`
--

INSERT INTO `eavFields` (`id`, `name`, `eavType`, `min`, `max`) VALUES
(1, 'Mobile', 'string', 0, 10),
(2, 'Catagory', 'string', 0, 10),
(3, 'PDC_addr', 'string', 0, 100),
(4, 'SDC_addr', 'string', 0, 100);

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

CREATE TABLE IF NOT EXISTS `fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `tablename` varchar(40) NOT NULL,
  `data` varchar(60) NOT NULL,
  `desc` varchar(80) NOT NULL,
  `sort` int(11) NOT NULL,
  `minlen` int(11) NOT NULL DEFAULT '0',
  `maxlen` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=108 ;

--
-- Dumping data for table `fields`
--

INSERT INTO `fields` (`id`, `name`, `tablename`, `data`, `desc`, `sort`, `minlen`, `maxlen`) VALUES
(1, 'num', 'items', 'AUTO', 'none', 0, 0, 0),
(2, 'prefix', 'items', 'PREFIX', 'none', 0, 0, 0),
(3, 'account', 'items', 'AUTOSELECT(accounts.company,num)', 'Income account', 2, 0, 0),
(4, 'name', 'items', 'TEXT', 'Item name', 1, 2, 0),
(5, 'unit', 'items', 'AUTOSELECT(units.name,id)', 'Unit', 3, 0, 0),
(6, 'extcatnum', 'items', 'TEXT', 'Supplier cat. num.', 4, 0, 0),
(7, 'manufacturer', 'items', 'TEXT', 'Manufacturer Name', 5, 0, 0),
(8, 'defprice', 'items', 'PRICE', 'Unit price', 6, 0, 0),
(9, 'currency', 'items', 'AUTOSELECT(currency.name,code)', 'Currency', 7, 0, 0),
(10, 'ammount', 'items', 'NUM', 'Ammount', 8, 0, 0),
(11, 'owner', 'items', 'AUTOSELECT(login.fullname,id)', 'Owner', 9, 0, 0),
(58, 'web', 'accounts', 'WEB', 'Web site', 15, 0, 0),
(57, 'fax', 'accounts', 'PHONE', 'Fax', 14, 0, 0),
(56, 'cellular', 'accounts', 'PHONE', 'Cellular', 13, 0, 0),
(55, 'dir_phone', 'accounts', 'PHONE', 'Direct phone', 12, 0, 0),
(54, 'phone', 'accounts', 'PHONE', 'Phone', 11, 0, 0),
(53, 'email', 'accounts', 'EMAIL', 'Email', 10, 0, 0),
(52, 'department', 'accounts', 'TEXT', 'Department', 9, 0, 0),
(51, 'contact', 'accounts', 'TEXT', 'Contact', 8, 0, 0),
(50, 'src_date', 'accounts', 'DATE', 'Valid date', 6, 0, 0),
(49, 'src_tax', 'accounts', 'NUM', 'Recocnized VAT', 5, 0, 0),
(48, 'pay_terms', 'accounts', 'TEXT', 'Payment terms', 4, 0, 0),
(47, 'id6111', 'accounts', 'NUM', '6111 clause', 3, 0, 0),
(46, 'vatnum', 'accounts', 'NUM', 'Registration number', 2, 0, 0),
(45, 'company', 'accounts', 'TEXT', 'Account name', 1, 0, 0),
(44, 'grp', 'accounts', 'HIDDEN', 'none', 0, 0, 0),
(43, 'type', 'accounts', 'HIDDEN', 'Account type', 0, 0, 0),
(42, 'prefix', 'accounts', 'PREFIX', 'none', 0, 0, 0),
(41, 'num', 'accounts', 'AUTO', 'none', 0, 0, 0),
(59, 'address', 'accounts', 'TEXT', 'Address', 16, 0, 0),
(60, 'city', 'accounts', 'TEXT', 'City', 17, 0, 0),
(61, 'zip', 'accounts', 'NUM', 'Zip', 18, 0, 0),
(62, 'comments', 'accounts', 'TEXT', 'Comments', 19, 0, 0),
(63, 'owner', 'accounts', 'AUTOSELECT(login.fullname,id)', 'Owner', 20, 0, 0),
(65, 'num', 'docs', 'AUTO', 'none', 0, 0, 0),
(66, 'prefix', 'docs', 'PREFIX', 'none', 0, 0, 0),
(67, 'doctype', 'docs', 'HIDDEN', 'none', 0, 0, 0),
(68, 'docnum', 'docs', 'HIDDEN', 'none', 0, 0, 0),
(69, 'status', 'docs', 'HIDDEN', 'none', 0, 0, 0),
(70, 'printed', 'docs', 'HIDDEN', 'none', 0, 0, 0),
(71, 'account', 'docs', 'AUTOCOMPLETE(Account.0,num)', 'Customer', 1, 0, 0),
(72, 'company', 'docs', 'TEXT', 'Company', 2, 0, 0),
(73, 'vatnum', 'docs', 'NUM', 'Reg. num', 3, 0, 0),
(74, 'address', 'docs', 'ADDRESS', 'Address', 4, 0, 0),
(75, 'city', 'docs', 'TEXT', 'City', 5, 0, 0),
(76, 'zip', 'docs', 'NUM', 'Zip', 6, 0, 0),
(77, 'refnum', 'docs', 'NUM', 'Order number', 7, 0, 0),
(78, 'issue_date', 'docs', 'DATE', 'Date', 8, 0, 0),
(79, 'due_date', 'docs', 'DATE', 'To be paid until', 9, 0, 0),
(80, 'comments', 'docs', 'TEXT', 'Comments', 10, 0, 0),
(81, 'owner', 'docs', 'AUTOSELECT(login.fullname,id)', 'Owner', 11, 0, 0),
(82, 'sub_total', 'docs', 'READONLY', 'Total for VAT', 12, 0, 0),
(83, 'novat_total', 'docs', 'READONLY', 'No vat total', 13, 0, 0),
(84, 'vat', 'docs', 'READONLY', 'VAT', 14, 0, 0),
(85, 'total', 'docs', 'READONLY', 'Total', 15, 0, 0),
(86, 'src_tax', 'docs', 'READONLY', 'Source tax', 16, 0, 0),
(87, 'prefix', 'docdetails', 'PREFIX', 'none', 0, 0, 0),
(88, 'num', 'docdetails', 'AUTO', 'none', 0, 0, 0),
(89, 'cat_num', 'docdetails', 'AUTOCOMPLETE(Item.0,num)', 'Item', 1, 0, 0),
(90, 'description', 'docdetails', 'TEXT', 'Description', 2, 0, 0),
(91, 'qty', 'docdetails', 'NUM', 'Qty.', 3, 0, 0),
(92, 'unit_price', 'docdetails', 'PRICE', 'Price', 4, 0, 0),
(93, 'currency', 'docdetails', 'AUTOSELECT(currencies.name,id)', 'Currency', 5, 0, 0),
(94, 'price', 'docdetails', 'PRICE', 'Total', 6, 0, 0),
(95, 'nisprice', 'docdetails', 'PRICE', 'Total NIS', 7, 0, 0),
(96, 'prefix', 'cheques', 'PREFIX', 'none', 0, 0, 0),
(97, 'refnum', 'cheques', 'HIDDEN', 'none', 0, 0, 0),
(98, 'type', 'cheques', 'AUTOSELECT(paymentType.name,id)', 'Payment method', 1, 0, 0),
(99, 'creditcompany', 'cheques', 'AUTOSELECT(accounts.company,num)\r\n', 'Income Bank', 2, 0, 0),
(100, 'cheque_num', 'cheques', 'NUM', 'Number', 3, 0, 0),
(101, 'bank', 'cheques', 'TEXT', 'Bank', 4, 0, 0),
(102, 'branch', 'cheques', 'NUM', 'Branch', 5, 0, 0),
(103, 'cheque_acct', 'cheques', 'NUM', 'Account no.', 6, 0, 0),
(104, 'cheque_date', 'cheques', 'DATE', 'Date', 7, 0, 0),
(105, 'sum', 'cheques', 'PRICE', 'Sum', 8, 0, 0),
(106, 'bank_refnum', 'cheques', 'HIDDEN', 'none', 0, 0, 0),
(107, 'dep_date', 'cheques', 'HIDDEN', 'none', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `inventoryItem`
--

CREATE TABLE IF NOT EXISTS `inventoryItem` (
  `account_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `ammount` int(11) NOT NULL,
  `idcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventoryItem`
--


-- --------------------------------------------------------

--
-- Table structure for table `itemCategories`
--

CREATE TABLE IF NOT EXISTS `itemCategories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `profit` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `itemCategories`
--

INSERT INTO `itemCategories` (`id`, `name`, `profit`) VALUES
(1, 'נשק', 10),
(2, 'דיסק קשיח', 10),
(3, 'כרטיס מסך', 10),
(4, 'שעות עבודה', 0);

-- --------------------------------------------------------

--
-- Table structure for table `itemEav`
--

CREATE TABLE IF NOT EXISTS `itemEav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entity` int(11) NOT NULL,
  `attribute` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `itemEav`
--

INSERT INTO `itemEav` (`id`, `entity`, `attribute`, `value`) VALUES
(10, 58, 2, 0),
(11, 58, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
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
  PRIMARY KEY (`id`),
  KEY `currency_id` (`currency_id`),
  KEY `category_id` (`category_id`),
  KEY `parent_item_id` (`parent_item_id`),
  KEY `itemVatCat_id` (`itemVatCat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3363 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `itemVatCat_id`, `unit_id`, `extcatnum`, `manufacturer`, `saleprice`, `currency_id`, `ammount`, `owner`, `category_id`, `parent_item_id`, `isProduct`, `profit`, `purchaseprice`, `pic`, `description`, `stockType`) VALUES
(56, 'M16', 1, 1, '321', '', 15000.00, 'ILS', 0, 1, 1, 0, 0, 0, 0.00, '', '', 0),
(57, 'M4', 1, 1, '', '', 20000.00, '0', 0, 1, 1, 0, 0, 0, 0.00, '', '', 0),
(58, 'שרת חזק ביותר', 1, 1, '', '', 10000.00, 'USD', 0, 1, 1, 0, 0, 0, 0.00, '', '', 0),
(3351, 'ילקוט', 1, 1, '76543', NULL, 445.00, 'ILS', NULL, 1, 1, 0, 0, 0, 0.00, '', '', 0),
(3352, 'בלטה', 1, 1, 'kjhg', NULL, 445.00, '0', NULL, 1, 0, 0, 0, 0, 0.00, '', '', 0),
(3354, 'קקי', 1, 1, '654', NULL, 1.00, '0', NULL, 1, 0, 0, 0, 0, 0.00, '', '', 0),
(3355, 'בלטה', 1, 1, '654', NULL, 15000.00, '0', NULL, 1, 0, 0, 0, 0, 0.00, '', '', 0),
(3356, 'מחסנית', 1, 1, '1', NULL, 15.00, '0', NULL, 1, 0, 0, 0, 0, 0.00, '', '', 0),
(3357, 'M16', 1, 1, '1', NULL, 4000.00, '0', NULL, 1, 0, 0, 0, 0, 0.00, '', '', 0),
(3358, 'מחסנית', 1, 1, '1', NULL, 15.00, '0', NULL, 1, 0, 0, 0, 0, 0.00, '', '', 0),
(3359, 'פר"יט קר''ב''\\''', 10, 1, '1', NULL, 4000.00, 'ILS', NULL, 1, 1, 0, 0, 0, 0.00, '', '', 0),
(3360, 'מ16 בדולר', 1, 1, '16', NULL, 4000.00, '0', NULL, 1, 0, 0, 0, 0, 0.00, '', '', 0),
(3361, 'שעת עבודה פיתוח PHP', 1, 1, NULL, NULL, 220.00, NULL, NULL, NULL, 4, 0, 0, 10, 0.00, '', '', 0),
(3362, 'שעת עבודה פיתוח PHP', 1, 1, NULL, NULL, 220.00, '0', NULL, NULL, 1, 0, 1, 0, 0.00, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `itemUnits`
--

CREATE TABLE IF NOT EXISTS `itemUnits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `precision` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `itemUnits`
--

INSERT INTO `itemUnits` (`id`, `name`, `precision`) VALUES
(0, 'units', 0),
(1, 'work hours', 0),
(2, 'Meter', 0),
(3, 'liter', 0),
(4, 'gram', 0),
(5, 'Kilo gram', 0);

-- --------------------------------------------------------

--
-- Table structure for table `itemVatCat`
--

CREATE TABLE IF NOT EXISTS `itemVatCat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `itemVatCat`
--

INSERT INTO `itemVatCat` (`id`, `name`) VALUES
(1, 'חייב מעמ'),
(2, 'פטור ממעמ'),
(10, 'מעמ מופחת'),
(12, 'מכירה באילת'),
(13, 'מכירת פיתות בשוק השחור');

-- --------------------------------------------------------

--
-- Table structure for table `openformat`
--

CREATE TABLE IF NOT EXISTS `openformat` (
  `id` int(11) NOT NULL,
  `desc` text NOT NULL,
  `type` text NOT NULL,
  `size` int(11) NOT NULL,
  `record` int(11) NOT NULL,
  `action` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `openformat`
--

INSERT INTO `openformat` (`id`, `desc`, `type`, `size`, `record`, `action`) VALUES
(1000, 'קוד רשומה', 's', 4, 1, 'companies'),
(1001, 'נתנוים עתדיים', 's', 5, 1, 'NA'),
(1002, 'סך רשומות בקובץ', 'n', 15, 1, 'NA'),
(1003, 'עוסק מורשה', 'n', 9, 1, 'regnum'),
(1004, 'מזהה ראשי', 'n', 15, 1, 'prefix'),
(1005, 'קבוע מערכת', 's', 8, 1, 'NA'),
(1006, 'רישום תוכנה', 'n', 8, 1, 'NA'),
(1007, 'שם תוכנה', 's', 20, 1, 'NA'),
(1008, 'מהדורה', 's', 20, 1, 'NA'),
(1009, 'עמ של יצרן', 'n', 9, 1, 'NA'),
(1010, 'יצרן תוכנה', 's', 20, 1, 'NA'),
(1011, 'סוג תוכנה', 'n', 1, 1, '??'),
(1012, 'נתיב שמירת קובץ', 's', 50, 1, 'NA'),
(1013, 'סוג הנהחש', 'n', 1, 1, '??'),
(1014, 'איזון חשבונאי נדרש', 'n', 1, 1, '??'),
(1015, 'מספר חברה ברשם החברות', 'n', 9, 1, 'NA'),
(1016, 'תיק ניכויים', 'n', 9, 1, 'NA'),
(1017, 'נתונים עתידיים', 's', 10, 1, 'NA'),
(1018, 'שם העסק', 's', 50, 1, 'companyname'),
(1019, 'מען העסק רחוב', 's', 50, 1, 'address'),
(1020, 'מען העסק מס בית', 's', 10, 1, 'address'),
(1021, 'מען העסק עיר', 's', 30, 1, 'city'),
(1022, 'מען העסק מיקוד', 's', 8, 1, 'zip'),
(1023, 'שנת המס', 'n', 4, 1, 'NA'),
(1024, 'תאריך חיתוך', 'n', 8, 1, 'NA'),
(1025, 'תאריך חיתוך סןף', 'n', 8, 1, 'NA'),
(1026, 'תאריך הפקה', 'n', 8, 1, 'NA'),
(1027, 'שעת הפקה', 'n', 4, 1, 'NA'),
(1028, 'קוד שפה', 'n', 1, 1, 'NA'),
(1029, 'סט תווים', 'n', 1, 1, 'NA'),
(1030, 'שם תוכנת הכיווץ', 's', 20, 1, 'NA'),
(1031, '', '', 0, 0, ''),
(1032, 'מטבע מוביל', 's', 3, 1, 'NA'),
(1033, '', '', 0, 0, ''),
(1034, 'סניפים/ענפים', 'n', 1, 1, 'NA'),
(1035, 'נתונים עתידיים', 's', 46, 1, 'NA'),
(1050, 'סוג רשומה', 's', 4, 10, 'NA'),
(1051, 'סך רשומות', 'n', 15, 10, 'NA'),
(1100, 'קוד רשומה', 's', 4, 9, 'openline'),
(1101, 'מס רשומה', 'n', 9, 9, 'NA'),
(1102, 'עוסק מורשה', 'n', 9, 9, 'NA'),
(1103, 'מזהה ראשי', 'n', 15, 9, 'NA'),
(1104, 'קבוע מערכת', 's', 8, 9, 'NA'),
(1105, 'נתונים עתדיים', 's', 50, 9, 'NA'),
(1150, 'קוד רשומה', 's', 4, 8, 'NA'),
(1151, 'מס רשומה', 'n', 9, 8, 'NA'),
(1152, 'עוסק מורשה', 'n', 9, 8, 'NA'),
(1153, 'מזהה ראשי', 'n', 9, 8, 'NA'),
(1154, 'קבוע מערכת', 's', 8, 8, 'NA'),
(1155, 'סך רשומות בקובץ', 'n', 15, 8, 'NA'),
(1156, 'נתונים עתדיים', 's', 50, 8, 'NA'),
(1200, 'קוד רשימה', 's', 4, 4, 'doc/rcpt'),
(1201, 'רשומה בקובץ', 'n', 9, 4, 'NA'),
(1202, 'עוסק מורשה', 'n', 9, 4, 'NA'),
(1203, 'סוג מסמך', 'n', 3, 4, 'doctype'),
(1204, 'מספר מסמך', 's', 20, 4, 'docnum'),
(1205, 'תאריך הפקה', 'date', 8, 4, 'NA'),
(1206, 'שעת הפקה', 'hour', 4, 4, 'NA'),
(1207, 'שם לקוח/ספק', 's', 50, 4, 'company'),
(1208, 'מען רחוב', 's', 50, 4, 'address'),
(1209, 'מען מס בית', 's', 10, 4, 'address'),
(1210, 'מען עיר', 's', 30, 4, 'city'),
(1211, 'מען מיקוד', 's', 8, 4, 'zip'),
(1212, 'מען מדינה', 's', 30, 4, 'NA'),
(1213, 'מען קוד מדינה', 's', 2, 4, 'NA'),
(1214, 'טלפון', 's', 15, 4, 'NA'),
(1215, 'עוסק מורשה לקוח', 'n', 9, 4, 'vatnum'),
(1216, 'תאריך ערך', 'date', 8, 4, 'due_date'),
(1217, 'סכום סופי של המסמך במט"ח', 'v99', 15, 4, 'NA'),
(1218, 'קוד מטח', 's', 3, 4, 'NA'),
(1219, 'סכום לפני הנחה', 'v99', 15, 4, 'sub_total'),
(1220, 'הנחה', 'v99', 15, 4, 'NA'),
(1221, 'סכום ללא מעמ', 'v99', 15, 4, 'sub_total'),
(1222, 'סכום מעמ', 'v99', 15, 4, 'vat'),
(1223, 'סכום כולל', 'v99', 15, 4, 'total'),
(1224, 'סכום ניכוי במקור', 'v99', 12, 4, 'NA'),
(1225, 'מספר לקוח בתוכנה', 's', 15, 4, 'account'),
(1226, 'שדה התאמה', 's', 10, 4, 'NA'),
(1227, '', '', 0, 0, ''),
(1228, 'מסמך מבוטל', 's', 1, 4, 'status'),
(1229, '', '', 0, 0, ''),
(1230, 'תאריך המסמך', 'date', 8, 4, 'issue_date'),
(1231, 'מזהה סניף/ענף', 's', 7, 4, 'NA'),
(1232, '', '', 0, 0, ''),
(1233, 'מבצע הפעולה', 's', 9, 4, 'NA'),
(1234, 'שדה מקשר לשורה', 'n', 7, 4, 'num'),
(1235, 'שטח לנתונים עתידיים', 's', 13, 4, 'NA'),
(1250, 'קוד רשומה', 's', 4, 5, 'docdetials'),
(1251, 'מספר רשומה', 'n', 9, 5, 'NA'),
(1252, 'עוסק מורשה', 'n', 9, 5, 'NA'),
(1253, 'סוג מסמך', 'n', 3, 5, 'doctype'),
(1254, 'מספר המסמך', 's', 20, 5, 'num'),
(1255, 'מספר שורה במסמך', 'n', 4, 5, 'NA'),
(1256, 'סוג מסמך בסיס', 'n', 3, 5, 'NA'),
(1257, 'מספר מסמך בסיס', 's', 20, 5, 'NA'),
(1258, 'סוג עסקה', 'n', 1, 5, 'NA'),
(1259, 'מקט פנימי', 's', 20, 5, 'cat_num'),
(1260, 'תיאור הטובין או הפריט', 's', 30, 5, 'description'),
(1261, 'שם יצרן', 's', 50, 5, 'NA'),
(1262, 'מספר סידורי של היצרן', 's', 30, 5, 'NA'),
(1263, 'תיאור יחידת מידה', 's', 20, 5, 'NA'),
(1264, 'הכמות', 'v9999', 17, 5, 'qty'),
(1265, 'מחיר ליחידה ללא מעמ', 'v99', 15, 5, 'unit_price'),
(1266, 'הנחת שורה', 'v99', 15, 5, 'NA'),
(1267, 'סך סכום לשורה', 'v99', 15, 5, 'price'),
(1268, 'שיעור המעמ בשורה', 'n', 2, 5, 'NA'),
(1269, '', '', 0, 0, ''),
(1270, 'מזהה סניף/ענף', 's', 7, 5, 'NA'),
(1271, '', '', 0, 0, ''),
(1272, 'תאריך המסמך', 'date', 8, 5, 'NA'),
(1273, 'שדה מקושר לכותרת', 'n', 7, 5, 'NA'),
(1274, 'מזהה סניף/ענף למסמך בסיס', 's', 7, 5, 'NA'),
(1275, 'נתונים עתידיים', 's', 21, 5, 'NA'),
(1300, 'קוד רשומה', 's', 4, 6, 'cheques'),
(1301, 'מספר רשומה', 'n', 9, 6, 'NA'),
(1302, 'עוסק מורשה', 'n', 9, 6, 'NA'),
(1303, 'סוג מסמך', 'n', 3, 6, 'doctype'),
(1304, 'מספר מסמך', 's', 20, 6, 'refnum'),
(1305, 'מספר שורה במסמך', 'n', 4, 6, 'NA'),
(1306, 'סוג אמצעי תשלום', 'n', 1, 6, 'type'),
(1307, 'מספר בנק', 'n', 10, 6, 'bank'),
(1308, 'מספר סניף', 'n', 10, 6, 'branch'),
(1309, 'מספר חשבון', 'n', 15, 6, 'cheque_date'),
(1310, 'מספר המחאה', 'n', 10, 6, 'cheque_num'),
(1311, 'תאריך פרעון', 'date', 8, 6, 'cheque_date'),
(1312, 'סכום השורה', 'v99', 15, 6, 'sum'),
(1313, 'קוד החברה הסולקת', 'n', 1, 6, 'NA'),
(1314, 'שם הכרטיס הנסלק', 's', 20, 6, 'NA'),
(1315, 'סוג עסקת אשראי', 'n', 1, 6, 'NA'),
(1316, '', '', 0, 0, ''),
(1317, '', '', 0, 0, ''),
(1318, '', '', 0, 0, ''),
(1319, '', '', 0, 0, ''),
(1320, 'מזהה סניף/ענף', 's', 7, 6, 'NA'),
(1321, '', '', 0, 0, ''),
(1322, 'תאריך מסמך', 'date', 8, 6, 'NA'),
(1323, 'שדה מקשר לכותרת', 'n', 7, 6, 'NA'),
(1324, 'נתונים עתידיים', 's', 60, 6, 'NA'),
(1350, 'קוד רשומה', 's', 4, 2, 'transactions'),
(1351, 'מספר רשומה', 'n', 9, 2, 'NA'),
(1352, 'עוסק מורשה', 'n', 9, 2, 'NA'),
(1353, 'מספר תנועה', 'n', 10, 2, 'num'),
(1354, 'מספר שורה בתנועה', 'n', 5, 2, 'NA'),
(1355, 'מנה', 'n', 8, 2, 'NA'),
(1356, 'סוג תנועה', 's', 15, 2, 'type'),
(1357, 'אסמכתא', 's', 20, 2, 'refnum1'),
(1358, 'סוג מסמך אסמכתא', 'n', 3, 2, 'NA'),
(1359, 'אסמכתא 2', 's', 20, 2, 'refnum2'),
(1360, 'סוג מסמך אסמכתא 2', 'n', 3, 2, 'NA'),
(1361, 'פרטים', 's', 50, 2, 'details'),
(1362, 'תאריך', 'date', 8, 2, 'date'),
(1363, 'תאריך ערך', 'date', 8, 2, 'date'),
(1364, 'חשבון בתנועה', 's', 15, 2, 'account'),
(1365, 'חשבון נגדי', 's', 15, 2, 'account1'),
(1366, 'סימן הפועלה', 'n', 1, 2, 'value'),
(1367, 'קוד מטבע מטח', 's', 3, 2, 'NA'),
(1368, 'סכום הפעולה', 'v99', 15, 2, 'sum'),
(1369, 'סכום מטח', 'v99', 15, 2, 'NA'),
(1370, 'שדה כמות', 'v99', 12, 2, 'NA'),
(1371, 'שדה התאמה 1', 's', 10, 2, 'NA'),
(1372, 'שדה התאמה 2', 's', 10, 2, 'NA'),
(1373, '', '', 0, 0, ''),
(1374, 'מזהה סניף/ענף', 's', 7, 2, 'NA'),
(1375, 'תאריך הזנה', 'date', 8, 2, 'NA'),
(1376, 'מבצע פעולה', 's', 9, 2, 'NA'),
(1377, 'נתונים עתידיים', 's', 25, 2, 'NA'),
(1400, 'קוד רשומה', 's', 4, 3, 'accounts'),
(1401, 'מספר רשומה', 'n', 9, 3, 'NA'),
(1402, 'עוסק מורשה', 'n', 9, 3, 'NA'),
(1403, 'מפתח החשבון', 's', 15, 3, 'num'),
(1404, 'שם חשבון', 's', 50, 3, 'company'),
(1405, 'קוד מאזן בוחן', 's', 15, 3, 'type'),
(1406, 'תיאור קוד מאזן בוחן', 's', 30, 3, 'typedesc'),
(1407, 'מען רחוב', 's', 30, 3, 'address'),
(1408, 'מען מספר בית', 's', 50, 3, 'address'),
(1409, 'מען עיר', 's', 10, 3, 'city'),
(1410, 'מען מיקוד', 's', 8, 3, 'zip'),
(1411, 'מען מדינה', 's', 30, 3, 'NA'),
(1412, 'קוד מדינה', 's', 2, 3, 'NA'),
(1413, 'חשבון מרכז', 's', 15, 3, 'NA'),
(1414, 'יתרת חשבון בתחילת החתך', 'v99', 15, 3, 'NA'),
(1415, 'סהכ חובה', 'v99', 15, 3, 'NA'),
(1416, 'סהכ זכות', 'v99', 15, 3, 'NA'),
(1417, 'קוד בסיווג חשבונאי', 'n', 4, 3, 'id6111'),
(1418, '', '', 0, 0, ''),
(1419, 'מספר עוסק לקוח', 'n', 9, 3, 'vatnum'),
(1420, '', '', 0, 0, ''),
(1421, 'מזהה סניף/ענף', 's', 7, 3, 'NA'),
(1422, 'יתרת חשבון בתחילת חתך במטח', 'v99', 15, 3, 'NA'),
(1423, 'קוד מטבע יתרת חשבון במטח', 's', 3, 3, 'NA'),
(1424, 'שטח לנתונים עתדיים', 's', 16, 3, 'NA'),
(1450, 'קוד רשומה', 's', 4, 7, 'items'),
(1451, 'רשומה בקובץ', 'n', 9, 7, 'NA'),
(1452, 'עוסק מורשה', 'n', 9, 7, 'NA'),
(1453, 'מקט פריט', 's', 20, 7, 'num'),
(1454, 'מקט ספק יצרן', 's', 20, 7, 'extcatnum'),
(1455, 'מקט פנימי', 's', 20, 7, 'manufacturer'),
(1456, 'שם פריט', 's', 50, 7, 'name'),
(1457, 'קוד מיון', 's', 10, 7, 'NA'),
(1458, 'תיאור קוד מיון', 's', 30, 7, 'NA'),
(1459, 'תיאור יחידת מידה', 's', 20, 7, 'unit'),
(1460, 'יתרת פריטת לתחילת חתך', 'v99', 12, 7, 'ammount'),
(1461, 'סך הכל כניסות', 'v99', 12, 7, 'NA'),
(1462, 'סך הכל יציאות', 'v99', 12, 7, 'NA'),
(1463, '', 'v99', 10, 7, 'NA'),
(1464, '', 'v99', 10, 7, 'defprice'),
(1465, 'נתונים עתדיים', 's', 50, 7, 'NA');

-- --------------------------------------------------------

--
-- Table structure for table `openformattype`
--

CREATE TABLE IF NOT EXISTS `openformattype` (
  `id` int(2) NOT NULL DEFAULT '0',
  `str` varchar(4) DEFAULT NULL,
  `desc` varchar(26) DEFAULT NULL,
  `type` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `openformattype`
--

INSERT INTO `openformattype` (`id`, `str`, `desc`, `type`) VALUES
(1, 'A000', 'רשימת פתיחה', 'INI'),
(2, 'B100', 'תנועת הנהח', 'BKMVDATA'),
(3, 'B110', 'חשבון בהנהח', 'BKMVDATA'),
(4, 'C100', 'כותרת מסמך', 'BKMVDATA'),
(5, 'D110', 'פריט מסמך', 'BKMVDATA'),
(6, 'D120', 'פריט קבלה', 'BKMVDATA'),
(7, 'M100', 'פריט מלאי', 'BKMVDATA'),
(8, 'Z900', 'רשומת סגירה DATA', 'BKMVDATA'),
(9, 'A100', 'רשימת פתיחה DATA', 'BKMVDATA'),
(10, 'B100', 'תנועת הנהח', 'INI'),
(11, 'B110', 'חשבון בהנהח', 'INI'),
(12, 'C100', 'כותרת מסמך', 'INI'),
(13, 'D110', 'פריט מסמך', 'INI'),
(14, 'D120', 'פריט קבלה', 'INI'),
(15, 'M100', 'פריט מלאי', 'INI');

-- --------------------------------------------------------

--
-- Table structure for table `paymentType`
--

CREATE TABLE IF NOT EXISTS `paymentType` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `value` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `paymentType`
--

INSERT INTO `paymentType` (`id`, `name`, `value`) VALUES
(1, 'Cash', ''),
(2, 'Cheque', ''),
(3, 'Credit card', ''),
(4, 'Bank transfer', ''),
(5, 'Manual Credit', '');

-- --------------------------------------------------------

--
-- Table structure for table `Rights`
--

CREATE TABLE IF NOT EXISTS `Rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Rights`
--

INSERT INTO `Rights` (`itemname`, `type`, `weight`) VALUES
('Authenticated', 2, 1),
('Editor', 2, 0),
('Guest', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sessionStore`
--

CREATE TABLE IF NOT EXISTS `sessionStore` (
  `id` char(32) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sessionStore`
--

INSERT INTO `sessionStore` (`id`, `expire`, `data`) VALUES
('oeu89qk20mbtnf39bc3a4ndlh0', 1378646461, '4644fd46ad83112b74aaad0084e5938c__id|s:1:"1";4644fd46ad83112b74aaad0084e5938c__name|s:5:"admin";4644fd46ad83112b74aaad0084e5938c__states|a:0:{}4644fd46ad83112b74aaad0084e5938cRights_isSuperuser|b:1;');

-- --------------------------------------------------------

--
-- Table structure for table `tranrep`
--

CREATE TABLE IF NOT EXISTS `tranrep` (
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
  KEY `prefix` (`prefix`,`num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tranrep`
--


-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `refnum1` varchar(255) NOT NULL,
  `refnum2` varchar(255) NOT NULL,
  `valuedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `details` varchar(255) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `sum` decimal(20,2) NOT NULL,
  `leadsum` decimal(20,2) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `linenum` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `account_id` (`account_id`,`currency_id`,`owner_id`),
  KEY `owner_id` (`owner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `transactions`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) NOT NULL,
  `password` char(41) DEFAULT NULL,
  `lastlogin` datetime DEFAULT NULL,
  `cookie` char(32) DEFAULT NULL,
  `hash` char(32) DEFAULT NULL,
  `certpasswd` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `fname`, `lname`, `password`, `lastlogin`, `cookie`, `hash`, `certpasswd`, `salt`, `email`) VALUES
(1, 'admin', 'אדם', 'בן חור', '9401b8c7297832c567ae922cc596a4dd', '0000-00-00 00:00:00', '99baccbbb287d2ee4f56c3da4b221c03', 'fec171a4459c6056a4beb4928b6736fa', 'qwe123', '28b206548469ce62182048fd9cf91760', 'adam@speedcomp.co.il'),
(8, 'yosi', 'אברהם', 'אבינו', '9401b8c7297832c567ae922cc596a4dd', '0000-00-00 00:00:00', '', 'eb3c2e052fe25dbd4887b1f5b6df1284', '123', '28b206548469ce62182048fd9cf91760', 'adam2314@gmail.com'),
(9, 'test', 'dd', '', 'c53255317bb11707d0f614696b3ce6f221d0e2f2', NULL, NULL, '625efb03cda110c0eba0b4895d575790', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `userIncomeMap`
--

CREATE TABLE IF NOT EXISTS `userIncomeMap` (
  `user_id` int(11) NOT NULL,
  `itemVatCat_id` int(11) NOT NULL,
  `account_id` int(11) unsigned NOT NULL,
  KEY `itemVatCat_id` (`itemVatCat_id`),
  KEY `account_id` (`account_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userIncomeMap`
--

INSERT INTO `userIncomeMap` (`user_id`, `itemVatCat_id`, `account_id`) VALUES
(1, 1, 100),
(1, 2, 102),
(8, 1, 100),
(8, 2, 100),
(9, 1, 100),
(9, 2, 100),
(1, 10, 210),
(8, 10, 100),
(9, 10, 100),
(1, 12, 103),
(8, 12, 100),
(9, 12, 100),
(1, 13, 100),
(8, 13, 100),
(9, 13, 100);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accHist`
--
ALTER TABLE `accHist`
  ADD CONSTRAINT `accHist_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`);

--
-- Constraints for table `accTemplate`
--
ALTER TABLE `accTemplate`
  ADD CONSTRAINT `accTemplate_ibfk_1` FOREIGN KEY (`AccType_id`) REFERENCES `accType` (`id`);

--
-- Constraints for table `accTemplateItem`
--
ALTER TABLE `accTemplateItem`
  ADD CONSTRAINT `accTemplateItem_ibfk_1` FOREIGN KEY (`AccTemplate_id`) REFERENCES `accTemplate` (`id`),
  ADD CONSTRAINT `accTemplateItem_ibfk_2` FOREIGN KEY (`eavFields_id`) REFERENCES `eavFields` (`id`);

--
-- Constraints for table `AuthAssignment`
--
ALTER TABLE `AuthAssignment`
  ADD CONSTRAINT `AuthAssignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `AuthItemChild`
--
ALTER TABLE `AuthItemChild`
  ADD CONSTRAINT `AuthItemChild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `AuthItemChild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `docStatus`
--
ALTER TABLE `docStatus`
  ADD CONSTRAINT `docStatus_ibfk_1` FOREIGN KEY (`doc_type`) REFERENCES `docType` (`id`);

--
-- Constraints for table `Rights`
--
ALTER TABLE `Rights`
  ADD CONSTRAINT `Rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
