<?php
$this->params["breadcrumbs"]=array(
	'Itemcategories'=>array('index'),
	'Create',
);

$this->params["menu"]=array(
	//array('label'=>Yii::t('app','List Item Category'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Manage Item Category'), 'url'=>array('admin')),
);
app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app',"Create Item Category"),
    
)); 

?>


<?php echo $this->render('_form', array('model'=>$model)); 

 app\widgets\MiniForm::end();
?>