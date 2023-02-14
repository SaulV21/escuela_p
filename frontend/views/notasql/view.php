<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\GridView;
/** @var yii\web\View $this */
/** @var frontend\models\Notasql $model */

$this->title = $model->MATRICULA;
$this->params['breadcrumbs'][] = ['label' => 'Ingresar Notas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="notasql-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'MATRICULA' => $model->MATRICULA, 'MATERIA' => $model->MATERIA], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'MATRICULA' => $model->MATRICULA, 'MATERIA' => $model->MATERIA], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estas seguro de eliminarlo?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'MATRICULA',
            'MATERIA',
            'P1Q1',
            'P2Q1',
            'EQUIV80',
            'EV_QUIM',
            'EQUIV20',
            'PROM_QUI',
            'EQ_CUAL',
            'COMP',
            'NF',
        ],
    ]) ?>

</div>
