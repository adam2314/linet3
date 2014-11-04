<?php
//$this->breadcrumbs=array(
//	'Items'=>array('index'),
//	$model->name,
//);

$this->menu=array(
	//array('label'=>'List Item', 'url'=>array('index')),
	array('label'=>'Create Item', 'url'=>array('create')),
	array('label'=>'Update Item', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Delete Item', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Item', 'url'=>array('admin')),
);


$this->beginWidget('MiniForm',array(
    'haeder' => "Manage Items",
    //'width' => '800',
)); 

?>

<h1>View Item <?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		
                //array('name'=>'account_id','value'=>$model->Account->name,),
                'name',
		
                array(
                    'name'=>'category_id',
                    'value'=>isset($model->Category)?$model->Category->name:null,
                ),
		'parent_item_id',
		'isProduct',
		'profit',
                'sku',
                array(
                    'name'=>'unit_id',
                    'value'=>$model->Unit->name,
                ),
		'purchaseprice',
		'saleprice',
		'currency_id',
            
		
		'pic',
		//'owner',
	),
)); 


 $this->endWidget();
?>
