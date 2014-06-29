<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subject')); ?>:</b>
	<?php echo CHtml::encode($data->desc); ?>
	<br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('cc')); ?>:</b>
	<?php echo CHtml::encode($data->openformat); ?>
	<br />
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('bcc')); ?>:</b>
	<?php echo CHtml::encode($data->openformat); ?>
	<br />


</div>