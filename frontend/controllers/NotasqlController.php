<?php

namespace frontend\controllers;

use frontend\models\Notasql;
use frontend\models\NotasqlSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
/**
 * NotasqlController implements the CRUD actions for Notasql model.
 */
class NotasqlController extends Controller
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
     * Lists all Notasql models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new NotasqlSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        // $dataProvider = new Query;
        // $dataProvider ->select('A.NOMBRES, A.APELLIDOS')
        // ->from('ALUMNOS A, MATRICULAS M, notasql N')
        // ->where('M.ALUMNO=A.ALUMNO AND
        // N.MATRICULA=M.NUMEROMATRICULA');
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Notasql model.
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
     * Creates a new Notasql model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Notasql();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'MATRICULA' => $model->MATRICULA, 'MATERIA' => $model->MATERIA]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Notasql model.
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
            return $this->redirect(['view', 'MATRICULA' => $model->MATRICULA, 'MATERIA' => $model->MATERIA]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Notasql model.
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
     * Finds the Notasql model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $MATRICULA Matricula
     * @param string $MATERIA Materia
     * @return Notasql the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($MATRICULA, $MATERIA)
    {
        if (($model = Notasql::findOne(['MATRICULA' => $MATRICULA, 'MATERIA' => $MATERIA])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actions()
{
    return [
        'change-username' => [
            'class' => EditableAction::class,
            'modelClass' => UserModel::class,
        ],
    ];
}
}
