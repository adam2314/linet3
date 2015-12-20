<?php

/* * *********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C) Adam Ben Hur.
 * All Rights Reserved.
 * ********************************************************************************** */
/**
 * This is the model class for table "bug".
 *
 * The followings are the available columns in table 'bug':
 * @property integer $id
 * @property string $url
 * @property string $title
 * @property string $body
 *
 */

namespace app\models;

use Yii;
use app\components\mainRecord;

class Bug extends mainRecord {

    const table = 'bug';

    public static function tableName() {
        return self::table;
    }

    //public $title = '';
    //public $body = '';
    public $assignee = '';
    public $milestone = '';
    public $labels = array();
    private $site = 'https://api.github.com/repos';
    private $owner = 'adam2314';
    private $project = "linet3";
    private $authUser = 'Linet3GithubApiUser';
    private $authPasswd = '!AllGood123@';

    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'body' => Yii::t('app', 'Body'),
            'url' => Yii::t('app', 'URL'),
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search($params) {
        $query = Bug::find();

        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
                ->andFilterWhere(['like', 'body', $this->body])
                ->andFilterWhere(['like', 'url', $this->url]);
        return $dataProvider;
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return AccHist the static model class
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array(['title', 'body'], 'required'),
            array(['title', 'body', 'url'], 'safe'),
        );
    }

    public function send() {
        $params = array(
            'title' => $this->title,
            'body' => $this->body,
                //'assignee'=>$this->assignee,
                //'milestone'=>$this->milestone,
                //'app'=>  print_r($this->labels, true),
        );

        $url = $this->site . "/" . $this->owner . "/" . $this->project . "/issues";
        var_dump($url);
        var_dump(json_encode($params));
        $curl= new \app\helpers\Curl;
        $output=$curl//->addAuth($this->authUser, $this->authPasswd)
                ->setOptions([  //CURLOPT_HTTPHEADER=> ['Content-Type: application/xml'],
                                //CURLOPT_HEADER=> true,
                                CURLOPT_POST=> true,
                                CURLOPT_USERAGENT=>'Linet3.1',
                                CURLOPT_USERPWD=> $this->authUser.":".$this->authPasswd,
                                CURLOPT_RETURNTRANSFER=> true
                                ])
                ->post($url, json_encode($params));
        var_dump($output);
        
        $output = strstr($output, "\r\n\r\n");
        $output = str_replace("\r\n\r\n", "", $output);
        $output = json_decode($output);
        //print_r($output->html_url);


        if (isset($output->html_url)) {
            $this->url = $output->html_url;
            $this->save();
            return $this->url;
        } else {

            return false;
        }
        //return ;
    }

}
