<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Materias $model */

$this->title = 'Ingresar Materias';
$this->params['breadcrumbs'][] = ['label' => 'Materias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="materias-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
