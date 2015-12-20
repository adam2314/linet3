<?php
$this->params["menu"]= array(
        //array('label'=>'List AccTemplate','url'=>array('index')),
        //array('label'=>'Manage AccTemplate','url'=>array('admin')),
);

app\widgets\MiniForm::begin( array(
    'header' => Yii::t('app', "Restore Backup From File"),
));
?>
<div class="form">


<?php
$form = kartik\form\ActiveForm::begin( array(
    'id' => 'upload-form',
    //'enableAjaxValidation' => true,
    'options' => array('enctype' => 'multipart/form-data'),
        ));
?>
    
    <div class="alert">
        <h4> <?= Yii::t('app', 'Warning') . ": " ?></h4><br>
        <?= Yii::t('app', 'All current compnay data will be removed:'); ?>
    </div>
    
    
    
    <div>
    <?= Yii::t('app', 'Warning') .": ". Yii::t('app', 'All current compnay data will be removed:'); ?>
    </div>
    <?= $form->field($model, 'file')->fileInput(); ?>

    <div class="form-actions">
        <?= \yii\helpers\Html::submitButton(Yii::t('app', 'Upload'), ['class' => 'btn btn-success']) ?>
        
    </div>
<?php kartik\form\ActiveForm::end(); ?>
</div><!-- form -->



<?php
app\widgets\MiniForm::end();
?>