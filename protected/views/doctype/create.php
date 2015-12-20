<?php
$this->params["menu"]=array(
	//array('label'=>'List Doctype', 'url'=>array('index')),
	array('label'=>Yii::t('app',"Manage Document types"), 'url'=>array('admin')),
);
?>
<?php 
app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app',"Create Document type"),
)); 
echo $this->render('_form', array('model'=>$model)); 
 app\widgets\MiniForm::end(); 
?>