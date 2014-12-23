<div class="form">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'accounts-form',
        'enableAjaxValidation' => true,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>

    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->hiddenField($model, 'type'); ?>
    <div class="col-md-4">
        <?php echo $form->textFieldRow($model, 'name', array('class' => 'span5', 'maxlength' => 200)); ?>
        <?php //echo $form->dropDownListRow($model, 'type', CHtml::listData(Acctype::model()->findAll(), 'id', 'name')); ?>
        <br />
        <?php echo $form->dropDownListRow($model, 'currency_id', CHtml::listData(Currates::model()->GetRateList(), 'currency_id', 'name')); //currency ?>
        <br />
        <?php
        $id6111 = CHtml::listData(AccId6111::model()->findAll(), 'id', 'name');
        $id6111[''] = Yii::t('app', 'None');

        echo $form->dropDownListRow($model, 'id6111', $id6111);
        ?>
        <br />
        <?php echo $form->dropDownListRow($model, 'cat_id', CHtml::listData(AccCat::model()->findAllByAttributes(array("type_id" => $model->type)), 'id', 'name')); ?>

        <?php echo $form->textFieldRow($model, 'pay_terms', array('class' => 'span5', 'maxlength' => 40)); ?>

         <?php $this->beginWidget('TbPanel', array('header' => Yii::t('app', "Vat Info"),)); ?>
                <?php echo $form->textFieldRow($model, 'src_tax', array('class' => 'span5', 'maxlength' => 40)); ?>

                <?php echo $form->labelEx($model, 'src_date'); ?>

                <?php
                $this->widget('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker', array(
                    'model' => $model, //Model object
                    'attribute' => 'src_date', //attribute name
                    'mode' => 'date',
                    'language' => substr(Yii::app()->language, 0, 2),
                    'options' => array(
                        'showAnim' => 'fold',
                        'dateFormat' => Yii::app()->locale->getDateFormat('short'),
                    ) // jquery plugin options
                ));
                ?>


                <?php echo $form->error($model, 'src_date'); ?>
                <?php echo $form->textFieldRow($model, 'vatnum', array('class' => 'span5', 'maxlength' => 20)); ?>
        <?php $this->endWidget(); ?>
        <?php //echo $form->textFieldRow($model, 'src_tax', array('class' => 'span5', 'maxlength' => 80));  ?>


    </div>
    <div class="col-md-4">
        <?php $this->beginWidget('TbPanel', array('header' => Yii::t('app', "Contact Info"),)); ?>
            <?php echo $form->textFieldRow($model, 'email', array('class' => 'span5', 'maxlength' => 50)); ?>
            <?php echo $form->textFieldRow($model, 'phone', array('class' => 'span5', 'maxlength' => 20)); ?>
            <?php echo $form->textFieldRow($model, 'dir_phone', array('class' => 'span5', 'maxlength' => 20)); ?>


            <?php echo $form->textFieldRow($model, 'cellular', array('maxlength' => 20)); ?>
            <?php echo $form->textFieldRow($model, 'fax', array('maxlength' => 20)); ?>
            <?php echo $form->textFieldRow($model, 'web', array('maxlength' => 60)); ?>
            <?php echo $form->textFieldRow($model, 'contact', array('maxlength' => 80)); ?>
            <?php echo $form->textFieldRow($model, 'department', array('maxlength' => 60)); ?>
        <?php $this->endWidget(); ?>
        
        <?php $this->beginWidget('TbPanel', array('header' => Yii::t('app', "Address Info"),)); ?>
            <?php echo $form->textFieldRow($model, 'address', array( 'maxlength' => 80)); ?>
            <?php echo $form->textFieldRow($model, 'city', array( 'maxlength' => 40)); ?>
            <?php echo $form->textFieldRow($model, 'zip', array( 'maxlength' => 10)); ?>
         <?php $this->endWidget(); ?>



        <?php echo $form->textAreaRow($model, 'comments', array('rows' => 6, 'cols' => 50)); ?>
    </div>


    <div class="col-md-4">
        <div>

            <?php
            if (Yii::app()->hasModule('cp'))
                $this->widget('application.modules.cp.components.widgetCpUser', array(
                    'model' => $model, //Model object
                ));

            if (!$model->isNewRecord) {
                $this->beginWidget('application.modules.eav.components.eavProp', array(
                    'name' => get_class($model),
                    'attr' => $model->getEavAttributes(),
                ));

                $this->endWidget();
            }
            ?>
        </div>




        <?php
        if (!$model->isNewRecord) {
            echo "<h2>" . Yii::t('app', 'Attached files') . "</h2>";

            $this->widget('CMultiFileUpload', array(
                'name' => 'Files',
                'model' => $model,
                'id' => 'Files',
                'accept' => '*', // useful for verifying files
                'duplicate' => 'Duplicate file!', // useful, i think
                'denied' => 'Invalid file type', // useful, i think
            ));

            $files = new Files('search');
            $files->unsetAttributes();
            $files->parent_type = get_class($model);
            $files->parent_id = $model->id;
            $this->widget('EExcelView', array(
                'id' => 'acc-template-grid',
                'dataProvider' => $files->search(),
                //'filter'=>$model,
                'template' => '{items}{pager}',
                'ajaxUpdate' => true,
                'columns' => array(
                    array(
                        'name' => 'name',
                        'type' => 'raw',
                        'value' => 'CHtml::link(CHtml::encode($data->name), Yii::app()->createUrl("download/".$data->id))',
                    ),
                    array(
                        'name' => 'date',
                        'value' => 'date("' . Yii::app()->locale->getDateFormat('phpdatetime') . '",CDateTimeParser::parse($data->date,"' . Yii::app()->locale->getDateFormat('yiidbdatetime') . '"))'
                    ),
                    array(
                        'class' => 'CButtonColumn',
                        'template' => '{delete}',
                        'buttons' => array(
                            'delete' => array(
                                'label' => '<i class="glyphicon glyphicon-trash"></i>',
                                'deleteConfirmation' => true,
                                'imageUrl' => false,
                                'url' => 'Yii::app()->createUrl("files/delete", array("id"=>$data->id))',
                            ),
                        ),
                    ),
                ),
            ));
        }
        ?>
        <?php
        ?>
    </div>

    <?php //echo $form->labelEx($model,'owner');     ?>
    <?php //adam: echo $form->dropDownList($model,'owner',CHtml::listData(User::model()->findAll(), 'id', 'username'));   ?>
    <?php //echo $form->error($model,'owner');  ?>




    <div class="row form-actions">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type' => 'primary',
            'label' => $model->isNewRecord ? Yii::t('app', "Create") : Yii::t('app', "Save"),
        ));
        ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->