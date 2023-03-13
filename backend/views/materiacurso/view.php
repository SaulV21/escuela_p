<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\MateriaCurso $model */

$this->title = $model->CURSO;
$this->params['breadcrumbs'][] = ['label' => 'Materia Cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="materia-curso-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'CURSO' => $model->CURSO, 'MATERIA' => $model->MATERIA, 'PROFESOR' => $model->PROFESOR, 'PERIODO' => $model->PERIODO], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'CURSO' => $model->CURSO, 'MATERIA' => $model->MATERIA, 'PROFESOR' => $model->PROFESOR, 'PERIODO' => $model->PERIODO], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Estas seguro de eliminarlo?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'CURSO',
            'MATERIA',
            'PROFESOR',
            'PERIODO',
        ],
    ]) ?>

</div>
