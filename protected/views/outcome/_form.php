<div class="form">
    <div class="row">
        <div class="col-md-3">
            <?php
            use app\models\Accounts;
            use app\models\Currates;
            use kartik\select2\Select2;
            use kartik\datecontrol\DateControl;
            
            
            $form = kartik\form\ActiveForm::begin( array(
                'id' => 'outcome-form',
                'enableAjaxValidation' => true,
            ));
            ?>



            <?php echo $form->errorSummary($model); ?>




            <?php
            if ((int) $model->account_id != 0) {
                echo $form->field($model, 'account_id')->hiddenInput();
                echo "<h2>" . Accounts::findOne($model->account_id)->name . "</h2>";
            } else {
                echo $form->field($model, 'account_id')->widget(Select2::className(),['data'=> \yii\helpers\ArrayHelper::map(Accounts::find()->where(['type' => 1])->all(), 'id', 'name')]); //supplieres
            }
            ?>


            <?php echo $form->field($model, 'currency_id')->widget(Select2::className(),['data'=> \yii\helpers\ArrayHelper::map(Currates::GetRateList(), 'id', 'name')]); ?>

            <br />

            <?php echo $form->field($model, 'sum'); ?>
            <?php //echo $form->field($model, 'src_tax'); src tax is closed until we will support 854 report?>
            <?php echo $form->field($model, 'details'); ?>



            <?php //echo $form->field($model, 'refnum', array('size' => 5, 'maxlength' => 5)); ?>
            <div>
                <?= \app\widgets\Refnum::widget(['model' => $model, 'attribute' => 'refnum' ]); ?>
            </div>



            <?= $form->field($model,'date')->widget(DateControl::classname(), ['type' => 'date']);?>
            

            <?= $form->field($model, 'opp_account_id')->widget(Select2::className(),['data'=>  \yii\helpers\ArrayHelper::map(Accounts::find()->where(array('type' => 7))->all(), 'id', 'name')]); //7=banks ?>



            <div class="form-actions">
                <?= \yii\helpers\Html::submitButton(Yii::t('app', 'Create') , ['class' =>  'btn btn-success']) ?>
            </div>

            <?php kartik\form\ActiveForm::end(); ?>
            
            <?= \app\widgets\RefnumModal::widget(['model' => $model, 'attribute' => 'refnum' ]); ?>
        </div>
    </div>
</div><!-- form -->


<script type="text/javascript">
    function refNum(doc) {//

        $("#popover-FormOutcome_refnum").hide();

        

        $("#choseFormOutcome_refnum").trigger("close");

        $('#FormOutcome_refnum_div').html($('#FormOutcome_refnum_div').html() + ", " + doc.doctype + " #" + doc.docnum);
        $('#FormOutcome_refnum_ids').val($('#FormOutcome_refnum_ids').val() + doc.id + ",");



        return false;


    }

    /*
     
     //src tax is closed until we will support 854 report
     $("#FormOutcome_sum").change(function() {
     var sum = $('#FormOutcome_sum').val();
     $.get("<?php echo yii\helpers\BaseUrl::base().('/'); ?>/index.php", {"r": "/accounts/JSON", "id": $("#FormOutcome_account_id").val()},
     function(data) {
     var src_tax=sum*(data.src_tax/100);
     $("#FormOutcome_sum").val(sum-src_tax);
     $("#FormOutcome_src_tax").val(src_tax);
     
     }, "json")
     .error(function() {
     });
     });*/
</script>