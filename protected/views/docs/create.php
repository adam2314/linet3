<?php
//$this->breadcrumbs=array('Docs'=>array('index'),'Create',);

$this->menu=array(
	array('label'=>Yii::t('app','Manage Documents'), 'url'=>array('admin')),
	//array('label'=>'Manage Docs', 'url'=>array('admin')),
);
?>



<?php 
$this->beginWidget('MiniForm',array('header' => Yii::t("app","Create") ." " .Yii::t('app',$model->docType->name),)); 
echo $this->renderPartial('_form', array('model'=>$model)); 
$this->endWidget(); 
?>