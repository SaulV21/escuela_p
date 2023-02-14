<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Notas $model */

$this->title = 'Actualizar Notas: ' . $model->MATRICULA;
$this->params['breadcrumbs'][] = ['label' => 'Notas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->MATRICULA, 'url' => ['view', 'MATRICULA' => $model->MATRICULA, 'MATERIA' => $model->MATERIA]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="notas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
