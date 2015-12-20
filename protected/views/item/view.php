<?php

//$this->params["breadcrumbs"]=array(
//	'Items'=>array('index'),
//	$model->name,
//);
use kartik\detail\DetailView;
//use yii\widgets\DetailView;
use app\widgets\app\widgets\MiniForm;
$this->params["menu"] = array(
    //array('label'=>'List Item', 'url'=>array('index')),
    array('label' => Yii::t('app', 'Create Item'), 'url' => array('create')),
    array('label' => Yii::t('app', 'Update Item'), 'url' => array('update', 'id' => $model->id)),
    //array('label'=>'Delete Item', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
    array('label' => Yii::t('app', 'Manage Item'), 'url' => array('admin')),
);


app\widgets\MiniForm::begin(array(
    'header' => Yii::t('app', "View Item") . " #" . $model->id,
        //'width' => '800',
));
?>

<?= kartik\detail\DetailView::widget(array(
    'model' => $model,
    //'mode'=>DetailView::MODE_EDIT,
    'responsive'=>1,
    'hover'=>1,
    'enableEditMode'=>1,
    'attributes' => array(
        //'id',
        //array('name'=>'account_id','value'=>$model->Account->name,),
        'name',
        array(
            'attribute' => 'category_id',
            'value' => isset($model->Category) ? $model->Category->name : null,
        ),
        'parent_item_id',
        'isProduct',
        'profit',
        'sku',
        array(
            'attribute' => 'unit_id',
            'value' => isset($model->Unit) ? $model->Unit->name : null, 
        ),
        'purchaseprice',
        'saleprice',
        'currency_id',
        'pic',
    //'owner',
    ),
));


app\widgets\MiniForm::end();
?>
