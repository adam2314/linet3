<?php

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
class Mail extends CActiveRecord {

    const table = '{{mail}}';

    
    private function mailsend(){
        $mail=Yii::app()->Smtpmail;
        $mail->CharSet = 'utf-8';  
        //$mail->SetFrom($this->from);
        //echo $this->files;
        if($this->files!=''){
            $file=  Files::model()->findByPk($this->files);
            if($file!=null){
                //echo $file->getFullPath().";;".$file->name;
                
                $mail->AddAttachment($file->getFullPath().$file->name);
            }
                    
                    
        }
        //$mail->SetFrom('adam@speedcomp.co.il', 'Adam Ben Hour');
        $mail->SetFrom(Yii::app()->user->settings['company.mail.address']);
        //$mail->AddReplyTo('adam@speedcomp.co.il', 'Adam Ben Hour');
        $mail->AddCC($this->cc);//.$this->cc
        $mail->AddBcc($this->bcc);
        $mail->Subject    = $this->subject;
        $mail->MsgHTML($this->body);
        $mail->AddAddress($this->to, "");
        ///*
        if(!$mail->Send()) {
            //echo "Mailer Error: " . $mail->ErrorInfo;
             throw new CHttpException(501, Yii::t('app', "Mailer Error: "). $mail->ErrorInfo);
        }else {
            Yii::app()->user->setFlash('success', Yii::t('app','Message sent!'));
            //echo "Message sent!";
        }//*/
        
        //Yii::app()->end();
    }
    
    public function save($runValidation = true, $attributes = NULL){
        
        $this->mailsend();
        return parent::save($runValidation = true, $attributes = NULL);
    }
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return BankName the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return self::table;
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id', 'numerical', 'integerOnly' => true),
            array('from, to ,bcc, cc, subject', 'length', 'max' => 255),
            array('from, to ,bcc, cc, subject, text, body, files', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, from, to ,bcc, cc, subject, text, body', 'safe', 'on' => 'search'),
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
            'id' => Yii::t('labels', 'ID'),
            'to' => Yii::t('labels', 'To'),
            'from' => Yii::t('labels', 'From'),
            'subject' => Yii::t('labels', 'Subject'),
            'cc' => Yii::t('labels', 'cc'),
            'bcc' => Yii::t('labels', 'Bcc'),
            'body' => Yii::t('labels', 'Body'),
            'files' => Yii::t('labels', 'Files'),
            'create' => Yii::t('labels', 'Create Date'),
            'user_id' => Yii::t('labels', 'User'),
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
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
