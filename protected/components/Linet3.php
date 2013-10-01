<?php

class Linet3 {
  public static function beginRequest(CEvent $event) {
      if(isset(Yii::app()->user->language))
        Yii::app()->language=Yii::app()->user->language;
      //echo Yii::app()->user->language;
      //exit;
    //set your language, theme, etc here
  }
}