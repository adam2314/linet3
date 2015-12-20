<div class="form">

    <?php
    $form = kartik\form\ActiveForm::begin( array(
        'id' => 'itemcategory-form',
        'enableAjaxValidation' => true,
    ));
    ?>

    <?php echo $form->errorSummary($model); ?>


    <?php
    foreach ($model->getSettings() as $sModel) {
        //if ($sModel->hidden == 0) {
        echo \app\helpers\EAVHelper::addRow($sModel->id, $sModel->value, $sModel);

        //}
    }
    ?>



    <div class="form-actions">
        <?= \yii\helpers\Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php kartik\form\ActiveForm::end(); ?>

</div><!-- form -->