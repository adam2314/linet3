<div class="form">
<?php 
use yii\helpers\arrayhelper;
use app\models\Acctype;
use app\models\Docstatus;
use kartik\select2\Select2;
?>
<?php $form=kartik\form\ActiveForm::begin( array(
	'id'=>'doctype-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?= $form->errorSummary($model); ?>

    
    
        <?php //echo $form->field($model,'name'); ?>
        <?php //echo $form->field($model,'openformat'); ?>
	

	
               <?php //echo $form->field($model,'isdoc')->checkbox(); ?>

		<?php //echo $form->field($model,'isrecipet')->checkbox(); ?>
	
		<?php //echo $form->checkboxRow($model,'iscontract'); ?>
	

		<?php //echo $form->field($model,'stockAction')->checkbox(); ?>
	
		<?php //echo $form->field($model,'account_type')->widget(Select2::classname(), ['data' =>arrayhelper::map(Acctype::find()->All(), 'id', 'name')]);?>
                <br />
		<?= $form->field($model,'docStatus_id')->widget(Select2::classname(), ['data' =>arrayhelper::map(Docstatus::find()->where(array('doc_type'=>$model->id))->all(), 'num', 'name')]);?>
	<br />
		<?= $form->field($model,'last_docnum'); ?>
	
        
        <?= $form->field($model, 'header')->textArea(); ?>
       
        
        
        <?= $form->field($model, 'footer')->textArea(); ?>
        
    
        
        
        
	<div class="form-actions">
            <?= \yii\helpers\Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => 'btn btn-success']) ?>
            
    </div>

<?php kartik\form\ActiveForm::end(); ?>

</div><!-- form -->