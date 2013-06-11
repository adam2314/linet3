<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('openformat')); ?>:</b>
	<?php echo CHtml::encode($data->openformat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isdoc')); ?>:</b>
	<?php echo CHtml::encode($data->isdoc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isrecipet')); ?>:</b>
	<?php echo CHtml::encode($data->isrecipet); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('iscontract')); ?>:</b>
	<?php echo CHtml::encode($data->iscontract); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('stockAction')); ?>:</b>
	<?php echo CHtml::encode($data->stockAction); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('account_type')); ?>:</b>
	<?php echo CHtml::encode($data->account_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('docStatus_id')); ?>:</b>
	<?php echo CHtml::encode($data->docStatus_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_docnum')); ?>:</b>
	<?php echo CHtml::encode($data->last_docnum); ?>
	<br />

	*/ ?>

</div>