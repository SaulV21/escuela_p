<?php

namespace backend\controllers;

use backend\models\Alumnos;
use backend\models\AlumnoSearch;
use yii\web\Controller;
use yii\web\Response;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * AlumnoController implements the CRUD actions for Alumnos model.
 */
class AlumnoController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Alumnos models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AlumnoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
//BUSCAR DATOS ALUMNO
public function actionBuscar($est)
{

    $model=Alumnos::find()->select(["CEDULA","NOMBRES","APELLIDOS","FECHA_NACIMIENTO","CIUDAD_NACIMIENTO","SEXO","PADRE","PROFESION_PADRE","MADRE","PROFESION_MADRE","CIUDADRES","DIRECCION","TELEFONO","CONTACTO","REFERENCIA","CORREO","FOTO","SISRES","SISFECHA","CSLTKO"])
        ->where(["ALUMNO"=>$est])->asArray()->one();
    return json_encode($model);
}

public function actionListar()
{
    $model=Alumnos::find()->select(["CEDULA","NOMBRES","APELLIDOS","FECHA_NACIMIENTO","CIUDAD_NACIMIENTO","SEXO","PADRE","PROFESION_PADRE","MADRE","PROFESION_MADRE","CIUDADRES","DIRECCION","TELEFONO","CONTACTO","REFERENCIA","CORREO","FOTO","SISRES","SISFECHA","CSLTKO"])
    ->asArray()->all();
    return json_encode($model);
}

// public function actionCrear()
// {
//     $model = new Alumno();

//     $model->load(Yii::$app->request->post(), '');

//     if ($model->save()) {
//         Yii::$app->response->statusCode = 201; // Created
//         return [
//             'status' => 'success',
//             'message' => 'Alumno creado exitosamente',
//             'data' => $model,
//         ];
//     } else {
//         Yii::$app->response->statusCode = 400; // Bad Request
//         return [
//             'status' => 'error',
//             'message' => 'No se pudo crear el alumno',
//             'errors' => $model->errors,
//         ];
//     }
// }

public function actionCrear()
    {
        $request = Yii::$app->request;
        $response = Yii::$app->response;
        $response->format = Response::FORMAT_JSON;

        if ($request->isPost) {
            $data = json_decode($request->getRawBody(), true);
            $model = new Alumnos();
            $model->attributes = $data;
            if ($model->validate() && $model->save()) {
                $response->statusCode = 201; // Created
                return [
                    'status' => 'success',
                    'message' => 'Alumno creado exitosamente',
                    'data' => $model,
                ];
            } else {
                $response->statusCode = 400; // Bad Request
                return [
                    'status' => 'error',
                    'message' => 'No se pudo crear el alumno',
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
    /**
     * Displays a single Alumnos model.
     * @param string $ALUMNO Alumno
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ALUMNO)
    {
        return $this->render('view', [
            'model' => $this->findModel($ALUMNO),
        ]);
    }

    /**
     * Creates a new Alumnos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Alumnos();
        $this->subirFoto($model);
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Alumnos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $ALUMNO Alumno
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ALUMNO)
    {
        $model = $this->findModel($ALUMNO);

        // if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'ALUMNO' => $model->ALUMNO]);
        // }
         $this->subirFoto($model);

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Alumnos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $ALUMNO Alumno
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ALUMNO)
    {
        $model=$this->findModel($ALUMNO);
        if(file_exists($model->FOTO)){
            unlink($model->FOTO);
        }
        //Eliminamos
        $model->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Alumnos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $ALUMNO Alumno
     * @return Alumnos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ALUMNO)
    {
        if (($model = Alumnos::findOne(['ALUMNO' => $ALUMNO])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function subirFoto(Alumnos $model){
    
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->archivo=UploadedFile::getInstance($model,'archivo');
                if($model->validate()){
                $imageName=$model->ALUMNO;
                    if($model->archivo){
                        if(file_exists($model->FOTO)){
                        unlink($model->FOTO);
                        }
                
                        if($model->archivo->saveAs('uploads/'.time()."_".$imageName.".".$model->archivo->extension)){
                            $model->FOTO='uploads/'.time()."_".$imageName.".".$model->archivo->extension;
                            $model->SISFECHA=date('Y-m-d h:m:s');
                        }
                    }
                }
                if($model->save(false)){
                return $this->redirect(['index']);}
            }
        } else {
            $model->loadDefaultValues();
        }
        return $this->render('create', [
            'model' => $model,
        ]);
        }
}
