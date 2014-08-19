<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FormBackupFile
 *
 * @author adam
 */
class FormLinet2Import extends CFormModel {

    public $file;

    public function rules() {
        return array(
            array('file', 'file', 'allowEmpty' => false, 'types' => 'sql, bak'),
            array('file', 'safe')
        );
    }

    //put your code here


    private function read() {
        $sql = $this->file;

        //sort
        $sqlCmd = file_get_contents($sql);
        $lines = explode(";\n", $sqlCmd);
        //if ($fp = fopen($sql, 'r')) {

        $array = array();
        //while ($line = fgets($fp)) 
        foreach ($lines as $line) {

            preg_match("/INSERT INTO +[^.]+ VALUES/", $line, $matches);
            if (isset($matches[0])) {
                //echo ";".str_replace(" VALUES","",str_replace("INSERT INTO ","",$matches[0])).";";
                $array[str_replace(" VALUES", "", str_replace("INSERT INTO ", "", $matches[0]))][] = str_replace($matches[0], "", $line);
            }
        }

        return $array;

        //}
    }

    private function parseLine($line) {
        //echo $line."<br />\n";
        $line = str_replace("', '", "<EXPLODE_HERE>", $line);
        $line = str_replace(" ('", "", $line);
        //$line=  str_replace("');", "", $line);
        $line = str_replace("')", "", $line);

        //echo $line."<br />\n";
        return explode("<EXPLODE_HERE>", $line);
    }

    private function saveSetting($key, $value) {
        $setting = Settings::model()->findByPk($key);
        $setting->value = $value;
        return $setting->save();
    }

    public function import() {
        //add warehouse

        $array = $this->read();


        //companies
        $company = $this->parseLine($array['companies'][0]);
        $prefix = $company[1];
        //echo $prefix;

        $this->saveSetting('company.name', $company[0]);
        $this->saveSetting('company.vat.id', $company[3]);
        $this->saveSetting('company.address', $company[4]);
        $this->saveSetting('company.city', $company[5]);
        $this->saveSetting('company.zip', $company[6]);
        $this->saveSetting('company.phone', $company[7]);
        $this->saveSetting('company.fax', $company[8]);
        $this->saveSetting('company.website', $company[9]);
        $this->saveSetting('company.tax.rate', $company[10]);
        //$this->saveSetting('company.tax.repirs', $company[11]);
        //$this->saveSetting('account.100.srctax', $company[12]);
        ////$this->saveSetting('company.tax.vat', $company[13]);
        //exit;
        /*
         * 0  company name              company.name
         * 1  prefix
         * 2  manager
         * 3  regnum(vatnum)            company.vat.id
         * 4  address                	company.address
         * 5  city                      company.city
         * 6  zip                       company.zip
         * 7 phone                      company.phone
         * 8  cellular                  company.fax
         * 9  web                       company.website
         * 10  tax                      company.tax.rate
         * 11 texrep                    company.tax.irs
         * 12 vat                       account.100.srctax
         * 13 vatrep                    company.tax.vat
         * 14 template
         * 15 logo
         * 16 header
         * 17 footer
         * 18 doc_template
         * 19 recipt_templa
         * 20 invrcpt_template
         * 21 bidi
         * 22 credit
         * 23 creditUser
         * 24 creditPasswd
         * 25 creditAllow
         * 26 docTypes(1-12)
         * 
         * 
         * 
         * 
         * 
         */


        //accounts
        /*
         * 0  id
         * 1  prefix
         * 2  type
         * 3  id6111
         * 4  pay_terms
         * 
         * 
         */


        $this->sqlExec('DELETE FROM `'.Yii::app()->db->tablePrefix."accounts` WHERE 1");
        foreach ($array['accounts'] as $account) {
            //echo $account."<br />";
            $account = str_replace("'" . $prefix . "',", "", $account);
            $keys = "`id`, `type`, `id6111`, `pay_terms`, `src_tax`, `src_date`, `parent_account_id`, `name`, `contact`, `department`, `vatnum`, `email`, `phone`, `dir_phone`, `cellular`, `fax`, `web`, `address`, `city`, `zip`, `comments`, `owner`";
            //echo 'INSERT INTO `'.Yii::app()->db->tablePrefix."accounts` ($keys) VALUES $account;";
            $this->sqlExec('INSERT INTO `'.Yii::app()->db->tablePrefix."accounts` ($keys) VALUES $account;");
        }
        //items
        /*
         *      num         0 +
         *  	prefix      1 -
         *  	account     2 -
         *  	name        3 +
         *  	unit        4 +
         *  	extcatnum   5 +
         *  	manufacturer6 +
         *  	defprice    7 +
         *  	currency    8 +
         *  	ammount     9 +
         *  	owner       10+
         * 
         * 
         * 
         */

        $this->sqlExec('DELETE FROM `'.Yii::app()->db->tablePrefix."items` WHERE 1");
        foreach ($array['items'] as $item) {
            //echo $item."<br />";
            //$item=  str_replace("'".$prefix."',", "", $item);
            $item = $this->parseLine($item);
            $keys = "`id`, `name`, `unit_id`, `extcatnum`, `manufacturer`, `saleprice`, `currency_id`, `ammount`, `owner`, `itemVatCat_id`";

            $values = "'$item[0]', '$item[3]', '$item[4]', '$item[5]', '$item[6]', '$item[7]', '$item[8]', '$item[9]', '$item[10]', '1'"; //itemVatCat
            $this->sqlExec('INSERT INTO `'.Yii::app()->db->tablePrefix."items` ($keys) VALUES ($values);");
            //echo 'INSERT INTO `'.Yii::app()->db->tablePrefix."items` ($keys) VALUES ($values);<br />\n";
        }

        //docs
        /*
         *  num 0
         *  	//prefix 1
         *  	doctype 2
         *  	docnum 3
         *  	account 4
         *  	company 5
         *  	address 6
         *  	city 7
         *  	zip 8
         *  	vatnum 9
         *  	refnum 10  -
         *  	issue_date 11
         *  	due_date 12
         *  	sub_total 13
         *  	novat_total 14
         *  	vat 15
         *  	total 16
         *  	src_tax 17
         *  	status 18
         *  	printed 19
         *  	comments 20
         *  	owner 21
         *  	ukey - description
         * 
         *      
         */
        $this->sqlExec('DELETE FROM `'.Yii::app()->db->tablePrefix."docs` WHERE 1");
        foreach ($array['docs'] as $doc) {
            //echo $doc."<br />";
            //$doc = str_replace("'" . $prefix . "',", "", $doc);
            //$doc = str_replace("')", "', '2')", $doc);//docStatus
            $doc= $this->parseLine($doc);
            
            //refnum-out
            $keys = "`id`, `doctype`, `docnum`, `account_id`, `company`, `address`, `city`, `zip`, `vatnum`, `issue_date`, `due_date`, `sub_total`, `novat_total`, `vat`, `total`, `src_tax`, `status`, `printed`, `description`, `owner`";

            $values="'$doc[0]', '$doc[2]', '$doc[3]', '$doc[4]', '$doc[5]', '$doc[6]', '$doc[7]', '$doc[8]', '$doc[9]'";
            $values.=", '$doc[11]', '$doc[12]', '$doc[13]', '$doc[14]', '$doc[15]', '$doc[16]', '$doc[17]', '2', '$doc[19]', '$doc[20]', '$doc[21]'";
            $this->sqlExec('INSERT INTO `'.Yii::app()->db->tablePrefix."docs` ($keys) VALUES ($values);");
            //echo 'INSERT INTO `'.Yii::app()->db->tablePrefix."items` ($keys) VALUES ($values);<br />\n";
        }

        //cheques
        /*
         *  prefix
         *  	refnum                  doc_id
         *  	type                    type
         *  	creditcompany
         *  	cheque_num
         *  	bank
         *  	branch
         *  	cheque_acct
         *  	cheque_date
         *  	sum
         *  	bank_refnum             
         *  	dep_date
         *  	id                      line   
         */
        $this->sqlExec('DELETE FROM `'.Yii::app()->db->tablePrefix."docCheques` WHERE 1");
        foreach ($array['cheques'] as $doc) {
            //echo $doc."<br />";
            $doc = str_replace("'" . $prefix . "',", "", $doc);
            //$doc= $this->parseLine($doc);
            $keys = "`doc_id`, `type`, `creditcompany`, `cheque_num`, `bank`, `branch`, `cheque_acct`, `cheque_date`, `sum`, `bank_refnum`, `dep_date`, `line`";

            //$values="'$item[0]', '$item[3]', '$item[4]', '$item[5]', '$item[6]', '$item[7]', '$item[8]', '$item[9]', '$item[10]'";
            $this->sqlExec('INSERT INTO `'.Yii::app()->db->tablePrefix."docCheques` ($keys) VALUES $doc;");
            //echo 'INSERT INTO `'.Yii::app()->db->tablePrefix."items` ($keys) VALUES ($values);<br />\n";
        }

        /*
         *  prefix
         *  	num                 doc_id
         *  	cat_num             item_id
         *  	description         -
         *  	qty                 -
         *  	unit_price          iItem
         *  	currency            currency_id
         *  	price               ihTotal
         *  	nisprice            iTotal
         *  	id                  line
         *   
         */

        $this->sqlExec('DELETE FROM `'.Yii::app()->db->tablePrefix."docDetails` WHERE 1");
        foreach ($array['docdetails'] as $doc) {
            //echo $doc."<br />";
            $doc = str_replace("'" . $prefix . "',", "", $doc);
            //$doc= $this->parseLine($doc);
            $keys = "`doc_id`, `item_id`, `description`, `qty`, `iItem`, `currency_id`, `ihTotal`, `iTotal`, `line`";

            //$values="'$item[0]', '$item[3]', '$item[4]', '$item[5]', '$item[6]', '$item[7]', '$item[8]', '$item[9]', '$item[10]'";
            $this->sqlExec('INSERT INTO `'.Yii::app()->db->tablePrefix."docDetails` ($keys) VALUES $doc;");
            //echo 'INSERT INTO `'.Yii::app()->db->tablePrefix."items` ($keys) VALUES ($values);<br />\n";
        }


        //
        //transactions
        /*
         *  prefix
         *  	num         -
         *  	type        -
         *  	account     account_id
         *  	refnum1     -
         *  	refnum2     -
         *  	date        -
         *  	details     -
         *  	sum         leadsum
         *  	cor_num     intCorrelation
         *  	id          linenum
         *  	owner       owner_id
         *      
         * 
         */
        $this->sqlExec('DELETE FROM `'.Yii::app()->db->tablePrefix."transactions` WHERE 1");
        foreach ($array['transactions'] as $doc) {
            //echo $doc."<br />";
            $doc = str_replace("'" . $prefix . "',", "", $doc);
            //$doc= $this->parseLine($doc);
            $keys = "`num`, `type`, `account_id`, `refnum1`, `refnum2`, `date`, `details`, `leadsum`, `intCorrelation`, `linenum`, `owner_id`";

            //$values="'$item[0]', '$item[3]', '$item[4]', '$item[5]', '$item[6]', '$item[7]', '$item[8]', '$item[9]', '$item[10]'";
            $this->sqlExec('INSERT INTO `'.Yii::app()->db->tablePrefix."transactions` ($keys) VALUES $doc;");
            //echo 'INSERT INTO `'.Yii::app()->db->tablePrefix."items` ($keys) VALUES ($values);<br />\n";
        }

        //bankbook
        $this->sqlExec('DELETE FROM `'.Yii::app()->db->tablePrefix."bankbook` WHERE 1");//currency_id shul
        foreach ($array['bankbook'] as $bankbook) {
            //echo $bankbook."<br />\n";
            //$bankbook = str_replace("'" . $prefix . "',", "", $bankbook);
            $bankbook = $this->parseLine($bankbook);
            $keys = "`id`, `account_id`, `date`, `details`, `refnum`, `sum`, `total`, `extCorrelation`, `currency_id`";
            //print_r($bankbook);
            $values = "'$bankbook[0]', '$bankbook[2]', '$bankbook[3]', '$bankbook[4]', '$bankbook[5]', '$bankbook[6]', '$bankbook[7]', '$bankbook[8]', 'ILS'";
            $this->sqlExec('INSERT INTO `'.Yii::app()->db->tablePrefix."bankbook` ($keys) VALUES ($values);");
        }

        //correlation
        $this->sqlExec('DELETE FROM `' . Yii::app()->db->tablePrefix . "intCorrelation` WHERE 1"); //currency_id shul
        foreach ($array['correlation'] as $correlation) {
            //echo $bankbook."<br />\n";
            //$bankbook = str_replace("'" . $prefix . "',", "", $bankbook);
            $correlation = $this->parseLine($correlation);
            $keys = "`id`, `account_id`, `date`, `owner`";
            //getAccount
            //print_r($bankbook);
            $values = "'$correlation[1]', '', '', '$correlation[5]'";


            //2-hova
            //3-zchot
            if (strpos($correlation[2], "E") === 0) {
                //update bankbook
                //$correlation[1]
            } else {
                //update transactions
                $this->sqlExec('INSERT INTO `' . Yii::app()->db->tablePrefix . "intCorrelation` ($keys) VALUES ($values);");
                foreach (explode(',', $correlation[2]) as $transaction) {
                    $this->IntCorr($transaction, $correlation[1], 1);
                }
                
                
                foreach (explode(',', $correlation[3]) as $transaction) {
                    $this->IntCorr($transaction, $correlation[1], 0);
                }
            }
            
            //$correlation[1]
        }




        //contacthist
        //contacts??
        //tranrep??
    }

    private function IntCorr($id, $cor_id, $type) {
        $id = explode(":", $id);
        $this->sqlExec('UPDATE `' . Yii::app()->db->tablePrefix . "transactions` SET `intCorrelation`='$cor_id',`intType`='$type' WHERE `num`='$id[0]' AND `linenum`='$id[1]'");
    }

    private function sqlExec($sql) {
        $cmd = Yii::app()->db->createCommand($sql);
        try {
            $cmd->execute();
        } catch (CDbException $e) {
            $message = $e->getMessage();
            print $message."<br />\n";
        }
    }

}
