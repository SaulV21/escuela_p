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
                 'checkboxOptions' => function($model, $key, $index, $column) {
                return [
                    //'checked' => true
                    'value' => $model->ALUMNO,
                    'checked' => $model->asistencia == 1 ? true : false,
                    'onclick' => '
                        $.post("actualizar-asistencia?ALUMNO=' . $model->ALUMNO . '&asistencia=" + $(this).prop("checked"), function(data) {
                            console.log(data);
                        });
                    ',
                ];}
            ],

            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, ViewAsistencia $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ALUMNO' => $model->ALUMNO, 'CURSO' => $model->CURSO]);
                }
            ],
        ],
    ]); ?>


</div>