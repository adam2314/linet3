<div class="form">

    <?php

    use yii\helpers\ArrayHelper;
    use kartik\select2\Select2;

$form = kartik\form\ActiveForm::begin(array(
                'id' => 'accounts-form'.$model->type,
                    //'enableAjaxValidation' => true,
                    'options' => array('enctype' => 'multipart/form-data'),
    ));
    $id6111 = ArrayHelper::map(\app\models\AccId6111::find()->All(), 'id', 'name');
    $id6111[0] = Yii::t('app', 'None');

    $currncies = ArrayHelper::map(\app\models\Currates::GetRateList(), 'currency_id', 'name');
    $accounts = ArrayHelper::map(\app\models\Accounts::find()->all(), 'id', 'name');
    $accounts[0] = Yii::t('app', 'None');
    $acccat = ArrayHelper::map(\app\models\AccCat::find()->where(["type_id" => $model->type])->all(), 'id', 'name');
    ?>

    <?= $form->errorSummary($model); ?>
    <?= $form->field($model, 'type', ['template' => '{input}'])->hiddenInput(); ?>
    <div class="col-md-4 col-sm-6">
        <?php app\widgets\TbPanel::begin(array('header' => Yii::t('app', "Account General Details"),)); ?>
        <?= $form->field($model, 'name'); ?>
        <?= $form->field($model, 'cat_id')->dropDownList($acccat); ?>      
        <?= $form->field($model, 'src_tax'); ?>
        <?= $form->field($model, 'currency_id')->dropDownList($currncies); ?>      

        <?= $form->field($model, 'vatnum'); ?>
        <?= $form->field($model, 'pay_terms'); ?>
        <?= $form->field($model,'src_date')->widget(kartik\datecontrol\DateControl::classname(), ['type' => 'date']);?>
        <?= $form->field($model, 'id6111')->dropDownList($id6111); ?>    

        <?php 
        if($model->type==10){//contacts
           echo $form->field($model, 'parent_account_id')->widget(Select2::classname(), ['data' => $accounts]);  
        }
        
        
        ?>

        <?php app\widgets\TbPanel::end(); ?>

    </div>
    <div class="col-md-4 col-sm-6">
        <?php app\widgets\TbPanel::begin(array('header' => Yii::t('app', "Contact Person Details"),)); ?>
        <?= $form->field($model, 'contact'); ?>
        <?= $form->field($model, 'email'); ?>
        <?= $form->field($model, 'cellular'); ?>


        <?= $form->field($model, 'dir_phone'); ?>
        <?= $form->field($model, 'department'); ?>




        <?php app\widgets\TbPanel::end(); ?>

        <?php app\widgets\TbPanel::begin(array('header' => Yii::t('app', "Address & Website"),)); ?>
        <?= $form->field($model, 'address'); ?>

        <?= $form->field($model, 'web'); ?>
        <?= $form->field($model, 'fax'); ?>

        <?= $form->field($model, 'city'); ?>
        <?= $form->field($model, 'zip'); ?>
        <?= $form->field($model, 'phone'); ?>
        <?php app\widgets\TbPanel::end(); ?>




    </div>


    <div class="col-md-4 col-sm-6">
        <div>

            <?php
            if (!$model->isNewRecord) {
                ///*
                if (Yii::$app->hasModule('cp'))
                    echo adam2314\cp\components\widgetCpUser::widget([
                        'model' => $model, //Model object
                    ]);
                    
//*/

                app\widgets\TbPanel::begin(array('header' => Yii::t('app', "EAV Fields"),));
                ///*
            echo app\widgets\eavProp::Widget(array(
                'name' => get_class($model),
                'model'=>$model,
                'attr' => $model->getEavAttributes(),
                
            ));//*/

                
                app\widgets\TbPanel::end();
                  //*/

            }
            ?>
        </div>




        <?php
        if (!$model->isNewRecord) {
            app\widgets\TbPanel::begin(array('header' => Yii::t('app', "Attached files"),));
            echo \app\widgets\AttachedFiles::widget(['model'=>$model,'attribute'=>'Files']);
            app\widgets\TbPanel::end();
        }
        ?>
        <?php
        ?>
        <?php app\widgets\TbPanel::begin(array('header' => Yii::t('app', "Remarks"),)); ?>
        <?= $form->field($model, 'comments')->textArea(); ?>
        <?php app\widgets\TbPanel::end(); ?>
    </div>

    <?php //echo $form->labelEx($model,'owner');      ?>
    <?php //adam: echo $form->dropDownList($model,'owner',\yii\helpers\ArrayHelper::map(User::find()->All(), 'id', 'username'));   ?>
    <?php //echo $form->error($model,'owner');  ?>




    <div class="row form-actions">
        <?= \yii\helpers\Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => 'btn btn-success']) ?>

    </div>

    <?php kartik\form\ActiveForm::end(); ?>

</div><!-- form -->