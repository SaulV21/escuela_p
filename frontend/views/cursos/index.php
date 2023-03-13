<?php
use frontend\models\Cursos;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Cursos';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="cursos-index">

    <h1><?= Html::encode($this->title) ?></h1>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
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
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Cursos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'CURSO' => $model->CURSO]);
                }
            ],
        ],
    ]); ?>


</div>