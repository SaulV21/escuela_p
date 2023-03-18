<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\AlumnoSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="alumnos-search">
<?= $form->field($model, 'globalSearch') ?>
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>


    <!-- <?= $form->field($model, 'ALUMNO') ?>

    <?= $form->field($model, 'CEDULA') ?>

    <?= $form->field($model, 'NOMBRES') ?>

    <?= $form->field($model, 'APELLIDOS') ?>

    <?= $form->field($model, 'FECHA_NACIMIENTO') ?> -->

    <?php // echo $form->field($model, 'CIUDAD_NACIMIENTO') ?>

    <?php // echo $form->field($model, 'SEXO') ?>

    <?php // echo $form->field($model, 'PADRE') ?>

    <?php // echo $form->field($model, 'PROFESION_PADRE') ?>

    <?php // echo $form->field($model, 'MADRE') ?>

    <?php // echo $form->field($model, 'PROFESION_MADRE') ?>

    <?php // echo $form->field($model, 'CIUDADRES') ?>

    <?php // echo $form->field($model, 'DIRECCION') ?>

    <?php // echo $form->field($model, 'TELEFONO') ?>

    <?php // echo $form->field($model, 'CONTACTO') ?>

    <?php // echo $form->field($model, 'REFERENCIA') ?>

    <?php // echo $form->field($model, 'CORREO') ?>

    <?php // echo $form->field($model, 'FOTO') ?>

    <?php // echo $form->field($model, 'SISRES') ?>

    <?php // echo $form->field($model, 'SISFECHA') ?>

    <?php // echo $form->field($model, 'CSLTKO') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Limpiar', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
