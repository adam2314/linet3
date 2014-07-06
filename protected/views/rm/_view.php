<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dt')); ?>:</b>
	<?php echo CHtml::encode($data->dt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('details')); ?>:</b>
	<?php echo $data->details; ?>
	<br />

	<b><?php //echo CHtml::encode($data->getAttributeLabel('openformat')); ?>:</b>
	<?php //echo CHtml::encode($data->openformat); ?>
	<br />


</div>