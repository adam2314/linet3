<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$version = $model->getVersionI();
$version = $version["name"];
$sversion = $model->getSVersion();


$this->beginWidget('MiniForm', array(
    'header' => Yii::t('update', "Update Wizard"),
));
?>
<div id='conUpdate'>
    <div class="updatetext">
        <?php echo Yii::t('update', "Welcome To Linet update wizard your system version is:") ." ". $sversion; ?><br />
        <?php echo Yii::t('update', "The current version is:") ." ". $version; ?> 
        <br />
        <?php
        if ($version != $sversion)
            print Yii::t('update', "You need to update your system.");
        ?>
    </div>

    <div class="control"><a class="btn btn-primary" onclick="document.location.href = '../../'" ><?php echo Yii::t('update', "Cancel"); ?>  </a>

        <a class="btn btn-primary" onclick="loadDoc('<?php echo $this->createUrl('/newUpdate/backup'); ?>')" ><?php echo Yii::t('update', "Next"); ?> </a>
    </div>
</div>
<?php $this->endWidget(); ?>



<script type="text/javascript">



    function loadDoc(url) {
        $('#conUpdate').html("Loading...");
        $.post(url, {"non": true}, function(data) {
            $('#conUpdate').html(data);
        }).fail(function(data) {
            console.log(data);
            $('#conUpdate').html( data.responseText);
        });
    }






</script>