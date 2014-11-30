<?php


$this->menu=array(
	array('label'=>Yii::t('app','List Item'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Manage Item'), 'url'=>array('admin')),
);

$this->beginWidget('MiniForm',array(
    'header' => Yii::t('app',"Create Items"),
    
)); 

?>


<?php echo $this->renderPartial('_form', array('model'=>$model,'units'=>$units,'cat'=>$cat)); 





 $this->endWidget();
?>