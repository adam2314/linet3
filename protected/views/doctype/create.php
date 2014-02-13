<?php
$this->breadcrumbs=array(
	'Doctypes'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Doctype', 'url'=>array('index')),
	array('label'=>Yii::t('app',"Manage Doctype"), 'url'=>array('admin')),
);
?>

<h1></h1>

<?php 
$this->beginWidget('MiniForm',array(
    'haeder' => Yii::t('app',"Create Doctype"),
)); 
echo $this->renderPartial('_form', array('model'=>$model)); 
 $this->endWidget(); 
?>