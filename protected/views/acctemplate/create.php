<?php
$this->params["menu"]=array(
	//array('label'=>'List AccTemplate','url'=>array('index')),
	array('label'=>Yii::t('app','Manage Account Template'),'url'=>array('admin')),
);

 app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app',"Create Account Template"),
)); 
?>


<?php echo $this->render('_form', array('model'=>$model)); 

 app\widgets\MiniForm::end(); 
?>