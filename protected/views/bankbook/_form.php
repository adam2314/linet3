<?php 
use kartik\select2\Select2;
use app\models\Currates;
use app\models\Accounts;
$form=kartik\form\ActiveForm::begin(array(
	'id'=>'bank-name-form',
	//'enableAjaxValidation'=>false,
)); ?>

	<?= $form->errorSummary($model); ?>

	<?php //echo $form->field($model,'id',array('class'=>'span5')); ?>

        <?= $form->field($model,'date')->widget(kartik\datecontrol\DateControl::classname(), ['type' => 'date']);?>
        


        <?= $form->field($model,'details'); ?>

        <?= $form->field($model,'refnum'); ?>

        <?= $form->field($model,'sum'); ?>
        
        <?= $form->field($model, 'currency_id')->widget(kartik\select2\Select2::className(),['data'=> \yii\helpers\ArrayHelper::map(Currates::GetRateList(), 'currency_id', 'name')]); //currency  ?>
            
        <?= $form->field($model, 'account_id')->widget(kartik\select2\Select2::className(),['data'=> \yii\helpers\ArrayHelper::map(Accounts::findAllByType(7), 'id', 'name')]); ?>

	<div class="form-actions">
		<?= \yii\helpers\Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => 'btn btn-success']) ?>
	</div>

<?php kartik\form\ActiveForm::end(); ?>
