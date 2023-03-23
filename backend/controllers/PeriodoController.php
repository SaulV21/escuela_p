<?php

namespace backend\controllers;

use backend\models\Periodo;
use backend\models\PeriodoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\bootstrap4\Alert;
use Yii;

/**
 * PeriodoController implements the CRUD actions for Periodo model.
 */
class PeriodoController extends Controller
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
     * Lists all Periodo models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PeriodoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $this->actionUpdatePeriodos();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Periodo model.
     * @param string $PERIODO Periodo
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($PERIODO)
    {
        return $this->render('view', [
            'model' => $this->findModel($PERIODO),
        ]);
    }

    /**
     * Creates a new Periodo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Periodo();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                //return $this->redirect(['view', 'PERIODO' => $model->PERIODO]);
                Yii::$app->session->setFlash('success', 'Período creado con éxito.');
                return $this->redirect(['index']);
            }
            // Mostrar el mensaje de notificación si existe
            if(Yii::$app->session->hasFlash('success')){
            echo Alert::widget([
            'options' => [
                'class' => 'alert-success',
            ],
            'body' => Yii::$app->session->getFlash('success'),
    ]);}
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Periodo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $PERIODO Periodo
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($PERIODO)
    {
        $model = $this->findModel($PERIODO);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Período actualizado con éxito.');
            //return $this->redirect(['view', 'PERIODO' => $model->PERIODO]);
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Periodo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $PERIODO Periodo
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($PERIODO)
    {
        $this->findModel($PERIODO)->delete();
        Yii::$app->session->setFlash('success', 'Período eliminado con éxito.');
        return $this->redirect(['index']);
    }

    /**
     * Finds the Periodo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $PERIODO Periodo
     * @return Periodo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($PERIODO)
    {
        if (($model = Periodo::findOne(['PERIODO' => $PERIODO])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
//Actualizar periodos
    public function actionUpdatePeriodos()
{
    // Obtener la fecha actual
    $now = date('Y-m-d');

    // Buscar los periodos que ya han pasado su fecha de fin y están abiertos
    $periodos = Periodo::find()
        ->where(['estado' => 'ABIERTO'])
        ->andWhere(['<', 'Fecha_fin_periodo', $now])
        ->all();
    // Buscar los periodos que ya han pasado su fecha de fin y están abiertos
    $periodab = Periodo::find()
        ->where(['estado' => 'CERRADO'])
        ->andWhere(['>', 'Fecha_fin_periodo', $now])
        ->all();

    // Actualizar el estado de los periodos a cerrado
    foreach ($periodos as $periodo) {
        $periodo->estado = 'CERRADO';
        $periodo->save(false);
    }

    // Actualizar el estado de los periodos a cerrado
    foreach ($periodab as $periodoa) {
        $periodoa->estado = 'ABIERTO';
        $periodoa->save(false);
    }

    echo "Los periodos han sido actualizados.";
}

}
