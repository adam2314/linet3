<?php

/* * *********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */

class m301118_231214_0024 extends CDbMigration {

    public function up() {
        //return false;
        //$this->update( 'menu', array("url"=>"newUpdate"), "id=64");
        $companys = Company::model()->findAll();
        foreach ($companys as $company) {

            $this->update($company->prefix . 'config', array("priority" => "100"), "id='company.name'");
            $this->update($company->prefix . 'config', array("priority" => "100"), "id='company.logo'");
            $this->update($company->prefix . 'config', array("priority" => "100"), "id='company.vat.id'");

            $this->update($company->prefix . 'config', array("priority" => "100"), "id='company.en.name'");
            $this->update($company->prefix . 'config', array("priority" => "100"), "id='company.stock'");
            $this->update($company->prefix . 'config', array("priority" => "100"), "id='company.website'");


            $this->update($company->prefix . 'config', array("priority" => "200"), "id='company.tax.vat'");
            $this->update($company->prefix . 'config', array("priority" => "200"), "id='company.tax.irs'");

            $this->update($company->prefix . 'config', array("priority" => "200"), "id='company.tax.rate'");
            $this->update($company->prefix . 'config', array("priority" => "200"), "id='company.doublebook'");

            
            $this->update($company->prefix . 'config', array("priority" => "250"), "id='company.cur'");
            $this->update($company->prefix . 'config', array("priority" => "250"), "id='company.seccur'");
            

            $this->update($company->prefix . 'config', array("priority" => "300"), "id='company.address'");
            $this->update($company->prefix . 'config', array("priority" => "300"), "id='company.city'");
            $this->update($company->prefix . 'config', array("priority" => "300"), "id='company.zip'");

            $this->update($company->prefix . 'config', array("priority" => "300"), "id='company.en.address'");
            $this->update($company->prefix . 'config', array("priority" => "300"), "id='company.en.city'");
            $this->update($company->prefix . 'config', array("priority" => "300"), "id='company.po'");


            $this->update($company->prefix . 'config', array("priority" => "400"), "id='company.phone'");
            $this->update($company->prefix . 'config', array("priority" => "400"), "id='company.fax'");


            $this->update($company->prefix . 'config', array("priority" => "500"), "id='company.mail.user'");
            $this->update($company->prefix . 'config', array("priority" => "500"), "id='company.mail.password'");
            $this->update($company->prefix . 'config', array("priority" => "500"), "id='company.mail.ssl'");

            $this->update($company->prefix . 'config', array("priority" => "500"), "id='company.mail.port'");
            $this->update($company->prefix . 'config', array("priority" => "500"), "id='company.mail.server'");
            $this->update($company->prefix . 'config', array("priority" => "500"), "id='company.mail.address'");



            $this->update($company->prefix . 'config', array("hidden" => "1"), "id='paypal.apiUsername'");
            $this->update($company->prefix . 'config', array("hidden" => "1"), "id='paypal.apiSignature'");
            $this->update($company->prefix . 'config', array("hidden" => "1"), "id='paypal.apiPassword'");
            $this->update($company->prefix . 'config', array("hidden" => "1"), "id='paypal.apiLive'");
            
            $this->delete($company->prefix . 'config',"id='company.pdfprint'"); 	
        }
    }

    public function down() {

        return true;
    }

}
