<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\MateriaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="materias-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'MATERIA') ?>

    <?= $form->field($model, 'NOMBRE') ?>

    <?= $form->field($model, 'DESCRIPCION') ?>

    <?= $form->field($model, 'HORAS') ?>

    <?= $form->field($model, 'NIVEL') ?>

    <?php // echo $form->field($model, 'TIPO') ?>

    <?php // echo $form->field($model, 'ABREVIATURA') ?>

    <?php // echo $form->field($model, 'PRIORIDAD') ?>

    <?php // echo $form->field($model, 'AREA') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
