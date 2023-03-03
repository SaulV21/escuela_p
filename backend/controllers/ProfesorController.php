<?php

namespace backend\controllers;

use backend\models\Profesor;
use backend\models\ProfesorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use backend\models\validaciones;
use Yii;
/**
 * ProfesorController implements the CRUD actions for Profesor model.
 */
class ProfesorController extends Controller
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
     * Lists all Profesor models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProfesorSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Profesor model.
     * @param string $PROFESOR Profesor
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($PROFESOR)
    {
        return $this->render('view', [
            'model' => $this->findModel($PROFESOR),
        ]);
    }

    /**
     * Creates a new Profesor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Profesor();

        $this->subirFoto($model);
       
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Profesor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $PROFESOR Profesor
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($PROFESOR)
    {
        $model = $this->findModel($PROFESOR);

        $this->subirFoto($model);

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Profesor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $PROFESOR Profesor
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($PROFESOR)
    {
        $model=$this->findModel($PROFESOR);
        if(file_exists($model->FOTO)){
            unlink($model->FOTO);
        }
        $model->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Profesor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $PROFESOR Profesor
     * @return Profesor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($PROFESOR)
    {
        if (($model = Profesor::findOne(['PROFESOR' => $PROFESOR])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function subirFoto(Profesor $model){
    
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->archivo=UploadedFile::getInstance($model,'archivo');
               // $model->documento=UploadedFile::getInstance($model,'documento');
                if($model->validate()){
                $imageName=$model->PROFESOR;

                //
                $docName=$model->PROFESOR;
                    //if($model->archivo && $model->documento){
                        if($model->archivo){
                        // if(file_exists($model->FOTO) && file_exists($model->HOJAVIDA)){
                        if(file_exists($model->FOTO)){
                        unlink($model->FOTO);
                        //unlink($model->HOJAVIDA);
                        }
        
                        if($model->archivo->saveAs('uploads/'.time()."_".$imageName.".".$model->archivo->extension)){
                       // && $model->documento->saveAs('hojavida/'.time()."_".$docName.".".$model->documento->extension)){
                            $model->FOTO='uploads/'.time()."_".$imageName.".".$model->archivo->extension;
                          //  $model->HOJAVIDA='hojavida/'.time()."_".$docName.".".$model->documento->extension;
                        }
                    }
                }
             
                if ($model->hasErrors('CEDULA')) {
                    Yii::$app->session->setFlash('error', 'La cedula ya esta registrada');
                }elseif($model->save(false)){
                return $this->redirect(['index']);}
            }
        }
            
        
        return $this->render('create', [
            'model' => $model,
        ]);
        }
}
