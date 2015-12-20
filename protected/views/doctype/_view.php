<div class="view">

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo \yii\helpers\Html::link(\yii\helpers\Html::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->name); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('openformat')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->openformat); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('isdoc')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->isdoc); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('isrecipet')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->isrecipet); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('iscontract')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->iscontract); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('stockAction')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->stockAction); ?>
	<br />

	<?php /*
	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('account_type')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->account_type); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('docStatus_id')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->docStatus_id); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('last_docnum')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->last_docnum); ?>
	<br />

	*/ ?>

</div>