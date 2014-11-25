<?php
class m231114_102025_0010 extends CDbMigration {

    public function up() {

        $companys = Company::model()->findAll();
        foreach ($companys as $company) {
            
            @$this->dropColumn($company->prefix.'docCheques', 'refnum'); 
            $this->dropColumn($company->prefix.'docCheques', 'creditcompany'); 
            $this->dropColumn($company->prefix.'docCheques', 'cheque_num'); 
            $this->dropColumn($company->prefix.'docCheques', 'bank'); 
            $this->dropColumn($company->prefix.'docCheques', 'branch'); 
            $this->dropColumn($company->prefix.'docCheques', 'cheque_acct'); 
            $this->dropColumn($company->prefix.'docCheques', 'cheque_date'); 
            //$this->dropColumn($company->prefix.'docCheques', 'bank_refnum'); //deposit
            $this->dropColumn($company->prefix.'docCheques', 'dep_date'); 
            
            $this->update($company->prefix . 'paymentType', array("value" => "Cash"), "id=1");
            $this->update($company->prefix . 'paymentType', array("value" => "Check"), "id=2");
            $this->update($company->prefix . 'paymentType', array("value" => "PelaCredit"), "id=3");
            $this->update($company->prefix . 'paymentType', array("value" => "Bank"), "id=4");
            $this->update($company->prefix . 'paymentType', array("value" => "ManualCredit"), "id=5");
            $this->update($company->prefix . 'paymentType', array("value" => "PelaCreditPaymnts"), "id=6");
            
            //eav
    
            $this->createTable($company->prefix . 'docChequesAttr', array(
                'doc_id' => 'int(11) NOT NULL',
                'line' => 'int(11) NOT NULL',
                'attribute' => 'varchar(255) NOT NULL',
                'value' => 'varchar(255) NOT NULL',
                'PRIMARY KEY (`doc_id`,`line`,`attribute`)'
            ));
            
            
            
   
            
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
