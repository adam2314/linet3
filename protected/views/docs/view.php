<?php
/* * *********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */

use app\models\Language;

$actions = array();
//$actions[]=array('label'=>Yii::t('app','List Documents'), 'url'=>array('index'));
$actions[] = array('label' => Yii::t('app', 'Create Document'), 'url' => array('create', 'type' => $model->doctype));
$actions[] = array('label' => Yii::t('app', 'Manage Documents'), 'url' => array('admin'));
$actions[] = array('label' => Yii::t('app', 'Duplicate Document'), 'url' => array('duplicate', 'id' => $model->id));



if (($model->doctype == 1) || ($model->doctype == 2)) {//Proforma || Delivery doc
    $actions[] = array('label' => Yii::t('app', 'Convert to Invoice'), 'url' => array('duplicate', 'id' => $model->id, 'type' => 3)); //Invoice
    $actions[] = array('label' => Yii::t('app', 'Convert to Invoice Receipt'), 'url' => array('duplicate', 'id' => $model->id, 'type' => 9)); //Invoice Receipt 
}
if ($model->doctype == 2) {//Delivery doc
    $actions[] = array('label' => Yii::t('app', 'Convert to Return document'), 'url' => array('duplicate', 'id' => $model->id, 'type' => 5)); //Return document
}
if ($model->doctype == 3) {//Invoice
    $actions[] = array('label' => Yii::t('app', 'Convert to Credit Invoice'), 'url' => array('duplicate', 'id' => $model->id, 'type' => 4)); //Credit Invoice
}
if ($model->doctype == 4) {//Credit Invoice
    $actions[] = array('label' => Yii::t('app', 'Convert to Invoice'), 'url' => array('duplicate', 'id' => $model->id, 'type' => 3)); //Invoice
}
if ($model->doctype == 6) {//Quote
    $actions[] = array('label' => Yii::t('app', 'Convert to Proforma'), 'url' => array('duplicate', 'id' => $model->id, 'type' => 1)); //Proforma
    $actions[] = array('label' => Yii::t('app', 'Convert to Delivery doc'), 'url' => array('duplicate', 'id' => $model->id, 'type' => 2)); //Delivery doc
    $actions[] = array('label' => Yii::t('app', 'Convert to Invoice'), 'url' => array('duplicate', 'id' => $model->id, 'type' => 3)); //Invoice
    $actions[] = array('label' => Yii::t('app', 'Convert to Sales Order'), 'url' => array('duplicate', 'id' => $model->id, 'type' => 7)); //Sales Order
    $actions[] = array('label' => Yii::t('app', 'Convert to Invoice Receipt'), 'url' => array('duplicate', 'id' => $model->id, 'type' => 9)); //Invoice Receipt
}
if ($model->doctype == 7) {//Sales Order
    $actions[] = array('label' => Yii::t('app', 'Convert to Proforma'), 'url' => array('duplicate', 'id' => $model->id, 'type' => 1)); //Proforma
    $actions[] = array('label' => Yii::t('app', 'Convert to Delivery doc'), 'url' => array('duplicate', 'id' => $model->id, 'type' => 2)); //Delivery doc
    $actions[] = array('label' => Yii::t('app', 'Convert to Invoice'), 'url' => array('duplicate', 'id' => $model->id, 'type' => 3)); //Invoice
    $actions[] = array('label' => Yii::t('app', 'Convert to Invoice Receipt'), 'url' => array('duplicate', 'id' => $model->id, 'type' => 9)); //Invoice Receipt 
}
if ($model->doctype == 10) {//Purchase Order
    $actions[] = array('label' => Yii::t('app', 'Convert to') . " " . Yii::t('app', 'Current Expense'), 'url' => array('duplicate', 'id' => $model->id, 'type' => 13)); //Current Expense
    $actions[] = array('label' => Yii::t('app', 'Convert to') . " " . Yii::t('app', 'Asset Expense'), 'url' => array('duplicate', 'id' => $model->id, 'type' => 14)); //Asset Expense
    $actions[] = array('label' => Yii::t('app', 'Convert to') . " " . Yii::t('app', 'Stock entry certificate'), 'url' => array('duplicate', 'id' => $model->id, 'type' => 16)); //Stock entry certificate
}

if ($model->doctype == 16) {//Stock entry certificate
    $actions[] = array('label' => Yii::t('app', 'Convert to') . " " . Yii::t('app', 'Stock exit certificate'), 'url' => array('duplicate', 'id' => $model->id, 'type' => 17)); //Stock entry certificate
}
$this->params["menu"] = $actions;



app\widgets\MiniForm::begin(array('header' => Yii::t("app", "View Document") . " " . $model->id,));
?>
<?php
$id = $model->id;
$java = <<<JAVA
         jQuery(document).ready(function () {

        //$('#langSel').hide();
        if ("1" == "$mail") {
            $('#subType').val('email');
            showMail();
        }
        
        
        if(pdf){
            console.log(baseAddress+"/docs/pdf/$id");
            window.location =baseAddress+"/docs/pdf/$id";
        }
        
    });
        
        
        
JAVA;


$this->registerJs("var baseAddress='" . \yii\helpers\BaseUrl::base() . "';" .
        "var oppt_account_type=" . (int) $model->docType->oppt_account_type . ";" .
        "var pdf=" . $pdf . ";"
        , \yii\web\View::POS_HEAD);
$this->registerJs($java
        , \yii\web\View::POS_READY);
$this->registerJsFile(yii\helpers\BaseUrl::base() . '/assets/docs.js', ['depends' => [\yii\web\JqueryAsset::className()]]
        //['position' => \yii\web\View::POS_READY]
);
?>
<div class="row">
<?= $this->render('print', array('model' => $model)); ?>
</div>

<?php
$form = kartik\form\ActiveForm::begin(array(
            'id' => 'docs-form',
            'action' => yii\helpers\BaseUrl::base() . ('/docs/view/' . $model->id),
            'enableAjaxValidation' => false,
                'options' => array('enctype' => 'multipart/form-data'),
        ));
?>
<div class="row">
    <?= $form->errorSummary($model); ?>
</div>

<div class="row">
    <div class="col-md-4">
        <?= $form->field($model, 'comments')->textarea(); ?>
    </div>
    <div class="col-md-5">
        <?= \app\widgets\AttachedFiles::widget(['model' => $model, 'attribute' => 'Files']); ?>
    </div>
    <div class="col-md-3">
        <?= app\widgets\Refnum::widget([ 'model' => $model,  'attribute' => 'refnum',]);?>
    </div>
    
</div>
<div class="row">
<div class="btn-group">
<?= \yii\helpers\Html::dropDownList('language', Yii::$app->language, \yii\helpers\ArrayHelper::map(Language::find()->All(), 'id', 'name'), ['id' => 'langSel']); ?>
    <?php
    echo \yii\helpers\Html::hiddenInput("subType", "email");
    echo \yii\helpers\Html::hiddenInput("docs[id]", $model->id);
    echo \yii\helpers\Html::hiddenInput("docs[doctype]", $model->doctype);
    if (($model->doctype != 13) && ($model->doctype != 14)) {

        echo \yii\bootstrap\ButtonGroup::widget([
            'options' => ['class' => 'btn-group dropup'],
            'buttons' => [

                [
                    'options' => ['class' => 'btn-success'],
                    'label' => Yii::t('app', 'Print'),
                    'clientEvents' => ['click' => 'function(event){sendForm("print");}'],
                //'url'=>'javascript:sendForm("print");',
                //'type' => 'success',
                //'icon' => 'glyphicon glyphicon-globe',
                //'options' => array('id' => 'printLink', 'onclick' => 'return hideMe();'),
                ],
                \yii\bootstrap\ButtonDropdown::widget([
                    //'icon' => 'glyphicon glyphicon-print',
                    'label' =>  Yii::t('app', 'Make'),
                    'options' => ['class' => 'btn-success'],
                    'dropdown' => [
                            'items' => array(
                                "<li>" . \yii\helpers\Html::a( Yii::t('app', 'Print'),'javascript:sendForm("print");') . "</li>",
                                //'icon' => 'glyphicon glyphicon-cloud-upload',
                                "<li>" . \yii\helpers\Html::a( Yii::t('app', 'Email'),'javascript:sendForm("email");') . "</li>",
                                //'icon' => 'glyphicon glyphicon-envelope',
                                "<li>" . \yii\helpers\Html::a( Yii::t('app', 'PDF'),'javascript:sendForm("pdf");') . "</li>",
                                //'icon' => 'glyphicon glyphicon-save',
                                "<li>" . \yii\helpers\Html::a( Yii::t('app', 'Save Draft'),'javascript:sendForm("saveDraft");') . "</li>",
                                //'icon' => 'glyphicon glyphicon-cloud-upload',
                            )
                        ]
                ]),
                \yii\bootstrap\Button::widget([
                    //'icon' => 'glyphicon glyphicon-cloud-upload',
                    'label' => Yii::t('app', 'Change language'),
                    'options' => ['class' => 'btn-success'],
                    'clientEvents' => ['click' => "function(event){event.preventDefault();\$(this).hide(150); $('#langSel').show(150);}"],
                ]),
                 \yii\bootstrap\Button::widget([
                    //'icon' => 'glyphicon glyphicon-cloud-upload',
                    'label' => Yii::t('app', 'Submit'),
                    'options' => ['class' => 'btn-success','type'=>'submit' ],
                     
                    //'clientEvents' => ['click' => "function(event){event.preventDefault();\$(this).hide(150); $('#langSel').show(150);}"],
                ])
                
            ]
        ]);
    }
    ?>
</div>
</div>
    <?php
    kartik\form\ActiveForm::end();
    app\widgets\MiniForm::end();


    echo app\widgets\Mail::widget(array(
        'urlFile' => yii\helpers\BaseUrl::base() . ("/docs/view/" . $model->id . "?mail=1"),
        'urlAddress' => yii\helpers\BaseUrl::base() . ("/accounts/json/" . $model->account_id),
        'urlMailForm' => yii\helpers\BaseUrl::base() . ('/mail/create'),
        'urlTemplate' => yii\helpers\BaseUrl::base() . ('/mailtemplate/json'),
        'obj' => "app\\\\models\\\\Docs",
        'type' => $model->doctype,
        'id' => $model->id
    ));
    ?>


<?= \app\widgets\RefnumModal::widget(['model' => $model, 'attribute' => 'refnum']); ?>