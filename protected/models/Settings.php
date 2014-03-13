<?php

/**
 * This is the model class for table "config".
 *
 * The followings are the available columns in table 'config':
 * @property string $id
 * @property string $value
 */
class Settings extends basicRecord{
        const table='{{config}}';
	
      public function save($runValidation = true, $attributes = NULL){
          //adam:
          if($this->eavType=='boolean'){
              if($this->value=='true')
                  $this->value='true';
              else 
                  $this->value='false';
              
          }else if($this->eavType=='file'){
                
                
                $yiiBasepath=Yii::app()->basePath;
                $yiiUser=Yii::app()->user->id;
                $configPath=Yii::app()->user->settings["company.path"];
                        
                

                $this->value = CUploadedFile::getInstanceByName('Settings['.$this->id.'][value]');
                

		$ext = $this->value->extensionName;

                $fileName = $yiiBasepath."/files/".$configPath."/settings/".$this->id.".".$ext; 
                if($this->value->saveAs($fileName)){
                    $this->value="/files/".$configPath."/settings/".$this->id.".".$ext;
                }
          }
          return parent::save($runValidation,$attributes);
      }  
        
        
        public function a000($line,$id,$count){
            $rec='';
            
            //get all fields (b110) sort by id
            $criteria=new CDbCriteria;
            $criteria->condition="type_id = :type_id";
            $criteria->params=array(':type_id' => "A000");
            $fields= OpenFormat::model()->findAll($criteria);
            
            //loop strfgy
            foreach ($fields as $field) {
                //$rec.=basicRecord::model()->openfrmtFieldStr($field,$line);
                if($field->id==1004){
                    $rec.=sprintf("%015d",$id);
                    continue;
                }
                if($field->id==1002){
                    $rec.=sprintf("%015d",$count);
                    continue;
                }    
                $rec.=$this->openfrmtFieldStr($field,$line);
            }
            return $rec."\r\n";
    }
        
        public function a100($line,$id){
            $rec='';
            
            //get all fields (b110) sort by id
            $criteria=new CDbCriteria;
            $criteria->condition="type_id = :type_id";
            $criteria->params=array(':type_id' => "A100");
            $fields= OpenFormat::model()->findAll($criteria);
            
            //loop strfgy
            foreach ($fields as $field) {
                //$rec.=basicRecord::model()->openfrmtFieldStr($field,$line);
                if($field->id==1103){
                    $rec.=sprintf("%015d",$id);
                    continue;
                }
                    
                $rec.=$this->openfrmtFieldStr($field,$line);
            }
            return $rec."\r\n";
    }
            
    public function z900($line,$id,$count){
        $rec='';
            
            //get all fields (b110) sort by id
            $criteria=new CDbCriteria;
            $criteria->condition="type_id = :type_id";
            $criteria->params=array(':type_id' => "Z900");
            $fields= OpenFormat::model()->findAll($criteria);
            
            //loop strfgy
            foreach ($fields as $field) {
                if($field->id==1153){
                    $rec.=sprintf("%015d",$id);
                    continue;
                }
                if($field->id==1155){
                    $rec.=sprintf("%015d",$count);
                    continue;
                }
                $rec.=$this->openfrmtFieldStr($field,$line);
            }
            return $rec."\r\n";
    }
    
        public function primaryKey(){
	    return 'id';
	}
        
        /**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Config the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName(){
		return self::table;
	}
        

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, value', 'required'),
			array('id', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
                        array('value', 'safe'),
			array('id, value', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id'=>Yii::t('labels','ID'),
                        'value'=>Yii::t('labels','Value'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('value',$this->value,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}