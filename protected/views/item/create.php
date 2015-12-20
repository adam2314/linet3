<?php

$this->params["menu"] = [

    //['label' => Yii::t('app', 'List Item'), 'url' => ['admin'],],
    ['label' => Yii::t('app', 'Manage Item'), 'url' => ['admin'],],
];
?>


<?php

echo $this->render('_form', array(
    'model' => $model,
        //'units'=>$units,
        //'cat'=>$cat
));
?>