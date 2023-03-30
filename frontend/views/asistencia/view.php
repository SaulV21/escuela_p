<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\models\Asistencia $model */

$this->title = $model->ALUMNO;
$this->params['breadcrumbs'][] = ['label' => 'Asistencias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="asistencia-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'ALUMNO' => $model->ALUMNO, 'MATRICULA' => $model->MATRICULA, 'fecha' => $model->fecha], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ALUMNO' => $model->ALUMNO, 'MATRICULA' => $model->MATRICULA, 'fecha' => $model->fecha], [
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
            'ALUMNO',
            'MATRICULA',
            'fecha',
            'asiste',
        ],
    ]) ?>

</div>
