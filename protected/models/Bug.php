<?php

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
class Bug extends mainRecord {

    const table = 'bug';

    public function tableName() {
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
            'id' => Yii::t('labels', 'ID'),
            'title' => Yii::t('labels', 'Title'),
            'body' => Yii::t('labels', 'Body'),
            'url' => Yii::t('labels', 'URL'),
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('title', $this->account_id, true);
        $criteria->compare('body', $this->dt, true);
        $criteria->compare('url', $this->details, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return AccHist the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, body', 'required'),
            array('title, body, url', 'safe'),
        );
    }

    public function send() {
        $params = array(
            'title' => $this->title,
            'body' => $this->body,
                //'assignee'=>$this->assignee,
                //'milestone'=>$this->milestone,
                //'labels'=>  print_r($this->labels, true),
        );

        $url = $this->site . "/" . $this->owner . "/" . $this->project . "/issues";
        $output = Yii::app()->curl
                ->addAuth($this->authUser, $this->authPasswd)
                ->setOptions(array('Content-Type: application/xml'))
                ->post($url, json_encode($params));
        $output = strstr($output, "\r\n\r\n");
        $output = str_replace("\r\n\r\n", "", $output);
        $output = json_decode($output);
        //print_r($output->html_url);
        
        
        if (isset($output->html_url)){
            $this->url=$output->html_url;
            $this->save();
            return $this->url;
        }else{
            
            return false;
        }
        //return ;
    }

}
