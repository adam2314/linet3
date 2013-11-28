<?php

$this->menu=array(
	//array('label'=>'List Doctype', 'url'=>array('index')),
	//array('label'=>'Create Doctype', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('doctype-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
$this->beginWidget('MiniForm',array(
    'haeder' => Yii::t('app',"Manage Bankbooks"),
)); 
?>

 <?php 
 
 $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
        )
    );
 
    $temp=CHtml::listData(Accounts::model()->AutoComplete('',7), 'value', 'label');
    $temp[0]=Yii::t('app','Chose Bank');
    $model->account_id=0;
 
        echo $form->dropDownList($model, "account_id", $temp,array('class'=>''));
        
        
        echo $form->labelEx($model,'refnum'); 
        echo $form->textField($model,'refnum',array('size'=>60,'maxlength'=>100));
        echo $form->error($model,'refnum'); 
        
        
        ?>
<div id ="result">
</div>
<?php
 $this->endWidget();
 $this->endWidget();
?>

<script type="text/javascript">
    jQuery(document).ready(function(){
        $( "#FormDeposit_account_id" ).change(function() {
            var value=$("#FormDeposit_account_id").val();

            $.post( "<?php echo $this->createUrl('/deposit/ajax');?>", { Deposit: {account_id: value}} ).done(
                function( data )
                {
                    $( "#result" ).html( data );
                }
        
        );
          });



    });
        
</script>