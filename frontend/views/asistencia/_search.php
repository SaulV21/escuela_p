<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\AsistenciaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="asistencia-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ALUMNO') ?>

    <?= $form->field($model, 'MATRICULA') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'asiste') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
