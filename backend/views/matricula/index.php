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
        <?= Html::a('Create Matriculas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'NUMEROMATRICULA',
            'ALUMNO',
            'PERIODO',
            'CURSO',
            'CICLO',
            //'ESPECIALIDAD',
            //'FECHA',
            //'OBSERVACION',
            //'REFERENCIA',
            //'SYSRES',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Matriculas $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'NUMEROMATRICULA' => $model->NUMEROMATRICULA]);
                 }
            ],
        ],
    ]); ?>


</div>
