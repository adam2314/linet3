<?php
//$this->breadcrumbs=array(
//	'Docs'=>array('index'),
//	$model->id=>array('view','id'=>$model->id),
//	'Update',
//);
$actions=array();
$actions[]=array('label'=>Yii::t('app','List Documents'), 'url'=>array('index'));
$actions[]=array('label'=>Yii::t('app','Create Document'), 'url'=>array('create'));
$actions[]=array('label'=>Yii::t('app','View Document'), 'url'=>array('view', 'id'=>$model->id));
$actions[]=array('label'=>Yii::t('app','Manage Documents'), 'url'=>array('admin'));
$actions[]=array('label'=>Yii::t('app','Duplicate Document'), 'url'=>array('duplicate','id'=>$model->id));

if($model->doctype==6){//Quote
    $actions[]=array('label'=>Yii::t('app','Convert to Invoice'), 'url'=>array('duplicate','id'=>$model->id,'type'=>3));//Invoice
    $actions[]=array('label'=>Yii::t('app','Convert to Sales Order'), 'url'=>array('duplicate','id'=>$model->id,'type'=>7));//Sales Order
    $actions[]=array('label'=>Yii::t('app','Convert to Invoice Receipt'), 'url'=>array('duplicate','id'=>$model->id,'type'=>9));//Invoice Receipt
}

if(($model->doctype==1)||($model->doctype==2)){//Proforma || Delivery doc
    $actions[]=array('label'=>Yii::t('app','Convert to Invoice'), 'url'=>array('duplicate','id'=>$model->id,'type'=>3));//Invoice
    $actions[]=array('label'=>Yii::t('app','Convert to Invoice Receipt'), 'url'=>array('duplicate','id'=>$model->id,'type'=>9));//Invoice Receipt 
}




$this->menu=$actions;

$this->beginWidget('MiniForm',array(
    'haeder' => Yii::t('app',"Update") . " " . Yii::t('app',$type->name),
    //'width' => '800',
)); 
 echo $this->renderPartial('_form', array('model'=>$model,'type'=>$type)); 

$this->endWidget(); 
?>