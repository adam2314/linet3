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
 * This is the model class for table "bankName".
 *
 * The followings are the available columns in table 'bankName':
 * @property integer $id
 * @property string $to
 * @property string $from
 * @property string $subject
 * @property string $cc
 * @property string $bcc
 * @property string $body
 * @property string $files
 * @property string $create
 * @property string $user_id
 */

namespace app\models;

use Yii;

class Mail extends Record {

    const table = '{{%mail}}';

    public function send() {

        //Yii::import('application.extensions.smtpmail.PHPMailer');
        $mailer = new \yii\swiftmailer\Mailer([
            "transport"=>[
                'class' => 'Swift_SmtpTransport',
              'host' => \app\helpers\Linet3Helper::getSetting('company.mail.server'),
              'username' => \app\helpers\Linet3Helper::getSetting('company.mail.user'),
              'password' => \app\helpers\Linet3Helper::getSetting('company.mail.password'),
              'port' => \app\helpers\Linet3Helper::getSetting('company.mail.port'),
              'encryption' => (\app\helpers\Linet3Helper::getSetting('company.mail.ssl')) ? 'tls' : '',
          //$mail->CharSet = 'utf-8';
          //$mail->SMTPAuth = (app\helpers\Linet3Helper::getSetting('company.mail.user') != '') ? true : false;
                //'Auth_mode'=> (\app\helpers\Linet3Helper::getSetting('company.mail.user') != '') ? 'login' : false,
            ]
        ]);

        $mail=$mailer->compose('layouts/html', ['content' => $this->body]);
        




        //$mail->SetFrom($this->from);
        //echo $this->files;
        if ($this->files != '') {
            $file = Files::findOne($this->files);
            if ($file != null) {
                //echo $file->getFullPath().";;".$file->name;

                $mail->attach($file->getFullFilePath(), ["fileName"=>$file->name]);
            }
        }
        $mail->setFrom(\app\helpers\Linet3Helper::getSetting('company.mail.address'))
                ->setTo($this->to)
                ->setSubject($this->subject);
        if($this->cc!='')        
                $mail->setCc($this->cc);
             if($this->bcc!='') 
                $mail->setBcc($this->bcc);
        //$mail->AddCC($this->cc); //.$this->cc
        //$mail->AddBcc($this->bcc);
        //$mail->
        //$mail->setHtmlBody($this->body);
        //$mail;

        if (!$mail->send()) {
            //echo "Mailer Error: " . $mail->ErrorInfo;
            throw new Exception(Yii::t('app', "Mailer Error: ") . $mail->ErrorInfo . $mail->Username);
        } else {
            $this->sent++;
            $this->save();
            if(!\app\helpers\Linet3Helper::isConsole())
                \Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Message sent!'));
            //echo "Message sent!";
        }//*/
        //Yii::$app->end();
    }

    public function save($runValidation = true, $attributes = NULL) {

        //$this->mailsend();
        return parent::save($runValidation, $attributes);
    }

    /**
     * @return string the associated database table name
     */
    public static function tableName() {
        return self::table;
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array(['id'], 'number', 'integerOnly' => true),
            array(['from', 'to' ,'bcc', 'cc', 'subject'], 'string', 'max' => 255),
            array(['from', 'to' ,'bcc', 'cc', 'subject', 'body', 'files'], 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array(['id', 'from', 'to' ,'bcc', 'cc', 'subject', 'body'], 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'User' => array(self::BELONGS_TO, 'User', 'user_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'to' => Yii::t('app', 'To'),
            'from' => Yii::t('app', 'From'),
            'subject' => Yii::t('app', 'Subject'),
            'cc' => Yii::t('app', 'cc'),
            'bcc' => Yii::t('app', 'Bcc'),
            'body' => Yii::t('app', 'Body'),
            'files' => Yii::t('app', 'Files'),
            'create' => Yii::t('app', 'Create Date'),
            'user_id' => Yii::t('app', 'User'),
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search($params) {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('to', $this->to, true);
        $criteria->compare('from', $this->from, true);
        $criteria->compare('subject', $this->subject, true);
        $criteria->compare('cc', $this->cc, true);
        $criteria->compare('bcc', $this->bcc, true);


        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
