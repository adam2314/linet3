<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'acchist-form',
    'enableAjaxValidation' => false,
        ));
?>

<?php echo $form->errorSummary($model); ?>

<?php
$temp = CHtml::listData(Accounts::model()->findAll(), 'id', 'name');
$temp[0] = Yii::t('app', 'Chose Account');
?>
<?php echo $form->dropDownListRow($model, 'account_id', $temp); ?>	
<div class="row">
    <div class="col-md-2">
        <?php echo $form->labelEx($model, 'dt'); ?>
        <?php
        $this->widget('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker', array(
            'model' => $model, //Model object
            'attribute' => 'dt', //attribute name
            'mode' => 'date',
            'language' => substr(Yii::app()->language, 0, 2),
            'options' => array(
                'showAnim' => 'fold',
                'dateFormat' => Yii::app()->locale->getDateFormat('short'),
            ) // jquery plugin options
        ));
        ?>
        <?php echo $form->error($model, 'dt'); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $form->labelEx($model, 'details'); ?>
        <?php
        $this->widget('ext.tinymce.TinyMce', array(
            'model' => $model,
            'attribute' => 'details',
            'spellcheckerUrl' => 'http://speller.yandex.net/services/tinyspell',
        ));
        ?>
    </div>
</div>
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
