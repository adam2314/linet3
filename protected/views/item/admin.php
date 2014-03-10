<?php

$this->menu=array(
	//array('label'=>Yii::t('app','List Item'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create Item'), 'url'=>array('create')),
);




$this->beginWidget('MiniForm',array(
    'haeder' => Yii::t('app',"Manage Items"),
    //'width' => '800',
)); 
?>


<?php 

echo $this->renderPartial('_ajax', array('model'=>$model)); 
                                    

 $this->endWidget(); ?>
