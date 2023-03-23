<?php

use frontend\models\Notas;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\NotasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Notas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ingresar Notas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'MATRICULA',
            'MATERIA',
            'QUIM1',
            'QUIM2',
            'TOTAL',
            'PROMF',
            //'EQUIV',
            //'SUM_TOT',
            //'PROM_GE',
            //'SUPLETORIO',
            //'REMEDIAL',
            //'GRACIA',
            'PROMOCION',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Notas $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'MATRICULA' => $model->MATRICULA, 'MATERIA' => $model->MATERIA]);
                 }
            ],
        ],
    ]); ?>


</div>
