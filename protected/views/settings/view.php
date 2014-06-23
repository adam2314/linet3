<?php
$this->beginWidget('MiniForm', array('haeder' => Yii::t("app", "Update Configuration")));
?>
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'user-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
?>


<table>
    <?php
    foreach ($models as $model) {
        if ($model->hidden == 0) {
            if (strpos($model->eavType, "list(") === 0) {
                $modelName = str_replace("list(", "", $model->eavType);
                $modelName = str_replace(")", "", $modelName);
                $temp = CHtml::listData($modelName::model()->findAll(), 'id', 'name');
                $temp[''] = Yii::t('app', 'None');
                echo "<tr>";
                echo "<td>" . Yii::t('app', $model->id) . "</td>";
                echo "<td>" .
                    CHtml::dropDownList('Settings[' . $model->id . '][value]', $model->value, $temp) .
                    "</td>";
                echo "</tr>";
            } elseif ($model->eavType == 'file') {

                echo "<tr>";
                echo "<td>" . Yii::t('app', $model->id) . "</td>";
                echo "<td>" .
                    CHtml::fileField('Settings[' . $model->id . '][value]', $model->value) .
                    CHtml::hiddenField('Settings[' . $model->id . '][value]', $model->value) .
                    "<a href='javascript:del();'>".Yii::t('app','Delete')."</a>"
                    . "</td>";
                echo "</tr>";
            } elseif ($model->eavType == 'boolean') {

                echo "<tr>";
                echo "<td>" . Yii::t('app', $model->id) . "</td>";
                echo "<td>" .
                    CHtml::checkbox('Settings[' . $model->id . '][value]', $model->value) .
                    CHtml::hiddenField('Settings[' . $model->id . '][value]', $model->value) .
                    "</td>";
                echo "</tr>";
            } else {
                //echo $form->errorSummary($model); 
                echo "<tr>";
                echo "<td>" . Yii::t('app', $model->id) . "</td>";

                echo "<td>" . $form->textField($model, '[' . $model->id . ']value', array('size' => 30, 'maxlength' => 80)) . "</td>";
                echo "</tr>";
            }
        }
    }
    ?>  

</table>
    <?php echo CHtml::submitButton(Yii::t('app', "Save")); ?>    
    <?php $this->endWidget(); ?>



<?php
$this->endWidget();
?>

<script type="text/javascript">

function del(){
    $("input[id='Settings_company.logo_value']").attr('value','');
}

</script>