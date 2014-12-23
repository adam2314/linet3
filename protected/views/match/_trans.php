<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//print_r($cdata);
?>
<table>


<?
foreach ($cdata->Transactions as $transaction) {
    if($transaction->intType==$intType)
    echo "<tr><td>".$transaction->num ."</td><td>". Yii::t('app',$transaction->Type->name) ."</td><td>". $transaction->valuedate ."</td><td>". $transaction->sum ."</td></tr>";
}
?>
</table>