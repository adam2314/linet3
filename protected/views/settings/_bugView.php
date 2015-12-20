<div class="view">

	<b><?php echo \yii\helpers\Html::encode($model->getAttributeLabel('title')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($model->title); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($model->getAttributeLabel('body')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($model->body); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($model->getAttributeLabel('url')); ?>:</b>
        <?php echo \yii\helpers\Html::a(\yii\helpers\Html::encode($model->url), $model->url); ?>
	<?php //echo \yii\helpers\Html::encode($data->url); ?>
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