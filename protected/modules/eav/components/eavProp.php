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
        $htmlOptions=array ( );
        $select=CHtml::dropDownList($this->name.'_E_', 0, $list, $htmlOptions );
        $select=str_replace("\n","",$select);
        $select=str_replace($this->name.'_E_',$this->name."eavE['+uid+']",$select);
    	echo "
    <script>
   		function deleteEav(str){
   			$('#{$this->name}_V_'+str).parent().parent().remove();
   			//$('#{$this->name}_V_'+str).parent().parent().css('background', 'yellow');
    		//alert(str);
    	}
    		
    	function newEav(){
    		var uid = $('#{$this->name}_eav_I').val();
    		//alert(uid);
    		//var input1 = '<input id=\"{$this->name}_E_'+uid+'\" type=\"text\" value=\"\" name=\"{$this->name}eavE['+uid+']\" />';
    		//var input1 = '<select name=\"{$this->name}_E_'+uid+'\" id=\"{$this->name}_E_'+uid+'\"></select>';
                var input1 = '$select';
                var input2 = '<input id=\"{$this->name}_V_'+uid+'\" type=\"text\" value=\"\" name=\"{$this->name}eavV['+uid+']\" />';
    		var template = '<tr><td>'+input1+'</td><td>'+input2+'</td><td>remove</td></tr>';
			//var place = $(this).parents('.templateFrame:first').children('.templateTarget');
			//var i = place.find('.rowIndex').length>0 ? place.find('.rowIndex').max()+1 : 0;
			//template=template.replace(/ABC/g, i);

			
			$('#eavProp').append(template);
			$('#{$this->name}_eav_I').val(+1)
			// start specific commands

			// end specific commands
		
    	}
    </script>";
		echo '
		<table>
			<tr>
				
				<td>prop</td>
				<td>value</td>
				<td>action</td>
			</tr>
			<tbody id="eavProp">
		';
		foreach($this->attr as $key=>$value) {
			echo "<tr>
				
				<td><input id=\"{$this->name}_E_$key\" type='hidden' value='$key' name=\"{$this->name}eavE[$key]\" />$key</td>
				<td><input id=\"{$this->name}_V_$key\" type='text' value='$value' name=\"{$this->name}eavV[$key]\" /></td>
				<td>
					<a href='javascript:deleteEav(\"$key\");'><img src='".Yii::app()->request->baseUrl."/assets/5ac26951/gridview/delete.png'></a>
					<!--/**<a href='javascript:editEav(\"$key\");'><img src='".Yii::app()->request->baseUrl."/assets/5ac26951/gridview/update.png'></a>**/-->
				</td>
			</tr>";
		}
			
		echo	'<tbody>
				<tfoot>
					<tr class="sum">
					
						<td></td>
						<td></td>
						<td><input id="'.$this->name.'_eav_I" type="hidden" value="0" name="eavI" /><a href=\'javascript:newEav();\'>new</a></td>
					</tr>
				</tfoot>
			</table>
		
		
		';
	
		
		
		
    }
}