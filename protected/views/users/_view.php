<div class="view">

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo \yii\helpers\Html::link(\yii\helpers\Html::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->username); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('fname')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->fname); ?>
	<br />

        <b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('lname')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->lname); ?>
	<br />
        
	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->password); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('lastlogin')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->lastlogin); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('cookie')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->cookie); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('hash')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->hash); ?>
	<br />

	<?php /*
	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('certpasswd')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->certpasswd); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('salt')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->salt); ?>
	<br />

	<b><?php echo \yii\helpers\Html::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo \yii\helpers\Html::encode($data->email); ?>
	<br />

	*/ ?>

</div>