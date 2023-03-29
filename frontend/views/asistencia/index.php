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
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'alumno',
            'nombres',
            'apellidos',
            [  
                'class' => 'yii\grid\CheckboxColumn',
                 'checkboxOptions' => function($model, $key, $index, $column) {
                return [
                    //'value' => $model->id,
                    'checked' => true
                ];}
            ],
        ],
    ]); ?>
<?= Html::a('Guardar', ['create', 'criterio' => $criterio], ['class' => 'btn btn-primary']) ?>
</div>
