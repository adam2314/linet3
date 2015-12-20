<?php $form=kartik\form\ActiveForm::begin(array(
	'id'=>'mail-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?= $form->errorSummary($model); ?>

        <?= $form->field($model,'files')->hiddenInput(); ?>

	<?php //echo $form->field($model,'from',array('maxlength'=>255)); ?>

        <?= $form->field($model,'to'); ?>
        <?php //echo $form->dropDownListRow($model, 'entity_type', \yii\helpers\ArrayHelper::map($list, 'id', 'name')); ?>

        <?php //echo $form->dropDownListRow($model, 'entity_id', \yii\helpers\ArrayHelper::map(Acctype::find()->All(), 'id', 'name')); ?>
        <br />
	<?= $form->field($model,'cc'); ?>

        <?= $form->field($model,'bcc'); ?>
        <div id="files"></div>
        <?= $form->field($model,'subject'); ?>

        <?= $form->field($model,'body')->textArea(); ?>

	<?php //echo $form->field($model,'openformat',array('class'=>'span5','maxlength'=>5)); ?>

	<div class="form-actions">
		<?= \yii\helpers\Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => 'btn btn-success']) ?>
	</div>

<?php kartik\form\ActiveForm::end(); ?>

