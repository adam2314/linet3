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



    <?php
    $col1=$col='';
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
                
            } elseif (strpos($model->eavType, "select(") === 0) {
                $list = str_replace("select(", "", $model->eavType);
                $list = CJSON::decode(str_replace(")", "", $list));
                foreach($list as &$item){
                    //print $item;
                    $item=Yii::t('app',$item);
                }
                //$temp = CHtml::listData(CJSON::decode($list), 'id', 'name');
                $temp[''] = Yii::t('app', 'None');
                $label= Yii::t('app', $model->id) . "</td>";
                $field=CHtml::dropDownList('Settings[' . $model->id . '][value]', $model->value, $list) ;
                
            } elseif ($model->eavType == 'file') {

             
                $label= Yii::t('app', $model->id) . "</td>";
                $field=
                    CHtml::fileField('Settings[' . $model->id . '][value]', $model->value) .
                    CHtml::hiddenField('Settings[' . $model->id . '][value]', $model->value) .
                    "<a href='javascript:del();'>".Yii::t('app','Delete')."</a><br />"   ;
            } elseif ($model->eavType == 'boolean') {

               $label= Yii::t('app', $model->id);
                
                $field=     CHtml::checkbox('Settings[' . $model->id . '][value]', $model->value) .
                    CHtml::hiddenField('Settings[' . $model->id . '][value]', $model->value);
            } else {
                $label= Yii::t('app', $model->id) ;
                $field= $form->textField($model, '[' . $model->id . ']value', array('maxlength' => 80));
                
            }
            if($print){
                $col.= "<label>$label</label>$field";
                $print=false;
            }else{
                $col1.= "<label>$label</label>$field";
                
                $print=true;
            }
        }
    }
    
    echo "<div class='row'><div class='col-md-6'>$col</div><div class='col-md-6'>$col1</div></div>"
    
    
    ?>  


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