<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\NotasqlSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="notasql-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'MATRICULA') ?>

    <?= $form->field($model, 'MATERIA') ?>

    <?= $form->field($model, 'P1Q1') ?>

    <?= $form->field($model, 'P2Q1') ?>

    <?= $form->field($model, 'EQUIV80') ?>

    <?php // echo $form->field($model, 'EV_QUIM') ?>

    <?php // echo $form->field($model, 'EQUIV20') ?>

    <?php // echo $form->field($model, 'PROM_QUI') ?>

    <?php // echo $form->field($model, 'EQ_CUAL') ?>

    <?php // echo $form->field($model, 'COMP') ?>

    <?php // echo $form->field($model, 'NF') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
