
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
) ENGINE=InnoDB AUTO_INCREMENT=215 DEFAULT CHARSET=utf8;

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
 ('114', '1', '0', '0', '0.00', '0000-00-00 00:00:00', '0', 'ספקים שונים', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');



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
  `id` int(11) unsigned NOT NULL DEFAULT '0',
  `account_id` int(11) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `details` varchar(60) DEFAULT NULL,
  `refnum` char(10) DEFAULT NULL,
  `sum` decimal(8,2) DEFAULT NULL,
  `total` decimal(8,2) DEFAULT NULL,
  `cor_num` varchar(30) DEFAULT NULL,
  `currency_id` varchar(3) NOT NULL,
  PRIMARY KEY (`id`),
KEY `num` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



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
-- Structure for table `config`
--

DROP TABLE IF EXISTS `config`;

CREATE TABLE `config` (
  `id` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `eavType` varchar(255) NOT NULL,
  `hidden` tinyint(1) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `config`
--

INSERT INTO `config` (`id`, `value`, `eavType`,`hidden`) VALUES
 ('company.acc.assetvat', '3', 'integer', 1),
('company.acc.buyvat', '1', 'integer', 1),
('company.acc.custtax', '8', 'integer', 1),
('company.acc.irs', '16', 'integer', 1),
('company.acc.natinspay', '14', 'integer', 1),
('company.acc.openbalance', '9', 'integer', 1),
('company.acc.payvat', '4', 'integer', 1),
('company.acc.pretax', '13', 'integer', 1),
('company.acc.sellvat', '3', 'integer', 1),
('company.address', '', 'string', 0),
('company.city', '', 'string', 0),
('company.cur', 'ILS', 'list(Currecies)', 0),
('company.logo', '', 'file', 0),
('company.name', '', 'string', 0),
('company.path', 'test', 'string', 0),
('company.pdfprint', 'true', 'boolean', 0),
('company.seccur', '', 'list(Currecies)', 0),
('company.stock', 'false', 'boolean', 0),
('company.tax.rate', '10', 'integer', 0),
('company.transaction', '0', 'integer', 1),
('company.vat.id', '69924504', 'integer', 0),
('company.vat.type', '1', 'integer', 0),
('company.zip', '52215', 'string', 0),
('company.en.city',  '',  'string',  '0'),
('company.en.address',  '',  'string',  '0'),
('company.en.name',  'anther one',  'string',  '0'),
('paypal.apiLive', 'false', 'boolean', 0),
('paypal.apiPassword', '1377498089', '', 0),
('paypal.apiSignature', 'AAIVQYQw1NM1GpwV39qoyAlLZqNaArnmriH3xY5IQg-ENXEhq9jz27IB', '', 0),
('paypal.apiUsername', 'adam2314-facilitator_api1.gmail.com', '', 0),
('server.checkTime', '20130324114336', '', 1),
('server.dbVersion', '2.21', '', 1),
('server.Latest', '', '', 1),
('server.Version', '2.21', '', 1),
('server.wkhtmltopdf', 'xvfb-run -a -s "-screen 0 1024x768x16" wkhtmltopdf', 'string', 0),
('system.auth', '179402', 'string', 1),
('system.name', 'Linet 3.0', 'string', 1),
('system.vendor.name', 'Speedcomp', 'string', 1),
('system.vendor.vatnum', '069924504', 'string', 1),
('system.version', '3.0', 'string', 1),
('transactionType.chequedeposit', '4', 'integer', 1),
('transactionType.manual', '0', 'integer', 1),
('transactionType.openBalance', '16', 'integer', 1),
('transactionType.supplierPayment', '5', 'integer', 1);






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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Data for table `curRates`
--

INSERT INTO `curRates` (`id`, `currency_id`, `date`, `value`) VALUES
 ('1', 'ILS', '2000-01-01 00:00:01', '1.00000');




--
-- Structure for table `docCheques`
--

DROP TABLE IF EXISTS `docCheques`;

CREATE TABLE `docCheques` (
  `doc_id` int(11) NOT NULL DEFAULT '0',
  `type` int(11) DEFAULT '0',
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
  `line` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`doc_id`,
`line`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Structure for table `docDetails`
--

DROP TABLE IF EXISTS `docDetails`;

CREATE TABLE `docDetails` (
  `doc_id` int(11) unsigned NOT NULL DEFAULT '0',
  `item_id` int(11) unsigned DEFAULT NULL,
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
  PRIMARY KEY (`doc_id`,`line`),
  KEY `doc_id` (`doc_id`),
  KEY `item_id` (`item_id`),
  KEY `unit_id` (`unit_id`),
KEY `unit_id_2` (`unit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `docDetails`
--




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
 ('1', 'Proforma', '300', '1', '0', '0', '1', '-1', '0', '1', '1', NULL, NULL, '3'),
 ('2', 'Delivery doc.', '200', '1', '0', '0', '0', '-1', '0', '1', '1', NULL, NULL, '3'),
 ('3', 'Invoice', '305', '1', '0', '0', '1', '-1', '0', '3', '1', NULL, '1', '3'),
 ('4', 'Credit invoice', '330', '1', '0', '0', '0', '1', '0', '1', '1', NULL, '17', '3'),
 ('5', 'Return document', '210', '1', '0', '0', '0', '1', '0', '1', '1', NULL, '19', '3'),
 ('6', 'Quote', '0', '1', '0', '0', '0', '0', '0', '0', '1', NULL, NULL, '3'),
 ('7', 'Sales Order', '0', '1', '0', '0', '0', '0', '0', '0', '1', NULL, NULL, '3'),
 ('8', 'Receipt', '400', '0', '1', '0', '1', '0', '0', '1', '1', NULL, '3', '3'),
 ('9', 'Invoice Receipt', '320', '1', '1', '0', '1', '-1', '0', '4', '1', NULL, '18', '3'),
 ('10', 'Purchase Order', '500', '1', '0', '0', '0', '0', '1', '1', '1', NULL, NULL, '3'),
 ('11', 'Manual invoice', '0', '1', '0', '0', '1', '1', '1', '1', '1', NULL, '11', '3'),
 ('12', 'Manual receipt', '0', '1', '0', '0', '1', '1', '1', '1', '1', NULL, '12', '3'),
 ('13', 'Buisness outcome', '0', '1', '0', '0', '0', '0', '0', '0', '1', '2', '5', '1'),
 ('14', 'Asstes outcome', '0', '1', '0', '0', '0', '0', '0', '0', '1', '4', '5', '2');



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
  `description` text,
  `oppt_account_id` int(11) DEFAULT NULL,
  `owner` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `owner` (`owner`),
  KEY `account_id` (`account_id`),
  KEY `status` (`status`),
KEY `doctype` (`doctype`)
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=utf8;



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
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


--
-- Structure for table `extCorrelation`
--

DROP TABLE IF EXISTS `extCorrelation`;

CREATE TABLE `extCorrelation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `in` text COLLATE utf8_unicode_ci NOT NULL,
  `out` text COLLATE utf8_unicode_ci NOT NULL,
  `owner` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Structure for table `files`
--

DROP TABLE IF EXISTS `files`;

CREATE TABLE `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `public` tinyint(1) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `parent_type` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `expire` int(11) NOT NULL,
  `hash` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;


--
-- Structure for table `intCorrelation`
--

DROP TABLE IF EXISTS `intCorrelation`;

CREATE TABLE `intCorrelation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `in` text COLLATE utf8_unicode_ci NOT NULL,
  `out` text COLLATE utf8_unicode_ci NOT NULL,
  `owner` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Data for table `itemCategories`
--

INSERT INTO `itemCategories` (`id`, `name`, `profit`) VALUES
 ('1', 'כללי', '1');



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
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;



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
 ('12', 'מכירה באילת');



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
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

--
-- Structure for table `accTemplate`
--

DROP TABLE IF EXISTS `itemTemplate`;

CREATE TABLE `itemTemplate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `Itemcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Itemcategory_id` (`Itemcategory_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;




--
-- Structure for table `accTemplateItem`
--

DROP TABLE IF EXISTS `itemTemplateItem`;

CREATE TABLE `itemTemplateItem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ItemTemplate_id` int(11) NOT NULL,
  `eavFields_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ItemTemplate_id` (`ItemTemplate_id`),
  KEY `eavFields_id` (`eavFields_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;




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
  `description` text NOT NULL,
  `type` text NOT NULL,
  `size` int(11) NOT NULL,
  `record` int(11) NOT NULL,
  `export` text NOT NULL,
  `import` text NOT NULL,
  `type_id` varchar(4) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Data for table `openformat`
--

INSERT INTO `openformat` (`id`, `description`, `type`, `size`, `record`, `export`, `import`, `type_id`) VALUES
 ('1000', 'קוד רשומה', 's', '4', '1', 'A000', 'A000', 'A000'),
 ('1001', 'נתנוים עתדיים', 's', '5', '1', 'NA', 'NA', 'A000'),
 ('1002', 'סך רשומות בקובץ', 'n', '15', '1', 'file.linecount', 'file.linecount', 'A000'),
 ('1003', 'עוסק מורשה', 'n', '9', '1', 'company.vatnum', 'company.vatnum', 'A000'),
 ('1004', 'מזהה ראשי', 'n', '15', '1', 'this.id', 'this.id', 'A000'),
 ('1005', 'קבוע מערכת', 's', '8', '1', '&OF1.31&', '&OF1.31&', 'A000'),
 ('1006', 'רישום תוכנה', 'n', '8', '1', 'system.auth', 'system.auth', 'A000'),
 ('1007', 'שם תוכנה', 's', '20', '1', 'system.name', 'system.name', 'A000'),
 ('1008', 'מהדורה', 's', '20', '1', 'system.version', 'system.version', 'A000'),
 ('1009', 'עמ של יצרן', 'n', '9', '1', 'system.vendor.vatnum', 'system.vendor.vatnum', 'A000'),
 ('1010', 'יצרן תוכנה', 's', '20', '1', 'system.vendor.name', 'system.vendor.name', 'A000'),
 ('1011', 'סוג תוכנה', 'n', '1', '1', '2', '2', 'A000'),
 ('1012', 'נתיב שמירת קובץ', 's', '50', '1', 'NA', 'NA', 'A000'),
 ('1013', 'סוג הנהחש', 'n', '1', '1', '2', '2', 'A000'),
 ('1014', 'איזון חשבונאי נדרש', 'n', '1', '1', '1', '1', 'A000'),
 ('1015', 'מספר חברה ברשם החברות', 'n', '9', '1', 'company.vatnum', 'company.vatnum', 'A000'),
 ('1016', 'תיק ניכויים', 'n', '9', '1', 'NA', 'NA', 'A000'),
 ('1017', 'נתונים עתידיים', 's', '10', '1', 'NA', 'NA', 'A000'),
 ('1018', 'שם העסק', 's', '50', '1', 'this.name', 'this.name', 'A000'),
 ('1019', 'מען העסק רחוב', 's', '50', '1', 'this.address', 'this.address', 'A000'),
 ('1020', 'מען העסק מס בית', 's', '10', '1', 'this.address', 'this.address', 'A000'),
 ('1021', 'מען העסק עיר', 's', '30', '1', 'this.city', 'this.city', 'A000'),
 ('1022', 'מען העסק מיקוד', 's', '8', '1', 'this.zip', 'this.zip', 'A000'),
 ('1023', 'שנת המס', 'n', '4', '1', 'NA', 'NA', 'A000'),
 ('1024', 'תאריך חיתוך', 'date', '8', '1', 'start', 'start', 'A000'),
 ('1025', 'תאריך חיתוך סןף', 'date', '8', '1', 'end', 'end', 'A000'),
 ('1026', 'תאריך הפקה', 'date', '8', '1', 'now', 'now', 'A000'),
 ('1027', 'שעת הפקה', 'hour', '4', '1', 'now', 'now', 'A000'),
 ('1028', 'קוד שפה', 'n', '1', '1', '0', '0', 'A000'),
 ('1029', 'סט תווים', 'n', '1', '1', '1', '1', 'A000'),
 ('1030', 'שם תוכנת הכיווץ', 's', '20', '1', 'zip', 'zip', 'A000'),
 ('1031', '', '', '0', '0', '', '', 'A002'),
 ('1032', 'מטבע מוביל', 's', '3', '1', 'NA', 'NA', 'A000'),
 ('1033', '', '', '0', '0', '', '', 'A002'),
 ('1034', 'סניפים/ענפים', 'n', '1', '1', '0', '0', 'A000'),
 ('1035', 'נתונים עתידיים', 's', '46', '1', 'NA', 'NA', 'A000'),
 ('1050', 'סוג רשומה', 's', '4', '10', 'NA', 'NA', 'A001'),
 ('1051', 'סך רשומות', 'n', '15', '10', 'NA', 'NA', 'A001'),
 ('1100', 'קוד רשומה', 's', '4', '9', 'A100', 'A100', 'A100'),
 ('1101', 'מס רשומה', 'n', '9', '9', 'file.line', 'file.line', 'A100'),
 ('1102', 'עוסק מורשה', 'n', '9', '9', 'company.vatnum', 'company.vatnum', 'A100'),
 ('1103', 'מזהה ראשי', 'n', '15', '9', 'this.id', 'this.id', 'A100'),
 ('1104', 'קבוע מערכת', 's', '8', '9', '&OF1.31&', '&OF1.31&', 'A100'),
 ('1105', 'נתונים עתדיים', 's', '50', '9', 'NA', 'NA', 'A100'),
 ('1150', 'קוד רשומה', 's', '4', '8', 'Z900', 'Z900', 'Z900'),
 ('1151', 'מס רשומה', 'n', '9', '8', 'file.line', 'file.line', 'Z900'),
 ('1152', 'עוסק מורשה', 'n', '9', '8', 'company.vatnum', 'company.vatnum', 'Z900'),
 ('1153', 'מזהה ראשי', 'n', '9', '8', 'this.id', 'this.id', 'Z900'),
 ('1154', 'קבוע מערכת', 's', '8', '8', '&OF1.31&', '&OF1.31&', 'Z900'),
 ('1155', 'סך רשומות בקובץ', 'n', '15', '8', 'file.linecount', 'file.linecount', 'Z900'),
 ('1156', 'נתונים עתדיים', 's', '50', '8', 'NA', 'NA', 'Z900'),
 ('1200', 'קוד רשימה', 's', '4', '4', 'C100', 'C100', 'C100'),
 ('1201', 'רשומה בקובץ', 'n', '9', '4', 'file.line', 'file.line', 'C100'),
 ('1202', 'עוסק מורשה', 'n', '9', '4', 'company.vatnum', 'company.vatnum', 'C100'),
 ('1203', 'סוג מסמך', 'n', '3', '4', 'func.getType', 'func.getType', 'C100'),
 ('1204', 'מספר מסמך', 's', '20', '4', 'this.docnum', 'this.docnum', 'C100'),
 ('1205', 'תאריך הפקה', 'date', '8', '4', 'this.issue_date', 'this.issue_date', 'C100'),
 ('1206', 'שעת הפקה', 'hour', '4', '4', 'this.issue_date', 'this.issue_date', 'C100'),
 ('1207', 'שם לקוח/ספק', 's', '50', '4', 'this.company', 'this.company', 'C100'),
 ('1208', 'מען רחוב', 's', '50', '4', 'this.address', 'this.address', 'C100'),
 ('1209', 'מען מס בית', 's', '10', '4', 'this.address', 'this.address', 'C100'),
 ('1210', 'מען עיר', 's', '30', '4', 'this.city', 'this.city', 'C100'),
 ('1211', 'מען מיקוד', 's', '8', '4', 'this.zip', 'this.zip', 'C100'),
 ('1212', 'מען מדינה', 's', '30', '4', 'NA', 'NA', 'C100'),
 ('1213', 'מען קוד מדינה', 's', '2', '4', 'NA', 'NA', 'C100'),
 ('1214', 'טלפון', 's', '15', '4', 'NA', 'NA', 'C100'),
 ('1215', 'עוסק מורשה לקוח', 'n', '9', '4', 'this.vatnum', 'this.vatnum', 'C100'),
 ('1216', 'תאריך ערך', 'date', '8', '4', 'this.due_date', 'this.due_date', 'C100'),
 ('1217', 'סכום סופי של המסמך במט\"ח', 'v99', '15', '4', 'NA', 'NA', 'C100'),
 ('1218', 'קוד מטח', 's', '3', '4', 'NA', 'NA', 'C100'),
 ('1219', 'סכום לפני הנחה', 'v99', '15', '4', 'this.sub_total', 'this.sub_total', 'C100'),
 ('1220', 'הנחה', 'v99', '15', '4', 'this.discount', 'this.discount', 'C100'),
 ('1221', 'סכום ללא מעמ', 'v99', '15', '4', 'this.novat_total', 'this.novat_total', 'C100'),
 ('1222', 'סכום מעמ', 'v99', '15', '4', 'this.vat', 'this.vat', 'C100'),
 ('1223', 'סכום כולל', 'v99', '15', '4', 'this.total', 'this.total', 'C100'),
 ('1224', 'סכום ניכוי במקור', 'v99', '12', '4', 'this.src_tax', 'this.src_tax', 'C100'),
 ('1225', 'מספר לקוח בתוכנה', 's', '15', '4', 'this.account_id', 'this.account_id', 'C100'),
 ('1226', 'שדה התאמה', 's', '10', '4', 'NA', 'NA', 'C100'),
 ('1227', '', '', '0', '0', '', '', 'C101'),
 ('1228', 'מסמך מבוטל', 's', '1', '4', 'this.status', 'this.status', 'C100'),
 ('1229', '', '', '0', '0', '', '', 'C101'),
 ('1230', 'תאריך המסמך', 'date', '8', '4', 'this.issue_date', 'this.issue_date', 'C100'),
 ('1231', 'מזהה סניף/ענף', 's', '7', '4', 'NA', 'NA', 'C100'),
 ('1232', '', '', '0', '0', '', '', 'C101'),
 ('1233', 'מבצע הפעולה', 's', '9', '4', 'this.owner', 'this.owner', 'C100'),
 ('1234', 'שדה מקשר לשורה', 'n', '7', '4', 'this.id', 'this.id', 'C100'),
 ('1235', 'שטח לנתונים עתידיים', 's', '13', '4', 'NA', 'NA', 'C100'),
 ('1250', 'קוד רשומה', 's', '4', '5', 'D110', 'D110', 'D110'),
 ('1251', 'מספר רשומה', 'n', '9', '5', 'file.line', 'file.line', 'D110'),
 ('1252', 'עוסק מורשה', 'n', '9', '5', 'company.vatnum', 'company.vatnum', 'D110'),
 ('1253', 'סוג מסמך', 'n', '3', '5', 'func.getType', 'func.getType', 'D110'),
 ('1254', 'מספר המסמך', 's', '20', '5', 'func.getNum', 'func.getNum', 'D110'),
 ('1255', 'מספר שורה במסמך', 'n', '4', '5', 'this.line', 'this.line', 'D110'),
 ('1256', 'סוג מסמך בסיס', 'n', '3', '5', 'NA', 'NA', 'D110'),
 ('1257', 'מספר מסמך בסיס', 's', '20', '5', 'NA', 'NA', 'D110'),
 ('1258', 'סוג עסקה', 'n', '1', '5', 'NA', 'NA', 'D110'),
 ('1259', 'מקט פנימי', 's', '20', '5', 'this.item_id', 'this.item_id', 'D110'),
 ('1260', 'תיאור הטובין או הפריט', 's', '30', '5', 'this.name', 'this.name', 'D110'),
 ('1261', 'שם יצרן', 's', '50', '5', 'NA', 'NA', 'D110'),
 ('1262', 'מספר סידורי של היצרן', 's', '30', '5', 'NA', 'NA', 'D110'),
 ('1263', 'תיאור יחידת מידה', 's', '20', '5', 'this.unit_id', 'this.unit_id', 'D110'),
 ('1264', 'הכמות', 'v9999', '17', '5', 'this.qty', 'this.qty', 'D110'),
 ('1265', 'מחיר ליחידה ללא מעמ', 'v99', '15', '5', 'this.unit_price', 'this.unit_price', 'D110'),
 ('1266', 'הנחת שורה', 'v99', '15', '5', 'NA', 'NA', 'D110'),
 ('1267', 'סך סכום לשורה', 'v99', '15', '5', 'this.price', 'this.price', 'D110'),
 ('1268', 'שיעור המעמ בשורה', 'n', '4', '5', 'this.vat', 'this.vat', 'D110'),
 ('1269', '', '', '0', '0', '', '', 'D111'),
 ('1270', 'מזהה סניף/ענף', 's', '7', '5', 'NA', 'NA', 'D110'),
 ('1271', '', '', '0', '0', '', '', 'D111'),
 ('1272', 'תאריך המסמך', 'date', '8', '5', 'func.getDate', 'func.getDate', 'D110'),
 ('1273', 'שדה מקושר לכותרת', 'n', '7', '5', 'this.doc_id', 'this.doc_id', 'D110'),
 ('1274', 'מזהה סניף/ענף למסמך בסיס', 's', '7', '5', 'NA', 'NA', 'D110'),
 ('1275', 'נתונים עתידיים', 's', '21', '5', 'NA', 'NA', 'D110'),
 ('1300', 'קוד רשומה', 's', '4', '6', 'D120', 'D120', 'D120'),
 ('1301', 'מספר רשומה', 'n', '9', '6', 'file.line', 'file.line', 'D120'),
 ('1302', 'עוסק מורשה', 'n', '9', '6', 'company.vatnum', 'company.vatnum', 'D120'),
 ('1303', 'סוג מסמך', 'n', '3', '6', 'func.getType', 'func.getType', 'D120'),
 ('1304', 'מספר מסמך', 's', '20', '6', 'func.getNum', 'func.getNum', 'D120'),
 ('1305', 'מספר שורה במסמך', 'n', '4', '6', 'this.line', 'this.line', 'D120'),
 ('1306', 'סוג אמצעי תשלום', 'n', '1', '6', 'this.type', 'this.type', 'D120'),
 ('1307', 'מספר בנק', 'n', '10', '6', 'this.bank', 'this.bank', 'D120'),
 ('1308', 'מספר סניף', 'n', '10', '6', 'this.branch', 'this.branch', 'D120'),
 ('1309', 'מספר חשבון', 'n', '15', '6', 'this.cheque_date', 'this.cheque_date', 'D120'),
 ('1310', 'מספר המחאה', 'n', '10', '6', 'this.cheque_num', 'this.cheque_num', 'D120'),
 ('1311', 'תאריך פרעון', 'date', '8', '6', 'this.cheque_date', 'this.cheque_date', 'D120'),
 ('1312', 'סכום השורה', 'v99', '15', '6', 'this.sum', 'this.sum', 'D120'),
 ('1313', 'קוד החברה הסולקת', 'n', '1', '6', 'NA', 'NA', 'D120'),
 ('1314', 'שם הכרטיס הנסלק', 's', '20', '6', 'NA', 'NA', 'D120'),
 ('1315', 'סוג עסקת אשראי', 'n', '1', '6', 'NA', 'NA', 'D120'),
 ('1316', '', '', '0', '0', '', '', 'D121'),
 ('1317', '', '', '0', '0', '', '', 'D121'),
 ('1318', '', '', '0', '0', '', '', 'D121'),
 ('1319', '', '', '0', '0', '', '', 'D121'),
 ('1320', 'מזהה סניף/ענף', 's', '7', '6', 'NA', 'NA', 'D120'),
 ('1321', '', '', '0', '0', '', '', 'D121'),
 ('1322', 'תאריך מסמך', 'date', '8', '6', 'func.getDate', 'func.getDate', 'D120'),
 ('1323', 'שדה מקשר לכותרת', 'n', '7', '6', 'this.doc_id', 'this.doc_id', 'D120'),
 ('1324', 'נתונים עתידיים', 's', '60', '6', 'NA', 'NA', 'D120'),
 ('1350', 'קוד רשומה', 's', '4', '2', 'B100', 'B100', 'B100'),
 ('1351', 'מספר רשומה', 'n', '9', '2', 'file.line', 'file.line', 'B100'),
 ('1352', 'עוסק מורשה', 'n', '9', '2', 'company.vatnum', 'company.vatnum', 'B100'),
 ('1353', 'מספר תנועה', 'n', '10', '2', 'this.num', 'this.num', 'B100'),
 ('1354', 'מספר שורה בתנועה', 'n', '5', '2', 'this.linenum', 'this.linenum', 'B100'),
 ('1355', 'מנה', 'n', '8', '2', 'NA', 'NA', 'B100'),
 ('1356', 'סוג תנועה', 's', '15', '2', 'this.type', 'this.type', 'B100'),
 ('1357', 'אסמכתא', 's', '20', '2', 'this.refnum1', 'this.refnum1', 'B100'),
 ('1358', 'סוג מסמך אסמכתא', 'n', '3', '2', 'NA', 'NA', 'B100'),
 ('1359', 'אסמכתא 2', 's', '20', '2', 'this.refnum2', 'this.refnum2', 'B100'),
 ('1360', 'סוג מסמך אסמכתא 2', 'n', '3', '2', 'NA', 'NA', 'B100'),
 ('1361', 'פרטים', 's', '50', '2', 'this.details', 'this.details', 'B100'),
 ('1362', 'תאריך', 'date', '8', '2', 'this.date', 'this.date', 'B100'),
 ('1363', 'תאריך ערך', 'date', '8', '2', 'this.valuedate', 'this.valuedate', 'B100'),
 ('1364', 'חשבון בתנועה', 's', '15', '2', 'this.account_id', 'this.account_id', 'B100'),
 ('1365', 'חשבון נגדי', 's', '15', '2', 'NA', 'NA', 'B100'),
 ('1366', 'סימן הפועלה', 'n', '1', '2', 'func.opefrmtMrk', 'func.opefrmtMrk', 'B100'),
 ('1367', 'קוד מטבע מטח', 's', '3', '2', 'this.currency_id', 'this.currency_id', 'B100'),
 ('1368', 'סכום הפעולה', 'v99', '15', '2', 'this.leadsum', 'this.leadsum', 'B100'),
 ('1369', 'סכום מטח', 'v99', '15', '2', 'this.sum', 'this.sum', 'B100'),
 ('1370', 'שדה כמות', 'v99', '12', '2', 'NA', 'NA', 'B100'),
 ('1371', 'שדה התאמה 1', 's', '10', '2', 'NA', 'NA', 'B100'),
 ('1372', 'שדה התאמה 2', 's', '10', '2', 'NA', 'NA', 'B100'),
 ('1373', '', '', '0', '0', '', '', 'B101'),
 ('1374', 'מזהה סניף/ענף', 's', '7', '2', 'NA', 'NA', 'B100'),
 ('1375', 'תאריך הזנה', 'date', '8', '2', 'NA', 'NA', 'B100'),
 ('1376', 'מבצע פעולה', 's', '9', '2', 'this.owner_id', 'this.owner_id', 'B100'),
 ('1377', 'נתונים עתידיים', 's', '25', '2', 'NA', 'NA', 'B100'),
 ('1400', 'קוד רשומה', 's', '4', '3', 'B110', 'B110', 'B110'),
 ('1401', 'מספר רשומה', 'n', '9', '3', 'file.line', 'file.line', 'B110'),
 ('1402', 'עוסק מורשה', 'n', '9', '3', 'company.vatnum', 'company.vatnum', 'B110'),
 ('1403', 'מפתח החשבון', 's', '15', '3', 'this.id', 'this.id', 'B110'),
 ('1404', 'שם חשבון', 's', '50', '3', 'this.name', 'this.name', 'B110'),
 ('1405', 'קוד מאזן בוחן', 's', '15', '3', 'this.type', 'this.type', 'B110'),
 ('1406', 'תיאור קוד מאזן בוחן', 's', '30', '3', 'func.getType', 'func.getType', 'B110'),
 ('1407', 'מען רחוב', 's', '30', '3', 'this.address', 'this.address', 'B110'),
 ('1408', 'מען מספר בית', 's', '50', '3', 'this.address', 'this.address', 'B110'),
 ('1409', 'מען עיר', 's', '10', '3', 'this.city', 'this.city', 'B110'),
 ('1410', 'מען מיקוד', 's', '8', '3', 'this.zip', 'this.zip', 'B110'),
 ('1411', 'מען מדינה', 's', '30', '3', 'NA', 'NA', 'B110'),
 ('1412', 'קוד מדינה', 's', '2', '3', 'NA', 'NA', 'B110'),
 ('1413', 'חשבון מרכז', 's', '15', '3', 'NA', 'NA', 'B110'),
 ('1414', 'יתרת חשבון בתחילת החתך', 'v99', '15', '3', 'limit.getBalance', 'limit.getBalance', 'B110'),
 ('1415', 'סהכ חובה', 'v99', '15', '3', 'limit.getPos', 'limit.getPos', 'B110'),
 ('1416', 'סהכ זכות', 'v99', '15', '3', 'limit.getNeg', 'limit.getNeg', 'B110'),
 ('1417', 'קוד בסיווג חשבונאי', 'n', '4', '3', 'this.id6111', 'this.id6111', 'B110'),
 ('1418', '', '', '0', '0', '', '', 'B111'),
 ('1419', 'מספר עוסק לקוח', 'n', '9', '3', 'this.vatnum', 'this.vatnum', 'B110'),
 ('1420', '', '', '0', '0', '', '', 'B111'),
 ('1421', 'מזהה סניף/ענף', 's', '7', '3', 'NA', 'NA', 'B110'),
 ('1422', 'יתרת חשבון בתחילת חתך במטח', 'v99', '15', '3', 'NA', 'NA', 'B110'),
 ('1423', 'קוד מטבע יתרת חשבון במטח', 's', '3', '3', 'NA', 'NA', 'B110'),
 ('1424', 'שטח לנתונים עתדיים', 's', '16', '3', 'NA', 'NA', 'B110'),
 ('1450', 'קוד רשומה', 's', '4', '7', 'M100', 'M100', 'M100'),
 ('1451', 'רשומה בקובץ', 'n', '9', '7', 'file.line', 'file.line', 'M100'),
 ('1452', 'עוסק מורשה', 'n', '9', '7', 'company.vatnum', 'company.vatnum', 'M100'),
 ('1453', 'מקט פריט', 's', '20', '7', 'this.id', 'this.id', 'M100'),
 ('1454', 'מקט ספק יצרן', 's', '20', '7', 'this.extcatnum', 'this.extcatnum', 'M100'),
 ('1455', 'מקט פנימי', 's', '20', '7', 'this.id', 'this.id', 'M100'),
 ('1456', 'שם פריט', 's', '50', '7', 'this.name', 'this.name', 'M100'),
 ('1457', 'קוד מיון', 's', '10', '7', 'NA', 'NA', 'M100'),
 ('1458', 'תיאור קוד מיון', 's', '30', '7', 'NA', 'NA', 'M100'),
 ('1459', 'תיאור יחידת מידה', 's', '20', '7', 'this.unit_id', 'this.unit_id', 'M100'),
 ('1460', 'יתרת פריטת לתחילת חתך', 'v99', '12', '7', 'ammount', 'ammount', 'M100'),
 ('1461', 'סך הכל כניסות', 'v99', '12', '7', 'NA', 'NA', 'M100'),
 ('1462', 'סך הכל יציאות', 'v99', '12', '7', 'NA', 'NA', 'M100'),
 ('1463', '', '99', '10', '7', 'NA', 'NA', 'M100'),
 ('1464', '', '99', '10', '7', 'this.saleprice', 'this.saleprice', 'M100'),
 ('1465', 'נתונים עתדיים', 's', '50', '7', 'NA', 'NA', 'M100');



--
-- Structure for table `openformattype`
--

DROP TABLE IF EXISTS `openformattype`;

CREATE TABLE `openformattype` (
  `id` varchar(4) NOT NULL,
  `description` varchar(26) DEFAULT NULL,
  `type` varchar(8) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`,
`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Data for table `openformattype`
--

INSERT INTO `openformattype` (`id`, `description`, `type`) VALUES
 ('A000', 'רשימת פתיחה', 'INI'),
 ('B100', 'תנועת הנהח', 'BKMVDATA'),
 ('B110', 'חשבון בהנהח', 'BKMVDATA'),
 ('C100', 'כותרת מסמך', 'BKMVDATA'),
 ('D110', 'פריט מסמך', 'BKMVDATA'),
 ('D120', 'פריט קבלה', 'BKMVDATA'),
 ('M100', 'פריט מלאי', 'BKMVDATA'),
 ('Z900', 'רשומת סגירה DATA', 'BKMVDATA'),
 ('A100', 'רשימת פתיחה DATA', 'BKMVDATA'),
 ('B100', 'תנועת הנהח', 'INI'),
 ('B110', 'חשבון בהנהח', 'INI'),
 ('C100', 'כותרת מסמך', 'INI'),
 ('D110', 'פריט מסמך', 'INI'),
 ('D120', 'פריט קבלה', 'INI'),
 ('M100', 'פריט מלאי', 'INI');



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
 ('5', 'Supplier Payment'),
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
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;


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


SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
