<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\MateriaCurso $model */

$this->title = 'Actualizar: ' . $model->CURSO;
$this->params['breadcrumbs'][] = ['label' => 'Materia Cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CURSO, 'url' => ['view', 'CURSO' => $model->CURSO, 'MATERIA' => $model->MATERIA, 'PROFESOR' => $model->PROFESOR, 'PERIODO' => $model->PERIODO]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="materia-curso-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
