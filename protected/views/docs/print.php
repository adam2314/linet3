<?php
/***********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
use \app\helpers\Linet3Helper;
use yii\helpers\Html;
use app\assets\PrintAsset;



$legalize = "";


if(!\app\helpers\Linet3Helper::isConsole()){
    PrintAsset::register($this);
    $base=yii\helpers\BaseUrl::base();
    
}else {   //console
    $base='';


}
//end if

if ($model->preview == 2) {
    
    
    
    
    
    $legalize = '<img src="' . $base. ('assets/img/sign.png') . '" alt="sign" />';//Yii::t('app', 'Computerized Document');
}


$company = [
    'website' => Linet3Helper::getSetting('company.website'),
    'fax' => Linet3Helper::getSetting('company.fax'),
    'zip' => Linet3Helper::getSetting('company.zip'),
    'phone' => Linet3Helper::getSetting('company.phone'),
    'vatnum'=>Linet3Helper::getSetting('company.vat.id'),
];
if (Yii::$app->language != 'he_il') {
    $company['name'] = Linet3Helper::getSetting('company.en.name');
    $company['city'] = Linet3Helper::getSetting('company.en.city');
    $company['address'] = Linet3Helper::getSetting('company.en.address');
} else {
    $company['name'] = Linet3Helper::getSetting('company.name');
    $company['city'] = Linet3Helper::getSetting('company.city');
    $company['address'] = Linet3Helper::getSetting('company.address');
}






//app\widgets\MiniForm::begin(array('header' => Yii::t("app","View Document ") ." " .$model->id,));
?>
<?php

    echo $this->render('templates/classic', [
    'model'=>$model,
    'company'    =>$company,
    'legalize'=>$legalize,
        'base'=>$base,
        ]); 



        ?>






