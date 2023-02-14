<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Materias $model */

$this->title = $model->MATERIA;
$this->params['breadcrumbs'][] = ['label' => 'Materias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="materias-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'MATERIA' => $model->MATERIA], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'MATERIA' => $model->MATERIA], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Esta seguro de eliminarlo?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'MATERIA',
            'NOMBRE',
            'DESCRIPCION',
            'HORAS',
            'NIVEL',
            'TIPO',
            'ABREVIATURA',
            'PRIORIDAD',
            'AREA',
        ],
    ]) ?>

</div>
