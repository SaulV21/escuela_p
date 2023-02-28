<?php

namespace frontend\controllers;

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
use yii\helpers\ArrayHelper;
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
       
        /*
        $MATERIA = Yii::$app->request->post('MATERIA');

        $query = \backend\models\Materias::find()->where(['MATERIA' => $MATERIA]);
    
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $query = \backend\models\Alumnos::find();
        $paginas=new Pagination([
            'defaultPageSize'=>10,
            'totalCount'=>$query->count(),
        ]);
        $alumnos=$query->orderBy('NOMBRES')->offset($paginas->offset)
        ->limit($paginas->limit)->all();*/
        //
        // $searchModel = new NotasqlSearch();
        // $dataProvider = $searchModel->search($this->request->queryParams);
        $model = new NotasqlSearch();
        $dataProvider = $model->search(Yii::$app->request->queryParams);
    
        $materias = Materias::find()->all();
        $materias = ArrayHelper::map($materias, 'MATERIA', 'NOMBRE');
    
        return $this->render('index', [
            'model' => $model,
            'dataProvider' => $dataProvider,
            'materias' => $materias,
        ]);
        // return $this->render('index', [
        //     //'alumnos'=>$alumnos,
        //     //'paginas'=>$paginas,
        //     'searchModel' => $searchModel,
        //     'dataProvider' => $dataProvider,
        // ]);
        // $dataProvider = new Query;
        // $dataProvider ->select('A.NOMBRES, A.APELLIDOS')
        // ->from('ALUMNOS A, MATRICULAS M, notasql N')
        // ->where('M.ALUMNO=A.ALUMNO AND
        // N.MATRICULA=M.NUMEROMATRICULA');
        // return $this->render('index', [
        //     'searchModel' => $searchModel,
        //     'dataProvider' => $dataProvider,
        // ]);
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
}
