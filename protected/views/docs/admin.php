<?php
//$this->breadcrumbs=array(
//	'Docs'=>array('index'),
//	'Manage',
//);

$this->menu=array(
	array('label'=>Yii::t('app','List documents'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create document'), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('docs-grid', {
		data: $(this).serialize()
	});
	return false;
});




/*
//adam: need work!
jQuery('#docs-grid a.delete').live('click',function() {
        if(!confirm('Are you sure you want to delete this item?')) return false;
        var th=this;
        var afterDelete=function(){};
        $.fn.yiiGridView.update('docs-grid', {
                type:'POST',
                url:$(this).attr('href'),
                success:function(data) {
                        getAlert(data);
                        $.fn.yiiGridView.update('docs-grid');
                        afterDelete(th,true,data);
                        
                },
                error:function(XHR) {
                        return afterDelete(th,false,XHR);
                }
        });
        return false;
});
*/

function getAlert(response){
    $('#yw12').html($(response).filter('.alert'));
}







");
$this->beginWidget('MiniForm',array(
    'haeder' => Yii::t('app',"Manage Docs"),  )); 


$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'page-form',
    'enableAjaxValidation'=>true,
)); 

echo Yii::t('app','From Date');
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'name'=>'Docs[issue_from]',  // name of post parameter
    'value'=>$model->issue_from,//Yii::app()->request->cookies['date.from']->value,  // value comes from cookie after submittion
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
    'value'=>$model->issue_to,
     'options'=>array(
        'showAnim'=>'fold',
        'dateFormat'=>Yii::app()->locale->getDateFormat('short'),
 
    ),
    'htmlOptions'=>array(
        'style'=>'height:20px;'
    ),
));
?>

<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>Yii::t('app',"Go"),
		)); ?>
	</div>

<?php
 $this->endWidget(); 





echo $this->renderPartial('_list', array('model' => $model));

 $this->endWidget();
?>
