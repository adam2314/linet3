<?php

/* * *********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */

class m301119_070115_0027 extends CDbMigration {

    public function up() {

        CFileHelper::removeDirectory(Yii::app()->basePath."/components/dashboard/");
        CFileHelper::removeDirectory(Yii::app()->basePath."/../update/");
        CFileHelper::removeDirectory(Yii::app()->basePath."/../assets/lib/chosen/");
        
        $this->delete("menu","1");
        $this->addColumn('menu', 'sort', 'int(12) NOT NULL'); 
        
        
        
        
$this->insert('menu', array("id"=>1,"label"=>'Settings', "url"=>NULL, "icon"=>'glyphicon glyphicon-cog',"parent"=>80, "sort"=>0)); 
$this->insert('menu', array("id"=>2,"label"=>'Business Details', "url"=>'settings/admin',"icon"=>NULL ,"parent"=>1, "sort"=> 0)); 
$this->insert('menu', array("id"=>3,"label"=>'Manual Journal Voucher', "url"=>'transaction/create',"icon"=>NULL ,"parent"=>12, "sort"=> 0)); 
$this->insert('menu', array("id"=>4,"label"=>'Business Docs', "url"=>'doctype/admin',"icon"=>NULL ,"parent"=>1, "sort"=> 0)); 
$this->insert('menu', array("id"=>5,"label"=>'Custom Fields', "url"=>'eavFields/admin',"icon"=>NULL ,"parent"=>1, "sort"=> 0)); 
$this->insert('menu', array("id"=>6,"label"=>'Currency Rates', "url"=>'currates/admin',"icon"=>NULL ,"parent"=>1, "sort"=> 0)); 
$this->insert('menu', array("id"=>7,"label"=>'Opening Balances', "url"=>'transaction/openbalance',"icon"=>NULL ,"parent"=>1, "sort"=> 0)); 
$this->insert('menu', array("id"=>8,"label"=>'Contact Item', "url"=>'rm/admin',"icon"=>NULL ,"parent"=>12, "sort"=> 0)); 
$this->insert('menu', array("id"=>9,"label"=>'Tax Category For Items', "url"=>'ItemVatCat/admin',"icon"=>NULL ,"parent"=>1, "sort"=> 0)); 
$this->insert('menu', array("id"=>10,"label"=>'Manage Users', "url"=>'users/admin',"icon"=>NULL ,"parent"=>1, "sort"=> 0)); 
$this->insert('menu', array("id"=>11,"label"=>'Manage Groups', "url"=>'rights/authItem/roles',"icon"=>NULL ,"parent"=>1, "sort"=> 0)); 
$this->insert('menu', array("id"=>12,"label"=>'Manage Accounts', "url"=>NULL, "icon"=>'glyphicon glyphicon-folder-open', "parent"=>80, "sort"=>0)); 
$this->insert('menu', array("id"=>13,"label"=>'Accounts', "url"=>'accounts/index',"icon"=>NULL ,"parent"=>12, "sort"=> 0)); 
$this->insert('menu', array("id"=>14,"label"=>'Account Template', "url"=>'accTemplate/admin',"icon"=>NULL ,"parent"=>12, "sort"=> 0)); 
$this->insert('menu', array("id"=>16,"label"=>'Stock', "url"=>NULL, "icon"=>'glyphicon glyphicon-tag', "parent"=>0, "sort"=>7)); 
$this->insert('menu', array("id"=>17,"label"=>'Items', "url"=>'item/admin',"icon"=>NULL ,"parent"=>16, "sort"=> 0)); 
$this->insert('menu', array("id"=>18,"label"=>'Werehouses', "url"=>'accounts/index/8',"icon"=>NULL ,"parent"=>16, "sort"=> 0)); 
$this->insert('menu', array("id"=>19,"label"=>'Categories', "url"=>'itemcategory/admin',"icon"=>NULL ,"parent"=>16, "sort"=> 0)); 
$this->insert('menu', array("id"=>20,"label"=>'Units', "url"=>'itemunit/admin',"icon"=>NULL ,"parent"=>16, "sort"=> 0)); 
$this->insert('menu', array("id"=>21,"label"=>'Item Template', "url"=>'itemTemplate/admin',"icon"=>NULL ,"parent"=>16, "sort"=> 0)); 
$this->insert('menu', array("id"=>22,"label"=>'Income', "url"=>NULL, "icon"=>'glyphicon glyphicon-thumbs-up', "parent"=>0, "sort"=>2)); 
$this->insert('menu', array("id"=>23,"label"=>'Quote', "url"=>'docs/create/6',"icon"=>NULL ,"parent"=>22, "sort"=> 0)); 
$this->insert('menu', array("id"=>24,"label"=>'Sales Order', "url"=>'docs/create/7',"icon"=>NULL ,"parent"=>22, "sort"=> 0)); 
$this->insert('menu', array("id"=>25,"label"=>'Delivery Doc', "url"=>'docs/create/2',"icon"=>NULL ,"parent"=>22, "sort"=> 0)); 
$this->insert('menu', array("id"=>26,"label"=>'Proforma', "url"=>'docs/create/1',"icon"=>NULL ,"parent"=>22, "sort"=> 0)); 
$this->insert('menu', array("id"=>27,"label"=>'Invoice', "url"=>'docs/create/3',"icon"=>NULL ,"parent"=>22, "sort"=> 0)); 
$this->insert('menu', array("id"=>28,"label"=>'Invoice Receipt', "url"=>'docs/create/9',"icon"=>NULL ,"parent"=>22, "sort"=> 0)); 
$this->insert('menu', array("id"=>29,"label"=>'Return Doc.', "url"=>'docs/create/5',"icon"=>NULL ,"parent"=>22, "sort"=> 0)); 
$this->insert('menu', array("id"=>30,"label"=>'Credit Inv.', "url"=>'docs/create/4',"icon"=>NULL ,"parent"=>22, "sort"=> 0)); 
$this->insert('menu', array("id"=>31,"label"=>'Print Docs.', "url"=>'docs/admin',"icon"=>NULL ,"parent"=>22, "sort"=> 0)); 
$this->insert('menu', array("id"=>32,"label"=>'Expense', "url"=>NULL, "icon"=>'glyphicon glyphicon-shopping-cart', "parent"=>0, "sort"=>3)); 
$this->insert('menu', array("id"=>33,"label"=>'Manage Suppliers', "url"=>'accounts/index/1',"icon"=>NULL ,"parent"=>32, "sort"=> 0)); 
$this->insert('menu', array("id"=>34,"label"=>'Purchase Order', "url"=>'docs/create/10',"icon"=>NULL ,"parent"=>16, "sort"=> 0)); 
$this->insert('menu', array("id"=>35,"label"=>'Insert Business Expense', "url"=>'docs/create/13',"icon"=>NULL ,"parent"=>32, "sort"=> 0)); 
$this->insert('menu', array("id"=>36,"label"=>'Insert Assets Expense', "url"=>'docs/create/14',"icon"=>NULL ,"parent"=>32, "sort"=> 0)); 
$this->insert('menu', array("id"=>37,"label"=>'Cash Register', "url"=>NULL, "icon"=>'glyphicon glyphicon-usd', "parent"=>0, "sort"=>4)); 
$this->insert('menu', array("id"=>38,"label"=>'Receipt', "url"=>'docs/create/8',"icon"=>NULL ,"parent"=>37, "sort"=> 0)); 
$this->insert('menu', array("id"=>39,"label"=>'Bank Deposits', "url"=>'deposit/admin',"icon"=>NULL ,"parent"=>37, "sort"=> 0)); 
$this->insert('menu', array("id"=>40,"label"=>'Supplier Payment', "url"=>'outcome/create',"icon"=>NULL ,"parent"=>37, "sort"=> 0)); 
$this->insert('menu', array("id"=>41,"label"=>'VAT payment', "url"=>'outcome/create/1',"icon"=>NULL ,"parent"=>37, "sort"=> 0)); 
$this->insert('menu', array("id"=>42,"label"=>'Nat. Ins. payment', "url"=>'outcome/create/2',"icon"=>NULL ,"parent"=>37, "sort"=> 0)); 
$this->insert('menu', array("id"=>43,"label"=>'Reconciliations', "url"=>NULL, "icon"=>'glyphicon glyphicon-eye-open', "parent"=>0, "sort"=>5)); 
$this->insert('menu', array("id"=>44,"label"=>'Bank Sheet Import', "url"=>'bankbook/admin',"icon"=>NULL ,"parent"=>43, "sort"=> 0)); 
$this->insert('menu', array("id"=>45,"label"=>'Bank Recon.', "url"=>'bankbook/extmatch',"icon"=>NULL ,"parent"=>43, "sort"=> 0)); 
$this->insert('menu', array("id"=>46,"label"=>'Show Bank Recon', "url"=>'bankbook/edispmatch',"icon"=>NULL ,"parent"=>43, "sort"=> 0)); 
$this->insert('menu', array("id"=>47,"label"=>'Accounts Recon.', "url"=>'match/intmatch',"icon"=>NULL ,"parent"=>43, "sort"=> 0)); 
$this->insert('menu', array("id"=>48,"label"=>'Display Recon.', "url"=>'match/dispmatch',"icon"=>NULL ,"parent"=>43, "sort"=> 0)); 
$this->insert('menu', array("id"=>49,"label"=>'Reports', "url"=>NULL, "icon"=>'glyphicon glyphicon-stats', "parent"=>0, "sort"=>6)); 
$this->insert('menu', array("id"=>50,"label"=>'Display Transactions', "url"=>'reports/journal',"icon"=>NULL ,"parent"=>49, "sort"=> 0)); 
$this->insert('menu', array("id"=>51,"label"=>'Customers Debits', "url"=>'reports/owe',"icon"=>NULL ,"parent"=>49, "sort"=> 0)); 
$this->insert('menu', array("id"=>52,"label"=>'Profit And Loss', "url"=>'reports/profloss',"icon"=>NULL ,"parent"=>49, "sort"=> 0)); 
$this->insert('menu', array("id"=>53,"label"=>'Monthly Prof. And Loss', "url"=>'reports/mprofloss',"icon"=>NULL ,"parent"=>49, "sort"=> 0)); 
$this->insert('menu', array("id"=>54,"label"=>'VAT Calculation', "url"=>'reports/vat',"icon"=>NULL ,"parent"=>49, "sort"=> 0)); 
$this->insert('menu', array("id"=>55,"label"=>'Balance', "url"=>'reports/balance',"icon"=>NULL ,"parent"=>49, "sort"=> 0)); 
$this->insert('menu', array("id"=>56,"label"=>'In Advance Income Tax Pay', "url"=>'reports/taxrep',"icon"=>NULL ,"parent"=>49, "sort"=> 0)); 
$this->insert('menu', array("id"=>57,"label"=>'Import Export', "url"=>NULL, "icon"=>'glyphicon glyphicon-transfer', "parent"=>80, "sort"=>0)); 
$this->insert('menu', array("id"=>58,"label"=>'Open Format File', "url"=>'data/openfrmt',"icon"=>NULL ,"parent"=>57, "sort"=> 0)); 
$this->insert('menu', array("id"=>59,"label"=>'Import Open Format', "url"=>'data/openfrmtimport',"icon"=>NULL ,"parent"=>57, "sort"=> 0)); 
$this->insert('menu', array("id"=>60,"label"=>'General Backup', "url"=>'data/backup',"icon"=>NULL ,"parent"=>57, "sort"=> 0)); 
$this->insert('menu', array("id"=>61,"label"=>'Restore From Backup', "url"=>'data/restore',"icon"=>NULL ,"parent"=>57, "sort"=> 0)); 
$this->insert('menu', array("id"=>62,"label"=>'PCN874 Report', "url"=>'data/pcn874',"icon"=>NULL ,"parent"=>57, "sort"=> 0)); 
$this->insert('menu', array("id"=>63,"label"=>'Support', "url"=>NULL, "icon"=>'glyphicon glyphicon-info-sign', "parent"=>80, "sort"=>0)); 
$this->insert('menu', array("id"=>64,"label"=>'Update', "url"=>'newUpdate/',"icon"=>NULL ,"parent"=>63, "sort"=> 0)); 
$this->insert('menu', array("id"=>65,"label"=>'Paid Support', "url"=>'site/support',"icon"=>NULL ,"parent"=>63, "sort"=> 0)); 
$this->insert('menu', array("id"=>66,"label"=>'About', "url"=>'site/about',"icon"=>NULL ,"parent"=>63, "sort"=> 0)); 
$this->insert('menu', array("id"=>67,"label"=>'Bug Report', "url"=>'site/bug',"icon"=>NULL ,"parent"=>63, "sort"=> 0)); 
$this->insert('menu', array("id"=>68,"label"=>'Warehouse Transaction', "url"=>'docs/create/15',"icon"=>NULL ,"parent"=>16, "sort"=> 0)); 
$this->insert('menu', array("id"=>69,"label"=>'Manage Permissons', "url"=>'rights/authItem/permissions',"icon"=>NULL ,"parent"=>1, "sort"=> 0)); 
$this->insert('menu', array("id"=>70,"label"=>'Stock Transaction', "url"=>'reports/stockAction',"icon"=>NULL ,"parent"=>49, "sort"=> 0)); 
$this->insert('menu', array("id"=>71,"label"=>'Id6111 Admin', "url"=>'accId6111/admin',"icon"=>NULL ,"parent"=>1, "sort"=> 0)); 
$this->insert('menu', array("id"=>72,"label"=>'Mail Template', "url"=>'mailTemplate/admin',"icon"=>NULL ,"parent"=>1, "sort"=> 0)); 
$this->insert('menu', array("id"=>73,"label"=>'Stock', "url"=>'reports/stock',"icon"=>NULL ,"parent"=>49, "sort"=> 0)); 
$this->insert('menu', array("id"=>74,"label"=>'Linet 2 Import', "url"=>'data/linet2Import',"icon"=>NULL ,"parent"=>57, "sort"=> 0)); 
$this->insert('menu', array("id"=>75,"label"=>'Bulk Balance', "url"=>'reports/accounts',"icon"=>NULL ,"parent"=>49, "sort"=> 0)); 
$this->insert('menu', array("id"=>76,"label"=>'Account Categories', "url"=>'accCat/admin',"icon"=>NULL ,"parent"=>12, "sort"=> 0)); 
$this->insert('menu', array("id"=>77,"label"=>'Payment Admin', "url"=>'payment/admin',"icon"=>NULL ,"parent"=>1, "sort"=> 0)); 
$this->insert('menu', array("id"=>78,"label"=>'Stock entry certificate', "url"=>'docs/create/16',"icon"=>NULL ,"parent"=>16, "sort"=> 0)); 
$this->insert('menu', array("id"=>79,"label"=>'Stock exit certificate', "url"=>'docs/create/17',"icon"=>NULL ,"parent"=>16, "sort"=> 0)); 
$this->insert('menu', array("id"=>80,"label"=>'General', "url"=>NULL, "icon"=>'glyphicon glyphicon-flag', "parent"=>0, "sort"=>1));
        
        
        
        
        
    }

    public function down() {

        return true;
    }

}
