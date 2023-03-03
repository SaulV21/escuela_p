<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Alumnos $model */

$this->title = 'Ingresar Alumnos';
$this->params['breadcrumbs'][] = ['label' => 'Listado de Alumnos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alumnos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
