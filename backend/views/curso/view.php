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
        <?= Html::a('Actualizar', ['update', 'CURSO' => $model->CURSO], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'CURSO' => $model->CURSO], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Esta seguro de eliminar el curso?',
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
