<?php

namespace backend\controllers;

use backend\models\Materias;
use backend\models\MateriaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MateriaController implements the CRUD actions for Materias model.
 */
class MateriaController extends Controller
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

     //BUSCAR DATOS MATERIA
public function actionBuscar($mat)
{

    $model=Materias::find()->select(["NOMBRE","DESCRIPCION","HORAS","NIVEL","TIPO","ABREVIATURA","PRIORIDAD","AREA"])
        ->where(["MATERIA"=>$mat])->asArray()->one();
    return json_encode($model);
}

public function actionListar()
{
    $model=Materias::find()->select(["NOMBRE","DESCRIPCION","HORAS","NIVEL","TIPO","ABREVIATURA","PRIORIDAD","AREA"])
    ->asArray()->all();
    return json_encode($model);
}

    /**
     * Lists all Materias models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MateriaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Materias model.
     * @param string $MATERIA Materia
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($MATERIA)
    {
        return $this->render('view', [
            'model' => $this->findModel($MATERIA),
        ]);
    }

    /**
     * Creates a new Materias model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Materias();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
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
     * Updates an existing Materias model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $MATERIA Materia
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($MATERIA)
    {
        $model = $this->findModel($MATERIA);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Materias model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $MATERIA Materia
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($MATERIA)
    {
        $this->findModel($MATERIA)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Materias model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $MATERIA Materia
     * @return Materias the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($MATERIA)
    {
        if (($model = Materias::findOne(['MATERIA' => $MATERIA])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
