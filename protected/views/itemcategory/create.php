<?php
$this->breadcrumbs=array(
	'Itemcategories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>Yii::t('app','List Item Category'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Manage Item Category'), 'url'=>array('admin')),
);
$this->beginWidget('MiniForm',array(
    'haeder' => Yii::t('app',"Create Item Category"),
    
)); 

?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); 

 $this->endWidget();
?>