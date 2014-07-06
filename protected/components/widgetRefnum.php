<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of widgetRefnum
 *
 * @author adam
 */
class widgetRefnum extends CWidget {

    //put your code here


    public function init() {
        parent::init();
    }

    /**
     * Display the widget
     * @see CWidget::run()
     */
    public function run() {//style="width:'.($this->width-$this->titlewidth-28).'px;"
        print_r($this->model);
        Yii::app()->end();
        $baseUrl = Yii::app()->request->baseUrl;
        $newform = "
                <div id='$this->name'>
                    <input type='checkbox' checked='checked' name='$this->name' />                      
                </div>     
                <script>
                       $(function() {
                           $('#$this->name').toggleButtons({
                               label: {
                                   enabled: 'כן',
                                   disabled: 'לא',
                               },

                           });
                           //formGeneral();
                       });
                </script>
";

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
<?php echo $form->labelEx($model, 'refnum'); ?>
<div id="Docsrefnum">
<?php
$model->getRef();
if ($model->docDocs !== null) {
    foreach ($model->docDocs as $doc) {
        echo CHtml::link($doc->docType->name . " #" . $doc->docnum, array('docs/view', "id" => $doc->id)) . "<br />";
    }
}
/*
  $perent = Docs::model()->findByPk($model->refnum);
  if ($perent) {
  echo CHtml::link($perent->docType->name . " #" . $perent->docnum, array('docs/view', "id" => $model->refnum));
  } */
?>
</div>
    <?php echo CHtml::link(Yii::t('app', 'Clear refnum'), '#', array('onclick' => '$("#Docs_refnum_ids").val("");$("#Docsrefnum").html(""); return false;',)); ?>
<br />
<?php echo CHtml::link(Yii::t('app', 'Choose Doc'), '#', array('onclick' => '$("#choseRefDoc").dialog("open"); return false;',)); ?>

<?php echo $form->hiddenField($model, 'refnum_ids', array('size' => 20, 'maxlength' => 20)); ?>
<?php echo $form->error($model, 'refnum_ids'); ?>