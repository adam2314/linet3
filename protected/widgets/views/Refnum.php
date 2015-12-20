<?php
$model = new \app\models\Docs();
$model->scenario = 'search';
?>

<label for='$name'><?= $label; ?></label>
<div id='<?= $id; ?>_div'>
    <?= $text; ?>
</div>


<?= \yii\helpers\Html::buttonInput($label, ['class' => 'btn btn-success', 'id' => $id . '-button']); ?>
<a href='#' onclick="$('#<?= $id; ?>_ids').val('');
        $('#<?= $id; ?>_div').html('');
        return false;"> <?= \Yii::t('app', 'Clear refnum'); ?></a>
        <?php
        $java = <<<java

$('#$id-button').bind('click',function() {
    $('#popover-$id').modal('show');
    $('#popover-$id').show();
});

        
java;
        $this->registerJs($java, \yii\web\View::POS_READY);
        ?>

        <input type='hidden' name='<?= $name; ?>[<?= $ids; ?>]' id='<?= $id; ?>_ids' value='<?= $value; ?>' />

        <div id='chose<?= $id; ?>'>

        </div>    
        <?php
        $java = <<<JS

        /*
$( "#chose$id" ).bind( "open", function() {
  $( this ).show(500);
    $( this ).css({
        'position':'absolute',
        'width':'100%',
        'z-index':'1000'
    });

        
});
    
$( "#chose$id" ).bind( "close", function() {
  $( this ).hide();
});
        */
$( "#chose$id" ).popover();        
        
JS;
        $this->registerJs($java, \yii\web\View::POS_READY);
        ?>
