<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Alumnos $model */

$this->title = 'Update Alumnos: ' . $model->ALUMNO;
$this->params['breadcrumbs'][] = ['label' => 'Alumnos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ALUMNO, 'url' => ['view', 'ALUMNO' => $model->ALUMNO]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="alumnos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
