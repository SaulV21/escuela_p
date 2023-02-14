<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Periodo $model */

$this->title = $model->PERIODO;
$this->params['breadcrumbs'][] = ['label' => 'Periodos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="periodo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'PERIODO' => $model->PERIODO], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'PERIODO' => $model->PERIODO], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Esta seguro de borrar el periodo lectivo?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'PERIODO',
            'Fecha_ini_periodo',
            'Fecha_fin_periodo',
            'estado',
            'rector',
            'secretario',
        ],
    ]) ?>

</div>
