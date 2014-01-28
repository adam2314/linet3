<?php
class DbConnection extends CDbConnection
{
    public function open()
    {
        try {
            parent::open();
        } catch(CDbException $e) {
            //reset db access
           //
            $model=new InstallConfig();
            $model->make();
            
            Yii::app()->request->redirect('install');
        }
    }
}