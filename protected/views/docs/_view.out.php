<div class="view">

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php 
        echo \yii\helpers\Html::link(\yii\helpers\Html::encode($data->id),'#', array(  'onclick'=>'refNum("'.$data->id.'","'.$data->docnum.'","'.$data->docType->name.'")',));
        //echo \yii\helpers\Html::link('Choose Doc', '#', array('onclick'=>'$("#choseRefDoc").dialog("open"); return false;',));
        //echo \yii\helpers\Html::link(\yii\helpers\Html::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php //echo \yii\helpers\Html::encode($data->getAttributeLabel('prefix')); ?>:</b>
	<?php //echo \yii\helpers\Html::encode($data->prefix); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('doctype')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->doctype); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('docnum')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->docnum); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('account_id')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->account_id); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('company')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->company); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->address); ?>
	<br />

	<?php /*
	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('city')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->city); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('zip')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->zip); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('vatnum')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->vatnum); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('refnum')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->refnum); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('issue_date')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->issue_date); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('due_date')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->due_date); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('sub_total')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->sub_total); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('novat_total')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->novat_total); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('vat')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->vat); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('total')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->total); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('src_tax')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->src_tax); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->status); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('printed')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->printed); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('comments')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->comments); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('owner')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->owner); ?>
	<br />

	*/ ?>

</div>