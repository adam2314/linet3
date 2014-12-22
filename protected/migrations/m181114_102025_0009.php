<?php
/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
class m181114_102025_0009 extends CDbMigration {

    public function up() {


        $this->update('menu', array("label" => "Settings"), "id=1");
        $this->update('menu', array("label" => "Business Details"), "id=2");
        $this->update('menu', array("label" => "Manual Journal Voucher"), "id=3");
        $this->update('menu', array("label" => "Business Docs"), "id=4");
        $this->update('menu', array("label" => "Custom Fields"), "id=5");
        $this->update('menu', array("label" => "Currency Rates"), "id=6");
        $this->update('menu', array("label" => "Opening Balances"), "id=7");
        $this->update('menu', array("label" => "Contact Item"), "id=8");
        $this->update('menu', array("label" => "Tax Category For Items"), "id=9");
        $this->update('menu', array("label" => "Manage Users"), "id=10");
        $this->update('menu', array("label" => "Manage Groups"), "id=11");
        $this->update('menu', array("label" => "Accounts"), "id=12");
        $this->update('menu', array("label" => "Accounts"), "id=13");
        $this->update('menu', array("label" => "Account Template"), "id=14");
        $this->update('menu', array("label" => "Stock"), "id=16");
        $this->update('menu', array("label" => "Items"), "id=17");
        $this->update('menu', array("label" => "Werehouses"), "id=18");
        $this->update('menu', array("label" => "Categories"), "id=19");
        $this->update('menu', array("label" => "Units"), "id=20");
        $this->update('menu', array("label" => "Item Template"), "id=21");
        $this->update('menu', array("label" => "Income"), "id=22");
        $this->update('menu', array("label" => "Quote"), "id=23");
        $this->update('menu', array("label" => "Sales Order"), "id=24");
        $this->update('menu', array("label" => "Delivery Doc"), "id=25");
        $this->update('menu', array("label" => "Proforma"), "id=26");
        $this->update('menu', array("label" => "Invoice"), "id=27");
        $this->update('menu', array("label" => "Invoice Receipt"), "id=28");
        $this->update('menu', array("label" => "Return Doc."), "id=29");
        $this->update('menu', array("label" => "Credit Inv."), "id=30");
        $this->update('menu', array("label" => "Print Docs."), "id=31");
        $this->update('menu', array("label" => "Expense"), "id=32");
        $this->update('menu', array("label" => "Manage Suppliers"), "id=33");
        $this->update('menu', array("label" => "Purchase Order"), "id=34");
        $this->update('menu', array("label" => "Insert Business Expense"), "id=35");
        $this->update('menu', array("label" => "Insert Assets Expense"), "id=36");
        $this->update('menu', array("label" => "Cash Register"), "id=37");
        $this->update('menu', array("label" => "Receipt"), "id=38");
        $this->update('menu', array("label" => "Bank Deposits"), "id=39");
        $this->update('menu', array("label" => "Supplier Payment"), "id=40");
        $this->update('menu', array("label" => "VAT payment"), "id=41");
        $this->update('menu', array("label" => "Nat. Ins. payment"), "id=42");
        $this->update('menu', array("label" => "Reconciliations"), "id=43");
        $this->update('menu', array("label" => "Bank Sheet Import"), "id=44");
        $this->update('menu', array("label" => "Bank Recon."), "id=45");
        $this->update('menu', array("label" => "Show Bank Recon"), "id=46");
        $this->update('menu', array("label" => "Accounts Recon."), "id=47");
        $this->update('menu', array("label" => "Display Recon."), "id=48");
        $this->update('menu', array("label" => "Reports"), "id=49");
        $this->update('menu', array("label" => "Display Transactions"), "id=50");
        $this->update('menu', array("label" => "Customers Debits"), "id=51");
        $this->update('menu', array("label" => "Profit And Loss"), "id=52");
        $this->update('menu', array("label" => "Monthly Prof. And Loss"), "id=53");
        $this->update('menu', array("label" => "VAT Calculation"), "id=54");
        $this->update('menu', array("label" => "Balance"), "id=55");
        $this->update('menu', array("label" => "In Advance Income Tax Pay"), "id=56");
        $this->update('menu', array("label" => "Import Export"), "id=57");
        $this->update('menu', array("label" => "Open Format File"), "id=58");
        $this->update('menu', array("label" => "Import Open Format"), "id=59");
        $this->update('menu', array("label" => "General Backup"), "id=60");
        $this->update('menu', array("label" => "Restore From Backup"), "id=61");
        $this->update('menu', array("label" => "PCN874 Report"), "id=62");
        $this->update('menu', array("label" => "Support"), "id=63");
        $this->update('menu', array("label" => "Update"), "id=64");
        $this->update('menu', array("label" => "Paid Support"), "id=65");
        $this->update('menu', array("label" => "About"), "id=66");
        $this->update('menu', array("label" => "Bug Report"), "id=67");
        $this->update('menu', array("label" => "Warehouse Transaction"), "id=68");
        $this->update('menu', array("label" => "Manage Permissons"), "id=69");
        $this->update('menu', array("label" => "Stock Transaction"), "id=70");
        $this->update('menu', array("label" => "Id6111 Admin"), "id=71");
        $this->update('menu', array("label" => "Mail Template"), "id=72");
        $this->update('menu', array("label" => "Stock"), "id=73");
        $this->update('menu', array("label" => "Linet 2 Import"), "id=74");
        $this->update('menu', array("label" => "Bulk Balance"), "id=75");
        $this->update('menu', array("label" => "Account Categories"), "id=76");

        $companys = Company::model()->findAll();
        foreach ($companys as $company) {
            $this->update($company->prefix . 'transactionType', array("name" => "Manual Transaction"), "id=0");
            $this->update($company->prefix . 'transactionType', array("name" => "Invoice"), "id=1");
            $this->update($company->prefix . 'transactionType', array("name" => "Supplier Invoice"), "id=2");
            $this->update($company->prefix . 'transactionType', array("name" => "Receipt"), "id=3");
            $this->update($company->prefix . 'transactionType', array("name" => "Check Deposit"), "id=4");
            $this->update($company->prefix . 'transactionType', array("name" => "Supplier Payment"), "id=5");
            $this->update($company->prefix . 'transactionType', array("name" => "Vat Payment"), "id=6");
            $this->update($company->prefix . 'transactionType', array("name" => "Storeno"), "id=7");
            $this->update($company->prefix . 'transactionType', array("name" => "Bank Match"), "id=8");
            $this->update($company->prefix . 'transactionType', array("name" => "Source Tax Deduction"), "id=9");
            $this->update($company->prefix . 'transactionType', array("name" => "PATTERN"), "id=10");
            $this->update($company->prefix . 'transactionType', array("name" => "Manual Invoice"), "id=11");
            $this->update($company->prefix . 'transactionType', array("name" => "Manual Receipt"), "id=12");
            $this->update($company->prefix . 'transactionType', array("name" => "Pretax Transaction"), "id=14");
            $this->update($company->prefix . 'transactionType', array("name" => "Salary Transaction"), "id=15");
            $this->update($company->prefix . 'transactionType', array("name" => "Opening Balance"), "id=16");
            $this->update($company->prefix . 'transactionType', array("name" => "Credit Invoice"), "id=17");
            $this->update($company->prefix . 'transactionType', array("name" => "Invoice Receipt"), "id=18");
            $this->update($company->prefix . 'transactionType', array("name" => "Return Document"), "id=19");
            $this->update($company->prefix . 'transactionType', array("name" => "Current Expense"), "id=20");
            $this->update($company->prefix . 'transactionType', array("name" => "Asset Expense"), "id=21");
            
            
            
            $this->update($company->prefix . 'docType', array("name" => "Delivery Document"), "id=2");
            $this->update($company->prefix . 'docType', array("name" => "Credit Invoice"), "id=4");
            $this->update($company->prefix . 'docType', array("name" => "Return Document"), "id=5");
            $this->update($company->prefix . 'docType', array("name" => "Manual Invoice"), "id=11");
            $this->update($company->prefix . 'docType', array("name" => "Manual Receipt"), "id=12");
            $this->update($company->prefix . 'docType', array("name" => "Current Expense","transactionType_id"=>"20"), "id=13");
            $this->update($company->prefix . 'docType', array("name" => "Asset Expense","transactionType_id"=>"21"), "id=14");
            $this->update($company->prefix . 'docType', array("name" => "Warehouse Transaction"), "id=15");
            
            
            $this->update($company->prefix . 'paymentType', array("name" => "Check"), "id=2");
            
            $this->update($company->prefix . 'accType', array("name" => "expenses","Desc" => "Expenses"), "id=2");
            
        }
    }

    public function down() {


        return true;
    }

    /*
      // Use safeUp/safeDown to do migration with transaction
      public function safeUp()
      {
      }

      public function safeDown()
      {
      }
     */
}
