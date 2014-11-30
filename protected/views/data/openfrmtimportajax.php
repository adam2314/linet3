
<?php
$this->beginWidget('MiniForm',array('header' => Yii::t("app","Import open format"))); 
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'accounts-form',
	'enableAjaxValidation'=>true,
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

    <?php echo $form->errorSummary($model); ?>    
   
    <?php 
    echo CHtml::hiddenField("companyId",$model->companyId);
    foreach($model->accDesc as $type=>$desc){
        //$model->accTypeIndex[$type];
        //echo $form->dropDownListRow($model,'id6111',CHtml::listData(AccId6111::model()->findAll(), 'id', 'name')); 
        echo CHtml::dropDownList("SwitchType[".$model->accTypeIndex[$type]."]",0,CHtml::listData(Acctype::model()->findAll(), 'id', 'name'));
        echo $desc."<br/>";
        // $this->accDesc[$acc->type]=$acc->name;
    }
    
    
    ?>

    <div class="form-actions">
            <?php $this->widget('bootstrap.widgets.TbButton', array(
                    'buttonType'=>'submit',
                    'type'=>'primary',
                    'label'=>Yii::t('app',"Go") ,
            )); ?>
    </div>

<?php $this->endWidget();
$this->endWidget(); ?>