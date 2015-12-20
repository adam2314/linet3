<?php

/* * *********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
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
            if (isset(\Yii::$app->dbTemp))
                $dbCon = \Yii::$app->dbTemp;
            else
                $dbCon = \Yii::$app->db;

            //$transaction = $dbCon->beginTransaction();
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


            //$transaction->commit();
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

    public function loadArray($array, $prefix = '') {

        if (isset(\Yii::$app->dbTemp))
            $dbCon = \Yii::$app->dbTemp;
        else
            $dbCon = \Yii::$app->db;

        $transaction = $dbCon->beginTransaction();
        foreach ($array as $line) {

            if ($prefix != '') {
                $line = $this->prefixMe($line, $prefix);
            }
            $dbCon->createCommand($line . ";")->execute();
        }
        return $transaction->commit();
    }

    /**
     * Dump all tables
     * @param boolean $download - if the generated data is to be sent to browser 
     * @return file|strings 
     */
    public function getDump($download = TRUE, $prefix = '') {
        ob_start();
        //echo Yii::$app->db->tablePrefix;
        //Yii::$app->end();
        foreach ($this->getTables() as $val) {
            //echo $val;
            //echo $key;
            //echo Yii::$app->db->tablePrefix;
            //echo strpos($key,Yii::$app->db->tablePrefix)===true;
            //echo strpos($key,Yii::$app->db->tablePrefix);
            if ($prefix != '') {
                if ((strpos($val, $prefix) === 0)) {
                    //echo "-- prefixed: ".$key."-".$prefix."\n";
                    echo $this->dumpTable($val, $prefix);
                }
            } else {
                echo "--no:\n";
                $this->dumpTable($val, $prefix);
            }
        }
        $result = $this->setHeader();
        $result.= ob_get_contents();
        //$result.= $this->getConstraints();
        $result.= $this->setFooter();

        ob_end_clean();
        if ($download) {
            header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
            header("Cache-Control: no-cache");
            header("Pragma: no-cache");
            header("Content-type:application/sql");
            header("Content-Disposition:attachment;filename=backup.sql");
        }
        return $result;
    }

    /**
     * Generate constraints to all tables
     * @return string 
     */
    private function getConstraints() {
        $sql = "--\r\n-- Constraints for dumped tables\r\n--" . PHP_EOL . PHP_EOL;
        $first = TRUE;
        foreach ($this->constraints as $key => $value) {
            if ($first && count($value[0]) > 0) {
                $sql .= "--\r\n-- Constraints for table `$key`\r\n--" . PHP_EOL . PHP_EOL;
                $sql .= "ALTER TABLE $key" . PHP_EOL;
            }
            if (count($value[0]) > 0) {
                for ($i = 0; $i < count($value[0]); $i++) {
                    if (strpos($value[0][$i], 'CONSTRAINT') === FALSE)
                        $sql .= preg_replace('/(FOREIGN[\s]+KEY)/', "\tADD $1", $value[0][$i]);
                    else
                        $sql .= preg_replace('/(CONSTRAINT)/', "\tADD $1", $value[0][$i]);
                    if ($i == count($value[0]) - 1)
                        $sql .= ";" . PHP_EOL;
                    if ($i < count($value[0]) - 1)
                        $sql .=PHP_EOL;
                }
            }
        }

        return $sql;
    }

    /**
     * Set sql file header
     * @return string 
     */
    private function setHeader() {
        $header = PHP_EOL . "--\n-- foreign key checks, autocomit and start a transaction\n--" . PHP_EOL . PHP_EOL;
        $header.="SET FOREIGN_KEY_CHECKS=0" . $this->commandEnd . PHP_EOL;
        $header.="SET SQL_MODE=\"NO_AUTO_VALUE_ON_ZERO\"" . $this->commandEnd . PHP_EOL;
        $header.="SET AUTOCOMMIT=0" . $this->commandEnd . PHP_EOL;
        //$header.="START TRANSACTION;" . PHP_EOL . PHP_EOL;
        $header.="/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */" . $this->commandEnd . PHP_EOL;
        $header.="/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */" . $this->commandEnd . PHP_EOL;
        $header.="/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */" . $this->commandEnd . PHP_EOL;
        $header.="/*!40101 SET NAMES utf8 */" . $this->commandEnd . PHP_EOL;

        return $header;
    }

    /**
     * Set sql file footer
     * @return string 
     */
    private function setFooter() {
        $footer = PHP_EOL . "SET FOREIGN_KEY_CHECKS=1" . $this->commandEnd . PHP_EOL;
        //$footer.="COMMIT;" . PHP_EOL . PHP_EOL;
        $footer.="/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */" . $this->commandEnd . PHP_EOL;
        $footer.="/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */" . $this->commandEnd . PHP_EOL;
        $footer.="/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */" . $this->commandEnd . PHP_EOL;

        return $footer;
    }

    /**
     * Create table dump
     * @param $tableName
     * @return mixed
     */
    private function dumpTable($tableName, $prefix) {
        return $this->getColumns($tableName, $prefix) . $this->getData($tableName, $prefix);
    }

    public function getColumns($tableName, $prefix) {
        $sql = 'SHOW CREATE TABLE ' . $tableName;
        $cmd = Yii::$app->db->createCommand($sql);
        $table = $cmd->queryOne();
        $create_query = $table['Create Table'] . $this->commandEnd;
        $create_query = preg_replace('/^CREATE TABLE `' . $tableName . '/', 'CREATE TABLE IF NOT EXISTS `' . str_replace($prefix, '', $tableName), $create_query);
        $create_query = preg_replace('/AUTO_INCREMENT\s*=\s*([0-9])+/', '', $create_query);
        $create_query = 'DROP TABLE IF EXISTS `' . addslashes(str_replace($prefix, '', $tableName)) . '`' . $this->commandEnd . PHP_EOL . $create_query . PHP_EOL . PHP_EOL;

        $this->tables[$tableName]['create'] = $create_query;
        return $create_query;
    }

    public function getData($tableName, $prefix) {
        $sql = 'SELECT * FROM ' . $tableName;
        $cmd = Yii::$app->db->createCommand($sql);
        $dataReader = $cmd->query();
        $data_string = '';
        foreach ($dataReader as $data) {
            $itemNames = array_keys($data);
            $itemNames = array_map("addslashes", $itemNames);
            $items = join('`,`', $itemNames);
            $itemValues = array_values($data);

            $valueString = "(";
            foreach ($itemValues as $index => $value) {
                if ($itemValues[$index] === null)
                    $valueString.="NULL";
                else
                    $valueString.="'" . addslashes($itemValues[$index]) . "'";
                $valueString.=",";
            }
            $valueString = rtrim($valueString, ",");
            $valueString.=")";

            if ($valueString != "()") {
                $data_string .= "INSERT INTO `" . str_replace($prefix, '', $tableName) . "` (`$items`) VALUES" . $valueString . $this->commandEnd . PHP_EOL;
            }
        }
        if ($data_string == '')
            return null;

        $data_string.=PHP_EOL . PHP_EOL . PHP_EOL;

        $this->tables[$tableName]['data'] = $data_string;
        return $data_string;
    }

    /**
     * Get mysql tables list
     * @return array
     */
    private function getTables() {
        $db = \Yii::$app->db;

        return $db->getSchema()->getTableNames();
    }

    public static function tableExists($name) {
        $connection = \Yii::$app->db; //get connection
        $dbSchema = $connection->schema;
        //or $connection->getSchema();
        $tables = $dbSchema->getTableNames(); //returns array of tbl schema's
        foreach ($tables as $tbl) {
            if ($tbl == $name) {
                return true;
            }
        }
        return false;
    }

    private static function newGetColumns($tableName, $prefix) {
        $sql = 'SELECT * FROM ' . $tableName . " LIMIT 1";
        $cmd = Yii::$app->db->createCommand($sql);

        foreach ($cmd->query() as $data) {

            return array_keys($data);
        }
        return [];
    }

    public function newGetData($tableName, $prefix) {
        $sql = 'SELECT * FROM ' . $tableName ;
        $cmd = Yii::$app->db->createCommand($sql);
        //$dataReader = ;
        $array = [];
        foreach ($cmd->query() as $data) {
            $array[] = array_values($data);
        }
        return $array;
    }

    private static function newTableBackup($tableName, $prefix, $backup) {
        $tableNameW = str_replace($prefix, "", $tableName);
        $backup["columns"][$tableNameW] = dbMaster::newGetColumns($tableName, $prefix);
        $backup["data"][$tableNameW] = dbMaster::newGetData($tableName, $prefix);

        return $backup;
    }

    public function newRestore($backup, $prefix = '') {

        $connection = Yii::$app->db;
        $transaction = $connection->beginTransaction();
        try {
            $connection->createCommand('SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO"')->execute();
            
            foreach ($backup["columns"]as $table => $key) {
                
                if(Yii::$app->db->schema->getTableSchema($prefix . $table)!==null){
                    $connection->createCommand()->truncateTable($prefix . $table)->execute();
                    Yii::info("restord: " . $prefix . $table);
                    if($backup["data"][$table]!==[])//not empty table
                        $connection->createCommand()->batchInsert($prefix . $table, $key, $backup["data"][$table])->execute();
                }else{
                    Yii::error("restore no table: " . $prefix . $table);
                }
            }
            //just a guess
            $connection->createCommand('SET SQL_MODE="TRADITIONAL"')->execute();
            $transaction->commit();
        } catch (Exception $e) {
            $transaction->rollback();
        }
    }

    public function newBackup($prefix = null) {

        $backup = [
            "backup" => time(),
            "prefix" => $prefix,
            "columns" => [],
            "data" => [],
        ];


        foreach ($this->getTables() as $table) {
            if ($prefix !== null) {
                if ((strpos($table, $prefix) === 0)) {
                    $backup = dbMaster::newTableBackup($table, $prefix, $backup);
                }
            } else {

                $backup = dbMaster::newTableBackup($table, $prefix, $backup);
            }
        }

        return $backup;
    }

}
