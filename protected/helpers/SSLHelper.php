<?php

/***********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
namespace app\helpers;
class SSLHelper {

    public $countryName = "IL";
    public $stateOrProvinceName = 'Israel';
    public $localityName = 'Tel Aviv';
    public $organizationName = 'Speedcomp';
    public $organizationalUnitName = 'Linet';
    public $commonName = 'User';
    public $emailAddress = 'user@domain.com';

    
    public function __construct($array){
        foreach($array as $public=>$key)
            if(property_exists($this,$public))
                $this->$public=$key;
    }
    //put your code here

    public function createUserCert($filename) {

        $dn = (array)$this;
        $privateKeyPass = $this->generate_password();
        //$filename = dirname(__FILE__) . '/certificate.pfx';
        $numberOfDays = 365*3;

                
        $privateKey = openssl_pkey_new();
        $csr = openssl_csr_new($dn, $privateKey);
        $sscert = openssl_csr_sign($csr, null, $privateKey, $numberOfDays); //create a csr file, change null to a filename to save it if you need to

        $key = openssl_pkey_get_private($privateKey, $privateKeyPass); //parses the $privateKey and prepares it for use by openssl_pkcs12_export_to_file.

        openssl_pkcs12_export_to_file($sscert, $filename, $key, $privateKeyPass); //Save the pfx file to $filename
        
        return $privateKeyPass;
    }

    
    private function generate_password($length = 8) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
        $password = substr(str_shuffle($chars), 0, $length);
        return $password;
    }
}
