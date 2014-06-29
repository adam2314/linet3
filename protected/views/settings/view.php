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
    $print =false;
    foreach ($models as $model) {
        if ($model->hidden == 0) {
            if (strpos($model->eavType, "list(") === 0) {
                $modelName = str_replace("list(", "", $model->eavType);
                $modelName = str_replace(")", "", $modelName);
                $temp = CHtml::listData($modelName::model()->findAll(), 'id', 'name');
                $temp[''] = Yii::t('app', 'None');
                $label= Yii::t('app', $model->id) . "</td>";
                $field=CHtml::dropDownList('Settings[' . $model->id . '][value]', $model->value, $temp) ;
                
            } elseif ($model->eavType == 'file') {

             
                $label= Yii::t('app', $model->id) . "</td>";
                $field=
                    CHtml::fileField('Settings[' . $model->id . '][value]', $model->value) .
                    CHtml::hiddenField('Settings[' . $model->id . '][value]', $model->value) .
                    "<a href='javascript:del();'>".Yii::t('app','Delete')."</a>"   ;
            } elseif ($model->eavType == 'boolean') {

               $label= Yii::t('app', $model->id);
                
                $field=     CHtml::checkbox('Settings[' . $model->id . '][value]', $model->value) .
                    CHtml::hiddenField('Settings[' . $model->id . '][value]', $model->value);
            } else {
                $label= Yii::t('app', $model->id) ;
                $field= $form->textField($model, '[' . $model->id . ']value', array('maxlength' => 80));
                
            }
            if($print){
                echo "<tr><td>$label1</td><td>$field1</td><td>$label</td><td>$field</td></tr>";
                $print=false;
            }else{
                $label1=$label;
                $field1=$field;
                $print=true;
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