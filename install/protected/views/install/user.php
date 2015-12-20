<h3><?= Yii::t("app", "Install Wizard");?>: <?=Yii::t("app", "Add User");?></h3>
<div class="iPage">
<?php
use \yii\helpers\ArrayHelper;
use kartik\select2\Select2; 

$languages = ArrayHelper::map(app\models\Language::find()->All(), 'id', 'name');  
$form=kartik\form\ActiveForm::begin( array(
    'id'=>'user-form',
    'enableAjaxValidation'=>true,
    'type'=>kartik\form\ActiveForm::TYPE_HORIZONTAL,
)); 

?>

	<?= $form->errorSummary($model); ?>

	<?= $form->field($model,'username'); ?>

	<?= $form->field($model,'fname'); ?>
        
	<?= $form->field($model,'lname'); ?>

	<?= $form->field($model,'passwd'); ?>

	<?= $form->field($model,'email'); ?>

        <?= $form->field($model, 'language')->widget(Select2::classname(), ['data' => $languages]); ?>    


        <?= $form->field($model, 'timezone')->widget(Select2::classname(), ['data' => app\models\Timezone::makeList()]); ?>    
        
        <?php //echo $form->field($model,'theme');?>
        <div class="form-actions">
                <a href="?r=install/config" class="btn btn-danger"><?=Yii::t("app",'Back');?></a>
		<?= \yii\helpers\Html::submitButton(Yii::t("app",'Next'), ['class' => 'btn btn-success']);  ?>
	</div>
        
<?php kartik\form\ActiveForm::end(); ?>

</div>