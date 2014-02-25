<?php

$this->menu=array(
	array('label'=>'Create AccTemplate','url'=>array('create')),
	array('label'=>'Update AccTemplate','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete AccTemplate','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AccTemplate','url'=>array('admin')),
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('acc-template-grid', {
		data: $(this).serialize()
	});
	return false;
});
");



 $this->beginWidget('MiniForm',array(
    'haeder' => "View AccTemplate #",
)); 
?>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'name',
		//'AccType_id',
                array(
                'name' => 'Itemcategory_id',
                'value' => $model->Category->name,   //where name is Client model attribute 
               ),
	),
)); 

?>


<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Add new',
    'type'=>'primary',
    'htmlOptions'=>array(
        'data-toggle'=>'modal',
        'data-target'=>'#addnew',
    ),
)); ?>


<?php 
//print_r($model->items);
//exit;

$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'acc-templateItem-grid',
	'dataProvider'=>$items->search(),
	'filter'=>$items,
	'columns'=>array(
		//'id',
            
		array(
               'name' => 'ItemTemplate_id',
                'value' => '$data->Category->name',   //where name is Client model attribute 
              ),
            
            array(
                'name' => 'eavFields_id',
               'value' => '$data->EavFields->name',   //where name is Client model attribute 
               ),
		//'',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); 

 $this->endWidget(); 
?>


<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'addnew')); 

 $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'newField',
            'htmlOptions' => array('class' => 'well'),
            'action'=>array('SaveSub','id'=>$model->id),
            )
         );
?>
 
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Add new field</h4>
</div>
 
<div class="modal-body">
    <?php
    $models = EavFields::model()->findAll(array('order' => 'name'));
        $list = CHtml::listData($models, 'id', 'name');
        $htmlOptions=array ( );
        
        $select=CHtml::dropDownList(ucfirst($this->id).'Item[eavFields_id]', 0, $list, $htmlOptions );
    echo $select;
    ?>
    <input type='hidden' value='<?php echo $model->id; ?>' name='<?php echo ucfirst($this->id); ?>Item[AccTemplate_id]'>
  
</div>
 
<div class="modal-footer">
     
    
    
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
    
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'label'=>'Close',
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal'),
    )); ?>
</div>
 
<?php 

 $this->endWidget(); 

$this->endWidget(); ?>