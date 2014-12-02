



<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'bankbook-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
?>
<?php echo $form->fileFieldRow($model, 'file', array('size' => 60, 'maxlength' => 255)); ?>

<div class="row buttons">

    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => Yii::t('app', 'Import'),
    ));
    ?>

</div>

<?php $this->endWidget(); ?>



<?php
$this->widget('EExcelView', array(
    'id' => 'bankbook-grid',
    'dataProvider' => $model->search(),
    //'filter'=>$model,
    'columns' => array(
        'id',
        'account_id',
        'details',
        'refnum',
        'date',
        'sum',
        'total',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>