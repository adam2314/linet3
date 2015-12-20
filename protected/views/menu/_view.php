<div class="view">

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo \yii\helpers\Html::link(\yii\helpers\Html::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('label')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->label); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('url')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->url); ?>
	<br />

        <b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('icon')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->icon); ?>
	<br />
        
	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('parent')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->parent); ?>
	<br />


</div>