<h3><?= Yii::t("app", "Install Wizard");?>: <?=Yii::t("app", "Finish");?></h3>
<div class="iPage">
<?php

$form=kartik\form\ActiveForm::begin( [
    'id'=>'user-form',
    'enableAjaxValidation'=>true]
        ); 

?>

	<?= Yii::t("app", "You have successfully installed Linet. you can now log in to the system.");?>

	<?= $form->errorSummary($model); ?>

	<?= $form->field($model,'rename', ['template' => '{input}'])->hiddenInput(); ?>

	<?= $form->field($model,'install', ['template' => '{input}'])->hiddenInput(); ?>
        
        <div class="form-actions">
                
		<?= \yii\helpers\Html::submitButton(Yii::t("app",'Go!'), ['class' => 'btn btn-success']);  ?>
	</div>
        
<?php kartik\form\ActiveForm::end(); ?>
</div>