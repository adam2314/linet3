<?php
use kartik\select2\Select2;
use app\models\Acctype;
use app\models\Doctype;
?>

<?php $form=kartik\form\ActiveForm::begin(array(
	'id'=>'mail-template-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->field($model,'name'); ?>

        <?php 
        $list=array(
            array('id'=>'app\models\Accounts','name'=>'Account type'),
            array('id'=>'app\models\Docs','name'=>'Documenet type'),
        );
        
        
        //echo $form->dropDownListRow($model, 'entity_type', \yii\helpers\ArrayHelper::map($list, 'id', 'name')); ?>
        <?= $form->field($model, 'entity_type')->widget(Select2::classname(), ['data' => \yii\helpers\ArrayHelper::map($list, 'id', 'name')]); ?>   
        <?= $form->field($model, 'entity_id')->widget(Select2::classname(), ['data' => \yii\helpers\ArrayHelper::map(Acctype::find()->All(), 'id', 'name')]); ?>
        <br />
	<?= $form->field($model,'cc'); ?>

        <?= $form->field($model,'bcc'); ?>

        <?= $form->field($model,'subject'); ?>

        <?= $form->field($model, 'body')->textArea();?>


	<?php //echo $form->field($model,'openformat',array('class'=>'span5','maxlength'=>5)); ?>

	<div class="form-actions">
		<?= \yii\helpers\Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => 'btn btn-success']) ?>
	</div>

<?php kartik\form\ActiveForm::end(); ?>
<?php
$this->registerJs("$('#mailtemplate-entity_type').change(function(){
        change();
    });"   , \yii\web\View::POS_READY);


?>
<script type="text/javascript">
    
    
    
    
function change(){
    var accList=<?php echo \yii\helpers\JSON::encode(\yii\helpers\ArrayHelper::map(Acctype::find()->All(), 'id', 'name'));?>;
    var docList=<?php echo \yii\helpers\JSON::encode(\yii\helpers\ArrayHelper::map(Doctype::find()->All(), 'id', 'name'));?>;
    //console.log(docList.length);
    if($("#mailtemplate-entity_type").val()=='app\\models\\Accounts'){
        loadList(accList);
    }else{
        loadList(docList);   
    }
        
}    

function loadList(list){
    
    $("#mailtemplate-entity_id")
            .find('option')
            .remove()
            .end();
    //console.log(list);
    for (x in list) {
        
            $("#mailtemplate-entity_id").append('<option value="'+x+'">'+list[x]+'</option>');
    }
            
    
    //$('#mailtemplate-entity_id').choosen;
    $("#mailtemplate-entity_id").select2("open");
    //$('#mailtemplate-entity_id').trigger("liszt:updated");
    //$('#mailtemplate-entity_id').trigger("chosen:updated");
}
</script>
