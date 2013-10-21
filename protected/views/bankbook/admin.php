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
        echo $form->dropDownList($model, "account_id", CHtml::listData(Accounts::model()->AutoComplete('',7), 'value', 'label'),array('class'=>'currSelect'));
        ?>
<?php
 $this->endWidget();
 $this->endWidget();
?>
