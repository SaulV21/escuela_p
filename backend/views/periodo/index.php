<?php

use backend\models\Periodo;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\PeriodoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Periodos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="periodo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Periodo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'PERIODO',
            'Fecha_ini_periodo',
            'Fecha_fin_periodo',
            'estado',
            'rector',
            //'secretario',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Periodo $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'PERIODO' => $model->PERIODO]);
                 }
            ],
        ],
    ]); ?>


</div>
