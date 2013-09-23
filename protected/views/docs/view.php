<?php
//$this->breadcrumbs=array(
//	'Docs'=>array('index'),
//	$model->id,
//);



$actions=array();
//$actions[]=array('label'=>'List Docs', 'url'=>array('index'));
$actions[]=array('label'=>'Create Doc', 'url'=>array('create'));
$actions[]=array('label'=>'Update Doc', 'url'=>array('update', 'id'=>$model->id));
$actions[]=array('label'=>'Manage Docs', 'url'=>array('admin'));
$actions[]=array('label'=>'Duplicate Doc', 'url'=>array('duplicate','id'=>$model->id));
$actions[]=array('label'=>'Print Doc', 'url'=>array('print','id'=>$model->id));

if($model->doctype==6){//Quote
    $actions[]=array('label'=>'Convert to Invoice', 'url'=>array('duplicate','id'=>$model->id,'type'=>3));//Invoice
    $actions[]=array('label'=>'Convert to Sales Order', 'url'=>array('duplicate','id'=>$model->id,'type'=>7));//Sales Order
    $actions[]=array('label'=>'Convert to Invoice Receipt', 'url'=>array('duplicate','id'=>$model->id,'type'=>9));//Invoice Receipt
//    להזמנת עבודה/חשבונית/חשבונית מס קבלה
}
if($model->doctype==7){//Sales Order
    $actions[]=array('label'=>'Convert to Invoice', 'url'=>array('duplicate','id'=>$model->id,'type'=>3));//Invoice
    $actions[]=array('label'=>'Convert to Invoice Receipt', 'url'=>array('duplicate','id'=>$model->id,'type'=>9));//Invoice Receipt
    //הזמנת עבודה לחשבונית/חשבונית מס קבלה
}

$this->menu=$actions;



$this->beginWidget('MiniForm',array('haeder' => Yii::t("app","View Document ") ." " .$model->id,));
?>
<script type="text/javascript">
    jQuery(document).ready(function(){
        
        $('#language_chzn').hide();
                
    });
    
    
    function hideMe(){
   $('#printLink').hide();
   $('#language_chzn').show();
   return false;   
  }
    
    
    function sendForm(value){//preview,print,mail,pdf,save
      $('#subType').val(value);
      if(value=='preview')
        $("#docs-form").attr('target', '_BLANK');
      $('#docs-form').submit();
      
      //return false;
  }
</script>
<?php 

echo $this->renderPartial('print', array('model'=>$model,'preview'=>1)); 
                
        
        $form=$this->beginWidget('CActiveForm', array(
	'id'=>'docs-form',
        'action'=>'update/'.$model->id,
	'enableAjaxValidation'=>false,
)); 
       echo CHTML::hiddenField("subType","print");
       echo CHTML::hiddenField("Docs[id]",$model->id);
         $this->widget('bootstrap.widgets.TbButtonGroup', array(
            'type'=>'', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
            'buttons'=>array(
                array('icon'=>'print','label'=>Yii::t('app','Print'),'htmlOptions'=>array('onclick'=>'return sendForm("print");'),),
                array('items'=>array(
                    //array('icon'=>'envelope','label'=>Yii::t('app','Email'), 'url'=>'javascript:sendForm("email");',),
                    array('icon'=>'save','label'=>Yii::t('app','PDF'), 'url'=>'javascript:sendForm("pdf");',),
                    
                )),
            ),
        )); 
        
        $this->widget('bootstrap.widgets.TbButton', array(
            'label'=>Yii::t('app','Change language'),
            'icon'=>'globe',
            'htmlOptions'=>array('id'=>'printLink', 'onclick'=>'return hideMe();'),
        )); 
        
         echo CHtml::dropDownList('language',Yii::app()->user->getLanguage(),CHtml::listData(Language::model()->findAll(), 'id', 'name'));
         $this->endWidget(); 
                $this->endWidget(); 
		?>
