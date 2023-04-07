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

         //BUSCAR DATOS MATERIAxCURSO
public function actionBuscarmxc($curso,$prof)
{

    $model=MateriaCurso::find()->select(['MATERIA'])
    ->where(['CURSO' => $curso, 'PROFESOR'=>$prof])
    ->asArray()
    ->all();
    /*select(["MATERIA","PROFESOR","PERIODO"])
        ->where(["CURSO"=>$mat])->asArray()->all();*/
    return json_encode($model);
}

public function actionListmxc()
{
    $model=MateriaCurso::find()->select(["MATERIA","PROFESOR","PERIODO"])
    ->asArray()->all();
    return json_encode($model);
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
     * @param string $PROFESOR Profesor
     * @param string $PERIODO Periodo
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($CURSO, $MATERIA, $PROFESOR, $PERIODO)
    {
        return $this->render('view', [
            'model' => $this->findModel($CURSO, $MATERIA, $PROFESOR, $PERIODO),
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
                //return $this->redirect(['view', 'CURSO' => $model->CURSO, 'MATERIA' => $model->MATERIA, 'PROFESOR' => $model->PROFESOR, 'PERIODO' => $model->PERIODO]);
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
     * Updates an existing MateriaCurso model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $CURSO Curso
     * @param string $MATERIA Materia
     * @param string $PROFESOR Profesor
     * @param string $PERIODO Periodo
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($CURSO, $MATERIA, $PROFESOR, $PERIODO)
    {
        $model = $this->findModel($CURSO, $MATERIA, $PROFESOR, $PERIODO);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'CURSO' => $model->CURSO, 'MATERIA' => $model->MATERIA, 'PROFESOR' => $model->PROFESOR, 'PERIODO' => $model->PERIODO]);
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
     * @param string $PROFESOR Profesor
     * @param string $PERIODO Periodo
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($CURSO, $MATERIA, $PROFESOR, $PERIODO)
    {
        $this->findModel($CURSO, $MATERIA, $PROFESOR, $PERIODO)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MateriaCurso model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $CURSO Curso
     * @param string $MATERIA Materia
     * @param string $PROFESOR Profesor
     * @param string $PERIODO Periodo
     * @return MateriaCurso the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($CURSO, $MATERIA, $PROFESOR, $PERIODO)
    {
        if (($model = MateriaCurso::findOne(['CURSO' => $CURSO, 'MATERIA' => $MATERIA, 'PROFESOR' => $PROFESOR, 'PERIODO' => $PERIODO])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
