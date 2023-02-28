<?php

namespace frontend\controllers;

use frontend\models\Asistencia;
use frontend\models\AsistenciaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use backend\models\Matriculas;

/**
 * AsistenciaController implements the CRUD actions for Asistencia model.
 */
class AsistenciaController extends Controller
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
     * Lists all Asistencia models.
     *
     * @return string
     */
    public function actionIndex()
    {
        // $searchModel = new AsistenciaSearch();
        // $dataProvider = $searchModel->search($this->request->queryParams);

        // return $this->render('index', [
        //     'searchModel' => $searchModel,
        //     'dataProvider' => $dataProvider,
        // ]);
        $materia = Yii::$app->request->post('categoria');

        $query = \backend\models\Materias::find()->where(['MATERIA' => $materia]);
    
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
    
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Asistencia model.
     * @param string $ALUMNO Alumno
     * @param string $CURSO Curso
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ALUMNO, $CURSO)
    {
        return $this->render('view', [
            'model' => $this->findModel($ALUMNO, $CURSO),
        ]);
    }

    /**
     * Creates a new Asistencia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Asistencia();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'ALUMNO' => $model->ALUMNO, 'CURSO' => $model->CURSO]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Asistencia model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $ALUMNO Alumno
     * @param string $CURSO Curso
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ALUMNO, $CURSO)
    {
        $model = $this->findModel($ALUMNO, $CURSO);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ALUMNO' => $model->ALUMNO, 'CURSO' => $model->CURSO]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Asistencia model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $ALUMNO Alumno
     * @param string $CURSO Curso
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ALUMNO, $CURSO)
    {
        $this->findModel($ALUMNO, $CURSO)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Asistencia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $ALUMNO Alumno
     * @param string $CURSO Curso
     * @return Asistencia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ALUMNO, $CURSO)
    {
        if (($model = Asistencia::findOne(['ALUMNO' => $ALUMNO, 'CURSO' => $CURSO])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
//Probar
    public function actionItems($category_id)
{
    $dataProvider = new ActiveDataProvider([
        'query' => \backend\models\Matricula::find()->where(['NUMEROMATRICULA' => $category_id]),
        'pagination' => false,
    ]);
    
    return $this->renderPartial('_item_table', [
        'dataProvider' => $dataProvider,
    ]);
}
}
