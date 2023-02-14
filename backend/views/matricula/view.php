<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\Matriculas $model */

$this->title = $model->NUMEROMATRICULA;
$this->params['breadcrumbs'][] = ['label' => 'Matriculas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="matriculas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'NUMEROMATRICULA' => $model->NUMEROMATRICULA], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'NUMEROMATRICULA' => $model->NUMEROMATRICULA], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Esta seguro de eliminar esta matricula?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'NUMEROMATRICULA',
            'ALUMNO',
            //
            'PERIODO',
            'CURSO',
            'CICLO',
            'ESPECIALIDAD',
            'FECHA',
            'OBSERVACION',
            'REFERENCIA',
            'SYSRES',
        ],
    ]) ?>

</div>
