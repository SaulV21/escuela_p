<?php

use backend\models\Matriculas;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\MatriculaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Matriculas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="matriculas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ingresar nueva Matricula', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=>'NUMEROMATRICULA',
                'contentOptions' => [
                    'style' => 'width: 10px;
                    text-align: center;'
                    ]
            ],
            [
                'attribute'=>'ALUMNO',
                'value'=> function ($model) {
                    return $model->listnombre->NOMBRES . ' ' . $model->listnombre->APELLIDOS;
                },
                'contentOptions' => ['style' => 'width: 350px;']
            ],
            [
                'attribute'=>'PERIODO',
                'contentOptions' => ['style' => 'text-align: center;']
            ],
            [
                'attribute'=>'CURSO',
                'contentOptions' => ['style' => 'text-align: center;']
            ],
            
            [
                'attribute'=>'CICLO',
                'contentOptions' => ['style' => 'width: 100px;']
            ],
            //'ESPECIALIDAD',
            //'FECHA',
            //'OBSERVACION',
            //'REFERENCIA',
            //'SYSRES',
            [
                'header'=>'Acciones',
                'contentOptions' => [
                    'text-align: center;'
                ],
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Matriculas $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'NUMEROMATRICULA' => $model->NUMEROMATRICULA]);
                 }
            ],
        ],
        'headerRowOptions' => ['style' => 'text-align:center; color:  #1474fc;'],
        'summary' => 'Alumnos del {begin} al {end} de un total de {totalCount} matriculados',
    ]); ?>


</div>
