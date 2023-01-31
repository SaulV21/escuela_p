<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Cursos $model */

$this->title = 'Update Cursos: ' . $model->CURSO;
$this->params['breadcrumbs'][] = ['label' => 'Cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CURSO, 'url' => ['view', 'CURSO' => $model->CURSO]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cursos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
