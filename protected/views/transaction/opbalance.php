<?php
$this->params["menu"]= array(
        //array('label'=>'List Config','url'=>array('index')),
        //array('label'=>'View Config','url'=>array('view','id'=>$model->id)),
);
app\widgets\MiniForm::begin( array('header' => Yii::t("app", "Create Open Balance")));
?>
<?php
$form = kartik\form\ActiveForm::begin( array(
    'id' => 'balance-form',
    'enableAjaxValidation' => false,
        ));
?>




<div class="input-group">
    <span class="input-group-addon"><?php echo Yii::t('app', "Select year"); ?></span>


    <?php
    $year = date("Y");
    $max = $year + 1;
    $years = array();

    for ($min = $year - 2; $min <= $max; $min++)
        $years[$min] = $min;


    echo \yii\helpers\Html::dropDownList('year', $year, $years,array("style"=>'width:200px;'));
    ?>
</div>    

<table class='formy'>
    <tr>

        <th><?php echo Yii::t('app', "Account"); ?></th>

        <th><?php echo Yii::t('app', "Acct. balance"); ?></th>
    </tr>

    <?php
    $temp = \yii\helpers\ArrayHelper::map(\app\models\Accounts::find()->All(), 'id', 'name');
    $temp[0] = Yii::t('app', 'Chose Account');

    for ($i = 0; $i < 10; $i++) {
        echo "<tr>\n<td>\n";
        echo \yii\helpers\Html::dropDownList('account[]', 0, $temp);
        echo "</td><td>\n";
        echo "<input type=\"text\" class=\"bal\" name=\"bal[]\" dir=\"ltr\" />\n";
        echo "</td>\n</tr>\n";
    }
    ?>

</table>




<div class="form-actions">
    <?= \yii\helpers\Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => 'btn btn-success']) ?>
</div>
<?php kartik\form\ActiveForm::end(); ?>



<?php
app\widgets\MiniForm::end();
?>

