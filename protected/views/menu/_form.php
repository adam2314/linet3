<?php
$form = kartik\form\ActiveForm::begin( array(
    'id' => 'acctype-form',
    'enableAjaxValidation' => false,
        ));
$list = \yii\helpers\ArrayHelper::map(app\models\Menu::find()->All(), 'id', 'label');
$list[0] = Yii::t('app', 'None');
?>

<?php echo $form->errorSummary($model); ?>
<?php echo $form->field($model, 'id'); ?>
<?php echo $form->field($model, 'label'); ?>

<?php echo $form->field($model, 'url'); ?>

<?php echo $form->field($model, 'icon'); ?>

<?php echo $form->field($model, 'parent')->widget(\kartik\select2\Select2::className(),['data'=>$list]); ?>
<?php echo $form->field($model, 'sort'); ?>

<div class="form-actions">
    <?= \yii\helpers\Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => 'btn btn-success']) ?>

</div>

<?php kartik\form\ActiveForm::end(); ?>
