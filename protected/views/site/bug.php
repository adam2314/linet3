<?php

$this->beginWidget('MiniForm',array(
    'haeder' => Yii::t('app',"Bug Report"),
)); 



$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'bug-form',
    
    'enableAjaxValidation'=>false,
        
)); 


   

    
    echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>255));
    //echo $form->textAreaRow($model,'body',array('class'=>'span5','maxlength'=>255));
    
    ?>

<?php echo $form->labelEx($model, 'body'); ?>
        <?php
        $this->widget('ext.tinymce.TinyMce', array(
            'model' => $model,
            'attribute' => 'body',
        ));
        ?>
        <?php echo $form->error($model, 'body'); ?>
<?php
    //echo $form->textFieldRow($model,'dbuser',array('class'=>'span5','maxlength'=>255));
    //echo $form->textFieldRow($model,'dbpassword',array('class'=>'span5','maxlength'=>255));
    //echo $form->textFieldRow($model,'dbstring',array('class'=>'span5','maxlength'=>255));
    
    
//echo CHtml::submitButton('Previews',array('onclick'=>'send();')); 
echo CHtml::submitButton(Yii::t('app','Send')); 

 $this->endWidget(); 
 ?>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_bugView',
)); 
 
 
$this->endWidget(); 
?>