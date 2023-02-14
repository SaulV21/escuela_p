<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Asistencia $model */

$this->title = 'Update Asistencia: ' . $model->ALUMNO;
$this->params['breadcrumbs'][] = ['label' => 'Asistencias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ALUMNO, 'url' => ['view', 'ALUMNO' => $model->ALUMNO, 'CURSO' => $model->CURSO]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="asistencia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
