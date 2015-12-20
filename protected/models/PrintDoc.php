<?php

/* * *********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */

namespace app\models;

use Yii;
use \kartik\mpdf\Pdf;

class PrintDoc {

    private static function findFile($model, $name) {
        $files = Files::find()->where(array("parent_type" => 'app\models\docs', "parent_id" => $model->id, "name" => $name))->all();
        foreach ($files as $file) {
            if ($file->name == $name) {
                return $file;
            }
        }
        return false;
    }

    public static function printMe($model) {
        if ($model->preview != 1)//preview
            $model->printedDoc();


        Yii::$app->controller->layout = 'print';
        return Yii::$app->controller->render('//docs/print', array('model' => $model), true);
    }

    public static function getPdf($model) {
        $name = $model->docType->name . "-" . "$model->docnum-signed.pdf";
        $doc_file = PrintDoc::findFile($model, $name);
        if (!$doc_file) {
            return false;
        }
        return $doc_file;
    }

    public static function pdfDoc($model) {
        $yiiBasepath = Yii::$app->basePath;
        $yiiUser =\app\helpers\Linet3Helper::getUserId();
        //$configPath = app\helpers\Linet3Helper::getSetting("company.path");

        $user = User::findOne($yiiUser);
        if (!$user->hasCert()) {
            //create new
            $settings = array(
                'commonName' => $user->username,
                'emailAddress' => $user->email,
            );
            if (\app\helpers\Linet3Helper::getSetting('company.en.city') != '')
                $settings['localityName'] = \app\helpers\Linet3Helper::getSetting('company.en.city');
            if (\app\helpers\Linet3Helper::getSetting('company.en.name') != '')
                $settings['organizationName'] = \app\helpers\Linet3Helper::getSetting('company.en.name');
            $ssl = new \app\helpers\SSLHelper($settings);

            $filename = $user->getCertFilePath();
            \app\helpers\Linet3Helper::setSetting('company.' . $yiiUser . '.certpasswd', $ssl->createUserCert($filename));
            //$user->save();
        }


        $configCertpasswd = \app\helpers\Linet3Helper::getSetting('company.' . $yiiUser . '.certpasswd');


        $name = $model->docType->name . "-" . "$model->docnum.pdf";
        $file = PrintDoc::findFile($model, $name);
        if (!$file) {
            $model->preview = 2;
            $docfile = PrintDoc::printMe($model);
            
            /*//adam
            $file = new Files();
            $file->name = $name;
            $file->path = "docs/";
            $file->parent_type = get_class($model);
            $file->parent_id = $model->id;
            $file->hidden = 1;
            $file->public = 0;
            $file->save();
            $file->writeFile($docfile);
            exit;
            //adam*/
            
            
            //$mPDF1 = new Pdf;
            //$mPDF1->execute(['WriteHTML' => $docfile]);


            $pdf = new Pdf([
                'mode' => Pdf::MODE_UTF8,
                'format' => Pdf::FORMAT_A4,
                'orientation' => Pdf::ORIENT_PORTRAIT,
                //'destination' => Pdf::DEST_BROWSER,
                //'content' => $docfile,
                //'cssFile' => Yii::$app->basePath."/../css/print.css",
                //'cssInline' => '.kv-heading-1{font-size:18px}',
                //'options' => ['title' => 'Krajee Report Title'],
                'methods' => [
                    //'SetHeader' => ['Krajee Report Header'],
                    'SetFooter' => ['Linet 3.1 Accounting Software'],
                ]
            ]);

            $mpdf = $pdf->api;
            //$mpdf->fonttrans['freeserif'] = 'freeserif2';
            //$mpdf->PDFAauto = true; 
            $mpdf->WriteHtml($docfile);





            $file = new Files();
            $file->name = $name;
            $file->path = "docs/";
            $file->parent_type = get_class($model);
            $file->parent_id = $model->id;
            $file->hidden = 1;
            $file->public = 0;
            $file->save();
            
            //var_dump($file->getErrors());
            //exit;
            $file->writeFile($mpdf->output("bla", "S"));
        }


        $name = $model->docType->name . "-" . "$model->docnum-signed.pdf";
        $doc_file = PrintDoc::findFile($model, $name);
        if ((!$doc_file)) {

            //'digi';//
            $cerfile = User::getCertFilePath($yiiUser);

            //loads a sample PDF file
            Yii::$classMap['Farit_Pdf'] = $yiiBasepath . '/vendor/Farit/Pdf.php';
            Yii::$classMap['Farit_Pdf_ElementRaw'] = $yiiBasepath . '/vendor/Farit/ElementRaw.php';
            Yii::$classMap['Zend_Memory'] = $yiiBasepath . '/vendor/Zend/Memory.php';
            Yii::$classMap['Zend_Memory_Manager'] = $yiiBasepath . '/vendor/Zend/Memory/Manager.php';
            Yii::$classMap['Zend_Memory_Container'] = $yiiBasepath . '/vendor/Zend/Memory/Container.php';
            Yii::$classMap['Zend_Memory_Container_Interface'] = $yiiBasepath . '/vendor/Zend/Memory/Container/Interface.php';
            Yii::$classMap['Zend_Memory_Container_Locked'] = $yiiBasepath . '/vendor/Zend/Memory/Container/Locked.php';
            Yii::$classMap['Zend_Pdf'] = $yiiBasepath . '/vendor/Zend/Pdf.php';
            Yii::$classMap['Zend_Pdf_Parser'] = $yiiBasepath . '/vendor/Zend/Pdf/Parser.php';
            Yii::$classMap['Zend_Pdf_Page'] = $yiiBasepath . '/vendor/Zend/Pdf/Page.php';
            Yii::$classMap['Zend_Pdf_UpdateInfoContainer'] = $yiiBasepath . '/vendor/Zend/Pdf/UpdateInfoContainer.php';
            Yii::$classMap['Zend_Pdf_Target'] = $yiiBasepath . '/vendor/Zend/Pdf/Target.php';
            Yii::$classMap['Zend_Pdf_Destination'] = $yiiBasepath . '/vendor/Zend/Pdf/Destination.php';
            Yii::$classMap['Zend_Pdf_Destination_Zoom'] = $yiiBasepath . '/vendor/Zend/Pdf/Destination/Zoom.php';
            Yii::$classMap['Zend_Pdf_Destination_Explicit'] = $yiiBasepath . '/vendor/Zend/Pdf/Destination/Explicit.php';
            Yii::$classMap['Zend_Pdf_RecursivelyIteratableObjectsContainer'] = $yiiBasepath . '/vendor/Zend/Pdf/RecursivelyIteratableObjectsContainer.php';
            Yii::$classMap['Zend_Pdf_StringParser'] = $yiiBasepath . '/vendor/Zend/Pdf/StringParser.php';
            Yii::$classMap['Zend_Pdf_ElementFactory'] = $yiiBasepath . '/vendor/Zend/Pdf/' . 'ElementFactory' . '.php';
            Yii::$classMap['Zend_Pdf_ElementFactory_Interface'] = $yiiBasepath . '/vendor/Zend/Pdf/ElementFactory/' . 'Interface' . '.php';
            Yii::$classMap['Zend_Pdf_ElementFactory_Proxy'] = $yiiBasepath . '/vendor/Zend/Pdf/ElementFactory/Proxy.php';
            Yii::$classMap['Zend_Pdf_Element_Reference_Table'] = $yiiBasepath . '/vendor/Zend/Pdf/Element/Reference/Table.php';
            Yii::$classMap['Zend_Pdf_Element_Reference_Context'] = $yiiBasepath . '/vendor/Zend/Pdf/Element/Reference/Context.php';
            Yii::$classMap['Zend_Pdf_Element_Dictionary'] = $yiiBasepath . '/vendor/Zend/Pdf/Element/Dictionary.php';
            Yii::$classMap['Zend_Pdf_Element'] = $yiiBasepath . '/vendor/Zend/Pdf/Element.php';
            Yii::$classMap['Zend_Pdf_Element_Object'] = $yiiBasepath . '/vendor/Zend/Pdf/Element/Object.php';
            Yii::$classMap['Zend_Pdf_Element_Null'] = $yiiBasepath . '/vendor/Zend/Pdf/Element/Null.php';
            Yii::$classMap['Zend_Pdf_Element_Name'] = $yiiBasepath . '/vendor/Zend/Pdf/Element/Name.php';
            Yii::$classMap['Zend_Pdf_Element_Numeric'] = $yiiBasepath . '/vendor/Zend/Pdf/Element/Numeric.php';
            Yii::$classMap['Zend_Pdf_Element_Reference'] = $yiiBasepath . '/vendor/Zend/Pdf/Element/Reference.php';
            Yii::$classMap['Zend_Pdf_Element_Array'] = $yiiBasepath . '/vendor/Zend/Pdf/Element/Array.php';
            Yii::$classMap['Zend_Pdf_Element_String'] = $yiiBasepath . '/vendor/Zend/Pdf/Element/String.php';
            Yii::$classMap['Zend_Pdf_Element_String_Binary'] = $yiiBasepath . '/vendor/Zend/Pdf/Element/String/Binary.php';
            Yii::$classMap['Zend_Pdf_Trailer'] = $yiiBasepath . '/vendor/Zend/Pdf/Trailer.php';
            Yii::$classMap['Zend_Pdf_Trailer_Keeper'] = $yiiBasepath . '/vendor/Zend/Pdf/Trailer/Keeper.php';

            $pdf = \Farit_Pdf::load($file->getFullFilePath());

            if (file_exists($cerfile)) {
                $certificate = file_get_contents($cerfile);
                if (empty($certificate)) {
                    throw new \Exception('Cannot open the certificate file');
                }

                $pdf->attachDigitalCertificate($certificate, $configCertpasswd);
                $docfile = $pdf->render();
                $doc_file = new Files();
                $doc_file->name = $name;
                $doc_file->path = "docs/";
                $doc_file->parent_type = get_class($model);
                $doc_file->parent_id = $model->id;
                $doc_file->public = 1;
                $doc_file->hidden = 0;
                $doc_file->save();

                $doc_file->writeFile($docfile);
            } else {

                $link = "";

                $text = Yii::t('app', "Error! <br />
It is not possible to create a digitally signed PDF file and/or send it by mail without having certificate file located at current users' configuration page.
You should make a certificate file with third party software and import it through 'certificate file' field, separately for each user, within configuration zone of the user. You also should input the password for the certificate file in 'password for digital signature certificate' field in the above mentioned user configuration page.
You can find instructions for making self signed certificate file with Acrobat reader (One of the options. There are many applications able to make such a certificate out there)  here: ");



                throw new \Exception($text);
                //Yii::$app->end();
            }
        }
        return $doc_file;
    }

    public static function mailDoc($model) {
        $file = PrintDoc::pdfDoc($model);
        
        $temp = MailTemplate::find()->where(['entity_type' => 'app\models\Docs', 'entity_id' => $model->doctype])->one();
        if(!$temp)
            $temp=new MailTemplate;
        $temp->templateRplc($model);

        $mail = new Mail;
        $mail->to=$model->account->email;
        $mail->bcc=$temp->bcc;
        $mail->files=$file->id;
        $mail->subject=$temp->subject;
        $mail->body=$temp->body;
        $mail->send();
        return true;
    }

    public static function handle1Exception($exception) {

        echo "Exception: ", $exception->getMessage(), "\n";
        exit;
    }

}
