<?php


namespace adam2314;

use Yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\db\Query;
use yii\helpers\Json;

/**
 * Class EavBehavior
 * @package asdfstudio\eav
 * @property ActiveRecord $owner
 */
class EavBehavior extends Behavior
{
    /**
     * EAV properties
     * @var array
     */
    public $properties = [];
    public $entityField = 'entity';
    public $attributeField = 'attribute';
    public $valueField = 'value';
     public $tableName = null;
    /**
     * Primary key for getting extended attributes
     * @var string
     */
   public $modelPrimaryKey = 'primaryKey';
    /**
     * Table name for storing extended attributes
     * @var string
     */
   

    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_FIND => 'afterFind',
            ActiveRecord::EVENT_AFTER_INSERT => 'afterSave',
            ActiveRecord::EVENT_AFTER_UPDATE => 'afterSave',
            ActiveRecord::EVENT_AFTER_DELETE => 'afterDelete',
        ];
    }

    /**
     * Load all EAV of model
     */
    public function afterFind()
    {
        $properties = [];
        $query = new Query();
        $query->select($this->attributeField.', '.$this->valueField);
        $query->from($this->tableName);
        $query->where([$this->entityField => $this->owner->{$this->modelPrimaryKey}]);

        foreach ($query->all() as $property) {
            $properties[$property[$this->attributeField]] = $property[$this->valueField];//Json::decode()
        }
        $this->properties = $properties;
    }
    
    
    public function getEavAttributes() {
        // Get all attributes if not specified.
        //$properties = [];
        $query = new Query();
        $query->select($this->attributeField.', '.$this->valueField);
        $query->from($this->tableName);
        $query->where([$this->entityField => $this->owner->{$this->modelPrimaryKey}]);

        // Return values.
        return $query->all();
    }
    

    /**
     * Delete all EAV related to model
     */
    protected function deleteAll()
    {
        Yii::$app->db->createCommand()
            ->delete($this->tableName, [$this->entityField => $this->owner->{$this->modelPrimaryKey}])
            ->execute();
    }

    /**
     * Save all EAV
     */
    public function afterSave() 
   {
        $this->deleteAll();
        $properties = [];
        $prop=false;
        //$this->properties=['1'=>"4444"];
        foreach ($this->properties as $name => $value) {
            $prop=true;
            $properties[] = [
                $this->entityField => $this->owner->{$this->modelPrimaryKey},//
                $this->attributeField => $name,
                $this->valueField => $value,
            ];
        }
        if($prop)
        Yii::$app->db->createCommand()
            ->batchInsert($this->tableName, [$this->entityField => $this->entityField, $this->attributeField => $this->attributeField, $this->valueField => $this->valueField], $properties)
            ->execute();
    }

    /**
     * Delete all EAV
     */
    public function afterDelete()
    {
        $this->deleteAll();
    }
}
