<?php

namespace backend\controllers;
use frontend\models\Asistencia;
use frontend\models\AsistenciaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use backend\models\Matriculas;
use Yii;
use yii\data\ActiveDataProvider;
use backend\models\Alumnos;
use yii\web\Response;

class AsistenciaController extends \yii\web\Controller
{
    //Desactivamos la verificacion para la validacion
    public $enableCsrfValidation=false;

    public function actionIndex()
    {
        return $this->render('index');
    }

    //BUSCAR asistencias
public function actionBuscar($asis)
{
    $model=Asistencia::find()->select(["ALUMNO","MATRICULA","fecha","asiste"])
        ->where(["ALUMNO"=>$asis])->asArray()->one();
    return json_encode($model);
}

public function actionListar()
{
    $model=Asistencia::find()->select(["ALUMNO","MATRICULA","fecha","asiste"])
    ->asArray()->all();
    return json_encode($model);
}

////////////
public function actionCrear()
{
    $request = Yii::$app->request;
    $response = Yii::$app->response;
    $response->format = Response::FORMAT_JSON;

    $model = new Asistencia();

    if ($request->isPost) {
        $data = json_decode($request->getRawBody(), true);
        $model->attributes = $data;
        if ($model->validate() && $model->save()) {
            $response->statusCode = 201; // Created
            return [
                'status' => 'success',
                'message' => 'La asistencia se creo exitosamente',
                'data' => $model,
            ];
        } else {
            $response->statusCode = 400; // Bad Request
            return [
                'status' => 'error',
                'message' => 'No se pudo crear la asistencia',
                'errors' => $model->errors,
            ];
        }
    } else {
        $response->statusCode = 405; // Método no permitido
        return [
            'status' => 'error',
            'message' => 'Sólo se permiten solicitudes POST en esta acción',
        ];
    }
}
///////////
public function actionActualizar($alum, $mat)
{
    $request = Yii::$app->request;
    $response = Yii::$app->response;
    $response->format = Response::FORMAT_JSON;

    $model = $this->findModel($alum, $mat);

    if ($request->isPut) {
        $data = json_decode($request->getRawBody(), true);
        $model->attributes = $data;
        if ($model->save()) {
            $response->statusCode = 200; // OK
            return [
                'status' => 'success',
                'message' => 'Asistencia actualizada exitosamente',
                'data' => $model,
            ];
        } else {
            $response->statusCode = 400; // Bad Request
            return [
                'status' => 'error',
                'message' => 'No se pudo actualizar la asistencia',
                'errors' => $model->errors,
            ];
        }
    } else {
        $response->statusCode = 405; // Method Not Allowed
        return [
            'status' => 'error',
            'message' => 'Sólo se permiten solicitudes PUT en esta acción',
        ];
    }
}

    protected function findModel($ALUMNO, $MATRICULA)
    {
        if (($model = Asistencia::findOne(['ALUMNO' => $ALUMNO, 'MATRICULA' => $MATRICULA])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
