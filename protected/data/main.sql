DROP TABLE IF EXISTS `AuthAssignment`;
CREATE TABLE `AuthAssignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
);
INSERT INTO `AuthAssignment` VALUES('Admin','1',NULL,'N;');
INSERT INTO `AuthAssignment` VALUES('Authenticated','2',NULL,'N;');
DROP TABLE IF EXISTS `AuthItem`;
CREATE TABLE `AuthItem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
);
INSERT INTO `AuthItem` VALUES('Accounts.*',1,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Accounts.Admin',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Accounts.Ajax',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Accounts.Autocomplete',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Accounts.Create',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Accounts.Delete',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Accounts.Index',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Accounts.JSON',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Accounts.Transaction',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Accounts.Update',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Accounts.View',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('AccTemplate.*',1,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('AccTemplate.Admin',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('AccTemplate.Create',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('AccTemplate.Delete',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('AccTemplate.Index',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('AccTemplate.SaveSub',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('AccTemplate.Update',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('AccTemplate.View',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Acctype.*',1,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Acctype.Admin',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Acctype.Create',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Acctype.Delete',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Acctype.Index',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Acctype.Update',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Acctype.View',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Admin',2,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Authenticated',2,'Authenticated user',NULL,'N;');
INSERT INTO `AuthItem` VALUES('Comment.*',1,'Access all comment actions',NULL,'N;');
INSERT INTO `AuthItem` VALUES('Comment.Approve',0,'Approve comments',NULL,'N;');
INSERT INTO `AuthItem` VALUES('Comment.Delete',0,'Delete comments',NULL,'N;');
INSERT INTO `AuthItem` VALUES('Comment.Update',0,'Update comments',NULL,'N;');
INSERT INTO `AuthItem` VALUES('CommentAdministration',1,'Administration of comments',NULL,'N;');
INSERT INTO `AuthItem` VALUES('Companies.*',1,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Companies.Index',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Companies.Update',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Companies.View',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Company.*',1,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Company.Index',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Currates.*',1,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Currates.Admin',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Currates.Create',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Currates.Delete',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Currates.Getrate',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Currates.Index',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Currates.Update',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Currates.View',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Currencies.*',1,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Currencies.Autocomplete',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Currencies.Index',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Doccheques.*',1,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Doccheques.Admin',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Doccheques.Create',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Doccheques.Delete',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Doccheques.Index',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Doccheques.Update',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Doccheques.View',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Docdetails.*',1,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Docdetails.Admin',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Docdetails.Create',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Docdetails.Delete',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Docdetails.Index',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Docdetails.Update',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Docdetails.View',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Docs.*',1,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Docs.Admin',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Docs.Create',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Docs.Delete',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Docs.Duplicate',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Docs.Index',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Docs.Status',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Docs.Update',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Docs.View',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Doctype.*',1,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Doctype.Admin',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Doctype.Create',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Doctype.Delete',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Doctype.Index',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Doctype.Update',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Doctype.View',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('EavFields.*',1,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('EavFields.Admin',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('EavFields.Create',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('EavFields.Delete',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('EavFields.Index',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('EavFields.Update',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('EavFields.View',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Editor',2,'Editor',NULL,'N;');
INSERT INTO `AuthItem` VALUES('Fields.*',1,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Fields.Admin',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Fields.Create',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Fields.Delete',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Fields.Index',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Fields.Update',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Fields.View',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Guest',2,'Guest user',NULL,'N;');
INSERT INTO `AuthItem` VALUES('Item.*',1,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Item.Admin',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Item.Autocomplete',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Item.Create',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Item.Delete',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Item.Index',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Item.JSON',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Item.Template',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Item.Update',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Item.View',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Itemcategory.*',1,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Itemcategory.Admin',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Itemcategory.Create',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Itemcategory.Delete',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Itemcategory.Index',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Itemcategory.Update',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Itemcategory.View',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Itemunit.*',1,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Itemunit.Admin',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Itemunit.Create',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Itemunit.Delete',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Itemunit.Index',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Itemunit.Update',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Itemunit.View',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Minify.*',1,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Minify.Index',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Post.*',1,'Access all post actions',NULL,'N;');
INSERT INTO `AuthItem` VALUES('Post.Admin',0,'Administer posts',NULL,'N;');
INSERT INTO `AuthItem` VALUES('Post.Create',0,'Create posts',NULL,'N;');
INSERT INTO `AuthItem` VALUES('Post.Delete',0,'Delete posts',NULL,'N;');
INSERT INTO `AuthItem` VALUES('Post.Update',0,'Update posts',NULL,'N;');
INSERT INTO `AuthItem` VALUES('Post.View',0,'View posts',NULL,'N;');
INSERT INTO `AuthItem` VALUES('PostAdministrator',1,'Administration of posts',NULL,'N;');
INSERT INTO `AuthItem` VALUES('PostUpdateOwn',0,'Update own posts','return Yii::app()->user->id==$params[`userid`];','N;');
INSERT INTO `AuthItem` VALUES('Reports.*',1,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Reports.Contact',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Reports.Error',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Reports.Index',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Reports.Journal',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Reports.Login',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Reports.Logout',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Showdocs.*',1,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Showdocs.Admin',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Showdocs.Create',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Showdocs.Delete',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Showdocs.Index',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Showdocs.Status',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Showdocs.Update',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Showdocs.View',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Site.*',1,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Site.Contact',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Site.Error',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Site.Index',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Site.Login',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Site.Logout',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Users.*',1,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Users.Admin',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Users.Create',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Users.Delete',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Users.Index',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Users.Update',0,NULL,NULL,'N;');
INSERT INTO `AuthItem` VALUES('Users.View',0,NULL,NULL,'N;');
DROP TABLE IF EXISTS `AuthItemChild`;
CREATE TABLE `AuthItemChild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`)
);
DROP TABLE IF EXISTS `Rights`;
CREATE TABLE `Rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`)
);
INSERT INTO `Rights` VALUES('Authenticated',2,1);
INSERT INTO `Rights` VALUES('Editor',2,0);
INSERT INTO `Rights` VALUES('Guest',2,2);
DROP TABLE IF EXISTS  `accCountry`;
CREATE TABLE `accCountry` (
  `id` varchar(2) NOT NULL DEFAULT '',
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
);
INSERT INTO  `accCountry` VALUES('AD','Andorra');
INSERT INTO  `accCountry` VALUES('AE','United Arab Emirates');
INSERT INTO  `accCountry` VALUES('AF','Afghanistan');
INSERT INTO  `accCountry` VALUES('AG','Antigua and Barbuda');
INSERT INTO  `accCountry` VALUES('AI','Anguilla');
INSERT INTO  `accCountry` VALUES('AL','Albania');
INSERT INTO  `accCountry` VALUES('AM','Armenia');
INSERT INTO  `accCountry` VALUES('AN','Netherlands Antilles');
INSERT INTO  `accCountry` VALUES('AO','Angola');
INSERT INTO  `accCountry` VALUES('AQ','Antarctica');
INSERT INTO  `accCountry` VALUES('AR','Argentina');
INSERT INTO  `accCountry` VALUES('AS','American Samoa');
INSERT INTO  `accCountry` VALUES('AT','Austria');
INSERT INTO  `accCountry` VALUES('AU','Australia');
INSERT INTO  `accCountry` VALUES('AW','Aruba');
INSERT INTO  `accCountry` VALUES('AX','Aland Islands');
INSERT INTO  `accCountry` VALUES('AZ','Azerbaijan');
INSERT INTO  `accCountry` VALUES('BA','Bosnia and Herzegovina');
INSERT INTO  `accCountry` VALUES('BB','Barbados');
INSERT INTO  `accCountry` VALUES('BD','Bangladesh');
INSERT INTO  `accCountry` VALUES('BE','Belgium');
INSERT INTO  `accCountry` VALUES('BF','Burkina Faso');
INSERT INTO  `accCountry` VALUES('BG','Bulgaria');
INSERT INTO  `accCountry` VALUES('BH','Bahrain');
INSERT INTO  `accCountry` VALUES('BI','Burundi');
INSERT INTO  `accCountry` VALUES('BJ','Benin');
INSERT INTO  `accCountry` VALUES('BL','Saint Barth?lemy');
INSERT INTO  `accCountry` VALUES('BM','Bermuda');
INSERT INTO  `accCountry` VALUES('BN','Brunei Darussalam');
INSERT INTO  `accCountry` VALUES('BO','Bolivia, Plurinational State of');
INSERT INTO  `accCountry` VALUES('BR','Brazil');
INSERT INTO  `accCountry` VALUES('BS','Bahamas');
INSERT INTO  `accCountry` VALUES('BT','Bhutan');
INSERT INTO  `accCountry` VALUES('BV','Bouvet Island');
INSERT INTO  `accCountry` VALUES('BW','Botswana');
INSERT INTO  `accCountry` VALUES('BY','Belarus');
INSERT INTO  `accCountry` VALUES('BZ','Belize');
INSERT INTO  `accCountry` VALUES('CA','Canada');
INSERT INTO  `accCountry` VALUES('CC','Cocos (Keeling) Islands');
INSERT INTO  `accCountry` VALUES('CD','Congo, the Democratic Republic of the');
INSERT INTO  `accCountry` VALUES('CF','Central African Republic');
INSERT INTO  `accCountry` VALUES('CG','Congo');
INSERT INTO  `accCountry` VALUES('CH','Switzerland');
INSERT INTO  `accCountry` VALUES('CI','Cote d''Ivoire');
INSERT INTO  `accCountry` VALUES('CK','Cook Islands');
INSERT INTO  `accCountry` VALUES('CL','Chile');
INSERT INTO  `accCountry` VALUES('CM','Cameroon');
INSERT INTO  `accCountry` VALUES('CN','China');
INSERT INTO  `accCountry` VALUES('CO','Colombia');
INSERT INTO  `accCountry` VALUES('CR','Costa Rica');
INSERT INTO  `accCountry` VALUES('CU','Cuba');
INSERT INTO  `accCountry` VALUES('CV','Cape Verde');
INSERT INTO  `accCountry` VALUES('CX','Christmas Island');
INSERT INTO  `accCountry` VALUES('CY','Cyprus');
INSERT INTO  `accCountry` VALUES('CZ','Czech Republic');
INSERT INTO  `accCountry` VALUES('DE','Germany');
INSERT INTO  `accCountry` VALUES('DJ','Djibouti');
INSERT INTO  `accCountry` VALUES('DK','Denmark');
INSERT INTO  `accCountry` VALUES('DM','Dominica');
INSERT INTO  `accCountry` VALUES('DO','Dominican Republic');
INSERT INTO  `accCountry` VALUES('DZ','Algeria');
INSERT INTO  `accCountry` VALUES('EC','Ecuador');
INSERT INTO  `accCountry` VALUES('EE','Estonia');
INSERT INTO  `accCountry` VALUES('EG','Egypt');
INSERT INTO  `accCountry` VALUES('EH','Western Sahara');
INSERT INTO  `accCountry` VALUES('ER','Eritrea');
INSERT INTO  `accCountry` VALUES('ES','Spain');
INSERT INTO  `accCountry` VALUES('ET','Ethiopia');
INSERT INTO  `accCountry` VALUES('FI','Finland');
INSERT INTO  `accCountry` VALUES('FJ','Fiji');
INSERT INTO  `accCountry` VALUES('FK','Falkland Islands (Malvinas)');
INSERT INTO  `accCountry` VALUES('FM','Micronesia, Federated States of');
INSERT INTO  `accCountry` VALUES('FO','Faroe Islands');
INSERT INTO  `accCountry` VALUES('FR','France');
INSERT INTO  `accCountry` VALUES('GA','Gabon');
INSERT INTO  `accCountry` VALUES('GB','United Kingdom');
INSERT INTO  `accCountry` VALUES('GD','Grenada');
INSERT INTO  `accCountry` VALUES('GE','Georgia');
INSERT INTO  `accCountry` VALUES('GF','French Guiana');
INSERT INTO  `accCountry` VALUES('GG','Guernsey');
INSERT INTO  `accCountry` VALUES('GH','Ghana');
INSERT INTO  `accCountry` VALUES('GI','Gibraltar');
INSERT INTO  `accCountry` VALUES('GL','Greenland');
INSERT INTO  `accCountry` VALUES('GM','Gambia');
INSERT INTO  `accCountry` VALUES('GN','Guinea');
INSERT INTO  `accCountry` VALUES('GP','Guadeloupe');
INSERT INTO  `accCountry` VALUES('GQ','Equatorial Guinea');
INSERT INTO  `accCountry` VALUES('GR','Greece');
INSERT INTO  `accCountry` VALUES('GS','South Georgia and the South Sandwich Islands');
INSERT INTO  `accCountry` VALUES('GT','Guatemala');
INSERT INTO  `accCountry` VALUES('GU','Guam');
INSERT INTO  `accCountry` VALUES('GW','Guinea-Bissau');
INSERT INTO  `accCountry` VALUES('GY','Guyana');
INSERT INTO  `accCountry` VALUES('HK','Hong Kong');
INSERT INTO  `accCountry` VALUES('HM','Heard Island and McDonald Islands');
INSERT INTO  `accCountry` VALUES('HN','Honduras');
INSERT INTO  `accCountry` VALUES('HR','Croatia');
INSERT INTO  `accCountry` VALUES('HT','Haiti');
INSERT INTO  `accCountry` VALUES('HU','Hungary');
INSERT INTO  `accCountry` VALUES('ID','Indonesia');
INSERT INTO  `accCountry` VALUES('IE','Ireland');
INSERT INTO  `accCountry` VALUES('IL','Israel');
INSERT INTO  `accCountry` VALUES('IM','Isle of Man');
INSERT INTO  `accCountry` VALUES('IN','India');
INSERT INTO  `accCountry` VALUES('IO','British Indian Ocean Territory');
INSERT INTO  `accCountry` VALUES('IQ','Iraq');
INSERT INTO  `accCountry` VALUES('IR','Iran, Islamic Republic of');
INSERT INTO  `accCountry` VALUES('IS','Iceland');
INSERT INTO  `accCountry` VALUES('IT','Italy');
INSERT INTO  `accCountry` VALUES('JE','Jersey');
INSERT INTO  `accCountry` VALUES('JM','Jamaica');
INSERT INTO  `accCountry` VALUES('JO','Jordan');
INSERT INTO  `accCountry` VALUES('JP','Japan');
INSERT INTO  `accCountry` VALUES('KE','Kenya');
INSERT INTO  `accCountry` VALUES('KG','Kyrgyzstan');
INSERT INTO  `accCountry` VALUES('KH','Cambodia');
INSERT INTO  `accCountry` VALUES('KI','Kiribati');
INSERT INTO  `accCountry` VALUES('KM','Comoros');
INSERT INTO  `accCountry` VALUES('KN','Saint Kitts and Nevis');
INSERT INTO  `accCountry` VALUES('KP','Korea, Democratic People''s Republic of');
INSERT INTO  `accCountry` VALUES('KR','Korea, Republic of');
INSERT INTO  `accCountry` VALUES('KW','Kuwait');
INSERT INTO  `accCountry` VALUES('KY','Cayman Islands');
INSERT INTO  `accCountry` VALUES('KZ','Kazakhstan');
INSERT INTO  `accCountry` VALUES('LA','Lao People''s Democratic Republic');
INSERT INTO  `accCountry` VALUES('LB','Lebanon');
INSERT INTO  `accCountry` VALUES('LC','Saint Lucia');
INSERT INTO  `accCountry` VALUES('LI','Liechtenstein');
INSERT INTO  `accCountry` VALUES('LK','Sri Lanka');
INSERT INTO  `accCountry` VALUES('LR','Liberia');
INSERT INTO  `accCountry` VALUES('LS','Lesotho');
INSERT INTO  `accCountry` VALUES('LT','Lithuania');
INSERT INTO  `accCountry` VALUES('LU','Luxembourg');
INSERT INTO  `accCountry` VALUES('LV','Latvia');
INSERT INTO  `accCountry` VALUES('LY','Libyan Arab Jamahiriya');
INSERT INTO  `accCountry` VALUES('MA','Morocco');
INSERT INTO  `accCountry` VALUES('MC','Monaco');
INSERT INTO  `accCountry` VALUES('MD','Moldova, Republic of');
INSERT INTO  `accCountry` VALUES('ME','Montenegro');
INSERT INTO  `accCountry` VALUES('MF','Saint Martin (French part)');
INSERT INTO  `accCountry` VALUES('MG','Madagascar');
INSERT INTO  `accCountry` VALUES('MH','Marshall Islands');
INSERT INTO  `accCountry` VALUES('MK','Macedonia, the former Yugoslav Republic of');
INSERT INTO  `accCountry` VALUES('ML','Mali');
INSERT INTO  `accCountry` VALUES('MM','Myanmar');
INSERT INTO  `accCountry` VALUES('MN','Mongolia');
INSERT INTO  `accCountry` VALUES('MO','Macao');
INSERT INTO  `accCountry` VALUES('MP','Northern Mariana Islands');
INSERT INTO  `accCountry` VALUES('MQ','Martinique');
INSERT INTO  `accCountry` VALUES('MR','Mauritania');
INSERT INTO  `accCountry` VALUES('MS','Montserrat');
INSERT INTO  `accCountry` VALUES('MT','Malta');
INSERT INTO  `accCountry` VALUES('MU','Mauritius');
INSERT INTO  `accCountry` VALUES('MV','Maldives');
INSERT INTO  `accCountry` VALUES('MW','Malawi');
INSERT INTO  `accCountry` VALUES('MX','Mexico');
INSERT INTO  `accCountry` VALUES('MY','Malaysia');
INSERT INTO  `accCountry` VALUES('MZ','Mozambique');
INSERT INTO  `accCountry` VALUES('NA','Namibia');
INSERT INTO  `accCountry` VALUES('NC','New Caledonia');
INSERT INTO  `accCountry` VALUES('NE','Niger');
INSERT INTO  `accCountry` VALUES('NF','Norfolk Island');
INSERT INTO  `accCountry` VALUES('NG','Nigeria');
INSERT INTO  `accCountry` VALUES('NI','Nicaragua');
INSERT INTO  `accCountry` VALUES('NL','Netherlands');
INSERT INTO  `accCountry` VALUES('NO','Norway');
INSERT INTO  `accCountry` VALUES('NP','Nepal');
INSERT INTO  `accCountry` VALUES('NR','Nauru');
INSERT INTO  `accCountry` VALUES('NU','Niue');
INSERT INTO  `accCountry` VALUES('NZ','New Zealand');
INSERT INTO  `accCountry` VALUES('OM','Oman');
INSERT INTO  `accCountry` VALUES('PA','Panama');
INSERT INTO  `accCountry` VALUES('PE','Peru');
INSERT INTO  `accCountry` VALUES('PF','French Polynesia');
INSERT INTO  `accCountry` VALUES('PG','Papua New Guinea');
INSERT INTO  `accCountry` VALUES('PH','Philippines');
INSERT INTO  `accCountry` VALUES('PK','Pakistan');
INSERT INTO  `accCountry` VALUES('PL','Poland');
INSERT INTO  `accCountry` VALUES('PM','Saint Pierre and Miquelon');
INSERT INTO  `accCountry` VALUES('PN','Pitcairn');
INSERT INTO  `accCountry` VALUES('PR','Puerto Rico');
INSERT INTO  `accCountry` VALUES('PS','Palestinian Territory, Occupied');
INSERT INTO  `accCountry` VALUES('PT','Portugal');
INSERT INTO  `accCountry` VALUES('PW','Palau');
INSERT INTO  `accCountry` VALUES('PY','Paraguay');
INSERT INTO  `accCountry` VALUES('QA','Qatar');
INSERT INTO  `accCountry` VALUES('RE','Reunion  R?union');
INSERT INTO  `accCountry` VALUES('RO','Romania');
INSERT INTO  `accCountry` VALUES('RS','Serbia');
INSERT INTO  `accCountry` VALUES('RU','Russian Federation');
INSERT INTO  `accCountry` VALUES('RW','Rwanda');
INSERT INTO  `accCountry` VALUES('SA','Saudi Arabia');
INSERT INTO  `accCountry` VALUES('SB','Solomon Islands');
INSERT INTO  `accCountry` VALUES('SC','Seychelles');
INSERT INTO  `accCountry` VALUES('SD','Sudan');
INSERT INTO  `accCountry` VALUES('SE','Sweden');
INSERT INTO  `accCountry` VALUES('SG','Singapore');
INSERT INTO  `accCountry` VALUES('SH','Saint Helena');
INSERT INTO  `accCountry` VALUES('SI','Slovenia');
INSERT INTO  `accCountry` VALUES('SJ','Svalbard and Jan Mayen');
INSERT INTO  `accCountry` VALUES('SK','Slovakia');
INSERT INTO  `accCountry` VALUES('SL','Sierra Leone');
INSERT INTO  `accCountry` VALUES('SM','San Marino');
INSERT INTO  `accCountry` VALUES('SN','Senegal');
INSERT INTO  `accCountry` VALUES('SO','Somalia');
INSERT INTO  `accCountry` VALUES('SR','Suriname');
INSERT INTO  `accCountry` VALUES('ST','Sao Tome and Principe');
INSERT INTO  `accCountry` VALUES('SV','El Salvador');
INSERT INTO  `accCountry` VALUES('SY','Syrian Arab Republic');
INSERT INTO  `accCountry` VALUES('SZ','Swaziland');
INSERT INTO  `accCountry` VALUES('TC','Turks and Caicos Islands');
INSERT INTO  `accCountry` VALUES('TD','Chad');
INSERT INTO  `accCountry` VALUES('TF','French Southern Territories');
INSERT INTO  `accCountry` VALUES('TG','Togo');
INSERT INTO  `accCountry` VALUES('TH','Thailand');
INSERT INTO  `accCountry` VALUES('TJ','Tajikistan');
INSERT INTO  `accCountry` VALUES('TK','Tokelau');
INSERT INTO  `accCountry` VALUES('TL','Timor-Leste');
INSERT INTO  `accCountry` VALUES('TM','Turkmenistan');
INSERT INTO  `accCountry` VALUES('TN','Tunisia');
INSERT INTO  `accCountry` VALUES('TO','Tonga');
INSERT INTO  `accCountry` VALUES('TR','Turkey');
INSERT INTO  `accCountry` VALUES('TT','Trinidad and Tobago');
INSERT INTO  `accCountry` VALUES('TV','Tuvalu');
INSERT INTO  `accCountry` VALUES('TW','Taiwan, Province of China');
INSERT INTO  `accCountry` VALUES('TZ','Tanzania, United Republic of');
INSERT INTO  `accCountry` VALUES('UA','Ukraine');
INSERT INTO  `accCountry` VALUES('UG','Uganda');
INSERT INTO  `accCountry` VALUES('UM','United States Minor Outlying Islands');
INSERT INTO  `accCountry` VALUES('US','United States');
INSERT INTO  `accCountry` VALUES('UY','Uruguay');
INSERT INTO  `accCountry` VALUES('UZ','Uzbekistan');
INSERT INTO  `accCountry` VALUES('VA','Holy See (Vatican City State)');
INSERT INTO  `accCountry` VALUES('VC','Saint Vincent and the Grenadines');
INSERT INTO  `accCountry` VALUES('VE','Venezuela, Bolivarian Republic of');
INSERT INTO  `accCountry` VALUES('VG','Virgin Islands, British');
INSERT INTO  `accCountry` VALUES('VI','Virgin Islands, U.S.');
INSERT INTO  `accCountry` VALUES('VN','Viet Nam');
INSERT INTO  `accCountry` VALUES('VU','Vanuatu');
INSERT INTO  `accCountry` VALUES('WF','Wallis and Futuna');
INSERT INTO  `accCountry` VALUES('WS','Samoa');
INSERT INTO  `accCountry` VALUES('YE','Yemen');
INSERT INTO  `accCountry` VALUES('YT','Mayotte');
INSERT INTO  `accCountry` VALUES('ZA','South Africa');
INSERT INTO  `accCountry` VALUES('ZM','Zambia');
INSERT INTO  `accCountry` VALUES('ZW','Zimbabwe');
DROP TABLE IF EXISTS `creditErrorCode`;
CREATE TABLE `creditErrorCode` (
  `ErrorID` int(3) NOT NULL DEFAULT '0',
  `ErrorText` varchar(158) DEFAULT NULL,
  PRIMARY KEY (`ErrorID`)
);
INSERT INTO `creditErrorCode` VALUES(0,'עסקה תקינה.');
INSERT INTO `creditErrorCode` VALUES(1,'חסום החרם כרטיס.');
INSERT INTO `creditErrorCode` VALUES(2,'גנוב החרם כרטיס.');
INSERT INTO `creditErrorCode` VALUES(3,'התקשר לחברת האשראי.');
INSERT INTO `creditErrorCode` VALUES(4,'סירוב.');
INSERT INTO `creditErrorCode` VALUES(5,'מזויף החרם כרטיס.');
INSERT INTO `creditErrorCode` VALUES(6,'ת.ז או CVV שגויים.');
INSERT INTO `creditErrorCode` VALUES(7,'חובה להתקשר לחברת האשראי.');
INSERT INTO `creditErrorCode` VALUES(8,'תקלה בבניית מפתח גישה לקובץ חסומים.');
INSERT INTO `creditErrorCode` VALUES(9,'לא הצליח להתקשר, התקשר לחברת האשראי.');
INSERT INTO `creditErrorCode` VALUES(10,'תוכנית הופסקה עפ`י הוראת המפעיל (ESC) או COMPORT לא ניתן לפתיחה (WINDOWS).');
INSERT INTO `creditErrorCode` VALUES(15,'אין התאמה בין המספר שהוקלד לפס המגנטי.');
INSERT INTO `creditErrorCode` VALUES(17,'לא הוקלדו 4 הספרות האחרונות.');
INSERT INTO `creditErrorCode` VALUES(19,'רשומה בקובץ INT_IN קצרה מ-16 תווים.');
INSERT INTO `creditErrorCode` VALUES(20,'קובץ קלט (INT_IN) לא קיים.');
INSERT INTO `creditErrorCode` VALUES(21,'קובץ חסומים (NEG) לא קיים או לא מעודכן - בצע שידור או בקשה לאישור עבור כל עסקה.');
INSERT INTO `creditErrorCode` VALUES(22,'אחד מקבצי הפרמטרים או ווקטורים לא קיים.');
INSERT INTO `creditErrorCode` VALUES(23,'קובץ תאריכים (DATA) לא קיים.');
INSERT INTO `creditErrorCode` VALUES(24,'קובץ אתחול (START) לא קיים.');
INSERT INTO `creditErrorCode` VALUES(25,'הפרש בימים בקליטת חסומים גדול מדי - בצע שידור או בקשה לאישור עבור כל עסקה.');
INSERT INTO `creditErrorCode` VALUES(26,'הפרש דורות בקליטת חסומים גדול מדי - בצע שידור או בקשה לאישור עבור כל עסקה.');
INSERT INTO `creditErrorCode` VALUES(27,'כאשר לא הוכנס פס מגנטי כולו הגדר עסקה כעסקה טלפונית או כעסקת חתימה בלבד.');
INSERT INTO `creditErrorCode` VALUES(28,'מספר מסוף מרכזי לא הוכנס למסוף המוגדר לעבודה כרב ספק.');
INSERT INTO `creditErrorCode` VALUES(29,'מספר מוטב לא הוכנס למסוף המוגדר לעבודה כרב מוטב.');
INSERT INTO `creditErrorCode` VALUES(30,'מסוף שאינו מעודכן כרב ספק/רק מוטב והוקלד מס'' ספק/מס'' מוטב.');
INSERT INTO `creditErrorCode` VALUES(31,'מסוך מעודכן כרב ספק והוקלד גם כמס'' מוטב.');
INSERT INTO `creditErrorCode` VALUES(32,'קובץ חסומים ישן מדי - בצע תקשורת או בקש אישור עבור כל עסקה .');
INSERT INTO `creditErrorCode` VALUES(33,'כרטיס לא תקין.');
INSERT INTO `creditErrorCode` VALUES(34,'כרטיס לא רשאי לבצע במסוף זה או אין אישור לעסקה כזאת.');
INSERT INTO `creditErrorCode` VALUES(35,'כרטיס לא רשאי לבצע עסקה עם סוג אשראי זה.');
INSERT INTO `creditErrorCode` VALUES(36,'פג תוקף');
INSERT INTO `creditErrorCode` VALUES(37,'שגיאה בתשלומים - סכום עסקה צריך להיות שווה תשלום ראשון + (תשלום קבוע כפול מס'' תשלומים)');
INSERT INTO `creditErrorCode` VALUES(38,'לא ניתן לבצע עסקה מעל תקרה לכרטיס אשראי חיוב מיידי.');
INSERT INTO `creditErrorCode` VALUES(39,'סיפרת ביקורת לא תקינה.');
INSERT INTO `creditErrorCode` VALUES(40,'מסוף שמוגדר כרב מוטב הוקלד מס'' ספק.');
INSERT INTO `creditErrorCode` VALUES(41,'מעל תקרה, אך קובץ מכיל הוראה לא לבצע שאילתא (J1,J2,J3).');
INSERT INTO `creditErrorCode` VALUES(42,'חסום בספק, אך קובץ הקלט מכיל הוראה לא לבצע שאילתא (J1,J2,J3).');
INSERT INTO `creditErrorCode` VALUES(43,'אקראית, אך קובץ הקלט מכיל הוראה לא לבצע שאילתא (J1,J2,J3).');
INSERT INTO `creditErrorCode` VALUES(44,'מסוף לא רשאי לבקש אישור ללא עסקה, אך קובץ הקלט מכיל (J5).');
INSERT INTO `creditErrorCode` VALUES(45,'מסוף לא רשאי לבצע אישור ביוזמתו, אך קובץ הקלט מכיל (J6).');
INSERT INTO `creditErrorCode` VALUES(46,'יש לבקש אישור, אך קובץ הקלט מכיל הוראה לא לבצע שאילתא (J1,J2,J3).');
INSERT INTO `creditErrorCode` VALUES(47,'יש לבקש אישור בשל בעיה הקשורה לקכ`ח אך קובץ הקלט מכיל הוראה לא לבצע שאילתא.');
INSERT INTO `creditErrorCode` VALUES(51,'מספר רכב לא תקין.');
INSERT INTO `creditErrorCode` VALUES(52,'מד מרחק לא הוקלד.');
INSERT INTO `creditErrorCode` VALUES(53,'מסוף לא מוגדר כתחנת דלק. (הועבר כרטיס דלק או קוד עסקה לא מתאים).');
INSERT INTO `creditErrorCode` VALUES(57,'לא הוקלד מספר תעודת זהות.');
INSERT INTO `creditErrorCode` VALUES(58,'לא הוקלד CVV2.');
INSERT INTO `creditErrorCode` VALUES(59,'לא הוקלדו מספר תעודת הזהות וה-CVV2.');
INSERT INTO `creditErrorCode` VALUES(60,'צרוף ABS לא נמצא בהתחלת נתוני קלט בזיכרון.');
INSERT INTO `creditErrorCode` VALUES(61,'מספר כרטיס לא נמצא או נמצא פעמיים.');
INSERT INTO `creditErrorCode` VALUES(62,'סוג עסקה לא תקין.');
INSERT INTO `creditErrorCode` VALUES(63,'קוד עסקה לא תקין.');
INSERT INTO `creditErrorCode` VALUES(64,'סוג אשראי לא תקין.');
INSERT INTO `creditErrorCode` VALUES(65,'מטבע לא תקין.');
INSERT INTO `creditErrorCode` VALUES(66,'קיים תשלום ראשון ו/או תשלום קבוע לסוג אשראי שונה מתשלומים.');
INSERT INTO `creditErrorCode` VALUES(67,'קיים מספר תשלומים לסוג אשראי שאינו דורש זה.');
INSERT INTO `creditErrorCode` VALUES(68,'לא ניתן להצמיד לדולר או למדד לסוג אשראי שונה מתשלומים.');
INSERT INTO `creditErrorCode` VALUES(69,'אורך הפס המגנטי קצר מידי.');
INSERT INTO `creditErrorCode` VALUES(70,'לא מוגדר מכשיר להקשת מספר סודי.');
INSERT INTO `creditErrorCode` VALUES(71,'חובה להקליד מספר סודי.');
INSERT INTO `creditErrorCode` VALUES(72,'קכ`ח לא זמין - העבר בקורא מגנטי.');
INSERT INTO `creditErrorCode` VALUES(73,'הכרטיס נושא שבב ויש להעבירו דרך הקכ`ח.');
INSERT INTO `creditErrorCode` VALUES(74,'דחייה - כרטיס נעול.');
INSERT INTO `creditErrorCode` VALUES(75,'דחייה - פעולה עם קכ`ח לא הסתיימה בזמן הראוי.');
INSERT INTO `creditErrorCode` VALUES(76,'דחייה - נתונים אשר התקבלו מקכ`ח אינם מוגדרים במערכת.');
INSERT INTO `creditErrorCode` VALUES(77,'הוקש מספר סודי שגוי.');
INSERT INTO `creditErrorCode` VALUES(80,'הוכנס `קוד מועדון` לסוג אשראי לא מתאים.');
INSERT INTO `creditErrorCode` VALUES(99,'לא מצליח לקרוא/לכתוב/לפתוח קובץ TRAN.');
INSERT INTO `creditErrorCode` VALUES(101,'אין אישור מחברת אשראי לעבודה.');
INSERT INTO `creditErrorCode` VALUES(106,'למסוף אין אישור לביצוע שאילתא לאשראי חיוב מיידי.');
INSERT INTO `creditErrorCode` VALUES(107,'סכום העסקה גדול מדי - חלק למספר העסקאות.');
INSERT INTO `creditErrorCode` VALUES(108,'למסוף אין אישור לבצע עסקאות מאולצות.');
INSERT INTO `creditErrorCode` VALUES(109,'למסוף אין אישור לכרטיס עם קוד השרות 587.');
INSERT INTO `creditErrorCode` VALUES(110,'למסוף אין אישור לכרטיס חיוב מיידי.');
INSERT INTO `creditErrorCode` VALUES(111,'למסוף אין אישור לעסקה בתשלומים.');
INSERT INTO `creditErrorCode` VALUES(112,'למסוף אין אישור לעסקה טלפון/חתימה בלבד בתשלומים.');
INSERT INTO `creditErrorCode` VALUES(113,'למסוף אין אישור לעסקה טלפונית.');
INSERT INTO `creditErrorCode` VALUES(114,'למסוף אין אישור לעסקה `חתימה בלבד`.');
INSERT INTO `creditErrorCode` VALUES(115,'למסוף אין אישור לעסקה בדולרים.');
INSERT INTO `creditErrorCode` VALUES(116,'למסוף אין אישור לעסקת מועדון.');
INSERT INTO `creditErrorCode` VALUES(117,'למסוף אין אישור לעסקת כוכבים/נקודות/מיילים.');
INSERT INTO `creditErrorCode` VALUES(118,'למסוף אין אישור לאשראי ישראקרדיט.');
INSERT INTO `creditErrorCode` VALUES(119,'למסוף אין אישור לאשראי אמקס קרדיט.');
INSERT INTO `creditErrorCode` VALUES(120,'למסוף אין אישור להצמדה לדולר.');
INSERT INTO `creditErrorCode` VALUES(121,'למסוף אין אישור להצמדה למדד.');
INSERT INTO `creditErrorCode` VALUES(122,'למסוף אין אישור להצמדה למדד לכרטיסי חו`ל.');
INSERT INTO `creditErrorCode` VALUES(123,'למסוף אין אישור לעסקת כוכבים/נקודות/מיילים לסוג אשראי זה.');
INSERT INTO `creditErrorCode` VALUES(124,'למסוף אין אישור לאשראי קרדיט בתשלומים לכרטיסי ישראכרט.');
INSERT INTO `creditErrorCode` VALUES(125,'למסוף אין אישור לאשראי קרדיט בתשלומים לכרטיסי אמקס.');
INSERT INTO `creditErrorCode` VALUES(126,'למסוף אין אישור לקוד מועדון זה.');
INSERT INTO `creditErrorCode` VALUES(127,'למסוף אין אישור לעסקת חיוב מיידי פרט לכרטיסי חיוב מיידי.');
INSERT INTO `creditErrorCode` VALUES(128,'למסוף אין אישור לקבל כרטיסי ויזה אשר מתחילים ב-3.');
INSERT INTO `creditErrorCode` VALUES(129,'למסוף אין אישור לבצע עסקת זכות מעל תקרה.');
INSERT INTO `creditErrorCode` VALUES(130,'כרטיס לא רשאי לבצע עסקת מועדון.');
INSERT INTO `creditErrorCode` VALUES(131,'כרטיס לא רשאי לבצע עסקת כוכבים/נקודות/מיילים.');
INSERT INTO `creditErrorCode` VALUES(132,'כרטיס לא רשאי לבצע עסקאות בדולרים (רגילות או טלפוניות).');
INSERT INTO `creditErrorCode` VALUES(133,'כרטיס לא תקף על פי רשימת כרטיסים תקפים של ישראכרט.');
INSERT INTO `creditErrorCode` VALUES(134,'כרטיס לא תקין עפ`י הגדרת המערכת (VECTOR1 של ישראכרט) - מס'' הספרות בכרטיס - שגוי.');
INSERT INTO `creditErrorCode` VALUES(135,'כרטיס לא רשאי לבצע עסקאות דולריות עפ`י הגדרת המערכת (VECTOR1 של ישראכרט).');
INSERT INTO `creditErrorCode` VALUES(136,'הכרטיס שיין לקבוצת כרטיסים אשר אינה רשאית לבצע עסקאות עפ`י הגדרת המערכת (VECTOR20 של ויזה).');
INSERT INTO `creditErrorCode` VALUES(137,'קידומת הכרטיס (7 ספרות) לא תקפה עפ`י הגדרת המערכת (VECTOR21 של דיינרס).');
INSERT INTO `creditErrorCode` VALUES(138,'כרטיס לא רשאי לבצע עסקאות בתשלומים על פי רשימת כרטיסים תקפים של ישראכרט.');
INSERT INTO `creditErrorCode` VALUES(139,'מספר תשלומים גדול מידי על פי רשימת כרטיסים תקפים של ישראכרט.');
INSERT INTO `creditErrorCode` VALUES(140,'כרטיסי ויזה ודיינרס לא רשאים לבצע עסקאות מועדון בתשלומים.');
INSERT INTO `creditErrorCode` VALUES(141,'סידרת כרטיסים לא תקפה עפ`י הגדרת המערכת (VECTOR5 של ישראכרט).');
INSERT INTO `creditErrorCode` VALUES(142,'קוד שרות לא תקף עפ`י הגדרת המערכת (VECTOR6 של ישראכרט).');
INSERT INTO `creditErrorCode` VALUES(143,'קידומת הכרטיס (2 ספרות) לא תקפה עפ`י הגדרת המערכת (VECTOR7 של ישראכרט).');
INSERT INTO `creditErrorCode` VALUES(144,'קוד שרות לא תקף עפ`י הגדרת המערכת (VECTOR12 של ויזה).');
INSERT INTO `creditErrorCode` VALUES(145,'קוד שרות לא תקף עפ`י הגדרת המערכת (VECTOR13 של ויזה).');
INSERT INTO `creditErrorCode` VALUES(146,'לכרטיס חיוב מיידי אסור לבצע עסקאות זכות.');
INSERT INTO `creditErrorCode` VALUES(147,'כרטיס לא רשאי לבצע עסקאות בתשלומים עפ`י וקטור 31 של לאומיקארד.');
INSERT INTO `creditErrorCode` VALUES(148,'כרטיס לא רשאי לבצע עסקאות טלפוניות וחתימה בלבד עפ`י וקטור 31 של לאומיקארד.');
INSERT INTO `creditErrorCode` VALUES(149,'כרטיס לא רשאי לבצע עסקאות טלפוניות עפ`י וקטור 31 של לאומיקארד.');
INSERT INTO `creditErrorCode` VALUES(150,'אשראי לא מאושר לכרטיסי חיוב מיידי.');
INSERT INTO `creditErrorCode` VALUES(151,'אשראי לא מאושר לכרטיסי חו`ל.');
INSERT INTO `creditErrorCode` VALUES(152,'קוד מועדון לא תקין.');
INSERT INTO `creditErrorCode` VALUES(153,'כרטיס לא רשאי לבצע עסקאות אשראי גמיש (עדיף +30/) עפ`י הגדרת המערכת (VECTOR21 של דיינרס).');
INSERT INTO `creditErrorCode` VALUES(154,'כרטיס לא רשאי לבצע עסקאות חיוב מיידי עפ`י הגדרת המערכת (VECTOR21 של דיינרס).');
INSERT INTO `creditErrorCode` VALUES(155,'סכום המינימלי לתשלום בעסקת קרדיט קטן מידי.');
INSERT INTO `creditErrorCode` VALUES(156,'מספר תשלומים לעסקת קרדיט לא תקין.');
INSERT INTO `creditErrorCode` VALUES(157,'תקרה 0 לסוג כרטיס זה בעסקה עם אשראי רגיל או קרדיט.');
INSERT INTO `creditErrorCode` VALUES(158,'תקרה 0 לסוג כרטיס זה בעסקה עם אשראי חיוב מיידי.');
INSERT INTO `creditErrorCode` VALUES(159,'תקרה 0 לסוג כרטיס זה בעסקת חיוב מיידי בדולרים.');
INSERT INTO `creditErrorCode` VALUES(160,'תקרה 0 לסוג כרטיס זה בעסקה טלפונית.');
INSERT INTO `creditErrorCode` VALUES(161,'תקרה 0 לסוג כרטיס זה בעסקת זכות.');
INSERT INTO `creditErrorCode` VALUES(162,'תקרה 0 לסוג כרטיס זה בעסקת תשלומים.');
INSERT INTO `creditErrorCode` VALUES(163,'כרטיס אמריקן אקספרס אשר הונפק בחו`ל לא רשאי לבצע עסקאות בתשלומים.');
INSERT INTO `creditErrorCode` VALUES(164,'כרטיסי אשראי JCB רשאי לבצע עסקאות רק באשראי רגיל.');
INSERT INTO `creditErrorCode` VALUES(165,'סכום בכוכבים/נקודות/מיילים גדול מסכום העסקה.');
INSERT INTO `creditErrorCode` VALUES(166,'כרטיס מועדון לא בתחום של המסוף.');
INSERT INTO `creditErrorCode` VALUES(167,'לא ניתן לבצע עסקת כוכבים/נקודות/מיילים בדולרים.');
INSERT INTO `creditErrorCode` VALUES(168,'למסוף אין אישור לעסקה דולרית עם סוג אשראי זה.');
INSERT INTO `creditErrorCode` VALUES(169,'לא ניתן לבצע עסקת זכות עם אשראי שונה מהרגיל.');
INSERT INTO `creditErrorCode` VALUES(170,'סכום הנחה בכוכבים/נקודות/מיילים גדול מהמותר.');
INSERT INTO `creditErrorCode` VALUES(171,'לא ניתן לבצע עסקה מאולצת לכרטיס/אשראי חיוב מיידי.');
INSERT INTO `creditErrorCode` VALUES(172,'לא ניתן לבטל עסקה קודמת (עסקת זכות או מספר כרטיס אינו זהה).');
INSERT INTO `creditErrorCode` VALUES(173,'עסקה כפולה.');
INSERT INTO `creditErrorCode` VALUES(174,'למסוף אין אישור להצמדה למדד לאשראי זה.');
INSERT INTO `creditErrorCode` VALUES(175,'למסוף אין אישור להצמדה לדולר לאשראי זה.');
INSERT INTO `creditErrorCode` VALUES(176,'כרטיס אינו תקף עפ`י הגדרת המערכת (וקטור 1 של ישראכרט).');
INSERT INTO `creditErrorCode` VALUES(177,'בתחנות דלק לא ניתן לבצע `שרות עצמי` אלא `שרות עצמי בתחנות דלק`.');
INSERT INTO `creditErrorCode` VALUES(178,'אסור לבצע עסקת זכות בכוכבים/נקודות/מיילים.');
INSERT INTO `creditErrorCode` VALUES(179,'אסור לבצע עסקת זכות בדולר בכרטיס תייר.');
INSERT INTO `creditErrorCode` VALUES(180,'בכרטיס מועדון לא ניתן לבצע עסקה טלפונית.');
INSERT INTO `creditErrorCode` VALUES(200,'מסוף נסגר אצל שבא – פנה לשירות איזיקארד.');
INSERT INTO `creditErrorCode` VALUES(250,'בעיית זהוי (שם משתמש, סיסמא, מספר מסוף לא תקינים).');
INSERT INTO `creditErrorCode` VALUES(256,'מספר עסקה (TransactionNumber) - אינו ייחודי עבור תאריך עסקה (TransactionDate).');
INSERT INTO `creditErrorCode` VALUES(257,'לא נמצא מידע נדרש');
INSERT INTO `creditErrorCode` VALUES(259,'תקלת שב`א - אין גישה למסד נתונים');
INSERT INTO `creditErrorCode` VALUES(260,'אחד או יותר מפרמטרים המועברים לפונקציה לא תקין (בד`כ ערכים לא נומריים איפה שצריך נומרי(.');
INSERT INTO `creditErrorCode` VALUES(280,'בד`כ time-out, דה`נו לקח יותר מדקה לחזור למשתמש. במידה וחוזר לעצמו יש לפנות לשב`א.');
DROP TABLE IF EXISTS `currencies`;
CREATE TABLE `currencies` (
  `id` varchar(3) DEFAULT NULL,
  `code` varchar(3) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `symbol` varchar(17) DEFAULT NULL
);
INSERT INTO `currencies` VALUES('AED','784','United Arab Emirates dirham','?.?');
INSERT INTO `currencies` VALUES('AFN','971','Afghani','?');
INSERT INTO `currencies` VALUES('ALL','008','Lek','L');
INSERT INTO `currencies` VALUES('AMD','051','Armenian dram','??.');
INSERT INTO `currencies` VALUES('ANG','532','Netherlands Antillean guilder','ƒ');
INSERT INTO `currencies` VALUES('AOA','973','Kwanza','Kz');
INSERT INTO `currencies` VALUES('ARS','032','Argentine peso','$');
INSERT INTO `currencies` VALUES('AUD','036','Australian dollar','$');
INSERT INTO `currencies` VALUES('AWG','533','Aruban guilder','ƒ');
INSERT INTO `currencies` VALUES('AZN','944','Azerbaijanian manat',NULL);
INSERT INTO `currencies` VALUES('BAM','977','Convertible marks','KM');
INSERT INTO `currencies` VALUES('BBD','052','Barbados dollar','$');
INSERT INTO `currencies` VALUES('BDT','050','Bangladeshi taka','?');
INSERT INTO `currencies` VALUES('BGN','975','Bulgarian lev','??');
INSERT INTO `currencies` VALUES('BHD','048','Bahraini dinar','?.?');
INSERT INTO `currencies` VALUES('BIF','108','Burundian franc','Fr');
INSERT INTO `currencies` VALUES('BMD','060','Bermudian dollar (customarily known as Bermuda dollar)','$');
INSERT INTO `currencies` VALUES('BND','096','Brunei dollar','$');
INSERT INTO `currencies` VALUES('BOB','068','Boliviano','Bs');
INSERT INTO `currencies` VALUES('BOV','984','Bolivian Mvdol (funds code)',NULL);
INSERT INTO `currencies` VALUES('BRL','986','Brazilian real','R$');
INSERT INTO `currencies` VALUES('BSD','044','Bahamian dollar','$');
INSERT INTO `currencies` VALUES('BTN','064','Ngultrum',NULL);
INSERT INTO `currencies` VALUES('BWP','072','Pula','P');
INSERT INTO `currencies` VALUES('BYR','974','Belarussian ruble','Br');
INSERT INTO `currencies` VALUES('BZD','084','Belize dollar','$');
INSERT INTO `currencies` VALUES('CAD','124','Canadian dollar','$');
INSERT INTO `currencies` VALUES('CDF','976','Franc Congolais','Fr');
INSERT INTO `currencies` VALUES('CHE','947','WIR euro (complementary currency)','€');
INSERT INTO `currencies` VALUES('CHF','756','Swiss franc','Fr');
INSERT INTO `currencies` VALUES('CHW','948','WIR franc (complementary currency)','Fr');
INSERT INTO `currencies` VALUES('CLF','990','Unidad de Fomento (funds code)',NULL);
INSERT INTO `currencies` VALUES('CLP','152','Chilean peso','$');
INSERT INTO `currencies` VALUES('CNY','156','Renminbi','¥');
INSERT INTO `currencies` VALUES('COP','170','Colombian peso','$');
INSERT INTO `currencies` VALUES('COU','970','Unidad de Valor Real',NULL);
INSERT INTO `currencies` VALUES('CRC','188','Costa Rican colon','?');
INSERT INTO `currencies` VALUES('CUP','192','Cuban peso','$');
INSERT INTO `currencies` VALUES('CVE','132','Cape Verde escudo',NULL);
INSERT INTO `currencies` VALUES('CZK','203','Czech koruna','K?');
INSERT INTO `currencies` VALUES('DJF','262','Djibouti franc','Fr');
INSERT INTO `currencies` VALUES('DKK','208','Danish krone','kr');
INSERT INTO `currencies` VALUES('DOP','214','Dominican peso','$');
INSERT INTO `currencies` VALUES('DZD','012','Algerian dinar','?.?');
INSERT INTO `currencies` VALUES('EEK','233','Kroon','KR');
INSERT INTO `currencies` VALUES('EGP','818','Egyptian pound','?.?');
INSERT INTO `currencies` VALUES('ERN','232','Nakfa','Nfk');
INSERT INTO `currencies` VALUES('ETB','230','Ethiopian birr',NULL);
INSERT INTO `currencies` VALUES('EUR','978','Euro','€');
INSERT INTO `currencies` VALUES('FJD','242','Fiji dollar','$');
INSERT INTO `currencies` VALUES('FKP','238','Falkland Islands pound','£');
INSERT INTO `currencies` VALUES('GBP','826','Pound sterling','£');
INSERT INTO `currencies` VALUES('GEL','981','Lari','?');
INSERT INTO `currencies` VALUES('GHS','936','Cedi',NULL);
INSERT INTO `currencies` VALUES('GIP','292','Gibraltar pound','£');
INSERT INTO `currencies` VALUES('GMD','270','Dalasi','D');
INSERT INTO `currencies` VALUES('GNF','324','Guinea franc','Fr');
INSERT INTO `currencies` VALUES('GTQ','320','Quetzal','Q');
INSERT INTO `currencies` VALUES('GYD','328','Guyana dollar','$');
INSERT INTO `currencies` VALUES('HKD','344','Hong Kong dollar','$');
INSERT INTO `currencies` VALUES('HNL','340','Lempira','L');
INSERT INTO `currencies` VALUES('HRK','191','Croatian kuna','kn');
INSERT INTO `currencies` VALUES('HTG','332','Haiti gourde','G');
INSERT INTO `currencies` VALUES('HUF','348','Forint','Ft');
INSERT INTO `currencies` VALUES('IDR','360','Rupiah','?');
INSERT INTO `currencies` VALUES('ILS','376','Israeli new sheqel','₪');
INSERT INTO `currencies` VALUES('INR','356','Indian rupee','?');
INSERT INTO `currencies` VALUES('IQD','368','Iraqi dinar','?.?');
INSERT INTO `currencies` VALUES('IRR','364','Iranian rial','?');
INSERT INTO `currencies` VALUES('ISK','352','Iceland krona','kr');
INSERT INTO `currencies` VALUES('JMD','388','Jamaican dollar','$');
INSERT INTO `currencies` VALUES('JOD','400','Jordanian dinar','?.?');
INSERT INTO `currencies` VALUES('JPY','392','Japanese yen','¥');
INSERT INTO `currencies` VALUES('KES','404','Kenyan shilling','Sh');
INSERT INTO `currencies` VALUES('KGS','417','Som',NULL);
INSERT INTO `currencies` VALUES('KHR','116','Riel','?');
INSERT INTO `currencies` VALUES('KMF','174','Comoro franc','Fr');
INSERT INTO `currencies` VALUES('KPW','408','North Korean won','?');
INSERT INTO `currencies` VALUES('KRW','410','South Korean won','?');
INSERT INTO `currencies` VALUES('KWD','414','Kuwaiti dinar','?.?');
INSERT INTO `currencies` VALUES('KYD','136','Cayman Islands dollar','$');
INSERT INTO `currencies` VALUES('KZT','398','Tenge','?');
INSERT INTO `currencies` VALUES('LAK','418','Kip','?');
INSERT INTO `currencies` VALUES('LBP','422','Lebanese pound','?.?');
INSERT INTO `currencies` VALUES('LKR','144','Sri Lanka rupee','??');
INSERT INTO `currencies` VALUES('LRD','430','Liberian dollar','$');
INSERT INTO `currencies` VALUES('LSL','426','Loti','L');
INSERT INTO `currencies` VALUES('LTL','440','Lithuanian litas','Lt');
INSERT INTO `currencies` VALUES('LVL','428','Latvian lats','Ls');
INSERT INTO `currencies` VALUES('LYD','434','Libyan dinar','?.?');
INSERT INTO `currencies` VALUES('MAD','504','Moroccan dirham','?.?.');
INSERT INTO `currencies` VALUES('MDL','498','Moldovan leu','L');
INSERT INTO `currencies` VALUES('MGA','969','Malagasy ariary',NULL);
INSERT INTO `currencies` VALUES('MKD','807','Denar','???');
INSERT INTO `currencies` VALUES('MMK','104','Kyat','K');
INSERT INTO `currencies` VALUES('MNT','496','Tugrik','?');
INSERT INTO `currencies` VALUES('MOP','446','Pataca','P');
INSERT INTO `currencies` VALUES('MRO','478','Ouguiya','UM');
INSERT INTO `currencies` VALUES('MUR','480','Mauritius rupee','?');
INSERT INTO `currencies` VALUES('MVR','462','Rufiyaa','?');
INSERT INTO `currencies` VALUES('MWK','454','Kwacha','MK');
INSERT INTO `currencies` VALUES('MXN','484','Mexican peso','$');
INSERT INTO `currencies` VALUES('MXV','979','Mexican Unidad de Inversion (UDI) (funds code)',NULL);
INSERT INTO `currencies` VALUES('MYR','458','Malaysian ringgit','RM');
INSERT INTO `currencies` VALUES('MZN','943','Metical','MTn');
INSERT INTO `currencies` VALUES('NAD','516','Namibian dollar','$');
INSERT INTO `currencies` VALUES('NGN','566','Naira','?');
INSERT INTO `currencies` VALUES('NIO','558','Cordoba oro','C$');
INSERT INTO `currencies` VALUES('NOK','578','Norwegian krone','kr');
INSERT INTO `currencies` VALUES('NPR','524','Nepalese rupee','?');
INSERT INTO `currencies` VALUES('NZD','554','New Zealand dollar','$');
INSERT INTO `currencies` VALUES('OMR','512','Rial Omani','?.?.');
INSERT INTO `currencies` VALUES('PAB','590','Balboa','B/.');
INSERT INTO `currencies` VALUES('PEN','604','Nuevo sol','S/.');
INSERT INTO `currencies` VALUES('PGK','598','Kina','K');
INSERT INTO `currencies` VALUES('PHP','608','Philippine peso','?');
INSERT INTO `currencies` VALUES('PKR','586','Pakistan rupee','?');
INSERT INTO `currencies` VALUES('PLN','985','Zloty','z?');
INSERT INTO `currencies` VALUES('PYG','600','Guarani','?');
INSERT INTO `currencies` VALUES('QAR','634','Qatari rial','?.?');
INSERT INTO `currencies` VALUES('RON','946','Romanian new leu','L');
INSERT INTO `currencies` VALUES('RSD','941','Serbian dinar','din. או ???.');
INSERT INTO `currencies` VALUES('RUB','643','Russian rouble','?.');
INSERT INTO `currencies` VALUES('RWF','646','Rwanda franc','Fr');
INSERT INTO `currencies` VALUES('SAR','682','Saudi riyal','?.?');
INSERT INTO `currencies` VALUES('SBD','090','Solomon Islands dollar','$');
INSERT INTO `currencies` VALUES('SCR','690','Seychelles rupee','?');
INSERT INTO `currencies` VALUES('SDG','938','Sudanese pound',NULL);
INSERT INTO `currencies` VALUES('SEK','752','Swedish krona','kr');
INSERT INTO `currencies` VALUES('SGD','702','Singapore dollar','$');
INSERT INTO `currencies` VALUES('SHP','654','Saint Helena pound','£');
INSERT INTO `currencies` VALUES('SKK','703','Slovak koruna','Sk');
INSERT INTO `currencies` VALUES('SLL','694','Leone','Le');
INSERT INTO `currencies` VALUES('SOS','706','Somali shilling','Sh');
INSERT INTO `currencies` VALUES('SRD','968','Surinam dollar','$');
INSERT INTO `currencies` VALUES('STD','678','Dobra','Db');
INSERT INTO `currencies` VALUES('SYP','760','Syrian pound','?.?');
INSERT INTO `currencies` VALUES('SZL','748','Lilangeni','L');
INSERT INTO `currencies` VALUES('THB','764','Baht','?');
INSERT INTO `currencies` VALUES('TJS','972','Somoni','??');
INSERT INTO `currencies` VALUES('TMM','795','Manat','m');
INSERT INTO `currencies` VALUES('TND','788','Tunisian dinar','?.?');
INSERT INTO `currencies` VALUES('TOP','776','Pa''anga','T$');
INSERT INTO `currencies` VALUES('TRY','949','New Turkish lira','?');
INSERT INTO `currencies` VALUES('TTD','780','Trinidad and Tobago dollar','$');
INSERT INTO `currencies` VALUES('TWD','901','New Taiwan dollar','$');
INSERT INTO `currencies` VALUES('TZS','834','Tanzanian shilling','Sh');
INSERT INTO `currencies` VALUES('UAH','980','Hryvnia','?');
INSERT INTO `currencies` VALUES('UGX','800','Uganda shilling','Sh');
INSERT INTO `currencies` VALUES('USD','840','US dollar','$');
INSERT INTO `currencies` VALUES('USN','997','United States dollar (next day) (funds code)',NULL);
INSERT INTO `currencies` VALUES('USS','998','United States dollar (same day) (funds code) (one source claims it is no longer used',NULL);
INSERT INTO `currencies` VALUES('UYU','858','Peso Uruguayo','$');
INSERT INTO `currencies` VALUES('UZS','860','Uzbekistan som',NULL);
INSERT INTO `currencies` VALUES('VEF','937','Venezuelan bolםvar fuerte','Bs');
INSERT INTO `currencies` VALUES('VND','704','Vietnamese d?ng','?');
INSERT INTO `currencies` VALUES('VUV','548','Vatu','Vt');
INSERT INTO `currencies` VALUES('WST','882','Samoan tala','T');
INSERT INTO `currencies` VALUES('XAF','950','CFA franc BEAC','Fr');
INSERT INTO `currencies` VALUES('XAG','961','Silver (one troy ounce)',NULL);
INSERT INTO `currencies` VALUES('XAU','959','Gold (one troy ounce)',NULL);
INSERT INTO `currencies` VALUES('XBA','955','European Composite Unit (EURCO) (bond market unit)',NULL);
INSERT INTO `currencies` VALUES('XBB','956','European Monetary Unit (E.M.U.-6) (bond market unit)',NULL);
INSERT INTO `currencies` VALUES('XBC','957','European Unit of Account 9 (E.U.A.-9) (bond market unit)',NULL);
INSERT INTO `currencies` VALUES('XBD','958','European Unit of Account 17 (E.U.A.-17) (bond market unit)',NULL);
INSERT INTO `currencies` VALUES('XCD','951','East Caribbean dollar',NULL);
INSERT INTO `currencies` VALUES('XDR','960','Special Drawing Rights',NULL);
INSERT INTO `currencies` VALUES('XFU','Nil','UIC franc (special settlement currency)',NULL);
INSERT INTO `currencies` VALUES('XOF','952','CFA Franc BCEAO',NULL);
INSERT INTO `currencies` VALUES('XPD','964','Palladium (one troy ounce)',NULL);
INSERT INTO `currencies` VALUES('XPF','953','CFP franc','Fr');
INSERT INTO `currencies` VALUES('XPT','962','Platinum (one troy ounce)',NULL);
INSERT INTO `currencies` VALUES('XTS','963','Code reserved for testing purposes',NULL);
INSERT INTO `currencies` VALUES('XXX','999','No currency',NULL);
INSERT INTO `currencies` VALUES('YER','886','Yemeni rial','?');
INSERT INTO `currencies` VALUES('ZAR','710','South African rand','R');
INSERT INTO `currencies` VALUES('ZMK','894','Kwacha','ZK');
INSERT INTO `currencies` VALUES('ZWD','716','Zimbabwe dollar','$');
DROP TABLE IF EXISTS `databases`;
CREATE TABLE `databases` (
  `id` int(11) NOT NULL ,
  `string` varchar(255) NOT NULL,
  `prefix` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);
DROP TABLE IF EXISTS `databasesPerm`;
CREATE TABLE `databasesPerm` (
  `id` int(11) NOT NULL ,
  `user_id` int(11) NOT NULL,
  `database_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);
DROP TABLE IF EXISTS `language`;
CREATE TABLE `language` (
  `id` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);
INSERT INTO `language` VALUES('en_us','English');
INSERT INTO `language` VALUES('he_il','עברית');
DROP TABLE IF EXISTS `openformat`;
--
-- Table structure for table `openformat`
--

CREATE TABLE IF NOT EXISTS `openformat` (
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
-- Dumping data for table `openformat`
--

INSERT INTO `openformat` (`id`, `description`, `type`, `size`, `record`, `export`, `import`, `type_id`) VALUES
(1000, 'קוד רשומה', 's', 4, 1, 'A000', 'A000', 'A000'),
(1001, 'נתנוים עתדיים', 's', 5, 1, 'NA', 'NA', 'A000'),
(1002, 'סך רשומות בקובץ', 'n', 15, 1, 'file.linecount', 'file.linecount', 'A000'),
(1003, 'עוסק מורשה', 'n', 9, 1, 'company.vatnum', 'company.vatnum', 'A000'),
(1004, 'מזהה ראשי', 'n', 15, 1, 'this.id', 'this.id', 'A000'),
(1005, 'קבוע מערכת', 's', 8, 1, '&OF1.31&', '&OF1.31&', 'A000'),
(1006, 'רישום תוכנה', 'n', 8, 1, 'system.auth', 'system.auth', 'A000'),
(1007, 'שם תוכנה', 's', 20, 1, 'system.name', 'system.name', 'A000'),
(1008, 'מהדורה', 's', 20, 1, 'system.version', 'system.version', 'A000'),
(1009, 'עמ של יצרן', 'n', 9, 1, 'system.vendor.vatnum', 'system.vendor.vatnum', 'A000'),
(1010, 'יצרן תוכנה', 's', 20, 1, 'system.vendor.name', 'system.vendor.name', 'A000'),
(1011, 'סוג תוכנה', 'n', 1, 1, '2', '2', 'A000'),
(1012, 'נתיב שמירת קובץ', 's', 50, 1, 'NA', 'NA', 'A000'),
(1013, 'סוג הנהחש', 'n', 1, 1, '2', '2', 'A000'),
(1014, 'איזון חשבונאי נדרש', 'n', 1, 1, '1', '1', 'A000'),
(1015, 'מספר חברה ברשם החברות', 'n', 9, 1, 'company.vatnum', 'settings.vatnum', 'A000'),
(1016, 'תיק ניכויים', 'n', 9, 1, 'NA', 'NA', 'A000'),
(1017, 'נתונים עתידיים', 's', 10, 1, 'NA', 'NA', 'A000'),
(1018, 'שם העסק', 's', 50, 1, 'this.name', 'settings.name', 'A000'),
(1019, 'מען העסק רחוב', 's', 50, 1, 'this.address', 'settings.address', 'A000'),
(1020, 'מען העסק מס בית', 's', 10, 1, 'this.address', 'settings.address', 'A000'),
(1021, 'מען העסק עיר', 's', 30, 1, 'this.city', 'settings.city', 'A000'),
(1022, 'מען העסק מיקוד', 's', 8, 1, 'this.zip', 'settings.zip', 'A000'),
(1023, 'שנת המס', 'n', 4, 1, 'NA', 'NA', 'A000'),
(1024, 'תאריך חיתוך', 'date', 8, 1, 'start', 'start', 'A000'),
(1025, 'תאריך חיתוך סןף', 'date', 8, 1, 'end', 'end', 'A000'),
(1026, 'תאריך הפקה', 'date', 8, 1, 'now', 'now', 'A000'),
(1027, 'שעת הפקה', 'hour', 4, 1, 'now', 'now', 'A000'),
(1028, 'קוד שפה', 'n', 1, 1, '0', '0', 'A000'),
(1029, 'סט תווים', 'n', 1, 1, '1', '1', 'A000'),
(1030, 'שם תוכנת הכיווץ', 's', 20, 1, 'zip', 'zip', 'A000'),
(1031, '', '', 0, 0, '', '', 'A002'),
(1032, 'מטבע מוביל', 's', 3, 1, 'NA', 'NA', 'A000'),
(1033, '', '', 0, 0, '', '', 'A002'),
(1034, 'סניפים/ענפים', 'n', 1, 1, '0', '0', 'A000'),
(1035, 'נתונים עתידיים', 's', 46, 1, 'NA', 'NA', 'A000'),
(1050, 'סוג רשומה', 's', 4, 10, 'NA', 'NA', 'A001'),
(1051, 'סך רשומות', 'n', 15, 10, 'NA', 'NA', 'A001'),
(1100, 'קוד רשומה', 's', 4, 9, 'A100', 'A100', 'A100'),
(1101, 'מס רשומה', 'n', 9, 9, 'file.line', 'file.line', 'A100'),
(1102, 'עוסק מורשה', 'n', 9, 9, 'company.vatnum', 'company.vatnum', 'A100'),
(1103, 'מזהה ראשי', 'n', 15, 9, 'this.id', 'this.id', 'A100'),
(1104, 'קבוע מערכת', 's', 8, 9, '&OF1.31&', '&OF1.31&', 'A100'),
(1105, 'נתונים עתדיים', 's', 50, 9, 'NA', 'NA', 'A100'),
(1150, 'קוד רשומה', 's', 4, 8, 'Z900', 'Z900', 'Z900'),
(1151, 'מס רשומה', 'n', 9, 8, 'file.line', 'file.line', 'Z900'),
(1152, 'עוסק מורשה', 'n', 9, 8, 'company.vatnum', 'company.vatnum', 'Z900'),
(1153, 'מזהה ראשי', 'n', 9, 8, 'this.id', 'this.id', 'Z900'),
(1154, 'קבוע מערכת', 's', 8, 8, '&OF1.31&', '&OF1.31&', 'Z900'),
(1155, 'סך רשומות בקובץ', 'n', 15, 8, 'file.linecount', 'file.linecount', 'Z900'),
(1156, 'נתונים עתדיים', 's', 50, 8, 'NA', 'NA', 'Z900'),
(1200, 'קוד רשימה', 's', 4, 4, 'C100', 'C100', 'C100'),
(1201, 'רשומה בקובץ', 'n', 9, 4, 'file.line', 'file.line', 'C100'),
(1202, 'עוסק מורשה', 'n', 9, 4, 'company.vatnum', 'company.vatnum', 'C100'),
(1203, 'סוג מסמך', 'n', 3, 4, 'func.getType', 'func.getType', 'C100'),
(1204, 'מספר מסמך', 's', 20, 4, 'this.docnum', 'this.docnum', 'C100'),
(1205, 'תאריך הפקה', 'date', 8, 4, 'this.issue_date', 'this.issue_date', 'C100'),
(1206, 'שעת הפקה', 'hour', 4, 4, 'this.issue_date', 'this.issue_date', 'C100'),
(1207, 'שם לקוח/ספק', 's', 50, 4, 'this.company', 'this.company', 'C100'),
(1208, 'מען רחוב', 's', 50, 4, 'this.address', 'this.address', 'C100'),
(1209, 'מען מס בית', 's', 10, 4, 'this.address', 'this.address', 'C100'),
(1210, 'מען עיר', 's', 30, 4, 'this.city', 'this.city', 'C100'),
(1211, 'מען מיקוד', 's', 8, 4, 'this.zip', 'this.zip', 'C100'),
(1212, 'מען מדינה', 's', 30, 4, 'NA', 'NA', 'C100'),
(1213, 'מען קוד מדינה', 's', 2, 4, 'NA', 'NA', 'C100'),
(1214, 'טלפון', 's', 15, 4, 'NA', 'NA', 'C100'),
(1215, 'עוסק מורשה לקוח', 'n', 9, 4, 'this.vatnum', 'this.vatnum', 'C100'),
(1216, 'תאריך ערך', 'date', 8, 4, 'this.due_date', 'this.due_date', 'C100'),
(1217, 'סכום סופי של המסמך במט"ח', 'v99', 15, 4, 'NA', 'NA', 'C100'),
(1218, 'קוד מטח', 's', 3, 4, 'NA', 'NA', 'C100'),
(1219, 'סכום לפני הנחה', 'v99', 15, 4, 'this.sub_total', 'this.sub_total', 'C100'),
(1220, 'הנחה', 'v99', 15, 4, 'NA', 'this.discount', 'C100'),
(1221, 'סכום ללא מעמ', 'v99', 15, 4, 'this.novat_total', 'this.novat_total', 'C100'),
(1222, 'סכום מעמ', 'v99', 15, 4, 'this.vat', 'this.vat', 'C100'),
(1223, 'סכום כולל', 'v99', 15, 4, 'this.total', 'this.total', 'C100'),
(1224, 'סכום ניכוי במקור', 'v99', 12, 4, 'this.src_tax', 'this.src_tax', 'C100'),
(1225, 'מספר לקוח בתוכנה', 's', 15, 4, 'this.account_id', 'this.account_id', 'C100'),
(1226, 'שדה התאמה', 's', 10, 4, 'NA', 'NA', 'C100'),
(1227, '', '', 0, 0, '', '', 'C101'),
(1228, 'מסמך מבוטל', 's', 1, 4, 'this.status', 'this.status', 'C100'),
(1229, '', '', 0, 0, '', '', 'C101'),
(1230, 'תאריך המסמך', 'date', 8, 4, 'this.issue_date', 'this.issue_date', 'C100'),
(1231, 'מזהה סניף/ענף', 's', 7, 4, 'NA', 'NA', 'C100'),
(1232, '', '', 0, 0, '', '', 'C101'),
(1233, 'מבצע הפעולה', 's', 9, 4, 'this.owner', 'this.owner', 'C100'),
(1234, 'שדה מקשר לשורה', 'n', 7, 4, 'this.id', 'this.id', 'C100'),
(1235, 'שטח לנתונים עתידיים', 's', 13, 4, 'NA', 'NA', 'C100'),
(1250, 'קוד רשומה', 's', 4, 5, 'D110', 'D110', 'D110'),
(1251, 'מספר רשומה', 'n', 9, 5, 'file.line', 'file.line', 'D110'),
(1252, 'עוסק מורשה', 'n', 9, 5, 'company.vatnum', 'company.vatnum', 'D110'),
(1253, 'סוג מסמך', 'n', 3, 5, 'func.getType', 'func.getType', 'D110'),
(1254, 'מספר המסמך', 's', 20, 5, 'func.getNum', 'func.getNum', 'D110'),
(1255, 'מספר שורה במסמך', 'n', 4, 5, 'this.line', 'this.line', 'D110'),
(1256, 'סוג מסמך בסיס', 'n', 3, 5, 'NA', 'NA', 'D110'),
(1257, 'מספר מסמך בסיס', 's', 20, 5, 'NA', 'NA', 'D110'),
(1258, 'סוג עסקה', 'n', 1, 5, 'NA', 'NA', 'D110'),
(1259, 'מקט פנימי', 's', 20, 5, 'this.item_id', 'this.item_id', 'D110'),
(1260, 'תיאור הטובין או הפריט', 's', 30, 5, 'this.name', 'this.name', 'D110'),
(1261, 'שם יצרן', 's', 50, 5, 'NA', 'NA', 'D110'),
(1262, 'מספר סידורי של היצרן', 's', 30, 5, 'NA', 'NA', 'D110'),
(1263, 'תיאור יחידת מידה', 's', 20, 5, 'this.unit_id', 'this.unit_id', 'D110'),
(1264, 'הכמות', 'v9999', 17, 5, 'this.qty', 'this.qty', 'D110'),
(1265, 'מחיר ליחידה ללא מעמ', 'v99', 15, 5, 'this.unit_price', 'this.unit_price', 'D110'),
(1266, 'הנחת שורה', 'v99', 15, 5, 'NA', 'NA', 'D110'),
(1267, 'סך סכום לשורה', 'v99', 15, 5, 'this.price', 'this.price', 'D110'),
(1268, 'שיעור המעמ בשורה', 'n', 4, 5, 'this.vat', 'this.vat', 'D110'),
(1269, '', '', 0, 0, '', '', 'D111'),
(1270, 'מזהה סניף/ענף', 's', 7, 5, 'NA', 'NA', 'D110'),
(1271, '', '', 0, 0, '', '', 'D111'),
(1272, 'תאריך המסמך', 'date', 8, 5, 'func.getDate', 'func.getDate', 'D110'),
(1273, 'שדה מקושר לכותרת', 'n', 7, 5, 'this.doc_id', 'this.doc_id', 'D110'),
(1274, 'מזהה סניף/ענף למסמך בסיס', 's', 7, 5, 'NA', 'NA', 'D110'),
(1275, 'נתונים עתידיים', 's', 21, 5, 'NA', 'NA', 'D110'),
(1300, 'קוד רשומה', 's', 4, 6, 'D120', 'D120', 'D120'),
(1301, 'מספר רשומה', 'n', 9, 6, 'file.line', 'file.line', 'D120'),
(1302, 'עוסק מורשה', 'n', 9, 6, 'company.vatnum', 'company.vatnum', 'D120'),
(1303, 'סוג מסמך', 'n', 3, 6, 'func.getType', 'func.getType', 'D120'),
(1304, 'מספר מסמך', 's', 20, 6, 'func.getNum', 'func.getNum', 'D120'),
(1305, 'מספר שורה במסמך', 'n', 4, 6, 'this.line', 'this.line', 'D120'),
(1306, 'סוג אמצעי תשלום', 'n', 1, 6, 'this.type', 'this.type', 'D120'),
(1307, 'מספר בנק', 'n', 10, 6, 'this.bank', 'this.bank', 'D120'),
(1308, 'מספר סניף', 'n', 10, 6, 'this.branch', 'this.branch', 'D120'),
(1309, 'מספר חשבון', 'n', 15, 6, 'this.cheque_acct', 'this.cheque_acct', 'D120'),
(1310, 'מספר המחאה', 'n', 10, 6, 'this.cheque_num', 'this.cheque_num', 'D120'),
(1311, 'תאריך פרעון', 'date', 8, 6, 'this.cheque_date', 'this.cheque_date', 'D120'),
(1312, 'סכום השורה', 'v99', 15, 6, 'this.sum', 'this.sum', 'D120'),
(1313, 'קוד החברה הסולקת', 'n', 1, 6, 'NA', 'NA', 'D120'),
(1314, 'שם הכרטיס הנסלק', 's', 20, 6, 'NA', 'NA', 'D120'),
(1315, 'סוג עסקת אשראי', 'n', 1, 6, 'NA', 'NA', 'D120'),
(1316, '', '', 0, 0, '', '', 'D121'),
(1317, '', '', 0, 0, '', '', 'D121'),
(1318, '', '', 0, 0, '', '', 'D121'),
(1319, '', '', 0, 0, '', '', 'D121'),
(1320, 'מזהה סניף/ענף', 's', 7, 6, 'NA', 'NA', 'D120'),
(1321, '', '', 0, 0, '', '', 'D121'),
(1322, 'תאריך מסמך', 'date', 8, 6, 'func.getDate', 'func.getDate', 'D120'),
(1323, 'שדה מקשר לכותרת', 'n', 7, 6, 'this.doc_id', 'this.doc_id', 'D120'),
(1324, 'נתונים עתידיים', 's', 60, 6, 'NA', 'NA', 'D120'),
(1350, 'קוד רשומה', 's', 4, 2, 'B100', 'B100', 'B100'),
(1351, 'מספר רשומה', 'n', 9, 2, 'file.line', 'file.line', 'B100'),
(1352, 'עוסק מורשה', 'n', 9, 2, 'company.vatnum', 'company.vatnum', 'B100'),
(1353, 'מספר תנועה', 'n', 10, 2, 'this.num', 'this.num', 'B100'),
(1354, 'מספר שורה בתנועה', 'n', 5, 2, 'this.linenum', 'this.linenum', 'B100'),
(1355, 'מנה', 'n', 8, 2, 'NA', 'NA', 'B100'),
(1356, 'סוג תנועה', 's', 15, 2, 'this.type', 'this.type', 'B100'),
(1357, 'אסמכתא', 's', 20, 2, 'this.refnum1', 'this.refnum1', 'B100'),
(1358, 'סוג מסמך אסמכתא', 'n', 3, 2, 'NA', 'NA', 'B100'),
(1359, 'אסמכתא 2', 's', 20, 2, 'this.refnum2', 'this.refnum2', 'B100'),
(1360, 'סוג מסמך אסמכתא 2', 'n', 3, 2, 'NA', 'NA', 'B100'),
(1361, 'פרטים', 's', 50, 2, 'this.details', 'this.details', 'B100'),
(1362, 'תאריך', 'date', 8, 2, 'this.date', 'this.date', 'B100'),
(1363, 'תאריך ערך', 'date', 8, 2, 'this.valuedate', 'this.valuedate', 'B100'),
(1364, 'חשבון בתנועה', 's', 15, 2, 'this.account_id', 'this.account_id', 'B100'),
(1365, 'חשבון נגדי', 's', 15, 2, 'NA', 'NA', 'B100'),
(1366, 'סימן הפועלה', 'n', 1, 2, 'func.opefrmtMrk', 'func.opefrmtMrk', 'B100'),
(1367, 'קוד מטבע מטח', 's', 3, 2, 'this.currency_id', 'this.currency_id', 'B100'),
(1368, 'סכום הפעולה', 'v99', 15, 2, 'this.leadsum', 'this.leadsum', 'B100'),
(1369, 'סכום מטח', 'v99', 15, 2, 'this.sum', 'this.sum', 'B100'),
(1370, 'שדה כמות', 'v99', 12, 2, 'NA', 'NA', 'B100'),
(1371, 'שדה התאמה 1', 's', 10, 2, 'NA', 'NA', 'B100'),
(1372, 'שדה התאמה 2', 's', 10, 2, 'NA', 'NA', 'B100'),
(1373, '', '', 0, 0, '', '', 'B101'),
(1374, 'מזהה סניף/ענף', 's', 7, 2, 'NA', 'NA', 'B100'),
(1375, 'תאריך הזנה', 'date', 8, 2, 'NA', 'NA', 'B100'),
(1376, 'מבצע פעולה', 's', 9, 2, 'this.owner_id', 'this.owner_id', 'B100'),
(1377, 'נתונים עתידיים', 's', 25, 2, 'NA', 'NA', 'B100'),
(1400, 'קוד רשומה', 's', 4, 3, 'B110', 'B110', 'B110'),
(1401, 'מספר רשומה', 'n', 9, 3, 'file.line', 'file.line', 'B110'),
(1402, 'עוסק מורשה', 'n', 9, 3, 'company.vatnum', 'company.vatnum', 'B110'),
(1403, 'מפתח החשבון', 's', 15, 3, 'this.id', 'this.id', 'B110'),
(1404, 'שם חשבון', 's', 50, 3, 'this.name', 'this.name', 'B110'),
(1405, 'קוד מאזן בוחן', 's', 15, 3, 'this.type', 'this.type', 'B110'),
(1406, 'תיאור קוד מאזן בוחן', 's', 30, 3, 'func.getType', 'typedesc', 'B110'),
(1407, 'מען רחוב', 's', 30, 3, 'this.address', 'this.address', 'B110'),
(1408, 'מען מספר בית', 's', 50, 3, 'this.address', 'this.address', 'B110'),
(1409, 'מען עיר', 's', 10, 3, 'this.city', 'this.city', 'B110'),
(1410, 'מען מיקוד', 's', 8, 3, 'this.zip', 'this.zip', 'B110'),
(1411, 'מען מדינה', 's', 30, 3, 'NA', 'NA', 'B110'),
(1412, 'קוד מדינה', 's', 2, 3, 'NA', 'NA', 'B110'),
(1413, 'חשבון מרכז', 's', 15, 3, 'NA', 'NA', 'B110'),
(1414, 'יתרת חשבון בתחילת החתך', 'v99', 15, 3, 'limit.getBalance', 'limit.getBalance', 'B110'),
(1415, 'סהכ חובה', 'v99', 15, 3, 'limit.getPos', 'limit.getPos', 'B110'),
(1416, 'סהכ זכות', 'v99', 15, 3, 'limit.getNeg', 'limit.getNeg', 'B110'),
(1417, 'קוד בסיווג חשבונאי', 'n', 4, 3, 'this.id6111', 'this.id6111', 'B110'),
(1418, '', '', 0, 0, '', '', 'B111'),
(1419, 'מספר עוסק לקוח', 'n', 9, 3, 'this.vatnum', 'this.vatnum', 'B110'),
(1420, '', '', 0, 0, '', '', 'B111'),
(1421, 'מזהה סניף/ענף', 's', 7, 3, 'NA', 'NA', 'B110'),
(1422, 'יתרת חשבון בתחילת חתך במטח', 'v99', 15, 3, 'NA', 'NA', 'B110'),
(1423, 'קוד מטבע יתרת חשבון במטח', 's', 3, 3, 'NA', 'this.currency_id', 'B110'),
(1424, 'שטח לנתונים עתדיים', 's', 16, 3, 'NA', 'NA', 'B110'),
(1450, 'קוד רשומה', 's', 4, 7, 'M100', 'M100', 'M100'),
(1451, 'רשומה בקובץ', 'n', 9, 7, 'file.line', 'file.line', 'M100'),
(1452, 'עוסק מורשה', 'n', 9, 7, 'company.vatnum', 'company.vatnum', 'M100'),
(1453, 'מקט פריט', 's', 20, 7, 'this.id', 'this.id', 'M100'),
(1454, 'מקט ספק יצרן', 's', 20, 7, 'this.extcatnum', 'this.extcatnum', 'M100'),
(1455, 'מקט פנימי', 's', 20, 7, 'this.id', 'this.id', 'M100'),
(1456, 'שם פריט', 's', 50, 7, 'this.name', 'this.name', 'M100'),
(1457, 'קוד מיון', 's', 10, 7, 'NA', 'NA', 'M100'),
(1458, 'תיאור קוד מיון', 's', 30, 7, 'NA', 'NA', 'M100'),
(1459, 'תיאור יחידת מידה', 's', 20, 7, 'this.unit_id', 'this.unit_id', 'M100'),
(1460, 'יתרת פריטת לתחילת חתך', 'v99', 12, 7, 'ammount', 'ammount', 'M100'),
(1461, 'סך הכל כניסות', 'v99', 12, 7, 'NA', 'NA', 'M100'),
(1462, 'סך הכל יציאות', 'v99', 12, 7, 'NA', 'NA', 'M100'),
(1463, '', '99', 10, 7, 'NA', 'NA', 'M100'),
(1464, '', '99', 10, 7, 'this.saleprice', 'this.saleprice', 'M100'),
(1465, 'נתונים עתדיים', 's', 50, 7, 'NA', 'NA', 'M100');




DROP TABLE IF EXISTS `openformattype`;
CREATE TABLE `openformattype` (
  `id` varchar(4) NOT NULL,
  `description` varchar(26) DEFAULT NULL,
  `type` varchar(8) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`,`type`)
);
INSERT INTO `openformattype` VALUES('A000','רשימת פתיחה','INI');
INSERT INTO `openformattype` VALUES('B100','תנועת הנהח','BKMVDATA');
INSERT INTO `openformattype` VALUES('B110','חשבון בהנהח','BKMVDATA');
INSERT INTO `openformattype` VALUES('C100','כותרת מסמך','BKMVDATA');
INSERT INTO `openformattype` VALUES('D110','פריט מסמך','BKMVDATA');
INSERT INTO `openformattype` VALUES('D120','פריט קבלה','BKMVDATA');
INSERT INTO `openformattype` VALUES('M100','פריט מלאי','BKMVDATA');
INSERT INTO `openformattype` VALUES('Z900','רשומת סגירה DATA','BKMVDATA');
INSERT INTO `openformattype` VALUES('A100','רשימת פתיחה DATA','BKMVDATA');
INSERT INTO `openformattype` VALUES('B100','תנועת הנהח','INI');
INSERT INTO `openformattype` VALUES('B110','חשבון בהנהח','INI');
INSERT INTO `openformattype` VALUES('C100','כותרת מסמך','INI');
INSERT INTO `openformattype` VALUES('D110','פריט מסמך','INI');
INSERT INTO `openformattype` VALUES('D120','פריט קבלה','INI');
INSERT INTO `openformattype` VALUES('M100','פריט מלאי','INI');
DROP TABLE IF EXISTS `sessionStore`;
CREATE TABLE `sessionStore` (
  `id` char(32) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` longblob,
  PRIMARY KEY (`id`)
);
INSERT INTO `sessionStore` VALUES('2ac956209918b8dde6d85e9d44f7908b',1390235166,'368a680942e5c71363a80d7cf0a261faOrgDatabase|a:2:{s:6:`string`;s:76:`sqlite:C:\Program Files\linet\apache\htdocs\protected\config/../data/main.db`;s:6:`prefix`;N;}368a680942e5c71363a80d7cf0a261faCompany|i:0;');
INSERT INTO `sessionStore` VALUES('cbcfd75f3f69f8d66002dfcda3b203a3',1390235415,'368a680942e5c71363a80d7cf0a261fa__id|s:1:`1`;368a680942e5c71363a80d7cf0a261fa__name|s:5:`admin`;368a680942e5c71363a80d7cf0a261facertpasswd|s:6:`qwe123`;368a680942e5c71363a80d7cf0a261falanguage|s:5:`he_il`;368a680942e5c71363a80d7cf0a261fatimezone|s:14:`asia/jerusalem`;368a680942e5c71363a80d7cf0a261fatheme|s:0:``;368a680942e5c71363a80d7cf0a261fa__states|a:4:{s:10:`certpasswd`;b:1;s:8:`language`;b:1;s:8:`timezone`;b:1;s:5:`theme`;b:1;}368a680942e5c71363a80d7cf0a261faRights_isSuperuser|b:1;368a680942e5c71363a80d7cf0a261faOrgDatabase|a:2:{s:6:`string`;s:76:`sqlite:C:\Program Files\linet\apache\htdocs\protected\config/../data/main.db`;s:6:`prefix`;N;}368a680942e5c71363a80d7cf0a261faCompany|i:0;');
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL ,
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
  PRIMARY KEY (`id`)
);
