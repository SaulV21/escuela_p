<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Periodo $model */

$this->title = 'Actualizar el Periodo: ' . $model->PERIODO;
$this->params['breadcrumbs'][] = ['label' => 'Periodos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->PERIODO, 'url' => ['view', 'PERIODO' => $model->PERIODO]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="periodo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
