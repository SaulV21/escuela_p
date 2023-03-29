<?php

namespace frontend\controllers;

use frontend\models\Asistencia;
use frontend\models\AsistenciaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use backend\models\Matriculas;
use Yii;
use yii\data\ActiveDataProvider;
use backend\models\Alumnos;
use yii\data\SqlDataProvider;
use yii\helpers\VarDumper;

/**
 * AsistenciaController implements the CRUD actions for Asistencia model.
 */
class AsistenciaController extends Controller
{
    public $criterio;
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
    public function actionIndex($criterio)
    {
        $this->criterio=$criterio;
         $dataProvider = new SqlDataProvider([
            'sql' => "SELECT a.alumno, a.nombres, a.apellidos 
                      FROM alumnos a 
                      INNER JOIN matriculas m ON a.ALUMNO = m.ALUMNO 
                      WHERE m.CURSO = :criterio 
                      ORDER BY a.apellidos",
            'params' => [':criterio' => $criterio],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'criterio' => $criterio,
        ]);
    }

    /**
     * Displays a single Asistencia model.
     * @param string $ALUMNO Alumno
     * @param string $MATRICULA Matricula
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ALUMNO, $MATRICULA)
    {
        return $this->render('view', [
            'model' => $this->findModel($ALUMNO, $MATRICULA),
        ]);
    }

    /**
     * Creates a new Asistencia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate1()
    {
        $model = new Asistencia();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'ALUMNO' => $model->ALUMNO, 'MATRICULA' => $model->MATRICULA]);
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
     * @param string $MATRICULA Matricula
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ALUMNO, $MATRICULA)
    {
        $model = $this->findModel($ALUMNO, $MATRICULA);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ALUMNO' => $model->ALUMNO, 'MATRICULA' => $model->MATRICULA]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Asistencia model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $ALUMNO Alumno
     * @param string $MATRICULA Matricula
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ALUMNO, $MATRICULA)
    {
        $this->findModel($ALUMNO, $MATRICULA)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Asistencia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $ALUMNO Alumno
     * @param string $MATRICULA Matricula
     * @return Asistencia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ALUMNO, $MATRICULA)
    {
        if (($model = Asistencia::findOne(['ALUMNO' => $ALUMNO, 'MATRICULA' => $MATRICULA])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


public function actionCreate()
{
    $request = Yii::$app->request;
    // Obtenemos los datos del formulario
    $alumnos = $request->post('asistencia', []);
    $fecha = date('Y-m-d');
    // Recorremos los alumnos y guardamos la asistencia
    foreach ($alumnos as $alumno) {
        $asistencia = new Asistencia();
        $asistencia->ALUMNO = $alumno;
        $matricula = Matricula::findOne(['ALUMNO' => $alumno]);
        $asistencia->MATRICULA =$matricula;
        $asistencia->fecha = $fecha;
        $asistencia->asiste = $request->post("asistencia_$alumno", 'no');
        VarDumper::dump($asistencia);
        if ($asistencia->validate()) {
            $asistencia->save();
        } else {
            var_dump($asistencia->getErrors()); // Revisa los errores de validación
        }
    }
    // Enviamos un mensaje de éxito
    Yii::$app->session->setFlash('success', 'La asistencia se ha guardado correctamente');
    // Redirigimos a la página de inicio
    return $this->redirect(['index', 'criterio' => $request->get('criterio')]);
}

}
