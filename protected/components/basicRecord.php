<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of basicRecord
 *
 * @author adam
 */
class basicRecord extends CActiveRecord{
    const table='';
    public function tableName() {
        return (Yii::app()->db->tablePrefix . self::table);
    }
}

?>
