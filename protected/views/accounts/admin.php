<?php


$this->menu=array(
	array('label'=>'List Accounts', 'url'=>array('index')),
	array('label'=>'Create Accounts', 'url'=>array('create')),
);



Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('accounts-grid', {
		data: $(this).serialize()
	});
	return false;
});
");

 $this->beginWidget('MiniForm',array(
    'haeder' => Yii::t('app',"Accounts"),
)); 
 
  $types=  Acctype::model()->findAll();
 $list=array();
 foreach ($types as $type1)
     $list[Yii::t('app',$type1->name)]=array('ajax' => $this->createUrl('accounts/ajax?type='.$type1->id));
 
$this->widget('zii.widgets.jui.CJuiTabs', array(
	    'tabs' => $list,
    
	    // additional javascript options for the tabs plugin
	    'options' => array(
                'selected'=>$type,
                'class'=>'nav nav-tabs',
	        //'collapsible' => true,
	    ),
	));

$this->endWidget(); 

?>
