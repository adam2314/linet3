<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

use app\widgets\TbPanel;
use app\models\Item;
use app\models\Files;
use app\models\Itemcategory;
use app\models\Itemunit;
use app\models\ItemVatCat;
use app\models\Currates;

?>

<div class="form">
    <?php $form = kartik\form\ActiveForm::begin([
        'id' => 'item-form',
        'options' => array('enctype' => 'multipart/form-data'),
        ]); ?>
    
    
     <?php
            $temp = ArrayHelper::map(Item::find()->asArray()->all(), 'id', 'name');
            $temp[0] = Yii::t('app', 'None');
            
            
            $cat = ArrayHelper::map(Itemcategory::find()->asArray()->all(), 'id', 'name');
            $units = ArrayHelper::map(Itemunit::find()->asArray()->all(), 'id', 'name');
            
            
            ?>
    <div class="row">
        <?= $form->errorSummary($model); ?>
    </div>
    <div class="row">
        <div class="col-md-4 col-sm-6">
            <?php TbPanel::begin(array('header' => Yii::t('app', "Item General Details"),)); ?>
                <?= $form->field($model, 'name'); ?>
                <?= $form->field($model, 'sku'); ?>
                <?= $form->field($model, 'category_id')->dropDownList($cat); ?>
                <?= $form->field($model, 'description')->textArea(); ?>
                <br />
                <?= $form->field($model, 'parent_item_id')->dropDownList($temp); ?>
                <?= $form->field($model, 'pic')->fileInput(); ?>
            <?php TbPanel::end(); ?>
            <?php TbPanel::begin(array('header' => Yii::t('app', "Inventory Details"),)); ?>
                <?= $form->field($model, 'unit_id')->dropDownList($units); ?>
                <?= $form->field($model, 'stockType')->dropDownList(ArrayHelper::map($model->getStocks(), 'id', 'name')); ?>

                
                <?php echo $form->field($model, 'isProduct')->checkbox(); ?>	
            <?php TbPanel::end(); ?>
            
            
          </div>
        <div class="col-md-4 col-sm-6">   
  
            
            <?php TbPanel::begin(array('header' => Yii::t('app', "Item Financial Details"),)); ?>
                <?php echo $form->field($model, 'purchaseprice'); ?>
                <?php echo $form->field($model, 'profit'); ?>
                <?php echo $form->field($model, 'itemVatCat_id')->dropDownList(ArrayHelper::map(ItemVatCat::find()->asArray()->all(), 'id', 'name')); ?>
            
                <?php echo $form->field($model, 'saleprice'); ?>	
                <?php echo $form->field($model, 'currency_id')->dropDownList(ArrayHelper::map(Currates::GetRateList(), 'currency_id', 'name')); ?>
            <?php TbPanel::end(); ?>
            
        </div>
        <div class="col-md-4 col-sm-6">
            <?php
            TbPanel::begin(array('header' => Yii::t('app', "EAV Fields"),));
            ///*
            echo app\widgets\eavProp::Widget(array(
                'model'=>$model,
                'name' => get_class($model),
                'attr' => $model->getEavAttributes(),
            ));//*/

            TbPanel::end();
            ?>
            <?php
            
            ?>
            <?php
            if (!$model->isNewRecord) {
                TbPanel::begin(array('header' => Yii::t('app', "Attached files"),));
                echo \app\widgets\AttachedFiles::widget(['model'=>$model,'attribute'=>'Files']);
                TbPanel::end();
            }
            ?>


        </div>
    </div>
    <?php //echo $form->labelEx($model,'owner'); ?>
    <?php //echo $form->dropDownList($model,'owner',\yii\helpers\ArrayHelper::map(User::find()->All(), 'id', 'username')); ?>
    <?php //echo $form->error($model,'owner');  ?>


    <div class="form-actions">
        <?= \yii\helpers\Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => 'btn btn-success']) ?>

    </div>

     <?php kartik\form\ActiveForm::end(); ?>

</div><!-- form -->

<script type="text/javascript">
   
</script>