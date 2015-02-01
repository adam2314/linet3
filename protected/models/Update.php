<?php
/***********************************************************************************
 * The contents of this file are subject to the Mozilla Public License Version 2.0
 * ("License"); You may not use this file except in compliance with the Mozilla Public License Version 2.0
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 ************************************************************************************/

class Update extends CFormModel {

    public $SYSback;
    public $DBback;
    private $_sversion;

    public function init() {
        if (file_exists(Yii::app()->basePath . '/data/version'))
            $this->_sversion = file_get_contents(Yii::app()->basePath . '/data/version');
        else
            $this->_sversion = "3.0";
        return parent::init();
    }

    private function _send($url, $params = array()) {
        $updatesrv = Yii::app()->params['updatesrv'];

        $output = Yii::app()->curl
                ->setOptions(array('Content-Type: application/xml',
                    CURLOPT_CAINFO => Yii::app()->basePath . '/data/rootCA.pem',
                    CURLOPT_USERAGENT => $this->_sversion,
                ))
                //
                ->post($updatesrv . $url, CJSON::encode($params));
        $response = CJSON::decode($output);

        if (!isset($response["status"]))
            throw new CHttpException(500, $output);
        if ($response["status"] != 200)
            throw new CHttpException($response["status"], $response["body"]);
        return $response["body"];
    }

    private function _file($url, $params = array()) {
        $updatesrv = Yii::app()->params['updatesrv'];

        $output = Yii::app()->curl
                ->setOptions(array('Content-Type: application/xml',
                    CURLOPT_CAINFO => Yii::app()->basePath . '/data/rootCA.pem',
                ))
                //
                ->post($updatesrv . $url, CJSON::encode($params));
        return $output;
    }

    public function getMessages() {


        return $this->_send("update/msg/?version=" . $this->getSVersion());
    }

    public function getVersionI() {
        return $this->_send("update/version");
    }

    public function getVersion() {
        $result = $this->getVersionI();
        return $result["name"];
    }

    public function getSVersion() {
        return $this->_sversion;
    }

    public function backupSys() {

        $folder = Yii::app()->basePath . "/../";

        if (file_exists(Yii::app()->basePath . "/tmp"))
            unlink(Yii::app()->basePath . "/tmp");

        Zipper::zip($folder, Yii::app()->basePath . "/tmp");

        return Yii::app()->basePath . "/tmp";
    }

    public function backupDB() {
        $dumper = new dbMaster();
        $sql = $dumper->getDump(false);

        $file = new Files;
        $file->name = "DB Backup " . date("d-m-Y_H_i") . ".sql";
        $file->path = '.';
        $file->save();

        $file->writeFile($sql);
        $this->DBback = $file->id;
    }

    public function upgrade($version) {
        //get list
        $result = $this->_send("update/files/" . $version["id"]);

        $folder = Yii::app()->basePath . "/../";
        foreach ($result as $file) {
            $content = $this->_file("update/file/" . $file["id"]);
            file_put_contents($folder . $file["name"], $content);
        }

        //open zip
        $zip = new ZipArchive;
        $res = $zip->open($folder . 'upgrade.zip');
        if ($res === TRUE) {
            $zip->extractTo($folder);
            $zip->close();
        }

        //migrate

        $runner = new CConsoleCommandRunner();
        $runner->commands = array(
            'migrate' => array(
                'class' => 'system.cli.commands.MigrateCommand',
                'interactive' => false,
            ),
        );

        ob_start();
        $runner->run(array(
            'yiic',
            'migrate',
                //'down',
        ));
        $text = htmlentities(ob_get_clean(), null, Yii::app()->charset);


        //save version
        file_put_contents(Yii::app()->basePath . '/data/version', $version["name"]);
        
        

        return $text;
    }

}
