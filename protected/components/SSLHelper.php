<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SSLHelper
 *
 * @author adam
 */
class SSLHelper {

    public $countryName = "IL";
    public $stateOrProvinceName = 'Israel';
    public $localityName = 'Tel Aviv';
    public $organizationName = 'Speedcomp';
    public $organizationalUnitName = 'Linet';
    public $commonName = 'User';
    public $emailAddress = 'user@domain.com';

    //put your code here

    public function createUserCert($filename) {

        $dn = (array)$this;
        $privateKeyPass = $this->generate_password();
        //$filename = dirname(__FILE__) . '/certificate.pfx';
        $numberOfDays = 365*3;

        $privateKey = openssl_pkey_new();
        $csr = openssl_csr_new($dn, $privateKey);
        $sscert = openssl_csr_sign($csr, null, $privateKey, $numberOfDays); //create a csr file, change null to a filename to save it if you need to
        openssl_x509_export($sscert, $publicKey); //on success $publicKey will hold the PEM content
        openssl_pkey_export($privateKey, $privateKey, $privateKeyPass); //export the privateKey as a PEM content

        

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
