<?php

class Linet3 {
  public static function beginRequest(CEvent $event) {
      Yii::app()->language=Yii::app()->user->getLanguage();
      //echo Yii::app()->user->language;
      //exit;
    //set your language, theme, etc here
  }
}