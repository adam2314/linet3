<?php
/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C)  Adam Ben Hur.
 * 
 * @author adam
 * 
 * All Rights Reserved.
 ************************************************************************************/

/**
 * Description of widgetRefnum
 *
 */
class widgetRefnum extends CWidget {

    public $model;
    public $attribute;

    //put your code here


    public function init() {
        parent::init();
    }

    /**
     * Display the widget
     * @see CWidget::run()
     */
    public function run() {//style="width:'.($this->width-$this->titlewidth-28).'px;"
        $name = get_class($this->model);
        $id = $name . "_" . $this->attribute;
        $ids = $this->attribute."_ids";
        //if (!($this->model->hasAttribute($this->attribute)))
        //if (!($this->model->{$this->attribute}))
            //throw new CHttpException(500, Yii::t('app', 'Did not set attr or model for refnum'));

        //Yii::app()->end();
        //$baseUrl = Yii::app()->request->baseUrl;
        $text='';
        //if(function_exists(getRef())){
            //$this->model->getRef();
            if ($this->model->Docs !== null) {
                foreach ($this->model->Docs as $doc) {
                    //echo CHtml::link($doc->docType->name . " #" . $doc->docnum, array('docs/view', "id" => $doc->id)) . "<br />";
                    $text.="<a href='".Yii::app()->createAbsoluteUrl("docs/view/$doc->id")."' >" . $doc->docType->name . ' #' . $doc->docnum . "</a><br />";
                }
            }
       // }

        $newform = "
            <label for='$name'>" . $this->model->getAttributeLabel($this->attribute) . "</label>
            <div id='${id}_div'>
                $text
            </div>
            <a href='#' onclick=\"$('#{$id}_ids').val('');$('#{$id}_div').html(''); return false;\">" . Yii::t('app', 'Clear refnum') . "</a>
            <br />
            <a href='#' onclick=\"$('#chose{$id}').dialog('open'); return false;\">" . Yii::t('app', 'Choose Doc') . "</a>
            <input type='hidden' name='{$name}[{$ids}]' id='{$id}_ids' value='{$this->model->{$ids}}' />
                
";

        $this->beginWidget('zii.widgets.jui.CJuiDialog', array(//
            'id' => "chose$id",
            'options' => array(
                'title' => Yii::t('app', 'Choose Reference Document'),
                'autoOpen' => false,
                'width' => '600px',
            ),
        ));
        
        echo $this->controller->renderPartial('application.views.docs.index');


        $this->endWidget('zii.widgets.jui.CJuiDialog');


        echo $newform;
    }

    function tmp() {
        Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('docs-grid', {
		data: $(this).serialize()
	});
	return false;
});

");
    }

}
?>

<?php
?>
<?php

/*

 */



/*
  $perent = Docs::model()->findByPk($model->refnum);
  if ($perent) {
  echo CHtml::link($perent->docType->name . " #" . $perent->docnum, array('docs/view', "id" => $model->refnum));
  } */
?>


<?php

//echo $form->error($model, 'refnum_ids'); ?>