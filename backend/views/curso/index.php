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
        <?= Html::a('Create Cursos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'CURSO',
            'CUPO',
            'INICIAL',
            'CICLO',
            'ESPECIALIDAD',
            //'DESCRIPCION',
            //'PROMOVIDO',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Cursos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'CURSO' => $model->CURSO]);
                 }
            ],
        ],
    ]); ?>


</div>
