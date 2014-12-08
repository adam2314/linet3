<div class="form">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'itemcategory-form',
        'enableAjaxValidation' => true,
    ));
    ?>

    <?php echo $form->errorSummary($model); ?>


    <?php
    foreach ($model->getSettings() as $sModel) {
        //if ($sModel->hidden == 0) {
        echo EAVHelper::addRow($sModel->id, $sModel->value, $sModel);

        //}
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

</div><!-- form -->