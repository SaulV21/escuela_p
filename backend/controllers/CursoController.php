<?php

namespace backend\controllers;

use backend\models\Cursos;
use backend\models\CursoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CursoController implements the CRUD actions for Cursos model.
 */
class CursoController extends Controller
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
     * Lists all Cursos models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CursoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cursos model.
     * @param string $CURSO Curso
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($CURSO)
    {
        return $this->render('view', [
            'model' => $this->findModel($CURSO),
        ]);
    }

    /**
     * Creates a new Cursos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Cursos();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'CURSO' => $model->CURSO]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Cursos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $CURSO Curso
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($CURSO)
    {
        $model = $this->findModel($CURSO);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'CURSO' => $model->CURSO]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Cursos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $CURSO Curso
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($CURSO)
    {
        $this->findModel($CURSO)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Cursos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $CURSO Curso
     * @return Cursos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($CURSO)
    {
        if (($model = Cursos::findOne(['CURSO' => $CURSO])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
