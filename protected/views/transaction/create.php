<?php
use kartik\select2\Select2;
use app\models\Currates;
use app\models\Accounts;
use kartik\datecontrol\DateControl;
$this->params["menu"]= array(
        //array('label'=>'List Config','url'=>array('index')),
        //array('label'=>'View Config','url'=>array('view','id'=>$model->id)),
);
app\widgets\MiniForm::begin( array('header' => Yii::t("app", "Create Manual Transaction")));
?>
<?php
$form = kartik\form\ActiveForm::begin( array(
    'id' => 'transaction-form',
    'enableAjaxValidation' => true,
        ));
?>

<div class="row">
<div class="col-md-3">
    <?= app\widgets\Refnum::widget(['model' => $model, 'attribute' => 'refnum1', ]); ?>
    <?= $form->field($model, 'refnum2'); ?>
    
    
    
    
</div>

<div class="col-md-3">   
    <?= $form->field($model, 'details'); ?>
    <?= $form->field($model,'valuedate')->widget(DateControl::classname(), ['type' => 'date']);?>
    <?php //echo $form->labelEx($model, 'refnum1'); ?>
    <?php //echo $form->textField($model, 'refnum1'); ?>
    <?php //echo $form->error($model, 'refnum1'); ?>

    <?php //echo $form->labelEx($model, 'refnum2'); ?>
    
    <?php //echo $form->error($model, 'refnum2'); ?>

    <?php //echo $form->labelEx($model, 'currency_id'); ?>
    <?= $form->field($model, 'currency_id')->widget(Select2::className(),['data'=> \yii\helpers\ArrayHelper::map(Currates::GetRateList(), 'currency_id', 'name')]);  ?>
    <?php //echo $form->error($model, 'currency_id'); ?>
</div>
    </div>
<div class="row">
    <div class="col-md-12">   
        <table class="formy">
            <tbody>
                <tr>
                    <th class="header"><?= Yii::t('app', "Account") ?></th>
                    <th class="header"><?= Yii::t('app', "Oppt Account") ?></th>
                </tr>
                <tr>
                    <td style="vertical-align: top;">
                        <table>
                            <thead>
                                <tr>
                                    <td><?= Yii::t('app', 'Account id'); ?></td>
                                    <td style=""><?php //echo Yii::t('app', 'Account Name'); ?></td>
                                    <td><?= Yii::t('app', 'Credit'); ?></td>
                                    <td><?= Yii::t('app', 'Debit'); ?></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <?= $form->field($model, 'account_id',['template'=>'{input}'])->widget(Select2::className(), ['data'=> \yii\helpers\ArrayHelper::map(Accounts::find()->All(), 'id', 'name')]); ?>
                                    </td>
                                    <td>
                                        <span id="nameTransactions_account_id"></span>
                                    </td>
                                    
                                    <td>
                                        <input size="6" id="sourcepos" type="text" class="number" name="FormTransaction[sourcepos]" onchange="CalcSum()" value="0">
                                    </td>
                                    <td>
                                        <input size="6" id="sourceneg" type="text" class="number" name="FormTransaction[sourceneg]" onchange="CalcSum()" value="0">
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </td>
                    <td>
                        <table>
                            <thead>
                                <tr>
                                    <td><?= Yii::t('app', 'Account id'); ?></td>
                                    <td><?= Yii::t('app', 'Value Date'); ?></td>
                                    <td><?= Yii::t('app', 'Credit'); ?></td>
                                    <td><?= Yii::t('app', 'Debit'); ?></td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td><?= Yii::t('app', 'balance'); ?></td>
                                    <td>
                                        <input size="5" id="balance" type="text" value="0" readonly="">
                                    </td>
                                    <td></td>

                                </tr>
                            </tfoot>
                            <tbody id="det">

                            </tbody>

                        </table>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php
$this->registerJs("var baseAddress='" . yii\helpers\BaseUrl::base() . "';".
                "var accountSelect='" . str_replace("\n","",$form->field($model, 'ops',['template'=>'{input}'])->dropDownList(\yii\helpers\ArrayHelper::map(Accounts::find()->All(), 'id', 'name'))) . "';".
                "var msg='".Yii::t('app','sum is not 0')."';"     
        , \yii\web\View::POS_HEAD);


$this->registerJsFile(yii\helpers\BaseUrl::base() . '/assets/transaction.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

?>


<div class="form-actions">
    <?= \yii\helpers\Html::submitButton( Yii::t('app', 'Save'), ['class' =>  'btn btn-success']) ?>
</div>

<?php kartik\form\ActiveForm::end(); ?>

<?= \app\widgets\RefnumModal::widget(['model' => $model, 'attribute' => 'refnum1' ]); ?>

<?php app\widgets\MiniForm::end();?>