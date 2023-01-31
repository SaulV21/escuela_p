<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\ProfesorSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="profesor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'PROFESOR') ?>

    <?= $form->field($model, 'CEDULA') ?>

    <?= $form->field($model, 'NOMBRES') ?>

    <?= $form->field($model, 'DESCRIPCION') ?>

    <?= $form->field($model, 'DIRECCION') ?>

    <?php // echo $form->field($model, 'TELEFONO') ?>

    <?php // echo $form->field($model, 'FECHA_NACIMIENTO') ?>

    <?php // echo $form->field($model, 'FOTO') ?>

    <?php // echo $form->field($model, 'CORREO') ?>

    <?php // echo $form->field($model, 'CLAVE') ?>

    <?php // echo $form->field($model, 'HOJAVIDA') ?>

    <?php // echo $form->field($model, 'AREA') ?>

    <?php // echo $form->field($model, 'ESTADO') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
