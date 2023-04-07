<?php

namespace frontend\controllers;
use yii2mod\editable\EditableAction;
use kartik\grid\EditableColumn;
use frontend\models\Notasql;
use frontend\models\NotasqlSearch;
use backend\models\Materias;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\data\ActiveDataProvider;
use Yii;
use yii\data\Pagination;
use yii\data\SqlDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Response;
use backend\models\Profesor;
use kartik\editable\Editable;
use yii\helpers\Url;
/**
 * NotasqlController implements the CRUD actions for Notasql model.
 */
class NotasqlController extends Controller
{
    public $criterio;
    //Desactivamos la verificacion para la validacion
    public $enableCsrfValidation=false;

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
//BUSCAR DATOS notas
public function actionBuscar($nota)
{
    $model=Notasql::find()->select(["MATRICULA","MATERIA","P1Q1","P2Q1","EQUIV80","EV_QUIM","EQUIV20","PROM_QUI","EQ_CUAL","COMP","NF"])
        ->where(["ID_NOTAS"=>$nota])->asArray()->one();
    return json_encode($model);
}

public function actionListar()
{
    $model=Notasql::find()->select(["MATRICULA","MATERIA","P1Q1","P2Q1","EQUIV80","EV_QUIM","EQUIV20","PROM_QUI","EQ_CUAL","COMP","NF"])
    ->asArray()->all();
    return json_encode($model);
}

////////////
public function actionCrear()
{
    $request = Yii::$app->request;
    $response = Yii::$app->response;
    $response->format = Response::FORMAT_JSON;

    $model = new Notasql();

    if ($request->isPost) {
        $data = json_decode($request->getRawBody(), true);
        $model->attributes = $data;
        if ($model->validate() && $model->save()) {
            $response->statusCode = 201; // Created
            return [
                'status' => 'success',
                'message' => 'Registro creado exitosamente',
                'data' => $model,
            ];
        } else {
            $response->statusCode = 400; // Bad Request
            return [
                'status' => 'error',
                'message' => 'No se pudo crear el registro',
                'errors' => $model->errors,
            ];
        }
    } else {
        $response->statusCode = 405; // Method Not Allowed
        return [
            'status' => 'error',
            'message' => 'Sólo se permiten solicitudes POST en esta acción',
        ];
    }
}
///////////
public function actionActualizar($matri, $mate)
{
    $request = Yii::$app->request;
    $response = Yii::$app->response;
    $response->format = Response::FORMAT_JSON;

    $model = $this->findModel($matri, $mate);

    if ($request->isPut) {
        $data = json_decode($request->getRawBody(), true);
        $model->attributes = $data;
        if ($model->save()) {
            $response->statusCode = 200; // OK
            return [
                'status' => 'success',
                'message' => 'Registro actualizado exitosamente',
                'data' => $model,
            ];
        } else {
            $response->statusCode = 400; // Bad Request
            return [
                'status' => 'error',
                'message' => 'No se pudo actualizar el registro',
                'errors' => $model->errors,
            ];
        }
    } else {
        $response->statusCode = 405; // Method Not Allowed
        return [
            'status' => 'error',
            'message' => 'Sólo se permiten solicitudes PUT en esta acción',
        ];
    }
}

    /**
     * Lists all Notasql models.
     *
     * @return string
     */
    // public function actionIndex()
    // {
       
    //     $model = new NotasqlSearch();
    //     $dataProvider = $model->search(Yii::$app->request->queryParams);
    
    //     $materias = Materias::find()->all();
    //     $materias = ArrayHelper::map($materias, 'MATERIA', 'NOMBRE');
    
    //     return $this->render('index', [
    //         'model' => $model,
    //         'dataProvider' => $dataProvider,
    //         'materias' => $materias,
    //     ]);
       
    // }

    public function actionIndex($criterio)
    {
        $profesor= Profesor::findOne(['CEDULA' => Yii::$app->user->identity->username]);
        $profe=Profesor::find()->select('PROFESOR')->where(['CEDULA'=>$profesor->CEDULA])->scalar();
        $this->criterio=$criterio;
                      $dataProvider = new SqlDataProvider([
                        'sql'=>"SELECT  COUNT(DISTINCT a.alumno) AS total, a.alumno, a.nombres, a.apellidos, n.materia,
                        COALESCE(ns.p1q1, '0.0') AS '1 parcial', COALESCE(ns.p2q1, '0.0') AS '2 parcial', COALESCE(ns.equiv80, '0.0') AS equiv80, 
                        COALESCE(ns.ev_quim, '0.0') AS 'Examen', COALESCE(ns.equiv20, '0.0') AS equiv20,
                        COALESCE(ns.prom_qui, '0.0') AS 'Promedio', COALESCE(ns.eq_cual, 'NAAR') AS eq_cual, COALESCE(ns.comp, 'E') AS 'Comportamiento', 
                        COALESCE(ns.nf, '0.0') AS 'Nota Final'
                        FROM alumnos a 
                        INNER JOIN matriculas m ON a.ALUMNO = m.ALUMNO
                        INNER JOIN materiasxcurso n ON n.CURSO = m.CURSO
                        INNER JOIN profesores p ON n.PROFESOR = p.PROFESOR
                        LEFT JOIN notasql ns ON m.numeromatricula = ns.matricula AND n.MATERIA=ns.MATERIA
                        WHERE m.CURSO = :criterio AND p.PROFESOR=:prof
                        GROUP BY m.numeromatricula, a.alumno, a.nombres, a.apellidos, n.materia, ns.p1q1, ns.p2q1, ns.equiv80, ns.ev_quim, ns.equiv20,
                        ns.prom_qui, ns.eq_cual, ns.comp, ns.nf
                        ORDER BY a.apellidos",
            'params' => [':criterio' => $criterio, ':prof'=>$profe],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'criterio' => $criterio,
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



public function actionMateria($category_id)
{
    $dataProvider = new ActiveDataProvider([
        'query' => Materias::find()->where(['MATERIA' => $category_id])->all(),
        'pagination' => false,
    ]);
    
    return $this->renderPartial('_item_table', [
        'dataProvider' => $dataProvider,
    ]);
}

public function actionList($id){
    $countMats=Materias::find()
    ->where(['MATERIA'=>$id])
    ->count();

    $Mats=Materias::find()
    ->where(['MATERIA'=>$id])
    ->all();
}
public function actionMat()
{
    $category_id = Yii::$app->request->get('NotasqlSearch')['MATERIA'];
    $items = Item::find()->where(['MATERIA' => $category_id])->all();

    return $this->renderPartial('_items', [
        'items' => $items,
    ]);
}

public function actionEditable($id)
{
    $model = $this->findModel($id);

    if (Yii::$app->request->post('hasEditable')) {
        $nota = Yii::$app->request->post('editableAttribute');
        $valor = Yii::$app->request->post('Notasql')[$nota];

        // Validar el valor y actualizar el modelo
        if ($valor < 0 || $valor > 20) {
            return Json::encode(['output' => '', 'message' => 'La nota debe estar entre 0 y 20.']);
        } else {
            $model->$nota = $valor;
            $model->save();
            return Json::encode(['output' => $valor, 'message' => '']);
        }
    }

    return $this->render('editable', [
        'model' => $model,
    ]);
}

public function actions()
    {
        return [
            'editable' => [
                'class' => EditableAction::class,
                'modelClass' => Notasql::class, // Clase de modelo correspondiente a la tabla de notas
            ],
        ];
    }
}
