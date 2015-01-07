<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'acctype-form',
    'enableAjaxValidation' => false,
        ));
$list = CHtml::listData(Menu::model()->findAll(), 'id', 'label');
$list[0] = Yii::t('app', 'None');
?>

<?php echo $form->errorSummary($model); ?>
<?php echo $form->textFieldRow($model, 'id'); ?>
<?php echo $form->textFieldRow($model, 'label'); ?>

<?php echo $form->textFieldRow($model, 'url'); ?>

<?php echo $form->textFieldRow($model, 'icon'); ?>

<?php echo $form->dropDownListRow($model, 'parent', $list); ?>
<?php echo $form->textFieldRow($model, 'sort'); ?>

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
