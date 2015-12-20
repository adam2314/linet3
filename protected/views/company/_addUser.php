<?php $form=kartik\form\ActiveForm::begin(array(
	'id'=>'company-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($user); ?>

	
        <?php echo $form->field($user,'user_id')->widget(kartik\select2\Select2::className(),['data'=>\yii\helpers\ArrayHelper::map(\app\models\User::find()->All(), 'id', 'username')]); ?>
<br />
	<?php echo $form->field($user,'level_id'); ?>

	<div class="form-actions">
		<?= \yii\helpers\Html::submitButton($user->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => 'btn btn-success']) ?>
	</div>

<?php kartik\form\ActiveForm::end(); ?>
