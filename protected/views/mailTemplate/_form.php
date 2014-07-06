<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'mail-template-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('maxlength'=>255)); ?>

        <?php 
        $list=array(
            array('id'=>'Acctype','name'=>'Account type'),
            array('id'=>'Doctype','name'=>'Documenet type'),
        );
        
        
        echo $form->dropDownListRow($model, 'entity_type', CHtml::listData($list, 'id', 'name')); ?>

        <?php echo $form->dropDownListRow($model, 'entity_id', CHtml::listData(Acctype::model()->findAll(), 'id', 'name')); ?>
        <br />
	<?php echo $form->textFieldRow($model,'cc',array('maxlength'=>255)); ?>

        <?php echo $form->textFieldRow($model,'bcc',array('maxlength'=>255)); ?>

        <?php echo $form->textFieldRow($model,'subject',array('maxlength'=>255)); ?>

        <?php $this->widget('ext.tinymce.TinyMce', array(
            'model' => $model,
            'attribute' => 'body',
            'spellcheckerUrl' => 'http://speller.yandex.net/services/tinyspell',
        )); ?>

	<?php //echo $form->textFieldRow($model,'openformat',array('class'=>'span5','maxlength'=>5)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? Yii::t('app',"Create") : Yii::t('app',"Save"),
		)); ?>
	</div>

<?php $this->endWidget(); ?>

<script type="text/javascript">
    $("#MailTemplate_entity_type").change(function(){
        change();
    });
    
    
    
function change(){
    var accList=<?php echo CJSON::encode(CHtml::listData(Acctype::model()->findAll(), 'id', 'name'));?>;
    var docList=<?php echo CJSON::encode(CHtml::listData(Doctype::model()->findAll(), 'id', 'name'));?>;
    //console.log(docList.length);
    if($("#MailTemplate_entity_type").val()=='Acctype'){
        loadList(accList);
    }else{
        loadList(docList);   
    }
        
}    

function loadList(list){
    
    $("#MailTemplate_entity_id")
            .find('option')
            .remove()
            .end();
    //console.log(list);
    for (x in list) {
        
            $("#MailTemplate_entity_id").append('<option value="'+x+'">'+list[x]+'</option>');
    }
            
    
    //$('#MailTemplate_entity_id').choosen;
    $('#MailTemplate_entity_id').trigger("liszt:updated");
    $('#MailTemplate_entity_id').trigger("chosen:updated");
}
</script>
