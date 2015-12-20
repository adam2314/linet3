<div class="view">

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo \yii\helpers\Html::link(\yii\helpers\Html::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('dt')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->dt); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('details')); ?>:</b>
	<?php echo $data->details; ?>
	<br />

	<b><?php //echo \yii\helpers\Html::encode($data->getAttributeLabel('openformat')); ?>:</b>
	<?php //echo \yii\helpers\Html::encode($data->openformat); ?>
	<br />


</div>