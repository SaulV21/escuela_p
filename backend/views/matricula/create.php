<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Matriculas $model */

$this->title = 'Ingresar nueva matricula';
$this->params['breadcrumbs'][] = ['label' => 'Matriculas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="matriculas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
