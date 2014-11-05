<?php

/**
 * This is the model class for table "databasesPerm".
 *
 * The followings are the available columns in table 'databasesPerm':
 * @property integer $id
 * @property string $label
 * @property array $url
 * @property string $icon
 * @property integer $perant
 */
class Menu extends mainRecord {

    const table = 'menu';

    public function primaryKey() {
        return 'id';
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return (self::table);
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id, label, url', 'required'),
            array('id, perant', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, label, url, icon, perant', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => Yii::t('label', 'ID'),
            'label' => Yii::t('label', 'Label'),
            'url' => Yii::t('label', 'Url'),
            'icon' => Yii::t('label', 'Icon'),
            'perant' => Yii::t('label', 'Perant'),
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
        $criteria->compare('label', $this->label);
        $criteria->compare('url', $this->url);
        $criteria->compare('icon', $this->icon);
        $criteria->compare('perant', $this->perant);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return DatabasesPerm the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function buildUserMenu() {
        if (Yii::app()->user->isGuest) {
            return $menu = array(array('label' => Yii::t('app', 'Login'), 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest));
        }
        $known = Menu::model()->findAll(array('order' => 'parent'));
        $menu = array();
        foreach ($known as $item) {
            if ((($item->id == 43) ||($item->id == 43) || ($item->parent == 43)) && (Yii::app()->user->settings['company.doublebook'] == 'false')){
                    continue;
            }
            if ($item->parent == 0) {
                $menu[$item->id] = array('label' => Yii::t('app', $item->label), 'icon' => $item->icon, 'items' => array());
            } else {
                $url = str_replace('/', '.', $item->url);
                if (Yii::app()->user->checkAccess($url)) {//if has access
                    $url = Yii::app()->createAbsoluteUrl('/' . $item->url);
                    $menu[$item->parent]['items'][] = array('label' => Yii::t('app', $item->label), 'url' => $url, 'icon' => $item->icon);
                }
            }
        }
        return $menu;
    }

//end menu
}
