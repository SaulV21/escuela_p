<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Alumnos $model */

$this->title = 'Actualizar datos del Alumno: ' . $model->ALUMNO;
$this->params['breadcrumbs'][] = ['label' => 'Alumnos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ALUMNO, 'url' => ['view', 'ALUMNO' => $model->ALUMNO]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="alumnos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
