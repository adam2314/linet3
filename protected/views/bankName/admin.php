<?php
$this->params["breadcrumbs"]=array(
	'Bank Names'=>array('index'),
	'Manage',
);

$this->params["menu"]=array(
	array('label'=>'List BankName','url'=>array('index')),
	array('label'=>'Create BankName','url'=>array('create')),
);


?>

<h1>Manage Bank Names</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo \yii\helpers\Html::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php echo app\widgets\GridView::widget(array(
	'id'=>'bank-name-grid',
	'dataProvider'=>$model->dp(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		array(
			'class'=>'yii\grid\ActionColumn',
		),
	),
)); ?>
