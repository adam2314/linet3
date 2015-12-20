<?php 
use app\models\Currecies;
use kartik\select2\Select2;
?>

<div class="form">

<?php $form=kartik\form\ActiveForm::begin( array(
	'id'=>'currates-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

                <?php echo $form->field($model,'currency_id')->widget(Select2::classname(), ['data' =>\yii\helpers\ArrayHelper::map(Currecies::find()->All(), 'id', 'name')]); ?>
                <br />
		
           
		<?php //echo $form->labelEx($model,'value'); ?>
		<?php echo $form->field($model,'value'); ?>
		<?php //echo $form->error($model,'value'); ?>
	
	<div class="form-actions">
		<?= \yii\helpers\Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => 'btn btn-success']) ?>
	</div>

<?php kartik\form\ActiveForm::end(); ?>

</div><!-- form -->