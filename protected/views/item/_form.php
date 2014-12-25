<div class="form">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'item-form',
        'enableAjaxValidation' => true,
    ));
    ?>
    
     <?php
            $temp = CHtml::listData(Item::model()->findAll(), 'id', 'name');
            $temp[0] = Yii::t('app', 'None');
            ?>
    <div class="row">
        <?php echo $form->errorSummary($model); ?>
    </div>
    <div class="row">
        <div class="col-md-4 col-sm-6">
            <?php $this->beginWidget('TbPanel', array('header' => Yii::t('app', "Item General Details"),)); ?>
                <?php echo $form->textFieldRow($model, 'name', array('maxlength' => 100)); ?>
                <?php echo $form->textFieldRow($model, 'sku', array('maxlength' => 255)); ?>
                <?php echo $form->dropDownListRow($model, 'category_id', $cat); ?>
                <?php echo $form->textAreaRow($model, 'description'); ?>
                <br />
                <?php echo $form->dropDownListRow($model, 'parent_item_id', $temp); ?>
                <?php echo $form->fileFieldRow($model, 'pic', array('size' => 60, 'maxlength' => 255)); ?>
            <?php $this->endWidget(); ?>
            <?php $this->beginWidget('TbPanel', array('header' => Yii::t('app', "Inventory Details"),)); ?>
                <?php echo $form->dropDownListRow($model, 'unit_id', $units); ?>
                <?php echo $form->dropDownListRow($model, 'stockType', CHtml::listData($model->getStocks(), 'id', 'name')); ?>
                
                <?php echo $form->checkboxRow($model, 'isProduct', $temp); ?>	
            <?php $this->endWidget(); ?>
            
            
          </div>
        <div class="col-md-4 col-sm-6">   
  
            
            <?php $this->beginWidget('TbPanel', array('header' => Yii::t('app', "Item Financial Details"),)); ?>
                <?php echo $form->textFieldRow($model, 'purchaseprice', array( 'maxlength' => 8)); ?>
                <?php echo $form->textFieldRow($model, 'profit'); ?>
                <?php echo $form->dropDownListRow($model, 'itemVatCat_id', CHtml::listData(ItemVatCat::model()->findAll(), 'id', 'name')); ?>
            
                <?php echo $form->textFieldRow($model, 'saleprice', array( 'maxlength' => 8)); ?>	
                <?php echo $form->dropDownListRow($model, 'currency_id', CHtml::listData(Currates::model()->GetRateList(), 'currency_id', 'name')); ?>
            <?php $this->endWidget(); ?>
            
        </div>
        <div class="col-md-4 col-sm-6">
            <?php
            $this->beginWidget('TbPanel', array('header' => Yii::t('app', "EAV Fields"),));
            $this->Widget('application.modules.eav.components.eavProp', array(
                'name' => get_class($model),
                'attr' => $model->getEavAttributes(),
            ));

            $this->endWidget();
            ?>
            <?php
            
            ?>
            <?php
            if (!$model->isNewRecord) {
                $this->beginWidget('TbPanel', array('header' => Yii::t('app', "Attached files"),));
                
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
                    'id' => 'itm-file-grid',
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
                $this->endWidget();
            }
            ?>


        </div>
    </div>
    <?php //echo $form->labelEx($model,'owner'); ?>
    <?php //echo $form->dropDownList($model,'owner',CHtml::listData(User::model()->findAll(), 'id', 'username')); ?>
    <?php //echo $form->error($model,'owner');  ?>


    <div class="form-actions">
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