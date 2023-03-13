<?php

namespace backend\controllers;

use backend\models\Matriculas;
use backend\models\Alumnos;
use backend\models\Periodo;
use backend\models\MatriculaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use Yii;
/**
 * MatriculaController implements the CRUD actions for Matriculas model.
 */
class MatriculaController extends Controller
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
     * Lists all Matriculas models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MatriculaSearch();
       $dataProvider = $searchModel->search($this->request->queryParams);
       $dataProvider2 = new ActiveDataProvider([
        'query' => Alumnos::find(),
    ]);

    // Agregar el nombre completo del alumno a los datos de la tabla
    foreach ($dataProvider2->models as $model) {
        $model->nombreCompleto = $model->NOMBRES . ' ' . $model->APELLIDOS;
    }
        //agrego la instancia de matricula
        //$model = new Matriculas();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'dataProvider2' => $dataProvider2,
            'model'=>$model,
        ]);
    }

    /**
     * Displays a single Matriculas model.
     * @param int $NUMEROMATRICULA Numeromatricula
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($NUMEROMATRICULA)
    {
        return $this->render('view', [
            'model' => $this->findModel($NUMEROMATRICULA),
        ]);
    }

    /**
     * Creates a new Matriculas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Matriculas();

        // if ($this->request->isPost) {
        //     if ($model->load($this->request->post()) && $model->save()) {
        //         return $this->redirect(['view', 'NUMEROMATRICULA' => $model->NUMEROMATRICULA]);
        //     }
        // } else {
        //     $model->loadDefaultValues();
        // }
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $count = Matriculas::find()->where(['ALUMNO' => $model->ALUMNO])->count();
           
            if ($count > 0) {
                Yii::$app->session->setFlash('error', 'El estudiante ya esta matriculado.');
                return $this->refresh();
            }
            if ($model->save()) {
                return $this->redirect(['view', 'NUMEROMATRICULA' => $model->NUMEROMATRICULA]);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Matriculas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $NUMEROMATRICULA Numeromatricula
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($NUMEROMATRICULA)
    {
        $model = $this->findModel($NUMEROMATRICULA);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'NUMEROMATRICULA' => $model->NUMEROMATRICULA]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Matriculas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $NUMEROMATRICULA Numeromatricula
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($NUMEROMATRICULA)
    {
        $this->findModel($NUMEROMATRICULA)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Matriculas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $NUMEROMATRICULA Numeromatricula
     * @return Matriculas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($NUMEROMATRICULA)
    {
        if (($model = Matriculas::findOne(['NUMEROMATRICULA' => $NUMEROMATRICULA])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    // public function getListnombre(){
    //     $model = Alumnos::findOne($id);
    //     return $this->hasOne(Alumnos::className(),['ALUMNO'=>'ALUMNO']);
    // }

}
