<?php 
/***********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/

?>
<div class='row'>

    <ul class="list-group">
    <?php
    foreach($model->errors as $error){
        echo '<li class="list-group-item">'.$error.'</li>';
        
    }
    
    if(count($model->errors)==0){
        echo '<li class="list-group-item">'.Yii::t('app','Company Data is valid!').'</li>';
    }
    ?>
    </ul>
</div>
