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
class basicRecord extends CActiveRecord {
    /* const table='';
      public function tableName() {
      return (Yii::app()->db->tablePrefix . self::table);
      } */

    public function __toString() {
        $vars = $this->getAttributes();
        return json_encode($vars);
    }

    public static function getConstants($token, $objectClass) {
        $tokenLen = strlen($token);

        $reflection = new ReflectionClass($objectClass); //php built-in 
        $allConstants = $reflection->getConstants(); //constants as array

        $tokenConstants = array();
        foreach ($allConstants as $name => $val) {
            if (substr($name, 0, $tokenLen) != $token)
                continue;
            $tokenConstants[] = array('id' => $val, 'name' => Yii::t('app', $name));
        }
        return $tokenConstants;
    }

    protected function fieldvalue($str, $type, $action) {
        switch ($type) {
            case "date":
                return substr($str, 0, 4) . "-" . substr($str, 4, 2) . "-" . substr($str, 6, 2);
                break;
            case "hour":
                return $str;
                break;
            case "v99":
                $a = substr($str, 0, 1);
                $str = substr($str, 1) / 100;
                return number_format($str, 2, '.', '');
                ;
                break;
            case "v9999":
                $a = substr($str, 0, 1);
                $str = substr($str, 1) / 1000;
                return number_format($str, 4, '.', '');
                break;
            case "s":
                return ltrim($str, ' 0!'); //iconv("windows-1255","utf-8",$str);
                break;
            case "n":
                $str = ltrim($str, ' 0!');
                return (int) $str;
                break;
            default:
                return ltrim($str, ' 0!');
        }
    }

    protected function fieldvalid($str, $type) {
        return true;
        //chek aginst type
    }

    public function readLine($line, $type) {

        $fields = Yii::app()->cache->get("Openformat." . $type);
        if ($fields === false) {
            $criteria = new CDbCriteria;
            $criteria->condition = "type_id = :type_id";
            $criteria->params = array(':type_id' => $type);

            $fields = OpenFormat::model()->findAll($criteria);

            Yii::app()->cache->set("Openformat." . $type, $fields, 600);
            Yii::log("Openformat" . $type . ' saved', 'info', 'app');
        }



        $pos = 0;
        $encoding = "utf-8";


        foreach ($fields as $field) {



            $str = mb_substr($line, $pos, $field->size, $encoding);
            //echo "$pos,";
            $pos+=$field->size;
            //echo "$str,";
            //Yii::log($field->id."(".$pos.",".$field->size."):".$str,'info','app');

            $this->openfrmtFieldValue($field, $str);
        }
        //Yii::app()->end();
        //echo "****************************<br />\n";
        return true;
    }

    public function save($runValidation = true, $attributes = NULL) {
        if (!Yii::app()->params['readOnly'])
            return parent::save($runValidation, $attributes);
        else
            return false;
    }

    protected function openfrmtFieldValue($field, $value) {//,$begin=null,$end=null
        switch ($field->type) {
            case "date":
                //if(get_class($this)=="Doccheques")
                //    Yii::log($value,'info','app');
                //$this->issue_date=date("Y-m-d H:m:s",CDateTimeParser::parse($this->issue_date,Yii::app()->locale->getDateFormat('yiidatetime')));
                $value = substr($value, 0, 4) . "-" . substr($value, 4, 2) . "-" . substr($value, 6, 2);

                if (get_class($this) == "Docs")
                    $value = date(Yii::app()->locale->getDateFormat('phpdatetimes'), strtotime($value));

                break;
            case "hour":
                $value = $value;
                break;
            case "v99":
                $a = substr($value, 0, 1);
                $value = substr($value, 1) / 100;
                $value = number_format($value, 2, '.', '');
                ;
                break;
            case "v9999":
                $a = substr($value, 0, 1);
                $value = substr($value, 1) / 10000;
                $value = number_format($value, 4, '.', '');
                break;
            case "s":
                $value = ltrim($value, ' 0!'); //iconv("windows-1255","utf-8",$str);
                break;
            case "n":
                $value = ltrim($value, ' 0!');
                $value = (int) $value;
                break;
            default:
                $value = ltrim($value, ' 0!');
        }//*/
        //$value="";
        if ($field->import == 'NA')
            return;
        //$value=$field->export;
        if ($field->import == "file.line")
            return;
        if ($field->import == "company.vatnum")
            return;
        if (strpos($field->import, "this.") === 0) {
            //echo $field->import;
            ///if(isset($this->{str_replace("this.", "", $field->export)}))
            //echo $field->import.":$value<br/>\n";
            $this->{str_replace("this.", "", $field->import)} = $value;
            //echo  $this->{str_replace("this.", "", $field->import)};
            return true;
        }

        if (strpos($field->import, "system.") === 0)
            return;

        if (strpos($field->import, "func.") === 0)
            $value = $this->{str_replace("func.", "", $field->import)}($value);

        if (strpos($field->import, "limit.") === 0)
            return;
    }

    protected function openfrmtFieldStr($field, $line, $begin = null, $end = null) {//,
        $value = "";
        if (($value == '') && ($field->export != 'NA'))
            $value = $field->export;
        if ($field->export == "file.line")
            $value = $line;
        if ($field->export == "company.vatnum")
            $value = Settings::model()->findByPk('company.vat.id')->value;
        if (strpos($field->export, "this.") === 0)
            if (isset($this->{str_replace("this.", "", $field->export)}))
                $value = $this->{str_replace("this.", "", $field->export)};

        if (strpos($field->export, "system.") === 0)
            $value = Settings::model()->findByPk($field->export)->value;

        if (strpos($field->export, "func.") === 0)
            $value = $this->{str_replace("func.", "", $field->export)}();

        if (strpos($field->export, "limit.") === 0)
            $value = $this->{str_replace("limit.", "", $field->export)}($begin, $end);




        /*         * **************************************************************************************************** */
        $template = "%0" . $field->size . "d";
        if ($field->type == 's')
            $template = "% " . $field->size . "s";
        if ($field->type == 'n')
            $template = "%0" . $field->size . "d";
        if ($field->type == 'date') {//date
            if (isset($this->dateDBformat)) {
                if ($this->dateDBformat) {
                    $phpdbdatetime = Yii::app()->locale->getDateFormat('yiidbdatetime');
                    return date('Ymd', CDateTimeParser::parse($value, $phpdbdatetime));
                }
            }
            $phpdbdatetime = Yii::app()->locale->getDateFormat('yiidatetime'); //phpdbdatetime
            return date('Ymd', CDateTimeParser::parse($value, $phpdbdatetime));
        }
        if ($field->type == 'hour') {//hour
            $phpdbdatetime = Yii::app()->locale->getDateFormat('yiidatetime'); //phpdbdatetime
            return date('Hs', CDateTimeParser::parse($value, $phpdbdatetime));
        }
        if ($field->type == '99') {//v99
            $template = "%0" . ($field->size) . "d";
            $value = round($value * 100);
            if ($value < 0) {
                $value = $value * -1;
            }
            return sprintf($template, $value);
        }
        if ($field->type == 'v99') {//v99
            $template = "%0" . ($field->size - 1) . "d";
            $value = round($value * 100);
            if ($value >= 0) {
                $sign = "+";
            } else {
                $sign = "-";
                $value = $value * -1;
            }
            return $sign . sprintf($template, $value);
        }
        if ($field->type == 'v9999') {//v9999
            $template = "%0" . ($field->size - 1) . "d";
            $value = round($value * 10000);
            if ($value >= 0) {
                $sign = "+";
            } else {
                $sign = "-";
                $value = $value * -1;
            }

            return $sign . sprintf($template, $value);
        }




        //ini_set('mbstring.substitute_character', "none"); 
        //$value= mb_convert_encoding($value, 'UTF-8', 'UTF-8'); 

        $value = htmlentities($value);
        $value = str_replace("&amp;", "&", $value);
        $value = iconv("UTF-8", "CP1255", $value);
        //$value=mb_convert_encoding($value, "windows-1255",'utf-8');
        $value = substr($value, 0, $field->size);
        return sprintf($template, $value);
    }

}
