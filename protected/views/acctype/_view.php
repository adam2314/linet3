<div class="view">

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo \yii\helpers\Html::link(\yii\helpers\Html::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->name); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('desc')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->desc); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('openformat')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->openformat); ?>
	<br />


</div>