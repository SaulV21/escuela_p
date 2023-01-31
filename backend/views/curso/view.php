<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Cursos $model */

$this->title = $model->CURSO;
$this->params['breadcrumbs'][] = ['label' => 'Cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cursos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'CURSO' => $model->CURSO], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'CURSO' => $model->CURSO], [
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
            'CURSO',
            'CUPO',
            'INICIAL',
            'CICLO',
            'ESPECIALIDAD',
            'DESCRIPCION',
            'PROMOVIDO',
        ],
    ]) ?>

</div>
