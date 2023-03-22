<?php

use backend\models\Cursos;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\CursoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Cursos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cursos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Cursos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=>'CURSO',
                'contentOptions' => ['style' => 'text-align: center;']
            ],
            [
                'attribute'=>'CUPO',
                'contentOptions' => ['style' => 'text-align: center; width: 10px;']
            ],
            [
                'attribute'=>'INICIAL',
                'contentOptions' => ['style' => 'text-align: center; width: 10px;']
            ],
            [
            'attribute'=>'CICLO',
            'contentOptions' => ['style' => 'text-align: center;']
            ],

            'ESPECIALIDAD',
            'DESCRIPCION',
            'PROMOVIDO',
            [
                'header'=>'Acciones',
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Cursos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'CURSO' => $model->CURSO]);
                 }
            ],
        ],
        'headerRowOptions' => ['style' => 'text-align:center; color:  #1474fc;'],
        
        'summary' => 'Cursos del {begin} al {end} de un total de {totalCount} cursos',
    ]); ?>


</div>
