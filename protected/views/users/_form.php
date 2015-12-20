<?php
use kartik\select2\Select2;
$form = kartik\form\ActiveForm::begin( array(
    'id' => 'user-form',
    'enableAjaxValidation' => false,
    //'options' => array('enctype' => 'multipart/form-data'),
        ));


$model->password = '';
?>
<div class="row">
    <?= $form->errorSummary($model); ?>
    <div class="col-md-4 col-sm-6">


        <?php app\widgets\TbPanel::begin( array('header' => Yii::t('app', "User General Details"),)); ?>
        <?= $form->field($model, 'username'); ?>

        <?= $form->field($model, 'fname'); ?>

        <?= $form->field($model, 'lname'); ?>

        <?= $form->field($model, 'passwd'); ?>

        <?= $form->field($model, 'email'); ?>

        <?php //echo $form->field($model, 'lastlogin' ); ?>

        <?php //echo $form->field($model, 'cookie', array('maxlength' => 32)); ?>

        <?php //echo $form->field($model,'hash',array('maxlength'=>32));  ?>
        <?php app\widgets\TbPanel::end(); ?>




        <?php //echo $form->field($model,'salt',array('maxlength'=>255));  ?>

    </div>	


    <div class="col-md-4 col-sm-6">
        <?php 
        $theme=array();
        //foreach(Yii::$app->themeManager->themeNames as $key=>$value)
        //    $theme[$value]=$value;
            ?>
        <?php app\widgets\TbPanel::begin( array('header' => Yii::t('app', "User Workspace"),)); ?>
        <?= $form->field($model, 'theme')->widget(Select2::classname(), ['data' =>  $theme]); ?>
        <?= $form->field($model, 'timezone')->widget(Select2::classname(), ['data' =>  app\models\Timezone::makeList()]); ?>
        <?= $form->field($model, 'language')->widget(Select2::classname(), ['data' =>  \yii\helpers\ArrayHelper::map(app\models\Language::find()->All(), 'id', 'name')]); ?>
        <?= $form->field($model, 'certfile')->fileInput(); ?>
        <?= ($model->hasCert() ? Yii::t('app', "Has certifcate file") : '') . "<br>"; ?>
        <?= $form->field($model, 'certpasswd'); ?>
        <?php app\widgets\TbPanel::end(); ?>
    </div>     
    <div class="col-md-4 col-sm-6">
        <?php app\widgets\TbPanel::begin( array('header' => Yii::t('app', "User Warehouse and VAT Configuration"),)); ?>
        <?= $form->field($model, 'warehouse')->widget(Select2::classname(), ['data' => \yii\helpers\ArrayHelper::map(app\models\Accounts::findAllByType(8), 'id', 'name')]); ?>
        <table  data-role="table" class="table" ><!-- docdetalies -->
            <thead>
                <tr  class="head1">
                    <th><label><?= Yii::t('app', "Item VAT Cat");?></label></th>
                    <th><label><?= Yii::t('app', "Account ID");?></label></th>
                </tr>
            </thead>	
            <tfoot>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
            </tfoot>	
            <tbody class="templateTarget">

                <?php
                $i = 0;
                if (count($model->userIncomeMaps) != 0)
                    foreach ($model->userIncomeMaps as $userIncomeMap) {
                        echo $this->render('userIncomeMap', array('model' => $userIncomeMap, 'form' => $form, 'i' => "{$i}"));
                        $i++;
                    }
                ?>
            </tbody>


        </table>
        <?php app\widgets\TbPanel::end(); ?>
    </div>    



</div> 
<div class="form-actions">
    <?= \yii\helpers\Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => 'btn btn-success']) ?>
</div>
<?php kartik\form\ActiveForm::end(); ?>