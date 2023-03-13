<?php
namespace frontend\controllers;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\ViewAsistencia;

class ViewAsistenciaController extends \yii\web\Controller
{
    public function actionIndex($criterio)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ViewAsistencia::find()->where(["CURSO"=>$criterio]),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'ALUMNO' => SORT_DESC,
                    'CURSO' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

}