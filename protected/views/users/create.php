<?php


$this->menu=array(
	//array('label'=>'List User','url'=>array('index')),
	array('label'=>'Manage User','url'=>array('admin')),
);


 $this->beginWidget('MiniForm',array(
    'header' => Yii::t('app',"Create User"),
)); 
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>


<?php $this->endWidget(); ?>