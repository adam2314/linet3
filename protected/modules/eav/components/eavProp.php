<?php
class eavProp extends CWidget
{
 
    public $attr = array();
    public $name ='';
    
    public function init()
    {
    	//ob_start();
        //parent::init();
         
    }
 
    /**
     * Display the widget
     * @see CWidget::run()
     */
    public function run(){//style="width:'.($this->width-$this->titlewidth-28).'px;"
    	//$content = ob_get_clean();
        $models = EavFields::model()->findAll(array('order' => 'name'));
        $list = CHtml::listData($models, 'id', 'name');
        $htmlOptions=array ('class'=>'eav' );
        $select=CHtml::dropDownList($this->name.'_E_', 0, $list, $htmlOptions );
        $select=str_replace("\n","",$select);
        $select=str_replace($this->name.'_E_',$this->name."eavE['+uid+']",$select);
    	
                
        $script=        "
    
   		function deleteEav(str){
   			$('#{$this->name}_V_'+str).parent().parent().remove();
   			//$('#{$this->name}_V_'+str).parent().parent().css('background', 'yellow');
    		//alert(str);
    	}
    		
    	function newEav(){
    		var uid = $('#{$this->name}_eav_I').val();
                var input1 = '$select';
                var input2 = '<input id=\"{$this->name}_V_'+uid+'\" type=\"text\" value=\"\" name=\"{$this->name}eavV['+uid+']\" />';
    		var template = '<tr><td>'+input1+'</td><td>'+input2+'</td><td><a href=\'javascript:deleteEav(\"'+uid+'\");\'><i class=\"glyphicon glyphicon-remove\"></i></a></td></tr>';

                $('#eavProp').append(template);
    	}
            
        $('.eav').live('change',
            function(e) {
                console.log($(this).val());
                console.log(this.id.replace('AccountseavE[','').replace(']',''));
                //$('#accType').val(this.id.replace(',''));
                
                var href = '". Yii::app()->createUrl('/eavFields/ajax')."/' + $(this).val();
                var td=$(this).parent().next();
                //console.log(this);
                
                $.post(href, function(data) {
                console.log(td);
                    data=data.replace('Settings_','{$this->name}_V_').replace('_value','');
                    data=data.replace('Settings[','{$this->name}eavV[').replace('[value]','');
                   td.html(data);//data;
                    
                    
                });
                // console.log(data.responseText);
                //$(this).parent().next().html(data.responseText);//.next();

                
                //window.location ='/'+ $('#accType').val();
                //return false;
                
            }
        );
    ";
            Yii::app()->clientScript->registerScript('eav', $script,   CClientScript::POS_HEAD         );
                        
                        
		echo '
		<table class="table" >
			<tr>
				
				<td>' . Yii::t('app','property'). '</td>
				<td>' . Yii::t('app','value'). '</td>
				<td>' . Yii::t('app','action'). '</td>
			</tr>
			<tbody id="eavProp">
		';
		foreach($this->attr as $key=>$value) {
                        $name=EavFields::model()->findByPk($key)->name;
			echo "<tr>
				
				<td><input id=\"{$this->name}_E_$key\" type='hidden' value='$key' name=\"{$this->name}eavE[$key]\" />$name</td>
				<td><input id=\"{$this->name}_V_$key\" type='text' value='$value' name=\"{$this->name}eavV[$key]\" /></td>
				<td>
                                        <a href='javascript:deleteEav(\"$key\");'><i class='glyphicon glyphicon-remove'></i></a>
					<!--/**<a href='javascript:editEav(\"$key\");'><img src='".Yii::app()->request->baseUrl."/assets/5ac26951/gridview/update.png'></a>**/-->
				</td>
			</tr>";
		}
			
		echo	'<tbody>
				<tfoot>
					<tr class="sum">
					
						<td></td>
						<td></td>
						<td><input id="'.$this->name.'_eav_I" type="hidden" value="0" name="eavI" /><a href=\'javascript:newEav();\'>' . Yii::t('app','Add new field'). '</a></td>
					</tr>
				</tfoot>
			</table>
		
		
		';
	
		
		
		
    }
}