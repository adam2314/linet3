<?php $this->breadcrumbs = array(
	'Rights'=>Rights::getBaseUrl(),
	Rights::t('core', 'Create :type', array(':type'=>Rights::getAuthItemTypeName($_GET['type']))),
); ?>

<div class="createAuthItem">
    <?php $this->beginWidget('MiniForm',array('haeder' => Rights::t('core', 'Create :type', array(
		':type'=>Rights::getAuthItemTypeName($_GET['type']),
	)))); ?>
	

	<?php $this->renderPartial('_form', array('model'=>$formModel)); ?>
    <?php $this->endWidget();?>
</div>