<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'user-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));


$model->password = '';
?>
<div class="row">
    <?php echo $form->errorSummary($model); ?>
    <div class="col-md-4 col-sm-6">


        <?php $this->beginWidget('TbPanel', array('header' => Yii::t('app', "User General Details"),)); ?>
        <?php echo $form->textFieldRow($model, 'username', array('maxlength' => 100)); ?>

        <?php echo $form->textFieldRow($model, 'fname', array('maxlength' => 80)); ?>

        <?php echo $form->textFieldRow($model, 'lname', array('maxlength' => 80)); ?>

        <?php echo $form->passwordFieldRow($model, 'passwd', array('maxlength' => 41)); ?>

        <?php echo $form->textFieldRow($model, 'email', array('maxlength' => 255)); ?>

        <?php //echo $form->textFieldRow($model, 'lastlogin' ); ?>

        <?php //echo $form->textFieldRow($model, 'cookie', array('maxlength' => 32)); ?>

        <?php //echo $form->textFieldRow($model,'hash',array('maxlength'=>32));  ?>
        <?php $this->endWidget(); ?>




        <?php //echo $form->textFieldRow($model,'salt',array('maxlength'=>255));  ?>

    </div>	


    <div class="col-md-4 col-sm-6">
        <?php 
        $theme=array();
        foreach(Yii::app()->themeManager->themeNames as $key=>$value)
            $theme[$value]=$value;
            ?>
        <?php $this->beginWidget('TbPanel', array('header' => Yii::t('app', "User Workspace"),)); ?>
        <?php echo $form->dropDownListRow($model, 'theme', $theme); ?>
        <?php echo $form->dropDownListRow($model, 'timezone', Timezone::makeList()); ?>
        <?php echo $form->dropDownListRow($model, 'language', CHtml::listData(Language::model()->findAll(), 'id', 'name')); ?>
        <?php echo $form->fileFieldRow($model, 'certfile', array('maxlength' => 255)); ?>
        <?php echo ($model->hasCert() ? Yii::t('app', "Has certifcate file") : '') . "<br>"; ?>
        <?php echo $form->textFieldRow($model, 'certpasswd', array('maxlength' => 255)); ?>
        <?php $this->endWidget(); ?>
    </div>     
    <div class="col-md-4 col-sm-6">
        <?php $this->beginWidget('TbPanel', array('header' => Yii::t('app', "User Warehouse and VAT Configuration"),)); ?>
        <?php echo $form->dropDownListRow($model, 'warehouse', CHtml::listData(Accounts::model()->AutoComplete('', 8), 'value', 'label')); ?>
        <table  data-role="table" class="table" ><!-- docdetalies -->
            <thead>
                <tr  class="head1">
                    <th><?php echo $form->labelEx($model, 'ItemVatCat'); ?></th>
                    <th><?php echo $form->labelEx($model, 'account_id'); ?></th>
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
                        echo $this->renderPartial('userIncomeMap', array('model' => $userIncomeMap, 'form' => $form, 'i' => "{$i}"));
                        $i++;
                    }
                ?>
            </tbody>


        </table>
        <?php $this->endWidget(); ?>
    </div>    



</div> 
<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>
</div>
<?php $this->endWidget(); ?>