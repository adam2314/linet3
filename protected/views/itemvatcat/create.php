<?php
$this->params["breadcrumbs"]=array(
	Yii::t("app",'Item Vat Categories')=>array('index'),
	Yii::t("app",'Create'),
);

$this->params["menu"]=array(
	//array('label'=>'List ItemVatCat','url'=>array('index')),
	array('label'=>Yii::t("app",'Manage Item Tax Categories'),'url'=>array('admin')),
);

app\widgets\MiniForm::begin(array('header' => Yii::t("app","Create Item Tax Category"),)); 
?>


<?php echo $this->render('_form', array('model'=>$model)); 



app\widgets\MiniForm::end(); 
?>