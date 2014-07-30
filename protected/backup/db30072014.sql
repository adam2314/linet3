
--
-- Structure for table `9Lnx_AuthAssignment`
--

DROP TABLE IF EXISTS `9Lnx_AuthAssignment`;

CREATE TABLE `9Lnx_AuthAssignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,
`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `9Lnx_AuthAssignment`
--

INSERT INTO `9Lnx_AuthAssignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
 ('Admin', '1', NULL, 'N;'),
 ('Authenticated', '2', NULL, 'N;');



--
-- Structure for table `9Lnx_AuthItem`
--

DROP TABLE IF EXISTS `9Lnx_AuthItem`;

CREATE TABLE `9Lnx_AuthItem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `9Lnx_AuthItem`
--

INSERT INTO `9Lnx_AuthItem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
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
-- Structure for table `9Lnx_AuthItemChild`
--

DROP TABLE IF EXISTS `9Lnx_AuthItemChild`;

CREATE TABLE `9Lnx_AuthItemChild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,
`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `9Lnx_Rights`
--

DROP TABLE IF EXISTS `9Lnx_Rights`;

CREATE TABLE `9Lnx_Rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
PRIMARY KEY (`itemname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `9Lnx_Rights`
--

INSERT INTO `9Lnx_Rights` (`itemname`, `type`, `weight`) VALUES
 ('Authenticated', '2', '1'),
 ('Editor', '2', '0'),
 ('Guest', '2', '2');



--
-- Structure for table `9Lnx_accCountry`
--

DROP TABLE IF EXISTS `9Lnx_accCountry`;

CREATE TABLE `9Lnx_accCountry` (
  `id` varchar(2) NOT NULL DEFAULT '',
  `name` varchar(255) DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `9Lnx_accEav`
--

DROP TABLE IF EXISTS `9Lnx_accEav`;

CREATE TABLE `9Lnx_accEav` (
  `entity` bigint(20) NOT NULL,
  `attribute` varchar(250) NOT NULL,
`value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `9Lnx_accHist`
--

DROP TABLE IF EXISTS `9Lnx_accHist`;

CREATE TABLE `9Lnx_accHist` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `account_id` int(11) DEFAULT NULL,
  `dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `details` text,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `9Lnx_accId6111`
--

DROP TABLE IF EXISTS `9Lnx_accId6111`;

CREATE TABLE `9Lnx_accId6111` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `percentage` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5091 DEFAULT CHARSET=utf8;

--
-- Data for table `9Lnx_accId6111`
--

INSERT INTO `9Lnx_accId6111` (`id`, `name`, `percentage`) VALUES
 ('1010', ' ?????? ??????? ????', '0'),
 ('1020', ' ?????? ??????? ???\"?', '0'),
 ('1030', ' ?????? ???? ??????? ????', '0'),
 ('1040', ' ?????? ???? ??????? ???\"?', '0'),
 ('1090', ' ?????? ?????', '0'),
 ('3510', ' ??? ????? ???????', '0'),
 ('3515', ' ???????', '0'),
 ('3520', ' ?????? ??? ?????? ????', '0'),
 ('3530', ' ????? ???????? ???????', '0'),
 ('3535', ' ?????? ???? ?????', '0'),
 ('3540', ' ??????? ????????', '0'),
 ('3545', ' ?????? ?????', '0'),
 ('3550', ' ?????? ????? ????????', '0'),
 ('3555', ' ?????? ???? ??????', '0'),
 ('3560', ' ??????', '0'),
 ('3565', ' ????? ??? ???????', '0'),
 ('3570', ' ??? ?????? ?????? ?????', '0'),
 ('3575', ' ????? ??????', '0'),
 ('3580', ' ???', '0'),
 ('3590', ' ???? ????', '0'),
 ('3595', ' ????? ???????', '0'),
 ('3600', ' ??????? ?????? ???????', '0'),
 ('3610', ' ????? ??????? ???????', '0'),
 ('3620', ' ????? ?????? ??????', '0'),
 ('3625', ' ??????? ????? ?????? ?????', '0'),
 ('3640', ' ??? ?????', '0'),
 ('3650', ' ?????? ???? ???????', '0'),
 ('3660', ' ?????? ???\"?', '0'),
 ('3665', ' ?????? ???????', '0'),
 ('3680', ' ???????', '0'),
 ('3685', ' ???? ?????', '0'),
 ('3690', ' ????? ??? ??????? ?????', '0'),
 ('5010', ' ????? ???', '0'),
 ('5090', ' ????? ?????? ?????', '0');



--
-- Structure for table `9Lnx_accTemplate`
--

DROP TABLE IF EXISTS `9Lnx_accTemplate`;

CREATE TABLE `9Lnx_accTemplate` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `AccType_id` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `9Lnx_accTemplateItem`
--

DROP TABLE IF EXISTS `9Lnx_accTemplateItem`;

CREATE TABLE `9Lnx_accTemplateItem` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `AccTemplate_id` int(11) NOT NULL,
  `eavFields_id` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `9Lnx_accType`
--

DROP TABLE IF EXISTS `9Lnx_accType`;

CREATE TABLE `9Lnx_accType` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `desc` varchar(40) NOT NULL,
  `openformat` varchar(5) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Data for table `9Lnx_accType`
--

INSERT INTO `9Lnx_accType` (`id`, `name`, `desc`, `openformat`) VALUES
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
-- Structure for table `9Lnx_accounts`
--

DROP TABLE IF EXISTS `9Lnx_accounts`;

CREATE TABLE `9Lnx_accounts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` int(11) DEFAULT NULL,
  `id6111` int(10) DEFAULT NULL,
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
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8;

--
-- Data for table `9Lnx_accounts`
--

INSERT INTO `9Lnx_accounts` (`id`, `type`, `id6111`, `pay_terms`, `src_tax`, `src_date`, `parent_account_id`, `name`, `contact`, `department`, `vatnum`, `email`, `phone`, `dir_phone`, `cellular`, `fax`, `web`, `address`, `city`, `zip`, `currency_id`, `comments`, `system_acc`, `owner`, `modified`, `created`) VALUES
 ('1', '6', '0', '0', '0.00', '2013-08-11 12:43:52', '0', '??\"? ??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('2', '6', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '??\"? ?????? ???? ??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('3', '6', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '??\"? ??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('4', '6', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '??\"? ???', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('5', '6', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ????? ??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('6', '4', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('7', '4', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '???? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('8', '6', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ????? ???????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('9', '4', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('10', '4', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '???? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('11', '4', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '???? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('13', '6', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '?? ????? ??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('14', '6', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ????? ??\"?', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('15', '6', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('16', '6', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '?? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('17', '2', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '???? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('18', '2', '3510', '0', '0.00', '0000-00-00 00:00:00', '0', '??? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('30', '2', '3575', '0', '0.00', '0000-00-00 00:00:00', '0', '?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('31', '2', '3550', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ??? ???????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('32', '2', '3550', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('33', '2', '3565', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ???', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('34', '2', '3565', '0', '66.66', '0000-00-00 00:00:00', '0', '????? ???', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('35', '2', '3545', '0', '100.00', '0000-00-00 00:00:00', '0', '??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('36', '2', '3575', '0', '0.00', '0000-00-00 00:00:00', '0', '??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('37', '2', '3650', '0', '100.00', '0000-00-00 00:00:00', '0', '?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('38', '2', '3685', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('39', '2', '3515', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ???', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('40', '2', '3515', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ?????? ???????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('41', '2', '3515', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('42', '2', '3515', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ?? ?', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('43', '2', '3515', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('44', '2', '3650', '0', '100.00', '0000-00-00 00:00:00', '0', '????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('45', '2', '3565', '0', '25.00', '0000-00-00 00:00:00', '0', '???', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('46', '2', '3565', '0', '100.00', '0000-00-00 00:00:00', '0', '???', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('47', '2', '3575', '0', '0.00', '0000-00-00 00:00:00', '0', '??? ???', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('48', '2', '3575', '0', '0.00', '0000-00-00 00:00:00', '0', '??? ???', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('49', '2', '3680', '0', '100.00', '0000-00-00 00:00:00', '0', '??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('50', '2', '3565', '0', '100.00', '0000-00-00 00:00:00', '0', '??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('51', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ???????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('52', '2', '3600', '0', '100.00', '0000-00-00 00:00:00', '0', '??????? ???????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('53', '2', '3565', '0', '100.00', '0000-00-00 00:00:00', '0', '?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('54', '2', '3590', '0', '100.00', '0000-00-00 00:00:00', '0', '????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('55', '2', '3650', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('56', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', '???? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('57', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', '???? ???', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('58', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', '???? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('59', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', '???? ??', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('60', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', '???? ??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('61', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', '???? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('62', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', '???? ??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('63', '2', '3625', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ?? ???? ????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('64', '2', '3625', '0', '66.66', '0000-00-00 00:00:00', '0', '????? ?? ???? ????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('65', '2', '3560', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ???????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('66', '2', '3560', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('67', '2', '3565', '0', '0.00', '0000-00-00 00:00:00', '0', '??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('68', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', '?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('69', '2', '3650', '0', '100.00', '0000-00-00 00:00:00', '0', '???? ???????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('70', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', '???? ????? ???????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('71', '2', '3650', '0', '100.00', '0000-00-00 00:00:00', '0', '??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('72', '2', '3690', '0', '100.00', '0000-00-00 00:00:00', '0', '???????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('73', '2', '3665', '0', '100.00', '0000-00-00 00:00:00', '0', '???????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('74', '2', '3680', '0', '100.00', '0000-00-00 00:00:00', '0', '???????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('75', '2', '3690', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ??? ??????? ??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('76', '2', '3595', '0', '100.00', '0000-00-00 00:00:00', '0', '??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('77', '2', '3660', '0', '0.00', '0000-00-00 00:00:00', '0', '?????? ???\"?', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('78', '2', '3650', '0', '100.00', '0000-00-00 00:00:00', '0', '?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('79', '2', '3650', '0', '66.66', '0000-00-00 00:00:00', '0', '?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('80', '2', '3600', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ???????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('81', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('82', '2', '5090', '0', '100.00', '0000-00-00 00:00:00', '0', '????? PAYPAL', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('83', '2', '5010', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ???', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('84', '2', '5090', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ?????? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('85', '2', '3580', '0', '0.00', '0000-00-00 00:00:00', '0', '???', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('86', '2', '3620', '0', '100.00', '0000-00-00 00:00:00', '0', '?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('87', '2', '3520', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('88', '2', '3620', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('89', '2', '1340', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ???\"?', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('90', '2', '3565', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ???', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('91', '2', '3690', '0', '100.00', '0000-00-00 00:00:00', '0', '?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('92', '2', '3620', '0', '100.00', '0000-00-00 00:00:00', '0', '?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('93', '2', '3570', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('94', '2', '3570', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('95', '2', '3565', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ???', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('96', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', '??? ???? ???? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('97', '2', '3690', '0', '100.00', '0000-00-00 00:00:00', '0', '????????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('98', '2', '3595', '0', '100.00', '0000-00-00 00:00:00', '0', '?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('99', '2', '3550', '0', '100.00', '0000-00-00 00:00:00', '0', '???????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('100', '3', '1010', '0', '18.00', '2013-08-19 12:03:50', '0', '????? ?????? ????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('101', '3', '1020', '0', '16.00', '2013-08-19 12:03:57', '0', '????? ?????? ????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('102', '3', '1030', '0', '0.00', '2013-08-19 12:04:06', '0', '????? ?????? ???\"?', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('103', '3', '1040', '0', '0.00', '2013-08-19 12:04:11', '0', '????? ?????? ???\"?', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('107', '2', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('109', '2', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '?????? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('110', '1', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '?????? ??\"?', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('111', '2', '3565', '0', '66.66', '0000-00-00 00:00:00', '0', '???', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('112', '2', '3680', '0', '0.00', '0000-00-00 00:00:00', '0', '??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('113', '0', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '?????? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('114', '1', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('115', '8', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '???? ????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('116', '0', '1010', NULL, '0.00', NULL, NULL, '????? ????? ??\"?', '', '', '', '', '', '', '', '', '', '??? ????? 5', '?? ????', '52215', 'ILS', '', '0', NULL, '0000-00-00 00:00:00', '2014-07-08 17:03:55'),
 ('117', '7', '1010', NULL, '0.00', NULL, NULL, '??? ??', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', NULL, '0000-00-00 00:00:00', '2014-07-08 17:15:41');



--
-- Structure for table `9Lnx_bankName`
--

DROP TABLE IF EXISTS `9Lnx_bankName`;

CREATE TABLE `9Lnx_bankName` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;

--
-- Data for table `9Lnx_bankName`
--

INSERT INTO `9Lnx_bankName` (`id`, `name`) VALUES
 ('1', '??? ???? ?????'),
 ('4', '??? ??? ?????? ??????'),
 ('6', '??? ?????'),
 ('7', '??? ?????? ??????'),
 ('8', '??? ?????? ??????'),
 ('9', '??? ?????'),
 ('10', '??? ?????'),
 ('11', '??? ???????'),
 ('12', '??? ???????'),
 ('13', '??? ?????'),
 ('14', '??? ???? ?????'),
 ('17', '??? ??????? ???????'),
 ('19', '??? ??????? ??????'),
 ('20', '??? ????? ?????'),
 ('22', 'Citibank N.A'),
 ('23', 'HSBC'),
 ('25', 'BNP Paribas Israel'),
 ('26', '????? ??\"?'),
 ('31', '???? ????????? ?????? '),
 ('34', '??? ???? ??????'),
 ('39', 'SBI State Bank of India'),
 ('46', '??? ???'),
 ('48', '???? ????? ??????'),
 ('52', '??? ????? ????? ?????'),
 ('54', '??? ???????'),
 ('67', 'Arab Land Bank'),
 ('68', '??? ???? ?????? ??????'),
 ('77', '??? ????? ????????? ??\"?'),
 ('90', '??? ??????? ?????????'),
 ('99', '??? ?????');



--
-- Structure for table `9Lnx_bankbook`
--

DROP TABLE IF EXISTS `9Lnx_bankbook`;

CREATE TABLE `9Lnx_bankbook` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `account_id` int(11) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `details` varchar(60) DEFAULT NULL,
  `refnum` char(10) DEFAULT NULL,
  `sum` decimal(8,2) DEFAULT NULL,
  `total` decimal(8,2) DEFAULT NULL,
  `cor_num` varchar(30) DEFAULT NULL,
  `currency_id` varchar(3) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `9Lnx_blackList`
--

DROP TABLE IF EXISTS `9Lnx_blackList`;

CREATE TABLE `9Lnx_blackList` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `value` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `9Lnx_config`
--

DROP TABLE IF EXISTS `9Lnx_config`;

CREATE TABLE `9Lnx_config` (
  `id` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `eavType` varchar(255) NOT NULL,
  `hidden` tinyint(1) NOT NULL,
  `priority` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `9Lnx_config`
--

INSERT INTO `9Lnx_config` (`id`, `value`, `eavType`, `hidden`, `priority`) VALUES
 ('company.1.warehouse', '115', 'integer', '1', '40'),
 ('company.acc.assetvat', '3', 'integer', '1', '40'),
 ('company.acc.buyvat', '1', 'integer', '1', '40'),
 ('company.acc.custtax', '8', 'integer', '1', '40'),
 ('company.acc.irs', '16', 'integer', '1', '40'),
 ('company.acc.natinspay', '14', 'integer', '1', '40'),
 ('company.acc.openbalance', '9', 'integer', '1', '40'),
 ('company.acc.payvat', '4', 'integer', '1', '40'),
 ('company.acc.pretax', '13', 'integer', '1', '40'),
 ('company.acc.sellvat', '3', 'integer', '1', '40'),
 ('company.address', '??? ???? 19', 'string', '0', '40'),
 ('company.city', '?? ????', 'string', '0', '40'),
 ('company.cur', 'ILS', 'list(Currecies)', '0', '40'),
 ('company.doublebook', 'true', 'boolean', '0', '40'),
 ('company.en.address', '', 'string', '0', '40'),
 ('company.en.city', '', 'string', '0', '40'),
 ('company.en.name', '', 'string', '0', '40'),
 ('company.fax', '', 'string', '0', '40'),
 ('company.logo', '2', 'file', '0', '40'),
 ('company.mail.address', '', 'string', '0', '40'),
 ('company.mail.password', '', 'string', '0', '40'),
 ('company.mail.port', '', 'string', '0', '40'),
 ('company.mail.server', '', 'string', '0', '40'),
 ('company.mail.ssl', 'false', 'boolean', '0', '40'),
 ('company.mail.user', '', 'string', '0', '40'),
 ('company.name', '???? ???? ?????? ??\"?', 'string', '0', '1'),
 ('company.path', '9Lnx_', 'string', '1', '40'),
 ('company.pdfprint', 'true', 'boolean', '0', '40'),
 ('company.phone', '', 'string', '0', '40'),
 ('company.po', '', 'string', '0', '40'),
 ('company.seccur', 'AED', 'list(Currecies)', '0', '40'),
 ('company.stock', 'false', 'boolean', '0', '40'),
 ('company.tax.irs', '1', 'select({1:\"monthly\",2:\"bi-monthly\"})', '0', '40'),
 ('company.tax.rate', '10', 'integer', '0', '40'),
 ('company.tax.vat', '1', 'select({1:\"monthly\",2:\"bi-monthly\"})', '0', '40'),
 ('company.transaction', '12', 'integer', '1', '40'),
 ('company.vat.id', '069924496', 'integer', '0', '2'),
 ('company.website', '', 'string', '0', '40'),
 ('company.zip', '42234', 'string', '0', '40'),
 ('paypal.apiLive', 'false', 'boolean', '0', '40'),
 ('paypal.apiPassword', '', '', '0', '40'),
 ('paypal.apiSignature', '', '', '0', '40'),
 ('paypal.apiUsername', '', '', '0', '40'),
 ('server.checkTime', '20130324114336', '', '1', '40'),
 ('server.dbVersion', '3.0', '', '1', '40'),
 ('server.Latest', '', '', '1', '40'),
 ('server.Version', '3.0', '', '1', '40'),
 ('server.wkhtmltopdf', 'xvfb-run -a -s \"-screen 0 1024x768x16\" wkhtmltopdf', 'string', '0', '40'),
 ('system.auth', '179403', 'string', '1', '40'),
 ('system.name', 'Linet 3.0', 'string', '1', '40'),
 ('system.vendor.name', 'Speedcomp', 'string', '1', '40'),
 ('system.vendor.vatnum', '069924504', 'string', '1', '40'),
 ('system.version', '3.0', 'string', '1', '40'),
 ('transactionType.chequedeposit', '4', 'integer', '1', '40'),
 ('transactionType.manual', '0', 'integer', '1', '40'),
 ('transactionType.openBalance', '16', 'integer', '1', '40'),
 ('transactionType.supplierPayment', '5', 'integer', '1', '40');



--
-- Structure for table `9Lnx_curRates`
--

DROP TABLE IF EXISTS `9Lnx_curRates`;

CREATE TABLE `9Lnx_curRates` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `currency_id` varchar(3) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `value` decimal(10,5) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Data for table `9Lnx_curRates`
--

INSERT INTO `9Lnx_curRates` (`id`, `currency_id`, `date`, `value`) VALUES
 ('1', 'ILS', '1999-12-31 22:00:01', '1.00000');



--
-- Structure for table `9Lnx_docCheques`
--

DROP TABLE IF EXISTS `9Lnx_docCheques`;

CREATE TABLE `9Lnx_docCheques` (
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
-- Structure for table `9Lnx_docDetails`
--

DROP TABLE IF EXISTS `9Lnx_docDetails`;

CREATE TABLE `9Lnx_docDetails` (
  `doc_id` int(11) NOT NULL DEFAULT '0',
  `item_id` int(11) DEFAULT NULL,
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
  PRIMARY KEY (`doc_id`,
`line`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `9Lnx_docDetails`
--

INSERT INTO `9Lnx_docDetails` (`doc_id`, `item_id`, `name`, `description`, `qty`, `unit_price`, `unit_id`, `currency_id`, `price`, `invprice`, `vat`, `line`) VALUES
 ('1', '1', '???? ???? ???? ???', '', '1.00', '456.00', '0', 'ILS', '456.00', '456.00', '0.00', '1'),
 ('2', '1', '???? ???? ???? ???', '', '1.00', '456.00', '0', 'ILS', '456.00', '456.00', '82.08', '1');



--
-- Structure for table `9Lnx_docStatus`
--

DROP TABLE IF EXISTS `9Lnx_docStatus`;

CREATE TABLE `9Lnx_docStatus` (
  `num` int(11) NOT NULL,
  `doc_type` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `looked` tinyint(1) NOT NULL,
  `action` varchar(255) NOT NULL,
  PRIMARY KEY (`num`,
`doc_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `9Lnx_docStatus`
--

INSERT INTO `9Lnx_docStatus` (`num`, `doc_type`, `name`, `looked`, `action`) VALUES
 ('1', '1', '?????', '0', '0'),
 ('1', '2', '?????', '0', '0'),
 ('1', '3', '?????', '0', '0'),
 ('1', '4', '?????', '0', '0'),
 ('1', '5', '?????', '0', '0'),
 ('1', '6', '?????', '0', '0'),
 ('1', '7', '?????', '0', '0'),
 ('1', '8', '?????', '0', '0'),
 ('1', '9', '?????', '0', '0'),
 ('1', '10', '?????', '0', '0'),
 ('1', '11', '????', '1', '1'),
 ('1', '12', '????', '1', '1'),
 ('1', '13', '????', '1', '1'),
 ('1', '14', '????', '1', '1'),
 ('1', '15', '????', '1', '1'),
 ('2', '1', '????', '0', '1'),
 ('2', '2', '????', '1', '1'),
 ('2', '3', '????', '1', '1'),
 ('2', '4', '????', '1', '1'),
 ('2', '5', '????', '0', '1'),
 ('2', '6', '????', '0', '1'),
 ('2', '7', '????', '1', '1'),
 ('2', '8', '????', '1', '1'),
 ('2', '9', '????', '1', '1'),
 ('2', '10', '????', '0', '1'),
 ('3', '1', '????? ??????', '0', '1'),
 ('3', '2', '????? ??????', '0', '0'),
 ('3', '3', '????? ??????', '0', '0'),
 ('3', '4', '????? ??????', '1', '1'),
 ('3', '5', '????? ??????', '1', '1'),
 ('3', '6', '????? ??????', '1', '1'),
 ('3', '7', '????? ??????', '1', '1'),
 ('3', '8', '????? ??????', '1', '1'),
 ('3', '9', '????? ??????', '1', '1'),
 ('3', '10', '????? ??????', '1', '1'),
 ('4', '1', '?????', '1', '1'),
 ('4', '2', '?????', '1', '1'),
 ('4', '3', '?????', '1', '1'),
 ('4', '4', '?????', '1', '1'),
 ('4', '5', '?????', '1', '1'),
 ('4', '6', '?????', '1', '1'),
 ('4', '7', '?????', '1', '1'),
 ('4', '8', '?????', '1', '1'),
 ('4', '9', '?????', '1', '1'),
 ('4', '10', '?????', '1', '1');



--
-- Structure for table `9Lnx_docType`
--

DROP TABLE IF EXISTS `9Lnx_docType`;

CREATE TABLE `9Lnx_docType` (
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
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Data for table `9Lnx_docType`
--

INSERT INTO `9Lnx_docType` (`id`, `name`, `openformat`, `isdoc`, `isrecipet`, `iscontract`, `looked`, `stockAction`, `account_type`, `docStatus_id`, `last_docnum`, `oppt_account_type`, `transactionType_id`, `vat_acc_id`, `header`, `footer`, `stockSwitch`, `copy`) VALUES
 ('1', 'Proforma', '300', '1', '0', '0', '1', '-1', '0', '2', '1', NULL, NULL, '3', '', '', '0', '1'),
 ('2', 'Delivery doc.', '200', '1', '0', '0', '0', '-1', '0', '2', '3', NULL, NULL, '3', '', '', '0', '1'),
 ('3', 'Invoice', '305', '1', '0', '0', '1', '-1', '0', '2', '1', NULL, '1', '3', '', '', '1', '1'),
 ('4', 'Credit invoice', '330', '1', '0', '0', '0', '1', '0', '2', '1', NULL, '17', '3', '', '', '1', '1'),
 ('5', 'Return document', '210', '1', '0', '0', '0', '1', '0', '2', '1', NULL, '19', '3', '', '', '1', '1'),
 ('6', 'Quote', '0', '1', '0', '0', '0', '0', '0', '2', '1', NULL, NULL, '3', '', '', '0', '0'),
 ('7', 'Sales Order', '0', '1', '0', '0', '0', '0', '0', '2', '1', NULL, NULL, '3', '', '', '0', '0'),
 ('8', 'Receipt', '400', '0', '1', '0', '1', '0', '0', '2', '1', NULL, '3', '3', '', '', '0', '1'),
 ('9', 'Invoice Receipt', '320', '1', '1', '0', '1', '-1', '0', '2', '1', NULL, '18', '3', '', '', '1', '1'),
 ('10', 'Purchase Order', '500', '1', '0', '0', '0', '0', '1', '2', '1', NULL, NULL, '3', '', '', '0', '1'),
 ('11', 'Manual invoice', '0', '1', '0', '0', '1', '1', '1', '1', '1', NULL, '11', '3', '', '', '1', '1'),
 ('12', 'Manual receipt', '0', '1', '0', '0', '1', '1', '1', '1', '1', NULL, '12', '3', '', '', '0', '1'),
 ('13', 'Buisness outcome', '0', '1', '0', '0', '0', '1', '1', '1', '1', '2', '5', '1', '', '', '0', '0'),
 ('14', 'Asstes outcome', '0', '1', '0', '0', '0', '1', '1', '1', '1', '4', '5', '2', '', '', '0', '0'),
 ('15', 'Warehouse transaction', '830', '1', '0', '0', '0', '1', '8', '1', '1', '8', NULL, '0', '', '', '0', '1');



--
-- Structure for table `9Lnx_docs`
--

DROP TABLE IF EXISTS `9Lnx_docs`;

CREATE TABLE `9Lnx_docs` (
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
  `description` text NOT NULL,
  `oppt_account_id` int(11) DEFAULT NULL,
  `action` tinyint(1) NOT NULL,
  `refstatus` int(11) NOT NULL,
  `owner` int(11) DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Data for table `9Lnx_docs`
--

INSERT INTO `9Lnx_docs` (`id`, `doctype`, `docnum`, `account_id`, `company`, `address`, `city`, `zip`, `vatnum`, `refnum`, `issue_date`, `due_date`, `modified`, `discount`, `sub_total`, `novat_total`, `vat`, `total`, `currency_id`, `src_tax`, `status`, `printed`, `comments`, `description`, `oppt_account_id`, `action`, `refstatus`, `owner`) VALUES
 ('1', '2', '2', '116', '????? ????? ??\"?', '??? ????? 5', '?? ????', '52215', '', '', '2014-07-08 17:05:02', '2014-07-08 17:05:02', '2014-07-08 17:06:02', '0.00', '456.00', '456.00', '0.00', '456.00', 'ILS', NULL, '2', NULL, '', '', NULL, '1', '0', '1'),
 ('2', '2', '3', '116', '????? ????? ??\"?', '??? ????? 5', '?? ????', '52215', '', '', '2014-07-08 17:08:28', '2014-07-08 17:08:28', '2014-07-08 17:09:28', '0.00', '456.00', '456.00', '82.08', '538.08', 'ILS', NULL, '2', NULL, '', '', NULL, '1', '0', '1');



--
-- Structure for table `9Lnx_eavAttr`
--

DROP TABLE IF EXISTS `9Lnx_eavAttr`;

CREATE TABLE `9Lnx_eavAttr` (
  `entity` bigint(20) NOT NULL,
  `attribute` varchar(250) NOT NULL,
`value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `9Lnx_eavFields`
--

DROP TABLE IF EXISTS `9Lnx_eavFields`;

CREATE TABLE `9Lnx_eavFields` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `eavType` varchar(255) NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `9Lnx_extCorrelation`
--

DROP TABLE IF EXISTS `9Lnx_extCorrelation`;

CREATE TABLE `9Lnx_extCorrelation` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `in` text NOT NULL,
  `out` text NOT NULL,
  `owner` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `9Lnx_files`
--

DROP TABLE IF EXISTS `9Lnx_files`;

CREATE TABLE `9Lnx_files` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `public` tinyint(1) NOT NULL,
  `parent_id` int(255) DEFAULT NULL,
  `parent_type` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `expire` int(11) NOT NULL,
  `hash` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Data for table `9Lnx_files`
--

INSERT INTO `9Lnx_files` (`id`, `name`, `path`, `public`, `parent_id`, `parent_type`, `date`, `expire`, `hash`) VALUES
 ('1', 'company.logo.jpg', 'settings/', '0', '0', 'Settings', '2014-07-08 17:02:26', '0', ''),
 ('2', 'company.logo.JPG', 'settings/', '0', '0', 'Settings', '2014-07-08 17:02:45', '0', '');



--
-- Structure for table `9Lnx_intCorrelation`
--

DROP TABLE IF EXISTS `9Lnx_intCorrelation`;

CREATE TABLE `9Lnx_intCorrelation` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `in` text NOT NULL,
  `out` text NOT NULL,
  `owner` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `9Lnx_inventoryItem`
--

DROP TABLE IF EXISTS `9Lnx_inventoryItem`;

CREATE TABLE `9Lnx_inventoryItem` (
  `account_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `ammount` int(11) NOT NULL,
`idcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `9Lnx_itemCategories`
--

DROP TABLE IF EXISTS `9Lnx_itemCategories`;

CREATE TABLE `9Lnx_itemCategories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `profit` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `9Lnx_itemCategories`
--

INSERT INTO `9Lnx_itemCategories` (`id`, `name`, `profit`) VALUES
 ('1', '????', '1');



--
-- Structure for table `9Lnx_itemEav`
--

DROP TABLE IF EXISTS `9Lnx_itemEav`;

CREATE TABLE `9Lnx_itemEav` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `entity` int(11) NOT NULL,
  `attribute` int(11) NOT NULL,
  `value` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `9Lnx_itemTemplate`
--

DROP TABLE IF EXISTS `9Lnx_itemTemplate`;

CREATE TABLE `9Lnx_itemTemplate` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `Itemcatagory_id` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `9Lnx_itemTemplateItem`
--

DROP TABLE IF EXISTS `9Lnx_itemTemplateItem`;

CREATE TABLE `9Lnx_itemTemplateItem` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ItemTemplate_id` int(11) NOT NULL,
  `eavFields_id` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `9Lnx_itemUnits`
--

DROP TABLE IF EXISTS `9Lnx_itemUnits`;

CREATE TABLE `9Lnx_itemUnits` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `precision` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Data for table `9Lnx_itemUnits`
--

INSERT INTO `9Lnx_itemUnits` (`id`, `name`, `precision`) VALUES
 ('0', 'units', '0'),
 ('1', 'work hours', '0'),
 ('2', 'Meter', '0'),
 ('3', 'liter', '0'),
 ('4', 'gram', '0'),
 ('5', 'Kilo gram', '0');



--
-- Structure for table `9Lnx_itemVatCat`
--

DROP TABLE IF EXISTS `9Lnx_itemVatCat`;

CREATE TABLE `9Lnx_itemVatCat` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Data for table `9Lnx_itemVatCat`
--

INSERT INTO `9Lnx_itemVatCat` (`id`, `name`) VALUES
 ('1', '???? ???'),
 ('2', '???? ????'),
 ('12', '????? ?????');



--
-- Structure for table `9Lnx_items`
--

DROP TABLE IF EXISTS `9Lnx_items`;

CREATE TABLE `9Lnx_items` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
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
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Data for table `9Lnx_items`
--

INSERT INTO `9Lnx_items` (`id`, `name`, `itemVatCat_id`, `unit_id`, `extcatnum`, `manufacturer`, `saleprice`, `currency_id`, `ammount`, `owner`, `category_id`, `parent_item_id`, `isProduct`, `profit`, `purchaseprice`, `pic`, `description`, `stockType`, `modified`, `created`) VALUES
 ('1', '???? ???? ???? ???', '1', '0', NULL, NULL, '456.00', 'ILS', NULL, NULL, '1', '0', '0', '0', '0.00', '', '', '0', '2014-07-08 17:04:33', '2014-07-08 17:04:33');



--
-- Structure for table `9Lnx_language`
--

DROP TABLE IF EXISTS `9Lnx_language`;

CREATE TABLE `9Lnx_language` (
  `id` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `9Lnx_mailTemplate`
--

DROP TABLE IF EXISTS `9Lnx_mailTemplate`;

CREATE TABLE `9Lnx_mailTemplate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `subject` varchar(255) NOT NULL,
  `cc` varchar(255) NOT NULL,
  `bcc` varchar(255) NOT NULL,
  `entity_type` int(11) NOT NULL,
  `entity_id` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `9Lnx_paymentType`
--

DROP TABLE IF EXISTS `9Lnx_paymentType`;

CREATE TABLE `9Lnx_paymentType` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `value` varchar(80) NOT NULL,
  `oppt_account_id` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Data for table `9Lnx_paymentType`
--

INSERT INTO `9Lnx_paymentType` (`id`, `name`, `value`, `oppt_account_id`) VALUES
 ('1', 'Cash', '', '10'),
 ('2', 'Cheque', '', '7'),
 ('3', 'Credit card', '', '11'),
 ('4', 'Bank transfer', '', '0'),
 ('5', 'Manual Credit', '', '11');



--
-- Structure for table `9Lnx_stockAction`
--

DROP TABLE IF EXISTS `9Lnx_stockAction`;

CREATE TABLE `9Lnx_stockAction` (
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Data for table `9Lnx_stockAction`
--

INSERT INTO `9Lnx_stockAction` (`id`, `account_id`, `oppt_account_id`, `item_id`, `qty`, `serial`, `user_id`, `createDate`, `doc_id`) VALUES
 ('1', '115', '116', '1', '-1', '', '1', '2014-07-08 17:10:34', '1'),
 ('2', '115', '116', '1', '-1', '', '1', '2014-07-08 17:09:28', '2');



--
-- Structure for table `9Lnx_transactionType`
--

DROP TABLE IF EXISTS `9Lnx_transactionType`;

CREATE TABLE `9Lnx_transactionType` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Data for table `9Lnx_transactionType`
--

INSERT INTO `9Lnx_transactionType` (`id`, `name`) VALUES
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
-- Structure for table `9Lnx_transactions`
--

DROP TABLE IF EXISTS `9Lnx_transactions`;

CREATE TABLE `9Lnx_transactions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Data for table `9Lnx_transactions`
--

INSERT INTO `9Lnx_transactions` (`id`, `num`, `account_id`, `type`, `refnum1`, `refnum2`, `valuedate`, `date`, `details`, `currency_id`, `sum`, `leadsum`, `secsum`, `owner_id`, `linenum`) VALUES
 ('1', '1', '110', '5', '', '', '1970-01-01 02:01:00', '2014-07-08 17:12:49', '', 'ILS', '1000.00', '1000.00', '1000.00', '1', '1'),
 ('2', '1', '150', '5', '', '', '1970-01-01 02:01:00', '2014-07-08 17:12:49', '', 'ILS', '-1000.00', '-1000.00', '-1000.00', '1', '2'),
 ('3', '2', '114', '5', '', '', '1970-01-01 02:01:00', '2014-07-08 17:12:50', '', 'ILS', '1000.00', '1000.00', '1000.00', '1', '1'),
 ('4', '2', '150', '5', '', '', '1970-01-01 02:01:00', '2014-07-08 17:12:50', '', 'ILS', '-1000.00', '-1000.00', '-1000.00', '1', '2'),
 ('5', '3', '114', '5', '', '', '1970-01-01 02:01:00', '2014-07-08 17:12:58', '', 'ILS', '1000.00', '1000.00', '1000.00', '1', '1'),
 ('6', '3', '150', '5', '', '', '1970-01-01 02:01:00', '2014-07-08 17:12:58', '', 'ILS', '-1000.00', '-1000.00', '-1000.00', '1', '2'),
 ('7', '4', '114', '5', '', '', '1970-01-01 02:01:00', '2014-07-08 17:12:59', '', 'ILS', '1000.00', '1000.00', '1000.00', '1', '1'),
 ('8', '4', '150', '5', '', '', '1970-01-01 02:01:00', '2014-07-08 17:12:59', '', 'ILS', '-1000.00', '-1000.00', '-1000.00', '1', '2'),
 ('9', '5', '114', '5', '', '', '1970-01-01 02:01:00', '2014-07-08 17:16:03', '', 'ILS', '1500.00', '1500.00', '1500.00', '1', '1'),
 ('10', '5', '117', '5', '', '', '1970-01-01 02:01:00', '2014-07-08 17:16:03', '', 'ILS', '-1500.00', '-1500.00', '-1500.00', '1', '2'),
 ('11', '6', '114', '5', '', '', '1970-01-01 02:01:00', '2014-07-08 17:17:48', '', 'ILS', '2000.00', '2000.00', '2000.00', '1', '1'),
 ('12', '6', '117', '5', '', '', '1970-01-01 02:01:00', '2014-07-08 17:17:48', '', 'ILS', '-2000.00', '-2000.00', '-2000.00', '1', '2'),
 ('13', '7', '114', '5', '1,2,', '', '1970-01-01 02:01:00', '2014-07-08 17:19:05', '????? ????', 'ILS', '2500.00', '2500.00', '2500.00', '1', '1'),
 ('14', '7', '117', '5', '1,2,', '', '1970-01-01 02:01:00', '2014-07-08 17:19:05', '????? ????', 'ILS', '-2500.00', '-2500.00', '-2500.00', '1', '2'),
 ('15', '8', '1', '0', '', '123', '2014-07-08 17:39:13', '2014-07-08 17:39:13', '????? ???????', 'ILS', '500.00', '500.00', '500.00', '1', '1'),
 ('16', '8', '113', '0', '', '123', '2014-07-08 17:39:14', '2014-07-08 17:39:14', '????? ???????', 'ILS', '-250.00', '-250.00', '-250.00', '1', '2'),
 ('17', '8', '115', '0', '', '123', '2014-07-08 17:39:14', '2014-07-08 17:39:14', '????? ???????', 'ILS', '-250.00', '-250.00', '-250.00', '1', '3'),
 ('18', '9', '1', '0', '', '', '2014-07-08 17:40:08', '2014-07-08 17:40:08', '????? ???????', 'ILS', '250.00', '250.00', '250.00', '1', '1'),
 ('19', '9', '0', '0', '', '', '2014-07-08 17:40:08', '2014-07-08 17:40:08', '????? ???????', 'ILS', '-250.00', '-250.00', '-250.00', '1', '2'),
 ('20', '10', '4', '0', '', '321', '2014-07-08 17:43:29', '2014-07-08 17:43:29', '????? ???????', 'ILS', '5.00', '5.00', '5.00', '1', '1'),
 ('21', '10', '3', '0', '', '321', '2014-07-08 17:43:29', '2014-07-08 17:43:29', '????? ???????', 'ILS', '-3.00', '-3.00', '-3.00', '1', '2'),
 ('22', '10', '1', '0', '', '321', '2014-07-08 17:43:29', '2014-07-08 17:43:29', '????? ???????', 'ILS', '-2.00', '-2.00', '-2.00', '1', '3'),
 ('23', '11', '4', '0', '2,', '321', '2014-07-08 17:43:52', '2014-07-08 17:43:52', '????? ???????', 'ILS', '5.00', '5.00', '5.00', '1', '1'),
 ('24', '11', '3', '0', '2,', '321', '2014-07-08 17:43:52', '2014-07-08 17:43:52', '????? ???????', 'ILS', '-3.00', '-3.00', '-3.00', '1', '2'),
 ('25', '11', '1', '0', '2,', '321', '2014-07-08 17:43:52', '2014-07-08 17:43:52', '????? ???????', 'ILS', '-2.00', '-2.00', '-2.00', '1', '3');



--
-- Structure for table `9Lnx_userIncomeMap`
--

DROP TABLE IF EXISTS `9Lnx_userIncomeMap`;

CREATE TABLE `9Lnx_userIncomeMap` (
  `user_id` int(11) NOT NULL,
  `itemVatCat_id` int(11) NOT NULL,
`account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `9Lnx_userIncomeMap`
--

INSERT INTO `9Lnx_userIncomeMap` (`user_id`, `itemVatCat_id`, `account_id`) VALUES
 ('1', '1', '100'),
 ('1', '2', '100'),
 ('1', '12', '100');



--
-- Structure for table `AuthAssignment`
--

DROP TABLE IF EXISTS `AuthAssignment`;

CREATE TABLE `AuthAssignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,
`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `AuthAssignment`
--

INSERT INTO `AuthAssignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
 ('Admin', '1', NULL, 'N;'),
 ('Admin', '11', NULL, 'N;'),
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
 ('Admin', '2', NULL, NULL, 'N;'),
 ('Authenticated', '2', 'Authenticated user', NULL, 'N;'),
 ('Company.*', '1', NULL, NULL, 'N;'),
 ('Editor', '2', 'Editor', NULL, 'N;'),
 ('Guest', '2', 'Guest user', NULL, 'N;'),
 ('Site.Contact', '0', NULL, NULL, 'N;'),
 ('Site.Error', '0', NULL, NULL, 'N;'),
 ('Site.Index', '0', NULL, NULL, 'N;'),
 ('Site.Login', '0', NULL, NULL, 'N;'),
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
-- Data for table `AuthItemChild`
--

INSERT INTO `AuthItemChild` (`parent`, `child`) VALUES
 ('Company.*', '11');



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
 ('Admin', '1', '0'),
 ('Guest', '3', '2'),
 ('User', '2', '1');



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
 ('BL', 'Saint Barth�lemy'),
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
 ('RE', 'Reunion  R�union'),
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
-- Structure for table `bug`
--

DROP TABLE IF EXISTS `bug`;

CREATE TABLE `bug` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `body` varchar(255) NOT NULL DEFAULT '',
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Data for table `bug`
--

INSERT INTO `bug` (`id`, `url`, `title`, `body`) VALUES
 ('1', 'https://github.com/adam2314/tmp/issues/23', 'ee', 'grg'),
 ('2', 'https://github.com/adam2314/tmp/issues/1', 'wwwari', 'aaaari'),
 ('3', 'https://github.com/adam2314/tmp/issues/3', '??????', '???? ????');



--
-- Structure for table `creditErrorCode`
--

DROP TABLE IF EXISTS `creditErrorCode`;

CREATE TABLE `creditErrorCode` (
  `id` varchar(3) NOT NULL DEFAULT '0',
  `text` varchar(255) DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Data for table `creditErrorCode`
--

INSERT INTO `creditErrorCode` (`id`, `text`) VALUES
 ('155', '???? ???????? ?????? ????? ????? ??? ????.'),
 ('154', '????? ?? ???? ???? ?????? ???? ????? ??\"? ????? ?????? (VECTOR21 ?? ??????).'),
 ('152', '??? ?????? ?? ????.'),
 ('151', '????? ?? ????? ??????? ??\"?.'),
 ('150', '????? ?? ????? ??????? ???? ?????.'),
 ('149', '????? ?? ???? ???? ?????? ???????? ??\"? ????? 31 ?? ?????????.'),
 ('148', '????? ?? ???? ???? ?????? ???????? ?????? ???? ??\"? ????? 31 ?? ?????????.'),
 ('146', '?????? ???? ????? ???? ???? ?????? ????.'),
 ('147', '????? ?? ???? ???? ?????? ???????? ??\"? ????? 31 ?? ?????????.'),
 ('145', '??? ???? ?? ??? ??\"? ????? ?????? (VECTOR13 ?? ????).'),
 ('144', '??? ???? ?? ??? ??\"? ????? ?????? (VECTOR12 ?? ????).'),
 ('143', '?????? ?????? (2 ?????) ?? ???? ??\"? ????? ?????? (VECTOR7 ?? ???????).'),
 ('142', '??? ???? ?? ??? ??\"? ????? ?????? (VECTOR6 ?? ???????).'),
 ('141', '????? ??????? ?? ???? ??\"? ????? ?????? (VECTOR5 ?? ???????).'),
 ('140', '?????? ???? ??????? ?? ????? ???? ?????? ?????? ????????.'),
 ('139', '???? ??????? ???? ???? ?? ?? ????? ??????? ????? ?? ???????.'),
 ('138', '????? ?? ???? ???? ?????? ???????? ?? ?? ????? ??????? ????? ?? ???????.'),
 ('137', '?????? ?????? (7 ?????) ?? ???? ??\"? ????? ?????? (VECTOR21 ?? ??????).'),
 ('136', '?????? ???? ?????? ??????? ??? ???? ????? ???? ?????? ??\"? ????? ?????? (VECTOR20 ?? ????).'),
 ('135', '????? ?? ???? ???? ?????? ??????? ??\"? ????? ?????? (VECTOR1 ?? ???????).'),
 ('134', '????? ?? ???? ??\"????? ?????? (VECTOR1 ?? ???????) - ?? ?????? ?????? - ????.'),
 ('133', '????? ?? ??? ?? ?? ????? ??????? ????? ?? ???????.'),
 ('132', '????? ?? ???? ???? ?????? ??????? (?????? ?? ????????).'),
 ('131', '????? ?? ???? ???? ???? ??????/??????/??????.'),
 ('130', '????? ?? ???? ???? ???? ??????.'),
 ('129', '????? ??? ????? ???? ???? ???? ??? ????.'),
 ('128', '????? ??? ????? ???? ?????? ???? ??? ??????? ?-3.'),
 ('127', '????? ??? ????? ????? ???? ????? ??? ??????? ???? ?????.'),
 ('126', '????? ??? ????? ???? ?????? ??.'),
 ('125', '????? ??? ????? ?????? ????? ???????? ??????? ????.'),
 ('124', '????? ??? ????? ?????? ????? ???????? ??????? ???????.'),
 ('123', '????? ??? ????? ????? ??????/??????/?????? ???? ????? ??.'),
 ('122', '????? ??? ????? ?????? ???? ??????? ??\"?.'),
 ('121', '????? ??? ????? ?????? ????.'),
 ('120', '????? ??? ????? ?????? ?????.'),
 ('119', '????? ??? ????? ?????? ???? ?????.'),
 ('118', '????? ??? ????? ?????? ?????????.'),
 ('117', '????? ??? ????? ????? ??????/??????/??????.'),
 ('116', '????? ??? ????? ????? ??????.'),
 ('115', '????? ??? ????? ????? ???????.'),
 ('114', '????? ??? ????? ????? \"????? ????\".'),
 ('113', '????? ??? ????? ????? ???????.'),
 ('112', '????? ??? ????? ????? ?????/????? ???? ????????.'),
 ('111', '????? ??? ????? ????? ????????.'),
 ('110', '????? ??? ????? ?????? ???? ?????.'),
 ('109', '????? ??? ????? ?????? ?? ??? ????? 587.'),
 ('108', '????? ??? ????? ???? ?????? ???????.'),
 ('107', '???? ????? ???? ??? - ??? ????? ???????.'),
 ('106', '????? ??? ????? ?????? ?????? ?????? ???? ?????.'),
 ('101', '??? ????? ????? ????? ??????.'),
 ('099', '?? ????? ?????/?????/????? ???? TRAN.'),
 ('080', '????? \"??? ??????\" ???? ????? ?? ?????.'),
 ('077', '???? ???? ???? ????.'),
 ('076', '????? - ?????? ??? ?????? ???\"? ???? ??????? ??????.'),
 ('074', '????? - ????? ????.'),
 ('075', '????? - ????? ?? ??\"? ?? ??????? ???? ?????.'),
 ('073', '?????? ???? ??? ??? ??????? ??? ???\"?.'),
 ('071', '???? ?????? ???? ????.'),
 ('072', '??\"? ?? ???? - ???? ????? ?????.'),
 ('070', '?? ????? ????? ????? ???? ????.'),
 ('069', '???? ??? ?????? ??? ????.'),
 ('068', '?? ???? ?????? ????? ?? ???? ???? ????? ???? ????????.'),
 ('067', '???? ???? ??????? ???? ????? ????? ???? ??.'),
 ('065', '???? ?? ????.'),
 ('066', '???? ????? ????? ?/?? ????? ???? ???? ????? ???? ????????.'),
 ('063', '??? ???? ?? ????.'),
 ('064', '??? ????? ?? ????.'),
 ('061', '???? ????? ?? ???? ?? ???? ??????.'),
 ('062', '??? ???? ?? ????.'),
 ('060', '???? ABS ?? ???? ?????? ????? ??? ???????.'),
 ('058', '?? ????? CVV2.'),
 ('059', '?? ?????? ???? ????? ????? ??-CVV2.'),
 ('057', '?? ????? ???? ????? ????.'),
 ('052', '?? ???? ?? ?????.'),
 ('053', '???? ?? ????? ????? ???. (????? ????? ??? ?? ??? ???? ?? ?????).'),
 ('051', '???? ??? ?? ????.'),
 ('047', '?? ???? ????? ??? ???? ?????? ???\"? ?? ???? ???? ???? ????? ?? ???? ??????.'),
 ('046', '?? ???? ?????, ?? ???? ???? ???? ????? ?? ???? ?????? (J1,J2,J3).'),
 ('045', '???? ?? ???? ???? ????? ???????, ?? ???? ???? ???? (J6).'),
 ('044', '???? ?? ???? ???? ????? ??? ????, ?? ???? ???? ???? (J5).'),
 ('043', '??????, ?? ???? ???? ???? ????? ?? ???? ?????? (J1,J2,J3).'),
 ('042', '???? ????, ?? ???? ???? ???? ????? ?? ???? ?????? (J1,J2,J3).'),
 ('041', '??? ????, ?? ???? ???? ????? ?? ???? ?????? (J1,J2,J3).'),
 ('040', '???? ?????? ??? ???? ????? ??\' ???.'),
 ('038', '?? ???? ???? ???? ??? ???? ?????? ????? ???? ?????.'),
 ('039', '????? ?????? ?? ?????.'),
 ('036', '?? ????'),
 ('037', '????? ???????? - ???? ???? ???? ????? ???? ????? ????? + (????? ???? ???? ?? ???????)'),
 ('035', '????? ?? ???? ???? ???? ?? ??? ????? ??.'),
 ('034', '????? ?? ???? ???? ????? ?? ?? ??? ????? ????? ????.'),
 ('033', '????? ?? ????.'),
 ('032', '???? ?????? ??? ??? - ??? ?????? ?? ??? ????? ???? ?? ???? .'),
 ('031', '???? ?????? ??? ??? ?????? ?? ???\' ????.'),
 ('030', '???? ????? ?????? ??? ???/?? ???? ?????? ??\' ???/??\' ????.'),
 ('029', '???? ???? ?? ????? ????? ?????? ?????? ??? ????.'),
 ('028', '???? ???? ????? ?? ????? ????? ?????? ?????? ??? ???.'),
 ('027', '???? ?? ????? ?? ????? ???? ???? ???? ????? ??????? ?? ????? ????? ????.'),
 ('026', '???? ????? ?????? ?????? ???? ??? - ??? ????? ?? ???? ?????? ???? ?? ????.'),
 ('025', '???? ????? ?????? ?????? ???? ??? - ??? ????? ?? ???? ?????? ???? ?? ????.'),
 ('024', '???? ????? (START) ?? ????.'),
 ('023', '???? ??????? (DATA) ?? ????.'),
 ('022', '??? ????? ???????? ?? ???????? ?? ????.'),
 ('020', '???? ??? (INT_IN) ?? ????.'),
 ('021', '???? ?????? (NEG) ?? ???? ?? ?? ?????? - ??? ????? ?? ???? ?????? ???? ?? ????.'),
 ('019', '????? ????? INT_IN ???? ?-16 ?????.'),
 ('017', '?? ?????? 4 ?????? ????????.'),
 ('015', '??? ????? ??? ????? ?????? ??? ??????.'),
 ('010', '?????? ?????? ??\"? ????? ?????? (ESC) ?? COMPORT ?? ???? ?????? (WINDOWS).'),
 ('009', '?? ????? ??????, ????? ????? ??????.'),
 ('008', '???? ?????? ???? ???? ????? ??????.'),
 ('007', '???? ?????? ????? ??????.'),
 ('004', '?????.'),
 ('005', '????? ???? ?????.'),
 ('006', '?.? ?? CVV ??????.'),
 ('000', '???? ?????.'),
 ('001', '???? ???? ?????.'),
 ('002', '???? ???? ?????.'),
 ('003', '????? ????? ??????.'),
 ('153', '????? ?? ???? ???? ?????? ????? ???? (???? +30/) ??\"? ????? ?????? (VECTOR21 ?? ??????).'),
 ('156', '???? ??????? ????? ????? ?? ????.'),
 ('157', '???? 0 ???? ????? ?? ????? ?? ????? ???? ?? ?????.'),
 ('158', '???? 0 ???? ????? ?? ????? ?? ????? ???? ?????.'),
 ('159', '???? 0 ???? ????? ?? ????? ???? ????? ???????.'),
 ('160', '???? 0 ???? ????? ?? ????? ???????.'),
 ('161', '???? 0 ???? ????? ?? ????? ????.'),
 ('162', '???? 0 ???? ????? ?? ????? ???????.'),
 ('163', '????? ?????? ?????? ??? ????? ???\"? ?? ???? ???? ?????? ????????.'),
 ('164', '?????? ????? JCB ???? ???? ?????? ?? ?????? ????.'),
 ('165', '???? ???????/??????/?????? ???? ????? ?????.'),
 ('166', '????? ?????? ?? ????? ?? ?????.'),
 ('167', '?? ???? ???? ???? ??????/??????/?????? ???????.'),
 ('168', '????? ??? ????? ????? ?????? ?? ??? ????? ??.'),
 ('169', '?? ???? ???? ???? ???? ?? ????? ???? ??????.'),
 ('170', '???? ???? ???????/??????/?????? ???? ??????.'),
 ('171', '?? ???? ???? ???? ?????? ??????/????? ???? ?????.'),
 ('172', '?? ???? ???? ???? ????? (???? ???? ?? ???? ????? ???? ???).'),
 ('173', '???? ?????.'),
 ('174', '????? ??? ????? ?????? ???? ?????? ??.'),
 ('175', '????? ??? ????? ?????? ????? ?????? ??.'),
 ('176', '????? ???? ??? ??\"? ????? ?????? (????? 1 ?? ???????).'),
 ('177', '?????? ??? ?? ???? ???? \"???? ????\" ??? \"???? ???? ?????? ???\".'),
 ('178', '???? ???? ???? ???? ???????/??????/??????.'),
 ('179', '???? ???? ???? ???? ????? ?????? ????.'),
 ('180', '?????? ?????? ?? ???? ???? ???? ???????.'),
 ('200', '???? ???? ??? ??? � ??? ?????? ????????.'),
 ('250', '????? ???? (?? ?????, ?????, ???? ???? ?? ??????).'),
 ('256', '???? ???? (TransactionNumber) - ???? ?????? ???? ????? ???? (TransactionDate).'),
 ('257', '?? ???? ???? ????'),
 ('259', '???? ??\"? - ??? ???? ???? ??????'),
 ('260', '??? ?? ???? ???????? ???????? ???????? ?? ???? (??\"? ????? ?? ??????? ???? ????? ?????(.'),
 ('280', '??\"? time-out, ??\"?? ??? ???? ???? ????? ??????. ????? ????? ????? ?? ????? ???\"?.');



--
-- Structure for table `currencies`
--

DROP TABLE IF EXISTS `currencies`;

CREATE TABLE `currencies` (
  `id` varchar(3) NOT NULL DEFAULT '',
  `code` varchar(3) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `symbol` varchar(17) DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `currencies`
--

INSERT INTO `currencies` (`id`, `code`, `name`, `symbol`) VALUES
 ('AED', '784', 'United Arab Emirates dirham', '?.?'),
 ('AFN', '971', 'Afghani', '?'),
 ('ALL', '008', 'Lek', 'L'),
 ('AMD', '051', 'Armenian dram', '??.'),
 ('ANG', '532', 'Netherlands Antillean guilder', '�'),
 ('AOA', '973', 'Kwanza', 'Kz'),
 ('ARS', '032', 'Argentine peso', '$'),
 ('AUD', '036', 'Australian dollar', '$'),
 ('AWG', '533', 'Aruban guilder', '�'),
 ('AZN', '944', 'Azerbaijanian manat', NULL),
 ('BAM', '977', 'Convertible marks', 'KM'),
 ('BBD', '052', 'Barbados dollar', '$'),
 ('BDT', '050', 'Bangladeshi taka', '?'),
 ('BGN', '975', 'Bulgarian lev', '??'),
 ('BHD', '048', 'Bahraini dinar', '?.?'),
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
 ('CHE', '947', 'WIR euro (complementary currency)', '�'),
 ('CHF', '756', 'Swiss franc', 'Fr'),
 ('CHW', '948', 'WIR franc (complementary currency)', 'Fr'),
 ('CLF', '990', 'Unidad de Fomento (funds code)', NULL),
 ('CLP', '152', 'Chilean peso', '$'),
 ('CNY', '156', 'Renminbi', '�'),
 ('COP', '170', 'Colombian peso', '$'),
 ('COU', '970', 'Unidad de Valor Real', NULL),
 ('CRC', '188', 'Costa Rican colon', '?'),
 ('CUP', '192', 'Cuban peso', '$'),
 ('CVE', '132', 'Cape Verde escudo', NULL),
 ('CZK', '203', 'Czech koruna', 'K?'),
 ('DJF', '262', 'Djibouti franc', 'Fr'),
 ('DKK', '208', 'Danish krone', 'kr'),
 ('DOP', '214', 'Dominican peso', '$'),
 ('DZD', '012', 'Algerian dinar', '?.?'),
 ('EEK', '233', 'Kroon', 'KR'),
 ('EGP', '818', 'Egyptian pound', '?.?'),
 ('ERN', '232', 'Nakfa', 'Nfk'),
 ('ETB', '230', 'Ethiopian birr', NULL),
 ('EUR', '978', 'Euro', '�'),
 ('FJD', '242', 'Fiji dollar', '$'),
 ('FKP', '238', 'Falkland Islands pound', '�'),
 ('GBP', '826', 'Pound sterling', '�'),
 ('GEL', '981', 'Lari', '?'),
 ('GHS', '936', 'Cedi', NULL),
 ('GIP', '292', 'Gibraltar pound', '�'),
 ('GMD', '270', 'Dalasi', 'D'),
 ('GNF', '324', 'Guinea franc', 'Fr'),
 ('GTQ', '320', 'Quetzal', 'Q'),
 ('GYD', '328', 'Guyana dollar', '$'),
 ('HKD', '344', 'Hong Kong dollar', '$'),
 ('HNL', '340', 'Lempira', 'L'),
 ('HRK', '191', 'Croatian kuna', 'kn'),
 ('HTG', '332', 'Haiti gourde', 'G'),
 ('HUF', '348', 'Forint', 'Ft'),
 ('IDR', '360', 'Rupiah', '?'),
 ('ILS', '376', 'Israeli new sheqel', '?'),
 ('INR', '356', 'Indian rupee', '?'),
 ('IQD', '368', 'Iraqi dinar', '?.?'),
 ('IRR', '364', 'Iranian rial', '?'),
 ('ISK', '352', 'Iceland krona', 'kr'),
 ('JMD', '388', 'Jamaican dollar', '$'),
 ('JOD', '400', 'Jordanian dinar', '?.?'),
 ('JPY', '392', 'Japanese yen', '�'),
 ('KES', '404', 'Kenyan shilling', 'Sh'),
 ('KGS', '417', 'Som', NULL),
 ('KHR', '116', 'Riel', '?'),
 ('KMF', '174', 'Comoro franc', 'Fr'),
 ('KPW', '408', 'North Korean won', '?'),
 ('KRW', '410', 'South Korean won', '?'),
 ('KWD', '414', 'Kuwaiti dinar', '?.?'),
 ('KYD', '136', 'Cayman Islands dollar', '$'),
 ('KZT', '398', 'Tenge', '?'),
 ('LAK', '418', 'Kip', '?'),
 ('LBP', '422', 'Lebanese pound', '?.?'),
 ('LKR', '144', 'Sri Lanka rupee', '??'),
 ('LRD', '430', 'Liberian dollar', '$'),
 ('LSL', '426', 'Loti', 'L'),
 ('LTL', '440', 'Lithuanian litas', 'Lt'),
 ('LVL', '428', 'Latvian lats', 'Ls'),
 ('LYD', '434', 'Libyan dinar', '?.?'),
 ('MAD', '504', 'Moroccan dirham', '?.?.'),
 ('MDL', '498', 'Moldovan leu', 'L'),
 ('MGA', '969', 'Malagasy ariary', NULL),
 ('MKD', '807', 'Denar', '???'),
 ('MMK', '104', 'Kyat', 'K'),
 ('MNT', '496', 'Tugrik', '?'),
 ('MOP', '446', 'Pataca', 'P'),
 ('MRO', '478', 'Ouguiya', 'UM'),
 ('MUR', '480', 'Mauritius rupee', '?'),
 ('MVR', '462', 'Rufiyaa', '?'),
 ('MWK', '454', 'Kwacha', 'MK'),
 ('MXN', '484', 'Mexican peso', '$'),
 ('MXV', '979', 'Mexican Unidad de Inversion (UDI) (funds code)', NULL),
 ('MYR', '458', 'Malaysian ringgit', 'RM'),
 ('MZN', '943', 'Metical', 'MTn'),
 ('NAD', '516', 'Namibian dollar', '$'),
 ('NGN', '566', 'Naira', '?'),
 ('NIO', '558', 'Cordoba oro', 'C$'),
 ('NOK', '578', 'Norwegian krone', 'kr'),
 ('NPR', '524', 'Nepalese rupee', '?'),
 ('NZD', '554', 'New Zealand dollar', '$'),
 ('OMR', '512', 'Rial Omani', '?.?.'),
 ('PAB', '590', 'Balboa', 'B/.'),
 ('PEN', '604', 'Nuevo sol', 'S/.'),
 ('PGK', '598', 'Kina', 'K'),
 ('PHP', '608', 'Philippine peso', '?'),
 ('PKR', '586', 'Pakistan rupee', '?'),
 ('PLN', '985', 'Zloty', 'z?'),
 ('PYG', '600', 'Guarani', '?'),
 ('QAR', '634', 'Qatari rial', '?.?'),
 ('RON', '946', 'Romanian new leu', 'L'),
 ('RSD', '941', 'Serbian dinar', 'din. ?? ???.'),
 ('RUB', '643', 'Russian rouble', '?.'),
 ('RWF', '646', 'Rwanda franc', 'Fr'),
 ('SAR', '682', 'Saudi riyal', '?.?'),
 ('SBD', '090', 'Solomon Islands dollar', '$'),
 ('SCR', '690', 'Seychelles rupee', '?'),
 ('SDG', '938', 'Sudanese pound', NULL),
 ('SEK', '752', 'Swedish krona', 'kr'),
 ('SGD', '702', 'Singapore dollar', '$'),
 ('SHP', '654', 'Saint Helena pound', '�'),
 ('SKK', '703', 'Slovak koruna', 'Sk'),
 ('SLL', '694', 'Leone', 'Le'),
 ('SOS', '706', 'Somali shilling', 'Sh'),
 ('SRD', '968', 'Surinam dollar', '$'),
 ('STD', '678', 'Dobra', 'Db'),
 ('SYP', '760', 'Syrian pound', '?.?'),
 ('SZL', '748', 'Lilangeni', 'L'),
 ('THB', '764', 'Baht', '?'),
 ('TJS', '972', 'Somoni', '??'),
 ('TMM', '795', 'Manat', 'm'),
 ('TND', '788', 'Tunisian dinar', '?.?'),
 ('TOP', '776', 'Pa\'anga', 'T$'),
 ('TRY', '949', 'New Turkish lira', '?'),
 ('TTD', '780', 'Trinidad and Tobago dollar', '$'),
 ('TWD', '901', 'New Taiwan dollar', '$'),
 ('TZS', '834', 'Tanzanian shilling', 'Sh'),
 ('UAH', '980', 'Hryvnia', '?'),
 ('UGX', '800', 'Uganda shilling', 'Sh'),
 ('USD', '840', 'US dollar', '$'),
 ('USN', '997', 'United States dollar (next day) (funds code)', NULL),
 ('UYU', '858', 'Peso Uruguayo', '$'),
 ('UZS', '860', 'Uzbekistan som', NULL),
 ('VEF', '937', 'Venezuelan bol?var fuerte', 'Bs'),
 ('VND', '704', 'Vietnamese d?ng', '?'),
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
 ('YER', '886', 'Yemeni rial', '?'),
 ('ZAR', '710', 'South African rand', 'R'),
 ('ZMK', '894', 'Kwacha', 'ZK'),
 ('ZWD', '716', 'Zimbabwe dollar', '$');



--
-- Structure for table `databases`
--

DROP TABLE IF EXISTS `databases`;

CREATE TABLE `databases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `string` varchar(255) NOT NULL,
  `prefix` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=utf8;

--
-- Data for table `databases`
--

INSERT INTO `databases` (`id`, `string`, `prefix`, `user`, `password`) VALUES
 ('1', 'mysql:host=localhost;dbname=linetmain', 'qwe_', 'root', 'VBy7t6r5'),
 ('147', 'mysql:host=localhost;dbname=linetmain', '9Lnx_', 'root', 'VBy7t6r5'),
 ('149', 'mysql:host=localhost;dbname=linetmain', 'xG2N_', 'root', 'VBy7t6r5'),
 ('150', 'mysql:host=localhost;dbname=linetmain', 'uTwq_', 'root', 'VBy7t6r5');



--
-- Structure for table `databasesPerm`
--

DROP TABLE IF EXISTS `databasesPerm`;

CREATE TABLE `databasesPerm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `database_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=160 DEFAULT CHARSET=utf8;

--
-- Data for table `databasesPerm`
--

INSERT INTO `databasesPerm` (`id`, `user_id`, `database_id`, `level_id`) VALUES
 ('1', '1', '1', '1'),
 ('2', '1', '147', '1'),
 ('3', '1', '149', '1'),
 ('157', '11', '1', '1'),
 ('158', '11', '149', '2'),
 ('159', '1', '150', '1');



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
 ('he_il', '?????');



--
-- Structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `parent` int(12) NOT NULL DEFAULT '0',
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;

--
-- Data for table `menu`
--

INSERT INTO `menu` (`id`, `label`, `url`, `icon`, `parent`) VALUES
 ('1', 'Settings', NULL, 'glyphicon glyphicon-cog', '0'),
 ('2', 'Bussines details', 'settings/admin', NULL, '1'),
 ('3', 'Manual Journal Voucher', 'transaction/create', NULL, '1'),
 ('4', 'Business docs', 'doctype/admin', NULL, '1'),
 ('5', 'Costum Fields', 'eavFields/admin', NULL, '1'),
 ('6', 'Currency rates', 'currates/admin', NULL, '1'),
 ('7', 'Openning balances', 'transaction/openbalance', NULL, '1'),
 ('8', 'Contact Item', 'rm/admin', NULL, '12'),
 ('9', 'Tax Catagory For Items', 'ItemVatCat/admin', NULL, '1'),
 ('10', 'Manage Users', 'users/admin', NULL, '1'),
 ('11', 'Manage Groups', 'rights/authItem/roles', NULL, '1'),
 ('12', 'Accounts', '', 'glyphicon glyphicon-folder-open', '0'),
 ('13', 'Accounts', 'accounts/index', NULL, '12'),
 ('14', 'Account Template', 'accTemplate/admin', NULL, '12'),
 ('16', 'Stock', '', 'glyphicon glyphicon-tag', '0'),
 ('17', 'Items', 'item/admin', NULL, '16'),
 ('18', 'Werehouses', 'accounts/index/8', 'type=>8', '16'),
 ('19', 'Categories', 'itemcategory/admin', NULL, '16'),
 ('20', 'Units', 'itemunit/admin', NULL, '16'),
 ('21', 'Item Template', 'itemTemplate/admin', NULL, '16'),
 ('22', 'Income', '', 'glyphicon glyphicon-thumbs-up', '0'),
 ('23', 'Quote', 'docs/create/6', 'type=>6', '22'),
 ('24', 'Sales Order', 'docs/create/7', 'type=>7', '22'),
 ('25', 'Delivery doc.', 'docs/create/2', 'type=>2', '22'),
 ('26', 'Proforma', 'docs/create/1', 'type=>1', '22'),
 ('27', 'Invoice', 'docs/create/3', 'type=>3', '22'),
 ('28', 'Invoice receipt', 'docs/create/9', 'type=>9', '22'),
 ('29', 'Return doc.', 'docs/create/5', 'type=>5', '22'),
 ('30', 'Credit inv.', 'docs/create/4', 'type=>4', '22'),
 ('31', 'Print docs.', 'docs/admin', NULL, '22'),
 ('32', 'Outcome', '', 'glyphicon glyphicon-shopping-cart', '0'),
 ('33', 'Manage Suppliers', 'accounts/index/1', 'type=>1', '32'),
 ('34', 'Parchace Order', 'docs/create/10', NULL, '16'),
 ('35', 'insert Buisness outcome', 'docs/create/13', NULL, '32'),
 ('36', 'insert Asstes outcome', 'docs/create/14', NULL, '32'),
 ('37', 'Register', NULL, 'glyphicon glyphicon-usd', '0'),
 ('38', 'Receipt', 'docs/create/8', NULL, '37'),
 ('39', 'Bank deposits', 'deposit/admin', NULL, '37'),
 ('40', 'Payment', 'outcome/create', NULL, '37'),
 ('41', 'VAT payment', 'outcome/create/1', 'type=>1', '37'),
 ('42', 'Nat. Ins. payment', 'outcome/create/2', 'type=>2', '37'),
 ('43', 'Reconciliations', NULL, 'glyphicon glyphicon-eye-open', '0'),
 ('44', 'Bank docs entry', 'bankbook/admin', NULL, '43'),
 ('45', 'Bank recon.', 'bankbook/extmatch', NULL, '43'),
 ('46', 'Show bank recon.', 'bankbook/edispmatch', NULL, '43'),
 ('47', 'Accts. recon.', 'match/intmatch', NULL, '43'),
 ('48', 'Show recon.', 'match/dispmatch', NULL, '43'),
 ('49', 'Reports', NULL, 'glyphicon glyphicon-stats', '0'),
 ('50', 'Display transactions', 'reports/journal', NULL, '49'),
 ('51', 'Customers owes', 'reports/owe', NULL, '49'),
 ('52', 'Profit & loss', 'reports/profloss', NULL, '49'),
 ('53', 'Monthly Prof. & loss', 'reports/mprofloss', NULL, '49'),
 ('54', 'VAT calculation', 'reports/vat', NULL, '49'),
 ('55', 'Balance', 'reports/balance', NULL, '49'),
 ('56', 'Income tax advances', 'reports/taxrep', NULL, '49'),
 ('57', 'Import Export', NULL, 'glyphicon glyphicon-transfer', '0'),
 ('58', 'Open Format File', 'data/openfrmt', NULL, '57'),
 ('59', 'Import Open Format', 'data/openfrmtimport', NULL, '57'),
 ('60', 'General backup', 'data/backup', NULL, '57'),
 ('61', 'Backup restore', 'data/restore', NULL, '57'),
 ('62', 'PCN874', 'data/pcn874', NULL, '57'),
 ('63', 'Support', NULL, 'glyphicon glyphicon-info-sign', '0'),
 ('64', 'Update', 'update/', NULL, '63'),
 ('65', 'Paid Support', 'site/support', NULL, '63'),
 ('66', 'About', 'site/about', NULL, '63'),
 ('67', 'Bug Report', 'site/bug', NULL, '63'),
 ('68', 'Warehouse transaction', 'docs/create/15', NULL, '16'),
 ('69', 'Manage Permissons', 'rights/authItem/permissions', NULL, '1'),
 ('70', 'Stock transaction', 'reports/stockAction', NULL, '49'),
 ('71', 'Id6111 Admin', 'accId6111/admin', NULL, '1'),
 ('72', 'Mail Template', 'mailTemplate/admin', NULL, '1'),
 ('73', 'Stock', 'reports/stock', NULL, '49');



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
 ('1000', '??? ?????', 's', '4', '1', 'A000', 'A000', 'A000'),
 ('1001', '?????? ??????', 's', '5', '1', 'NA', 'NA', 'A000'),
 ('1002', '?? ?????? ?????', 'n', '15', '1', 'file.linecount', 'file.linecount', 'A000'),
 ('1003', '???? ?????', 'n', '9', '1', 'company.vatnum', 'company.vatnum', 'A000'),
 ('1004', '???? ????', 'n', '15', '1', 'this.id', 'NA', 'A000'),
 ('1005', '???? ?????', 's', '8', '1', '&OF1.31&', '&OF1.31&', 'A000'),
 ('1006', '????? ?????', 'n', '8', '1', 'system.auth', 'system.auth', 'A000'),
 ('1007', '?? ?????', 's', '20', '1', 'system.name', 'system.name', 'A000'),
 ('1008', '??????', 's', '20', '1', 'system.version', 'system.version', 'A000'),
 ('1009', '?? ?? ????', 'n', '9', '1', 'system.vendor.vatnum', 'system.vendor.vatnum', 'A000'),
 ('1010', '???? ?????', 's', '20', '1', 'system.vendor.name', 'system.vendor.name', 'A000'),
 ('1011', '??? ?????', 'n', '1', '1', '2', '2', 'A000'),
 ('1012', '???? ????? ????', 's', '50', '1', 'NA', 'NA', 'A000'),
 ('1013', '??? ?????', 'n', '1', '1', '2', '2', 'A000'),
 ('1014', '????? ??????? ????', 'n', '1', '1', '1', '1', 'A000'),
 ('1015', '???? ???? ???? ??????', 'n', '9', '1', 'company.vatnum', 'settings.vatnum', 'A000'),
 ('1016', '??? ???????', 'n', '9', '1', 'NA', 'NA', 'A000'),
 ('1017', '?????? ???????', 's', '10', '1', 'NA', 'NA', 'A000'),
 ('1018', '?? ????', 's', '50', '1', 'this.name', 'settings.name', 'A000'),
 ('1019', '??? ???? ????', 's', '50', '1', 'this.address', 'settings.address', 'A000'),
 ('1020', '??? ???? ?? ???', 's', '10', '1', 'this.address', 'settings.address', 'A000'),
 ('1021', '??? ???? ???', 's', '30', '1', 'this.city', 'settings.city', 'A000'),
 ('1022', '??? ???? ?????', 's', '8', '1', 'this.zip', 'settings.zip', 'A000'),
 ('1023', '??? ???', 'n', '4', '1', 'NA', 'NA', 'A000'),
 ('1024', '????? ?????', 'date', '8', '1', 'start', 'start', 'A000'),
 ('1025', '????? ????? ???', 'date', '8', '1', 'end', 'end', 'A000'),
 ('1026', '????? ????', 'date', '8', '1', 'now', 'now', 'A000'),
 ('1027', '??? ????', 'hour', '4', '1', 'now', 'now', 'A000'),
 ('1028', '??? ???', 'n', '1', '1', '0', '0', 'A000'),
 ('1029', '?? ?????', 'n', '1', '1', '1', '1', 'A000'),
 ('1030', '?? ????? ??????', 's', '20', '1', 'zip', 'zip', 'A000'),
 ('1031', '', '', '0', '0', '', '', 'A002'),
 ('1032', '???? ?????', 's', '3', '1', 'NA', 'NA', 'A000'),
 ('1033', '', '', '0', '0', '', '', 'A002'),
 ('1034', '??????/?????', 'n', '1', '1', '0', '0', 'A000'),
 ('1035', '?????? ???????', 's', '46', '1', 'NA', 'NA', 'A000'),
 ('1050', '??? ?????', 's', '4', '10', 'NA', 'NA', 'A001'),
 ('1051', '?? ??????', 'n', '15', '10', 'NA', 'NA', 'A001'),
 ('1100', '??? ?????', 's', '4', '9', 'A100', 'A100', 'A100'),
 ('1101', '?? ?????', 'n', '9', '9', 'file.line', 'file.line', 'A100'),
 ('1102', '???? ?????', 'n', '9', '9', 'company.vatnum', 'company.vatnum', 'A100'),
 ('1103', '???? ????', 'n', '15', '9', 'this.id', 'this.id', 'A100'),
 ('1104', '???? ?????', 's', '8', '9', '&OF1.31&', '&OF1.31&', 'A100'),
 ('1105', '?????? ??????', 's', '50', '9', 'NA', 'NA', 'A100'),
 ('1150', '??? ?????', 's', '4', '8', 'Z900', 'Z900', 'Z900'),
 ('1151', '?? ?????', 'n', '9', '8', 'file.line', 'file.line', 'Z900'),
 ('1152', '???? ?????', 'n', '9', '8', 'company.vatnum', 'company.vatnum', 'Z900'),
 ('1153', '???? ????', 'n', '9', '8', 'this.id', 'this.id', 'Z900'),
 ('1154', '???? ?????', 's', '8', '8', '&OF1.31&', '&OF1.31&', 'Z900'),
 ('1155', '?? ?????? ?????', 'n', '15', '8', 'file.linecount', 'file.linecount', 'Z900'),
 ('1156', '?????? ??????', 's', '50', '8', 'NA', 'NA', 'Z900'),
 ('1200', '??? ?????', 's', '4', '4', 'C100', 'C100', 'C100'),
 ('1201', '????? ?????', 'n', '9', '4', 'file.line', 'file.line', 'C100'),
 ('1202', '???? ?????', 'n', '9', '4', 'company.vatnum', 'company.vatnum', 'C100'),
 ('1203', '??? ????', 'n', '3', '4', 'func.getType', 'func.getType', 'C100'),
 ('1204', '???? ????', 's', '20', '4', 'this.docnum', 'this.docnum', 'C100'),
 ('1205', '????? ????', 'date', '8', '4', 'this.issue_date', 'this.issue_date', 'C100'),
 ('1206', '??? ????', 'hour', '4', '4', 'this.issue_date', 'this.issue_date', 'C100'),
 ('1207', '?? ????/???', 's', '50', '4', 'this.company', 'this.company', 'C100'),
 ('1208', '??? ????', 's', '50', '4', 'this.address', 'this.address', 'C100'),
 ('1209', '??? ?? ???', 's', '10', '4', 'this.address', 'this.address', 'C100'),
 ('1210', '??? ???', 's', '30', '4', 'this.city', 'this.city', 'C100'),
 ('1211', '??? ?????', 's', '8', '4', 'this.zip', 'this.zip', 'C100'),
 ('1212', '??? ?????', 's', '30', '4', 'NA', 'NA', 'C100'),
 ('1213', '??? ??? ?????', 's', '2', '4', 'NA', 'NA', 'C100'),
 ('1214', '?????', 's', '15', '4', 'NA', 'NA', 'C100'),
 ('1215', '???? ????? ????', 'n', '9', '4', 'this.vatnum', 'this.vatnum', 'C100'),
 ('1216', '????? ???', 'date', '8', '4', 'this.due_date', 'this.due_date', 'C100'),
 ('1217', '???? ???? ?? ????? ???\"?', 'v99', '15', '4', 'NA', 'NA', 'C100'),
 ('1218', '??? ???', 's', '3', '4', 'NA', 'NA', 'C100'),
 ('1219', '???? ???? ????', 'v99', '15', '4', 'this.sub_total', 'this.sub_total', 'C100'),
 ('1220', '????', 'v99', '15', '4', 'NA', 'this.discount', 'C100'),
 ('1221', '???? ??? ???', 'v99', '15', '4', 'this.novat_total', 'this.novat_total', 'C100'),
 ('1222', '???? ???', 'v99', '15', '4', 'this.vat', 'this.vat', 'C100'),
 ('1223', '???? ????', 'v99', '15', '4', 'this.total', 'this.total', 'C100'),
 ('1224', '???? ????? ?????', 'v99', '12', '4', 'this.src_tax', 'this.src_tax', 'C100'),
 ('1225', '???? ???? ??????', 's', '15', '4', 'this.account_id', 'this.account_id', 'C100'),
 ('1226', '??? ?????', 's', '10', '4', 'NA', 'NA', 'C100'),
 ('1227', '', '', '0', '0', '', '', 'C101'),
 ('1228', '???? ?????', 's', '1', '4', 'this.status', 'this.status', 'C100'),
 ('1229', '', '', '0', '0', '', '', 'C101'),
 ('1230', '????? ?????', 'date', '8', '4', 'this.issue_date', 'this.issue_date', 'C100'),
 ('1231', '???? ????/???', 's', '7', '4', 'NA', 'NA', 'C100'),
 ('1232', '', '', '0', '0', '', '', 'C101'),
 ('1233', '???? ??????', 's', '9', '4', 'this.owner', 'this.owner', 'C100'),
 ('1234', '??? ???? ?????', 'n', '7', '4', 'this.id', 'this.id', 'C100'),
 ('1235', '??? ??????? ???????', 's', '13', '4', 'NA', 'NA', 'C100'),
 ('1250', '??? ?????', 's', '4', '5', 'D110', 'D110', 'D110'),
 ('1251', '???? ?????', 'n', '9', '5', 'file.line', 'file.line', 'D110'),
 ('1252', '???? ?????', 'n', '9', '5', 'company.vatnum', 'company.vatnum', 'D110'),
 ('1253', '??? ????', 'n', '3', '5', 'func.getType', 'func.getType', 'D110'),
 ('1254', '???? ?????', 's', '20', '5', 'func.getNum', 'func.getNum', 'D110'),
 ('1255', '???? ???? ?????', 'n', '4', '5', 'this.line', 'this.line', 'D110'),
 ('1256', '??? ???? ????', 'n', '3', '5', 'NA', 'NA', 'D110'),
 ('1257', '???? ???? ????', 's', '20', '5', 'NA', 'NA', 'D110'),
 ('1258', '??? ????', 'n', '1', '5', 'NA', 'NA', 'D110'),
 ('1259', '??? ?????', 's', '20', '5', 'this.item_id', 'this.item_id', 'D110'),
 ('1260', '????? ?????? ?? ?????', 's', '30', '5', 'this.name', 'this.name', 'D110'),
 ('1261', '?? ????', 's', '50', '5', 'NA', 'NA', 'D110'),
 ('1262', '???? ?????? ?? ?????', 's', '30', '5', 'NA', 'NA', 'D110'),
 ('1263', '????? ????? ????', 's', '20', '5', 'this.unit_id', 'this.unit_id', 'D110'),
 ('1264', '?????', 'v9999', '17', '5', 'this.qty', 'this.qty', 'D110'),
 ('1265', '???? ?????? ??? ???', 'v99', '15', '5', 'this.unit_price', 'this.unit_price', 'D110'),
 ('1266', '???? ????', 'v99', '15', '5', 'NA', 'NA', 'D110'),
 ('1267', '?? ???? ?????', 'v99', '15', '5', 'this.price', 'this.price', 'D110'),
 ('1268', '????? ???? ?????', 'n', '4', '5', 'this.vat', 'this.vat', 'D110'),
 ('1269', '', '', '0', '0', '', '', 'D111'),
 ('1270', '???? ????/???', 's', '7', '5', 'NA', 'NA', 'D110'),
 ('1271', '', '', '0', '0', '', '', 'D111'),
 ('1272', '????? ?????', 'date', '8', '5', 'func.getDate', 'func.getDate', 'D110'),
 ('1273', '??? ????? ??????', 'n', '7', '5', 'this.doc_id', 'this.doc_id', 'D110'),
 ('1274', '???? ????/??? ????? ????', 's', '7', '5', 'NA', 'NA', 'D110'),
 ('1275', '?????? ???????', 's', '21', '5', 'NA', 'NA', 'D110'),
 ('1300', '??? ?????', 's', '4', '6', 'D120', 'D120', 'D120'),
 ('1301', '???? ?????', 'n', '9', '6', 'file.line', 'file.line', 'D120'),
 ('1302', '???? ?????', 'n', '9', '6', 'company.vatnum', 'company.vatnum', 'D120'),
 ('1303', '??? ????', 'n', '3', '6', 'func.getType', 'func.getType', 'D120'),
 ('1304', '???? ????', 's', '20', '6', 'func.getNum', 'func.getNum', 'D120'),
 ('1305', '???? ???? ?????', 'n', '4', '6', 'this.line', 'this.line', 'D120'),
 ('1306', '??? ????? ?????', 'n', '1', '6', 'this.type', 'this.type', 'D120'),
 ('1307', '???? ???', 'n', '10', '6', 'this.bank', 'this.bank', 'D120'),
 ('1308', '???? ????', 'n', '10', '6', 'this.branch', 'this.branch', 'D120'),
 ('1309', '???? ?????', 'n', '15', '6', 'this.cheque_acct', 'this.cheque_acct', 'D120'),
 ('1310', '???? ?????', 'n', '10', '6', 'this.cheque_num', 'this.cheque_num', 'D120'),
 ('1311', '????? ?????', 'date', '8', '6', 'this.cheque_date', 'this.cheque_date', 'D120'),
 ('1312', '???? ?????', 'v99', '15', '6', 'this.sum', 'this.sum', 'D120'),
 ('1313', '??? ????? ??????', 'n', '1', '6', 'NA', 'NA', 'D120'),
 ('1314', '?? ?????? ?????', 's', '20', '6', 'NA', 'NA', 'D120'),
 ('1315', '??? ???? ?????', 'n', '1', '6', 'NA', 'NA', 'D120'),
 ('1316', '', '', '0', '0', '', '', 'D121'),
 ('1317', '', '', '0', '0', '', '', 'D121'),
 ('1318', '', '', '0', '0', '', '', 'D121'),
 ('1319', '', '', '0', '0', '', '', 'D121'),
 ('1320', '???? ????/???', 's', '7', '6', 'NA', 'NA', 'D120'),
 ('1321', '', '', '0', '0', '', '', 'D121'),
 ('1322', '????? ????', 'date', '8', '6', 'func.getDate', 'this.cheque_date', 'D120'),
 ('1323', '??? ???? ??????', 'n', '7', '6', 'this.doc_id', 'this.doc_id', 'D120'),
 ('1324', '?????? ???????', 's', '60', '6', 'NA', 'NA', 'D120'),
 ('1350', '??? ?????', 's', '4', '2', 'B100', 'B100', 'B100'),
 ('1351', '???? ?????', 'n', '9', '2', 'file.line', 'file.line', 'B100'),
 ('1352', '???? ?????', 'n', '9', '2', 'company.vatnum', 'company.vatnum', 'B100'),
 ('1353', '???? ?????', 'n', '10', '2', 'this.num', 'this.num', 'B100'),
 ('1354', '???? ???? ??????', 'n', '5', '2', 'this.linenum', 'this.linenum', 'B100'),
 ('1355', '???', 'n', '8', '2', 'NA', 'NA', 'B100'),
 ('1356', '??? ?????', 's', '15', '2', 'this.type', 'this.type', 'B100'),
 ('1357', '??????', 's', '20', '2', 'this.refnum1', 'this.refnum1', 'B100'),
 ('1358', '??? ???? ??????', 'n', '3', '2', 'NA', 'NA', 'B100'),
 ('1359', '?????? 2', 's', '20', '2', 'this.refnum2', 'this.refnum2', 'B100'),
 ('1360', '??? ???? ?????? 2', 'n', '3', '2', 'NA', 'NA', 'B100'),
 ('1361', '?????', 's', '50', '2', 'this.details', 'this.details', 'B100'),
 ('1362', '?????', 'date', '8', '2', 'this.date', 'this.date', 'B100'),
 ('1363', '????? ???', 'date', '8', '2', 'this.valuedate', 'this.valuedate', 'B100'),
 ('1364', '????? ??????', 's', '15', '2', 'this.account_id', 'this.account_id', 'B100'),
 ('1365', '????? ????', 's', '15', '2', 'NA', 'NA', 'B100'),
 ('1366', '???? ??????', 'n', '1', '2', 'func.opefrmtMrk', 'func.opefrmtMrk', 'B100'),
 ('1367', '??? ???? ???', 's', '3', '2', 'this.currency_id', 'this.currency_id', 'B100'),
 ('1368', '???? ??????', 'v99', '15', '2', 'this.leadsum', 'this.leadsum', 'B100'),
 ('1369', '???? ???', 'v99', '15', '2', 'this.sum', 'this.sum', 'B100'),
 ('1370', '??? ????', 'v99', '12', '2', 'NA', 'NA', 'B100'),
 ('1371', '??? ????? 1', 's', '10', '2', 'NA', 'NA', 'B100'),
 ('1372', '??? ????? 2', 's', '10', '2', 'NA', 'NA', 'B100'),
 ('1373', '', '', '0', '0', '', '', 'B101'),
 ('1374', '???? ????/???', 's', '7', '2', 'NA', 'NA', 'B100'),
 ('1375', '????? ????', 'date', '8', '2', 'NA', 'NA', 'B100'),
 ('1376', '???? ?????', 's', '9', '2', 'this.owner_id', 'this.owner_id', 'B100'),
 ('1377', '?????? ???????', 's', '25', '2', 'NA', 'NA', 'B100'),
 ('1400', '??? ?????', 's', '4', '3', 'B110', 'B110', 'B110'),
 ('1401', '???? ?????', 'n', '9', '3', 'file.line', 'file.line', 'B110'),
 ('1402', '???? ?????', 'n', '9', '3', 'company.vatnum', 'company.vatnum', 'B110'),
 ('1403', '???? ??????', 's', '15', '3', 'this.id', 'this.id', 'B110'),
 ('1404', '?? ?????', 's', '50', '3', 'this.name', 'this.name', 'B110'),
 ('1405', '??? ???? ????', 's', '15', '3', 'this.type', 'this.type', 'B110'),
 ('1406', '????? ??? ???? ????', 's', '30', '3', 'func.getType', 'typedesc', 'B110'),
 ('1407', '??? ????', 's', '30', '3', 'this.address', 'this.address', 'B110'),
 ('1408', '??? ???? ???', 's', '50', '3', 'this.address', 'this.address', 'B110'),
 ('1409', '??? ???', 's', '10', '3', 'this.city', 'this.city', 'B110'),
 ('1410', '??? ?????', 's', '8', '3', 'this.zip', 'this.zip', 'B110'),
 ('1411', '??? ?????', 's', '30', '3', 'NA', 'NA', 'B110'),
 ('1412', '??? ?????', 's', '2', '3', 'NA', 'NA', 'B110'),
 ('1413', '????? ????', 's', '15', '3', 'NA', 'NA', 'B110'),
 ('1414', '???? ????? ?????? ????', 'v99', '15', '3', 'limit.getBalance', 'limit.getBalance', 'B110'),
 ('1415', '??? ????', 'v99', '15', '3', 'limit.getPos', 'limit.getPos', 'B110'),
 ('1416', '??? ????', 'v99', '15', '3', 'limit.getNeg', 'limit.getNeg', 'B110'),
 ('1417', '??? ?????? ???????', 'n', '4', '3', 'this.id6111', 'this.id6111', 'B110'),
 ('1418', '', '', '0', '0', '', '', 'B111'),
 ('1419', '???? ???? ????', 'n', '9', '3', 'this.vatnum', 'this.vatnum', 'B110'),
 ('1420', '', '', '0', '0', '', '', 'B111'),
 ('1421', '???? ????/???', 's', '7', '3', 'NA', 'NA', 'B110'),
 ('1422', '???? ????? ?????? ??? ????', 'v99', '15', '3', 'NA', 'NA', 'B110'),
 ('1423', '??? ???? ???? ????? ????', 's', '3', '3', 'NA', 'this.currency_id', 'B110'),
 ('1424', '??? ??????? ??????', 's', '16', '3', 'NA', 'NA', 'B110'),
 ('1450', '??? ?????', 's', '4', '7', 'M100', 'M100', 'M100'),
 ('1451', '????? ?????', 'n', '9', '7', 'file.line', 'file.line', 'M100'),
 ('1452', '???? ?????', 'n', '9', '7', 'company.vatnum', 'company.vatnum', 'M100'),
 ('1453', '??? ????', 's', '20', '7', 'this.id', 'this.id', 'M100'),
 ('1454', '??? ??? ????', 's', '20', '7', 'this.extcatnum', 'this.extcatnum', 'M100'),
 ('1455', '??? ?????', 's', '20', '7', 'this.id', 'this.id', 'M100'),
 ('1456', '?? ????', 's', '50', '7', 'this.name', 'this.name', 'M100'),
 ('1457', '??? ????', 's', '10', '7', 'NA', 'NA', 'M100'),
 ('1458', '????? ??? ????', 's', '30', '7', 'NA', 'NA', 'M100'),
 ('1459', '????? ????? ????', 's', '20', '7', 'this.unit_id', 'this.unit_id', 'M100'),
 ('1460', '???? ????? ?????? ???', 'v99', '12', '7', 'ammount', 'ammount', 'M100'),
 ('1461', '?? ??? ??????', 'v99', '12', '7', 'NA', 'NA', 'M100'),
 ('1462', '?? ??? ??????', 'v99', '12', '7', 'NA', 'NA', 'M100'),
 ('1463', '', '99', '10', '7', 'NA', 'NA', 'M100'),
 ('1464', '', '99', '10', '7', 'this.saleprice', 'this.saleprice', 'M100'),
 ('1465', '?????? ??????', 's', '50', '7', 'NA', 'NA', 'M100');



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
 ('A000', '????? ?????', 'INI'),
 ('B100', '????? ????', 'BKMVDATA'),
 ('B110', '????? ?????', 'BKMVDATA'),
 ('C100', '????? ????', 'BKMVDATA'),
 ('D110', '???? ????', 'BKMVDATA'),
 ('D120', '???? ????', 'BKMVDATA'),
 ('M100', '???? ????', 'BKMVDATA'),
 ('Z900', '????? ????? DATA', 'BKMVDATA'),
 ('A100', '????? ????? DATA', 'BKMVDATA'),
 ('B100', '????? ????', 'INI'),
 ('B110', '????? ?????', 'INI'),
 ('C100', '????? ????', 'INI'),
 ('D110', '???? ????', 'INI'),
 ('D120', '???? ????', 'INI'),
 ('M100', '???? ????', 'INI');



--
-- Structure for table `qwe_AuthAssignment`
--

DROP TABLE IF EXISTS `qwe_AuthAssignment`;

CREATE TABLE `qwe_AuthAssignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,
`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `qwe_AuthAssignment`
--

INSERT INTO `qwe_AuthAssignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
 ('Admin', '1', NULL, 'N;'),
 ('Admin', '11', NULL, 'N;');



--
-- Structure for table `qwe_AuthItem`
--

DROP TABLE IF EXISTS `qwe_AuthItem`;

CREATE TABLE `qwe_AuthItem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `qwe_AuthItem`
--

INSERT INTO `qwe_AuthItem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
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
 ('Editor', '2', 'Editor1', NULL, 'N;'),
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
 ('Users.View', '0', NULL, NULL, 'N;'),
 ('???', '2', '???', NULL, 'N;');



--
-- Structure for table `qwe_AuthItemChild`
--

DROP TABLE IF EXISTS `qwe_AuthItemChild`;

CREATE TABLE `qwe_AuthItemChild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `qwe_AuthItemChild`
--

INSERT INTO `qwe_AuthItemChild` (`parent`, `child`) VALUES
 ('Company.*', '2'),
 ('Editor', 'Accounts.Ajax'),
 ('Authenticated', 'Accounts.Autocomplete'),
 ('Editor', 'Accounts.Create');



--
-- Structure for table `qwe_Rights`
--

DROP TABLE IF EXISTS `qwe_Rights`;

CREATE TABLE `qwe_Rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
PRIMARY KEY (`itemname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `qwe_Rights`
--

INSERT INTO `qwe_Rights` (`itemname`, `type`, `weight`) VALUES
 ('Admin', '1', '0'),
 ('Guest', '2', '2'),
 ('User', '2', '1');



--
-- Structure for table `qwe_accCountry`
--

DROP TABLE IF EXISTS `qwe_accCountry`;

CREATE TABLE `qwe_accCountry` (
  `id` varchar(2) NOT NULL DEFAULT '',
  `name` varchar(255) DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `qwe_accCountry`
--

INSERT INTO `qwe_accCountry` (`id`, `name`) VALUES
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
 ('BL', 'Saint Barth�lemy'),
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
 ('RE', 'Reunion  R�union'),
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
-- Structure for table `qwe_accEav`
--

DROP TABLE IF EXISTS `qwe_accEav`;

CREATE TABLE `qwe_accEav` (
  `entity` bigint(20) unsigned NOT NULL,
  `attribute` varchar(250) NOT NULL,
  `value` text NOT NULL,
KEY `ikEntity` (`entity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `qwe_accEav`
--

INSERT INTO `qwe_accEav` (`entity`, `attribute`, `value`) VALUES
 ('101082', '2', ''),
 ('101082', '2', ''),
 ('101082', '1', ''),
 ('101085', '2', ''),
 ('101085', '2', ''),
 ('101068', '3', '45'),
 ('101068', '5', ''),
 ('101068', '3', '45'),
 ('101068', '5', ''),
 ('101068', '4', '1');



--
-- Structure for table `qwe_accHist`
--

DROP TABLE IF EXISTS `qwe_accHist`;

CREATE TABLE `qwe_accHist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) unsigned DEFAULT NULL,
  `dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `details` text,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`),
KEY `prefix` (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Data for table `qwe_accHist`
--

INSERT INTO `qwe_accHist` (`id`, `account_id`, `dt`, `details`, `type`) VALUES
 ('1', '101082', '2014-07-31 00:00:00', '<p>?????</p>', '0'),
 ('2', '101082', '2014-07-30 00:00:00', '<p>??????????&nbsp;&nbsp; ?????????????????????</p>', '0'),
 ('3', '1', '2014-07-29 00:00:00', '<p>??? ??? ???</p>', '0'),
 ('4', '101084', '2014-07-27 00:00:00', '<p>???</p>', '0'),
 ('5', '81', '2014-07-28 00:00:00', '<p>??? ???? 4</p>', '0'),
 ('7', '203', '2014-07-31 00:00:00', '<p>????? ??????</p>', '0'),
 ('8', '16', '2014-07-29 00:00:00', '<p>????? ???? ???? ??</p>', '0'),
 ('9', '101082', '2014-07-31 00:00:00', '<p>????????????? ?????????????? ?????????????</p>', '0'),
 ('10', '101084', '2014-07-30 00:00:00', '<p>??? ?????? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ??? ???</p>', '0');



--
-- Structure for table `qwe_accId6111`
--

DROP TABLE IF EXISTS `qwe_accId6111`;

CREATE TABLE `qwe_accId6111` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `percentage` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `qwe_accId6111`
--

INSERT INTO `qwe_accId6111` (`id`, `name`, `percentage`) VALUES
 ('1010', ' ?????? ??????? ????', '0'),
 ('1020', ' ?????? ??????? ???\"?', '0'),
 ('1030', ' ?????? ???? ??????? ????', '0'),
 ('1040', ' ?????? ???? ??????? ???\"?', '0'),
 ('1090', ' ?????? ?????', '0'),
 ('3510', ' ??? ????? ???????', '0'),
 ('3515', ' ???????', '0'),
 ('3520', ' ?????? ??? ?????? ????', '0'),
 ('3530', ' ????? ???????? ???????', '0'),
 ('3535', ' ?????? ???? ?????', '0'),
 ('3540', ' ??????? ????????', '0'),
 ('3545', ' ?????? ?????', '0'),
 ('3550', ' ?????? ????? ????????', '0'),
 ('3555', ' ?????? ???? ??????', '0'),
 ('3560', ' ??????', '0'),
 ('3565', ' ????? ??? ???????', '0'),
 ('3570', ' ??? ?????? ?????? ?????', '0'),
 ('3575', ' ????? ??????', '0'),
 ('3580', ' ???', '0'),
 ('3590', ' ???? ????', '0'),
 ('3595', ' ????? ???????', '0'),
 ('3600', ' ??????? ?????? ???????', '0'),
 ('3610', ' ????? ??????? ???????', '0'),
 ('3620', ' ????? ?????? ??????', '0'),
 ('3625', ' ??????? ????? ?????? ?????', '0'),
 ('3640', ' ??? ?????', '0'),
 ('3650', ' ?????? ???? ???????', '0'),
 ('3660', ' ?????? ???\"?', '0'),
 ('3665', ' ?????? ???????', '0'),
 ('3680', ' ???????', '0'),
 ('3685', ' ???? ?????', '0'),
 ('3690', ' ????? ??? ??????? ?????', '0'),
 ('5010', ' ????? ???', '0'),
 ('5090', ' ????? ?????? ?????', '0');



--
-- Structure for table `qwe_accTemplate`
--

DROP TABLE IF EXISTS `qwe_accTemplate`;

CREATE TABLE `qwe_accTemplate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `AccType_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
KEY `AccType_id` (`AccType_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Data for table `qwe_accTemplate`
--

INSERT INTO `qwe_accTemplate` (`id`, `name`, `AccType_id`) VALUES
 ('26', '???', '0');



--
-- Structure for table `qwe_accTemplateItem`
--

DROP TABLE IF EXISTS `qwe_accTemplateItem`;

CREATE TABLE `qwe_accTemplateItem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `AccTemplate_id` int(11) NOT NULL,
  `eavFields_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `AccTemplate_id` (`AccTemplate_id`),
KEY `eavFields_id` (`eavFields_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Data for table `qwe_accTemplateItem`
--

INSERT INTO `qwe_accTemplateItem` (`id`, `AccTemplate_id`, `eavFields_id`) VALUES
 ('8', '26', '1'),
 ('13', '26', '1'),
 ('14', '26', '3');



--
-- Structure for table `qwe_accType`
--

DROP TABLE IF EXISTS `qwe_accType`;

CREATE TABLE `qwe_accType` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `desc` varchar(40) NOT NULL,
  `openformat` varchar(5) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Data for table `qwe_accType`
--

INSERT INTO `qwe_accType` (`id`, `name`, `desc`, `openformat`) VALUES
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
-- Structure for table `qwe_accounts`
--

DROP TABLE IF EXISTS `qwe_accounts`;

CREATE TABLE `qwe_accounts` (
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
) ENGINE=InnoDB AUTO_INCREMENT=101089 DEFAULT CHARSET=utf8;

--
-- Data for table `qwe_accounts`
--

INSERT INTO `qwe_accounts` (`id`, `type`, `id6111`, `pay_terms`, `src_tax`, `src_date`, `parent_account_id`, `name`, `contact`, `department`, `vatnum`, `email`, `phone`, `dir_phone`, `cellular`, `fax`, `web`, `address`, `city`, `zip`, `currency_id`, `comments`, `system_acc`, `owner`, `modified`, `created`) VALUES
 ('1', '6', '1010', NULL, '0.00', NULL, NULL, '??\"? ??????', '', '', '0', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', NULL, '2014-07-17 09:34:42', '2014-01-14 17:09:38'),
 ('2', '6', '1010', NULL, '0.00', NULL, NULL, '??\"? ?????? ???? ??????', '', '', '0', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', NULL, '2014-07-17 09:34:54', '2014-01-14 17:09:38'),
 ('3', '6', '1010', NULL, '0.00', NULL, NULL, '??\"? ??????', '', '', '0', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', NULL, '2014-07-17 09:35:08', '2014-01-14 17:09:38'),
 ('5', '6', '0', NULL, NULL, NULL, NULL, '????? ????? ??????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:38'),
 ('6', '4', '0', NULL, NULL, NULL, NULL, '????? ??????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:38'),
 ('7', '4', '0', NULL, NULL, NULL, NULL, '???? ?????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:38'),
 ('8', '6', '0', NULL, NULL, NULL, NULL, '????? ????? ???????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:38'),
 ('9', '4', '0', NULL, NULL, NULL, NULL, '????? ?????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:38'),
 ('10', '4', '0', NULL, NULL, NULL, NULL, '???? ?????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:38'),
 ('11', '4', '0', NULL, NULL, NULL, NULL, '???? ?????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:38'),
 ('13', '6', '0', NULL, NULL, NULL, NULL, '?? ????? ??????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:38'),
 ('14', '6', '1010', NULL, '0.00', NULL, NULL, '????? ????? ??\"?', '', '', '0', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', NULL, '2014-07-17 09:35:24', '2014-01-14 17:09:38'),
 ('15', '6', '0', NULL, NULL, NULL, NULL, '????? ?????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:38'),
 ('16', '6', '0', NULL, NULL, NULL, NULL, '?? ?????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:38'),
 ('17', '2', '0', NULL, NULL, NULL, NULL, '???? ?????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:38'),
 ('18', '2', '3510', NULL, NULL, NULL, NULL, '??? ?????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:39'),
 ('30', '2', '3575', NULL, NULL, NULL, NULL, '?????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:39'),
 ('31', '2', '3550', NULL, NULL, NULL, NULL, '????? ??? ???????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:39'),
 ('32', '2', '3550', NULL, NULL, NULL, NULL, '????? ????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:39'),
 ('33', '2', '3565', NULL, NULL, NULL, NULL, '????? ???', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:39'),
 ('34', '2', '3565', NULL, NULL, NULL, NULL, '????? ???', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:39'),
 ('35', '2', '3545', NULL, NULL, NULL, NULL, '??????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:39'),
 ('36', '2', '3575', NULL, NULL, NULL, NULL, '??????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:39'),
 ('37', '2', '3650', NULL, NULL, NULL, NULL, '?????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:39'),
 ('38', '2', '3685', NULL, NULL, NULL, NULL, '????? ??????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:39'),
 ('39', '2', '3515', NULL, NULL, NULL, NULL, '????? ???', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:39'),
 ('40', '2', '3515', NULL, NULL, NULL, NULL, '????? ?????? ???????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:39'),
 ('41', '2', '3515', NULL, NULL, NULL, NULL, '????? ????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:39'),
 ('42', '2', '3515', NULL, NULL, NULL, NULL, '????? ?? ?', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:39'),
 ('43', '2', '3515', NULL, NULL, NULL, NULL, '????? ????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:39'),
 ('44', '2', '3650', NULL, NULL, NULL, NULL, '????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:39'),
 ('45', '2', '3565', NULL, NULL, NULL, NULL, '???', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:39'),
 ('46', '2', '3565', NULL, NULL, NULL, NULL, '???', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:39'),
 ('47', '2', '3575', NULL, NULL, NULL, NULL, '??? ???', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:39'),
 ('48', '2', '3575', NULL, NULL, NULL, NULL, '??? ???', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:39'),
 ('49', '2', '3680', NULL, NULL, NULL, NULL, '??????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:39'),
 ('50', '2', '3565', NULL, NULL, NULL, NULL, '??????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:40'),
 ('51', '2', '3540', NULL, NULL, NULL, NULL, '????? ???????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:40'),
 ('52', '2', '3600', NULL, NULL, NULL, NULL, '??????? ???????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:40'),
 ('53', '2', '3565', NULL, NULL, NULL, NULL, '?????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:40'),
 ('54', '2', '3590', NULL, NULL, NULL, NULL, '????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:40'),
 ('55', '2', '3650', NULL, NULL, NULL, NULL, '????? ????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:40'),
 ('56', '2', '3540', NULL, NULL, NULL, NULL, '???? ?????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:40'),
 ('57', '2', '3540', NULL, NULL, NULL, NULL, '???? ???', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:40'),
 ('58', '2', '3540', NULL, NULL, NULL, NULL, '???? ?????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:40'),
 ('59', '2', '3540', NULL, NULL, NULL, NULL, '???? ??', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:40'),
 ('60', '2', '3540', NULL, NULL, NULL, NULL, '???? ??????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:40'),
 ('61', '2', '3540', NULL, NULL, NULL, NULL, '???? ?????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:40'),
 ('62', '2', '3540', NULL, NULL, NULL, NULL, '???? ??????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:40'),
 ('63', '2', '3625', NULL, NULL, NULL, NULL, '????? ?? ???? ????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:40'),
 ('64', '2', '3625', NULL, NULL, NULL, NULL, '????? ?? ???? ????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:40'),
 ('65', '2', '3560', NULL, NULL, NULL, NULL, '????? ???????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:40'),
 ('66', '2', '3560', NULL, NULL, NULL, NULL, '????? ????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:40'),
 ('67', '2', '3565', NULL, NULL, NULL, NULL, '??????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:40'),
 ('68', '2', '3540', NULL, NULL, NULL, NULL, '?????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:40'),
 ('69', '2', '3650', NULL, NULL, NULL, NULL, '???? ???????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:40'),
 ('70', '2', '3540', NULL, NULL, NULL, NULL, '???? ????? ???????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:40'),
 ('71', '2', '3650', NULL, NULL, NULL, NULL, '??????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:41'),
 ('72', '2', '3690', NULL, NULL, NULL, NULL, '???????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:41'),
 ('73', '2', '3665', NULL, NULL, NULL, NULL, '???????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:41'),
 ('74', '2', '3680', NULL, NULL, NULL, NULL, '???????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:41'),
 ('75', '2', '3690', NULL, NULL, NULL, NULL, '????? ??? ??????? ??????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:41'),
 ('76', '2', '3595', NULL, NULL, NULL, NULL, '??????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:41'),
 ('77', '2', '3660', NULL, '0.00', NULL, NULL, '?????? ???\"?', '', '', '0', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', NULL, '2014-07-17 09:33:55', '2014-01-14 17:09:41'),
 ('78', '2', '3650', NULL, NULL, NULL, NULL, '?????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:41'),
 ('79', '2', '3650', NULL, NULL, NULL, NULL, '?????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:41'),
 ('80', '2', '3600', NULL, NULL, NULL, NULL, '????? ???????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:41'),
 ('81', '2', '3540', NULL, NULL, NULL, NULL, '????? ????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:41'),
 ('82', '2', '5090', NULL, NULL, NULL, NULL, '????? PAYPAL', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:41'),
 ('83', '2', '5010', NULL, NULL, NULL, NULL, '????? ???', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:41'),
 ('84', '2', '5090', NULL, NULL, NULL, NULL, '????? ?????? ?????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:41'),
 ('85', '2', '3580', NULL, NULL, NULL, NULL, '???', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:41'),
 ('86', '2', '3620', NULL, NULL, NULL, NULL, '?????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:41'),
 ('87', '2', '3520', NULL, NULL, NULL, NULL, '????? ????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:41'),
 ('88', '2', '3620', NULL, NULL, NULL, NULL, '????? ??????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:41'),
 ('89', '2', '1340', NULL, NULL, NULL, NULL, '????? ???&quot;?', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:41'),
 ('90', '2', '3565', NULL, NULL, NULL, NULL, '????? ???', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:41'),
 ('91', '2', '3690', NULL, NULL, NULL, NULL, '?????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:41'),
 ('92', '2', '3620', NULL, NULL, NULL, NULL, '?????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:41'),
 ('93', '2', '3570', NULL, NULL, NULL, NULL, '????? ????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:41'),
 ('94', '2', '3570', NULL, NULL, NULL, NULL, '????? ????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:42'),
 ('95', '2', '3565', NULL, NULL, NULL, NULL, '????? ???', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:42'),
 ('96', '2', '3540', NULL, NULL, NULL, NULL, '??? ???? ???? ?????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:42'),
 ('97', '2', '3690', NULL, NULL, NULL, NULL, '????????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:42'),
 ('98', '2', '3595', NULL, NULL, NULL, NULL, '?????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:42'),
 ('99', '2', '3550', NULL, NULL, NULL, NULL, '???????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:42'),
 ('100', '3', '1010', NULL, '18.00', NULL, NULL, '????? ?????? ????', '', '', '0', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', NULL, '2014-06-30 09:51:14', '2014-01-14 17:09:42'),
 ('101', '3', '1020', NULL, NULL, NULL, NULL, '????? ?????? ????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:42'),
 ('102', '3', '1030', NULL, '0.00', NULL, NULL, '????? ?????? ???\"?', '', '', '0', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', NULL, '2014-07-17 09:34:10', '2014-01-14 17:09:42'),
 ('103', '3', '1040', NULL, '0.00', NULL, NULL, '????? ?????? ???\"?', '', '', '0', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', NULL, '2014-07-17 09:34:25', '2014-01-14 17:09:42'),
 ('107', '2', '0', NULL, NULL, NULL, NULL, '?????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:42'),
 ('109', '2', '0', NULL, NULL, NULL, NULL, '?????? ?????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:42'),
 ('110', '1', '1010', NULL, '0.00', NULL, NULL, '?????? ??\"?', '', '', '0', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', NULL, '2014-07-17 09:33:31', '2014-01-14 17:09:42'),
 ('111', '2', '3565', NULL, NULL, NULL, NULL, '???', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:42'),
 ('112', '2', '3680', NULL, NULL, NULL, NULL, '??????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:42'),
 ('113', NULL, '0', NULL, NULL, NULL, NULL, '?????? ?????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:42'),
 ('114', '1', '0', NULL, NULL, NULL, NULL, '????? ?????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:42'),
 ('150', '7', '0', NULL, NULL, NULL, NULL, '??? ??????? 433', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:42'),
 ('151', '2', '0', NULL, NULL, NULL, NULL, '????? ?????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:42'),
 ('201', NULL, '1010', NULL, NULL, NULL, NULL, '???? ??????', NULL, NULL, '123345678', NULL, NULL, NULL, NULL, NULL, NULL, '', '?????', '42234', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:43'),
 ('202', NULL, '0', NULL, NULL, NULL, NULL, '????? ?????', NULL, NULL, '51080921', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:43'),
 ('203', NULL, '0', NULL, NULL, NULL, NULL, '???? ?? ????', NULL, NULL, '334244435', NULL, NULL, NULL, NULL, NULL, NULL, '??? ????? 7', '?????', '23345', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:43'),
 ('204', NULL, '0', NULL, NULL, NULL, NULL, '???? ??????', NULL, NULL, '534645768', NULL, NULL, NULL, NULL, NULL, NULL, '?? ??? 1', '', '42234', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:43'),
 ('205', '2', '3690', NULL, NULL, NULL, NULL, '??? ????? ??????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:43'),
 ('206', NULL, '1010', NULL, NULL, NULL, NULL, 'Google Inc', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:43'),
 ('207', NULL, '1010', NULL, NULL, NULL, NULL, '????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:43'),
 ('208', NULL, '1010', NULL, NULL, NULL, NULL, '????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:43'),
 ('209', NULL, '1010', NULL, NULL, NULL, NULL, '????? ??????5  ???', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:43'),
 ('210', '3', '1010', NULL, NULL, NULL, NULL, '????? ?????? 5 ???', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:43'),
 ('212', NULL, '1010', NULL, NULL, NULL, NULL, '????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:43'),
 ('213', '3', '1010', NULL, NULL, NULL, NULL, '????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:43'),
 ('214', NULL, '1010', NULL, NULL, NULL, NULL, '????', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '0', NULL, '0000-00-00 00:00:00', '2014-01-14 17:09:43'),
 ('101068', '0', '1010', '30', '0.00', NULL, NULL, '???? ?????', '', '', '300777778', '', '6123544359', '6123544359', '', '', '', '????? 8', 'Minneapolis', '55416-3935', 'ILS', '', '0', NULL, '2014-07-06 15:34:11', '2014-01-28 17:55:20'),
 ('101071', '0', '1010', NULL, '0.00', NULL, NULL, '??????? ??\"?', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', NULL, '0000-00-00 00:00:00', '2014-02-19 14:21:37'),
 ('101073', '0', '1010', '30', '0.00', NULL, NULL, '??????? ??\"?', '', '', '69924504', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', NULL, '0000-00-00 00:00:00', '2014-02-19 14:22:08'),
 ('101074', '0', '1010', '30', '0.00', NULL, NULL, '??????? ??\"?', '', '', '69924504', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', NULL, '0000-00-00 00:00:00', '2014-02-19 14:22:08'),
 ('101075', '0', '1010', NULL, '0.00', NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', NULL, '0000-00-00 00:00:00', '2014-02-25 14:54:19'),
 ('101076', '0', '1010', NULL, '0.00', NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', NULL, '0000-00-00 00:00:00', '2014-02-26 10:21:29'),
 ('101077', '0', '1010', NULL, '0.00', NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', NULL, '0000-00-00 00:00:00', '2014-02-26 10:21:30'),
 ('101078', '0', '1010', NULL, '0.00', NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', NULL, '0000-00-00 00:00:00', '2014-02-26 10:28:31'),
 ('101079', '0', '1010', NULL, '0.00', NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', NULL, '0000-00-00 00:00:00', '2014-02-26 10:29:25'),
 ('101080', '8', '1010', NULL, '0.00', NULL, NULL, '????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', NULL, '0000-00-00 00:00:00', '2014-03-12 18:00:54'),
 ('101081', '0', '1010', NULL, '0.00', NULL, NULL, '???? ????? ??\"?', '', '', '', 'kaki@pipi.com', '', '', '', '', '', '', '', '', 'ILS', '', '0', NULL, '2014-07-27 11:53:29', '2014-06-24 19:00:29'),
 ('101082', '0', '1010', NULL, '0.00', NULL, NULL, '???? ??????', '', '', '069924504', '', '', '', '', '', '', '??? ????? 5', '?? ????', '52215', 'ILS', '', '0', NULL, '2014-06-29 23:16:57', '2014-06-29 23:10:13'),
 ('101083', '8', '1010', NULL, '0.00', NULL, NULL, '??? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', NULL, '0000-00-00 00:00:00', '2014-06-30 08:43:03'),
 ('101084', '0', '1010', NULL, '0.00', NULL, NULL, '????? ????? ??\"?', '', '', '069924504', '', '', '', '', '', '', '????? ????? 5', '?? ????', '', 'ILS', '', '0', NULL, '0000-00-00 00:00:00', '2014-07-04 14:40:24'),
 ('101085', '9', '1010', NULL, '0.00', NULL, NULL, '???? ?? ????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', NULL, '2014-07-04 17:24:06', '2014-07-04 17:15:47'),
 ('101086', '1', '1010', NULL, '0.00', NULL, NULL, '????? ?? ?? ??\"?', '', '', '300777778', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', NULL, '0000-00-00 00:00:00', '2014-07-07 13:27:08'),
 ('101087', '0', '1010', NULL, '0.00', NULL, NULL, '???? ???? ?????? ????? ??\"?', '', '', '069924504', '', '', '', '', '', '', '???? ??? ???? ??? 345', '?\"? ?????', '34343', 'ILS', '', '0', NULL, '0000-00-00 00:00:00', '2014-07-12 18:55:04'),
 ('101088', '0', '1010', NULL, '0.00', NULL, NULL, '???? ?? ??\"?', '', '', '069924496', '', '', '', '', '', '', '??? ????? 12', '?? ????', '', 'ILS', '', '0', NULL, '0000-00-00 00:00:00', '2014-07-16 19:01:29');



--
-- Structure for table `qwe_bankName`
--

DROP TABLE IF EXISTS `qwe_bankName`;

CREATE TABLE `qwe_bankName` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `qwe_bankName`
--

INSERT INTO `qwe_bankName` (`id`, `name`) VALUES
 ('1', '??? ???? ?????'),
 ('4', '??? ??? ?????? ??????'),
 ('6', '??? ?????'),
 ('7', '??? ?????? ??????'),
 ('8', '??? ?????? ??????'),
 ('9', '??? ?????'),
 ('10', '??? ?????'),
 ('11', '??? ???????'),
 ('12', '??? ???????'),
 ('13', '??? ?????'),
 ('14', '??? ???? ?????'),
 ('17', '??? ??????? ???????'),
 ('19', '??? ??????? ??????'),
 ('20', '??? ????? ?????'),
 ('22', 'Citibank N.A'),
 ('23', 'HSBC'),
 ('25', 'BNP Paribas Israel'),
 ('26', '????? ??\"?'),
 ('31', '???? ????????? ?????? '),
 ('34', '??? ???? ??????'),
 ('39', 'SBI State Bank of India'),
 ('46', '??? ???'),
 ('48', '???? ????? ??????'),
 ('52', '??? ????? ????? ?????'),
 ('54', '??? ???????'),
 ('67', 'Arab Land Bank'),
 ('68', '??? ???? ?????? ??????'),
 ('77', '??? ????? ????????? ??\"?'),
 ('90', '??? ??????? ?????????'),
 ('99', '??? ?????');



--
-- Structure for table `qwe_bankbook`
--

DROP TABLE IF EXISTS `qwe_bankbook`;

CREATE TABLE `qwe_bankbook` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `account_id` int(11) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `details` varchar(60) DEFAULT NULL,
  `refnum` char(255) DEFAULT NULL,
  `sum` decimal(8,2) DEFAULT NULL,
  `total` decimal(8,2) DEFAULT NULL,
  `extCorrelation` int(11) DEFAULT NULL,
  `currency_id` varchar(3) NOT NULL,
  PRIMARY KEY (`id`),
KEY `num` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

--
-- Data for table `qwe_bankbook`
--

INSERT INTO `qwe_bankbook` (`id`, `account_id`, `date`, `details`, `refnum`, `sum`, `total`, `extCorrelation`, `currency_id`) VALUES
 ('1', '150', '0000-00-00 00:00:00', '?????', '345', '500.00', NULL, '0', ''),
 ('2', '150', '2014-09-30 00:00:00', ' ?????? ??\n', '60292', '-780.00', '-31278.84', '0', ''),
 ('3', '150', '2014-09-30 00:00:00', ' ?????? ??\n', '60293', '-2690.00', '0.00', '0', ''),
 ('4', '150', '2014-09-30 00:00:00', ' ?????? ??\n', '60300', '-2579.00', '-36547.84', '0', ''),
 ('5', '150', '2014-10-01 00:00:00', '????? ??? (', '70087', '20312.90', '0.00', '0', ''),
 ('6', '150', '2014-10-01 00:00:00', ' ????? ??\"\n', '77777', '-833.96', '0.00', '0', ''),
 ('7', '150', '2014-10-01 00:00:00', '???? ??? ??', '77777', '-40.00', '0.00', '0', ''),
 ('8', '150', '2014-10-01 00:00:00', ' ?????? ??\n', '60280', '-3500.00', '0.00', '0', ''),
 ('9', '150', '2014-10-01 00:00:00', ' ?????? ??\n', '60307', '-1000.00', '-21608.90', '0', ''),
 ('10', '150', '2014-10-02 00:00:00', '  ???? ??\"\n', '80283', '247.47', '0.00', '0', ''),
 ('11', '150', '2014-10-02 00:00:00', '  ???? ??\"\n', '283', '-5.90', '-21367.33', '0', ''),
 ('12', '150', '2014-10-03 00:00:00', '????? - ??\n', '99012', '1357.00', '-20010.33', '0', ''),
 ('13', '150', '2014-10-06 00:00:00', '     ???-?\n', '8674', '-800.00', '-20810.33', '0', ''),
 ('14', '150', '2014-10-10 00:00:00', '   ??? ???\n', '628', '-358.00', '0.00', '0', ''),
 ('15', '150', '2014-10-10 00:00:00', '  ???? ??\"\n', '5407', '-110.30', '-21278.63', '0', ''),
 ('16', '150', '2014-10-13 00:00:00', '????? ??? (', '70029', '3704.40', '-17574.23', '0', ''),
 ('17', '150', '2014-10-14 00:00:00', ' ?????? ??\n', '60309', '-1500.00', '-19074.23', '0', ''),
 ('18', '150', '2014-10-15 00:00:00', '??? ???? ??', '912', '-972.85', '-20047.08', '0', ''),
 ('19', '150', '2014-10-17 00:00:00', '????? ?????', '873', '-2000.00', '-22047.08', '0', ''),
 ('20', '150', '2014-10-20 00:00:00', '????? ?????', '3014', '5900.00', '0.00', '0', ''),
 ('21', '150', '2014-10-20 00:00:00', '????? ?????', '34852', '-1097.22', '0.00', '0', ''),
 ('22', '150', '2014-10-20 00:00:00', '?????? ????', '8674', '-10406.09', '-27650.39', '0', ''),
 ('23', '150', '2014-10-24 00:00:00', '???? ???? ?', '77777', '-90.00', '-27740.39', '0', ''),
 ('24', '150', '2014-06-30 00:00:00', '????? ??? (', '70094', '17809.58', '-28610.01', '0', ''),
 ('25', '150', '2014-06-30 00:00:00', '????? - ??\n', '99010', '1168.20', '0.00', '0', ''),
 ('26', '150', '2014-06-30 00:00:00', '?????? ??? ', '60360', '-2870.00', '0.00', '0', ''),
 ('27', '150', '2014-06-30 00:00:00', '?????? ??? ', '60364', '-1763.00', '0.00', '0', ''),
 ('28', '150', '2014-06-30 00:00:00', '?????? ??? ', '60367', '-3239.00', '-35313.81', '0', ''),
 ('29', '150', '2014-07-01 00:00:00', '????? ??? (', '70079', '6982.40', '0.00', '0', ''),
 ('30', '150', '2014-07-01 00:00:00', ' ????? ??\"\n', '77777', '-666.13', '0.00', '0', ''),
 ('31', '150', '2014-07-01 00:00:00', '???? ????? ', '3', '-20.40', '0.00', '0', ''),
 ('32', '150', '2014-07-01 00:00:00', '???? ????? ', '18', '-31.68', '0.00', '0', ''),
 ('33', '150', '2014-07-01 00:00:00', '????? ????\n', '21', '-7000.00', '-36049.62', '0', ''),
 ('34', '150', '2014-07-02 00:00:00', '????? ?????', '20020', '-1400.00', '0.00', '0', ''),
 ('35', '150', '2014-07-02 00:00:00', '???? ??\"? (', '283', '-5.90', '-37455.52', '0', ''),
 ('36', '150', '2014-06-30 00:00:00', '????? ??? (', '70094', '17809.58', '-28610.01', '0', ''),
 ('37', '150', '2014-06-30 00:00:00', '????? - ??\n', '99010', '1168.20', '0.00', '0', ''),
 ('38', '150', '2014-06-30 00:00:00', '?????? ??? ', '60360', '-2870.00', '0.00', '0', ''),
 ('39', '150', '2014-06-30 00:00:00', '?????? ??? ', '60364', '-1763.00', '0.00', '0', ''),
 ('40', '150', '2014-06-30 00:00:00', '?????? ??? ', '60367', '-3239.00', '-35313.81', '0', ''),
 ('41', '150', '2014-07-01 00:00:00', '????? ??? (', '70079', '6982.40', '0.00', '0', ''),
 ('42', '150', '2014-07-01 00:00:00', ' ????? ??\"\n', '77777', '-666.13', '0.00', '0', ''),
 ('43', '150', '2014-07-01 00:00:00', '???? ????? ', '3', '-20.40', '0.00', '0', ''),
 ('44', '150', '2014-07-01 00:00:00', '???? ????? ', '18', '-31.68', '0.00', '0', ''),
 ('45', '150', '2014-07-01 00:00:00', '????? ????\n', '21', '-7000.00', '-36049.62', '0', ''),
 ('46', '150', '2014-07-02 00:00:00', '????? ?????', '20020', '-1400.00', '0.00', '0', ''),
 ('47', '150', '2014-07-02 00:00:00', '???? ??\"? (', '283', '-5.90', '-37455.52', '0', ''),
 ('48', '150', '2014-06-30 00:00:00', '????? ??? (', '70094', '17809.58', '-28610.01', '0', ''),
 ('49', '150', '2014-06-30 00:00:00', '????? - ??\n', '99010', '1168.20', '0.00', '0', ''),
 ('50', '150', '2014-06-30 00:00:00', '?????? ??? ', '60360', '-2870.00', '0.00', '0', ''),
 ('51', '150', '2014-06-30 00:00:00', '?????? ??? ', '60364', '-1763.00', '0.00', '0', ''),
 ('52', '150', '2014-06-30 00:00:00', '?????? ??? ', '60367', '-3239.00', '-35313.81', '0', ''),
 ('53', '150', '2014-07-01 00:00:00', '????? ??? (', '70079', '6982.40', '0.00', '0', ''),
 ('54', '150', '2014-07-01 00:00:00', ' ????? ??\"\n', '77777', '-666.13', '0.00', '0', ''),
 ('55', '150', '2014-07-01 00:00:00', '???? ????? ', '3', '-20.40', '0.00', '0', ''),
 ('56', '150', '2014-07-01 00:00:00', '???? ????? ', '18', '-31.68', '0.00', '0', ''),
 ('57', '150', '2014-07-01 00:00:00', '????? ????\n', '21', '-7000.00', '-36049.62', '0', ''),
 ('58', '150', '2014-07-02 00:00:00', '????? ?????', '20020', '-1400.00', '0.00', '0', ''),
 ('59', '150', '2014-07-02 00:00:00', '???? ??\"? (', '283', '-5.90', '-37455.52', '0', '');



--
-- Structure for table `qwe_blackList`
--

DROP TABLE IF EXISTS `qwe_blackList`;

CREATE TABLE `qwe_blackList` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `value` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `qwe_bug`
--

DROP TABLE IF EXISTS `qwe_bug`;

CREATE TABLE `qwe_bug` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `body` varchar(255) NOT NULL DEFAULT '',
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Data for table `qwe_bug`
--

INSERT INTO `qwe_bug` (`id`, `url`, `title`, `body`) VALUES
 ('1', 'https://github.com/adam2314/tmp/issues/23', 'ee', 'grg'),
 ('2', 'https://github.com/adam2314/tmp/issues/1', 'wwwari', 'aaaari'),
 ('3', 'https://github.com/adam2314/tmp/issues/3', '??????', '???? ????');



--
-- Structure for table `qwe_config`
--

DROP TABLE IF EXISTS `qwe_config`;

CREATE TABLE `qwe_config` (
  `id` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `eavType` varchar(255) NOT NULL,
  `hidden` tinyint(1) NOT NULL,
  `priority` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `qwe_config`
--

INSERT INTO `qwe_config` (`id`, `value`, `eavType`, `hidden`, `priority`) VALUES
 ('company.1.warehouse', '101080', 'integer', '1', '0'),
 ('company.1.widget', '{\"invoiceReport\":true,\"chequeReport\":true,\"accReport\":true,\"outcomeReport\":false,\"salesReport\":false,\"docReport\":false}', 'integer', '1', '0'),
 ('company.10.warehouse', '101080', 'integer', '1', '0'),
 ('company.11.warehouse', '101080', 'integer', '1', '0'),
 ('company.8.warehouse', '101080', 'integer', '1', '0'),
 ('company.acc.assetvat', '3', 'integer', '1', '0'),
 ('company.acc.buyvat', '1', 'integer', '1', '0'),
 ('company.acc.custtax', '8', 'integer', '1', '0'),
 ('company.acc.irs', '16', 'integer', '1', '0'),
 ('company.acc.natinspay', '14', 'integer', '1', '0'),
 ('company.acc.openbalance', '9', 'integer', '1', '0'),
 ('company.acc.payvat', '4', 'integer', '1', '0'),
 ('company.acc.pretax', '13', 'integer', '1', '0'),
 ('company.acc.sellvat', '3', 'integer', '1', '0'),
 ('company.address', '???? ????? 1', 'string', '0', '40'),
 ('company.city', '??? ??', 'string', '0', '40'),
 ('company.cur', 'ILS', 'list(Currecies)', '0', '40'),
 ('company.doublebook', 'false', 'boolean', '0', '40'),
 ('company.en.address', '', 'string', '0', '40'),
 ('company.en.city', '', 'string', '0', '40'),
 ('company.en.name', 'another one', 'string', '0', '40'),
 ('company.fax', '', 'string', '0', '40'),
 ('company.logo', '236', 'file', '0', '40'),
 ('company.name', '???? ??????? ??? ????', 'string', '0', '1'),
 ('company.path', 'test', 'string', '0', '40'),
 ('company.pdfprint', 'false', 'boolean', '0', '40'),
 ('company.phone', '', 'string', '0', '40'),
 ('company.po', 'gg11', 'string', '0', '40'),
 ('company.postal', '', 'string', '0', '40'),
 ('company.seccur', '', 'list(Currecies)', '0', '40'),
 ('company.stock', 'false', 'boolean', '0', '40'),
 ('company.tax.irs', '1', 'select({1:\"monthly\",2:\"bi-monthly\"})', '0', '40'),
 ('company.tax.rate', '10', 'integer', '0', '40'),
 ('company.tax.vat', '1', 'select({1:\"monthly\",2:\"bi-monthly\"})', '0', '40'),
 ('company.transaction', '247', 'integer', '1', '0'),
 ('company.vat.id', '069924504', 'integer', '0', '2'),
 ('company.website', '', 'string', '0', '40'),
 ('company.zip', '52215', 'string', '0', '40'),
 ('paypal.apiLive', 'false', 'boolean', '0', '40'),
 ('paypal.apiPassword', '1377498089', '', '0', '40'),
 ('paypal.apiSignature', 'AAIVQYQw1NM1GpwV39qoyAlLZqNaArnmriH3xY5IQg-ENXEhq9jz27IB', '', '0', '40'),
 ('paypal.apiUsername', 'adam2314-facilitator_api1.gmail.com', '', '0', '40'),
 ('pelecard.password', 'Pelecard!Test', 'string', '0', '40'),
 ('pelecard.shopNo', '001', 'string', '0', '40'),
 ('pelecard.termNo', '0962210', 'string', '0', '40'),
 ('pelecard.userName', 'PeleTest2', 'string', '0', '40'),
 ('server.checkTime', '20130324114336', '', '1', '0'),
 ('server.dbVersion', '2.21', '', '1', '0'),
 ('server.Latest', '', '', '1', '0'),
 ('server.Version', '2.21', '', '1', '0'),
 ('server.wkhtmltopdf', 'xvfb-run -a -s \"-screen 0 1024x768x16\" wkhtmltopdf', 'string', '0', '40'),
 ('system.auth', '179403', 'string', '1', '0'),
 ('system.name', 'Linet 3.0', 'string', '1', '0'),
 ('system.vendor.name', 'Speedcomp', 'string', '1', '0'),
 ('system.vendor.vatnum', '069924504', 'string', '1', '0'),
 ('system.version', '3.0', 'string', '1', '0'),
 ('transactionType.chequedeposit', '4', 'integer', '1', '0'),
 ('transactionType.manual', '0', 'integer', '1', '0'),
 ('transactionType.openBalance', '16', 'integer', '1', '0'),
 ('transactionType.supplierPayment', '5', 'integer', '1', '0');



--
-- Structure for table `qwe_creditErrorCode`
--

DROP TABLE IF EXISTS `qwe_creditErrorCode`;

CREATE TABLE `qwe_creditErrorCode` (
  `ErrorID` int(3) NOT NULL DEFAULT '0',
  `ErrorText` varchar(158) DEFAULT NULL,
PRIMARY KEY (`ErrorID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Data for table `qwe_creditErrorCode`
--

INSERT INTO `qwe_creditErrorCode` (`ErrorID`, `ErrorText`) VALUES
 ('0', '???? ?????.'),
 ('1', '???? ???? ?????.'),
 ('2', '???? ???? ?????.'),
 ('3', '????? ????? ??????.'),
 ('4', '?????.'),
 ('5', '????? ???? ?????.'),
 ('6', '?.? ?? CVV ??????.'),
 ('7', '???? ?????? ????? ??????.'),
 ('8', '???? ?????? ???? ???? ????? ??????.'),
 ('9', '?? ????? ??????, ????? ????? ??????.'),
 ('10', '?????? ?????? ??\"? ????? ?????? (ESC) ?? COMPORT ?? ???? ?????? (WINDOWS).'),
 ('15', '??? ????? ??? ????? ?????? ??? ??????.'),
 ('17', '?? ?????? 4 ?????? ????????.'),
 ('19', '????? ????? INT_IN ???? ?-16 ?????.'),
 ('20', '???? ??? (INT_IN) ?? ????.'),
 ('21', '???? ?????? (NEG) ?? ???? ?? ?? ?????? - ??? ????? ?? ???? ?????? ???? ?? ????.'),
 ('22', '??? ????? ???????? ?? ???????? ?? ????.'),
 ('23', '???? ??????? (DATA) ?? ????.'),
 ('24', '???? ????? (START) ?? ????.'),
 ('25', '???? ????? ?????? ?????? ???? ??? - ??? ????? ?? ???? ?????? ???? ?? ????.'),
 ('26', '???? ????? ?????? ?????? ???? ??? - ??? ????? ?? ???? ?????? ???? ?? ????.'),
 ('27', '???? ?? ????? ?? ????? ???? ???? ???? ????? ??????? ?? ????? ????? ????.'),
 ('28', '???? ???? ????? ?? ????? ????? ?????? ?????? ??? ???.'),
 ('29', '???? ???? ?? ????? ????? ?????? ?????? ??? ????.'),
 ('30', '???? ????? ?????? ??? ???/?? ???? ?????? ??\' ???/??\' ????.'),
 ('31', '???? ?????? ??? ??? ?????? ?? ???\' ????.'),
 ('32', '???? ?????? ??? ??? - ??? ?????? ?? ??? ????? ???? ?? ???? .'),
 ('33', '????? ?? ????.'),
 ('34', '????? ?? ???? ???? ????? ?? ?? ??? ????? ????? ????.'),
 ('35', '????? ?? ???? ???? ???? ?? ??? ????? ??.'),
 ('36', '?? ????'),
 ('37', '????? ???????? - ???? ???? ???? ????? ???? ????? ????? + (????? ???? ???? ??\' ???????)'),
 ('38', '?? ???? ???? ???? ??? ???? ?????? ????? ???? ?????.'),
 ('39', '????? ?????? ?? ?????.'),
 ('40', '???? ?????? ??? ???? ????? ??\' ???.'),
 ('41', '??? ????, ?? ???? ???? ????? ?? ???? ?????? (J1,J2,J3).'),
 ('42', '???? ????, ?? ???? ???? ???? ????? ?? ???? ?????? (J1,J2,J3).'),
 ('43', '??????, ?? ???? ???? ???? ????? ?? ???? ?????? (J1,J2,J3).'),
 ('44', '???? ?? ???? ???? ????? ??? ????, ?? ???? ???? ???? (J5).'),
 ('45', '???? ?? ???? ???? ????? ???????, ?? ???? ???? ???? (J6).'),
 ('46', '?? ???? ?????, ?? ???? ???? ???? ????? ?? ???? ?????? (J1,J2,J3).'),
 ('47', '?? ???? ????? ??? ???? ?????? ???\"? ?? ???? ???? ???? ????? ?? ???? ??????.'),
 ('51', '???? ??? ?? ????.'),
 ('52', '?? ???? ?? ?????.'),
 ('53', '???? ?? ????? ????? ???. (????? ????? ??? ?? ??? ???? ?? ?????).'),
 ('57', '?? ????? ???? ????? ????.'),
 ('58', '?? ????? CVV2.'),
 ('59', '?? ?????? ???? ????? ????? ??-CVV2.'),
 ('60', '???? ABS ?? ???? ?????? ????? ??? ???????.'),
 ('61', '???? ????? ?? ???? ?? ???? ??????.'),
 ('62', '??? ???? ?? ????.'),
 ('63', '??? ???? ?? ????.'),
 ('64', '??? ????? ?? ????.'),
 ('65', '???? ?? ????.'),
 ('66', '???? ????? ????? ?/?? ????? ???? ???? ????? ???? ????????.'),
 ('67', '???? ???? ??????? ???? ????? ????? ???? ??.'),
 ('68', '?? ???? ?????? ????? ?? ???? ???? ????? ???? ????????.'),
 ('69', '???? ??? ?????? ??? ????.'),
 ('70', '?? ????? ????? ????? ???? ????.'),
 ('71', '???? ?????? ???? ????.'),
 ('72', '??\"? ?? ???? - ???? ????? ?????.'),
 ('73', '?????? ???? ??? ??? ??????? ??? ???\"?.'),
 ('74', '????? - ????? ????.'),
 ('75', '????? - ????? ?? ??\"? ?? ??????? ???? ?????.'),
 ('76', '????? - ?????? ??? ?????? ???\"? ???? ??????? ??????.'),
 ('77', '???? ???? ???? ????.'),
 ('80', '????? \"??? ??????\" ???? ????? ?? ?????.'),
 ('99', '?? ????? ?????/?????/????? ???? TRAN.'),
 ('101', '??? ????? ????? ????? ??????.'),
 ('106', '????? ??? ????? ?????? ?????? ?????? ???? ?????.'),
 ('107', '???? ????? ???? ??? - ??? ????? ???????.'),
 ('108', '????? ??? ????? ???? ?????? ???????.'),
 ('109', '????? ??? ????? ?????? ?? ??? ????? 587.'),
 ('110', '????? ??? ????? ?????? ???? ?????.'),
 ('111', '????? ??? ????? ????? ????????.'),
 ('112', '????? ??? ????? ????? ?????/????? ???? ????????.'),
 ('113', '????? ??? ????? ????? ???????.'),
 ('114', '????? ??? ????? ????? \"????? ????\".'),
 ('115', '????? ??? ????? ????? ???????.'),
 ('116', '????? ??? ????? ????? ??????.'),
 ('117', '????? ??? ????? ????? ??????/??????/??????.'),
 ('118', '????? ??? ????? ?????? ?????????.'),
 ('119', '????? ??? ????? ?????? ???? ?????.'),
 ('120', '????? ??? ????? ?????? ?????.'),
 ('121', '????? ??? ????? ?????? ????.'),
 ('122', '????? ??? ????? ?????? ???? ??????? ??\"?.'),
 ('123', '????? ??? ????? ????? ??????/??????/?????? ???? ????? ??.'),
 ('124', '????? ??? ????? ?????? ????? ???????? ??????? ???????.'),
 ('125', '????? ??? ????? ?????? ????? ???????? ??????? ????.'),
 ('126', '????? ??? ????? ???? ?????? ??.'),
 ('127', '????? ??? ????? ????? ???? ????? ??? ??????? ???? ?????.'),
 ('128', '????? ??? ????? ???? ?????? ???? ??? ??????? ?-3.'),
 ('129', '????? ??? ????? ???? ???? ???? ??? ????.'),
 ('130', '????? ?? ???? ???? ???? ??????.'),
 ('131', '????? ?? ???? ???? ???? ??????/??????/??????.'),
 ('132', '????? ?? ???? ???? ?????? ??????? (?????? ?? ????????).'),
 ('133', '????? ?? ??? ?? ?? ????? ??????? ????? ?? ???????.'),
 ('134', '????? ?? ???? ??\"? ????? ?????? (VECTOR1 ?? ???????) - ??\' ?????? ?????? - ????.'),
 ('135', '????? ?? ???? ???? ?????? ??????? ??\"? ????? ?????? (VECTOR1 ?? ???????).'),
 ('136', '?????? ???? ?????? ??????? ??? ???? ????? ???? ?????? ??\"? ????? ?????? (VECTOR20 ?? ????).'),
 ('137', '?????? ?????? (7 ?????) ?? ???? ??\"? ????? ?????? (VECTOR21 ?? ??????).'),
 ('138', '????? ?? ???? ???? ?????? ???????? ?? ?? ????? ??????? ????? ?? ???????.'),
 ('139', '???? ??????? ???? ???? ?? ?? ????? ??????? ????? ?? ???????.'),
 ('140', '?????? ???? ??????? ?? ????? ???? ?????? ?????? ????????.'),
 ('141', '????? ??????? ?? ???? ??\"? ????? ?????? (VECTOR5 ?? ???????).'),
 ('142', '??? ???? ?? ??? ??\"? ????? ?????? (VECTOR6 ?? ???????).'),
 ('143', '?????? ?????? (2 ?????) ?? ???? ??\"? ????? ?????? (VECTOR7 ?? ???????).'),
 ('144', '??? ???? ?? ??? ??\"? ????? ?????? (VECTOR12 ?? ????).'),
 ('145', '??? ???? ?? ??? ??\"? ????? ?????? (VECTOR13 ?? ????).'),
 ('146', '?????? ???? ????? ???? ???? ?????? ????.'),
 ('147', '????? ?? ???? ???? ?????? ???????? ??\"? ????? 31 ?? ?????????.'),
 ('148', '????? ?? ???? ???? ?????? ???????? ?????? ???? ??\"? ????? 31 ?? ?????????.'),
 ('149', '????? ?? ???? ???? ?????? ???????? ??\"? ????? 31 ?? ?????????.'),
 ('150', '????? ?? ????? ??????? ???? ?????.'),
 ('151', '????? ?? ????? ??????? ??\"?.'),
 ('152', '??? ?????? ?? ????.'),
 ('153', '????? ?? ???? ???? ?????? ????? ???? (???? +30/) ??\"? ????? ?????? (VECTOR21 ?? ??????).'),
 ('154', '????? ?? ???? ???? ?????? ???? ????? ??\"? ????? ?????? (VECTOR21 ?? ??????).'),
 ('155', '???? ???????? ?????? ????? ????? ??? ????.'),
 ('156', '???? ??????? ????? ????? ?? ????.'),
 ('157', '???? 0 ???? ????? ?? ????? ?? ????? ???? ?? ?????.'),
 ('158', '???? 0 ???? ????? ?? ????? ?? ????? ???? ?????.'),
 ('159', '???? 0 ???? ????? ?? ????? ???? ????? ???????.'),
 ('160', '???? 0 ???? ????? ?? ????? ???????.'),
 ('161', '???? 0 ???? ????? ?? ????? ????.'),
 ('162', '???? 0 ???? ????? ?? ????? ???????.'),
 ('163', '????? ?????? ?????? ??? ????? ???\"? ?? ???? ???? ?????? ????????.'),
 ('164', '?????? ????? JCB ???? ???? ?????? ?? ?????? ????.'),
 ('165', '???? ???????/??????/?????? ???? ????? ?????.'),
 ('166', '????? ?????? ?? ????? ?? ?????.'),
 ('167', '?? ???? ???? ???? ??????/??????/?????? ???????.'),
 ('168', '????? ??? ????? ????? ?????? ?? ??? ????? ??.'),
 ('169', '?? ???? ???? ???? ???? ?? ????? ???? ??????.'),
 ('170', '???? ???? ???????/??????/?????? ???? ??????.'),
 ('171', '?? ???? ???? ???? ?????? ??????/????? ???? ?????.'),
 ('172', '?? ???? ???? ???? ????? (???? ???? ?? ???? ????? ???? ???).'),
 ('173', '???? ?????.'),
 ('174', '????? ??? ????? ?????? ???? ?????? ??.'),
 ('175', '????? ??? ????? ?????? ????? ?????? ??.'),
 ('176', '????? ???? ??? ??\"? ????? ?????? (????? 1 ?? ???????).'),
 ('177', '?????? ??? ?? ???? ???? \"???? ????\" ??? \"???? ???? ?????? ???\".'),
 ('178', '???? ???? ???? ???? ???????/??????/??????.'),
 ('179', '???? ???? ???? ???? ????? ?????? ????.'),
 ('180', '?????? ?????? ?? ???? ???? ???? ???????.'),
 ('200', '???? ???? ??? ??? � ??? ?????? ????????.'),
 ('250', '????? ???? (?? ?????, ?????, ???? ???? ?? ??????).'),
 ('256', '???? ???? (TransactionNumber) - ???? ?????? ???? ????? ???? (TransactionDate).'),
 ('257', '?? ???? ???? ????'),
 ('259', '???? ??\"? - ??? ???? ???? ??????'),
 ('260', '??? ?? ???? ???????? ???????? ???????? ?? ???? (??\"? ????? ?? ??????? ???? ????? ?????(.'),
 ('280', '??\"? time-out, ??\"?? ??? ???? ???? ????? ??????. ????? ????? ????? ?? ????? ???\"?.');



--
-- Structure for table `qwe_curRates`
--

DROP TABLE IF EXISTS `qwe_curRates`;

CREATE TABLE `qwe_curRates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `currency_id` varchar(3) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `value` decimal(10,5) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Data for table `qwe_curRates`
--

INSERT INTO `qwe_curRates` (`id`, `currency_id`, `date`, `value`) VALUES
 ('1', 'ILS', '2000-01-01 00:00:01', '1.00000'),
 ('2', 'USD', '2014-07-04 16:32:59', '3.45000'),
 ('3', 'CAD', '2014-07-04 16:35:01', '3.78000');



--
-- Structure for table `qwe_currencies`
--

DROP TABLE IF EXISTS `qwe_currencies`;

CREATE TABLE `qwe_currencies` (
  `id` varchar(3) NOT NULL DEFAULT '',
  `code` varchar(3) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `symbol` varchar(17) DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `qwe_currencies`
--

INSERT INTO `qwe_currencies` (`id`, `code`, `name`, `symbol`) VALUES
 ('AED', '784', 'United Arab Emirates dirham', '?.?'),
 ('AFN', '971', 'Afghani', '?'),
 ('ALL', '008', 'Lek', 'L'),
 ('AMD', '051', 'Armenian dram', '??.'),
 ('ANG', '532', 'Netherlands Antillean guilder', '�'),
 ('AOA', '973', 'Kwanza', 'Kz'),
 ('ARS', '032', 'Argentine peso', '$'),
 ('AUD', '036', 'Australian dollar', '$'),
 ('AWG', '533', 'Aruban guilder', '�'),
 ('AZN', '944', 'Azerbaijanian manat', NULL),
 ('BAM', '977', 'Convertible marks', 'KM'),
 ('BBD', '052', 'Barbados dollar', '$'),
 ('BDT', '050', 'Bangladeshi taka', '?'),
 ('BGN', '975', 'Bulgarian lev', '??'),
 ('BHD', '048', 'Bahraini dinar', '?.?'),
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
 ('CHE', '947', 'WIR euro (complementary currency)', '�'),
 ('CHF', '756', 'Swiss franc', 'Fr'),
 ('CHW', '948', 'WIR franc (complementary currency)', 'Fr'),
 ('CLF', '990', 'Unidad de Fomento (funds code)', NULL),
 ('CLP', '152', 'Chilean peso', '$'),
 ('CNY', '156', 'Renminbi', '�'),
 ('COP', '170', 'Colombian peso', '$'),
 ('COU', '970', 'Unidad de Valor Real', NULL),
 ('CRC', '188', 'Costa Rican colon', '?'),
 ('CUP', '192', 'Cuban peso', '$'),
 ('CVE', '132', 'Cape Verde escudo', NULL),
 ('CZK', '203', 'Czech koruna', 'K?'),
 ('DJF', '262', 'Djibouti franc', 'Fr'),
 ('DKK', '208', 'Danish krone', 'kr'),
 ('DOP', '214', 'Dominican peso', '$'),
 ('DZD', '012', 'Algerian dinar', '?.?'),
 ('EEK', '233', 'Kroon', 'KR'),
 ('EGP', '818', 'Egyptian pound', '?.?'),
 ('ERN', '232', 'Nakfa', 'Nfk'),
 ('ETB', '230', 'Ethiopian birr', NULL),
 ('EUR', '978', 'Euro', '�'),
 ('FJD', '242', 'Fiji dollar', '$'),
 ('FKP', '238', 'Falkland Islands pound', '�'),
 ('GBP', '826', 'Pound sterling', '�'),
 ('GEL', '981', 'Lari', '?'),
 ('GHS', '936', 'Cedi', NULL),
 ('GIP', '292', 'Gibraltar pound', '�'),
 ('GMD', '270', 'Dalasi', 'D'),
 ('GNF', '324', 'Guinea franc', 'Fr'),
 ('GTQ', '320', 'Quetzal', 'Q'),
 ('GYD', '328', 'Guyana dollar', '$'),
 ('HKD', '344', 'Hong Kong dollar', '$'),
 ('HNL', '340', 'Lempira', 'L'),
 ('HRK', '191', 'Croatian kuna', 'kn'),
 ('HTG', '332', 'Haiti gourde', 'G'),
 ('HUF', '348', 'Forint', 'Ft'),
 ('IDR', '360', 'Rupiah', '?'),
 ('ILS', '376', 'Israeli new sheqel', '?'),
 ('INR', '356', 'Indian rupee', '?'),
 ('IQD', '368', 'Iraqi dinar', '?.?'),
 ('IRR', '364', 'Iranian rial', '?'),
 ('ISK', '352', 'Iceland krona', 'kr'),
 ('JMD', '388', 'Jamaican dollar', '$'),
 ('JOD', '400', 'Jordanian dinar', '?.?'),
 ('JPY', '392', 'Japanese yen', '�'),
 ('KES', '404', 'Kenyan shilling', 'Sh'),
 ('KGS', '417', 'Som', NULL),
 ('KHR', '116', 'Riel', '?'),
 ('KMF', '174', 'Comoro franc', 'Fr'),
 ('KPW', '408', 'North Korean won', '?'),
 ('KRW', '410', 'South Korean won', '?'),
 ('KWD', '414', 'Kuwaiti dinar', '?.?'),
 ('KYD', '136', 'Cayman Islands dollar', '$'),
 ('KZT', '398', 'Tenge', '?'),
 ('LAK', '418', 'Kip', '?'),
 ('LBP', '422', 'Lebanese pound', '?.?'),
 ('LKR', '144', 'Sri Lanka rupee', '??'),
 ('LRD', '430', 'Liberian dollar', '$'),
 ('LSL', '426', 'Loti', 'L'),
 ('LTL', '440', 'Lithuanian litas', 'Lt'),
 ('LVL', '428', 'Latvian lats', 'Ls'),
 ('LYD', '434', 'Libyan dinar', '?.?'),
 ('MAD', '504', 'Moroccan dirham', '?.?.'),
 ('MDL', '498', 'Moldovan leu', 'L'),
 ('MGA', '969', 'Malagasy ariary', NULL),
 ('MKD', '807', 'Denar', '???'),
 ('MMK', '104', 'Kyat', 'K'),
 ('MNT', '496', 'Tugrik', '?'),
 ('MOP', '446', 'Pataca', 'P'),
 ('MRO', '478', 'Ouguiya', 'UM'),
 ('MUR', '480', 'Mauritius rupee', '?'),
 ('MVR', '462', 'Rufiyaa', '?'),
 ('MWK', '454', 'Kwacha', 'MK'),
 ('MXN', '484', 'Mexican peso', '$'),
 ('MXV', '979', 'Mexican Unidad de Inversion (UDI) (funds code)', NULL),
 ('MYR', '458', 'Malaysian ringgit', 'RM'),
 ('MZN', '943', 'Metical', 'MTn'),
 ('NAD', '516', 'Namibian dollar', '$'),
 ('NGN', '566', 'Naira', '?'),
 ('NIO', '558', 'Cordoba oro', 'C$'),
 ('NOK', '578', 'Norwegian krone', 'kr'),
 ('NPR', '524', 'Nepalese rupee', '?'),
 ('NZD', '554', 'New Zealand dollar', '$'),
 ('OMR', '512', 'Rial Omani', '?.?.'),
 ('PAB', '590', 'Balboa', 'B/.'),
 ('PEN', '604', 'Nuevo sol', 'S/.'),
 ('PGK', '598', 'Kina', 'K'),
 ('PHP', '608', 'Philippine peso', '?'),
 ('PKR', '586', 'Pakistan rupee', '?'),
 ('PLN', '985', 'Zloty', 'z?'),
 ('PYG', '600', 'Guarani', '?'),
 ('QAR', '634', 'Qatari rial', '?.?'),
 ('RON', '946', 'Romanian new leu', 'L'),
 ('RSD', '941', 'Serbian dinar', 'din. ?? ???.'),
 ('RUB', '643', 'Russian rouble', '?.'),
 ('RWF', '646', 'Rwanda franc', 'Fr'),
 ('SAR', '682', 'Saudi riyal', '?.?'),
 ('SBD', '090', 'Solomon Islands dollar', '$'),
 ('SCR', '690', 'Seychelles rupee', '?'),
 ('SDG', '938', 'Sudanese pound', NULL),
 ('SEK', '752', 'Swedish krona', 'kr'),
 ('SGD', '702', 'Singapore dollar', '$'),
 ('SHP', '654', 'Saint Helena pound', '�'),
 ('SKK', '703', 'Slovak koruna', 'Sk'),
 ('SLL', '694', 'Leone', 'Le'),
 ('SOS', '706', 'Somali shilling', 'Sh'),
 ('SRD', '968', 'Surinam dollar', '$'),
 ('STD', '678', 'Dobra', 'Db'),
 ('SYP', '760', 'Syrian pound', '?.?'),
 ('SZL', '748', 'Lilangeni', 'L'),
 ('THB', '764', 'Baht', '?'),
 ('TJS', '972', 'Somoni', '??'),
 ('TMM', '795', 'Manat', 'm'),
 ('TND', '788', 'Tunisian dinar', '?.?'),
 ('TOP', '776', 'Pa\'anga', 'T$'),
 ('TRY', '949', 'New Turkish lira', '?'),
 ('TTD', '780', 'Trinidad and Tobago dollar', '$'),
 ('TWD', '901', 'New Taiwan dollar', '$'),
 ('TZS', '834', 'Tanzanian shilling', 'Sh'),
 ('UAH', '980', 'Hryvnia', '?'),
 ('UGX', '800', 'Uganda shilling', 'Sh'),
 ('USD', '840', 'US dollar', '$'),
 ('USN', '997', 'United States dollar (next day) (funds code)', NULL),
 ('UYU', '858', 'Peso Uruguayo', '$'),
 ('UZS', '860', 'Uzbekistan som', NULL),
 ('VEF', '937', 'Venezuelan bol?var fuerte', 'Bs'),
 ('VND', '704', 'Vietnamese d?ng', '?'),
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
 ('YER', '886', 'Yemeni rial', '?'),
 ('ZAR', '710', 'South African rand', 'R'),
 ('ZMK', '894', 'Kwacha', 'ZK'),
 ('ZWD', '716', 'Zimbabwe dollar', '$');



--
-- Structure for table `qwe_databases`
--

DROP TABLE IF EXISTS `qwe_databases`;

CREATE TABLE `qwe_databases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `string` varchar(255) NOT NULL,
  `prefix` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=143 DEFAULT CHARSET=utf8;

--
-- Data for table `qwe_databases`
--

INSERT INTO `qwe_databases` (`id`, `string`, `prefix`, `user`, `password`) VALUES
 ('1', 'mysql:host=localhost;dbname=linetmain', 'qwe_', 'root', 'VBy7t6r5'),
 ('20', 'mysql:host=localhost;dbname=linetmain', 'Wv5f_', 'root', 'VBy7t6r5'),
 ('23', 'mysql:host=localhost;dbname=linetmain', 'zSFn_', 'root', 'VBy7t6r5'),
 ('139', 'mysql:host=localhost;dbname=linetmain', '5Wx8_', 'root', 'VBy7t6r5'),
 ('140', 'mysql:host=localhost;dbname=linetmain', 'jksW_', 'root', 'VBy7t6r5'),
 ('141', 'mysql:host=localhost;dbname=linetmain', '5hex_', 'root', 'VBy7t6r5'),
 ('142', 'mysql:host=localhost;dbname=linetmain', 'DP94_', 'root', 'VBy7t6r5');



--
-- Structure for table `qwe_databasesPerm`
--

DROP TABLE IF EXISTS `qwe_databasesPerm`;

CREATE TABLE `qwe_databasesPerm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `database_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=utf8;

--
-- Data for table `qwe_databasesPerm`
--

INSERT INTO `qwe_databasesPerm` (`id`, `user_id`, `database_id`, `level_id`) VALUES
 ('1', '1', '1', '1'),
 ('20', '1', '20', '1'),
 ('22', '8', '1', '1'),
 ('24', '10', '1', '1'),
 ('29', '1', '22', '1'),
 ('30', '1', '23', '1'),
 ('31', '1', '24', '1'),
 ('32', '1', '25', '1'),
 ('33', '1', '26', '1'),
 ('34', '1', '27', '1'),
 ('35', '1', '28', '1'),
 ('37', '1', '30', '1'),
 ('38', '1', '31', '1'),
 ('39', '1', '32', '1'),
 ('40', '1', '33', '1'),
 ('41', '1', '34', '1'),
 ('42', '1', '35', '1'),
 ('43', '1', '36', '1'),
 ('44', '1', '37', '1'),
 ('45', '1', '38', '1'),
 ('46', '1', '39', '1'),
 ('47', '1', '40', '1'),
 ('48', '1', '41', '1'),
 ('49', '1', '42', '1'),
 ('50', '1', '43', '1'),
 ('51', '1', '44', '1'),
 ('52', '1', '45', '1'),
 ('53', '1', '46', '1'),
 ('54', '1', '47', '1'),
 ('55', '1', '48', '1'),
 ('56', '1', '49', '1'),
 ('57', '1', '50', '1'),
 ('58', '1', '51', '1'),
 ('59', '1', '52', '1'),
 ('60', '1', '53', '1'),
 ('61', '1', '54', '1'),
 ('62', '1', '55', '1'),
 ('63', '1', '56', '1'),
 ('64', '1', '57', '1'),
 ('65', '1', '58', '1'),
 ('66', '1', '59', '1'),
 ('67', '1', '60', '1'),
 ('68', '1', '61', '1'),
 ('69', '1', '62', '1'),
 ('70', '1', '63', '1'),
 ('71', '1', '64', '1'),
 ('72', '1', '65', '1'),
 ('73', '1', '66', '1'),
 ('74', '1', '67', '1'),
 ('75', '1', '68', '1'),
 ('76', '1', '69', '1'),
 ('77', '1', '70', '1'),
 ('78', '1', '71', '1'),
 ('79', '1', '72', '1'),
 ('80', '1', '73', '1'),
 ('81', '1', '74', '1'),
 ('82', '1', '75', '1'),
 ('83', '1', '76', '1'),
 ('84', '1', '77', '1'),
 ('85', '1', '78', '1'),
 ('86', '1', '79', '1'),
 ('87', '1', '80', '1'),
 ('88', '1', '81', '1'),
 ('89', '1', '82', '1'),
 ('90', '1', '83', '1'),
 ('91', '1', '84', '1'),
 ('92', '1', '85', '1'),
 ('93', '1', '86', '1'),
 ('94', '1', '87', '1'),
 ('95', '1', '88', '1'),
 ('96', '1', '89', '1'),
 ('97', '1', '90', '1'),
 ('98', '1', '91', '1'),
 ('99', '1', '92', '1'),
 ('100', '1', '93', '1'),
 ('101', '1', '94', '1'),
 ('102', '1', '95', '1'),
 ('103', '1', '96', '1'),
 ('104', '1', '97', '1'),
 ('105', '1', '98', '1'),
 ('106', '1', '99', '1'),
 ('107', '1', '100', '1'),
 ('108', '1', '101', '1'),
 ('109', '1', '102', '1'),
 ('110', '1', '103', '1'),
 ('111', '1', '104', '1'),
 ('112', '1', '105', '1'),
 ('113', '1', '106', '1'),
 ('114', '1', '107', '1'),
 ('115', '1', '108', '1'),
 ('116', '1', '109', '1'),
 ('117', '1', '110', '1'),
 ('118', '1', '111', '1'),
 ('119', '1', '112', '1'),
 ('120', '1', '113', '1'),
 ('121', '1', '114', '1'),
 ('122', '1', '115', '1'),
 ('123', '1', '116', '1'),
 ('124', '1', '117', '1'),
 ('125', '1', '118', '1'),
 ('126', '1', '119', '1'),
 ('127', '1', '120', '1'),
 ('128', '1', '121', '1'),
 ('129', '1', '122', '1'),
 ('130', '1', '123', '1'),
 ('131', '1', '124', '1'),
 ('132', '1', '125', '1'),
 ('133', '1', '126', '1'),
 ('134', '1', '127', '1'),
 ('135', '1', '128', '1'),
 ('136', '1', '129', '1'),
 ('137', '1', '130', '1'),
 ('138', '1', '131', '1'),
 ('139', '1', '132', '1'),
 ('140', '1', '133', '1'),
 ('141', '1', '134', '1'),
 ('142', '1', '135', '1'),
 ('143', '1', '136', '1'),
 ('144', '1', '137', '1'),
 ('145', '1', '138', '1'),
 ('146', '1', '139', '1'),
 ('147', '1', '140', '1'),
 ('148', '1', '141', '1'),
 ('149', '1', '142', '1');



--
-- Structure for table `qwe_docCheques`
--

DROP TABLE IF EXISTS `qwe_docCheques`;

CREATE TABLE `qwe_docCheques` (
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
-- Data for table `qwe_docCheques`
--

INSERT INTO `qwe_docCheques` (`doc_id`, `type`, `refnum`, `creditcompany`, `cheque_num`, `bank`, `branch`, `cheque_acct`, `cheque_date`, `currency_id`, `sum`, `bank_refnum`, `dep_date`, `line`) VALUES
 ('145', '1', '', NULL, '0', '0', '0', NULL, '0000-00-00 00:00:00', '', '17700.00', NULL, NULL, '1'),
 ('147', '1', '', NULL, '0', '0', '0', NULL, '0000-00-00 00:00:00', '', '525.10', NULL, NULL, '1'),
 ('160', '1', '', NULL, '', '', '', '', '1970-01-01 02:01:00', 'ILS', '50.00', NULL, '1970-01-01 02:01:00', '1'),
 ('165', '1', '', NULL, '', '', '', '', '1970-01-01 02:01:00', 'ILS', '15.00', NULL, '1970-01-01 02:01:00', '1'),
 ('166', '1', '', NULL, '', '', '', '', '1970-01-01 02:01:00', 'ILS', '15.00', NULL, '1970-01-01 02:01:00', '1'),
 ('180', '1', '', NULL, '', NULL, NULL, '', '0000-00-00 00:00:00', 'ILS', '500.00', NULL, '0000-00-00 00:00:00', '1'),
 ('181', '1', '', NULL, '', NULL, NULL, '', '0000-00-00 00:00:00', 'ILS', '500.00', '117', '0000-00-00 00:00:00', '1'),
 ('192', '2', '', NULL, '', NULL, NULL, '', '0000-00-00 00:00:00', 'ILS', '400.00', '221', '0000-00-00 00:00:00', '2'),
 ('192', '5', '', NULL, '', NULL, NULL, '', '1970-01-01 02:01:00', 'ILS', '500.00', '130', '1970-01-01 02:01:00', '3'),
 ('192', '1', '', NULL, '', NULL, NULL, '', '0000-00-00 00:00:00', 'ILS', '600.00', '221', '0000-00-00 00:00:00', '4'),
 ('193', '1', '', NULL, '', NULL, NULL, '', '1970-01-01 02:01:00', 'ILS', '500.00', '130', '1970-01-01 02:01:00', '1'),
 ('194', '1', '', NULL, '', NULL, NULL, '', '0000-00-00 00:00:00', 'ILS', '300.00', '221', '0000-00-00 00:00:00', '1'),
 ('195', '1', '', NULL, '', NULL, NULL, '', '1970-01-01 02:01:00', 'ILS', '50.00', '130', '1970-01-01 02:01:00', '1'),
 ('196', '1', '', NULL, '', NULL, NULL, '', '2014-06-01 00:06:00', 'ILS', '50.00', '221', '1970-01-01 02:01:00', '1'),
 ('197', '1', '', NULL, '', NULL, NULL, '', '2014-01-31 00:01:00', 'ILS', '50.00', '130', '1970-01-01 02:01:00', '1'),
 ('204', '2', '123', '321', '321', NULL, NULL, '354123', '2014-07-31 00:07:00', 'ILS', '670.00', '134', '0000-00-00 00:00:00', '1'),
 ('220', '1', '', NULL, '', NULL, NULL, '', '1970-01-01 02:01:00', 'ILS', '145.00', '221', '1970-01-01 02:01:00', '1'),
 ('221', '1', '', NULL, '', NULL, NULL, '', '0000-00-00 00:00:00', 'ILS', '150.00', '160', '0000-00-00 00:00:00', '1'),
 ('303', '4', '', '150', '5758757567', NULL, NULL, '5656565', '2014-07-16 00:07:00', 'ILS', '3658.00', '221', '0000-00-00 00:00:00', '1'),
 ('305', '1', '', '150', '', NULL, NULL, '', '0000-00-00 00:00:00', 'ILS', '513.30', '221', '0000-00-00 00:00:00', '1'),
 ('306', '1', '', '150', '', NULL, NULL, '', '1970-01-01 02:01:00', 'ILS', '500.00', NULL, '1970-01-01 02:01:00', '1'),
 ('307', '3', '', '150', '', NULL, NULL, '', '1970-01-01 02:01:00', 'ILS', '500.00', NULL, '1970-01-01 02:01:00', '1'),
 ('308', '3', '', '150', '', NULL, NULL, '', '1970-01-01 02:01:00', 'ILS', '500.00', NULL, '1970-01-01 02:01:00', '1'),
 ('309', '3', '', '150', '', NULL, NULL, '', '1970-01-01 02:01:00', 'ILS', '0.00', NULL, '1970-01-01 02:01:00', '1'),
 ('310', '3', '', '150', '', NULL, NULL, '', '1970-01-01 02:01:00', 'ILS', '0.00', NULL, '1970-01-01 02:01:00', '1'),
 ('311', '3', '', '150', '', NULL, NULL, '', '1970-01-01 02:01:00', 'ILS', '100.00', NULL, '1970-01-01 02:01:00', '1'),
 ('312', '3', '', '150', '', NULL, NULL, '', '1970-01-01 02:01:00', 'ILS', '100.00', NULL, '1970-01-01 02:01:00', '1'),
 ('313', '3', '', '150', '', NULL, NULL, '', '1970-01-01 02:01:00', 'ILS', '111.00', NULL, '1970-01-01 02:01:00', '1'),
 ('314', '1', '', '150', '', NULL, NULL, '', '1970-01-01 02:01:00', 'ILS', '3.00', NULL, '1970-01-01 02:01:00', '1'),
 ('315', '3', '', '150', '', NULL, NULL, '', '1970-01-01 02:01:00', 'ILS', '3211.00', NULL, '1970-01-01 02:01:00', '1'),
 ('316', '3', '', '150', '', NULL, NULL, '', '1970-01-01 02:01:00', 'ILS', '222.00', NULL, '1970-01-01 02:01:00', '1'),
 ('317', '3', '', '150', '', NULL, NULL, '', '1970-01-01 02:01:00', 'ILS', '232.00', NULL, '1970-01-01 02:01:00', '1'),
 ('318', '3', '', '150', '', NULL, NULL, '', '1970-01-01 02:01:00', 'ILS', '232.00', NULL, '1970-01-01 02:01:00', '1'),
 ('319', '3', '', '150', '', NULL, NULL, '', '1970-01-01 02:01:00', 'ILS', '0.00', NULL, '1970-01-01 02:01:00', '1'),
 ('320', '3', '', '150', '', NULL, NULL, '', '1970-01-01 02:01:00', 'ILS', '357.00', NULL, '1970-01-01 02:01:00', '1'),
 ('321', '3', '', '150', '', NULL, NULL, '', '1970-01-01 02:01:00', 'ILS', '333.00', NULL, '1970-01-01 02:01:00', '1'),
 ('322', '3', '', '150', '', NULL, NULL, '', '1970-01-01 02:01:00', 'ILS', '555.00', NULL, '1970-01-01 02:01:00', '1'),
 ('323', '3', '', '150', '', NULL, NULL, '', '1970-01-01 02:01:00', 'ILS', '123.00', NULL, '1970-01-01 02:01:00', '1'),
 ('324', '3', '', '150', '', NULL, NULL, '', '1970-01-01 02:01:00', 'ILS', '741.00', NULL, '1970-01-01 02:01:00', '1'),
 ('325', '1', '', '150', '', NULL, NULL, '', '1970-01-01 02:01:00', 'ILS', '3333.00', NULL, '1970-01-01 02:01:00', '1'),
 ('326', '1', '', '150', '', NULL, NULL, '', '1970-01-01 02:01:00', 'ILS', '111.00', NULL, '1970-01-01 02:01:00', '1'),
 ('327', '3', '', '150', '', NULL, NULL, '', '1970-01-01 02:01:00', 'ILS', '357.00', NULL, '1970-01-01 02:01:00', '1'),
 ('328', '3', '', '150', '', NULL, NULL, '', '1970-01-01 02:01:00', 'ILS', '1000.00', NULL, '1970-01-01 02:01:00', '1'),
 ('329', '6', '', '150', '', NULL, NULL, '', '1970-01-01 02:01:00', 'ILS', '100.00', NULL, '1970-01-01 02:01:00', '1');



--
-- Structure for table `qwe_docDetails`
--

DROP TABLE IF EXISTS `qwe_docDetails`;

CREATE TABLE `qwe_docDetails` (
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
  PRIMARY KEY (`doc_id`,`line`),
  KEY `doc_id` (`doc_id`),
  KEY `item_id` (`item_id`),
  KEY `unit_id` (`unit_id`),
KEY `unit_id_2` (`unit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `qwe_docDetails`
--

INSERT INTO `qwe_docDetails` (`doc_id`, `item_id`, `name`, `description`, `qty`, `iItem`, `ihItem`, `unit_id`, `currency_id`, `iTotal`, `ihTotal`, `iVatRate`, `line`) VALUES
 ('145', '56', 'M16', NULL, '10.00', '15000.00', '0.00', '0', '', '15000.00', NULL, '2700.00', '1'),
 ('146', '3351', '?????', NULL, '10.00', '445.00', '0.00', '0', '', '445.00', NULL, '80.00', '1'),
 ('148', '3366', 'M16', '', NULL, '15000.00', '0.00', '0', 'ILS', '15000.00', '15000.00', '0.00', '1'),
 ('149', '3366', 'M16', '', '1.00', '15000.00', '0.00', '0', 'ILS', '15000.00', '15000.00', '0.00', '1'),
 ('150', '3378', '13', '', NULL, '0.00', '0.00', '0', 'ILS', '0.00', '0.00', '0.00', '1'),
 ('151', '3366', 'M16', '', NULL, '15000.00', '0.00', '0', 'ILS', '15000.00', '15000.00', '0.00', '1'),
 ('152', '3366', 'M16', NULL, NULL, '15000.00', '0.00', '0', 'ILS', '150000.00', '150000.00', '0.00', '1'),
 ('153', '3366', 'M16', NULL, '1.00', '15000.00', '0.00', '0', 'ILS', '15000.00', '15000.00', '0.00', '1'),
 ('154', '3366', 'M16', NULL, '1.00', '15000.00', '0.00', '0', 'ILS', '15000.00', '15000.00', '0.00', '1'),
 ('155', '3366', 'M16', NULL, '1.00', '15000.00', '0.00', '0', 'ILS', '15000.00', '15000.00', '0.00', '1'),
 ('156', '3366', 'M16', NULL, '1.00', '15000.00', '0.00', '0', 'ILS', '15000.00', '15000.00', '0.00', '1'),
 ('157', '3372', '?????', NULL, '1.00', '1.00', '0.00', '0', 'ILS', '1.00', '1.00', '0.00', '1'),
 ('158', '3378', '13', NULL, '1.00', '21.00', '0.00', '0', 'ILS', '21.00', '21.00', '0.00', '1'),
 ('159', '3366', 'M16', 'gre123', '1.00', '15000.00', '0.00', '0', 'ILS', '15000.00', '15000.00', '0.00', '1'),
 ('161', '3366', 'M16', 'jyukguk', '1.00', '15000.00', '0.00', '0', 'ILS', '15000.00', '15000.00', '0.00', '1'),
 ('162', '3367', '??????', '', '1.00', '15.00', '0.00', '0', 'ILS', '15.00', '15.00', '0.00', '1'),
 ('163', '3367', '??????', '', '1.00', '15.00', '0.00', '0', 'ILS', '15.00', '15.00', '0.00', '1'),
 ('164', '3367', '??????', '', '1.00', '15.00', '0.00', '0', 'ILS', '15.00', '15.00', '0.00', '1'),
 ('165', '3367', '??????', '', '1.00', '15.00', '0.00', '0', 'ILS', '15.00', '15.00', '0.00', '1'),
 ('166', '3367', '??????', '', '1.00', '15.00', '0.00', '0', 'ILS', '15.00', '15.00', '0.00', '1'),
 ('168', '3366', 'M16', 'jyukguk', '1.00', '15000.00', '0.00', '0', 'ILS', '15000.00', '15000.00', '0.00', '1'),
 ('169', '3366', 'M16', 'jyukguk', '1.00', '15000.00', '0.00', '0', 'ILS', '15000.00', '15000.00', '0.00', '1'),
 ('170', '3366', 'M16', 'jyukguk', '1.00', '15000.00', '0.00', '0', 'ILS', '15000.00', '15000.00', '0.00', '1'),
 ('171', '3369', '??? ?????', '', '1.00', '2000.00', '0.00', '0', 'ILS', '2000.00', '2000.00', '0.00', '1'),
 ('171', '3375', '????', '', '1.00', '0.00', '0.00', '0', 'ILS', '0.00', '0.00', '0.00', '2'),
 ('172', '3369', '??? ?????', '', '1.00', '2000.00', '0.00', '0', 'ILS', '2000.00', '2000.00', '0.00', '1'),
 ('172', '3372', '?????', '', '1.00', '10.00', '0.00', '0', 'ILS', '10.00', '10.00', '0.00', '2'),
 ('173', '3369', '??? ?????', '', '1.00', '2000.00', '0.00', '0', 'ILS', '2000.00', '2000.00', '0.00', '1'),
 ('173', '3372', '?????', '', '1.00', '10.00', '0.00', '0', 'ILS', '10.00', '10.00', '0.00', '2'),
 ('174', '3376', '12', '', '1.00', '2.00', '0.00', '0', 'ILS', '2.00', '2.00', '0.00', '1'),
 ('175', '3375', '????', '', '1.00', '1.00', '0.00', '0', 'ILS', '1.00', '1.00', '0.00', '1'),
 ('176', '3368', '??????', '', '1.00', '15.00', '0.00', '0', 'ILS', '15.00', '15.00', '0.00', '1'),
 ('177', '3368', '??????', '', '1.00', '15.00', '0.00', '0', 'ILS', '15.00', '15.00', '0.00', '1'),
 ('178', '3368', '??????', '', '1.00', '15.00', '0.00', '0', 'ILS', '15.00', '15.00', '0.00', '1'),
 ('179', '3368', '??????', '', '1.00', '15.00', '0.00', '0', 'ILS', '15.00', '15.00', '0.00', '1'),
 ('182', '3369', '??? ?????', '', '1.00', '2000.00', '0.00', '0', 'ILS', '2000.00', '2000.00', '0.00', '1'),
 ('183', '3369', '??? ?????', '', '1.00', '2000.00', '0.00', '0', 'ILS', '2000.00', '2000.00', '0.00', '1'),
 ('184', '3380', '????? ?????', '', '1.00', '670.00', '0.00', '0', 'ILS', '670.00', '670.00', '0.00', '1'),
 ('185', '3369', '??? ?????', '', '3.00', '2000.00', '0.00', '0', 'ILS', '6000.00', '6000.00', '0.00', '1'),
 ('186', '3380', '????? ?????', '', '3.00', '670.00', '0.00', '0', 'ILS', '2010.00', '2010.00', '0.00', '1'),
 ('187', '3366', 'M16', 'jyukguk', '5.00', '450.00', '0.00', '0', 'ILS', '2250.00', '2250.00', '0.00', '1'),
 ('188', '3366', 'M16', 'jyukguk', '1.00', '15000.00', '0.00', '0', 'ILS', '15000.00', '15000.00', '2700.00', '1'),
 ('189', '3366', 'M16', 'jyukguk', '1.00', '15000.00', '0.00', '0', 'ILS', '15000.00', '15000.00', '2700.00', '1'),
 ('190', '3366', 'M16', 'jyukguk', '1.00', '15000.00', '0.00', '0', 'ILS', '15000.00', '15000.00', '0.00', '1'),
 ('191', '3366', 'M16', 'jyukguk', '1.00', '15000.00', '0.00', '0', 'ILS', '15000.00', '15000.00', '2700.00', '1'),
 ('198', '3380', '????? ?????', '', '1.00', '670.00', '0.00', '0', 'ILS', '670.00', '670.00', '120.60', '1'),
 ('199', '3366', 'M16', 'jyukguk', '2.00', '300.00', '0.00', '0', 'ILS', '600.00', '600.00', '108.00', '1'),
 ('200', '3366', 'M16', 'jyukguk', '1.00', '15000.00', '0.00', '0', 'ILS', '15000.00', '15000.00', '0.00', '1'),
 ('201', '3367', '??????', '', '1.00', '15.00', '0.00', '0', 'ILS', '15.00', '15.00', '2.70', '1'),
 ('202', '3380', '????? ?????', '', '1.00', '540.00', '0.00', '0', 'ILS', '540.00', '540.00', '97.20', '1'),
 ('203', '3380', '????? ?????', '', '1.00', '670.00', '0.00', '0', 'ILS', '670.00', '670.00', '0.00', '1'),
 ('206', '3380', '????? ?????', '', '3.00', '670.00', '0.00', '0', 'ILS', '2010.00', '2010.00', '361.80', '1'),
 ('206', '3366', 'M16', 'jyukguk', '10.00', '300.00', '0.00', '0', 'ILS', '3000.00', '3000.00', '540.00', '2'),
 ('207', '3366', 'M16', 'jyukguk', '1.00', '15000.00', '0.00', '0', 'ILS', '15000.00', '15000.00', '2700.00', '1'),
 ('208', '3382', '???? ????? ??????', '???? ?????', '2.00', '217.50', '0.00', '0', 'ILS', '870.00', '870.00', '156.60', '1'),
 ('208', '3381', '???', '???? ????', '5.00', '67.50', '0.00', '0', 'ILS', '675.00', '675.00', '121.50', '2'),
 ('209', '3382', '???? ????? ??????', '???? ?????', '2.00', '217.50', '0.00', '0', 'ILS', '435.00', '435.00', '78.30', '1'),
 ('209', '3381', '???', '???? ????', '5.00', '67.50', '0.00', '0', 'ILS', '337.50', '337.50', '60.75', '2'),
 ('210', '3382', '???? ????? ??????', '???? ?????', '2.00', '217.50', '0.00', '0', 'ILS', '435.00', '435.00', '78.30', '1'),
 ('210', '3381', '???', '???? ????', '5.00', '67.50', '0.00', '0', 'ILS', '337.50', '337.50', '60.75', '2'),
 ('211', '3382', '???? ????? ??????', '???? ?????', '2.00', '217.50', '0.00', '0', 'ILS', '435.00', '435.00', '78.30', '1'),
 ('211', '3381', '???', '???? ????', '5.00', '67.50', '0.00', '0', 'ILS', '337.50', '337.50', '60.75', '2'),
 ('212', '3382', '???? ????? ??????', '???? ?????', '2.00', '217.50', '0.00', '0', 'ILS', '435.00', '435.00', '78.30', '1'),
 ('212', '3381', '???', '???? ????', '5.00', '67.50', '0.00', '0', 'ILS', '337.50', '337.50', '60.75', '2'),
 ('214', '3379', '????', '', '1.00', '670.00', '0.00', '0', 'ILS', '670.00', '670.00', '120.60', '1'),
 ('219', '3381', '???', '', '1.00', '135.00', '0.00', '0', 'ILS', '135.00', '135.00', '24.30', '1'),
 ('222', '3381', '???', '', '1.00', '135.00', '0.00', '0', 'ILS', '135.00', '135.00', '24.30', '1'),
 ('223', '3381', '???', '', '1.00', '135.00', '0.00', '0', 'ILS', '135.00', '135.00', '0.00', '1'),
 ('224', '3382', '???? ????? ??????', '', '1.00', '435.00', '0.00', '0', 'ILS', '435.00', '435.00', '78.30', '1'),
 ('225', '3382', '???? ????? ??????', '', '1.00', '435.00', '0.00', '0', 'ILS', '435.00', '435.00', '78.30', '1'),
 ('226', '3380', '????? ?????', '', '1.00', '670.00', '0.00', '0', 'ILS', '670.00', '670.00', '120.60', '1'),
 ('227', '3382', '???? ????? ??????', '', '1.00', '435.00', '0.00', '0', 'ILS', '435.00', '435.00', '78.30', '1'),
 ('228', '3382', '???? ????? ??????', '', '1.00', '435.00', '0.00', '0', 'ILS', '435.00', '435.00', '0.00', '1'),
 ('229', '3382', '???? ????? ??????', '', '1.00', '435.00', '0.00', '0', 'ILS', '435.00', '435.00', '0.00', '1'),
 ('230', '3382', '???? ????? ??????', '', '1.00', '435.00', '0.00', '0', 'ILS', '435.00', '435.00', '78.30', '1'),
 ('231', '3382', '???? ????? ??????', '', '1.00', '435.00', '0.00', '0', 'ILS', '435.00', '435.00', '78.30', '1'),
 ('232', '3382', '???? ????? ??????', '', '1.00', '435.00', '0.00', '0', 'ILS', '435.00', '435.00', '78.30', '1'),
 ('233', '3381', '???', '', '1.00', '135.00', '0.00', '0', 'ILS', '135.00', '135.00', '24.30', '1'),
 ('235', '3381', '???', '', '1.00', '135.00', '0.00', '0', 'ILS', '135.00', '135.00', '24.30', '1'),
 ('236', '3382', '???? ????? ??????', '', '1.00', '435.00', '0.00', '0', 'ILS', '435.00', '435.00', '78.30', '1'),
 ('237', '3369', '??? ?????', '', '1.00', '2000.00', '0.00', '0', 'ILS', '2000.00', '2000.00', '360.00', '1'),
 ('238', '3368', '??????', '', '1.00', '15.00', '0.00', '0', 'ILS', '15.00', '15.00', '2.70', '1'),
 ('239', '3382', '???? ????? ??????', '', '1.00', '435.00', '0.00', '0', 'ILS', '435.00', '435.00', '78.30', '1'),
 ('240', '3380', '????? ?????', '?????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ??????', '1.00', '670.00', '0.00', '0', 'ILS', '670.00', '670.00', '120.60', '1'),
 ('240', '3382', '???? ????? ??????', '?????? ???? ???? ?????? ?????? ???? ???? ?????? ?????? ???? ???? ?????? ?????? ???? ???? ?????? ?????? ???? ???? ?????? ?????? ???? ???? ?????? ?????? ???? ???? ?????? ?????? ???? ???? ??????', '1.00', '435.00', '0.00', '0', 'ILS', '435.00', '435.00', '78.30', '2'),
 ('241', '3366', 'M16', 'jyukguk', '1.00', '15000.00', '0.00', '0', 'ILS', '15000.00', '15000.00', '2700.00', '1'),
 ('242', '3381', '???', '', '500.00', '135.00', '0.00', '0', 'ILS', '67500.00', '67500.00', '12150.00', '1'),
 ('243', '3379', '????', '', '1.00', '12.00', '0.00', '0', 'ILS', '12.00', '12.00', '2.16', '1'),
 ('244', '3379', '????', '', '1.00', '12.00', '0.00', '0', 'ILS', '12.00', '12.00', '2.16', '1'),
 ('245', '3381', '???', '', '1.00', '135.00', '0.00', '0', 'ILS', '135.00', '135.00', '0.00', '1'),
 ('246', '3378', '13', '', '1.00', '1.00', '0.00', '0', 'ILS', '1.00', '1.00', '0.18', '1'),
 ('247', '3378', '13', '', '1.00', '1.10', '0.00', '0', 'ILS', '1.10', '1.10', '0.20', '1'),
 ('248', '3381', '???', '', '20.00', '135.00', '0.00', '0', 'ILS', '2700.00', '2700.00', '486.00', '1'),
 ('249', '3381', '???', '', '30.00', '135.00', '0.00', '0', 'ILS', '4050.00', '4050.00', '729.00', '1'),
 ('250', '3377', '12', '', '1.00', '1.00', '0.00', '0', 'ILS', '1.00', '1.00', '0.18', '1'),
 ('251', '3366', 'M16', 'jyukguk', '5.00', '450.00', '0.00', '0', 'ILS', '2250.00', '2250.00', '405.00', '1'),
 ('252', '3382', '???? ????? ??????', '', '5.00', '435.00', '0.00', '0', 'ILS', '2175.00', '2175.00', '391.50', '1'),
 ('253', '3375', '????', '', '1.00', '0.00', '0.00', '0', 'ILS', '0.00', '0.00', '0.00', '1'),
 ('254', '3379', '????', '', '1.00', '1.00', '0.00', '0', 'ILS', '1.00', '1.00', '0.18', '1'),
 ('255', '3380', '????? ?????', '', '1.00', '670.00', '0.00', '0', 'ILS', '670.00', '670.00', '120.60', '1'),
 ('256', '3366', 'M16', 'jyukguk', '999.99', '15000.00', '0.00', '0', 'ILS', '15000000.00', '15000000.00', '2700000.00', '1'),
 ('257', '3380', '????? ?????', '', '1.00', '670.00', '0.00', '0', 'ILS', '670.00', '670.00', '120.60', '1'),
 ('258', '3366', 'M16', 'jyukguk', '15.00', '15000.00', '0.00', '0', 'ILS', '225000.00', '225000.00', '40500.00', '1'),
 ('259', '3381', '???', '', '15.00', '135.00', '0.00', '0', 'ILS', '2025.00', '2025.00', '364.50', '1'),
 ('260', '3369', '??? ?????', '', '15.00', '2000.00', '0.00', '0', 'ILS', '30000.00', '30000.00', '5400.00', '1'),
 ('261', '3369', '??? ?????', '', '15.00', '2000.00', '0.00', '0', 'ILS', '30000.00', '30000.00', '5400.00', '1'),
 ('262', '3369', '??? ?????', '', '1.00', '2000.00', '0.00', '0', 'ILS', '2000.00', '2000.00', '0.00', '1'),
 ('263', '3382', '???? ????? ??????', '', '1.00', '435.00', '0.00', '0', 'ILS', '435.00', '435.00', '78.30', '1'),
 ('264', '3381', '???', '', '4.00', '135.00', '0.00', '0', 'ILS', '540.00', '540.00', '97.20', '1'),
 ('265', '3366', 'M16', 'jyukguk', '1.00', '15000.00', '0.00', '0', 'ILS', '15000.00', '15000.00', '0.00', '1'),
 ('266', '3366', 'M16', 'jyukguk', '1.00', '15000.00', '0.00', '0', 'ILS', '15000.00', '15000.00', '2700.00', '1'),
 ('267', '3369', '??? ?????', '', '1.00', '2000.00', '0.00', '0', 'ILS', '2000.00', '2000.00', '0.00', '1'),
 ('270', '3382', '???? ????? ??????', '', '1.00', '358.68', NULL, '0', 'ILS', NULL, NULL, '18.00', '1'),
 ('270', '3381', '???', '', '1.00', '111.32', NULL, '0', 'ILS', NULL, NULL, '18.00', '2'),
 ('271', '3366', 'M16', 'jyukguk', '1.00', '15000.00', NULL, '0', 'ILS', NULL, NULL, '18.00', '1'),
 ('271', '3380', '????? ?????', '', '1.00', '670.00', NULL, '0', 'ILS', NULL, NULL, '18.00', '2'),
 ('272', '3366', 'M16', 'jyukguk', '1.00', '15000.00', '15000.00', '0', 'ILS', NULL, '15000.00', '18.00', '1'),
 ('273', '3366', 'M16', 'jyukguk', '1.00', '15000.00', '15000.00', '0', 'ILS', NULL, '15000.00', '18.00', '1'),
 ('274', '3366', 'M16', 'jyukguk', '1.00', '15000.00', '15000.00', '0', 'ILS', NULL, '15000.00', '18.00', '1'),
 ('275', '3366', 'M16', 'jyukguk', '3.00', '423.73', '15000.00', '0', 'ILS', NULL, '1271.19', '18.00', '1'),
 ('276', '3366', 'M16', 'jyukguk', '1.00', '15000.00', '15000.00', '0', 'ILS', '15000.00', '0.00', '18.00', '1'),
 ('277', '3382', '???? ????? ??????', '', '1.00', '508.47', '435.00', '0', 'ILS', '508.47', '408.47', '18.00', '1'),
 ('278', '3380', '????? ?????', '', '1.00', '670.00', '670.00', '0', 'ILS', '670.00', '663.65', '18.00', '1'),
 ('278', '3382', '???? ????? ??????', '', '1.00', '435.00', '435.00', '0', 'ILS', '435.00', '430.88', '18.00', '2'),
 ('279', '3380', '????? ?????', '', '2.00', '127.12', '670.00', '0', 'ILS', '254.24', '228.82', '18.00', '1'),
 ('280', '3366', 'M16', 'jyukguk', '1.00', '15000.00', '15000.00', '0', 'ILS', '15000.00', '15000.00', '18.00', '1'),
 ('281', '3382', '???? ????? ??????', '', '1.00', '435.00', '435.00', '0', 'ILS', '435.00', '391.50', '18.00', '1'),
 ('281', '3380', '????? ?????', '', '2.00', '670.00', '670.00', '0', 'ILS', '1340.00', '1206.00', '18.00', '2'),
 ('282', '3380', '????? ?????', '', '1.00', '670.00', '670.00', '0', 'ILS', '670.00', '670.00', '18.00', '1'),
 ('282', '3381', '???', '', '1.00', '135.00', '135.00', '0', 'ILS', '135.00', '135.00', '18.00', '2'),
 ('282', '3382', '???? ????? ??????', '', '1.00', '435.00', '435.00', '0', 'ILS', '435.00', '435.00', '18.00', '3'),
 ('283', '3380', '????? ?????', '', '1.00', '670.00', '670.00', '0', 'ILS', '670.00', '670.00', '18.00', '1'),
 ('284', '3382', '???? ????? ??????', '', '1.00', '435.00', '435.00', '0', 'ILS', '435.00', '435.00', '18.00', '1'),
 ('285', '3382', '???? ????? ??????', '', '1.00', '435.00', '435.00', '0', 'ILS', '435.00', '435.00', '18.00', '1'),
 ('286', '3381', '???', '', '1.00', '135.00', '135.00', '0', 'ILS', '135.00', '135.00', '18.00', '1'),
 ('287', '3380', '????? ?????', '', '1.00', '670.00', '670.00', '0', 'ILS', '670.00', '670.00', '18.00', '1'),
 ('288', '3381', '???', '', '1.00', '135.00', '135.00', '0', 'ILS', '135.00', '135.00', '18.00', '1'),
 ('289', '3382', '???? ????? ??????', '', '20.00', '435.00', '435.00', '0', 'ILS', '8700.00', '8700.00', '18.00', '1'),
 ('289', '3380', '????? ?????', '', '15.00', '670.00', '670.00', '0', 'ILS', '10050.00', '10050.00', '18.00', '2'),
 ('290', '3382', '???? ????? ??????', '', '20.00', '435.00', '435.00', '0', 'ILS', '8700.00', '8700.00', '18.00', '1'),
 ('291', '3382', '???? ????? ??????', '', '50.00', '435.00', '435.00', '0', 'ILS', '21750.00', '21750.00', '18.00', '1'),
 ('292', '3381', '???', '', '24.00', '135.00', '135.00', '0', 'ILS', '3240.00', '3240.00', '18.00', '1'),
 ('293', '3378', '13', '', '1.00', '670.00', '0.00', '0', 'ILS', '670.00', '670.00', '18.00', '1'),
 ('294', '3375', '????', '', '1.00', '345.00', '0.00', '0', 'ILS', '345.00', '345.00', '18.00', '1'),
 ('295', '3382', '???? ????? ??????', '', '67.00', '435.00', '435.00', '0', 'ILS', '29145.00', '29145.00', '18.00', '1'),
 ('296', '3382', '???? ????? ??????', '', '34.00', '435.00', '435.00', '0', 'ILS', '14790.00', '14790.00', '18.00', '1'),
 ('297', '3382', '???? ????? ??????', '', '36.00', '435.00', '435.00', '0', 'ILS', '15660.00', '15660.00', '18.00', '1'),
 ('298', '3380', '????? ?????', '', '1.00', '670.00', '670.00', '0', 'ILS', '670.00', '335.00', '18.00', '1'),
 ('299', '3383', '???? ???? ??', '', '1.00', '2400.00', '2400.00', '0', 'ILS', '2400.00', '2400.00', '18.00', '1'),
 ('299', '3384', '???? ????', '', '1.00', '1100.00', '1100.00', '0', 'ILS', '1100.00', '1100.00', '18.00', '2'),
 ('300', '3383', '???? ???? ??', '', '1.00', '2400.00', '0.00', '0', 'ILS', '2400.00', '2400.00', '18.00', '1'),
 ('300', '3384', '???? ????', '', '1.00', '1100.00', '0.00', '0', 'ILS', '1100.00', '1100.00', '18.00', '2'),
 ('301', '3383', '???? ???? ??', '', '1.00', '2600.00', '0.00', '0', 'ILS', '2600.00', '2600.00', '18.00', '1'),
 ('301', '3384', '???? ????', '', '1.00', '1100.00', '0.00', '0', 'ILS', '1100.00', '1100.00', '18.00', '2'),
 ('302', '3383', '???? ???? ??', '', '1.00', '2600.00', '0.00', '0', 'ILS', '2600.00', '2600.00', '18.00', '1'),
 ('302', '3384', '???? ????', '', '1.00', '500.00', '0.00', '0', 'ILS', '500.00', '500.00', '18.00', '2'),
 ('304', '3384', '???? ????', '', '1.00', '1100.00', '1100.00', '0', 'ILS', '1100.00', '1100.00', '18.00', '1'),
 ('305', '3382', '???? ????? ??????', '', '1.00', '435.00', '435.00', '0', 'ILS', '435.00', '435.00', '18.00', '1');



--
-- Structure for table `qwe_docStatus`
--

DROP TABLE IF EXISTS `qwe_docStatus`;

CREATE TABLE `qwe_docStatus` (
  `num` int(11) NOT NULL,
  `doc_type` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `looked` tinyint(1) NOT NULL,
  `action` varchar(255) NOT NULL,
  PRIMARY KEY (`num`,`doc_type`),
KEY `doc_type` (`doc_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `qwe_docStatus`
--

INSERT INTO `qwe_docStatus` (`num`, `doc_type`, `name`, `looked`, `action`) VALUES
 ('1', '1', '?????', '0', '0'),
 ('1', '2', '?????', '0', '0'),
 ('1', '3', '?????', '0', '0'),
 ('1', '4', '?????', '0', '0'),
 ('1', '5', '?????', '0', '0'),
 ('1', '6', '?????', '0', '0'),
 ('1', '7', '?????', '0', '0'),
 ('1', '8', '?????', '0', '0'),
 ('1', '9', '?????', '0', '0'),
 ('1', '10', '?????', '0', '0'),
 ('1', '11', '????', '1', '1'),
 ('1', '12', '????', '1', '1'),
 ('1', '13', '????', '1', '1'),
 ('1', '14', '????', '1', '1'),
 ('1', '15', '????', '1', '1'),
 ('2', '1', '????', '1', '1'),
 ('2', '2', '????', '1', '1'),
 ('2', '3', '????', '1', '1'),
 ('2', '4', '????', '1', '1'),
 ('2', '5', '????', '1', '1'),
 ('2', '6', '????', '1', '1'),
 ('2', '7', '????', '1', '1'),
 ('2', '8', '????', '1', '1'),
 ('2', '9', '????', '1', '1'),
 ('2', '10', '????', '1', '1'),
 ('3', '1', '????? ??????', '0', '1'),
 ('3', '2', '????? ??????', '0', '0'),
 ('3', '3', '????? ??????', '0', '0'),
 ('3', '4', '????? ??????', '1', '1'),
 ('3', '5', '????? ??????', '1', '1'),
 ('3', '6', '????? ??????', '1', '1'),
 ('3', '7', '????? ??????', '1', '1'),
 ('3', '8', '????? ??????', '1', '1'),
 ('3', '9', '????? ??????', '1', '1'),
 ('3', '10', '????? ??????', '1', '1'),
 ('4', '1', '?????', '1', '1'),
 ('4', '2', '?????', '1', '1'),
 ('4', '3', '?????', '1', '1'),
 ('4', '4', '?????', '1', '1'),
 ('4', '5', '?????', '1', '1'),
 ('4', '6', '?????', '1', '1'),
 ('4', '7', '?????', '1', '1'),
 ('4', '8', '?????', '1', '1'),
 ('4', '9', '?????', '1', '1'),
 ('4', '10', '?????', '1', '1');



--
-- Structure for table `qwe_docType`
--

DROP TABLE IF EXISTS `qwe_docType`;

CREATE TABLE `qwe_docType` (
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
  `header` text NOT NULL,
  `footer` text NOT NULL,
  `stockSwitch` tinyint(1) NOT NULL,
  `copy` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `account_type` (`account_type`),
  KEY `docStatus_id` (`docStatus_id`),
KEY `docStatus_id_2` (`docStatus_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Data for table `qwe_docType`
--

INSERT INTO `qwe_docType` (`id`, `name`, `openformat`, `isdoc`, `isrecipet`, `iscontract`, `looked`, `stockAction`, `account_type`, `docStatus_id`, `last_docnum`, `oppt_account_type`, `transactionType_id`, `vat_acc_id`, `header`, `footer`, `stockSwitch`, `copy`) VALUES
 ('1', 'Proforma', '300', '1', '0', '0', '1', '-1', '0', '2', '45', NULL, NULL, '3', '<p style=\"text-align: right;\">?????? ??????/?????? ????? ?????? ?????? ??? ?? ???- ????? ???? ?? ?????? ??? ?? ??????.<br />???? ?????:????? ?????? ?? ?\'? ?????? ??? 30 ??? ???? ???? ???????. ????? ???? ????? ????? ??????? ?? ???? ??????/????? ???????.</p>', '<p style=\"text-align: right;\">??? _____________________ ???? ??????? ??? ??????? ???? ?? ??????? ??\"? __________________ ????? ?????? ?????</p>', '0', '1'),
 ('2', 'Delivery doc.', '200', '1', '0', '0', '0', '-1', '0', '2', '14', NULL, NULL, '3', '', '', '0', '1'),
 ('3', 'Invoice', '305', '1', '0', '0', '1', '-1', '0', '2', '67', NULL, '1', '3', '', '', '1', '1'),
 ('4', 'Credit invoice', '330', '1', '0', '0', '0', '1', '0', '2', '6', NULL, '17', '3', '', '', '1', '1'),
 ('5', 'Return document', '210', '1', '0', '0', '0', '1', '0', '2', '2', NULL, '19', '3', '', '', '1', '1'),
 ('6', 'Quote', '0', '1', '0', '0', '0', '0', '0', '2', '6', NULL, NULL, '3', '', '', '0', '0'),
 ('7', 'Sales Order', '0', '1', '0', '0', '0', '0', '0', '2', '6', NULL, NULL, '3', '', '', '0', '0'),
 ('8', 'Receipt', '400', '0', '1', '0', '1', '0', '0', '2', '38', NULL, '3', '3', '', '', '0', '1'),
 ('9', 'Invoice Receipt', '320', '1', '1', '0', '1', '-1', '0', '2', '8', NULL, '18', '3', '', '', '1', '1'),
 ('10', 'Purchase Order', '500', '1', '0', '0', '0', '0', '1', '2', '1', NULL, NULL, '3', '', '', '0', '1'),
 ('11', 'Manual invoice', '0', '1', '0', '0', '1', '1', '1', '1', '1', NULL, '11', '3', '', '', '1', '1'),
 ('12', 'Manual receipt', '0', '1', '0', '0', '1', '1', '1', '1', '1', NULL, '12', '3', '', '', '0', '1'),
 ('13', 'Buisness outcome', '0', '1', '0', '0', '0', '1', '1', '1', '11', '2', '5', '1', '', '', '0', '0'),
 ('14', 'Asstes outcome', '0', '1', '0', '0', '0', '1', '1', '1', '4', '4', '5', '2', '', '', '0', '0'),
 ('15', 'Warehouse transaction', '830', '1', '0', '0', '0', '1', '8', '1', '5', '8', NULL, '0', '', '', '0', '1');



--
-- Structure for table `qwe_docs`
--

DROP TABLE IF EXISTS `qwe_docs`;

CREATE TABLE `qwe_docs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `doctype` int(11) NOT NULL,
  `docnum` int(10) unsigned DEFAULT NULL,
  `account_id` int(10) unsigned DEFAULT NULL,
  `company` varchar(80) DEFAULT NULL,
  `address` varchar(80) DEFAULT NULL,
  `city` varchar(40) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `vatnum` varchar(10) DEFAULT NULL,
  `refnum` varchar(20) NOT NULL,
  `issue_date` timestamp NULL DEFAULT NULL,
  `due_date` timestamp NULL DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `discount` decimal(20,2) NOT NULL,
  `disType` tinyint(4) NOT NULL DEFAULT '0',
  `sub_total` decimal(20,2) DEFAULT NULL,
  `novat_total` decimal(20,2) DEFAULT NULL,
  `vat` decimal(20,2) DEFAULT NULL,
  `total` decimal(20,2) DEFAULT NULL,
  `currency_id` varchar(3) NOT NULL,
  `src_tax` decimal(20,2) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `printed` int(11) DEFAULT NULL,
  `comments` text,
  `description` text NOT NULL,
  `oppt_account_id` int(11) DEFAULT NULL,
  `action` tinyint(1) NOT NULL,
  `refstatus` int(11) NOT NULL,
  `owner` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `owner` (`owner`),
  KEY `account_id` (`account_id`),
  KEY `status` (`status`),
  KEY `doctype` (`doctype`),
KEY `refnum` (`refnum`)
) ENGINE=InnoDB AUTO_INCREMENT=330 DEFAULT CHARSET=utf8;

--
-- Data for table `qwe_docs`
--

INSERT INTO `qwe_docs` (`id`, `doctype`, `docnum`, `account_id`, `company`, `address`, `city`, `zip`, `vatnum`, `refnum`, `issue_date`, `due_date`, `modified`, `discount`, `disType`, `sub_total`, `novat_total`, `vat`, `total`, `currency_id`, `src_tax`, `status`, `printed`, `comments`, `description`, `oppt_account_id`, `action`, `refstatus`, `owner`) VALUES
 ('149', '3', '2', '101071', '??????? ??\"?', '', '', '', '', '', '1970-01-01 02:01:59', '2014-03-31 00:03:59', '2014-06-23 19:06:59', '0.00', '0', '15000.00', '15000.00', '0.00', '15000.00', 'ILS', NULL, '2', '1', '', '', NULL, '0', '0', '1'),
 ('150', '6', '2', '101068', '??????', '', '', '', '', '', '1970-01-01 02:01:20', '1970-01-01 02:01:20', '2014-06-23 19:06:20', '0.00', '0', '0.00', '0.00', '0.00', '0.00', 'ILS', NULL, '1', '1', '', '', NULL, '0', '0', '1'),
 ('153', '1', '3', '101068', '??????', '', '', '', '', '', '1970-01-01 02:01:00', '0000-00-00 00:00:00', '2014-03-04 00:03:00', '0.00', '0', '15000.00', '15000.00', '0.00', '15000.00', 'ILS', NULL, '2', NULL, '', '', NULL, '0', '0', '1'),
 ('154', '1', '4', '101068', '??????', '', '', '', '', '', '1970-01-01 02:01:00', '1970-01-01 02:01:00', '2014-03-06 00:03:00', '0.00', '0', '15000.00', '15000.00', '0.00', '15000.00', 'ILS', NULL, '1', NULL, '', '', NULL, '0', '0', '10'),
 ('155', '1', '9', '101068', '??????', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0.00', '0', '15000.00', '15000.00', '0.00', '15000.00', 'ILS', NULL, '1', NULL, '', '', NULL, '0', '0', '10'),
 ('156', '3', '4', '101071', '??????? ??\"?', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0.00', '0', '15000.00', '15000.00', '0.00', '15000.00', 'ILS', NULL, '3', NULL, '', '', NULL, '0', '0', '1'),
 ('157', '3', '5', '101070', 'ttt', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0.00', '0', '1.00', '1.00', '0.00', '1.00', 'ILS', NULL, '3', NULL, '', '', NULL, '0', '0', '1'),
 ('158', '1', '19', '101071', '??????? ??\"?', '', '', '', '', '', '2014-03-09 13:03:54', '2014-03-01 00:03:54', '2014-03-09 13:03:54', '0.00', '0', '21.00', '21.00', '0.00', '21.00', 'ILS', NULL, '1', NULL, '', '', NULL, '0', '0', '1'),
 ('159', '3', '6', '101068', '??????', '', '', '', '', '', '2014-01-31 06:01:42', '2014-02-28 06:02:42', '2014-04-02 15:04:42', '0.00', '0', '15000.00', '15000.00', '0.00', '15000.00', 'ILS', NULL, '3', '2', 'rdynrenty', '', NULL, '0', '0', '1'),
 ('160', '8', '2', '101068', '??????', '', '', '', '69924504', '', '2014-03-11 10:03:51', '2014-03-11 00:03:51', '2014-04-02 15:04:51', '0.00', '0', NULL, NULL, NULL, NULL, 'ILS', '0.00', '1', '2', '', '', NULL, '0', '0', '1'),
 ('161', '9', '2', '101068', '??????', '', '', '', '', '', '2014-03-11 10:03:21', '1970-01-01 02:01:00', '2014-03-11 10:03:21', '0.00', '0', '15000.00', '15000.00', '0.00', '15000.00', 'ILS', '0.00', '4', NULL, '', '', NULL, '0', '0', '10'),
 ('162', '9', '3', '101071', '??????? ??\"?', '', '', '', '', '', '2014-03-11 11:03:23', '1970-01-01 02:01:00', '2014-03-11 11:03:23', '0.00', '0', '15.00', '15.00', '0.00', '15.00', 'ILS', '0.00', '4', NULL, '', '', NULL, '0', '0', '1'),
 ('163', '9', '4', '101071', '??????? ??\"?', '', '', '', '', '', '2014-03-11 11:03:03', '1970-01-01 02:01:00', '2014-03-11 11:03:03', '0.00', '0', '15.00', '15.00', '0.00', '15.00', 'ILS', '0.00', '4', NULL, '', '', NULL, '0', '0', '1'),
 ('164', '9', '5', '101073', '??????? ??\"?', '', '', '', '69924504', '', '2014-03-11 13:03:53', '1970-01-01 02:01:00', '2014-03-11 13:03:53', '0.00', '0', '15.00', '15.00', '0.00', '15.00', 'ILS', '0.00', '4', NULL, '', '', NULL, '0', '0', '10'),
 ('165', '9', '6', '101073', '??????? ??\"?', '', '', '', '69924504', '', '2014-03-11 13:03:58', '1970-01-01 02:01:00', '2014-03-11 13:03:58', '0.00', '0', '15.00', '15.00', '0.00', '15.00', 'ILS', '0.00', '4', NULL, '', '', NULL, '0', '0', '10'),
 ('166', '9', '7', '101071', '??????? ??\"?', '', '', '', '', '', '2014-03-11 13:03:29', '1970-01-01 02:01:00', '2014-03-11 13:03:29', '0.00', '0', '15.00', '15.00', '0.00', '15.00', 'ILS', '0.00', '4', NULL, '', '', NULL, '0', '0', '10'),
 ('167', '3', '7', '0', '', '', '', '', '', '', '2014-03-12 18:03:29', '2014-03-12 18:03:29', '2014-03-12 18:03:29', '0.00', '0', '0.00', '0.00', '0.00', '0.00', 'ILS', NULL, '3', NULL, '', '', NULL, '0', '0', '10'),
 ('168', '1', '26', '101071', '??????? ??\"?', '', '', '', '', '', '2014-03-12 18:03:45', '2014-03-12 18:03:45', '2014-03-12 18:03:45', '0.00', '0', '15000.00', '15000.00', '0.00', '15000.00', 'ILS', NULL, '1', NULL, '', 'rg45345', NULL, '0', '0', '10'),
 ('169', '1', '27', '101071', '??????? ??\"?', '', '', '', '', '', '2014-03-12 18:03:04', '2014-03-12 18:03:04', '2014-03-12 19:03:04', '0.00', '0', '15000.00', '15000.00', '0.00', '15000.00', 'ILS', NULL, '1', NULL, '', 'rg45345', NULL, '0', '0', '10'),
 ('170', '1', '28', '101068', '???? ?????', '????? 8', 'Minneapolis', '55416-3935', '3007777778', '', '2014-03-13 15:03:09', '2014-03-13 15:03:09', '2014-03-13 15:03:09', '0.00', '0', '15000.00', '15000.00', '0.00', '15000.00', 'ILS', NULL, '1', NULL, '', 'rg45345', NULL, '0', '0', '1'),
 ('171', '3', '8', '101071', '??????? ??\"?', '', '', '', '', '', '2014-03-18 14:03:54', '2014-03-18 14:03:54', '2014-03-18 14:03:54', '0.00', '0', '2000.00', '2000.00', '0.00', '2000.00', 'ILS', NULL, '2', NULL, '', '', '113', '0', '0', '1'),
 ('172', '3', '9', '101071', '??????? ??\"?', '', '', '', '', '', '2014-03-18 14:03:57', '2014-03-18 14:03:57', '2014-03-18 14:03:57', '0.00', '0', '2010.00', '2010.00', '0.00', '2010.00', 'ILS', NULL, '2', NULL, '', '', '113', '0', '0', '1'),
 ('173', '3', '10', '101071', '??????? ??\"?', '', '', '', '', '', '2014-03-18 14:03:16', '2014-03-18 14:03:16', '2014-03-18 14:03:16', '0.00', '0', '2010.00', '2010.00', '0.00', '2010.00', 'ILS', NULL, '2', NULL, '', '', '113', '0', '0', '1'),
 ('174', '3', '11', '101071', '??????? ??\"?', '', '', '', '', '', '2014-03-18 14:03:54', '2014-03-18 14:03:54', '2014-03-18 14:03:54', '0.00', '0', '2.00', '2.00', '0.00', '2.00', 'ILS', NULL, '2', NULL, '', '', '113', '0', '0', '1'),
 ('175', '3', '12', '101074', '??????? ??\"?', '', '', '', '69924504', '', '2014-03-18 14:03:40', '2014-03-18 14:03:40', '2014-03-18 14:03:40', '0.00', '0', '1.00', '1.00', '0.00', '1.00', 'ILS', NULL, '3', NULL, '', '', '113', '0', '0', '1'),
 ('176', '3', '13', '101074', '??????? ??\"?', '', '', '', '69924504', '', '2014-03-18 14:03:49', '2014-03-18 14:03:49', '2014-03-18 14:03:49', '0.00', '0', '15.00', '15.00', '0.00', '15.00', 'ILS', NULL, '2', NULL, '', '', '113', '0', '0', '1'),
 ('177', '3', '14', '101074', '??????? ??\"?', '', '', '', '69924504', '', '2014-03-18 14:03:06', '2014-03-18 14:03:06', '2014-03-18 14:03:06', '0.00', '0', '15.00', '15.00', '0.00', '15.00', 'ILS', NULL, '2', NULL, '', '', '113', '0', '0', '1'),
 ('178', '3', '15', '101074', '??????? ??\"?', '', '', '', '69924504', '', '2014-03-18 14:03:14', '2014-03-18 14:03:14', '2014-03-18 14:03:14', '0.00', '0', '15.00', '15.00', '0.00', '15.00', 'ILS', NULL, '2', NULL, '', '', '113', '0', '0', '1'),
 ('179', '3', '16', '101074', '??????? ??\"?', '', '', '', '69924504', '', '2014-03-18 14:03:26', '2014-03-18 14:03:26', '2014-03-18 14:03:26', '0.00', '0', '15.00', '15.00', '0.00', '15.00', 'ILS', NULL, '2', NULL, '', '', '113', '0', '0', '1'),
 ('180', '8', '3', '101071', '??????? ??\"?', '', '', '', '', '', '2014-04-23 12:04:16', '2014-04-23 12:04:16', '2014-04-23 12:04:16', '0.00', '0', NULL, NULL, NULL, '0.00', 'ILS', '0.00', '2', '1', '', '', '204', '0', '0', '1'),
 ('181', '8', '4', '101071', '??????? ??\"?', '', '', '', '', '', '2014-04-23 12:04:10', '2014-04-23 12:04:10', '2014-06-29 19:06:10', '0.00', '0', NULL, NULL, NULL, '500.00', 'ILS', '0.00', '1', '2', '', '', '203', '0', '0', '1'),
 ('182', '1', '31', '101081', '???? ????? ??\"?', '', '', '', '', '', '2014-06-29 19:06:33', '2014-06-29 19:06:33', '2014-06-29 19:06:33', '0.00', '0', '2000.00', '2000.00', '0.00', '2000.00', 'ILS', NULL, '2', '1', '', 'rg45345', '113', '0', '0', '1'),
 ('183', '3', '17', '101082', '???? ??????', '??? ????? 5', '?? ????', '52215', '069924504', '', '2014-06-29 23:06:36', '2014-06-29 23:06:36', '2014-06-30 08:06:36', '0.00', '0', '2000.00', '2000.00', '0.00', '2000.00', 'ILS', NULL, '2', '2', '', '', '113', '0', '0', '1'),
 ('184', '3', '18', '101082', '???? ??????', '??? ????? 5', '?? ????', '52215', '069924504', '', '2014-06-30 08:06:18', '2014-06-30 08:06:18', '2014-06-30 08:06:18', '0.00', '0', '670.00', '670.00', '0.00', '670.00', 'ILS', NULL, '2', '2', '', '', '113', '0', '0', '1'),
 ('185', '3', '19', '101082', '???? ??????', '??? ????? 5', '?? ????', '52215', '069924504', '', '2014-06-30 08:06:43', '2014-06-30 08:06:43', '2014-06-30 08:06:43', '0.00', '0', '6000.00', '6000.00', '0.00', '6000.00', 'ILS', NULL, '2', '1', '', '', '113', '0', '0', '1'),
 ('186', '4', '2', '101082', '???? ??????', '??? ????? 5', '?? ????', '52215', '069924504', '', '2014-06-30 09:06:47', '2014-06-30 09:06:47', '2014-06-30 09:06:47', '0.00', '0', '2010.00', '2010.00', '0.00', '2010.00', 'ILS', NULL, '2', '1', '', '', '113', '0', '0', '1'),
 ('187', '2', '2', '101082', '???? ??????', '??? ????? 5', '?? ????', '52215', '069924504', '', '2014-06-30 09:06:56', '2014-06-30 09:06:56', '2014-06-30 09:06:56', '0.00', '0', '2250.00', '2250.00', '0.00', '2250.00', 'ILS', NULL, '2', '1', '', '', '113', '0', '0', '1'),
 ('188', '3', '20', '101071', '??????? ??\"?', '', '', '', '', '', '2014-06-30 16:06:37', '2014-06-30 16:06:37', '2014-06-30 17:06:37', '0.00', '0', '15000.00', '15000.00', '2700.00', '17700.00', 'ILS', NULL, '2', NULL, '', '', '113', '0', '0', '1'),
 ('189', '3', '21', '101071', '??????? ??\"?', '', '', '', '', '', '2014-06-30 16:06:53', '2014-06-30 16:06:53', '2014-06-30 17:06:53', '0.00', '0', '15000.00', '15000.00', '2700.00', '17700.00', 'ILS', NULL, '2', '1', '', '', '113', '0', '0', '1'),
 ('190', '3', '22', '101071', '??????? ??\"?', '', '', '', '', '', '2014-06-30 17:06:34', '2014-06-30 17:06:34', '2014-06-30 17:06:34', '0.00', '0', '15000.00', '15000.00', '0.00', '15000.00', 'ILS', NULL, '2', '1', '', '', '113', '0', '0', '1'),
 ('191', '3', '23', '101071', '??????? ??\"?', '', '', '', '', '', '2014-06-30 17:06:43', '2014-06-30 17:06:43', '2014-06-30 17:06:43', '0.00', '0', '15000.00', '15000.00', '2700.00', '17700.00', 'ILS', NULL, '2', '1', '', '', '113', '0', '0', '1'),
 ('192', '8', '5', '101081', '???? ????? ??\"?', '', '', '', '', '', '2014-06-30 18:06:09', '2014-06-30 18:06:09', '2014-06-30 18:06:09', '0.00', '0', NULL, NULL, NULL, '1800.00', 'ILS', '0.00', '2', '1', '', '', '113', '0', '0', '1'),
 ('193', '8', '6', '101082', '???? ??????', '??? ????? 5', '?? ????', '52215', '069924504', '', '2014-06-30 18:06:11', '2014-06-30 18:06:11', '2014-06-30 18:06:11', '0.00', '0', NULL, NULL, NULL, '500.00', 'ILS', '0.00', '2', '1', '', '', '113', '0', '0', '1'),
 ('194', '8', '7', '101082', '???? ??????', '??? ????? 5', '?? ????', '52215', '069924504', '', '2014-06-30 18:06:56', '2014-06-30 18:06:56', '2014-06-30 18:06:56', '0.00', '0', NULL, NULL, NULL, '300.00', 'ILS', '0.00', '2', '1', '', '', '113', '0', '0', '1'),
 ('195', '8', '8', '101082', '???? ??????', '??? ????? 5', '?? ????', '52215', '069924504', '', '2014-06-30 18:06:29', '2014-06-30 18:06:29', '2014-06-30 18:06:29', '0.00', '0', NULL, NULL, NULL, '50.00', 'ILS', '0.00', '2', '1', '', '', '113', '0', '0', '1'),
 ('196', '8', '9', '101082', '???? ??????', '??? ????? 5', '?? ????', '52215', '069924504', '', '2014-06-30 18:06:04', '2014-06-30 18:06:04', '2014-06-30 19:06:04', '0.00', '0', NULL, NULL, NULL, '50.00', 'ILS', '0.00', '1', '1', '', '', '113', '0', '0', '1'),
 ('197', '8', '10', '101082', '???? ??????', '??? ????? 5', '?? ????', '52215', '069924504', '', '2014-06-30 19:06:45', '2014-06-30 19:06:45', '2014-06-30 19:06:45', '0.00', '0', NULL, NULL, NULL, '50.00', 'ILS', '0.00', '1', '6', '', '', '113', '0', '0', '1'),
 ('198', '3', '24', '101082', '???? ??????', '??? ????? 5', '?? ????', '52215', '069924504', '', '2014-06-30 19:06:50', '2014-06-30 19:06:50', '2014-06-30 19:06:50', '0.00', '0', '670.00', '670.00', '120.60', '790.60', 'ILS', NULL, '2', '2', '', '', '113', '0', '0', '1'),
 ('199', '3', '25', '101068', '', '', '', '', '', '', '2014-06-30 19:06:28', '2014-06-30 19:06:28', '2014-07-01 19:01:28', '0.00', '0', '600.00', '600.00', '108.00', '708.00', 'ILS', NULL, '2', '2', '', '', '113', '1', '0', '1'),
 ('200', '3', '26', '101082', '???? ??????', '??? ????? 5', '?? ????', '52215', '069924504', '', '2014-07-01 09:07:14', '2014-07-01 09:07:14', '2014-07-02 14:13:14', '0.00', '0', '15000.00', '15000.00', '0.00', '15000.00', 'ILS', NULL, '2', '1', '', '', '113', '1', '0', '1'),
 ('201', '3', '27', '101082', '???? ??????', '??? ????? 5', '?? ????', '52215', '069924504', '202', '2014-07-02 08:07:53', '2014-07-31 11:07:53', '2014-07-02 14:17:53', '0.00', '0', '15.00', '15.00', '2.70', '17.70', 'ILS', NULL, '2', NULL, '', '', '113', '1', '1', '1'),
 ('203', '3', '29', '101082', '???? ??????', '??? ????? 5', '?? ????', '52215', '069924504', '202', '2014-07-02 00:00:53', '2014-07-31 00:00:53', '2014-07-02 14:17:53', '0.00', '0', '670.00', '670.00', '0.00', '670.00', 'ILS', NULL, '2', NULL, '', '', '113', '1', '0', '1'),
 ('204', '8', '11', '101082', '???? ??????', '??? ????? 5', '?? ????', '52215', '069924504', '', '2014-07-02 00:00:52', '2014-07-31 00:00:52', '2014-07-02 09:41:52', '0.00', '0', NULL, NULL, NULL, '670.00', 'ILS', '0.00', '2', NULL, '', '', '113', '1', '0', '1'),
 ('205', '4', '3', '101068', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2014-07-04 14:03:23', '0.00', '0', '0.00', '0.00', '0.00', '0.00', 'ILS', NULL, '2', '1', '', '', '113', '0', '0', '1'),
 ('206', '6', '4', '101082', '???? ??????', '??? ????? 5', '?? ????', '52215', '069924504', '', '2014-07-04 00:00:37', '1970-01-01 02:00:37', '2014-07-05 09:20:37', '0.00', '0', '5010.00', '5010.00', '901.80', '5911.80', 'ILS', NULL, '2', NULL, '<p style=\"text-align: right;\">?? ???? ????</p>', '<p style=\"text-align: right;\">?? ???? ????</p>', '113', '1', '0', '1'),
 ('207', '3', '30', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '', '2014-07-05 00:00:16', '2014-07-05 00:00:16', '2014-07-05 13:33:16', '0.00', '0', '15000.00', '15000.00', '2700.00', '17700.00', 'ILS', NULL, '2', NULL, '', '', '113', '1', '0', '1'),
 ('208', '6', '5', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '', '2014-07-05 00:00:23', '2014-07-31 00:00:23', '2014-07-05 14:08:23', '50.00', '0', '1545.00', '1545.00', '278.10', '1823.10', 'ILS', NULL, '2', '2', '<p style=\"text-align: right;\">???? ????? ?????</p>', '<p style=\"text-align: right;\">???? ????? ?????</p>', '113', '1', '0', '1'),
 ('209', '7', '2', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '', '2014-07-05 00:00:54', '2014-07-31 00:00:54', '2014-07-05 14:29:54', '50.00', '0', '772.50', '772.50', '139.05', '911.55', 'ILS', NULL, '2', '1', '<p style=\"text-align: right;\">???? ????? ?????</p>', '<p style=\"text-align: right;\">???? ????? ?????</p>', '113', '1', '0', '1'),
 ('210', '1', '32', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '', '2014-07-05 00:00:31', '2014-07-31 00:00:31', '2014-07-05 14:57:31', '50.00', '0', '772.50', '772.50', '139.05', '911.55', 'ILS', NULL, '2', '1', '<p style=\"text-align: right;\">???? ????? ?????</p>', '<p style=\"text-align: right;\">???? ????? ?????</p>', '113', '1', '0', '1'),
 ('211', '3', '31', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '', '2014-07-05 00:00:33', '2014-07-31 00:00:33', '2014-07-05 14:58:33', '50.00', '0', '772.50', '772.50', '139.05', '911.55', 'ILS', NULL, '2', '1', '<p style=\"text-align: right;\">???? ????? ?????</p>', '<p style=\"text-align: right;\">???? ????? ?????</p>', '113', '1', '0', '1'),
 ('212', '4', '4', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '', '2014-07-05 00:00:02', '2014-07-31 00:00:02', '2014-07-05 14:59:02', '50.00', '0', '772.50', '772.50', '139.05', '911.55', 'ILS', NULL, '2', '1', '<p style=\"text-align: right;\">???? ????? ?????</p>', '<p style=\"text-align: right;\">???? ????? ?????</p>', '113', '1', '0', '1'),
 ('213', '1', '33', '101068', '', '', '', '', '', '', '2014-07-05 18:48:00', '2014-07-05 18:48:00', '2014-07-05 18:49:00', '0.00', '0', '0.00', '0.00', '0.00', '0.00', 'ILS', NULL, '2', '1', '', '<p>rg45345</p>', '113', '0', '0', '1'),
 ('214', '1', '34', '101082', '???? ??????', '??? ????? 5', '?? ????', '52215', '069924504', '', '2014-07-05 18:48:04', '2014-07-05 18:48:04', '2014-07-05 18:50:04', '0.00', '0', '670.00', '670.00', '120.60', '790.60', 'ILS', NULL, '2', '1', '<p>????????????????????????????</p>\r\n<p>??????????????????</p>\r\n<p>??????</p>', '<p>rg45345</p>', '113', '1', '0', '1'),
 ('215', '3', '32', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '', '2014-07-06 16:05:36', '2014-07-06 16:05:36', '2014-07-06 16:08:36', '0.00', '0', '135.00', '135.00', '24.30', '159.30', 'ILS', NULL, '2', '1', '', '', '113', '0', '0', '1'),
 ('216', '3', '33', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '', '2014-07-06 16:05:36', '2014-07-06 16:05:36', '2014-07-06 17:20:36', '0.00', '0', '135.00', '135.00', '24.30', '159.30', 'ILS', NULL, '2', '4', '', '', '113', '0', '0', '1'),
 ('217', '3', '34', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '', '2014-07-06 16:05:15', '2014-07-06 16:05:15', '2014-07-06 16:09:15', '0.00', '0', '135.00', '135.00', '24.30', '159.30', 'ILS', NULL, '2', '1', '', '', '113', '0', '0', '1'),
 ('218', '3', '35', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '', '2014-07-06 16:05:22', '2014-07-06 16:05:22', '2014-07-06 16:10:22', '0.00', '0', '135.00', '135.00', '24.30', '159.30', 'ILS', NULL, '2', '1', '', '', '113', '0', '0', '1'),
 ('219', '3', '36', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '', '2014-07-06 16:05:52', '2014-07-06 16:05:52', '2014-07-06 18:37:52', '0.00', '0', '135.00', '135.00', '24.30', '159.30', 'ILS', NULL, '2', '8', '', '', '113', '1', '0', '1'),
 ('220', '8', '12', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '', '2014-07-06 18:28:41', '2014-07-06 18:28:41', '2014-07-06 20:08:41', '0.00', '0', NULL, NULL, NULL, '145.00', 'ILS', '0.00', '2', '5', '', '', '113', '1', '0', '1'),
 ('221', '8', '13', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '', '2014-07-06 18:34:23', '2014-07-06 18:34:23', '2014-07-06 18:34:23', '0.00', '0', NULL, NULL, NULL, '150.00', 'ILS', '0.00', '2', '1', '', '', '113', '1', '0', '1'),
 ('222', '2', '3', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '', '2014-07-06 20:09:47', '2014-07-06 20:09:47', '2014-07-06 20:09:47', '0.00', '0', '135.00', '135.00', '24.30', '159.30', 'ILS', NULL, '2', NULL, '', '', '113', '1', '0', '1'),
 ('223', '2', '4', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '', '2014-07-06 20:10:48', '2014-07-06 20:10:48', '2014-07-06 20:12:48', '0.00', '0', '135.00', '135.00', '0.00', '135.00', 'ILS', NULL, '2', '1', '', '', '113', '1', '0', '1'),
 ('224', '3', '37', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '', '2014-07-06 20:10:00', '2014-07-06 20:10:00', '2014-07-06 20:12:00', '0.00', '0', '435.00', '435.00', '78.30', '513.30', 'ILS', NULL, '2', NULL, '', '', '113', '1', '0', '1'),
 ('225', '2', '5', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '', '2014-07-06 20:12:46', '2014-07-06 20:12:46', '2014-07-06 20:12:46', '0.00', '0', '435.00', '435.00', '78.30', '513.30', 'ILS', NULL, '2', '1', '', '', '113', '1', '0', '1'),
 ('226', '2', '6', '101082', '???? ??????', '??? ????? 5', '?? ????', '52215', '069924504', '', '2014-07-06 20:13:49', '2014-07-06 20:13:49', '2014-07-06 20:13:49', '0.00', '0', '670.00', '670.00', '120.60', '790.60', 'ILS', NULL, '2', NULL, '', '', '113', '1', '0', '1'),
 ('227', '2', '7', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '', '2014-07-06 20:14:48', '2014-07-06 20:14:48', '2014-07-06 20:14:48', '0.00', '0', '435.00', '435.00', '78.30', '513.30', 'ILS', NULL, '2', NULL, '', '', '113', '1', '0', '1'),
 ('228', '1', '35', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '', '2014-07-06 20:15:13', '2014-07-06 20:15:13', '2014-07-06 20:15:13', '0.00', '0', '435.00', '435.00', '0.00', '435.00', 'ILS', NULL, '2', NULL, '', '<p>rg45345</p>', '113', '1', '0', '1'),
 ('229', '1', '36', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '', '2014-07-06 20:15:35', '2014-07-06 20:15:35', '2014-07-06 20:18:35', '0.00', '0', '435.00', '435.00', '0.00', '435.00', 'ILS', NULL, '2', '1', '', '<p>rg45345</p>', '113', '1', '0', '1'),
 ('230', '1', '37', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '', '2014-07-06 20:19:28', '2014-07-06 20:19:28', '2014-07-07 11:53:28', '0.00', '0', '435.00', '435.00', '78.30', '513.30', 'ILS', NULL, '2', NULL, '', '<p>rg45345</p>', '113', '1', '0', '1'),
 ('231', '1', '38', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '', '2014-07-06 20:19:28', '2014-07-06 20:19:28', '2014-07-07 11:53:28', '0.00', '0', '435.00', '435.00', '78.30', '513.30', 'ILS', NULL, '2', NULL, '', '<p>rg45345</p>', '113', '1', '0', '1'),
 ('232', '1', '39', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '237', '2014-07-06 20:19:59', '2014-07-06 20:19:59', '2014-07-07 12:07:59', '0.00', '0', '435.00', '435.00', '78.30', '513.30', 'ILS', NULL, '2', '1', '', '<p>rg45345</p>', '113', '1', '1', '1'),
 ('233', '2', '8', '101082', '???? ??????', '??? ????? 5', '?? ????', '52215', '069924504', '', '2014-07-06 20:43:44', '2014-07-06 20:43:44', '2014-07-06 20:43:44', '0.00', '0', '135.00', '135.00', '24.30', '159.30', 'ILS', NULL, '2', '1', '', '', '113', '1', '0', '1'),
 ('234', '1', '40', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '', '2014-07-06 20:19:28', '2014-07-06 20:19:28', '2014-07-07 11:53:28', '0.00', '0', '435.00', '435.00', '78.30', '513.30', 'ILS', NULL, '2', '1', '', '<p>rg45345</p>', '113', '1', '0', '1'),
 ('235', '2', '9', '101082', '???? ??????', '??? ????? 5', '?? ????', '52215', '069924504', '237', '2014-07-06 20:43:59', '2014-07-06 20:43:59', '2014-07-07 12:07:59', '0.00', '0', '135.00', '135.00', '24.30', '159.30', 'ILS', NULL, '2', '16', '', '', '113', '1', '1', '1'),
 ('236', '2', '10', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '237', '2014-07-07 09:04:59', '2014-07-07 09:04:59', '2014-07-07 12:07:59', '0.00', '0', '435.00', '435.00', '78.30', '513.30', 'ILS', NULL, '2', NULL, '<p>???? ?????</p>', '', '113', '1', '1', '1'),
 ('237', '3', '38', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '', '2014-07-07 11:48:59', '2014-07-07 11:48:59', '2014-07-07 12:07:59', '0.00', '0', '2000.00', '2000.00', '360.00', '2360.00', 'ILS', NULL, '1', '1', '', '', '113', '0', '0', '1'),
 ('238', '3', '39', '101082', '???? ??????', '??? ????? 5', '?? ????', '52215', '069924504', '', '2014-07-07 11:48:22', '2014-07-07 11:48:22', '2014-07-07 12:01:22', '0.00', '0', '15.00', '15.00', '2.70', '17.70', 'ILS', NULL, '1', NULL, '', '', '113', '0', '0', '1'),
 ('239', '5', '2', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '', '2014-07-07 09:04:01', '2014-07-07 09:04:01', '2014-07-07 13:16:01', '0.00', '0', '435.00', '435.00', '78.30', '513.30', 'ILS', NULL, '2', NULL, '<p>???? ?????</p>', '', '113', '1', '0', '1'),
 ('240', '3', '40', '101082', '???? ??????', '??? ????? 5', '?? ????', '52215', '069924504', '241', '2014-07-07 13:16:29', '2014-07-07 13:16:29', '2014-07-07 13:27:29', '0.00', '0', '1105.00', '1105.00', '198.90', '1303.90', 'ILS', NULL, '2', NULL, '<p>???? ?????</p>\r\n<p>?????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ??????</p>', '<p>???? ????? ?????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ???????????? ???? ???? ??????</p>', '113', '1', '1', '1'),
 ('241', '3', '41', '101082', '???? ??????', '??? ????? 5', '?? ????', '52215', '069924504', '', '2014-07-07 13:27:29', '2014-07-07 13:27:29', '2014-07-07 13:27:29', '0.00', '0', '15000.00', '15000.00', '2700.00', '17700.00', 'ILS', NULL, '2', NULL, '', '', '113', '1', '0', '1'),
 ('242', '13', '2', '101086', NULL, '', '', '', '300777778', '', '2014-07-07 13:27:18', '2014-07-07 13:27:18', '2014-07-07 13:28:18', '0.00', '0', '67500.00', '67500.00', '12150.00', '79650.00', 'ILS', NULL, '1', NULL, '', '', '17', '1', '0', '1'),
 ('243', '3', '42', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '', '2014-07-07 13:35:10', '2014-07-07 13:35:10', '2014-07-07 13:36:10', '0.00', '0', '12.00', '12.00', '2.16', '14.16', 'ILS', NULL, '2', NULL, '', '', NULL, '1', '0', '1'),
 ('244', '4', '5', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '', '2014-07-07 13:35:28', '2014-07-07 13:35:28', '2014-07-07 13:57:28', '0.00', '0', '12.00', '12.00', '2.16', '14.16', 'ILS', NULL, '2', NULL, '', '', NULL, '1', '0', '1'),
 ('245', '3', '43', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '', '2014-07-07 14:00:19', '2014-07-07 14:00:19', '2014-07-07 14:01:19', '0.00', '0', '135.00', '135.00', '0.00', '135.00', 'ILS', NULL, '2', NULL, '', '', NULL, '1', '0', '1'),
 ('246', '3', '44', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '', '2014-07-07 14:03:18', '2014-07-07 14:03:18', '2014-07-07 14:03:18', '0.00', '0', '1.00', '1.00', '0.18', '1.18', 'ILS', NULL, '2', '1', '', '', NULL, '1', '0', '1'),
 ('247', '3', '45', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '', '2014-07-07 14:21:22', '2014-07-07 14:21:22', '2014-07-07 14:21:22', '0.00', '0', '1.10', '1.10', '0.20', '1.30', 'ILS', NULL, '2', NULL, '', '', NULL, '1', '0', '1'),
 ('248', '13', '3', '101086', NULL, '', '', '', '300777778', '', '2014-07-07 14:42:30', '2014-07-07 14:42:30', '2014-07-07 14:42:30', '0.00', '0', '2700.00', '2700.00', '486.00', '3186.00', 'ILS', NULL, '1', NULL, '', '', '17', '1', '0', '1'),
 ('249', '15', '2', '101080', NULL, '', '', '', '', '', '2014-07-07 14:46:37', '2014-07-07 14:46:37', '2014-07-07 14:46:37', '0.00', '0', '4050.00', '4050.00', '729.00', '4779.00', 'ILS', NULL, '1', NULL, '', '', '101083', '1', '0', '1'),
 ('250', '3', '46', '101082', '???? ??????', '??? ????? 5', '?? ????', '52215', '069924504', '', '2014-07-07 14:46:54', '2014-07-07 14:46:54', '2014-07-07 14:46:54', '0.00', '0', '1.00', '1.00', '0.18', '1.18', 'ILS', NULL, '2', NULL, '', '', NULL, '1', '0', '1'),
 ('251', '3', '47', '101082', '???? ??????', '??? ????? 5', '?? ????', '52215', '069924504', '', '2014-06-30 09:06:31', '2014-06-30 09:06:31', '2014-07-07 15:08:31', '0.00', '0', '2250.00', '2250.00', '405.00', '2655.00', 'ILS', NULL, '2', NULL, '', '', NULL, '1', '0', '1'),
 ('252', '14', '2', '101086', NULL, '', '', '', '300777778', '', '2014-07-07 15:09:28', '2014-07-07 15:09:28', '2014-07-07 15:13:28', '0.00', '0', '2175.00', '2175.00', '391.50', '2566.50', 'ILS', NULL, '1', NULL, '', '', '6', '1', '0', '1'),
 ('253', '3', '48', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '', '2014-07-07 15:14:12', '2014-07-07 15:14:12', '2014-07-07 15:15:12', '0.00', '0', '0.00', '0.00', '0.00', '0.00', 'ILS', NULL, '2', NULL, '', '', NULL, '1', '0', '1'),
 ('254', '3', '49', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '', '2014-07-07 15:16:46', '2014-07-07 15:16:46', '2014-07-07 15:16:46', '0.00', '0', '1.00', '1.00', '0.18', '1.18', 'ILS', NULL, '2', NULL, '', '', NULL, '1', '0', '1'),
 ('255', '3', '50', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '257', '2014-07-07 16:06:24', '2014-07-07 16:06:24', '2014-07-07 16:26:24', '0.00', '0', '670.00', '670.00', '120.60', '790.60', 'ILS', NULL, '2', NULL, '', '', NULL, '1', '1', '1'),
 ('256', '15', '3', '101080', NULL, '', '', '', '', '', '2014-07-07 16:22:55', '2014-07-07 16:22:55', '2014-07-07 16:22:55', '0.00', '0', '15000000.00', '15000000.00', '2700000.00', '17700000.00', 'ILS', NULL, '1', NULL, '', '', '101083', '1', '0', '1'),
 ('257', '4', '6', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '', '2014-07-07 16:06:24', '2014-07-07 16:06:24', '2014-07-07 16:26:24', '0.00', '0', '670.00', '670.00', '120.60', '790.60', 'ILS', NULL, '2', NULL, '', '', NULL, '1', '0', '1'),
 ('258', '15', '4', '101083', NULL, '', '', '', '', '', '2014-07-07 16:29:35', '2014-07-07 16:29:35', '2014-07-07 16:29:35', '0.00', '0', '225000.00', '225000.00', '40500.00', '265500.00', 'ILS', NULL, '1', NULL, '', '', '101080', '1', '0', '1'),
 ('259', '15', '5', '101083', NULL, '', '', '', '', '', '2014-07-07 16:36:39', '2014-07-07 16:36:39', '2014-07-07 16:36:39', '0.00', '0', '2025.00', '2025.00', '364.50', '2389.50', 'ILS', NULL, '1', NULL, '', '', '101080', '1', '0', '1'),
 ('260', '13', '4', '101086', NULL, '', '', '', '300777778', '', '2014-07-07 16:36:53', '2014-07-07 16:36:53', '2014-07-07 16:36:53', '0.00', '0', '30000.00', '30000.00', '5400.00', '35400.00', 'ILS', NULL, '1', NULL, '', '', '33', '1', '0', '1'),
 ('261', '13', '5', '114', NULL, '', '', '', '0', '', '2014-07-07 16:40:12', '2014-07-07 16:40:12', '2014-07-07 16:42:12', '0.00', '0', '30000.00', '30000.00', '5400.00', '35400.00', 'ILS', NULL, '1', NULL, '', '', '33', '1', '0', '1'),
 ('262', '13', '6', '114', NULL, '', '', '', '0', '', '2014-07-07 17:35:54', '2014-07-07 17:35:54', '2014-07-07 17:35:54', '0.00', '0', '2000.00', '2000.00', '0.00', '2000.00', 'ILS', NULL, '1', NULL, '', '', '34', '1', '0', '1'),
 ('263', '1', '41', '101081', '???? ????? ??\"?', '', '', '', '', '', '2014-07-07 17:55:42', '2014-07-07 17:55:42', '2014-07-07 17:55:42', '0.00', '0', '435.00', '435.00', '78.30', '513.30', 'ILS', NULL, '2', NULL, '', '<p style=\"text-align: right;\">??? _____________________ ???? ??????? ??? ??????? ???? ?? ??????? ??\"? __________________ ????? ?????? ?????</p>', NULL, '1', '0', '1'),
 ('264', '14', '3', '101086', NULL, '', '', '', '300777778', '', '2014-07-07 18:01:37', '2014-07-07 18:01:37', '2014-07-07 18:02:37', '0.00', '0', '540.00', '540.00', '97.20', '637.20', 'ILS', NULL, '1', NULL, '', '', '10', '1', '0', '1'),
 ('265', '3', '51', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '', '2014-07-07 19:44:03', '2014-07-07 19:44:03', '2014-07-07 19:45:03', '0.00', '0', '15000.00', '15000.00', '0.00', '15000.00', 'ILS', NULL, '2', NULL, '', '', NULL, '1', '0', '1'),
 ('266', '13', '7', '101086', NULL, '', '', '', '300777778', '', '2014-07-07 20:16:46', '2014-07-07 20:16:46', '2014-07-07 20:16:46', '0.00', '0', '15000.00', '15000.00', '2700.00', '17700.00', 'ILS', NULL, '1', NULL, '', '', '17', '1', '0', '1'),
 ('267', '13', '8', '114', NULL, '', '', '', '0', '', '2014-07-07 20:17:19', '2014-07-07 20:17:19', '2014-07-07 20:17:19', '0.00', '0', '2000.00', '2000.00', '0.00', '2000.00', 'ILS', NULL, '1', NULL, '', '', '33', '1', '0', '1'),
 ('268', '1', '42', '101068', '', '', '', '', '', '', '2014-07-08 08:11:59', '2014-07-08 08:11:59', '2014-07-08 08:11:59', '0.00', '0', '0.00', '0.00', '0.00', '0.00', 'ILS', NULL, '2', '1', '', '<p style=\"text-align: right;\">??? _____________________ ???? ??????? ??? ??????? ???? ?? ??????? ??\"? __________________ ????? ?????? ?????</p>', NULL, '0', '0', '1'),
 ('269', '2', '11', '101068', '', '', '', '', '', '', '2014-07-08 08:13:20', '2014-07-08 08:13:20', '2014-07-10 08:14:20', '0.00', '0', '0.00', '0.00', '0.00', '0.00', 'ILS', NULL, '2', '1', '', '', NULL, '0', '0', '11'),
 ('270', '7', '3', '101082', '???? ??????', '??? ????? 5', '?? ????', '52215', '069924504', '', '2014-07-11 23:51:30', '2014-07-11 23:51:30', '2014-07-11 23:54:30', '100.00', '0', '470.00', '470.00', '84.60', '554.60', 'ILS', NULL, '2', '1', '', '', NULL, '1', '0', '11'),
 ('271', '3', '52', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '', '2014-07-12 14:25:43', '2014-07-12 14:25:43', '2014-07-12 14:37:43', '670.00', '0', '15000.00', '15000.00', '2700.00', '17700.00', 'ILS', NULL, '2', NULL, '', '', NULL, '1', '0', '1'),
 ('272', '3', '53', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '', '2014-07-12 15:05:57', '2014-07-12 15:05:57', '2014-07-12 15:05:57', '0.00', '0', '15000.00', '15000.00', '2700.00', '17700.00', 'ILS', NULL, '2', NULL, '', '', NULL, '1', '0', '1'),
 ('273', '3', '54', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '', '2014-07-12 15:05:18', '2014-07-12 15:05:18', '2014-07-12 15:09:18', '0.00', '0', '15000.00', '15000.00', '2700.00', '17700.00', 'ILS', NULL, '2', NULL, '', '', NULL, '1', '0', '1'),
 ('274', '3', '55', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '', '2014-07-12 15:05:52', '2014-07-12 15:05:52', '2014-07-12 15:09:52', '0.00', '0', '15000.00', '15000.00', '2700.00', '17700.00', 'ILS', NULL, '2', '1', '', '', NULL, '1', '0', '1'),
 ('275', '3', '56', '101068', '', '', '', '', '', '', '2014-07-12 15:13:56', '2014-07-12 15:13:56', '2014-07-12 15:13:56', '0.00', '0', '1271.19', '1271.19', '228.81', '1500.00', 'ILS', NULL, '2', '1', '', '', NULL, '1', '0', '1'),
 ('276', '3', '57', '101068', '', '', '', '', '', '', '2014-07-12 15:18:33', '2014-07-12 15:18:33', '2014-07-12 15:22:33', '0.00', '0', '0.00', '0.00', '0.00', '0.00', 'ILS', NULL, '2', '1', '', '', '113', '1', '0', '1'),
 ('277', '3', '58', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '', '2014-07-12 15:27:35', '2014-07-12 15:27:35', '2014-07-12 15:40:35', '100.00', '0', '408.47', '0.00', '73.52', '481.99', 'ILS', NULL, '2', '1', '', '', NULL, '1', '0', '1'),
 ('278', '2', '12', '101082', '???? ??????', '??? ????? 5', '?? ????', '52215', '069924504', '', '2014-07-12 02:20:30', '2014-07-12 02:20:30', '2014-07-12 02:41:30', '10.00', '0', '1094.53', '1094.53', '197.01', '1291.54', 'ILS', NULL, '2', '1', '', '', NULL, '1', '0', '11'),
 ('279', '3', '59', '101082', '???? ??????', '??? ????? 5', '?? ????', '52215', '069924504', '', '2014-07-12 02:42:39', '2014-07-12 02:42:39', '2014-07-12 02:44:39', '10.00', '0', '228.82', '228.82', '41.19', '270.00', 'ILS', NULL, '2', '1', '', '', NULL, '1', '0', '11'),
 ('280', '3', '60', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '', '2014-07-12 16:19:17', '2014-07-12 16:19:17', '2014-07-12 16:48:17', '0.00', '0', '15000.00', '15000.00', '2700.00', '17700.00', 'ILS', NULL, '2', '1', '', '', NULL, '1', '0', '1'),
 ('281', '3', '61', '101082', '???? ??????', '??? ????? 5', '?? ????', '52215', '069924504', '', '2014-07-12 18:31:12', '2014-07-12 18:31:12', '2014-07-12 18:36:12', '10.00', '0', '1597.50', '1597.50', '287.55', '1885.05', 'ILS', NULL, '2', '4', '', '', NULL, '1', '0', '1'),
 ('282', '3', '62', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '', '2014-07-12 18:44:50', '2014-07-12 18:44:50', '2014-07-12 18:46:50', '0.00', '0', '1240.00', '1240.00', '223.20', '1463.20', 'ILS', NULL, '2', '1', '', '', NULL, '1', '0', '11'),
 ('283', '3', '63', '101081', '???? ????? ??\"?', '', '', '', '', '', '2014-07-12 18:51:55', '2014-07-12 18:51:55', '2014-07-12 18:51:55', '0.00', '0', '670.00', '670.00', '120.60', '790.60', 'ILS', NULL, '2', '1', '', '', NULL, '1', '0', '11'),
 ('284', '7', NULL, '101087', '???? ???? ?????? ????? ??\"?', '???? ??? ???? ??? 345', '?\"? ?????', '34343', '069924504', '', '2014-07-12 19:42:16', '2014-07-13 19:42:16', '2014-07-12 19:43:16', '0.00', '0', '435.00', '435.00', '78.30', '513.30', 'ILS', NULL, '1', NULL, '', '', NULL, '0', '0', '11'),
 ('285', '7', NULL, '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '', '2014-07-12 19:43:48', '2014-07-12 19:43:48', '2014-07-12 19:43:48', '0.00', '0', '435.00', '435.00', '78.30', '513.30', 'ILS', NULL, '1', NULL, '', '', NULL, '0', '0', '11'),
 ('286', '7', NULL, '101082', '???? ??????', '??? ????? 5', '?? ????', '52215', '069924504', '', '2014-07-12 19:44:13', '2014-07-12 19:44:13', '2014-07-12 19:44:13', '0.00', '0', '135.00', '135.00', '24.30', '159.30', 'ILS', NULL, '1', NULL, '', '', NULL, '0', '0', '11'),
 ('287', '13', '9', '101086', NULL, '', '', '', '300777778', '', '2014-07-13 08:54:27', '2014-07-13 08:54:27', '2014-07-13 08:54:27', '0.00', '0', '670.00', '670.00', '120.60', '790.60', 'ILS', NULL, '1', '1', '', '', '17', '1', '0', '11'),
 ('288', '14', '4', '114', NULL, '', '', '', '0', '', '2014-07-13 08:55:12', '2014-07-13 08:55:12', '2014-07-13 08:56:12', '0.00', '0', '135.00', '135.00', '24.30', '159.30', 'ILS', NULL, '1', '1', '', '', '6', '1', '0', '11'),
 ('289', '13', '10', '101086', NULL, '', '', '', '300777778', '', '2014-07-13 09:00:31', '2014-07-31 09:00:31', '2014-07-13 09:01:31', '0.00', '0', '18750.00', '18750.00', '3375.00', '22125.00', 'ILS', NULL, '1', '1', '', '', '17', '1', '0', '11'),
 ('290', '1', '43', '101087', '???? ???? ?????? ????? ??\"?', '???? ??? ???? ??? 345', '?\"? ?????', '34343', '069924504', '', '2014-07-13 09:40:14', '2014-07-13 09:40:14', '2014-07-13 09:41:14', '0.00', '0', '8700.00', '8700.00', '1566.00', '10266.00', 'ILS', NULL, '2', '1', '', '<p style=\"text-align: right;\">??? _____________________ ???? ??????? ??? ??????? ???? ?? ??????? ??\"? __________________ ????? ?????? ?????</p>', NULL, '1', '0', '11'),
 ('291', '1', '44', '101087', '???? ???? ?????? ????? ??\"?', '???? ??? ???? ??? 345', '?\"? ?????', '34343', '069924504', '', '2014-07-13 09:43:24', '2014-07-24 09:43:24', '2014-07-13 09:44:24', '0.00', '0', '21750.00', '21750.00', '3915.00', '25665.00', 'ILS', NULL, '2', '1', '', '<p style=\"text-align: right;\">??? _____________________ ???? ??????? ??? ??????? ???? ?? ??????? ??\"? __________________ ????? ?????? ?????</p>', NULL, '1', '0', '11'),
 ('292', '3', '64', '101087', '???? ???? ?????? ????? ??\"?', '???? ??? ???? ??? 345', '?\"? ?????', '34343', '069924504', '', '2014-07-08 09:47:01', '2014-07-08 09:47:01', '2014-07-13 09:48:01', '0.00', '0', '3240.00', '3240.00', '583.20', '3823.20', 'ILS', NULL, '2', '1', '', '', NULL, '1', '0', '11'),
 ('293', '7', '4', '101071', '??????? ??\"?', '', '', '', '', '', '2014-07-13 10:00:53', '2014-07-13 10:00:53', '2014-07-13 10:00:53', '0.00', '0', '670.00', '670.00', '120.60', '790.60', 'ILS', NULL, '2', '1', '', '', NULL, '1', '0', '11'),
 ('294', '7', '5', '101082', '???? ??????', '??? ????? 5', '?? ????', '52215', '069924504', '', '2014-07-13 10:01:54', '2014-07-13 10:01:54', '2014-07-13 10:01:54', '0.00', '0', '345.00', '345.00', '62.10', '407.10', 'ILS', NULL, '2', '1', '', '', NULL, '1', '0', '11'),
 ('295', '3', '65', '101087', '???? ???? ?????? ????? ??\"?', '???? ??? ???? ??? 345', '?\"? ?????', '34343', '069924504', '', '2014-07-13 13:43:01', '2013-01-16 13:43:01', '2014-07-13 13:44:01', '0.00', '0', '29145.00', '29145.00', '5246.10', '34391.10', 'ILS', NULL, '2', '1', '', '', NULL, '1', '0', '11'),
 ('296', '3', '66', '101082', '???? ??????', '??? ????? 5', '?? ????', '52215', '069924504', '', '2014-07-13 13:44:40', '2013-02-20 13:44:40', '2014-07-13 13:44:40', '0.00', '0', '14790.00', '14790.00', '2662.20', '17452.20', 'ILS', NULL, '2', '1', '', '', NULL, '1', '0', '11'),
 ('297', '13', '11', '101086', NULL, '', '', '', '300777778', '', '2014-07-13 13:44:33', '2013-01-15 13:44:33', '2014-07-13 13:45:33', '0.00', '0', '15660.00', '15660.00', '2818.80', '18478.80', 'ILS', NULL, '1', '1', '', '', '17', '1', '0', '11'),
 ('298', '1', '45', '101087', '???? ???? ?????? ????? ??\"?', '???? ??? ???? ??? 345', '?\"? ?????', '34343', '069924504', '', '2014-07-15 18:38:16', '2014-07-15 18:38:16', '2014-07-15 18:39:16', '50.00', '1', '335.00', '0.00', '60.30', '395.30', 'ILS', NULL, '2', '1', '', '<p style=\"text-align: right;\">??? _____________________ ???? ??????? ??? ??????? ???? ?? ??????? ??\"? __________________ ????? ?????? ?????</p>', NULL, '1', '0', '1'),
 ('299', '6', '6', '101088', '???? ?? ??\"?', '??? ????? 12', '?? ????', '', '069924496', '300', '2014-07-16 19:02:43', '2014-07-16 19:02:43', '2014-07-16 19:50:43', '0.00', '0', '3500.00', '0.00', '630.00', '4130.00', 'ILS', NULL, '2', '8', '', '', NULL, '1', '1', '1'),
 ('300', '7', '6', '101088', '???? ?? ??\"?', '??? ????? 12', '?? ????', '', '069924496', '301', '2014-07-16 19:02:35', '2014-07-16 19:02:35', '2014-07-16 19:43:35', '0.00', '0', '3500.00', '0.00', '630.00', '4130.00', 'ILS', NULL, '2', '1', '', '', NULL, '1', '1', '1'),
 ('301', '2', '13', '101088', '???? ?? ??\"?', '??? ????? 12', '?? ????', '', '069924496', '302', '2014-07-16 19:02:35', '2014-07-16 19:02:35', '2014-07-16 19:43:35', '0.00', '0', '3700.00', '0.00', '666.00', '4366.00', 'ILS', NULL, '2', '1', '', '', NULL, '1', '0', '1'),
 ('302', '3', '67', '101088', '???? ?? ??\"?', '??? ????? 12', '?? ????', '', '069924496', '303', '2014-07-16 19:02:35', '2014-07-16 19:02:35', '2014-07-16 19:43:35', '0.00', '0', '3100.00', '0.00', '558.00', '3658.00', 'ILS', NULL, '2', '1', '', '', NULL, '1', '1', '1'),
 ('303', '8', '14', '101088', '???? ?? ??\"?', '??? ????? 12', '?? ????', '', '069924496', '', '2014-07-16 19:17:36', '2014-07-16 19:17:36', '2014-07-16 19:43:36', '0.00', '0', NULL, NULL, NULL, '3658.00', 'ILS', '0.00', '2', '4', '', '', '113', '1', '0', '1'),
 ('304', '2', '14', '101088', '???? ?? ??\"?', '??? ????? 12', '?? ????', '', '069924496', '', '2014-07-16 19:44:23', '2014-07-16 19:44:23', '2014-07-16 19:51:23', '0.00', '0', '1100.00', '0.00', '198.00', '1298.00', 'ILS', NULL, '2', '5', '', '', NULL, '1', '0', '1'),
 ('305', '9', '8', '101088', '???? ?? ??\"?', '??? ????? 12', '?? ????', '', '069924496', '', '2014-07-16 21:20:11', '2014-07-16 21:20:11', '2014-07-16 21:21:11', '0.00', '0', '435.00', '0.00', '78.30', '513.30', 'ILS', '0.00', '2', '1', '', '', NULL, '1', '0', '1'),
 ('306', '8', '15', '101081', '???? ????? ??\"?', '', '', '', '', '', '2014-07-21 20:06:03', '2014-07-21 20:06:03', '2014-07-21 20:09:03', '0.00', '0', NULL, NULL, NULL, '500.00', 'ILS', '0.00', '2', '1', '', '', '113', '1', '0', '1'),
 ('307', '8', '16', '101081', '???? ????? ??\"?', '', '', '', '', '', '2014-07-21 20:09:37', '2014-07-21 20:09:37', '2014-07-21 20:09:37', '0.00', '0', NULL, NULL, NULL, '500.00', 'ILS', '0.00', '2', '1', '', '', '113', '1', '0', '1'),
 ('308', '8', '17', '101081', '???? ????? ??\"?', '', '', '', '', '', '2014-07-21 20:11:22', '2014-07-21 20:11:22', '2014-07-21 20:11:22', '0.00', '0', NULL, NULL, NULL, '500.00', 'ILS', '0.00', '2', '1', '', '', '113', '1', '0', '1'),
 ('309', '8', '18', '101068', '', '', '', '', '', '', '2014-07-22 15:54:06', '2014-07-22 15:54:06', '2014-07-22 18:07:06', '0.00', '0', NULL, NULL, NULL, '0.00', 'ILS', '0.00', '2', '1', '', '', '113', '1', '0', '1'),
 ('310', '8', '19', '101082', '???? ??????', '??? ????? 5', '?? ????', '52215', '069924504', '', '2014-07-22 18:11:07', '2014-07-22 18:11:07', '2014-07-22 18:12:07', '0.00', '0', NULL, NULL, NULL, '0.00', 'ILS', '0.00', '2', '1', '', '', '113', '1', '0', '1'),
 ('311', '8', '20', '101082', '???? ??????', '??? ????? 5', '?? ????', '52215', '069924504', '', '2014-07-22 18:12:37', '2014-07-22 18:12:37', '2014-07-22 18:13:37', '0.00', '0', NULL, NULL, NULL, '100.00', 'ILS', '0.00', '2', '1', '', '', '113', '1', '0', '1'),
 ('312', '8', '21', '101081', '???? ????? ??\"?', '', '', '', '', '', '2014-07-22 18:16:17', '2014-07-22 18:16:17', '2014-07-22 18:16:17', '0.00', '0', NULL, NULL, NULL, '100.00', 'ILS', '0.00', '2', '1', '', '', '113', '1', '0', '1'),
 ('313', '8', '22', '101088', '???? ?? ??\"?', '??? ????? 12', '?? ????', '', '069924496', '', '2014-07-22 18:16:03', '2014-07-22 18:16:03', '2014-07-22 18:17:03', '0.00', '0', NULL, NULL, NULL, '111.00', 'ILS', '0.00', '2', NULL, '', '', '113', '1', '0', '1'),
 ('314', '8', '23', '101081', '???? ????? ??\"?', '', '', '', '', '', '2014-07-23 13:43:07', '2014-07-23 13:43:07', '2014-07-23 13:44:07', '0.00', '0', NULL, NULL, NULL, '3.00', 'ILS', '0.00', '2', '1', '', '', '113', '1', '0', '1'),
 ('315', '8', '24', '101082', '???? ??????', '??? ????? 5', '?? ????', '52215', '069924504', '', '2014-07-23 13:47:32', '2014-07-23 13:47:32', '2014-07-23 13:47:32', '0.00', '0', NULL, NULL, NULL, '3211.00', 'ILS', '0.00', '2', '1', '', '', '113', '1', '0', '1'),
 ('316', '8', '25', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '', '2014-07-23 15:02:53', '2014-07-23 15:02:53', '2014-07-23 15:02:53', '0.00', '0', NULL, NULL, NULL, '222.00', 'ILS', '0.00', '2', '1', '', '', '113', '1', '0', '1'),
 ('317', '8', '26', '101081', '???? ????? ??\"?', '', '', '', '', '', '2014-07-23 15:02:09', '2014-07-23 15:02:09', '2014-07-23 15:03:09', '0.00', '0', NULL, NULL, NULL, '232.00', 'ILS', '0.00', '2', NULL, '', '', '113', '1', '0', '1'),
 ('318', '8', '27', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '', '2014-07-23 15:04:44', '2014-07-23 15:04:44', '2014-07-23 15:04:44', '0.00', '0', NULL, NULL, NULL, '232.00', 'ILS', '0.00', '2', '1', '', '', '113', '1', '0', '1'),
 ('319', '8', '28', '101081', '???? ????? ??\"?', '', '', '', '', '', '2014-07-23 15:04:32', '2014-07-23 15:04:32', '2014-07-23 15:08:32', '0.00', '0', NULL, NULL, NULL, '0.00', 'ILS', '0.00', '2', '1', '', '', '113', '1', '0', '1'),
 ('320', '8', '29', '101084', '????? ????? ??\"?', '????? ????? 5', '?? ????', '', '069924504', '', '2014-07-23 15:40:15', '2014-07-23 15:40:15', '2014-07-23 15:41:15', '0.00', '0', NULL, NULL, NULL, '357.00', 'ILS', '0.00', '2', '1', '', '', '113', '1', '0', '1'),
 ('321', '8', '30', '101081', '???? ????? ??\"?', '', '', '', '', '', '2014-07-23 15:57:49', '2014-07-23 15:57:49', '2014-07-23 15:57:49', '0.00', '0', NULL, NULL, NULL, '333.00', 'ILS', '0.00', '2', '1', '', '', '113', '1', '0', '1'),
 ('322', '8', '31', '101081', '???? ????? ??\"?', '', '', '', '', '', '2014-07-23 15:57:09', '2014-07-23 15:57:09', '2014-07-23 15:58:09', '0.00', '0', NULL, NULL, NULL, '555.00', 'ILS', '0.00', '2', '1', '', '', '113', '1', '0', '1'),
 ('323', '8', '32', '101082', '???? ??????', '??? ????? 5', '?? ????', '52215', '069924504', '', '2014-07-23 16:12:02', '2014-07-23 16:12:02', '2014-07-23 16:13:02', '0.00', '0', NULL, NULL, NULL, '123.00', 'ILS', '0.00', '2', '1', '', '', '113', '1', '0', '1'),
 ('324', '8', '33', '101081', '???? ????? ??\"?', '', '', '', '', '', '2014-07-23 16:13:12', '2014-07-23 16:13:12', '2014-07-23 16:15:12', '0.00', '0', NULL, NULL, NULL, '741.00', 'ILS', '0.00', '2', '1', '', '', '113', '1', '0', '1'),
 ('325', '8', '34', '101088', '???? ?? ??\"?', '??? ????? 12', '?? ????', '', '069924496', '', '2014-07-23 19:39:09', '2014-07-23 19:39:09', '2014-07-23 19:40:09', '0.00', '0', NULL, NULL, NULL, '3333.00', 'ILS', '0.00', '2', '1', '', '', '113', '1', '0', '1'),
 ('326', '8', '35', '101081', '???? ????? ??\"?', '', '', '', '', '', '2014-07-23 19:50:10', '2014-07-23 19:50:10', '2014-07-27 11:58:10', '0.00', '0', NULL, NULL, NULL, '111.00', 'ILS', '0.00', '2', '19', '', '', '113', '1', '0', '1'),
 ('327', '8', '36', '101081', '???? ????? ??\"?', '', '', '', '', '', '2014-07-23 19:50:14', '2014-07-23 19:50:14', '2014-07-23 19:51:14', '0.00', '0', NULL, NULL, NULL, '357.00', 'ILS', '0.00', '2', '1', '', '', '113', '1', '0', '1'),
 ('328', '8', '37', '101082', '???? ??????', '??? ????? 5', '?? ????', '52215', '069924504', '', '2014-07-24 09:01:19', '2014-07-24 09:01:19', '2014-07-27 11:44:19', '0.00', '0', NULL, NULL, NULL, '1000.00', 'ILS', '0.00', '2', '6', '', '', '113', '1', '0', '1'),
 ('329', '8', '38', '101087', '???? ???? ?????? ????? ??\"?', '???? ??? ???? ??? 345', '?\"? ?????', '34343', '069924504', '', '2014-07-24 09:48:40', '2014-07-24 09:48:40', '2014-07-28 20:08:40', '0.00', '0', NULL, NULL, NULL, '100.00', 'ILS', '0.00', '2', '79', '', '', '113', '1', '0', '1');



--
-- Structure for table `qwe_eavAttr`
--

DROP TABLE IF EXISTS `qwe_eavAttr`;

CREATE TABLE `qwe_eavAttr` (
  `entity` bigint(20) unsigned NOT NULL,
  `attribute` varchar(250) NOT NULL,
  `value` text NOT NULL,
KEY `ikEntity` (`entity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `qwe_eavFields`
--

DROP TABLE IF EXISTS `qwe_eavFields`;

CREATE TABLE `qwe_eavFields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `eavType` varchar(255) NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Data for table `qwe_eavFields`
--

INSERT INTO `qwe_eavFields` (`id`, `name`, `eavType`, `min`, `max`) VALUES
 ('1', '??? ????', 'string', '0', '300'),
 ('2', 'sec server', 'string', '0', '300'),
 ('3', '????? IP', 'string', '7', '15'),
 ('4', '????? ????', 'boolean', '0', '1'),
 ('5', '???', 'url', '0', '255'),
 ('6', 'mhm', 'string', '0', '255');



--
-- Structure for table `qwe_extCorrelation`
--

DROP TABLE IF EXISTS `qwe_extCorrelation`;

CREATE TABLE `qwe_extCorrelation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `owner` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



--
-- Structure for table `qwe_files`
--

DROP TABLE IF EXISTS `qwe_files`;

CREATE TABLE `qwe_files` (
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
) ENGINE=InnoDB AUTO_INCREMENT=332 DEFAULT CHARSET=utf8;

--
-- Data for table `qwe_files`
--

INSERT INTO `qwe_files` (`id`, `name`, `path`, `public`, `parent_id`, `parent_type`, `date`, `expire`, `hash`) VALUES
 ('8', 'Screenshot from 2014-02-19 10:57:15.png', 'files/', '0', '170', 'Docs', '2014-03-13 15:04:09', '0', ''),
 ('9', 'Screenshot.png', 'files/', '0', '170', 'Docs', '2014-03-13 15:04:09', '0', ''),
 ('10', 'Screenshot.png', 'files/', '0', '101068', 'Accounts', '2014-03-13 15:04:54', '0', ''),
 ('11', 'bkmvdata.txt', 'openformt/bkmvdata-911673779133707.txt', '0', NULL, NULL, '2014-04-24 10:21:14', '360', ''),
 ('12', 'ini.txt', 'openformt/ini-911673779133707.txt', '0', NULL, NULL, '2014-04-24 10:21:14', '360', ''),
 ('13', 'bkmvdata.txt', 'openformt/bkmvdata-998035865370184.txt', '0', NULL, NULL, '2014-04-24 10:26:10', '360', ''),
 ('14', 'ini.txt', 'openformt/ini-998035865370184.txt', '0', NULL, NULL, '2014-04-24 10:26:10', '360', ''),
 ('15', 'bkmvdata.txt', 'openformt/bkmvdata-138839297462254.txt', '0', NULL, NULL, '2014-04-24 10:39:53', '360', ''),
 ('16', 'ini.txt', 'openformt/ini-138839297462254.txt', '0', NULL, NULL, '2014-04-24 10:39:53', '360', ''),
 ('17', 'bkmvdata.txt', 'openformt/bkmvdata-661621363367885.txt', '0', NULL, NULL, '2014-04-24 10:53:04', '360', ''),
 ('18', 'ini.txt', 'openformt/ini-661621363367885.txt', '0', NULL, NULL, '2014-04-24 10:53:04', '360', ''),
 ('19', 'bkmvdata.txt', 'openformt/bkmvdata-520799194928258.txt', '0', NULL, NULL, '2014-04-24 10:54:15', '360', ''),
 ('20', 'ini.txt', 'openformt/ini-520799194928258.txt', '0', NULL, NULL, '2014-04-24 10:54:15', '360', ''),
 ('21', 'bkmvdata.txt', 'openformt/bkmvdata-125947854481637.txt', '0', NULL, NULL, '2014-04-24 10:56:38', '360', ''),
 ('22', 'ini.txt', 'openformt/ini-125947854481637.txt', '0', NULL, NULL, '2014-04-24 10:56:38', '360', ''),
 ('23', 'bkmvdata.txt', 'openformt/bkmvdata-101249489467591.txt', '0', NULL, NULL, '2014-04-24 11:30:56', '360', ''),
 ('24', 'ini.txt', 'openformt/ini-101249489467591.txt', '0', NULL, NULL, '2014-04-24 11:30:56', '360', ''),
 ('25', 'bkmvdata.txt', 'openformt/bkmvdata-458321318961679.txt', '0', NULL, NULL, '2014-04-24 11:31:05', '360', ''),
 ('26', 'ini.txt', 'openformt/ini-458321318961679.txt', '0', NULL, NULL, '2014-04-24 11:31:05', '360', ''),
 ('27', 'bkmvdata.txt', 'openformt/bkmvdata-911167408805340.txt', '0', NULL, NULL, '2014-04-24 11:32:24', '360', ''),
 ('28', 'ini.txt', 'openformt/ini-911167408805340.txt', '0', NULL, NULL, '2014-04-24 11:32:24', '360', ''),
 ('29', 'bkmvdata.txt', 'openformt/bkmvdata-383205413352698.txt', '0', NULL, NULL, '2014-04-24 11:34:30', '360', ''),
 ('30', 'ini.txt', 'openformt/ini-383205413352698.txt', '0', NULL, NULL, '2014-04-24 11:34:30', '360', ''),
 ('31', 'bkmvdata.txt', 'openformt/bkmvdata-757320487406104.txt', '0', NULL, NULL, '2014-04-24 11:34:46', '360', ''),
 ('32', 'ini.txt', 'openformt/ini-757320487406104.txt', '0', NULL, NULL, '2014-04-24 11:34:46', '360', ''),
 ('33', 'bkmvdata.txt', 'openformt/bkmvdata-585020158905535.txt', '0', NULL, NULL, '2014-04-24 11:35:06', '360', ''),
 ('34', 'ini.txt', 'openformt/ini-585020158905535.txt', '0', NULL, NULL, '2014-04-24 11:35:07', '360', ''),
 ('35', 'bkmvdata.txt', 'openformt/bkmvdata-161756464280188.txt', '0', NULL, NULL, '2014-04-24 11:35:21', '360', ''),
 ('36', 'ini.txt', 'openformt/ini-161756464280188.txt', '0', NULL, NULL, '2014-04-24 11:35:21', '360', ''),
 ('37', 'bkmvdata.txt', 'openformt/bkmvdata-864835810381919.txt', '0', NULL, NULL, '2014-04-24 11:35:52', '360', ''),
 ('38', 'ini.txt', 'openformt/ini-864835810381919.txt', '0', NULL, NULL, '2014-04-24 11:35:52', '360', ''),
 ('39', 'bkmvdata.txt', 'openformt/bkmvdata-916885518934577.txt', '0', NULL, NULL, '2014-04-24 11:36:42', '360', ''),
 ('40', 'ini.txt', 'openformt/ini-916885518934577.txt', '0', NULL, NULL, '2014-04-24 11:36:43', '360', ''),
 ('41', 'bkmvdata.txt', 'openformt/bkmvdata-349041610490530.txt', '0', NULL, NULL, '2014-04-24 11:37:15', '360', ''),
 ('42', 'ini.txt', 'openformt/ini-349041610490530.txt', '0', NULL, NULL, '2014-04-24 11:37:15', '360', ''),
 ('43', 'bkmvdata.txt', 'openformt/bkmvdata-977889723610132.txt', '0', NULL, NULL, '2014-04-24 11:49:06', '360', ''),
 ('44', 'ini.txt', 'openformt/ini-977889723610132.txt', '0', NULL, NULL, '2014-04-24 11:49:06', '360', ''),
 ('45', 'bkmvdata.txt', 'openformt/bkmvdata-933999926783144.txt', '0', NULL, NULL, '2014-04-24 11:51:15', '360', ''),
 ('46', 'ini.txt', 'openformt/ini-933999926783144.txt', '0', NULL, NULL, '2014-04-24 11:51:15', '360', ''),
 ('47', 'bkmvdata.txt', 'openformt/bkmvdata-622281522490084.txt', '0', NULL, NULL, '2014-04-24 11:54:05', '360', ''),
 ('48', 'ini.txt', 'openformt/ini-622281522490084.txt', '0', NULL, NULL, '2014-04-24 11:54:05', '360', ''),
 ('49', 'bkmvdata.txt', 'openformt/bkmvdata-641405364032834.txt', '0', NULL, NULL, '2014-04-24 11:55:54', '360', ''),
 ('50', 'ini.txt', 'openformt/ini-641405364032834.txt', '0', NULL, NULL, '2014-04-24 11:55:54', '360', ''),
 ('51', 'bkmvdata.txt', 'openformt/bkmvdata-204056966584175.txt', '0', NULL, NULL, '2014-04-24 13:01:13', '360', ''),
 ('52', 'ini.txt', 'openformt/ini-204056966584175.txt', '0', NULL, NULL, '2014-04-24 13:01:13', '360', ''),
 ('53', 'bkmvdata.txt', 'openformt/bkmvdata-865585070103406.txt', '0', NULL, NULL, '2014-04-24 13:03:49', '360', ''),
 ('54', 'ini.txt', 'openformt/ini-865585070103406.txt', '0', NULL, NULL, '2014-04-24 13:03:49', '360', ''),
 ('55', 'bkmvdata.txt', 'openformt/bkmvdata-8291303645819.txt', '0', NULL, NULL, '2014-04-24 13:05:55', '360', ''),
 ('56', 'ini.txt', 'openformt/ini-8291303645819.txt', '0', NULL, NULL, '2014-04-24 13:05:55', '360', ''),
 ('57', 'bkmvdata.txt', 'openformt/bkmvdata-868544045835733.txt', '0', NULL, NULL, '2014-04-24 13:07:46', '360', ''),
 ('58', 'ini.txt', 'openformt/ini-868544045835733.txt', '0', NULL, NULL, '2014-04-24 13:07:46', '360', ''),
 ('59', 'bkmvdata.txt', 'openformt/bkmvdata-173775641713291.txt', '0', NULL, NULL, '2014-04-24 13:08:00', '360', ''),
 ('60', 'ini.txt', 'openformt/ini-173775641713291.txt', '0', NULL, NULL, '2014-04-24 13:08:00', '360', ''),
 ('61', 'bkmvdata.txt', 'openformt/bkmvdata-695296060759574.txt', '0', NULL, NULL, '2014-04-24 13:09:18', '360', ''),
 ('62', 'ini.txt', 'openformt/ini-695296060759574.txt', '0', NULL, NULL, '2014-04-24 13:09:18', '360', ''),
 ('63', 'bkmvdata.txt', 'openformt/bkmvdata-640783398877829.txt', '0', NULL, NULL, '2014-04-24 13:09:48', '360', ''),
 ('64', 'ini.txt', 'openformt/ini-640783398877829.txt', '0', NULL, NULL, '2014-04-24 13:09:48', '360', ''),
 ('65', 'bkmvdata.txt', 'openformt/bkmvdata-727513587102294.txt', '0', NULL, NULL, '2014-04-24 13:11:22', '360', ''),
 ('66', 'ini.txt', 'openformt/ini-727513587102294.txt', '0', NULL, NULL, '2014-04-24 13:11:22', '360', ''),
 ('67', 'bkmvdata.txt', 'openformt/bkmvdata-93131667468696.txt', '0', NULL, NULL, '2014-04-24 13:14:47', '360', ''),
 ('68', 'ini.txt', 'openformt/ini-93131667468696.txt', '0', NULL, NULL, '2014-04-24 13:14:47', '360', ''),
 ('69', 'bkmvdata.txt', 'openformt/bkmvdata-110290070995688.txt', '0', NULL, NULL, '2014-04-24 13:15:43', '360', ''),
 ('70', 'ini.txt', 'openformt/ini-110290070995688.txt', '0', NULL, NULL, '2014-04-24 13:15:43', '360', ''),
 ('71', 'bkmvdata.txt', 'openformt/bkmvdata-472129558678716.txt', '0', NULL, NULL, '2014-04-24 13:18:08', '360', ''),
 ('72', 'ini.txt', 'openformt/ini-472129558678716.txt', '0', NULL, NULL, '2014-04-24 13:18:08', '360', ''),
 ('73', 'bkmvdata.txt', 'openformt/bkmvdata-245772407390177.txt', '0', NULL, NULL, '2014-04-24 13:21:13', '360', ''),
 ('74', 'ini.txt', 'openformt/ini-245772407390177.txt', '0', NULL, NULL, '2014-04-24 13:21:13', '360', ''),
 ('75', 'bkmvdata.txt', 'openformt/bkmvdata-257834307849407.txt', '0', NULL, NULL, '2014-04-24 13:21:24', '360', ''),
 ('76', 'ini.txt', 'openformt/ini-257834307849407.txt', '0', NULL, NULL, '2014-04-24 13:21:24', '360', ''),
 ('77', 'bkmvdata.txt', 'openformt/bkmvdata-875052794348448.txt', '0', NULL, NULL, '2014-04-24 13:22:24', '360', ''),
 ('78', 'ini.txt', 'openformt/ini-875052794348448.txt', '0', NULL, NULL, '2014-04-24 13:22:24', '360', ''),
 ('79', 'bkmvdata.txt', 'openformt/bkmvdata-808423437178134.txt', '0', NULL, NULL, '2014-04-24 13:22:27', '360', ''),
 ('80', 'ini.txt', 'openformt/ini-808423437178134.txt', '0', NULL, NULL, '2014-04-24 13:22:27', '360', ''),
 ('81', 'bkmvdata.txt', 'openformt/bkmvdata-500469683203846.txt', '0', NULL, NULL, '2014-04-24 13:36:06', '360', ''),
 ('82', 'ini.txt', 'openformt/ini-500469683203846.txt', '0', NULL, NULL, '2014-04-24 13:36:06', '360', ''),
 ('83', 'bkmvdata.txt', 'openformt/bkmvdata-450493234209716.txt', '0', NULL, NULL, '2014-04-24 13:36:10', '360', ''),
 ('84', 'ini.txt', 'openformt/ini-450493234209716.txt', '0', NULL, NULL, '2014-04-24 13:36:11', '360', ''),
 ('85', 'bkmvdata.txt', 'openformt/bkmvdata-503607807215303.txt', '0', NULL, NULL, '2014-04-24 13:41:23', '360', ''),
 ('86', 'ini.txt', 'openformt/ini-503607807215303.txt', '0', NULL, NULL, '2014-04-24 13:41:23', '360', ''),
 ('87', 'bkmvdata.txt', 'openformt/bkmvdata-767554247751832.txt', '0', NULL, NULL, '2014-04-24 13:45:08', '360', ''),
 ('88', 'ini.txt', 'openformt/ini-767554247751832.txt', '0', NULL, NULL, '2014-04-24 13:45:08', '360', ''),
 ('89', 'bkmvdata.txt', 'openformt/bkmvdata-505088767036795.txt', '0', NULL, NULL, '2014-04-24 13:54:31', '360', ''),
 ('90', 'ini.txt', 'openformt/ini-505088767036795.txt', '0', NULL, NULL, '2014-04-24 13:54:31', '360', ''),
 ('91', 'bkmvdata.txt', 'openformt/bkmvdata-949883015360683.txt', '0', NULL, NULL, '2014-04-24 13:56:51', '360', ''),
 ('92', 'ini.txt', 'openformt/ini-949883015360683.txt', '0', NULL, NULL, '2014-04-24 13:56:51', '360', ''),
 ('93', 'bkmvdata.txt', 'openformt/bkmvdata-518097109626978.txt', '0', NULL, NULL, '2014-04-24 13:57:33', '360', ''),
 ('94', 'ini.txt', 'openformt/ini-518097109626978.txt', '0', NULL, NULL, '2014-04-24 13:57:33', '360', ''),
 ('95', 'bkmvdata.txt', 'openformt/bkmvdata-62328725121915.txt', '0', NULL, NULL, '2014-04-24 13:58:38', '360', ''),
 ('96', 'ini.txt', 'openformt/ini-62328725121915.txt', '0', NULL, NULL, '2014-04-24 13:58:38', '360', ''),
 ('97', 'bkmvdata.txt', 'openformt/bkmvdata-952689296565949.txt', '0', NULL, NULL, '2014-04-24 13:59:57', '360', ''),
 ('98', 'ini.txt', 'openformt/ini-952689296565949.txt', '0', NULL, NULL, '2014-04-24 13:59:57', '360', ''),
 ('99', 'bkmvdata.txt', 'openformt/bkmvdata-294058735016733.txt', '0', NULL, NULL, '2014-04-24 14:00:34', '360', ''),
 ('100', 'ini.txt', 'openformt/ini-294058735016733.txt', '0', NULL, NULL, '2014-04-24 14:00:34', '360', ''),
 ('101', 'bkmvdata.txt', 'openformt/bkmvdata-797660063952207.txt', '0', NULL, NULL, '2014-04-24 14:16:07', '360', ''),
 ('102', 'ini.txt', 'openformt/ini-797660063952207.txt', '0', NULL, NULL, '2014-04-24 14:16:07', '360', ''),
 ('103', 'bkmvdata.txt', 'openformt/bkmvdata-147295750677585.txt', '0', NULL, NULL, '2014-04-24 14:16:30', '360', ''),
 ('104', 'ini.txt', 'openformt/ini-147295750677585.txt', '0', NULL, NULL, '2014-04-24 14:16:30', '360', ''),
 ('105', 'bkmvdata.txt', 'openformt/bkmvdata-318439497146755.txt', '0', NULL, NULL, '2014-04-24 14:38:12', '360', ''),
 ('106', 'ini.txt', 'openformt/ini-318439497146755.txt', '0', NULL, NULL, '2014-04-24 14:38:12', '360', ''),
 ('107', 'bkmvdata.txt', 'openformt/bkmvdata-840573794674128.txt', '0', NULL, NULL, '2014-04-24 14:43:23', '360', ''),
 ('108', 'ini.txt', 'openformt/ini-840573794674128.txt', '0', NULL, NULL, '2014-04-24 14:43:23', '360', ''),
 ('109', 'bkmvdata.txt', 'openformt/bkmvdata-830352991819381.txt', '0', NULL, NULL, '2014-04-24 14:49:13', '360', ''),
 ('110', 'ini.txt', 'openformt/ini-830352991819381.txt', '0', NULL, NULL, '2014-04-24 14:49:13', '360', ''),
 ('111', 'bkmvdata.txt', 'openformt/bkmvdata-865471542347222.txt', '0', NULL, NULL, '2014-04-24 14:49:29', '360', ''),
 ('112', 'ini.txt', 'openformt/ini-865471542347222.txt', '0', NULL, NULL, '2014-04-24 14:49:29', '360', ''),
 ('113', 'bkmvdata.txt', 'openformt/bkmvdata-643011163454502.txt', '0', NULL, NULL, '2014-04-24 14:49:40', '360', ''),
 ('114', 'ini.txt', 'openformt/ini-643011163454502.txt', '0', NULL, NULL, '2014-04-24 14:49:40', '360', ''),
 ('115', 'bkmvdata.txt', 'openformt/bkmvdata-269489435944706.txt', '0', NULL, NULL, '2014-04-24 14:49:48', '360', ''),
 ('116', 'ini.txt', 'openformt/ini-269489435944706.txt', '0', NULL, NULL, '2014-04-24 14:49:48', '360', ''),
 ('117', 'bkmvdata.txt', 'openformt/bkmvdata-164664285723119.txt', '0', NULL, NULL, '2014-04-24 14:51:02', '360', ''),
 ('118', 'ini.txt', 'openformt/ini-164664285723119.txt', '0', NULL, NULL, '2014-04-24 14:51:02', '360', ''),
 ('119', 'bkmvdata.txt', 'openformt/bkmvdata-464877203106880.txt', '0', NULL, NULL, '2014-04-24 14:51:19', '360', ''),
 ('120', 'ini.txt', 'openformt/ini-464877203106880.txt', '0', NULL, NULL, '2014-04-24 14:51:19', '360', ''),
 ('121', 'bkmvdata.txt', 'openformt/bkmvdata-50373862497508.txt', '0', NULL, NULL, '2014-04-24 14:52:03', '360', ''),
 ('122', 'ini.txt', 'openformt/ini-50373862497508.txt', '0', NULL, NULL, '2014-04-24 14:52:03', '360', ''),
 ('123', 'bkmvdata.txt', 'openformt/bkmvdata-312814285513013.txt', '0', NULL, NULL, '2014-04-24 16:22:21', '360', ''),
 ('124', 'ini.txt', 'openformt/ini-312814285513013.txt', '0', NULL, NULL, '2014-04-24 16:22:21', '360', ''),
 ('125', 'bkmvdata.txt', 'openformt/bkmvdata-725492710247635.txt', '0', NULL, NULL, '2014-04-24 16:22:39', '360', ''),
 ('126', 'ini.txt', 'openformt/ini-725492710247635.txt', '0', NULL, NULL, '2014-04-24 16:22:39', '360', ''),
 ('127', 'bkmvdata.txt', 'openformt/bkmvdata-604760180693119.txt', '0', NULL, NULL, '2014-04-24 16:22:54', '360', ''),
 ('128', 'ini.txt', 'openformt/ini-604760180693119.txt', '0', NULL, NULL, '2014-04-24 16:22:54', '360', ''),
 ('129', 'bkmvdata.txt', 'openformt/bkmvdata-162634574342519.txt', '0', NULL, NULL, '2014-04-24 16:23:13', '360', ''),
 ('130', 'ini.txt', 'openformt/ini-162634574342519.txt', '0', NULL, NULL, '2014-04-24 16:23:13', '360', ''),
 ('131', 'bkmvdata.txt', 'openformt/bkmvdata-470695857424289.txt', '0', NULL, NULL, '2014-04-24 16:23:46', '360', ''),
 ('132', 'ini.txt', 'openformt/ini-470695857424289.txt', '0', NULL, NULL, '2014-04-24 16:23:46', '360', ''),
 ('133', 'bkmvdata.txt', 'openformt/bkmvdata-874902771785855.txt', '0', NULL, NULL, '2014-04-24 16:24:04', '360', ''),
 ('134', 'ini.txt', 'openformt/ini-874902771785855.txt', '0', NULL, NULL, '2014-04-24 16:24:04', '360', ''),
 ('135', 'bkmvdata.txt', 'openformt/bkmvdata-56679747998714.txt', '0', NULL, NULL, '2014-04-24 16:24:13', '360', ''),
 ('136', 'ini.txt', 'openformt/ini-56679747998714.txt', '0', NULL, NULL, '2014-04-24 16:24:13', '360', ''),
 ('137', 'bkmvdata.txt', 'openformt/bkmvdata-825925607234239.txt', '0', NULL, NULL, '2014-04-24 16:32:12', '360', ''),
 ('138', 'ini.txt', 'openformt/ini-825925607234239.txt', '0', NULL, NULL, '2014-04-24 16:32:13', '360', ''),
 ('139', 'bkmvdata.txt', 'openformt/bkmvdata-693678752519190.txt', '0', NULL, NULL, '2014-04-24 16:32:54', '360', ''),
 ('140', 'ini.txt', 'openformt/ini-693678752519190.txt', '0', NULL, NULL, '2014-04-24 16:32:54', '360', ''),
 ('141', 'bkmvdata.txt', 'openformt/bkmvdata-801250186748802.txt', '0', NULL, NULL, '2014-04-24 16:34:53', '360', ''),
 ('142', 'ini.txt', 'openformt/ini-801250186748802.txt', '0', NULL, NULL, '2014-04-24 16:34:53', '360', ''),
 ('143', 'bkmvdata.txt', 'openformt/bkmvdata-804902520030736.txt', '0', NULL, NULL, '2014-04-24 16:35:00', '360', ''),
 ('144', 'ini.txt', 'openformt/ini-804902520030736.txt', '0', NULL, NULL, '2014-04-24 16:35:00', '360', ''),
 ('145', 'bkmvdata.txt', 'openformt/bkmvdata-471589549910277.txt', '0', NULL, NULL, '2014-04-24 16:36:06', '360', ''),
 ('146', 'ini.txt', 'openformt/ini-471589549910277.txt', '0', NULL, NULL, '2014-04-24 16:36:06', '360', ''),
 ('147', 'bkmvdata.txt', 'openformt/bkmvdata-926546633709222.txt', '0', NULL, NULL, '2014-04-24 16:36:24', '360', ''),
 ('148', 'ini.txt', 'openformt/ini-926546633709222.txt', '0', NULL, NULL, '2014-04-24 16:36:24', '360', ''),
 ('149', 'bkmvdata.txt', 'openformt/bkmvdata-433515370357781.txt', '0', NULL, NULL, '2014-04-24 16:36:33', '360', ''),
 ('150', 'ini.txt', 'openformt/ini-433515370357781.txt', '0', NULL, NULL, '2014-04-24 16:36:33', '360', ''),
 ('151', 'bkmvdata.txt', 'openformt/bkmvdata-342511124443262.txt', '0', NULL, NULL, '2014-04-24 16:39:08', '360', ''),
 ('152', 'ini.txt', 'openformt/ini-342511124443262.txt', '0', NULL, NULL, '2014-04-24 16:39:08', '360', ''),
 ('153', 'bkmvdata.txt', 'openformt/bkmvdata-651562181301415.txt', '0', NULL, NULL, '2014-04-24 16:39:14', '360', ''),
 ('154', 'ini.txt', 'openformt/ini-651562181301415.txt', '0', NULL, NULL, '2014-04-24 16:39:14', '360', ''),
 ('155', 'bkmvdata.txt', 'openformt/bkmvdata-470049490686506.txt', '0', NULL, NULL, '2014-04-24 16:48:44', '360', ''),
 ('156', 'ini.txt', 'openformt/ini-470049490686506.txt', '0', NULL, NULL, '2014-04-24 16:48:44', '360', ''),
 ('157', 'bkmvdata.txt', 'openformt/bkmvdata-822798687033355.txt', '0', NULL, NULL, '2014-04-24 16:49:23', '360', ''),
 ('158', 'ini.txt', 'openformt/ini-822798687033355.txt', '0', NULL, NULL, '2014-04-24 16:49:23', '360', ''),
 ('159', 'bkmvdata.txt', 'openformt/bkmvdata-354972918052226.txt', '0', NULL, NULL, '2014-04-24 16:49:34', '360', ''),
 ('160', 'ini.txt', 'openformt/ini-354972918052226.txt', '0', NULL, NULL, '2014-04-24 16:49:34', '360', ''),
 ('161', 'bkmvdata.txt', 'openformt/bkmvdata-274986213073134.txt', '0', NULL, NULL, '2014-04-24 16:55:47', '360', ''),
 ('162', 'ini.txt', 'openformt/ini-274986213073134.txt', '0', NULL, NULL, '2014-04-24 16:55:47', '360', ''),
 ('163', 'bkmvdata.txt', 'openformt/bkmvdata-476981732062995.txt', '0', NULL, NULL, '2014-04-24 16:56:27', '360', ''),
 ('164', 'ini.txt', 'openformt/ini-476981732062995.txt', '0', NULL, NULL, '2014-04-24 16:56:27', '360', ''),
 ('165', 'bkmvdata.txt', 'openformt/bkmvdata-373009628150612.txt', '0', NULL, NULL, '2014-04-24 16:56:34', '360', ''),
 ('166', 'ini.txt', 'openformt/ini-373009628150612.txt', '0', NULL, NULL, '2014-04-24 16:56:34', '360', ''),
 ('167', 'bkmvdata.txt', 'openformt/bkmvdata-163576963357627.txt', '0', NULL, NULL, '2014-04-24 16:56:56', '360', ''),
 ('168', 'ini.txt', 'openformt/ini-163576963357627.txt', '0', NULL, NULL, '2014-04-24 16:56:56', '360', ''),
 ('169', 'bkmvdata.txt', 'openformt/bkmvdata-638036508578807.txt', '0', NULL, NULL, '2014-04-24 16:57:12', '360', ''),
 ('170', 'ini.txt', 'openformt/ini-638036508578807.txt', '0', NULL, NULL, '2014-04-24 16:57:12', '360', ''),
 ('171', 'bkmvdata.txt', 'openformt/bkmvdata-56795187294483.txt', '0', NULL, NULL, '2014-04-24 16:58:02', '360', ''),
 ('172', 'ini.txt', 'openformt/ini-56795187294483.txt', '0', NULL, NULL, '2014-04-24 16:58:02', '360', ''),
 ('173', 'bkmvdata.txt', 'openformt/bkmvdata-562938961666077.txt', '0', NULL, NULL, '2014-04-24 17:06:34', '360', ''),
 ('174', 'ini.txt', 'openformt/ini-562938961666077.txt', '0', NULL, NULL, '2014-04-24 17:06:35', '360', ''),
 ('175', 'bkmvdata.txt', 'openformt/bkmvdata-282128017395734.txt', '0', NULL, NULL, '2014-04-24 17:07:14', '360', ''),
 ('176', 'ini.txt', 'openformt/ini-282128017395734.txt', '0', NULL, NULL, '2014-04-24 17:07:14', '360', ''),
 ('177', 'bkmvdata.txt', 'openformt/bkmvdata-601432559546083.txt', '0', NULL, NULL, '2014-04-24 17:07:43', '360', ''),
 ('178', 'ini.txt', 'openformt/ini-601432559546083.txt', '0', NULL, NULL, '2014-04-24 17:07:43', '360', ''),
 ('179', 'bkmvdata.txt', 'openformt/bkmvdata-998812355101108.txt', '0', NULL, NULL, '2014-04-24 17:09:02', '360', ''),
 ('180', 'ini.txt', 'openformt/ini-998812355101108.txt', '0', NULL, NULL, '2014-04-24 17:09:02', '360', ''),
 ('181', 'company.logo.jpg', 'settings/', '0', '0', 'Settings', '2014-06-23 19:42:49', '0', ''),
 ('182', 'company.logo.jpg', 'settings/', '0', '0', 'Settings', '2014-06-26 22:19:39', '0', ''),
 ('183', 'company.logo.jpg', 'settings/', '0', '0', 'Settings', '2014-06-27 11:12:36', '0', ''),
 ('184', 'company.logo.jpg', 'settings/', '0', '0', 'Settings', '2014-06-29 11:42:34', '0', ''),
 ('185', 'company.logo.jpg', 'settings/', '0', '0', 'Settings', '2014-06-29 23:06:06', '0', ''),
 ('186', 'RDP.jpg', 'files/', '0', '101082', 'Accounts', '2014-06-29 23:10:13', '0', ''),
 ('187', '0.1.pdf', 'files/', '0', '101082', 'Accounts', '2014-06-29 23:12:29', '0', ''),
 ('188', 'bkmvdata.txt', 'openformt/bkmvdata-27408839203417.txt', '0', NULL, NULL, '2014-06-30 18:31:50', '360', ''),
 ('189', 'ini.txt', 'openformt/ini-27408839203417.txt', '0', NULL, NULL, '2014-06-30 18:31:50', '360', ''),
 ('190', 'bkmvdata.txt', 'openformt/bkmvdata-441138446796685.txt', '0', NULL, NULL, '2014-07-01 09:57:56', '360', ''),
 ('191', 'ini.txt', 'openformt/ini-441138446796685.txt', '0', NULL, NULL, '2014-07-01 09:57:56', '360', ''),
 ('192', 'bkmvdata.txt', 'openformt/bkmvdata-496739390306174.txt', '0', NULL, NULL, '2014-07-01 09:58:41', '360', ''),
 ('193', 'ini.txt', 'openformt/ini-496739390306174.txt', '0', NULL, NULL, '2014-07-01 09:58:41', '360', ''),
 ('194', 'bkmvdata.txt', 'openformt/bkmvdata-426677669864147.txt', '0', NULL, NULL, '2014-07-01 10:01:07', '360', ''),
 ('195', 'ini.txt', 'openformt/ini-426677669864147.txt', '0', NULL, NULL, '2014-07-01 10:01:07', '360', ''),
 ('196', 'bkmvdata.txt', 'openformt/bkmvdata-355596791487187.txt', '0', NULL, NULL, '2014-07-01 10:30:30', '360', ''),
 ('197', 'ini.txt', 'openformt/ini-355596791487187.txt', '0', NULL, NULL, '2014-07-01 10:30:30', '360', ''),
 ('199', '????? ?????? ???? ??????.pdf', 'files/', '0', '206', 'Docs', '2014-07-05 09:20:37', '0', ''),
 ('200', '????? ?????? ???? ??????.pdf', 'files/', '0', '206', 'Docs', '2014-07-05 09:20:37', '0', ''),
 ('201', 'company.logo.jpg', 'settings/', '0', '0', 'Settings', '2014-07-06 20:43:07', '0', ''),
 ('233', 'wtf.jpg', 'files/', '0', '235', 'Docs', '2014-07-07 10:06:59', '0', ''),
 ('234', 'company.logo.jpg', 'settings/', '0', '0', 'Settings', '2014-07-08 08:07:48', '0', ''),
 ('235', 'company.logo.jpg', 'settings/', '0', '0', 'Settings', '2014-07-08 08:12:55', '0', ''),
 ('236', 'company.logo.jpg', 'settings/', '0', '0', 'Settings', '2014-07-08 17:07:20', '0', ''),
 ('237', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-24 12:06:27', '0', ''),
 ('238', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-24 12:07:29', '0', ''),
 ('239', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-24 13:19:33', '0', ''),
 ('240', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-24 13:32:03', '0', ''),
 ('241', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-24 13:32:36', '0', ''),
 ('242', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-24 13:33:01', '0', ''),
 ('243', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-24 13:33:59', '0', ''),
 ('244', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-24 13:34:12', '0', ''),
 ('245', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-24 13:34:50', '0', ''),
 ('246', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-24 13:35:00', '0', ''),
 ('247', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-24 13:35:10', '0', ''),
 ('248', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-24 13:35:28', '0', ''),
 ('249', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-24 13:35:43', '0', ''),
 ('250', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-24 13:36:45', '0', ''),
 ('251', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-24 14:44:57', '0', ''),
 ('252', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-24 14:44:57', '0', ''),
 ('253', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-24 14:48:16', '0', ''),
 ('254', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-24 14:48:22', '0', ''),
 ('255', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-24 14:48:39', '0', ''),
 ('256', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-24 17:40:38', '0', ''),
 ('257', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-24 17:43:36', '0', ''),
 ('258', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-24 17:44:30', '0', ''),
 ('259', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-24 17:45:14', '0', ''),
 ('260', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-24 17:49:28', '0', ''),
 ('261', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-24 17:49:39', '0', ''),
 ('262', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-24 17:49:55', '0', ''),
 ('263', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-24 18:04:38', '0', ''),
 ('264', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-24 18:43:53', '0', ''),
 ('265', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-24 18:44:21', '0', ''),
 ('266', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-24 18:47:15', '0', ''),
 ('267', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-24 18:48:04', '0', ''),
 ('268', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-24 18:48:49', '0', ''),
 ('269', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-24 18:51:35', '0', ''),
 ('270', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-24 18:51:43', '0', ''),
 ('271', 'Receipt-35-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-27 10:30:27', '0', ''),
 ('272', 'Receipt-35-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-27 10:50:06', '0', ''),
 ('273', 'Receipt-37-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-27 10:53:06', '0', ''),
 ('274', 'Receipt-35-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-27 10:56:06', '0', ''),
 ('275', 'Receipt-35-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-27 10:56:37', '0', ''),
 ('276', 'Receipt-35-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-27 10:56:51', '0', ''),
 ('277', 'Receipt-35-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-27 10:57:15', '0', ''),
 ('278', 'Receipt-35-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-27 10:59:50', '0', ''),
 ('279', 'Receipt-35-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-27 11:00:15', '0', ''),
 ('280', 'Receipt-35-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-27 11:03:05', '0', ''),
 ('281', 'Receipt-35-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-27 11:03:37', '0', ''),
 ('282', 'Receipt-35-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-27 11:03:43', '0', ''),
 ('283', 'Receipt-35-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-27 11:04:03', '0', ''),
 ('284', 'Receipt-35-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-27 11:06:20', '0', ''),
 ('285', 'Receipt-35-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-27 11:06:56', '0', ''),
 ('286', 'Receipt-37-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-27 11:11:15', '0', ''),
 ('287', 'Receipt-37-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-27 11:42:56', '0', ''),
 ('288', 'Receipt-37-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-27 11:44:08', '0', ''),
 ('289', 'Receipt-37-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-27 11:44:20', '0', ''),
 ('290', 'Receipt-35-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-27 11:53:37', '0', ''),
 ('291', 'Receipt-35-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-27 11:53:51', '0', ''),
 ('292', 'Receipt-35-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-27 11:55:31', '0', ''),
 ('293', 'Receipt-35-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-27 11:58:10', '0', ''),
 ('294', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-28 13:54:14', '0', ''),
 ('295', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-28 13:56:47', '0', ''),
 ('296', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-28 18:56:31', '0', ''),
 ('297', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-28 19:05:39', '0', ''),
 ('298', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-28 19:08:50', '0', ''),
 ('299', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-28 19:09:20', '0', ''),
 ('300', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-28 19:10:48', '0', ''),
 ('301', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-28 19:11:20', '0', ''),
 ('302', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-28 19:12:52', '0', ''),
 ('303', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-28 19:14:23', '0', ''),
 ('304', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-28 19:14:42', '0', ''),
 ('305', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-28 19:15:11', '0', ''),
 ('306', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-28 19:15:48', '0', ''),
 ('307', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-28 19:17:00', '0', ''),
 ('308', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-28 19:17:23', '0', ''),
 ('309', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-28 19:18:01', '0', ''),
 ('310', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-28 19:18:55', '0', ''),
 ('311', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-28 19:19:03', '0', ''),
 ('312', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-28 19:19:33', '0', ''),
 ('313', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-28 19:19:52', '0', ''),
 ('314', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-28 19:20:28', '0', ''),
 ('315', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-28 19:20:57', '0', ''),
 ('316', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-28 19:21:28', '0', ''),
 ('317', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-28 19:21:55', '0', ''),
 ('318', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-28 19:22:07', '0', ''),
 ('319', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-28 19:22:43', '0', ''),
 ('320', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-28 19:23:04', '0', ''),
 ('321', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-28 19:23:17', '0', ''),
 ('322', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-28 19:24:12', '0', ''),
 ('323', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-28 19:26:18', '0', ''),
 ('324', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-28 19:27:03', '0', ''),
 ('325', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-28 19:28:05', '0', ''),
 ('326', 'Receipt-38-signed.pdf', '/files/test/docs/', '0', '0', 'DocsController', '2014-07-28 19:46:45', '0', ''),
 ('327', 'Receipt-38-signed.pdf', 'docs/', '0', '0', 'DocsController', '2014-07-28 19:59:25', '0', ''),
 ('328', 'Receipt-38-signed.pdf', 'docs/', '0', '0', 'DocsController', '2014-07-28 20:02:49', '0', ''),
 ('329', 'Receipt-38-signed.pdf', 'docs/', '0', '0', 'DocsController', '2014-07-28 20:02:58', '0', ''),
 ('330', 'Receipt-38-signed.pdf', 'docs/', '0', '0', 'DocsController', '2014-07-28 20:03:45', '0', ''),
 ('331', 'Receipt-38-signed.pdf', 'docs/', '0', '0', 'DocsController', '2014-07-28 20:08:41', '0', '');



--
-- Structure for table `qwe_intCorrelation`
--

DROP TABLE IF EXISTS `qwe_intCorrelation`;

CREATE TABLE `qwe_intCorrelation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `owner` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Data for table `qwe_intCorrelation`
--

INSERT INTO `qwe_intCorrelation` (`id`, `account_id`, `date`, `owner`) VALUES
 ('6', '101088', '2014-07-20 16:59:56', '1');



--
-- Structure for table `qwe_inventoryItem`
--

DROP TABLE IF EXISTS `qwe_inventoryItem`;

CREATE TABLE `qwe_inventoryItem` (
  `account_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `ammount` int(11) NOT NULL,
`idcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `qwe_itemCategories`
--

DROP TABLE IF EXISTS `qwe_itemCategories`;

CREATE TABLE `qwe_itemCategories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `profit` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Data for table `qwe_itemCategories`
--

INSERT INTO `qwe_itemCategories` (`id`, `name`, `profit`) VALUES
 ('1', '????', '1'),
 ('2', 'bhxhui', '1'),
 ('3', 'bhxhui1', '1'),
 ('4', 'bhxhui1', '1');



--
-- Structure for table `qwe_itemEav`
--

DROP TABLE IF EXISTS `qwe_itemEav`;

CREATE TABLE `qwe_itemEav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entity` int(11) NOT NULL,
  `attribute` int(11) NOT NULL,
  `value` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `qwe_itemTemplate`
--

DROP TABLE IF EXISTS `qwe_itemTemplate`;

CREATE TABLE `qwe_itemTemplate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `Itemcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
KEY `Itemcatagory_id` (`Itemcategory_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Data for table `qwe_itemTemplate`
--

INSERT INTO `qwe_itemTemplate` (`id`, `name`, `Itemcategory_id`) VALUES
 ('25', '???', '1'),
 ('26', 'lhuu', '2');



--
-- Structure for table `qwe_itemTemplateItem`
--

DROP TABLE IF EXISTS `qwe_itemTemplateItem`;

CREATE TABLE `qwe_itemTemplateItem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ItemTemplate_id` int(11) NOT NULL,
  `eavFields_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ItemTemplate_id` (`ItemTemplate_id`),
KEY `eavFields_id` (`eavFields_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Data for table `qwe_itemTemplateItem`
--

INSERT INTO `qwe_itemTemplateItem` (`id`, `ItemTemplate_id`, `eavFields_id`) VALUES
 ('1', '26', '1'),
 ('3', '25', '1'),
 ('4', '25', '2');



--
-- Structure for table `qwe_itemUnits`
--

DROP TABLE IF EXISTS `qwe_itemUnits`;

CREATE TABLE `qwe_itemUnits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `precision` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Data for table `qwe_itemUnits`
--

INSERT INTO `qwe_itemUnits` (`id`, `name`, `precision`) VALUES
 ('0', '?????', '0'),
 ('1', '??? ?????', '0'),
 ('2', '???', '0'),
 ('3', '????', '0'),
 ('4', '???', '0'),
 ('5', '?\"?', '0');



--
-- Structure for table `qwe_itemVatCat`
--

DROP TABLE IF EXISTS `qwe_itemVatCat`;

CREATE TABLE `qwe_itemVatCat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Data for table `qwe_itemVatCat`
--

INSERT INTO `qwe_itemVatCat` (`id`, `name`) VALUES
 ('1', '???? ???'),
 ('2', '???? ????'),
 ('10', '??? ?????');



--
-- Structure for table `qwe_items`
--

DROP TABLE IF EXISTS `qwe_items`;

CREATE TABLE `qwe_items` (
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
) ENGINE=InnoDB AUTO_INCREMENT=3385 DEFAULT CHARSET=utf8;

--
-- Data for table `qwe_items`
--

INSERT INTO `qwe_items` (`id`, `name`, `itemVatCat_id`, `unit_id`, `extcatnum`, `manufacturer`, `saleprice`, `currency_id`, `ammount`, `owner`, `category_id`, `parent_item_id`, `isProduct`, `profit`, `purchaseprice`, `pic`, `description`, `stockType`, `modified`, `created`) VALUES
 ('3366', 'M16', '1', '0', NULL, NULL, '15000.00', 'ILS', NULL, '0', '2', '0', '1', '10', '1500.00', '', 'jyukguk', '0', '2014-07-02 10:25:35', '2014-01-28 18:12:52'),
 ('3367', '??????', '1', '0', NULL, NULL, '15.00', 'ILS', NULL, NULL, '1', '0', '1', '150', '1.00', '', '', '0', '2014-01-28 18:16:08', '2014-01-28 18:16:08'),
 ('3368', '??????', '1', '0', NULL, NULL, '15.00', 'ILS', NULL, NULL, '1', '0', '1', '150', '1.00', '', '', '0', '2014-01-28 18:16:11', '2014-01-28 18:16:11'),
 ('3369', '??? ?????', '1', '0', NULL, NULL, '2000.00', 'ILS', NULL, NULL, '1', '3367', '1', '500', '1500.00', '', '', '1', '2014-02-27 11:22:47', '2014-02-19 14:45:04'),
 ('3372', '?????', '1', '0', NULL, NULL, '0.00', 'ILS', NULL, NULL, '1', '0', '0', '0', '0.00', '', '', '0', '2014-02-27 11:23:20', '2014-02-27 11:23:20'),
 ('3373', '?????', '1', '0', NULL, NULL, '0.00', 'ILS', NULL, NULL, '1', '0', '0', '0', '0.00', '', '', '0', '2014-02-27 11:23:21', '2014-02-27 11:23:21'),
 ('3374', '????', '1', '0', NULL, NULL, '0.00', 'ILS', NULL, NULL, '1', '0', '0', '0', '0.00', '', '', '0', '2014-02-27 11:34:52', '2014-02-27 11:34:52'),
 ('3375', '????', '1', '0', NULL, NULL, '0.00', 'ILS', NULL, NULL, '1', '0', '0', '0', '0.00', '', '', '0', '2014-02-27 11:34:54', '2014-02-27 11:34:54'),
 ('3376', '12', '1', '0', NULL, NULL, '0.00', 'ILS', NULL, NULL, '1', '0', '0', '0', '0.00', '', '', '0', '2014-02-27 11:35:55', '2014-02-27 11:35:55'),
 ('3377', '12', '1', '0', NULL, NULL, '0.00', 'ILS', NULL, NULL, '1', '0', '0', '0', '0.00', '', '', '0', '2014-02-27 11:35:56', '2014-02-27 11:35:56'),
 ('3378', '13', '1', '0', NULL, NULL, '0.00', 'ILS', NULL, NULL, '1', '0', '0', '0', '0.00', '', '', '0', '2014-02-27 11:38:32', '2014-02-27 11:38:32'),
 ('3379', '????', '1', '0', NULL, NULL, '0.00', 'ILS', NULL, NULL, '1', '0', '0', '0', '0.00', '', '', '0', '2014-06-29 20:24:36', '2014-06-29 20:24:36'),
 ('3380', '????? ?????', '1', '0', NULL, NULL, '670.00', 'ILS', NULL, NULL, '1', '0', '0', '0', '0.00', '', '', '0', '2014-06-30 08:24:01', '2014-06-30 08:24:01'),
 ('3381', '???', '1', '0', NULL, NULL, '135.00', 'ILS', NULL, NULL, '1', '0', '0', '0', '0.00', '', '', '0', '2014-07-05 09:39:41', '2014-07-05 09:39:41'),
 ('3382', '???? ????? ??????', '1', '0', NULL, NULL, '435.00', 'ILS', NULL, NULL, '1', '0', '0', '0', '0.00', '', '', '0', '2014-07-05 09:40:18', '2014-07-05 09:40:18'),
 ('3383', '???? ???? ??', '1', '0', NULL, NULL, '2400.00', 'ILS', NULL, NULL, '1', '0', '0', '0', '0.00', '', '', '0', '2014-07-16 19:02:23', '2014-07-16 19:02:23'),
 ('3384', '???? ????', '1', '0', NULL, NULL, '1100.00', 'ILS', NULL, NULL, '1', '0', '0', '0', '0.00', '', '', '0', '2014-07-16 19:02:53', '2014-07-16 19:02:53');



--
-- Structure for table `qwe_language`
--

DROP TABLE IF EXISTS `qwe_language`;

CREATE TABLE `qwe_language` (
  `id` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `qwe_language`
--

INSERT INTO `qwe_language` (`id`, `name`) VALUES
 ('en_us', 'English'),
 ('he_il', '?????');



--
-- Structure for table `qwe_mail`
--

DROP TABLE IF EXISTS `qwe_mail`;

CREATE TABLE `qwe_mail` (
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
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `qwe_mailTemplate`
--

DROP TABLE IF EXISTS `qwe_mailTemplate`;

CREATE TABLE `qwe_mailTemplate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `subject` varchar(255) NOT NULL,
  `cc` varchar(255) NOT NULL,
  `bcc` varchar(255) NOT NULL,
  `entity_type` varchar(255) NOT NULL,
  `entity_id` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Data for table `qwe_mailTemplate`
--

INSERT INTO `qwe_mailTemplate` (`id`, `name`, `body`, `subject`, `cc`, `bcc`, `entity_type`, `entity_id`) VALUES
 ('1', '??? ?????', '<p>?????</p>\r\n<p>eshnv</p>', '??? ???? ???????', 'ari@speedcomp.co.il', 'adam@speedcomp.co.il; star@ltd.co.il', '0', '0'),
 ('2', '??????? ??', '<p>???? %company%</p>\r\n<p>?????? ?????? ??????? ????? ??</p>', '??????? ?? %docnum%', '', 'adam@speedcomp.co.il', 'Docs', '3');



--
-- Structure for table `qwe_menu`
--

DROP TABLE IF EXISTS `qwe_menu`;

CREATE TABLE `qwe_menu` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `parent` int(12) NOT NULL DEFAULT '0',
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;

--
-- Data for table `qwe_menu`
--

INSERT INTO `qwe_menu` (`id`, `label`, `url`, `icon`, `parent`) VALUES
 ('1', 'Settings', NULL, 'glyphicon glyphicon-cog', '0'),
 ('2', 'Bussines details', 'settings/admin', NULL, '1'),
 ('3', 'Manual Journal Voucher', 'transaction/create', NULL, '1'),
 ('4', 'Business docs', 'doctype/admin', NULL, '1'),
 ('5', 'Costum Fields', 'eavFields/admin', NULL, '1'),
 ('6', 'Currency rates', 'currates/admin', NULL, '1'),
 ('7', 'Openning balances', 'transaction/openbalance', NULL, '1'),
 ('8', 'Contact Item', 'rm/admin', NULL, '1'),
 ('9', 'Tax Catagory For Items', 'ItemVatCat/admin', NULL, '1'),
 ('10', 'Manage Users', 'users/admin', NULL, '1'),
 ('11', 'Manage Groups', 'rights/authItem/roles', NULL, '1'),
 ('12', 'Accounts', '', 'glyphicon glyphicon-folder-open', '0'),
 ('13', 'Accounts', 'accounts/index', NULL, '12'),
 ('14', 'Account Template', 'accTemplate/admin', NULL, '12'),
 ('15', 'Account Types', 'acctype/admin', '', '12'),
 ('16', 'Stock', '', 'glyphicon glyphicon-tag', '0'),
 ('17', 'Items', 'item/admin', NULL, '16'),
 ('18', 'Werehouses', 'accounts/index/8', 'type=>8', '16'),
 ('19', 'Categories', 'itemcategory/admin', NULL, '16'),
 ('20', 'Units', 'itemunit/admin', NULL, '16'),
 ('21', 'Item Template', 'itemTemplate/admin', NULL, '16'),
 ('22', 'Income', '', 'glyphicon glyphicon-thumbs-up', '0'),
 ('23', 'Proforma', 'docs/create/1', 'type=>1', '22'),
 ('24', 'Delivery doc.', 'docs/create/2', 'type=>2', '22'),
 ('25', 'Invoice', 'docs/create/3', 'type=>3', '22'),
 ('26', 'Credit inv.', 'docs/create/4', 'type=>4', '22'),
 ('27', 'Return doc.', 'docs/create/5', 'type=>5', '22'),
 ('28', 'Quote', 'docs/create/6', 'type=>6', '22'),
 ('29', 'Sales Order', 'docs/create/7', 'type=>7', '22'),
 ('30', 'Invoice receipt', 'docs/create/9', 'type=>9', '22'),
 ('31', 'Print docs.', 'docs/admin', NULL, '22'),
 ('32', 'Outcome', '', 'glyphicon glyphicon-shopping-cart', '0'),
 ('33', 'Manage Suppliers', 'accounts/index/1', 'type=>1', '32'),
 ('34', 'Parchace Order', 'docs/create/10', NULL, '16'),
 ('35', 'insert Buisness outcome', 'docs/create/13', NULL, '32'),
 ('36', 'insert Asstes outcome', 'docs/create/14', NULL, '32'),
 ('37', 'Register', NULL, 'glyphicon glyphicon-usd', '0'),
 ('38', 'Receipt', 'docs/create/8', NULL, '37'),
 ('39', 'Bank deposits', 'deposit&amp;type=2', NULL, '37'),
 ('40', 'Payment', 'outcome/create', NULL, '37'),
 ('41', 'VAT payment', 'outcome/create/1', 'type=>1', '37'),
 ('42', 'Nat. Ins. payment', 'outcome/create/2', 'type=>2', '37'),
 ('43', 'Reconciliations', NULL, 'glyphicon glyphicon-eye-open', '0'),
 ('44', 'Bank docs entry', 'bankbook/admin', NULL, '43'),
 ('45', 'Bank recon.', 'bankbook/extmatch', NULL, '43'),
 ('46', 'Show bank recon.', 'edispmatch', NULL, '43'),
 ('47', 'Accts. recon.', 'intmatch', NULL, '43'),
 ('48', 'Show recon.', 'dispmatch', NULL, '43'),
 ('49', 'Reports', NULL, 'glyphicon glyphicon-stats', '0'),
 ('50', 'Display transactions', 'reports/journal', NULL, '49'),
 ('51', 'Customers owes', 'reports/owe', NULL, '49'),
 ('52', 'Profit & loss', 'reports/profloss', NULL, '49'),
 ('53', 'Monthly Prof. & loss', 'reports/mprofloss', NULL, '49'),
 ('54', 'VAT calculation', 'reports/vat', NULL, '49'),
 ('55', 'Balance', 'reports/balance', NULL, '49'),
 ('56', 'Income tax advances', 'reports/taxrep', NULL, '49'),
 ('57', 'Import Export', NULL, 'glyphicon glyphicon-transfer', '0'),
 ('58', 'Open Format File', 'data/openfrmt', NULL, '57'),
 ('59', 'Import Open Format', 'data/openfrmtimport', NULL, '57'),
 ('60', 'General backup', 'data/backup', NULL, '57'),
 ('61', 'Backup restore', 'data/restore', NULL, '57'),
 ('62', 'PCN874', 'data/pcn874', NULL, '57'),
 ('63', 'Support', NULL, 'glyphicon glyphicon-info-sign', '0'),
 ('64', 'Update', 'module/update/', NULL, '63'),
 ('65', 'Paid Support', 'site/support', NULL, '63'),
 ('66', 'About', 'site/about', NULL, '63'),
 ('67', 'Bug Report', 'site/bug', NULL, '63'),
 ('68', 'Warehouse transaction', 'docs/create/15', NULL, '16'),
 ('69', 'Manage Permissons', 'rights/authItem/permissions', NULL, '1'),
 ('70', 'Stock transaction', 'reports/stockAction', NULL, '49'),
 ('71', 'Id6111 Admin', 'accId6111/admin', NULL, '1'),
 ('72', 'Mail Template', 'mailTemplate/admin', NULL, '1');



--
-- Structure for table `qwe_openformat`
--

DROP TABLE IF EXISTS `qwe_openformat`;

CREATE TABLE `qwe_openformat` (
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
-- Data for table `qwe_openformat`
--

INSERT INTO `qwe_openformat` (`id`, `description`, `type`, `size`, `record`, `export`, `import`, `type_id`) VALUES
 ('1000', '??? ?????', 's', '4', '1', 'A000', 'A000', 'A000'),
 ('1001', '?????? ??????', 's', '5', '1', 'NA', 'NA', 'A000'),
 ('1002', '?? ?????? ?????', 'n', '15', '1', 'file.linecount', 'file.linecount', 'A000'),
 ('1003', '???? ?????', 'n', '9', '1', 'company.vatnum', 'company.vatnum', 'A000'),
 ('1004', '???? ????', 'n', '15', '1', 'this.id', 'NA', 'A000'),
 ('1005', '???? ?????', 's', '8', '1', '&OF1.31&', '&OF1.31&', 'A000'),
 ('1006', '????? ?????', 'n', '8', '1', 'system.auth', 'system.auth', 'A000'),
 ('1007', '?? ?????', 's', '20', '1', 'system.name', 'system.name', 'A000'),
 ('1008', '??????', 's', '20', '1', 'system.version', 'system.version', 'A000'),
 ('1009', '?? ?? ????', 'n', '9', '1', 'system.vendor.vatnum', 'system.vendor.vatnum', 'A000'),
 ('1010', '???? ?????', 's', '20', '1', 'system.vendor.name', 'system.vendor.name', 'A000'),
 ('1011', '??? ?????', 'n', '1', '1', '2', '2', 'A000'),
 ('1012', '???? ????? ????', 's', '50', '1', 'NA', 'NA', 'A000'),
 ('1013', '??? ?????', 'n', '1', '1', '2', '2', 'A000'),
 ('1014', '????? ??????? ????', 'n', '1', '1', '1', '1', 'A000'),
 ('1015', '???? ???? ???? ??????', 'n', '9', '1', 'company.vatnum', 'settings.vatnum', 'A000'),
 ('1016', '??? ???????', 'n', '9', '1', 'NA', 'NA', 'A000'),
 ('1017', '?????? ???????', 's', '10', '1', 'NA', 'NA', 'A000'),
 ('1018', '?? ????', 's', '50', '1', 'this.name', 'settings.name', 'A000'),
 ('1019', '??? ???? ????', 's', '50', '1', 'this.address', 'settings.address', 'A000'),
 ('1020', '??? ???? ?? ???', 's', '10', '1', 'this.address', 'settings.address', 'A000'),
 ('1021', '??? ???? ???', 's', '30', '1', 'this.city', 'settings.city', 'A000'),
 ('1022', '??? ???? ?????', 's', '8', '1', 'this.zip', 'settings.zip', 'A000'),
 ('1023', '??? ???', 'n', '4', '1', 'NA', 'NA', 'A000'),
 ('1024', '????? ?????', 'date', '8', '1', 'start', 'start', 'A000'),
 ('1025', '????? ????? ???', 'date', '8', '1', 'end', 'end', 'A000'),
 ('1026', '????? ????', 'date', '8', '1', 'now', 'now', 'A000'),
 ('1027', '??? ????', 'hour', '4', '1', 'now', 'now', 'A000'),
 ('1028', '??? ???', 'n', '1', '1', '0', '0', 'A000'),
 ('1029', '?? ?????', 'n', '1', '1', '1', '1', 'A000'),
 ('1030', '?? ????? ??????', 's', '20', '1', 'zip', 'zip', 'A000'),
 ('1031', '', '', '0', '0', '', '', 'A002'),
 ('1032', '???? ?????', 's', '3', '1', 'NA', 'NA', 'A000'),
 ('1033', '', '', '0', '0', '', '', 'A002'),
 ('1034', '??????/?????', 'n', '1', '1', '0', '0', 'A000'),
 ('1035', '?????? ???????', 's', '46', '1', 'NA', 'NA', 'A000'),
 ('1050', '??? ?????', 's', '4', '10', 'NA', 'NA', 'A001'),
 ('1051', '?? ??????', 'n', '15', '10', 'NA', 'NA', 'A001'),
 ('1100', '??? ?????', 's', '4', '9', 'A100', 'A100', 'A100'),
 ('1101', '?? ?????', 'n', '9', '9', 'file.line', 'file.line', 'A100'),
 ('1102', '???? ?????', 'n', '9', '9', 'company.vatnum', 'company.vatnum', 'A100'),
 ('1103', '???? ????', 'n', '15', '9', 'this.id', 'this.id', 'A100'),
 ('1104', '???? ?????', 's', '8', '9', '&OF1.31&', '&OF1.31&', 'A100'),
 ('1105', '?????? ??????', 's', '50', '9', 'NA', 'NA', 'A100'),
 ('1150', '??? ?????', 's', '4', '8', 'Z900', 'Z900', 'Z900'),
 ('1151', '?? ?????', 'n', '9', '8', 'file.line', 'file.line', 'Z900'),
 ('1152', '???? ?????', 'n', '9', '8', 'company.vatnum', 'company.vatnum', 'Z900'),
 ('1153', '???? ????', 'n', '9', '8', 'this.id', 'this.id', 'Z900'),
 ('1154', '???? ?????', 's', '8', '8', '&OF1.31&', '&OF1.31&', 'Z900'),
 ('1155', '?? ?????? ?????', 'n', '15', '8', 'file.linecount', 'file.linecount', 'Z900'),
 ('1156', '?????? ??????', 's', '50', '8', 'NA', 'NA', 'Z900'),
 ('1200', '??? ?????', 's', '4', '4', 'C100', 'C100', 'C100'),
 ('1201', '????? ?????', 'n', '9', '4', 'file.line', 'file.line', 'C100'),
 ('1202', '???? ?????', 'n', '9', '4', 'company.vatnum', 'company.vatnum', 'C100'),
 ('1203', '??? ????', 'n', '3', '4', 'func.getType', 'func.getType', 'C100'),
 ('1204', '???? ????', 's', '20', '4', 'this.docnum', 'this.docnum', 'C100'),
 ('1205', '????? ????', 'date', '8', '4', 'this.issue_date', 'this.issue_date', 'C100'),
 ('1206', '??? ????', 'hour', '4', '4', 'this.issue_date', 'this.issue_date', 'C100'),
 ('1207', '?? ????/???', 's', '50', '4', 'this.company', 'this.company', 'C100'),
 ('1208', '??? ????', 's', '50', '4', 'this.address', 'this.address', 'C100'),
 ('1209', '??? ?? ???', 's', '10', '4', 'this.address', 'this.address', 'C100'),
 ('1210', '??? ???', 's', '30', '4', 'this.city', 'this.city', 'C100'),
 ('1211', '??? ?????', 's', '8', '4', 'this.zip', 'this.zip', 'C100'),
 ('1212', '??? ?????', 's', '30', '4', 'NA', 'NA', 'C100'),
 ('1213', '??? ??? ?????', 's', '2', '4', 'NA', 'NA', 'C100'),
 ('1214', '?????', 's', '15', '4', 'NA', 'NA', 'C100'),
 ('1215', '???? ????? ????', 'n', '9', '4', 'this.vatnum', 'this.vatnum', 'C100'),
 ('1216', '????? ???', 'date', '8', '4', 'this.due_date', 'this.due_date', 'C100'),
 ('1217', '???? ???? ?? ????? ???\"?', 'v99', '15', '4', 'NA', 'NA', 'C100'),
 ('1218', '??? ???', 's', '3', '4', 'NA', 'NA', 'C100'),
 ('1219', '???? ???? ????', 'v99', '15', '4', 'this.sub_total', 'this.sub_total', 'C100'),
 ('1220', '????', 'v99', '15', '4', 'NA', 'this.discount', 'C100'),
 ('1221', '???? ??? ???', 'v99', '15', '4', 'this.novat_total', 'this.novat_total', 'C100'),
 ('1222', '???? ???', 'v99', '15', '4', 'this.vat', 'this.vat', 'C100'),
 ('1223', '???? ????', 'v99', '15', '4', 'this.total', 'this.total', 'C100'),
 ('1224', '???? ????? ?????', 'v99', '12', '4', 'this.src_tax', 'this.src_tax', 'C100'),
 ('1225', '???? ???? ??????', 's', '15', '4', 'this.account_id', 'this.account_id', 'C100'),
 ('1226', '??? ?????', 's', '10', '4', 'NA', 'NA', 'C100'),
 ('1227', '', '', '0', '0', '', '', 'C101'),
 ('1228', '???? ?????', 's', '1', '4', 'this.status', 'this.status', 'C100'),
 ('1229', '', '', '0', '0', '', '', 'C101'),
 ('1230', '????? ?????', 'date', '8', '4', 'this.issue_date', 'this.issue_date', 'C100'),
 ('1231', '???? ????/???', 's', '7', '4', 'NA', 'NA', 'C100'),
 ('1232', '', '', '0', '0', '', '', 'C101'),
 ('1233', '???? ??????', 's', '9', '4', 'this.owner', 'this.owner', 'C100'),
 ('1234', '??? ???? ?????', 'n', '7', '4', 'this.id', 'this.id', 'C100'),
 ('1235', '??? ??????? ???????', 's', '13', '4', 'NA', 'NA', 'C100'),
 ('1250', '??? ?????', 's', '4', '5', 'D110', 'D110', 'D110'),
 ('1251', '???? ?????', 'n', '9', '5', 'file.line', 'file.line', 'D110'),
 ('1252', '???? ?????', 'n', '9', '5', 'company.vatnum', 'company.vatnum', 'D110'),
 ('1253', '??? ????', 'n', '3', '5', 'func.getType', 'func.getType', 'D110'),
 ('1254', '???? ?????', 's', '20', '5', 'func.getNum', 'func.getNum', 'D110'),
 ('1255', '???? ???? ?????', 'n', '4', '5', 'this.line', 'this.line', 'D110'),
 ('1256', '??? ???? ????', 'n', '3', '5', 'NA', 'NA', 'D110'),
 ('1257', '???? ???? ????', 's', '20', '5', 'NA', 'NA', 'D110'),
 ('1258', '??? ????', 'n', '1', '5', 'NA', 'NA', 'D110'),
 ('1259', '??? ?????', 's', '20', '5', 'this.item_id', 'this.item_id', 'D110'),
 ('1260', '????? ?????? ?? ?????', 's', '30', '5', 'this.name', 'this.name', 'D110'),
 ('1261', '?? ????', 's', '50', '5', 'NA', 'NA', 'D110'),
 ('1262', '???? ?????? ?? ?????', 's', '30', '5', 'NA', 'NA', 'D110'),
 ('1263', '????? ????? ????', 's', '20', '5', 'this.unit_id', 'this.unit_id', 'D110'),
 ('1264', '?????', 'v9999', '17', '5', 'this.qty', 'this.qty', 'D110'),
 ('1265', '???? ?????? ??? ???', 'v99', '15', '5', 'this.unit_price', 'this.unit_price', 'D110'),
 ('1266', '???? ????', 'v99', '15', '5', 'NA', 'NA', 'D110'),
 ('1267', '?? ???? ?????', 'v99', '15', '5', 'this.price', 'this.price', 'D110'),
 ('1268', '????? ???? ?????', 'n', '4', '5', 'this.vat', 'this.vat', 'D110'),
 ('1269', '', '', '0', '0', '', '', 'D111'),
 ('1270', '???? ????/???', 's', '7', '5', 'NA', 'NA', 'D110'),
 ('1271', '', '', '0', '0', '', '', 'D111'),
 ('1272', '????? ?????', 'date', '8', '5', 'func.getDate', 'func.getDate', 'D110'),
 ('1273', '??? ????? ??????', 'n', '7', '5', 'this.doc_id', 'this.doc_id', 'D110'),
 ('1274', '???? ????/??? ????? ????', 's', '7', '5', 'NA', 'NA', 'D110'),
 ('1275', '?????? ???????', 's', '21', '5', 'NA', 'NA', 'D110'),
 ('1300', '??? ?????', 's', '4', '6', 'D120', 'D120', 'D120'),
 ('1301', '???? ?????', 'n', '9', '6', 'file.line', 'file.line', 'D120'),
 ('1302', '???? ?????', 'n', '9', '6', 'company.vatnum', 'company.vatnum', 'D120'),
 ('1303', '??? ????', 'n', '3', '6', 'func.getType', 'func.getType', 'D120'),
 ('1304', '???? ????', 's', '20', '6', 'func.getNum', 'func.getNum', 'D120'),
 ('1305', '???? ???? ?????', 'n', '4', '6', 'this.line', 'this.line', 'D120'),
 ('1306', '??? ????? ?????', 'n', '1', '6', 'this.type', 'this.type', 'D120'),
 ('1307', '???? ???', 'n', '10', '6', 'this.bank', 'this.bank', 'D120'),
 ('1308', '???? ????', 'n', '10', '6', 'this.branch', 'this.branch', 'D120'),
 ('1309', '???? ?????', 'n', '15', '6', 'this.cheque_acct', 'this.cheque_acct', 'D120'),
 ('1310', '???? ?????', 'n', '10', '6', 'this.cheque_num', 'this.cheque_num', 'D120'),
 ('1311', '????? ?????', 'date', '8', '6', 'this.cheque_date', 'this.cheque_date', 'D120'),
 ('1312', '???? ?????', 'v99', '15', '6', 'this.sum', 'this.sum', 'D120'),
 ('1313', '??? ????? ??????', 'n', '1', '6', 'NA', 'NA', 'D120'),
 ('1314', '?? ?????? ?????', 's', '20', '6', 'NA', 'NA', 'D120'),
 ('1315', '??? ???? ?????', 'n', '1', '6', 'NA', 'NA', 'D120'),
 ('1316', '', '', '0', '0', '', '', 'D121'),
 ('1317', '', '', '0', '0', '', '', 'D121'),
 ('1318', '', '', '0', '0', '', '', 'D121'),
 ('1319', '', '', '0', '0', '', '', 'D121'),
 ('1320', '???? ????/???', 's', '7', '6', 'NA', 'NA', 'D120'),
 ('1321', '', '', '0', '0', '', '', 'D121'),
 ('1322', '????? ????', 'date', '8', '6', 'func.getDate', 'this.cheque_date', 'D120'),
 ('1323', '??? ???? ??????', 'n', '7', '6', 'this.doc_id', 'this.doc_id', 'D120'),
 ('1324', '?????? ???????', 's', '60', '6', 'NA', 'NA', 'D120'),
 ('1350', '??? ?????', 's', '4', '2', 'B100', 'B100', 'B100'),
 ('1351', '???? ?????', 'n', '9', '2', 'file.line', 'file.line', 'B100'),
 ('1352', '???? ?????', 'n', '9', '2', 'company.vatnum', 'company.vatnum', 'B100'),
 ('1353', '???? ?????', 'n', '10', '2', 'this.num', 'this.num', 'B100'),
 ('1354', '???? ???? ??????', 'n', '5', '2', 'this.linenum', 'this.linenum', 'B100'),
 ('1355', '???', 'n', '8', '2', 'NA', 'NA', 'B100'),
 ('1356', '??? ?????', 's', '15', '2', 'this.type', 'this.type', 'B100'),
 ('1357', '??????', 's', '20', '2', 'this.refnum1', 'this.refnum1', 'B100'),
 ('1358', '??? ???? ??????', 'n', '3', '2', 'NA', 'NA', 'B100'),
 ('1359', '?????? 2', 's', '20', '2', 'this.refnum2', 'this.refnum2', 'B100'),
 ('1360', '??? ???? ?????? 2', 'n', '3', '2', 'NA', 'NA', 'B100'),
 ('1361', '?????', 's', '50', '2', 'this.details', 'this.details', 'B100'),
 ('1362', '?????', 'date', '8', '2', 'this.date', 'this.date', 'B100'),
 ('1363', '????? ???', 'date', '8', '2', 'this.valuedate', 'this.valuedate', 'B100'),
 ('1364', '????? ??????', 's', '15', '2', 'this.account_id', 'this.account_id', 'B100'),
 ('1365', '????? ????', 's', '15', '2', 'NA', 'NA', 'B100'),
 ('1366', '???? ??????', 'n', '1', '2', 'func.opefrmtMrk', 'func.opefrmtMrk', 'B100'),
 ('1367', '??? ???? ???', 's', '3', '2', 'this.currency_id', 'this.currency_id', 'B100'),
 ('1368', '???? ??????', 'v99', '15', '2', 'this.leadsum', 'this.leadsum', 'B100'),
 ('1369', '???? ???', 'v99', '15', '2', 'this.sum', 'this.sum', 'B100'),
 ('1370', '??? ????', 'v99', '12', '2', 'NA', 'NA', 'B100'),
 ('1371', '??? ????? 1', 's', '10', '2', 'NA', 'NA', 'B100'),
 ('1372', '??? ????? 2', 's', '10', '2', 'NA', 'NA', 'B100'),
 ('1373', '', '', '0', '0', '', '', 'B101'),
 ('1374', '???? ????/???', 's', '7', '2', 'NA', 'NA', 'B100'),
 ('1375', '????? ????', 'date', '8', '2', 'NA', 'NA', 'B100'),
 ('1376', '???? ?????', 's', '9', '2', 'this.owner_id', 'this.owner_id', 'B100'),
 ('1377', '?????? ???????', 's', '25', '2', 'NA', 'NA', 'B100'),
 ('1400', '??? ?????', 's', '4', '3', 'B110', 'B110', 'B110'),
 ('1401', '???? ?????', 'n', '9', '3', 'file.line', 'file.line', 'B110'),
 ('1402', '???? ?????', 'n', '9', '3', 'company.vatnum', 'company.vatnum', 'B110'),
 ('1403', '???? ??????', 's', '15', '3', 'this.id', 'this.id', 'B110'),
 ('1404', '?? ?????', 's', '50', '3', 'this.name', 'this.name', 'B110'),
 ('1405', '??? ???? ????', 's', '15', '3', 'this.type', 'this.type', 'B110'),
 ('1406', '????? ??? ???? ????', 's', '30', '3', 'func.getType', 'typedesc', 'B110'),
 ('1407', '??? ????', 's', '30', '3', 'this.address', 'this.address', 'B110'),
 ('1408', '??? ???? ???', 's', '50', '3', 'this.address', 'this.address', 'B110'),
 ('1409', '??? ???', 's', '10', '3', 'this.city', 'this.city', 'B110'),
 ('1410', '??? ?????', 's', '8', '3', 'this.zip', 'this.zip', 'B110'),
 ('1411', '??? ?????', 's', '30', '3', 'NA', 'NA', 'B110'),
 ('1412', '??? ?????', 's', '2', '3', 'NA', 'NA', 'B110'),
 ('1413', '????? ????', 's', '15', '3', 'NA', 'NA', 'B110'),
 ('1414', '???? ????? ?????? ????', 'v99', '15', '3', 'limit.getBalance', 'limit.getBalance', 'B110'),
 ('1415', '??? ????', 'v99', '15', '3', 'limit.getPos', 'limit.getPos', 'B110'),
 ('1416', '??? ????', 'v99', '15', '3', 'limit.getNeg', 'limit.getNeg', 'B110'),
 ('1417', '??? ?????? ???????', 'n', '4', '3', 'this.id6111', 'this.id6111', 'B110'),
 ('1418', '', '', '0', '0', '', '', 'B111'),
 ('1419', '???? ???? ????', 'n', '9', '3', 'this.vatnum', 'this.vatnum', 'B110'),
 ('1420', '', '', '0', '0', '', '', 'B111'),
 ('1421', '???? ????/???', 's', '7', '3', 'NA', 'NA', 'B110'),
 ('1422', '???? ????? ?????? ??? ????', 'v99', '15', '3', 'NA', 'NA', 'B110'),
 ('1423', '??? ???? ???? ????? ????', 's', '3', '3', 'NA', 'this.currency_id', 'B110'),
 ('1424', '??? ??????? ??????', 's', '16', '3', 'NA', 'NA', 'B110'),
 ('1450', '??? ?????', 's', '4', '7', 'M100', 'M100', 'M100'),
 ('1451', '????? ?????', 'n', '9', '7', 'file.line', 'file.line', 'M100'),
 ('1452', '???? ?????', 'n', '9', '7', 'company.vatnum', 'company.vatnum', 'M100'),
 ('1453', '??? ????', 's', '20', '7', 'this.id', 'this.id', 'M100'),
 ('1454', '??? ??? ????', 's', '20', '7', 'this.extcatnum', 'this.extcatnum', 'M100'),
 ('1455', '??? ?????', 's', '20', '7', 'this.id', 'this.id', 'M100'),
 ('1456', '?? ????', 's', '50', '7', 'this.name', 'this.name', 'M100'),
 ('1457', '??? ????', 's', '10', '7', 'NA', 'NA', 'M100'),
 ('1458', '????? ??? ????', 's', '30', '7', 'NA', 'NA', 'M100'),
 ('1459', '????? ????? ????', 's', '20', '7', 'this.unit_id', 'this.unit_id', 'M100'),
 ('1460', '???? ????? ?????? ???', 'v99', '12', '7', 'ammount', 'ammount', 'M100'),
 ('1461', '?? ??? ??????', 'v99', '12', '7', 'NA', 'NA', 'M100'),
 ('1462', '?? ??? ??????', 'v99', '12', '7', 'NA', 'NA', 'M100'),
 ('1463', '', '99', '10', '7', 'NA', 'NA', 'M100'),
 ('1464', '', '99', '10', '7', 'this.saleprice', 'this.saleprice', 'M100'),
 ('1465', '?????? ??????', 's', '50', '7', 'NA', 'NA', 'M100');



--
-- Structure for table `qwe_openformattype`
--

DROP TABLE IF EXISTS `qwe_openformattype`;

CREATE TABLE `qwe_openformattype` (
  `id` varchar(4) NOT NULL,
  `description` varchar(26) DEFAULT NULL,
  `type` varchar(8) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`,
`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Data for table `qwe_openformattype`
--

INSERT INTO `qwe_openformattype` (`id`, `description`, `type`) VALUES
 ('A000', '????? ?????', 'INI'),
 ('B100', '????? ????', 'BKMVDATA'),
 ('B110', '????? ?????', 'BKMVDATA'),
 ('C100', '????? ????', 'BKMVDATA'),
 ('D110', '???? ????', 'BKMVDATA'),
 ('D120', '???? ????', 'BKMVDATA'),
 ('M100', '???? ????', 'BKMVDATA'),
 ('Z900', '????? ????? DATA', 'BKMVDATA'),
 ('A100', '????? ????? DATA', 'BKMVDATA'),
 ('B100', '????? ????', 'INI'),
 ('B110', '????? ?????', 'INI'),
 ('C100', '????? ????', 'INI'),
 ('D110', '???? ????', 'INI'),
 ('D120', '???? ????', 'INI'),
 ('M100', '???? ????', 'INI');



--
-- Structure for table `qwe_paymentType`
--

DROP TABLE IF EXISTS `qwe_paymentType`;

CREATE TABLE `qwe_paymentType` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `value` varchar(80) NOT NULL,
  `oppt_account_id` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Data for table `qwe_paymentType`
--

INSERT INTO `qwe_paymentType` (`id`, `name`, `value`, `oppt_account_id`) VALUES
 ('1', 'Cash', '', '10'),
 ('2', 'Cheque', '', '7'),
 ('3', 'Credit card', 'DebitRegularType', '11'),
 ('4', 'Bank transfer', '', '0'),
 ('5', 'Manual Credit', '', '11'),
 ('6', 'Credit card - payments', 'DebitPaymntsType', '11');



--
-- Structure for table `qwe_stockAction`
--

DROP TABLE IF EXISTS `qwe_stockAction`;

CREATE TABLE `qwe_stockAction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `oppt_account_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `serial` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `doc_id` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;

--
-- Data for table `qwe_stockAction`
--

INSERT INTO `qwe_stockAction` (`id`, `account_id`, `oppt_account_id`, `item_id`, `qty`, `serial`, `user_id`, `createDate`, `doc_id`) VALUES
 ('1', '101080', '114', '3366', '10', '', '1', '2014-06-30 11:25:57', '177'),
 ('2', '101080', '113', '3368', '-1', '', '1', '2014-06-30 11:16:41', '178'),
 ('3', '101074', '113', '3368', '-1', '', '1', '2014-03-18 14:42:26', '179'),
 ('4', '101082', '113', '3369', '-1', '', '1', '2014-06-29 23:18:19', '183'),
 ('5', '101080', '113', '3369', '-3', '', '1', '2014-06-30 11:16:50', '185'),
 ('6', '101080', '113', '3380', '3', '', '1', '2014-06-30 11:16:46', '186'),
 ('7', '101071', '113', '3366', '-1', '', '1', '2014-06-30 17:05:43', '191'),
 ('8', '101082', '113', '3366', '-1', '', '1', '2014-07-01 09:30:26', '200'),
 ('9', '101082', '113', '3367', '-1', '', '1', '2014-07-01 09:38:50', '201'),
 ('11', '101068', '113', '3366', '-2', '', '1', '2014-07-01 18:53:08', '199'),
 ('12', '101082', '113', '3380', '-1', '', '1', '2014-07-01 19:46:45', '203'),
 ('13', '101084', '113', '3366', '-1', '', '1', '2014-07-05 13:32:10', '207'),
 ('14', '101084', '113', '3382', '-2', '', '1', '2014-07-05 14:58:32', '211'),
 ('15', '101084', '113', '3381', '-5', '', '1', '2014-07-05 14:58:33', '211'),
 ('16', '101084', '113', '3382', '2', '', '1', '2014-07-05 14:59:02', '212'),
 ('17', '101084', '113', '3381', '5', '', '1', '2014-07-05 14:59:02', '212'),
 ('18', '101084', '113', '3381', '-1', '', '1', '2014-07-06 17:07:50', '219'),
 ('19', '101084', '113', '3382', '-1', '', '1', '2014-07-06 20:12:00', '224'),
 ('20', '101084', '113', '3382', '1', '', '1', '2014-07-07 13:16:01', '239'),
 ('21', '101082', '113', '3380', '-1', '', '1', '2014-07-07 13:18:20', '240'),
 ('22', '101082', '113', '3382', '-1', '', '1', '2014-07-07 13:18:20', '240'),
 ('23', '101082', '113', '3366', '-1', '', '1', '2014-07-07 13:27:29', '241'),
 ('24', '101080', '101084', '3379', '-1', '', '1', '2014-07-07 13:58:20', '243'),
 ('25', '101080', '101084', '3379', '1', '', '1', '2014-07-07 13:58:24', '244'),
 ('26', '101080', '101084', '3381', '-1', '', '1', '2014-07-07 14:03:30', '245'),
 ('28', '101080', '101084', '3378', '-1', '', '1', '2014-07-07 14:21:46', '247'),
 ('29', '101080', '101083', '3381', '30', '', '1', '2014-07-07 14:46:37', '249'),
 ('30', '101080', '101082', '3377', '-1', '', '1', '2014-07-07 14:47:18', '250'),
 ('33', '101080', '101084', '3379', '-1', '', '1', '2014-07-07 16:03:29', '254'),
 ('34', '101080', '101084', '3380', '-1', '', '1', '2014-07-07 16:06:16', '255'),
 ('35', '101080', '101084', '3380', '1', '', '1', '2014-07-07 16:30:17', '257'),
 ('36', '101083', '101080', '3366', '15', '', '1', '2014-07-07 16:29:35', '258'),
 ('37', '101083', '101080', '3381', '15', '', '1', '2014-07-07 16:36:39', '259'),
 ('38', '114', '33', '3369', '15', '', '1', '2014-07-07 16:42:13', '261'),
 ('39', '101080', '34', '3369', '1', '', '1', '2014-07-07 17:35:55', '262'),
 ('40', '101080', '101081', '3382', '-1', '', '1', '2014-07-07 17:55:42', '263'),
 ('41', '101080', '101086', '3381', '4', '', '1', '2014-07-07 18:02:37', '264'),
 ('42', '101080', '101084', '3366', '-1', '', '1', '2014-07-07 19:45:03', '265'),
 ('43', '101080', '101086', '3366', '1', '', '1', '2014-07-07 20:16:47', '266'),
 ('44', '101080', '114', '3369', '1', '', '1', '2014-07-07 20:17:19', '267'),
 ('61', '117', '101081', '3380', '-1', '', '11', '2014-07-12 18:51:55', '283'),
 ('62', '101080', '101086', '3380', '1', '', '11', '2014-07-13 08:54:27', '287'),
 ('63', '101080', '114', '3381', '1', '', '11', '2014-07-13 08:56:11', '288'),
 ('64', '101080', '101086', '3382', '20', '', '11', '2014-07-13 09:01:31', '289'),
 ('65', '101080', '101086', '3380', '15', '', '11', '2014-07-13 09:01:31', '289'),
 ('66', '101080', '101087', '3382', '-20', '', '11', '2014-07-13 09:41:14', '290'),
 ('67', '101080', '101087', '3382', '-50', '', '11', '2014-07-13 09:44:24', '291'),
 ('68', '101080', '101087', '3381', '-24', '', '11', '2014-07-13 09:48:01', '292'),
 ('69', '101080', '101087', '3382', '-67', '', '11', '2014-07-13 13:44:01', '295'),
 ('70', '101080', '101082', '3382', '-34', '', '11', '2014-07-13 13:44:39', '296'),
 ('71', '101080', '101086', '3382', '36', '', '11', '2014-07-13 13:45:33', '297'),
 ('72', '101083', '101087', '3380', '-1', '', '1', '2014-07-15 18:39:16', '298'),
 ('73', '101083', '101088', '3383', '-1', '', '1', '2014-07-16 19:14:43', '301'),
 ('74', '101083', '101088', '3384', '-1', '', '1', '2014-07-16 19:14:43', '301'),
 ('75', '101083', '101088', '3383', '-1', '', '1', '2014-07-16 19:16:23', '302'),
 ('76', '101083', '101088', '3384', '-1', '', '1', '2014-07-16 19:16:23', '302'),
 ('77', '101083', '101088', '3384', '-1', '', '1', '2014-07-16 19:44:50', '304'),
 ('78', '101080', '101088', '3382', '-1', '', '1', '2014-07-16 21:21:11', '305');



--
-- Structure for table `qwe_transactionType`
--

DROP TABLE IF EXISTS `qwe_transactionType`;

CREATE TABLE `qwe_transactionType` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Data for table `qwe_transactionType`
--

INSERT INTO `qwe_transactionType` (`id`, `name`) VALUES
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
-- Structure for table `qwe_transactions`
--

DROP TABLE IF EXISTS `qwe_transactions`;

CREATE TABLE `qwe_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `refnum1` varchar(255) NOT NULL,
  `refnum2` varchar(255) NOT NULL,
  `intCorrelation` int(11) NOT NULL,
  `intType` tinyint(1) NOT NULL,
  `extCorrelation` int(11) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=393 DEFAULT CHARSET=utf8;

--
-- Data for table `qwe_transactions`
--

INSERT INTO `qwe_transactions` (`id`, `num`, `account_id`, `type`, `refnum1`, `refnum2`, `intCorrelation`, `intType`, `extCorrelation`, `valuedate`, `date`, `details`, `currency_id`, `sum`, `leadsum`, `secsum`, `owner_id`, `linenum`) VALUES
 ('3', '101', '100', '18', '145', '', '0', '0', '0', '0000-00-00 00:00:00', '2014-01-14 17:01:45', '???? ??????', 'ILS', '15000.00', '15000.00', NULL, '1', '1'),
 ('4', '101', '201', '18', '145', '', '0', '0', '0', '0000-00-00 00:00:00', '2014-01-14 17:01:45', '???? ??????', 'USD', '5205.88', '0.00', NULL, '1', '2'),
 ('5', '101', '3', '18', '145', '', '0', '0', '0', '0000-00-00 00:00:00', '2014-01-14 17:01:45', '???? ??????', 'ILS', '2700.00', '2700.00', NULL, '1', '3'),
 ('6', '101', '201', '18', '145', '', '0', '0', '0', '0000-00-00 00:00:00', '2014-01-14 17:01:45', '???? ??????', 'USD', '5205.88', '0.00', NULL, '1', '4'),
 ('7', '101', '150', '18', '145', '', '0', '0', '0', '0000-00-00 00:00:00', '2014-01-14 17:01:45', '???? ??????', 'ILS', '17700.00', '17700.00', NULL, '1', '5'),
 ('8', '103', '100', '18', '161', '', '0', '0', '0', '2014-03-11 10:03:21', '2014-03-11 10:03:21', '??????', 'ILS', '15000.00', '15000.00', '15000.00', '10', '1'),
 ('9', '103', '101068', '18', '161', '', '0', '0', '0', '2014-03-11 10:03:21', '2014-03-11 10:03:21', '??????', 'ILS', '15000.00', '15000.00', '15000.00', '10', '2'),
 ('10', '103', '3', '18', '161', '', '0', '0', '0', '2014-03-11 10:03:21', '2014-03-11 10:03:21', '??????', 'ILS', '0.00', '0.00', '0.00', '10', '3'),
 ('11', '104', '100', '18', '166', '', '0', '0', '0', '2014-03-11 13:03:30', '2014-03-11 13:03:30', '??????? ??\"?', 'ILS', '15.00', '15.00', '15.00', '10', '1'),
 ('12', '104', '101071', '18', '166', '', '0', '0', '0', '2014-03-11 13:03:30', '2014-03-11 13:03:30', '??????? ??\"?', 'ILS', '15.00', '15.00', '15.00', '10', '2'),
 ('13', '104', '3', '18', '166', '', '0', '0', '0', '2014-03-11 13:03:30', '2014-03-11 13:03:30', '??????? ??\"?', 'ILS', '0.00', '0.00', '0.00', '10', '3'),
 ('14', '104', '101071', '18', '166', '', '0', '0', '0', '2014-03-11 13:03:30', '2014-03-11 13:03:30', '??????? ??\"?', 'ILS', '15.00', '15.00', '15.00', '10', '4'),
 ('15', '104', '150', '18', '166', '', '0', '0', '0', '2014-03-11 13:03:30', '2014-03-11 13:03:30', '??????? ??\"?', 'ILS', '-15.00', '-15.00', '-15.00', '10', '5'),
 ('16', '105', '100', '1', '173', '', '0', '0', '0', '2014-03-18 14:03:16', '2014-03-18 14:03:16', '??????? ??\"?', 'ILS', '2000.00', '2000.00', '2000.00', '1', '1'),
 ('17', '105', '100', '1', '173', '', '0', '0', '0', '2014-03-18 14:03:16', '2014-03-18 14:03:16', '??????? ??\"?', 'ILS', '10.00', '10.00', '10.00', '1', '2'),
 ('18', '105', '101071', '1', '173', '', '0', '0', '0', '2014-03-18 14:03:16', '2014-03-18 14:03:16', '??????? ??\"?', 'ILS', '2010.00', '2010.00', '2010.00', '1', '3'),
 ('19', '105', '3', '1', '173', '', '0', '0', '0', '2014-03-18 14:03:16', '2014-03-18 14:03:16', '??????? ??\"?', 'ILS', '0.00', '0.00', '0.00', '1', '4'),
 ('20', '106', '100', '1', '179', '', '0', '0', '0', '2014-03-18 14:03:26', '2014-03-18 14:03:26', '??????? ??\"?', 'ILS', '15.00', '15.00', '15.00', '1', '1'),
 ('21', '106', '101074', '1', '179', '', '0', '0', '0', '2014-03-18 14:03:26', '2014-03-18 14:03:26', '??????? ??\"?', 'ILS', '15.00', '15.00', '15.00', '1', '2'),
 ('22', '106', '3', '1', '179', '', '0', '0', '0', '2014-03-18 14:03:26', '2014-03-18 14:03:26', '??????? ??\"?', 'ILS', '0.00', '0.00', '0.00', '1', '3'),
 ('23', '107', '101071', '3', '180', '', '0', '0', '0', '2014-04-23 12:04:15', '2014-04-23 12:04:15', '??????? ??\"?', 'ILS', '500.00', '500.00', '500.00', '1', '1'),
 ('24', '107', '10', '3', '180', '', '0', '0', '0', '2014-04-23 12:04:15', '2014-04-23 12:04:15', '??????? ??\"?', 'ILS', '-500.00', '-500.00', '-500.00', '1', '2'),
 ('25', '108', '2', '0', '321', '123', '0', '0', '0', '2014-06-22 18:16:10', '2014-06-22 18:06:10', '???', 'ILS', '-100.00', '-100.00', NULL, '1', '1'),
 ('26', '108', '2', '0', '321', '123', '0', '0', '0', '2014-06-22 18:16:10', '2014-06-22 18:06:10', '???', 'ILS', '100.00', '100.00', NULL, '1', '2'),
 ('27', '109', '1', '0', '321', '123', '0', '0', '0', '2014-06-22 18:17:31', '2014-06-22 18:06:31', '???', 'ILS', '100.00', '100.00', NULL, '1', '1'),
 ('28', '109', '100', '0', '321', '123', '0', '0', '0', '2014-06-22 18:17:31', '2014-06-22 18:06:31', '???', 'ILS', '-100.00', '-100.00', NULL, '1', '2'),
 ('29', '110', '100', '1', '183', '', '0', '0', '0', '2014-06-29 23:06:19', '2014-06-29 23:06:19', '???? ??????', 'ILS', '2000.00', '2000.00', NULL, '1', '1'),
 ('30', '110', '101082', '1', '183', '', '0', '0', '0', '2014-06-29 23:06:19', '2014-06-29 23:06:19', '???? ??????', 'ILS', '2000.00', '2000.00', NULL, '1', '2'),
 ('31', '110', '3', '1', '183', '', '0', '0', '0', '2014-06-29 23:06:19', '2014-06-29 23:06:19', '???? ??????', 'ILS', '0.00', '0.00', NULL, '1', '3'),
 ('32', '111', '100', '1', '185', '', '0', '0', '0', '2014-06-30 08:06:42', '2014-06-30 08:06:42', '???? ??????', 'ILS', '6000.00', '6000.00', NULL, '1', '1'),
 ('33', '111', '101082', '1', '185', '', '0', '0', '0', '2014-06-30 08:06:42', '2014-06-30 08:06:43', '???? ??????', 'ILS', '6000.00', '6000.00', NULL, '1', '2'),
 ('34', '111', '3', '1', '185', '', '0', '0', '0', '2014-06-30 08:06:42', '2014-06-30 08:06:43', '???? ??????', 'ILS', '0.00', '0.00', NULL, '1', '3'),
 ('35', '112', '100', '17', '186', '', '0', '0', '0', '2014-06-30 09:06:47', '2014-06-30 09:06:47', '???? ??????', 'ILS', '2010.00', '2010.00', NULL, '1', '1'),
 ('36', '112', '101082', '17', '186', '', '0', '0', '0', '2014-06-30 09:06:47', '2014-06-30 09:06:47', '???? ??????', 'ILS', '2010.00', '2010.00', NULL, '1', '2'),
 ('37', '112', '3', '17', '186', '', '0', '0', '0', '2014-06-30 09:06:47', '2014-06-30 09:06:47', '???? ??????', 'ILS', '0.00', '0.00', NULL, '1', '3'),
 ('38', '113', '100', '1', '189', '', '0', '0', '0', '2014-06-30 16:06:52', '2014-06-30 17:06:52', '??????? ??\"?', 'ILS', '15000.00', '15000.00', NULL, '1', '1'),
 ('39', '113', '101071', '1', '189', '', '0', '0', '0', '2014-06-30 16:06:52', '2014-06-30 17:06:52', '??????? ??\"?', 'ILS', '17700.00', '17700.00', NULL, '1', '2'),
 ('40', '113', '3', '1', '189', '', '0', '0', '0', '2014-06-30 16:06:52', '2014-06-30 17:06:53', '??????? ??\"?', 'ILS', '2700.00', '2700.00', NULL, '1', '3'),
 ('41', '114', '100', '1', '190', '', '0', '0', '0', '2014-06-30 17:06:34', '2014-06-30 17:06:34', '??????? ??\"?', 'ILS', '15000.00', '15000.00', NULL, '1', '1'),
 ('42', '114', '101071', '1', '190', '', '0', '0', '0', '2014-06-30 17:06:34', '2014-06-30 17:06:34', '??????? ??\"?', 'ILS', '15000.00', '15000.00', NULL, '1', '2'),
 ('43', '114', '3', '1', '190', '', '0', '0', '0', '2014-06-30 17:06:34', '2014-06-30 17:06:34', '??????? ??\"?', 'ILS', '0.00', '0.00', NULL, '1', '3'),
 ('44', '115', '100', '1', '191', '', '0', '0', '0', '2014-06-30 17:06:43', '2014-06-30 17:06:43', '??????? ??\"?', 'ILS', '15000.00', '15000.00', NULL, '1', '1'),
 ('45', '115', '101071', '1', '191', '', '0', '0', '0', '2014-06-30 17:06:43', '2014-06-30 17:06:43', '??????? ??\"?', 'ILS', '17700.00', '17700.00', NULL, '1', '2'),
 ('46', '115', '3', '1', '191', '', '0', '0', '0', '2014-06-30 17:06:43', '2014-06-30 17:06:43', '??????? ??\"?', 'ILS', '2700.00', '2700.00', NULL, '1', '3'),
 ('51', '118', '101081', '3', '192', '', '0', '0', '0', '2014-06-30 18:06:09', '2014-06-30 18:06:09', '???? ????? ??\"?', 'ILS', '400.00', '400.00', NULL, '1', '1'),
 ('52', '118', '7', '3', '192', '', '0', '0', '0', '2014-06-30 18:06:09', '2014-06-30 18:06:09', '???? ????? ??\"?', 'ILS', '-400.00', '-400.00', NULL, '1', '2'),
 ('53', '118', '101081', '3', '192', '', '0', '0', '0', '2014-06-30 18:06:09', '2014-06-30 18:06:09', '???? ????? ??\"?', 'ILS', '500.00', '500.00', NULL, '1', '3'),
 ('54', '118', '11', '3', '192', '', '0', '0', '0', '2014-06-30 18:06:09', '2014-06-30 18:06:09', '???? ????? ??\"?', 'ILS', '-500.00', '-500.00', NULL, '1', '4'),
 ('55', '118', '101081', '3', '192', '', '0', '0', '0', '2014-06-30 18:06:09', '2014-06-30 18:06:09', '???? ????? ??\"?', 'ILS', '600.00', '600.00', NULL, '1', '5'),
 ('56', '118', '10', '3', '192', '', '0', '0', '0', '2014-06-30 18:06:09', '2014-06-30 18:06:09', '???? ????? ??\"?', 'ILS', '-600.00', '-600.00', NULL, '1', '6'),
 ('57', '119', '101082', '3', '193', '', '0', '0', '0', '2014-06-30 18:06:11', '2014-06-30 18:06:11', '???? ??????', 'ILS', '500.00', '500.00', NULL, '1', '1'),
 ('58', '119', '10', '3', '193', '', '0', '0', '0', '2014-06-30 18:06:11', '2014-06-30 18:06:11', '???? ??????', 'ILS', '-500.00', '-500.00', NULL, '1', '2'),
 ('59', '120', '101082', '3', '194', '', '0', '0', '0', '2014-06-30 18:06:56', '2014-06-30 18:06:56', '???? ??????', 'ILS', '300.00', '300.00', NULL, '1', '1'),
 ('60', '120', '10', '3', '194', '', '0', '0', '0', '2014-06-30 18:06:56', '2014-06-30 18:06:56', '???? ??????', 'ILS', '-300.00', '-300.00', NULL, '1', '2'),
 ('61', '121', '101082', '3', '195', '', '0', '0', '0', '2014-06-30 18:06:29', '2014-06-30 18:06:29', '???? ??????', 'ILS', '50.00', '50.00', NULL, '1', '1'),
 ('62', '121', '10', '3', '195', '', '0', '0', '0', '2014-06-30 18:06:29', '2014-06-30 18:06:29', '???? ??????', 'ILS', '-50.00', '-50.00', NULL, '1', '2'),
 ('63', '122', '100', '1', '200', '', '0', '0', '0', '2014-07-01 09:07:26', '2014-07-01 09:07:26', '???? ??????', 'ILS', '15000.00', '15000.00', NULL, '1', '1'),
 ('64', '122', '101082', '1', '200', '', '0', '0', '0', '2014-07-01 09:07:26', '2014-07-01 09:07:27', '???? ??????', 'ILS', '15000.00', '15000.00', NULL, '1', '2'),
 ('65', '122', '3', '1', '200', '', '0', '0', '0', '2014-07-01 09:07:26', '2014-07-01 09:07:27', '???? ??????', 'ILS', '0.00', '0.00', NULL, '1', '3'),
 ('66', '123', '100', '1', '201', '', '0', '0', '0', '2014-07-02 08:07:50', '2014-07-01 09:07:50', '???? ??????', 'ILS', '15.00', '15.00', NULL, '1', '1'),
 ('67', '123', '101082', '1', '201', '', '0', '0', '0', '2014-07-02 08:07:50', '2014-07-01 09:07:50', '???? ??????', 'ILS', '17.70', '17.70', NULL, '1', '2'),
 ('68', '123', '3', '1', '201', '', '0', '0', '0', '2014-07-02 08:07:50', '2014-07-01 09:07:50', '???? ??????', 'ILS', '2.70', '2.70', NULL, '1', '3'),
 ('69', '124', '100', '1', '202', '', '0', '0', '0', '2014-07-30 17:07:34', '2014-07-01 10:17:34', '???? ??????', 'ILS', '670.00', '670.00', NULL, '1', '1'),
 ('70', '124', '101082', '1', '202', '', '0', '0', '0', '2014-07-30 17:07:34', '2014-07-01 10:17:34', '???? ??????', 'ILS', '790.60', '790.60', NULL, '1', '2'),
 ('71', '124', '3', '1', '202', '', '0', '0', '0', '2014-07-30 17:07:34', '2014-07-01 10:17:34', '???? ??????', 'ILS', '120.60', '120.60', NULL, '1', '3'),
 ('72', '125', '100', '1', '199', '', '0', '0', '0', '2014-06-30 19:06:08', '2014-07-01 18:53:08', '', 'ILS', '600.00', '600.00', NULL, '1', '1'),
 ('73', '125', '101068', '1', '199', '', '0', '0', '0', '2014-06-30 19:06:08', '2014-07-01 18:53:08', '', 'ILS', '708.00', '708.00', NULL, '1', '2'),
 ('74', '125', '3', '1', '199', '', '0', '0', '0', '2014-06-30 19:06:08', '2014-07-01 18:53:08', '', 'ILS', '108.00', '108.00', NULL, '1', '3'),
 ('75', '126', '100', '1', '203', '', '0', '0', '0', '2014-07-02 00:07:45', '2014-07-01 19:46:45', '???? ??????', 'ILS', '670.00', '670.00', NULL, '1', '1'),
 ('76', '126', '101082', '1', '203', '', '0', '0', '0', '2014-07-02 00:07:45', '2014-07-01 19:46:45', '???? ??????', 'ILS', '670.00', '670.00', NULL, '1', '2'),
 ('77', '126', '3', '1', '203', '', '0', '0', '0', '2014-07-02 00:07:45', '2014-07-01 19:46:45', '???? ??????', 'ILS', '0.00', '0.00', NULL, '1', '3'),
 ('78', '128', '0', '4', '', '', '0', '0', '0', '0000-00-00 00:00:00', '2014-07-02 09:07:35', '', 'ILS', '15.00', '15.00', NULL, '1', '1'),
 ('79', '128', '10', '4', '', '', '0', '0', '0', '0000-00-00 00:00:00', '2014-07-02 09:07:35', '', 'ILS', '-15.00', '-15.00', NULL, '1', '2'),
 ('80', '128', '0', '4', '', '', '0', '0', '0', '0000-00-00 00:00:00', '2014-07-02 09:07:35', '', 'ILS', '400.00', '400.00', NULL, '1', '3'),
 ('81', '128', '7', '4', '', '', '0', '0', '0', '0000-00-00 00:00:00', '2014-07-02 09:07:35', '', 'ILS', '-400.00', '-400.00', NULL, '1', '4'),
 ('82', '130', '0', '4', '', '', '0', '0', '0', '0000-00-00 00:00:00', '2014-07-02 09:08:01', '', 'ILS', '50.00', '50.00', NULL, '1', '1'),
 ('83', '130', '10', '4', '', '', '0', '0', '0', '0000-00-00 00:00:00', '2014-07-02 09:08:01', '', 'ILS', '-50.00', '-50.00', NULL, '1', '2'),
 ('84', '130', '0', '4', '', '', '0', '0', '0', '0000-00-00 00:00:00', '2014-07-02 09:08:01', '', 'ILS', '15.00', '15.00', NULL, '1', '3'),
 ('85', '130', '10', '4', '', '', '0', '0', '0', '0000-00-00 00:00:00', '2014-07-02 09:08:01', '', 'ILS', '-15.00', '-15.00', NULL, '1', '4'),
 ('86', '130', '0', '4', '', '', '0', '0', '0', '0000-00-00 00:00:00', '2014-07-02 09:08:01', '', 'ILS', '500.00', '500.00', NULL, '1', '5'),
 ('87', '130', '11', '4', '', '', '0', '0', '0', '0000-00-00 00:00:00', '2014-07-02 09:08:01', '', 'ILS', '-500.00', '-500.00', NULL, '1', '6'),
 ('88', '130', '0', '4', '', '', '0', '0', '0', '0000-00-00 00:00:00', '2014-07-02 09:08:01', '', 'ILS', '600.00', '600.00', NULL, '1', '7'),
 ('89', '130', '10', '4', '', '', '0', '0', '0', '0000-00-00 00:00:00', '2014-07-02 09:08:01', '', 'ILS', '-600.00', '-600.00', NULL, '1', '8'),
 ('90', '130', '0', '4', '', '', '0', '0', '0', '0000-00-00 00:00:00', '2014-07-02 09:08:01', '', 'ILS', '500.00', '500.00', NULL, '1', '9'),
 ('91', '130', '10', '4', '', '', '0', '0', '0', '0000-00-00 00:00:00', '2014-07-02 09:08:01', '', 'ILS', '-500.00', '-500.00', NULL, '1', '10'),
 ('92', '130', '0', '4', '', '', '0', '0', '0', '0000-00-00 00:00:00', '2014-07-02 09:08:01', '', 'ILS', '300.00', '300.00', NULL, '1', '11'),
 ('93', '130', '10', '4', '', '', '0', '0', '0', '0000-00-00 00:00:00', '2014-07-02 09:08:01', '', 'ILS', '-300.00', '-300.00', NULL, '1', '12'),
 ('94', '130', '0', '4', '', '', '0', '0', '0', '0000-00-00 00:00:00', '2014-07-02 09:08:02', '', 'ILS', '50.00', '50.00', NULL, '1', '13'),
 ('95', '130', '10', '4', '', '', '0', '0', '0', '0000-00-00 00:00:00', '2014-07-02 09:08:02', '', 'ILS', '-50.00', '-50.00', NULL, '1', '14'),
 ('96', '130', '0', '4', '', '', '0', '0', '0', '0000-00-00 00:00:00', '2014-07-02 09:08:02', '', 'ILS', '50.00', '50.00', NULL, '1', '15'),
 ('97', '130', '10', '4', '', '', '0', '0', '0', '0000-00-00 00:00:00', '2014-07-02 09:08:02', '', 'ILS', '-50.00', '-50.00', NULL, '1', '16'),
 ('98', '130', '0', '4', '', '', '0', '0', '0', '0000-00-00 00:00:00', '2014-07-02 09:08:02', '', 'ILS', '50.00', '50.00', NULL, '1', '17'),
 ('99', '130', '10', '4', '', '', '0', '0', '0', '0000-00-00 00:00:00', '2014-07-02 09:08:02', '', 'ILS', '-50.00', '-50.00', NULL, '1', '18'),
 ('100', '131', '0', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-02 09:16:08', '', 'ILS', '0.00', '0.00', NULL, '1', '1'),
 ('101', '131', '150', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-20 14:13:25', '', 'ILS', '0.00', '0.00', NULL, '1', '2'),
 ('102', '132', '0', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-02 09:16:43', '', 'ILS', '0.00', '0.00', NULL, '1', '1'),
 ('103', '132', '150', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-20 14:13:26', '', 'ILS', '0.00', '0.00', NULL, '1', '2'),
 ('104', '133', '101082', '3', '204,203', '', '0', '0', '0', '2014-07-02 14:49:54', '2014-07-02 09:41:52', '???? ??????', 'ILS', '670.00', '670.00', NULL, '1', '1'),
 ('105', '133', '7', '3', '204,203', '', '0', '0', '0', '2014-07-02 14:49:59', '2014-07-02 09:41:52', '???? ??????', 'ILS', '-670.00', '-670.00', NULL, '1', '2'),
 ('106', '134', '150', '4', '321', '', '0', '0', '0', '0000-00-00 00:00:00', '2014-07-02 09:46:40', '', 'ILS', '670.00', '670.00', NULL, '1', '1'),
 ('107', '134', '7', '4', '321', '', '0', '0', '0', '0000-00-00 00:00:00', '2014-07-02 09:46:40', '', 'ILS', '-670.00', '-670.00', NULL, '1', '2'),
 ('108', '138', '114', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-02 10:38:43', '', 'ILS', '0.00', '0.00', NULL, '1', '1'),
 ('109', '138', '150', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-20 14:13:26', '', 'ILS', '0.00', '0.00', NULL, '1', '2'),
 ('110', '139', '114', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-02 10:38:47', '', 'ILS', '123.00', '123.00', NULL, '1', '1'),
 ('111', '139', '150', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-02 10:38:47', '', 'ILS', '-123.00', '-123.00', NULL, '1', '2'),
 ('112', '140', '114', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-02 10:38:53', '', 'ILS', '123.00', '123.00', NULL, '1', '1'),
 ('113', '140', '150', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-02 10:38:53', '', 'ILS', '-123.00', '-123.00', NULL, '1', '2'),
 ('114', '141', '114', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-02 10:38:56', '', 'ILS', '123.00', '123.00', NULL, '1', '1'),
 ('115', '141', '150', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-02 10:38:57', '', 'ILS', '-123.00', '-123.00', NULL, '1', '2'),
 ('116', '142', '114', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-02 10:39:01', '', 'ILS', '123.00', '123.00', NULL, '1', '1'),
 ('117', '142', '150', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-02 10:39:01', '', 'ILS', '-123.00', '-123.00', NULL, '1', '2'),
 ('118', '143', '114', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-02 10:39:05', '', 'ILS', '123.00', '123.00', NULL, '1', '1'),
 ('119', '143', '150', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-02 10:39:05', '', 'ILS', '-123.00', '-123.00', NULL, '1', '2'),
 ('120', '144', '0', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-02 11:53:17', '', 'ILS', '0.00', '0.00', NULL, '1', '1'),
 ('121', '144', '150', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-20 14:13:26', '', 'ILS', '0.00', '0.00', NULL, '1', '2'),
 ('122', '145', '0', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-02 11:53:19', '', 'ILS', '0.00', '0.00', NULL, '1', '1'),
 ('123', '145', '150', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-20 14:13:26', '', 'ILS', '0.00', '0.00', NULL, '1', '2'),
 ('124', '146', '0', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-02 14:21:42', '', 'ILS', '0.00', '0.00', NULL, '1', '1'),
 ('125', '146', '150', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-20 14:13:26', '', 'ILS', '0.00', '0.00', NULL, '1', '2'),
 ('126', '147', '83', '0', '??? ??? 12', '???', '0', '0', '0', '2014-07-03 17:48:27', '2014-07-03 17:48:27', '????? ?????', 'ILS', '-150.00', '-150.00', NULL, '1', '1'),
 ('127', '147', '150', '0', '??? ??? 12', '???', '0', '0', '0', '2014-07-03 17:48:27', '2014-07-03 17:48:27', '????? ?????', 'ILS', '100.00', '100.00', NULL, '1', '2'),
 ('128', '147', '78', '0', '??? ??? 12', '???', '0', '0', '0', '2014-07-03 17:48:27', '2014-07-03 17:48:27', '????? ?????', 'ILS', '50.00', '50.00', NULL, '1', '3'),
 ('129', '148', '41', '0', '123', '321', '0', '0', '0', '2014-07-03 17:59:28', '2014-07-03 17:59:28', '?????? ????? ????? ?? ??????', 'ILS', '10.23', '10.23', NULL, '1', '1'),
 ('130', '148', '56', '0', '123', '321', '0', '0', '0', '2014-07-03 17:59:28', '2014-07-03 17:59:28', '?????? ????? ????? ?? ??????', 'ILS', '-10.23', '-10.23', NULL, '1', '2'),
 ('131', '149', '6', '0', '321', '123', '0', '0', '0', '2014-07-03 18:13:35', '2014-07-03 18:13:35', '???', 'ILS', '8.00', '8.00', NULL, '1', '1'),
 ('132', '149', '1', '0', '321', '123', '0', '0', '0', '2014-07-03 18:13:35', '2014-07-03 18:13:35', '???', 'ILS', '-8.00', '-8.00', NULL, '1', '2'),
 ('133', '150', '101084', '16', '', '', '0', '0', '0', '2014-07-04 14:53:50', '2014-07-04 14:53:50', '????? ????', 'ILS', '340.00', '340.00', NULL, '1', '1'),
 ('134', '150', '9', '16', '', '', '0', '0', '0', '2014-07-04 14:53:50', '2014-07-04 14:53:50', '????? ????', 'ILS', '-340.00', '-340.00', NULL, '1', '2'),
 ('135', '151', '101083', '16', '', '', '0', '0', '0', '2014-07-04 14:56:27', '2014-07-04 14:56:27', '???? ?????', 'ILS', '460.00', '460.00', NULL, '1', '1'),
 ('136', '151', '9', '16', '', '', '0', '0', '0', '2014-07-04 14:56:27', '2014-07-04 14:56:27', '???? ?????', 'ILS', '-460.00', '-460.00', NULL, '1', '2'),
 ('137', '152', '100', '1', '207', '', '0', '0', '0', '2014-07-05 00:07:10', '2014-07-05 13:32:10', '????? ????? ??\"?', 'ILS', '15000.00', '15000.00', NULL, '1', '1'),
 ('138', '152', '101084', '1', '207', '', '0', '0', '0', '2014-07-05 00:07:10', '2014-07-05 13:32:10', '????? ????? ??\"?', 'ILS', '17700.00', '17700.00', NULL, '1', '2'),
 ('139', '152', '3', '1', '207', '', '0', '0', '0', '2014-07-05 00:07:10', '2014-07-05 13:32:10', '????? ????? ??\"?', 'ILS', '2700.00', '2700.00', NULL, '1', '3'),
 ('140', '153', '100', '1', '211', '', '0', '0', '0', '2014-07-05 00:07:32', '2014-07-05 14:58:33', '????? ????? ??\"?', 'ILS', '435.00', '435.00', NULL, '1', '1'),
 ('141', '153', '100', '1', '211', '', '0', '0', '0', '2014-07-05 00:07:32', '2014-07-05 14:58:33', '????? ????? ??\"?', 'ILS', '337.50', '337.50', NULL, '1', '2'),
 ('142', '153', '101084', '1', '211', '', '0', '0', '0', '2014-07-05 00:07:32', '2014-07-05 14:58:33', '????? ????? ??\"?', 'ILS', '911.55', '911.55', NULL, '1', '3'),
 ('143', '153', '3', '1', '211', '', '0', '0', '0', '2014-07-05 00:07:32', '2014-07-05 14:58:33', '????? ????? ??\"?', 'ILS', '139.05', '139.05', NULL, '1', '4'),
 ('144', '154', '100', '17', '212', '', '0', '0', '0', '2014-07-05 00:07:02', '2014-07-05 14:59:02', '????? ????? ??\"?', 'ILS', '435.00', '435.00', NULL, '1', '1'),
 ('145', '154', '100', '17', '212', '', '0', '0', '0', '2014-07-05 00:07:02', '2014-07-05 14:59:02', '????? ????? ??\"?', 'ILS', '337.50', '337.50', NULL, '1', '2'),
 ('146', '154', '101084', '17', '212', '', '0', '0', '0', '2014-07-05 00:07:02', '2014-07-05 14:59:02', '????? ????? ??\"?', 'ILS', '911.55', '911.55', NULL, '1', '3'),
 ('147', '154', '3', '17', '212', '', '0', '0', '0', '2014-07-05 00:07:02', '2014-07-05 14:59:02', '????? ????? ??\"?', 'ILS', '139.05', '139.05', NULL, '1', '4'),
 ('148', '155', '100', '1', '219', '', '0', '0', '0', '2014-07-06 16:07:50', '2014-07-06 17:07:50', '????? ????? ??\"?', 'ILS', '135.00', '135.00', NULL, '1', '1'),
 ('149', '155', '101084', '1', '219', '', '0', '0', '0', '2014-07-06 16:07:50', '2014-07-06 17:07:50', '????? ????? ??\"?', 'ILS', '159.30', '159.30', NULL, '1', '2'),
 ('150', '155', '3', '1', '219', '', '0', '0', '0', '2014-07-06 16:07:50', '2014-07-06 17:07:50', '????? ????? ??\"?', 'ILS', '24.30', '24.30', NULL, '1', '3'),
 ('151', '156', '101084', '3', '220', '', '0', '0', '0', '2014-07-06 18:07:57', '2014-07-06 18:29:57', '????? ????? ??\"?', 'ILS', '145.00', '145.00', NULL, '1', '1'),
 ('152', '156', '10', '3', '220', '', '0', '0', '0', '2014-07-06 18:07:57', '2014-07-06 18:29:57', '????? ????? ??\"?', 'ILS', '-145.00', '-145.00', NULL, '1', '2'),
 ('153', '157', '0', '4', '', '', '0', '0', '0', '0000-00-00 00:00:00', '2014-07-06 18:31:43', '', 'ILS', '145.00', '145.00', NULL, '1', '1'),
 ('154', '157', '10', '4', '', '', '0', '0', '0', '0000-00-00 00:00:00', '2014-07-06 18:31:43', '', 'ILS', '-145.00', '-145.00', NULL, '1', '2'),
 ('155', '159', '101084', '3', '221', '', '0', '0', '0', '2014-07-06 18:07:23', '2014-07-06 18:34:23', '????? ????? ??\"?', 'ILS', '150.00', '150.00', NULL, '1', '1'),
 ('156', '159', '10', '3', '221', '', '0', '0', '0', '2014-07-06 18:07:23', '2014-07-06 18:34:23', '????? ????? ??\"?', 'ILS', '-150.00', '-150.00', NULL, '1', '2'),
 ('157', '160', '0', '4', '', '', '0', '0', '0', '0000-00-00 00:00:00', '2014-07-06 18:34:49', '', 'ILS', '150.00', '150.00', NULL, '1', '1'),
 ('158', '160', '10', '4', '', '', '0', '0', '0', '0000-00-00 00:00:00', '2014-07-06 18:34:49', '', 'ILS', '-150.00', '-150.00', NULL, '1', '2'),
 ('159', '161', '100', '1', '224', '', '0', '0', '0', '2014-07-06 20:07:00', '2014-07-06 20:12:00', '????? ????? ??\"?', 'ILS', '435.00', '435.00', NULL, '1', '1'),
 ('160', '161', '101084', '1', '224', '', '0', '0', '0', '2014-07-06 20:07:00', '2014-07-06 20:12:00', '????? ????? ??\"?', 'ILS', '513.30', '513.30', NULL, '1', '2'),
 ('161', '161', '3', '1', '224', '', '0', '0', '0', '2014-07-06 20:07:00', '2014-07-06 20:12:01', '????? ????? ??\"?', 'ILS', '78.30', '78.30', NULL, '1', '3'),
 ('162', '162', '0', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-07 12:09:16', '', 'ILS', '0.00', '0.00', NULL, '1', '1'),
 ('163', '162', '150', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-20 14:13:26', '', 'ILS', '0.00', '0.00', NULL, '1', '2'),
 ('164', '163', '0', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-07 12:09:16', '', 'ILS', '0.00', '0.00', NULL, '1', '1'),
 ('165', '163', '150', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-20 14:13:26', '', 'ILS', '0.00', '0.00', NULL, '1', '2'),
 ('166', '164', '100', '19', '239', '', '0', '0', '0', '2014-07-07 09:07:01', '2014-07-07 13:16:01', '????? ????? ??\"?', 'ILS', '435.00', '435.00', NULL, '1', '1'),
 ('167', '164', '101084', '19', '239', '', '0', '0', '0', '2014-07-07 09:07:01', '2014-07-07 13:16:01', '????? ????? ??\"?', 'ILS', '513.30', '513.30', NULL, '1', '2'),
 ('168', '164', '3', '19', '239', '', '0', '0', '0', '2014-07-07 09:07:01', '2014-07-07 13:16:01', '????? ????? ??\"?', 'ILS', '78.30', '78.30', NULL, '1', '3'),
 ('169', '165', '100', '1', '240', '', '0', '0', '0', '2014-07-07 13:07:20', '2014-07-07 13:18:20', '???? ??????', 'ILS', '670.00', '670.00', NULL, '1', '1'),
 ('170', '165', '100', '1', '240', '', '0', '0', '0', '2014-07-07 13:07:20', '2014-07-07 13:18:20', '???? ??????', 'ILS', '435.00', '435.00', NULL, '1', '2'),
 ('171', '165', '101082', '1', '240', '', '0', '0', '0', '2014-07-07 13:07:20', '2014-07-07 13:18:20', '???? ??????', 'ILS', '1303.90', '1303.90', NULL, '1', '3'),
 ('172', '165', '3', '1', '240', '', '0', '0', '0', '2014-07-07 13:07:20', '2014-07-07 13:18:20', '???? ??????', 'ILS', '198.90', '198.90', NULL, '1', '4'),
 ('173', '166', '100', '1', '241', '', '0', '0', '0', '2014-07-07 13:07:29', '2014-07-07 13:27:29', '???? ??????', 'ILS', '15000.00', '15000.00', NULL, '1', '1'),
 ('174', '166', '101082', '1', '241', '', '0', '0', '0', '2014-07-07 13:07:29', '2014-07-07 13:27:29', '???? ??????', 'ILS', '17700.00', '17700.00', NULL, '1', '2'),
 ('175', '166', '3', '1', '241', '', '0', '0', '0', '2014-07-07 13:07:29', '2014-07-07 13:27:29', '???? ??????', 'ILS', '2700.00', '2700.00', NULL, '1', '3'),
 ('176', '167', '2', '5', '242', '', '0', '0', '0', '2014-07-07 13:07:18', '2014-07-07 13:28:18', '', 'ILS', '67500.00', '67500.00', NULL, '1', '1'),
 ('177', '167', '101086', '5', '242', '', '0', '0', '0', '2014-07-07 13:07:18', '2014-07-07 13:28:18', '', 'ILS', '79650.00', '79650.00', NULL, '1', '2'),
 ('178', '167', '1', '5', '242', '', '0', '0', '0', '2014-07-07 13:07:18', '2014-07-07 13:28:18', '', 'ILS', '12150.00', '12150.00', NULL, '1', '3'),
 ('179', '168', '100', '1', '243', '', '0', '0', '0', '2014-07-07 13:07:10', '2014-07-07 13:36:10', '????? ????? ??\"?', 'ILS', '12.00', '12.00', NULL, '1', '1'),
 ('180', '168', '101084', '1', '243', '', '0', '0', '0', '2014-07-07 13:07:10', '2014-07-07 13:36:10', '????? ????? ??\"?', 'ILS', '14.16', '14.16', NULL, '1', '2'),
 ('181', '168', '3', '1', '243', '', '0', '0', '0', '2014-07-07 13:07:10', '2014-07-07 13:36:10', '????? ????? ??\"?', 'ILS', '2.16', '2.16', NULL, '1', '3'),
 ('182', '169', '100', '17', '244', '', '0', '0', '0', '2014-07-07 13:07:28', '2014-07-07 13:57:28', '????? ????? ??\"?', 'ILS', '12.00', '12.00', NULL, '1', '1'),
 ('183', '169', '101084', '17', '244', '', '0', '0', '0', '2014-07-07 13:07:28', '2014-07-07 13:57:28', '????? ????? ??\"?', 'ILS', '14.16', '14.16', NULL, '1', '2'),
 ('184', '169', '3', '17', '244', '', '0', '0', '0', '2014-07-07 13:07:28', '2014-07-07 13:57:28', '????? ????? ??\"?', 'ILS', '2.16', '2.16', NULL, '1', '3'),
 ('185', '170', '100', '1', '245', '', '0', '0', '0', '2014-07-07 14:07:19', '2014-07-07 14:01:19', '????? ????? ??\"?', 'ILS', '135.00', '135.00', NULL, '1', '1'),
 ('186', '170', '101084', '1', '245', '', '0', '0', '0', '2014-07-07 14:07:19', '2014-07-07 14:01:19', '????? ????? ??\"?', 'ILS', '135.00', '135.00', NULL, '1', '2'),
 ('187', '170', '3', '1', '245', '', '0', '0', '0', '2014-07-07 14:07:19', '2014-07-07 14:01:19', '????? ????? ??\"?', 'ILS', '0.00', '0.00', NULL, '1', '3'),
 ('188', '171', '100', '1', '246', '', '0', '0', '0', '2014-07-07 14:07:18', '2014-07-07 14:03:18', '????? ????? ??\"?', 'ILS', '1.00', '1.00', NULL, '1', '1'),
 ('189', '171', '101084', '1', '246', '', '0', '0', '0', '2014-07-07 14:07:18', '2014-07-07 14:03:18', '????? ????? ??\"?', 'ILS', '1.18', '1.18', NULL, '1', '2'),
 ('190', '171', '3', '1', '246', '', '0', '0', '0', '2014-07-07 14:07:18', '2014-07-07 14:03:18', '????? ????? ??\"?', 'ILS', '0.18', '0.18', NULL, '1', '3'),
 ('191', '172', '100', '1', '247', '', '0', '0', '0', '2014-07-07 14:07:22', '2014-07-07 14:21:22', '????? ????? ??\"?', 'ILS', '1.10', '1.10', NULL, '1', '1'),
 ('192', '172', '101084', '1', '247', '', '0', '0', '0', '2014-07-07 14:07:22', '2014-07-07 14:21:22', '????? ????? ??\"?', 'ILS', '1.30', '1.30', NULL, '1', '2'),
 ('193', '172', '3', '1', '247', '', '0', '0', '0', '2014-07-07 14:07:22', '2014-07-07 14:21:22', '????? ????? ??\"?', 'ILS', '0.20', '0.20', NULL, '1', '3'),
 ('194', '173', '2', '5', '248', '', '0', '0', '0', '2014-07-07 14:07:30', '2014-07-07 14:42:30', '', 'ILS', '2700.00', '2700.00', NULL, '1', '1'),
 ('195', '173', '101086', '5', '248', '', '0', '0', '0', '2014-07-07 14:07:30', '2014-07-07 14:42:30', '', 'ILS', '3186.00', '3186.00', NULL, '1', '2'),
 ('196', '173', '1', '5', '248', '', '0', '0', '0', '2014-07-07 14:07:30', '2014-07-07 14:42:31', '', 'ILS', '486.00', '486.00', NULL, '1', '3'),
 ('197', '174', '8', '0', '249', '', '0', '0', '0', '2014-07-07 14:07:37', '2014-07-07 14:46:37', '', 'ILS', '4050.00', '4050.00', NULL, '1', '1'),
 ('198', '174', '101080', '0', '249', '', '0', '0', '0', '2014-07-07 14:07:37', '2014-07-07 14:46:37', '', 'ILS', '4779.00', '4779.00', NULL, '1', '2'),
 ('199', '174', '0', '0', '249', '', '0', '0', '0', '2014-07-07 14:07:37', '2014-07-07 14:46:37', '', 'ILS', '729.00', '729.00', NULL, '1', '3'),
 ('200', '175', '100', '1', '250', '', '0', '0', '0', '2014-07-07 14:07:54', '2014-07-07 14:46:55', '???? ??????', 'ILS', '1.00', '1.00', NULL, '1', '1'),
 ('201', '175', '101082', '1', '250', '', '0', '0', '0', '2014-07-07 14:07:54', '2014-07-07 14:46:55', '???? ??????', 'ILS', '1.18', '1.18', NULL, '1', '2'),
 ('202', '175', '3', '1', '250', '', '0', '0', '0', '2014-07-07 14:07:54', '2014-07-07 14:46:55', '???? ??????', 'ILS', '0.18', '0.18', NULL, '1', '3'),
 ('203', '176', '100', '1', '251', '', '0', '0', '0', '2014-06-30 09:06:31', '2014-07-07 15:08:31', '???? ??????', 'ILS', '2250.00', '2250.00', NULL, '1', '1'),
 ('204', '176', '101082', '1', '251', '', '0', '0', '0', '2014-06-30 09:06:31', '2014-07-07 15:08:31', '???? ??????', 'ILS', '2655.00', '2655.00', NULL, '1', '2'),
 ('205', '176', '3', '1', '251', '', '0', '0', '0', '2014-06-30 09:06:31', '2014-07-07 15:08:31', '???? ??????', 'ILS', '405.00', '405.00', NULL, '1', '3'),
 ('206', '177', '4', '5', '252', '', '0', '0', '0', '2014-07-07 15:07:28', '2014-07-07 15:13:29', '', 'ILS', '2175.00', '2175.00', NULL, '1', '1'),
 ('207', '177', '101086', '5', '252', '', '0', '0', '0', '2014-07-07 15:07:28', '2014-07-07 15:13:29', '', 'ILS', '2566.50', '2566.50', NULL, '1', '2'),
 ('208', '177', '2', '5', '252', '', '0', '0', '0', '2014-07-07 15:07:28', '2014-07-07 15:13:29', '', 'ILS', '391.50', '391.50', NULL, '1', '3'),
 ('209', '178', '100', '1', '253', '', '0', '0', '0', '2014-07-07 15:07:12', '2014-07-07 15:15:12', '????? ????? ??\"?', 'ILS', '0.00', '0.00', NULL, '1', '1'),
 ('210', '178', '101084', '1', '253', '', '0', '0', '0', '2014-07-07 15:07:12', '2014-07-07 15:15:12', '????? ????? ??\"?', 'ILS', '0.00', '0.00', NULL, '1', '2'),
 ('211', '178', '3', '1', '253', '', '0', '0', '0', '2014-07-07 15:07:12', '2014-07-07 15:15:12', '????? ????? ??\"?', 'ILS', '0.00', '0.00', NULL, '1', '3'),
 ('212', '179', '100', '1', '254', '', '0', '0', '0', '2014-07-07 15:07:46', '2014-07-07 15:16:46', '????? ????? ??\"?', 'ILS', '1.00', '1.00', NULL, '1', '1'),
 ('213', '179', '101084', '1', '254', '', '0', '0', '0', '2014-07-07 15:07:46', '2014-07-07 15:16:46', '????? ????? ??\"?', 'ILS', '1.18', '1.18', NULL, '1', '2'),
 ('214', '179', '3', '1', '254', '', '0', '0', '0', '2014-07-07 15:07:46', '2014-07-07 15:16:46', '????? ????? ??\"?', 'ILS', '0.18', '0.18', NULL, '1', '3'),
 ('215', '180', '100', '1', '255', '', '0', '0', '0', '2014-07-07 16:07:16', '2014-07-07 16:06:16', '????? ????? ??\"?', 'ILS', '670.00', '670.00', NULL, '1', '1'),
 ('216', '180', '101084', '1', '255', '', '0', '0', '0', '2014-07-07 16:07:16', '2014-07-07 16:06:16', '????? ????? ??\"?', 'ILS', '790.60', '790.60', NULL, '1', '2'),
 ('217', '180', '3', '1', '255', '', '0', '0', '0', '2014-07-07 16:07:16', '2014-07-07 16:06:16', '????? ????? ??\"?', 'ILS', '120.60', '120.60', NULL, '1', '3'),
 ('218', '181', '100', '17', '257', '', '0', '0', '0', '2014-07-07 16:07:24', '2014-07-07 16:26:24', '????? ????? ??\"?', 'ILS', '670.00', '670.00', NULL, '1', '1'),
 ('219', '181', '101084', '17', '257', '', '0', '0', '0', '2014-07-07 16:07:24', '2014-07-07 16:26:24', '????? ????? ??\"?', 'ILS', '790.60', '790.60', NULL, '1', '2'),
 ('220', '181', '3', '17', '257', '', '0', '0', '0', '2014-07-07 16:07:24', '2014-07-07 16:26:24', '????? ????? ??\"?', 'ILS', '120.60', '120.60', NULL, '1', '3'),
 ('221', '182', '2', '5', '260', '', '0', '0', '0', '2014-07-07 16:07:53', '2014-07-07 16:36:53', '', 'ILS', '30000.00', '30000.00', NULL, '1', '1'),
 ('222', '182', '101086', '5', '260', '', '0', '0', '0', '2014-07-07 16:07:53', '2014-07-07 16:36:53', '', 'ILS', '35400.00', '35400.00', NULL, '1', '2'),
 ('223', '182', '1', '5', '260', '', '0', '0', '0', '2014-07-07 16:07:53', '2014-07-07 16:36:53', '', 'ILS', '5400.00', '5400.00', NULL, '1', '3'),
 ('224', '183', '2', '5', '261', '', '0', '0', '0', '2014-07-07 16:07:12', '2014-07-07 16:42:13', '', 'ILS', '30000.00', '30000.00', NULL, '1', '1'),
 ('225', '183', '114', '5', '261', '', '0', '0', '0', '2014-07-07 16:07:12', '2014-07-07 16:42:13', '', 'ILS', '35400.00', '35400.00', NULL, '1', '2'),
 ('226', '183', '1', '5', '261', '', '0', '0', '0', '2014-07-07 16:07:12', '2014-07-07 16:42:13', '', 'ILS', '5400.00', '5400.00', NULL, '1', '3'),
 ('227', '184', '2', '5', '262', '', '0', '0', '0', '2014-07-07 17:07:55', '2014-07-07 17:35:55', '', 'ILS', '2000.00', '2000.00', NULL, '1', '1'),
 ('228', '184', '114', '5', '262', '', '0', '0', '0', '2014-07-07 17:07:55', '2014-07-07 17:35:55', '', 'ILS', '2000.00', '2000.00', NULL, '1', '2'),
 ('229', '184', '1', '5', '262', '', '0', '0', '0', '2014-07-07 17:07:55', '2014-07-07 17:35:55', '', 'ILS', '0.00', '0.00', NULL, '1', '3'),
 ('230', '185', '4', '5', '264', '', '0', '0', '0', '2014-07-07 18:07:37', '2014-07-07 18:02:37', '', 'ILS', '540.00', '540.00', NULL, '1', '1'),
 ('231', '185', '101086', '5', '264', '', '0', '0', '0', '2014-07-07 18:07:37', '2014-07-07 18:02:37', '', 'ILS', '637.20', '637.20', NULL, '1', '2'),
 ('232', '185', '2', '5', '264', '', '0', '0', '0', '2014-07-07 18:07:37', '2014-07-07 18:02:37', '', 'ILS', '97.20', '97.20', NULL, '1', '3'),
 ('233', '186', '100', '1', '265', '', '0', '0', '0', '2014-07-07 19:07:03', '2014-07-07 19:45:03', '????? ????? ??\"?', 'ILS', '15000.00', '15000.00', NULL, '1', '1'),
 ('234', '186', '101084', '1', '265', '', '0', '0', '0', '2014-07-07 19:07:03', '2014-07-07 19:45:03', '????? ????? ??\"?', 'ILS', '-15000.00', '-15000.00', NULL, '1', '2'),
 ('235', '186', '3', '1', '265', '', '0', '0', '0', '2014-07-07 19:07:03', '2014-07-07 19:45:03', '????? ????? ??\"?', 'ILS', '0.00', '0.00', NULL, '1', '3'),
 ('236', '187', '2', '5', '266', '', '0', '0', '0', '2014-07-07 20:07:47', '2014-07-07 20:16:47', '', 'ILS', '15000.00', '15000.00', NULL, '1', '1'),
 ('237', '187', '101086', '5', '266', '', '0', '0', '0', '2014-07-07 20:07:47', '2014-07-07 20:16:47', '', 'ILS', '-17700.00', '-17700.00', NULL, '1', '2'),
 ('238', '187', '1', '5', '266', '', '0', '0', '0', '2014-07-07 20:07:47', '2014-07-07 20:16:47', '', 'ILS', '2700.00', '2700.00', NULL, '1', '3'),
 ('239', '188', '2', '5', '267', '', '0', '0', '0', '2014-07-07 20:07:19', '2014-07-07 20:17:19', '', 'ILS', '2000.00', '2000.00', NULL, '1', '1'),
 ('240', '188', '114', '5', '267', '', '0', '0', '0', '2014-07-07 20:07:19', '2014-07-07 20:17:19', '', 'ILS', '-2000.00', '-2000.00', NULL, '1', '2'),
 ('241', '188', '1', '5', '267', '', '0', '0', '0', '2014-07-07 20:07:19', '2014-07-07 20:17:19', '', 'ILS', '0.00', '0.00', NULL, '1', '3'),
 ('242', '189', '101086', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-08 17:01:06', '', 'ILS', '0.00', '0.00', NULL, '1', '1'),
 ('243', '189', '150', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-20 14:13:26', '', 'ILS', '0.00', '0.00', NULL, '1', '2'),
 ('244', '190', '101086', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-08 17:01:09', '', 'ILS', '250.00', '250.00', NULL, '1', '1'),
 ('245', '190', '150', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-08 17:01:09', '', 'ILS', '-250.00', '-250.00', NULL, '1', '2'),
 ('246', '191', '110', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-08 17:04:23', '', 'ILS', '0.00', '0.00', NULL, '1', '1'),
 ('247', '191', '150', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-20 14:13:26', '', 'ILS', '0.00', '0.00', NULL, '1', '2'),
 ('248', '192', '114', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-08 17:04:26', '', 'ILS', '0.00', '0.00', NULL, '1', '1'),
 ('249', '192', '150', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-20 14:13:26', '', 'ILS', '0.00', '0.00', NULL, '1', '2'),
 ('250', '193', '114', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-08 17:04:30', '', 'ILS', '1000.00', '1000.00', NULL, '1', '1'),
 ('251', '193', '150', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-20 14:13:26', '', 'ILS', '-1000.00', '-1000.00', NULL, '1', '2'),
 ('252', '194', '114', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-08 17:04:34', '', 'ILS', '1000.00', '1000.00', NULL, '1', '1'),
 ('253', '194', '150', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-20 14:09:13', '', 'ILS', '-1000.00', '-1000.00', NULL, '1', '2'),
 ('254', '195', '114', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-08 17:04:41', '', 'ILS', '1000.00', '1000.00', NULL, '1', '1'),
 ('255', '195', '150', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-08 17:04:41', '', 'ILS', '-1000.00', '-1000.00', NULL, '1', '2'),
 ('256', '196', '114', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-08 17:04:44', '', 'ILS', '1000.00', '1000.00', NULL, '1', '1'),
 ('257', '196', '150', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-08 17:04:44', '', 'ILS', '-1000.00', '-1000.00', NULL, '1', '2'),
 ('258', '197', '114', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-08 17:04:46', '', 'ILS', '1000.00', '1000.00', NULL, '1', '1'),
 ('259', '197', '150', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-08 17:04:46', '', 'ILS', '-1000.00', '-1000.00', NULL, '1', '2'),
 ('260', '198', '100', '1', '272', '', '0', '0', '0', '2014-07-12 15:07:57', '2014-07-12 15:05:57', '????? ????? ??\"?', 'ILS', '15000.00', '15000.00', NULL, '1', '1'),
 ('261', '199', '100', '1', '273', '', '0', '0', '0', '2014-07-12 15:07:18', '2014-07-12 15:09:18', '????? ????? ??\"?', 'ILS', '15000.00', '15000.00', NULL, '1', '1'),
 ('262', '200', '100', '1', '274', '', '0', '0', '0', '2014-07-12 15:07:52', '2014-07-12 15:09:52', '????? ????? ??\"?', 'ILS', '15000.00', '15000.00', NULL, '1', '1'),
 ('263', '200', '101084', '1', '274', '', '0', '0', '0', '2014-07-12 15:07:52', '2014-07-12 15:09:52', '????? ????? ??\"?', 'ILS', '-17700.00', '-17700.00', NULL, '1', '2'),
 ('264', '200', '3', '1', '274', '', '0', '0', '0', '2014-07-12 15:07:52', '2014-07-12 15:09:52', '????? ????? ??\"?', 'ILS', '2700.00', '2700.00', NULL, '1', '3'),
 ('265', '201', '100', '1', '275', '', '0', '0', '0', '2014-07-12 15:07:55', '2014-07-12 15:13:55', '', 'ILS', '1271.19', '1271.19', NULL, '1', '1'),
 ('266', '201', '101068', '1', '275', '', '0', '0', '0', '2014-07-12 15:07:55', '2014-07-12 15:13:55', '', 'ILS', '-1500.00', '-1500.00', NULL, '1', '2'),
 ('267', '201', '3', '1', '275', '', '0', '0', '0', '2014-07-12 15:07:55', '2014-07-12 15:13:55', '', 'ILS', '228.81', '228.81', NULL, '1', '3'),
 ('268', '202', '113', '1', '276', '', '0', '0', '0', '2014-07-12 15:07:33', '2014-07-12 15:22:33', '', 'ILS', '0.00', '0.00', NULL, '1', '1'),
 ('269', '202', '101068', '1', '276', '', '0', '0', '0', '2014-07-12 15:07:33', '2014-07-12 15:22:33', '', 'ILS', '0.00', '0.00', NULL, '1', '2'),
 ('270', '202', '3', '1', '276', '', '0', '0', '0', '2014-07-12 15:07:33', '2014-07-12 15:22:33', '', 'ILS', '0.00', '0.00', NULL, '1', '3'),
 ('271', '203', '100', '1', '277', '', '0', '0', '0', '2014-07-12 15:07:35', '2014-07-12 15:40:35', '????? ????? ??\"?', 'ILS', '408.47', '408.47', NULL, '1', '1'),
 ('272', '203', '101084', '1', '277', '', '0', '0', '0', '2014-07-12 15:07:35', '2014-07-12 15:40:35', '????? ????? ??\"?', 'ILS', '-481.99', '-481.99', NULL, '1', '2'),
 ('273', '203', '3', '1', '277', '', '0', '0', '0', '2014-07-12 15:07:35', '2014-07-12 15:40:35', '????? ????? ??\"?', 'ILS', '73.52', '73.52', NULL, '1', '3'),
 ('274', '204', '100', '1', '279', '', '0', '0', '0', '2014-07-12 02:07:39', '2014-07-12 02:44:39', '???? ??????', 'ILS', '228.82', '228.82', NULL, '11', '1'),
 ('275', '204', '101082', '1', '279', '', '0', '0', '0', '2014-07-12 02:07:39', '2014-07-12 02:44:39', '???? ??????', 'ILS', '-270.01', '-270.01', NULL, '11', '2'),
 ('276', '204', '3', '1', '279', '', '0', '0', '0', '2014-07-12 02:07:39', '2014-07-12 02:44:39', '???? ??????', 'ILS', '41.19', '41.19', NULL, '11', '3'),
 ('277', '205', '100', '1', '280', '', '0', '0', '0', '2014-07-12 16:07:17', '2014-07-12 16:48:17', '????? ????? ??\"?', 'ILS', '15000.00', '15000.00', NULL, '1', '1'),
 ('278', '205', '101084', '1', '280', '', '0', '0', '0', '2014-07-12 16:07:17', '2014-07-12 16:48:17', '????? ????? ??\"?', 'ILS', '-17700.00', '-17700.00', NULL, '1', '2'),
 ('279', '205', '3', '1', '280', '', '0', '0', '0', '2014-07-12 16:07:17', '2014-07-12 16:48:17', '????? ????? ??\"?', 'ILS', '2700.00', '2700.00', NULL, '1', '3'),
 ('280', '206', '114', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-12 18:31:17', '????? ????', 'ILS', '100.00', '100.00', NULL, '1', '1'),
 ('281', '206', '150', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-12 18:31:17', '????? ????', 'ILS', '-100.00', '-100.00', NULL, '1', '2'),
 ('282', '207', '114', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-12 18:31:23', '????? ????', 'ILS', '100.00', '100.00', NULL, '1', '1'),
 ('283', '207', '150', '5', '', '', '0', '0', '0', '1970-01-01 02:01:00', '2014-07-12 18:31:23', '????? ????', 'ILS', '-100.00', '-100.00', NULL, '1', '2'),
 ('284', '208', '100', '1', '281', '', '0', '0', '0', '2014-07-12 18:07:21', '2014-07-12 18:32:21', '???? ??????', 'ILS', '391.50', '391.50', NULL, '11', '1'),
 ('285', '208', '100', '1', '281', '', '0', '0', '0', '2014-07-12 18:07:21', '2014-07-12 18:32:21', '???? ??????', 'ILS', '1206.00', '1206.00', NULL, '11', '2'),
 ('286', '208', '101082', '1', '281', '', '0', '0', '0', '2014-07-12 18:07:21', '2014-07-12 18:32:21', '???? ??????', 'ILS', '-1885.05', '-1885.05', NULL, '11', '3'),
 ('287', '208', '3', '1', '281', '', '0', '0', '0', '2014-07-12 18:07:21', '2014-07-12 18:32:21', '???? ??????', 'ILS', '287.55', '287.55', NULL, '11', '4'),
 ('288', '209', '100', '1', '282', '', '0', '0', '0', '2014-07-12 18:07:50', '2014-07-12 18:46:50', '????? ????? ??\"?', 'ILS', '670.00', '670.00', NULL, '11', '1'),
 ('289', '209', '100', '1', '282', '', '0', '0', '0', '2014-07-12 18:07:50', '2014-07-12 18:46:50', '????? ????? ??\"?', 'ILS', '135.00', '135.00', NULL, '11', '2'),
 ('290', '209', '100', '1', '282', '', '0', '0', '0', '2014-07-12 18:07:50', '2014-07-12 18:46:50', '????? ????? ??\"?', 'ILS', '435.00', '435.00', NULL, '11', '3'),
 ('291', '209', '101084', '1', '282', '', '0', '0', '0', '2014-07-12 18:07:50', '2014-07-12 18:46:50', '????? ????? ??\"?', 'ILS', '-1463.20', '-1463.20', NULL, '11', '4'),
 ('292', '209', '3', '1', '282', '', '0', '0', '0', '2014-07-12 18:07:50', '2014-07-12 18:46:50', '????? ????? ??\"?', 'ILS', '223.20', '223.20', NULL, '11', '5'),
 ('293', '210', '100', '1', '283', '', '0', '0', '0', '2014-07-12 18:07:55', '2014-07-12 18:51:55', '???? ????? ??\"?', 'ILS', '670.00', '670.00', NULL, '11', '1'),
 ('294', '210', '101081', '1', '283', '', '0', '0', '0', '2014-07-12 18:07:55', '2014-07-12 18:51:55', '???? ????? ??\"?', 'ILS', '-790.60', '-790.60', NULL, '11', '2'),
 ('295', '210', '3', '1', '283', '', '0', '0', '0', '2014-07-12 18:07:55', '2014-07-12 18:51:55', '???? ????? ??\"?', 'ILS', '120.60', '120.60', NULL, '11', '3'),
 ('296', '211', '17', '5', '287', '', '0', '0', '0', '2014-07-13 08:07:27', '2014-07-13 08:54:27', '', 'ILS', '670.00', '670.00', NULL, '11', '1'),
 ('297', '211', '101086', '5', '287', '', '0', '0', '0', '2014-07-13 08:07:27', '2014-07-13 08:54:27', '', 'ILS', '-790.60', '-790.60', NULL, '11', '2'),
 ('298', '211', '1', '5', '287', '', '0', '0', '0', '2014-07-13 08:07:27', '2014-07-13 08:54:27', '', 'ILS', '120.60', '120.60', NULL, '11', '3'),
 ('299', '212', '6', '5', '288', '', '0', '0', '0', '2014-07-13 08:07:11', '2014-07-13 08:56:11', '', 'ILS', '135.00', '135.00', NULL, '11', '1'),
 ('300', '212', '114', '5', '288', '', '0', '0', '0', '2014-07-13 08:07:11', '2014-07-13 08:56:12', '', 'ILS', '-159.30', '-159.30', NULL, '11', '2'),
 ('301', '212', '2', '5', '288', '', '0', '0', '0', '2014-07-13 08:07:11', '2014-07-13 08:56:12', '', 'ILS', '24.30', '24.30', NULL, '11', '3'),
 ('302', '213', '17', '5', '289', '', '0', '0', '0', '2014-07-13 09:07:31', '2014-07-13 09:01:31', '', 'ILS', '8700.00', '8700.00', NULL, '11', '1'),
 ('303', '213', '17', '5', '289', '', '0', '0', '0', '2014-07-13 09:07:31', '2014-07-13 09:01:31', '', 'ILS', '10050.00', '10050.00', NULL, '11', '2'),
 ('304', '213', '101086', '5', '289', '', '0', '0', '0', '2014-07-13 09:07:31', '2014-07-13 09:01:31', '', 'ILS', '-22125.00', '-22125.00', NULL, '11', '3'),
 ('305', '213', '1', '5', '289', '', '0', '0', '0', '2014-07-13 09:07:31', '2014-07-13 09:01:31', '', 'ILS', '3375.00', '3375.00', NULL, '11', '4'),
 ('306', '214', '100', '1', '292', '', '0', '0', '0', '2014-07-08 09:07:01', '2014-07-13 09:48:01', '???? ???? ?????? ????? ??\"?', 'ILS', '3240.00', '3240.00', NULL, '11', '1'),
 ('307', '214', '101087', '1', '292', '', '0', '0', '0', '2014-07-08 09:07:01', '2014-07-13 09:48:01', '???? ???? ?????? ????? ??\"?', 'ILS', '-3823.20', '-3823.20', NULL, '11', '2'),
 ('308', '214', '3', '1', '292', '', '0', '0', '0', '2014-07-08 09:07:01', '2014-07-13 09:48:01', '???? ???? ?????? ????? ??\"?', 'ILS', '583.20', '583.20', NULL, '11', '3'),
 ('309', '215', '100', '1', '295', '', '0', '0', '0', '2013-07-13 13:07:01', '2014-07-13 13:44:01', '???? ???? ?????? ????? ??\"?', 'ILS', '29145.00', '29145.00', NULL, '11', '1'),
 ('310', '215', '101087', '1', '295', '', '0', '0', '0', '2013-07-13 13:07:01', '2014-07-13 13:44:01', '???? ???? ?????? ????? ??\"?', 'ILS', '-34391.10', '-34391.10', NULL, '11', '2'),
 ('311', '215', '3', '1', '295', '', '0', '0', '0', '2013-07-13 13:07:01', '2014-07-13 13:44:01', '???? ???? ?????? ????? ??\"?', 'ILS', '5246.10', '5246.10', NULL, '11', '3'),
 ('312', '216', '100', '1', '296', '', '0', '0', '0', '2013-07-13 13:07:39', '2014-07-13 13:44:40', '???? ??????', 'ILS', '14790.00', '14790.00', NULL, '11', '1'),
 ('313', '216', '101082', '1', '296', '', '0', '0', '0', '2013-07-13 13:07:39', '2014-07-13 13:44:40', '???? ??????', 'ILS', '-17452.20', '-17452.20', NULL, '11', '2'),
 ('314', '216', '3', '1', '296', '', '0', '0', '0', '2013-07-13 13:07:39', '2014-07-13 13:44:40', '???? ??????', 'ILS', '2662.20', '2662.20', NULL, '11', '3'),
 ('315', '217', '17', '5', '297', '', '0', '0', '0', '2013-07-13 13:07:33', '2014-07-13 13:45:33', '', 'ILS', '15660.00', '15660.00', NULL, '11', '1'),
 ('316', '217', '101086', '5', '297', '', '0', '0', '0', '2013-07-13 13:07:33', '2014-07-13 13:45:33', '', 'ILS', '-18478.80', '-18478.80', NULL, '11', '2'),
 ('317', '217', '1', '5', '297', '', '0', '0', '0', '2013-07-13 13:07:33', '2014-07-13 13:45:33', '', 'ILS', '2818.80', '2818.80', NULL, '11', '3'),
 ('318', '218', '100', '1', '302', '', '0', '0', '0', '2014-07-16 19:07:23', '2014-07-16 19:16:23', '???? ?? ??\"?', 'ILS', '2600.00', '2600.00', NULL, '1', '1'),
 ('319', '218', '100', '1', '302', '', '0', '0', '0', '2014-07-16 19:07:23', '2014-07-16 19:16:23', '???? ?? ??\"?', 'ILS', '500.00', '500.00', NULL, '1', '2'),
 ('320', '218', '101088', '1', '302', '', '6', '0', '0', '2014-07-16 19:07:23', '2014-07-20 16:59:56', '???? ?? ??\"?', 'ILS', '-3658.00', '-3658.00', NULL, '1', '3'),
 ('321', '218', '3', '1', '302', '', '0', '0', '0', '2014-07-16 19:07:23', '2014-07-16 19:16:23', '???? ?? ??\"?', 'ILS', '558.00', '558.00', NULL, '1', '4'),
 ('322', '219', '101088', '3', '303', '', '6', '1', '0', '2014-07-16 19:07:23', '2014-07-20 16:59:56', '???? ?? ??\"?', 'ILS', '3658.00', '3658.00', NULL, '1', '1'),
 ('323', '219', '0', '3', '303', '', '0', '0', '0', '2014-07-17 09:27:32', '2014-07-16 19:18:23', '???? ?? ??\"?', 'ILS', '-3658.00', '-3658.00', NULL, '1', '2'),
 ('324', '220', '100', '18', '305', '', '0', '0', '0', '2014-07-16 21:07:11', '2014-07-16 21:21:11', '???? ?? ??\"?', 'ILS', '435.00', '435.00', NULL, '1', '1'),
 ('325', '220', '101088', '18', '305', '', '6', '0', '0', '2014-07-16 21:07:11', '2014-07-20 16:59:56', '???? ?? ??\"?', 'ILS', '-513.30', '-513.30', NULL, '1', '2'),
 ('326', '220', '3', '18', '305', '', '0', '0', '0', '2014-07-16 21:07:11', '2014-07-16 21:21:11', '???? ?? ??\"?', 'ILS', '78.30', '78.30', NULL, '1', '3'),
 ('327', '220', '101088', '18', '305', '', '6', '1', '0', '2014-07-16 21:07:11', '2014-07-20 16:59:56', '???? ?? ??\"?', 'ILS', '513.30', '513.30', NULL, '1', '4'),
 ('328', '220', '10', '18', '305', '', '0', '0', '0', '2014-07-16 21:07:11', '2014-07-16 21:21:11', '???? ?? ??\"?', 'ILS', '-513.30', '-513.30', NULL, '1', '5'),
 ('343', '222', '150', '0', '', '321', '0', '0', '0', '2014-07-17 19:11:44', '2014-07-17 19:11:44', '????? ???????', 'ILS', '3.00', '3.00', NULL, '1', '1'),
 ('344', '222', '150', '0', '', '321', '0', '0', '0', '2014-07-17 19:11:44', '2014-07-17 19:11:44', '????? ???????', 'ILS', '-3.00', '-3.00', NULL, '1', '2'),
 ('345', '223', '101081', '3', '306', '', '0', '0', '0', '2014-07-21 20:07:03', '2014-07-21 20:09:03', '???? ????? ??\"?', 'ILS', '500.00', '500.00', NULL, '1', '1'),
 ('346', '223', '10', '3', '306', '', '0', '0', '0', '2014-07-21 20:07:03', '2014-07-21 20:09:03', '???? ????? ??\"?', 'ILS', '-500.00', '-500.00', NULL, '1', '2'),
 ('347', '224', '101081', '3', '307', '', '0', '0', '0', '2014-07-21 20:07:36', '2014-07-21 20:09:37', '???? ????? ??\"?', 'ILS', '500.00', '500.00', NULL, '1', '1'),
 ('348', '224', '11', '3', '307', '', '0', '0', '0', '2014-07-21 20:07:36', '2014-07-21 20:09:37', '???? ????? ??\"?', 'ILS', '-500.00', '-500.00', NULL, '1', '2'),
 ('349', '225', '101081', '3', '308', '', '0', '0', '0', '2014-07-21 20:07:22', '2014-07-21 20:11:22', '???? ????? ??\"?', 'ILS', '500.00', '500.00', NULL, '1', '1'),
 ('350', '225', '11', '3', '308', '', '0', '0', '0', '2014-07-21 20:07:22', '2014-07-21 20:11:22', '???? ????? ??\"?', 'ILS', '-500.00', '-500.00', NULL, '1', '2'),
 ('351', '226', '101068', '3', '309', '', '0', '0', '0', '2014-07-22 15:07:06', '2014-07-22 18:07:06', '', 'ILS', '0.00', '0.00', NULL, '1', '1'),
 ('352', '226', '11', '3', '309', '', '0', '0', '0', '2014-07-22 15:07:06', '2014-07-22 18:07:06', '', 'ILS', '0.00', '0.00', NULL, '1', '2'),
 ('353', '227', '101082', '3', '310', '', '0', '0', '0', '2014-07-22 18:07:07', '2014-07-22 18:12:07', '???? ??????', 'ILS', '0.00', '0.00', NULL, '1', '1'),
 ('354', '227', '11', '3', '310', '', '0', '0', '0', '2014-07-22 18:07:07', '2014-07-22 18:12:07', '???? ??????', 'ILS', '0.00', '0.00', NULL, '1', '2'),
 ('355', '228', '101082', '3', '311', '', '0', '0', '0', '2014-07-22 18:07:37', '2014-07-22 18:13:37', '???? ??????', 'ILS', '100.00', '100.00', NULL, '1', '1'),
 ('356', '228', '11', '3', '311', '', '0', '0', '0', '2014-07-22 18:07:37', '2014-07-22 18:13:37', '???? ??????', 'ILS', '-100.00', '-100.00', NULL, '1', '2'),
 ('357', '229', '101081', '3', '312', '', '0', '0', '0', '2014-07-22 18:07:17', '2014-07-22 18:16:17', '???? ????? ??\"?', 'ILS', '100.00', '100.00', NULL, '1', '1'),
 ('358', '229', '11', '3', '312', '', '0', '0', '0', '2014-07-22 18:07:17', '2014-07-22 18:16:17', '???? ????? ??\"?', 'ILS', '-100.00', '-100.00', NULL, '1', '2'),
 ('359', '230', '101088', '3', '313', '', '0', '0', '0', '2014-07-22 18:07:03', '2014-07-22 18:17:03', '???? ?? ??\"?', 'ILS', '111.00', '111.00', NULL, '1', '1'),
 ('360', '230', '11', '3', '313', '', '0', '0', '0', '2014-07-22 18:07:03', '2014-07-22 18:17:03', '???? ?? ??\"?', 'ILS', '-111.00', '-111.00', NULL, '1', '2'),
 ('361', '231', '101081', '3', '314', '', '0', '0', '0', '2014-07-23 13:07:07', '2014-07-23 13:44:07', '???? ????? ??\"?', 'ILS', '3.00', '3.00', NULL, '1', '1'),
 ('362', '231', '10', '3', '314', '', '0', '0', '0', '2014-07-23 13:07:07', '2014-07-23 13:44:07', '???? ????? ??\"?', 'ILS', '-3.00', '-3.00', NULL, '1', '2'),
 ('363', '232', '101082', '3', '315', '', '0', '0', '0', '2014-07-23 13:07:32', '2014-07-23 13:47:32', '???? ??????', 'ILS', '3211.00', '3211.00', NULL, '1', '1'),
 ('364', '232', '11', '3', '315', '', '0', '0', '0', '2014-07-23 13:07:32', '2014-07-23 13:47:32', '???? ??????', 'ILS', '-3211.00', '-3211.00', NULL, '1', '2'),
 ('365', '233', '101084', '3', '316', '', '0', '0', '0', '2014-07-23 15:07:53', '2014-07-23 15:02:53', '????? ????? ??\"?', 'ILS', '222.00', '222.00', NULL, '1', '1'),
 ('366', '233', '11', '3', '316', '', '0', '0', '0', '2014-07-23 15:07:53', '2014-07-23 15:02:53', '????? ????? ??\"?', 'ILS', '-222.00', '-222.00', NULL, '1', '2'),
 ('367', '234', '101081', '3', '317', '', '0', '0', '0', '2014-07-23 15:07:09', '2014-07-23 15:03:09', '???? ????? ??\"?', 'ILS', '232.00', '232.00', NULL, '1', '1'),
 ('368', '234', '11', '3', '317', '', '0', '0', '0', '2014-07-23 15:07:09', '2014-07-23 15:03:09', '???? ????? ??\"?', 'ILS', '-232.00', '-232.00', NULL, '1', '2'),
 ('369', '235', '101084', '3', '318', '', '0', '0', '0', '2014-07-23 15:07:44', '2014-07-23 15:04:44', '????? ????? ??\"?', 'ILS', '232.00', '232.00', NULL, '1', '1'),
 ('370', '235', '11', '3', '318', '', '0', '0', '0', '2014-07-23 15:07:44', '2014-07-23 15:04:44', '????? ????? ??\"?', 'ILS', '-232.00', '-232.00', NULL, '1', '2'),
 ('371', '236', '101081', '3', '319', '', '0', '0', '0', '2014-07-23 15:07:32', '2014-07-23 15:08:32', '???? ????? ??\"?', 'ILS', '0.00', '0.00', NULL, '1', '1'),
 ('372', '236', '11', '3', '319', '', '0', '0', '0', '2014-07-23 15:07:32', '2014-07-23 15:08:32', '???? ????? ??\"?', 'ILS', '0.00', '0.00', NULL, '1', '2'),
 ('373', '237', '101084', '3', '320', '', '0', '0', '0', '2014-07-23 15:07:15', '2014-07-23 15:41:15', '????? ????? ??\"?', 'ILS', '357.00', '357.00', NULL, '1', '1'),
 ('374', '237', '11', '3', '320', '', '0', '0', '0', '2014-07-23 15:07:15', '2014-07-23 15:41:15', '????? ????? ??\"?', 'ILS', '-357.00', '-357.00', NULL, '1', '2'),
 ('375', '238', '101081', '3', '321', '', '0', '0', '0', '2014-07-23 15:07:48', '2014-07-23 15:57:48', '???? ????? ??\"?', 'ILS', '333.00', '333.00', NULL, '1', '1'),
 ('376', '238', '11', '3', '321', '', '0', '0', '0', '2014-07-23 15:07:48', '2014-07-23 15:57:48', '???? ????? ??\"?', 'ILS', '-333.00', '-333.00', NULL, '1', '2'),
 ('377', '239', '101081', '3', '322', '', '0', '0', '0', '2014-07-23 15:07:09', '2014-07-23 15:58:09', '???? ????? ??\"?', 'ILS', '555.00', '555.00', NULL, '1', '1'),
 ('378', '239', '11', '3', '322', '', '0', '0', '0', '2014-07-23 15:07:09', '2014-07-23 15:58:09', '???? ????? ??\"?', 'ILS', '-555.00', '-555.00', NULL, '1', '2'),
 ('379', '240', '101082', '3', '323', '', '0', '0', '0', '2014-07-23 16:07:02', '2014-07-23 16:13:02', '???? ??????', 'ILS', '123.00', '123.00', NULL, '1', '1'),
 ('380', '240', '11', '3', '323', '', '0', '0', '0', '2014-07-23 16:07:02', '2014-07-23 16:13:02', '???? ??????', 'ILS', '-123.00', '-123.00', NULL, '1', '2'),
 ('381', '241', '101081', '3', '324', '', '0', '0', '0', '2014-07-23 16:07:12', '2014-07-23 16:15:12', '???? ????? ??\"?', 'ILS', '741.00', '741.00', NULL, '1', '1'),
 ('382', '241', '11', '3', '324', '', '0', '0', '0', '2014-07-23 16:07:12', '2014-07-23 16:15:12', '???? ????? ??\"?', 'ILS', '-741.00', '-741.00', NULL, '1', '2'),
 ('383', '242', '101088', '3', '325', '', '0', '0', '0', '2014-07-23 19:07:09', '2014-07-23 19:40:09', '???? ?? ??\"?', 'ILS', '3333.00', '3333.00', NULL, '1', '1'),
 ('384', '242', '10', '3', '325', '', '0', '0', '0', '2014-07-23 19:07:09', '2014-07-23 19:40:09', '???? ?? ??\"?', 'ILS', '-3333.00', '-3333.00', NULL, '1', '2'),
 ('385', '243', '101081', '3', '326', '', '0', '0', '0', '2014-07-23 19:07:19', '2014-07-23 19:50:19', '???? ????? ??\"?', 'ILS', '111.00', '111.00', NULL, '1', '1'),
 ('386', '243', '10', '3', '326', '', '0', '0', '0', '2014-07-23 19:07:19', '2014-07-23 19:50:19', '???? ????? ??\"?', 'ILS', '-111.00', '-111.00', NULL, '1', '2'),
 ('387', '244', '101081', '3', '327', '', '0', '0', '0', '2014-07-23 19:07:14', '2014-07-23 19:51:14', '???? ????? ??\"?', 'ILS', '357.00', '357.00', NULL, '1', '1'),
 ('388', '244', '11', '3', '327', '', '0', '0', '0', '2014-07-23 19:07:14', '2014-07-23 19:51:14', '???? ????? ??\"?', 'ILS', '-357.00', '-357.00', NULL, '1', '2'),
 ('389', '245', '101082', '3', '328', '', '0', '0', '0', '2014-07-24 09:07:15', '2014-07-24 09:06:15', '???? ??????', 'ILS', '1000.00', '1000.00', NULL, '1', '1'),
 ('390', '245', '11', '3', '328', '', '0', '0', '0', '2014-07-24 09:07:15', '2014-07-24 09:06:15', '???? ??????', 'ILS', '-1000.00', '-1000.00', NULL, '1', '2'),
 ('391', '246', '101087', '3', '329', '', '0', '0', '0', '2014-07-24 09:07:31', '2014-07-24 09:52:31', '???? ???? ?????? ????? ??\"?', 'ILS', '100.00', '100.00', NULL, '1', '1'),
 ('392', '246', '11', '3', '329', '', '0', '0', '0', '2014-07-24 09:07:31', '2014-07-24 09:52:31', '???? ???? ?????? ????? ??\"?', 'ILS', '-100.00', '-100.00', NULL, '1', '2');



--
-- Structure for table `qwe_userIncomeMap`
--

DROP TABLE IF EXISTS `qwe_userIncomeMap`;

CREATE TABLE `qwe_userIncomeMap` (
  `user_id` int(11) NOT NULL,
  `itemVatCat_id` int(11) NOT NULL,
  `account_id` int(11) unsigned NOT NULL,
  KEY `itemVatCat_id` (`itemVatCat_id`),
  KEY `account_id` (`account_id`),
KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `qwe_userIncomeMap`
--

INSERT INTO `qwe_userIncomeMap` (`user_id`, `itemVatCat_id`, `account_id`) VALUES
 ('1', '1', '100'),
 ('1', '2', '100'),
 ('1', '10', '100'),
 ('8', '1', '100'),
 ('9', '1', '100'),
 ('10', '1', '100'),
 ('10', '2', '100'),
 ('10', '10', '100'),
 ('8', '2', '100'),
 ('8', '10', '100'),
 ('9', '13', '100'),
 ('11', '1', '100'),
 ('11', '2', '100'),
 ('11', '10', '100');



--
-- Structure for table `sessionStore`
--

DROP TABLE IF EXISTS `sessionStore`;

CREATE TABLE `sessionStore` (
  `id` char(32) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` longblob,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `sessionStore`
--

INSERT INTO `sessionStore` (`id`, `expire`, `data`) VALUES
 ('6iprhfmteq2l64ajks7kdm6n32', '1403424306', 'b20979009676c0fb35576d0496bbeff6Company|i:1;b20979009676c0fb35576d0496bbeff6__returnUrl|s:8:\"/linet3/\";b20979009676c0fb35576d0496bbeff6__id|s:1:\"1\";b20979009676c0fb35576d0496bbeff6__name|s:5:\"admin\";b20979009676c0fb35576d0496bbeff6certpasswd|s:6:\"qwe123\";b20979009676c0fb35576d0496bbeff6language|s:5:\"he_il\";b20979009676c0fb35576d0496bbeff6timezone|s:14:\"Asia/Jerusalem\";b20979009676c0fb35576d0496bbeff6theme|s:0:\"\";b20979009676c0fb35576d0496bbeff6fname|s:6:\"ארי\";b20979009676c0fb35576d0496bbeff6lname|s:11:\"בן חור\";b20979009676c0fb35576d0496bbeff6username|s:5:\"admin\";b20979009676c0fb35576d0496bbeff6warehouse|i:117;b20979009676c0fb35576d0496bbeff6__states|a:8:{s:10:\"certpasswd\";b:1;s:8:\"language\";b:1;s:8:\"timezone\";b:1;s:5:\"theme\";b:1;s:5:\"fname\";b:1;s:5:\"lname\";b:1;s:8:\"username\";b:1;s:9:\"warehouse\";b:1;}b20979009676c0fb35576d0496bbeff6Rights_isSuperuser|b:1;b20979009676c0fb35576d0496bbeff6OrgDatabase|a:2:{s:6:\"string\";s:37:\"mysql:host=localhost;dbname=linetmain\";s:6:\"prefix\";s:0:\"\";}b20979009676c0fb35576d0496bbeff6menu|a:10:{i:1;a:3:{s:5:\"label\";s:12:\"הגדרות\";s:4:\"icon\";s:23:\"glyphicon glyphicon-cog\";s:5:\"items\";a:11:{i:0;a:3:{s:5:\"label\";s:24:\"פרטי בית העסק\";s:3:\"url\";s:42:\"http://172.22.102.44/linet3/settings/admin\";s:4:\"icon\";N;}i:1;a:3:{s:5:\"label\";s:30:\"תנועת יומן ידנית\";s:3:\"url\";s:46:\"http://172.22.102.44/linet3/transaction/create\";s:4:\"icon\";N;}i:2;a:3:{s:5:\"label\";s:25:\"מסמכים עסקיים\";s:3:\"url\";s:41:\"http://172.22.102.44/linet3/doctype/admin\";s:4:\"icon\";N;}i:3;a:3:{s:5:\"label\";s:23:\"שדות מותאמים\";s:3:\"url\";s:43:\"http://172.22.102.44/linet3/eavFields/admin\";s:4:\"icon\";N;}i:4;a:3:{s:5:\"label\";s:15:\"שער מטבע\";s:3:\"url\";s:42:\"http://172.22.102.44/linet3/currates/admin\";s:4:\"icon\";N;}i:5;a:3:{s:5:\"label\";s:23:\"פתיחת מאזנים\";s:3:\"url\";s:51:\"http://172.22.102.44/linet3/transaction/openbalance\";s:4:\"icon\";N;}i:6;a:3:{s:5:\"label\";s:15:\"פרטי קשר\";s:3:\"url\";s:36:\"http://172.22.102.44/linet3/rm/admin\";s:4:\"icon\";N;}i:7;a:3:{s:5:\"label\";s:34:\"קטגורית מס לפריטים\";s:3:\"url\";s:44:\"http://172.22.102.44/linet3/ItemVatCat/admin\";s:4:\"icon\";N;}i:8;a:3:{s:5:\"label\";s:21:\"נהל משתמשים\";s:3:\"url\";s:39:\"http://172.22.102.44/linet3/users/admin\";s:4:\"icon\";N;}i:9;a:3:{s:5:\"label\";s:19:\"נהל קבוצות\";s:3:\"url\";s:49:\"http://172.22.102.44/linet3/rights/authItem/roles\";s:4:\"icon\";N;}i:10;a:3:{s:5:\"label\";s:17:\"Manage Permissons\";s:3:\"url\";s:55:\"http://172.22.102.44/linet3/rights/authItem/permissions\";s:4:\"icon\";N;}}}i:12;a:3:{s:5:\"label\";s:14:\"חשבונות\";s:4:\"icon\";s:31:\"glyphicon glyphicon-folder-open\";s:5:\"items\";a:3:{i:0;a:3:{s:5:\"label\";s:14:\"חשבונות\";s:3:\"url\";s:42:\"http://172.22.102.44/linet3/accounts/index\";s:4:\"icon\";N;}i:1;a:3:{s:5:\"label\";s:21:\"תבנית חשבון\";s:3:\"url\";s:45:\"http://172.22.102.44/linet3/accTemplate/admin\";s:4:\"icon\";N;}i:2;a:3:{s:5:\"label\";s:17:\"סוג חשבון\";s:3:\"url\";s:41:\"http://172.22.102.44/linet3/acctype/admin\";s:4:\"icon\";s:0:\"\";}}}i:16;a:3:{s:5:\"label\";s:8:\"מלאי\";s:4:\"icon\";s:23:\"glyphicon glyphicon-tag\";s:5:\"items\";a:7:{i:0;a:3:{s:5:\"label\";s:12:\"פריטים\";s:3:\"url\";s:38:\"http://172.22.102.44/linet3/item/admin\";s:4:\"icon\";N;}i:1;a:3:{s:5:\"label\";s:12:\"מחסנים\";s:3:\"url\";s:44:\"http://172.22.102.44/linet3/accounts/index/8\";s:4:\"icon\";s:7:\"type=>8\";}i:2;a:3:{s:5:\"label\";s:16:\"קטגוריות\";s:3:\"url\";s:46:\"http://172.22.102.44/linet3/itemcategory/admin\";s:4:\"icon\";N;}i:3;a:3:{s:5:\"label\";s:12:\"יחידות\";s:3:\"url\";s:42:\"http://172.22.102.44/linet3/itemunit/admin\";s:4:\"icon\";N;}i:4;a:3:{s:5:\"label\";s:19:\"תבנית פריט\";s:3:\"url\";s:40:\"http://172.22.102.44/linet3/items/report\";s:4:\"icon\";N;}i:5;a:3:{s:5:\"label\";s:17:\"הזמנת רכש\";s:3:\"url\";s:42:\"http://172.22.102.44/linet3/docs/create/10\";s:4:\"icon\";N;}i:6;a:3:{s:5:\"label\";s:21:\"Warehouse transaction\";s:3:\"url\";s:42:\"http://172.22.102.44/linet3/docs/create/15\";s:4:\"icon\";N;}}}i:22;a:3:{s:5:\"label\";s:12:\"הכנסות\";s:4:\"icon\";s:29:\"glyphicon glyphicon-thumbs-up\";s:5:\"items\";a:9:{i:0;a:3:{s:5:\"label\";s:23:\"חשבונית עסקה\";s:3:\"url\";s:41:\"http://172.22.102.44/linet3/docs/create/1\";s:4:\"icon\";s:7:\"type=>1\";}i:1;a:3:{s:5:\"label\";s:21:\"תעודת משלוח\";s:3:\"url\";s:41:\"http://172.22.102.44/linet3/docs/create/2\";s:4:\"icon\";s:7:\"type=>2\";}i:2;a:3:{s:5:\"label\";s:19:\"חשבונית מס\";s:3:\"url\";s:41:\"http://172.22.102.44/linet3/docs/create/3\";s:4:\"icon\";s:7:\"type=>3\";}i:3;a:3:{s:5:\"label\";s:25:\"חשבונית זיכוי\";s:3:\"url\";s:41:\"http://172.22.102.44/linet3/docs/create/4\";s:4:\"icon\";s:7:\"type=>4\";}i:4;a:3:{s:5:\"label\";s:21:\"תעודת החזרה\";s:3:\"url\";s:41:\"http://172.22.102.44/linet3/docs/create/5\";s:4:\"icon\";s:7:\"type=>5\";}i:5;a:3:{s:5:\"label\";s:17:\"הצעת מחיר\";s:3:\"url\";s:41:\"http://172.22.102.44/linet3/docs/create/6\";s:4:\"icon\";s:7:\"type=>6\";}i:6;a:3:{s:5:\"label\";s:23:\"הזמנת מכירות\";s:3:\"url\";s:41:\"http://172.22.102.44/linet3/docs/create/7\";s:4:\"icon\";s:7:\"type=>7\";}i:7;a:3:{s:5:\"label\";s:28:\"חשבונית מס קבלה\";s:3:\"url\";s:41:\"http://172.22.102.44/linet3/docs/create/9\";s:4:\"icon\";s:7:\"type=>9\";}i:8;a:3:{s:5:\"label\";s:23:\"הדפסת מסמכים\";s:3:\"url\";s:38:\"http://172.22.102.44/linet3/docs/admin\";s:4:\"icon\";N;}}}i:32;a:3:{s:5:\"label\";s:12:\"הוצאות\";s:4:\"icon\";s:33:\"glyphicon glyphicon-shopping-cart\";s:5:\"items\";a:3:{i:0;a:3:{s:5:\"label\";s:17:\"נהל ספקים\";s:3:\"url\";s:44:\"http://172.22.102.44/linet3/accounts/index/1\";s:4:\"icon\";s:7:\"type=>1\";}i:1;a:3:{s:5:\"label\";s:32:\"קליטת הוצאה עסקית\";s:3:\"url\";s:42:\"http://172.22.102.44/linet3/docs/create/13\";s:4:\"icon\";N;}i:2;a:3:{s:5:\"label\";s:28:\"קליטת רכוש קבוע\";s:3:\"url\";s:42:\"http://172.22.102.44/linet3/docs/create/14\";s:4:\"icon\";N;}}}i:37;a:3:{s:5:\"label\";s:8:\"קופה\";s:4:\"icon\";s:23:\"glyphicon glyphicon-usd\";s:5:\"items\";a:5:{i:0;a:3:{s:5:\"label\";s:8:\"קבלה\";s:3:\"url\";s:41:\"http://172.22.102.44/linet3/docs/create/8\";s:4:\"icon\";N;}i:1;a:3:{s:5:\"label\";s:19:\"הפקדות בנק\";s:3:\"url\";s:46:\"http://172.22.102.44/linet3/deposit&amp;type=2\";s:4:\"icon\";N;}i:2;a:3:{s:5:\"label\";s:10:\"תשלום\";s:3:\"url\";s:42:\"http://172.22.102.44/linet3/outcome/create\";s:4:\"icon\";N;}i:3;a:3:{s:5:\"label\";s:18:\"תשלום מע\"מ\";s:3:\"url\";s:44:\"http://172.22.102.44/linet3/outcome/create/1\";s:4:\"icon\";s:7:\"type=>1\";}i:4;a:3:{s:5:\"label\";s:32:\"תשלום ביטוח לאומי\";s:3:\"url\";s:44:\"http://172.22.102.44/linet3/outcome/create/2\";s:4:\"icon\";s:7:\"type=>2\";}}}i:43;a:3:{s:5:\"label\";s:12:\"התאמות\";s:4:\"icon\";s:28:\"glyphicon glyphicon-eye-open\";s:5:\"items\";a:5:{i:0;a:3:{s:5:\"label\";s:35:\"ייבוא דפי חשבון בנק\";s:3:\"url\";s:42:\"http://172.22.102.44/linet3/bankbook/admin\";s:4:\"icon\";N;}i:1;a:3:{s:5:\"label\";s:21:\"התאמת בנקים\";s:3:\"url\";s:45:\"http://172.22.102.44/linet3/bankbook/extmatch\";s:4:\"icon\";N;}i:2;a:3:{s:5:\"label\";s:26:\"הצג התאמות בנק\";s:3:\"url\";s:38:\"http://172.22.102.44/linet3/edispmatch\";s:4:\"icon\";N;}i:3;a:3:{s:5:\"label\";s:25:\"התאמת חשבונות\";s:3:\"url\";s:36:\"http://172.22.102.44/linet3/intmatch\";s:4:\"icon\";N;}i:4;a:3:{s:5:\"label\";s:19:\"הצג התאמות\";s:3:\"url\";s:37:\"http://172.22.102.44/linet3/dispmatch\";s:4:\"icon\";N;}}}i:49;a:3:{s:5:\"label\";s:10:\"דוחות\";s:4:\"icon\";s:25:\"glyphicon glyphicon-stats\";s:5:\"items\";a:8:{i:0;a:3:{s:5:\"label\";s:28:\"הצג תנועות יומן\";s:3:\"url\";s:43:\"http://172.22.102.44/linet3/reports/journal\";s:4:\"icon\";N;}i:1;a:3:{s:5:\"label\";s:15:\"חוב לקוח\";s:3:\"url\";s:39:\"http://172.22.102.44/linet3/reports/owe\";s:4:\"icon\";N;}i:2;a:3:{s:5:\"label\";s:17:\"רווח הפסד\";s:3:\"url\";s:44:\"http://172.22.102.44/linet3/reports/profloss\";s:4:\"icon\";N;}i:3;a:3:{s:5:\"label\";s:36:\"דוח רווח -הפסד חודשי\";s:3:\"url\";s:45:\"http://172.22.102.44/linet3/reports/mprofloss\";s:4:\"icon\";N;}i:4;a:3:{s:5:\"label\";s:18:\"חישוב מע\"מ\";s:3:\"url\";s:39:\"http://172.22.102.44/linet3/reports/vat\";s:4:\"icon\";N;}i:5;a:3:{s:5:\"label\";s:8:\"מאזן\";s:3:\"url\";s:43:\"http://172.22.102.44/linet3/reports/balance\";s:4:\"icon\";N;}i:6;a:3:{s:5:\"label\";s:28:\"מקדמות מס הכנסה\";s:3:\"url\";s:42:\"http://172.22.102.44/linet3/reports/taxrep\";s:4:\"icon\";N;}i:7;a:3:{s:5:\"label\";s:17:\"Stock transaction\";s:3:\"url\";s:47:\"http://172.22.102.44/linet3/reports/stockAction\";s:4:\"icon\";N;}}}i:57;a:3:{s:5:\"label\";s:19:\"ייבוא יצוא\";s:4:\"icon\";s:28:\"glyphicon glyphicon-transfer\";s:5:\"items\";a:5:{i:0;a:3:{s:5:\"label\";s:16:\"Open Format File\";s:3:\"url\";s:41:\"http://172.22.102.44/linet3/data/openfrmt\";s:4:\"icon\";N;}i:1;a:3:{s:5:\"label\";s:18:\"Import Open Format\";s:3:\"url\";s:47:\"http://172.22.102.44/linet3/data/openfrmtimport\";s:4:\"icon\";N;}i:2;a:3:{s:5:\"label\";s:19:\"גיבוי כללי\";s:3:\"url\";s:39:\"http://172.22.102.44/linet3/data/backup\";s:4:\"icon\";N;}i:3;a:3:{s:5:\"label\";s:21:\"שחזור גיבוי\";s:3:\"url\";s:40:\"http://172.22.102.44/linet3/data/restore\";s:4:\"icon\";N;}i:4;a:3:{s:5:\"label\";s:6:\"PCN874\";s:3:\"url\";s:39:\"http://172.22.102.44/linet3/data/pcn874\";s:4:\"icon\";N;}}}i:63;a:3:{s:5:\"label\";s:10:\"תמיכה\";s:4:\"icon\";s:29:\"glyphicon glyphicon-info-sign\";s:5:\"items\";a:4:{i:0;a:3:{s:5:\"label\";s:8:\"עדכן\";s:3:\"url\";s:41:\"http://172.22.102.44/linet3/module/update\";s:4:\"icon\";N;}i:1;a:3:{s:5:\"label\";s:23:\"תמיכה בתשלום\";s:3:\"url\";s:35:\"http://172.22.102.44/linet3/support\";s:4:\"icon\";N;}i:2;a:3:{s:5:\"label\";s:10:\"אודות\";s:3:\"url\";s:33:\"http://172.22.102.44/linet3/about\";s:4:\"icon\";N;}i:3;a:3:{s:5:\"label\";s:21:\"דיווח באגים\";s:3:\"url\";s:31:\"http://172.22.102.44/linet3/bag\";s:4:\"icon\";N;}}}}b20979009676c0fb35576d0496bbeff6Database|O:7:\"Company\":11:{s:19:\"\0CActiveRecord\0_new\";b:0;s:26:\"\0CActiveRecord\0_attributes\";a:3:{s:2:\"id\";s:3:\"137\";s:6:\"string\";s:37:\"mysql:host=localhost;dbname=linetmain\";s:6:\"prefix\";s:5:\"j1Wb_\";}s:23:\"\0CActiveRecord\0_related\";a:0:{}s:17:\"\0CActiveRecord\0_c\";N;s:18:\"\0CActiveRecord\0_pk\";s:3:\"137\";s:21:\"\0CActiveRecord\0_alias\";s:1:\"t\";s:15:\"\0CModel\0_errors\";a:0:{}s:19:\"\0CModel\0_validators\";N;s:17:\"\0CModel\0_scenario\";s:6:\"update\";s:14:\"\0CComponent\0_e\";N;s:14:\"\0CComponent\0_m\";N;}b20979009676c0fb35576d0496bbeff6settings|a:52:{s:19:\"company.1.warehouse\";s:3:\"117\";s:20:\"company.acc.assetvat\";s:1:\"3\";s:18:\"company.acc.buyvat\";s:1:\"1\";s:19:\"company.acc.custtax\";s:1:\"8\";s:15:\"company.acc.irs\";s:2:\"16\";s:21:\"company.acc.natinspay\";s:2:\"14\";s:23:\"company.acc.openbalance\";s:1:\"9\";s:18:\"company.acc.payvat\";s:1:\"4\";s:18:\"company.acc.pretax\";s:2:\"13\";s:19:\"company.acc.sellvat\";s:1:\"3\";s:15:\"company.address\";s:0:\"\";s:12:\"company.city\";s:0:\"\";s:11:\"company.cur\";s:3:\"ILS\";s:18:\"company.doublebook\";s:4:\"true\";s:18:\"company.en.address\";s:0:\"\";s:15:\"company.en.city\";s:0:\"\";s:15:\"company.en.name\";s:10:\"anther one\";s:11:\"company.fax\";s:0:\"\";s:12:\"company.logo\";s:0:\"\";s:12:\"company.name\";s:24:\"מחשוב מהיר 2013\";s:12:\"company.path\";s:5:\"j1Wb_\";s:16:\"company.pdfprint\";s:4:\"true\";s:13:\"company.phone\";s:0:\"\";s:10:\"company.po\";s:0:\"\";s:14:\"company.postal\";s:0:\"\";s:14:\"company.seccur\";s:0:\"\";s:13:\"company.stock\";s:5:\"false\";s:15:\"company.tax.irs\";s:1:\"1\";s:16:\"company.tax.rate\";s:2:\"10\";s:15:\"company.tax.vat\";s:1:\"1\";s:19:\"company.transaction\";s:1:\"1\";s:14:\"company.vat.id\";s:9:\"069924504\";s:15:\"company.website\";s:0:\"\";s:11:\"company.zip\";s:0:\"\";s:14:\"paypal.apiLive\";s:5:\"false\";s:18:\"paypal.apiPassword\";s:10:\"1377498089\";s:19:\"paypal.apiSignature\";s:56:\"AAIVQYQw1NM1GpwV39qoyAlLZqNaArnmriH3xY5IQg-ENXEhq9jz27IB\";s:18:\"paypal.apiUsername\";s:35:\"adam2314-facilitator_api1.gmail.com\";s:16:\"server.checkTime\";s:14:\"20130324114336\";s:16:\"server.dbVersion\";s:4:\"2.21\";s:13:\"server.Latest\";s:0:\"\";s:14:\"server.Version\";s:4:\"2.21\";s:18:\"server.wkhtmltopdf\";s:50:\"xvfb-run -a -s \"-screen 0 1024x768x16\" wkhtmltopdf\";s:11:\"system.auth\";s:6:\"179402\";s:11:\"system.name\";s:9:\"Linet 3.0\";s:18:\"system.vendor.name\";s:9:\"Speedcomp\";s:20:\"system.vendor.vatnum\";s:9:\"069924504\";s:14:\"system.version\";s:3:\"3.0\";s:29:\"transactionType.chequedeposit\";s:1:\"4\";s:22:\"transactionType.manual\";s:1:\"0\";s:27:\"transactionType.openBalance\";s:2:\"16\";s:31:\"transactionType.supplierPayment\";s:1:\"5\";}');



--
-- Structure for table `uTwq_AuthAssignment`
--

DROP TABLE IF EXISTS `uTwq_AuthAssignment`;

CREATE TABLE `uTwq_AuthAssignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,
`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `uTwq_AuthAssignment`
--

INSERT INTO `uTwq_AuthAssignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
 ('Accountants', '11', NULL, 'N;'),
 ('Admin', '1', NULL, 'N;'),
 ('Authenticated', '2', NULL, 'N;');



--
-- Structure for table `uTwq_AuthItem`
--

DROP TABLE IF EXISTS `uTwq_AuthItem`;

CREATE TABLE `uTwq_AuthItem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `uTwq_AuthItem`
--

INSERT INTO `uTwq_AuthItem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
 ('AccId6111.*', '1', NULL, NULL, 'N;'),
 ('AccId6111.Admin', '0', NULL, NULL, 'N;'),
 ('AccId6111.Autocomplete', '0', NULL, NULL, 'N;'),
 ('AccId6111.Create', '0', NULL, NULL, 'N;'),
 ('AccId6111.Delete', '0', NULL, NULL, 'N;'),
 ('AccId6111.Index', '0', NULL, NULL, 'N;'),
 ('AccId6111.Update', '0', NULL, NULL, 'N;'),
 ('AccId6111.View', '0', NULL, NULL, 'N;'),
 ('Accountants', '2', 'This role has access to everything except stock, permissions and users management', NULL, 'N;'),
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
 ('AccTemplateItem.*', '1', NULL, NULL, 'N;'),
 ('AccTemplateItem.Admin', '0', NULL, NULL, 'N;'),
 ('AccTemplateItem.Create', '0', NULL, NULL, 'N;'),
 ('AccTemplateItem.Delete', '0', NULL, NULL, 'N;'),
 ('AccTemplateItem.Index', '0', NULL, NULL, 'N;'),
 ('AccTemplateItem.SaveSub', '0', NULL, NULL, 'N;'),
 ('AccTemplateItem.Update', '0', NULL, NULL, 'N;'),
 ('AccTemplateItem.View', '0', NULL, NULL, 'N;'),
 ('Acctype.*', '1', NULL, NULL, 'N;'),
 ('Acctype.Admin', '0', NULL, NULL, 'N;'),
 ('Acctype.Create', '0', NULL, NULL, 'N;'),
 ('Acctype.Delete', '0', NULL, NULL, 'N;'),
 ('Acctype.Index', '0', NULL, NULL, 'N;'),
 ('Acctype.Update', '0', NULL, NULL, 'N;'),
 ('Acctype.View', '0', NULL, NULL, 'N;'),
 ('Admin', '2', 'Administrators with full access to everything', NULL, 'N;'),
 ('Api.*', '1', NULL, NULL, 'N;'),
 ('Api.Create', '0', NULL, NULL, 'N;'),
 ('Api.Delete', '0', NULL, NULL, 'N;'),
 ('Api.List', '0', NULL, NULL, 'N;'),
 ('Api.Login', '0', NULL, NULL, 'N;'),
 ('Api.Logout', '0', NULL, NULL, 'N;'),
 ('Api.Search', '0', NULL, NULL, 'N;'),
 ('Api.Select', '0', NULL, NULL, 'N;'),
 ('Api.Update', '0', NULL, NULL, 'N;'),
 ('Api.View', '0', NULL, NULL, 'N;'),
 ('Bankbook.*', '1', NULL, NULL, 'N;'),
 ('Bankbook.Admin', '0', NULL, NULL, 'N;'),
 ('Bankbook.Ajax', '0', NULL, NULL, 'N;'),
 ('Bankbook.Create', '0', NULL, NULL, 'N;'),
 ('Bankbook.Delete', '0', NULL, NULL, 'N;'),
 ('Bankbook.Extmatch', '0', NULL, NULL, 'N;'),
 ('Bankbook.Extmatchajax', '0', NULL, NULL, 'N;'),
 ('Bankbook.Update', '0', NULL, NULL, 'N;'),
 ('Bankbook.View', '0', NULL, NULL, 'N;'),
 ('BankName.*', '1', NULL, NULL, 'N;'),
 ('BankName.Admin', '0', NULL, NULL, 'N;'),
 ('BankName.Autocomplete', '0', NULL, NULL, 'N;'),
 ('BankName.Create', '0', NULL, NULL, 'N;'),
 ('BankName.Delete', '0', NULL, NULL, 'N;'),
 ('BankName.Index', '0', NULL, NULL, 'N;'),
 ('BankName.Update', '0', NULL, NULL, 'N;'),
 ('BankName.View', '0', NULL, NULL, 'N;'),
 ('Comment.Approve', '0', 'Approve comments', NULL, 'N;'),
 ('Comment.Delete', '0', 'Delete comments', NULL, 'N;'),
 ('Comment.Update', '0', 'Update comments', NULL, 'N;'),
 ('Companies.*', '1', NULL, NULL, 'N;'),
 ('Companies.Index', '0', NULL, NULL, 'N;'),
 ('Companies.Update', '0', NULL, NULL, 'N;'),
 ('Companies.View', '0', NULL, NULL, 'N;'),
 ('Company.*', '1', NULL, NULL, 'N;'),
 ('Company.Admin', '0', NULL, NULL, 'N;'),
 ('Company.Create', '0', NULL, NULL, 'N;'),
 ('Company.Delete', '0', NULL, NULL, 'N;'),
 ('Company.DeletePermission', '0', NULL, NULL, 'N;'),
 ('Company.Index', '0', NULL, NULL, 'N;'),
 ('Company.Permissions', '0', NULL, NULL, 'N;'),
 ('Company.Update', '0', NULL, NULL, 'N;'),
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
 ('Data.*', '1', NULL, NULL, 'N;'),
 ('Data.Backup', '0', NULL, NULL, 'N;'),
 ('Data.Download', '0', NULL, NULL, 'N;'),
 ('Data.Openfrmt', '0', NULL, NULL, 'N;'),
 ('Data.Openfrmtimport', '0', NULL, NULL, 'N;'),
 ('Data.Pcn874', '0', NULL, NULL, 'N;'),
 ('Data.Pcn874ajax', '0', NULL, NULL, 'N;'),
 ('Data.PublicDownload', '0', NULL, NULL, 'N;'),
 ('Data.Restore', '0', NULL, NULL, 'N;'),
 ('Deposit.*', '1', NULL, NULL, 'N;'),
 ('Deposit.Admin', '0', NULL, NULL, 'N;'),
 ('Deposit.Ajax', '0', NULL, NULL, 'N;'),
 ('Doccheques.*', '1', NULL, NULL, 'N;'),
 ('Doccheques.Admin', '0', NULL, NULL, 'N;'),
 ('Doccheques.Ajax', '0', NULL, NULL, 'N;'),
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
 ('Docs.Pdf', '0', NULL, NULL, 'N;'),
 ('Docs.Print', '0', NULL, NULL, 'N;'),
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
 ('EavFields.Ajax', '0', NULL, NULL, 'N;'),
 ('EavFields.Create', '0', NULL, NULL, 'N;'),
 ('EavFields.Delete', '0', NULL, NULL, 'N;'),
 ('EavFields.Index', '0', NULL, NULL, 'N;'),
 ('EavFields.Update', '0', NULL, NULL, 'N;'),
 ('EavFields.View', '0', NULL, NULL, 'N;'),
 ('Fields.*', '1', NULL, NULL, 'N;'),
 ('Fields.Admin', '0', NULL, NULL, 'N;'),
 ('Fields.Create', '0', NULL, NULL, 'N;'),
 ('Fields.Delete', '0', NULL, NULL, 'N;'),
 ('Fields.Index', '0', NULL, NULL, 'N;'),
 ('Fields.Update', '0', NULL, NULL, 'N;'),
 ('Fields.View', '0', NULL, NULL, 'N;'),
 ('Files.*', '1', NULL, NULL, 'N;'),
 ('Files.Admin', '0', NULL, NULL, 'N;'),
 ('Files.Create', '0', NULL, NULL, 'N;'),
 ('Files.Delete', '0', NULL, NULL, 'N;'),
 ('Files.Index', '0', NULL, NULL, 'N;'),
 ('Files.Update', '0', NULL, NULL, 'N;'),
 ('Files.View', '0', NULL, NULL, 'N;'),
 ('Install.*', '1', NULL, NULL, 'N;'),
 ('Install.Index', '0', NULL, NULL, 'N;'),
 ('Item.*', '1', NULL, NULL, 'N;'),
 ('Item.Admin', '0', NULL, NULL, 'N;'),
 ('Item.Autocomplete', '0', NULL, NULL, 'N;'),
 ('Item.Create', '0', NULL, NULL, 'N;'),
 ('Item.Delete', '0', NULL, NULL, 'N;'),
 ('Item.Index', '0', NULL, NULL, 'N;'),
 ('Item.JSON', '0', NULL, NULL, 'N;'),
 ('Item.Template', '0', NULL, NULL, 'N;'),
 ('Item.Update', '0', NULL, NULL, 'N;'),
 ('Item.VatJSON', '0', NULL, NULL, 'N;'),
 ('Item.View', '0', NULL, NULL, 'N;'),
 ('Itemcategory.*', '1', NULL, NULL, 'N;'),
 ('Itemcategory.Admin', '0', NULL, NULL, 'N;'),
 ('Itemcategory.Create', '0', NULL, NULL, 'N;'),
 ('Itemcategory.Delete', '0', NULL, NULL, 'N;'),
 ('Itemcategory.Index', '0', NULL, NULL, 'N;'),
 ('Itemcategory.Update', '0', NULL, NULL, 'N;'),
 ('Itemcategory.View', '0', NULL, NULL, 'N;'),
 ('ItemTemplate.*', '1', NULL, NULL, 'N;'),
 ('ItemTemplate.Admin', '0', NULL, NULL, 'N;'),
 ('ItemTemplate.Create', '0', NULL, NULL, 'N;'),
 ('ItemTemplate.Delete', '0', NULL, NULL, 'N;'),
 ('ItemTemplate.Index', '0', NULL, NULL, 'N;'),
 ('ItemTemplate.SaveSub', '0', NULL, NULL, 'N;'),
 ('ItemTemplate.Update', '0', NULL, NULL, 'N;'),
 ('ItemTemplate.View', '0', NULL, NULL, 'N;'),
 ('ItemTemplateItem.*', '1', NULL, NULL, 'N;'),
 ('ItemTemplateItem.Admin', '0', NULL, NULL, 'N;'),
 ('ItemTemplateItem.Create', '0', NULL, NULL, 'N;'),
 ('ItemTemplateItem.Delete', '0', NULL, NULL, 'N;'),
 ('ItemTemplateItem.Index', '0', NULL, NULL, 'N;'),
 ('ItemTemplateItem.SaveSub', '0', NULL, NULL, 'N;'),
 ('ItemTemplateItem.Update', '0', NULL, NULL, 'N;'),
 ('ItemTemplateItem.View', '0', NULL, NULL, 'N;'),
 ('Itemunit.*', '1', NULL, NULL, 'N;'),
 ('Itemunit.Admin', '0', NULL, NULL, 'N;'),
 ('Itemunit.Create', '0', NULL, NULL, 'N;'),
 ('Itemunit.Delete', '0', NULL, NULL, 'N;'),
 ('Itemunit.Index', '0', NULL, NULL, 'N;'),
 ('Itemunit.Update', '0', NULL, NULL, 'N;'),
 ('Itemunit.View', '0', NULL, NULL, 'N;'),
 ('ItemVatCat.*', '1', NULL, NULL, 'N;'),
 ('ItemVatCat.Admin', '0', NULL, NULL, 'N;'),
 ('ItemVatCat.Create', '0', NULL, NULL, 'N;'),
 ('ItemVatCat.Delete', '0', NULL, NULL, 'N;'),
 ('ItemVatCat.Index', '0', NULL, NULL, 'N;'),
 ('ItemVatCat.Update', '0', NULL, NULL, 'N;'),
 ('ItemVatCat.View', '0', NULL, NULL, 'N;'),
 ('Mail.*', '1', NULL, NULL, 'N;'),
 ('Mail.Create', '0', NULL, NULL, 'N;'),
 ('MailTemplate.*', '1', NULL, NULL, 'N;'),
 ('MailTemplate.Admin', '0', NULL, NULL, 'N;'),
 ('MailTemplate.Create', '0', NULL, NULL, 'N;'),
 ('MailTemplate.Delete', '0', NULL, NULL, 'N;'),
 ('MailTemplate.Index', '0', NULL, NULL, 'N;'),
 ('MailTemplate.Update', '0', NULL, NULL, 'N;'),
 ('MailTemplate.View', '0', NULL, NULL, 'N;'),
 ('Match.*', '1', NULL, NULL, 'N;'),
 ('Match.Extmatchajax', '0', NULL, NULL, 'N;'),
 ('Match.Intmatch', '0', NULL, NULL, 'N;'),
 ('Minify.*', '1', NULL, NULL, 'N;'),
 ('Minify.Index', '0', NULL, NULL, 'N;'),
 ('Outcome.*', '1', NULL, NULL, 'N;'),
 ('Outcome.Create', '0', NULL, NULL, 'N;'),
 ('Paypal.*', '1', NULL, NULL, 'N;'),
 ('Paypal.Buy', '0', NULL, NULL, 'N;'),
 ('Paypal.Cancel', '0', NULL, NULL, 'N;'),
 ('Paypal.Confirm', '0', NULL, NULL, 'N;'),
 ('Paypal.DirectPayment', '0', NULL, NULL, 'N;'),
 ('Post.Admin', '0', 'Administer posts', NULL, 'N;'),
 ('Post.Create', '0', 'Create posts', NULL, 'N;'),
 ('Post.Delete', '0', 'Delete posts', NULL, 'N;'),
 ('Post.Update', '0', 'Update posts', NULL, 'N;'),
 ('Post.View', '0', 'View posts', NULL, 'N;'),
 ('PostUpdateOwn', '0', 'Update own posts', 'return Yii::app()->user->id==$params[\"userid\"];', 'N;'),
 ('Purchase Manager', '2', 'This role can access only procurement functions', NULL, 'N;'),
 ('Reports.*', '1', NULL, NULL, 'N;'),
 ('Reports.Balance', '0', NULL, NULL, 'N;'),
 ('Reports.Balanceajax', '0', NULL, NULL, 'N;'),
 ('Reports.Contact', '0', NULL, NULL, 'N;'),
 ('Reports.Error', '0', NULL, NULL, 'N;'),
 ('Reports.Index', '0', NULL, NULL, 'N;'),
 ('Reports.Inout', '0', NULL, NULL, 'N;'),
 ('Reports.Inoutajax', '0', NULL, NULL, 'N;'),
 ('Reports.Journal', '0', NULL, NULL, 'N;'),
 ('Reports.Login', '0', NULL, NULL, 'N;'),
 ('Reports.Logout', '0', NULL, NULL, 'N;'),
 ('Reports.Mprofloss', '0', NULL, NULL, 'N;'),
 ('Reports.Mproflossajax', '0', NULL, NULL, 'N;'),
 ('Reports.Owe', '0', NULL, NULL, 'N;'),
 ('Reports.Profloss', '0', NULL, NULL, 'N;'),
 ('Reports.Proflossajax', '0', NULL, NULL, 'N;'),
 ('Reports.Stock', '0', NULL, NULL, 'N;'),
 ('Reports.StockAction', '0', NULL, NULL, 'N;'),
 ('Reports.Taxrep', '0', NULL, NULL, 'N;'),
 ('Reports.Vat', '0', NULL, NULL, 'N;'),
 ('Rm.*', '1', NULL, NULL, 'N;'),
 ('Rm.Admin', '0', NULL, NULL, 'N;'),
 ('Rm.Create', '0', NULL, NULL, 'N;'),
 ('Rm.Delete', '0', NULL, NULL, 'N;'),
 ('Rm.Index', '0', NULL, NULL, 'N;'),
 ('Rm.Update', '0', NULL, NULL, 'N;'),
 ('Rm.View', '0', NULL, NULL, 'N;'),
 ('Salesman', '2', 'This role can access only sales related functions', NULL, 'N;'),
 ('Settings.*', '1', NULL, NULL, 'N;'),
 ('Settings.Admin', '0', NULL, NULL, 'N;'),
 ('Settings.AdminNew', '0', NULL, NULL, 'N;'),
 ('Settings.Dashboard', '0', NULL, NULL, 'N;'),
 ('Showdocs.*', '1', NULL, NULL, 'N;'),
 ('Showdocs.Admin', '0', NULL, NULL, 'N;'),
 ('Showdocs.Create', '0', NULL, NULL, 'N;'),
 ('Showdocs.Delete', '0', NULL, NULL, 'N;'),
 ('Showdocs.Index', '0', NULL, NULL, 'N;'),
 ('Showdocs.Status', '0', NULL, NULL, 'N;'),
 ('Showdocs.Update', '0', NULL, NULL, 'N;'),
 ('Showdocs.View', '0', NULL, NULL, 'N;'),
 ('Site.*', '1', NULL, NULL, 'N;'),
 ('Site.About', '0', NULL, NULL, 'N;'),
 ('Site.Bug', '0', NULL, NULL, 'N;'),
 ('Site.Contact', '0', NULL, NULL, 'N;'),
 ('Site.Error', '0', NULL, NULL, 'N;'),
 ('Site.Index', '0', NULL, NULL, 'N;'),
 ('Site.Login', '0', NULL, NULL, 'N;'),
 ('Site.Logout', '0', NULL, NULL, 'N;'),
 ('Site.Support', '0', NULL, NULL, 'N;'),
 ('Storekeeper', '2', 'This role can access only warehouse transaction functions', NULL, 'N;'),
 ('Transaction.*', '1', NULL, NULL, 'N;'),
 ('Transaction.Create', '0', NULL, NULL, 'N;'),
 ('Transaction.OpenBalance', '0', NULL, NULL, 'N;'),
 ('Users.*', '1', NULL, NULL, 'N;'),
 ('Users.Admin', '0', NULL, NULL, 'N;'),
 ('Users.Create', '0', NULL, NULL, 'N;'),
 ('Users.Delete', '0', NULL, NULL, 'N;'),
 ('Users.Index', '0', NULL, NULL, 'N;'),
 ('Users.Update', '0', NULL, NULL, 'N;'),
 ('Users.View', '0', NULL, NULL, 'N;');



--
-- Structure for table `uTwq_AuthItemChild`
--

DROP TABLE IF EXISTS `uTwq_AuthItemChild`;

CREATE TABLE `uTwq_AuthItemChild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,
`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `uTwq_AuthItemChild`
--

INSERT INTO `uTwq_AuthItemChild` (`parent`, `child`) VALUES
 ('Accountants', 'Users.Admin'),
 ('Accountants', 'Users.Create'),
 ('Accountants', 'Users.Delete'),
 ('Accountants', 'Users.Index'),
 ('Accountants', 'Users.Update'),
 ('Accountants', 'Users.View');



--
-- Structure for table `uTwq_Rights`
--

DROP TABLE IF EXISTS `uTwq_Rights`;

CREATE TABLE `uTwq_Rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
PRIMARY KEY (`itemname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `uTwq_Rights`
--

INSERT INTO `uTwq_Rights` (`itemname`, `type`, `weight`) VALUES
 ('Authenticated', '2', '1'),
 ('Editor', '2', '0'),
 ('Guest', '2', '2');



--
-- Structure for table `uTwq_accCountry`
--

DROP TABLE IF EXISTS `uTwq_accCountry`;

CREATE TABLE `uTwq_accCountry` (
  `id` varchar(2) NOT NULL DEFAULT '',
  `name` varchar(255) DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `uTwq_accEav`
--

DROP TABLE IF EXISTS `uTwq_accEav`;

CREATE TABLE `uTwq_accEav` (
  `entity` bigint(20) NOT NULL,
  `attribute` varchar(250) NOT NULL,
`value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `uTwq_accHist`
--

DROP TABLE IF EXISTS `uTwq_accHist`;

CREATE TABLE `uTwq_accHist` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `account_id` int(11) DEFAULT NULL,
  `dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `details` text,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `uTwq_accId6111`
--

DROP TABLE IF EXISTS `uTwq_accId6111`;

CREATE TABLE `uTwq_accId6111` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `percentage` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5091 DEFAULT CHARSET=utf8;

--
-- Data for table `uTwq_accId6111`
--

INSERT INTO `uTwq_accId6111` (`id`, `name`, `percentage`) VALUES
 ('1010', ' ?????? ??????? ????', '0'),
 ('1020', ' ?????? ??????? ???\"?', '0'),
 ('1030', ' ?????? ???? ??????? ????', '0'),
 ('1040', ' ?????? ???? ??????? ???\"?', '0'),
 ('1090', ' ?????? ?????', '0'),
 ('3510', ' ??? ????? ???????', '0'),
 ('3515', ' ???????', '0'),
 ('3520', ' ?????? ??? ?????? ????', '0'),
 ('3530', ' ????? ???????? ???????', '0'),
 ('3535', ' ?????? ???? ?????', '0'),
 ('3540', ' ??????? ????????', '0'),
 ('3545', ' ?????? ?????', '0'),
 ('3550', ' ?????? ????? ????????', '0'),
 ('3555', ' ?????? ???? ??????', '0'),
 ('3560', ' ??????', '0'),
 ('3565', ' ????? ??? ???????', '0'),
 ('3570', ' ??? ?????? ?????? ?????', '0'),
 ('3575', ' ????? ??????', '0'),
 ('3580', ' ???', '0'),
 ('3590', ' ???? ????', '0'),
 ('3595', ' ????? ???????', '0'),
 ('3600', ' ??????? ?????? ???????', '0'),
 ('3610', ' ????? ??????? ???????', '0'),
 ('3620', ' ????? ?????? ??????', '0'),
 ('3625', ' ??????? ????? ?????? ?????', '0'),
 ('3640', ' ??? ?????', '0'),
 ('3650', ' ?????? ???? ???????', '0'),
 ('3660', ' ?????? ???\"?', '0'),
 ('3665', ' ?????? ???????', '0'),
 ('3680', ' ???????', '0'),
 ('3685', ' ???? ?????', '0'),
 ('3690', ' ????? ??? ??????? ?????', '0'),
 ('5010', ' ????? ???', '0'),
 ('5090', ' ????? ?????? ?????', '0');



--
-- Structure for table `uTwq_accTemplate`
--

DROP TABLE IF EXISTS `uTwq_accTemplate`;

CREATE TABLE `uTwq_accTemplate` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `AccType_id` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `uTwq_accTemplateItem`
--

DROP TABLE IF EXISTS `uTwq_accTemplateItem`;

CREATE TABLE `uTwq_accTemplateItem` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `AccTemplate_id` int(11) NOT NULL,
  `eavFields_id` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `uTwq_accType`
--

DROP TABLE IF EXISTS `uTwq_accType`;

CREATE TABLE `uTwq_accType` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `desc` varchar(40) NOT NULL,
  `openformat` varchar(5) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Data for table `uTwq_accType`
--

INSERT INTO `uTwq_accType` (`id`, `name`, `desc`, `openformat`) VALUES
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
-- Structure for table `uTwq_accounts`
--

DROP TABLE IF EXISTS `uTwq_accounts`;

CREATE TABLE `uTwq_accounts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` int(11) DEFAULT NULL,
  `id6111` int(10) DEFAULT NULL,
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
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8;

--
-- Data for table `uTwq_accounts`
--

INSERT INTO `uTwq_accounts` (`id`, `type`, `id6111`, `pay_terms`, `src_tax`, `src_date`, `parent_account_id`, `name`, `contact`, `department`, `vatnum`, `email`, `phone`, `dir_phone`, `cellular`, `fax`, `web`, `address`, `city`, `zip`, `currency_id`, `comments`, `system_acc`, `owner`, `modified`, `created`) VALUES
 ('1', '6', '0', '0', '0.00', '2013-08-11 12:43:52', '0', '??\"? ??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('2', '6', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '??\"? ?????? ???? ??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('3', '6', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '??\"? ??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('4', '6', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '??\"? ???', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('5', '6', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ????? ??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('6', '4', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('7', '4', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '???? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('8', '6', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ????? ???????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('9', '4', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('10', '4', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '???? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('11', '4', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '???? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('13', '6', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '?? ????? ??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('14', '6', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ????? ??\"?', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('15', '6', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('16', '6', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '?? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('17', '2', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '???? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('18', '2', '3510', '0', '0.00', '0000-00-00 00:00:00', '0', '??? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('30', '2', '3575', '0', '0.00', '0000-00-00 00:00:00', '0', '?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('31', '2', '3550', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ??? ???????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('32', '2', '3550', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('33', '2', '3565', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ???', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('34', '2', '3565', '0', '66.66', '0000-00-00 00:00:00', '0', '????? ???', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('35', '2', '3545', '0', '100.00', '0000-00-00 00:00:00', '0', '??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('36', '2', '3575', '0', '0.00', '0000-00-00 00:00:00', '0', '??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('37', '2', '3650', '0', '100.00', '0000-00-00 00:00:00', '0', '?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('38', '2', '3685', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('39', '2', '3515', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ???', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('40', '2', '3515', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ?????? ???????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('41', '2', '3515', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('42', '2', '3515', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ?? ?', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('43', '2', '3515', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('44', '2', '3650', '0', '100.00', '0000-00-00 00:00:00', '0', '????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('45', '2', '3565', '0', '25.00', '0000-00-00 00:00:00', '0', '???', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('46', '2', '3565', '0', '100.00', '0000-00-00 00:00:00', '0', '???', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('47', '2', '3575', '0', '0.00', '0000-00-00 00:00:00', '0', '??? ???', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('48', '2', '3575', '0', '0.00', '0000-00-00 00:00:00', '0', '??? ???', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('49', '2', '3680', '0', '100.00', '0000-00-00 00:00:00', '0', '??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('50', '2', '3565', '0', '100.00', '0000-00-00 00:00:00', '0', '??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('51', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ???????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('52', '2', '3600', '0', '100.00', '0000-00-00 00:00:00', '0', '??????? ???????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('53', '2', '3565', '0', '100.00', '0000-00-00 00:00:00', '0', '?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('54', '2', '3590', '0', '100.00', '0000-00-00 00:00:00', '0', '????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('55', '2', '3650', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('56', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', '???? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('57', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', '???? ???', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('58', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', '???? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('59', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', '???? ??', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('60', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', '???? ??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('61', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', '???? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('62', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', '???? ??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('63', '2', '3625', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ?? ???? ????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('64', '2', '3625', '0', '66.66', '0000-00-00 00:00:00', '0', '????? ?? ???? ????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('65', '2', '3560', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ???????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('66', '2', '3560', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('67', '2', '3565', '0', '0.00', '0000-00-00 00:00:00', '0', '??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('68', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', '?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('69', '2', '3650', '0', '100.00', '0000-00-00 00:00:00', '0', '???? ???????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('70', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', '???? ????? ???????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('71', '2', '3650', '0', '100.00', '0000-00-00 00:00:00', '0', '??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('72', '2', '3690', '0', '100.00', '0000-00-00 00:00:00', '0', '???????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('73', '2', '3665', '0', '100.00', '0000-00-00 00:00:00', '0', '???????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('74', '2', '3680', '0', '100.00', '0000-00-00 00:00:00', '0', '???????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('75', '2', '3690', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ??? ??????? ??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('76', '2', '3595', '0', '100.00', '0000-00-00 00:00:00', '0', '??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('77', '2', '3660', '0', '0.00', '0000-00-00 00:00:00', '0', '?????? ???\"?', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('78', '2', '3650', '0', '100.00', '0000-00-00 00:00:00', '0', '?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('79', '2', '3650', '0', '66.66', '0000-00-00 00:00:00', '0', '?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('80', '2', '3600', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ???????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('81', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('82', '2', '5090', '0', '100.00', '0000-00-00 00:00:00', '0', '????? PAYPAL', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('83', '2', '5010', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ???', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('84', '2', '5090', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ?????? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('85', '2', '3580', '0', '0.00', '0000-00-00 00:00:00', '0', '???', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('86', '2', '3620', '0', '100.00', '0000-00-00 00:00:00', '0', '?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('87', '2', '3520', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('88', '2', '3620', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('89', '2', '1340', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ???\"?', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('90', '2', '3565', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ???', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('91', '2', '3690', '0', '100.00', '0000-00-00 00:00:00', '0', '?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('92', '2', '3620', '0', '100.00', '0000-00-00 00:00:00', '0', '?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('93', '2', '3570', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('94', '2', '3570', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('95', '2', '3565', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ???', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('96', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', '??? ???? ???? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('97', '2', '3690', '0', '100.00', '0000-00-00 00:00:00', '0', '????????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('98', '2', '3595', '0', '100.00', '0000-00-00 00:00:00', '0', '?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('99', '2', '3550', '0', '100.00', '0000-00-00 00:00:00', '0', '???????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('100', '3', '1010', '0', '18.00', '2013-08-19 12:03:50', '0', '????? ?????? ????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('101', '3', '1020', '0', '16.00', '2013-08-19 12:03:57', '0', '????? ?????? ????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('102', '3', '1030', '0', '0.00', '2013-08-19 12:04:06', '0', '????? ?????? ???\"?', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('103', '3', '1040', '0', '0.00', '2013-08-19 12:04:11', '0', '????? ?????? ???\"?', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('107', '2', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('109', '2', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '?????? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('110', '1', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '?????? ??\"?', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('111', '2', '3565', '0', '66.66', '0000-00-00 00:00:00', '0', '???', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('112', '2', '3680', '0', '0.00', '0000-00-00 00:00:00', '0', '??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('113', '0', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '?????? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('114', '1', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('115', '8', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '???? ????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('116', '3', '1010', NULL, '0.00', NULL, NULL, '??? 5%', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', NULL, '0000-00-00 00:00:00', '2014-07-09 20:52:36'),
 ('117', '7', '1010', NULL, '0.00', NULL, NULL, '???', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', NULL, '0000-00-00 00:00:00', '2014-07-15 16:19:06'),
 ('118', '7', '1010', NULL, '0.00', NULL, NULL, '???? ???', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', NULL, '0000-00-00 00:00:00', '2014-07-15 16:19:27');



--
-- Structure for table `uTwq_bankName`
--

DROP TABLE IF EXISTS `uTwq_bankName`;

CREATE TABLE `uTwq_bankName` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;

--
-- Data for table `uTwq_bankName`
--

INSERT INTO `uTwq_bankName` (`id`, `name`) VALUES
 ('1', '??? ???? ?????'),
 ('4', '??? ??? ?????? ??????'),
 ('6', '??? ?????'),
 ('7', '??? ?????? ??????'),
 ('8', '??? ?????? ??????'),
 ('9', '??? ?????'),
 ('10', '??? ?????'),
 ('11', '??? ???????'),
 ('12', '??? ???????'),
 ('13', '??? ?????'),
 ('14', '??? ???? ?????'),
 ('17', '??? ??????? ???????'),
 ('19', '??? ??????? ??????'),
 ('20', '??? ????? ?????'),
 ('22', 'Citibank N.A'),
 ('23', 'HSBC'),
 ('25', 'BNP Paribas Israel'),
 ('26', '????? ??\"?'),
 ('31', '???? ????????? ?????? '),
 ('34', '??? ???? ??????'),
 ('39', 'SBI State Bank of India'),
 ('46', '??? ???'),
 ('48', '???? ????? ??????'),
 ('52', '??? ????? ????? ?????'),
 ('54', '??? ???????'),
 ('67', 'Arab Land Bank'),
 ('68', '??? ???? ?????? ??????'),
 ('77', '??? ????? ????????? ??\"?'),
 ('90', '??? ??????? ?????????'),
 ('99', '??? ?????');



--
-- Structure for table `uTwq_bankbook`
--

DROP TABLE IF EXISTS `uTwq_bankbook`;

CREATE TABLE `uTwq_bankbook` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `account_id` int(11) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `details` varchar(60) DEFAULT NULL,
  `refnum` char(10) DEFAULT NULL,
  `sum` decimal(8,2) DEFAULT NULL,
  `total` decimal(8,2) DEFAULT NULL,
  `cor_num` varchar(30) DEFAULT NULL,
  `currency_id` varchar(3) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `uTwq_blackList`
--

DROP TABLE IF EXISTS `uTwq_blackList`;

CREATE TABLE `uTwq_blackList` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `value` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `uTwq_config`
--

DROP TABLE IF EXISTS `uTwq_config`;

CREATE TABLE `uTwq_config` (
  `id` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `eavType` varchar(255) NOT NULL,
  `hidden` tinyint(1) NOT NULL,
  `priority` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `uTwq_config`
--

INSERT INTO `uTwq_config` (`id`, `value`, `eavType`, `hidden`, `priority`) VALUES
 ('company.1.warehouse', '115', 'integer', '1', '40'),
 ('company.acc.assetvat', '3', 'integer', '1', '40'),
 ('company.acc.buyvat', '1', 'integer', '1', '40'),
 ('company.acc.custtax', '8', 'integer', '1', '40'),
 ('company.acc.irs', '16', 'integer', '1', '40'),
 ('company.acc.natinspay', '14', 'integer', '1', '40'),
 ('company.acc.openbalance', '9', 'integer', '1', '40'),
 ('company.acc.payvat', '4', 'integer', '1', '40'),
 ('company.acc.pretax', '13', 'integer', '1', '40'),
 ('company.acc.sellvat', '3', 'integer', '1', '40'),
 ('company.address', '', 'string', '0', '40'),
 ('company.city', '', 'string', '0', '40'),
 ('company.cur', 'ILS', 'list(Currecies)', '0', '40'),
 ('company.doublebook', 'true', 'boolean', '0', '40'),
 ('company.en.address', '', 'string', '0', '40'),
 ('company.en.city', '', 'string', '0', '40'),
 ('company.en.name', '', 'string', '0', '40'),
 ('company.fax', '', 'string', '0', '40'),
 ('company.logo', '110', 'file', '0', '40'),
 ('company.mail.address', '', 'string', '0', '40'),
 ('company.mail.password', '', 'string', '0', '40'),
 ('company.mail.port', '', 'string', '0', '40'),
 ('company.mail.server', '', 'string', '0', '40'),
 ('company.mail.ssl', 'false', 'boolean', '0', '40'),
 ('company.mail.user', '', 'string', '0', '40'),
 ('company.name', '????? ???????? ???????', 'string', '0', '1'),
 ('company.path', 'uTwq_', 'string', '1', '40'),
 ('company.pdfprint', 'true', 'boolean', '0', '40'),
 ('company.phone', '', 'string', '0', '40'),
 ('company.po', '', 'string', '0', '40'),
 ('company.seccur', 'AED', 'list(Currecies)', '0', '40'),
 ('company.stock', 'false', 'boolean', '0', '40'),
 ('company.tax.irs', '1', 'select({1:\"monthly\",2:\"bi-monthly\"})', '0', '40'),
 ('company.tax.rate', '10', 'integer', '0', '40'),
 ('company.tax.vat', '1', 'select({1:\"monthly\",2:\"bi-monthly\"})', '0', '40'),
 ('company.transaction', '1', 'integer', '1', '40'),
 ('company.vat.id', '069924504', 'integer', '0', '2'),
 ('company.website', '', 'string', '0', '40'),
 ('company.zip', '', 'string', '0', '40'),
 ('paypal.apiLive', 'false', 'boolean', '0', '40'),
 ('paypal.apiPassword', '', '', '0', '40'),
 ('paypal.apiSignature', '', '', '0', '40'),
 ('paypal.apiUsername', '', '', '0', '40'),
 ('server.checkTime', '20130324114336', '', '1', '40'),
 ('server.dbVersion', '3.0', '', '1', '40'),
 ('server.Latest', '', '', '1', '40'),
 ('server.Version', '3.0', '', '1', '40'),
 ('server.wkhtmltopdf', 'xvfb-run -a -s \"-screen 0 1024x768x16\" wkhtmltopdf', 'string', '0', '40'),
 ('system.auth', '179403', 'string', '1', '40'),
 ('system.name', 'Linet 3.0', 'string', '1', '40'),
 ('system.vendor.name', 'Speedcomp', 'string', '1', '40'),
 ('system.vendor.vatnum', '069924504', 'string', '1', '40'),
 ('system.version', '3.0', 'string', '1', '40'),
 ('transactionType.chequedeposit', '4', 'integer', '1', '40'),
 ('transactionType.manual', '0', 'integer', '1', '40'),
 ('transactionType.openBalance', '16', 'integer', '1', '40'),
 ('transactionType.supplierPayment', '5', 'integer', '1', '40');



--
-- Structure for table `uTwq_curRates`
--

DROP TABLE IF EXISTS `uTwq_curRates`;

CREATE TABLE `uTwq_curRates` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `currency_id` varchar(3) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `value` decimal(10,5) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Data for table `uTwq_curRates`
--

INSERT INTO `uTwq_curRates` (`id`, `currency_id`, `date`, `value`) VALUES
 ('1', 'ILS', '1999-12-31 22:00:01', '1.00000');



--
-- Structure for table `uTwq_docCheques`
--

DROP TABLE IF EXISTS `uTwq_docCheques`;

CREATE TABLE `uTwq_docCheques` (
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
-- Structure for table `uTwq_docDetails`
--

DROP TABLE IF EXISTS `uTwq_docDetails`;

CREATE TABLE `uTwq_docDetails` (
  `doc_id` int(11) NOT NULL DEFAULT '0',
  `item_id` int(11) DEFAULT NULL,
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
  PRIMARY KEY (`doc_id`,
`line`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `uTwq_docStatus`
--

DROP TABLE IF EXISTS `uTwq_docStatus`;

CREATE TABLE `uTwq_docStatus` (
  `num` int(11) NOT NULL,
  `doc_type` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `looked` tinyint(1) NOT NULL,
  `action` varchar(255) NOT NULL,
  PRIMARY KEY (`num`,
`doc_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `uTwq_docStatus`
--

INSERT INTO `uTwq_docStatus` (`num`, `doc_type`, `name`, `looked`, `action`) VALUES
 ('1', '1', '?????', '0', '0'),
 ('1', '2', '?????', '0', '0'),
 ('1', '3', '?????', '0', '0'),
 ('1', '4', '?????', '0', '0'),
 ('1', '5', '?????', '0', '0'),
 ('1', '6', '?????', '0', '0'),
 ('1', '7', '?????', '0', '0'),
 ('1', '8', '?????', '0', '0'),
 ('1', '9', '?????', '0', '0'),
 ('1', '10', '?????', '0', '0'),
 ('1', '11', '?????', '0', '0'),
 ('1', '12', '?????', '0', '0'),
 ('1', '13', '?????', '0', '0'),
 ('1', '14', '?????', '0', '0'),
 ('1', '15', '?????', '0', '0'),
 ('2', '1', '????', '0', '1'),
 ('2', '2', '????', '1', '1'),
 ('2', '3', '????', '1', '1'),
 ('2', '4', '????', '1', '1'),
 ('2', '5', '????', '0', '1'),
 ('2', '6', '????', '0', '1'),
 ('2', '7', '????', '1', '1'),
 ('2', '8', '????', '1', '1'),
 ('2', '9', '????', '1', '1'),
 ('2', '10', '????', '0', '1'),
 ('2', '11', '????', '1', '1'),
 ('2', '12', '????', '1', '1'),
 ('2', '13', '????', '1', '1'),
 ('2', '14', '????', '1', '1'),
 ('2', '15', '????', '1', '1');



--
-- Structure for table `uTwq_docType`
--

DROP TABLE IF EXISTS `uTwq_docType`;

CREATE TABLE `uTwq_docType` (
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
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Data for table `uTwq_docType`
--

INSERT INTO `uTwq_docType` (`id`, `name`, `openformat`, `isdoc`, `isrecipet`, `iscontract`, `looked`, `stockAction`, `account_type`, `docStatus_id`, `last_docnum`, `oppt_account_type`, `transactionType_id`, `vat_acc_id`, `header`, `footer`, `stockSwitch`, `copy`) VALUES
 ('1', 'Proforma', '300', '1', '0', '0', '1', '-1', '0', '2', '1', NULL, NULL, '3', '', '', '0', '1'),
 ('2', 'Delivery doc.', '200', '1', '0', '0', '0', '-1', '0', '2', '1', NULL, NULL, '3', '', '', '0', '1'),
 ('3', 'Invoice', '305', '1', '0', '0', '1', '-1', '0', '2', '1', NULL, '1', '3', '', '', '1', '1'),
 ('4', 'Credit invoice', '330', '1', '0', '0', '0', '1', '0', '2', '1', NULL, '17', '3', '', '', '1', '1'),
 ('5', 'Return document', '210', '1', '0', '0', '0', '1', '0', '2', '1', NULL, '19', '3', '', '', '1', '1'),
 ('6', 'Quote', '0', '1', '0', '0', '0', '0', '0', '2', '1', NULL, NULL, '3', '', '', '0', '0'),
 ('7', 'Sales Order', '0', '1', '0', '0', '0', '0', '0', '2', '1', NULL, NULL, '3', '', '', '0', '0'),
 ('8', 'Receipt', '400', '0', '1', '0', '1', '0', '0', '2', '1', NULL, '3', '3', '', '', '0', '1'),
 ('9', 'Invoice Receipt', '320', '1', '1', '0', '1', '-1', '0', '2', '1', NULL, '18', '3', '', '', '1', '1'),
 ('10', 'Purchase Order', '500', '1', '0', '0', '0', '0', '1', '2', '1', NULL, NULL, '3', '', '', '0', '1'),
 ('11', 'Manual invoice', '0', '1', '0', '0', '1', '1', '1', '2', '1', NULL, '11', '3', '', '', '1', '1'),
 ('12', 'Manual receipt', '0', '1', '0', '0', '1', '1', '1', '2', '1', NULL, '12', '3', '', '', '0', '1'),
 ('13', 'Buisness outcome', '0', '1', '0', '0', '0', '1', '1', '2', '1', '2', '5', '1', '', '', '0', '0'),
 ('14', 'Asstes outcome', '0', '1', '0', '0', '0', '1', '1', '2', '1', '4', '5', '2', '', '', '0', '0'),
 ('15', 'Warehouse transaction', '830', '1', '0', '0', '0', '1', '8', '2', '1', '8', NULL, '0', '', '', '0', '1');



--
-- Structure for table `uTwq_docs`
--

DROP TABLE IF EXISTS `uTwq_docs`;

CREATE TABLE `uTwq_docs` (
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
  `issue_date` timestamp NULL DEFAULT NULL,
  `due_date` timestamp NULL DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `discount` decimal(20,2) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `uTwq_eavAttr`
--

DROP TABLE IF EXISTS `uTwq_eavAttr`;

CREATE TABLE `uTwq_eavAttr` (
  `entity` bigint(20) NOT NULL,
  `attribute` varchar(250) NOT NULL,
`value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `uTwq_eavFields`
--

DROP TABLE IF EXISTS `uTwq_eavFields`;

CREATE TABLE `uTwq_eavFields` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `eavType` varchar(255) NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `uTwq_extCorrelation`
--

DROP TABLE IF EXISTS `uTwq_extCorrelation`;

CREATE TABLE `uTwq_extCorrelation` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `in` text NOT NULL,
  `out` text NOT NULL,
  `owner` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `uTwq_files`
--

DROP TABLE IF EXISTS `uTwq_files`;

CREATE TABLE `uTwq_files` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `public` tinyint(1) NOT NULL,
  `parent_id` int(255) DEFAULT NULL,
  `parent_type` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `expire` int(11) NOT NULL,
  `hash` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `uTwq_intCorrelation`
--

DROP TABLE IF EXISTS `uTwq_intCorrelation`;

CREATE TABLE `uTwq_intCorrelation` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `in` text NOT NULL,
  `out` text NOT NULL,
  `owner` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `uTwq_inventoryItem`
--

DROP TABLE IF EXISTS `uTwq_inventoryItem`;

CREATE TABLE `uTwq_inventoryItem` (
  `account_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `ammount` int(11) NOT NULL,
`idcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `uTwq_itemCategories`
--

DROP TABLE IF EXISTS `uTwq_itemCategories`;

CREATE TABLE `uTwq_itemCategories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `profit` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `uTwq_itemCategories`
--

INSERT INTO `uTwq_itemCategories` (`id`, `name`, `profit`) VALUES
 ('1', '????', '1');



--
-- Structure for table `uTwq_itemEav`
--

DROP TABLE IF EXISTS `uTwq_itemEav`;

CREATE TABLE `uTwq_itemEav` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `entity` int(11) NOT NULL,
  `attribute` int(11) NOT NULL,
  `value` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `uTwq_itemTemplate`
--

DROP TABLE IF EXISTS `uTwq_itemTemplate`;

CREATE TABLE `uTwq_itemTemplate` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `Itemcatagory_id` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `uTwq_itemTemplateItem`
--

DROP TABLE IF EXISTS `uTwq_itemTemplateItem`;

CREATE TABLE `uTwq_itemTemplateItem` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ItemTemplate_id` int(11) NOT NULL,
  `eavFields_id` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `uTwq_itemUnits`
--

DROP TABLE IF EXISTS `uTwq_itemUnits`;

CREATE TABLE `uTwq_itemUnits` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `precision` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Data for table `uTwq_itemUnits`
--

INSERT INTO `uTwq_itemUnits` (`id`, `name`, `precision`) VALUES
 ('0', 'units', '0'),
 ('1', 'work hours', '0'),
 ('2', 'Meter', '0'),
 ('3', 'liter', '0'),
 ('4', 'gram', '0'),
 ('5', 'Kilo gram', '0');



--
-- Structure for table `uTwq_itemVatCat`
--

DROP TABLE IF EXISTS `uTwq_itemVatCat`;

CREATE TABLE `uTwq_itemVatCat` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Data for table `uTwq_itemVatCat`
--

INSERT INTO `uTwq_itemVatCat` (`id`, `name`) VALUES
 ('1', '???? ???'),
 ('2', '???? ????'),
 ('12', '????? ?????');



--
-- Structure for table `uTwq_items`
--

DROP TABLE IF EXISTS `uTwq_items`;

CREATE TABLE `uTwq_items` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
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
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `uTwq_language`
--

DROP TABLE IF EXISTS `uTwq_language`;

CREATE TABLE `uTwq_language` (
  `id` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `uTwq_mailTemplate`
--

DROP TABLE IF EXISTS `uTwq_mailTemplate`;

CREATE TABLE `uTwq_mailTemplate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `subject` varchar(255) NOT NULL,
  `cc` varchar(255) NOT NULL,
  `bcc` varchar(255) NOT NULL,
  `entity_type` int(11) NOT NULL,
  `entity_id` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `uTwq_paymentType`
--

DROP TABLE IF EXISTS `uTwq_paymentType`;

CREATE TABLE `uTwq_paymentType` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `value` varchar(80) NOT NULL,
  `oppt_account_id` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Data for table `uTwq_paymentType`
--

INSERT INTO `uTwq_paymentType` (`id`, `name`, `value`, `oppt_account_id`) VALUES
 ('1', 'Cash', '', '10'),
 ('2', 'Cheque', '', '7'),
 ('3', 'Credit card', '', '11'),
 ('4', 'Bank transfer', '', '0'),
 ('5', 'Manual Credit', '', '11');



--
-- Structure for table `uTwq_stockAction`
--

DROP TABLE IF EXISTS `uTwq_stockAction`;

CREATE TABLE `uTwq_stockAction` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `uTwq_transactionType`
--

DROP TABLE IF EXISTS `uTwq_transactionType`;

CREATE TABLE `uTwq_transactionType` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Data for table `uTwq_transactionType`
--

INSERT INTO `uTwq_transactionType` (`id`, `name`) VALUES
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
-- Structure for table `uTwq_transactions`
--

DROP TABLE IF EXISTS `uTwq_transactions`;

CREATE TABLE `uTwq_transactions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `uTwq_userIncomeMap`
--

DROP TABLE IF EXISTS `uTwq_userIncomeMap`;

CREATE TABLE `uTwq_userIncomeMap` (
  `user_id` int(11) NOT NULL,
  `itemVatCat_id` int(11) NOT NULL,
`account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `uTwq_userIncomeMap`
--

INSERT INTO `uTwq_userIncomeMap` (`user_id`, `itemVatCat_id`, `account_id`) VALUES
 ('1', '1', '100'),
 ('1', '2', '100'),
 ('1', '12', '100');



--
-- Structure for table `user`
--

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
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
  `language` varchar(10) NOT NULL,
  `theme` varchar(255) NOT NULL,
  `timezone` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Data for table `user`
--

INSERT INTO `user` (`id`, `username`, `fname`, `lname`, `password`, `lastlogin`, `cookie`, `hash`, `certpasswd`, `salt`, `email`, `language`, `theme`, `timezone`) VALUES
 ('1', 'admin', '???', '?? ???', '9401b8c7297832c567ae922cc596a4dd', '0000-00-00 00:00:00', '99baccbbb287d2ee4f56c3da4b221c03', 'fec171a4459c6056a4beb4928b6736fa', 'test123', '28b206548469ce62182048fd9cf91760', 'ari@speedcomp.co.il', 'he_il', '', 'Asia/Jerusalem'),
 ('11', 'ari', '???', '?? ?????', '553c8dbb425de82df264078e775c9379', '0000-00-00 00:00:00', '', NULL, 'test123', 'ae8ab16af5a715ce98559676b3b38e465fd3c311', 'aribhour@gmail.com', 'he_il', '', 'Asia/Jerusalem');



--
-- Structure for table `xG2N_AuthAssignment`
--

DROP TABLE IF EXISTS `xG2N_AuthAssignment`;

CREATE TABLE `xG2N_AuthAssignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,
`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `xG2N_AuthAssignment`
--

INSERT INTO `xG2N_AuthAssignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
 ('Admin', '1', NULL, 'N;'),
 ('Authenticated', '2', NULL, 'N;');



--
-- Structure for table `xG2N_AuthItem`
--

DROP TABLE IF EXISTS `xG2N_AuthItem`;

CREATE TABLE `xG2N_AuthItem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `xG2N_AuthItem`
--

INSERT INTO `xG2N_AuthItem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
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
-- Structure for table `xG2N_AuthItemChild`
--

DROP TABLE IF EXISTS `xG2N_AuthItemChild`;

CREATE TABLE `xG2N_AuthItemChild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,
`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `xG2N_Rights`
--

DROP TABLE IF EXISTS `xG2N_Rights`;

CREATE TABLE `xG2N_Rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
PRIMARY KEY (`itemname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `xG2N_Rights`
--

INSERT INTO `xG2N_Rights` (`itemname`, `type`, `weight`) VALUES
 ('Authenticated', '2', '1'),
 ('Editor', '2', '0'),
 ('Guest', '2', '2');



--
-- Structure for table `xG2N_accCountry`
--

DROP TABLE IF EXISTS `xG2N_accCountry`;

CREATE TABLE `xG2N_accCountry` (
  `id` varchar(2) NOT NULL DEFAULT '',
  `name` varchar(255) DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `xG2N_accEav`
--

DROP TABLE IF EXISTS `xG2N_accEav`;

CREATE TABLE `xG2N_accEav` (
  `entity` bigint(20) NOT NULL,
  `attribute` varchar(250) NOT NULL,
`value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `xG2N_accEav`
--

INSERT INTO `xG2N_accEav` (`entity`, `attribute`, `value`) VALUES
 ('117', '1', '');



--
-- Structure for table `xG2N_accHist`
--

DROP TABLE IF EXISTS `xG2N_accHist`;

CREATE TABLE `xG2N_accHist` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `account_id` int(11) DEFAULT NULL,
  `dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `details` text,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `xG2N_accId6111`
--

DROP TABLE IF EXISTS `xG2N_accId6111`;

CREATE TABLE `xG2N_accId6111` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `percentage` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5091 DEFAULT CHARSET=utf8;

--
-- Data for table `xG2N_accId6111`
--

INSERT INTO `xG2N_accId6111` (`id`, `name`, `percentage`) VALUES
 ('1010', ' ?????? ??????? ????', '0'),
 ('1020', ' ?????? ??????? ???\"?', '0'),
 ('1030', ' ?????? ???? ??????? ????', '0'),
 ('1040', ' ?????? ???? ??????? ???\"?', '0'),
 ('1090', ' ?????? ?????', '0'),
 ('3510', ' ??? ????? ???????', '0'),
 ('3515', ' ???????', '0'),
 ('3520', ' ?????? ??? ?????? ????', '0'),
 ('3530', ' ????? ???????? ???????', '0'),
 ('3535', ' ?????? ???? ?????', '0'),
 ('3540', ' ??????? ????????', '0'),
 ('3545', ' ?????? ?????', '0'),
 ('3550', ' ?????? ????? ????????', '0'),
 ('3555', ' ?????? ???? ??????', '0'),
 ('3560', ' ??????', '0'),
 ('3565', ' ????? ??? ???????', '0'),
 ('3570', ' ??? ?????? ?????? ?????', '0'),
 ('3575', ' ????? ??????', '0'),
 ('3580', ' ???', '0'),
 ('3590', ' ???? ????', '0'),
 ('3595', ' ????? ???????', '0'),
 ('3600', ' ??????? ?????? ???????', '0'),
 ('3610', ' ????? ??????? ???????', '0'),
 ('3620', ' ????? ?????? ??????', '0'),
 ('3625', ' ??????? ????? ?????? ?????', '0'),
 ('3640', ' ??? ?????', '0'),
 ('3650', ' ?????? ???? ???????', '0'),
 ('3660', ' ?????? ???\"?', '0'),
 ('3665', ' ?????? ???????', '0'),
 ('3680', ' ???????', '0'),
 ('3685', ' ???? ?????', '0'),
 ('3690', ' ????? ??? ??????? ?????', '0'),
 ('5010', ' ????? ???', '0'),
 ('5090', ' ????? ?????? ?????', '0');



--
-- Structure for table `xG2N_accTemplate`
--

DROP TABLE IF EXISTS `xG2N_accTemplate`;

CREATE TABLE `xG2N_accTemplate` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `AccType_id` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `xG2N_accTemplateItem`
--

DROP TABLE IF EXISTS `xG2N_accTemplateItem`;

CREATE TABLE `xG2N_accTemplateItem` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `AccTemplate_id` int(11) NOT NULL,
  `eavFields_id` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `xG2N_accType`
--

DROP TABLE IF EXISTS `xG2N_accType`;

CREATE TABLE `xG2N_accType` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `desc` varchar(40) NOT NULL,
  `openformat` varchar(5) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Data for table `xG2N_accType`
--

INSERT INTO `xG2N_accType` (`id`, `name`, `desc`, `openformat`) VALUES
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
-- Structure for table `xG2N_accounts`
--

DROP TABLE IF EXISTS `xG2N_accounts`;

CREATE TABLE `xG2N_accounts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` int(11) DEFAULT NULL,
  `id6111` int(10) DEFAULT NULL,
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
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8;

--
-- Data for table `xG2N_accounts`
--

INSERT INTO `xG2N_accounts` (`id`, `type`, `id6111`, `pay_terms`, `src_tax`, `src_date`, `parent_account_id`, `name`, `contact`, `department`, `vatnum`, `email`, `phone`, `dir_phone`, `cellular`, `fax`, `web`, `address`, `city`, `zip`, `currency_id`, `comments`, `system_acc`, `owner`, `modified`, `created`) VALUES
 ('1', '6', '0', '0', '0.00', '2013-08-11 12:43:52', '0', '??\"? ??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('2', '6', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '??\"? ?????? ???? ??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('3', '6', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '??\"? ??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('4', '6', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '??\"? ???', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('5', '6', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ????? ??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('6', '4', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('7', '4', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '???? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('8', '6', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ????? ???????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('9', '4', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('10', '4', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '???? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('11', '4', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '???? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('13', '6', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '?? ????? ??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('14', '6', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ????? ??\"?', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('15', '6', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('16', '6', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '?? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('17', '2', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '???? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('18', '2', '3510', '0', '0.00', '0000-00-00 00:00:00', '0', '??? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('30', '2', '3575', '0', '0.00', '0000-00-00 00:00:00', '0', '?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('31', '2', '3550', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ??? ???????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('32', '2', '3550', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('33', '2', '3565', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ???', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('34', '2', '3565', '0', '66.66', '0000-00-00 00:00:00', '0', '????? ???', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('35', '2', '3545', '0', '100.00', '0000-00-00 00:00:00', '0', '??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('36', '2', '3575', '0', '0.00', '0000-00-00 00:00:00', '0', '??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('37', '2', '3650', '0', '100.00', '0000-00-00 00:00:00', '0', '?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('38', '2', '3685', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('39', '2', '3515', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ???', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('40', '2', '3515', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ?????? ???????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('41', '2', '3515', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('42', '2', '3515', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ?? ?', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('43', '2', '3515', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('44', '2', '3650', '0', '100.00', '0000-00-00 00:00:00', '0', '????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('45', '2', '3565', '0', '25.00', '0000-00-00 00:00:00', '0', '???', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('46', '2', '3565', '0', '100.00', '0000-00-00 00:00:00', '0', '???', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('47', '2', '3575', '0', '0.00', '0000-00-00 00:00:00', '0', '??? ???', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('48', '2', '3575', '0', '0.00', '0000-00-00 00:00:00', '0', '??? ???', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('49', '2', '3680', '0', '100.00', '0000-00-00 00:00:00', '0', '??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('50', '2', '3565', '0', '100.00', '0000-00-00 00:00:00', '0', '??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('51', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ???????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('52', '2', '3600', '0', '100.00', '0000-00-00 00:00:00', '0', '??????? ???????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('53', '2', '3565', '0', '100.00', '0000-00-00 00:00:00', '0', '?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('54', '2', '3590', '0', '100.00', '0000-00-00 00:00:00', '0', '????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('55', '2', '3650', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('56', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', '???? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('57', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', '???? ???', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('58', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', '???? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('59', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', '???? ??', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('60', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', '???? ??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('61', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', '???? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('62', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', '???? ??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('63', '2', '3625', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ?? ???? ????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('64', '2', '3625', '0', '66.66', '0000-00-00 00:00:00', '0', '????? ?? ???? ????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('65', '2', '3560', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ???????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('66', '2', '3560', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('67', '2', '3565', '0', '0.00', '0000-00-00 00:00:00', '0', '??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('68', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', '?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('69', '2', '3650', '0', '100.00', '0000-00-00 00:00:00', '0', '???? ???????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('70', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', '???? ????? ???????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('71', '2', '3650', '0', '100.00', '0000-00-00 00:00:00', '0', '??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('72', '2', '3690', '0', '100.00', '0000-00-00 00:00:00', '0', '???????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('73', '2', '3665', '0', '100.00', '0000-00-00 00:00:00', '0', '???????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('74', '2', '3680', '0', '100.00', '0000-00-00 00:00:00', '0', '???????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('75', '2', '3690', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ??? ??????? ??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('76', '2', '3595', '0', '100.00', '0000-00-00 00:00:00', '0', '??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('77', '2', '3660', '0', '0.00', '0000-00-00 00:00:00', '0', '?????? ???\"?', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('78', '2', '3650', '0', '100.00', '0000-00-00 00:00:00', '0', '?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('79', '2', '3650', '0', '66.66', '0000-00-00 00:00:00', '0', '?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('80', '2', '3600', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ???????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('81', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('82', '2', '5090', '0', '100.00', '0000-00-00 00:00:00', '0', '????? PAYPAL', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('83', '2', '5010', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ???', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('84', '2', '5090', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ?????? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('85', '2', '3580', '0', '0.00', '0000-00-00 00:00:00', '0', '???', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('86', '2', '3620', '0', '100.00', '0000-00-00 00:00:00', '0', '?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('87', '2', '3520', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('88', '2', '3620', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('89', '2', '1340', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ???\"?', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('90', '2', '3565', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ???', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('91', '2', '3690', '0', '100.00', '0000-00-00 00:00:00', '0', '?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('92', '2', '3620', '0', '100.00', '0000-00-00 00:00:00', '0', '?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('93', '2', '3570', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('94', '2', '3570', '0', '100.00', '0000-00-00 00:00:00', '0', '????? ????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('95', '2', '3565', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ???', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('96', '2', '3540', '0', '100.00', '0000-00-00 00:00:00', '0', '??? ???? ???? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('97', '2', '3690', '0', '100.00', '0000-00-00 00:00:00', '0', '????????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('98', '2', '3595', '0', '100.00', '0000-00-00 00:00:00', '0', '?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('99', '2', '3550', '0', '100.00', '0000-00-00 00:00:00', '0', '???????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('100', '3', '1010', '0', '18.00', '2013-08-19 12:03:50', '0', '????? ?????? ????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('101', '3', '1020', '0', '16.00', '2013-08-19 12:03:57', '0', '????? ?????? ????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('102', '3', '1030', '0', '0.00', '2013-08-19 12:04:06', '0', '????? ?????? ???\"?', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('103', '3', '1040', '0', '0.00', '2013-08-19 12:04:11', '0', '????? ?????? ???\"?', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('107', '2', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('109', '2', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '?????? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('110', '1', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '?????? ??\"?', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('111', '2', '3565', '0', '66.66', '0000-00-00 00:00:00', '0', '???', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('112', '2', '3680', '0', '0.00', '0000-00-00 00:00:00', '0', '??????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('113', '0', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '?????? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('114', '1', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '????? ?????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('115', '8', '0', '0', '0.00', '0000-00-00 00:00:00', '0', '???? ????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
 ('116', '0', '1010', NULL, '0.00', NULL, NULL, '???? ??????', '', '', '069924470', '', '', '', '', '', '', '??? ????? 5', '?? ????', '', 'ILS', '', '0', NULL, '0000-00-00 00:00:00', '2014-07-08 17:48:06'),
 ('117', '0', '1010', NULL, '0.00', NULL, NULL, '????? ???? ???? ??\"?', '', '', '300777778', '', '', '', '', '', '', '??? ????? 12', '?? ????', '52215', 'ILS', '', '0', NULL, '2014-07-09 09:11:59', '2014-07-09 09:02:23'),
 ('118', '0', '1010', NULL, '0.00', NULL, NULL, '??? ????? ??\"?', '', '', '300777778', '', '', '', '', '', '', '???? 45', '??? ??', '', 'ILS', '', '0', NULL, '0000-00-00 00:00:00', '2014-07-09 12:49:11'),
 ('119', '3', '1010', NULL, '0.00', NULL, NULL, '????? ?????? ????? ??\"? ????', '', '', '', '', '', '', '', '', '', '', '', '', 'ILS', '', '0', NULL, '0000-00-00 00:00:00', '2014-07-09 17:01:18');



--
-- Structure for table `xG2N_bankName`
--

DROP TABLE IF EXISTS `xG2N_bankName`;

CREATE TABLE `xG2N_bankName` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;

--
-- Data for table `xG2N_bankName`
--

INSERT INTO `xG2N_bankName` (`id`, `name`) VALUES
 ('1', '??? ???? ?????'),
 ('4', '??? ??? ?????? ??????'),
 ('6', '??? ?????'),
 ('7', '??? ?????? ??????'),
 ('8', '??? ?????? ??????'),
 ('9', '??? ?????'),
 ('10', '??? ?????'),
 ('11', '??? ???????'),
 ('12', '??? ???????'),
 ('13', '??? ?????'),
 ('14', '??? ???? ?????'),
 ('17', '??? ??????? ???????'),
 ('19', '??? ??????? ??????'),
 ('20', '??? ????? ?????'),
 ('22', 'Citibank N.A'),
 ('23', 'HSBC'),
 ('25', 'BNP Paribas Israel'),
 ('26', '????? ??\"?'),
 ('31', '???? ????????? ?????? '),
 ('34', '??? ???? ??????'),
 ('39', 'SBI State Bank of India'),
 ('46', '??? ???'),
 ('48', '???? ????? ??????'),
 ('52', '??? ????? ????? ?????'),
 ('54', '??? ???????'),
 ('67', 'Arab Land Bank'),
 ('68', '??? ???? ?????? ??????'),
 ('77', '??? ????? ????????? ??\"?'),
 ('90', '??? ??????? ?????????'),
 ('99', '??? ?????');



--
-- Structure for table `xG2N_bankbook`
--

DROP TABLE IF EXISTS `xG2N_bankbook`;

CREATE TABLE `xG2N_bankbook` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `account_id` int(11) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `details` varchar(60) DEFAULT NULL,
  `refnum` char(10) DEFAULT NULL,
  `sum` decimal(8,2) DEFAULT NULL,
  `total` decimal(8,2) DEFAULT NULL,
  `cor_num` varchar(30) DEFAULT NULL,
  `currency_id` varchar(3) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `xG2N_blackList`
--

DROP TABLE IF EXISTS `xG2N_blackList`;

CREATE TABLE `xG2N_blackList` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `value` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `xG2N_config`
--

DROP TABLE IF EXISTS `xG2N_config`;

CREATE TABLE `xG2N_config` (
  `id` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `eavType` varchar(255) NOT NULL,
  `hidden` tinyint(1) NOT NULL,
  `priority` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `xG2N_config`
--

INSERT INTO `xG2N_config` (`id`, `value`, `eavType`, `hidden`, `priority`) VALUES
 ('company.1.warehouse', '115', 'integer', '1', '40'),
 ('company.11.warehouse', '115', 'integer', '1', '0'),
 ('company.acc.assetvat', '3', 'integer', '1', '40'),
 ('company.acc.buyvat', '1', 'integer', '1', '40'),
 ('company.acc.custtax', '8', 'integer', '1', '40'),
 ('company.acc.irs', '16', 'integer', '1', '40'),
 ('company.acc.natinspay', '14', 'integer', '1', '40'),
 ('company.acc.openbalance', '9', 'integer', '1', '40'),
 ('company.acc.payvat', '4', 'integer', '1', '40'),
 ('company.acc.pretax', '13', 'integer', '1', '40'),
 ('company.acc.sellvat', '3', 'integer', '1', '40'),
 ('company.address', '?????? 4', 'string', '0', '40'),
 ('company.city', '??? ??', 'string', '0', '40'),
 ('company.cur', 'ILS', 'list(Currecies)', '0', '40'),
 ('company.doublebook', 'true', 'boolean', '0', '40'),
 ('company.en.address', '', 'string', '0', '40'),
 ('company.en.city', '', 'string', '0', '40'),
 ('company.en.name', '', 'string', '0', '40'),
 ('company.fax', '', 'string', '0', '40'),
 ('company.logo', '1', 'file', '0', '40'),
 ('company.mail.address', '', 'string', '0', '40'),
 ('company.mail.password', '', 'string', '0', '40'),
 ('company.mail.port', '', 'string', '0', '40'),
 ('company.mail.server', '', 'string', '0', '40'),
 ('company.mail.ssl', 'false', 'boolean', '0', '40'),
 ('company.mail.user', '', 'string', '0', '40'),
 ('company.name', '???? ????? ???? ??\"?', 'string', '0', '1'),
 ('company.path', 'xG2N_', 'string', '1', '40'),
 ('company.pdfprint', 'true', 'boolean', '0', '40'),
 ('company.phone', '', 'string', '0', '40'),
 ('company.po', '', 'string', '0', '40'),
 ('company.seccur', 'AED', 'list(Currecies)', '0', '40'),
 ('company.stock', 'false', 'boolean', '0', '40'),
 ('company.tax.irs', '1', 'select({1:\"monthly\",2:\"bi-monthly\"})', '0', '40'),
 ('company.tax.rate', '10', 'integer', '0', '40'),
 ('company.tax.vat', '1', 'select({1:\"monthly\",2:\"bi-monthly\"})', '0', '40'),
 ('company.transaction', '16', 'integer', '1', '40'),
 ('company.vat.id', '069924496', 'integer', '0', '2'),
 ('company.website', '', 'string', '0', '40'),
 ('company.zip', '', 'string', '0', '40'),
 ('paypal.apiLive', 'false', 'boolean', '0', '40'),
 ('paypal.apiPassword', '', '', '0', '40'),
 ('paypal.apiSignature', '', '', '0', '40'),
 ('paypal.apiUsername', '', '', '0', '40'),
 ('server.checkTime', '20130324114336', '', '1', '40'),
 ('server.dbVersion', '3.0', '', '1', '40'),
 ('server.Latest', '', '', '1', '40'),
 ('server.Version', '3.0', '', '1', '40'),
 ('server.wkhtmltopdf', 'xvfb-run -a -s \"-screen 0 1024x768x16\" wkhtmltopdf', 'string', '0', '40'),
 ('system.auth', '179403', 'string', '1', '40'),
 ('system.name', 'Linet 3.0', 'string', '1', '40'),
 ('system.vendor.name', 'Speedcomp', 'string', '1', '40'),
 ('system.vendor.vatnum', '069924504', 'string', '1', '40'),
 ('system.version', '3.0', 'string', '1', '40'),
 ('transactionType.chequedeposit', '4', 'integer', '1', '40'),
 ('transactionType.manual', '0', 'integer', '1', '40'),
 ('transactionType.openBalance', '16', 'integer', '1', '40'),
 ('transactionType.supplierPayment', '5', 'integer', '1', '40');



--
-- Structure for table `xG2N_curRates`
--

DROP TABLE IF EXISTS `xG2N_curRates`;

CREATE TABLE `xG2N_curRates` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `currency_id` varchar(3) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `value` decimal(10,5) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Data for table `xG2N_curRates`
--

INSERT INTO `xG2N_curRates` (`id`, `currency_id`, `date`, `value`) VALUES
 ('1', 'ILS', '1999-12-31 22:00:01', '1.00000');



--
-- Structure for table `xG2N_docCheques`
--

DROP TABLE IF EXISTS `xG2N_docCheques`;

CREATE TABLE `xG2N_docCheques` (
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
-- Data for table `xG2N_docCheques`
--

INSERT INTO `xG2N_docCheques` (`doc_id`, `type`, `refnum`, `creditcompany`, `cheque_num`, `bank`, `branch`, `cheque_acct`, `cheque_date`, `currency_id`, `sum`, `bank_refnum`, `dep_date`, `line`) VALUES
 ('7', '1', '', NULL, '', NULL, NULL, '', '1970-01-01 02:01:00', 'ILS', '53.10', NULL, '1970-01-01 02:01:00', '1'),
 ('8', '1', '', NULL, '', NULL, NULL, '', '2014-07-09 00:07:00', 'ILS', '53.10', NULL, '1970-01-01 02:01:00', '1'),
 ('9', '2', '6545653', NULL, '64565464', NULL, NULL, '35352', '2014-07-09 00:07:00', 'ILS', '53.10', NULL, '1970-01-01 02:01:00', '1'),
 ('14', '1', '', NULL, '', NULL, NULL, '', '1970-01-01 02:01:00', 'ILS', '53.10', NULL, '1970-01-01 02:01:00', '1');



--
-- Structure for table `xG2N_docDetails`
--

DROP TABLE IF EXISTS `xG2N_docDetails`;

CREATE TABLE `xG2N_docDetails` (
  `doc_id` int(11) NOT NULL DEFAULT '0',
  `item_id` int(11) DEFAULT NULL,
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
  PRIMARY KEY (`doc_id`,
`line`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `xG2N_docDetails`
--

INSERT INTO `xG2N_docDetails` (`doc_id`, `item_id`, `name`, `description`, `qty`, `unit_price`, `unit_id`, `currency_id`, `price`, `invprice`, `vat`, `line`) VALUES
 ('1', '1', '????? ???????', '', '1.00', '45.00', '0', 'ILS', '45.00', '45.00', '0.00', '1'),
 ('2', '1', '????? ???????', '', '1.00', '45.00', '0', 'ILS', '45.00', '45.00', '0.00', '1'),
 ('3', '1', '????? ???????', '', '1.00', '45.00', '0', 'ILS', '45.00', '45.00', '8.10', '1'),
 ('4', '1', '????? ???????', '', '1.00', '45.00', '0', 'ILS', '45.00', '45.00', '8.10', '1'),
 ('5', '1', '????? ???????', '??? ????? ???????? ????? ???????? ????? ???????? ????? ???????? ????? ???????? ????? ???????? ????? ???????? ????? ???????? ????? ???????? ????? ???????? ????? ???????? ????? ???????? ????? ???????? ????? ???????? ????? ???????? ????? ???????? ????? ???????? ????? ???????? ????? ?????', '1.00', '45.00', '0', 'ILS', '45.00', '45.00', '8.10', '1'),
 ('6', '1', '????? ???????', '??? ????? ???????? ????? ???????? ????? ???????? ????? ???????? ????? ???????? ????? ???????? ????? ???????? ????? ???????? ????? ???????? ????? ???????? ????? ???????? ????? ???????? ????? ???????? ????? ???????? ????? ???????? ????? ???????? ????? ???????? ????? ???????? ????? ?????', '1.00', '45.00', '0', 'ILS', '45.00', '45.00', '8.10', '1'),
 ('11', '2', '???? ????? ?? ???????', '??? ????? ???????? ????? ???????? ????? ???????? ????? ???????? \r\n??? ????? ???????? ????? ???????? ????? ???????? ????? ???????? \r\n??? ????? ???????? ????? ???????? ????? ???????? ????? ???????? \r\n??? ????? ???????? ????? ???????? ????? ???????? ????? ???????? \r\n??? ????? ???????? ????? ???????? ????? ???????? ????? ???????? \r\n??? ????? ???????? ????? ???????? ????? ???????? ????? ???????? \r\n??? ????? ???????? ????? ???????? ????? ???????? ????? ???????? \r\n', '1.00', '4550.00', '0', 'ILS', '4550.00', '4550.00', '819.00', '1'),
 ('11', '3', '???? ???? ???\"? ?????', '', '1.00', '2450.00', '0', 'ILS', '2450.00', '2450.00', '441.00', '2'),
 ('12', '2', '???? ????? ?? ???????', '??? ????? ???????? ????? ???????? ????? ???????? ????? ???????? \r\n??? ????? ???????? ????? ???????? ????? ???????? ????? ???????? \r\n??? ????? ???????? ????? ???????? ????? ???????? ????? ???????? \r\n??? ????? ???????? ????? ???????? ????? ???????? ????? ???????? \r\n??? ????? ???????? ????? ???????? ????? ???????? ????? ???????? \r\n??? ????? ???????? ????? ???????? ????? ???????? ????? ???????? \r\n??? ????? ???????? ????? ???????? ????? ???????? ????? ???????? \r\n', '1.00', '4550.00', '0', 'ILS', '4550.00', '4550.00', '819.00', '1'),
 ('12', '3', '???? ???? ???\"? ?????', '', '1.00', '2450.00', '0', 'ILS', '2450.00', '2450.00', '441.00', '2'),
 ('13', '2', '???? ????? ?? ???????', '??? ????? ???????? ????? ???????? ????? ???????? ????? ???????? \r\n??? ????? ???????? ????? ???????? ????? ???????? ????? ???????? \r\n??? ????? ???????? ????? ???????? ????? ???????? ????? ???????? \r\n??? ????? ???????? ????? ???????? ????? ???????? ????? ???????? \r\n??? ????? ???????? ????? ???????? ????? ???????? ????? ???????? \r\n??? ????? ???????? ????? ???????? ????? ???????? ????? ???????? \r\n??? ????? ???????? ????? ???????? ????? ???????? ????? ???????? \r\n', '1.00', '4550.00', '0', 'ILS', '4550.00', '4550.00', '819.00', '1'),
 ('13', '3', '???? ???? ???\"? ?????', '', '1.00', '2450.00', '0', 'ILS', '2450.00', '2450.00', '441.00', '2'),
 ('15', '1', '????? ???????', '', '1.00', '45.00', '0', 'ILS', '45.00', '45.00', '8.10', '1'),
 ('16', '3', '???? ???? ???\"? ?????', '', '1.00', '2450.00', '0', 'ILS', '2450.00', '2450.00', '441.00', '1'),
 ('17', '2', '???? ????? ?? ???????', '??? ????? ???????? ????? ???????? ????? ???????? ????? ???????? \r\n??? ????? ???????? ????? ???????? ????? ???????? ????? ???????? \r\n??? ????? ???????? ????? ???????? ????? ???????? ????? ???????? \r\n??? ????? ???????? ????? ???????? ????? ???????? ????? ???????? \r\n??? ????? ???????? ????? ???????? ????? ???????? ????? ???????? \r\n??? ????? ???????? ????? ???????? ????? ???????? ????? ???????? \r\n??? ????? ???????? ????? ???????? ????? ???????? ????? ???????? \r\n', '1.00', '4550.00', '0', 'ILS', '4550.00', '4550.00', '819.00', '1'),
 ('17', '3', '???? ???? ???\"? ?????', '', '1.00', '2450.00', '0', 'ILS', '2450.00', '2450.00', '441.00', '2'),
 ('18', '4', '?? ???', '', '1.00', '24.00', '0', 'ILS', '24.00', '24.00', '4.32', '1'),
 ('18', '5', '??????', '', '1.00', '15.00', '0', 'ILS', '15.00', '15.00', '2.70', '2'),
 ('19', '4', '?? ???', '', '1.00', '24.00', '0', 'ILS', '24.00', '24.00', '4.32', '1'),
 ('19', '5', '??????', '', '1.00', '15.00', '0', 'ILS', '15.00', '15.00', '2.70', '2'),
 ('20', '4', '?? ???', '', '1.00', '24.00', '0', 'ILS', '24.00', '24.00', '4.32', '1'),
 ('20', '5', '??????', '', '1.00', '15.00', '0', 'ILS', '15.00', '15.00', '2.70', '2'),
 ('21', '5', '??????', '', '3.00', '15.00', '0', 'ILS', '45.00', '45.00', '8.10', '1'),
 ('22', '4', '?? ???', '', '1.00', '24.00', '0', 'ILS', '24.00', '24.00', '4.32', '1'),
 ('22', '5', '??????', '', '1.00', '15.00', '0', 'ILS', '15.00', '15.00', '2.70', '2'),
 ('23', '5', '??????', '', '3.00', '15.00', '0', 'ILS', '45.00', '45.00', '8.10', '1'),
 ('24', '5', '??????', '', '1.00', '15.00', '0', 'ILS', '15.00', '15.00', '2.70', '1'),
 ('26', '5', '??????', '', '50.00', '15.00', '0', 'ILS', '750.00', '750.00', '135.00', '1'),
 ('26', '4', '?? ???', '', '23.00', '24.00', '0', 'ILS', '552.00', '552.00', '99.36', '2'),
 ('27', '4', '?? ???', '', '1.00', '24.00', '0', 'ILS', '24.00', '24.00', '0.00', '1'),
 ('27', '3', '???? ???? ???\"? ?????', '', '1.00', '2450.00', '0', 'ILS', '2450.00', '2450.00', '441.00', '2'),
 ('28', '5', '??????', '', '13.00', '15.00', '0', 'ILS', '195.00', '195.00', '35.10', '1'),
 ('29', '2', '???? ????? ?? ???????', '', '1.00', '4550.00', '0', 'ILS', '4550.00', '4550.00', '819.00', '1'),
 ('29', '3', '???? ???? ???\"? ?????', '', '1.00', '2450.00', '0', 'ILS', '2450.00', '2450.00', '0.00', '2'),
 ('30', '3', '???? ???? ???\"? ?????', '', '1.00', '2450.00', '0', 'ILS', '2450.00', '2450.00', '0.00', '1'),
 ('30', '4', '?? ???', '', '30.00', '24.00', '0', 'ILS', '720.00', '720.00', '129.60', '2'),
 ('31', '5', '??????', '', '1.00', '15.00', '0', 'ILS', '15.00', '15.00', '2.70', '1'),
 ('32', '1', '????? ???????', '', '1.00', '45.00', '0', 'ILS', '45.00', '45.00', '8.10', '1'),
 ('33', '4', '?? ???', '', '1.00', '24.00', '0', 'ILS', '24.00', '24.00', '4.32', '1');



--
-- Structure for table `xG2N_docStatus`
--

DROP TABLE IF EXISTS `xG2N_docStatus`;

CREATE TABLE `xG2N_docStatus` (
  `num` int(11) NOT NULL,
  `doc_type` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `looked` tinyint(1) NOT NULL,
  `action` varchar(255) NOT NULL,
  PRIMARY KEY (`num`,
`doc_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `xG2N_docStatus`
--

INSERT INTO `xG2N_docStatus` (`num`, `doc_type`, `name`, `looked`, `action`) VALUES
 ('1', '1', '?????', '0', '0'),
 ('1', '2', '?????', '0', '0'),
 ('1', '3', '?????', '0', '0'),
 ('1', '4', '?????', '0', '0'),
 ('1', '5', '?????', '0', '0'),
 ('1', '6', '?????', '0', '0'),
 ('1', '7', '?????', '0', '0'),
 ('1', '8', '?????', '0', '0'),
 ('1', '9', '?????', '0', '0'),
 ('1', '10', '?????', '0', '0'),
 ('1', '11', '?????', '0', '0'),
 ('1', '12', '?????', '0', '0'),
 ('1', '13', '?????', '0', '0'),
 ('1', '14', '?????', '0', '0'),
 ('1', '15', '?????', '0', '0'),
 ('2', '1', '????', '0', '1'),
 ('2', '2', '????', '1', '1'),
 ('2', '3', '????', '1', '1'),
 ('2', '4', '????', '1', '1'),
 ('2', '5', '????', '0', '1'),
 ('2', '6', '????', '0', '1'),
 ('2', '7', '????', '1', '1'),
 ('2', '8', '????', '1', '1'),
 ('2', '9', '????', '1', '1'),
 ('2', '10', '????', '0', '1'),
 ('2', '11', '????', '1', '1'),
 ('2', '12', '????', '1', '1'),
 ('2', '13', '????', '1', '1'),
 ('2', '14', '????', '1', '1'),
 ('2', '15', '????', '1', '1');



--
-- Structure for table `xG2N_docType`
--

DROP TABLE IF EXISTS `xG2N_docType`;

CREATE TABLE `xG2N_docType` (
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
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Data for table `xG2N_docType`
--

INSERT INTO `xG2N_docType` (`id`, `name`, `openformat`, `isdoc`, `isrecipet`, `iscontract`, `looked`, `stockAction`, `account_type`, `docStatus_id`, `last_docnum`, `oppt_account_type`, `transactionType_id`, `vat_acc_id`, `header`, `footer`, `stockSwitch`, `copy`) VALUES
 ('1', 'Proforma', '300', '1', '0', '0', '1', '-1', '0', '2', '2', NULL, NULL, '3', '', '', '0', '1'),
 ('2', 'Delivery doc.', '200', '1', '0', '0', '0', '-1', '0', '2', '5', NULL, NULL, '3', '', '', '0', '1'),
 ('3', 'Invoice', '305', '1', '0', '0', '1', '-1', '0', '2', '14', NULL, '1', '3', '', '', '1', '1'),
 ('4', 'Credit invoice', '330', '1', '0', '0', '0', '1', '0', '2', '2', NULL, '17', '3', '', '', '1', '1'),
 ('5', 'Return document', '210', '1', '0', '0', '0', '1', '0', '2', '1', NULL, '19', '3', '', '', '1', '1'),
 ('6', 'Quote', '0', '1', '0', '0', '0', '0', '0', '2', '5', NULL, NULL, '3', '', '', '0', '0'),
 ('7', 'Sales Order', '0', '1', '0', '0', '0', '0', '0', '2', '4', NULL, NULL, '3', '', '', '0', '0'),
 ('8', 'Receipt', '400', '0', '1', '0', '1', '0', '0', '2', '7', NULL, '3', '3', '', '', '0', '1'),
 ('9', 'Invoice Receipt', '320', '1', '1', '0', '1', '-1', '0', '2', '1', NULL, '18', '3', '', '', '1', '1'),
 ('10', 'Purchase Order', '500', '1', '0', '0', '0', '0', '1', '2', '1', NULL, NULL, '3', '', '', '0', '1'),
 ('11', 'Manual invoice', '0', '1', '0', '0', '1', '1', '1', '2', '1', NULL, '11', '3', '', '', '1', '1'),
 ('12', 'Manual receipt', '0', '1', '0', '0', '1', '1', '1', '2', '1', NULL, '12', '3', '', '', '0', '1'),
 ('13', 'Buisness outcome', '0', '1', '0', '0', '0', '1', '1', '2', '1', '2', '5', '1', '', '', '0', '0'),
 ('14', 'Asstes outcome', '0', '1', '0', '0', '0', '1', '1', '2', '1', '4', '5', '2', '', '', '0', '0'),
 ('15', 'Warehouse transaction', '830', '1', '0', '0', '0', '1', '8', '2', '1', '8', NULL, '0', '', '', '0', '1');



--
-- Structure for table `xG2N_docs`
--

DROP TABLE IF EXISTS `xG2N_docs`;

CREATE TABLE `xG2N_docs` (
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
  `printed` int(11) NOT NULL,
  `comments` text,
  `description` text NOT NULL,
  `oppt_account_id` int(11) DEFAULT NULL,
  `action` tinyint(1) NOT NULL,
  `refstatus` int(11) NOT NULL,
  `owner` int(11) DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Data for table `xG2N_docs`
--

INSERT INTO `xG2N_docs` (`id`, `doctype`, `docnum`, `account_id`, `company`, `address`, `city`, `zip`, `vatnum`, `refnum`, `issue_date`, `due_date`, `modified`, `discount`, `sub_total`, `novat_total`, `vat`, `total`, `currency_id`, `src_tax`, `status`, `printed`, `comments`, `description`, `oppt_account_id`, `action`, `refstatus`, `owner`) VALUES
 ('1', '6', '2', '116', '???? ??????', '??? ????? 5', '?? ????', '', '069924470', '', '2014-07-09 08:27:38', '2014-07-09 08:27:38', '2014-07-09 08:27:38', '0.00', '45.00', '45.00', '0.00', '45.00', 'ILS', NULL, '2', '1', '', '', NULL, '1', '0', '1'),
 ('2', '6', '3', '116', '???? ??????', '??? ????? 5', '?? ????', '', '069924470', '', '2014-07-09 08:27:26', '2014-07-09 08:27:26', '2014-07-09 08:28:26', '0.00', '45.00', '45.00', '0.00', '45.00', 'ILS', NULL, '2', '0', '', '', NULL, '1', '0', '1'),
 ('3', '7', '2', '116', '???? ??????', '??? ????? 5', '?? ????', '', '069924470', '', '2014-07-09 08:27:24', '2014-07-09 08:27:24', '2014-07-09 08:38:24', '0.00', '45.00', '45.00', '8.10', '53.10', 'ILS', NULL, '2', '0', '', '', NULL, '1', '0', '1'),
 ('4', '2', '2', '116', '???? ??????', '??? ????? 5', '?? ????', '', '069924470', '', '2014-07-09 08:27:27', '2014-07-09 08:27:27', '2014-07-09 08:39:27', '0.00', '45.00', '45.00', '8.10', '53.10', 'ILS', NULL, '2', '0', '', '', NULL, '1', '0', '1'),
 ('5', '2', '3', '116', '???? ??????', '??? ????? 5', '?? ????', '', '069924470', '', '2014-07-09 08:27:07', '2014-07-09 08:27:07', '2014-07-09 08:49:07', '0.00', '45.00', '45.00', '8.10', '53.10', 'ILS', NULL, '2', '0', '<p>??? ????? ????? ??? ????? ?????</p>\r\n<p>??? ????? ????? ??? ????? ????? ??? ????? ????? ??? ????? ????? ??? ????? ????? ??? ????? ????? </p>\r\n<p>??? ????? ?????</p>', '<p>??? ????? ????? ??? ????? ????? ??? ????? ????? ??? ????? ????? ??? ????? ????? ??? ????? ????? ??? ????? ????? ??? ????? ????? ??? ????? ???????? ????? ?????</p>', NULL, '1', '0', '1'),
 ('6', '3', '2', '116', '???? ??????', '??? ????? 5', '?? ????', '', '069924470', '14', '2014-07-09 08:27:27', '2014-07-09 08:27:27', '2014-07-09 10:21:27', '0.00', '45.00', '45.00', '8.10', '53.10', 'ILS', NULL, '2', '0', '<p>??? ????? ????? ??? ????? ?????</p>\r\n<p>??? ????? ????? ??? ????? ????? ??? ????? ????? ??? ????? ????? ??? ????? ????? ??? ????? ?????</p>\r\n<p>??? ????? ?????</p>', '<p>??? ????? ????? ??? ????? ????? ??? ????? ????? ??? ????? ????? ??? ????? ????? ??? ????? ????? ??? ????? ????? ??? ????? ????? ??? ????? ???????? ????? ?????</p>', NULL, '1', '1', '1'),
 ('7', '8', '2', '116', '???? ??????', '??? ????? 5', '?? ????', '', '069924470', '', '2014-07-09 08:54:21', '2014-07-09 08:54:21', '2014-07-09 08:55:21', '0.00', NULL, NULL, NULL, '0.00', 'ILS', '0.00', '2', '0', '', '', NULL, '1', '0', '1'),
 ('8', '8', '3', '116', '???? ??????', '??? ????? 5', '?? ????', '', '069924470', '', '2014-07-09 08:55:26', '2014-07-09 08:55:26', '2014-07-09 08:56:26', '0.00', NULL, NULL, NULL, '0.00', 'ILS', '0.00', '2', '0', '', '', NULL, '1', '0', '1'),
 ('9', '8', '4', '116', '???? ??????', '??? ????? 5', '?? ????', '', '069924470', '', '2014-07-09 08:58:35', '2014-07-09 08:58:35', '2014-07-09 08:58:35', '0.00', NULL, NULL, NULL, '53.10', 'ILS', '0.00', '2', '0', '', '', NULL, '1', '0', '1'),
 ('10', '8', '5', '116', '???? ??????', '??? ????? 5', '?? ????', '', '069924470', '', '2014-07-09 08:59:36', '2014-07-09 08:59:36', '2014-07-09 08:59:36', '0.00', NULL, NULL, NULL, '0.00', 'ILS', '0.00', '2', '0', '', '', NULL, '1', '0', '1'),
 ('11', '6', '4', '117', '????? ???? ???? ??\"?', '??? ????? 12', '?? ????', '52215', '300777778', '21', '2014-07-09 09:13:49', '2014-07-09 09:13:49', '2014-07-09 14:12:49', '0.00', '7000.00', '7000.00', '1260.00', '8260.00', 'ILS', NULL, '2', '0', '', '', NULL, '1', '0', '1'),
 ('12', '7', '3', '117', '????? ???? ???? ??\"?', '??? ????? 12', '?? ????', '52215', '300777778', '17', '2014-07-09 09:13:01', '2014-07-09 09:13:01', '2014-07-09 12:46:01', '0.00', '7000.00', '7000.00', '1260.00', '8260.00', 'ILS', NULL, '2', '0', '<p style=\"text-align: right;\">??? ???? ?????</p>\r\n<p style=\"text-align: right;\">??? ???? ?????</p>\r\n<p style=\"text-align: right;\">??? ???? ?????</p>\r\n<p style=\"text-align: right;\">??? ???? ?????</p>\r\n<p style=\"text-align: right;\">??? ???? ?????</p>\r\n<p style=\"text-align: right;\">&nbsp;</p>', '<p style=\"text-align: right;\">??? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ?????</p>\r\n<p style=\"text-align: right;\">??? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ?????</p>\r\n<p style=\"text-align: right;\">??? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ?????</p>\r\n<p style=\"text-align: right;\">??? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ?????</p>', NULL, '1', '1', '1'),
 ('13', '2', '4', '117', '????? ???? ???? ??\"?', '??? ????? 12', '?? ????', '52215', '300777778', '17', '2014-07-09 09:13:01', '2014-07-09 09:13:01', '2014-07-09 12:46:01', '0.00', '7000.00', '7000.00', '1260.00', '8260.00', 'ILS', NULL, '2', '0', '<p style=\"text-align: right;\">??? ???? ?????</p>\r\n<p style=\"text-align: right;\">??? ???? ?????</p>\r\n<p style=\"text-align: right;\">??? ???? ?????</p>\r\n<p style=\"text-align: right;\">??? ???? ?????</p>\r\n<p style=\"text-align: right;\">??? ???? ?????</p>\r\n<p style=\"text-align: right;\">&nbsp;</p>', '<p style=\"text-align: right;\">??? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ?????</p>\r\n<p style=\"text-align: right;\">??? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ?????</p>\r\n<p style=\"text-align: right;\">??? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ?????</p>\r\n<p style=\"text-align: right;\">??? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ?????</p>', NULL, '1', '0', '1'),
 ('14', '8', '6', '116', '???? ??????', '??? ????? 5', '?? ????', '', '069924470', '', '2014-07-09 10:19:27', '2014-07-09 10:19:27', '2014-07-09 10:21:27', '0.00', NULL, NULL, NULL, '53.10', 'ILS', '0.00', '2', '0', '', '', NULL, '1', '0', '1'),
 ('15', '3', '3', '117', '????? ???? ???? ??\"?', '??? ????? 12', '?? ????', '52215', '300777778', '', '2014-07-09 11:32:19', '2014-07-09 11:32:19', '2014-07-09 12:48:19', '0.00', '45.00', '45.00', '8.10', '53.10', 'ILS', NULL, '2', '1', '', '', NULL, '1', '0', '1'),
 ('16', '3', '4', '117', '????? ???? ???? ??\"?', '??? ????? 12', '?? ????', '52215', '300777778', '', '2014-07-09 11:36:39', '2014-07-09 11:36:39', '2014-07-09 12:46:39', '0.00', '2450.00', '2450.00', '441.00', '2891.00', 'ILS', NULL, '2', '0', '', '', NULL, '1', '0', '1'),
 ('17', '3', '5', '117', '????? ???? ???? ??\"?', '??? ????? 12', '?? ????', '52215', '300777778', '', '2014-07-09 09:13:01', '2014-07-09 09:13:01', '2014-07-09 12:46:01', '0.00', '7000.00', '7000.00', '1260.00', '8260.00', 'ILS', NULL, '2', '0', '<p style=\"text-align: right;\">??? ???? ?????</p>\r\n<p style=\"text-align: right;\">??? ???? ?????</p>\r\n<p style=\"text-align: right;\">??? ???? ?????</p>\r\n<p style=\"text-align: right;\">??? ???? ?????</p>\r\n<p style=\"text-align: right;\">??? ???? ?????</p>\r\n<p style=\"text-align: right;\">&nbsp;</p>', '<p style=\"text-align: right;\">??? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ?????</p>\r\n<p style=\"text-align: right;\">??? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ?????</p>\r\n<p style=\"text-align: right;\">??? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ?????</p>\r\n<p style=\"text-align: right;\">??? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ???????? ???? ?????</p>', NULL, '1', '0', '1'),
 ('18', '6', '5', '118', '??? ????? ??\"?', '???? 45', '??? ??', '', '300777778', '19', '2014-07-09 13:06:22', '2014-07-09 13:06:22', '2014-07-09 14:08:22', '0.00', '39.00', '39.00', '7.02', '46.02', 'ILS', NULL, '2', '1', '', '', NULL, '1', '1', '1'),
 ('19', '7', '4', '118', '??? ????? ??\"?', '???? 45', '??? ??', '', '300777778', '20', '2014-07-09 13:06:22', '2014-07-09 13:06:22', '2014-07-09 14:08:22', '0.00', '39.00', '39.00', '7.02', '46.02', 'ILS', NULL, '2', '2', '', '', NULL, '1', '1', '1'),
 ('20', '2', '5', '118', '??? ????? ??\"?', '???? 45', '??? ??', '', '300777778', '22', '2014-07-09 13:06:00', '2014-07-09 13:06:00', '2014-07-09 14:07:00', '0.00', '39.00', '39.00', '7.02', '46.02', 'ILS', NULL, '2', '2', '', '', NULL, '1', '1', '1'),
 ('21', '3', '6', '118', '??? ????? ??\"?', '???? 45', '??? ??', '', '300777778', '23', '2014-07-09 13:23:49', '2014-07-09 13:23:49', '2014-07-09 14:12:49', '0.00', '45.00', '45.00', '8.10', '53.10', 'ILS', NULL, '2', '9', '', '', NULL, '1', '1', '1'),
 ('22', '3', '7', '118', '??? ????? ??\"?', '???? 45', '??? ??', '', '300777778', '', '2014-07-09 13:06:27', '2014-07-09 13:06:27', '2014-07-09 14:04:27', '0.00', '39.00', '39.00', '7.02', '46.02', 'ILS', NULL, '2', '1', '', '', NULL, '1', '0', '1'),
 ('23', '4', '2', '118', '??? ????? ??\"?', '???? 45', '??? ??', '', '300777778', '', '2014-07-09 13:23:49', '2014-07-09 13:23:49', '2014-07-09 14:12:49', '0.00', '45.00', '45.00', '8.10', '53.10', 'ILS', NULL, '2', '1', '', '', NULL, '1', '0', '1'),
 ('24', '3', '8', '118', '??? ????? ??\"?', '???? 45', '??? ??', '', '300777778', '25', '2014-07-09 14:10:52', '2014-07-09 14:10:52', '2014-07-09 14:25:52', '0.00', '15.00', '15.00', '2.70', '17.70', 'ILS', NULL, '2', '1', '', '', NULL, '1', '1', '1'),
 ('25', '8', '7', '118', '??? ????? ??\"?', '???? 45', '??? ??', '', '300777778', '', '2014-07-09 14:25:52', '2014-07-09 14:25:52', '2014-07-09 14:25:52', '0.00', NULL, NULL, NULL, '17.70', 'ILS', '0.00', '2', '1', '', '', NULL, '1', '0', '1'),
 ('26', '3', '9', '118', '??? ????? ??\"?', '???? 45', '??? ??', '', '300777778', '', '2014-07-09 14:43:25', '2014-07-09 14:43:25', '2014-07-09 14:44:25', '0.00', '1302.00', '1302.00', '234.36', '1536.36', 'ILS', NULL, '1', '0', '', '', NULL, '0', '0', '1'),
 ('27', '1', '2', '118', '??? ????? ??\"?', '???? 45', '??? ??', '', '300777778', '', '2014-07-09 15:27:32', '2014-07-09 15:27:32', '2014-07-09 15:31:32', '0.00', '2474.00', '2474.00', '441.00', '2915.00', 'ILS', NULL, '1', '0', '', '', NULL, '0', '0', '1'),
 ('28', '3', '10', '118', '??? ????? ??\"?', '???? 45', '??? ??', '', '300777778', '', '2014-07-09 15:32:24', '2014-07-09 15:32:24', '2014-07-09 15:35:24', '0.00', '195.00', '195.00', '35.10', '230.10', 'ILS', NULL, '2', '1', '', '', NULL, '1', '0', '1'),
 ('29', '3', '11', '116', '???? ??????', '??? ????? 5', '?? ????', '', '069924470', '', '2014-07-09 15:34:01', '2014-07-09 15:34:01', '2014-07-09 15:35:01', '0.00', '7000.00', '7000.00', '819.00', '7819.00', 'ILS', NULL, '1', '0', '', '', NULL, '0', '0', '1'),
 ('30', '3', '12', '116', '???? ??????', '??? ????? 5', '?? ????', '', '069924470', '', '2014-07-09 15:44:25', '2014-07-09 15:44:25', '2014-07-09 15:46:25', '0.00', '3170.00', '3170.00', '129.60', '3299.60', 'ILS', NULL, '1', '0', '', '', NULL, '0', '0', '1'),
 ('31', '3', NULL, '118', '??? ????? ??\"?', '???? 45', '??? ??', '', '300777778', '', '2014-07-09 16:01:17', '2014-07-09 16:01:17', '2014-07-09 16:01:17', '0.00', '15.00', '15.00', '2.70', '17.70', 'ILS', NULL, '1', '0', '', '', NULL, '0', '0', '1'),
 ('32', '3', '14', '117', '????? ???? ???? ??\"?', '??? ????? 12', '?? ????', '52215', '300777778', '', '2014-07-09 16:01:02', '2014-07-09 16:01:02', '2014-07-09 16:05:02', '0.00', '45.00', '45.00', '8.10', '53.10', 'ILS', NULL, '2', '1', '', '', NULL, '1', '0', '1'),
 ('33', '3', '13', '117', '????? ???? ???? ??\"?', '??? ????? 12', '?? ????', '52215', '300777778', '', '2014-07-09 16:02:25', '2014-07-09 16:02:25', '2014-07-09 16:03:25', '0.00', '24.00', '24.00', '4.32', '28.32', 'ILS', NULL, '2', '1', '', '', NULL, '1', '0', '1');



--
-- Structure for table `xG2N_eavAttr`
--

DROP TABLE IF EXISTS `xG2N_eavAttr`;

CREATE TABLE `xG2N_eavAttr` (
  `entity` bigint(20) NOT NULL,
  `attribute` varchar(250) NOT NULL,
`value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `xG2N_eavFields`
--

DROP TABLE IF EXISTS `xG2N_eavFields`;

CREATE TABLE `xG2N_eavFields` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `eavType` varchar(255) NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Data for table `xG2N_eavFields`
--

INSERT INTO `xG2N_eavFields` (`id`, `name`, `eavType`, `min`, `max`) VALUES
 ('1', '???? ????? ????', 'string', '5', '300');



--
-- Structure for table `xG2N_extCorrelation`
--

DROP TABLE IF EXISTS `xG2N_extCorrelation`;

CREATE TABLE `xG2N_extCorrelation` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `in` text NOT NULL,
  `out` text NOT NULL,
  `owner` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `xG2N_files`
--

DROP TABLE IF EXISTS `xG2N_files`;

CREATE TABLE `xG2N_files` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `public` tinyint(1) NOT NULL,
  `parent_id` int(255) DEFAULT NULL,
  `parent_type` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `expire` int(11) NOT NULL,
  `hash` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Data for table `xG2N_files`
--

INSERT INTO `xG2N_files` (`id`, `name`, `path`, `public`, `parent_id`, `parent_type`, `date`, `expire`, `hash`) VALUES
 ('1', 'company.logo.jpg', 'settings/', '0', '0', 'Settings', '2014-07-08 17:46:13', '0', ''),
 ('2', '2-3-signed.pdf', 'files/', '0', '117', 'Accounts', '2014-07-09 09:10:11', '0', ''),
 ('3', '2-3-signed.pdf', 'files/', '0', '11', 'Docs', '2014-07-09 09:15:02', '0', ''),
 ('4', '2-9-signed.pdf', 'files/', '0', '12', 'Docs', '2014-07-09 10:02:07', '0', ''),
 ('5', '2-9-signed.pdf', 'files/', '0', '19', 'Docs', '2014-07-09 13:11:25', '0', '');



--
-- Structure for table `xG2N_intCorrelation`
--

DROP TABLE IF EXISTS `xG2N_intCorrelation`;

CREATE TABLE `xG2N_intCorrelation` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `in` text NOT NULL,
  `out` text NOT NULL,
  `owner` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `xG2N_inventoryItem`
--

DROP TABLE IF EXISTS `xG2N_inventoryItem`;

CREATE TABLE `xG2N_inventoryItem` (
  `account_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `ammount` int(11) NOT NULL,
`idcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `xG2N_itemCategories`
--

DROP TABLE IF EXISTS `xG2N_itemCategories`;

CREATE TABLE `xG2N_itemCategories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `profit` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `xG2N_itemCategories`
--

INSERT INTO `xG2N_itemCategories` (`id`, `name`, `profit`) VALUES
 ('1', '????', '1');



--
-- Structure for table `xG2N_itemEav`
--

DROP TABLE IF EXISTS `xG2N_itemEav`;

CREATE TABLE `xG2N_itemEav` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `entity` int(11) NOT NULL,
  `attribute` int(11) NOT NULL,
  `value` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `xG2N_itemTemplate`
--

DROP TABLE IF EXISTS `xG2N_itemTemplate`;

CREATE TABLE `xG2N_itemTemplate` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `Itemcatagory_id` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `xG2N_itemTemplateItem`
--

DROP TABLE IF EXISTS `xG2N_itemTemplateItem`;

CREATE TABLE `xG2N_itemTemplateItem` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ItemTemplate_id` int(11) NOT NULL,
  `eavFields_id` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `xG2N_itemUnits`
--

DROP TABLE IF EXISTS `xG2N_itemUnits`;

CREATE TABLE `xG2N_itemUnits` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `precision` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Data for table `xG2N_itemUnits`
--

INSERT INTO `xG2N_itemUnits` (`id`, `name`, `precision`) VALUES
 ('0', 'units', '0'),
 ('1', 'work hours', '0'),
 ('2', 'Meter', '0'),
 ('3', 'liter', '0'),
 ('4', 'gram', '0'),
 ('5', 'Kilo gram', '0');



--
-- Structure for table `xG2N_itemVatCat`
--

DROP TABLE IF EXISTS `xG2N_itemVatCat`;

CREATE TABLE `xG2N_itemVatCat` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Data for table `xG2N_itemVatCat`
--

INSERT INTO `xG2N_itemVatCat` (`id`, `name`) VALUES
 ('1', '???? ???'),
 ('2', '???? ????'),
 ('12', '????? ?????');



--
-- Structure for table `xG2N_items`
--

DROP TABLE IF EXISTS `xG2N_items`;

CREATE TABLE `xG2N_items` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
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
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Data for table `xG2N_items`
--

INSERT INTO `xG2N_items` (`id`, `name`, `itemVatCat_id`, `unit_id`, `extcatnum`, `manufacturer`, `saleprice`, `currency_id`, `ammount`, `owner`, `category_id`, `parent_item_id`, `isProduct`, `profit`, `purchaseprice`, `pic`, `description`, `stockType`, `modified`, `created`) VALUES
 ('1', '????? ???????', '2', '0', NULL, NULL, '45.00', 'ILS', NULL, NULL, '1', '0', '1', '0', '0.00', '', '', '0', '2014-07-09 16:59:00', '2014-07-08 18:22:24'),
 ('2', '???? ????? ?? ???????', '1', '0', NULL, NULL, '4550.00', 'ILS', NULL, NULL, '1', '0', '0', '0', '0.00', '', '', '0', '2014-07-09 09:03:59', '2014-07-09 09:03:10'),
 ('3', '???? ???? ???\"? ?????', '1', '0', NULL, NULL, '2450.00', 'ILS', NULL, NULL, '1', '0', '0', '0', '0.00', '', '', '0', '2014-07-09 09:03:43', '2014-07-09 09:03:43'),
 ('4', '?? ???', '1', '0', NULL, NULL, '24.00', 'ILS', NULL, NULL, '1', '0', '0', '0', '0.00', '', '', '0', '2014-07-09 12:49:38', '2014-07-09 12:49:38'),
 ('5', '??????', '1', '0', NULL, NULL, '15.00', 'ILS', NULL, NULL, '1', '0', '0', '0', '0.00', '', '', '0', '2014-07-09 12:51:25', '2014-07-09 12:51:25');



--
-- Structure for table `xG2N_language`
--

DROP TABLE IF EXISTS `xG2N_language`;

CREATE TABLE `xG2N_language` (
  `id` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `xG2N_mailTemplate`
--

DROP TABLE IF EXISTS `xG2N_mailTemplate`;

CREATE TABLE `xG2N_mailTemplate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `subject` varchar(255) NOT NULL,
  `cc` varchar(255) NOT NULL,
  `bcc` varchar(255) NOT NULL,
  `entity_type` int(11) NOT NULL,
  `entity_id` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure for table `xG2N_paymentType`
--

DROP TABLE IF EXISTS `xG2N_paymentType`;

CREATE TABLE `xG2N_paymentType` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `value` varchar(80) NOT NULL,
  `oppt_account_id` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Data for table `xG2N_paymentType`
--

INSERT INTO `xG2N_paymentType` (`id`, `name`, `value`, `oppt_account_id`) VALUES
 ('1', 'Cash', '', '10'),
 ('2', 'Cheque', '', '7'),
 ('3', 'Credit card', '', '11'),
 ('4', 'Bank transfer', '', '0'),
 ('5', 'Manual Credit', '', '11');



--
-- Structure for table `xG2N_stockAction`
--

DROP TABLE IF EXISTS `xG2N_stockAction`;

CREATE TABLE `xG2N_stockAction` (
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Data for table `xG2N_stockAction`
--

INSERT INTO `xG2N_stockAction` (`id`, `account_id`, `oppt_account_id`, `item_id`, `qty`, `serial`, `user_id`, `createDate`, `doc_id`) VALUES
 ('1', '115', '116', '1', '-1', '', '1', '2014-07-09 08:39:27', '4'),
 ('2', '115', '116', '1', '-1', '', '1', '2014-07-09 08:49:07', '5'),
 ('3', '115', '116', '1', '-1', '', '1', '2014-07-09 08:52:49', '6'),
 ('4', '115', '117', '2', '-1', '', '1', '2014-07-09 09:46:28', '13'),
 ('5', '115', '117', '3', '-1', '', '1', '2014-07-09 09:46:28', '13'),
 ('6', '115', '117', '3', '-1', '', '1', '2014-07-09 11:37:32', '16'),
 ('7', '115', '117', '1', '-1', '', '1', '2014-07-09 12:33:32', '15'),
 ('8', '115', '117', '2', '-1', '', '1', '2014-07-09 12:46:01', '17'),
 ('9', '115', '117', '3', '-1', '', '1', '2014-07-09 12:46:01', '17'),
 ('10', '115', '118', '4', '-1', '', '1', '2014-07-09 13:12:17', '20'),
 ('11', '115', '118', '5', '-1', '', '1', '2014-07-09 13:12:17', '20'),
 ('12', '115', '118', '5', '-3', '', '1', '2014-07-09 13:23:30', '21'),
 ('13', '115', '118', '4', '-1', '', '1', '2014-07-09 14:04:27', '22'),
 ('14', '115', '118', '5', '-1', '', '1', '2014-07-09 14:04:27', '22'),
 ('15', '115', '118', '5', '3', '', '1', '2014-07-09 14:09:23', '23'),
 ('16', '115', '118', '5', '-1', '', '1', '2014-07-09 14:10:18', '24'),
 ('17', '115', '118', '5', '-13', '', '1', '2014-07-09 15:35:09', '28'),
 ('18', '115', '117', '4', '-1', '', '1', '2014-07-09 16:03:25', '33'),
 ('19', '115', '117', '1', '-1', '', '1', '2014-07-09 16:05:02', '32');



--
-- Structure for table `xG2N_transactionType`
--

DROP TABLE IF EXISTS `xG2N_transactionType`;

CREATE TABLE `xG2N_transactionType` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Data for table `xG2N_transactionType`
--

INSERT INTO `xG2N_transactionType` (`id`, `name`) VALUES
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
-- Structure for table `xG2N_transactions`
--

DROP TABLE IF EXISTS `xG2N_transactions`;

CREATE TABLE `xG2N_transactions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

--
-- Data for table `xG2N_transactions`
--

INSERT INTO `xG2N_transactions` (`id`, `num`, `account_id`, `type`, `refnum1`, `refnum2`, `valuedate`, `date`, `details`, `currency_id`, `sum`, `leadsum`, `secsum`, `owner_id`, `linenum`) VALUES
 ('1', '1', '100', '1', '6', '', '2014-07-09 08:07:49', '2014-07-09 08:52:49', '???? ??????', 'ILS', '45.00', '45.00', '45.00', '1', '1'),
 ('2', '1', '116', '1', '6', '', '2014-07-09 08:07:49', '2014-07-09 08:52:49', '???? ??????', 'ILS', '-53.10', '-53.10', '-53.10', '1', '2'),
 ('3', '1', '3', '1', '6', '', '2014-07-09 08:07:49', '2014-07-09 08:52:49', '???? ??????', 'ILS', '8.10', '8.10', '8.10', '1', '3'),
 ('4', '2', '116', '3', '7', '', '2014-07-09 08:07:21', '2014-07-09 08:55:21', '???? ??????', 'ILS', '53.10', '53.10', '53.10', '1', '1'),
 ('5', '2', '10', '3', '7', '', '2014-07-09 08:07:21', '2014-07-09 08:55:21', '???? ??????', 'ILS', '-53.10', '-53.10', '-53.10', '1', '2'),
 ('6', '3', '116', '3', '8', '', '2014-07-09 08:07:26', '2014-07-09 08:56:26', '???? ??????', 'ILS', '53.10', '53.10', '53.10', '1', '1'),
 ('7', '3', '10', '3', '8', '', '2014-07-09 08:07:26', '2014-07-09 08:56:26', '???? ??????', 'ILS', '-53.10', '-53.10', '-53.10', '1', '2'),
 ('8', '4', '116', '3', '9', '', '2014-07-09 08:07:35', '2014-07-09 08:58:35', '???? ??????', 'ILS', '53.10', '53.10', '53.10', '1', '1'),
 ('9', '4', '7', '3', '9', '', '2014-07-09 08:07:35', '2014-07-09 08:58:35', '???? ??????', 'ILS', '-53.10', '-53.10', '-53.10', '1', '2'),
 ('10', '5', '116', '3', '14', '', '2014-07-09 10:07:27', '2014-07-09 10:21:27', '???? ??????', 'ILS', '53.10', '53.10', '53.10', '1', '1'),
 ('11', '5', '10', '3', '14', '', '2014-07-09 10:07:27', '2014-07-09 10:21:27', '???? ??????', 'ILS', '-53.10', '-53.10', '-53.10', '1', '2'),
 ('12', '6', '100', '1', '16', '', '2014-07-09 11:07:32', '2014-07-09 11:37:32', '????? ???? ???? ??\"?', 'ILS', '2450.00', '2450.00', '2450.00', '1', '1'),
 ('13', '6', '117', '1', '16', '', '2014-07-09 11:07:32', '2014-07-09 11:37:32', '????? ???? ???? ??\"?', 'ILS', '-2891.00', '-2891.00', '-2891.00', '1', '2'),
 ('14', '6', '3', '1', '16', '', '2014-07-09 11:07:32', '2014-07-09 11:37:32', '????? ???? ???? ??\"?', 'ILS', '441.00', '441.00', '441.00', '1', '3'),
 ('15', '7', '100', '1', '15', '', '2014-07-09 11:07:32', '2014-07-09 12:33:33', '????? ???? ???? ??\"?', 'ILS', '45.00', '45.00', '45.00', '1', '1'),
 ('16', '7', '117', '1', '15', '', '2014-07-09 11:07:32', '2014-07-09 12:33:33', '????? ???? ???? ??\"?', 'ILS', '-53.10', '-53.10', '-53.10', '1', '2'),
 ('17', '7', '3', '1', '15', '', '2014-07-09 11:07:32', '2014-07-09 12:33:33', '????? ???? ???? ??\"?', 'ILS', '8.10', '8.10', '8.10', '1', '3'),
 ('18', '8', '100', '1', '17', '', '2014-07-09 09:07:01', '2014-07-09 12:46:01', '????? ???? ???? ??\"?', 'ILS', '4550.00', '4550.00', '4550.00', '1', '1'),
 ('19', '8', '100', '1', '17', '', '2014-07-09 09:07:01', '2014-07-09 12:46:01', '????? ???? ???? ??\"?', 'ILS', '2450.00', '2450.00', '2450.00', '1', '2'),
 ('20', '8', '117', '1', '17', '', '2014-07-09 09:07:01', '2014-07-09 12:46:01', '????? ???? ???? ??\"?', 'ILS', '-8260.00', '-8260.00', '-8260.00', '1', '3'),
 ('21', '8', '3', '1', '17', '', '2014-07-09 09:07:01', '2014-07-09 12:46:01', '????? ???? ???? ??\"?', 'ILS', '1260.00', '1260.00', '1260.00', '1', '4'),
 ('22', '9', '100', '1', '21', '', '2014-07-09 13:07:30', '2014-07-09 13:23:31', '??? ????? ??\"?', 'ILS', '45.00', '45.00', '45.00', '1', '1'),
 ('23', '9', '118', '1', '21', '', '2014-07-09 13:07:30', '2014-07-09 13:23:31', '??? ????? ??\"?', 'ILS', '-53.10', '-53.10', '-53.10', '1', '2'),
 ('24', '9', '3', '1', '21', '', '2014-07-09 13:07:30', '2014-07-09 13:23:31', '??? ????? ??\"?', 'ILS', '8.10', '8.10', '8.10', '1', '3'),
 ('25', '10', '100', '1', '22', '', '2014-07-09 13:07:27', '2014-07-09 14:04:27', '??? ????? ??\"?', 'ILS', '24.00', '24.00', '24.00', '1', '1'),
 ('26', '10', '100', '1', '22', '', '2014-07-09 13:07:27', '2014-07-09 14:04:27', '??? ????? ??\"?', 'ILS', '15.00', '15.00', '15.00', '1', '2'),
 ('27', '10', '118', '1', '22', '', '2014-07-09 13:07:27', '2014-07-09 14:04:27', '??? ????? ??\"?', 'ILS', '-46.02', '-46.02', '-46.02', '1', '3'),
 ('28', '10', '3', '1', '22', '', '2014-07-09 13:07:27', '2014-07-09 14:04:27', '??? ????? ??\"?', 'ILS', '7.02', '7.02', '7.02', '1', '4'),
 ('29', '11', '100', '17', '23', '', '2014-07-09 13:07:23', '2014-07-09 14:09:23', '??? ????? ??\"?', 'ILS', '45.00', '45.00', '45.00', '1', '1'),
 ('30', '11', '118', '17', '23', '', '2014-07-09 13:07:23', '2014-07-09 14:09:23', '??? ????? ??\"?', 'ILS', '-53.10', '-53.10', '-53.10', '1', '2'),
 ('31', '11', '3', '17', '23', '', '2014-07-09 13:07:23', '2014-07-09 14:09:23', '??? ????? ??\"?', 'ILS', '8.10', '8.10', '8.10', '1', '3'),
 ('32', '12', '100', '1', '24', '', '2014-07-09 14:07:18', '2014-07-09 14:10:18', '??? ????? ??\"?', 'ILS', '15.00', '15.00', '15.00', '1', '1'),
 ('33', '12', '118', '1', '24', '', '2014-07-09 14:07:18', '2014-07-09 14:10:18', '??? ????? ??\"?', 'ILS', '-17.70', '-17.70', '-17.70', '1', '2'),
 ('34', '12', '3', '1', '24', '', '2014-07-09 14:07:18', '2014-07-09 14:10:18', '??? ????? ??\"?', 'ILS', '2.70', '2.70', '2.70', '1', '3'),
 ('35', '13', '100', '1', '28', '', '2014-07-09 15:07:09', '2014-07-09 15:35:09', '??? ????? ??\"?', 'ILS', '195.00', '195.00', '195.00', '1', '1'),
 ('36', '13', '118', '1', '28', '', '2014-07-09 15:07:09', '2014-07-09 15:35:09', '??? ????? ??\"?', 'ILS', '-230.10', '-230.10', '-230.10', '1', '2'),
 ('37', '13', '3', '1', '28', '', '2014-07-09 15:07:09', '2014-07-09 15:35:09', '??? ????? ??\"?', 'ILS', '35.10', '35.10', '35.10', '1', '3'),
 ('38', '14', '100', '1', '33', '', '2014-07-09 16:07:25', '2014-07-09 16:03:25', '????? ???? ???? ??\"?', 'ILS', '24.00', '24.00', '24.00', '1', '1'),
 ('39', '14', '117', '1', '33', '', '2014-07-09 16:07:25', '2014-07-09 16:03:25', '????? ???? ???? ??\"?', 'ILS', '-28.32', '-28.32', '-28.32', '1', '2'),
 ('40', '14', '3', '1', '33', '', '2014-07-09 16:07:25', '2014-07-09 16:03:25', '????? ???? ???? ??\"?', 'ILS', '4.32', '4.32', '4.32', '1', '3'),
 ('41', '15', '100', '1', '32', '', '2014-07-09 16:07:02', '2014-07-09 16:05:02', '????? ???? ???? ??\"?', 'ILS', '45.00', '45.00', '45.00', '1', '1'),
 ('42', '15', '117', '1', '32', '', '2014-07-09 16:07:02', '2014-07-09 16:05:02', '????? ???? ???? ??\"?', 'ILS', '-53.10', '-53.10', '-53.10', '1', '2'),
 ('43', '15', '3', '1', '32', '', '2014-07-09 16:07:02', '2014-07-09 16:05:02', '????? ???? ???? ??\"?', 'ILS', '8.10', '8.10', '8.10', '1', '3');



--
-- Structure for table `xG2N_userIncomeMap`
--

DROP TABLE IF EXISTS `xG2N_userIncomeMap`;

CREATE TABLE `xG2N_userIncomeMap` (
  `user_id` int(11) NOT NULL,
  `itemVatCat_id` int(11) NOT NULL,
`account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `xG2N_userIncomeMap`
--

INSERT INTO `xG2N_userIncomeMap` (`user_id`, `itemVatCat_id`, `account_id`) VALUES
 ('1', '1', '100'),
 ('1', '2', '100'),
 ('1', '12', '100'),
 ('11', '1', '100'),
 ('11', '2', '100'),
 ('11', '12', '100');


