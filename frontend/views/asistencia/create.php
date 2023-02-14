<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Asistencia $model */

$this->title = 'Registrar Asistencia';
$this->params['breadcrumbs'][] = ['label' => 'Asistencias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asistencia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
