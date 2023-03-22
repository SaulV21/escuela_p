<?php

use backend\models\Materias;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\MateriaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Materias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="materias-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ingresar Materias', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=>'MATERIA',
                'contentOptions' => ['style' => 'width: 100px; text-align: center;']
            ],
            'NOMBRE',
            'DESCRIPCION',
            [
                'attribute'=>'HORAS',
                'contentOptions' => ['style' => 'width: 100px; text-align: center;']
            ],
            'NIVEL',
            //'TIPO',
            //'ABREVIATURA',
            //'PRIORIDAD',
            'AREA',
            [
                'header'=>'Acciones',
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Materias $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'MATERIA' => $model->MATERIA]);
                 }
            ],
        ],
        'headerRowOptions' => ['style' => 'text-align:center; color:  #1474fc;'],
        'summary' => 'Materias de {begin} al {end} de un total de {totalCount}',
    ]); ?>


</div>
