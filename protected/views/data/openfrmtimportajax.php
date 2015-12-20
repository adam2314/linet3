
<?php
app\widgets\MiniForm::begin(array('header' => Yii::t("app","Import open format"))); 
?>

<?php $form=kartik\form\ActiveForm::begin( array(
	'id'=>'accounts-form',
	'enableAjaxValidation'=>true,
    'options'=>array('enctype'=>'multipart/form-data'),
)); ?>

    <?php echo $form->errorSummary($model); ?>    
   
    <?php 
    echo \yii\helpers\Html::hiddenInput("companyId",$model->companyId);
    foreach($model->accDesc as $type=>$desc){
        //$model->accTypeIndex[$type];
        //echo $form->dropDownListRow($model,'id6111',\yii\helpers\ArrayHelper::map(AccId6111::find()->All(), 'id', 'name')); 
        echo \yii\helpers\Html::dropDownList("SwitchType[".$model->accTypeIndex[$type]."]",0,\yii\helpers\ArrayHelper::map(app\models\Acctype::find()->All(), 'id', 'name'));
        echo $desc."<br/>";
        // $this->accDesc[$acc->type]=$acc->name;
    }
    
    
    ?>

    <div class="form-actions">
        <?= \yii\helpers\Html::submitButton(Yii::t('app', 'Go'), ['class' => 'btn btn-success']) ?>    
    </div>

<?php kartik\form\ActiveForm::end();
app\widgets\MiniForm::end(); ?>