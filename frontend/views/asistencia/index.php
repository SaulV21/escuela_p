<?php

use frontend\models\Asistencia;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use frontend\controllers\AsistenciaController;
use yii\helpers\ArrayHelper;
/** @var yii\web\View $this */
/** @var frontend\models\AsistenciaSearch $searchModel */
/** @var frontend\controllers\AsistenciaController $categories */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Asistencias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asistencia-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Registrar Asistencia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <!-- <?php
    echo $this->render('_search', ['model' => $searchModel]); 
    ?> -->

    <?= GridView::widget([
        //'id' => 'item-table',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'ALUMNO',
                'value'=> function ($model) {
                    return $model->listnombre->NOMBRES . ' ' . $model->listnombre->APELLIDOS;
                },
                'contentOptions' => ['style' => 'width: 300px;']
            ],
            'CURSO',
            'MATRICULA',
            'fecha',
            'asiste',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Asistencia $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ALUMNO' => $model->ALUMNO, 'CURSO' => $model->CURSO]);
                 }
            ],
        ],
    ]); ?>


</div>
