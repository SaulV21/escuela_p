<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Materias $model */

$this->title = 'Actualizar: ' . $model->MATERIA;
$this->params['breadcrumbs'][] = ['label' => 'Materias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->MATERIA, 'url' => ['view', 'MATERIA' => $model->MATERIA]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="materias-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
