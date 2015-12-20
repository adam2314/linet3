<?php

/* * *********************************************************************************
 * The contents of this file are subject to the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * ("License"); You may not use this file except in compliance with the GNU AFFERO GENERAL PUBLIC LICENSE Version 3
 * The Original Code is:  Linet 3.0 Open Source
 * The Initial Developer of the Original Code is Adam Ben Hur.
 * All portions are Copyright (C)  Adam Ben Hur.
 * 
 * @author adam
 * 
 * All Rights Reserved.
 * ********************************************************************************** */

$script1 = "
    function deleteEav(str){
   			$('#properties_V_'+str).parent().parent().remove();
   			//$('#properties_V_'+str).parent().parent().css('background', 'yellow');
    		//alert(str);
    	}
    		
    	function newEav(){
    		var uid = $('#properties_eav_I').val();
                var input1 = '$select';
                var input2 = '<input id=\"properties_V_'+uid+'\" type=\"text\" value=\"\" name=\"propertiesV['+uid+']\" />';
    		var template = '<tr><td>'+input1+'</td><td>'+input2+'</td><td><a href=\'javascript:deleteEav(\"'+uid+'\");\'><i class=\"glyphicon glyphicon-remove\"></i></a></td></tr>';

                $('#eavProp').append(template);
    	}

    ";

$script = "
    
   		
            
        $(document).on('change','.eav',
            function(e) {
                console.log($(this).val());
                console.log(this.id.replace('AccountseavE[','').replace(']',''));
                //$('#accType').val(this.id.replace(',''));
                
                var href = '" . \yii\helpers\BaseUrl::base() . ('/eavFields/ajax') . "/' + $(this).val();
                var td=$(this).parent().next();
                //console.log(this);
                
                $.post(href, function(data) {
                console.log(td);
                    data=data.replace('Settings_','properties_V_').replace('_value','');
                    data=data.replace('Settings[','propertiesV[').replace('[value]','');
                   td.html(data);//data;
                    
                    
                });
                // console.log(data.responseText);
                //$(this).parent().next().html(data.responseText);//.next();

                
                //window.location ='/'+ $('#accType').val();
                //return false;
                
            }
        );
    ";
$this->registerJs($script, \yii\web\View::POS_READY);
$this->registerJs($script1, \yii\web\View::POS_END);

echo '
		<table class="table" >
			<tr>
				
				<td>' . Yii::t('app', 'property') . '</td>
				<td>' . Yii::t('app', 'value') . '</td>
				<td>' . Yii::t('app', 'action') . '</td>
			</tr>
			<tbody id="eavProp">
		';
//var_dump($attr);
//exit;
foreach ($attr as $att) {
    //$this->attributeField.', '.$this->valueField
    $key = $att[$model->attributeField];
    $value = $att[$model->valueField];
    $eav = \app\models\EavFields::findOne($key);
    $name1 = "NA";
    if (!is_null($eav))
        $name1 = $eav->name;


    echo "<tr>
				
				<td><input id=\"properties_E_$key\" type='hidden' value='$key' name=\"propertiesE[$key]\" />$name1</td>
				<td><input id=\"properties_V_$key\" type='text' value='$value' name=\"propertiesV[$key]\" /></td>
				<td>
                                        <a href='javascript:deleteEav(\"$key\");'><i class='glyphicon glyphicon-remove'></i></a>
					<!--/**<a href='javascript:editEav(\"$key\");'><img src='" . \yii\helpers\BaseUrl::base() . "/assets/5ac26951/gridview/update.png'></a>**/-->
				</td>
			</tr>";
}

echo "<tbody>
				<tfoot>
					<tr class='sum'>
					
						<td></td>
						<td></td>
						<td><input id='properties_eav_I' type='hidden' value='0' name='eavI' /><a href='javascript:newEav();'>" . Yii::t('app', 'Add new field') . "</a></td>
					</tr>
				</tfoot>
			</table>
		
		
		";
