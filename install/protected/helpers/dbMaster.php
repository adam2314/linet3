<?php

/* * *********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3.0
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */

namespace app\helpers;

use Yii;

class dbMaster {

    private $constraints;
    private $commandEnd = ";;;";

    private function prefixMe($sqlCmd, $prefix) {
        $rplcArr = array(
            'DROP TABLE IF EXISTS `',
            'CREATE TABLE IF NOT EXISTS `',
            'CREATE TABLE `',
            'INSERT INTO `',
            'ALTER TABLE ',
            ') REFERENCES `',
            '` ON `',
            'CREATE INDEX `',
        );






        foreach ($rplcArr as $niddle) {
            $sqlCmd = str_replace($niddle, $niddle . $prefix, $sqlCmd);
        }

        return $sqlCmd;
    }

    public function loadFile($filename, $prefix = '') {
        if (file_exists($filename)) {
            $sqlCmd = file_get_contents($filename);
            if ($prefix != '') {
                $sqlCmd = $this->prefixMe($sqlCmd, $prefix);
            }
            //if (isset(\Yii::$app->dbTemp))
                $dbCon = \Yii::$app->db;
            //else
            //    $dbCon = \Yii::$app->db;

            $transaction = $dbCon->beginTransaction();
            //try {
            $sqlArray = explode($this->commandEnd . "\n", $sqlCmd); //shuld be new line...
            $text = '';
            foreach ($sqlArray as $line) {
                $text.=$line . "\n";
                if (($line != '') && (strpos($line, '--') !== 0) && (strpos($line, '/*') !== 0)) {
                    $dbCon->createCommand($line . ";")->execute();
                    //echo $line."<br\n>";
                }
            }

            
            $transaction->commit();
            return true;
            /* } catch (Exception $e) { // an exception is raised if a query fails
              $transaction->rollback();
              $message = $e->getMessage();
              echo $text . "<br />";
              print $message;
              Yii::$app->end();
              } */
        } else {
            throw new \Exception('The sql file does not exist.'); //500
        }
    }

  
}
