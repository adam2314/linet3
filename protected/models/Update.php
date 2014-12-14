<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Update extends CFormModel {

    public $SYSback;
    public $DBback;

    private function _send($url, $params = array()) {
        $updatesrv = Yii::app()->params['updatesrv'];

        $output = Yii::app()->curl
                ->setOptions(array('Content-Type: application/xml',
                    CURLOPT_CAINFO => Yii::app()->basePath . '/data/rootCA.pem',
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
        return $this->_send("update/version")["name"];
    }

    public function getSVersion() {
        return Settings::model()->findByPk('system.version')->value;
    }

    public function backupSys() {

        $folder = Yii::app()->basePath . "/../";

        if (file_exists(Yii::app()->basePath . "/tmp"))
            unlink(Yii::app()->basePath . "/tmp");

        Zipper::zip($folder, Yii::app()->basePath . "/tmp" . "tmp");

        return $folder . "tmp";
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
        $text= htmlentities(ob_get_clean(), null, Yii::app()->charset);


        //save version
        $settings = Settings::model()->findByPk('system.version');
        $settings->value = $version["name"];
        $settings->save();
        
        return $text;
    }

}
