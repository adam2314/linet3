<?php
$this->menu=array(
	//array('label'=>'List Doctype', 'url'=>array('index')),
	array('label'=>Yii::t('app',"Manage Document types"), 'url'=>array('admin')),
);
?>
<?php 
$this->beginWidget('MiniForm',array(
    'header' => Yii::t('app',"Create Document type"),
)); 
echo $this->renderPartial('_form', array('model'=>$model)); 
 $this->endWidget(); 
?>