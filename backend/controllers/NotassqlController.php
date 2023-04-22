<?php

namespace backend\controllers;
use frontend\models\Notasql;
use frontend\models\NotasqlSearch;
use backend\models\Materias;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\data\ActiveDataProvider;
use Yii;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use yii\web\Response;

class NotassqlController extends \yii\web\Controller
{
     //Desactivamos la verificacion para la validacion
    public $enableCsrfValidation=false;
    public function actionIndex()
    {
        return $this->render('index');
    }

    //Verificar notas
    public function actionVerificar($matri, $mate)
{
    $model = Notasql::find()->select(['n.matricula', 'n.materia', 'p.periodo'])
        ->from('notasql n')
        ->join('INNER JOIN', 'matriculas m', 'n.matricula=m.numeromatricula')
        ->join('INNER JOIN', 'periodos p', 'm.periodo=p.periodo')
        ->where(['m.NUMEROMATRICULA' => $matri, 'n.MATERIA' => $mate])
        ->asArray()
        ->all();

    if (!empty($model)) {
        return 'true';
    } else {
        return 'false';
    }
}
//BUSCAR DATOS notas
public function actionBuscarnot($matri, $mate)
{
    $model=Notasql::find()->select(["P1Q1","P2Q1","EQUIV80","EV_QUIM","EQUIV20","PROM_QUI","EQ_CUAL","COMP"])
        ->where(["MATRICULA"=>$matri,"MATERIA"=>$mate])->asArray()->one();
    return json_encode($model);
}

public function actionListarnot()
{
    $model=Notasql::find()->select(["MATRICULA","MATERIA","P1Q1","P2Q1","EQUIV80","EV_QUIM","EQUIV20","PROM_QUI","EQ_CUAL","COMP","NF"])
    ->asArray()->all();
    return json_encode($model);
}

////////////
public function actionCrearnot()
{
    $request = Yii::$app->request;
    $response = Yii::$app->response;
    $response->format = Response::FORMAT_JSON;

    $model = new Notasql();

    if ($request->isPost) {
        $data = json_decode($request->getRawBody(), true);
        $model->attributes = $data;
        if ($model->validate() && $model->save()) {
            $response->statusCode = 201; // Created
            return [
                'status' => 'success',
                'message' => 'Registro creado exitosamente',
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
public function actionActualizarnot($matri, $mate)
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
    if (($model = Notasql::findOne(['MATRICULA' => $MATRICULA, 'MATERIA' => $MATERIA])) !== null) {
        return $model;
    }

    throw new NotFoundHttpException('The requested page does not exist.');
}
}
