<?php

namespace backend\controllers;
use frontend\models\Notas;
use frontend\models\NotasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use yii\web\Response;

class NotasController extends \yii\web\Controller
{
    //Desactivamos la verificacion para la validacion
    public $enableCsrfValidation=false;

    public function actionIndex()
    {
        return $this->render('index');
    }

    //BUSCAR DATOS notas
public function actionBuscar($not)
{
    $model=Notas::find()->select(["MATRICULA","MATERIA","QUIM1","QUIM2","TOTAL","PROMF","EQUIV","SUM_TOT","PROM_GE","SUPLETORIO","REMEDIAL","GRACIA","PROMOCION"])
        ->where(["MATRICULA"=>$not])->asArray()->one();
    return json_encode($model);
}

public function actionListar()
{
    $model=Notas::find()->select(["MATRICULA","MATERIA","QUIM1","QUIM2","TOTAL","PROMF","EQUIV","SUM_TOT","PROM_GE","SUPLETORIO","REMEDIAL","GRACIA","PROMOCION"])
    ->asArray()->all();
    return json_encode($model);
}

////////////
public function actionCrear()
{
    $request = Yii::$app->request;
    $response = Yii::$app->response;
    $response->format = Response::FORMAT_JSON;

    $model = new Notas();

    if ($request->isPost) {
        $data = json_decode($request->getRawBody(), true);
        $model->attributes = $data;
        if ($model->validate() && $model->save()) {
            $response->statusCode = 201; // Created
            return [
                'status' => 'success',
                'message' => 'Las notas se registraron exitosamente',
                'data' => $model,
            ];
        } else {
            $response->statusCode = 400; // Bad Request
            return [
                'status' => 'error',
                'message' => 'No se pudo crear el registro',
                'errors' => $model->errors,
            ];
        }
    } else {
        $response->statusCode = 405; // Method Not Allowed
        return [
            'status' => 'error',
            'message' => 'Sólo se permiten solicitudes POST en esta acción',
        ];
    }
}
///////////
public function actionActualizar($matri, $mate)
{
    $request = Yii::$app->request;
    $response = Yii::$app->response;
    $response->format = Response::FORMAT_JSON;

    $model = $this->findModel($matri, $mate);

    if ($request->isPut) {
        $data = json_decode($request->getRawBody(), true);
        $model->attributes = $data;
        if ($model->save()) {
            $response->statusCode = 200; // OK
            return [
                'status' => 'success',
                'message' => 'Registro actualizado exitosamente',
                'data' => $model,
            ];
        } else {
            $response->statusCode = 400; // Bad Request
            return [
                'status' => 'error',
                'message' => 'No se pudo actualizar el registro',
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

    protected function findModel($MATRICULA, $MATERIA)
    {
        if (($model = Notas::findOne(['MATRICULA' => $MATRICULA, 'MATERIA' => $MATERIA])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
