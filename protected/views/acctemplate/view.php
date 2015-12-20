<?php
$this->breadcrumbs = array(
    Yii::t('app', 'Account Templates') => array('index'),
    $model->name,
);

$this->params["menu"]= array(
    //array('label'=>'List AccTemplate','url'=>array('index')),
    array('label' => Yii::t('app', 'Create Account Template'), 'url' => array('create')),
    array('label' => Yii::t('app', 'Update Account Template'), 'url' => array('update', 'id' => $model->id)),
    array('label' => Yii::t('app', 'Delete Account Template'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => Yii::t('app', 'Manage Account Template'), 'url' => array('admin')),
);



app\widgets\MiniForm::begin( array(
    'header' => Yii::t('app', "View Account Template") . " " . $model->name,
));
?>

<?php
echo kartik\detail\DetailView::widget( array(
    'model' => $model,
    'attributes' => array(
        //'id',
        'name',
        //'AccType_id',
        array(
            'name' => 'AccType_id',
            'value' => Yii::t('app', $model->type->desc), //where name is Client model attribute 
        ),
    ),
));
?>


<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'label' => Yii::t('app', 'Add new'),
    'type' => 'success',
    'options' => array(
        'onclick' => '$("#addnew").dialog("open"); return false;',
    //'data-toggle' => 'modal',
    //'data-target' => '#addnew',
    ),
));
?>


<?php
//print_r($model->items);
//Yii::$app->end();

echo app\widgets\GridView::widget( array(
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
            'class' => 'yii\grid\ActionColumn',
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

app\widgets\MiniForm::end();
?>


<?php
echo \yii\jui\Dialog::begin(array(
    'id' => 'addnew',
    'options' => array(
        'title' => Yii::t('app', 'Add new field'),
        'autoOpen' => false,
        'width' => '600px',
    ),
)); //bootstrap.widgets.TbModal

$form = kartik\form\ActiveForm::begin( array(
    'id' => 'newField',
    'options' => array('class' => 'well'),
    'action' => array('SaveSub', 'id' => $model->id),
        )
);
?>

<div class="modal-body">
<?php
$models = EavFields::find()->All();//array('order' => 'name')
$list = \yii\helpers\ArrayHelper::map($models, 'id', 'name');
$options = array();

$select = \yii\helpers\Html::dropDownList(ucfirst($this->id) . 'Item[eavFields_id]', 0, $list, $options);
echo $select;
?>
    <input type='hidden' value='<?php echo $model->id; ?>' name='<?php echo ucfirst($this->id); ?>Item[AccTemplate_id]'>

</div>

<div class="modal-footer">



<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'buttonType' => 'submit',
    'type' => 'success',
    'label' => Yii::t('app', 'Submit')
));
?>

    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'label' => Yii::t('app', 'Close'),
        'url' => '#',
        'options' => array(
            'onclick' => '$("#addnew").dialog("close"); return false;',
        //'data-dismiss' => 'modal'
        ),
    ));
    ?>
</div>

    <?php
    kartik\form\ActiveForm::end();
    \yii\jui\Dialog::end();

    app\widgets\MiniForm::end();
    ?>

<script type="text/javascript">
     function deleteTempItm(obj){//obj
        //var id = obj.getAttribute("href");
        //var id = 1;
        var id = obj.getAttribute("href");
        $.post( "<?php echo yii\helpers\BaseUrl::base().('/accTemplateItem/delete');?>/"+id,{  }, function( data ) {
            //alert( "Data Loaded: " + data );
            //console.log(data);
            //$('#answerAreaForm').html(data);
            window.location = "<?php echo yii\helpers\BaseUrl::base().('/accTemplate/view/'.$model->id);?>";
            
          });
        
    }
    
    </script>