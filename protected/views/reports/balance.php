<?php
/***********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
$this->params["menu"]= array(
        //array('label'=>'List Config','url'=>array('index')),
        //array('label'=>'View Config','url'=>array('view','id'=>$model->id)),
);
app\widgets\MiniForm::begin( array('header' => Yii::t("app", "Balance report")));
?>
<?php
$form = kartik\form\ActiveForm::begin( array(
    'id' => 'balance-form',
    'enableAjaxValidation' => false,
        ));
?>
<div class='row'>
    <div class="row form-actions">
        <div class='col-md-3'>
            <?= $form->field($model, 'from_date')->widget(kartik\datecontrol\DateControl::classname(), ['type' => 'date']); ?>
            <?= $form->field($model, 'to_date')->widget(kartik\datecontrol\DateControl::classname(), ['type' => 'date']); ?>
            
<?= \yii\helpers\Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-success']) ?>
            
        </div>



    </div>

</div>

<div id ="result">
</div>


<?php kartik\form\ActiveForm::end(); ?>



<?php
app\widgets\MiniForm::end();
?>
<?php

/*
$this->registerJs("var baseAddress='" . yii\helpers\BaseUrl::base() . "';" 
        //.$java
        , \yii\web\View::POS_READY);
 * 
 * 
 */
?>
