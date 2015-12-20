<?php
/***********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/
?>

<h3><?= Yii::t("app", "Install Wizard");?>: <?=Yii::t("app", "Database configuration");?></h3>
<div class="iPage small">
<?php

$form=kartik\form\ActiveForm::begin( array(
    'id'=>'install-form',
    'type'=>kartik\form\ActiveForm::TYPE_HORIZONTAL,
    'enableAjaxValidation'=>false,
       
)); 

    //echo $form->field($model,'dbtype');
    echo $form->field($model,'dbhost');
    echo $form->field($model,'dbname');
    echo $form->field($model,'dbuser');
    echo $form->field($model,'dbpassword');
    //echo $form->field($model,'dbstring');
    
    ?>
    <div class="form-actions">
        <a href="?r=install/index" class="btn btn-danger"><?=Yii::t("app",'Back');?></a>
        <?= \yii\helpers\Html::submitButton(Yii::t("app",'Next'), ['class' => 'btn btn-success']); ?>
    </div>
<?php kartik\form\ActiveForm::end(); ?>
</div>