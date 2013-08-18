<?php
Yii::import("zii.widgets.jui.CJuiAutoComplete");
class JAutoComplete extends CJuiAutoComplete
{
 
    /**
     * Run this widget.
     * This method registers necessary javascript and renders the needed HTML code.
     */
    public function run()
    {
        list($name,$id)=$this->resolveNameID();
 
    // Get ID Attribute of actual hidden field containing selected value
    $attr_id = get_class($this->model).'_'.$this->attribute;
 
        if(isset($this->htmlOptions['id']))
            $id=$this->htmlOptions['id'];
        else
            $this->htmlOptions['id']=$id;
 
        if(isset($this->htmlOptions['name']))
            $name=$this->htmlOptions['name'];
 
        if($this->hasModel()) {
            echo CHtml::textField($name,$this->value,$this->htmlOptions);         
      echo CHtml::activeHiddenField($this->model, $this->attribute);
        }else {
            echo CHtml::textField($name,$this->value,$this->htmlOptions);       
                 //CHtml::hiddenField($name,$this->value,$this->htmlOptions);          
        }
 
        if($this->sourceUrl!==null)
            $this->options['source']=CHtml::normalizeUrl($this->sourceUrl); 
        else
            $this->options['source']=$this->source;
 
    // Modify Focus Event to show label in text field instead of value
    if (!isset($this->options['focus'])) {
      $this->options['focus'] = 'js:function(event, ui) {
          $("#'.$id.'").val(ui.item.label);
          return false;
        }';    
    }
 
    if (!isset($this->options['select'])) {
      $this->options['select'] = 'js:function(event, ui) {
            $("#'.$id.'").val(ui.item.label);
            $("#'.$attr_id.'").val(ui.item.id);
        }';
    }
 
    $options=CJavaScript::encode($this->options);
    //$options = $this->options;
 
        $js = "jQuery('#{$id}').autocomplete($options);";
 
        $cs = Yii::app()->getClientScript();
        $cs->registerScript(__CLASS__.'#'.$id, $js);
    }
}