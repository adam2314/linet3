<?php
$this->params["breadcrumbs"]=array(
	//'Itemunits'=>array('index'),
	//'Create',
);

$this->params["menu"]=array(
	array('label'=>Yii::t('app','List')." " .Yii::t('app',"Item Units"), 'url'=>array('index')),
	array('label'=>Yii::t('app','Manage')." " .Yii::t('app',"Item Units"), 'url'=>array('admin')),
);


app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app',Yii::t('app','Create')." " .Yii::t('app',"Item Units")),
    //'width' => '800',
)); 
?>

<?php echo $this->render('_form', array('model'=>$model)); ?>

<?php  app\widgets\MiniForm::end(); ?>
