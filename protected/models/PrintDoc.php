<?php
/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/

class PrintDoc {

    private static function findFile($model, $name) {
        $files = Files::model()->findAllByAttributes(array("parent_type" => 'Docs', "parent_id" => $model->id, "name" => $name));
        foreach ($files as $file) {
            if ($file->name == $name) {
                return $file;
            }
        }
        return false;
    }

    public static function printMe($model, $preview = 0) {
        if ($preview != 1)//preview
            $model->printedDoc();


        Yii::app()->controller->layout = 'print';
        return Yii::app()->controller->render('//docs/print', array('model' => $model, 'preview' => $preview), true);
    }
    
    
    public static function getPdf($model){
        $name = $model->docType->name . "-" . "$model->docnum-signed.pdf";
        $doc_file = PrintDoc::findFile($model, $name);
        if (!$doc_file) {
            return false;
        }
        return $doc_file;
    }
    

    public static function pdfDoc($model) {
        $yiiBasepath = Yii::app()->basePath;
        $yiiUser = Yii::app()->user->id;
        //$configPath = Yii::app()->user->settings["company.path"];
        
        $user=User::model()->findByPk($yiiUser);
        if (!$user->hasCert()) {
            //create new
            $settings=array(
                   'commonName' => $user->username,
                'emailAddress' => $user->email,
            );
            if(Yii::app()->user->settings['company.en.city']!='')
                $settings['localityName']=Yii::app()->user->settings['company.en.city'];
            if(Yii::app()->user->settings['company.en.name']!='')
                $settings['organizationName'] = Yii::app()->user->settings['company.en.name'];
            $ssl = new SSLHelper($settings);

            $filename = $user->getCertFilePath();
            $user->certpasswd = $ssl->createUserCert($filename);
            $user->save();
        }
        
        
        $configCertpasswd = Yii::app()->user->User->getCertPasswd();


        $name = $model->docType->name . "-" . "$model->docnum.pdf";
        $file = PrintDoc::findFile($model, $name);
        if (!$file) {
            $docfile = PrintDoc::printMe($model, 2);
            $mPDF1 = Yii::app()->ePdf->mpdf();
            $mPDF1->WriteHTML($docfile);


            $file = new Files();
            $file->name = $name;
            $file->path = "docs/";
            $file->parent_type = get_class($model);
            $file->parent_id = $model->id;
            $file->hidden = 1;
            $file->save();
            $file->writeFile($mPDF1->Output("bla", "S"));
        }


        $name = $model->docType->name . "-" . "$model->docnum-signed.pdf";
        $doc_file = PrintDoc::findFile($model, $name);
        if (!$doc_file) {

            //'digi';//
            $cerfile = User::getCertFilePath($yiiUser);
            spl_autoload_unregister(array('YiiBase', 'autoload'));
            $oldpath = get_include_path();
            set_include_path($yiiBasepath . '/modules/zend_pdf_certificate/');

            include_once('Pdf.php');
            include_once('ElementRaw.php');
            //loads a sample PDF file

            $pdf = Farit_Pdf::load($file->getFullFilePath());






            if (file_exists($cerfile)) {
                $certificate = file_get_contents($cerfile);
                if (empty($certificate)) {
                    set_include_path($oldpath);
                    spl_autoload_register(array('YiiBase', 'autoload'));
                    throw new CHttpException('Cannot open the certificate file');
                }

                
                //throw new Exception('Uncaught Exception');
                $pdf->attachDigitalCertificate($certificate, $configCertpasswd);
                //restore_exception_handler();

                $docfile = $pdf->render();

                set_include_path($oldpath);
                spl_autoload_register(array('YiiBase', 'autoload'));


                $doc_file = new Files();
                $doc_file->name = $name;
                $doc_file->path = "docs/";
                $doc_file->parent_type = get_class($model);
                $doc_file->parent_id = $model->id;
                $doc_file->public = true;
                $doc_file->save();

                $doc_file->writeFile($docfile);
            } else {
                set_include_path($oldpath);
                spl_autoload_register(array('YiiBase', 'autoload'));
                $link = "";

                $text = Yii::t('app', "Error! <br />
It is not possible to create a digitally signed PDF file and/or send it by mail without having certificate file located at current users' configuration page.
You should make a certificate file with third party software and import it through 'certificate file' field, separately for each user, within configuration zone of the user. You also should input the password for the certificate file in 'password for digital signature certificate' field in the above mentioned user configuration page.
You can find instructions for making self signed certificate file with Acrobat reader (One of the options. There are many applications able to make such a certificate out there)  here: ");



                throw new CHttpException(404, $text);
                //Yii::app()->end();
            }
        }
        return $doc_file;
    }

    public static function mailDoc($model) {
        $file = PrintDoc::pdfDoc($model);
        $mail = new Mail;
    }

    public static function handle1Exception($exception) {

        echo "Exception: " , $exception->getMessage(), "\n";
        exit;
        
    }

}
