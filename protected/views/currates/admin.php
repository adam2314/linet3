<?php
$this->breadcrumbs=array(
	'Currates'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Currates', 'url'=>array('index')),
	array('label'=>Yii::t('app','Create Currency Rate'), 'url'=>array('create')),
);
?>


<?php 
 $this->beginWidget('MiniForm',array('haeder' => Yii::t('app',"Manage Currencies Rates"),)); 
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('currates-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php

echo Yii::t('app','From Date');
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'name'=>'Docs[issue_from]',  // name of post parameter
    'value'=>$model->from,//Yii::app()->request->cookies['date.from']->value,  // value comes from cookie after submittion
    //'value'=>date("d/m/Y"),
    'language' => substr(Yii::app()->language,0,2),
     'options'=>array(
        'showAnim'=>'fold',
        'dateFormat'=>Yii::app()->locale->getDateFormat('short'),
    ),
    'htmlOptions'=>array(
        'style'=>'height:20px;'
    ),
));


echo Yii::t('app','To Date');

$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'name'=>'Docs[issue_to]',
    //'value'=>$model->issue_to,//Yii::app()->request->cookies['date.to']->value,
    'language' => substr(Yii::app()->language,0,2),
    'value'=>$model->to,
     'options'=>array(
        'showAnim'=>'fold',
        'dateFormat'=>Yii::app()->locale->getDateFormat('short'),
 
    ),
    'htmlOptions'=>array(
        'style'=>'height:20px;'
    ),
));


//echo CHtml::submitButton('Go'); 

?>

    <div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>Yii::t('app',"Go"),
		)); ?>
	</div>



<?php 
$this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'currates-grid',
	'dataProvider'=>$model->search(),
        'template' => '{items}{pager}',
	'filter'=>$model,
        'ajaxUpdate'=>true,
        'ajaxType'=>'POST',
	'columns'=>array(
		//'id',
		
                array(
                    'name' => 'currency_id',
                    'filter'=>CHtml::listData(Currecies::model()->findAll(), 'id', 'name'),
                     'value' => 'isset($data->Currency)?$data->Currency->name:0',   //where name is Client model attribute 
                   ),
		 array(
                    'name'=>'date',
                     'filter' => '',
                    'value'=>'$data->date'
                ),
		'value',
		/*array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
                        'template'=>'{display}',
                        'edit' => array(
                                
                            'display' => array(
                                'label'=>'<i class="glyphicon glyphicon-transfer"></i>',
                                'url'=>'Yii::app()->createUrl("accounts/transaction", array("id"=>$data->id))',
                                //'visible'=>'$data->score > 0',
                                'click'=>'function(){alert("Going down!");}',
                            ),
		),*/
	),
)); 


 $this->endWidget(); 

?>
