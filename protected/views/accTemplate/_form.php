<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'acc-template-form',
    'enableAjaxValidation' => false,
        ));
?>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'name', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php
$models = Acctype::model()->findAll(array('order' => 'name'));
//$list = CHtml::listData($models, 'id', 'name');
//$htmlOptions = array("class" => 'span5', 'id' => ucfirst($this->id) . '_AccType_id');
//$select = CHtml::dropDownList(ucfirst($this->id) . '[AccType_id]', 0, $list, $htmlOptions);

echo $form->dropDownListRow($model, 'AccType_id', CHtml::listData($models, 'id', 'name'));
?>

<?php //echo $form->textFieldRow($model,'AccType_id',array('class'=>'span5')); ?>
<?php
if (isset($items)) {

    $this->widget('bootstrap.widgets.TbButton', array(
        'label' => Yii::t('app', 'Add new'),
        'type' => 'primary',
        'htmlOptions' => array(
            'onclick' => '$("#addnew").dialog("open"); return false;',
        //'data-toggle' => 'modal',
        //'data-target' => '#addnew',
        ),
    ));



    $this->widget('EExcelView', array(
        'id' => 'acc-templateItem-grid',
        'dataProvider' => $items->search(),
        'filter' => $items,
        'columns' => array(
            //'id',
            //array(
            //  'name' => 'AccTemplate_id',
            //   'value' => '$data->AccTemplate->name',   //where name is Client model attribute 
            // ),

            array(
                'name' => 'eavFields_id',
                'value' => '$data->EavFields->name', //where name is Client model attribute 
            ),
            //'',
            array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
                'template' => '{remove}',
                'buttons' => array(
                    'remove' => array(
                        'label' => '<i class="glyphicon glyphicon-remove"></i>',
                        'url' => '$data->id',
                        'options' => array(
                            'onclick' => 'deleteTempItm(this);return false;',
                        ),
                    ),
                ),
            ),
        ),
    ));
}
?>





<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? Yii::t('app', "Create") : Yii::t('app', "Save"),
    ));
    ?>
</div>

<?php $this->endWidget(); ?>








<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id' => 'addnew',
    'options' => array(
        'title' => Yii::t('app', 'Add new field'),
        'autoOpen' => false,
        'width' => '600px',
    ),
)); //bootstrap.widgets.TbModal

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'newField',
    'htmlOptions' => array('class' => 'well'),
    'action' => array('SaveSub', 'id' => $model->id),
        )
);
?>

<div class="modal-body">
<?php
$models = EavFields::model()->findAll(array('order' => 'name'));
$list = CHtml::listData($models, 'id', 'name');
$htmlOptions = array();

$select = CHtml::dropDownList(ucfirst($this->id) . 'Item[eavFields_id]', 0, $list, $htmlOptions);
echo $select;
?>
    <input type='hidden' value='<?php echo $model->id; ?>' name='<?php echo ucfirst($this->id); ?>Item[AccTemplate_id]'>

</div>

<div class="modal-footer">



<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'buttonType' => 'submit',
    'type' => 'primary',
    'label' => Yii::t('app', 'Submit')
));
?>

    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'label' => Yii::t('app', 'Close'),
        'url' => '#',
        'htmlOptions' => array(
            'onclick' => '$("#addnew").dialog("close"); return false;',
        //'data-dismiss' => 'modal'
        ),
    ));
    ?>
</div>

    <?php
    $this->endWidget('zii.widgets.jui.CJuiDialog');

    $this->endWidget();
    ?>

<script type="text/javascript">
     function deleteTempItm(obj){//obj
        //var id = obj.getAttribute("href");
        //var id = 1;
        var id = obj.getAttribute("href");
        $.post( "<?php echo Yii::app()->createAbsoluteUrl('/accTemplateItem/delete');?>/"+id,{  }, function( data ) {
            //alert( "Data Loaded: " + data );
            //console.log(data);
            //$('#answerAreaForm').html(data);
            window.location = "<?php echo Yii::app()->createAbsoluteUrl('/accTemplate/update/'.$model->id);?>";
            
          });
        
    }
    
    </script>