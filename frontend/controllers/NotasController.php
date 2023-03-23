<?php

namespace frontend\controllers;

use frontend\models\Notas;
use frontend\models\NotasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NotasController implements the CRUD actions for Notas model.
 */
class NotasController extends Controller
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
     * Lists all Notas models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new NotasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $this->actionUpdateNotas();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Notas model.
     * @param int $MATRICULA Matricula
     * @param string $MATERIA Materia
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($MATRICULA, $MATERIA)
    {
        return $this->render('view', [
            'model' => $this->findModel($MATRICULA, $MATERIA),
        ]);
    }

    /**
     * Creates a new Notas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Notas();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                //return $this->redirect(['view', 'MATRICULA' => $model->MATRICULA, 'MATERIA' => $model->MATERIA]);
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Notas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $MATRICULA Matricula
     * @param string $MATERIA Materia
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($MATRICULA, $MATERIA)
    {
        $model = $this->findModel($MATRICULA, $MATERIA);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Notas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $MATRICULA Matricula
     * @param string $MATERIA Materia
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($MATRICULA, $MATERIA)
    {
        $this->findModel($MATRICULA, $MATERIA)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Notas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $MATRICULA Matricula
     * @param string $MATERIA Materia
     * @return Notas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($MATRICULA, $MATERIA)
    {
        if (($model = Notas::findOne(['MATRICULA' => $MATRICULA, 'MATERIA' => $MATERIA])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
//Actualizar notas
public function actionUpdateNotas()
{
//Buscar las notas para actualizarlo
    $notas = Notas::find()
    ->where(['or', ['PROMOCION' => 'APRUEBA'], ['PROMOCION' => '']])
    ->andWhere(['<', 'PROMF', 6])
    ->all();
// Actualizar las notas de los reprobados
    foreach ($notas as $nota) {
    $nota->PROMOCION = 'REPRUEBA';
    $nota->save(false);
    }

//Buscar las notas para actualizarlo
    $notas2 = Notas::find()
    ->where(['or', ['PROMOCION' => 'REPRUEBA'], ['PROMOCION' => '']])
    ->andWhere(['>=', 'PROMF', 6])
    ->all();

// Actualizar las notas de los aprobados
    foreach ($notas2 as $nota2) {
    $nota2->PROMOCION = 'APRUEBA';
    $nota2->save(false);
    }
}
}
