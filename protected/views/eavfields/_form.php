<?php $form=kartik\form\ActiveForm::begin(array(
	'id'=>'eav-fields-form',
	'enableAjaxValidation'=>false,
)); 
$model->min=0;
$model->max=255;
use kartik\select2\Select2;
use app\models\EavFields;
?>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->field($model,'name'); ?>



<?php echo $form->field($model, 'eavType')->widget(Select2::classname(), ['data' =>\yii\helpers\ArrayHelper::map(EavFields::getTypes(), 'id', 'name')]); ?>
	<?php 
        
        //\yii\helpers\ArrayHelper::map(, 'id', 'name');
        
        //echo $form->field($model,'eavType',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->field($model,'min'); ?>

	<?php echo $form->field($model,'max'); ?>

	<div class="form-actions">
            <?= \yii\helpers\Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => 'btn btn-success']) ?>
		
	</div>

<?php kartik\form\ActiveForm::end(); ?>
