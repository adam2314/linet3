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
foreach ($cdata->Bankbooks as $bankbook) {
    echo "<tr><td>".$bankbook->id ."</td><td>". $bankbook->date ."</td><td>". $bankbook->sum ."</td></tr>";
}
?>
</table>