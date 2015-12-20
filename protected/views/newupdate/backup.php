<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="updatetext">
    <?php echo Yii::t('update', "Backup system and database, it is highly advised to save a local copy of the backup files");?><br />
    <?php echo Yii::t('update', "Backuping system files");?><br />
    


    
    
    <a href='<?php echo yii\helpers\BaseUrl::base().('/newUpdate/backupfile');?>'> <?php echo Yii::t('update', "Download System Files") ?></a><br />
    <?php echo  Yii::t('update', "Backuping database");?><br />
    
    

    <a href='<?php echo yii\helpers\BaseUrl::base().('/data/download')."/".$model->DBback;?>'><?php echo Yii::t('update', "Download Database file");?></a><br />
    
</div>

<div class="control"><a class="btn btn-success" onclick="document.location.href = '../'" ><?php echo Yii::t('update', "Cancel");?></a>
    <a class="btn btn-success" onclick="loadDoc('<?php echo yii\helpers\BaseUrl::base().('/newUpdate/update'); ?>')" ><?php echo Yii::t('update', "Next");?></a></div>