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
        <?= Html::a('Create Materias', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'MATERIA',
            'NOMBRE',
            'DESCRIPCION',
            'HORAS',
            'NIVEL',
            //'TIPO',
            //'ABREVIATURA',
            //'PRIORIDAD',
            //'AREA',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Materias $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'MATERIA' => $model->MATERIA]);
                 }
            ],
        ],
    ]); ?>


</div>
