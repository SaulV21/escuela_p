<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\models\Notas $model */

$this->title = $model->MATRICULA;
$this->params['breadcrumbs'][] = ['label' => 'Notas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="notas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'MATRICULA' => $model->MATRICULA, 'MATERIA' => $model->MATERIA], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'MATRICULA' => $model->MATRICULA, 'MATERIA' => $model->MATERIA], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'MATRICULA',
            'MATERIA',
            'QUIM1',
            'QUIM2',
            'TOTAL',
            'PROMF',
            'EQUIV',
            'SUM_TOT',
            'PROM_GE',
            'SUPLETORIO',
            'REMEDIAL',
            'GRACIA',
            'PROMOCION',
        ],
    ]) ?>

</div>
