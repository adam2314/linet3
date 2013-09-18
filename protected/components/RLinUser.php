<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class RLinUser extends RWebUser{
    
    public function getLanguage(){
		$user=User::model()->findByPk($this->id);
                if($user)
                    return $user->language;
                else 
                    return Yii::app()->language;
	}
}

?>
