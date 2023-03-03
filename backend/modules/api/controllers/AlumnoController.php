<?php

namespace backend\modules\api\controllers;

class AlumnoController extends \yii\web\Controller
{
    public function actionIndex()
    {
        echo 'Hola aqui estoy'; exit;
        return $this->render('index');
    }

}
