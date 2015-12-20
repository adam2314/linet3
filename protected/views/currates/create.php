<?php
/*$this->params["breadcrumbs"]=array(
	'Currates'=>array('index'),
	'Create',
);*/

$this->params["menu"]=array(
	//array('label'=>'List Currates', 'url'=>array('index')),
	array('label'=>Yii::t('app','Manage currency rates'), 'url'=>array('admin')),
);



app\widgets\MiniForm::begin(array(
    'header' => "Create Currency rate",
    //'width' => '800',
)); 
?>

<?php echo $this->render('_form', array('model'=>$model)); 


 app\widgets\MiniForm::end(); 

?>