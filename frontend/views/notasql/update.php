<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Notasql $model */

$this->title = 'Update Notasql: ' . $model->MATRICULA;
$this->params['breadcrumbs'][] = ['label' => 'Notasqls', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->MATRICULA, 'url' => ['view', 'MATRICULA' => $model->MATRICULA, 'MATERIA' => $model->MATERIA]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="notasql-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
