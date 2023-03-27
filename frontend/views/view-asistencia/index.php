<?php
use frontend\models\ViewAsistencia;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Registro de Asistencia ' . $dataProvider->getModels()[0]["CURSO"];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="view-asistencia-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ALUMNO',
            'APELLIDOS',
            'NOMBRES',
            [
                'class' => 'yii\grid\CheckboxColumn',
                'headerOptions' => ['style' => 'width:3%'],
                'checkboxOptions' => function ($model, $key, $index, $column) {
                    return [
                        'value' => $model->id,
                        'checked' => $model->asiste == 1 ? true : false,
                        'onclick' => '
                            $.post("actualizar-asistencia?id=' . $model->id . '&asiste=" + $(this).prop("checked"), function(data) {
                                console.log(data);
                            });
                        ',
                    ];
                },
            ],
            // [
                
            //     'class' => 'yii\grid\CheckboxColumn',
            //      'checkboxOptions' => function($model, $key, $index, $column) {
            //     return [
            //         'checked' => true
            //     ];}
            // ],

            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, ViewAsistencia $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ALUMNO' => $model->ALUMNO, 'CURSO' => $model->CURSO]);
                }
            ],
        ],
    ]); ?>


</div>