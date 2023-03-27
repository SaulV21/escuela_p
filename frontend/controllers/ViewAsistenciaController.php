<?php
namespace frontend\controllers;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\ViewAsistencia;
use backend\models\Matriculas;
use backend\models\Alumnos;

class ViewAsistenciaController extends \yii\web\Controller
{
    public function actionIndex($criterio)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ViewAsistencia::find()->where(["CURSO"=>$criterio])->orderBy("APELLIDOS"),
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
//
public function actionIndex1($criterio)
    {
        $dataProvider = new SqlDataProvider([
            'sql' => "SELECT a.nombres, a.apellidos 
                      FROM alumnos a 
                      INNER JOIN matriculas m ON a.ALUMNO = m.ALUMNO 
                      WHERE m.CURSO = :criterio 
                      ORDER BY a.apellidos",
            'params' => [':criterio' => $criterio],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
//
public function actionActualizarAsistencia($id, $asiste)
{
    $matri=Matriculas::find(['alumno' => $id])->one();
    $model = Asistencia::find()->where(['alumno' => $id,'matricula'=>$matri, 'fecha' => date('Y-m-d')])->one();
    $model->asistencia = $asiste;
    
    if ($model) {
        if ($asiste === '1') {
            $model->asistencia = 'si';
        } else {
            $model->asistencia = 'no';
        }
        $model->save();
    } else {
        $model = new Asistencia();
        $model->alumno_id = $alumno_id;
        $model->fecha = date('Y-m-d');
        if ($asiste === '1') {
            $model->asistencia = 'si';
        } else {
            $model->asistencia = 'no';
        }
        $model->save();
    }
    
}

}