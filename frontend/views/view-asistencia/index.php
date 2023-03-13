<?php
use frontend\models\ViewAsistencia;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Registro de Asistencia';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="view-asistencia-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ALUMNO',
            'CURSO',
            'NOMBRES',
            'APELLIDOS',
            'asistencia',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, ViewAsistencia $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ALUMNO' => $model->ALUMNO, 'CURSO' => $model->CURSO]);
                }
            ],
        ],
    ]); ?>


</div>