<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'user-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));


$model->password = '';
?>
<div class="row">
    <div class="col-lg-4">	

        <?php echo $form->errorSummary($model); ?>

        <?php echo $form->textFieldRow($model, 'username', array('maxlength' => 100)); ?>

        <?php echo $form->textFieldRow($model, 'fname', array('maxlength' => 80)); ?>

        <?php echo $form->textFieldRow($model, 'lname', array('maxlength' => 80)); ?>

        <?php echo $form->passwordFieldRow($model, 'passwd', array( 'maxlength' => 41)); ?>

        <?php echo $form->textFieldRow($model, 'lastlogin' ); ?>

        <?php echo $form->textFieldRow($model, 'cookie', array('maxlength' => 32)); ?>

        <?php //echo $form->textFieldRow($model,'hash',array('maxlength'=>32));  ?>
        
        
        
        <?php echo $form->fileFieldRow($model, 'certfile', array('maxlength' => 255)); ?>
        
        <?php echo ($model->hasCert()? Yii::t('app',"Has certifcate file"):'')."<br>"; ?>
        
        <?php echo $form->textFieldRow($model, 'certpasswd', array( 'maxlength' => 255)); ?>

        <?php //echo $form->textFieldRow($model,'salt',array('maxlength'=>255));  ?>

        <?php echo $form->textFieldRow($model, 'email', array('maxlength' => 255)); ?>

      



    </div>	


    <div class="col-lg-4">

        <?php echo $form->dropDownListRow($model, 'language', CHtml::listData(Language::model()->findAll(), 'id', 'name')); ?>

        <?php echo $form->dropDownListRow($model, 'warehouse', CHtml::listData(Accounts::model()->AutoComplete('', 8), 'value', 'label')); ?>
        
        <?php echo $form->dropDownListRow($model, 'theme', Yii::app()->themeManager->themeNames); ?>
        
        <?php echo $form->dropDownListRow($model, 'timezone', Timezone::makeList()); ?>


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
                //$item=ItemVatCat::

                $i = 0;
                if (count($model->userIncomeMaps) != 0)
                //$docdetails=array(new UserIncomeMap);
                //print_r($model->userIncomeMaps);
                    foreach ($model->userIncomeMaps as $userIncomeMap) {
                        echo $this->renderPartial('userIncomeMap', array('model' => $userIncomeMap, 'form' => $form, 'i' => "{$i}"));
                        $i++;
                    }
                ?>
            </tbody>


        </table><!-- doc detiales -->
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