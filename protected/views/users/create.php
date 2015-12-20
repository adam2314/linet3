<?php


$this->params["menu"]=array(
	//array('label'=>'List User','url'=>array('index')),
	array('label'=>'Manage User','url'=>array('admin')),
);


 app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app',"Create User"),
)); 
?>

<?php echo $this->render('_form', array('model'=>$model)); ?>


<?php app\widgets\MiniForm::end(); ?>