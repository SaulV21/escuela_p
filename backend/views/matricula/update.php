<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Matriculas $model */

$this->title = 'Actualizar Matriculas: ' . $model->NUMEROMATRICULA;
$this->params['breadcrumbs'][] = ['label' => 'Matriculas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NUMEROMATRICULA, 'url' => ['view', 'NUMEROMATRICULA' => $model->NUMEROMATRICULA]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="matriculas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
