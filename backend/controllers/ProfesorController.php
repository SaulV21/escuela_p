<?php

namespace backend\controllers;

use backend\models\Profesor;
use backend\models\ProfesorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use backend\models\validaciones;
use common\models\User;
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
//apirest
//BUSCAR DATOS PROFESOR
public function actionBuscar($prof)
{
    // if (Yii::$app->user->isGuest) {
    //     return $this->redirect(['site/login']);
    // }
    $model=Profesor::find()->select(["CEDULA","NOMBRES","DESCRIPCION","DIRECCION","TELEFONO","FECHA_NACIMIENTO","FOTO","CORREO","CLAVE","HOJAVIDA","AREA","ESTADO"])
        ->where(["PROFESOR"=>$prof])->asArray()->one();
    return json_encode($model);
}

public function actionListar()
{
    $model=Profesor::find()->select(["CEDULA","NOMBRES","DESCRIPCION","DIRECCION","TELEFONO","FECHA_NACIMIENTO","FOTO","CORREO","CLAVE","HOJAVIDA","AREA","ESTADO"])
    ->asArray()->all();
    return json_encode($model);
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

        $this->guardar($model);
       
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
        $model = Profesor::findOne(['PROFESOR' => $PROFESOR]);

    if (!$model) {
        throw new NotFoundHttpException('El profesor no existe.');
    }

    if ($this->request->isPost) {
        $model->load($this->request->post());
        $model->archivo = UploadedFile::getInstance($model, 'archivo');
        $model->documento = UploadedFile::getInstance($model, 'documento');

        // Verificar si se cargaron nuevos archivos
        if ($model->archivo && $model->documento) {
            // Eliminar archivos antiguos si ya existen
            if (file_exists($model->FOTO)) {
                unlink($model->FOTO);
            }
            if (file_exists($model->HOJAVIDA)) {
                unlink($model->HOJAVIDA);
            }

            // Generar nombres únicos para los archivos
            $imageName = uniqid() . '.' . $model->archivo->extension;
            $docName = uniqid() . '.' . $model->documento->extension;

            // Crear la carpeta 'uploads' si no existe
            $uploadDir = 'uploads/';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            // Crear la carpeta 'hojavida' si no existe
            $hojaVidaDir = 'hojavida/';
            if (!file_exists($hojaVidaDir)) {
                mkdir($hojaVidaDir, 0777, true);
            }

            // Guardar los nuevos archivos
            $model->archivo->saveAs($uploadDir . $imageName);
            $model->documento->saveAs($hojaVidaDir . $docName);

            // Actualizar los nombres de los archivos en el modelo
            $model->FOTO = $uploadDir . $imageName;
            $model->HOJAVIDA = $hojaVidaDir . $docName;
        }

        // Validar y guardar el modelo
        if ($model->save(false)) {
            Yii::$app->session->setFlash('success', 'El profesor ha sido actualizado exitosamente.');
            return $this->redirect(['view', 'PROFESOR' => $model->PROFESOR]);
        } else {
            Yii::$app->session->setFlash('error', 'Ocurrió un error al guardar el profesor.');
        }
    }

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
        //$model=$this->findModel($PROFESOR);
        $this->findModel($PROFESOR)->delete();

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

    
        //
public function guardar(Profesor $model){

    if ($this->request->isPost) {
        $model->load($this->request->post());
        $model->archivo = UploadedFile::getInstance($model, 'archivo');
        $model->documento = UploadedFile::getInstance($model, 'documento');

        // Verificar si se cargaron los archivos correctamente
        if ($model->archivo && $model->documento) {
            // Verificar que los archivos sean de imagen y de documento, respectivamente
            if ($model->archivo->type !== 'image/jpeg' && $model->archivo->type !== 'image/png') {
                Yii::$app->session->setFlash('error', 'El archivo debe ser de tipo JPEG o PNG');
                return $this->redirect(['create']);
            }
            if ($model->documento->type !== 'application/pdf') {
                Yii::$app->session->setFlash('error', 'El documento debe ser de tipo PDF');
                return $this->redirect(['create']);
            }

            // Crear la carpeta 'uploads' si no existe
            $uploadDir = 'uploads/';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            // Crear la carpeta 'hojavida' si no existe
            $hojaVidaDir = 'hojavida/';
            if (!file_exists($hojaVidaDir)) {
                mkdir($hojaVidaDir, 0777, true);
            }

            // Generar nombres únicos para los archivos
            $imageName = uniqid() . '.' . $model->archivo->extension;
            $docName = uniqid() . '.' . $model->documento->extension;

            // Eliminar archivos antiguos si ya existen
            if (file_exists($model->FOTO)) {
                unlink($model->FOTO);
            }
            if (file_exists($model->HOJAVIDA)) {
                unlink($model->HOJAVIDA);
            }

            // Guardar los nuevos archivos
            $model->archivo->saveAs($uploadDir . $imageName);
            $model->documento->saveAs($hojaVidaDir . $docName);

            // Actualizar los nombres de los archivos en el modelo
            $model->FOTO = $uploadDir . $imageName;
            $model->HOJAVIDA = $hojaVidaDir . $docName;

            // Validar y guardar el modelo
            if ($model->save(false)) {
                Yii::$app->session->setFlash('success', 'El profesor ha sido creado exitosamente.');
                return $this->redirect(['view', 'PROFESOR' => $model->PROFESOR]);
            } else {
                Yii::$app->session->setFlash('error', 'Ocurrió un error al guardar el profesor.');
            }
        } else {
            if ($model->save(false)) {
                Yii::$app->session->setFlash('success', 'El profesor ha sido creado exitosamente.');
                return $this->redirect(['view', 'PROFESOR' => $model->PROFESOR]);
        }}
    }

    return $this->render('create', [
        'model' => $model,
    ]);
}

}
