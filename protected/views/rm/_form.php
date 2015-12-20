<?php
use app\models\Accounts;
use kartik\select2\Select2;
use kartik\datecontrol\DateControl;
$form = kartik\form\ActiveForm::begin( array(
    'id' => 'acchist-form',
    'enableAjaxValidation' => false,
        ));
?>

<?php echo $form->errorSummary($model); ?>

<?php
$temp = \yii\helpers\ArrayHelper::map(Accounts::find()->All(), 'id', 'name');
$temp[0] = Yii::t('app', 'Chose Account');


$status=\yii\helpers\ArrayHelper::map($model->getStatuses(), 'id', 'name');
        $type=\yii\helpers\ArrayHelper::map($model->getTypes(), 'id', 'name');
?>
<?php echo $form->field($model, 'account_id')->widget(Select2::className(),['data'=>$temp]); ?>	
<?php echo $form->field($model, 'status')->widget(Select2::className(),['data'=>$status]); ?>	
<?php echo $form->field($model, 'type')->widget(Select2::className(),['data'=>$type]); ?>	
<?php echo $form->field($model, 'subject'); ?>	
<div class="row">
    <div class="col-md-2">
        <?= $form->field($model,'dt')->widget(DateControl::classname(), ['type' => 'date']);?>
        
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $form->field($model, 'details')->textarea(); ?>
        
    </div>
</div>
<div class="form-actions">
    <?= \yii\helpers\Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => 'btn btn-success']) ?>
</div>

<?php kartik\form\ActiveForm::end(); ?>
