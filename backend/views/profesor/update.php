<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Profesor $model */

$this->title = 'Actualizar datos del Profesor: ' . $model->PROFESOR;
$this->params['breadcrumbs'][] = ['label' => 'Profesors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->PROFESOR, 'url' => ['view', 'PROFESOR' => $model->PROFESOR]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="profesor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
