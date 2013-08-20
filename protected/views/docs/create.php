<?php
//$this->breadcrumbs=array('Docs'=>array('index'),'Create',);

$this->menu=array(
	array('label'=>'List Docs', 'url'=>array('index')),
	array('label'=>'Manage Docs', 'url'=>array('admin')),
);
?>



<?php 
$this->beginWidget('MiniForm',array('haeder' => Yii::t("app","Create") ." " .$type->name,)); 
echo $this->renderPartial('_form', array('model'=>$model,'type'=>$type,'docStatuss'=>$docStatuss)); 
$this->endWidget(); 
?>