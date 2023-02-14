<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\NotasSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="notas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'MATRICULA') ?>

    <?= $form->field($model, 'MATERIA') ?>

    <?= $form->field($model, 'QUIM1') ?>

    <?= $form->field($model, 'QUIM2') ?>

    <?= $form->field($model, 'TOTAL') ?>

    <?php // echo $form->field($model, 'PROMF') ?>

    <?php // echo $form->field($model, 'EQUIV') ?>

    <?php // echo $form->field($model, 'SUM_TOT') ?>

    <?php // echo $form->field($model, 'PROM_GE') ?>

    <?php // echo $form->field($model, 'SUPLETORIO') ?>

    <?php // echo $form->field($model, 'REMEDIAL') ?>

    <?php // echo $form->field($model, 'GRACIA') ?>

    <?php // echo $form->field($model, 'PROMOCION') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
