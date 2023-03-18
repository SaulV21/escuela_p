<?php

use backend\models\MateriaCurso;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\MateriacursoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Materia Cursos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="materia-curso-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Asignar materias', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'CURSO',
            'MATERIA',
            //'Profesor.NOMBRES',
            [
                'attribute' => 'PROFESOR',
                'value' =>('nombreProfesor.NOMBRES')
                /*'value' => function ($model) {
                    return $model->pROFESOR->NOMBRES;
                },*/
            ],
            'PERIODO',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, MateriaCurso $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'CURSO' => $model->CURSO, 'MATERIA' => $model->MATERIA, 'PROFESOR' => $model->PROFESOR, 'PERIODO' => $model->PERIODO]);
                 }
            ],
        ],
    ]); ?>


</div>
