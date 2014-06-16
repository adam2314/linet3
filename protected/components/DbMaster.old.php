<?php

class DbMaster {

    public function open() {
        try {
            parent::open();
        } catch (CDbException $e) {
            //reset db access
            //
            
            if (Yii::app()->params['newInstall']) {
                //echo "blat";


                Yii::app()->request->redirect('install');
            }
        }
    }

    

}
