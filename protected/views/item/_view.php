<div class="view">

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo \yii\helpers\Html::link(\yii\helpers\Html::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->name); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('category_id')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->category_id); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('parent_item_id')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->parent_item_id); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('isProduct')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->isProduct); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('profit')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->profit); ?>
	<br />

	<?php /*
         
        <b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('account_id')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->account_id); ?>
	<br />
         
	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('unit_id')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->unit_id); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('purchaseprice')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->purchaseprice); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('saleprice')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->saleprice); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('currency_id')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->currency_id); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('pic')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->pic); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('owner')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->owner); ?>
	<br />

	*/ ?>

</div>