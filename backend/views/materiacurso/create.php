<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\MateriaCurso $model */

$this->title = 'Asignar materias';
$this->params['breadcrumbs'][] = ['label' => 'Materia Cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="materia-curso-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
