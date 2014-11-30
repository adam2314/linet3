<?php
$this->menu = array(
    array('label' => Yii::t('app', 'Create Item Template'), 'url' => array('create')),
    array('label' => Yii::t('app', 'Update Item Template'), 'url' => array('update', 'id' => $model->id)),
    array('label' => Yii::t('app', 'Delete Item Template'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => Yii::t('app', 'Manage Item Template'), 'url' => array('admin')),
);




$this->beginWidget('MiniForm', array(
    'header' => Yii::t('app', "View AccTemplate"),
));
?>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        //'id',
        'name',
        //'AccType_id',
        array(
            'name' => 'Itemcategory_id',
            'value' => $model->Category->name, //where name is Client model attribute 
        ),
    ),
));
?>


<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'label' => Yii::t('app', 'Add new'),
    'type' => 'primary',
    'htmlOptions' => array(
        'onclick' => '$("#addnew").dialog("open"); return false;',
        //'data-toggle' => 'modal',
        //'data-target' => '#addnew',
    ),
));
?>


<?php
//print_r($model->items);
//Yii::app()->end();

$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'acc-templateItem-grid',
    'dataProvider' => $items->search(),
    'filter' => $items,
    'columns' => array(
        //'id',
        //array(
        //'name' => 'ItemTemplate_id',
        // 'value' => '$data->Category->name',   //where name is Client model attribute 
        //),

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

$this->endWidget();
?>


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
    <input type='hidden' value='<?php echo $model->id; ?>' name='<?php echo ucfirst($this->id); ?>Item[ItemTemplate_id]'>

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
        $.post( "<?php echo Yii::app()->createAbsoluteUrl('/itemTemplateItem/delete');?>/"+id,{  }, function( data ) {
            //alert( "Data Loaded: " + data );
            //console.log(data);
            //$('#answerAreaForm').html(data);
            window.location = "<?php echo Yii::app()->createAbsoluteUrl('/itemTemplate/view/'.$model->id);?>";
            
          });
        
    }
    
    </script>