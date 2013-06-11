<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('doc_id')); ?>:</b>
	<?php echo CHtml::encode($data->doc_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creditcompany')); ?>:</b>
	<?php echo CHtml::encode($data->creditcompany); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cheque_num')); ?>:</b>
	<?php echo CHtml::encode($data->cheque_num); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bank')); ?>:</b>
	<?php echo CHtml::encode($data->bank); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('branch')); ?>:</b>
	<?php echo CHtml::encode($data->branch); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('cheque_acct')); ?>:</b>
	<?php echo CHtml::encode($data->cheque_acct); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cheque_date')); ?>:</b>
	<?php echo CHtml::encode($data->cheque_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sum')); ?>:</b>
	<?php echo CHtml::encode($data->sum); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bank_refnum')); ?>:</b>
	<?php echo CHtml::encode($data->bank_refnum); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dep_date')); ?>:</b>
	<?php echo CHtml::encode($data->dep_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('line')); ?>:</b>
	<?php echo CHtml::encode($data->line); ?>
	<br />

	*/ ?>

</div>