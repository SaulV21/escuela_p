<?php

namespace backend\controllers;

use backend\models\MateriaCurso;
use backend\models\MateriacursoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MateriacursoController implements the CRUD actions for MateriaCurso model.
 */
class MateriacursoController extends Controller
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
     * Lists all MateriaCurso models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MateriacursoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MateriaCurso model.
     * @param string $CURSO Curso
     * @param string $MATERIA Materia
     * @param string $PERIODO Periodo
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($CURSO, $MATERIA, $PERIODO)
    {
        return $this->render('view', [
            'model' => $this->findModel($CURSO, $MATERIA, $PERIODO),
        ]);
    }

    /**
     * Creates a new MateriaCurso model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new MateriaCurso();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'CURSO' => $model->CURSO, 'MATERIA' => $model->MATERIA, 'PERIODO' => $model->PERIODO]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MateriaCurso model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $CURSO Curso
     * @param string $MATERIA Materia
     * @param string $PERIODO Periodo
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($CURSO, $MATERIA, $PERIODO)
    {
        $model = $this->findModel($CURSO, $MATERIA, $PERIODO);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'CURSO' => $model->CURSO, 'MATERIA' => $model->MATERIA, 'PERIODO' => $model->PERIODO]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MateriaCurso model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $CURSO Curso
     * @param string $MATERIA Materia
     * @param string $PERIODO Periodo
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($CURSO, $MATERIA, $PERIODO)
    {
        $this->findModel($CURSO, $MATERIA, $PERIODO)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MateriaCurso model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $CURSO Curso
     * @param string $MATERIA Materia
     * @param string $PERIODO Periodo
     * @return MateriaCurso the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($CURSO, $MATERIA, $PERIODO)
    {
        if (($model = MateriaCurso::findOne(['CURSO' => $CURSO, 'MATERIA' => $MATERIA, 'PERIODO' => $PERIODO])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
