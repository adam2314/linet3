<?php
$this->params["breadcrumbs"]=array(
	//'Itemunits'=>array('index'),
	//$model->name=>array('view','id'=>$model->id),
	//'Update',
);

$this->params["menu"]=array(
	array('label'=>Yii::t('app','List')." " .Yii::t('app',"Item Units"), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create')." " .Yii::t('app',"Item Units"), 'url'=>array('create')),
	array('label'=>Yii::t('app','View')." " .Yii::t('app',"Item Units"), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('app','Manage')." " .Yii::t('app',"Item Units"), 'url'=>array('admin')),
);
app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app','Update')." " .Yii::t('app',"Item Units")." ". $model->id,
    //'width' => '800',
)); 
?>

<?php echo $this->render('_form', array('model'=>$model)); ?>
<?php  app\widgets\MiniForm::end(); ?>